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
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Services\VmtSalaryAdvanceService;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class VmtSalaryAdvanceController extends Controller
{

    public function getAllDropdownFilterSetting(Request $request)
    {

        $queryGetDept = Department::select('id', 'name')->get();

        $queryGetDesignation = VmtEmployeeOfficeDetails::select('designation')->where('designation', '<>', 'S2 Admin')->distinct()->get();

        $queryGetLocation = VmtEmployeeOfficeDetails::select('work_location')->distinct()->get();

        $queryGetstate = State::select('id', 'state_name')->distinct()->get();

        $queryGetlegalentity = VmtClientMaster::select('id', 'client_name')->distinct()->get();

        $getsalary  = ["department" => $queryGetDept, "designation" => $queryGetDesignation, "location" => $queryGetLocation, "state" => $queryGetstate, "legalEntity" => $queryGetlegalentity];


        return  response()->json($getsalary);
    }

    public function showAssignEmp(Request $request)
    {

        // dd($request->all());

        $select_employee = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->join('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
            ->join('vmt_client_master', 'vmt_client_master.id', '=', 'users.client_id')
            ->where('process', '<>', 'S2 Admin')
            ->select(
                'users.name',
                'users.user_code',
                'vmt_department.name as department_name',
                'vmt_employee_office_details.designation',
                'vmt_employee_office_details.work_location',
                'vmt_client_master.client_name',
            );

        if (!empty($request->department_id)) {
            $select_employee = $select_employee->where('department_id', $request->department_id);
        }
        if (!empty($request->designation)) {
            $select_employee = $select_employee->where('designation', $request->designation);
        }
        if (!empty($request->work_location)) {
            $select_employee = $select_employee->where('work_location', $request->work_location);
        }
        if (!empty($request->client_name)) {
            $select_employee = $select_employee->where('client_id', $request->client_name);
        }

        return $select_employee->get();
    }

    public function showEmployeeview(Request $request)
    {

        $current_user_id = auth()->user()->id;
        // dd($current_user_id);

        $employee_user_id = VmtEmpAssignSalaryAdvSettings::where('user_id', $current_user_id)->first();


        if (isset($employee_user_id)) {

            $emp_compensatory = Compensatory::where('user_id', $current_user_id)->first();

            $employee_salary_adv = VmtSalaryAdvSettings::join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.salary_adv_id', '=', 'vmt_salary_adv_setting.id')
                ->where('vmt_emp_assign_salary_adv_setting.user_id', $current_user_id)->first();


            $calculatevalue = ($emp_compensatory->net_income) * ($employee_salary_adv->percent_salary_adv) / 100;


            $repayment_months = Carbon::now()->addMonths($employee_salary_adv->deduction_period_of_months)->format('Y-m-d');


            $salary_adv['your_monthly_income'] = $emp_compensatory->net_income;
            $salary_adv['max_eligible_amount'] = $calculatevalue;
            $salary_adv['Repayment_date'] = $repayment_months;
            $salary_adv['eligible'] = "0";

            return response()->json($salary_adv);
        } else {

            $salary_adv['eligible'] = "1";
            return response()->json($salary_adv);
        }
    }

    public function EmpSaveSalaryAmt(Request $request)
    {

        dd($request->all());
    }


    public function saveSalaryAdvanceSettings(Request $request)
    {

        // dd($request->all());

        $saveSettingSALaryAdv = new VmtSalaryAdvSettings;
        $saveSettingSALaryAdv->percent_salary_adv = $request->perOfSalAdvance ?? $request->cusPerOfSalAdvance;
        $saveSettingSALaryAdv->deduction_period_of_months = $request->deductMethod ?? $request->cusDeductMethod;
        $saveSettingSALaryAdv->approver_flow = $request->simma ?? "0";
        $saveSettingSALaryAdv->save();

        $SalaryAdvSettings = $saveSettingSALaryAdv;

        foreach ($request->eligibleEmployee as $employee) {

            $user_id =  User::where('user_code', $employee['user_code'])->first();

            $vmtEmpAssignSalaryAdvSettings = new VmtEmpAssignSalaryAdvSettings;
            $vmtEmpAssignSalaryAdvSettings->user_id = $user_id->id;
            $vmtEmpAssignSalaryAdvSettings->salary_adv_id = $SalaryAdvSettings->id;
            $vmtEmpAssignSalaryAdvSettings->active = "0";
            $vmtEmpAssignSalaryAdvSettings->save();
        }

        return response()->json([
            'status' => 'save successfully',
            'message' => 'Done',

        ]);
    }

    public function saveInterestFreeLoanSettings(Request $request)
    {
    }

    public function saveTravelAdvanceSettings(Request $request)
    {
    }

        public function saveLoanWithInterestSettings(Request $request,VmtSalaryAdvanceService $ServiceVmtSalaryAdvanceService)
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

    public function showInterestFreeLoanEmployeeinfo(Request $request, VmtSalaryAdvanceService $vmtSalaryAdvanceService){
         return $vmtSalaryAdvanceService->showInterestFreeLoanEmployeeinfo();
    }
}
