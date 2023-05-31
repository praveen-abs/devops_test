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
use App\Services\VmtPayrollService;

use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;

use App\Services\VmtEmployeePayCheckService;


class VmtPayrollController extends Controller
{

    public function showPayRunPage(Request $request)
    {
        return view('vmt_uploadPayRunData');
    }


    public function getCurrentPayrollMonth(Request $request , VmtPayrollService $serviceVmtPayrollService ){
            dd($request->all());
        return $serviceVmtPayrollService->getCurrentPayrollMonth;
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

    public function showManagePayslipsPage(Request $request){
        if(auth()->user()->can(config('vmt_roles_permissions.permissions.MANAGE_PAYSLIPS_can_view')))
            return view('payroll.manage_payslips');
        else
            return view('page_unauthorized__access');
    }




    public function showPayrollSetup(Request $request){
        return view('payroll.vmt_payroll_setup');
    }

    public function showWorkLocationSetup(Request $request){
        return view('payroll.vmt_work_location');
    }

}
