<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $question = DB::table('questions')->where('status',0)->get();
        $answer = DB::table('questions')->where('status',1)->orderBy('id','desc')->get();
        $sum=0;
        $book=DB::table('bookings')->leftJoin('services','services.id','bookings.serviceId')->where('paymentStatus',1)->get();

        foreach ($book as $bk){
            $sum+=(int)$bk->serviceFee;
        }
        $todaySum=0;
        $date=date("Y-m-d");
        $bookdate=DB::table('bookings')->leftJoin('services','services.id','bookings.serviceId')->where('paymentStatus',1)->where('date',$date)->get();

        foreach ($bookdate as $bk){
            $todaySum+=(int)$bk->serviceFee;
        }
        return view('admin/adminHome',compact('question','answer','sum','todaySum'));
    }


}
