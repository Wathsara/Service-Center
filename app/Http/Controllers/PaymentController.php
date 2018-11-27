<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );

        $settings = array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR'
        );
        $this->_api_context->setConfig($settings);

    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->amount); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('This will transfer to Chathuranga Auto Care');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paymentStatus',['bid'=>$request->bid])) /** Specify return URL **/
        ->setCancelUrl(route('paymentStatus'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return redirect()->route('ServiceList');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return redirect()->route('ServiceList');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return redirect()->route('ServiceList');
    }


    /**
     * method to return payment status report
     * @return mixed
     */
    public function getStatusReport(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            Session::put('error', 'Payment failed');
            return redirect()->route('ServiceList');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            Session::put('success', 'Payment success');

            DB::table('bookings')
                ->where('bookingId', $request->bid)
                ->update(['paymentStatus' => 1]);

            $ser = DB::table('bookings')->leftJoin('services','services.id','bookings.serviceId')->where('bookingId',$request->bid)->first();

            $usere=Auth::user()->email;
            $name=Auth::user()->name;
            $cno=Auth::user()->cno;


            $data = array('name'=>$name,'email'=>$usere, "cno" => $cno, 'serviceName'=>$ser->serviceName,'date'=>$ser->date,'time'=>$ser->time,'fee'=>$ser->serviceFee);

            Mail::send('email/bill', $data, function($message) use($usere) {
                $message->to($usere)
                    ->subject('Billing Invoice');
                $message->from('akashsahan963@gmail.com','Chathuranga Auto Care Center');
            });

            return redirect()->route('ServiceList');
        }

        Session::put('error', 'Payment failed');
        return redirect()->route('ServiceList');
    }

}
