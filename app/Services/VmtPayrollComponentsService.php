<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmpPaygroup;
use App\Models\VmtPaygroup;
use App\Models\VmtPaygroupComps;
use Illuminate\Support\Facades\DB;
use App\Models\VmtPayrollComponents;
use Illuminate\Support\Facades\Validator;

class VmtPayrollComponentsService{


    public function CreatePayRollComponents(
        $comp_name,
        $comp_type_id,
        $calculation_type,
        $amount,
        $percentage,
        $comp_name_payslip,
        $epf,
        $esi,
        $category_id,
        $is_part_of_empsal_structure,
        $is_taxable,
        $calculate_on_prorate_basis,
        $can_show_inpayslip,
        $status){

           //Validate
           $validator = Validator::make(
            $data = [
                'comp_name' => $comp_name,
                'comp_type_id' => $comp_type_id,
                'calculation_type' => $calculation_type,
                'amount' =>$amount,
                'percentage' =>$percentage,
                'comp_name_payslip' => $comp_name_payslip,
                'epf' => $epf,
                'esi' => $esi,
                'category_id' => $category_id,
                'is_part_of_empsal_structure' => $is_part_of_empsal_structure,
                'is_taxable' => $is_taxable,
                'calculate_on_prorate_basis' => $calculate_on_prorate_basis,
                'can_show_inpayslip' => $can_show_inpayslip,
                'status' => $status
            ],
            $rules = [
                'comp_name' => 'required',
                'comp_type_id' => 'required|numeric',
                'calculation_type' => 'required',
                'amount' => 'required',
                'percentage' => 'required',
                'comp_name_payslip' => 'nullable',
                'epf' => 'required|numeric',
                'esi' => 'required|numeric',
                'category_id' => 'required',
                'is_part_of_empsal_structure' => 'required|numeric',
                'is_taxable' => 'required|numeric',
                'calculate_on_prorate_basis' => 'required|numeric',
                'can_show_inpayslip' => 'required|numeric',
                'status' => 'required|numeric',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
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
                        return response()->json([
                            "status" => "Failure",
                            "message" => "Component is already created",
                        ]);
              }else{
                $save_paygroup_comp =new VmtPayrollComponents;
              }

              $save_paygroup_comp->comp_name = $comp_name;
              $save_paygroup_comp->comp_type_id =$comp_type_id ;
              $save_paygroup_comp->calculation_method =$calculation_type;
              if($calculation_type == '1'){
                $save_paygroup_comp->flat_amount =$amount;
              }else if($calculation_type == '2'){
                $save_paygroup_comp->percentage =$percentage;
              }
              $save_paygroup_comp->comp_name_payslip=$comp_name_payslip;
              $save_paygroup_comp->epf=$epf ;
              $save_paygroup_comp->esi =$esi ;
              $save_paygroup_comp->$category_id =$category_id;
              $save_paygroup_comp->is_part_of_empsal_structure =$is_part_of_empsal_structure ;
              $save_paygroup_comp->is_taxable =$is_taxable ;
              $save_paygroup_comp->calculate_on_prorate_basis =$calculate_on_prorate_basis ;
              $save_paygroup_comp->can_show_inpayslip =$can_show_inpayslip ;
              $save_paygroup_comp->status =$status;
              $save_paygroup_comp->save();
            $response=([
                    "status" => "success",
                    "message" => "Component added successfully",
                ]);
                  return $response;
            }
           catch(\Exception $e){
                    return response()->json([
                        "status" => "failure",
                        "message" => "Unable to add new component",
                        "data" => $e->getmessage(),
                    ]);

        }
    }

