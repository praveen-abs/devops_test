<?php

use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtPMSRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

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
    return null;
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
    // if(Auth::id() == $pmsKpiAssigneeDetails->assigner_id){
    //     $currentLoggedUserRole = 'assigner';
    // }
    $result = [
        'currentLoggedUserRole' => $currentLoggedUserRole,
        'reviewersIds' => $reviewersIds,
        'assigneesIds' => $assigneesIds,
    ];
    return $result;
}

// check current logged user is Reviewer or Not and Add reviewd or not yet reviewed
function checkCurrentLoggedUserReviewerOrNot($reviewersIds,$currentLoggedUserRole,$kpiAssigneeReviewDetails){
    try{
        $result = '';
        $decodedReviewSubmitted = isset($kpiAssigneeReviewDetails->is_reviewer_submitted) ? json_decode($kpiAssigneeReviewDetails->is_reviewer_submitted,true) : '';
        $decodedReviewAccepted = isset($kpiAssigneeReviewDetails->is_reviewer_accepted) ? json_decode($kpiAssigneeReviewDetails->is_reviewer_accepted,true) : '';

        foreach($reviewersIds as $keyCheck => $singleReviewerSubmittedStatus)
        {
            if($currentLoggedUserRole == 'reviewer')
            {
                if($singleReviewerSubmittedStatus == Auth::id())
                {
                    if(isset($decodedReviewSubmitted[$singleReviewerSubmittedStatus]) && $decodedReviewSubmitted[$singleReviewerSubmittedStatus] == '1')
                    {
                        $result .= 'Reviewed<br>';
                    }elseif($decodedReviewSubmitted[$singleReviewerSubmittedStatus] == '0'){
                        $result .= 'Rejected<br>';
                    }else{
                        $result .= 'Not yet reviewed<br>';
                    }
                }
            }else{
                if($keyCheck != 0) $result .= '<br>';
                if(isset($decodedReviewSubmitted[$singleReviewerSubmittedStatus]) && $decodedReviewSubmitted[$singleReviewerSubmittedStatus] == '1')
                {
                    $result .= 'Reviewed<br>';
                }elseif($decodedReviewAccepted[$singleReviewerSubmittedStatus] == '0'){
                    $result .= 'Rejected<br>';
                }else{
                    $result .= 'Not yet reviewed<br>';
                }
            }
        }

        return $result;
    }catch(Exception $e){
        Log::info('check Current Logged User Reviewer Or Not helper error: '.$e->getMessage());
        return '';
    }
}

function calculateAppraisalReviewRating_BasedOnHR(){

}

/*



*/
function calculateOverallReviewRating($user_id){

    //Get all the assigned form's id for the given user_id
    $FormIDs_assignedforms = VmtPMS_KPIFormAssignedModel::where('assignee_id',$user_id)->get('id');


    //Get all the reviewform id for the given assignedform id's
    $ReviewsForms_currentUser =  VmtPMS_KPIFormReviewsModel::whereIn('id',$FormIDs_assignedforms)->get();

    dd($FormIDs_assignedforms);





}

// get Average rating of particular ReviewedForm and for review given by First Reveiwer for that Kpi Form
function calculateReviewRatings($assigneeReviewTableId=null,$assigneeId)
{
    try{
        $totalRatingScore = 0;
        $performanceRating = 0;
        $rank = 0;
        $action = 0;


        $assigneeReviewDetails = VmtPMS_KPIFormAssignedModel::where('id',$assigneeReviewTableId)->first();

        if(!empty($assigneeReviewDetails)){
            $decodedReviewsId = explode(',',$assigneeReviewDetails->reviewer_id);

            $kpi_review_record = VmtPMS_KPIFormReviewsModel::where('assignee_id',$assigneeId)->where('vmt_pms_kpiform_assigned_id',$assigneeReviewTableId)->first();

            if(!empty($kpi_review_record))
            {
                $firstReviewerRating = [];

                if(json_decode($kpi_review_record->reviewer_kpi_percentage,true)!='' &&  isset(json_decode($kpi_review_record->reviewer_kpi_percentage,true)[$decodedReviewsId[0]]))
                {
                    //Get the 'reviewer_kpi_percentage' for the 1st reviewer as Associative array
                    $firstReviewerRating = json_decode($kpi_review_record->reviewer_kpi_percentage,true)[$decodedReviewsId[0]];
                }
                // calculate Rating Based on Table Dynamic Data
                if (count($firstReviewerRating) > 0) {
                    $totalRatingScore = array_sum($firstReviewerRating);

                    $pmsConfigRatingDetails = VmtPMSRating::orderBy('sort_order','DESC')->get();

                    /* Use this line to test rating    */
                    //$totalRatingScore=101;
                    if(count($pmsConfigRatingDetails) > 0){
                        foreach($pmsConfigRatingDetails as $ratings){
                            $rangeCheck = explode('-',$ratings->score_range);

                            if($totalRatingScore >= $rangeCheck[0] && $totalRatingScore <= $rangeCheck[1]){
                                $rank = $ratings->ranking;
                                $performanceRating = $ratings->performance_rating;
                                $action = $ratings->action;
                                break;
                            }elseif($totalRatingScore >= 100){
                                $rank = $ratings->ranking;
                                $performanceRating = $ratings->performance_rating;
                                $action = $ratings->action;
                                break;
                            }
                        }
                    }
                }
            }
        }

        $response = [
            'rank' => $rank,
            'score' => $totalRatingScore.'%',
            'performance_rating' => $performanceRating,
            'action' => $action
        ];

        return $response;

    }catch(Exception $e){
        Log::info('calculation average rating helper error: '.$e->getMessage());

        $response = [
            'rank' => 0,
            'score' => '0%',
            'performance_rating' => 0,
            'action' => 0,
            'error' => $e
        ];

    }


}

