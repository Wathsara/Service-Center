<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin/adminHome');
    }

    public function service(){
        return view('admin/service');
    }
}
