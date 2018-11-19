<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $sericen = array();
        $servicount = array();
        $serviceN=DB::table('services')->get();
        foreach ($serviceN as $s){
            array_push($sericen,$s->serviceName);
            $c =DB::table('bookings')->where('serviceId',$s->id)->where('paymentStatus',1)->count();
            array_push($servicount,$c);
        }

        $totalRevenue = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $month = array("January","February","March","April","May","June","July","August","September","October","November","December");

        $now = Carbon::now();
        foreach($book as $bk) {
            $a=date("Y-m-d", strtotime($bk->date));

            $tmp = "$a[5]$a[6]";
            $tempy="$a[0]$a[1]$a[2]$a[3]";
            if ($now->year == $tempy) {
                if ($tmp == "01") {
                    $totalRevenue[0] += $bk->serviceFee;
                } else if ($tmp == "02") {
                    $totalRevenue[1] += $bk->serviceFee;
                } else if ($tmp == "03") {
                    $totalRevenue[2] += $bk->serviceFee;
                } else if ($tmp == "04") {
                    $totalRevenue[3] += $bk->serviceFee;
                } else if ($tmp == "05") {
                    $totalRevenue[4] += $bk->serviceFee;
                } else if ($tmp == "06") {
                    $totalRevenue[5] += $bk->serviceFee;
                } else if ($tmp == "07") {
                    $totalRevenue[6] += $bk->serviceFee;
                } else if ($tmp == "08") {
                    $totalRevenue[7] += $bk->serviceFee;
                } else if ($tmp == "09") {
                    $totalRevenue[8] += $bk->serviceFee;
                } else if ($tmp == "10") {
                    $totalRevenue[9] += $bk->serviceFee;
                } else if ($tmp == "11") {
                    $totalRevenue[10] += $bk->serviceFee;
                } else if ($tmp == "12") {
                    $totalRevenue[11] += $bk->serviceFee;
                }
            }
        }
        return view('admin/adminHome',compact('question','answer','sum','todaySum','sericen','servicount','totalRevenue','month'));
    }


}
