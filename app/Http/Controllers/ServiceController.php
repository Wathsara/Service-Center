<?php

namespace App\Http\Controllers;

use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function service(){
        $ser = DB::table('services')->get();
        return view('admin/service',compact('ser'));
    }

    public function addService(Request $request){
        $this->validate($request, [
            'serviceName' => 'required|string|max:255',
            'serviceDiscription' => 'required|string|max:1000',
            'serviceFee' => 'required|string|max:10'

        ]);
        $ser = new Service();
        $ser->serviceName=$request->serviceName;
        $ser->serviceDiscription=$request->serviceDiscription;
        $ser->ServiceFee=$request->serviceFee;
        $ser->created_at=Carbon::now();
        $ser->save();
        Session::put('serviceadd', "Service Added Succesful");
        return back();
    }

    public function updateService(Request $request){
        $this->validate($request, [
            'serviceName' => 'required|string|max:255',
            'serviceDiscription' => 'required|string|max:255',
            'serviceFee' => 'required|string|max:255'

        ]);
        DB::table('services')
            ->where('id', $request->sid)
            ->update([
                'serviceName' => $request->serviceName ,
                'serviceDiscription'=>$request->serviceDiscription,
                'serviceFee'=>$request->serviceFee
            ]);
        Session::put('serviceupdate', "Service update Succesful");
        return back();
    }

    public function deleteService(Request $request){
        DB::table('services')
            ->where('id', $request->sid)->delete();
        Session::put('servicedel', "Service Deleted Succesful");
        return back();
    }
}
