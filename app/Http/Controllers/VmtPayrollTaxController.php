<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtPayrollTaxService;
use App\Exports\InvestmentsReportsExport;
use Maatwebsite\Excel\Facades\Excel;

class VmtPayrollTaxController extends Controller
{

public function getEmpCompValues(Request $request, VmtPayrollTaxService $vmtPayrollTaxService){

    $user_id = auth()->user()->id;

    $month = "2023-04-01";


    return $vmtPayrollTaxService->getEmpCompValues($user_id,$month);

}
public function annualProjection(Request $request, VmtPayrollTaxService $vmtPayrollTaxService){

    return $vmtPayrollTaxService->HraExceptionCalc();

}

public function downloadInvestmentReport(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    return Excel::download(new InvestmentsReportsExport($vmtPayrollTaxService->fetchInvestmentTaxReports()),'Investments Report.xlsx');
}


}
