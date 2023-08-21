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
        $response = $vmtsalaryAdvanceService->isEligibleForLoanAndAdvance($request->loan_type,$users_detail->id,$users_detail->client_id);
        $response= json_encode($response);
        $response= json_decode($response,true);
        if($response['original']['data']==1){
          $emp_salary_advnce = $vmtsalaryAdvanceService->employeeDashboardLoanAndAdvance($request->loan_type,$users_detail->id);  
          $emp_loan_history = $vmtsalaryAdvanceService-> EmployeeLoanHistory($users_detail->id,$request->loan_type); 
      dd( $emp_loan_history) ;
        }
       return $response;

    }
}
