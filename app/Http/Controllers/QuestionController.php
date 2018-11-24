<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function customerQuestion(){
        $question = DB::table('questions')->where('status',0)->get();
        $answer = DB::table('questions')->where('status',1)->orderBy('id','desc')->get();

        return view('admin/questionView',compact('question','answer'));
    }
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

    public function answer(Request $request){


        DB::table('questions')
            ->where('id', $request->qid)
            ->update(['status' => 1,'answer'=>$request->answer]);

        $que=DB::table('questions')->where('id',$request->qid)->first();
        $usere=$que->email;

        $data = array('question'=>$que->question,'answer'=>$request->answer);

        Mail::send('email/answer', $data, function($message) use($usere) {
            $message->to($usere)
                ->subject('Answer For Your Question');
            $message->from('akashsahan963@gmail.com','Chathuranga Auto Care Center');
        });

        Session::put('success', 'answer success');
        return back();

    }

    public function delque(Request $request){
        DB::table('questions')->where('id',$request->qid)->delete();
        Session::put('questiondelete', 'delete success success');
        return back();
    }
}
