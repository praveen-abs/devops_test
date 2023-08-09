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
use App\Models\VmtEmployeePaySlipV2;
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

use Mail;
use App\Mail\PayslipMail;

class VmtEmployeePayCheckService
{

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

        $data = array_filter($data);

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
        $i = array_keys($excelRowdata_row);

        foreach ($excelRowdata_row[$i[0]] as $key => $excelRowdata) {

            $currentRowInExcel++;
            $excelRowdata['emp_no'] = trim($excelRowdata['emp_no']);
            //Validation
            $rules = [

                'emp_no' => [
                    function ($attribute, $value, $fail) {

                        $emp_client_code = preg_replace('/\d+/', '', $value);
                        $result = User::where('user_code', $value)->exists();

                        if (!$result) {
                            $fail('No matching client exists for the given Employee Code : ' . $value);
                        }
                    },
                ],
                'emp_name' => 'required',
                'gender' => 'nullable',
                'designation' => 'required',
                'department' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'location' => 'required',
                'father_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'pan_number' => 'nullable',
                'aadhar_number' => 'nullable',
                'uan' => 'nullable',
                'epf_number' => 'nullable',
                'esic_number' => 'nullable',
                'bank_name' => 'nullable',
                'account_number' => 'nullable',
                'bank_ifsc_code' => 'nullable',
                'payroll_month' => 'required|date',
                'basic' => 'required|numeric',
                'hra' => 'required|numeric',
                'child_edu_allowance' => 'required|numeric',
                'spl_alw' => 'required|numeric',
                'total_fixed_gross' => 'required|numeric',
                'month_days' => 'required|numeric',
                'worked_days' => 'required|numeric',
                'arrears_days' => 'required|numeric',
                'lop' => 'required|numeric',
                'earned_basic' => 'required|numeric',
                'basic_arrear' => 'required|numeric',
                'earned_hra' => 'required|numeric',
                'hra_arrear' => 'required|numeric',
                'stats_bonus' => 'required|numeric',
                'earned_stats_bonus' => 'required|numeric',
                'earned_stats_arrear' => 'required|numeric',
                'earned_child_edu_allowance' => 'required|numeric',
                'child_edu_allowance_arrear' => 'required|numeric',
                'earned_spl_alw' => 'required|numeric',
                'spl_alw_arrear' => 'required|numeric',
                'overtime' => 'required|numeric',
                'total_earned_gross' => 'required|numeric',
                'pf_wages' => 'required|numeric',
                'pf_wages_arrear' => 'required|numeric',
                'epfr' => 'required|numeric',
                'epfr_arrear' => 'required|numeric',
                'edli_charges' => 'required|numeric',
                'edli_charges_arrears' => 'required|numeric',
                'pf_admin_charges' => 'required|numeric',
                'pf_admin_charges_arrears' => 'required|numeric',
                'employer_esi' => 'required|numeric',
                'employer_lwf' => 'required|numeric',
                'ctc' => 'required|numeric',
                'epf_ee' => 'required|numeric',
                'epf_ee_arrear' => 'required|numeric',
                'employee_esic' => 'required|numeric',
                'prof_tax' => 'required|numeric',
                'income_tax' => 'required|numeric',
                'sal_adv' => 'required|numeric',
                'canteen_dedn' => 'required|numeric',
                'other_deduc' => 'required|numeric',
                'lwf' => 'required|numeric',
                'total_deductions' => 'required|numeric',
                'net_take_home' => 'required|numeric',
                'rupees' => 'required',
                'el_opn_bal' => 'nullable',
                'availed_el' => 'nullable',
                'balance_el' => 'nullable',
                'sl_opn_bal' => 'nullable',
                'availed_sl' => 'nullable',
                'balance_sl' => 'nullable',
                'rename' => 'nullable',
                'email' => 'nullable',
                'greetings' => 'nullable',
                'travel_conveyance' => 'nullable',
                'other_earnings' => 'nullable'
            ];

            $messages = [
                'required' => 'Field <b>:attribute</b> is required',
                'exists' => 'Column <b>:attribute</b> with value <b>:input</b> doesnt not exist',
                'regex' => 'Field <b>:attribute</b> is invalid',
                'numeric' => 'Field <b>:attribute</b> is invalid',
            ];

            $validator = Validator::make($excelRowdata, $rules, $messages);

            if (!$validator->passes()) {

                $rowDataValidationResult = [
                    'row_number' => $currentRowInExcel,
                    'status' => 'failure',
                    'message' => 'In Excel Row - ' . $excelRowdata['emp_no'] . ' : ' . $currentRowInExcel . ' has following error(s)',
                    'error_fields' => json_encode($validator->errors()),
                ];

                array_push($data_array, $rowDataValidationResult);

                $isAllRecordsValid = false;
            }
        } //for loop

