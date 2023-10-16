<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VmtPayrollTaxService;

class VmtAPIPayrollTaxController extends Controller
{
    public function getEmployeeTDSWorksheetAsPDF(Request $request, VmtPayrollTaxService $vmtPayrollTaxService){

        return $vmtPayrollTaxService->getEmployeeTDSWorksheetAsPDF($request->user_code,$request->payroll_month);

    }
}
