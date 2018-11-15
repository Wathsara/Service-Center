<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $question = DB::table('questions')->get();
        return view('admin/adminHome',compact('question'));
    }


}
