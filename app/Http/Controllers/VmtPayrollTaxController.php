<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtPayrollTaxService;
use App\Http\Controllers\VmtTestingController;
use App\Exports\InvestmentsReportsExport;
use App\Exports\AnnualProjectionexport;
use Maatwebsite\Excel\Facades\Excel;

class VmtPayrollTaxController extends Controller
{

public function getEmpCompValues(Request $request, VmtPayrollTaxService $vmtPayrollTaxService){

    // $user_id = auth()->user()->id;

    $month = "2023-08-01";

    // $user_id = VmtInvFEmpAssigned::pluck('user_id')->toArray();

    $user_id = '149';

    // $month = "2023-04-01";


    return $vmtPayrollTaxService->getEmpCompValues($user_id,$month);

}
public function annualProjection(Request $request, VmtPayrollTaxService $vmtPayrollTaxService){

    return $vmtPayrollTaxService->HraExceptionCalc();

}

public function downloadInvestmentReport(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    return Excel::download(new InvestmentsReportsExport($vmtPayrollTaxService->fetchInvestmentTaxReports()),'Investments Report.xlsx');
}
public function downloadInvestReport(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    return Excel::download(new InvestmentsReportsExport((new VmtTestingController)->fetchInvestmentTaxReports()),'Investments Report.xlsx');
}

public function annaulProjectionReport(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    return Excel::download(new AnnualProjectionexport($vmtPayrollTaxService->annualSalaryReport()),'Investments Report.xlsx');
}
public function oldRegimeTaxReportCalculation(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    $regime = "old";
    $age = 58;
    $total_income = 950000;
    return $vmtPayrollTaxService->newregimetaxcal($total_income);
}


}
