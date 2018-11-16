<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function checkAvailability(Request $request){
        $date =$request->checkDate;
        $service = DB::table('services')->where('id',$request->sid)->first();
        $alreadyBooked =DB::table('bookings')->where('date',$date)->get();
        $timesTaken = array();
        foreach ($alreadyBooked as $ab){
            array_push($timesTaken,$ab->time);
        }


        return view('booking/book',compact('service','timesTaken','date'));
    }
}
