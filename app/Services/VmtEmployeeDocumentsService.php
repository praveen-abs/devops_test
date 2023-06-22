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

            // $response = VmtDocuments::leftJoin('vmt_employee_documents','vmt_employee_documents.doc_id','=','vmt_documents.id')
            //         ->where('vmt_employee_documents.user_id',$query_user_id)
            //          ->orWhereNull('vmt_employee_documents.id')
            //         ->where('vmt_documents.is_onboarding_doc','0')
            //         // ->where('vmt_documents.is_mandatory','1')
            //         ->get();


             $query_document =VmtDocuments::all();
             $query_doc_id = array();
          foreach ($query_document as $key => $Singledocid)
            {
                $query_doc_id[] = $Singledocid;
            }

             $query_user_doc_id = array();
          foreach ($query_doc_id as $key => $Singledocid)
            {
                $query_user_doc_id[] = VmtEmployeeDocuments::where('user_id',$query_user_id)->where('doc_id',$Singledocid['id'])->first();
             }

             $reponse= array_diff($query_user_doc_id,$query_doc_id);
             $emp_documents=array();
             $i=0;
             foreach ($reponse as $key => $docid) {

                 if($docid){
                     $emp_documents[$i]=$docid;
                     $emp_documents[$i]['document_name']=VmtDocuments::where('id',($key+1))->first()->document_name;
                 }else{
                      $emp_documents[$i]['document_name']=VmtDocuments::where('id',($key+1))->first()->document_name;
                      $emp_documents[$i]['status']=null;
                 }
                 $i++;
           }
            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $emp_documents
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

    public function updateEmployeeDocumentsSettings($data){
        try{
            foreach($data as $singleRecord){
                $document = VmtDocuments::where('id',$singleRecord['id'] )->first();
                $document->is_onboarding_doc = $singleRecord['is_onboarding_doc'];
                $document->is_mandatory = $singleRecord['is_mandatory'];
                $document->save();
            }


            return response()->json([
                "status" => "success",
                "message" => "Documents settings updated successfully",
                "data" => "",
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                "status" => "failure",
                "message" => "Error while updating vmt_documents",
                "data" => $e,
            ]);
        }

    }
}
