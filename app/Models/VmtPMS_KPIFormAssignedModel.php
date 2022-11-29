<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VmtPMS_KPIFormAssignedModel extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'vmt_pms_kpiform_assigned';

    function getPmsKpiFormReviews(){
        return $this->hasMany(VmtPMS_KPIFormReviewsModel::class,'vmt_pms_kpiform_assigned_id');
    }

    function getPmsKpiFormColumnDetails(){
        return $this->belongsTo(VmtPMS_KPIFormModel::class,'vmt_pms_kpiform_id');
    }


    function getUserDetails($assignersId){
        $userEmpNames = [];
        $userEmpNos = [];
        // $explodedAssignerId = explode(',',$assignersId);
        // if(count($explodedAssignerId)){
        //     foreach($explodedAssignerId as $user){
        //         $userDetails = User::find($user);
        //         if(!empty($userDetails)){
        //             $userEmpNames[] = $userDetails->name;
        //             $empDetails = VmtEmployee::where('userid',$user)->first();
        //             if(!empty($empDetails)){

        //                 $userEmpNos[] = $empDetails->emp_no;
        //             }
        //         }
        //     }
        // }
        $userDetails = User::find($assignersId);
        if(!empty($userDetails)){
            $userEmpNames[] = $userDetails->name;
            $empDetails = VmtEmployee::where('userid',$assignersId)->first();
            if(!empty($empDetails)){

                $userEmpNos[] = $empDetails->emp_no;
            }
        }
        $userEmpNames = implode(',',$userEmpNames);
        $userEmpNos = implode(',',$userEmpNos);
        $result = [
            'userNames' =>$userEmpNames,
            'userEmpIds' =>$userEmpNos,
        ];
        return $result;

    }


    function getAsisgnedKpiFormReviewDetails($assigneeId, $kpiFormAssignedId){
        $reviewDetails = VmtPMS_KPIFormReviewsModel::where('vmt_pms_kpiform_assigned_id',$kpiFormAssignedId)->where('assignee_id',$assigneeId)->first();
        if(!empty($reviewDetails))
            return $reviewDetails;
    }
}
