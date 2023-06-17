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
            $request->client_id,
            $request->loan_applicable_type,
            $request->max_loan_limit,
            $request->min_month_served,
            $request->percent_of_ctc,
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
        $response = $vmtSalaryAdvanceService->showEligibleInterestFreeLoanDetails();
        return  $response;
    }

    //Gettings Clients Based on Login
    public function getClientForLoanAndAdv(Request $request)
    {
        if (VmtClientMaster::count() == 1) {
            return  sessionGetSelectedClientid();
        } else {
            if (sessionGetSelectedClientid() == 1) {
                return VmtClientMaster::all();
            } else {
                return sessionGetSelectedClientid();
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
}
