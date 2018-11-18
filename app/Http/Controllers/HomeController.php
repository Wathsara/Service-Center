<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=DB::table('services')->get();
        return view('home',compact('services'));
    }

    public function findUserType(){
        if(Auth::user()->admin==true){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('home');
        }


    }
}
