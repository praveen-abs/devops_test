<?php

namespace App\Services;

use App\Models\User;

use App\Models\VmtInvestmentForm;

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;
use App\Models\VmtInvForm;
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

    public function getInvestmentsFormDetails($form_name)
    {
        //Validate
        $validator = Validator::make(
            $data = [
                'form_name' => $form_name
            ],
            $rules = [
                'form_name' => 'required|exists:vmt_investment_forms,form_name',
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
            $form_id = VmtInvestmentForm::where('form_name',$form_name)->first()->id;

            //Get the query structure
            $inv_form_details_query = $this->getInvestmentsFormDetails_Query();

            $response = $inv_form_details_query
                        ->where('vmt_investment_forms.id', $form_id)
                        ->get([
                            'vmt_investment_sections.section_name as section_name',
                            'vmt_investment_particulars.particular_name as particular_name',
                            'vmt_investment_particulars.references as references',
                            'vmt_investment_particulars.amount_max_limit as amount_max_limit',
                        ]);


            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching investments form data",
                "data" => $e,
            ]);
        }

    }

    /*
        //Get the curren active investment form (i.e: active = 1 in 'vmt_investment_forms' )


    */
    public function getCurrentInvestmentsFormDetails()
    {
        try{
            //get the current active form id
            $form_id = VmtInvestmentForm::where('active','1')->first()->id;

            //Get the query structure
            $inv_form_details_query = $this->getInvestmentsFormDetails_Query();

            $response = $inv_form_details_query
                        ->where('vmt_investment_forms.id', $form_id)
                        ->get([
                            'vmt_investment_sections.section_name as section_name',
                            'vmt_investment_particulars.particular_name as particular_name',
                            'vmt_investment_particulars.references as references',
                            'vmt_investment_particulars.amount_max_limit as amount_max_limit',
                        ]);


            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching investments form data",
                "data" => $e,
            ]);
        }

    }


    /*
        Common query to get the investments details

    */
    public function getInvestmentsFormDetails_Query(){
        $inv_form_details = VmtInvestmentForm::join('vmt_investment_form_secpat', 'vmt_investment_form_secpat.form_id', '=', 'vmt_investment_forms.id')
        ->join('vmt_investment_section_particulars', 'vmt_investment_section_particulars.id', '=', 'vmt_investment_form_secpat.sec_pat_id') //Get sections_particulars id
        ->join('vmt_investment_sections', 'vmt_investment_sections.id', '=', 'vmt_investment_section_particulars.section_id') // Get Sections
        ->join('vmt_investment_particulars', 'vmt_investment_particulars.id', '=', 'vmt_investment_section_particulars.particular_id'); // Get Particular id

        return $inv_form_details;

    }

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
