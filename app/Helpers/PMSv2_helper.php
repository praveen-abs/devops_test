<?php

use App\Models\User;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use Illuminate\Support\Facades\Auth;

// Get User Name by User ID
function getUserDetailsById($userId){
    $userDetails = User::findorfail($userId);
    if(!empty($userDetails)){
      return $userDetails->name;
    }
    return '';
}
  
// Get KPI Form Assignees's Review Data of Particular Assignee
function getReviewKpiFormDetails($kpiAssignedId, $assigneeId){
    $reviewData = VmtPMS_KPIFormReviewsModel::where('vmt_pms_kpiform_assigned_id',$kpiAssignedId)->where('assignee_id',$assigneeId)->first();
    if(!empty($reviewData)){
      return $reviewData;
    }
    return '';
}

// Get Necessary Details like currentLoggedUserRoleOnKpiForm, ReviewersIds, AssigneesIds
function getPmsKpiAssigneeDetails($pmsKpiAssigneeId){
    $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::findorfail($pmsKpiAssigneeId);
    $currentLoggedUserRole = '';
    $reviewersIds = isset($pmsKpiAssigneeDetails->reviewer_id) ? explode(',',$pmsKpiAssigneeDetails->reviewer_id) : '';
    $assigneesIds = isset($pmsKpiAssigneeDetails->assignee_id) ? explode(',',$pmsKpiAssigneeDetails->assignee_id) : '';
    if(in_array(Auth::id(),$reviewersIds)){
        $currentLoggedUserRole = 'reviewer';
    }
    if(in_array(Auth::id(),$assigneesIds)){
        $currentLoggedUserRole = 'assignee';
    }
    if(Auth::id() == $pmsKpiAssigneeDetails->assigner_id){
        $currentLoggedUserRole = 'assigner';
    }
    $result = [
        'currentLoggedUserRole' => $currentLoggedUserRole,
        'reviewersIds' => $reviewersIds,
        'assigneesIds' => $assigneesIds,
    ];
    return $result;
}

// check current logged user is Reviewer or Not and Add reviewd or not yet reviewed
function checkCurrentLoggedUserReviewerOrNot($reviewersIds,$currentLoggedUserRole,$kpiAssigneReviewDetails){
    $result = '';
    $decodedReviewSubmitted = isset($kpiAssigneReviewDetails->is_reviewer_submitted) ? json_decode($kpiAssigneReviewDetails->is_reviewer_submitted,true) : '';
    foreach($reviewersIds as $singleReviewerSubmittedStatus)
    {
        if($currentLoggedUserRole == 'reviewer')
        {
            if($singleReviewerSubmittedStatus == Auth::id())
            {
                if(isset($decodedReviewSubmitted[$singleReviewerSubmittedStatus]) && $decodedReviewSubmitted[$singleReviewerSubmittedStatus] == '1')
                {
                    $result .= 'Reviewed<br>';
                }else{
                    $result .= 'Not yet reviewed<br>';
                }
            }
        }else{
            if(isset($decodedReviewSubmitted[$singleReviewerSubmittedStatus]) && $decodedReviewSubmitted[$singleReviewerSubmittedStatus] == '1')
            {
                $result .= 'Reviewed<br>';
            }else{
                $result .= 'Not yet reviewed<br>';
            }
        }
    }
    return $result;
}

// get Average rating of particular Review and First Reveiwer of that Kpi Form
function calculateOverallReviewRatings($assigneeReviewTableId=null,$assigneeId)
{
    $assigneeReviewDetails = VmtPMS_KPIFormAssignedModel::where('id',$assigneeReviewTableId)->first();
    $decodedReviewsId = explode(',',$assigneeReviewDetails->reviewer_id);
    $asisgenReveiwrReview = VmtPMS_KPIFormReviewsModel::where('assignee_id',$assigneeId)->where('vmt_pms_kpiform_assigned_id',$assigneeReviewTableId)->first();
    $firstReviewRating = [];
    if(json_decode($asisgenReveiwrReview->reviewer_kpi_percentage,true)!='' && isset(json_decode($asisgenReveiwrReview->reviewer_kpi_percentage,true)[$decodedReviewsId[0]])){
        $firstReviewRating = json_decode($asisgenReveiwrReview->reviewer_kpi_percentage,true)[$decodedReviewsId[0]];
    }
    $finalRating = 0;
    if (count($firstReviewRating) > 0) {
        $ratingCheck = array_sum($firstReviewRating)/count($firstReviewRating);
        if ($ratingCheck < 60) {
            $finalRating = 1;
        } elseif ($ratingCheck >= 60 && $ratingCheck < 70) {
            $finalRating = 2;
        } elseif ($ratingCheck >= 70 && $ratingCheck < 80) {
            $finalRating = 3;
        } elseif ($ratingCheck >= 80 && $ratingCheck < 90) {
            $finalRating = 4;
        } elseif ($ratingCheck >= 90) {
            $finalRating = 5;
        } else{
            $finalRating = 0;
        }
    }
    return $finalRating;

}

?>