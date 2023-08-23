<?php

namespace App\Http\Controllers;

use App\Services\VmtAttendanceService;
use App\Services\VmtSalaryAdvanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class VmtAPILoanAndSalaryAdvanceController extends Controller
{
    public function empLoanAndSalaryAdvance(Request $request, VmtSalaryAdvanceService $vmtsalaryAdvanceService)
    {


        $validator = Validator::make(
            $data = [
                "loan_type" => $request->loan_type,
                "user_code" => $request->user_code
            ],
            $rules = [
                "loan_type" => "required",
                "user_code" => "required|exists:users,user_code"
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
        $users_detail = User::where('user_code', $request->user_code)->first();
        $response = $vmtsalaryAdvanceService->isEligibleForLoanAndAdvance($request->loan_type, $users_detail->id, $users_detail->client_id);
        $response = json_encode($response, true);
        $response = json_decode($response, true);
        $employeedashboard = $vmtsalaryAdvanceService->EmployeeLoanHistory($request->loan_type, $users_detail->id);
        $eligible_loan_amount = $vmtsalaryAdvanceService->SalAdvShowEmployeeView($request->loan_type, $users_detail->id);
        $eligible_loan_amount = json_encode($eligible_loan_amount, true);
        $eligible_loan_amount = json_decode($eligible_loan_amount, true);
        $response = array();
        if ($request->loan_type == 'int_free_loan') {
            $employee_loan_history = $vmtsalaryAdvanceService->EmployeeLoanHistory($users_detail->id, 'InterestFreeLoan');
            $eligible_loan_details = $vmtsalaryAdvanceService->showEligibleInterestFreeLoanDetails('InterestFreeLoan', $users_detail->id, $users_detail->client_id);
            $eligible_loan_details = json_encode($eligible_loan_details, true);
            $eligible_loan_details = json_decode($eligible_loan_details, true);
            // dd($users_detail->client_id);
        } else if ($request->loan_type == 'loan_with_int') {
            $employee_loan_history = $vmtsalaryAdvanceService->EmployeeLoanHistory($users_detail->id, 'Interest With Loan');
        } else if ($request->loan_type == 'sal_adv') {
            $emp_sal_adv = $vmtsalaryAdvanceService->SalAdvShowEmployeeView($users_detail->id, 'Salary Advance');
        }
        $emp_dash = $vmtsalaryAdvanceService->employeeDashboardLoanAndAdvance($request->loan_type, $users_detail->id);
        $emp_dash = json_encode($emp_dash, true);
        $emp_dash = json_decode($emp_dash, true);
        $emp_dash_data = $emp_dash['original']['data'];
        $eligible_loan_details=$eligible_loan_details['original'];
        dd($eligible_loan_details);
        if ($response['original']['data'] == 0) {
            return [
                "status" => "0",
                "message" => "not eligible",
                "loan history" => [],
                "employee dashboard" => [],
                "eligible borrow amount" => []
            ];
        }
        if ($response['original']['data'] == 1) {
            $emp_salary_advnce = $vmtsalaryAdvanceService->employeeDashboardLoanAndAdvance($request->loan_type, $users_detail->id);
            $emp_loan_history = $vmtsalaryAdvanceService->EmployeeLoanHistory($users_detail->id, $request->loan_type);
        }
        return $response;
    }
}
