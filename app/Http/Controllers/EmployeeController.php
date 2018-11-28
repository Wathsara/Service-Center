<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller{

    public function employee(){
        $emp = DB::table('employees')->get();
        return view('admin/employee',compact('emp'));
    }

    public function addEmployee(Request $request){
        $this->validate($request, [
            'employeeName' => 'required|string|max:255',
            'employeeGender' => 'required|string|max:255',
            'employeeType' => 'required|string|max:255',
            'employeeAddress' => 'required|string|max:255',
            'employeeEmail' => 'required|email|max:255',
            'employeeSalary' => 'required|string|max:255',
            'employeeDescription' => 'required|string|max:1000',
            'employeeContactNo'=>'required|string|min:10|max:10'

        ]);
        $emp = new Employee();
        $emp->employeeName = $request->employeeName;
        $emp->employeeGender = $request->employeeGender;
        $emp->employeeType = $request->employeeType;
        $emp->employeeContactNo = $request->employeeContactNo;
        $emp->employeeAddress = $request->employeeAddress;
        $emp->employeeEmail = $request->employeeEmail;
        $emp->employeeSalary = $request->employeeSalary;
        $emp->employeeDescription = $request->employeeDescription;
        $emp->created_at=Carbon::now();
        $emp->save();

        $employee=DB::table('employees')->orderBy('id','DESC')->first();

        $request->file('employeeImage')->move(
            base_path() . '/public/employeePic/',$employee->id
        );

        Session::put('employeeadd',"Employee Added Succesfully");
        return back();
    }

    public function updateEmployee(Request $request){
        $this->validate($request, [
            'employeeName' => 'required|string|max:255',
            'employeeGender' => 'required|string|max:255',
            'employeeType' => 'required|string|max:255',
            'employeeAddress' => 'required|string|max:255',
            'employeeEmail' => 'required|email|max:255',
            'employeeSalary' => 'required|string|max:255',
            'employeeDescription' => 'required|string|max:1000',
            'employeeContactNo'=>'required|string|min:10|max:10'

        ]);
        DB::table('employees')
            ->where('id',$request->eid)
            ->update(['employeeName' => $request->employeeName,
                    'employeeGender' => $request->employeeGender,
                    'employeeType' => $request->employeeType,
                    'employeeContactNo' => $request->employeeContactNo,
                    'employeeAddress' => $request->employeeAddress,
                    'employeeEmail' => $request->employeeEmail,
                    'employeeSalary' => $request->employeeSalary,
                    'employeeDescription' => $request->employeeDescription
                    ]);
        if($request->file('employeeImage')!=null) {
            $request->file('employeeImage')->move(
                base_path() . '/public/employeePic/', $request->eid
            );
        }

            Session::put('employeeupdate',"Employee Update Succesfully");
            return back();
    }

    public function deleteEmployee(Request $request){
        DB::table('employees')
            ->where('id',$request->eid)->delete();
        session::put('employeedelete',"delete Succesfully");
        return back();
    }

}
