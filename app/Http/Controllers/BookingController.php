<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
