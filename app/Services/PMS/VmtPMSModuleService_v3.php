<?php

namespace App\Services;

use App\Models\ConfigPms;
use App\Models\Department;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormModel;
use Carbon\Carbon;

class VmtPMSModuleService_v3
{


    public function getPMSConfig()
    {
        $config = ConfigPms::first();
        return $config->toArray();
    }


    //Todo : Need to pass all the params
    public function savePMSConfig()
    {
    }

    public function getEmployeeListForManger($user_id)
    {
        $currentEmpCode = User::whereIn('id', explode(',', $user_id))->pluck('user_code');

        $employeesList = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->whereIn('vmt_employee_office_details.l1_manager_code', $currentEmpCode)
            ->where('users.active', '1')
            ->where('users.is_ssa', '0')
            ->get(['users.name', 'users.id']);
        // dd($currentEmpCode);

        return $employeesList;
    }

    public function getManagersListForEmployees($employees_id)
    {
        //Fetch all the managers for the given employees_id list
        // dd();
        $managersList = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('vmt_employee_office_details.user_id', $employees_id)
            ->distinct()->get(['vmt_employee_office_details.l1_manager_code'])
            ->where('users.active', '1')
            ->where('users.is_ssa', '0')
            ->toArray();

        // dd($managersList);

        //Fetch the manager details from user table
        $managersDetailList = User::wherein('user_code', $managersList)->get(['id', 'name']);

        return $managersDetailList;
    }

    //Todo : Need to pass all the params
    public function saveKPIForm($data)
    {

        // dd($data);
        $config = ConfigPms::first();
        //  dd($config->selected_columns);
        $kpiTable  = new VmtPMS_KPIFormModel();

        $kpiTable->available_columns   =    $config->selected_columns;
        $kpiTable->author_id       =    $data['user_id'];
        $kpiTable->form_name     =    $data['name'];
        $kpiTable->save();
        $KpiLAST = $kpiTable->id;
        // $totRows  = count($data->form_details);

        $form_details = $data['form_details'];
        foreach ($form_details as $key => $item) {
            $kpiRow = new VmtPMS_KPIFormDetailsModel();
            $kpiRow->vmt_pms_kpiform_id   =    $KpiLAST;
            $kpiRow->dimension   =    isset($item['dimension']) && isset($item['dimension']) ? $item['dimension'] : '';
            $kpiRow->kpi         =    isset($item['kpi']) ? $item['kpi'] : '';
            $kpiRow->operational_definition   = isset($item['objectives']) ? $item['objectives'] : '';
            $kpiRow->measure     =    isset($item['measure'])  ? $item['measure'] : '';
            $kpiRow->frequency   =    isset($item['frequency']) ? $item['frequency'] : '';
            $kpiRow->target      =    isset($item['target'])  ? $item['target'] : '';
            $kpiRow->stretch_target  =    isset($item['stretchTarget']) ? $item['stretchTarget'] : '';
            $kpiRow->source          =    isset($item['source'])  ? $item['source'] : '';
            $kpiRow->kpi_weightage   =    isset($item['kpiWeightage'])  ? $item['kpiWeightage'] : '';
            $kpiRow->save();
        }

        return "Question Created Successfully";
    }

    public function getKPIFormAsDropdown($author_id)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $kpiTable  = VmtPMS_KPIFormModel::where('author_id', $author_id)
            ->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->get();
        // Don't Delete this is need for another purpose

        // $response = array();
        // // $id = 1;
        // foreach ($kpiTable as $key => $item) {
        //     $form['id'] = $item['id'];
        //     $form['form_name'] = $item['form_name'];
        //     array_push($response, $form);
        // }

