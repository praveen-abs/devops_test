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
use App\Mail\VmtAssignGoals;
use App\Mail\NotifyPMSManager;

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
        return "Questions Added";
    }

    // assign goals forms
    public function vmtAssignGoals(Request $request){
        $users = User::all();
        $employees = VmtEmployee::all();
        return view('vmt_pms_assigngoals', compact('users', 'employees'));
    }

    // publish goals
    public function vmtPublishGoals(Request $request){
        //dd($request->all());

        if($request->has("employees")){
            $employeeList  = explode(',', $request->employees[0]); 
            $mailingEmpList  = VmtEmployee::whereIn('id', $employeeList)->pluck('email_id'); 
            //dd($employeeList);
            foreach ($employeeList as $index => $value) {
                // code...
                $empPmsGoal = new VmtEmployeePMSGoals; 
                $empPmsGoal->kpi_table_id   = $request->kpitable_id;
                $empPmsGoal->assignment_period = $request->assignment_period;
                $empPmsGoal->coverage     = $request->coverage;
                $empPmsGoal->reviewer_id  = $request->reviewer;
                $empPmsGoal->employee_id  = $value; 
                $empPmsGoal->mail_link    = url('vmt-pmsappraisal-review'); 
                $empPmsGoal->author_id    = auth::user()->id; 
                $empPmsGoal->self_approved  = false;
                $empPmsGoal->save();
            }

            \Mail::to($mailingEmpList)->send(new VmtAssignGoals(url('vmt-pmsappraisal-review')));

            return "Goal Published";
        }
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
                }
                return view('vmt_appraisalreview_employee', compact('kpiRows', 'employeeData', 'assignedGoals', 'showModal'));
            }else{
                return view('vmt_appraisalreview_employee', compact('kpiRows', 'employeeData', 'assignedGoals', 'showModal'));
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
            \Mail::to($reviewManager->email)->send(new NotifyPMSManager(auth::user()->name));
        }
        return "Saved";
    }
}
