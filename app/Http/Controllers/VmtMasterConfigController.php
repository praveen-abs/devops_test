<?php

namespace App\Http\Controllers;
use App\Http\Controllers\VmtClientController;

use App\Models\VmtMasterConfig;
use App\Models\VmtClientMaster;
use App\Models\User;
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

}
