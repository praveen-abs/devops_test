<?php

namespace App\Http\Controllers\Investments;

use App\Http\Controllers\Controller;
use App\Models\VmtInvEmpFormdata;
use App\Models\VmtInvFEmpAssigned;
use App\Services\VmtInvestmentsService;
use Illuminate\Http\Request;
use App\Models\User;




class VmtInvestmentsController extends Controller
{
    public function getInvestmentsFormDetailsTemplate(Request $request, VmtInvestmentsService $serviceVmtInvestmentsService){
      //  dd($request->all());

        return $serviceVmtInvestmentsService->getInvestmentsFormDetailsTemplate($request->form_name);
    }

    public function saveEmpInvSecDetails(Request $request,VmtInvestmentsService $serviceVmtInvestmentsService){
        //dd($request->all());

        return $serviceVmtInvestmentsService->saveEmpInvSecDetails($request->user_code, $request->section_name, $request->section_data);
    }

    public function ImportInvestmentForm_Excel(Request $request,VmtInvestmentsService $serviceVmtInvestmentsService){
       // dd($request->all());

        return $serviceVmtInvestmentsService->ImportInvestmentForm_Excel($request->form_name , $request->excel_file);
    }

    public function SaveInvDetails(Request $request){
       //  dd($request->formDataSource);

           $form_id = $request->form_id;
           $form_data = $request->formDataSource;

           for($i=0;$i<count($request->formDataSource);$i++)
             {

                $fs_id = $form_data[$i]['fs_id'];
                $dec_amt = $form_data[$i]['declaration_amount'];
         $user_id = User::where('user_code',$request->user_code)->first()->id;



      // dd($form_id);
      $query_assign = VmtInvFEmpAssigned::where('user_id',$user_id );
       // dd($user_id);

            if($query_assign->exists()){
                    $query_assign = $query_assign->first();
            }
            else{

             $emp_assign_form = new VmtInvFEmpAssigned;
             $emp_assign_form->user_id = $user_id;
             $emp_assign_form->form_id = $form_id;
             $emp_assign_form->save();

              $query_assign = $emp_assign_form;

            }

            // $emp_assign_form = new VmtInvFEmpAssigned;
            // $emp_assign_form->user_id = $user_id;
            // $emp_assign_form->form_id = $form_id;
            // $emp_assign_form->save();

            //insert form data


            $emp_formdata = new VmtInvEmpFormdata;
            $emp_formdata->f_emp_id = $query_assign->id;
            $emp_formdata->fs_id = $fs_id ;
            $emp_formdata->dec_amount = $dec_amt ;
            $emp_formdata->save();

            return "saved";

            }
    }


    public function showInvestmentsFormMgmtPage(Request $request){
        //dd($request->all());

        return view('investments_forms_mgmt');

    }

}
