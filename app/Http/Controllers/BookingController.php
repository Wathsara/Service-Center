<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function checkAvailability(Request $request){
        $date =$request->checkDate;
        $service = DB::table('services')->where('id',$request->sid)->first();
        $alreadyBooked =DB::table('bookings')->where('date',$date)->where('paymentStatus',1)->get();
        $timesTaken = array();
        foreach ($alreadyBooked as $ab){
            array_push($timesTaken,$ab->time);
        }


        return view('booking/book',compact('service','timesTaken','date'));
    }

    public function reserve(Request $request){
        $book = new Booking();
        $book->serviceId=$request->sid;
        $book->userId=Auth::user()->id;
        $book->date=$request->checkDate;
        $book->time=$request->time;
        $book->paymentStatus=0;
        $book->save();

        $service=DB::table('services')->where('id',$request->sid)->first();
        $booking = DB::table('bookings')->where('userId',Auth::user()->id)->orderBy('bookingId','desc')->first();
        $price=($service->serviceFee)/170;
        return redirect()->route('payment', ['bid'=>$booking->bookingId, 'amount'=>$price]);

    }

    public function appointment(){
        $date=date("Y-m-d");
        $alreadyBooked =DB::table('bookings')->where('date',$date)->where('paymentStatus',1)->get();
        $timesTaken = array();
        foreach ($alreadyBooked as $ab){
            array_push($timesTaken,$ab->time);
        }
        return view('admin/appointment',compact('timesTaken','date'));
    }

    public function checkBooking(Request $request){
        $date=$request->checkDate;
        $alreadyBooked =DB::table('bookings')->where('date',$date)->where('paymentStatus',1)->get();
        $timesTaken = array();
        foreach ($alreadyBooked as $ab){
            array_push($timesTaken,$ab->time);
        }
        return view('admin/appointment',compact('timesTaken','date'));

    }

    public function blockNow(Request $request){
        $book = new Booking();
        $book->serviceId=$request->serviceName;
        $book->userId=0;
        $book->time=$request->time;
        $book->date=$request->date;
        $book->paymentStatus=1;
        $book->save();

        $book=DB::table('bookings')->orderBy('bookingId','DESC')->first();

        $c= new Customer();
        $c->bid=$book->bookingId;
        $c->name=$request->name;
        $c->email=$request->email;
        $c->cno=$request->cno;
        $c->save();


        $usere=$request->email;
        $name=$request->name;
        $cno=$request->cno;
        $ser= DB::table('services')->where('id',$request->serviceName)->first();

        $data = array('name'=>$name,'email'=>$usere, "cno" => $cno, 'serviceName'=>$ser->serviceName,'date'=>$request->date,'time'=>$request->time,'fee'=>$ser->serviceFee);

        Mail::send('email/bill', $data, function($message) use($usere) {
            $message->to($usere)
                ->subject('Billing Invoice');
            $message->from('akashsahan963@gmail.com','Chathuranga Auto Care Center');
        });

        return back();
    }
}
