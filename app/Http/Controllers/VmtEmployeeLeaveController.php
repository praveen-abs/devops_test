<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeLeaveService;
use App\Models\User;

class VmtEmployeeLeaveController extends Controller
{


    public function processEmployeeLeaveBalance(Request $request, VmtEmployeeLeaveService $vmtEmployeeLeaveService){

        $leave_type_id = "2";
        $response = array();
        $employees=User::where('is_ssa',0)
                   ->where('active',1)->get('id')->toArray();
        $response=array();
         foreach( $employees as $singleemployee){
             array_push( $response,$vmtEmployeeLeaveService->processEmployeeLeaveBalance($singleemployee['id'], $leave_type_id));
         }




        return $response;
    }
}
