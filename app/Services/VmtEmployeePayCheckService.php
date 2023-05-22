<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use Carbon\Carbon;


use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeePayslipV2;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtEmployeePayslipStatus;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtPayroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use App\Imports\VmtPaySlip;
use App\Models\Bank;
use App\Models\VmtGeneralInfo;
use Mail;
use App\Mail\PayslipMail;

class VmtEmployeePayCheckService {

    /*
        NOTE:
        1. For checking wthr user exists, use VmtEmployeeService::isUserExist()
    */

    // public function importBulkEmployeesPayslipExcelData($data)
    // {

    //     $validator =   \Validator::make(
    //         $data,
    //         ['file' => 'required|file|mimes:xls,xlsx'],
    //         ['required' => 'The :attribute is required.']
    //     );

    //     if ($validator->passes()) {
    //         $importDataArry = \Excel::toArray(new VmtPaySlip, request()->file('file'));
    //         return $this->storeBulkEmployeesPayslips($importDataArry);
    //     } else {
    //         $data['failed'] = $validator->errors()->all();
    //         $responseJSON['status'] = 'failure';
    //         $responseJSON['message'] = $data['failed'][0];//"Please fix the below excelsheet data";
    //         //$responseJSON['data'] = $validator->errors()->all();
    //         return response()->json($responseJSON);
    //     }
    //     // linking Manager To the employees;
    //     // $linkToManager  = \Excel::import(new VmtEmployeeManagerImport, request()->file('file'));
    // }


