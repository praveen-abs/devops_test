<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeWorkShifts;
use App\Models\VmtWorkShifts;

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
                            ->get(['users.id as user_id','user_code as emp_code','users.name as employee_name','designation','work_location','department_id','vmt_department.name as department_name']);

        return $query_emp_details;
    }

    /*
        Assigns the selected employees to workshifts
    */
    public function assignEmployeesToWorkShift(Request $request){

        //vmt_employee_workshifts
        //dd($request->all());

        $req_workshift_name = $request->workshift_name;
        $array_emp_ids = $request->selectedEmployees;

        //check if shift name already exists
        if(VmtWorkShifts::where('shift_type',$req_workshift_name)->count() > 0 )
        {
            return [
                "status" => "failure",
                "message" => "Shift name already exists! Please enter a new name",

            ];
        }
        else
        {
            //Create New workshift
            $workshift = new VmtWorkShifts;
            $workshift->shift_type = $req_workshift_name;
            $workshift->shift_start_time = $request->shift_start_time;
            $workshift->shift_end_time = $request->shift_end_time;
            $workshift->save();

        }

        //assign employees into the created shift
        foreach($array_emp_ids as $singleEmpID){

            $emp_workshift = new VmtEmployeeWorkShifts;
            $emp_workshift->user_id = $singleEmpID;
            $emp_workshift->work_shift_id = $singleEmpID;

        }


    }
}
