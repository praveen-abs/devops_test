<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class VmtEmployeeDocumentsService {


    public function getEmployeeAllDocumentDetails($user_code){

            //Validate
            $validator = Validator::make(
            $data = [
                'user_code' => $user_code
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

           $query_user_id=User::where('user_code',$user_code)->first()->id;

            $response = VmtDocuments::leftJoin('vmt_employee_documents','vmt_employee_documents.doc_id','=','vmt_documents.id')
                    ->where('vmt_employee_documents.user_id',$query_user_id)
                     ->orWhereNull('vmt_employee_documents.id')
                     ->where('vmt_documents.is_onboarding_doc','0')
                    // ->where('vmt_documents.is_mandatory','1')
                    ->get();

            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $response
            ]);


        }
        catch(\Exception $e){
            return response()->json([
                'status' => 'failure',
                'message' => 'Error while fetching employee document details',
                'data' => $e
            ]);

        }

    }

    /*
        Get employee document settings from vmt_documents
        We will set whether a doc is MANDATORY or not, etc


    */
    public function getEmployeeDocumentsSettings(){

        try{
            $response = VmtDocuments::all();

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching from vmt_documents",
                "data" => $e,
            ]);
        }

    }
}
