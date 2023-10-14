<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\VmtPMS;

class VmtPMSModuleController_v3 extends Controller
{
    public function showPMSDashboard()
    {
        return "PMS v3 working";
    }

    public function getEmpManagerCode(){

        $emp_code = 'PSC0020';

        $getuser = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')->where('users.user_code',$emp_code)->first();

        $getmanagers = User::where('user_code',$getuser->l1_manager_code)->first();

        dd($getmanagers);

    }


}
