<?php
use App\Models\VmtEmployeeLeaveBalance;
use App\Models\VmtMasterConfig;
use App\Models\VmtOrgRoles;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployee;
use App\Models\VmtBloodGroup;
use App\Models\VmtLeaves;
use App\Models\ConfigPms;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeeOfficeDetails;



function getLeaveCountDetails($user_id){

    $leaveTypes = VmtLeaves::all()->keyBy('id');

    $leaveCountDetails_user = VmtEmployeeLeaves::select('leave_type_id', DB::raw("SUM(total_leave_datetime) as leave_availed_count"))
                                                ->where('user_id', $user_id)
                                                ->groupBy('leave_type_id')->get();

    //Add leave names to the array
    foreach($leaveCountDetails_user as $singleData){
        $singleData->leave_name = $leaveTypes[$singleData->leave_type_id]["leave_type"];
    }

    //Create map
    $response = $leaveCountDetails_user->mapWithKeys(function ($item, $key) {
        return [$item['leave_name'] => $item];
    });

    return $response;
}

function getPermissionLeaveTypeIDs(){
    return VmtLeaves::where('leave_type','like','%Permission%')->pluck('id');
}



