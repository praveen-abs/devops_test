<?php

namespace App\Http\Controllers\PMS;

use App\Exports\PMSV2ReviewerReviewFormExport;
use App\Exports\PMSV2ReviewFormExport;
use App\Models\User;
use App\Models\Department;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\VmtEmployee;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\ConfigPms;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtEmployeeOfficeDetails;
use App\Http\Controllers\Controller;
use App\Models\VmtPMS_KPIFormReviewsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\SampleKPIFormExport;
use App\Mail\NotifyPMSManager;
use App\Mail\VmtAssignGoals;
use App\Notifications\ViewNotification;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

// use Maatwebsite\Excel\Facades\Excel;
/*
    New PMS Controller

*/

class VmtPMSModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPMSDashboard()
    {

        // checkConfigPms();

        //Get existing KPI forms
        $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', auth::user()->id)->get(['id','form_name']);

        // get Departments data
        $departments = Department::where('status', 'A')->get();

        //Dashboard vars
        $employeesGoalsSetCount = 0;
        $totalEmployeesCount = User::where('active',1)->where('is_admin',0)->count();
        $employeesAssessedCount = 0;
        $selfReviewCount = 0;
        $totalSelfReviewCount = 0;
        $employees = VmtEmployee::rightJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'users.name as emp_name',
                'users.id as id',
                'users.avatar as avatar',
            )
            ->where('users.active','1')
            ->where('users.is_admin','0')
            ->orderBy('vmt_employee_details.created_at', 'ASC')
            ->get();
        $dashboardCountersData = [];
        $dashboardCountersData['employeesGoalsSetCount'] = $employeesGoalsSetCount;
        $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
        $dashboardCountersData['employeesAssessedCount'] = $employeesAssessedCount;
        $dashboardCountersData['selfReviewCount'] = $selfReviewCount;
        $dashboardCountersData['totalSelfReviewCount'] = $totalSelfReviewCount;
    
            $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews')->WhereRaw("find_in_set(".auth()->user()->id.", reviewer_id)")->orWhereRaw("find_in_set(".auth()->user()->id.", assignee_id)")->orWhere('assigner_id',auth()->user()->id)->orderBy('id','DESC')->get();

        $flowCheck = 1;

        $allEmployeesList = User::leftJoin('vmt_employee_office_details','users.id','=','vmt_employee_office_details.user_id')
            ->leftJoin('vmt_employee_details','users.id','=','vmt_employee_details.userid')
            ->where('users.id','!=',Auth::id())
            ->select('users.name','users.id','vmt_employee_details.emp_no','vmt_employee_office_details.designation')
            ->get();

        $loggedInUser = Auth::user();

        return view('pms.vmt_pms_dashboard_v2', compact('dashboardCountersData','existingKPIForms','departments','employees','pmsKpiAssigneeDetails','flowCheck','allEmployeesList','loggedInUser'));
    }

    public function showPMSDashboardForManager()
    {
        $loggedUserId = Auth::id();
        $loggedUserDetails = User::findorfail($loggedUserId);
        $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', $loggedUserId)->get(['id','form_name']);

        // get Departments data
        $departments = Department::where('status', 'A')->get();

        //Dashboard vars
        $employeesGoalsSetCount = 0;
        $totalEmployeesCount = User::where('active',1)->where('is_admin',0)->count();
        $employeesAssessedCount = 0;
        $selfReviewCount = 0;
        $totalSelfReviewCount = 0;
        $employees = VmtEmployee::rightJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'users.name as emp_name',
                'users.id as id',
                'users.avatar as avatar',
            )
            ->where('users.active','1')
            ->where('users.is_admin','0')
            ->orderBy('vmt_employee_details.created_at', 'ASC')
            ->get();

        // Get logged in user Employee deatils 
        $loggedUserManagerNumber = VmtEmployee::where('userid',$loggedUserId)->value('emp_no');
        // Get logged in Manager Employees List 
        $loggedManagerEmployees = User::leftJoin('vmt_employee_office_details','users.id','=','vmt_employee_office_details.user_id')
            ->leftJoin('vmt_employee_details','users.id','=','vmt_employee_details.userid')
            ->where('l1_manager_code',$loggedUserManagerNumber)
            ->select('users.name','users.id','vmt_employee_details.emp_no','vmt_employee_office_details.designation')
            ->get();

        // Get logged in user office deatils and its parent code
        $loggedUserManagerOfficeDetails = VmtEmployeeOfficeDetails::where('user_id',$loggedUserId)->value('l1_manager_code');
        // From its parent code can get childs (same level managers of loggedIn Manager)
        $getSameLevelManagers = [];
        if(!empty($loggedUserManagerOfficeDetails)){
            $getSameLevelManagers = VmtEmployeeOfficeDetails::where('l1_manager_code',$loggedUserManagerOfficeDetails)
                                    ->leftJoin('users','vmt_employee_office_details.user_id','=','users.id')
                                    ->select('users.name','users.id','vmt_employee_office_details.designation')
                                    ->get();
        }

        $dashboardCountersData = [];
        $dashboardCountersData['employeesGoalsSetCount'] = $employeesGoalsSetCount;
        $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
        $dashboardCountersData['employeesAssessedCount'] = $employeesAssessedCount;
        $dashboardCountersData['selfReviewCount'] = $selfReviewCount;
        $dashboardCountersData['totalSelfReviewCount'] = $totalSelfReviewCount;
    
            $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews')->WhereRaw("find_in_set(".$loggedUserId.", reviewer_id)")->orWhereRaw("find_in_set(".$loggedUserId.", assignee_id)")->orWhere('assigner_id',$loggedUserId)->orderBy('id','DESC')->get();

        $loggedInUser = Auth::user();

        $flowCheck = 2;
        return view('pms.vmt_pms_dashboard_v2', compact('dashboardCountersData','existingKPIForms','departments','employees','pmsKpiAssigneeDetails','loggedManagerEmployees','loggedUserDetails','getSameLevelManagers','flowCheck','loggedInUser'));
    }
    // public function showPMSDashboardOld()
    // {

    //     //Check whether the current user has any KPI forms
    //     $existingGoals = VmtPMS_KPIFormAssignedModel::WhereIn('assignee_id', [auth::user()->id])->get();
    //     // dd([auth::user()->id]);
    //     // $users = User::select('users.id', 'users.name')->join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('active', 1)->get();
    //     $departments = Department::where('status', 'A')->get();

    //     //Get existing KPI forms
    //     $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', auth::user()->id)->get(['id','form_name']);

    //     //Dashboard vars
    //     $employeesGoalsSetCount = 0;
    //     $totalEmployeesCount = User::where('active',1)->where('is_admin',0)->count();
    //     $employeesAssessedCount = 0;
    //     $selfReviewCount = 0;
    //     $totalSelfReviewCount = 0;

    //     $pmsConfig = $this->getUserPMSConfig(auth::user()->id);
    //     $pmsgetemployees = $this->getAllEmployees();
    //     $employees = VmtEmployee::rightJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
    //         ->select(
    //             'users.name as emp_name',
    //             'users.id as id',
    //             'users.avatar as avatar',
    //         )
    //         ->where('users.active','1')
    //         ->where('users.is_admin','0')
    //         ->orderBy('vmt_employee_details.created_at', 'ASC')
    //         ->get();
    //         //dd($employees->toArray());

    //         $dashboardCountersData = [];
    //         $dashboardCountersData['employeesGoalsSetCount'] = $employeesGoalsSetCount;
    //         $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
    //         $dashboardCountersData['employeesAssessedCount'] = $employeesAssessedCount;
    //         $dashboardCountersData['selfReviewCount'] = $selfReviewCount;
    //         $dashboardCountersData['totalSelfReviewCount'] = $totalSelfReviewCount;

    //          if(auth::user()->hasRole(['HR','Admin']) ){
    //         $empGoals = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
    //                         ->leftJoin('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
    //                         ->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'users.id')
    //                         ->select(
    //                             'vmt_employee_details.*',
    //                             'users.id as emp_id',
    //                             'users.name as emp_name',
    //                             'users.email as email_id',
    //                             'users.avatar as avatar',
    //                             'vmt_employee_office_details.department_id',
    //                             'vmt_employee_office_details.designation',
    //                             'vmt_employee_office_details.l1_manager_code',
    //                             'vmt_employee_office_details.l1_manager_name',
    //                             'vmt_employee_office_details.l1_manager_designation',
    //                             'vmt_employee_pms_goals_table.assignment_period',
    //                             'vmt_employee_pms_goals_table.kpi_table_id',
    //                             'vmt_employee_pms_goals_table.is_manager_approved',
    //                             'vmt_employee_pms_goals_table.is_manager_submitted',
    //                             'vmt_employee_pms_goals_table.is_employee_submitted',
    //                             'vmt_employee_pms_goals_table.is_employee_accepted',
    //                             'vmt_employee_pms_goals_table.reviewer_id as reviewer_id',
    //                             'vmt_employee_pms_goals_table.author_id',
    //                             'vmt_employee_pms_goals_table.hr_kpi_percentage',
    //                         )
    //                         ->orderBy('created_at', 'DESC')
    //                         ->whereNotNull('emp_no')->get();

    //     } else {
    //         // $empId = VmtEmployee::where('userid', auth()->user()->id)->first();
    //         $empGoals = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
    //         ->join('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
    //         ->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'users.id')
    //         ->select(
    //             'vmt_employee_details.*',
    //             'users.id as emp_id',
    //             'users.name as emp_name',
    //             'users.email as email_id',
    //             'users.avatar as avatar',
    //             'vmt_employee_office_details.department_id',
    //             'vmt_employee_office_details.designation',
    //             'vmt_employee_office_details.l1_manager_code',
    //             'vmt_employee_office_details.l1_manager_name',
    //             'vmt_employee_office_details.l1_manager_designation',
    //             'vmt_employee_pms_goals_table.assignment_period',
    //             'vmt_employee_pms_goals_table.kpi_table_id',
    //             'vmt_employee_pms_goals_table.is_manager_approved',
    //             'vmt_employee_pms_goals_table.is_manager_submitted',
    //             'vmt_employee_pms_goals_table.is_employee_submitted',
    //             'vmt_employee_pms_goals_table.is_employee_accepted',
    //             'vmt_employee_pms_goals_table.reviewer_id as reviewer_id',
    //             'vmt_employee_pms_goals_table.author_id',
    //             'vmt_employee_pms_goals_table.hr_kpi_percentage',
    //         )
    //         ->orderBy('created_at', 'DESC')
    //         // ->where('vmt_employee_pms_goals_table.author_id', auth()->user()->id)
    //         ->orWhere('vmt_employee_pms_goals_table.employee_id', auth()->user()->id)
    //         ->orWhereRaw("find_in_set(".auth()->user()->id.", vmt_employee_pms_goals_table.reviewer_id)")
    //         ->whereNotNull('emp_no')->get();
    //     }
    //     $users = User::select('users.id', 'users.name')->join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('active', 1)->get();

    //     //dd($this->getEmployeesOfManager(['EMP100','Vasa102'])->toArray());
    //     //dd($this->getManagersForEmployees(['2','3','4','5','6'])->toArray());

    //     return view('pms.vmt_pms_dashboard_v2', compact('dashboardCountersData','existingGoals','existingKPIForms','pmsConfig','departments','employees','empGoals','users'));
    // }

    // KPI Form

    public function showKPICreateForm(){

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
        return view('pms.vmt_pms_kpiform_create',compact('config','show'));
    }

    /*
        Save the KPI form created

    */
    public function saveKPIForm(Request $request){

        // dd($request->dimension);
        $config = ConfigPms::where('user_id', auth()->user()->id)->first();
        //  dd($config->selected_columns);
        $kpiTable  = new VmtPMS_KPIFormModel;

        $kpiTable->available_columns        =    $config->selected_columns;
        $kpiTable->author_id       =    auth::user()->id;
        $kpiTable->form_name     =    $request->name;
        $kpiTable->save();
        $KpiLAST = $kpiTable->id;

        $totRows  = count($request->dimension);
        for ($i=0; $i < $totRows; $i++) {
                $kpiRow = new VmtPMS_KPIFormDetailsModel;
                $kpiRow->vmt_pms_kpiform_id   =    $KpiLAST;
                $kpiRow->dimension   =    $request->dimension ? $request->dimension[$i] : '';
                $kpiRow->kpi         =    $request->kpi ? $request->kpi[$i] : '';
                $kpiRow->operational_definition   = $request->operational ? $request->operational[$i]: '' ;
                $kpiRow->measure     =    $request->measure ? $request->measure[$i] : '';
                $kpiRow->frequency   =    $request->frequency ? $request->frequency[$i] : '';
                $kpiRow->target      =    $request->target ? $request->target[$i] : '';
                $kpiRow->stretch_target  =    $request->stretchTarget ? $request->stretchTarget[$i] : '';
                $kpiRow->source          =    $request->source ? $request->source[$i] : '';
                $kpiRow->kpi_weightage   =    $request->kpiWeightage ? $request->kpiWeightage[$i] : '';
                // $kpiRow->author_id       =    auth::user()->id;
                // $kpiRow->author_name     =    str_replace(' ', '_', strtolower($request->name));
                $kpiRow->save();

        }
        return "Question Created Successfully";

    }

    /*
        Generate Sample KPI excel-sheet based on the columns
        enabled in the ConfigPMS table

    */
    public function generateSampleKPIExcelSheet()
    {
        $data = ConfigPms::first();
        $array_selectedKPIColumnsHeader = [];
        if(!empty($data)){
            $array_selectedKPIColumns = str_getcsv($data->selected_columns);
            if(count($array_selectedKPIColumns) > 0){
                foreach($array_selectedKPIColumns as $kpiColumnName){
                    $decodedColumnHeader = isset($data->column_header) ? json_decode($data->column_header,true) : '';
                    if($decodedColumnHeader != ''){
                        $array_selectedKPIColumnsHeader[] = isset($decodedColumnHeader[$kpiColumnName]) ? $decodedColumnHeader[$kpiColumnName] : '';
                    }
                }
            }
        }
        if(count($array_selectedKPIColumnsHeader) > 0){
            return \Excel::download(new SampleKPIFormExport($array_selectedKPIColumnsHeader), 'Template_SampleKPIForm.xlsx');
        }else{
            return '';
        }

   }

   /*
        Publish the KPIForm by assigned to the given assignees,assigners.
   */
    public function publishKPIForm(Request $request)
    {
        // dd($request->all());
        $kpi_AssignedTable  = new VmtPMS_KPIFormAssignedModel;

        $kpi_AssignedTable->vmt_pms_kpiform_id        =    $request->selected_kpi_form_id;
        $kpi_AssignedTable->assignee_id       =   is_array($request->employees) ? implode(",",$request->employees) : $request->employees;
        $kpi_AssignedTable->reviewer_id     =     is_array($request->reviewer) ? implode(",",$request->reviewer) : $request->reviewer;
        $kpi_AssignedTable->assigner_id     =    auth::user()->id;
        $kpi_AssignedTable->calendar_type     =    $request->calendar_type;
        $kpi_AssignedTable->year     =    $request->hidden_calendar_year;
        $kpi_AssignedTable->frequency     =    $request->frequency;
        $kpi_AssignedTable->assignment_period     =    $request->assignment_period_start;
        $kpi_AssignedTable->department_id     =    $request->department;

        $kpi_AssignedTable->save();

        
        //Based on assignee count, you create records in review table
        $assigneeIdsAll = explode(',',$kpi_AssignedTable->assignee_id );
        $explodedReviewersIds = explode(',',$kpi_AssignedTable->reviewer_id);
        $reviewerAcceptedData = [];
        $reviewerSubmittedData = [];
        foreach($explodedReviewersIds as $reviewer){
            $reviewerAcceptedData[$reviewer] = "1";
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
                if(isset($request->flowCheck) && $request->flowCheck==1)
                {
                    $assigneeReview->is_assignee_accepted = '1';
                }else{
                    $assigneeReview->is_assignee_accepted = null;
                }
                $assigneeReview->is_reviewer_submitted = json_encode($reviewerSubmittedData);
                $assigneeReview->is_reviewer_accepted = json_encode($reviewerAcceptedData);
                $assigneeReview->save();

                $assigneeMailId  = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->where('userid', $assignee)->pluck('officical_mail','userid')->first();
                $assigneeName = User::where('id',$assignee)->pluck('name')->first();
                $assignerName = User::where('id',auth::user()->id)->pluck('name')->first();
                $command_emp = '';

                \Mail::to($assigneeMailId)->send(new VmtAssignGoals("none", $assigneeName,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$assignerName,$command_emp));
            }
        }
        //Create review record with some default values for :
        //status of assignee,assigner,reviewer ("Pending")

        return "KPI Published Successfully";
    }

    public function showKPIReviewPage_Assignee(Request $request)
    {
        // Flow 1 HR creates Form and Assignee
        $kpiFormAssignedDetails = VmtPMS_KPIFormAssignedModel::findorfail($request->assignedFormid);
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

        $review  =  VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform_details','vmt_pms_kpiform_details.vmt_pms_kpiform_id','=','vmt_pms_kpiform_assigned.vmt_pms_kpiform_id')
        ->join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=','vmt_pms_kpiform_assigned.id')
        ->where('vmt_pms_kpiform_reviews.assignee_id','=',$request->assigneeId)
        ->get();

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
        }
        $kpiRows      =  VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id', $ff->vmt_pms_kpiform_id)->get();
        $reviewCompleted = false;
        $kpiRowsId = VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id', $ff->vmt_pms_kpiform_id)->pluck('id')->toArray();
        $kpiRowsId = implode(',',$kpiRowsId);

        // Get assigned Details
        $assignedGoals  = VmtPMS_KPIFormAssignedModel::where('vmt_pms_kpiform_assigned.id',$request->assignedFormid)->where('vmt_pms_kpiform_reviews.assignee_id',$request->assigneeId)->join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=','vmt_pms_kpiform_assigned.id')->first();

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

        $assignedUserDetails = User::where('id',$request->assigneeId)->with('getEmployeeDetails','getEmployeeOfficeDetails')->first();
        $assignedEmployee_Userdata = User::where('id',  $request->assigneeId)->first();
        $assignedEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $request->assigneeId)->first();
        $empSelected = true;
        $employeeData = VmtEmployee::where('userid', $request->assigneeId)->first();

        $reviewersId = explode(',',$assignedGoals->reviewer_id);

        // check if all reviewers has submitted the review or not
        $isAllReviewersSubmittedData = [];
        $isAllReviewersSubmittedOrNot = false;
        if(isset($assignedGoals->is_reviewer_submitted)){
            $isAllReviewersSubmittedData = json_decode($assignedGoals->is_reviewer_submitted,true);
            if(!in_array('0',$isAllReviewersSubmittedData) && !in_array(null,$isAllReviewersSubmittedData)){
                $isAllReviewersSubmittedOrNot = true;
            }
        }


        // check if logged in user is assignee or not
        if($request->assigneeId == auth()->user()->id){
            return view('pms.vmt_pms_kpiappraisal_review_assignee', compact('review','assignedUserDetails','assignedGoals','empSelected','assignersName','config','show','ratingDetail','kpiRowsId','kpiRows','reviewCompleted','isAllReviewersSubmittedOrNot','reviewersId','isAllReviewersSubmittedData'));
        }

        // check if logged in user is reviewer or not
        if(in_array(Auth::id(),$reviewersId)){
            return view('pms.vmt_pms_kpiappraisal_review_reviewer', compact('review','assignedUserDetails','assignedGoals','empSelected','assignersName','config','show','ratingDetail','kpiRowsId','kpiRows','reviewCompleted','reviewersId','isAllReviewersSubmittedOrNot','isAllReviewersSubmittedData'));
        }
        dD("Assigner's review page is pending");


    }

    /*
        Show Reviewers page.
    */
    public function showKPIReviewPage_Reviewer(Request $request)
    {

    }

    /*

    */
    public function showKPIReviewPage_Assigner(Request $request)
    {

    }

    // function used for Save assignee form Reviews
    public function saveAssigneeReviews(Request $request)
    {
        try{
            $assigneeUser = Auth::user();
            $kpiReviewCheck = VmtPMS_KPIFormReviewsModel::where('id',$request->kpiReviewId)->where('assignee_id',$assigneeUser->id)->with('getPmsKpiFormAssigned')->first();
            if(empty($kpiReviewCheck)){
                return response()->json(['status'=>false,'message'=>'Review Data Not Found']);
            }
            $kpiReviewCheck->assignee_kpi_review = $request->assignee_kpi_review;
            $kpiReviewCheck->assignee_kpi_percentage = $request->assignee_kpi_percentage;
            $kpiReviewCheck->assignee_kpi_comments = $request->assignee_kpi_comments;
            if($request->formSubmitType == 0){
                $kpiReviewCheck->is_assignee_submitted =  '0';
                $kpiReviewCheck->update();
                return response()->json(['status'=>true,'message'=>'Saved as draft']);    
            }else{
                $kpiReviewCheck->is_assignee_submitted =  '1';
                $kpiReviewCheck->update();

                // get reviewer ids from vmt_pms_kpiform_assigned table
                $kpiFormAssignedReviewers = [];
                $kpiFormAssignedReviewersOfficialMails = [];
                if(isset($kpiReviewCheck->getPmsKpiFormAssigned)){
                    $kpiFormAssignedReviewers = explode(',',$kpiReviewCheck->getPmsKpiFormAssigned->reviewer_id);
                }
                
                // check Multiple Reviewers
                if(count($kpiFormAssignedReviewers) > 0){
                    foreach($kpiFormAssignedReviewers as $reviewer){
                        $userEmployeeDetails = User::where('id',$reviewer)->with('getEmployeeOfficeDetails')->first();
                        if(isset($userEmployeeDetails->getEmployeeOfficeDetails) && !empty($userEmployeeDetails->getEmployeeOfficeDetails->officical_mail)){

                            // office details of assignee employee
                            $currentUser_empDetails = VmtEmployeeOfficeDetails::where('user_id', $assigneeUser->id)->first();
                            array_push($kpiFormAssignedReviewersOfficialMails,$userEmployeeDetails->getEmployeeOfficeDetails->officical_mail);
                            
                            // Send mail to All Reviewers
                            \Mail::to($userEmployeeDetails->getEmployeeOfficeDetails->officical_mail)->send(new NotifyPMSManager($assigneeUser->name, $currentUser_empDetails->designation, $userEmployeeDetails->name,$kpiReviewCheck->year ));
                            $message = "Employee has submitted KPI Assessment.  ";
                            // Send notification to All Revie
                                Notification::send($assigneeUser ,new ViewNotification($message.$assigneeUser->name));
                        }

                    }
                }
                // all reviewers office mails
                $kpiFormAssignedReviewersOfficialMails = implode(',',$kpiFormAssignedReviewersOfficialMails);
                if(!empty($kpiFormAssignedReviewersOfficialMails)){
                    return response()->json(['status'=>true,'message'=>"Published Review successfully.Sent mail to manager ".$kpiFormAssignedReviewersOfficialMails]);    
                }
                return response()->json(['status'=>true,'message'=>'Published Review successfully']);    
            }

        }catch(Exception $e){
            Log::info('save or submit assignee review error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    // Save and Submit Review by Reviewer
    public function saveReviewerReviews(Request $request)
    {
        try{
            $kpiReviewCheck = VmtPMS_KPIFormReviewsModel::where('id',$request->kpiReviewId)->first();
            if(empty($kpiReviewCheck)){
                return response()->json(['status'=>false,'message'=>'Review Data Not Found']);
            }
            $decodedKpiReviwerReview = json_decode($kpiReviewCheck->reviewer_kpi_review,true);
            $decodedKpiReviwerPerc = json_decode($kpiReviewCheck->reviewer_kpi_percentage,true);
            $decodedIsKpiReviwerSubmitted = json_decode($kpiReviewCheck->is_reviewer_submitted,true);

            $decodedKpiReviwerReview[Auth::id()] = $request->reviewer_kpi_review[Auth::id()];
            $decodedKpiReviwerPerc[Auth::id()] = $request->reviewer_kpi_percentage[Auth::id()];
            
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

    public function saveAssignerReviews(Request $request)
    {

    }

    public function updateFormApprovalStatus_Assignee(Request $request)
    {

    }

    public function updateFormApprovalStatus_Reviewer(Request $request)
    {

    }

    public function getKPIFormDetails(){

    }

    /*
        Returns employees for the given reviewers emp_code list

    */
    public function getEmployeesOfManager(Request $request)
    {
        // dd($request->all());
         $currentEmpCode = VmtEmployee::whereIn('userid',explode(',', $request->emp_id))->pluck('emp_no');
        $employeesList = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                         ->whereIn('vmt_employee_office_details.l1_manager_code', $currentEmpCode)
                         ->where('users.active','1')
                         ->where('users.is_admin','0')
                         ->get(['users.name','users.id']);
                        // dd($currentEmpCode);

        return $employeesList;

    }

    /*
        Returns manager for the given employees_id list

    */
    public function getManagersForEmployees($employees_id)
    {
        //Fetch all the managers for the given employees_id list
        $managersList = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                         ->whereIn('vmt_employee_office_details.user_id', $employees_id)
                         ->distinct()->get(['vmt_employee_office_details.l1_manager_code'])
                         ->where('users.active','1')
                         ->where('users.is_admin','0')
                         ->toArray();

        //Fetch the manager details from user table
        $managersDetailList = User::wherein('user_code',$managersList)->get(['id','name']);

        return $managersDetailList;
    }

    /*

        Returns all Reviewers
    */
    public function getAllEmployees()
    {
        $reviewerList = User::where('active',1)->where('is_admin',0)->get(['id','name']);

        return $reviewerList;
    }

    /*
        Get PMS config for the current user
    */
    public function getUserPMSConfig($user_id)
    {
        $config = ConfigPms::where('user_id', $user_id)->first();
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

        return $config;
    }

    /*
    * function used for download excel sheet from review form
    */
    public function downloadExcelReviewForm($kpiAssignedId,$key){
        try{    
            // $key => 1 assignee and 2 reviewer
            $assignedKpiFormDetails = VmtPMS_KPIFormAssignedModel::where('id',$kpiAssignedId)->with('getPmsKpiFormColumnDetails.getPmsKpiFormDetails')->first();
            $finalDownlededResult = [];  
            if(isset($assignedKpiFormDetails->getPmsKpiFormColumnDetails)){
                if(isset($assignedKpiFormDetails->getPmsKpiFormColumnDetails->getPmsKpiFormDetails)){
                  $vmtKpiForm = $assignedKpiFormDetails->getPmsKpiFormColumnDetails;  
                  $finalDownlededResult = VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id',$vmtKpiForm->id)->select('dimension', 'kpi', 'operational_definition', 'measure', 'frequency', 'target', 'stretch_target', 'source', 'kpi_weightage')->get();
                }

            }
            if(count($finalDownlededResult)){
                if($key =='1'){
                    return Excel::download(new PMSV2ReviewFormExport($finalDownlededResult), 'review-page-sheet.xlsx');
                }else{
                    return Excel::download(new PMSV2ReviewerReviewFormExport($finalDownlededResult), 'review-page-sheet.xlsx');
                }
            }
            // $assignedKpiFormReviews = VmtPMS_KPIFormReviewsModel::where('vmt_pms_kpiform_assigned_id',$kpiAssignedId)->where('assignee_id',$assigneeId)->first();
            // dd($assignedKpiFormDetails, $assignedKpiFormReviews);
        }catch(Exception $e){
            Log::info('excel sheet download form review page pms v2: '.$e->getMessage());
            return '';
        }
    }

    /*
    * function used for Accept/Reject review By Assignee
    */
    public function acceptRejectAssigneeReview(Request $request){
        try{
            $vmtAssignedFormReview = VmtPMS_KPIFormReviewsModel::where('id',$request->assigneeGoalId)->with('getPmsKpiFormAssigned')->first();
            if(empty($vmtAssignedFormReview)){
                return response()->json(['status'=>false,'message'=>"Assigned Form Review is not Available"]); 
            }
            $isApproveOrReject = $request->isApproveOrReject; // 1 => Accept & 0 => Reject
            $vmtAssignedFormReview->is_assignee_accepted = $isApproveOrReject;
            $vmtAssignedFormReview->update();
            if(isset($vmtAssignedFormReview->getPmsKpiFormAssigned)){
                $command_emp = '';
                $vmtAssignedDetails = $vmtAssignedFormReview->getPmsKpiFormAssigned;
                $mailingList = VmtEmployeeOfficeDetails::where('user_id', $vmtAssignedDetails->reviewer_id)->pluck('officical_mail');
                $assignedUserDetails = User::where('id',$vmtAssignedFormReview->assignee_id)->first();
                $reviewerUserDetails = User::where('id',$vmtAssignedDetails->reviewer_id)->first();
                if($vmtAssignedFormReview->is_assignee_accepted == "1")
                {
                    \Mail::to($mailingList)->send(new VmtAssignGoals( "approved",$assignedUserDetails->name,$vmtAssignedDetails->year." - ".strtoupper($vmtAssignedDetails->assignment_period),$reviewerUserDetails->name,$command_emp));
                    $returnMsg = 'KPI has been accepted. Mail notification sent';
                    $message = "KPI has been accepted.  ";
                    Notification::send($assignedUserDetails ,new ViewNotification($message.auth()->user()->name));
                    return response()->json(['status'=>true,'message'=>$returnMsg]);
                }
                elseif($vmtAssignedFormReview->is_assignee_accepted == "0")
                {
                    if(isset($request->reject_comment) && $request->reject_comment != ''){
                        $vmtAssignedFormReview->assignee_rejection_comments = $request->reject_comment;
                        $vmtAssignedFormReview->update();
                        $command_emp = $vmtAssignedFormReview->assignee_rejection_comments;
                    }

                    \Mail::to($mailingList)->send(new VmtAssignGoals( "rejected",$assignedUserDetails->name,$request->hidden_calendar_year." - ".strtoupper($request->assignment_period_start),$reviewerUserDetails->name,$command_emp));
                    $returnMsg = 'KPI has been rejected. Mail notification sent';
                    $message = "KPI has been rejected.  ";
                    Notification::send($assignedUserDetails ,new ViewNotification($message.auth()->user()->name));
                    return response()->json(['status'=>true,'message'=>$returnMsg]);
                }
            }
            return response()->json(['status'=>false,'message'=>'Something Went Wrong!']);
 
        }catch(Exception $e){
            Log::info('accept/reject review by assignee error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]); 
        }
    }

    public function getReviewerOfSelectedEmployee(Request $request){
        try{
            if(isset($request->selectedEmployeeId) && count($request->selectedEmployeeId) > 0){
             
                $authDetails = Auth::user();
                $currentEmpCode = VmtEmployeeOfficeDetails::whereIn('user_id',$request->selectedEmployeeId)
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

                $reviewerNames = $users->pluck('name');
                $reviewerIds = $users->pluck('id')->toArray();
                if(!in_array($authDetails->id,$reviewerIds)){
                    $reviewerIds[] = $authDetails->id;
                    $reviewerNames[] = $authDetails->name;
                }
                                        
                $removeSelectedEmployee = [];
                foreach($request->selectedEmployeeId as $employeeExistsCheck)
                {
                    if(in_array($employeeExistsCheck,$reviewerIds)){
                        array_push($removeSelectedEmployee, $employeeExistsCheck);
                    }
                }
                // dd($removeSelectedEmployee);
                $result = [
                    'reviewerNames' => $reviewerNames,
                    'reviewerIds' => $reviewerIds,
                    'removeSelectedEmployee' => $removeSelectedEmployee
                ];
                return response()->json(['status'=>true,'message'=>'Get Reviewers Details Done','result'=>$result]); 
            }
            return response()->json(['status'=>false,'message'=>'Something went wrong!']); 
        }catch(Exception $e){
            Log::info('Get Reviewer Of Selected Employee flow 1 HR PMS V2 error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]); 
        }
    }
    public function getSameLevelOfReviewer(Request $request){
        try{
            if(isset($request->reviewerId)){
                $currentEmpCode = VmtEmployeeOfficeDetails::where('user_id',$request->reviewerId)->pluck('l1_manager_code')->first();
                if(empty($currentEmpCode)){
                    return response()->json(['status'=>false,'message'=> 'Reviewer Not Exists']); 
                }
                                    
                $getSameLevelManagers = VmtEmployeeOfficeDetails::where('l1_manager_code',$currentEmpCode)
                                    ->leftJoin('users','vmt_employee_office_details.user_id','=','users.id')
                                    ->select('users.name','users.id','vmt_employee_office_details.designation')
                                    ->where('users.id','!=',$request->reviewerId)
                                    ->get()
                                    ->toArray();

                                    // dd($getSameLevelManagers);
                $result = [
                    'getSameLevelManagers' => $getSameLevelManagers,
                ];
                Log::info('Get Reviewers Of Same level flow 1 HR PMS V2 error: Something Went Wrong=> '.$request->reviewerId);
                return response()->json(['status'=>true,'message'=>'','result'=>$result]); 
            }
            return response()->json(['status'=>false,'message'=>'']); 
        }catch(Exception $e){
            Log::info('Get Reviewers Of Same level flow 1 HR PMS V2 error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]); 
        }
    }
    
    public function changeReviewerSelection(Request $request){
        try{
            // get new and old reviewer details, id and name
            $newReviwerName =  User::findorfail($request->newReviewerName);
            $oldReviewerName = User::findorfail($request->oldReviewerName);

            $reviewersIds = explode(',',$request->reviewersIds);
            $reviewersName = explode(',',$request->reviewersName);
            $existingReviewerIds = [];
            
            foreach($reviewersIds as $reviewerId){
                // checking old reviewer and remove from array
                if($reviewerId != $request->oldReviewerName  && isset($request->oldReviewerName)){
                    array_push($existingReviewerIds, $reviewerId);
                }
                
                // checking new reviewer and add in array
                if(!in_array($request->newReviewerName, $existingReviewerIds) && isset($request->newReviewerName)){
                    array_push($existingReviewerIds, $request->newReviewerName);
                }
            }


            $existingReviewerNames = User::whereIn('id',$existingReviewerIds)->pluck('name')->toArray();

            $result = [
                'existingReviewerIds' => implode(',',$existingReviewerIds),
                'existingReviewerNames' => implode(',',$existingReviewerNames),
            ];
            return response()->json(['status'=>true,'message'=>'','data'=>$result]); 
        }catch(Exception $e){
            Log::info('Change Reviewer Selection flow 1 HR PMS V2 error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]); 
        }
    }
}
