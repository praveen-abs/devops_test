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

class VmtPmsController extends Controller
{   
    // assign goals forms
    public function vmtAssignGoals(Request $request){
        $empGoals = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
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
                            ->whereNotNull('emp_no')->get();


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
        $users = User::join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->get();
        $department = Department::where('status', 'A')->get();
        // if (auth()->user()->hasrole('Employee')) {
            // $emp = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->where('userid', auth()->user()->id)->first();
            // $rev = VmtEmployee::where('emp_no', $emp->l1_manager_code)->first();
            // $users = User::where('id', $rev->userid)->get();
            // $empGoals = $empGoalQuery->where('users.id', auth::user()->id)->get();
            // foreach ($empGoals as $emp) {
            //     if ($config && $config->selected_head == 'manager') {
            //         $per = json_decode($emp->manager_kpi_percentage, true) ? json_decode($emp->manager_kpi_percentage, true) : [];
            //     } else {
            //         $per = json_decode($emp->hr_kpi_percentage, true) ? json_decode($emp->hr_kpi_percentage, true) : [];
            //     }
            //     if (count($per) > 0) {
            //         $emp['ranking'] = 0;
            //         $emp['rating'] = array_sum($per)/count($per);
            //         if ($emp['rating'] < 60) {
            //             $emp['ranking'] = 1;
            //         } elseif ($emp['rating'] >= 60 && $emp['rating'] < 70) {
            //             $emp['ranking'] = 2;
            //         } elseif ($emp['rating'] >= 70 && $emp['rating'] < 80) {
            //             $emp['ranking'] = 3;
            //         } elseif ($emp['rating'] >= 80 && $emp['rating'] < 90) {
            //             $emp['ranking'] = 4;
            //         } elseif ($emp['rating'] >= 90) {
            //             $emp['ranking'] = 5;
            //         } else{
            //             $emp['ranking'] = 0;
            //         }
            //     }
            // }
            // return view('vmt_pms_assigngoals', compact('users','empGoals','userCount','empCount','subCount', 'config', 'show', 'department'));
        // } elseif (auth()->user()->hasrole('Manager')) {
            // $empGoals = $empGoalQuery->get();

            // $getId = VmtEmployee::where('userid', auth()->user()->id)->first();
            // $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            // ->select(
            //     'vmt_employee_details.*', 
            //     'users.name as emp_name', 
            //     'users.avatar as avatar', 
            // )
            // ->orderBy('created_at', 'ASC')
            // ->whereNotNull('emp_no')
            // ->get();
            //  $users = User::join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.reviewer_id', '=', 'users.id')->get();
        // } else {
            // $empGoals = $empGoalQuery->get();

            // $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            // ->select(
            //     'vmt_employee_details.*', 
            //     'users.name as emp_name', 
            //     'users.avatar as avatar', 
            // )
            // ->orderBy('created_at', 'ASC')
            // ->whereNotNull('emp_no')
            // ->get();

            // $currentEmpCode = VmtEmployee::where('userid', auth::user()->id)->first()->value('emp_no');
            //$mgr_assignee = User::join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'users.id')->pluck('name');

            // $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            // ->select(
            //     'users.name', 
            //     'users.id as id',
            //     'vmt_employee_office_details.officical_mail as email',
            // )
            // ->orderBy('users.name', 'ASC')
            // ->where('l1_manager_code', strval($currentEmpCode))
            // ->get();
            
            //dd($users);
            // ->select('users.id' ,'users.name')
            // ->
            // ->get();
        // }
        $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'vmt_employee_details.*', 
                'users.name as emp_name', 
                'users.avatar as avatar', 
            )
            ->orderBy('created_at', 'ASC')
            ->whereNotNull('emp_no')
            ->get();

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

    public function vmtGetAllChildEmployees(Request $request)
    {
        if($request->has("emp_id")){
            $currentEmpCode = VmtEmployee::whereIn('userid',explode(',', $request->emp_id))->pluck('emp_no');
            $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'vmt_employee_office_details.emp_id as id',
                'vmt_employee_office_details.l1_manager_code as code',
            )
            ->orderBy('users.name', 'ASC')
            ->whereIn('l1_manager_code', $currentEmpCode)
            ->get();
            return $users;

        }

        return array();
    }

    public function vmtGetAllParentReviewer(Request $request) {
        if($request->has("emp_id")){
            $currentEmpCode = VmtEmployeeOfficeDetails::whereIn('user_id',explode(',', $request->emp_id))->pluck('l1_manager_code');
            $users = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'users.name', 
                'users.id as id',
                'vmt_employee_details.emp_no as code',
            )
            ->orderBy('users.name', 'ASC')
            ->whereIn('emp_no', $currentEmpCode)
            ->get();
            return $users;

        }

        return array();
    }

    // Store Assigned Goals
    public function vmtStoreKpiTable(Request $request){
        //return "Stored";
        if ($request->has('dimension')) {
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
        $departmentArr = VmtEmployeeOfficeDetails::join('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
        ->orderBy('users.name', 'ASC')
        ->where('department_id', $request->id)
        ->pluck('l1_manager_code'); 
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
            ->whereIn('l1_manager_code', $departmentArr)
            ->get();
        }
        return response()->json($data);
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


    // Appraisal review
    public function showEmployeeApraisalReview(Request $request)
    {
        // code...
        $kpiRows = [];
        $kpiRowsId = '';

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
        if($request->has('id')) {
            $assignedGoals  = VmtEmployeePMSGoals::where('kpi_table_id', $request->id)->where('employee_id', $request->user_id)->orderBy('updated_at', 'DESC')->first();
            //dd($assignedGoals);
            $assignedEmployee_Userdata = User::where('id',  $assignedGoals->employee_id)->first();
            $assignedEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $assignedGoals->employee_id)->first();
            $assignedEmp_manager_name = User::join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('vmt_employee_details.emp_no', $assignedEmployeeOfficeDetails->l1_manager_code)->pluck('name');
            $employeeData = VmtEmployee::where('userid', $assignedGoals->employee_id)->first();
            $kpiData      = VmtKPITable::find($assignedGoals->kpi_table_id);
            $kpiRowArray  = explode(',', $kpiData->kpi_rows);
            $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();
            $ids      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->pluck('id')->toArray();
            $assigners = User::whereIn('id', explode(',', $assignedGoals->reviewer_id))->get();
            $assignersName = User::whereIn('id', explode(',', $assignedGoals->reviewer_id))->pluck('name')->toArray();
            if ($assignersName) {
                $assignersName = implode(',', $assignersName);
            }
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

            return view('vmt_appraisalreview_hr', compact( 'employeeData','assignedEmployee_Userdata','assignedEmp_manager_name','assignedEmployeeOfficeDetails', 'assignedGoals', 'kpiRows', 'empSelected', 'reviewCompleted', 'ratingDetail', 'kpiRowsId', 'assigners', 'assignersName', 'config', 'show'));
        }

        $kpiRows = [];
        $empSelected = false;
        $reviewCompleted = false;
        return view('vmt_appraisalreview_hr', compact('pmsGoalList', 'kpiRows', 'empSelected', 'reviewCompleted', 'kpiRowsId', 'config', 'show'));
    }

}