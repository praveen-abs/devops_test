<?php

namespace App\Http\Controllers;
use App\Http\Controllers\VmtClientController;

use App\Models\VmtMasterConfig;
use App\Models\VmtClientMaster;
use App\Models\User;
use App\Models\VmtAppSubModuleslink;
use App\Models\VmtAppSubModules;
use App\Models\VmtAppModules;
use App\Models\VmtEmpSubModules;
use App\Models\VmtClientSubModules;
use App\Models\VmtEmpAssignSalaryAdvSettings;


use App\Services\VmtMasterConfigService;
use Illuminate\Http\Request;

class VmtMasterConfigController extends Controller
{
    public function index(Request $request) {
        //Fetch all master configs
        $masterData = VmtMasterConfig::all(['config_name','config_value']);
        $employees_hr = User::where('is_ssa','0')->whereIn('org_role',['3','2'])->
                        select('id','name','user_code')
                        ->get();

        //$employees_hr = json_encode($employees_hr);
        //dd($employees_hr);

        //Convert to KV pair
        $data = $masterData->mapWithKeys(function ($item, $key) {
            return [$item['config_name'] => $item['config_value']];
        });


        //dd($data);

        return view('vmt_config_master', compact('data','employees_hr'));
    }

    public function store(Request $request) {

        $input = $request->all();
        //remove unwanted array fields
        unset($input['_token']);


        foreach($input as $key => $value)
        {
            //dd($key);

            //Update client code
            if($key == "client_code")
            {
                $clientData  = VmtClientMaster::first()->update(['client_code' => $value]);
            }
            else
            {
                $temp = VmtMasterConfig::where('config_name',$key)->update(['config_value' => $value]);
            }

        }

        //dd($queryData);
        //update in db
        //VmtMasterConfig::where()
        return redirect()->back();

    }

    public function getMaxClientCode()
    {
        //Get the most recent employee emp_code from USERS table

        //Increment it

        //return the value

    }

    public function showMobileSettingsPage(Request $request){

        return view('vmt_mobile_settings_page');

    }

    public function  saveAppConfigStatus(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response = $serviceVmtMasterConfigService->saveAppConfigStatus($request->module_id,$request->status);

        return response()->json($response);

    }

    public function SaveEmployeeAppConfigStatus(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){


        $response = $serviceVmtMasterConfigService->SaveEmployeeAppConfigStatus($request->app_sub_modules_link_id ,$request->selected_employees_user_code);


        return $response;

    }

    public function fetchMobileModuleData( Request $request ,VmtMasterConfigService $serviceVmtMasterConfigService){

        try{
        $client_id =$request->client_id ;

        $module_id =VmtAppModules::where('module_name',"Mobile App Settings")->pluck('id');

        $mobile_settings_data =VmtAppSubModuleslink::join("vmt_app_sub_modules","vmt_app_sub_modules.id","=","vmt_app_sub_modules_links.sub_module_id")
                                                    ->join("vmt_app_modules","vmt_app_modules.id","=","vmt_app_sub_modules_links.module_id")
                                                    ->join("vmt_client_sub_modules","vmt_client_sub_modules.app_sub_module_link_id","=","vmt_app_sub_modules_links.id")
                                                    ->where("vmt_app_sub_modules_links.module_id","=",$module_id)
                                                    ->where("vmt_client_sub_modules.client_id","=",$client_id)
                                                    ->get(["vmt_client_sub_modules.app_sub_module_link_id as id",
                                                                    "vmt_app_sub_modules_links.module_id",
                                                                    "vmt_app_sub_modules_links.sub_module_id",
                                                                    "vmt_app_modules.module_name",
                                                                    "vmt_app_sub_modules.sub_module_name",
                                                                    "vmt_client_sub_modules.status",
                                                                    "vmt_client_sub_modules.client_id"]);


        foreach ($mobile_settings_data as $key => $single_value) {

             $emp_data =VmtEmpSubModules::where("client_id",$single_value['client_id'])->where("app_sub_module_link_id",$single_value['id'])->pluck('user_id');
             $emp_data=$emp_data->toarray();

             if(!empty($emp_data)){

                $emp_count =count($emp_data);
             }else{
                $emp_count=0;
             }
            $mobile_settings_data[$key]['employee_count'] =  $emp_count;
        }


 // $employee_count =

         return response()->json([
                "status" => "success",
                "message" => "Data fetch successfully",
                "data" => $mobile_settings_data,
            ]);

        }catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "error while fetching data",
                "data" => $e->getmessage(),

            ]);

        }

    }

    public function getAllDropdownFilterSetting(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response = getAllDropdownFilterSetting();
        return $response;

    }
    public function get_employees_filter_data(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $filtered_data = $this->employees_filter_data($request->department_id , $request->designation, $request->work_location, $request->client_name,$request->sub_module_id);

        foreach ($filtered_data as $key => $single_value) {
             $emp_module_status =VmtEmpSubModules::where('client_id',sessionGetSelectedClientid())->where('app_sub_module_link_id',$request->sub_module_id)->where('user_id', $single_value['id']);
             if($emp_module_status->exists()){
                $filtered_data[$key]['status'] = $emp_module_status->first()->status;
             }else{
                $filtered_data[$key]['status'] = 0;
             }
        }


        return $filtered_data;

    }
   public function employees_filter_data($department_id, $designation, $work_location, $client_name)
    {

        try {

            $select_employee = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->join('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                ->join('vmt_client_master', 'vmt_client_master.id', '=', 'users.client_id')
                ->where('process', '<>', 'S2 Admin')
                ->select(
                    'users.id',
                    'users.name',
                    'users.user_code',
                    'vmt_department.name as department_name',
                    'vmt_employee_office_details.designation',
                    'vmt_employee_office_details.work_location',
                    'vmt_client_master.client_name',
                    'vmt_client_master.id as client_id',
                );

            if (!empty($department_id)) {
                $select_employee = $select_employee->where('department_id', $department_id);
            }
            if (!empty($designation)) {
                $select_employee = $select_employee->where('designation', $designation);
            }
            if (!empty($work_location)) {
                $select_employee = $select_employee->where('work_location', $work_location);
            }
            if (!empty($client_name)) {
                $select_employee = $select_employee->where('client_id', $client_name);
            }
            // dd($select_employee->get());
            $assigned_emp_user_ids = VmtEmpAssignSalaryAdvSettings::pluck('user_id');
            if (!empty($assigned_emp_user_ids)) {
                $assigned_emp_user_codes = array();
                foreach ($assigned_emp_user_ids as $single_id) {
                    array_push($assigned_emp_user_codes, User::where('id', $single_id)->first()->user_code);
                }
                return  $select_employee->whereNotIn('user_code',  $assigned_emp_user_codes)->get();
            }
            $employee_data = $select_employee->get();


             return $employee_data->toarray();

        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error fetching the employee",
                "data" => $e,
            ]);
        }
    }
    public function GetAllEmpModuleActiveStatus(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response = $serviceVmtMasterConfigService->GetAllEmpModuleActiveStatus($request->user_code, $request->module_type);


        return $response;

    }



}
