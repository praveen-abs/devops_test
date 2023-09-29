<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtPayrollTaxService;
use App\Http\Controllers\VmtTestingController;
use App\Exports\InvestmentsReportsExport;
use App\Exports\InvestmentReportsExport;
use App\Models\VmtMasterConfig;
use App\Models\VmtClientMaster;
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


        $employee_investments_data = $vmtPayrollTaxService->fetchInvestmentsReports($request->active_status ,$request->regime_type);

        if($employee_investments_data['status']=="failure"){
            return $response =([
                'status' =>"failure",
                'message' =>"Data Not Found",
                'data' =>"",
            ]);
        }
        // dd($request->date);
        if (empty($request->active_status)) {
            $active_status = 'Active,Resigned,Yet to activate';
        } else {
            $active_status = '';
            foreach ($request->active_status as $single_sts) {
                if ($single_sts == '0') {
                    $active_status = $active_status . 'Yet to activate,';
                } else if ($single_sts == '1') {
                    $active_status = $active_status . 'Active,';
                } else if ($single_sts == '-1') {
                    $active_status = $active_status . 'Resigned,';
                } else {
                }
            }
        }

        if (empty($request->regime_type)) {
            $regime_type = 'old,new';
        } else {
            $regime_type = $request->regime_type;
        }
        $client_details = VmtClientMaster::where('id',sessionGetSelectedClientid())->first();
        $client_name = $client_details->client_name;
        $client_logo_path = $client_details->client_logo;
        $public_client_logo_path = public_path($client_logo_path);
        // dd($emp_mas_ctc_data);
        return Excel::download(new InvestmentReportsExport($type ="Investments Report.Xlsx", $employee_investments_data['data']['rows'],$employee_investments_data['data']['headers'], $client_name, $public_client_logo_path,$active_status,$regime_type), 'Employees Master Report.xlsx');

}


public function annaulProjectionReport(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    return Excel::download(new AnnualProjectionexport($vmtPayrollTaxService->annualSalaryReport()),'Investments Report.xlsx');
}
public function oldRegimeTaxReportCalculation(Request $request, VmtPayrollTaxService $vmtPayrollTaxService)
{
    $regime = "old";
    $age = 58;
    $total_income = 1908400;
    return $vmtPayrollTaxService->newregimetaxcal($total_income);
}


}
