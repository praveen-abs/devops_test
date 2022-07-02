<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ApraisalQuestion;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtKPITable;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtEmployeeOfficeDetails;
use App\Mail\VmtAssignGoals;
use App\Mail\NotifyPMSManager;
use App\Mail\PMSReviewCompleted;
use Session;

class VmtApraisalController extends Controller
{
    //
    public function index(){
        $questionList = VmtAppraisalQuestion::all();
        //dd($questions);
        return view('vmt_apraisalQuestions', compact('questionList'));
    }

    //
    public function bulkUploadQuestion(){
        $importDataArry = \Excel::import(new ApraisalQuestion, request()->file('file'));
        
        Session::put('result', 'Question Created Successfully');
        Session::put('alert', 'success');
        return redirect()->back();

    }

    // assign goals forms
    public function vmtAssignGoals(Request $request){

        $empGoals = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
                            ->leftJoin('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
                            ->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'vmt_employee_details.id')
                            ->select(
                                'vmt_employee_details.*', 
                                'users.name as emp_name', 
                                'users.email as email_id',
                                'vmt_employee_office_details.department',
                                'vmt_employee_office_details.designation', 
                                'vmt_employee_office_details.l1_manager_code',
                                'vmt_employee_office_details.l1_manager_name',
                                'vmt_employee_office_details.l1_manager_designation'
                            )
                            ->orderBy('created_at', 'DESC')
                            ->whereNotNull('emp_no')
                            ->get();



       // $empGoals = VmtEmployee::select('emp_no', 'emp_name', 'email_id', 'vmt_employee_details.designation', 'l1_manager_name', 'status', 'officical_mail')->join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.employee_id', '=', 'vmt_employee_details.id')->join('vmt_employee_office_details',  'vmt_employee_office_details.emp_id', '=', 'vmt_employee_details.id')->where('author_id', auth()->user()->id)->get();
        if (auth()->user()->hasrole('Employee')) {
            $emp = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->where('userid', auth()->user()->id)->first();
            $rev = VmtEmployee::where('emp_no', $emp->l1_manager_code)->first();
            $users = User::where('id', $rev->userid)->get();
        } elseif (auth()->user()->hasrole('Manager')) {
            $getId = VmtEmployee::where('userid', auth()->user()->id)->first();
            $employees = VmtEmployee::select('vmt_employee_details.id', 'emp_name')->join('vmt_employee_office_details',  'emp_id', '=', 'vmt_employee_details.id')->where('l1_manager_code', $getId->emp_no)->get();
            $users = User::join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.reviewer_id', '=', 'users.id')->get();
        } else {
            $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
            ->select(
                'vmt_employee_details.*', 
                'users.name as emp_name', 
            )
            ->orderBy('created_at', 'ASC')
            ->whereNotNull('emp_no')
            ->get();

           // $users = User::all();
            //reviewer's list
            $currentEmpCode = VmtEmployee::where('userid', auth::user()->id)->pluck('emp_no');
            $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'users.id as id',
                'vmt_employee_office_details.officical_mail as email',
            )
            ->orderBy('users.name', 'ASC')
            ->where('l1_manager_code', $currentEmpCode)
            ->get();
            
            
            // ->select('users.id' ,'users.name')
            // ->
            // ->get();
        }
        return view('vmt_pms_assigngoals', compact('users', 'employees','empGoals'));
    }

    public function vmtGetAllChildEmployees(Request $request)
    {
        if($request->has("emp_id")){

            $currentEmpCode = VmtEmployee::where('userid',$request->emp_id)->pluck('emp_no');
            $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'vmt_employee_office_details.emp_id as id',
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
            $mailingEmpList  = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->whereIn('userid', $employeeList)->pluck('officical_mail'); 
            $mailingRevList  = User::whereIn('id', array($request->reviewer))->pluck('email'); 
            
            //dd($employeeList);
            foreach ($employeeList as $index => $value) {
                // code...
                $empPmsGoal = new VmtEmployeePMSGoals; 
                $empPmsGoal->kpi_table_id   = $request->kpitable_id;
                $empPmsGoal->assignment_period = $request->assignment_period_start;
                //$empPmsGoal->assignment_period_start = $request->assignment_period_start;
                //$empPmsGoal->assignment_period_end = $request->assignment_period_end;
                //$empPmsGoal->assignment_period_year = $request->assignment_period_year;
                $empPmsGoal->coverage     = $request->coverage;
                $empPmsGoal->reviewer_id  = $request->reviewer;
                $empPmsGoal->employee_id  = $value; 
                $empPmsGoal->mail_link    = url('vmt-pmsappraisal-review'); 
                $empPmsGoal->author_id    = auth::user()->id; 
                $empPmsGoal->self_approved  = false;
                $empPmsGoal->save();
            }
            if (auth()->user()->hasrole('Employee')) {
                \Mail::to($mailingRevList)->send(new VmtAssignGoals(url('vmt-pmsappraisal-review')));
            } else {
               $finalMailList = $mailingEmpList->merge($mailingRevList);
                \Mail::to($finalMailList)->send(new VmtAssignGoals(url('vmt-pmsappraisal-review')));
            }
            Session::put('result', 'Question Created Successfully');
            Session::put('alert', 'success');
            return redirect()->back();
        }
        Session::put('result', 'Permission Denied');
        Session::put('alert', 'error');
        return redirect()->back();
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
                $kpiRow = new VmtAppraisalQuestion;
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
                $kpiTable  = new VmtKPITable; 
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

    // show kpi table assigned for employees
    public function showEmployeeApraisalReview(Request $request)
    {
        // code...
        $employeeData    = VmtEmployee::where('userid', auth::user()->id)->first();
        $kpiRows  = [];
        if($employeeData){
            $assignedGoals  = VmtEmployeePMSGoals::where('employee_id', $employeeData->id)->orderBy('updated_at', 'DESC')->first();
            $showModal = false; 
            if($assignedGoals){
                $showModal = $assignedGoals->self_approved ? false : true;
                $kpiData  = VmtKPITable::find($assignedGoals->kpi_table_id);
                if($kpiData){
                    $kpiRowArray  =  explode(',', $kpiData->kpi_rows);
                    $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();

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
                        $reviewArrayManager = (json_decode($assignedGoals->manager_kpi_review, true));
                        $percentArrayManager = (json_decode($assignedGoals->manager_kpi_percentage, true));
                        foreach ($kpiRows as $index => $value) {
                            // code...
                            $kpiRows[$index]['manager_kpi_review'] = $reviewArrayManager[$value->id];
                            $kpiRows[$index]['manager_kpi_percentage'] = $percentArrayManager[$value->id];
                        }
                    }

                    if($assignedGoals->hr_kpi_review != null){
                        $reviewHrArray = (json_decode($assignedGoals->hr_kpi_review, true));
                        $percentHrArray = (json_decode($assignedGoals->hr_kpi_percentage, true));
                        foreach ($kpiRows as $index => $value) {
                            // code...
                            $kpiRows[$index]['hr_kpi_review'] = $reviewHrArray[$value->id];
                            $kpiRows[$index]['hr_kpi_percentage'] = $percentHrArray[$value->id];
                        }

                        $reviewCompleted = true;
                    }
                }
                return view('vmt_appraisalreview_employee', compact('kpiRows', 'employeeData', 'assignedGoals', 'showModal', 'reviewCompleted'));
            }else{
                $reviewCompleted = false;
                return view('vmt_appraisalreview_employee', compact('kpiRows', 'employeeData', 'assignedGoals', 'showModal', 'reviewCompleted'));
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
            $kpiData->save();

            $reviewManager = User::find($kpiData->reviewer_id);
            //dd($reviewManager->email);

            $currentUser_empDetails = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first();

            \Mail::to($reviewManager->email)->send(new NotifyPMSManager(auth::user()->name, $currentUser_empDetails->designation, $reviewManager->name ));
        }
        return "Saved.Sent mail to manager ".$reviewManager->email;
    }

    // Manger review : to see kpi table filled by employees
    public function showManagerApraisalReview(Request $request){

        // show review for HR
        if(auth::user()->hasRole(['HR','Admin']) ){
            //dd("INside HR login");
            $pmsGoalList  = VmtEmployeePMSGoals::select('vmt_employee_details.emp_name', 'vmt_employee_pms_goals_table.*' )->rightJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_pms_goals_table.author_id')->orderBy('updated_at', 'DESC')->get();

            if($request->has('goal_id')){
                $assignedGoals  = VmtEmployeePMSGoals::find($request->goal_id);
                $employeeData = VmtEmployee::where('id', $assignedGoals->employee_id)->first();
                $kpiData      = VmtKPITable::find($assignedGoals->kpi_table_id);
                $kpiRowArray  = explode(',', $kpiData->kpi_rows);
                $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();
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
                    $reviewHrArray = (json_decode($assignedGoals->hr_kpi_review, true));
                    $percentHrArray = (json_decode($assignedGoals->hr_kpi_percentage, true));
                    foreach ($kpiRows as $index => $value) {
                        // code...
                        $kpiRows[$index]['hr_kpi_review'] = $reviewHrArray[$value->id];
                        $kpiRows[$index]['hr_kpi_percentage'] = $percentHrArray[$value->id];
                    }

                    $reviewCompleted = true;
                }
                $empSelected = true;
                //dd($kpiRows);
                return view('vmt_appraisalreview_hr', compact('pmsGoalList', 'employeeData', 'assignedGoals', 'kpiRows', 'empSelected', 'reviewCompleted'));
            }

            $kpiRows = [];
            $empSelected = false;
            $reviewCompleted = false;
            return view('vmt_appraisalreview_hr', compact('pmsGoalList', 'kpiRows', 'empSelected', 'reviewCompleted'));
        }



        $pmsGoalList  = VmtEmployeePMSGoals::select('vmt_employee_details.emp_name', 'vmt_employee_pms_goals_table.*' )->where('reviewer_id', auth::user()->id)->rightJoin('vmt_employee_details', 'vmt_employee_details.id', '=', 'vmt_employee_pms_goals_table.employee_id')->orderBy('updated_at', 'DESC')->get();

        if($request->has('goal_id')){
            $reviewCompled  = false;
            $assignedGoals  = VmtEmployeePMSGoals::find($request->goal_id);
            $employeeData = VmtEmployee::where('id', $assignedGoals->employee_id)->first();
            $kpiData      = VmtKPITable::find($assignedGoals->kpi_table_id);
            $kpiRowArray  = explode(',', $kpiData->kpi_rows);
            $kpiRows      = VmtAppraisalQuestion::whereIn('id', $kpiRowArray)->get();
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
                $reviewArrayManager = (json_decode($assignedGoals->manager_kpi_review, true));
                $percentArrayManager = (json_decode($assignedGoals->manager_kpi_percentage, true));
                foreach ($kpiRows as $index => $value) {
                    // code...
                    $kpiRows[$index]['manager_kpi_review'] = $reviewArrayManager[$value->id];
                    $kpiRows[$index]['manager_kpi_percentage'] = $percentArrayManager[$value->id];
                }
            }

            if($assignedGoals->hr_kpi_review != null){
                $reviewHrArray = (json_decode($assignedGoals->hr_kpi_review, true));
                $percentHrArray = (json_decode($assignedGoals->hr_kpi_percentage, true));
                foreach ($kpiRows as $index => $value) {
                    // code...
                    $kpiRows[$index]['hr_kpi_review'] = $reviewHrArray[$value->id];
                    $kpiRows[$index]['hr_kpi_percentage'] = $percentHrArray[$value->id];
                }

                $reviewCompleted = true;
            }
            $empSelected = true;

            return view('vmt_appraisalreview_manager', compact('pmsGoalList', 'employeeData', 'assignedGoals', 'kpiRows', 'empSelected', 'reviewCompleted'));
        }
        
        $kpiRows = [];
        $empSelected = false;
        $reviewCompleted = false; 
        return view('vmt_appraisalreview_manager', compact('pmsGoalList', 'kpiRows', 'empSelected', 'reviewCompleted'));
    }

    // Storing Manager Review given to the employees
    public function storeManagerApraisalReview(Request $request){
        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);
        if($kpiData){
            $kpiData->manager_kpi_review      = $request->managereview; //null
            $kpiData->manager_kpi_percentage  = $request->managerpercetage; //null
            //$kpiData->self_kpi_comments    = $request->selfcomments;//null
            $kpiData->save();

            $hrReview = User::find($kpiData->author_id);

            $currentUser_empDetails = VmtEmployeeOfficeDetails::where('user_id', auth::user()->id)->first();

            $hrList =  User::role('HR')->get(); 
            $hrEmails = $hrList->pluck('email'); 
            //$currentUserModel =   VmtEmployeeOfficeDetails::where('id', auth::user()->id)->first();


            //dd($reviewManager->email);
            \Mail::to($hrEmails)->send(new NotifyPMSManager(auth::user()->name,  $currentUser_empDetails->designation,$hrReview->name));
        }
        return "Saved";
    }

    // Storing Review Given by HR
    public function storeHRApraisalReview(Request $request){
        //dd($request->all());
        $kpiData  = VmtEmployeePMSGoals::find($request->goal_id);

        if($kpiData){

            $kpiData->hr_kpi_review      = $request->hreview; //null
            $kpiData->hr_kpi_percentage  = $request->hrpercetage; //null
            $kpiData->save();

            $managerData   = User::find($kpiData->reviewer_id);
            $employeeData = VmtEmployee::where('id', $kpiData->employee_id)->first();
            //$reviewManager = User::find($kpiData->reviewer_id);
            //dd($reviewManager->email);
            \Mail::to([$managerData->email, $employeeData->email_id])
                ->bcc(auth::user()->email)
                ->send(new PMSReviewCompleted());
        }
        return "Saved";   
    }
}
