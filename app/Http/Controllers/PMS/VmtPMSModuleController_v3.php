<?php

namespace App\Http\Controllers\PMS;

use App\Http\Controllers\Controller;
use App\Models\ConfigPms;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
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


    public function createKpiForm(Request $request){

          $config = ConfigPms::first();

          $kpiTable  = new VmtPMS_KPIFormModel;
          $kpiTable->available_columns        =    $config->selected_columns;
          $kpiTable->author_id       =    Auth::user()->id;
          $kpiTable->form_name     =    $request->name;
          $kpiTable->save();
          $KpiLAST = $kpiTable->id;

          $totRows  = count($request->dimension);
          for ($i=0; $i < $totRows; $i++) {
                  $kpiRow = new VmtPMS_KPIFormDetailsModel;
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
                  $kpiRow->save();

          }
          return "Question Created Successfully";

    }

    public function publishKpiform(Request $request){

           // dd($request->all());

            $validator = Validator::make($request->all(), [
                'calendar_type' => 'required',
                'hidden_calendar_year' => 'required',
                'frequency' => 'required',
                'assignment_period_start' => 'required',
                'department' => 'required',
                'employees' => 'required',
                'reviewer' => 'required',
                'selected_kpi_form_id' => 'required',
            ],$messages = [
                'calendar_type.required' => 'Calendar Type is Required',
                'hidden_calendar_year.required' => 'Year is Required',
                'frequency.required' => 'Frequency is Required',
                'assignment_period_start.required' => 'Assignment Period is Required',
                'department.required' => 'Department is Required',
                'employees.required' => 'Employee is Required',
                'reviewer.required' => 'Reviewer is Required',
                'selected_kpi_form_id.required' => 'KPI Form is Required',
            ]);

            if ($validator->fails())
            {
                return response()->json(['status' => false,'message'=>$validator->messages()->first()]);
            }
            try{
                $hr_details = getOrganization_HR_Details();
                //dd($hr_details);
                if(empty($hr_details))
                {
                    return response()->json(['status' => false,'message'=>'Please assign an HR in Master Configuration settings']);
                }

                $loggedUser = Auth::user();

                $reviewersList = is_array($request->reviewer) ? $request->reviewer : explode(",",$request->reviewer);
                $employeesList = is_array($request->employees) ? $request->employees : explode(",",$request->employees);

                // check if employee is available in reviewer list
                if(count($reviewersList) > 0){
                    foreach($reviewersList as $reviewerCheckAsEmployee){
                        if(in_array($reviewerCheckAsEmployee, $employeesList)){
                            return response()->json(['status' => false, 'message' => "Same User Can't be Employee as well as Reviewer"]);
                        }
                    }
                }
                if(isset($request->hr_id) && !empty($request->hr_id)){
                    if(!in_array($request->hr_id,$reviewersList)){
                        array_push($reviewersList, $request->hr_id);
                    }
                }

                $kpi_AssignedTable  = new VmtPMS_KPIFormAssignedModel;

                $kpi_AssignedTable->vmt_pms_kpiform_id        =   $request->selected_kpi_form_id;
                $kpi_AssignedTable->assignee_id               =   is_array($request->employees) ? implode(",",$request->employees) : $request->employees;
                $kpi_AssignedTable->reviewer_id               =   is_array($request->reviewer) ? implode(",",$request->reviewer) : $request->reviewer;
                $kpi_AssignedTable->assigner_id               =   auth::user()->id;
                $kpi_AssignedTable->calendar_type             =   $request->calendar_type;
                $kpi_AssignedTable->year                      =   $request->hidden_calendar_year;
                $kpi_AssignedTable->frequency                 =   $request->frequency;
                $kpi_AssignedTable->assignment_period         =   $request->assignment_period_start;
                $kpi_AssignedTable->department_id             =   $request->department;

                $kpi_AssignedTable->save();

                // get parent id from logged used id
                $parent_user_code = VmtEmployeeOfficeDetails::where('user_id',$loggedUser->id)->value('l1_manager_code');
                $parentUserID = User::where('user_code',$parent_user_code)->value('id');


                //Based on assignee count, you create records in review table
                $assigneeIdsAll = explode(',',$kpi_AssignedTable->assignee_id );
                $explodedReviewersIds = explode(',',$kpi_AssignedTable->reviewer_id);

                $reviewerAcceptedData = [];
                $reviewerSubmittedData = [];
                foreach($explodedReviewersIds as $reviewer){
                    $reviewerAcceptedData[$reviewer] = "1";
                    if(isset($request->flowCheck) && $request->flowCheck == 3 && $parentUserID == $reviewer){
                        $reviewerAcceptedData[$reviewer] = null;
                    }

                    $reviewerSubmittedData[$reviewer] = null;
                }

                if(count($assigneeIdsAll) > 0){
                    foreach($assigneeIdsAll as $assignee){
                        $assigneeReview = new VmtPMS_KPIFormReviewsModel();
                        $assigneeReview->vmt_pms_kpiform_assigned_id = $kpi_AssignedTable->id;
                        $assigneeReview->assignee_id = $assignee;
                        $assigneeReview->assignee_kpi_status = null;
                        $assigneeReview->reviewer_kpi_status = null;
                        $assigneeReview->is_assignee_submitted = null;
                        if(isset($request->flowCheck) && ($request->flowCheck == 1 || $request->flowCheck == 3))
                        {
                            $assigneeReview->is_assignee_accepted = '1';
                        }else{
                            $assigneeReview->is_assignee_accepted = null;
                        }
                        $assigneeReview->is_reviewer_submitted = json_encode($reviewerSubmittedData);
                        $assigneeReview->is_reviewer_accepted = json_encode($reviewerAcceptedData);
                        $assigneeReview->save();

                        if($request->flowCheck == 1 || $request->flowCheck == 2){
                            $assigneeMailId  = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->where('userid', $assignee)->pluck('officical_mail','userid')->first();

                            $assigneeName = User::where('id',$assignee)->pluck('name')->first();
                            $assignerName = User::where('id',auth::user()->id)->pluck('name')->first();
                            $comments_employee = '';
                            $login_Link=request()->getSchemeAndHttpHost();
                            // dd($hr_details);
                            $emp_avatar    =  json_decode(newgetEmployeeAvatarOrShortName(auth()->user()->id),true);

                            $emp_neutralgender  = getGenderNeutralTerm(auth()->user()->id);

                            //Send mail when flow is 1 or 2 (Flow Checked inside VmtPMSMail_PublishForm)
                            if(!empty($assigneeMailId)){

                                //Send mail to assignee
                                \Mail::to($assigneeMailId)
                                      ->cc($hr_details->officical_mail)
                                      ->send(new VmtPMSMail_PublishForm("none", $assigneeName,
                                                                        $request->hidden_calendar_year,
                                                                        strtoupper($request->assignment_period_start),
                                                                        $assignerName,
                                                                        $comments_employee,
                                                                        $request->flowCheck,
                                                                        $login_Link,
                                                                        $emp_avatar,
                                                                        $emp_neutralgender
                                                                    ));
                            }
                        }
                    }
                }

                if($request->flowCheck == 3){
                    $reviewerMailId  = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->whereIn('userid', explode(',',$kpi_AssignedTable->reviewer_id))->pluck('officical_mail','userid')->toArray();

                    $assigneeName = User::where('id',$assignee)->pluck('name')->first();
                    $assignerName = User::where('id',auth::user()->id)->pluck('name')->first();
                    $comments_employee = '';
                    $login_Link=request()->getSchemeAndHttpHost();

                    if(count($reviewerMailId) > 0){
                        foreach($reviewerMailId as $reviewerId => $reviewerMailSend){
                            $receiverDetails = User::findorfail($reviewerId);
                            $receiverName = isset($receiverDetails) && !empty($receiverDetails->name) ? $receiverDetails->name : '';

                        $emp_avatar    =  json_decode(newgetEmployeeAvatarOrShortName(auth()->user()->id),true);

                        $emp_neutralgender  = getGenderNeutralTerm(auth()->user()->id);

                            \Mail::to($reviewerMailSend)
                            ->cc($hr_details->officical_mail)
                            ->send(new VmtPMSMail_Assignee("none",$request->flowCheck,
                                                           $assigneeName,
                                                           $request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),
                                                           $receiverName,
                                                           $comments_employee,
                                                           $login_Link,
                                                           $emp_avatar,
                                                           $emp_neutralgender
                                                        ));
                        }
                    }
                }
                //Create review record with some default values for :
                //status of assignee,assigner,reviewer ("Pending")
                return response()->json(['status' => true, 'message' => "KPI Published Successfully"]);
                // return "KPI Published Successfully";
               }
               catch(TransportException $e){
                     return response()->json(['status' => true, 'message' => 'KPI Published Successfully','error_verbose' => $e->getMessage()]);

               }
               catch(Exception $e){
                    Log::info('Publish KPI Form V2 Error: '.$e->getMessage());
                    //dd($e);
                    return response()->json(['status' => false, 'message' => 'Something went wrong!','error_verbose' => $e->getMessage()]);
            }
        }

}
