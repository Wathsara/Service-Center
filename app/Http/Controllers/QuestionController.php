<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function question(Request $request){
        $que = new Questions();
        $que->name=$request->name;
        $que->email=$request->email;
        $que->subject=$request->subject;
        $que->question=$request->question;
        $que->save();

        Session::put('que','Our team Will contact You Soon');
        return back();
    }
}
