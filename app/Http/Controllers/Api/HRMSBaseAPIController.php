<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VmtBloodGroup;
use App\Models\VmtLeaves;
use App\Models\VmtMaritalStatus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\VmtConfigAppService;

class HRMSBaseAPIController extends Controller
{
    protected function getUserStatus($userId)
    {
        return  User::where('id', $userId)
            ->where('active', 1)
            ->where('is_ssa', 0)
            ->where('is_onboarded', 1)
            ->first();
    }


    public function getAppConfig(Request $request, VmtConfigAppService $serviceVmtConfigAppService){
        return $serviceVmtConfigAppService->getAppConfig();
    }

    public function getFCMToken(Request $request){

        $validator = Validator::make(
            $data = [
                'user_code' => $request->user_code,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try{

            $response = User::where('user_code', $request->user_code)->first()->fcm_token;

            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $response
            ]);

        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getFCMToken() ] ",
                'data' => $e
            ]);
        }
    }

    public function updateFCMToken(Request $request){
        $validator = Validator::make(
            $data = [
                'user_code' => $request->user_code,
                'fcm_token' => $request->fcm_token,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try{

            $query_user = User::where('user_code',$request->user_code)->first();
            $query_user->fcm_token = $request->fcm_token;
            $query_user->save();


            return response()->json([
                'status' => 'success',
                'message' => "FCM Token updated successfully",
                'data' => ""
            ]);

        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ updateFCMToken() ] ",
                'data' => $e
            ]);
        }
    }

    public function getAllUsers(Request $request)
    {


        return User::where('is_ssa', '0')
            ->where('active', '1')
            ->get(['id', 'name', 'user_code']);
    }


    public function getAllBloodgroups(Request $request)
    {
        return VmtBloodGroup::all()->pluck('name');
    }


    public function getAllMaritalStatus(Request $request)
    {
        return VmtMaritalStatus::all()->pluck('name');
    }

    public function getAllLeaveTypes(Request $request)
    {
        return VmtLeaves::all()->pluck('leave_type');
    }


}
