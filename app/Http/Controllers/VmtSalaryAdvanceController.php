<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtSalaryAdvSettings;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Services\VmtSalaryAdvanceService;

class VmtSalaryAdvanceController extends Controller
{


public function AssignEmpSalaryAdv(Request $request , VmtSalaryAdvanceService $useSalaryAdvance){
 
    return $useSalaryAdvance->AssignEmpSalaryAdv($request->all() );

}


}
