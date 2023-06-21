<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\VmtPayrollComponents;
use Illuminate\Support\Facades\Validator;

class VmtPayrollComponentsService{


    public function CreatePayRollComponents($comp_name,$comp_type_id,$calculation_method,$comp_name_payslip,$epf,$esi,$status){

           //Validate
           $validator = Validator::make(
            $data = [
                'comp_name' => $comp_name,
                'comp_type_id' => $comp_type_id,
                'calculation_method' => $calculation_method,
                'comp_name_payslip' => $comp_name_payslip,
                'epf' => $epf,
                'esi' => $esi,
                'status' => $status
            ],
            $rules = [
                'comp_name' => 'required',
                'comp_type_id' => 'required',
                'calculation_method' => 'required',
                'comp_name_payslip' => 'required',
                'epf' => 'required',
                'esi' => 'required',
                'status' => 'required',
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
              $paygroup_components =VmtPayrollComponents::where('comp_name',$comp_name)->where('comp_type_id',$comp_type_id)->first();
              if(!empty($paygroup_components)){
                $save_paygroup_comp =$paygroup_components;
              }else{
                $save_paygroup_comp =new VmtPayrollComponents;
              }

              $save_paygroup_comp->comp_name = $comp_name;
              $save_paygroup_comp->comp_type_id =$comp_type_id ;
              $save_paygroup_comp->calculation_method =$calculation_method ;
              $save_paygroup_comp->comp_name_payslip=$comp_name_payslip;
              $save_paygroup_comp->epf=$epf ;
              $save_paygroup_comp->esi =$esi ;
              $save_paygroup_comp->status =$status;
              $save_paygroup_comp->save();


            return response()->json([
                "status" => "success",
                "message" => "Component added successfully",
            ]);


        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to add new component",
                "data" => $e->getmessage(),
            ]);

        }

    }
    public function UpdatePayRollComponents($comp_id,$comp_name,$comp_type_id,$calculation_method,$comp_name_payslip,$epf,$esi,$status){

           //Validate
           $validator = Validator::make(
            $data = [
                'comp_id' => $comp_id,
                'comp_name' => $comp_name,
                'comp_type_id' => $comp_type_id,
                'calculation_method' => $calculation_method,
                'comp_name_payslip' => $comp_name_payslip,
                'epf' => $epf,
                'esi' => $esi,
                'status' => $status
            ],
            $rules = [
                'comp_id' => 'required',
                'comp_name' => 'required',
                'comp_type_id' => 'required',
                'calculation_method' => 'required',
                'comp_name_payslip' => 'required',
                'epf' => 'required',
                'esi' => 'required',
                'status' => 'required',
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
              $paygroup_components =VmtPayrollComponents::where('id',$comp_id)->first();
              if(!empty($paygroup_components)){
                $save_paygroup_comp =$paygroup_components;
                $save_paygroup_comp->comp_name = $comp_name;
                $save_paygroup_comp->comp_type_id =$comp_type_id ;
                $save_paygroup_comp->calculation_method =$calculation_method ;
                $save_paygroup_comp->comp_name_payslip=$comp_name_payslip;
                $save_paygroup_comp->epf=$epf ;
                $save_paygroup_comp->esi =$esi ;
                $save_paygroup_comp->status =$status;
                $save_paygroup_comp->save();

                return response()->json([
                    "status" => "success",
                    "message" => "Component updated successfully",
                ]);

              }else{

                return response()->json([
                    "status" => "failure",
                    "message" => "No component is present for given id",
                ]);
              }




        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to update component",
                "data" => $e->getmessage(),
            ]);

        }

    }
    public function DeletePayRollComponents($comp_id){

           //Validate
           $validator = Validator::make(
            $data = [
                'comp_id' => $comp_id,
            ],
            $rules = [
                'comp_id' => 'required',
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
              $paygroup_components =VmtPayrollComponents::where('id',$comp_id)->first();
              if(!empty($paygroup_components)){
                $paygroup_components->delete();

                return response()->json([
                    "status" => "success",
                    "message" => "Component deleted successfully",
                ]);

              }else{

                return response()->json([
                    "status" => "failure",
                    "message" => "No component is present for given id",
                ]);
              }

        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to delete component",
                "data" => $e->getmessage(),
            ]);

        }

    }
    public function EnableDisableComponents($comp_id,$status){

           //Validate
           $validator = Validator::make(
            $data = [
                'comp_id' => $comp_id,
                'status' => $status,
            ],
            $rules = [
                'comp_id' => 'required',
                'status' => 'required',
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
              $paygroup_components =VmtPayrollComponents::where('id',$comp_id)->first();
              if(!empty($paygroup_components)){
                $save_paygroup_comp =$paygroup_components;
                $save_paygroup_comp->status =$status;
                $save_paygroup_comp->save();

                return response()->json([
                    "status" => "success",
                    "message" => "Component ".$paygroup_components->status." successfully",
                ]);

              }else{

                return response()->json([
                    "status" => "failure",
                    "message" => "No component is present for given id",
                ]);
              }

        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to". $paygroup_components->status ."component",
                "data" => $e->getmessage(),
            ]);

        }

    }

    public function ShowPaySlipTemplateMgmtPage(){

    }
    public function assignPaySlipTemplateToClient(){

    }


}
