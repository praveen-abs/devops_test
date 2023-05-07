<?php

namespace App\Services\PMSReportsService;
use Illuminate\Support\Facades\Validator;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormDetailsModel;
use App\Models\VmtPMS_KPIFormModel;
use App\Models\User;
use Illuminate\Support\Facades\Validator;



class VmtPMSFormsMgmtService
{

    public function getAllPMSFormTemplates(){
    // get all pms record


    }


    public function getAssignedPMSFormTemplates($user_id){
        //Get all forms for a given user_code
        $validator = Validator::make(
            $data = [
                'user_code' => $user_id,
            ],
            $rules = [
                'user_code' => 'required|exists:users,id',
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
            $user_id = User::where('user_code', $user_code)->first()->id;

            $emp_assignedpmsfrom=VmtPMS_KPIFormModel::join('vmt_pms_kpiform_details','vmt_pms_kpiform.id','=','vmt_pms_kpiform_details.vmt_pms_kpiform_id')
            ->join('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.vmt_pms_kpiform_id','=','vmt_pms_kpiform_details.vmt_pms_kpiform_id')
            ->join('users','users.id','=','vmt_pms_kpiform_assigned.assignee_id')
            ->where('vmt_pms_kpiform_assigned.assignee_id',$user_id)
            ->get()->unique();

            return response()->json([
                "status" => "success",
                "message" => "PMS form templates fetched successfully",
                "data" => $emp_assignedpmsfrom,
            ]);


        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch getProfgetEmployeePMSFormTemplate_AsExcelilePicture",
                "data" => $e,
            ]);

        }
    }
    public function getPMSFormforGivenPMSFormID($pms_form_id){

        $validator = Validator::make(
            $data = [
                'pms_form_id' => $pms_form_id
            ],
            $rules = [
                'pms_form_id' =>'required'
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            $pms_single_form = array();
            $pms_form = VmtPMS_KPIFormModel::where('id',$pms_form_id)->first();
            $form_name =  $pms_form['form_name'];
            $available_columns =  explode(",",$pms_form['available_columns']);
            $pms_from_details_query = VmtPMS_KPIFormDetailsModel::where('vmt_pms_kpiform_id',$pms_form_id)->get();
            foreach($pms_from_details_query as $single_record){
               foreach($available_columns as $single_columns ){
                $pms_single_form[$single_columns] = $single_record[$single_columns];
               }
               dd($pms_single_form);
            }
        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "getPMSFormforGivenPMSFormID",
                "data" => $e,
            ]);

        }
    }






}

?>
