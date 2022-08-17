<?php

namespace App\Http\Controllers\PMS;
use App\Models\User;
use App\Models\Department;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\VmtEmployee;
use App\Models\ConfigPms;
use App\Models\VmtEmployeeOfficeDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
    New PMS Controller

*/

class VmtPMSModuleController extends Controller
{


    public function showPMSDashboard()
    {

        //Check whether the current user has any KPI forms
        $existingGoals = VmtPMS_KPIFormAssignedModel::where('assignee_id', auth::user()->id)->get();

        // $users = User::select('users.id', 'users.name')->join('vmt_employee_details',  'vmt_employee_details.userid', '=', 'users.id')->where('active', 1)->get();
        $departments = Department::where('status', 'A')->get();

        //Get existing KPI forms
        $existingKPIForms = VmtPMS_KPIFormModel::where('author_id', auth::user()->id)->get(['id','form_name']);

        //Dashboard vars
        $employeesGoalsSetCount = 0;
        $totalEmployeesCount = User::all()->count();
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

        //dd($this->getEmployeesOfManager(['EMP100','Vasa102'])->toArray());
        //dd($this->getManagersForEmployees(['2','3','4','5','6'])->toArray());

        return view('pms.vmt_pms_dashboard_v2', compact('dashboardCountersData','existingGoals','existingKPIForms','pmsConfig','departments','employees'));
    }

    public function assignKPIForm($assignees_id, $reviewers_id, $kpi_form_id, $author_id)
    {

    }

    public function publishKPIForm()
    {

    }

    public function showKPIReviewPage_Assignee(Request $request)
    {

    }

    public function showKPIReviewPage_Reviewer(Request $request)
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
    public function getEmployeesOfManager($reviewers_emp_code)
    {
        $employeesList = User::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                         ->whereIn('vmt_employee_office_details.l1_manager_code', $reviewers_emp_code)
                         ->get(['users.name','users.id']);

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
                         ->distinct()->get(['vmt_employee_office_details.l1_manager_code'])->toArray();

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
