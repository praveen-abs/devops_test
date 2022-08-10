<?php

namespace App\Http\Controllers;
use App\Http\Controllers\VmtClientController;

use App\Models\VmtMasterConfig;
use App\Models\VmtClientMaster;

use Illuminate\Http\Request;

class VmtMasterConfigController extends Controller
{
    public function index(Request $request) {
        //Fetch all master configs
        $masterData = VmtMasterConfig::all(['config_name','config_value']);


        //Convert to KV pair
        $data = $masterData->mapWithKeys(function ($item, $key) {
            return [$item['config_name'] => $item['config_value']];
        });


        //Get Client-code
        $clientCode = VmtClientMaster::first(['client_code'])->toArray();
        $data['client_code'] = $clientCode['client_code'];

        //dd($data);

        return view('vmt_config_master', compact('data'));
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

}
