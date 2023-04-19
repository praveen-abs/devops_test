<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeDetails;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtOnboardingDocuments;
use App\Models\VmtEmployeeDocuments;
use Illuminate\Support\Facades\DB;

class VmtProfilePagesService{

    /*

        Get employee details related to profile pages.

    */

    public function getEmployeeProfileDetails(int $user_id)
    {

        $response = User::with([ 'getEmployeeDetails',
                                 'getEmployeeOfficeDetails',
                                 'getFamilyDetails',
                                 'getExperienceDetails',
                                 'getStatutoryDetails',
                                 'getEmergencyContactsDetails',
                                // 'getEmployeeDocuments',
                                 ]
                    )
                    //->join('vmt_onboarding_documents', 'vmt_onboarding_documents.id', '=', 'vmt_employee_documents.doc_id')
                    ->where('users.id',$user_id)
                    ->first();

       // dd($response->id);
        $response_docs = DB::table('vmt_employee_documents')
                        ->join('vmt_onboarding_documents', 'vmt_onboarding_documents.id', '=', 'vmt_employee_documents.doc_id')
                        ->where('vmt_employee_documents.user_id',$response->id)
                        ->get();
                        // dd($response_docs);

        //dd($response_docs);
        $response['employee_documents'] = $response_docs;

        //Add the documents details



        //Remove ID from user table
        unset($response['id']);


        return $response;
    }
    public function getEmployeePrivateDocumentFile($user_code,$doc_name){

        $doc_id=VmtOnboardingDocuments::where('document_name',$doc_name)->first()->id;
        $doc_filename=VmtEmployeeDocuments::where('doc_id',$doc_id)->first()->doc_url;
        $private_file = $user_code."/onboarding_documents/".$doc_filename;
        //dd(file(storage_path('employees/'.$private_file)));
        return response()->file(storage_path('employees/'.$private_file));



    }

}
