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
