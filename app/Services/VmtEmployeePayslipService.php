<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use PDF;
use Carbon\Carbon;


use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeeFamilyDetails;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use App\Models\VmtEmployeePaySlip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use App\Imports\VmtPaySlip;
use App\Models\Bank;

class VmtEmployeePayslipService {

    /*
        NOTE:
        1. For checking wthr user exists, use VmtEmployeeService::isUserExist()
    */

    public function importBulkEmployeesPayslipExcelData($data)
    {

        $validator =   \Validator::make(
            $data,
            ['file' => 'required|file|mimes:xls,xlsx'],
            ['required' => 'The :attribute is required.']
        );

        if ($validator->passes()) {
            $importDataArry = \Excel::toArray(new VmtPaySlip, request()->file('file'));
            return $this->storeBulkEmployeesPayslips($importDataArry);
        } else {
            $data['failed'] = $validator->errors()->all();
            $responseJSON['status'] = 'failure';
            $responseJSON['message'] = $data['failed'][0];//"Please fix the below excelsheet data";
            //$responseJSON['data'] = $validator->errors()->all();
            return response()->json($responseJSON);
        }
        // linking Manager To the employees;
        // $linkToManager  = \Excel::import(new VmtEmployeeManagerImport, request()->file('file'));
    }


    private function storeBulkEmployeesPayslips($data)
    {
        ini_set('max_execution_time', 300);
        //For output jsonresponse
        //dd($data);
        $data_array = [];
        //For validation
        $isAllRecordsValid = true;

        $rules = [];
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

        $rules = [
            'emp_no' => 'required|exists:users,user_code',
            //'gender' => 'required',
            //'doj' => 'required',
            //'location' => 'required',
            //'dob' => 'required',
            //'father_name' => 'required',
            //'pan_number' => 'required',
            //'aadhar_number' => 'required',
            //'uan' => 'required',
            //'epf_number' => 'required',
            //'esic_number' => 'required',
            //'bank_name' => 'required',
            //'account_number' => 'required',
            //'bank_ifsc_code' => 'required',
            'payroll_month' => 'required|date',
            'basic' => 'required',
            'hra' => 'required',
            'stats_bonus'=> 'required',
            'child_edu_allowance' => 'required',
            'spl_alw' => 'required',
            'total_fixed_gross' => 'required',
            'month_days' => 'required',
            'worked_days' => 'required',
            'arrears_days' => 'required',
            'lop' => 'required',
            'earned_basic' => 'required',
            'basic_arrear' => 'required',
            'earned_hra' => 'required',
            'hra_arrear' => 'required',
            'earned_stats_bonus' => 'required',
            'earned_stats_arrear' => 'required',
            'earned_child_edu_allowance' => 'required',
            'child_edu_allowance_arrear' => 'required',
            'earned_spl_alw' => 'required',
            'spl_alw_arrear' => 'required',
            'overtime' => 'required',
            'total_earned_gross' => 'required',
            'pf_wages' => 'required',
            'pf_wages_arrear' => 'required',
            'epfr' => 'required',
            'epfr_arrear' => 'required',
            'edli_charges' => 'required',
            'edli_charges_arrears' => 'required',
            'pf_admin_charges' => 'required',
            'pf_admin_charges_arrears' => 'required',
            'employer_esi' => 'required',
            'employer_lwf' => 'required',
            'ctc' => 'required',
            'epf_ee' => 'required',
            'epf_ee_arrear' => 'required',
            'employee_esic' => 'required',
            'prof_tax' => 'required',
            'income_tax' => 'required',
            'sal_adv' => 'required',
            'canteen_dedn' => 'required',
            'other_deduc' => 'required',
            'lwf' => 'required',
            'total_deductions' => 'required',
            'net_take_home' => 'required',
            'rupees' => 'required',
            'el_opn_bal' => 'required',
            'availed_el' => 'required',
            'balance_el' => 'required',
            'sl_opn_bal' => 'required',
            'availed_sl' => 'required',
            'balance_sl' => 'required',
            'rename' => 'required',
            //'email' => 'required',
            'greetings' => 'required',
            'travel_conveyance' => 'required',
            'other_earnings' => 'required'
        ];


        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $data;
        $currentRowInExcel = 0;
        foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
            // dd($excelRowdata);
            $currentRowInExcel++;
            //Validation



            // $rules = [
            //     'employee_code' => 'nullable|unique:users,user_code',
            //     'employee_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'email' => 'required|email:strict|unique:users,email',
            //     'gender' => 'required|in:male,female,other',
            //     'doj' => 'required|date',
            //     'work_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'dob' => 'required|date|before:-18 years',
            //     'father_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'father_gender' => 'required|in:male,female,other',
            //     'father_dob' => 'required|date',

            //     'pan_no' => 'nullable|required_if:pan_ack,null|regex:/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u',
            //     'pan_ack' => 'required_if:pan_no,null',
            //     'aadhar' => 'required|regex:/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u',
            //     'marital_status' => 'required|in:unmarried,married,widowed,separated,divorced',
            //     'mobile_no' => 'required|regex:/^([0-9]{10})?$/u|numeric',
            //     'bank_name' => 'required',
            //     'bank_ifsc' => 'required|regex:/(^([A-Z]){4}0([A-Z0-9]){6}?$)/u',
            //     'account_no' => 'required',
            //     'current_address' => 'required',
            //     'permanent_address' => 'required',
            //     'mother_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'mother_gender' => 'required|in:male,female,other',
            //     'mother_dob' => 'required|date',
            //     'spouse_name' => 'nullable|required_unless:marital_status,unmarried|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'spouse_dob' => 'nullable|required_unless:marital_status,unmarried|date',
            //      'child_name' => 'nullable|required_unless:no_of_child,null,0|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'child_dob' => 'nullable||required_unless:no_of_child,null,0|date',
            //     'department' => 'required',
            //     'process' => 'required',
            //     'designation' => 'required',
            //     'cost_center' => 'required',
            //     'confirmation_period' => 'required',
            //     'holiday_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'l1_manager_code' => 'nullable|regex:/(^([a-zA-z0-9.]+)(\d+)?$)/u',
            //     'l1_manager_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'work_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            //     'official_mail' => 'required|email',
            //     'official_mobile' => 'nullable|regex:/^([0-9]{10})?$/u|numeric',
            //     'emp_notice' => 'required|numeric',
            //     'basic' => 'required|numeric',
            //     'hra' => 'required|numeric',
            //     'statutory_bonus' => 'required|numeric',
            //     'child_education_allowance' => 'required|numeric',
            //     'food_coupon' => 'required|numeric',
            //     'lta' => 'required|numeric',
            //     'special_allowance' => 'required|numeric',
            //     'other_allowance' => 'required|numeric',
            //     'epf_employer_contribution' => 'required|numeric',
            //     'insurance' => 'required|numeric',
            //     'graduity' => 'required|numeric',
            //     'epf_employee' => 'required|numeric',
            //     'esic_employee' => 'required|numeric',
            //     'professional_tax' => 'required|numeric',
            //     'labour_welfare_fund' => 'required|numeric',
            //     'uan_number' => 'required|numeric',
            //     'pf_applicable' => 'required|in:yes,Yes,no,No',
            //     'esic_applicable' => 'required|in:yes,Yes,no,No',
            //     'ptax_location' => 'required',
            //     'tax_regime' => 'required',
            //     'lwf_location' => 'required',
            //     'esic_employer_contribution' => 'required|numeric',

            // ];

            $messages = [
                'date' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
                // 'in' => 'Field <b>:attribute</b> should have the following values : :values .',
                // 'required' => 'Field <b>:attribute</b> is required',
                // 'regex' => 'Field <b>:attribute</b> is invalid',
                // 'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                // 'unique' => 'Field <b>:attribute</b> should be unique',
                // 'dob.before' => 'Field <b>:attribute</b> should be above 18 years',
                // 'email' => 'Field <b>:attribute</b> is invalid',
                // 'pan_no.required_if' =>'Field <b>:attribute</b> is required if <b>pan ack</b> not provided ',
                // 'pan_ack.required_if' =>'Field <b>:attribute</b> is required if <b>pan no</b> not provided ',
                // 'required_unless' => 'Field <b>:attribute</b> is invalid',
                'required' => 'Field <b>:attribute</b> is required',
                'exists' => 'Column <b>:attribute</b> with value <b>:input</b> doesnt not exist',

            ];

            $validator = \Validator::make($excelRowdata, $rules, $messages);

            if (!$validator->passes()) {

                $rowDataValidationResult = [
                    'row_number' => $currentRowInExcel,
                    'status' => 'failure',
                    'message' => 'In Excel Row : ' . $currentRowInExcel . ' has following error(s)',
                    'error_fields' => json_encode($validator->errors())
                ];

                array_push($data_array, $rowDataValidationResult);

                $isAllRecordsValid = false;
            }
        } //for loop

