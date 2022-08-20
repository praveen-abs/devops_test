<?php

namespace App\Http\Controllers\PMS;
use App\Models\User;
use App\Models\Department;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\VmtEmployee;
use App\Models\VmtPMS_KPIFormDetailsModel;
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
        $existingGoals = VmtPMS_KPIFormAssignedModel::WhereIn('assignee_id', [auth::user()->id])->get();

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

        //dd($this->getEmployeesOfManager(['EMP100','Vasa102'])->toArray());
        //dd($this->getManagersForEmployees(['2','3','4','5','6'])->toArray());

        return view('pms.vmt_pms_dashboard_v2', compact('dashboardCountersData','existingGoals','existingKPIForms','pmsConfig','departments','employees'));
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
        $data = ConfigPms::where('user_id', auth()->user()->id)->first();
        $show['dimension'] = 'true';
        $show['kpi'] = 'true';
        $show['operational'] = 'true';
        $show['measure'] = 'true';
        $show['frequency'] = 'true';
        $show['target'] = 'true';
        $show['stretchTarget'] = 'true';
        $show['source'] = 'true';
        $show['kpiWeightage'] = 'true';
        $q = "jjj";
        $w = "jjj";
        $r = "jjj";
        $t = "jjj";
        $y = "jjj";
        $u = "jjj";
        // dd($data);
       // $data = DB::table('tbl_customer')->orderBy('CustomerID', 'DESC')->get();
       $data_array [] = array("CustomerName","Gender","Address","City","PostalCode","Country");
       foreach($data as $data_item)
       {
           $data_array[] = array(
               'CustomerName' =>$q,
               'Gender' => $w,
               'Address' => $r,
               'City' => $t,
               'PostalCode' => $y,
               'Country' =>$u
           );
       }
       $this->ExportExcel($data_array);


//          $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('./assets/sample_kpi.xls');
// $worksheet = $spreadsheet->getSheet(0);
// $worksheet->getCell('C6')->setValue($q);
// $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
// $file_name='result_excel.xlsx';
// $writer->save($file_name);
// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment; filename="'.$file_name.'"');
// $writer->save("php://output");
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
