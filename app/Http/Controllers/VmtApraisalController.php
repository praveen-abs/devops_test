<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ApraisalQuestion;
use App\Imports\ApraisalQuestionReview;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtKPITable;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\ConfigPms;
use App\Models\Department;
use App\Mail\VmtAssignGoals;
use App\Mail\NotifyPMSManager;
use App\Mail\PMSReviewCompleted;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ApraisalQuestionExport;
use Session;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;

class VmtApraisalController extends Controller
{
    //
    public function index(){
        $questionList = VmtAppraisalQuestion::all();
        //dd($questions);
        return view('vmt_apraisalQuestions', compact('questionList'));
    }

    public function department(Request $request) {
        $department = VmtEmployeeOfficeDetails::join('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
        ->select(
            'users.name', 
            'users.avatar as avatar', 
            'vmt_employee_office_details.emp_id as id',
            'vmt_employee_office_details.l1_manager_code as code',
        )
        ->orderBy('users.name', 'ASC')
        ->where('department_id', $request->id)
        ->get();
        $data['emp'] = $department;
        $data['rev'] = '';
        if ($department) {
            $data['rev'] = VmtEmployeeOfficeDetails::join('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'users.email', 
                'users.avatar as avatar',
                'vmt_employee_office_details.emp_id as id',
                'vmt_employee_office_details.l1_manager_code as code',
            )
            ->orderBy('users.name', 'ASC')
            ->where('l1_manager_code', $department[0]->code)
            ->first();
        }
        return response()->json($data);
    }

    public function uploadFileReview(Request $request) {
        $importDataArry = \Excel::toArray(new ApraisalQuestionReview, request()->file('upload_file'));
        return response()->json($importDataArry);
    }
    
    public function uploadFile(Request $request) {
        $importDataArry = \Excel::toArray(new ApraisalQuestion, request()->file('upload_file'));
        return response()->json($importDataArry);
    }

    public function downloadFile(Request $request) {
        $id = $request->id;
        return Excel::download(new ApraisalQuestionExport($id), 'download.xlsx');
    }

    //
    public function bulkUploadQuestion(){
        $importDataArry = \Excel::import(new ApraisalQuestion, request()->file('file'));
        return 'Question Created Successfully';
    }

    // assign goals forms
    public function vmtAssignGoals(Request $request){
        $empGoalQuery = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
                            ->leftJoin('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
                            ->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'vmt_employee_details.id')
                            ->select(
                                'vmt_employee_details.*', 
                                'users.name as emp_name', 
                                'users.email as email_id',
                                'users.avatar as avatar',
                                'vmt_employee_office_details.department_id',
                                'vmt_employee_office_details.designation', 
                                'vmt_employee_office_details.l1_manager_code',
                                'vmt_employee_office_details.l1_manager_name',
                                'vmt_employee_office_details.l1_manager_designation',
                                'vmt_employee_pms_goals_table.assignment_period',
                                'vmt_employee_pms_goals_table.kpi_table_id',
                                'vmt_employee_pms_goals_table.is_manager_approved',
                                'vmt_employee_pms_goals_table.is_manager_submitted',
                                'vmt_employee_pms_goals_table.is_employee_submitted',
                                'vmt_employee_pms_goals_table.is_employee_accepted',
                                'vmt_employee_pms_goals_table.author_id',
                                'vmt_employee_pms_goals_table.hr_kpi_percentage',
                            )
                            ->orderBy('created_at', 'DESC')
                            ->whereNotNull('emp_no');
                            //->get();


        $userCount = User::count();
        $config = ConfigPms::where('user_id', auth()->user()->id)->first();
        $show['dimension'] = 'true';
        $show['kpi'] = 'true';
        $show['operational'] = 'true';
        $show['measure'] = 'true';
        $show['frequency'] = 'true';
        $show['target'] = 'true';
        $show['stretchTarget'] = 'true';
        $show['source'] = 'true';
        $show['kpiWeightage'] = 'true';
        if ($config) {
            $config->header = json_decode($config->column_header, true);
            $show['dimension'] = $config->selected_columns && in_array('dimension', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['kpi'] = $config->selected_columns && in_array('kpi', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['operational'] = $config->selected_columns && in_array('operational', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['measure'] = $config->selected_columns && in_array('measure', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['frequency'] = $config->selected_columns && in_array('frequency', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['target'] = $config->selected_columns && in_array('target', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['stretchTarget'] = $config->selected_columns && in_array('stretchTarget', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['source'] = $config->selected_columns && in_array('source', explode(',', $config->selected_columns)) ? 'true': 'false';
            $show['kpiWeightage'] = $config->selected_columns && in_array('kpiWeightage', explode(',', $config->selected_columns)) ? 'true': 'false';
        }
        //dd($userCount);
        $empCount = VmtEmployeePMSGoals::groupBy('employee_id')->count();
        $subCount = VmtEmployeePMSGoals::groupBy('employee_id')->where('is_hr_submitted', true)->count();
        $department = Department::where('status', 'A')->get();
        if (auth()->user()->hasrole('Employee')) {
            $emp = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->where('userid', auth()->user()->id)->first();
            $rev = VmtEmployee::where('emp_no', $emp->l1_manager_code)->first();
            $users = User::where('id', $rev->userid)->get();
            $empGoals = $empGoalQuery->where('users.id', auth::user()->id)->get();
            foreach ($empGoals as $emp) {
                if ($config && $config->selected_head == 'manager') {
                    $per = json_decode($emp->manager_kpi_percentage, true) ? json_decode($emp->manager_kpi_percentage, true) : [];
                } else {
                    $per = json_decode($emp->hr_kpi_percentage, true) ? json_decode($emp->hr_kpi_percentage, true) : [];
                }
                if (count($per) > 0) {
                    $emp['ranking'] = 0;
                    $emp['rating'] = array_sum($per)/count($per);
                    if ($emp['rating'] < 60) {
                        $emp['ranking'] = 1;
                    } elseif ($emp['rating'] >= 60 && $emp['rating'] < 70) {
                        $emp['ranking'] = 2;
                    } elseif ($emp['rating'] >= 70 && $emp['rating'] < 80) {
                        $emp['ranking'] = 3;
                    } elseif ($emp['rating'] >= 80 && $emp['rating'] < 90) {
                        $emp['ranking'] = 4;
                    } elseif ($emp['rating'] >= 90) {
                        $emp['ranking'] = 5;
                    } else{
                        $emp['ranking'] = 0;
                    }
                }
            }
            return view('vmt_pms_assigngoals', compact('users','empGoals','userCount','empCount','subCount', 'config', 'show', 'department'));
        } elseif (auth()->user()->hasrole('Manager')) {
            $empGoals = $empGoalQuery->get();

            $getId = VmtEmployee::where('userid', auth()->user()->id)->first();
            $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'vmt_employee_details.*', 
                'users.name as emp_name', 
                'users.avatar as avatar', 
            )
            ->orderBy('created_at', 'ASC')
            ->whereNotNull('emp_no')
            ->get();
             $users = User::join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.reviewer_id', '=', 'users.id')->get();
        } else {
            $empGoals = $empGoalQuery->get();

            $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'vmt_employee_details.*', 
                'users.name as emp_name', 
                'users.avatar as avatar', 
            )
            ->orderBy('created_at', 'ASC')
            ->whereNotNull('emp_no')
            ->get();

            $currentEmpCode = VmtEmployee::where('userid', auth::user()->id)->first()->value('emp_no');
            //$mgr_assignee = User::join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'users.id')->pluck('name');

            $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'users.id as id',
                'vmt_employee_office_details.officical_mail as email',
            )
            ->orderBy('users.name', 'ASC')
            ->where('l1_manager_code', strval($currentEmpCode))
            ->get();
            
            //dd($users);
            // ->select('users.id' ,'users.name')
            // ->
            // ->get();
        }
        foreach ($empGoals as $emp) {
            $emp['ranking'] = 0;
            if ($config && $config->selected_head == 'manager') {
                $per = json_decode($emp->manager_kpi_percentage, true) ? json_decode($emp->manager_kpi_percentage, true) : [];
            } else {
                $per = json_decode($emp->hr_kpi_percentage, true) ? json_decode($emp->hr_kpi_percentage, true) : [];
            }
            if (count($per) > 0) {
                $emp['rating'] = array_sum($per)/count($per);
                if ($emp['rating'] < 60) {
                    $emp['ranking'] = 1;
                } elseif ($emp['rating'] >= 60 && $emp['rating'] < 70) {
                    $emp['ranking'] = 2;
                } elseif ($emp['rating'] >= 70 && $emp['rating'] < 80) {
                    $emp['ranking'] = 3;
                } elseif ($emp['rating'] >= 80 && $emp['rating'] < 90) {
                    $emp['ranking'] = 4;
                } elseif ($emp['rating'] >= 90) {
                    $emp['ranking'] = 5;
                } else{
                    $emp['ranking'] = 0;
                }
            }
        }

        return view('vmt_pms_assigngoals', compact('users', 'employees','empGoals','userCount','empCount','subCount', 'config', 'show', 'department'));
    }

    public function getL1_ManagerName()
    {

    }

    public function vmtGetAllChildEmployees(Request $request)
    {
        if($request->has("emp_id")){

            $currentEmpCode = VmtEmployee::where('userid',$request->emp_id)->pluck('emp_no');
            $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'vmt_employee_office_details.emp_id as id',
                'vmt_employee_office_details.l1_manager_code as code',
            )
            ->orderBy('users.name', 'ASC')
            ->where('l1_manager_code', $currentEmpCode)
            ->get();
            return $users;

        }

        return array();
    }

    // publish goals
    public function vmtPublishGoals(Request $request){
        //dd($request->all());
        if($request->has("employees")){
            $employeeList  = explode(',', $request->employees[0]); 
            $mailingEmpList  = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->whereIn('userid', $employeeList)->pluck('officical_mail','userid'); 
            $mailingRevList  = VmtEmployeeOfficeDetails::whereIn('id', array($request->reviewer))->pluck('officical_mail'); 
            $user_emp_name = User::where('id',$request->reviewer)->pluck('name')->first();
            $user_manager_name = User::where('id',auth::user()->id)->pluck('name')->first();
            //dd($employeeList);
            $command_emp = "";
            foreach ($employeeList as $index => $value) {
                // code...
                if ($request->goal_id && $request->goal_id <> '' && $request->goal_id > 0) {
                    $empPmsGoal = VmtEmployeePMSGoals::find($request->goal_id); 
                } else {
                    $empPmsGoal = new VmtEmployeePMSGoals; 
                }
                $empPmsGoal->kpi_table_id   = $request->kpitable_id;
                $empPmsGoal->assignment_period = json_encode(['calendar_type'=>$request->calendar_type, 'year'=>$request->hidden_calendar_year, 'frequency'=>$request->frequency, 'assignment_period_start'=>$request->assignment_period_start]);
                //$empPmsGoal->assignment_period_start = $request->assignment_period_start;
                //$empPmsGoal->assignment_period_end = $request->assignment_period_end;
                //$empPmsGoal->assignment_period_year = $request->assignment_period_year;
                $empPmsGoal->coverage     = $request->coverage;
                $empPmsGoal->reviewer_id  = $request->reviewer;
                $empPmsGoal->employee_id  = $value; 
                $empPmsGoal->mail_link    = url('vmt-pmsappraisal-review'); 
                $empPmsGoal->author_id    = auth::user()->id; 
                if(auth::user()->hasRole(['HR','Admin']) ){

                    $empPmsGoal->is_employee_accepted  = true;
                    $empPmsGoal->is_employee_submitted  = false;
                    $empPmsGoal->is_manager_approved  = true;
                    $empPmsGoal->is_manager_submitted  = false;
                    $empPmsGoal->is_hr_submitted  = false;

                }
                // else
                if(auth::user()->hasRole(['Employee','Manager']) ){
                    
                    // if employeee is creating kpi table
                    if($value == auth::user()->id){
                        $empPmsGoal->is_employee_accepted  = true;//When Mgr sets KPI
                        $empPmsGoal->is_manager_approved  = false;//When Mgr sets KPI
                    }else{
                        $empPmsGoal->is_employee_accepted  = false;//When manager sets KPI
                        $empPmsGoal->is_manager_approved  = true;//When Mgr sets KPI

                    }

                   
                    $empPmsGoal->is_employee_submitted  = false;
                    $empPmsGoal->is_manager_submitted  = false;
                    $empPmsGoal->is_hr_submitted  = false;
                }

                $empPmsGoal->save();
                }
                 $notification_user = User::where('id',auth::user()->id)->first();
                    //dd($user_emp_name);exit();
                if (auth()->user()->hasrole('Employee')) {
                     \Mail::to($mailingRevList)->send(new VmtAssignGoals("none",$user_emp_name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$user_manager_name,$command_emp));

                 $message = "Employee has created Personal Assessment goal ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
            } else {
                
                $message = "KRA's/goals in conformation with your reporting manage ";
               $finalMailList = $mailingEmpList->merge($mailingRevList);
                 Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
              foreach ($finalMailList as $recipient) {
                \Mail::to($recipient)->send(new VmtAssignGoals("none", $user_emp_name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$user_manager_name,$command_emp));
            }
            }
            return "Question Created Successfully";
        }
        return "Permission Denied";

    }

    // Store Assigned Goals
    public function vmtStoreKpiTable(Request $request){
        //return "Stored";
        if($request->has('dimension')){
            $totRows  = count($request->dimension);
            //dd($totRows);
            $kpiRows = [];
            for ($i=0; $i < $totRows; $i++) { 
                // code...
                if ($request->kpi_id && $request->kpi_id[$i] <> '' && $request->kpi_id[$i] > 0) {
                    $kpiRow = VmtAppraisalQuestion::find($request->kpi_id[$i]);
                } else {
                    $kpiRow = new VmtAppraisalQuestion;
                }
                //$inputArry[] = $request->dimension[$i];

                $kpiRow->dimension   =    $request->dimension[$i]; 
                $kpiRow->kpi         =    $request->kpi[$i]; 
                $kpiRow->operational_definition   = $request->operational[$i] ;     
                $kpiRow->measure     =    $request->measure[$i];  
                $kpiRow->frequency   =    $request->frequency[$i];  
                $kpiRow->target      =    $request->target[$i];  
                $kpiRow->stretch_target  =    $request->stretchTarget[$i];   
                $kpiRow->source          =    $request->source[$i];  
                $kpiRow->kpi_weightage   =    $request->kpiWeightage[$i];  
                $kpiRow->author_id       =    auth::user()->id; 
                $kpiRow->author_name     =    auth::user()->name;  
                $kpiRow->save();
                $kpiRows[] = $kpiRow->id; 
            } 
            if(count($kpiRows) > 0){
                if ($request->kpi_table_id && $request->kpi_table_id <> '' && $request->kpi_table_id > 0) {
                    $kpiTable  = VmtKPITable::find($request->kpi_table_id); 
                } else {
                    $kpiTable  = new VmtKPITable; 
                }
                $kpiTable->kpi_rows        =    implode(',', $kpiRows);
                $kpiTable->author_id       =    auth::user()->id; 
                $kpiTable->author_name     =    auth::user()->name;  
                $kpiTable->save();

                return array("status" => true, "table_id" => $kpiTable->id); 
            }
            dd($inputArry);
        }
        dd($request->all());
    }

    // 
    public function addNewQuestion(Request $request)
    {
        //dd($request->all());
        // code...

        $row = $request->all();

        $vmtApQuestion = new VmtAppraisalQuestion; 
        $vmtApQuestion->dimension   =    $row["dimension"]; 
        $vmtApQuestion->kpi         =    $row["kpi"]; 
        $vmtApQuestion->operational_definition   =    $row["operational_definition"];  
        $vmtApQuestion->measure     =    $row["measure"];  
        $vmtApQuestion->frequency   =    $row["frequency"];  
        $vmtApQuestion->target      =    $row["target"];  
        $vmtApQuestion->stretch_target  =    $row["stretch_target"];   
        $vmtApQuestion->source          =    $row["source"];  
        $vmtApQuestion->kpi_weightage   =    $row["kpi_weightage"];  
        $vmtApQuestion->author_id       =    auth::user()->id; 
        $vmtApQuestion->author_name     =    auth::user()->name;  
        $vmtApQuestion->save();

        return "Saved";
    }

    // edit questions
    public function edit($id, Request $request)
    {
        //dd($id);
        $question = VmtAppraisalQuestion::find($id);
        return view('vmt_editApraisalQuestion', compact('question'));
    }

    // update questions
    public function update($id, Request $request){
        //dd($request->all());
        $row = $request->all();
        $vmtApQuestion =  VmtAppraisalQuestion::find($id); 
        $vmtApQuestion->dimension   =    $row["dimension"]; 
        $vmtApQuestion->kpi         =    $row["kpi"]; 
        $vmtApQuestion->operational_definition   =    $row["operational_definition"];  
        $vmtApQuestion->measure     =    $row["measure"];  
        $vmtApQuestion->frequency   =    $row["frequency"];  
        $vmtApQuestion->target      =    $row["target"];  
        $vmtApQuestion->stretch_target  =    $row["stretch_target"];   
        $vmtApQuestion->source          =    $row["source"];  
        $vmtApQuestion->kpi_weightage   =    $row["kpi_weightage"];
        $vmtApQuestion->save();

        return "Updated";
    }

    // delete questions
    public function delete(Request $request){
        VmtAppraisalQuestion::find($request->id)->delete(); 
        return 'Question Deleted';
    }

    public function approveRejectCommandKPITable(Request $request){
    
        if(auth::user()->hasRole('Employee') ){
           $vmtEmployeeGoal =   VmtEmployeePMSGoals::where('kpi_table_id', $request->goal_id)->where('employee_id', $request->user_id)->first(); 
           $vmtEmployeeGoal->employee_rejection_comments = $request->content;
           $vmtEmployeeGoal->save();
           $returnMsg="--";
           return $returnMsg;
        }
        
        if(auth::user()->hasRole('Manager') ){
            $vmtEmployeeGoal =   VmtEmployeePMSGoals::where('kpi_table_id', $request->goal_id)->where('employee_id', $request->user_id)->first(); 
            $vmtEmployeeGoal->manager_rejection_comments = $request->content;
            $vmtEmployeeGoal->save();
            $returnMsg="--";
            return $returnMsg;
        }

        return "Error !";
    }

    //Used by both Employee and Manager KPI approval.
    public function approveRejectKPITable(Request $request){
     // dd($request->all());exit();
        $user_emp_name= User::where('id',auth::user()->id)->pluck('name')->first();
        $user_manager_name = User::where('id',$request->user_id)->pluck('name')->first();
            $command_emp = $request->command;
        if(auth::user()->hasRole('Employee') ){

           $vmtEmployeeGoal =   VmtEmployeePMSGoals::where('kpi_table_id', $request->goal_id)->where('employee_id', $request->user_id)->first(); 
           $vmtEmployeeGoal->is_employee_submitted = $request->approve_flag ? 1 : 0;
           $vmtEmployeeGoal->is_employee_accepted = $request->approve_flag == 'approved' ? 1 : 0;
           $vmtEmployeeGoal->save();
           $returnMsg="--";
            //print_r("ooooo".$command_emp);
           // is_manager_approved
           //dd($request->approve_flag);

           $mailingList = VmtEmployeeOfficeDetails::where('user_id', $vmtEmployeeGoal->reviewer_id)->pluck('officical_mail');
            $notification_user = User::where('id',auth::user()->id)->first();
           if($request->approve_flag == "approved")
           {
                \Mail::to($mailingList)->send(new VmtAssignGoals( "approved",$user_emp_name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$user_manager_name,$command_emp));
                $returnMsg = 'KPI has been accepted. Mail notification sent';
                 $message = "KPI has been accepted.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
           }
           else
           if($request->approve_flag == "rejected")
           {
                \Mail::to($mailingList)->send(new VmtAssignGoals( "rejected",$user_emp_name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$user_manager_name,$command_emp));
                $returnMsg = 'KPI has been rejected. Mail notification sent';
                 $message = "KPI has been rejected.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));

           }

           return $returnMsg;
        }
        
        if(auth::user()->hasRole('Manager') ){
            $vmtEmployeeGoal =   VmtEmployeePMSGoals::where('kpi_table_id', $request->goal_id)->where('employee_id', $request->user_id)->first(); 
            $vmtEmployeeGoal->is_manager_submitted = $request->approve_flag ? 1 : 0;
            $vmtEmployeeGoal->is_manager_approved = $request->approve_flag == 'approved' ? 1 : 0;
            $vmtEmployeeGoal->save();


            $mailingList = VmtEmployeeOfficeDetails::where('user_id', $vmtEmployeeGoal->employee_id)->pluck('officical_mail');

             $notification_user = User::where('id',auth::user()->id)->first();
           if($request->approve_flag == "approved")
           {
                \Mail::to($mailingList)->send(new VmtAssignGoals("approved",$user_emp_name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$user_manager_name,$command_emp));
                $returnMsg = 'KPI has been approved. Mail notification sent';
                 $message = "KPI has been approved.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
           }
           else
           if($request->approve_flag == "rejected")
           {
                \Mail::to($mailingList)->send(new VmtAssignGoals("rejected",$user_emp_name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$user_manager_name,$command_emp));
                $returnMsg = 'KPI has been rejected. Mail notification sent';
                 $message = "KPI has been rejected.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
           }


            return $returnMsg;
        }

        return "Error !";
    }

    // show kpi table assigned for employees
    public function showEmployeeApraisalReview(Request $request)
    {
        // code...
        $employeeData    = VmtEmployee::where('userid', auth::user()->id)->first();
        $kpiRows  = [];
        $kpiRowsId = '';

        if($employeeData){
            $assignedGoals  = VmtEmployeePMSGoals::where('kpi_table_id', $request->id)->where('employee_id', auth::user()->id)->orderBy('updated_at', 'DESC')->first();
            //dd($assignedGoals);
            $showModal = false;
            $reviewCompleted = false; 

            if($assignedGoals){
                $showModal = $assignedGoals->is_employee_accepted ? false : true;
                $kpiData  = VmtKPITable::find($assignedGoals->kpi_table_id);
                //dd($kpiData);
                if($kpiData){
                    $kpiRowArray  =  explode(',', $kpiData->kpi_rows);
                    //dd($kpiRowArray);
                    $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();
                    $ids      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->pluck('id')->toArray();
                    if ($ids) {
                        $kpiRowsId = implode(',', $ids);
                    }
                    $reviewCompleted = false;
                    if($assignedGoals->self_kpi_review != null){
                        $reviewArray = (json_decode($assignedGoals->self_kpi_review, true));
                        $percentArray = (json_decode($assignedGoals->self_kpi_percentage, true));
                        $commentArray = (json_decode($assignedGoals->self_kpi_comments, true));
                        foreach ($kpiRows as $index => $value) {
                            // code...
                            $kpiRows[$index]['self_kpi_review'] = $reviewArray[$value->id];
                            $kpiRows[$index]['self_kpi_percentage'] = $percentArray[$value->id];
                            $kpiRows[$index]['self_kpi_comments'] = $commentArray[$value->id];
                        }
                    }

                    if($assignedGoals->manager_kpi_review != null){
                        $reviewArrayManager = (json_decode($assignedGoals->manager_kpi_review, true)) ? (json_decode($assignedGoals->manager_kpi_review, true)) : [];
                        $percentArrayManager = (json_decode($assignedGoals->manager_kpi_percentage, true)) ? (json_decode($assignedGoals->manager_kpi_percentage, true)) : [];
                        foreach ($kpiRows as $index => $value) {
                            // code...
                            if (count($reviewArrayManager) > 0) {
                                $kpiRows[$index]['manager_kpi_review'] = $reviewArrayManager[$value->id];
                            }
                            if (count($percentArrayManager) > 0) {
                                $kpiRows[$index]['manager_kpi_percentage'] = $percentArrayManager[$value->id];
                            }
                        }
                    }

                    if($assignedGoals->hr_kpi_review != null){
                        $reviewHrArray = (json_decode($assignedGoals->hr_kpi_review, true)) ? (json_decode($assignedGoals->hr_kpi_review, true)) : [];
                        $percentHrArray = (json_decode($assignedGoals->hr_kpi_percentage, true)) ? (json_decode($assignedGoals->hr_kpi_percentage, true)) : [];
                        foreach ($kpiRows as $index => $value) {
                            // code...
                            if (count($reviewHrArray) > 0) {
                                $kpiRows[$index]['hr_kpi_review'] = $reviewHrArray[$value->id];
                            }
                            if (count($percentHrArray) > 0) {
                                $kpiRows[$index]['hr_kpi_percentage'] = $percentHrArray[$value->id];
                            }
                        }

                    }
                }

                if($assignedGoals->is_hr_submitted)
                    $reviewCompleted = true;
                    
                $ratingDetail = [];
                $per = json_decode($assignedGoals->hr_kpi_percentage, true) ? json_decode($assignedGoals->hr_kpi_percentage, true) : [];
                if (count($per) > 0) {
                    $ratingDetail['rating'] = array_sum($per)/count($per);
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
                    } else{
                        $ratingDetail['performance'] = "error";
                        $ratingDetail['ranking'] = 000;
                        $ratingDetail['action'] = '0000%';                      
                    }
                }

                return view('vmt_appraisalreview_employee', compact('kpiRows', 'employeeData', 'assignedGoals', 'showModal', 'reviewCompleted', 'ratingDetail', 'kpiRowsId'));
            }else{
                $reviewCompleted = false;
                return view('vmt_appraisalreview_employee', compact('kpiRows', 'employeeData', 'assignedGoals', 'showModal', 'reviewCompleted', 'kpiRowsId'));
            }
        }
        return view('vmt_appraisalreview');
    }

    // 
    public function storeEmployeeApraisalReview(Request $request){
        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);
        if($kpiData){
            $kpiData->self_kpi_review      = $request->selfreview; //null
            $kpiData->self_kpi_percentage  = $request->selfkpiachievement; //null
            $kpiData->self_kpi_comments    = $request->selfcomments;//null
            $kpiData->is_employee_submitted = 1;//true
            $kpiData->save();
            $notification_user = User::where('id',auth::user()->id)->first();
            $reviewManager = User::find($kpiData->reviewer_id);
            //dd($reviewManager->email);
            $managerOfficeDetails =  VmtEmployeeOfficeDetails::where('user_id', $kpiData->reviewer_id)->first();
            $currentUser_empDetails = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first();

            \Mail::to($managerOfficeDetails->officical_mail)->send(new NotifyPMSManager(auth::user()->name, $currentUser_empDetails->designation, $reviewManager->name ));
             $message = "Employee has submitted KPI Assessment.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        }
        return "Published Review successfully.Sent mail to manager ".$managerOfficeDetails->officical_mail;
    }

    // Manger review : to see kpi table filled by employees
    public function showManagerApraisalReview(Request $request){
        // show review for HR
        if(auth::user()->hasRole(['HR','Admin']) ){
            //dd("INside HR login");
            //$pmsGoalList  = VmtEmployeePMSGoals::select('vmt_employee_details.emp_name', 'vmt_employee_pms_goals_table.*' )->rightJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_pms_goals_table.author_id')->orderBy('updated_at', 'DESC')->get();
            $kpiRowsId = '';
            if($request->has('goal_id')){
                //dd($t_assignedEmp_manager_name);
    
                $assignedGoals  = VmtEmployeePMSGoals::where('kpi_table_id',$request->goal_id)->where('employee_id', $request->user_id)->first();

                $assignedEmployee_Userdata = User::where('id',  $assignedGoals->employee_id)->first();
                $assignedEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $assignedGoals->employee_id)->first();
    
                //Get assigned employee manager name
                $assignedEmp_manager_name = User::join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('vmt_employee_details.emp_no', $assignedEmployeeOfficeDetails->l1_manager_code)->pluck('name');

                $employeeData = VmtEmployee::where('userid', $assignedGoals->employee_id)->first();
                $kpiData      = VmtKPITable::find($assignedGoals->kpi_table_id);
                $kpiRowArray  = explode(',', $kpiData->kpi_rows);
                $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();
                $ids      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->pluck('id')->toArray();
                if ($ids) {
                    $kpiRowsId = implode(',', $ids);
                }
                if($assignedGoals->self_kpi_review != null){
                    $reviewArray = (json_decode($assignedGoals->self_kpi_review, true)) ? (json_decode($assignedGoals->self_kpi_review, true)) : [];
                    $percentArray = (json_decode($assignedGoals->self_kpi_percentage, true)) ? (json_decode($assignedGoals->self_kpi_percentage, true)) : [];
                    $commentArray = (json_decode($assignedGoals->self_kpi_comments, true)) ? (json_decode($assignedGoals->self_kpi_comments, true)) : [];
                    foreach ($kpiRows as $index => $value) {
                        // code...
                        $kpiRows[$index]['self_kpi_review'] = $reviewArray[$value->id];
                        $kpiRows[$index]['self_kpi_percentage'] = $percentArray[$value->id];
                        $kpiRows[$index]['self_kpi_comments'] = $commentArray[$value->id];
                    }
                }
                // 
                if($assignedGoals->manager_kpi_review != null){
                    $reviewArrayManager = (json_decode($assignedGoals->manager_kpi_review, true));
                    $percentArrayManager = (json_decode($assignedGoals->manager_kpi_percentage, true));
                    //$commentArray = (json_decode($assignedGoals->self_kpi_comments, true));
                    foreach ($kpiRows as $index => $value) {
                        // code...
                        $kpiRows[$index]['manager_kpi_review'] = $reviewArrayManager[$value->id];
                        $kpiRows[$index]['manager_kpi_percentage'] = $percentArrayManager[$value->id];
                        //$kpiRows[$index]['self_kpi_comments'] = $commentArray[$value->id];
                    }
                }
                $reviewCompleted = false;
                //
                if($assignedGoals->hr_kpi_review != null){
                    $reviewHrArray = (json_decode($assignedGoals->hr_kpi_review, true)) ? (json_decode($assignedGoals->hr_kpi_review, true)) : [];
                    $percentHrArray = (json_decode($assignedGoals->hr_kpi_percentage, true)) ? (json_decode($assignedGoals->hr_kpi_percentage, true)) : [];
                    foreach ($kpiRows as $index => $value) {
                        // code...
                        if (count($reviewHrArray) > 0) {
                            $kpiRows[$index]['hr_kpi_review'] = $reviewHrArray[$value->id];
                        }
                        if (count($percentHrArray) > 0) {
                            $kpiRows[$index]['hr_kpi_percentage'] = $percentHrArray[$value->id];
                        }
                    }

                    $reviewCompleted = true;
                }
                $empSelected = true;
                $ratingDetail = [];
                $per = json_decode($assignedGoals->hr_kpi_percentage, true) ? json_decode($assignedGoals->hr_kpi_percentage, true) : [];
                if (count($per) > 0) {
                    $ratingDetail['rating'] = array_sum($per)/count($per);
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
                //dd($kpiRows);

                return view('vmt_appraisalreview_hr', compact( 'employeeData','assignedEmployee_Userdata','assignedEmp_manager_name','assignedEmployeeOfficeDetails', 'assignedGoals', 'kpiRows', 'empSelected', 'reviewCompleted', 'ratingDetail', 'kpiRowsId'));
            }

            $kpiRows = [];
            $empSelected = false;
            $reviewCompleted = false;
            return view('vmt_appraisalreview_hr', compact('pmsGoalList', 'kpiRows', 'empSelected', 'reviewCompleted', 'kpiRowsId'));
        }



        //$pmsGoalList  = VmtEmployeePMSGoals::select('vmt_employee_details.emp_name', 'vmt_employee_pms_goals_table.*' )->where('reviewer_id', auth::user()->id)->rightJoin('vmt_employee_details', 'vmt_employee_details.id', '=', 'vmt_employee_pms_goals_table.employee_id')->orderBy('updated_at', 'DESC')->get();
        $kpiRowsId = '';
        if($request->has('goal_id')){
            $reviewCompled  = false;
            $assignedGoals  = VmtEmployeePMSGoals::where('kpi_table_id',$request->goal_id)->where('employee_id', $request->user_id)->first();
            
            $assignedEmployee_Userdata = User::where('id',  $assignedGoals->employee_id)->first();

            $employeeData = VmtEmployee::where('userid', $assignedGoals->employee_id)->first();
            //dd($employeeData);
            $assignedEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $assignedGoals->employee_id)->first();

            //Get assigned employee manager name
            $assignedEmp_manager_name = User::join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('vmt_employee_details.emp_no', $assignedEmployeeOfficeDetails->l1_manager_code)->pluck('name');

            //dd($t_assignedEmp_manager_name);


            $kpiData      = VmtKPITable::find($assignedGoals->kpi_table_id);
            $kpiRowArray  = explode(',', $kpiData->kpi_rows);
            $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();
            $ids      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->pluck('id')->toArray();
            if ($ids) {
                $kpiRowsId = implode(',', $ids);
            }
            $reviewCompleted = false;

            if($assignedGoals->self_kpi_review != null){
                $reviewArray = (json_decode($assignedGoals->self_kpi_review, true)) ? (json_decode($assignedGoals->self_kpi_review, true)) : [];
                $percentArray = (json_decode($assignedGoals->self_kpi_percentage, true)) ? (json_decode($assignedGoals->self_kpi_percentage, true)) : [];
                $commentArray = (json_decode($assignedGoals->self_kpi_comments, true)) ? (json_decode($assignedGoals->self_kpi_comments, true)) : [];
                foreach ($kpiRows as $index => $value) {
                    // code...
                    if (count($reviewArray) > 0) {
                        $kpiRows[$index]['self_kpi_review'] = $reviewArray[$value->id];
                    }
                    if (count($percentArray) > 0) {
                        $kpiRows[$index]['self_kpi_percentage'] = $percentArray[$value->id];
                    }
                    if (count($commentArray) > 0) {
                        $kpiRows[$index]['self_kpi_comments'] = $commentArray[$value->id];
                    }
                }
            }

            if($assignedGoals->manager_kpi_review != null){
                $reviewArrayManager = (json_decode($assignedGoals->manager_kpi_review, true)) ? (json_decode($assignedGoals->manager_kpi_review, true)) : [];
                $percentArrayManager = (json_decode($assignedGoals->manager_kpi_percentage, true)) ? (json_decode($assignedGoals->manager_kpi_percentage, true)) : [];
                 
                //dd($reviewArrayManager);

                foreach ($kpiRows as $index => $value) {
                    // code...
                    if (count($reviewArrayManager) > 0) {
                        $kpiRows[$index]['manager_kpi_review'] = $reviewArrayManager[$value->id];
                    }
                    if (count($percentArrayManager) > 0) {
                        $kpiRows[$index]['manager_kpi_percentage'] = $percentArrayManager[$value->id];
                    }
                }
            }

            if($assignedGoals->hr_kpi_review != null){
                $reviewHrArray = (json_decode($assignedGoals->hr_kpi_review, true)) ? (json_decode($assignedGoals->hr_kpi_review, true)) : [];
                $percentHrArray = (json_decode($assignedGoals->hr_kpi_percentage, true)) ? (json_decode($assignedGoals->hr_kpi_percentage, true)) : [];
                foreach ($kpiRows as $index => $value) {
                    // code...
                    if (count($reviewHrArray) > 0) {
                        $kpiRows[$index]['hr_kpi_review'] = $reviewHrArray[$value->id];
                    }
                    if (count($percentHrArray) > 0) {
                        $kpiRows[$index]['hr_kpi_percentage'] = $percentHrArray[$value->id];
                    }
                }

                $reviewCompleted = true;
            }

            $empSelected = true;
            $ratingDetail = [];
            $per = json_decode($assignedGoals->hr_kpi_percentage, true) ? json_decode($assignedGoals->hr_kpi_percentage, true): [];
            if (count($per) > 0) {
                $ratingDetail['rating'] = array_sum($per)/count($per);
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
                } else{
                    $ratingDetail['performance'] = "error";
                    $ratingDetail['ranking'] = 000;
                    $ratingDetail['action'] = '0000%';                      
                }
            }
            //dd($kpiRows);

            return view('vmt_appraisalreview_manager', compact( 'employeeData','assignedEmployee_Userdata','assignedEmp_manager_name','assignedEmployeeOfficeDetails', 'assignedGoals', 'kpiRows', 'empSelected', 'reviewCompleted', 'ratingDetail', 'kpiRowsId'));
        }
        
        $kpiRows = [];
        $empSelected = false;
        $reviewCompleted = false; 
        return view('vmt_appraisalreview_manager', compact( 'kpiRows', 'empSelected', 'reviewCompleted', 'kpiRowsId'));
    }


    public function saveManagerFeedback(Request $request) {
        $kpiData  = VmtEmployeePMSGoals::find($request->id);
        if($kpiData){
            $kpiData->appraiser_comment = $request->feedback; //null
            $kpiData->save();

            //dd($officialMailList);
        }
        return "Saved";
    }

    public function saveKPItableDraft_HR(Request $request){

        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);

        if($kpiData){
            $kpiData->hr_kpi_review      = $request->hreview; //null
            $kpiData->hr_kpi_percentage  = $request->hrpercetage; //null

            $kpiData->is_hr_submitted = 0;//false.

            $kpiData->save();

            //dd($officialMailList);
        }

        return "Saved as draft";
    }

