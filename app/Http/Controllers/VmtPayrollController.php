<?php

namespace App\Http\Controllers;

use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Imports\VmtPaySlip;
use App\Models\User;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;

use App\Services\VmtEmployeePayslipService;


class VmtPayrollController extends Controller
{

    public function showPayRunPage(Request $request)
    {
        return view('vmt_uploadPayRunData');
    }


    //
    public function uploadPayRunData(Request $request, VmtEmployeePayslipService $employeePaySlipService){

        return $employeePaySlipService->importBulkEmployeesPayslipExcelData($request->all());

        //$importDataArry = \Excel::import(new VmtPaySlip, request()->file('file'));
        //dd($importDataArry);
    }

    public function showPayrollClaimsPage(Request $request){
        return view('payRoll_claim');
    }

    public function showPayrollAnalyticsPage(Request $request){
        return view('payRoll');

    }

    public function showPayrollReportsPage(Request $request){
        return view('payRoll_reports');
    }

    public function showPayrollRunPage(Request $request){
        return view('runpayRoll');

    }

    public function showPayrollSetup(Request $request){
        return view('payroll.vmt_payroll_setup');
    }

    public function showWorkLocationSetup(Request $request){
        return view('payroll.vmt_work_location');
    }
    
}
