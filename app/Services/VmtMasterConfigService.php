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
                'module_name' => $module_name,
                'status' => $status,
            ],
            $rules = [
                'module_name' => 'required',
                'status' => 'required',
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
              $app_config_data->module_name = $status;
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
    public function SaveEmployeeAppConfigStatus($module_name,$user_code)
    {
        $validator = Validator::make(
            $data = [
                'module_name' => $module_name,
                'user_code' => $user_code,
            ],
            $rules = [
                'module_name' => 'required',
                'user_code' => 'required',
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



                    foreach ($user_code as $user_key => $single_user_code) {

                        $user_id =User::where('user_code',$single_user_code)->first()->id;
                        $config_user_id=VmtEmpConfigApps::where('user_id',$user_id);

                        if($config_user_id->exists()){
                            $app_config_data =$config_user_id->first();
                        }else{
                            $app_config_data =new VmtEmpConfigApps;
                        }
                        $app_config_data->user_id =$user_id;
                        $app_config_data->$module_name = '1' ;
                        $app_config_data->save();

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


    public function GetAllEmpModuleActiveStatus($user_code,$module_type){


        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'module_type' => $module_type,
            ],
            $rules = [
                'user_code' => 'required',
                'module_type' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

                     $user_data =User::where('user_code',$user_code)->first();

                     $module_active_status =VmtConfigApps::where('client_id', $user_data->client_id)->where($module_type,'1')->first();

                     if(!empty($module_active_status)){

                        $config_user=VmtEmpConfigApps::where('user_id',$user_data->id)->where($module_type,'1')->first();

                        if(!empty($config_user)){
                            return true;
                        }else{
                            return false;
                        }
                     }else{

                        return false;
                      }


            }
           catch(\Exception $e){

                    return response()->json([

                        "status" => "failure",
                        "message" => "error while getData",
                        "data" => $e->getmessage() ." line ". $e->getline(),

                    ]);

        }
    }


}
