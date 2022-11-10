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

    $leaveCountDetails_user = VmtEmployeeLeaves::where('user_id', $user_id)->groupBy('leave_type_id');

   // dd($leaveCountDetails_user);

    // $response = [
    //     "leave_name" => '';

    // ];

    return '';
}



