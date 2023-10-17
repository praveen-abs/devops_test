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
use Illuminate\Http\Request;
use App\Services\VmtPMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VmtPMSModuleController_v3 extends Controller
{
    public function showPMSDashboard()
    {
        return "PMS v3 working";
    }

    public function getEmpManagerCode($emp_code){

        // $emp_code = 'PSC0018';

        $arr = [];

        if(!empty($emp_code)){
        $getuser = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')->where('users.user_code',$emp_code)->first();
        if($getuser){
        $getmanagers_L1 = User::where('user_code',$getuser->l1_manager_code)->first()->user_code ?? null;
        if($getmanagers_L1 != null){
            $arr['L1'] = $getmanagers_L1;
        }
    }
}

        if(!empty( $getmanagers_L1)){
            $getuser_1 = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')->where('users.user_code',$getmanagers_L1)->first();
            if($getuser_1){
            $getmanagers_L2 = User::where('user_code',$getuser_1->l1_manager_code)->first()->user_code ?? null;
            if($getmanagers_L2 != null){
                $arr['L2'] = $getmanagers_L2;
            }
        }
    }

        if(!empty( $getmanagers_L2)){
            $getuser_2 = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')->where('users.user_code',$getmanagers_L2)->first();
            if($getuser_2){
            $getmanagers_L3 = User::where('user_code',$getuser_2->l1_manager_code)->first()->user_code ?? null;
            if($getmanagers_L3 != null){
                $arr['L3'] = $getmanagers_L3;
            }
        }
    }

        return ($arr);
    }


    public function getReviewsDetails($emp_code,$flowCheck){

            // $emp_code = 'PSC0020';

           $config = VmtConfigPmsV3::first();

           $selected_level = json_decode($config->reviewers_flow,true);

           $getmanager  = $this->getEmpManagerCode($emp_code);

           $temp = array();
           $res = array();
           foreach($selected_level as $single_level){
            if(isset($getmanager[$single_level['reviewer_level']])){
            $temp["reviewer_id"] =  User::where('user_code',$getmanager[$single_level['reviewer_level']])->first()->id ?? null;
            $temp["reviewer_user_code"] = $getmanager[$single_level['reviewer_level']] ?? null;
            $temp["reviewer_level"] = $single_level['order'];
            if($flowCheck == 3){
                $temp["is_accepted"] = 0;
            }else{
                $temp["is_accepted"] = 1;
            }
            $temp["is_reviewed"] = 0;
            $temp["rejection_comments"] = "";

            array_push($res,$temp);
            }
        }
           return json_encode($res);
    }


    public function createKpiForm(Request $request){

          $config = VmtConfigPmsV3::first();

          $kpiTable  = new VmtPmsKpiFormV3;
          $kpiTable->available_columns        =    $config->selected_columns;
          $kpiTable->author_id       =    Auth::user()->id;
          $kpiTable->form_name     =    $request->name;
          $kpiTable->save();
          $KpiLAST = $kpiTable->id;

          $totRows  = count($request->dimension);
          for ($i=0; $i < $totRows; $i++) {
                  $kpiRow = new VmtPmsKpiFormDetailsV3;
                  $kpiRow->vmt_pms_kpiform_id   =    $KpiLAST;
                  $kpiRow->dimension   =    isset($request->dimension) && isset($request->dimension[$i]) ? $request->dimension[$i] : '';
                  $kpiRow->kpi         =    isset($request->kpi) && isset($request->kpi[$i]) ? $request->kpi[$i] : '';
                  $kpiRow->operational_definition   = isset($request->operational) && isset($request->operational[$i]) ? $request->operational[$i]: '' ;
                  $kpiRow->measure     =    isset($request->measure) && isset($request->measure[$i]) ? $request->measure[$i] : '';
                  $kpiRow->frequency   =    isset($request->frequency) && isset($request->frequency[$i]) ? $request->frequency[$i] : '';
                  $kpiRow->target      =    isset($request->target) && isset($request->target[$i]) ? $request->target[$i] : '';
                  $kpiRow->stretch_target  =    isset($request->stretchTarget) && isset($request->stretchTarget[$i]) ? $request->stretchTarget[$i] : '';
                  $kpiRow->source          =    isset($request->source) && isset($request->source[$i]) ? $request->source[$i] : '';
                  $kpiRow->kpi_weightage   =    isset($request->kpiWeightage) && isset($request->kpiWeightage[$i]) ? $request->kpiWeightage[$i] : '';
                  $kpiRow->matrices   =    isset($request->matrices) && isset($request->matrices[$i]) ? $request->matrices[$i] : '';
                  $kpiRow->save();

          }
          return "Question Created Successfully";

    }

    public function publishPmsform(Request $request){

        $flowcheck = 3;

        $assignee = '145';

        if($flowcheck == 3){

            $publishform =  new VmtPmsKpiFormAssignedV3;
            $publishform->vmt_pms_kpiform_v3_id = '1' ;
            $publishform->assignee_id =  $assignee;
            $publishform->reviewer_id = '215';
            $publishform->assigner_id = '194' ;
            $publishform->calendar_type = 'financial_year' ;
            $publishform->year = 'April - 2023 to March - 2024' ;
            $publishform->frequency = 'quarterly' ;
            $publishform->assignment_period = 'q1' ;
            $publishform->department_id = '1' ;
            $publishform->org_time_period_id = '1' ;
            $publishform->save();

            $reviewer  = new VmtPmsKpiFormReviewsV3;
            $reviewer->vmt_kpiform_assigned_v3_id = $publishform->id;
            $reviewer->assignee_id = $assignee;
            $reviewer->is_assignee_accepted = '1';
            $reviewer->reviewer_details = $this->getReviewsDetails(User::where('id',$assignee)->first()->user_code,$flowcheck);
            $reviewer->save();

        }
        elseif($flowcheck == 2 || $flowcheck == 1){

            foreach($assignee as $single_assigne){

            $publishform =  new VmtPmsKpiFormAssignedV3;
            $publishform->vmt_pms_kpiform_v3_id = '1' ;
            $publishform->assignee_id =  $single_assigne;
            $publishform->reviewer_id = '215';
            $publishform->assigner_id = '215';
            $publishform->calendar_type = 'financial_year' ;
            $publishform->year = 'April - 2023 to March - 2024' ;
            $publishform->frequency = 'quarterly' ;
            $publishform->assignment_period = 'q1' ;
            $publishform->department_id = '1' ;
            $publishform->org_time_period_id = '1' ;
            $publishform->save();

            $reviewer  = new VmtPmsKpiFormReviewsV3;
            $reviewer->vmt_kpiform_assigned_v3_id = $publishform->id;
            $reviewer->assignee_id = $single_assigne;
            $reviewer->is_reviewer_accepted = '1';
            $reviewer->reviewer_details = $this->getReviewsDetails(User::where('id',$single_assigne)->first()->user_code,$flowcheck);
            $reviewer->save();

            }
        }

        return "saved";

    }

    public function Approverflow(){

    $gt = VmtPmsKpiFormReviewsV3::join('vmt_pms_kpiform_assigned_v3','vmt_pms_kpiform_assigned_v3.id','=','vmt_pms_kpiform_reviews_v3.vmt_kpiform_assigned_v3_id')
                                ->get()->toarray();
        $user_id = auth()->user()->id;
        $getAllRecords = array();
        foreach($gt as $key => $single_value){
            $getAllRecords[$key]['assignee_id'] =  $single_value['assignee_id'];
            $getAllRecords[$key]['assignee_name'] =  user::where('id',$single_value['assignee_id'])->first()->name;
            $getAllRecords[$key]['is_assignee_accepted'] =  $single_value['is_assignee_accepted'];
            $getAllRecords[$key]['is_assignee_submitted'] =  $single_value['is_assignee_submitted'];
            $getAllRecords[$key]['reviewer_details']  = (json_decode($single_value['reviewer_details'],true));
            $getAllRecords[$key]['is_reviewer_accepted']  = $single_value['is_reviewer_accepted'];
            $getAllRecords[$key]['is_reviewer_submitted']  = $single_value['is_reviewer_submitted'];
            $getAllRecords[$key]['reviewer_kpi_review']  = $single_value['reviewer_kpi_review'];
            $getAllRecords[$key]['reviewer_kpi_percentage']  = $single_value['reviewer_kpi_percentage'];
            $getAllRecords[$key]['reviewer_kpi_comments']  = $single_value['reviewer_kpi_comments'];

            $form_header = VmtPmsKpiFormV3::where('id',$single_value['vmt_pms_kpiform_v3_id'])->first()->available_columns;
            $getAllRecords[$key]['form_header']  = explode(',',$form_header);

            $form_details = VmtPmsKpiFormDetailsV3::where('vmt_pms_kpiform_v3_id', $single_value['vmt_pms_kpiform_v3_id'])
                            ->join('vmt_pms_kpiform_v3','vmt_pms_kpiform_v3.id','=','vmt_pms_kpiform_details_v3.vmt_pms_kpiform_v3_id')
                            ->get(
                                ['vmt_pms_kpiform_details_v3.id',
                                'vmt_pms_kpiform_details_v3.dimension',
                                'vmt_pms_kpiform_details_v3.Kpi',
                                'operational_definition',
                                'measure',
                                'frequency',
                                'target',
                                'stretch_target',
                                'source',
                                'kpi_weightage',
                                'matrices',]
                                )->toarray();

            $getAllRecords[$key]['kpi_form_details'] = $form_details;
        }

        $pending_records = [];
        foreach($getAllRecords as $single_record){
            $arr = [];
                foreach($single_record['reviewer_details'] as $key => $single_approvers){
                        $arr[$single_approvers['reviewer_level']] = $single_approvers;
                }
                foreach($arr as $single_arr){
                    if($user_id == $single_arr['reviewer_id']){
                        $current_user_order = $single_arr['reviewer_level'];
                        if($current_user_order == 1){
                            if($arr[$current_user_order]['is_accepted'] == 0){
                                array_push($pending_records,$single_record);
                            }
                        }elseif($current_user_order == 2){
                            if($arr[$current_user_order - 1]['is_accepted'] == 1 && $arr[$current_user_order]['is_accepted'] == 0){
                                array_push($pending_records,$single_record);
                            }
                        }elseif($current_user_order == 3){
                            if($arr[$current_user_order - 1]['is_accepted'] == 1 && $arr[$current_user_order]['is_accepted'] == 0){
                                array_push($pending_records,$single_record);
                            }
                        }elseif($current_user_order == 4){
                            if($arr[$current_user_order - 1]['is_accepted'] == 1 && $arr[$current_user_order]['is_accepted'] == 0){
                                array_push($pending_records,$single_record);
                            }
                        }
                    }
                }
        }

       return $pending_records;

    }

    public function ApproveOrReject(Request $request){

        $user_id = auth()->user()->id;

        $record_id = '12';
        $status = '1';    // approve or reject
        $reviewer_comments = 'approved';

        $get_record = VmtPmsKpiFormReviewsV3::where('id',$record_id)->first();
        $reviewer_details = json_decode($get_record->reviewer_details,true);

        for($i=0; $i< count($reviewer_details); $i++){
                if($reviewer_details[$i]['reviewer_id'] == $user_id){
                    $reviewer_details[$i]['is_accepted'] = $status;
                    $reviewer_details[$i]['rejection_comments'] = $reviewer_comments;
                }
        }
          $result  =  json_encode($reviewer_details);

          $get_record->reviewer_details = $result;
          $get_record->save();

    }

}
