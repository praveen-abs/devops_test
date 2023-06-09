<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtSalaryAdvSettings;
use App\Models\VmtEmpAssignSalaryAdvSettings;

class VmtSalaryAdvanceController extends Controller
{


public function AssignEmpSalaryAdv(Request $request){

    $simma = VmtSalaryAdvSettings::join('vmt_emp_assign_salary_adv_setting','vmt_emp_assign_salary_adv_setting.salary_adv_id','=','vmt_salary_adv_setting.id')->get()->toArray();


    dd($simma);







}


}