    public function storeBulkEmployeesPayslips($data)
    {

        ini_set('max_execution_time', 300);
        //For output jsonresponse
        $data_array = [];
        //For validation
        $isAllRecordsValid = true;

        $rules = [];
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $data;

        $currentRowInExcel = 0;


        foreach ($excelRowdata_row[0] as $key => $excelRowdata) {

            $currentRowInExcel++;

            //Validation
            $rules = [
                            'emp_no' => 'required|exists:users,user_code',
                            'emp_name' => 'required',
                            'gender' => 'required',
                            'designation' => 'required',
                            'department' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                            'doj' => 'required',
                            'location' => 'required',
                            'dob' => 'required',
                            'father_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                            'pan_number' => 'required',
                            'aadhar_number' => 'required',
                            'uan' => 'required',
                            'epf_number' => 'required',
                            'esic_number' => 'required',
                            'bank_name' => 'required',
                            'account_number' => 'required',
                            'bank_ifsc_code' => 'required',
                            'payroll_month' => 'required|date',
                            'basic' => 'required',
                            'hra' => 'required',
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
                            'stats_bonus' => 'required',
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
                            'email' => 'required',
                            'greetings' => 'required',
                            'travel_conveyance' => 'required',
                            'other_earnings' => 'required'
            ];

            $messages = [
                            'required' => 'Field <b>:attribute</b> is required',
                            'exists' => 'Column <b>:attribute</b> with value <b>:input</b> doesnt not exist',
            ];

            $validator = Validator::make($excelRowdata, $rules, $messages);

            if (!$validator->passes()) {

                $rowDataValidationResult = [
                    'row_number' => $currentRowInExcel,
                    'status' => 'failure',
                   // 'message' => 'In Excel Row - '.$excelRowdata['emp_no'].' : ' . $currentRowInExcel . ' has following error(s)',
                    'error_fields' => json_encode($validator->errors()),
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

            $user = User::where('user_code',$row['emp_no'])->first();
            $user_id=$user->id;

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
            $empPaySlip= new VmtEmployeePayslipV2;
            // $empPaySlip->Gender = $row['gender'];
            // $empPaySlip->DESIGNATION = $row['designation'];
            // $empPaySlip->DEPARTMENT = $row['department'];
            // $empPaySlip->DOJ = \DateTime::createFromFormat('d-m-Y', $row['doj'])->format('Y-m-d');

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

            $empPaySlipmonth=new VmtPayroll;
            $empPaySlipmonth->client_id=sessionGetSelectedClientid();
            $empPaySlipmonth->payroll_date=\DateTime::createFromFormat('d-m-Y', $row["payroll_month"])->format('Y-m-d');
            $empPaySlipmonth->save();

            $query_payroll_data= new VmtEmployeePayroll;
            $query_payroll_data->user_id=$user_id;
            $PAYROLL_MONTH=\DateTime::createFromFormat('d-m-Y', $row["payroll_month"])->format('Y-m-d');
            $payroll_id =VmtPayroll::where('payroll_date', $PAYROLL_MONTH)
                                        ->where('client_id',$user->client_id)->first()->id;
            $query_payroll_data->payroll_id=$payroll_id;
            $query_payroll_data->save();

            $emp_payroll_id=VmtEmployeePayroll::where('user_id',$user_id)->where('payroll_id',$payroll_id)->first()->id;
            $empPaySlip->emp_payroll_id= $emp_payroll_id;
            $empPaySlip->basic = $row["basic"];
            $empPaySlip->hra = $row["hra"];
            $empPaySlip->child_edu_allowance = $row["child_edu_allowance"];
            $empPaySlip->spl_alw = $row["spl_alw"];
            $empPaySlip->total_fixed_gross = $row["total_fixed_gross"];
            $empPaySlip->month_days = $row["month_days"];
            $empPaySlip->worked_days = $row["worked_days"];
            $empPaySlip->arrears_days = $row["arrears_days"];
            $empPaySlip->lop = $row["lop"];
            $empPaySlip->earned_basic = $row["earned_basic"];
            $empPaySlip->basic_arrear = $row["basic_arrear"];
            $empPaySlip->earned_hra = $row["earned_hra"];
            $empPaySlip->hra_arrear = $row["hra_arrear"];
            $empPaySlip->earned_child_edu_allowance = $row["earned_child_edu_allowance"];
            $empPaySlip->child_edu_allowance_arrear = $row["child_edu_allowance_arrear"];
            $empPaySlip->earned_spl_alw = $row["earned_spl_alw"];
            $empPaySlip->spl_alw_arrear = $row["spl_alw_arrear"];
            $empPaySlip->overtime = $row["overtime"];
            $empPaySlip->total_earned_gross = $row["total_earned_gross"];
            $empPaySlip->pf_wages = $row["pf_wages"];
            $empPaySlip->pf_wages_arrear = $row["pf_wages_arrear"];
            $empPaySlip->epfr = $row["epfr"];
            $empPaySlip->epfr_arrear  = $row["epfr_arrear"];
            $empPaySlip->edli_charges = $row["edli_charges"];
            $empPaySlip->edli_charges_arrears = $row["edli_charges_arrears"];
            $empPaySlip->pf_admin_charges = $row["pf_admin_charges"];
            $empPaySlip->pf_admin_charges_arrears = $row["pf_admin_charges_arrears"];
            $empPaySlip->employer_esi = $row["employer_esi"];
            $empPaySlip->employer_lwf = $row["employer_lwf"];
            $empPaySlip->ctc = $row["ctc"];
            $empPaySlip->epf_ee = $row["epf_ee"];
            $empPaySlip->epf_ee_arrear = $row['epf_ee_arrear'];
            $empPaySlip->employee_esic = $row['employee_esic'];
            $empPaySlip->prof_tax = $row['prof_tax'];
            $empPaySlip->income_tax = $row["income_tax"];
            $empPaySlip->stats_bonus = $row["stats_bonus"];
            $empPaySlip->earned_stats_bonus = $row["earned_stats_bonus"];
            $empPaySlip->earned_stats_arrear = $row["earned_stats_arrear"];
            $empPaySlip->sal_adv = $row['sal_adv'];
            $empPaySlip->canteen_dedn = $row['canteen_dedn'];
            $empPaySlip->other_deduc = $row["other_deduc"];
            $empPaySlip->lwf = $row["lwf"];
            $empPaySlip->total_deductions = $row["total_deductions"];
            $empPaySlip->net_take_home = $row["net_take_home"];
            $empPaySlip->rupees = $row["rupees"];
            $empPaySlip->el_opn_bal = $row["el_opn_bal"];
            $empPaySlip->availed_el = $row["availed_el"];
            $empPaySlip->balance_el = $row["balance_el"];
            $empPaySlip->sl_opn_bal = $row["sl_opn_bal"];
            $empPaySlip->availed_sl = $row["availed_sl"];
            $empPaySlip->balance_sl = $row["balance_sl"];
            $empPaySlip->rename = $row['rename'];
            //$empPaySlip->Email = $row['email'];
            $empPaySlip->greetings = $row['greetings'];
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
    public function getEmployeePayslipDetailsAsHTML($user_code, $month, $year){

        //Check permissions

        //if(!auth()->user()->can(config('vmt_roles_permissions.permissions.can_view_employees_payslip')) )



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

            //If empty, then show current user profile page
             $user = User::where('user_code',$user_code)->first();
             $user_id= $user->id;
             $payroll_month= VmtPayroll::whereMonth('payroll_date', $month)
                               ->whereYear('payroll_date', $year)->where('client_id',$user->client_id)->first();
//dd(payroll_month);
             $emp_payslip_id =VmtEmployeePayroll::where('user_id',$user_id)->where('payroll_id',$payroll_month->id)->first()->id;

            $data['employee_payslip'] = VmtEmployeePaySlipv2::where('emp_payroll_id',$emp_payslip_id)->first();

            $data['emp_payroll_month'] = $payroll_month;
            $data['employee_code'] = $user->user_code;
            $data['employee_name'] = $user->name;
            $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',$user->id)->first();
            $data['employee_details'] = VmtEmployee::where('userid',$user->id)->first();
            $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',$user->id)->first();

            $query_client = VmtClientMaster::find($user->client_id);

            $data['client_logo'] = $query_client->client_logo;
            $client_name = $query_client->client_name;

            $processed_clientName = strtolower(str_replace(' ', '', $client_name));


            $html =  view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);

            return $html;
            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $html
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip data as HTML",
                "data" =>$e
            ]);
        }
    }


