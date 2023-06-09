<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\State;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeeOfficeDetails;
use Illuminate\Http\Request;
use App\Models\VmtSalaryAdvSettings;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Services\VmtSalaryAdvanceService;

class VmtSalaryAdvanceController extends Controller
{

public function getAllDropdownFilterSetting(Request $request){

    $queryGetDept = Department::select('id','name')->get();

    $queryGetDesignation = VmtEmployeeOfficeDetails::select('designation')->where('designation','<>','S2 Admin')->distinct()->get();

    $queryGetLocation = VmtEmployeeOfficeDetails::select('work_location')->distinct()->get();

    $queryGetstate = State::select('id','state_name')->distinct()->get();

    $queryGetlegalentity = VmtClientMaster::select('id','client_name')->distinct()->get();

   $getsalary  = ["department"=>$queryGetDept,"designation"=>$queryGetDesignation,"location"=>$queryGetLocation,"state"=>$queryGetstate,"legalEntity"=>$queryGetlegalentity];


  return  response()->json($getsalary);

}

public function showAssignEmp(Request $request){

        // dd($request->all());

       $simma = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
       ->join('vmt_department','vmt_department.id','=','vmt_employee_office_details.department_id')
        ->join('vmt_client_master','vmt_client_master.id','=','users.client_id')
        ->where('process','<>','S2 Admin')
        ->where('department_id', $request->department_id)
        ->orwhere('designation',$request->designation)
        ->orwhere('work_location',$request->work_location)
       // ->orwhere('state','')
        ->orwhere('client_id',$request->client_name)
         ->get()->toarray();

    return($simma);

}







public function AssignEmpSalaryAdv(Request $request , VmtSalaryAdvanceService $useSalaryAdvance){
        dd($request->all());
    return $useSalaryAdvance->AssignEmpSalaryAdv($request->all() );

}


}
