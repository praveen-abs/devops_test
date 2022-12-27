<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeReimbursements;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtPMS_KPIFormAssignedModel;

class VmtApprovalsController extends Controller
{

    /*
        Shows the list of all in-active employees whose
        documents has to be approved

    */
    public function showDocumentsApprovalPage(Request $request)
    {
        //Fetch the in-active users
        //\DB::enableQueryLog();
        $vmtEmployees_InActive = VmtEmployee::join('users', 'users.id', '=', 'vmt_employee_details.userid')
        ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
        ->select(
            'users.name as emp_name',
            'users.active as emp_status',
            'users.email as email_id',
            'users.id as user_id',
            'users.avatar as avatar',
            'users.user_code as user_code',
            'vmt_employee_details.doj as doj',
            'vmt_employee_details.docs_reviewed as docs_reviewed'
        )
        ->orderBy('users.created_at', 'DESC')
        ->where('users.active', '0')
        ->where('users.is_ssa', '0')
        ->where('vmt_employee_details.docs_reviewed','like', '%-1%')//only if documents not yet reviewed
        ->get();
        //\Log::error( \DB::getQueryLog());

        //'like', 'T%')
        //dd($vmtEmployees_InActive->toArray());
        return view('vmt_approval_documents', compact('vmtEmployees_InActive'));
    }

    /*
        Page to approve a single employee's documents.

    */
    public function showDocumentsReviewPage(Request $request)
    {
        if(isset($request->user_code))
        {
            $user_code = $request->user_code;
            $user_id = User::where('user_code',$user_code)->value('id');
            $documents_filenames = VmtEmployee::where('userid',$user_id)
                                    ->get([
                                        'aadhar_card_file',
                                        'aadhar_card_backend_file',
                                        'pan_card_file',
                                        'passport_file',
                                        'voters_id_file',
                                        'dl_file',
                                        'education_certificate_file',
                                        'reliving_letter_file',
                                        'docs_reviewed'
                                    ]);

            $docs_reviewed  =  json_decode($documents_filenames[0]->docs_reviewed);
            //dd($documents_filenames[0]->aadhar_card_file);


        }
        else
        {
            $docs_reviewed =  null;
        }

        //Get all documents for the given user
        //dd($docs_reviewed);
        return view('vmt_document_reviews',compact('documents_filenames','user_code', 'docs_reviewed'));
    }


    // Store Document Review in docs_reviewed column
    public function storeDocumentsReviewByAdmin(Request $request){

        $docName  = $request->doc_name;
        $user_id  = User::where('user_code',$request->user_code)->value('id');
        $documents_filenames = VmtEmployee::where('userid', $user_id)->first();

        if($documents_filenames->docs_reviewed != null){
            $docReviewArray = json_decode($documents_filenames->docs_reviewed);
            $docReviewArray->$docName = (int)$request->approve_status;
        }else{
            $docReviewArray = array(
                'aadhar_card_file' => -1,
                'aadhar_card_backend_file' => -1,
                'pan_card_file' => -1,
                'passport_file' => -1,
                'voters_id_file' => -1,
                'dl_file' => -1,
                'education_certificate_file' => -1,
                'reliving_letter_file' => -1
            );
            $docReviewArray[$docName] = (int)$request->approve_status;
        }

        $documents_filenames->docs_reviewed = json_encode($docReviewArray);
        $documents_filenames->save();
        return "Saved";
    }

    // Approve all document
    public function approveAllDocumentByAdmin(Request $request){
        //dd($request->all());
        //$docName  = $request->doc_name;
        $user_id  = User::where('user_code',$request->user_code)->value('id');
        $documents_filenames = VmtEmployee::where('userid', $user_id)->first();

       /* if($documents_filenames->docs_reviewed != null){
            $docReviewArray = json_decode($documents_filenames->docs_reviewed);
            $docReviewArray->$docName = (int)$request->approve_status;
        }else{
            $docReviewArray = array(
                'aadhar_card_file' => -1,
                'aadhar_card_backend_file' => -1,
                'pan_card_file' => -1,
                'passport_file' => -1,
                'voters_id_file' => -1,
                'dl_file' => -1,
                'education_certificate_file' => -1,
                'reliving_letter_file' => -1
            );
            $docReviewArray[$docName] = (int)$request->approve_status;
        }*/

        $documents_filenames->docs_reviewed = json_encode($request->doc_array);
        $documents_filenames->save();
        return "Saved";
    }


    public function showPMSApprovalPage(Request $request)
    {

        return view("vmt_approval_pms");

    }

    public function fetchPendingPMSForms(Request $request)
    {

        $query_pendingforms = VmtPMS_KPIFormAssignedModel::join('vmt_pms_kpiform_reviews','vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id','=', 'vmt_pms_kpiform_assigned.id')
                        ->join('users as t1','t1.id','=','vmt_pms_kpiform_assigned.assignee_id')
                        ->join('users as t2','t2.id','=','vmt_pms_kpiform_assigned.reviewer_id')
                        ->select('vmt_pms_kpiform_reviews.id as pms_kpiform_review_id',
                            't1.name as assignee_name','t2.name as reviewer_name',
                            'vmt_pms_kpiform_assigned.assignment_period',
                            'vmt_pms_kpiform_reviews.is_reviewer_accepted'
                        )
                        ->where( 'vmt_pms_kpiform_reviews.is_reviewer_accepted', 'LIKE','%null%')
                        ->get();

        return $query_pendingforms;


    }

    public function approveRejectPMSForm(Request $request){

        $query_review_form = VmtPMS_KPIFormReviewsModel::find($request->kpiform_review_id);
        $status = null;

        if($request->status == "Approve")
            $status = "1";
        else
        if($request->status == "Reject")
            $status = "0";


        //decode the json string
        $json_column_value = json_decode($query_review_form->is_reviewer_accepted, true);

        //get the keys
        $keys = array_keys($json_column_value);

        //update each review status
        foreach($keys as $reviewer_id){
            $json_column_value[$reviewer_id] = $status;
        }

        //dd(json_encode($json_column_value));
        $query_review_form->is_reviewer_accepted = json_encode($json_column_value);
        $query_review_form->save();


        $response = [
            "status" => "success",
            "message" => "PMS ".$request->status." successfully"

        ];

        return $response;
    }

    function showReimbursementApprovalPage(Request $request){

        return view("vmt_approval_reimbursement");
    }

    function fetchPendingReimbursements(Request $request){
      $reimbursement_query= VmtEmployeeReimbursements::join('vmt_reimbursements','vmt_reimbursements.id','=','vmt_employee_reimbursements.reimbursement_type_id')
                            ->join('users','users.id','=','vmt_employee_reimbursements.user_id',)
                            //->join('users','users.id','=','vmt_employee_reimbursements.reviewer_id')
                            ->where('vmt_employee_reimbursements.status','pending')->get();

                            


      return $reimbursement_query;
    }

    function approveRejectReimbursements(Request $request){
        dd($request->all());

     $query_review_reimbursement = VmtEmployeeReimbursements::find($request->status);
        $status = null;

        if($request->status == "Approve")
            $status = "1";
        else
        if($request->status == "Reject")
            $status = "0";

    }
}

