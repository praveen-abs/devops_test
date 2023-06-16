<?php

namespace App\Http\Controllers;

use App\Models\Compensatory;
use App\Models\Department;
use App\Models\State;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeeCompensatoryLeave;
use App\Models\VmtEmployeeOfficeDetails;
use Illuminate\Http\Request;
use App\Models\VmtSalaryAdvSettings;
use App\Models\VmtEmpSalAdvDetails;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Services\VmtSalaryAdvanceService;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class VmtSalaryAdvanceController extends Controller
{

    public function getAllDropdownFilterSetting(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){


        return $vmtSalaryAdvanceService->getAllDropdownFilterSetting();
    }

    public function SalAdvSettingsTable(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){
        // dd($request->all());

        return $vmtSalaryAdvanceService->SalAdvSettingsTable($request->department_id, $request->designation,$request->work_location, $request->client_name);
   }

    public function SalAdvShowEmployeeView(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){

        return $vmtSalaryAdvanceService->SalAdvShowEmployeeView();
   }

    public function SalAdvEmpSaveSalaryAmt(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){

        //   dd($request->all());
        return $vmtSalaryAdvanceService->SalAdvEmpSaveSalaryAmt( $request->mxe, $request->ra, $request->repdate, $request->reason);
   }
    public function saveSalaryAdvanceSettings(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){

        //   dd($request->all());
        return $vmtSalaryAdvanceService->saveSalaryAdvanceSettings($request->eligibleEmployee, $request->perOfSalAdvance, $request->cusPerOfSalAdvance, $request->deductMethod, $request->cusDeductMethod);
    }


    public function saveTravelAdvanceSettings(Request $request)
    {
        dd($request->all());
    }

    public function saveLoanWithInterestSettings(Request $request, VmtSalaryAdvanceService $ServiceVmtSalaryAdvanceService)
    {
        dd($request->all());

        $response = $ServiceVmtSalaryAdvanceService->saveLoanWithInterestSettings(
            $request->min_month_served,
            $request->loan_applicable_type,
            $request->percent_of_ctc,
            $request->max_loan_amount,
            $request->loan_amt_interest,
            $request->deduction_starting_months,
            $request->max_tenure_months,
            $request->approver_flow
        );
    }

    public function saveIntersetFreeLoanSettings(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        dd($request->all());

        $response = $vmtSalaryAdvanceService->saveIntersetFreeLoanSettings(
            $requets->min_month_served,
            $requets->percent_of_ctc,
            $requets->deduction_starting_months,
            $requets->max_tenure_months,
            $requets->approver_flow
        );

        return $response;
    }
    public function showInterestFreeLoanEmployeeinfo(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        return $vmtSalaryAdvanceService->showInterestFreeLoanEmployeeinfo();
    }

    public function showEligibleInterestFreeLoanDetails(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){
        $response = $vmtSalaryAdvanceService->showEligibleInterestFreeLoanDetails();
        return $response;
    }
}
