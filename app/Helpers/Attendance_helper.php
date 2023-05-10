<?php

use Carbon\Carbon;
use App\Models\VmtEmployeeLeaveBalance;
use App\Models\VmtMasterConfig;
use App\Models\VmtOrgRoles;
use App\Models\User;
use App\Models\VmtWorkShifts;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployee;
use App\Models\VmtBloodGroup;
use App\Models\VmtLeaves;
use App\Models\ConfigPms;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtEmployeesLeavesAccrued;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtOrgTimePeriod;



function getLeaveCountDetails($user_id){

    $leaveTypes = VmtLeaves::all()->keyBy('id');

    $leaveCountDetails_user = VmtEmployeeLeaves::select('leave_type_id', DB::raw("SUM(total_leave_datetime) as leave_availed_count"))
                                                ->where('user_id', $user_id)
                                                ->where('status','Approved')
                                                ->where('status','Pending')
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

// Check whether the given ID is permission or leave type
function isPermissionLeaveType($id){
    $type = VmtLeaves::where('id', $id)->where('leave_type', 'like', '%Permission%');

    if ($type->exists())
        return true;
    else
        return false;
}


function getAllLeaveTypes()
{
    return VmtLeaves::all(['id','leave_type']);
}

/*
    Based on user_time, return LC/EG
    TODO : In Future, add $shift_type parameter

    $attendance_type : check-in/check-out
*/
function checkRegularizationType($user_time, $attendance_type){
    $checkin_grace_time = "0";//TODO : In Future
    $shift_timings = VmtWorkShifts::where('shift_type', 'First Shift')->first();


    if($attendance_type == "check-in"){
        $shiftStartTime  = Carbon::parse($shift_timings->shift_start_time);

        $parsedCheckIn_time  = Carbon::parse($user_time);

        //Check whether checkin done on-time
        if($parsedCheckIn_time->gt($shiftStartTime))
        {
            return "LC";
        }
        else
        {
            return null;
        }

    }

}
function calculateLeaveDetails($user_id,$start_time_period,$end_time_period){
    // TODO:: Which Leave Types we Have to Find Avalied And Balance //Need To Change In Setting Page
   //  $visible_leave_types = array('Casual/Sick Leave'=>1,'Earned Leave'=>2);
      $leave_balance_for_all_types=array();
      $avalied_leaves=array();
    $accrued_leave_types = VmtLeaves::get();

    foreach($accrued_leave_types as $single_leave_types){
        if($single_leave_types->is_finite==1){
            if($single_leave_types->is_carry_forward!=1){
                $total_avalied_leaves = VmtEmployeeLeaves::where('user_id',$user_id)
                                                         ->whereBetween('start_date',[$start_time_period,$end_time_period])
                                                         ->where('leave_type_id',$single_leave_types->id)
                                                         ->whereIn('status',array('Approved','Pending'))
                                                         ->sum('total_leave_datetime');
                $total_accrued = VmtEmployeesLeavesAccrued::where('user_id',$user_id)
                                                          ->whereBetween('date',[$start_time_period,$end_time_period])
                                                          ->where('leave_type_id',$single_leave_types->id)
                                                          ->sum('accrued_leave_count');
                $leave_balance =  $total_accrued -  $total_avalied_leaves;
                $leave_balance_for_all_types[$single_leave_types->leave_type]= $leave_balance;
                $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves ;

             }else if($single_leave_types->is_carry_forward==1){
                $total_avalied_leaves_for_find_balance = VmtEmployeeLeaves::where('user_id',$user_id)
                                                         ->where('leave_type_id',$single_leave_types->id)
                                                         ->whereIn('status',array('Approved','Pending'))
                                                         ->sum('total_leave_datetime');
                $total_accrued = VmtEmployeesLeavesAccrued::where('user_id',$user_id)
                                                         ->where('leave_type_id',$single_leave_types->id)
                                                         ->sum('accrued_leave_count');
                 $total_avalied_leaves = VmtEmployeeLeaves::where('user_id',$user_id)
                                                         ->whereBetween('start_date',[$start_time_period,$end_time_period])
                                                         ->where('leave_type_id',$single_leave_types->id)
                                                         ->whereIn('status',array('Approved','Pending'))
                                                         ->sum('total_leave_datetime');

                $leave_balance =  $total_accrued -    $total_avalied_leaves_for_find_balance;
                $leave_balance_for_all_types[$single_leave_types->leave_type]= $leave_balance;
                $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves ;

             }
        }else{
            $total_avalied_leaves = VmtEmployeeLeaves::where('user_id',$user_id)
                                                         ->whereBetween('start_date',[$start_time_period,$end_time_period])
                                                         ->where('leave_type_id',$single_leave_types->id)
                                                         ->whereIn('status',array('Approved','Pending'))
                                                         ->sum('total_leave_datetime');
            $avalied_leaves[$single_leave_types->leave_type] =  $total_avalied_leaves;
        }


    }
     $leave_details=array('Leave Balance'=>$leave_balance_for_all_types,'Avalied Leaves'=>$avalied_leaves);

    return $leave_details;

}


