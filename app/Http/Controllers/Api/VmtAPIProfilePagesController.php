<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;

use App\Services\VmtProfilePagesService;

class VmtAPIProfilePagesController extends HRMSBaseAPIController
{

    public function updateProfilePicture(Request $request, VmtProfilePagesService $serviceProfilePagesService){
        return $serviceProfilePagesService->updateProfilePicture($request->user_code, $request->file_object);
    }

    public function getProfilePicture(Request $request, VmtProfilePagesService $serviceProfilePagesService){
        return $serviceProfilePagesService->getProfilePicture($request->user_code);
    }

    public function fetchEmployeeProfileDetails(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService)
    {

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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        $user_id = User::where('user_code', $request->user_code)->first()->id;
        $data = $serviceVmtProfilePagesService->getEmployeeProfileDetails($user_id);

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data'   => $data
        ]);
    }

    public function updateEmployeeGeneralInformation(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "birthday" => 'required',
                "gender"  => 'required',
                "marital_status"  => 'required|exists:vmt_marital_status,name',
                "blood_group"  => 'required|exists:vmt_bloodgroup,name',
                "physically_challenged" => 'required',
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


        $response = $serviceVmtProfilePagesService->updateEmployeeGeneralInformation(
            user_code: $request->user_code,
            birthday: $request->birthday,
            gender: $request->gender,
            marital_status: $request->marital_status,
            blood_group: $request->blood_group,
            phy_challenged: $request->phy_challenged
        );

        return $response;
    }

    public function updateEmployeeContactInformation(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "personal_email" => 'required|email:rfc,dns',
                "office_email"  => 'required|email:rfc,dns',
                "mobile_number"  => 'required',
                "current_address_line_1"  => 'required',
                "current_address_line_2"  => 'required',
                "permanent_address_line_1"  => 'required',
                "permanent_address_line_2"  => 'required',


            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "email" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $response = $serviceVmtProfilePagesService->updateEmployeeContactInformation(
            user_code: $request->user_code,
            personal_email: $request->personal_email,
            office_email: $request->office_email,
            mobile_number: $request->mobile_number,
            current_address_line_1: $request->current_address_line_1,
            current_address_line_2: $request->current_address_line_1,
            permanent_address_line_1: $request->permanent_address_line_1,
            permanent_address_line_2: $request->permanent_address_line_2,
        );

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data'   => $response
        ]);
    }
    public function addEmployeeFamilyDetails(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',

                "name" => 'required',
                "relationship"  => 'required',
                "dob"  => 'required',
                "phone_number"  => 'required',




            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "email" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $response = $serviceVmtProfilePagesService->addFamilyDetails(
            user_code: $request->user_code,
            name: $request->name,
            relationship: $request->relationship,
            dob: $request->dob,
            phone_number: $request->phone_number


        );

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data'   => $response
        ]);
    }
    public function updateEmployeeFamilyDetails(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code', //not used now
                "record_id" => 'required',
                "name" => 'required',
                "relationship"  => 'required',
                "dob"  => 'required',
                "phone_number"  => 'required',




            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "email" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $response = $serviceVmtProfilePagesService->updateFamilyDetails(
            record_id: $request->record_id,
            name: $request->name,
            relationship: $request->relationship,
            dob: $request->dob,
            phone_number: $request->phone_number


        );

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data'   => $response
        ]);
    }
    public function deleteEmployeeFamilyDetails(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code', //not used now
                "record_id" => 'required',




            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "email" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $response = $serviceVmtProfilePagesService->deleteFamilyDetails(
            user_code:$request->user_code,
            record_id: $request->record_id,



        );

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data'   => $response
        ]);
    }
}