        return $kpiTable;
    }

    public function getKPIFormDetails($form_id)
    {

        $KpiForm      = VmtPMS_KPIFormModel::where('id', $form_id)->first();
        $formDetails  = VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id', $form_id)->get();

        return response()->json([
            'status' => true,
            'message' => '',
            'data'   => ["form" => $KpiForm, "form_details" => $formDetails]
        ]);
    }

    public function selfDashboardDetails($author_id)
    {

        $user = User::find($author_id);

        //Get existing KPI forms
        $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', $author_id)->get(['id', 'form_name']);

        // get Departments data
        $departments = Department::where('is_active', 1)->get();

        // get Currently Logged username

        $author =  User::where('id', $user->id)->get(['id', 'user_code', 'name']);

        $reviewer = VmtEmployeeOfficeDetails::where('user_id', $user->id)
            ->leftJoin('users', 'vmt_employee_office_details.l1_manager_code', 'users.user_code')->get(
                [
                    'name',
                    'user_code',
                    'designation'
                ]
            );

        $table_pmsConfig = ConfigPms::find('1');
        $configuration['calendar_type'] = $table_pmsConfig->calendar_type;
        $configuration['year'] = $table_pmsConfig->year;
        $configuration['frequency'] = $table_pmsConfig->frequency;
        $configuration['assignment_period'] = $table_pmsConfig->assignment_period;
        // $configuration['author_name'] = $author[0]['name'];
        // $configuration['reviewer_name'] = $reviewer[0]['name'];

        // $employees = VmtEmployee::rightJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
        //     ->select(
        //         'users.name as emp_name',
        //         'users.id as id',
        //         'users.avatar as avatar',
        //     )
        //     ->where('users.active', '1')
        //     ->where('users.is_ssa', '0')
        //     ->orderBy('vmt_employee_details.created_at', 'ASC')
        //     ->get();


        // $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews')->WhereRaw("find_in_set(".auth()->user()->id.", reviewer_id)")->orWhereRaw("find_in_set(".auth()->user()->id.", assignee_id)")->orderBy('id','DESC')->get();
        $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews')
            ->orderBy('id', 'DESC')->where('assignee_id', $user->id)->get();

        // dd($pmsKpiAssigneeDetails);



        $flowCheck = 1;


        $allEmployeesList = User::leftJoin('vmt_employee_office_details', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->leftJoin('vmt_employee_details', 'users.id', '=', 'vmt_employee_details.userid')
            ->select('users.name', 'users.id', 'users.user_code', 'vmt_employee_office_details.designation')
            ->get();

        $allEmployeesWithoutLoggedUserList = User::leftJoin('vmt_employee_office_details', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->leftJoin('vmt_employee_details', 'users.id', '=', 'vmt_employee_details.userid')
            ->where('users.id', '!=', $author_id)
            ->select('users.name', 'users.id', 'users.user_code', 'vmt_employee_office_details.designation')
            ->get();

        $canShowOverallScoreCard_SelfAppraisal_Dashboard = fetchPMSConfigValue('can_show_overallscorecard_in_selfappraisal_dashboard');

        $response = [
            "Configuration" => $configuration,
            "ExistingKPIForms" => $existingKPIForms,
            "Departments" => $departments,
            "author" => $author,
            "reviewer" => $reviewer,
            "pmsKpiAssigneeDetails" => $pmsKpiAssigneeDetails,
            "canShowOverallScoreCard" => $canShowOverallScoreCard_SelfAppraisal_Dashboard
        ];

        return $response;
    }


    public function DashboardforEmployee(){

        $loggedUserId = Auth::id();

        $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', $loggedUserId)->get(['id','form_name']);
        $table_pmsConfig = ConfigPms::find('1');
        $calendar_type =  $table_pmsConfig->calendar_type;
        $year = $table_pmsConfig->year;
        $frequency = $table_pmsConfig->frequency;
        $assignment_period = $table_pmsConfig->assignment_period;

        // get Departments data
        $departments = Department::where('is_active', 1)->get();

        //Dashboard vars
        /*$employeesGoalsSetCount = 0;
        $totalEmployeesCount = User::where('active',1)->where('is_ssa',0)->count();
        $employeesAssessedCount = 0;
        $selfReviewCount = 0;
        $totalSelfReviewCount = 0;*/
        $employees = VmtEmployee::rightJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'users.name as emp_name',
                'users.id as id',
                'users.avatar as avatar',
            )
            ->where('users.active','1')
            ->where('users.is_ssa','0')
            ->orderBy('vmt_employee_details.created_at', 'ASC')
            ->get();

        // check leveles L1,L2,L3 in pms config
        $pmsConfigData = ConfigPms::first();
        $selectedReviewLevel = '';
        if(isset($pmsConfigData) && isset($pmsConfigData->selected_reviewlevel)){
            $selectedReviewLevel = $pmsConfigData->selected_reviewlevel;
        }

        $parentUserCode = VmtEmployeeOfficeDetails::where('user_id',$loggedUserId)->value('l1_manager_code');

        // Get logged in user Employee details
        $parentReviewerNames = [];
        $parentReviewerIds = [];

        $employeeManagerDetail = getEmployeeManager([$loggedUserId]);
        $parentReviewerNames = $employeeManagerDetail->pluck('name')->toArray();
        $parentReviewerIds = $employeeManagerDetail->pluck('id')->toArray();

        // Level 2
        if($selectedReviewLevel == '' || $selectedReviewLevel == 'L2' || $selectedReviewLevel == 'L3'){
            foreach($parentReviewerIds as $reviewerId){
                $reviewerManagerDetail = getEmployeeManager([$reviewerId]);
                $reviewerName = $reviewerManagerDetail->pluck('name')->first();
                $reviewerId = $reviewerManagerDetail->pluck('id')->first();
                if(!empty($reviewerName) && !empty($reviewerId)){
                    if(!in_array($reviewerName,$parentReviewerNames)){
                        array_push($parentReviewerNames,$reviewerName);
                    }
                    if(!in_array($reviewerId,$parentReviewerIds)){
                        array_push($parentReviewerIds,$reviewerId);
                    }
                }
            }
        }

        // Level 3
        if($selectedReviewLevel == '' || $selectedReviewLevel == 'L3'){
            foreach($parentReviewerIds as $reviewerId){
                $reviewerManagerDetail = getEmployeeManager([$reviewerId]);
                $reviewerName = $reviewerManagerDetail->pluck('name')->first();
                $reviewerId = $reviewerManagerDetail->pluck('id')->first();

                if(!empty($reviewerName) && !empty($reviewerId)){
                    if(!in_array($reviewerName,$parentReviewerNames)){
                        array_push($parentReviewerNames,$reviewerName);
                    }
                    if(!in_array($reviewerId,$parentReviewerIds)){
                        array_push($parentReviewerIds,$reviewerId);
                    }
                }
            }
        }
        $parentReviewerIds = implode(',',$parentReviewerIds);
        $parentReviewerNames = implode(',',$parentReviewerNames);

        $dashboardCountersData =  $this->getPerformanceDashboardSummaryStats();
        /*[];
        $dashboardCountersData['employeesGoalsSetCount'] = $employeesGoalsSetCount;
        $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
        $dashboardCountersData['employeesAssessedCount'] = $employeesAssessedCount;
        $dashboardCountersData['selfReviewCount'] = $selfReviewCount;
        $dashboardCountersData['totalSelfReviewCount'] = $totalSelfReviewCount;
        */
            $pmsKpiAssigneeDetails = VmtPMS_KPIFormAssignedModel::with('getPmsKpiFormReviews')/*->WhereRaw("find_in_set(".$loggedUserId.", reviewer_id)")->*/->orWhereRaw("find_in_set(".$loggedUserId.", assignee_id)")->orderBy('id','DESC')->get();

        $loggedInUser = Auth::user();

        $flowCheck = 3;


        $assignedUserDetails = VmtEmployee::join('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.user_code',
                'vmt_employee_office_details.department_id',
                'vmt_employee_office_details.designation',
                'vmt_employee_office_details.l1_manager_code',
                'vmt_employee_office_details.l1_manager_name',
                'vmt_employee_office_details.l1_manager_designation'
            )
            ->where('users.active', '1')
            ->where('users.is_ssa', '0')
            ->where('users.id',Auth::user()->id)
            ->first();

        $reportingManagerName = "---";

        if($assignedUserDetails)
            $reportingManagerName =User::where('user_code',$assignedUserDetails->l1_manager_code)->value('name');

        //// Rating calculation
        // Get assigned Details
        $assignedGoals  = VmtPMS_KPIFormAssignedModel::where('vmt_pms_kpiform_reviews.assignee_id',Auth::user()->id)->join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=','vmt_pms_kpiform_assigned.id')->first();

        // rating details
        $ratingDetail['performance'] ='-';
        $ratingDetail['ranking'] = '-';
        $ratingDetail['action'] = '-';
        $ratingDetail['rating'] = '-';


        //// Rating calculation -ends

        //dd($ratingDetail);
        $canShowOverallScoreCard_SelfAppraisal_Dashboard = fetchPMSConfigValue('can_show_overallscorecard_in_selfappraisal_dashboard');

        return [$dashboardCountersData,$canShowOverallScoreCard_SelfAppraisal_Dashboard,$ratingDetail,$reportingManagerName,$existingKPIForms,$assignedUserDetails,$departments,$employees,$pmsKpiAssigneeDetails,$flowCheck,$loggedInUser,$parentReviewerIds,$parentReviewerName,$parentReviewerIds,$calendar_type,$year,$frequency,$assignment_period];


    }

    protected function getPerformanceDashboardSummaryStats(){

        //Note : We need to show the Performance stats based on current frequency(month/quarter/half-yearly/yearly)
        $current_pms_config_data = ConfigPms::first();
        //dd($current_pms_config_data);
       // dd($current_pms_config_data->assignment_period);

        //Get the current PMS config details
        $calendar_type = $current_pms_config_data->calendar_type;
        $year = "April - 2022 to March - 2023"; //Hardcoded for now
        $assignment_period = 'q3'; //Need to add this as a new option in pmsconfig


        //Dashboard vars

        //EMPLOYEE GOALS
        $totalEmployeesCount = User::where('active',1)->where('is_ssa','0')->count();

            //Get all the forms assigned for the current period
            $assignedForms_currentReviewPeriod = \DB::table('vmt_pms_kpiform_assigned')
                                    ->where('calendar_type', $calendar_type)
                                    ->where('year', $year)
                                    ->where('assignment_period', $assignment_period);

            //Get their ids only
            $assignedFormsIds_currentReviewPeriod = $assignedForms_currentReviewPeriod->pluck('id');

        $employeesGoalsSetCount_currentReviewPeriod = $assignedForms_currentReviewPeriod->count();


        ////SELF-REVIEW
        $selfReviewCount_currentReviewPeriod =  \DB::table('vmt_pms_kpiform_reviews')
                                ->whereIn('vmt_pms_kpiform_assigned_id', $assignedFormsIds_currentReviewPeriod)
                                ->where('is_assignee_submitted', '1')
                                ->count();

            //dd($selfReviewCount_currentReviewPeriod);

        ////EMPLOYEES ASSESSED

        $employeesAssessedCount_currentReviewPeriod = \DB::table('vmt_pms_kpiform_reviews')
                                ->whereIn('vmt_pms_kpiform_assigned_id', $assignedFormsIds_currentReviewPeriod)
                                ->where('is_reviewer_submitted', 'Not Like', '%null%')
                                ->count();


        ////Final Score Published(When HR review is also done)

        $finalScoreCount  =  \DB::table('vmt_pms_kpiform_reviews')
                                ->whereIn('vmt_pms_kpiform_assigned_id', $assignedFormsIds_currentReviewPeriod)
                                ->where('is_reviewer_submitted', 'Not Like', '%null%')
                                ->count();





        $totalReviewedCount = \DB::table('vmt_pms_kpiform_reviews')->count();

        $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
        $dashboardCountersData['employeesGoalsSetCount'] = $employeesGoalsSetCount_currentReviewPeriod;
        $dashboardCountersData['selfReviewCount'] = $selfReviewCount_currentReviewPeriod;
        $dashboardCountersData['employeesAssessedCount'] = $employeesAssessedCount_currentReviewPeriod;
        $dashboardCountersData['totalReviewedCount'] = $totalReviewedCount;
        $dashboardCountersData['finalScoreCount'] =  $finalScoreCount;

        return $dashboardCountersData;
    }


    public function getPMSRatingCardDetails()
    {
    }

    //Todo : Need to pass all the params
    public function savePMSRatingCardDetails()
    {
    }

    public function getDashboardCounters_OrgAppraisal()
    {
    }

    public function getDashboardCounters_TeamAppraisal()
    {
    }

    public function getDashboardCounters_SelfAppraisal()
    {
    }

    /*
        Gets the list of assigned PMS forms based on the given parameters.

        1. Org appraisal  : $assignment_period, $year, $client_id, $review_status
        2. Team appraisal : $assignment_period, $year, $client_id, $review_status, $team_manager_userid
        3. Self appraisal : $assignment_period, $year, $client_id, $review_status, $self_userid

    */
    private function getAssignedPMSFormsList($assignment_period, $year, $client_id, $review_status, $team_manager_userid = null, $self_userid = null)
    {
    }

    /*
        For self-appraisal
    */
    public function getAssignedPMSFormsList_ForSelfAppraisal($assignment_period, $year, $client_id, $review_status, $self_userid)
    {
        //Write Validator
        //call $this->getAssignedPMSFormsList()
    }

    /*
        For team-appraisal
    */
    public function getAssignedPMSFormsList_ForTeamAppraisal($assignment_period, $year, $client_id, $review_status, $team_manager_userid)
    {
        //Write Validator
        //call $this->getAssignedPMSFormsList()

    }

    /*
        For org-appraisal
    */
    public function getAssignedPMSFormsList_ForOrgAppraisal($assignment_period, $year, $client_id, $review_status)
    {
        //Write Validator
        //call $this->getAssignedPMSFormsList()

    }


    /*
        Returns the reviewed form details for a given Assignee user_id such as,
            Goals details
            Assignee review details, Assigners review details
            Review ratings, if completed
    */
    public function getReviewedPMSFormDetails($assignment_period, $year, $assignee_userid)
    {
    }

    /*
        Returns the overall ratings for a given assignee

    */
    public function getAssigneeOverallRatings($year, $assignee_userid)
    {
    }

    /*
        Returns the specific PMS form rating for a given assignee

        Use $assigned_pms_formid, if assigned form id is known
    */
    public function getAssigneePMSFormRating($assignment_period, $year, $assignee_userid, $assigned_pms_formid = null)
    {
    }

    /*
        Get the PMS review timeline for a given assignee

        Use $assigned_pms_formid, if assigned form id is known
    */
    public function getPMSReviewTimeline($assignment_period, $year, $assignee_userid, $assigned_pms_formid = null)
    {
    }

    /*
        Download a PMS form in excel format.
    */
    public function downloadPMSForms_AsExcel($assignment_period, $year, $pms_formid = null)
    {
    }

    /*
        Upload a PMS form in excel format.

        //Todo : Need to decide the params. Also use PMS Config for validating the excelsheet columns.
    */
    public function validatePMSExcelForm()
    {
    }
}
