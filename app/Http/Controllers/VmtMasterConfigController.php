<?php

namespace App\Http\Controllers;
use App\Http\Controllers\VmtClientController;

use App\Models\VmtMasterConfig;
use App\Models\VmtClientMaster;

use Illuminate\Http\Request;

class VmtMasterConfigController extends Controller
{
    public function index(Request $request) {
        $queryData = VmtMasterConfig::all(['config_name','config_value']);

        $data = $queryData->mapWithKeys(function ($item, $key) {
            return [$item['config_name'] => $item['config_value']];
        });
         
        //$kvData->all();
        //dd($kvData);

        return view('vmt_config_master', compact('data'));
    }

    public function store(Request $request) {

        $input = $request->all();
        //remove unwanted array fields
        unset($input['_token']);


        foreach($input as $key => $value)
        {
            //dd($key);
            $temp = VmtMasterConfig::where('config_name',$key)->update(['config_value' => $value]);

            //Update client code
            if($key == "client_code")         
            {   
                $clientData  = VmtClientMaster::first()->update(['client_code' => $value]);
            }

        }

        //dd($queryData);
        //update in db
        //VmtMasterConfig::where()
        return redirect()->back();

    }

}