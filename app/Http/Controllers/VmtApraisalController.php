<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ApraisalQuestion;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Auth;

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
}
