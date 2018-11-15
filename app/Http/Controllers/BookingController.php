<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function checkAvailability(Request $request){
        $date =$request->checkDate;
        DB::table('bookings')->where('date',$date)->get();
        return view('booking/book');
    }
}
