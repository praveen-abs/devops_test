<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtSalaryRevision;
use App\Services\VmtSalaryRevisionService;

class VmtSalaryRevisionController extends Controller
{

    public function getAllEmployeeData(Request $request, VmtSalaryRevisionService $vmtSalaryRevisionService){

        return  $vmtSalaryRevisionService->getAllEmployeeData();
    }
    public function saveSalaryRevisionEmpData(Request $request, VmtSalaryRevisionService $vmtSalaryRevisionService){

        return  $vmtSalaryRevisionService->saveSalaryRevisionEmpData(
                                                    $request->user_id,
                                                    $request->frequency,
                                                    $request->increment_on,
                                                    $request->percentage,
                                                    $request->amount,
                                                    $request->effective_date,
                                                    $request->reason,
                                                    $request->process_type);
    }






}