        //Runs only if all excel records are valid
        if ($isAllRecordsValid) {
            foreach ($excelRowdata_row[$i[0]] as $key => $excelRowdata) {
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
        $row['emp_no'] = trim($row['emp_no']);

        $empNo = $row['emp_no'];
        try {

            $user = User::where('user_code', $row['emp_no'])->first();
            $user_id = $user->id;

            //update employee's details 'vmt_employee_details'
            $emp_details = VmtEmployee::where('userid', $user_id);


            //update employee's ' vmt_employee_details'
            //BANK NAME
            //ACCOUNT NUMBER
            //IFSC CODE

            //Store the data into vmt_employee_payslip table
            $empPaySlip = new VmtEmployeePaySlipV2;
            $empPaySlip->gender = $row['gender'] ?? null;
            $empPaySlip->designation = $row['designation'];
            $empPaySlip->department = $row['department'] ?? null;
            $empPaySlip->location = $row['location'];
            $empPaySlip->father_name = $row['father_name'] ?? null;
            $empPaySlip->pan_number = $row['pan_number'] ?? null;
            $empPaySlip->aadhar_number = $row['aadhar_number'] ?? null;
            $empPaySlip->uan = $row['uan'] ?? null;
            $empPaySlip->epf_number = $row["epf_number"] ?? null; // => "EPF123"
            $empPaySlip->esic_number = $row["esic_number"] ?? null; // => "Not Applicable",
            $empPaySlip->Bank_Name = $row["bank_name"] ?? null;
            $empPaySlip->account_number = $row["account_number"] ?? null;
            $empPaySlip->bank_ifsc_code = $row["bank_ifsc_code"] ?? null;

            $client_id = User::where('user_code', $row['emp_no'])->first()->client_id;

            $payroll_date = \DateTime::createFromFormat('d-m-Y', $row["payroll_month"])->format('Y-m-d');
            //check already exist or not
            $Payroll_data = VmtPayroll::where('client_id', $client_id)->where('payroll_date', $payroll_date)->first();
            if (empty($Payroll_data)) {
                $empPaySlipmonth = new VmtPayroll;
                $empPaySlipmonth->client_id = $client_id;
                $empPaySlipmonth->payroll_date = $payroll_date;
                $empPaySlipmonth->save();
            }

            $payroll_id = VmtPayroll::where('payroll_date', $payroll_date)->where('client_id', $client_id)->first()->id;
            $emp_payroll_data = VmtEmployeePayroll::where('payroll_id', $payroll_id)->where('user_id', $user_id)->first();
            if (empty($emp_payroll_data)) {
                $query_payroll_data = new VmtEmployeePayroll;
                $query_payroll_data->user_id = $user_id;
                $payroll_id = VmtPayroll::where('payroll_date', $payroll_date)->where('client_id', $client_id)->first()->id;
                $query_payroll_data->payroll_id = $payroll_id;
                $query_payroll_data->save();
            }

            $emp_payroll_id = VmtEmployeePayroll::where('user_id', $user_id)->where('payroll_id', $payroll_id)->first()->id;
            $emp_payslip_data = VmtEmployeePaySlipV2::where('emp_payroll_id', $emp_payroll_id)->first();


            if (empty($emp_payslip_data)) {
                $emp_payroll_id = VmtEmployeePayroll::where('user_id', $user_id)->where('payroll_id', $payroll_id)->first()->id;
                $empPaySlip->emp_payroll_id = $emp_payroll_id;
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
                $empPaySlip->epfr_arrear = $row["epfr_arrear"];
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
                $empPaySlip->availed_el = $row["availed_el"] ?? 0;
                $empPaySlip->balance_el = $row["balance_el"] ?? 0;
                $empPaySlip->sl_opn_bal = $row["sl_opn_bal"] ?? 0;
                $empPaySlip->availed_sl = $row["availed_sl"] ?? 0;
                $empPaySlip->balance_sl = $row["balance_sl"] ?? 0;
                $empPaySlip->rename = $row['rename'] ?? 0;
                //$empPaySlip->Email = $row['email'];
                $empPaySlip->greetings = $row['greetings'] ?? 0;
                $empPaySlip->travel_conveyance = $row['travel_conveyance'] ?? 0;
                $empPaySlip->other_earnings = $row['other_earnings'] ?? 0;
                $empPaySlip->save();
            }
            //]);

            //dd($empPaySlip );
            //SAVE THE TABLE



            // if (fetchMasterConfigValue("can_send_appointmentmail_after_onboarding") == "true") {
            //     $isEmailSent  = $this->attachApoinmentPdf($row);
            // }

            return $rowdata_response = [
                'row_number' => '',
                'status' => 'success',
                'message' => 'Payslip for ' . $empNo . ' added successfully<br/>',
                'error_fields' => [],
            ];
        } catch (\Exception $e) {
            //$this->deleteUser($user->id);

            //dd("For Usercode : ".$row['emp_no']."  -----  ".$e);
            return $rowdata_response = [
                'row_number' => '',
                'status' => 'failure',
                'message' => 'Payslip for ' . $empNo . ' not added',
                'error_fields' => json_encode(['error' => $e->getMessage()]),
                'stack_trace' => $e->getTraceAsString()
            ];
        }
    }

    /*
        Show Employee payslip as HTML
    */
    public function getEmployeePayslipDetailsAsHTML($user_code, $month, $year)
    {

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


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            //If empty, then show current user profile page
            $user = User::where('user_code', $user_code)->first();
            $user_id = $user->id;
            $payroll_month = VmtPayroll::whereMonth('payroll_date', $month)
                ->whereYear('payroll_date', $year)->where('client_id', $user->client_id)->first();
            //dd(payroll_month);
            $emp_payslip_id = VmtEmployeePayroll::where('user_id', $user_id)->where('payroll_id', $payroll_month->id)->first()->id;

            $data['employee_payslip'] = VmtEmployeePaySlipV2::where('emp_payroll_id', $emp_payslip_id)->first();

            $data['emp_payroll_month'] = $payroll_month;
            $data['employee_code'] = $user->user_code;
            $data['employee_name'] = $user->name;
            $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id', $user->id)->first();
            $data['employee_details'] = VmtEmployee::where('userid', $user->id)->first();
            $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id', $user->id)->first();

            $query_client = VmtClientMaster::find($user->client_id);

            $data['client_logo'] = $query_client->client_logo;
            $client_name = $query_client->client_name;

            $processed_clientName = strtolower(str_replace(' ', '', $client_name));


            $html = view('vmt_payslip_templates.template_payslip_' . $processed_clientName, $data);

            return $html;
            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $html
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip data as HTML",
                "data" => $e
            ]);
        }
    }


    /*
        This function will also download PDF in local server

    */
    public function getEmployeePayslipDetailsAsPDF($user_code, $month, $year)
    {

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


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        $user_id = User::where('user_code', $user_code)->first()->id;

        $user = null;

        //If empty, then show current user profile page
        if (empty($user_id)) {
            $user = auth()->user()->id;
        } else {
            $user = User::find($user_id);
        }
        $user_id = $user->id;
        $payroll_month = VmtPayroll::whereMonth('payroll_date', $month)
            ->whereYear('payroll_date', $year)->where('client_id', $user->client_id)->first();
        //dd(payroll_month);

        $emp_payslip_id = VmtEmployeePayroll::where('user_id', $user_id)->where('payroll_id', $payroll_month->id)->first()->id;

        $data['employee_payslip'] = VmtEmployeePaySlipV2::where('emp_payroll_id', $emp_payslip_id)->first();

        $data['emp_payroll_month'] = $payroll_month;
        $data['employee_code'] = $user->user_code;

        $emp_name = $user->name;

        $month = strtotime($payroll_month->payroll_date);

        $emp_pay_month = date("F", $month);

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
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadhtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        //$response=base64_encode($pdf->stream([$client_name.'.pdf']));
        $response = base64_encode($pdf->output([$client_name . '.pdf']));
        ;

        return response()->json([
            'status' => 'success',
            'message' => "",
            'emp_name' => $emp_name,
            'emp_month' => $emp_pay_month,
            'data' => $response
        ]);
    }




    public function getEmployeePayslipDetails($user_code, $month, $year)
    {


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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $user = User::where('user_code', $user_code)->first();
            $user_id = $user->id;


            //Check whether the payslip data exists or not
            $query_payslip = VmtPayroll::where('client_id', $user->client_id)->whereMonth('payroll_date', $month)
                ->whereYear('payroll_date', $year)->first();

            if (empty($query_payslip)) {
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
            $query_payroll_id = $query_payslip->id;


            $query_emp_payroll_id = VmtEmployeePayroll::where('user_id', $user_id)->where('payroll_id', $query_payroll_id)->first();


            $response['payslip_data'] = User::with([
                'getEmployeeDetails' => function ($query) {
                    $query->select(['id', 'userid', 'dob', 'doj', 'location', 'pan_number', 'bank_id', 'bank_account_number', 'bank_ifsc_code']);
                },
                'getEmployeeOfficeDetails' => function ($query) {
                    $query->select(['id', 'user_id', 'designation']);
                },
                'getStatutoryDetails' => function ($query) {
                    $query->select(['id', 'user_id', 'epf_number', 'esic_number', 'uan_number']);
                },
                'single_payslip_empid' => function ($query) {
                    $query->select(['user_id']);
                },
                // 'single_payslip_detail' =>function($query){
                //     $query->get(['id','emp_payroll_id as PAYROLL_MONTH','month_days as MONTH_DAYS','worked_Days as Worked_Days','lop as LOP','arrears_Days as ArrearS_Days','basic as BASIC','hra as HRA','spl_alw as SPL_ALW',
                //     'overtime as Overtime','travel_conveyance','total_earned_gross as TOTAL_EARNED_GROSS','prof_tax as PROF_TAX','income_tax','sal_adv as SAL_ADV','other_deduc as OTHER_DEDUC','total_deductions as TOTAL_DEDUCTIONS','epfr as EPFR','employee_esic as EMPLOYEE_ESIC',
                //     'net_take_home as NET_TAKE_HOME','employer_esi as EMPLOYER_ESI']);
                // },
            ])
                ->where('users.id', $user_id)
                ->get(['users.id', 'users.name', 'users.user_code', 'users.email']);

            $response['single_payslip_detail'] = VmtEmployeePaySlipV2::where('emp_payroll_id', '=', $query_emp_payroll_id->id)
                ->get([
                    'id',
                    'emp_payroll_id as PAYROLL_MONTH',
                    'month_days as MONTH_DAYS',
                    'worked_Days as Worked_Days',
                    'lop as LOP',
                    'arrears_Days as ArrearS_Days',
                    'basic as BASIC',
                    'hra as HRA',
                    'spl_alw as SPL_ALW',
                    'overtime as Overtime',
                    'travel_conveyance',
                    'total_earned_gross as TOTAL_EARNED_GROSS',
                    'prof_tax as PROF_TAX',
                    'income_tax',
                    'sal_adv as SAL_ADV',
                    'other_deduc as OTHER_DEDUC',
                    'total_deductions as TOTAL_DEDUCTIONS',
                    'epfr as EPFR',
                    'employee_esic as EMPLOYEE_ESIC',
                    'net_take_home as NET_TAKE_HOME',
                    'employer_esi as EMPLOYER_ESI'
                ]);

            $response['single_payslip_detail'][0]['PAYROLL_MONTH'] = $query_payslip->payroll_date;

            $response['client_logo'] = '';

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip data",
                "data" => $e
            ]);
        }
    }

    public function getAllEmployeesPayslipDetails($month, $year)
    {

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


        try {
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failure',
                    'message' => $validator->errors()->all()
                ]);
            }

            //Check whether "vmt_employee_payslip_status" has record for all the payslips for all the employees
            //If not, then generate for each payroll month. In future, this table record is inserted after payroll processing.

            //For each employees payslip data, get all the missing payrollstatus data in "vmt_employee_payslip_status"

            //Then, create new record for all payslips for all the employees



            $query_payslips = VmtEmployeePaySlipV2::join('vmt_emp_payroll', 'vmt_emp_payroll.id', '=', 'vmt_employee_payslip_v2.emp_payroll_id')
                ->join('vmt_payroll', 'vmt_payroll.id', '=', 'vmt_emp_payroll.payroll_id')
                ->join('users', 'users.id', '=', 'vmt_emp_payroll.user_id')
                ->whereYear('vmt_payroll.payroll_date', $year)
                ->whereMonth('vmt_payroll.payroll_date', $month)
                ->where('users.is_ssa', '0')
                ->where('users.active', '1')
                ->get();



            //  dd($array_emp_payslip_details);
            return response()->json([
                'status' => 'success',
                'message' => $validator->errors()->all(),
                'data' => $query_payslips
            ]);
        } catch (\Exception $e) {
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
    public function getEmployeeAllPayslipList($user_code)
    {

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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $user_id = User::where('user_code', $user_code)->first()->id;


            $query_payslips = VmtEmployeePaySlipV2::join('vmt_emp_payroll', 'vmt_emp_payroll.id', '=', 'vmt_employee_payslip_v2.emp_payroll_id')
                ->join('vmt_payroll', 'vmt_payroll.id', '=', 'vmt_emp_payroll.payroll_id')
                ->where('vmt_emp_payroll.user_id', $user_id)
                ->orderBy('vmt_payroll.payroll_date', 'ASC')
                ->get([
                    'vmt_employee_payslip_v2.id as id',
                    'vmt_payroll.payroll_date as PAYROLL_MONTH',
                    'vmt_employee_payslip_v2.net_take_home as NET_TAKE_HOME',
                    'vmt_employee_payslip_v2.total_deductions as TOTAL_DEDUCTIONS',
                    'vmt_employee_payslip_v2.total_earned_gross as TOTAL_EARNED_GROSS'
                ]);




            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $query_payslips
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip data",
                "data" => $e
            ]);
        }
    }

    public function updatePayslipReleaseStatus($user_code, $month, $year, $release_status)
    {


        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "month" => $month,
                "year" => $year,
                "status" => $release_status
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "month" => 'required',
                "year" => 'required',
                "status" => 'required',
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
            // to get user id
            $user = User::where('user_code', $user_code)->first();
            $user_id = $user->id;

            //check if already exists
            $payroll_month = VmtPayroll::whereMonth('payroll_date', $month)
                ->whereYear('payroll_date', $year)->where('client_id', $user->client_id)->first();


            $emp_payroll_data = VmtEmployeePayroll::where('user_id', $user_id)
                ->where('payroll_id', $payroll_month->id)->first();


            if (!empty($emp_payroll_data)) {
                //update

                $employeepaysliprelease = $emp_payroll_data;
                $employeepaysliprelease->is_payslip_released = $release_status;
                $employeepaysliprelease->save();
            } else {

                //create new record


                $query_payroll = new Vmtpayroll;
                $query_payroll->client_id = $user->client_id;
                $query_payroll->payroll_date = $year . '-' . $month . '-01';
                $query_payroll->save();
                $payroll_month = VmtPayroll::whereMonth('payroll_date', $month)
                    ->whereYear('payroll_date', $year)->where('client_id', $user->client_id)->first();
                $employeepaysliprelease = new VmtEmployeePayroll;
                $employeepaysliprelease->user_id = $user_id;
                $employeepaysliprelease->payroll_id = $payroll_month->id;
                $employeepaysliprelease->is_payslip_released = $release_status;
                $employeepaysliprelease->save();
            }




            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $employeepaysliprelease
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error while fetching payslip release status data",
                'data' => $e
            ]);
        }
    }



    public function sendMail_employeePayslip($user_code, $month, $year)
    {
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


        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {


            $query_user = User::where('user_code', $user_code)->first();
            $user_id = $query_user->id;

            //Check if email exists for this user
            if (empty($query_user->email)) {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'E-mail not found for the selected use',
                    'data' => ''
                ]);
            }

            //Check whether the payslip data exists or not
            $payroll_month = VmtPayroll::whereMonth('payroll_date', $month)
                ->whereYear('payroll_date', $year)->where('client_id', $query_user->client_id)->first();


            if (!$payroll_month->exists()) {
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Payslip not found for the given MONTH and YEAR'
                ]);
            }

            ////Generate the Payslip PDF


            $emp_payslip_id = VmtEmployeePayroll::where('user_id', $user_id)->where('payroll_id', $payroll_month->id)->first()->id;

            $data['employee_payslip'] = VmtEmployeePaySlipV2::where('emp_payroll_id', $emp_payslip_id)->first();

            $data['emp_payroll_month'] = $payroll_month;


            $data['employee_code'] = $query_user->user_code;
            $data['employee_name'] = $query_user->name;
            $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first();
            $data['employee_details'] = VmtEmployee::where('userid', $user_id)->first();
            $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id', $user_id)->first();

            $query_client = VmtClientMaster::find($query_user->client_id);

            $data['client_logo'] = request()->getSchemeAndHttpHost() . $query_client->client_logo;
            $client_name = $query_client->client_name;

            $processed_clientName = strtolower(str_replace(' ', '', $client_name));

            $html = view('vmt_payslip_templates.template_payslip_' . $processed_clientName, $data);


            //Generate PDF
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $pdf = new Dompdf($options);
            $pdf->loadhtml($html);

            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            $VmtClientMaster = VmtClientMaster::first();
            $image_view = url('/') . $VmtClientMaster->client_logo;

            // $pdf->stream($client_name.'.pdf');
            $isSent = \Mail::to($query_user->email)->send(new PayslipMail(request()->getSchemeAndHttpHost(), $pdf->output(), $month, $year, $image_view));

            if ($isSent) {
                return response()->json([
                    "status" => "success",
                    "message" => "Mail sent successfully !",
                    "data" => $payslip_mail_sent = '1'
                ]);
            } else {
                return response()->json([
                    "status" => "failure",
                    "message" => "Mail Not sent !",
                    "data" => $payslip_mail_sent = '0'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching payslip mail",
                "data" => $e->getMessage()
            ]);
        }
    }

    public function getEmployeeCompensatoryDetails($user_code)
    {


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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try {

            $response = User::join('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
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

            $response['yearly_ctc'] = $response->cic * 12;
            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getEmployeeCompensatoryDetails() ] ",
                'data' => $e
            ]);
        }
    }

    public function generatePayslip($user_code, $payroll_date)
    {

        $user_code = "BA002";
        $payroll_date = "2023-06-01";


        $payroll_data = VmtPayroll::join('vmt_client_master', 'vmt_client_master.id', '=', 'vmt_payroll.client_id')
            ->join('vmt_emp_payroll', 'vmt_emp_payroll.payroll_id', '=', 'vmt_payroll.id')
            ->join('users', 'users.id', '=', 'vmt_emp_payroll.user_id')
            ->join('vmt_employee_payslip_v2', 'vmt_employee_payslip_v2.emp_payroll_id', '=', 'vmt_emp_payroll.id')
            ->join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->join('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
            ->join('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
            ->join('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
            ->where('user_code', $user_code)
            ->where('payroll_date', $payroll_date);

        $getpersonal['client_details'] = $payroll_data->get(
            [
                'vmt_client_master.client_fullname',
                'vmt_client_master.client_logo',
                'vmt_client_master.address',
            ]
        )->toArray();


        $getpersonal['personal_details'] = $payroll_data
            ->get(
                [
                    'users.name',
                    'users.user_code',
                    'vmt_employee_details.doj',
                    'vmt_department.name as department_name',
                    'vmt_employee_office_details.designation',
                    'vmt_employee_details.pan_number',
                    'vmt_banks.bank_name',
                    'vmt_employee_details.bank_account_number',
                    'vmt_employee_details.bank_ifsc_code',
                    'vmt_employee_statutory_details.uan_number',
                    'vmt_employee_statutory_details.epf_number',
                    'vmt_department.name as department_name'
                ]
            )->toArray();


        $getpersonal['salary_details'] = $payroll_data
            ->get(
                [
                    'vmt_employee_payslip_v2.month_days',
                    'vmt_employee_payslip_v2.worked_Days',
                    'vmt_employee_payslip_v2.arrears_Days',
                    'vmt_employee_payslip_v2.lop',
                ]
            )->toArray();

        $getearnings = $payroll_data
            ->get(
                [
                    'vmt_employee_payslip_v2.basic as Basic',
                    'vmt_employee_payslip_v2.hra as HRA',
                    'vmt_employee_payslip_v2.earned_stats_bonus as Statuory Bonus',
                    'vmt_employee_payslip_v2.other_earnings as Other Earnings',
                    'vmt_employee_payslip_v2.earned_spl_alw  as Special Allowance',
                    'vmt_employee_payslip_v2.travel_conveyance as Travel Conveyance ',
                    'vmt_employee_payslip_v2.earned_child_edu_allowance as Child Education Allowance',
                    'vmt_employee_payslip_v2.overtime as Overtime',
                ]
            )->toArray();


        $getcontribution = $payroll_data
            ->get(
                [
                    'vmt_employee_payslip_v2.epf_ee as EPF Employee',
                    'vmt_employee_payslip_v2.employee_esic as ESIC Employee ',
                    'vmt_employee_payslip_v2.vpf as VPF',
                ]
            )->toArray();


        $gettaxdeduction = $payroll_data
            ->get(
                [
                    'vmt_employee_payslip_v2.prof_tax as Professional Tax',
                    'vmt_employee_payslip_v2.lwf as LWF',
                    'vmt_employee_payslip_v2.income_tax as Income Tax',
                    'vmt_employee_payslip_v2.sal_adv as Salary Advance',
                    'vmt_employee_payslip_v2.canteen_dedn as Canteen Deduction',
                    'vmt_employee_payslip_v2.other_deduc as Other Deduction',
                ]
            )->toArray();

        // Total earnings

        $getpersonal['earnings'] = [];
        foreach ($getearnings as $single_payslip) {
            foreach ($single_payslip as $key => $single_details) {

                if ($single_details == "0" || $single_details == null || $single_details == "") {
                    unset($single_payslip[$key]);
                }
            }
            array_push($getpersonal['earnings'], $single_payslip);
        }

        if (!empty($getpersonal['earnings'])) {
            $total_value = 0;
            foreach ($getpersonal['earnings'][0] as $single_data) {
                $total_value += ((int) $single_data);
            }
            $getpersonal['earnings'][0]['Total Earnings'] = $total_value;
        }

        // Total contribution

        $getpersonal['contribution'] = [];
        foreach ($getcontribution as $single_payslip) {
            foreach ($single_payslip as $key => $single_details) {

                if ($single_details == "0" || $single_details == null || $single_details == "") {
                    unset($single_payslip[$key]);
                }
            }
            array_push($getpersonal['contribution'], $single_payslip);
        }

        if (!empty($getpersonal['contribution'])) {

            $total_value = 0;
            foreach ($getpersonal['contribution'][0] as $single_simma) {
                $total_value += ((int) $single_simma);
            }
            $getpersonal['contribution'][0]['Total Contribution'] = $total_value;

        }

            // Total deduction

        $getpersonal['Tax_Deduction'] = [];
        foreach ($gettaxdeduction as $single_payslip) {
            foreach ($single_payslip as $key => $single_details) {

                if ($single_details == "0" || $single_details == null || $single_details == "") {
                    unset($single_payslip[$key]);
                }
            }
            array_push($getpersonal['Tax_Deduction'], $single_payslip);
        }

        if (!empty($getpersonal['Tax_Deduction'])) {

            $total_value = 0;
            foreach ($getpersonal['Tax_Deduction'][0] as $single_data) {
                $total_value += ((int) $single_data);
            }
            $getpersonal['Tax_Deduction'][0]['Total Deduction'] = $total_value;

        }


        if (!empty($getpersonal['earnings']) && !empty($getpersonal['contribution']) && !empty($getpersonal['Tax_Deduction'])) {
            $total_amount = ($getpersonal['earnings'][0]['Total Earnings']) - ($getpersonal['contribution'][0]['Total Contribution']) - ($getpersonal['Tax_Deduction'][0]['Total Deduction']);

            $getpersonal['over_all'] = [
                [
                    "Net Salary Payable" => $total_amount,
                    "Net Salary in words" => numberToWord($total_amount),
                ]
            ];
        }


        // dd($getpersonal);


            $type = "html";

        if($type =="pdf"){

            $html = view('dynamic_payslip_templates.dynamic_payslip_template_pdf', $getpersonal);

                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $pdf = new Dompdf($options);
                $pdf->loadhtml($html, 'UTF-8');
                $pdf->setPaper('A4', 'portrait');
                $pdf->render();
                $pdf->stream("payslip.pdf");

                 return redirect()->back();

        }elseif($type =="html"){

            $html = view('dynamic_payslip_templates.dynamic_payslip_template_view', $getpersonal);

            return $html;

        }

    }

}
