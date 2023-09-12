<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtConfigApps;
use App\Models\VmtAppModules;
use App\Models\Department;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\State;
use App\Models\VmtClientModules;
use App\Models\VmtClientSubModules;
use App\Models\VmtAppSubModuleslink;
use App\Models\VmtAppSubModules;
use App\Models\VmtEmpSubModules;
use App\Models\VmtEmpConfigApps;
use Illuminate\Support\Facades\Validator;

// VmtAppPermissions
class VmtAppPermissionsService
{


    public function updateClientModuleStatus($client_id, $module_id, $status)
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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {


            $app_config_data = VmtClientSubModules::where('client_id', $client_id)->where("app_sub_module_link_id", $module_id);

            if ($app_config_data->exists()) {

                $app_config_data = $app_config_data->first();
                $app_config_data->status = $status;
                $app_config_data->save();

                $response = ([
                    "status" => "success",
                    "message" => "Configuration done successfully",
                    "data" => "",
                ]);
            } else {

                $response = ([
                    "status" => "failure",
                    "message" => "data not found",
                    "data" => "",
                ]);
            }

            return $response;
        } catch (\Exception $e) {

            return $response = ([

                "status" => "failure",
                "message" => "error while Configuration",
                "data" => $e->getmessage(),

            ]);
        }
    }

    /*
        Used to update single or multiple employees permission for a given module .

        $selected_employees_user_code : Contains user_code and their status values.
    */

    public function updateEmployeesPermissionStatus($client_id, $app_sub_modules_link_id, $selected_employees_user_code)
    {
        $validator = Validator::make(
            $data = [
                'app_sub_modules_link_id' => $app_sub_modules_link_id,
                'selected_employees_user_code' => $selected_employees_user_code,
            ],
            $rules = [
                'app_sub_modules_link_id' => 'required',
                'selected_employees_user_code' => 'nullable',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {

            $drop_emp_app_config_data = VmtEmpSubModules::where("app_sub_module_link_id", $app_sub_modules_link_id)->where('client_id', $client_id);
            $drop_emp_app_config_data->delete();

            foreach ($selected_employees_user_code as $user_key => $single_user_code) {

                $save_emp_app_config_data = new VmtEmpSubModules;
                $save_emp_app_config_data->client_id = $single_user_code['client_id'];
                $save_emp_app_config_data->user_id = $single_user_code['id'];
                $save_emp_app_config_data->status = $single_user_code['isEnabled'];
                $save_emp_app_config_data->app_sub_module_link_id = $app_sub_modules_link_id;
                $save_emp_app_config_data->save();
            }


            $response = ([
                "status" => "success",
                "message" => "Employee Assigned successfully",
            ]);

            return $response;
        } catch (\Exception $e) {

            return response()->json([

                "status" => "failure",
                "message" => "error while Configuration",
                "data" => $e->getmessage() . " line " . $e->getline(),

            ]);
        }
    }

    public function getEmployeeAllModulePermissionsDetails($user_code)
    {

        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                'user_code' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {

            $user_data = User::where('user_code', $user_code)->first();

         $module_data = VmtAppModules::get('id')->toarray();
        // $sub_module_data = VmtAppSubModuleslink::get('id')->toarray();




            $single_emp_config_data = array();
            $i = 0;
            foreach ($module_data as $key => $single_module_data) {


                $employee_config_details = VmtAppSubModuleslink::join("vmt_app_sub_modules", "vmt_app_sub_modules.id", "=", "vmt_app_sub_modules_links.sub_module_id")
                    ->join("vmt_app_modules", "vmt_app_modules.id", "=", "vmt_app_sub_modules_links.module_id")
                    ->join("vmt_client_sub_modules", "vmt_client_sub_modules.app_sub_module_link_id", "=", "vmt_app_sub_modules_links.id")
                    ->where("vmt_app_sub_modules_links.module_id", "=", $single_module_data['id'])
                    ->where("vmt_client_sub_modules.client_id", "=", $user_data->client_id)
                    ->get([
                        "vmt_app_sub_modules_links.id as id",
                        "vmt_app_modules.module_name",
                        "vmt_app_sub_modules.sub_module_name",
                        "vmt_client_sub_modules.status as sub_module_status"
                    ])->toarray();


                array_push($single_emp_config_data, $employee_config_details);
            }

            $employee_all_modules_details = array();
            $i = 0;
            foreach ($single_emp_config_data as $module_key => $single_module_data) {

                foreach ($single_module_data as $subModule_key => $single_subModule_data) {

                    $employee_all_modules_details[$i]['module_name'] = $single_subModule_data["module_name"];

                for($j=0;$j<count($single_module_data);$j++){

                    $employee_all_modules_details[$i]['sub_module_details'][$j]['sub_module_name'] = $single_module_data[$j]["sub_module_name"];

                    $employee_all_modules_details[$i]['sub_module_details'][$j]['sub_module_status'] = $single_module_data[$j]["sub_module_status"];

                    $emp_module_status = VmtEmpSubModules::where('user_id', $user_data->id)->where('app_sub_module_link_id', $single_subModule_data['id']);

                    if ($emp_module_status->exists()) {

                        $employee_all_modules_details[$i]['sub_module_details'][$j]['employee_status'] = $emp_module_status->first()->status;
                    } else {

                        $employee_all_modules_details[$i]['sub_module_details'][$j]['employee_status'] = '0';
                    }
                    }
                }
                $i++;
            }


            return response()->json([
                "status" => "success",
                "message" => "Employee config data fetch successfully ",
                "data" => $employee_all_modules_details,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error fetching employee Config data",
                "data" => $e->getmessage() . " error_line " . $e->getline(),
            ]);
        }
    }

    /*
        Get all the module permissions for the given client.
        Dont fetch the employee level data

        Currently used in Web

    */
    public function getClient_AllModulePermissionDetails($client_id)
    {

        $validator = Validator::make(
            $data = [
                'client_id' => $client_id,
            ],
            $rules = [
                'client_id' => 'required|exists:vmt_client_master,id',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }
        try {


            $module_id = VmtAppModules::get('id')->toarray();

            $all_modules_config_data = array();

            foreach ($module_id as $key => $single_module_id) {
                $all_modules_data = VmtAppSubModuleslink::join("vmt_app_sub_modules", "vmt_app_sub_modules.id", "=", "vmt_app_sub_modules_links.sub_module_id")
                    ->join("vmt_app_modules", "vmt_app_modules.id", "=", "vmt_app_sub_modules_links.module_id")
                    ->join("vmt_client_sub_modules", "vmt_client_sub_modules.app_sub_module_link_id", "=", "vmt_app_sub_modules_links.id")
                    ->where("vmt_app_sub_modules_links.module_id", "=", $single_module_id['id'])
                    ->where("vmt_client_sub_modules.client_id", "=", $client_id)
                    ->get([
                        "vmt_app_modules.module_name",
                        "vmt_app_sub_modules.sub_module_name",
                        "vmt_client_sub_modules.status as sub_module_status"
                    ])->toarray();


                array_push($all_modules_config_data, $all_modules_data);
            }

            $all_modules_settings_details = array();
            $i = 0;
            foreach ($all_modules_config_data as $module_key => $single_module_data) {

                foreach ($single_module_data as $subModule_key => $single_subModule_data) {
                    $all_modules_settings_details[$i]['module_name'] = $single_subModule_data["module_name"];
                    $all_modules_settings_details[$i]['sub_module_name'][$single_subModule_data["sub_module_name"]] = $single_subModule_data["sub_module_status"];
                }
                $i++;
            }

            return response()->json([
                "status" => "success",
                "message" => "Data fetch successfully",
                "role" => auth()->user()->org_role,
                "data" => $all_modules_settings_details,
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "status" => "failure",
                "message" => "error while fetching data",
                "data" => $e->getmessage() . " error_line " . $e->getline(),

            ]);
        }
    }

    /*
        Used to show in Mobile Settings page.
        Fetch only the MOBILE_SETTINGS module sub-module details.

                Currently used in Web (Mobile Settings page)

    */

    /*
        Get all the sub-module permissions for a given client and module id

    */
    //getClientPermissions
    public function getClient_MobileModulePermissionDetails($client_id, $module_id)
    {

        $validator = Validator::make(
            $data = [
                'client_id' => $client_id,
                'module_id' => $module_id,
            ],
            $rules = [
                'client_id' => 'required|exists:vmt_client_master,id',
                'module_id' => 'required|exists:vmt_app_modules,id',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }
        try {




            $mobile_settings_data = VmtAppSubModuleslink::join("vmt_app_sub_modules", "vmt_app_sub_modules.id", "=", "vmt_app_sub_modules_links.sub_module_id")
                ->join("vmt_app_modules", "vmt_app_modules.id", "=", "vmt_app_sub_modules_links.module_id")
                ->join("vmt_client_sub_modules", "vmt_client_sub_modules.app_sub_module_link_id", "=", "vmt_app_sub_modules_links.id")
                ->where("vmt_app_sub_modules_links.module_id", "=", $module_id)
                ->where("vmt_client_sub_modules.client_id", "=", $client_id)
                ->get([
                    "vmt_client_sub_modules.app_sub_module_link_id as id",
                    "vmt_app_sub_modules_links.module_id",
                    "vmt_app_sub_modules_links.sub_module_id",
                    "vmt_app_modules.module_name",
                    "vmt_app_sub_modules.sub_module_name",
                    "vmt_client_sub_modules.status",
                    "vmt_client_sub_modules.client_id"
                ]);


            foreach ($mobile_settings_data as $key => $single_value) {

                $emp_data = VmtEmpSubModules::where("client_id", $single_value['client_id'])->where("app_sub_module_link_id", $single_value['id'])->pluck('user_id');
                $emp_data = $emp_data->toarray();

                if (!empty($emp_data)) {

                    $emp_count = count($emp_data);
                } else {
                    $emp_count = 0;
                }
                $mobile_settings_data[$key]['employee_count'] =  $emp_count;
            }

            return response()->json([
                "status" => "success",
                "message" => "Data fetch successfully",
                "data" => $mobile_settings_data,
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "status" => "failure",
                "message" => "error while fetching data",
                "data" => $e->getmessage(),

            ]);
        }
    }


    function getAllDropdownFilterSetting()
    {

        $current_user_role = auth()->user()->org_role;

        $option_all = ['id' => 0, 'name' => 'All'];

        try {

            $queryGetDept = Department::select('id', 'name')->get();
            $queryGetDept->push($option_all);

            $queryGetDesignation = VmtEmployeeOfficeDetails::select('designation')->where('designation', '<>', 'S2 Admin')->whereNotNull("designation")->distinct()->get();
            $queryGetDesignation->push($option_all);

            $queryGetLocation = VmtEmployeeOfficeDetails::select('work_location')->whereNotNull("work_location")->distinct()->get();
            $queryGetLocation->push($option_all);

            $queryGetstate = State::select('id', 'state_name')->distinct()->get();
            $queryGetstate->push($option_all);

            if (($current_user_role == 1 || $current_user_role == 2 ) && sessionGetSelectedClientid()=="1") {

                $queryGetlegalentity = VmtClientMaster::get(['id', 'client_name']);
            }else{
                $queryGetlegalentity = VmtClientMaster::where('id',sessionGetSelectedClientid())->get(['id', 'client_name']);
            }


            $getsalary = ["department" => $queryGetDept, "designation" => $queryGetDesignation, "location" => $queryGetLocation, "state" => $queryGetstate, "legalEntity" => $queryGetlegalentity];


            return response()->json($getsalary);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error fetching the dropdown value",
                "data" => $e,
            ]);
        }
    }
}
