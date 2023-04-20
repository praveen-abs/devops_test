<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use App\Services\VmtProfilePagesService;

class VmtAPIProfilePagesController extends HRMSBaseAPIController
{

    public function fetchEmployeeProfileDetails(Request $request , VmtProfilePagesService $serviceVmtProfilePagesService){

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if($validator->fails()){
            return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
            ]);
        }

        $user_id = User::where('user_code', $request->user_code)->first()->id;
        $data = $serviceVmtProfilePagesService->getEmployeeProfileDetails($user_id);

        return response()->json([
            'status' => 'success',
            'message'=> '',
            'data'   => $data
        ]);
    }
}
