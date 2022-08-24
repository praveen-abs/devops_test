<?php

use App\Models\User;
use App\Models\VmtPMS_KPIFormReviewsModel;

function required()
{
  $required = "<span class='text-danger required_star'>*</span>";
  return $required;
}

function getUserDetailsById($userId){
  $userDetails = User::findorfail($userId);
  if(!empty($userDetails)){
    return $userDetails->name;
  }
  return '';
}

function getReviewKpiFormDetails($kpiAssignedId, $assigneeId){
  $reviewData = VmtPMS_KPIFormReviewsModel::where('vmt_pms_kpiform_assigned_id',$kpiAssignedId)->where('assignee_id',$assigneeId)->first();
  if(!empty($reviewData)){
    return $reviewData;
  }
  return '';
}