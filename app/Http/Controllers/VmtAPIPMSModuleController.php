<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Mail\NotifyPMSManager;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ViewNotification;

class VmtAPIPMSModuleController extends Controller
{

    public function showEmployeeApraisalReviewList(Request $request){

        $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews')
            ->WhereRaw("find_in_set(".auth()->user()->id.", reviewer_id)")
            ->orWhereRaw("find_in_set(".auth()->user()->id.", assignee_id)")
            ->orWhere('assigner_id',auth()->user()->id)
            ->orderBy('id','DESC')->get();

        return response()->json([
            'status' => true,
            'message'=> '',
            'data'   => $pmsKpiAssigneeDetails
        ]);
    }

    public function getAssigneeReviews(Request $request){
        // Flow 1 HR creates Form and Assignee
        $kpiFormAssignedDetails = VmtPMS_KPIFormAssignedModel::where('id', $request->assignedFormid)
            ->with('getPmsKpiFormReviews')
            ->with('getPmsKpiFormColumnDetails.getPmsKpiFormDetails')
            ->first();


        $config = VmtPMS_KPIFormModel::findorfail($kpiFormAssignedDetails->vmt_pms_kpiform_id);
        $show['dimension'] = 'true';
        $show['kpi'] = 'true';
        $show['operational'] = 'true';
        $show['measure'] = 'true';
        $show['frequency'] = 'true';
        $show['target'] = 'true';
        $show['stretchTarget'] = 'true';
        $show['source'] = 'true';
        $show['kpiWeightage'] = 'true';
        $show['appraiser'] = false;
        $show['manager'] = false;

        if ($config) {
            $config->header = json_decode($config->column_header, true);
            $show['dimension'] = $config->available_columns && in_array('dimension', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['kpi'] = $config->available_columns && in_array('kpi', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['operational'] = $config->available_columns && in_array('operational', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['measure'] = $config->available_columns && in_array('measure', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['frequency'] = $config->available_columns && in_array('frequency', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['target'] = $config->available_columns && in_array('target', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['stretchTarget'] = $config->available_columns && in_array('stretchTarget', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['source'] = $config->available_columns && in_array('source', explode(',', $config->available_columns)) ? 'true': 'false';
            $show['kpiWeightage'] = $config->available_columns && in_array('kpiWeightage', explode(',', $config->available_columns)) ? 'true': 'false';
        }

        $assignersName = User::whereRaw("id IN($kpiFormAssignedDetails->reviewer_id)")->pluck('name')->toArray();
        if ($assignersName) {
            $assignersName = implode(',', $assignersName);
        }
        //dd($assignersName);

        //\DB::enableQueryLog();
        $review  =  VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform_details','vmt_pms_kpiform_details.vmt_pms_kpiform_id','=','vmt_pms_kpiform_assigned.vmt_pms_kpiform_id')
        ->join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=','vmt_pms_kpiform_assigned.id')
        ->where('vmt_pms_kpiform_reviews.assignee_id','=', auth::user()->id)
        ->get();

        //\Log::error(\DB::getQueryLog());

        foreach($review as $ff){
            $assignersName = User::whereRaw("id IN($ff->reviewer_id)")->pluck('name')->toArray();
            if ($assignersName) {
                $assignersName = implode(',', $assignersName);
            }
            if($ff->reviewer_kpi_review != null){
                $reviewArray = (json_decode($ff->reviewer_kpi_review, true)) ? (json_decode($ff->reviewer_kpi_review, true)) : [];
                $percentArray = (json_decode($ff->reviewer_kpi_percentage, true)) ? (json_decode($ff->reviewer_kpi_percentage, true)) : [];
                $commentArray = (json_decode($ff->reviewer_kpi_comments, true)) ? (json_decode($ff->reviewer_kpi_comments, true)) : [];
            }
            $kpiRows      =  VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id', $ff->vmt_pms_kpiform_id)->get();
            $reviewCompleted = false;
            $kpiRowsId = VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id', $ff->vmt_pms_kpiform_id)->pluck('id')->toArray();
        }

        if(count($review ) > 0){
            $kpiRowsId = implode(',',$kpiRowsId);
        }


        // Get assigned Details
        $assignedGoals  = VmtPMS_KPIFormAssignedModel::where('vmt_pms_kpiform_assigned.id',$request->assignedFormid)->where('vmt_pms_kpiform_reviews.assignee_id', $request->assigneeId)->join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=','vmt_pms_kpiform_assigned.id')->first();

        // rating details
        $ratingDetail['performance'] ='-';
        $ratingDetail['ranking'] = '-';
        $ratingDetail['action'] = '-';
        $ratingDetail['rating'] = '-';
        if($assignedGoals!=''){

        // Calculation and check All Reviewers Rating
            // dD($assignedGoals->reviewer_kpi_percentage);
            $percentageVal = 0;
            $howManyPercCount = 0;
            $allReviewerPercentages = isset($assignedGoals->reviewer_kpi_percentage) ? json_decode($assignedGoals->reviewer_kpi_percentage, true) : [];
            if(count($allReviewerPercentages) > 0){
                foreach($allReviewerPercentages as $percentage){
                    $arraySumPercentage = array_sum($percentage);
                    $percentageVal += $arraySumPercentage;
                    $howManyPercCount += count($percentage);
                }
            }
            if ($howManyPercCount > 0) {
                $ratingDetail['rating'] = $percentageVal / $howManyPercCount;
                if ($ratingDetail['rating'] < 60) {
                    $ratingDetail['performance'] = "Needs Action";
                    $ratingDetail['ranking'] = 1;
                    $ratingDetail['action'] = 'Exit';
                } elseif ($ratingDetail['rating'] >= 60 && $ratingDetail['rating'] < 70) {
                    $ratingDetail['performance'] = "Below Expectations";
                    $ratingDetail['ranking'] = 2;
                    $ratingDetail['action'] = 'PIP';
                } elseif ($ratingDetail['rating'] >= 70 && $ratingDetail['rating'] < 80) {
                    $ratingDetail['performance'] = "Meet Expectations";
                    $ratingDetail['ranking'] = 3;
                    $ratingDetail['action'] = '10%';
                } elseif ($ratingDetail['rating'] >= 80 && $ratingDetail['rating'] < 90) {
                    $ratingDetail['performance'] = "Exceeds Expectations";
                    $ratingDetail['ranking'] = 4;
                    $ratingDetail['action'] = '15%';
                } elseif ($ratingDetail['rating'] >= 90) {
                    $ratingDetail['performance'] = "Exceptionally Exceeds Expectations";
                    $ratingDetail['ranking'] = 5;
                    $ratingDetail['action'] = '20%';
                }
                else{
                    $ratingDetail['performance'] = "error";
                    $ratingDetail['ranking'] = 000;
                    $ratingDetail['action'] = '0000%';
                }
            }
        }

        $assignedUserDetails = User::where('id', auth::user()->id)->with('getEmployeeDetails','getEmployeeOfficeDetails')->first();
        $assignedEmployee_Userdata = User::where('id',  auth::user()->id)->first();
        $assignedEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first();
        $empSelected = true;
        $employeeData = VmtEmployee::where('userid', auth::user()->id)->first();

        if($assignedGoals!=''){
            $reviewersId = explode(',',$assignedGoals->reviewer_id);
        }else{
            $reviewersId = [];
        }

        // check if all reviewers has submitted the review or not
        $isAllReviewersSubmittedData = [];
        $isAllReviewersSubmittedOrNot = false;
        if(isset($assignedGoals->is_reviewer_submitted)){
            $isAllReviewersSubmittedData = json_decode($assignedGoals->is_reviewer_submitted,true);
            if(!in_array('0',$isAllReviewersSubmittedData) && !in_array(null,$isAllReviewersSubmittedData)){
                $isAllReviewersSubmittedOrNot = true;
            }
        }

        $responseData = array(
            'review'  => $review,
            'assignedUserDetails'  => $assignedUserDetails,
            'assignedGoals'  => $assignedGoals,
            'empSelected'  => $empSelected,
            'assignersName'  => $assignersName,
            'config'  => $config,
            'show'  => $show,
            'ratingDetail'  => $ratingDetail,
            'reviewersId'  => $reviewersId,
            'isAllReviewersSubmittedOrNot' => $isAllReviewersSubmittedOrNot,
            'isAllReviewersSubmittedData'  => $isAllReviewersSubmittedData
        );

        return response()->json([
            'status' => true,
            'message'=> '',
            'data'   => $responseData
        ]);
    }


    //
    public function saveAssigneeReviews(Request $request){

        return response()->json(['status'=>true,
            'message'=> '']);
        //}
    }

    /*
        Get all the KPI forms assigned for the given user.

            DB Table : vmt_pms_kpiform_assigned
            Input params : assignee_id

        Logic : Using assignee_id, we will search the assignee_id, reviewer_id


    */
    public function getAssignedKPIForms(Request $request)
    {
        $userId  = auth::user()->id;
        // check user id in Assignee, Assigner and Reviewer
        $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews.getUserAssigneeDetails.getEmployeeDetails')
                                ->WhereRaw("find_in_set(".$userId.", reviewer_id)")
                                ->orWhereRaw("find_in_set(".$userId.", assignee_id)")
                                ->orWhere('assigner_id',$userId)
                                ->orderBy('id','DESC')
                                ->get();

        $result = [];    
        // display assigned kpi details
        foreach($pmsKpiAssigneeDetails as $key => $assignedDetails){
            $result[$key]['id'] = $assignedDetails->id;
            $result[$key]['vmt_pms_kpiform_id'] = $assignedDetails->vmt_pms_kpiform_id;
            $result[$key]['assignee_id'] = $assignedDetails->assignee_id;
            $result[$key]['reviewer_id'] = $assignedDetails->reviewer_id;
            $result[$key]['assigner_id'] = $assignedDetails->assigner_id;
            $result[$key]['calendar_type'] = $assignedDetails->calendar_type;
            $result[$key]['year'] = $assignedDetails->year;
            $result[$key]['frequency'] = $assignedDetails->frequency;
            $result[$key]['assignment_period'] = $assignedDetails->assignment_period;
            $result[$key]['department_id'] = $assignedDetails->department_id;
            $result[$key]['assigned_kpi_form_review_details'] = [];
            // check assigned kpi details reviews
            if(isset($assignedDetails->getPmsKpiFormReviews) && count($assignedDetails->getPmsKpiFormReviews)){
                foreach($assignedDetails->getPmsKpiFormReviews as $reviewKey => $reviews){
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['id'] = $reviews->id;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['vmt_pms_kpiform_assigned_id'] = (string)$reviews->vmt_pms_kpiform_assigned_id;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_id'] = $reviews->assignee_id;

                    // Get Assignee name and emp_no
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_name'] = isset($reviews->getUserAssigneeDetails) ? (String)$reviews->getUserAssigneeDetails->name : '';
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_emp_no'] = isset($reviews->getUserAssigneeDetails) && isset($reviews->getUserAssigneeDetails->getEmployeeDetails) ? (String)$reviews->getUserAssigneeDetails->getEmployeeDetails->emp_no : '';

                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_kpi_review'] = (string)$reviews->assignee_kpi_review;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_kpi_percentage'] = (string)$reviews->assignee_kpi_percentage;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_kpi_comments'] = (string)$reviews->assignee_kpi_comments;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['reviewer_kpi_review'] = (string)$reviews->reviewer_kpi_review;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['reviewer_kpi_percentage'] = (string)$reviews->reviewer_kpi_percentage;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['reviewer_kpi_comments'] = (string)$reviews->reviewer_kpi_comments;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['reviewer_appraisal_comments'] = (string)$reviews->reviewer_appraisal_comments;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assigner_kpi_review'] = (string)$reviews->assigner_kpi_review;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assigner_kpi_percentage'] = (string)$reviews->assigner_kpi_percentage;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assigner_kpi_comments'] = (string)$reviews->assigner_kpi_comments;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_kpi_status'] = (string)$reviews->assignee_kpi_status;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['is_assignee_submitted'] = (string)$reviews->is_assignee_submitted;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['is_assignee_accepted'] = (string)$reviews->is_assignee_accepted;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['reviewer_kpi_status'] = (string)$reviews->reviewer_kpi_status;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['is_reviewer_submitted'] = $reviews->is_reviewer_submitted;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['is_reviewer_accepted'] = $reviews->is_reviewer_accepted;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['assignee_rejection_comments'] = (string)$reviews->assignee_rejection_comments;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['reviewer_rejection_comments'] = (string)$reviews->reviewer_rejection_comments;
                    $result[$key]['assigned_kpi_form_review_details'][$reviewKey]['overall_score'] = (string)$reviews->overall_score;
                    
                }
            }
        }

        return response()->json([
            'status' => true,
            'message'=> '',
            'data'   => $result
        ]);

        // $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform_reviews',
        //         'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id', '=', 'vmt_pms_kpiform_assigned.id')
        //     ->leftJoin('users', 'users.id', '=', 'vmt_pms_kpiform_reviews.assignee_id')
        //     ->WhereRaw("find_in_set(".$userId.", vmt_pms_kpiform_assigned.reviewer_id)")
        //     ->orWhere('vmt_pms_kpiform_reviews.assignee_id', $userId)
        //     ->orWhere('assigner_id', auth()->user()->id)
        //     ->select('vmt_pms_kpiform_reviews.assignee_kpi_review',
        //         'vmt_pms_kpiform_reviews.assignee_kpi_percentage',
        //         'vmt_pms_kpiform_reviews.assignee_kpi_comments',
        //         'vmt_pms_kpiform_reviews.reviewer_kpi_review',
        //         'vmt_pms_kpiform_reviews.reviewer_kpi_percentage',
        //         'vmt_pms_kpiform_reviews.reviewer_kpi_comments',
        //         'vmt_pms_kpiform_reviews.reviewer_appraisal_comments',
        //         'vmt_pms_kpiform_reviews.assigner_kpi_review',
        //         'vmt_pms_kpiform_reviews.assigner_kpi_percentage',
        //         'vmt_pms_kpiform_reviews.assigner_kpi_comments',
        //         'vmt_pms_kpiform_reviews.assignee_kpi_status',
        //         'vmt_pms_kpiform_reviews.is_assignee_submitted',
        //         'vmt_pms_kpiform_reviews.is_assignee_accepted',
        //         'vmt_pms_kpiform_reviews.reviewer_kpi_status',
        //         'vmt_pms_kpiform_reviews.is_reviewer_submitted',
        //         'vmt_pms_kpiform_reviews.is_reviewer_accepted',
        //         'vmt_pms_kpiform_reviews.assignee_rejection_comments',
        //         'vmt_pms_kpiform_reviews.reviewer_rejection_comments',
        //         'vmt_pms_kpiform_reviews.overall_score',
        //         'vmt_pms_kpiform_reviews.id as review_kpiform_id',
        //         'vmt_pms_kpiform_assigned.*',
        //         'users.name as assignee_name',
        //         'users.user_code as assignee_code'
        //     )->orderBy('id','DESC')->get();
    }

    /*
        Get details the KPI forms review details.

            DB Table : vmt_pms_kpiform_assigned
            Input params : review_kpiform_id

        Logic : Using review_kpiform_id, we will get the details assignee , details of kpi form and reviews

    */
    public function getReviewerReviews(Request $request){
        $userId = auth::user()->id;
        $kpiReviewFormId = $request->review_kpiform_id;
        $data  =  VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform_reviews',
                'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id', '=', 'vmt_pms_kpiform_assigned.id')
                ->leftJoin('users', 'users.id', '=', 'vmt_pms_kpiform_reviews.assignee_id')
                ->where('vmt_pms_kpiform_reviews.id', $kpiReviewFormId)
                ->select('vmt_pms_kpiform_reviews.assignee_kpi_review',
                    'vmt_pms_kpiform_reviews.assignee_kpi_percentage',
                    'vmt_pms_kpiform_reviews.assignee_kpi_comments',
                    'vmt_pms_kpiform_reviews.reviewer_kpi_review',
                    'vmt_pms_kpiform_reviews.reviewer_kpi_percentage',
                    'vmt_pms_kpiform_reviews.reviewer_kpi_comments',
                    'vmt_pms_kpiform_reviews.reviewer_appraisal_comments',
                    'vmt_pms_kpiform_reviews.assigner_kpi_review',
                    'vmt_pms_kpiform_reviews.assigner_kpi_percentage',
                    'vmt_pms_kpiform_reviews.assigner_kpi_comments',
                    'vmt_pms_kpiform_reviews.assignee_kpi_status',
                    'vmt_pms_kpiform_reviews.is_assignee_submitted',
                    'vmt_pms_kpiform_reviews.is_assignee_accepted',
                    'vmt_pms_kpiform_reviews.reviewer_kpi_status',
                    'vmt_pms_kpiform_reviews.is_reviewer_submitted',
                    'vmt_pms_kpiform_reviews.is_reviewer_accepted',
                    'vmt_pms_kpiform_reviews.assignee_rejection_comments',
                    'vmt_pms_kpiform_reviews.reviewer_rejection_comments',
                    'vmt_pms_kpiform_reviews.overall_score',
                    'vmt_pms_kpiform_reviews.assignee_id as assignee_user_id',
                    'vmt_pms_kpiform_assigned.*',
                    'users.name as assignee_name',
                    'users.user_code as assignee_code'
                )->orderBy('id','DESC')->first();

        $ratingDetail['performance'] ='-';
        $ratingDetail['ranking'] = '-';
        $ratingDetail['action'] = '-';
        $ratingDetail['rating'] = '-';

        $show['dimension'] = 'true';
        $show['kpi'] = 'true';
        $show['operational'] = 'true';
        $show['measure'] = 'true';
        $show['frequency'] = 'true';
        $show['target'] = 'true';
        $show['stretchTarget'] = 'true';
        $show['source'] = 'true';
        $show['kpiWeightage'] = 'true';
        $show['appraiser'] = false;
        $show['manager'] = false;

        $kpiRowsId  = '';
        if($data){
            $config = VmtPMS_KPIFormModel::findorfail($data->vmt_pms_kpiform_id);
            if ($config) {
                $config->header = json_decode($config->column_header, true);
                $show['dimension'] = $config->available_columns && in_array('dimension', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['kpi'] = $config->available_columns && in_array('kpi', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['operational'] = $config->available_columns && in_array('operational', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['measure'] = $config->available_columns && in_array('measure', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['frequency'] = $config->available_columns && in_array('frequency', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['target'] = $config->available_columns && in_array('target', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['stretchTarget'] = $config->available_columns && in_array('stretchTarget', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['source'] = $config->available_columns && in_array('source', explode(',', $config->available_columns)) ? 'true': 'false';
                $show['kpiWeightage'] = $config->available_columns && in_array('kpiWeightage', explode(',', $config->available_columns)) ? 'true': 'false';
            }

            // KPI Rows
            $reviewCompleted = false;
            $assignersName = User::whereRaw("id IN($data->reviewer_id)")->pluck('name')->toArray();
            $kpiFormDetails = VmtPMS_KPIFormDetailsModel::select(
                "id",
                "vmt_pms_kpiform_id",
                "dimension",
                "kpi",
                "operational_definition",
                "measure",
                "frequency",
                "target",
                "stretch_target",
                "source",
                "kpi_weightage",
            )->where('vmt_pms_kpiform_id', $data->vmt_pms_kpiform_id)->first();

            $assigneeEmployeeOfficeDetails = VmtEmployeeOfficeDetails::select('department_id', 'process', 'designation', 'user_id')->where('user_id', $data->assignee_user_id)->first();
        }



        return response()->json([
            'status' => true,
            'message'=> '',
            'data'   => [
                            "review" => $data,
                            "show" => $show,
                            "kpiFormDetails" => $kpiFormDetails,
                            "assignersName"  => $assignersName,
                            "ratingDetail"   => $ratingDetail,
                            "assigneeEmployeeOfficeDetails" => $assigneeEmployeeOfficeDetails
                        ]
        ]);

    }


    /*
        Save review given by the reviewer.
            DB Table : vmt_pms_kpiform_reviews
            Input params : review_kpiform_id, 'reviewer_kpi_review', 'reviewer_kpi_percentage', formSubmitType

            formSubmitType == 0 ? "Save Review" : "Publish Review"

        Logic : Using review_kpiform_id, we will get the details of assigned kpi form and will store the reviews in the vmt_pms_kpiform_reviews table

    */
    public function saveReviewerReviews(Request $request){
         try{
            $kpiReviewCheck = VmtPMS_KPIFormReviewsModel::where('id',$request->review_kpiform_id)->first();
            if(empty($kpiReviewCheck)){
                return response()->json(['status'=>false,'message'=>'Review Data Not Found']);
            }
            $decodedKpiReviwerReview = json_decode($kpiReviewCheck->reviewer_kpi_review,true);
            $decodedKpiReviwerPerc = json_decode($kpiReviewCheck->reviewer_kpi_percentage,true);
            $decodedIsKpiReviwerSubmitted = json_decode($kpiReviewCheck->is_reviewer_submitted,true);

            $decodedKpiReviwerReview[Auth::id()] = $request->reviewer_kpi_review;
            $decodedKpiReviwerPerc[Auth::id()] = $request->reviewer_kpi_percentage;

            $kpiReviewCheck->reviewer_kpi_review = $decodedKpiReviwerReview;
            $kpiReviewCheck->reviewer_kpi_percentage = $decodedKpiReviwerPerc;

            if($request->formSubmitType == 0){
                $decodedIsKpiReviwerSubmitted[Auth::id()] = '0';
                $kpiReviewCheck->is_reviewer_submitted = $decodedIsKpiReviwerSubmitted;
                $kpiReviewCheck->update();
                return response()->json(['status'=>true,'message'=>'Saved as draft']);
            }else{
                $decodedIsKpiReviwerSubmitted[Auth::id()] = '1';
                $kpiReviewCheck->is_reviewer_submitted = $decodedIsKpiReviwerSubmitted;
                $kpiReviewCheck->update();

                $kpiForAssignedDetails = VmtPMS_KPIFormAssignedModel::where('id',$kpiReviewCheck->vmt_pms_kpiform_assigned_id)->first();
                // dD($kpiForAssignedDetails);
                $hrReview = User::find($kpiForAssignedDetails->assigner_id);

                $currentUser_empDetails = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first();

                $hrList =  User::role(['HR', 'admin', 'Admin'])->get();
                $hrUsers = $hrList->pluck('id');
                $officialMailList =   VmtEmployeeOfficeDetails::whereIn('user_id', $hrUsers)->pluck('officical_mail');

                $notification_user = User::where('id',auth::user()->id)->first();
                //dd($officialMailList);
                \Mail::to($officialMailList)->send(new NotifyPMSManager(auth::user()->name,  $currentUser_empDetails->designation,$hrReview->name,$kpiReviewCheck->year ));
                $message = "Employee has submitted KPI Assessment.  ";
                    Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));

                return response()->json(['status'=>true,'message'=>"Published Review successfully. Sent mail to HR ".$officialMailList]);
            }

        }catch(Exception $e){
            Log::info('save or submit reviewer review error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