// function for get View, Review and Self Review Text Change of Kpi Pms Form
function checkViewReviewText($loggedUserRole,$kpiFormReviewDetails){
    // dD("S");
    try{
        $result = '';
        // $arrayReviewerAccepted = isset($kpiFormReviewDetails->is_assignee_accepted) ? json_decode($kpiFormReviewDetails->is_assignee_accepted,true) : [];
        $isAllReviewersAcceptedData = [];
        $isAllReviewersAcceptedOrNot = false;
        if(isset($kpiFormReviewDetails->is_reviewer_accepted)){
            $isAllReviewersAcceptedData = json_decode($kpiFormReviewDetails->is_reviewer_accepted,true);
            if(!in_array('0',$isAllReviewersAcceptedData)){
                $isAllReviewersAcceptedOrNot = true;
            }
        }

        if($loggedUserRole == 'assignee'){
            if($isAllReviewersAcceptedOrNot == false){
                $result = 'Edit';
            }else{
                if(isset($kpiFormReviewDetails->is_assignee_submitted) && $kpiFormReviewDetails->is_assignee_submitted == '1') {
                    $result = 'View';
                }else{
                    $result = 'Self-Review';
                }
            }
        }elseif($loggedUserRole == 'reviewer'){

            if(isset($kpiFormReviewDetails) && $kpiFormReviewDetails->is_assignee_accepted == '0'){
                $result = 'Edit';
            }else{
                $decodedReview = isset($kpiFormReviewDetails->is_reviewer_submitted) ? json_decode($kpiFormReviewDetails->is_reviewer_submitted,true) : [];
                if(isset($decodedReview[Auth::id()]) && $decodedReview[Auth::id()] == '1'){
                        $result = 'View';
                }else{
                    $result = 'Review';
                }
            }
        }else{
            $result = 'Review';
            if($isAllReviewersAcceptedOrNot == false){
                $result = 'Edit';
            }
        }
        return $result;
    }catch(Exception $e){
        Log::info('get View, Review and Self Review Text Change of Kpi Pms Form helper error: '.$e->getMessage());
        return 'Review';
    }



}

function getEmployeeManager($selectedEmployeeId){
    // dD($selectedEmployeeId);
    $currentEmpCode = VmtEmployeeOfficeDetails::whereIn('user_id',$selectedEmployeeId)
                        ->select('l1_manager_code')
                        ->groupBy('l1_manager_code')
                        ->pluck('l1_manager_code');
    $users = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
                ->select(
                    'users.name',
                    'users.id as id',
                    'vmt_employee_details.emp_no as code',
                )
                ->orderBy('users.name', 'ASC')
                ->whereIn('emp_no', $currentEmpCode);
    return $users;
}


function isFormReviewCompleted($data_VmtPMS_KPIFormReviewsModel){

    $output = $data_VmtPMS_KPIFormReviewsModel->is_reviewer_submitted;

    $array_reviewers_submitted_values = array_values(json_decode($output,true));

    // dd($array_reviewers_submitted_values);

    //Check if reviewer_submitted value has '0' or null value.
    if( in_array(null, $array_reviewers_submitted_values, true ) || in_array("0", $array_reviewers_submitted_values, true )){
        return false;
    }
    else
    {
        return true;
    }

}

// PMS V2 API Responses
    //function showing success response....
    function sendResponse($result, $message)
    {
        $response = [
            'status'  => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response);
    }

    //function showing error showing....
    function sendError($errorMessages = [], $code = false)
    {
        $response = [
            'status' => false,
            'message' => $errorMessages,
        ];
        return response()->json($response);
    }
?>
