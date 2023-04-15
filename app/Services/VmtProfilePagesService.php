<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeDetails;
use App\Models\VmtEmployeeOfficeDetails;
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
                                 //'getEmployeeDocuments',
                                 ]
                    )
                    //->join('vmt_onboarding_documents', 'vmt_onboarding_documents.id', '=', 'vmt_employee_documents.doc_id')
                    ->where('users.id',$user_id)
                    ->first();


        $response_docs = DB::table('vmt_employee_documents')
                        ->join('vmt_onboarding_documents', 'vmt_onboarding_documents.id', '=', 'vmt_employee_documents.doc_id')
                        ->where('vmt_employee_documents.user_id',$response->id)
                        ->get();
                        
        //dd($response_docs);
        $response['employee_documents'] = $response_docs;

        //Add the documents details



        //Remove ID from user table
        unset($response['id']);


        return $response;
    }

}
