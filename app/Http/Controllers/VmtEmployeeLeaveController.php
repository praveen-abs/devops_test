<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeLeaveService;
use App\Models\User;
use App\Models\VmtLeaves;

class VmtEmployeeLeaveController extends Controller
{


    public function processEmployeeLeaveBalance(Request $request, VmtEmployeeLeaveService $vmtEmployeeLeaveService){

        $accrued_leave_type_id = VmtLeaves::where('is_accrued',1)->get('id');
        $response = array();
        $employees=User::where('is_ssa',0)
                   ->where('active',1)->get('id');

        $response=array();

        foreach ( $accrued_leave_type_id as $leave_type_id){
            $leave_type=array();
            foreach( $employees as $singleemployee){
             array_push( $leave_type,$vmtEmployeeLeaveService->processEmployeeLeaveBalance($singleemployee->id, $leave_type_id->id));
         }
            array_push($response,$leave_type);
            unset($leave_type);
        }





        return $response;
    }
}