    /*
        This function will also download PDF in local server

    */
    public function getEmployeePayslipDetailsAsPDF($user_code, $month, $year){

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

        $user_id =User::where('user_code',$user_code)->first()->id;

        $user = null;

        //If empty, then show current user profile page
        if (empty($user_id)) {
            $user = auth()->user()->id;
        } else {
            $user = User::find($user_id);
        }
        $user_id= $user->id;
        $payroll_month= VmtPayroll::whereMonth('payroll_date', $month)
                               ->whereYear('payroll_date', $year)->where('client_id',$user->client_id)->first();
//dd(payroll_month);

             $emp_payslip_id =VmtEmployeePayroll::where('user_id',$user_id)->where('payroll_id',$payroll_month->id)->first()->id;

            $data['employee_payslip'] = VmtEmployeePaySlipv2::where('emp_payroll_id',$emp_payslip_id)->first();

            $data['emp_payroll_month'] = $payroll_month;
            $data['employee_code'] = $user->user_code;

        $data['employee_name'] = $user->name;
        // dd( $data['employee_name']);
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id', $user->id)->first();
        $data['employee_details'] = VmtEmployee::where('userid', $user->id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id', $user->id)->first();

        $query_client = VmtClientMaster::find($user->client_id);

        $data['client_logo'] = $query_client->client_logo;
        $client_name = $query_client->client_name;

        $processed_clientName = strtolower(str_replace(' ', '', $client_name));


        $html = view('vmt_payslip_templates.template_payslip_' . $processed_clientName, $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true );

        $pdf = new Dompdf($options);
        $pdf->loadhtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        //$response=base64_encode($pdf->stream([$client_name.'.pdf']));
        $response=base64_encode($pdf->output([$client_name.'.pdf']));;

        return response()->json([
            'status' => 'success',
            'message' => "",
            'data' =>$response
        ]);

    }




    public function getEmployeePayslipDetails($user_code, $month ,$year){


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

            $user= User::where('user_code', $user_code)->first();
            $user_id =$user->id;


            //Check whether the payslip data exists or not
            $query_payslip= VmtPayroll::where('client_id',$user->client_id)->whereMonth('payroll_date', $month)
                                        ->whereYear('payroll_date', $year)->first();

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
            $query_payroll_id =  $query_payslip->id;


            $query_emp_payroll_id = VmtEmployeePayroll::where('user_id',$user_id)->where('payroll_id',$query_payroll_id)->first();


            $response['payslip_data'] = User::with([
                                            'getEmployeeDetails' => function($query){
                                               $query->select(['id','userid','dob','doj','location','pan_number','bank_id','bank_account_number','bank_ifsc_code']);
                                            },
                                            'getEmployeeOfficeDetails' => function($query){
                                                    $query->select(['id','user_id','designation']);
                                            },
                                            'getStatutoryDetails' =>function($query){
                                                $query->select(['id','user_id','epf_number','esic_number','uan_number']);

                                            },
                                            'single_payslip_empid' =>function($query){
                                                $query->select(['user_id']);
                                            },
                                            // 'single_payslip_detail' =>function($query){
                                            //     $query->get(['id','emp_payroll_id as PAYROLL_MONTH','month_days as MONTH_DAYS','worked_Days as Worked_Days','lop as LOP','arrears_Days as ArrearS_Days','basic as BASIC','hra as HRA','spl_alw as SPL_ALW',
                                            //     'overtime as Overtime','travel_conveyance','total_earned_gross as TOTAL_EARNED_GROSS','prof_tax as PROF_TAX','income_tax','sal_adv as SAL_ADV','other_deduc as OTHER_DEDUC','total_deductions as TOTAL_DEDUCTIONS','epfr as EPFR','employee_esic as EMPLOYEE_ESIC',
                                            //     'net_take_home as NET_TAKE_HOME','employer_esi as EMPLOYER_ESI']);
                                            // },
                                            ])
                                            ->where('users.id',$user_id)
                                            ->get(['users.id','users.name','users.user_code','users.email']);

$response['single_payslip_detail'] = VmtEmployeePaySlipV2::where('emp_payroll_id','=',$query_emp_payroll_id->id)
                                                ->get(['id','emp_payroll_id as PAYROLL_MONTH','month_days as MONTH_DAYS','worked_Days as Worked_Days','lop as LOP','arrears_Days as ArrearS_Days','basic as BASIC','hra as HRA','spl_alw as SPL_ALW',
                                                'overtime as Overtime','travel_conveyance','total_earned_gross as TOTAL_EARNED_GROSS','prof_tax as PROF_TAX','income_tax','sal_adv as SAL_ADV','other_deduc as OTHER_DEDUC','total_deductions as TOTAL_DEDUCTIONS','epfr as EPFR','employee_esic as EMPLOYEE_ESIC',
                                                'net_take_home as NET_TAKE_HOME','employer_esi as EMPLOYER_ESI']);

$response['single_payslip_detail'][0]['PAYROLL_MONTH']=$query_payslip->payroll_date;

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

    public function getAllEmployeesPayslipDetails( $month, $year){

        //Validate
        $validator = Validator::make(
            $data = [
                "year" => $year,
                "month" => $month,
            ],
            $rules = [
                "year" => 'required',
                "month" => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );


        try{
            if($validator->fails()){
                return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
                ]);
            }

            //Check whether "vmt_employee_payslip_status" has record for all the payslips for all the employees
            //If not, then generate for each payroll month. In future, this table record is inserted after payroll processing.

                //For each employees payslip data, get all the missing payrollstatus data in "vmt_employee_payslip_status"

                //Then, create new record for all payslips for all the employees



            $query_payslips = VmtEmployeePayslipV2::join('vmt_emp_payroll','vmt_emp_payroll.id','=','vmt_employee_payslip_v2.emp_payroll_id')
                                            ->join('vmt_payroll','vmt_payroll.id','=','vmt_emp_payroll.payroll_id')
                                            ->join('users','users.id','=','vmt_emp_payroll.user_id')
                                            ->whereYear('vmt_payroll.payroll_date', $year)
                                            ->whereMonth('vmt_payroll.payroll_date',$month)
                                            ->where('users.is_ssa','0')
                                            ->where('users.active','1')
                                            ->get();



                       //  dd($array_emp_payslip_details);
            return response()->json([
                'status' => 'success',
                'message' => $validator->errors()->all(),
                'data' => $query_payslips
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => '',
                'data' => $e
            ]);
        }
    }

        /*
                Fetches for a single employee


        */
    public function getEmployeeAllPayslipList($user_code){

            //Validate
            $validator = Validator::make(
                $data = [
                    "user_code" => $user_code,
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

                $user_id = User::where('user_code', $user_code)->first()->id;


        $query_payslips = VmtEmployeePayslipV2::join('vmt_emp_payroll','vmt_emp_payroll.id','=','vmt_employee_payslip_v2.emp_payroll_id')
                                            ->join('vmt_payroll','vmt_payroll.id','=','vmt_emp_payroll.payroll_id')
                                            ->where('vmt_emp_payroll.user_id',$user_id)
                                            ->orderBy('vmt_payroll.payroll_date', 'ASC')
                                            ->get(['vmt_employee_payslip_v2.id as id',
                                            'vmt_payroll.payroll_date as PAYROLL_MONTH',
                                            'vmt_employee_payslip_v2.net_take_home as NET_TAKE_HOME',
                                            'vmt_employee_payslip_v2.total_deductions as TOTAL_DEDUCTIONS',
                                            'vmt_employee_payslip_v2.total_earned_gross as TOTAL_EARNED_GROSS']);




                return response()->json([
                    "status" => "success",
                    "message" => "",
                    "data" =>$query_payslips
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

    // public function updatePayslipReleaseStatus($user_code,$month,$year,$release_status){
    //     $validator = Validator::make(
    //         $data = [
    //             "user_code" => $user_code,
    //             "month" => $month,
    //             "year" => $year,
    //             "status" => $release_status
    //         ],
    //         $rules = [
    //             "user_code" => 'required|exists:users,user_code',
    //             "month" => 'required',
    //             "year" => 'required',
    //             "status" => 'required',
    //         ],
    //         $messages = [
    //             'required' => 'Field :attribute is missing',
    //             'exists' => 'Field :attribute is invalid',
    //         ]

    //     );


    //     if($validator->fails()){
    //         return response()->json([
    //             'status' => 'failure',
    //             'message' => $validator->errors()->all()
    //         ]);
    //     }
    //     try{
    //         // to get user id
    //         $user_id = User::where('user_code',$user_code)->first()->id;


    //         //check if already exists
    //        $query_emp_payslipstatus = VmtEmployeePayslipStatus::where('user_id',$user_id)
    //                                 ->whereMonth('payroll_month', $month)
    //                                 ->whereYear('payroll_month', $year);

    //         if($query_emp_payslipstatus->exists())
    //         {
    //             //update
    //            $query_emp_payslipstatus = $query_emp_payslipstatus->first();
    //            $query_emp_payslipstatus->is_released = $release_status;
    //            $query_emp_payslipstatus->save();

    //         }
    //         else
    //         {

    //             //create new record
    //            $employeepaysliprelease = new VmtEmployeePayslipStatus;
    //            $employeepaysliprelease->user_id =$user_id;
    //            $employeepaysliprelease->payroll_month = $year.'-'.$month.'-1';
    //            $employeepaysliprelease->is_released = $release_status;
    //            $employeepaysliprelease->save();
    //         }

    //         $response =VmtEmployeePayslipStatus::where('user_id',$user_id)->first();


    //         return response()->json([
    //             'status' => 'success',
    //             'message' => "",
    //             'data' => $response
    //         ]);
    //     }
    //     catch(\Exception $e)
    //     {
    //         return response()->json([
    //             'status' => 'failure',
    //             'message' => "Error while fetching payslip release status data",
    //             'data' => $e
    //         ]);
    //     }

    // }



    public function sendMail_employeePayslip($user_code, $month, $year){
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


            $query_user = User::where('user_code', $user_code)->first();
            $user_id = $query_user->id;

            //Check if email exists for this user
            if(empty($query_user->email))
            {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'E-mail not found for the selected use',
                    'data' => ''
                ]);
            }

            //Check whether the payslip data exists or not
            $payroll_month= VmtPayroll::whereMonth('payroll_date', $month)
            ->whereYear('payroll_date', $year)->where('client_id',$query_user->client_id)->first();


            if(!$payroll_month->exists())
            {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Payslip not found for the given MONTH and YEAR'
                ]);

            }

            ////Generate the Payslip PDF


            $emp_payslip_id =VmtEmployeePayroll::where('user_id',$user_id)->where('payroll_id',$payroll_month->id)->first()->id;

            $data['employee_payslip'] = VmtEmployeePaySlipv2::where('emp_payroll_id',$emp_payslip_id)->first();

            $data['emp_payroll_month'] = $payroll_month;



            $data['employee_name'] = $query_user->name;
            $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',$user_id)->first();
            $data['employee_details'] = VmtEmployee::where('userid',$user_id)->first();
            $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',$user_id)->first();

            $query_client = VmtClientMaster::find($query_user->client_id);

            $data['client_logo'] = request()->getSchemeAndHttpHost().$query_client->client_logo;
            $client_name = $query_client->client_name;

            $processed_clientName = strtolower(str_replace(' ', '', $client_name));

            $html = view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);


            //Generate PDF
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $pdf = new Dompdf($options);
            $pdf->loadhtml($html, 'UTF-8');
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            $VmtGeneralInfo = VmtGeneralInfo::first();
            $image_view = url('/') . $VmtGeneralInfo->logo_img;

            // $pdf->stream($client_name.'.pdf');
            $isSent    = \Mail::to($query_user->email)->send(new PayslipMail( request()->getSchemeAndHttpHost(), $pdf->output(), $month, $year, $image_view));

            if($isSent){
                  $payslip_mail_sent = '1';
            }else{
                $payslip_mail_sent = '0';
            }


            // $query_emp_payslipstatus = VmtEmployeePayslipStatus::where('user_id',$user_id)
            // ->whereMonth('payroll_month', $month)
            // ->whereYear('payroll_month', $year);


            //     if($query_emp_payslipstatus->exists())
            //     {
            //     //update
            //     $query_emp_payslipstatus = $query_emp_payslipstatus->first();
            //     $query_emp_payslipstatus->is_payslip_mail_sent = $payslip_mail_sent;
            //     $query_emp_payslipstatus->save();

            //     }
            //     else
            //     {

            //     //create new record
            //     $employeepaysliprelease = new VmtEmployeePayslipStatus;
            //     $employeepaysliprelease->user_id =$user_id;
            //     $employeepaysliprelease->is_payslip_mail_sent =$payslip_mail_sent;
            //     $employeepaysliprelease->save();
            //     }

            //     $response =VmtEmployeePayslipStatus::where('user_id',$user_id)->first();



            return response()->json([
                "status" => "success",
                "message" => "Mail sent successfully !",
                "data" =>$response
            ]);


        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip mail",
                "data" =>$e
            ]);
        }

    }

    public function getEmployeeCompensatoryDetails($user_code){


        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
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

            $response = User::join('vmt_employee_compensatory_details','vmt_employee_compensatory_details.user_id','=','users.id')
                        ->where('users.user_code', $user_code)
                        ->get([
                            "basic",
                            "hra",
                            "Statutory_bonus",
                            "child_education_allowance",
                            "food_coupon",
                            "lta",
                            "transport_allowance",
                            "medical_allowance",
                            "education_allowance",
                            "special_allowance",
                            "other_allowance",
                            "gross",
                            "epf_employer_contribution",
                            "esic_employer_contribution",
                            "insurance",
                            "graduity",
                            "cic",
                            "epf_employee",
                            "esic_employee",
                            "professional_tax",
                            "labour_welfare_fund",
                            "net_income",
                            "dearness_allowance"
                        ])->first();

            $response['yearly_ctc'] = $response->cic*12;
            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $response
            ]);

        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getEmployeeCompensatoryDetails() ] ",
                'data' => $e
            ]);
        }


    }
}
