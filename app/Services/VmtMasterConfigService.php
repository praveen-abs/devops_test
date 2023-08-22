<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtConfigApps;
use App\Models\VmtClientModules;
use App\Models\VmtClientSubModules;
use App\Models\VmtAppSubModuleslink;
use App\Models\VmtAppSubModules;
use App\Models\VmtEmpSubModules;
use App\Models\VmtEmpConfigApps;
use Illuminate\Support\Facades\Validator;

class VmtMasterConfigService {

    public function SaveAppConfigStatus($module_id,$status)
    {
        $validator = Validator::make(
            $data = [
                'module_id' => $module_id,
                'status' => $status,
            ],
            $rules = [
                'module_id' => 'required',
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

                  $app_config_data = VmtClientSubModules::where('client_id',$client_id)->where("app_sub_module_link_id",$module_id);

                    if($app_config_data->exists()){

                            $app_config_data =$app_config_data->first();
                            $app_config_data->status = $status;
                            $app_config_data->save();

                            $response=([
                                "status" => "success",
                                "message" => "Configuration done successfully",
                                "data" => "",
                            ]);

                    }else{

                        $response=([
                            "status" => "failure",
                            "message" => "data not found",
                            "data" => "",
                        ]);

                    }

                return $response;

            }
           catch(\Exception $e){

                    return $response =([

                        "status" => "failure",
                        "message" => "error while Configuration",
                        "data" => $e->getmessage(),

                    ]);

        }
    }
    // public function SaveEmployeeAppConfigStatus($is_mobile_app_active,$is_checkin_active,$is_checkout_active,$is_location_capture_active,$is_checkin_selfie_active,$is_checkout_selfie_active,$is_reimbursement_checkout_active, $is_absent_regularization_active,
    //                                      $is_attendance_regularization_active, $is_leave_apply_active,$is_salary_advance_loan_active,$is_investments_active,$is_pms_active,$is_exit_apply_active)
    public function SaveEmployeeAppConfigStatus($app_sub_modules_link_id,$selected_employees_user_code)
    {
        $validator = Validator::make(
            $data = [
                'app_sub_modules_link_id' => $app_sub_modules_link_id,
                'selected_employees_user_code' => $selected_employees_user_code,
            ],
            $rules = [
                'app_sub_modules_link_id' => 'required',
                'selected_employees_user_code' => 'required',
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
                 $client_id =sessionGetSelectedClientid();
                    $drop_emp_app_config_data =VmtEmpSubModules::where("app_sub_module_link_id",$app_sub_modules_link_id)->where('client_id',$client_id);
                    $drop_emp_app_config_data->delete();

                    foreach ($selected_employees_user_code as $user_key => $single_user_code) {

                        $user_data = User::where('user_code',$single_user_code)->first();
                        $save_emp_app_config_data =new VmtEmpSubModules;
                        $save_emp_app_config_data->client_id =$client_id;
                        $save_emp_app_config_data->user_id =$single_user_code['id'];
                        $save_emp_app_config_data->status =$single_user_code['isEnabled'];
                        $save_emp_app_config_data->app_sub_module_link_id =$app_sub_modules_link_id ;
                        $save_emp_app_config_data->save();

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

    public function getEmployeesMobileSettingsData($user_code){

        $user_date = User::where('user_code',$user_code)->first();
   
        $sub_module_data =VmtAppSubModuleslink::get();

        $moile_settings_data = array();
     $i=0;
        foreach ( $sub_module_data as $key => $single_module_data) {

            $module_name =VmtAppSubModules::where("id",$single_module_data['sub_module_id'])->first();
            $client_module_status =VmtClientSubModules::where('client_id',$user_date->client_id)->where('app_sub_module_link_id',$single_module_data['id'])->first();

            if($client_module_status->exists()){
                $moile_settings_data[$i]['module_name'] =$module_name->sub_module_name;
                $moile_settings_data[$i]['module_status'] =$client_module_status->status;
                $emp_module_status =VmtEmpSubModules::where('client_id',$user_date->client_id)->where('user_id',$user_date->id )->where('app_sub_module_link_id',$single_module_data['id']);
                if($emp_module_status->exists()){
                 $moile_settings_data[$i]['employee_status'] =$emp_module_status->first()->status;
                }else{
                    $moile_settings_data[$i]['employee_status'] =0;
                }
            }
      $i++; 
               
        }
       
        
        return $moile_settings_data;

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
