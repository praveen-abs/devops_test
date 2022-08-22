<?php

namespace App\Http\Controllers\PMS;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\SampleKPIFormExport;

// use Maatwebsite\Excel\Facades\Excel;
/*
    New PMS Controller

*/

class VmtPMSModuleController extends Controller
{


    public function showPMSDashboard()
    {

        //Check whether the current user has any KPI forms
        $existingGoals = VmtPMS_KPIFormAssignedModel::WhereIn('assignee_id', [auth::user()->id])->get();
        // dd([auth::user()->id]);
        // $users = User::select('users.id', 'users.name')->join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('active', 1)->get();
        $departments = Department::where('status', 'A')->get();

        //Get existing KPI forms
        $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', auth::user()->id)->get(['id','form_name']);

        //Dashboard vars
        $employeesGoalsSetCount = 0;
        $totalEmployeesCount = User::where('active',1)->where('is_admin',0)->count();
        $employeesAssessedCount = 0;
        $selfReviewCount = 0;
        $totalSelfReviewCount = 0;

        $pmsConfig = $this->getUserPMSConfig(auth::user()->id);
        $pmsgetemployees = $this->getAllEmployees();
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
            //dd($employees->toArray());

            $dashboardCountersData = [];
            $dashboardCountersData['employeesGoalsSetCount'] = $employeesGoalsSetCount;
            $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
            $dashboardCountersData['employeesAssessedCount'] = $employeesAssessedCount;
            $dashboardCountersData['selfReviewCount'] = $selfReviewCount;
            $dashboardCountersData['totalSelfReviewCount'] = $totalSelfReviewCount;

             if(auth::user()->hasRole(['HR','Admin']) ){
            $empGoals = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
                            ->leftJoin('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
                            ->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'users.id')
                            ->select(
                                'vmt_employee_details.*',
                                'users.id as emp_id',
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
                                'vmt_employee_pms_goals_table.reviewer_id as reviewer_id',
                                'vmt_employee_pms_goals_table.author_id',
                                'vmt_employee_pms_goals_table.hr_kpi_percentage',
                            )
                            ->orderBy('created_at', 'DESC')
                            ->whereNotNull('emp_no')->get();

        } else {
            // $empId = VmtEmployee::where('userid', auth()->user()->id)->first();
            $empGoals = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->join('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
            ->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'users.id')
            ->select(
                'vmt_employee_details.*',
                'users.id as emp_id',
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
                'vmt_employee_pms_goals_table.reviewer_id as reviewer_id',
                'vmt_employee_pms_goals_table.author_id',
                'vmt_employee_pms_goals_table.hr_kpi_percentage',
            )
            ->orderBy('created_at', 'DESC')
            // ->where('vmt_employee_pms_goals_table.author_id', auth()->user()->id)
            ->orWhere('vmt_employee_pms_goals_table.employee_id', auth()->user()->id)
            ->orWhereRaw("find_in_set(".auth()->user()->id.", vmt_employee_pms_goals_table.reviewer_id)")
            ->whereNotNull('emp_no')->get();
        }
        $users = User::select('users.id', 'users.name')->join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('active', 1)->get();

        //dd($this->getEmployeesOfManager(['EMP100','Vasa102'])->toArray());
        //dd($this->getManagersForEmployees(['2','3','4','5','6'])->toArray());

        return view('pms.vmt_pms_dashboard_v2', compact('dashboardCountersData','existingGoals','existingKPIForms','pmsConfig','departments','employees','empGoals','users'));
    }

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
        $data = ConfigPms::where('user_id', auth()->user()->id)->pluck('selected_columns');
        $array_selectedKPIColumns = str_getcsv($data['0']);

        return \Excel::download(new SampleKPIFormExport($array_selectedKPIColumns), 'Template_SampleKPIForm.xlsx');

   }

   /*
        Publish the KPIForm by assigned to the given assignees,assigners.
   */
    public function publishKPIForm(Request $request)
    {

        //dd($request->selected_kpi_form_id);
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

        return "KPI Published Successfully";
    }

    public function showKPIReviewPage_Assignee(Request $request)
    {
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
          $show['appraiser'] = false;
            $show['manager'] = false;

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

        $review  =  VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=','vmt_pms_kpiform_assigned.vmt_pms_kpi_form_id')
        ->join('vmt_pms_kpiform_details','vmt_pms_kpiform_details.vmt_pms_kpiform_id','=','vmt_pms_kpiform_assigned.vmt_pms_kpi_form_id')
        ->whereRaw("vmt_pms_kpiform_assigned.assignee_id IN($request->assignee_id)")
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
        $kpiRowsId = $review;
         $kpiRows      =  VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id', $ff->vmt_pms_kpi_form_id)->get();
          $reviewCompleted = false;

        $assignedGoals  = VmtEmployeePMSGoals::where('kpi_table_id', $ff->vmt_pms_kpi_form_id)->where('employee_id', $request->assignee_id)->orderBy('updated_at', 'DESC')->first();
        // rating details

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
       // dd($assignedGoals);
        $assignedEmployee_Userdata = User::where('id',  $request->assignee_id)->first();
        $assignedEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $request->assignee_id)->first();
        $empSelected = true;
        $employeeData = VmtEmployee::where('userid', $request->assignee_id)->first();


        return view('pms.vmt_pms_kpiappraisal_review_hr', compact('review','assignedEmployee_Userdata','assignedEmployeeOfficeDetails','assignedGoals','empSelected','employeeData','assignersName','config','show','ratingDetail','kpiRowsId','kpiRows','reviewCompleted'));


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

    public function saveAssigneeReviews(Request $request)
    {

    }

    public function saveReviewerReviews(Request $request)
    {

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

    public function calculateOverallReviewRatings()
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

}
