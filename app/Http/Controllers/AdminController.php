<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $question = DB::table('questions')->where('status',0)->get();
        $answer = DB::table('questions')->where('status',1)->orderBy('id','desc')->get();
        return view('admin/adminHome',compact('question','answer'));
    }


}
