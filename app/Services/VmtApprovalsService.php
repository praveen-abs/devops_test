<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtOnboardingDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class VmtApprovalsService {

    public function processSingleDocumentApproval($record_id, $status){
        try
        {
            $query = VmtEmployeeDocuments::find($record_id);
            $query->status = $status;
            $query->save();

            return "success";
        }
        catch(\Exception $e){
            return "failure";
        }
    }

    /*
        Updates multiple docs with the given status

    */
    public function processBulkDocumentApprovals($record_ids, $status){
        try
        {
            $query_docs = VmtEmployeeDocuments::whereIn('id',$record_ids)->get();

            foreach($query_docs as $singleDoc)
            {
                $singleDoc->status = $status;
                $singleDoc->save();
            }


            return "success";
        }
        catch(\Exception $e){
            return "failure";
        }

    }

    public function isAllOnboardingDocumentsApproved($user_code){

        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try{

            $query_user = User::where('user_code',$user_code)->first();

            // $mandatory_doc_ids = VmtOnboardingDocuments::where('is_mandatory','1')->pluck('id');

            $query_user_docs_count = VmtEmployeeDocuments::join('vmt_onboarding_documents','vmt_onboarding_documents.id','=','vmt_employee_documents.doc_id')
                                        ->where('vmt_employee_documents.user_id', $query_user->id)
                                        ->where('vmt_employee_documents.status', '<>','Approved')
                                        ->get()->count();


            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $query_user_docs_count > 0 ? 'false' : 'true'
            ]);

        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ isAllOnboardingDocumentsApproved() ] ",
                'data' => $e
            ]);
        }


    }
}
