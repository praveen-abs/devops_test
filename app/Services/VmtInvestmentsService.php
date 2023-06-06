<?php

namespace App\Services;

use App\Models\User;

use App\Models\VmtEmployee;
use App\Models\VmtInvestmentForm;
use App\Models\VmtInvEmpFormdata;
use App\Models\VmtInvFEmpAssigned;


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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {
            //get the current active form id
            $query_form_details = VmtInvForm::where('form_name', $form_name)->first();

            $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

            $query_is_sumbitted = VmtInvFEmpAssigned::where('user_id' , $user_id)->first();

            $query_doj = VmtEmployee::where('userid', $user_id)->first();


            // $query_fempAssigned_table = VmtInvFEmpAssigned::where('user_id', $user_id)
            // ->where('year', $year)
            //  ->first();

            //  $assigned_form_id = $query_fempAssigned_table->form_id;
            //  $f_emp_id = $query_fempAssigned_table->id;

            //Get the form template
            $query_inv_form_template = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
                ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
                // ->where('vmt_inv_formsection.form_id', $assigned_form_id)

                ->get(
                    [
                        'vmt_inv_formsection.section_id',
                        'vmt_inv_section.section',
                        'vmt_inv_section.particular',
                        'vmt_inv_section.reference',
                        'vmt_inv_section.max_amount',
                        'vmt_inv_section_group.section_group',
                        'vmt_inv_formsection.id as fs_id',
                        'vmt_inv_section.section_option_1',
                        'vmt_inv_section.section_option_2',
                        'vmt_inv_formsection.form_id',

                    ]
                )->toArray();

             // dd($query_inv_form_template);

            // employee declaration amount
            $inv_emp_value = VmtInvFEmpAssigned::leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.f_emp_id', '=', 'vmt_inv_f_emp_assigned.id')
                ->where('vmt_inv_f_emp_assigned.user_id', $user_id)->get()->toArray();

            // dd($inv_emp_value);
            // json decode popup value;
            $popdecode = array();
            foreach ($inv_emp_value as $details_tem) {

                $rentalDetail['id'] = $details_tem["id"];
                $rentalDetail['user_id'] = $details_tem["user_id"];
                $rentalDetail['form_id'] = $details_tem["form_id"];
                $rentalDetail['f_emp_id'] = $details_tem["f_emp_id"];
                $rentalDetail['year'] = $details_tem["year"];
                $rentalDetail['fs_id'] = $details_tem["fs_id"];
                $rentalDetail['dec_amount'] = $details_tem["dec_amount"];
                $rentalDetail['is_sumbit'] = $details_tem["is_sumbit"];
                $rentalDetail['selected_section_options'] = $details_tem["selected_section_options"];
                $rentalDetail['json_popups_value'] = (json_decode($details_tem["json_popups_value"], true));
                array_push($popdecode, $rentalDetail);

            }
            ;



            $arr = array();
            foreach ($query_inv_form_template as $single_template) {
                foreach ($popdecode as $single_emp_env_value) {
                    if ($single_template['fs_id'] == $single_emp_env_value['fs_id']) {
                        $single_template['id'] = $single_emp_env_value['id'];
                        $single_template['user_id'] = $single_emp_env_value['user_id'];
                        $single_template['form_id'] = $single_emp_env_value['form_id'];
                        $single_template['year'] = $single_emp_env_value['year'];
                        $single_template['f_emp_id'] = $single_emp_env_value['f_emp_id'];
                        $single_template['dec_amount'] = $single_emp_env_value['dec_amount'];
                        $single_template['json_popups_value'] = $single_emp_env_value['json_popups_value'];
                        $single_template['is_sumbit'] = $single_emp_env_value['is_sumbit'];
                        $single_template['selected_section_options'] = $single_emp_env_value['selected_section_options'];
                    }
                }
                array_push($arr, $single_template);
            }
            //dd($arr);

            $query_inv_form_template = $arr;


            $count = 0;
            foreach ($query_inv_form_template as $single_inv_form_template) {

                if (!array_key_exists($single_inv_form_template["section_group"], $query_inv_form_template)) {
                    $query_inv_form_template[$single_inv_form_template["section_group"]] = array();
                    array_push($query_inv_form_template[$single_inv_form_template["section_group"]], $single_inv_form_template);
                } else {
                    array_push($query_inv_form_template[$single_inv_form_template["section_group"]], $single_inv_form_template);

                }

                //remove from outer json
                unset($query_inv_form_template[$count]);

                $count++;

            }
            //  dd($query_inv_form_template);


            $response["form_name"] = $query_form_details->form_name;
            $response["is_submitted"] = $query_is_sumbitted->is_sumbit ?? 0;
            $response["doj"] = $query_doj->doj;
            // $response["regime"] = $query_doj->regime;
            // $response["last_updated"] = $query_doj->updated_at;

            $response["form_details"] = $query_inv_form_template;

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response,
            ]);

        } catch (\Exception $e) {
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
    public function getEmployeeInvFormDetails($user_code, $year)
    {

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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {
            //get the current active form id
            $form_id = VmtInvForm::where('form_name', $form_name)->first()->id;

            //Get the query structure

            $query_inv_form_template = VmtInvFormSection::join('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
                ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_formsection.id', '=', 'vmt_inv_emp_formdata.fs_id')
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

        } catch (\Exception $e) {
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
    public function saveEmpInvSecDetails($user_code, $section_name, $section_data)
    {


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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }




        return response()->json([
            'status' => 'success',
            'message' => $section_name . ' data saved successfully',
            'data' => ''
        ]);

    }


    public function fetchEmpRentalDetails($user_code, $fs_id)
    {

        $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        $form_assignrd_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

        $rentalDetails = VmtInvEmpFormdata::all()
            ->where('fs_id', $fs_id)
            ->where('f_emp_id', $form_assignrd_id);

        $sumOfHra = 0;    
        $res = array();

        // foreach($rentalDetails as $item){    
        //     $hraDecAmt = (json_decode($item["json_popups_value"], true)); 
        //     $sumOfHra += $hraDecAmt['total_rent_paid'];
        //     $rentalDetail['id'] = $item->id;
        //      $rentalDetail['f_emp_id'] = $item->f_emp_id;
        //      $rentalDetail['fs_id'] = $item->fs_id;
        //      $rentalDetail['dec_amount'] = $item->dec_amount;
        //      $rentalDetail['json_popups_value'] = (json_decode($item->json_popups_value, true));

        //      array_push(
        //         $res,$sumOfHra,$rentalDetail);

        // }

        $popupjson = $rentalDetails->map(function ($item, $key) {
            $rentalDetail['id'] = $item->id;
            $rentalDetail['f_emp_id'] = $item->f_emp_id;
            $rentalDetail['fs_id'] = $item->fs_id;
            $rentalDetail['dec_amount'] = $item->dec_amount;
            $rentalDetail['json_popups_value'] = (json_decode($item->json_popups_value, true));


            return $rentalDetail;
        });

        return $popupjson;

    }

    public function fetchHousePropertyDetails($user_code, $fs_id)
    {

        $user_id = User::where('user_code', $user_code)->first()->id;

        $form_assigned_id = VmtInvFEmpAssigned::where('user_id', $user_id)->first()->id;

        $res = array();
        foreach ($fs_id as $single_fs_id) {
            $query_rentalDetails = VmtInvEmpFormdata::where('fs_id', $single_fs_id)->where('f_emp_id', $form_assigned_id);

            if ($query_rentalDetails->exists()) {
                $rentalDetails = $query_rentalDetails->first();
                $rentalDetail['id'] = $rentalDetails->id;
                $rentalDetail['f_emp_id'] = $rentalDetails->f_emp_id;
                $rentalDetail['fs_id'] = $rentalDetails->fs_id;
                $rentalDetail['dec_amount'] = $rentalDetails->dec_amount;
                $rentalDetail['json_popups_value'] = (json_decode($rentalDetails->json_popups_value, true));
                array_push($res, $rentalDetail);
            }

        }


        return $res;

    }

    public function deleteEmpRentalDetails($currentTableId)
    {
        try {
            $rentalDetails = VmtInvEmpFormdata::where('id', $currentTableId)->delete();

            $response = [
                'status' => 'success',
                'message' => "Rental details deleted successfully"
            ];

        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while Deleting Rental Information ',
                'error_message' => $e->getMessage()
            ];
        }

        return response()->json($response);

    }
    public function deleteHouseProperty($currentTableId)
    {
        try {
            $houseProperty = VmtInvEmpFormdata::where('id', $currentTableId)->delete();

            $response = [
                'status' => 'success',
                'message' => "Rental details deleted successfully"
            ];

        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while Deleting Rental Information ',
                'error_message' => $e->getMessage()
            ];
        }

        return response()->json($response);

    }


    private function saveEmpInvSecDetails_HRA()
    {

    }

    private function saveEmpInvSecDetails_80c_80ccc()
    {

    }

    private function saveEmpInvSecDetails_OtherExemptions()
    {

    }


    /*
        Section name : House Property
        Sub section : Self Occupied Property

    */
    private function saveEmpInvSecDetails_HouseProperty_SelfOccProp()
    {

    }

    /*
    Section name : House Property
    Sub section : Let Out Property

*/
    private function saveEmpInvSecDetails_HouseProperty_LetoutProp()
    {

    }


    /*
        Section name : House Property
        Sub section : Deemed Let Out Property

    */
    private function saveEmpInvSecDetails_HouseProperty_DeemedLetOutProps()
    {

    }

    /*
        Section name : Reimbursements

    */
    private function saveEmpInvSecDetails_Reimbursement()
    {

    }

    /*
        Section name : Previous Employer Income

    */
    private function saveEmpInvSecDetails_PrevEmployerIncome()
    {

    }

    /*
        Section name : Other Source of Income

    */
    private function saveEmpInvSecDetails_OtherSrcOfIncome()
    {

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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }




        try {

            //Create Form name
            $invform = new VmtInvForm;
            $invform->form_name = $form_name;
            $invform->save();

            //Import excel data
            $response = Excel::import(new VmtInvSectionImport($invform->id), $excel_file);

            return response()->json([
                'status' => 'success',
                'message' => 'Investment Form uploaded successfully',
                'data' => $response
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'failure',
                'message' => 'Investment Form upload failed',
                'data' => $e
            ]);
        }

    }
}
