<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use App\Models\VmtSalaryAdvSettings;
use App\Models\VmtEmpAssignSalaryAdvSettings;

class VmtSalaryAdvanceService
{
    public function AssignEmpSalaryAdv( $request){

        $simma = VmtSalaryAdvSettings::join('vmt_emp_assign_salary_adv_setting','vmt_emp_assign_salary_adv_setting.salary_adv_id','=','vmt_salary_adv_setting.id')->get()->toArray();
    
        dd($simma);
    }
}