    // Storing Manager Review given to the employees as Draft
    public function saveKPItableDraft_Manager(Request $request){

        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);

        if($kpiData){
            $kpiData->manager_kpi_review      = $request->managereview; //null
            $kpiData->manager_kpi_percentage  = $request->managerpercetage; //null
            //$kpiData->self_kpi_comments    = $request->selfcomments;//null

            $kpiData->is_manager_submitted = 0;//false.

            $kpiData->save();

            //dd($officialMailList);
        }
        return "Saved as draft";
    }

    // Storing  employees kpitable as Draft
    public function saveKPItableDraft_Employee(Request $request){
        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);
        if($kpiData){
            $kpiData->self_kpi_review      = $request->selfreview; //null
            $kpiData->self_kpi_percentage  = $request->selfkpiachievement; //null
            $kpiData->self_kpi_comments    = $request->selfcomments;//null
            $kpiData->is_employee_submitted = 0;//false
            $kpiData->save();

        }
        return "Saved as draft";
    }

    // Storing Manager Review given to the employees
    public function storeManagerApraisalReview(Request $request){
        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);
        if($kpiData){
            $kpiData->manager_kpi_review      = $request->managereview; //null
            $kpiData->manager_kpi_percentage  = $request->managerpercetage; //null
            //$kpiData->self_kpi_comments    = $request->selfcomments;//null
            $kpiData->is_manager_submitted = 1;//true

            $kpiData->save();

            $hrReview = User::find($kpiData->author_id);

            $currentUser_empDetails = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first();

            $hrList =  User::role(['HR', 'admin', 'Admin'])->get(); 
            $hrUsers = $hrList->pluck('id'); 
            $officialMailList =   VmtEmployeeOfficeDetails::whereIn('user_id', $hrUsers)->pluck('officical_mail');

            $notification_user = User::where('id',auth::user()->id)->first();
            //dd($officialMailList);
            \Mail::to($officialMailList)->send(new NotifyPMSManager(auth::user()->name,  $currentUser_empDetails->designation,$hrReview->name));
             $message = "Employee has submitted KPI Assessment.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        }
        return "Published Review successfully. Sent mail to HR ".$officialMailList;
    }

    // Storing Review Given by HR
    public function storeHRApraisalReview(Request $request){
        //dd($request->all());
        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);
        $user_emp_name = User::where('id',$request->user_id)->pluck('name')->first();
        if($kpiData){

            $kpiData->hr_kpi_review      = $request->hreview; //null
            $kpiData->hr_kpi_percentage  = $request->hrpercetage; //null
            $kpiData->is_hr_submitted = 1;//true

            $kpiData->save();
            $notification_user = User::where('id',auth::user()->id)->first();
            //$managerData   = User::find($kpiData->reviewer_id);
            //$employeeData = VmtEmployee::where('id', $kpiData->employee_id)->first();
            $mailingList = VmtEmployeeOfficeDetails::whereIn('user_id', [$kpiData->employee_id, $kpiData->reviewer_id] )->pluck('officical_mail');

            //$reviewManager = User::find($kpiData->reviewer_id);
            //dd($reviewManager->email);
            \Mail::to($mailingList)->send(new PMSReviewCompleted($user_emp_name));
             $message = "The HR team has successfully completed your PMS review process.  ";
                Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        }
        return "Saved.Sent mail to manager and employee ". implode(',', $mailingList->toArray()); // $managerOfficeDetails->officical_mail;
    }
}
