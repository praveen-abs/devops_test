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
use App\Models\VmtSalaryAdvanceMasterModel;
use App\Models\VmtSalaryAdvSettings;
use App\Models\VmtEmpSalAdvDetails;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Services\VmtSalaryAdvanceService;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;





class VmtSalaryAdvanceController extends Controller
{

    public function getAllDropdownFilterSetting(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {


        return $vmtSalaryAdvanceService->getAllDropdownFilterSetting();
    }

    public function SalAdvSettingsTable(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        // dd($request->all());

        return $vmtSalaryAdvanceService->SalAdvSettingsTable($request->department_id, $request->designation, $request->work_location, $request->client_name);
    }

    public function SalAdvShowEmployeeView(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        return $vmtSalaryAdvanceService->SalAdvShowEmployeeView();
    }

    public function SalAdvEmpSaveSalaryAmt(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        //   dd($request->all());
        return $vmtSalaryAdvanceService->SalAdvEmpSaveSalaryAmt($request->mxe, $request->ra, $request->repdate, $request->reason);
    }
    public function saveSalaryAdvanceSettings(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        //   dd($request->all());
        return $vmtSalaryAdvanceService->saveSalaryAdvanceSettings($request->eligibleEmployee, $request->perOfSalAdvance, $request->cusPerOfSalAdvance, $request->deductMethod, $request->cusDeductMethod, $request->approvalflow);
    }

    public function SalAdvApproverFlow(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {

        return $vmtSalaryAdvanceService->SalAdvApproverFlow();
    }


    public function saveTravelAdvanceSettings(Request $request)
    {
        dd($request->all());
    }

    public function saveIntersetAndIntersetFreeLoanSettings(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        //dd($request->all());

        $response = $vmtSalaryAdvanceService->saveIntersetAndIntersetFreeLoanSettings(
            $request->loan_type,
            $request->client_id,
            $request->loan_applicable_type,
            $request->min_month_served,
            $request->max_loan_limit,
            $request->percent_of_ctc,
            $request->loan_amt_interest,
            $request->deduction_starting_months,
            $request->max_tenure_months,
            $request->approver_flow
        );

        return $response;
    }
    public function showInterestFreeLoanEmployeeinfo(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        return $vmtSalaryAdvanceService->showInterestFreeLoanEmployeeinfo();
    }

    public function showEligibleInterestFreeLoanDetails(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        $response = $vmtSalaryAdvanceService->showEligibleInterestFreeLoanDetails($request->loan_type);
        return  $response;
    }

    //Gettings Clients Based on Login
    public function getClientForLoanAndAdv(Request $request)
    {
        if (VmtClientMaster::count() == 1) {
            return VmtClientMaster::where('id', sessionGetSelectedClientid())->get();
        } else {
            if (sessionGetSelectedClientid() == 1) {
                return VmtClientMaster::all();
            } else {
                return VmtClientMaster::where('id', sessionGetSelectedClientid())->get();
            }
        }
    }
    public function loanAndAvanceMasterSettings(Request $request)
    {
        $client_id = $request->client_id;
        //here we tell which tab (sal adv,loan, interest loan, travel adv)
        $column = 'sal_adv';
        foreach ($client_id as $single_client_id) {
            try {
                $vmt_loan_sal_adv_master = new VmtSalaryAdvanceMasterModel;
                $vmt_loan_sal_adv_master->client_id = $single_client_id;
                if ($column == 'sal_adv') {
                    $vmt_loan_sal_adv_master->sal_adv = 1;
                } else if ($column == 'int_free_loan') {
                    $vmt_loan_sal_adv_master->int_free_loan = 1;
                } else if ($column == 'loan_with_int') {
                    $vmt_loan_sal_adv_master->loan_with_int = 1;
                } else if ($column == 'travel_adv') {
                    $vmt_loan_sal_adv_master->travel_adv;
                }
            } catch (Exception $e) {
                return response()->json([
                    "status" => "failure",
                    "message" => "Failed to save interest Free loan setting",
                    "data" => $e->getMessage(),
                ]);
            }
        }
    }

    public function applyLoan(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService)
    {
        $request['loan_type'] = 'InterestWithLoan';
        $request['loan_setting_id'] = 1;
        $request['eligible_amount'] = '500000';
        $request['borrowed_amount'] = '100000';
        $request['interest_rate'] = '2.5';
        $request['deduction_starting_month'] = '2023-07-21';
        $request['deduction_ending_month'] = '2023';
        $request['emi_per_month'] = '4271';
        $request['tenure_months'] = '24';
        $request['reason'] = 'Testing';
        $response = $vmtSalaryAdvanceService->applyLoan(
            $request->loan_type,
            $request->loan_setting_id,
            $request->eligible_amount,
            $request->borrowed_amount,
            $request->interest_rate,
            $request->deduction_starting_month,
            $request->deduction_ending_month,
            $request->emi_per_month,
            $request->tenure_months,
            $request->reason,
        );
        return $response;
    }
    public function fetchEmployeeForLoanApprovals(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){
           $response = $vmtSalaryAdvanceService->fetchEmployeeForLoanApprovals();
           return $response;
    }
}
