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
}