        //Runs only if all excel records are valid
        if ($isAllRecordsValid) {
            foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                $rowdata_response = $this->storeSingleRecord_EmployeePayslip($excelRowdata);

                array_push($data_array, $rowdata_response);
            }

            $responseJSON['status'] = 'success';
            $responseJSON['message'] = "Excelsheet data import success";
            $responseJSON['data'] = $data_array;
        } else {
            $responseJSON['status'] = 'failure';
            $responseJSON['message'] = "Please fix the below excelsheet data";
            $responseJSON['data'] = $data_array;
        }

        //dd($responseJSON);

        //$data = ['success'=> $returnsuccessMsg, 'failed'=> $returnfailedMsg, 'failure_json' => $failureJSON, 'success_count'=> $addedCount, 'failed_count'=> $failedCount];
        return response()->json($responseJSON);

    }

    private function storeSingleRecord_EmployeePayslip($row)
    {
        $empNo = $row['emp_no'];
        try {

            $user_id = User::where('user_code',$row['emp_no'])->value('id');

            //update employee's details 'vmt_employee_details'
            $emp_details = VmtEmployee::where('userid', $user_id);

            if($emp_details->exists()){
                $emp_details = $emp_details->first();

                if(!empty($row['bank_name']) && Bank::where('bank_name',$row['bank_name'])->exists())
                     $emp_details->bank_id =  Bank::where('bank_name',$row['bank_name'])->first()->id;

                $emp_details->bank_account_number =  $row['account_number'] ?? '---';
                $emp_details->bank_ifsc_code = $row['bank_ifsc_code'] ?? '---';

                $emp_details->save();

            }

            //update employee's 'vmt_employee_statutory_details'
            $emp_statutory_details = VmtEmployeeStatutoryDetails::where('user_id', $user_id);

            if($emp_statutory_details->exists()){
                $emp_statutory_details = $emp_statutory_details->first();

                $emp_statutory_details->uan_number = $row["uan"];
                $emp_statutory_details->epf_number = $row["epf_number"];
                $emp_statutory_details->esic_number = $row["esic_number"];

                $emp_statutory_details->save();
            }

            //update employee's ' vmt_employee_details'
                //BANK NAME
                //ACCOUNT NUMBER
                //IFSC CODE

            //Store the data into vmt_employee_payslip table

            $empPaySlip = new VmtEmployeePaySlip;

            $empPaySlip->EMP_NO = $row['emp_no'];
            $empPaySlip->user_id = $user_id;
            // $empPaySlip->Gender = $row['gender'];
            // $empPaySlip->DESIGNATION = $row['designation'];
            // $empPaySlip->DEPARTMENT = $row['department'];
            // $empPaySlip->DOJ =  \DateTime::createFromFormat('d-m-Y', $row['doj'])->format('Y-m-d');

            // $empPaySlip->LOCATION = $row['location'];

            // $empPaySlip->DOB =\DateTime::createFromFormat('d-m-Y', $row['dob'])->format('Y-m-d');
            // $empPaySlip->Father_Name = $row['father_name'];
            // $empPaySlip->PAN_Number = $row['pan_number'];
            // $empPaySlip->Aadhar_Number = $row['aadhar_number'];
            // $empPaySlip->UAN = $row['uan'];
            // $empPaySlip->EPF_Number = $row["epf_number"]; // => "EPF123"
            // $empPaySlip->ESIC_Number = $row["esic_number"]; // => "Not Applicable",
            // $empPaySlip->Bank_Name = $row["bank_name"];
            // $empPaySlip->Account_Number = $row["account_number"];
            // $empPaySlip->Bank_IFSC_Code = $row["bank_ifsc_code"];
            $empPaySlip->PAYROLL_MONTH = \DateTime::createFromFormat('d-m-Y', $row["payroll_month"])->format('Y-m-d');
            $empPaySlip->BASIC = $row["basic"];
            $empPaySlip->HRA = $row["hra"];
            $empPaySlip->CHILD_EDU_ALLOWANCE = $row["child_edu_allowance"];
            $empPaySlip->SPL_ALW = $row["spl_alw"];
            $empPaySlip->TOTAL_FIXED_GROSS = $row["total_fixed_gross"];
            $empPaySlip->MONTH_DAYS = $row["month_days"];
            $empPaySlip->Worked_Days = $row["worked_days"];
            $empPaySlip->Arrears_Days = $row["arrears_days"];
            $empPaySlip->LOP = $row["lop"];
            $empPaySlip->Earned_BASIC = $row["earned_basic"];
            $empPaySlip->BASIC_ARREAR = $row["basic_arrear"];
            $empPaySlip->Earned_HRA = $row["earned_hra"];
            $empPaySlip->HRA_ARREAR = $row["hra_arrear"];
            $empPaySlip->Earned_CHILD_EDU_ALLOWANCE = $row["earned_child_edu_allowance"];
            $empPaySlip->CHILD_EDU_ALLOWANCE_ARREAR = $row["child_edu_allowance_arrear"];
            $empPaySlip->Earned_SPL_ALW = $row["earned_spl_alw"];
            $empPaySlip->SPL_ALW_ARREAR = $row["spl_alw_arrear"];
            $empPaySlip->Overtime = $row["overtime"];
            $empPaySlip->TOTAL_EARNED_GROSS = $row["total_earned_gross"];
            $empPaySlip->PF_WAGES = $row["pf_wages"];
            $empPaySlip->PF_WAGES_ARREAR_EPFR = $row["pf_wages_arrear"];
            $empPaySlip->EPFR = $row["epfr"];
            $empPaySlip->EPFR_ARREAR  = $row["epfr_arrear"];
            $empPaySlip->EDLI_CHARGES = $row["edli_charges"];
            $empPaySlip->EDLI_CHARGES_ARREARS = $row["edli_charges_arrears"];
            $empPaySlip->PF_ADMIN_CHARGES = $row["pf_admin_charges"];
            $empPaySlip->PF_ADMIN_CHARGES_ARREARS = $row["pf_admin_charges_arrears"];
            $empPaySlip->EMPLOYER_ESI = $row["employer_esi"];
            $empPaySlip->Employer_LWF = $row["employer_lwf"];
            $empPaySlip->CTC = $row["ctc"];
            $empPaySlip->EPF_EE = $row["epf_ee"];
            $empPaySlip->EPF_EE_ARREAR = $row['epf_ee_arrear'];
            $empPaySlip->EMPLOYEE_ESIC = $row['employee_esic'];
            $empPaySlip->PROF_TAX = $row['prof_tax'];
            $empPaySlip->income_tax = $row["income_tax"];
            $empPaySlip->stats_bonus = $row["stats_bonus"];
            $empPaySlip->earned_stats_bonus = $row["earned_stats_bonus"];
            $empPaySlip->earned_stats_arrear = $row["earned_stats_arrear"];
            $empPaySlip->SAL_ADV = $row['sal_adv'];
            $empPaySlip->CANTEEN_DEDN = $row['canteen_dedn'];
            $empPaySlip->OTHER_DEDUC = $row["other_deduc"];
            $empPaySlip->LWF = $row["lwf"];
            $empPaySlip->TOTAL_DEDUCTIONS = $row["total_deductions"];
            $empPaySlip->NET_TAKE_HOME = $row["net_take_home"];
            $empPaySlip->Rupees = $row["rupees"];
            $empPaySlip->EL_Opn_Bal = $row["el_opn_bal"];
            $empPaySlip->Availed_EL = $row["availed_el"];
            $empPaySlip->Balance_EL = $row["balance_el"];
            $empPaySlip->SL_Opn_Bal = $row["sl_opn_bal"];
            $empPaySlip->Availed_SL = $row["availed_sl"];
            $empPaySlip->Balance_SL = $row["balance_sl"];
            $empPaySlip->Rename = $row['rename'];
            //$empPaySlip->Email = $row['email'];
            $empPaySlip->Greetings = $row['greetings'];
            $empPaySlip->travel_conveyance = $row['travel_conveyance'];
            $empPaySlip->other_earnings = $row['other_earnings'];

            $empPaySlip->save();
            //]);

            //dd($empPaySlip );
            //SAVE THE TABLE



            // if (fetchMasterConfigValue("can_send_appointmentmail_after_onboarding") == "true") {
            //     $isEmailSent  = $this->attachApoinmentPdf($row);
            // }

            return $rowdata_response = [
                'row_number' => '',
                'status' => 'success',
                'message' => 'Payslip for '.$empNo . ' added successfully<br/>',
                'error_fields' => [],
            ];
        } catch (\Exception $e) {
            //$this->deleteUser($user->id);

            //dd("For Usercode : ".$row['emp_no']."  -----  ".$e);
            return $rowdata_response = [
                'row_number' => '',
                'status' => 'failure',
                'message' => 'Payslip for '. $empNo . ' not added',
                'error_fields' => json_encode(['error' =>$e->getMessage()]),
                'stack_trace' => $e->getTraceAsString()
            ];
        }
    }


    /*
        Show Employee payslip as HTML
    */
    public function showPaySlip_HTMLView($user_id, $selectedPaySlipMonth){
        //dd($request->all());
        $user = null;

        //If empty, then show current user profile page
        if(empty($user_id))
        {
            $user = auth()->user();
        }
        else
        {
            $user = User::find($user_id);
        }

        $data['employee_payslip'] = VmtEmployeePaySlip::where([
                         ['user_id','=', $user_id],
                         ['PAYROLL_MONTH','=', $selectedPaySlipMonth],
                         ])->first();

         $data['employee_name'] = $user->name;
         $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',$user->id)->first();
         $data['employee_details'] = VmtEmployee::where('userid',$user->id)->first();
         $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',$user->id)->first();

         $query_client = VmtClientMaster::find($user->client_id);

         $data['client_logo'] = $query_client->client_logo;
         $client_name = $query_client->client_name;

         $processed_clientName = strtolower(str_replace(' ', '', $client_name));

         //dd($client_name);
         //$html =  view('vmt_payslipTemplate', $data);
         //dd($data['employee_statutory_details']->uan_number);
         $html =  view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);

         return $html;
    }

    public function showPaySlip_PDFView($user_id, $selectedPaySlipMonth)
    {
        //dd($request->all());
        $user = null;

        //If empty, then show current user profile page
        if(empty($user_id))
        {
            $user = auth()->user();
        }
        else
        {
            $user = User::find($user_id);
        }

        $data['employee_payslip'] = VmtEmployeePaySlip::where([
                                        ['user_id','=', $user_id],
                                        ['PAYROLL_MONTH','=', $selectedPaySlipMonth],
                                        ])->first();

        $data['employee_name'] = $user->name;
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',$user->id)->first();
        $data['employee_details'] = VmtEmployee::where('userid',$user->id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',$user->id)->first();

        $query_client = VmtClientMaster::find($user->client_id);

        $data['client_logo'] = request()->getSchemeAndHttpHost().$query_client->client_logo;
        $client_name = $query_client->client_name;

        $processed_clientName = strtolower(str_replace(' ', '', $client_name));

        $view = view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);


        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'portrait')->setWarnings(false);

        //dd( request()->getSchemeAndHttpHost().$data['client_logo']);
        return $pdf->download($user->id."_".$selectedPaySlipMonth."_Payslip.pdf");
        //   return  PDF::loadView('vmt_payslipTemplate', $data)->download($month.'Payslip.pdf');

    }


    public function getEmployeePayslipDetails($user_code, $year, $month){


        //Validate
        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "year" => $year,
                "month" => $month,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "year" => 'required',
                "month" => 'required',
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

            //Check whether the payslip data exists or not
            $query_payslip = VmtEmployeePaySlip::where('user_id',$user_id)
                            ->whereYear('PAYROLL_MONTH', $year)
                            ->whereMonth('PAYROLL_MONTH', $month);

            if(!$query_payslip->exists())
            {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Payslip not found for the given MONTH and YEAR'
                ]);

            }

            // Normal JOINS style : JSON structure is not coming properly. Keeping here for reference only
            //
            // $response['payslip_data'] = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
            //                             ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
            //                             ->join('vmt_employee_statutory_details','vmt_employee_statutory_details.user_id','=','users.id')
            //                             ->join('vmt_employee_payslip','vmt_employee_payslip.user_id','=','users.id')
            //                             ->whereMonth('vmt_employee_payslip.PAYROLL_MONTH','=',$month)
            //                             ->whereYear('vmt_employee_payslip.PAYROLL_MONTH','=',$year)
            //                             ->where('users.id','=',$user_id)
            //                             ->get([
            //                                 'vmt_employee_statutory_details.*',
            //                                 'vmt_employee_payslip.*'
            //                             ]);

            /*
                    ::with() works only if you specify the foreign key . Else it will return empty

            */

            $response['payslip_data'] = User::with([
                                            'getEmployeeDetails',
                                            'getEmployeeOfficeDetails',
                                            'getStatutoryDetails',
                                            'single_payslip_detail' => function($query) use ($year, $month) {
                                                    $query->whereYear('PAYROLL_MONTH', $year)
                                                    ->whereMonth('PAYROLL_MONTH', $month)
                                                    ->select(['id','user_id', 'PAYROLL_MONTH']);
                                                }
                                            ])
                                            ->where('users.id',$user_id)
                                            ->get(['users.id','users.name','users.user_code']);

            $response['client_logo'] = '';

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" =>$response
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip data",
                "data" =>$e
            ]);
        }
    }

}
