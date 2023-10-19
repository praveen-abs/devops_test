<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use App\Models\ConfigPms;
use App\Models\User;
use App\Models\VmtConfigPmsV3;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtPmsKpiFormAssignedV3;
use App\Models\VmtPmsKpiFormDetailsV3;
use App\Models\VmtPmsKpiFormReviewsV3;
use App\Models\VmtPmsKpiFormV3;
use Exception;
use Illuminate\Http\Request;
use App\Services\VmtPMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;

class VmtPMSModuleController_v3 extends Controller
{
    public function showPMSDashboard()
    {
        return "PMS v3 working";
    }


    /*
        Returns an array containing managers user_codes in hierarchy
        for the given assignee user_code.

    */
    private function getEmployeeHierarchyManagerCodes($assignee_user_code,$levels = 3)
    {

        $validator = Validator::make(
            $data = [
                "user_code" => $assignee_user_code
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        // $emp_code = 'PSC0018';

        $manager_usercodes = [];
        $current_emp_code = $assignee_user_code;


        $getuser = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')->where('users.user_code', $current_emp_code)->first();

        if ($getuser) {
            $getmanagers_L1 = User::where('user_code', $getuser->l1_manager_code)->first()->user_code ?? null;
            if ($getmanagers_L1 != null) {
                $manager_usercodes['L1'] = $getmanagers_L1;
            }
        }


        if (!empty($getmanagers_L1)) {
            $getuser_1 = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')->where('users.user_code', $getmanagers_L1)->first();
            if ($getuser_1) {
                $getmanagers_L2 = User::where('user_code', $getuser_1->l1_manager_code)->first()->user_code ?? null;
                if ($getmanagers_L2 != null) {
                    $manager_usercodes['L2'] = $getmanagers_L2;
                }
            }
        }

        if (!empty($getmanagers_L2)) {
            $getuser_2 = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')->where('users.user_code', $getmanagers_L2)->first();
            if ($getuser_2) {
                $getmanagers_L3 = User::where('user_code', $getuser_2->l1_manager_code)->first()->user_code ?? null;
                if ($getmanagers_L3 != null) {
                    $manager_usercodes['L3'] = $getmanagers_L3;
                }
            }
        }

        return $manager_usercodes;
    }


    private function createReviewerFlowDetails($emp_code, $flowCheck)
    {

        $validator = Validator::make(
            $data = [
               "user_code" => $emp_code,
               "flowCheck" => $flowCheck,
            ],
            $rules = [
                "user_code" => "required|exists:users,user_code",
                "flowcheck" => "required|in:1,2,3",
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "array" => "Field :attribute datatype is mismatch",
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        $pms_config = VmtConfigPmsV3::first();

        /*
            Reviewers Flow JSON structure in Config PMS
            [
                {"order":"1","reviewer_level":"L1"},
                {"order":"2","reviewer_level":"L2"},
                {"order":"3","reviewer_level":"L3"}
            ]

        */

        $reviewers_flow = json_decode($pms_config->reviewers_flow, true);

        $manager_usercodes = $this->getEmployeeHierarchyManagerCodes($emp_code);

        $temp = array();
        $res = array();
        foreach ($reviewers_flow as $single_level) {

            $t_reviewer_level = $single_level['reviewer_level'];

            if (isset($manager_usercodes[$t_reviewer_level])) {

                $temp["reviewer_id"] = User::where('user_code', $manager_usercodes[$t_reviewer_level])->first()->id;
                $temp["reviewer_user_code"] = $manager_usercodes[$t_reviewer_level];
                $temp["review_order"] = $single_level['order'];

                if ($flowCheck == 3) {
                    $temp["is_accepted"] = 0;
                } else {
                    $temp["is_accepted"] = 1;
                }

                $temp["is_reviewed"] = 0;
                $temp["rejection_comments"] = "";

                array_push($res, $temp);
            }
        }

        return json_encode($res);
    }


    public function createKpiForm(Request $request)
    {

        /*
         $form_details  = [
           [ 'kpi' => 'Responsible of Office Neet and Clean...',
            'frequency' => 'q1',
            'target' => '100',
            'kpi_weightage' => '50%',
            ],
            [
            'kpi' => 'Responsible of Office Neet and Clean...',
            'frequency' => 'q1',
            'target' => '100',
            'kpi_weightage' => '50%',
            ]
            ];
        */

        $validator = Validator::make(
            $data = [
               "form_name" => $request->form_name,
               "form_details" => $request->form_details,
            ],
            $rules = [
                "form_name" => "required",
                "form_details" => "required|array",
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "array" => "Field :attribute datatype is mismatch",
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

        $config = VmtConfigPmsV3::first();

        //Creating entry in vmt_pms_kpiform_v3 table
        $kpiTable = new VmtPmsKpiFormV3;
        $kpiTable->available_columns = $config->selected_columns;
        $kpiTable->author_id = Auth::user()->id;
        $kpiTable->form_name = $request->form_name;
        $kpiTable->save();

        foreach($request->form_details as $single_form){
            $kpiRow = new VmtPmsKpiFormDetailsV3;
            $kpiRow->vmt_pms_kpiform_id = $kpiTable->id;
            $kpiRow->objective_value = json_encode($single_form);
            $kpiRow->save();
        }

        return response()->json([
            "status" => "success",
            "data" => "Form created successfully",
        ]);


    }catch(Exception $e){
        return response()->json([
            "status" => "failure",
            "error_verbose" => $e->getMessage(),
        ]);
    }


    }

    public function publishPmsform(Request $request)
    {

        $validator = Validator::make(
            $data = [
                "vmt_pms_kpiform_v3_id" => $request->kpiformid,
                "assignee_id" => $request->assignee_id,
                "reviewer_id" => $request->reviewer_id,
                "assigner_id" => $request->assigner_id,
                "calendar_type" => $request->calender_type,
                "year" => $request->year,
                "frequency" => $request->frequency,
                "assignment_period" => $request->assignment_period,
                "department_id" => $request->department,
                "org_time_period_id" => $request->org_time_period_id,
            ],
            $rules = [
                "vmt_pms_kpiform_v3_id" => 'required',
                "assignee_id" => "required",
                "reviewer_id" => 'required',
                "assigner_id" => 'required',
                "calendar_type" => 'required',
                "year" => 'required',
                "frequency" => 'required',
                "assignment_period" => 'required',
                "department_id" => 'required',
                "org_time_period_id" => 'required'
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $flowcheck = 3;
        $assignee = '145';

    try{

        if ($flowcheck == 3) {

            $publishform = new VmtPmsKpiFormAssignedV3;
            $publishform->vmt_pms_kpiform_v3_id = '1';
            $publishform->assignee_id = $assignee;
            $publishform->reviewer_id = '215';
            $publishform->assigner_id = '194';
            $publishform->calendar_type = 'financial_year';
            $publishform->year = 'April - 2023 to March - 2024';
            $publishform->frequency = 'quarterly';
            $publishform->assignment_period = 'q1';
            $publishform->department_id = '1';
            $publishform->org_time_period_id = '1';
            $publishform->save();

            $reviewer = new VmtPmsKpiFormReviewsV3;
            $reviewer->vmt_kpiform_assigned_v3_id = $publishform->id;
            $reviewer->assignee_id = $assignee;
            $reviewer->is_assignee_accepted = '1';
            $reviewer->reviewer_details = $this->createReviewerFlowDetails(User::where('id', $assignee)->first()->user_code, $flowcheck);
            $reviewer->save();

        } elseif ($flowcheck == 2 || $flowcheck == 1) {

            foreach ($assignee as $single_assigne) {

                $publishform = new VmtPmsKpiFormAssignedV3;
                $publishform->vmt_pms_kpiform_v3_id = '1';
                $publishform->assignee_id = $single_assigne;
                $publishform->reviewer_id = '215';
                $publishform->assigner_id = '215';
                $publishform->calendar_type = 'financial_year';
                $publishform->year = 'April - 2023 to March - 2024';
                $publishform->frequency = 'quarterly';
                $publishform->assignment_period = 'q1';
                $publishform->department_id = '1';
                $publishform->org_time_period_id = '1';
                $publishform->save();

                $reviewer = new VmtPmsKpiFormReviewsV3;
                $reviewer->vmt_kpiform_assigned_v3_id = $publishform->id;
                $reviewer->assignee_id = $single_assigne;
                $reviewer->is_reviewer_accepted = '1';
                $reviewer->reviewer_details = $this->createReviewerFlowDetails(User::where('id', $single_assigne)->first()->user_code, $flowcheck);
                $reviewer->save();

            }
        }

        return response()->json([
            "status" => "success",
            "data" => "kpi form published successfully",
        ]);


    }catch(Exception $e){
        return response()->json([
            "status" => "failure",
            "error_verbose" => $e->getMessage(),
        ]);
    }

    }

    public function Approverflow(Request $request)
    {

        try {

            $gt = VmtPmsKpiFormReviewsV3::join('vmt_pms_kpiform_assigned_v3', 'vmt_pms_kpiform_assigned_v3.id', '=', 'vmt_pms_kpiform_reviews_v3.vmt_kpiform_assigned_v3_id')
                ->get()->toarray();
            $user_id = auth()->user()->id;
            $getAllRecords = array();
            foreach ($gt as $key => $single_value) {
                $getAllRecords[$key]['assignee_id'] = $single_value['assignee_id'];
                $getAllRecords[$key]['assignee_name'] = user::where('id', $single_value['assignee_id'])->first()->name;
                $getAllRecords[$key]['is_assignee_accepted'] = $single_value['is_assignee_accepted'];
                $getAllRecords[$key]['is_assignee_submitted'] = $single_value['is_assignee_submitted'];
                $getAllRecords[$key]['reviewer_details'] = (json_decode($single_value['reviewer_details'], true));
                $getAllRecords[$key]['is_reviewer_accepted'] = $single_value['is_reviewer_accepted'];
                $getAllRecords[$key]['is_reviewer_submitted'] = $single_value['is_reviewer_submitted'];
                $getAllRecords[$key]['reviewer_kpi_review'] = $single_value['reviewer_kpi_review'];
                $getAllRecords[$key]['reviewer_kpi_percentage'] = $single_value['reviewer_kpi_percentage'];
                $getAllRecords[$key]['reviewer_kpi_comments'] = $single_value['reviewer_kpi_comments'];

                $form_header = VmtPmsKpiFormV3::where('id', $single_value['vmt_pms_kpiform_v3_id'])->first()->available_headers;
                $getAllRecords[$key]['form_header'] = explode(',', $form_header);

                $form_details = VmtPmsKpiFormDetailsV3::where('vmt_pms_kpiform_v3_id', $single_value['vmt_pms_kpiform_v3_id'])
                    ->join('vmt_pms_kpiform_v3', 'vmt_pms_kpiform_v3.id', '=', 'vmt_pms_kpiform_details_v3.vmt_pms_kpiform_v3_id')
                    ->get(['vmt_pms_kpiform_details_v3.id','objective_value'])->toarray();

                $temp_arr = [];
                    foreach($form_details as $key1 => $single_value){
                        $temp_arr[$key1] = json_decode($single_value['objective_value'],true);
                        $temp_arr[$key1]['id'] = $single_value['id'];
                    }

                $getAllRecords[$key]['kpi_form_details'] = $temp_arr;
            }

            $pending_records = [];
            foreach ($getAllRecords as $single_record) {
                $arr = [];
                foreach ($single_record['reviewer_details'] as $key => $single_approvers) {
                    $arr[$single_approvers['review_order']] = $single_approvers;
                }
                foreach ($arr as $single_arr) {
                    if ($user_id == $single_arr['reviewer_id']) {
                        $current_user_order = $single_arr['review_order'];
                        if ($current_user_order == 1) {
                            if ($arr[$current_user_order]['is_accepted'] == 0) {
                                array_push($pending_records, $single_record);
                            }
                        } elseif ($current_user_order == 2) {
                            if ($arr[$current_user_order - 1]['is_accepted'] == 1 && $arr[$current_user_order]['is_accepted'] == 0) {
                                array_push($pending_records, $single_record);
                            }
                        } elseif ($current_user_order == 3) {
                            if ($arr[$current_user_order - 1]['is_accepted'] == 1 && $arr[$current_user_order]['is_accepted'] == 0) {
                                array_push($pending_records, $single_record);
                            }
                        } elseif ($current_user_order == 4) {
                            if ($arr[$current_user_order - 1]['is_accepted'] == 1 && $arr[$current_user_order]['is_accepted'] == 0) {
                                array_push($pending_records, $single_record);
                            }
                        }
                    }
                }
            }

            return response()->json([
                "status" => "success",
                "data" => empty($pending_records) ? 'No pending records' : $pending_records,

            ]);

        } catch (Exception $e) {
            return response()->json([
                "status" => "failure",
                "error_verbose" => $e->getMessage(),
            ]);
        }

    }

    public function ApproveOrReject(Request $request)
    {

        $user_id = auth()->user()->id;

        $record_id = '1';
        $status = '1'; // approve or reject
        $reviewer_comments = '';

        $validator = Validator::make(
            $data = [
                "record_id" => $record_id,
                "status" => $status,
                "reviewer_comments" => $reviewer_comments
            ],
            $rules = [
                "record_id" => "required|exists:vmt_pms_kpiform_reviews_v3,id",
                "status" => "required|in:1,-1",
                "reviewer_comments" => "nullable"
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "in" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {

            $get_record = VmtPmsKpiFormReviewsV3::where('id', $record_id)->first();
            $reviewer_details = json_decode($get_record->reviewer_details, true);

            for ($i = 0; $i < count($reviewer_details); $i++) {
                if ($reviewer_details[$i]['reviewer_id'] == $user_id) {
                    $reviewer_details[$i]['is_accepted'] = $status;
                    $reviewer_details[$i]['rejection_comments'] = $reviewer_comments;
                }
            }
            $result = json_encode($reviewer_details);

            $get_record->reviewer_details = $result;
            $get_record->save();

            return response()->json([
                "status" => "success",
                "data" => $status == '1' ? "Approved successfully" : "Rejected successfully",
            ]);

        } catch (Exception $e) {
            return response()->json([
                "status" => "failure",
                "error_verbose" => $e->getMessage(),
            ]);
        }

    }

    public function selfDashBoardDetails()
    {

        $current_user_id = auth()->user()->id;

        $getallrecord = VmtPmsKpiFormReviewsV3::join('vmt_pms_kpiform_assigned_v3', 'vmt_pms_kpiform_assigned_v3.id', '=', 'vmt_pms_kpiform_reviews_v3.vmt_kpiform_assigned_v3_id')
        ->where('vmt_pms_kpiform_assigned_v3.assignee_id', $current_user_id)->get()->toarray();

        // dd($getallrecord);

        if(empty($getallrecord)){
            return response()->json([
                "status" => "success",
                "data" => "No records",
            ]);
        }

        $temp = [];
        $self_array = [];
        foreach($getallrecord as $key => $single_record){

                    if($single_record['is_assignee_accepted'] == 1 && $single_record['is_reviewer_accepted'] == ''){

                    $temp[$key]['assignee_id'] = $single_record['assignee_id'];
                    $temp[$key]['assignee_name'] = user::where('id', $single_record['assignee_id'])->first()->name;
                    $temp[$key]['is_assignee_accepted'] = $single_record['is_assignee_accepted'];
                    $temp[$key]['is_assignee_submitted'] = $single_record['is_assignee_submitted'];
                    $temp[$key]['is_reviewer_accepted'] = $single_record['is_reviewer_accepted'];
                    $temp[$key]['is_reviewer_submitted'] = $single_record['is_reviewer_submitted'];
                    $temp[$key]['reviewer_kpi_review'] = $single_record['reviewer_kpi_review'];
                    $temp[$key]['reviewer_kpi_percentage'] = $single_record['reviewer_kpi_percentage'];
                    $temp[$key]['reviewer_kpi_comments'] = $single_record['reviewer_kpi_comments'];

                    $form_header = VmtPmsKpiFormV3::where('id', $single_record['vmt_pms_kpiform_v3_id'])->first()->available_headers;
                    $temp[$key]['form_header'] = explode(',', $form_header);

                    $form_details = VmtPmsKpiFormDetailsV3::where('vmt_pms_kpiform_v3_id', $single_record['vmt_pms_kpiform_v3_id'])
                        ->join('vmt_pms_kpiform_v3', 'vmt_pms_kpiform_v3.id', '=', 'vmt_pms_kpiform_details_v3.vmt_pms_kpiform_v3_id')
                        ->get(['vmt_pms_kpiform_details_v3.id','objective_value'])->toarray();

                    $temp_arr = [];
                        foreach($form_details as $key1 => $single_record){
                            $temp_arr[$key1] = json_decode($single_record['objective_value'],true);
                            $temp_arr[$key1]['id'] = $single_record['id'];
                        }
                    $temp[$key]['kpi_form_details'] = $temp_arr;
                    array_push($self_array,$temp);
                }
            }

        $temp1 = [];
        foreach($getallrecord as $key => $single_record){

                    if($single_record['is_reviewer_accepted'] == 1 && $single_record['is_assignee_accepted'] == ''){

                    $temp1[$key]['assignee_id'] = $single_record['assignee_id'];
                    $temp1[$key]['assignee_name'] = user::where('id', $single_record['assignee_id'])->first()->name;
                    $temp1[$key]['is_assignee_accepted'] = $single_record['is_assignee_accepted'];
                    $temp1[$key]['is_assignee_submitted'] = $single_record['is_assignee_submitted'];
                    $temp1[$key]['is_reviewer_accepted'] = $single_record['is_reviewer_accepted'];
                    $temp1[$key]['is_reviewer_submitted'] = $single_record['is_reviewer_submitted'];
                    $temp1[$key]['reviewer_kpi_review'] = $single_record['reviewer_kpi_review'];
                    $temp1[$key]['reviewer_kpi_percentage'] = $single_record['reviewer_kpi_percentage'];
                    $temp1[$key]['reviewer_kpi_comments'] = $single_record['reviewer_kpi_comments'];

                    $form_header = VmtPmsKpiFormV3::where('id', $single_record['vmt_pms_kpiform_v3_id'])->first()->available_headers;
                    $temp1[$key]['form_header'] = explode(',', $form_header);

                    $form_details = VmtPmsKpiFormDetailsV3::where('vmt_pms_kpiform_v3_id', $single_record['vmt_pms_kpiform_v3_id'])
                        ->join('vmt_pms_kpiform_v3', 'vmt_pms_kpiform_v3.id', '=', 'vmt_pms_kpiform_details_v3.vmt_pms_kpiform_v3_id')
                        ->get(['vmt_pms_kpiform_details_v3.id','objective_value'])->toarray();

                    $temp1_arr = [];
                        foreach($form_details as $key1 => $single_record){
                            $temp1_arr[$key1] = json_decode($single_record['objective_value'],true);
                            $temp1_arr[$key1]['id'] = $single_record['id'];
                        }
                    $temp1[$key]['kpi_form_details'] = $temp1_arr;
                    array_push($self_array,$temp1);
                }
            }

        $temp2 = [];
        foreach($getallrecord as $key => $single_record){

                    if($single_record['is_reviewer_accepted'] == 1 && $single_record['is_assignee_accepted'] == '1'){

                    $temp2[$key]['assignee_id'] = $single_record['assignee_id'];
                    $temp2[$key]['assignee_name'] = user::where('id', $single_record['assignee_id'])->first()->name;
                    $temp2[$key]['is_assignee_accepted'] = $single_record['is_assignee_accepted'];
                    $temp2[$key]['is_assignee_submitted'] = $single_record['is_assignee_submitted'];
                    $temp2[$key]['is_reviewer_accepted'] = $single_record['is_reviewer_accepted'];
                    $temp2[$key]['is_reviewer_submitted'] = $single_record['is_reviewer_submitted'];
                    $temp2[$key]['reviewer_kpi_review'] = $single_record['reviewer_kpi_review'];
                    $temp2[$key]['reviewer_kpi_percentage'] = $single_record['reviewer_kpi_percentage'];
                    $temp2[$key]['reviewer_kpi_comments'] = $single_record['reviewer_kpi_comments'];

                    $form_header = VmtPmsKpiFormV3::where('id', $single_record['vmt_pms_kpiform_v3_id'])->first()->available_headers;
                    $temp2[$key]['form_header'] = explode(',', $form_header);

                    $form_details = VmtPmsKpiFormDetailsV3::where('vmt_pms_kpiform_v3_id', $single_record['vmt_pms_kpiform_v3_id'])
                        ->join('vmt_pms_kpiform_v3', 'vmt_pms_kpiform_v3.id', '=', 'vmt_pms_kpiform_details_v3.vmt_pms_kpiform_v3_id')
                        ->get(['vmt_pms_kpiform_details_v3.id','objective_value'])->toarray();

                    $temp2_arr = [];
                        foreach($form_details as $key1 => $single_record){
                            $temp2_arr[$key1] = json_decode($single_record['objective_value'],true);
                            $temp2_arr[$key1]['id'] = $single_record['id'];
                        }
                    $temp2[$key]['kpi_form_details'] = $temp2_arr;
                    array_push($self_array,$temp2);
                }
            }
                return $self_array;
            }
        }
