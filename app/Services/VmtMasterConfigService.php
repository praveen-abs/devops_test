<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtConfigApps;
use App\Models\VmtEmpConfigApps;
use Illuminate\Support\Facades\Validator;

class VmtMasterConfigService {

    public function SaveAppConfigStatus($is_mobile_app_active,$is_checkin_active,$is_checkout_active,$is_location_capture_active,$is_checkin_selfie_active,$is_checkout_selfie_active,$is_reimbursement_checkout_active, $is_absent_regularization_active,
                                         $is_attendance_regularization_active, $is_leave_apply_active,$is_salary_advance_loan_active,$is_investments_active,$is_pms_active,$is_exit_apply_active)
    {
        $validator = Validator::make(
            $data = [
                'is_mobile_app_active' => $is_mobile_app_active,
                'is_checkin_active' => $is_checkin_active,
                'is_checkout_active' => $is_checkout_active,
                'is_location_capture_active' =>$is_location_capture_active,
                'is_checkin_selfie_active' =>$is_checkin_selfie_active,
                'is_checkout_selfie_active' => $is_checkout_selfie_active,
                'is_reimbursement_checkout_active' => $is_reimbursement_checkout_active,
                'is_absent_regularization_active' => $is_absent_regularization_active,
                'is_attendance_regularization_active' => $is_attendance_regularization_active,
                'is_leave_apply_active' => $is_leave_apply_active,
                'is_salary_advance_loan_active' => $is_salary_advance_loan_active,
                'is_investments_active' => $is_investments_active,
                'is_pms_active' => $is_pms_active,
                'is_exit_apply_active' => $is_exit_apply_active
            ],
            $rules = [
                'is_mobile_app_active' => 'required',
                'is_checkin_active' => 'required|numeric',
                'is_checkout_active' => 'required',
                'is_location_capture_active' => 'required',
                'is_checkin_selfie_active' => 'required',
                'is_checkout_selfie_active' => 'required',
                'is_absent_regularization_active' => 'required|numeric',
                'is_attendance_regularization_active' => 'required|numeric',
                'is_leave_apply_active' => 'required',
                'is_salary_advance_loan_active' => 'required|numeric',
                'is_investments_active' => 'required|numeric',
                'is_pms_active' => 'required|numeric',
                'is_exit_apply_active' => 'required|numeric',
                'is_reimbursement_checkout_active' => 'required|numeric',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{
               $client_id = sessionGetSelectedClientid();
              $app_config_data = VmtConfigApps::where('client_id',$client_id);
              if($app_config_data->exists()){
                $app_config_data =$app_config_data->first();
              }else{
                $app_config_data =new VmtConfigApps;
              }

              $app_config_data->client_id =$client_id;
              $app_config_data->is_mobile_app_active = $is_mobile_app_active;
              $app_config_data->is_checkin_active =$is_checkin_active ;
              $app_config_data->is_checkout_active =$is_checkout_active;
              $app_config_data->is_location_capture_active=$is_location_capture_active;
              $app_config_data->is_checkin_selfie_active=$is_checkin_selfie_active ;
              $app_config_data->is_checkout_selfie_active = $is_checkout_selfie_active ;
              $app_config_data->is_reimbursement_checkout_active = $is_reimbursement_checkout_active;
              $app_config_data->is_absent_regularization_active = $is_absent_regularization_active ;
              $app_config_data->is_attendance_regularization_active =$is_attendance_regularization_active ;
              $app_config_data->is_leave_apply_active =$is_leave_apply_active ;
              $app_config_data->is_salary_advance_loan_active =$is_salary_advance_loan_active ;
              $app_config_data->is_investments_active =$is_investments_active;
              $app_config_data->is_pms_active =$is_pms_active;
              $app_config_data->is_exit_apply_active =$is_exit_apply_active;
              $app_config_data->save();

            $response=([
                    "status" => "success",
                    "message" => "Configuration done successfully",
                ]);

                return $response;

            }
           catch(\Exception $e){

                    return response()->json([

                        "status" => "failure",
                        "message" => "error while Configuration",
                        "data" => $e->getmessage(),

                    ]);

        }
    }
    // public function SaveEmployeeAppConfigStatus($is_mobile_app_active,$is_checkin_active,$is_checkout_active,$is_location_capture_active,$is_checkin_selfie_active,$is_checkout_selfie_active,$is_reimbursement_checkout_active, $is_absent_regularization_active,
    //                                      $is_attendance_regularization_active, $is_leave_apply_active,$is_salary_advance_loan_active,$is_investments_active,$is_pms_active,$is_exit_apply_active)
    public function SaveEmployeeAppConfigStatus($Employee_ConfigData)
    {
        $validator = Validator::make(
            $data = [
                'Employee_ConfigData' => $Employee_ConfigData,
            ],
            $rules = [
                'Employee_ConfigData' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

           foreach ($Employee_ConfigData[0] as $key => $single_config_data) {

                    foreach ($single_config_data as $user_key => $single_user_data) {

                        $user_id =User::where('user_code',$single_user_data)->first()->id;
                        $config_user_id=VmtEmpConfigApps::where('user_id',$user_id);

                        if($config_user_id->exists()){
                            $app_config_data =$config_user_id->first();
                        }else{
                            $app_config_data =new VmtEmpConfigApps;
                        }
                        $app_config_data->user_id =$user_id;
                        $app_config_data->$key = '1' ;
                        $app_config_data->save();

                    }
           }


            $response=([
                    "status" => "success",
                    "message" => "Employee Assigned successfully",
                ]);

                return $response;

            }
           catch(\Exception $e){

                    return response()->json([

                        "status" => "failure",
                        "message" => "error while Configuration",
                        "data" => $e->getmessage() ." line ". $e->getline(),

                    ]);

        }
    }


}
