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
        $user_id = User::where('user_code', $request->user_code)->first()->id;
        
        $response = $vmtsalaryAdvanceService->isEligibleForLoanAndAdvance($request->loan_type, $user_id);
        return $response;
    }
}
