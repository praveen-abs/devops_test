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

    public function getAllDropdownFilterSetting(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        // dd($request->all());

        return $vmtSalaryAdvanceService->getAllDropdownFilterSetting();
    }

    public function showAssignEmp(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        // dd($request->all());

        return $vmtSalaryAdvanceService->showAssignEmp($request->department_id, $request->designation, $request->work_location, $request->client_name);
    }

    public function showEmployeeview(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        return $vmtSalaryAdvanceService->showEmployeeview();
    }

    public function EmpSaveSalaryAmt(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        // dd($request->all());
        return $vmtSalaryAdvanceService->EmpSaveSalaryAmt($request->mxe, $request->ra, $request->repdate, $request->reason);
    }
    public function saveSalaryAdvanceSettings(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        //   dd($request->all());
        return $vmtSalaryAdvanceService->saveSalaryAdvanceSettings($request->eligibleEmployee, $request->perOfSalAdvance, $request->cusPerOfSalAdvance, $request->deductMethod, $request->cusDeductMethod);
    }



    public function saveInterestFreeLoanSettings(Request $request)
    {
    }

    public function saveTravelAdvanceSettings(Request $request)
    {
    }

    public function saveLoanWithInterestSettings(Request $request, VmtSalaryAdvanceService $ServiceVmtSalaryAdvanceService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "max_loan_amount" => 'required',
                "loan_amt_interest" => "required",
                "deduction_starting_months" => "required",
                "max_tenure_months" => "required",
                "approver_flow" => "required",

            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        $response = $ServiceVmtSalaryAdvanceService->saveLoanWithInterestSettings(
            $request->max_loan_amount,
            $request->loan_amt_interest,
            $request->deduction_starting_months,
            $request->max_tenure_months,
            $request->approver_flow
        );
    }

    public function saveIntersetFreeLoanSettings(Request $requets, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

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
