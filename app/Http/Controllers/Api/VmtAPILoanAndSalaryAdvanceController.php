<?php

namespace App\Http\Controllers\Api;

use App\Services\VmtAttendanceService;
use App\Services\VmtSalaryAdvanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\Controller;

class VmtAPILoanAndSalaryAdvanceController extends Controller
{
    public function getEmpLoanAndSalaryAdvance(Request $request, VmtSalaryAdvanceService $vmtsalaryAdvanceService)
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

        try
        {
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
                ]);
            }

            $users_detail = User::where('user_code', $request->user_code)->first();
            $response = $vmtsalaryAdvanceService->isEligibleForLoanAndAdvance($request->loan_type, $users_detail->id, $users_detail->client_id);
            $response = json_encode($response);
            $response = json_decode($response, true);
            
            if ($request->loan_type == 'int_free_loan') {
                $employee_loan_history = $vmtsalaryAdvanceService->EmployeeLoanHistory($users_detail->id, 'InterestFreeLoan');
                $eligible_loan_details = $vmtsalaryAdvanceService->showEligibleInterestFreeLoanDetails('InterestFreeLoan', $users_detail->id, $users_detail->client_id);
                if ($eligible_loan_details != null) {
                    $eligible_loan_details = json_encode($eligible_loan_details);
                    $eligible_loan_details = json_decode($eligible_loan_details, true);
                    $eligible_loan_details = $eligible_loan_details['original'];
                }
            } else if ($request->loan_type == 'loan_with_int') {
                $employee_loan_history = $vmtsalaryAdvanceService->EmployeeLoanHistory($users_detail->id, 'InterestWithLoan');
                $eligible_loan_details = $vmtsalaryAdvanceService->showEligibleInterestFreeLoanDetails('InterestWithLoan', $users_detail->id, $users_detail->client_id);
            } else if ($request->loan_type == 'sal_adv') {
                $employee_loan_history = $vmtsalaryAdvanceService->getEmpsaladvDetails($users_detail->id);
                $eligible_loan_details = $vmtsalaryAdvanceService->SalAdvShowEmployeeView();
            if ($eligible_loan_details != null) {
                    $eligible_loan_details = json_encode($eligible_loan_details);
                    $eligible_loan_details = json_decode($eligible_loan_details, true);
                    $eligible_loan_details = $eligible_loan_details['original'];
                }
                // dd( $eligible_loan_details);
            }

            $emp_dash = $vmtsalaryAdvanceService->employeeDashboardLoanAndAdvance($request->loan_type, $users_detail->id);
            $emp_dash = json_encode($emp_dash, true);
            $emp_dash = json_decode($emp_dash, true);
            $emp_dash_data = $emp_dash['original']['data'];


            if ($response['original']['data'] == 0) {
                return [
                    "status" => "success",
                    "message" => "Not eligible",
                    "loan_history" => [],
                    "employee_dashboard" => $emp_dash_data,
                    "eligible_borrow_amount" => []
                ];
            } else if ($response['original']['data'] == 1) {
                return [
                    "status" => "success",
                    "message" => "eligible",
                    "loan_history" => $employee_loan_history,
                    "employee_dashboard" =>  $emp_dash['original']['data'],
                    "eligible_borrow_amount" => $eligible_loan_details
                
                ];

            }
            return $response;
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getEmpLoanAndSalaryAdvance() ] : Error while fetching data ",
                'data' => $e
            ]);
        }
    }
}
