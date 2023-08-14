<?php

namespace App\Http\Controllers;
use App\Http\Controllers\VmtClientController;

use App\Models\VmtMasterConfig;
use App\Models\VmtClientMaster;
use App\Models\User;
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

        return view('vmt_config_mobile_settings');

    }
    public function  SaveAppConfigStatus(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response = $serviceVmtMasterConfigService->SaveAppConfigStatus($request->is_mobile_app_active,
        $request->is_checkin_active,
        $request->is_checkout_active,
        $request->is_location_capture_active,
        $request->is_checkin_selfie_active,
        $request->is_checkout_selfie_active,
        $request->is_reimbursement_checkout_active,
        $request->is_absent_regularization_active,
        $request->is_attendance_regularization_active,
        $request->is_leave_apply_active,
        $request->is_salary_advance_loan_active,
        $request->is_investments_active,
        $request->is_pms_active,
        $request->is_exit_apply_active);

        return $response;

    }

    public function SaveEmployeeAppConfigStatus(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){
        dd($request->all());
        $response = $serviceVmtMasterConfigService->SaveEmployeeAppConfigStatus($request->all());


        return $response;

    }
    public function getAllDropdownFilterSetting(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response =getAllDropdownFilterSetting();


        return $response;

    }
    public function get_empolyees_filter_data(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response = get_empolyees_filter_data($request->department_id, $request->designation, $request->work_location, $request->client_name);


        return $response;

    }
    public function GetAllEmpModuleActiveStatus(Request $request,VmtMasterConfigService $serviceVmtMasterConfigService){

        $response = $serviceVmtMasterConfigService->GetAllEmpModuleActiveStatus($request->user_code, $request->module_type);


        return $response;

    }



}
