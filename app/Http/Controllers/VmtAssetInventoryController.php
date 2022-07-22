<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtAssetInventory;

class VmtAssetInventoryController extends Controller
{
    public function index(Request $request){
        $assetInventories  =json_encode( VmtAssetInventory::all());
        return view('vmt_assetInventory', compact('assetInventories'));
    }

    public function fetchAll(Request $request)
    {
        return json_encode( VmtAssetInventory::all());

    }

    public function addAsset(Request $request)
    {
        //dd($request);
        $t_asset = new VmtAssetInventory;

        $t_asset->asset_name = $request->asset_name;
        $t_asset->asset_type = $request->asset_type;
        $t_asset->serial_number = $request->serial_number;
        $t_asset->warranty = $request->warranty;
        $t_asset->vendor = $request->vendor;
        $t_asset->assignee = $request->assignee;
        $t_asset->assigned_date = $request->assigned_date;
        $t_asset->asset_status = $request->asset_status;
        $t_asset->invoice = $request->invoice;
        

        $t_asset->save();

        return "Saved";

    }   

    public function deleteAsset(Request $request)
    {
        $t_asset = VmtAssetInventory::find($request->id);
        $t_asset->delete();
        if ($t_asset) {
            return "200";
        } else {
            return "400";
        }

    }

    public function updateAsset(Request $request)
    {
        $t_asset = VmtAssetInventory::find($request->id);
        $t_asset->asset_name = $request->asset_name;
        $t_asset->asset_type = $request->asset_type;
        $t_asset->serial_number = $request->serial_number;
        $t_asset->warranty = $request->warranty;
        $t_asset->vendor = $request->vendor;
        $t_asset->assignee = $request->assignee;
        $t_asset->assigned_date = $request->assigned_date;
        $t_asset->invoice = $request->invoice;
        $t_asset->save();
        if ($t_asset) {
            return "200";
        } else {
            return "400";
        }

    }
}
