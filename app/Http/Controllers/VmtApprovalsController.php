<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployee;

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




}