    public function UpdatePayRollEarningsComponents( $comp_id,$comp_name,$comp_type_id, $calculation_type,$amount,$percentage,$comp_name_payslip,$epf,$esi,$category_id,$is_part_of_empsal_structure,
                                            $is_taxable,$calculate_on_prorate_basis, $can_show_inpayslip, $status){

           //Validate
           $validator = Validator::make(
            $data = [
                'comp_id'=>$comp_id,
                'comp_name' => $comp_name,
                'comp_type_id' => $comp_type_id,
                'calculation_type' => $calculation_type,
                'amount' =>$amount,
                'percentage' =>$percentage,
                'comp_name_payslip' => $comp_name_payslip,
                'epf' => $epf,
                'esi' => $esi,
                'category_id' => $category_id,
                'is_part_of_empsal_structure' => $is_part_of_empsal_structure,
                'is_taxable' => $is_taxable,
                'calculate_on_prorate_basis' => $calculate_on_prorate_basis,
                'can_show_inpayslip' => $can_show_inpayslip,
                'status' => $status
            ],
            $rules = [
                'comp_id' => 'required|numeric',
                'comp_name' => 'required',
                'comp_type_id' => 'required|numeric',
                'calculation_type' => 'required',
                'amount' => 'required',
                'percentage' => 'required',
                'comp_name_payslip' => 'nullable',
                'epf' => 'required|numeric',
                'esi' => 'required|numeric',
                'category_id' => 'required',
                'is_part_of_empsal_structure' => 'required|numeric',
                'is_taxable' => 'required|numeric',
                'calculate_on_prorate_basis' => 'required|numeric',
                'can_show_inpayslip' => 'required|numeric',
                'status' => 'required|numeric',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
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
                $save_paygroup_comp->calculation_method =$calculation_type;
                if($calculation_type == '1'){
                    $save_paygroup_comp->flat_amount =$amount;
                }else if($calculation_type == '2'){
                    $save_paygroup_comp->percentage =$percentage;
                }
                $save_paygroup_comp->comp_name_payslip=$comp_name_payslip;
                $save_paygroup_comp->epf=$epf ;
                $save_paygroup_comp->esi =$esi ;
                $save_paygroup_comp->category_id =$category_id ;
                $save_paygroup_comp->is_part_of_empsal_structure =$is_part_of_empsal_structure ;
                $save_paygroup_comp->is_taxable =$is_taxable ;
                $save_paygroup_comp->calculate_on_prorate_basis =$calculate_on_prorate_basis ;
                $save_paygroup_comp->can_show_inpayslip =$can_show_inpayslip ;
                $save_paygroup_comp->status =$status;
                $save_paygroup_comp->save();

                $response=([
                    "status" => "success",
                    "message" => "Component updated successfully",
                ]);

              }else{
                $response=([
                    "status" => "failure",
                    "message" => "No component is present for given id",
                ]);
              }
              return $response;

        }
        catch(\Exception $e){
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
                'comp_id' => 'required|numeric',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
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
                'status' => 'required|numeric',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
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

                if($paygroup_components->status== '0'){
                    $message ="Component disable successfully";
                }else{
                    $message ="Component enable successfully";
                }
                return response()->json([
                    "status" => "success",
                    "message" => $message,
                ]);

              }else{

                return response()->json([
                    "status" => "failure",
                    "message" => "No component is present for given id",
                ]);
              }

        }
        catch(\Exception $e){
            if($paygroup_components->status== '0'){
                $message ="Unable to disable component";
            }else{
                $message = "Unable to enable component";
            }
            return response()->json([
                "status" => "failure",
                "message" => $message,
                "data" => $e->getmessage(),
            ]);

        }

    }
    public function AddAdhocAllowanceDetectionComp($comp_name,$category_id,$category_type,$is_taxable,$impact_on_gross){
        //Validate
        $validator = Validator::make(
         $data = [
             'comp_name' => $comp_name,
             'category_id' => $category_id,
             'category_type' => $category_type,
             'is_taxable' => $is_taxable,
             'impact_on_gross' => $impact_on_gross,
         ],
         $rules = [
             'comp_name' => 'required',
             'category_id' => 'required',
             'category_type' => 'required',
             'is_taxable' => 'nullable',
             'impact_on_gross' => 'nullable',

         ],
         $messages = [
             'required' => 'Field :attribute is missing',
             'numeric' => 'Field <b>:attribute</b> is invalid',
         ]

     );

     if($validator->fails()){
         return response()->json([
             'status' => 'failure',
             'message' => $validator->errors()->all()
         ]);
     }

     try{
         $paygroup_components =VmtPayrollComponents::where('comp_name',$comp_name)->first();
                    if(!empty($paygroup_components)){
                        return response()->json([
                            "status" => "Failure",
                            "message" => "Component is already Added",
                        ]);
              }else{
                $save_paygroup_comp =new VmtPayrollComponents;
              }
              $save_paygroup_comp->comp_name = $comp_name;
              $save_paygroup_comp->category_id =$category_id ;
              if($category_type =='allowance'){
                 $save_paygroup_comp->is_taxable =$is_taxable ;
              }else if($category_type =='detection'){
                 $save_paygroup_comp->impact_on_gross =$impact_on_gross ;
              }
              $save_paygroup_comp->save();


              $response=([
                "status" => "success",
                "message" => "Component added successfully",
            ]);

               return $response;
            }
           catch(\Exception $e){
                    return response()->json([
                        "status" => "failure",
                        "message" => "Unable to add new component",
                        "data" => $e->getmessage(),
                    ]);
                 }

 }

    public function UpdateAdhocAllowanceDetectionComp($comp_id,$comp_name,$is_taxable,$category,$category_type,$impact_on_gross){
        //Validate
        $validator = Validator::make(
         $data = [
             'comp_id'=>$comp_id,
             'comp_name' => $comp_name,
             'category_id' => $category_id,
             'category_type' => $category_type,
             'is_taxable' => $is_taxable,
             'impact_on_gross' => $impact_on_gross,
         ],
         $rules = [
             'comp_id' => 'required|numeric',
             'comp_name' => 'required',
             'category_id' => 'required',
             'category_type' => 'required',
             'is_taxable' => 'nullable',
             'impact_on_gross' => 'nullable',

         ],
         $messages = [
             'required' => 'Field :attribute is missing',
             'numeric' => 'Field <b>:attribute</b> is invalid',
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
             $save_paygroup_comp->category_id =$category_id ;
             if($category_type =='allowance'){
                $save_paygroup_comp->is_taxable =$is_taxable ;
             }else if($category_type =='detection'){
                $save_paygroup_comp->impact_on_gross =$impact_on_gross ;
             }

             $save_paygroup_comp->save();

              $response=([
                 "status" => "success",
                 "message" => "Component updated successfully",
             ]);

           }else{
              $response=([
                 "status" => "failure",
                 "message" => "No component is present for given id",
             ]);
           }
           return $response;

     }
     catch(\Exception $e){
         return response()->json([
             "status" => "failure",
             "message" => "Unable to update component",
             "data" => $e->getmessage(),
         ]);

     }

 }

 public function AddReimbursementComponents($comp_name,$category_id,$maximum_limit,$status){
    //Validate
    $validator = Validator::make(
     $data = [
         'comp_name' => $comp_name,
         'category_id' => $category_id,
         'maximum_limit' => $maximum_limit,
         'status' => $status,

     ],
     $rules = [
         'comp_name' => 'required',
         'category_id' => 'required',
         'maximum_limit' => 'required|numeric',
         'status' => 'required|numeric',

     ],
     $messages = [
         'required' => 'Field :attribute is missing',
         'numeric' => 'Field <b>:attribute</b> is invalid',
     ]

 );

 if($validator->fails()){
     return response()->json([
         'status' => 'failure',
         'message' => $validator->errors()->all()
     ]);
 }

 try{
     $paygroup_components =VmtPayrollComponents::where('comp_name',$comp_name)->first();
                if(!empty($paygroup_components)){
                    return response()->json([
                        "status" => "Failure",
                        "message" => "Component is already Added",
                    ]);
          }else{
            $save_paygroup_comp =new VmtPayrollComponents;
          }
          $save_paygroup_comp =$paygroup_components;
          $save_paygroup_comp->comp_name = $comp_name;
          $save_paygroup_comp->category_id =$category_id ;
          $save_paygroup_comp->maximum_limit =$maximum_limit ;
          $save_paygroup_comp->status =$status ;
          $save_paygroup_comp->save();


          $response=([
            "status" => "success",
            "message" => "Component added successfully",
        ]);

           return $response;
        }
       catch(\Exception $e){
                return response()->json([
                    "status" => "failure",
                    "message" => "Unable to add new component",
                    "data" => $e->getmessage(),
                ]);
             }

}
 public function UpdateReimbursementComponents($comp_id,$comp_name,$category_id,$maximum_limit,$status){
            //Validate
            $validator = Validator::make(
            $data = [
                'comp_id' => $comp_id,
                'comp_name' => $comp_name,
                'category_id' => $category_id,
                'maximum_limit' => $maximum_limit,
                'status' => $status,

            ],
            $rules = [
                'comp_name' => 'required',
                'category_id' => 'required',
                'maximum_limit' => 'required|numeric',
                'status' => 'required|numeric',

            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
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
                $save_paygroup_comp->category_id =$category_id ;
                $save_paygroup_comp->maximum_limit =$maximum_limit ;
                $save_paygroup_comp->status =$status ;
                $save_paygroup_comp->save();
            $response=([
                "status" => "success",
                "message" => "Component updated successfully",
            ]);

            }else{
            $response=([
                "status" => "failure",
                "message" => "No component is present ",
            ]);
            }
            return $response;

        }
        catch(\Exception $e){
        return response()->json([
            "status" => "failure",
            "message" => "Unable to update component",
            "data" => $e->getmessage(),
        ]);

        }

}


    public function addPaygroupCompStructure($paygroup_name,$description,$pf,$esi,$tds,$fbp,$sal_components,$assigned_employees)
    {
           //Validate
           $validator = Validator::make(
            $data = [
                'paygroup_name' => $paygroup_name,
                'description' => $description,
                'pf' => $pf,
                'esi' => $esi,
                'tds' => $tds,
                'fbp' => $fbp,
                'sal_components' =>$sal_components,
                'assigned_employees' => $assigned_employees
            ],
            $rules = [
                'paygroup_name' => 'required',
                'description' => 'required',
                'pf' => 'required|numeric',
                'esi' => 'required|numeric',
                'tds' => 'required|numeric',
                'fbp' => 'required|numeric',
                'sal_components' => 'required',
                'assigned_employees' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{
            $emp_data =User::where('id',auth()->user()->id)->first();

              $paygroup_components =VmtPaygroup::where('paygroup_name',$paygroup_name)->first();

              if(!empty($paygroup_components)) {
                    return response()->json([
                        "status" => "Failure",
                        "message" => "Salary Structure is already created",
                    ]);
               }
               else {
                $save_paygroup_comp =new VmtPaygroup;
               }
              $save_paygroup_comp-> client_id = $emp_data->client_id;
              $save_paygroup_comp->paygroup_name = $paygroup_name;
              $save_paygroup_comp->description =$description ;
              $save_paygroup_comp->pf =$pf ;
              $save_paygroup_comp->esi =$esi ;
              $save_paygroup_comp->tds =$tds ;
              $save_paygroup_comp->fbp =$fbp ;
              $save_paygroup_comp->save();
              $assign_comps_to_paygroup =$this->assignComponents_to_Paygroup($sal_components,$save_paygroup_comp->id);
              $assign_paygroupcomps_to_emp =$this->assignPaygroupComponents_to_Employee($assigned_employees,$save_paygroup_comp->id);

                if($assign_comps_to_paygroup['status'] =='success'&&$assign_paygroupcomps_to_emp['status'] =='success' ){
                    $response=([
                        "status" => "success",
                        "message" => "Salary Structure  added successfully",
                    ]);
                }else{
                    $emp_paygroup_components =VmtEmpPaygroup::where('paygroup_id',$save_paygroup_comp->id)->get(['id']);
                    $paygroup_comps =VmtPaygroupComps::where('paygroup_id',$save_paygroup_comp->id)->get(['id']);
                    $paygroup =VmtPaygroup::where('id',$save_paygroup_comp->id)->first();
                    if(!empty($emp_paygroup_components)){
                        $delete_assign_emp_comp_data = VmtEmpPaygroup::destroy($emp_paygroup_components);
                    }
                    if(!empty($paygroup_comps)){
                        $delete_assign_comp_data = VmtPaygroupComps::destroy($paygroup_comps);
                    }
                    if(!empty($paygroup)){
                        $paygroup->delete();
                    }

                    $response=([
                        "status" => "failure",
                        "message" => "Error while add Salary Structure ",
                    ]);
                }
                 return response()->json($response);


        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Unable to add new Salary Structure ",
                "data" => $e->getmessage(),
            ]);
        }

    }
    public function updatePaygroupCompStructure($paygroup_id,$paygroup_name,$description,$pf,$esi,$tds,$fbp,$sal_components,$assigned_employees)
    {
           //Validate
           $validator = Validator::make(
            $data = [
                'paygroup_id' => $paygroup_id,
                'paygroup_name' => $paygroup_name,
                'description' => $description,
                'pf' => $pf,
                'esi' => $esi,
                'tds' => $tds,
                'fbp' => $fbp,
                'sal_components' =>$sal_components,
                'assigned_employees' => $assigned_employees
            ],
            $rules = [
                'paygroup_id' => 'required',
                'paygroup_name' => 'required',
                'description' => 'required',
                'pf' => 'required|numeric',
                'esi' => 'required|numeric',
                'tds' => 'required|numeric',
                'fbp' => 'required|numeric',
                'sal_components' => 'required',
                'assigned_employees' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            $emp_data =User::where('id',auth()->user()->id)->first();

              $paygroup_components =VmtPaygroup::where('id',$paygroup_id)->first();

              if(!empty($paygroup_components))
              {
                $save_paygroup_comp = $paygroup_components;
                $save_paygroup_comp-> client_id = $emp_data->client_id;
                $save_paygroup_comp->paygroup_name = $paygroup_name;
                $save_paygroup_comp->description =$description ;
                $save_paygroup_comp->pf =$pf ;
                $save_paygroup_comp->esi =$esi ;
                $save_paygroup_comp->tds =$tds ;
                $save_paygroup_comp->fbp =$fbp ;
                $save_paygroup_comp->save();

                $assign_comps_to_paygroup =$this->assignComponents_to_Paygroup($sal_components,$paygroup_id);

                $assign_paygroupcomps_to_emp =$this->assignPaygroupComponents_to_Employee($assigned_employees,$paygroup_id);

                if($assign_comps_to_paygroup['status'] =='success'&&$assign_paygroupcomps_to_emp['status'] =='success' ){

                    $delete_assign_comp_data = VmtPaygroupComps::destroy($assign_comps_to_paygroup['data']);
                    $delete_assign_emp_comp_data = VmtEmpPaygroup::destroy($assign_paygroupcomps_to_emp['data']);
                    $response=([
                        "status" => "success",
                        "message" => "Salary Structure updated successfully",
                    ]);
                }else{
                    //delete currently  saved data in VmtPaygroup while getting error in assign structure to comp and comp to emp

                    $emp_paygroup_components =VmtEmpPaygroup::where('paygroup_id',$save_paygroup_comp->id)->get(['id']);
                    $paygroup_comps =VmtPaygroupComps::where('paygroup_id',$save_paygroup_comp->id)->get(['id']);
                    $paygroup =VmtPaygroup::where('id',$save_paygroup_comp->id)->first();
                    if(!empty($emp_paygroup_components)){
                        $delete_assign_emp_comp_data=VmtEmpPaygroup::destroy($emp_paygroup_components);
                    }
                   if(!empty($paygroup_comps)){
                       $delete_assign_comp_data= VmtPaygroupComps::destroy($paygroup_comps);
                    }
                    if(!empty($paygroup)){
                        $paygroup->delete();
                    }
                    $response=([
                        "status" => "failure",
                        "message" => "Error while add Salary Structure ",

                    ]);
                }
               }else{
                $response=([
                    "status" => "failure",
                    "message" => "No component is present ",
                ]);
               }

            return response()->json($response);
        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to add new Salary Structure ",
                "data" => $e->getmessage(),
            ]);

        }

    }

    public function assignComponents_to_Paygroup($sal_components,$paygroup_id){
        try{

            $paygroup_comps =VmtPaygroupComps::where('paygroup_id',$paygroup_id);
            if(!empty($paygroup_comps)){
                $data =$paygroup_comps->get(['id']);
            }else{
                $data='null';
            }

                foreach ($sal_components as $key => $singlecomp) {
                    $assign_comp_paygroup = new VmtPaygroupComps;
                    $assign_comp_paygroup->paygroup_id=$paygroup_id;
                    $assign_comp_paygroup->comp_id=$singlecomp;
                    $assign_comp_paygroup->save();
                }
                $response=([
                    "status" => "success",
                    "message" => "",
                    "data"=>$data
                ]);
             return $response;

        }catch(\Exception $e){

             $response=([
                "status" => "failure",
                "message" => "Unable to assign components ",
                "data" => $e->getmessage(),
            ]);

            return $response;
        }
}
public function assignPaygroupComponents_to_Employee($assigned_employees,$paygroup_id){

            try{
                $emp_paygroup_components =VmtEmpPaygroup::where('paygroup_id',$paygroup_id);
                if(!empty($emp_paygroup_components)){
                    $data =$emp_paygroup_components->get(['id']);
                }else{
                    $data='null';
                }

                foreach ($assigned_employees as  $key => $singleemp) {
                    $assign_comp_paygroup = new VmtEmpPaygroup;
                    $assign_comp_paygroup->user_id=$singleemp;
                    $assign_comp_paygroup->paygroup_id=$paygroup_id;
                    $assign_comp_paygroup->save();
                }

                $response=([
                    "status" => "success",
                    "message" => "",
                    "data"=>$data
                ]);
            return $response;

        }catch(\Exception $e){

                return  $response=([
                    "status" => "failure",
                    "message" => "Unable to assign components ",
                    "data" => $e->getmessage(),
                ]);
                return  $response;
        }
        }
    public function deletePaygroupComponents($paygroup_id){

        //Validate
        $validator = Validator::make(
            $data = [
                'paygroup_id' => $paygroup_id,
            ],
            $rules = [
                'paygroup_id' => 'required|numeric',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            $paygroup_components =VmtPaygroup::where('id',$paygroup_id)->first();

            if(!empty($paygroup_components)){
                $emp_paygroup_components =VmtEmpPaygroup::where('paygroup_id',$paygroup_components->id)->get(['id']);
                $paygroup_comps =VmtPaygroupComps::where('paygroup_id',$paygroup_components->id)->get(['id']);
            //delete the assign values
                $delete_assign_emp_comp_data=  VmtEmpPaygroup::destroy($emp_paygroup_components);
                $delete_assign_comp_data=VmtPaygroupComps::destroy($paygroup_comps);
                 $paygroup_components->delete();

                return response()->json([
                    "status" => "success",
                    "message" => "Component deleted successfully",
                ]);

             }//else{

            //     return response()->json([
            //         "status" => "failure",
            //         "message" => "No component is present for given id",
            //     ]);
            // }

        }
        catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to delete component",
                "data" => $e->getmessage(),
            ]);

        }

    }


}
