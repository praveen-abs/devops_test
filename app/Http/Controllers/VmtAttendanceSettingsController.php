<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeWorkShifts;

class VmtAttendanceSettingsController extends Controller
{
    //

    public function showAttendanceSettingsPage(Request $request){
        return view('configurations.attendance_settings');
    }

    public function assignEmployeesWorkShift(Request $request){

        //VmtEmployeeWorkShifts
    }

    public function fetchEmployeeDetails(Request $request){

        $query_emp_details = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id','=', 'users.id')
                            ->leftJoin('vmt_department','vmt_department.id','=','vmt_employee_office_details.department_id')
                            ->where('users.is_ssa','0')
                            ->get(['user_code as emp_code','users.name as employee_name','designation','work_location','department_id','vmt_department.name as department_name']);

        return $query_emp_details;
    }

    /*
        Assigns the selected employees to workshifts
    */
    public function assignEmployeesToWorkShift(Request $request){

        //vmt_employee_workshifts
        dd($request->all());

    }
}
