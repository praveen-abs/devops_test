<?php

namespace App\Services;

use App\Models\User;

use App\Models\VmtInvestmentForm;
use App\Models\VmtInvEmpFormdata;

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;
use App\Models\VmtInvForm;
use App\Models\VmtInvFormSection;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VmtInvSectionImport;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use \Datetime;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class VmtInvestmentsService
{
    const SECTION_TABS = [
            "HRA",
            "Section 80c & 80CCC",
            "Other Exemptions",
            "House Property",
            "House Property_Self Occupied Property",
            "House Property_Let Out Property",
            "House Property_Deemed Let Out Property",

            "Reimbursement",
            "Previous Employer Income",
            "Other Source Of Income"
        ];


    /*
        Get the investments form detail template

    */
    public function getInvestmentsFormDetailsTemplate($form_name)
    {
        //Validate
        $validator = Validator::make(
            $data = [
                'form_name' => $form_name
            ],
            $rules = [
                'form_name' => 'required|exists:vmt_inv_form,form_name',
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
            //get the current active form id
            $query_form_details = VmtInvForm::where('form_name', $form_name)->first();

            $user_id =  User::where('user_code', auth()->user()->user_code)->first()->id;

            //Get the query structure

            $query_inv_form_template  =  VmtInvFormSection::join('vmt_inv_section', 'vmt_inv_section.id','=','vmt_inv_formsection.section_id')
                                        ->join('vmt_inv_section_group','vmt_inv_section_group.id','=','vmt_inv_section.sectiongroup_id')
                                        ->leftjoin('vmt_inv_emp_formdata','vmt_inv_emp_formdata.fs_id','=','vmt_inv_formsection.id')
                                        ->leftjoin('vmt_inv_f_emp_assigned','vmt_inv_f_emp_assigned.id','=','vmt_inv_emp_formdata.f_emp_id')
                                        ->where('vmt_inv_formsection.form_id', $query_form_details->id)
                                    //    ->where('vmt_inv_f_emp_assigned.user_id', $user_id)
                                    //    ->orWherNull('vmt_inv_emp_formdata.id')
                                        ->get(
                                            [
                                                'vmt_inv_formsection.section_id',
                                                'vmt_inv_section.section',
                                                'vmt_inv_section.particular',
                                                'vmt_inv_section.reference',
                                                'vmt_inv_section.max_amount',
                                                'vmt_inv_section_group.section_group',
                                                'vmt_inv_formsection.id as fs_id',
                                                'vmt_inv_formsection.form_id',
                                                'vmt_inv_emp_formdata.dec_amount'

                                            ]
                                        );

                                        $popupjson  = $query_inv_form_template->map(function ($item, $key) {

                                            $inv_details['section'] = $item->section;
                                            $inv_details['particular'] = $item->particular;
                                            $inv_details['reference'] = $item->reference;
                                            $inv_details['max_amount'] = $item->max_amount;
                                            $inv_details['section_group'] = $item->section_group;
                                            $inv_details['fs_id'] = $item->fs_id;
                                            $inv_details['dec_amount'] = $item->dec_amount;
                                            $inv_details['dec_amount'] = $item->dec_amount;
                                            $inv_details['json_popups_value']= (json_decode($item->json_popups_value, true));

                                            return  $inv_details;

                                     });

                                  //  dd($sima->toArray());

                                       $query_inv_form_template = $popupjson->toArray();
                                      //  $query_inv_form_template = $query_inv_form_template->toArray();

                                        // dd($query_inv_form_template[0]);
                                           $count = 0;
                                           foreach($query_inv_form_template as $single_inv_form_template){

                                               if(! array_key_exists($single_inv_form_template["section_group"], $query_inv_form_template))
                                               {
                                                   $query_inv_form_template[$single_inv_form_template["section_group"]] = array();
                                                   array_push($query_inv_form_template[$single_inv_form_template["section_group"]], $single_inv_form_template);
                                               }
                                               else
                                               {
                                                   array_push($query_inv_form_template[$single_inv_form_template["section_group"]], $single_inv_form_template);

                                               }

                                               //remove from outer json
                                               unset($query_inv_form_template[$count]);

                                               $count++;

                                           }


            $response["form_name"] = $query_form_details->form_name;
            $response["form_details"] = $query_inv_form_template;

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching investments form template",
                "data" => $e,
            ]);
        }

    }

    /*
        Get the emp investment form details

    */
    public function getEmployeeInvFormDetails($user_code, $year){

        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'year' => $year,

            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'year' => 'required',
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
            //get the current active form id
            $form_id = VmtInvForm::where('form_name', $form_name)->first()->id;

            //Get the query structure

            $query_inv_form_template  =  VmtInvFormSection::join('vmt_inv_section', 'vmt_inv_section.id','=','vmt_inv_formsection.section_id')
                             ->leftjoin('vmt_inv_emp_formdata','vmt_inv_formsection.id','=','vmt_inv_emp_formdata.fs_id')
                            ->where('vmt_inv_formsection.id', $form_id)
                            ->get(
                        //     [
                        //         'vmt_inv_section.section',
                        //         'vmt_inv_section.particular',
                        //         'vmt_inv_section.reference',
                        //         'vmt_inv_section.max_amount',

                        //  ]
                        );

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $query_inv_form_template,
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching investments form template",
                "data" => $e,
            ]);
        }


    }

    /*
        //Get the curren active investment form (i.e: active = 1 in 'vmt_investment_forms' )


    */
    // public function getCurrentInvestmentsFormDetailsTemplate()
    // {
    //     try{



    //         return response()->json([
    //             "status" => "success",
    //             "message" => "",
    //             "data" =>"",
    //         ]);

    //     }
    //     catch(\Exception $e){
    //         return response()->json([
    //             "status" => "failure",
    //             "message" => "Erro  r while fetching investments form data",
    //             "data" => $e,
    //         ]);
    //     }

    // }


    /*
        This function calls the resp. function
        based on the section name


    */
    public function saveEmpInvSecDetails($user_code, $section_name, $section_data){


        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'section_name' => $section_name,
                'section_data' => $section_data,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "section_name" => "required| Rule::in(VmtInvestmentsService::SECTION_TABS)",
                "section_data" => 'required',
            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if($validator->fails()){
            return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
            ]);
        }




        return response()->json([
            'status' => 'success',
            'message' => $section_name.' data saved successfully',
            'data' => ''
        ]);

    }


    public function fetchEmpRentalDetails($user_code,$fs_id){

        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        $rentalDetails =  VmtInvEmpFormdata::join('vmt_inv_f_emp_assigned','vmt_inv_f_emp_assigned.id','=','vmt_inv_emp_formdata.f_emp_id')
                                             ->where('fs_id',$fs_id)
                                             ->where('vmt_inv_f_emp_assigned.user_id',$user_id)
                                             ->get();

        return $rentalDetails;
    }



    private function saveEmpInvSecDetails_HRA(){

    }

    private function saveEmpInvSecDetails_80c_80ccc(){

    }

    private function saveEmpInvSecDetails_OtherExemptions(){

    }


    /*
        Section name : House Property
        Sub section : Self Occupied Property

    */
    private function saveEmpInvSecDetails_HouseProperty_SelfOccProp(){

    }

        /*
        Section name : House Property
        Sub section : Let Out Property

    */
    private function saveEmpInvSecDetails_HouseProperty_LetoutProp(){

    }


    /*
        Section name : House Property
        Sub section : Deemed Let Out Property

    */
    private function saveEmpInvSecDetails_HouseProperty_DeemedLetOutProps(){

    }

    /*
        Section name : Reimbursements

    */
    private function saveEmpInvSecDetails_Reimbursement(){

    }

    /*
        Section name : Previous Employer Income

    */
    private function saveEmpInvSecDetails_PrevEmployerIncome(){

    }

    /*
        Section name : Other Source of Income

    */
    private function saveEmpInvSecDetails_OtherSrcOfIncome(){

    }

    //Investements excel import

    public function ImportInvestmentForm_Excel($form_name, $excel_file)
    {

        $validator = Validator::make(
            $data = [
                'form_name' => $form_name,
                'excel_file' => $excel_file,
            ],
            $rules = [
                "form_name" => 'required',
                "excel_file" => 'required',
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




        try
        {

            //Create Form name
            $invform = new VmtInvForm;
            $invform->form_name = $form_name;
            $invform->save();

            //Import excel data
            $response = Excel::import(new VmtInvSectionImport($invform->id) , $excel_file);

            return response()->json([
                'status' => 'success',
                'message' => 'Investment Form uploaded successfully',
                'data' => $response
            ]);

        }
        catch(\Exception $e){

            return response()->json([
                'status' => 'failure',
                'message' => 'Investment Form upload failed',
                'data' => $e
            ]);
        }

    }
}
