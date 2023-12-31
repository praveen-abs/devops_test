<?php

namespace App\Services;

use App\Models\AbsActivePayslip;
use App\Models\VmtOrgTimePeriod;
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
use DateTime;


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
use Illuminate\Support\Facades\Storage;

class VmtEmployeePayCheckService
{

    /*
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

        $data = array_filter($data);

        ini_set('max_execution_time', 3000);
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

        $corrected_data = $data;
        $j = array_keys($data);
        foreach ($corrected_data[$j[0]] as &$Single_data) {

            if (array_key_exists('dob', $Single_data) && is_int($Single_data['dob'])) {

                $Single_data['dob'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['dob'])->format('Y-m-d');
            }
            if (array_key_exists('doj', $Single_data) && is_int($Single_data['doj'])) {

                $Single_data['doj'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['doj'])->format('Y-m-d');
            }
            if (array_key_exists('payroll_month', $Single_data) && is_int($Single_data['payroll_month'])) {

                $Single_data['payroll_month'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['payroll_month'])->format('Y-m-d');

            }
        }
        unset($Single_data);


        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $corrected_data;

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
                'medical_allowance' => 'required|numeric',
                'medical_allowance_earned' => 'required|numeric',
                'medical_allowance_arrear' => 'required|numeric',
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
                'regex' =>  'Field <b>:attribute</b> is invalid',
                'numeric' =>  'Field <b>:attribute</b> is invalid',
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
            foreach ($excelRowdata_row[$i[0]]  as $key => $excelRowdata) {
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

            //Store the data into vmt_employee_payslip table
            $empPaySlip = new VmtEmployeePaySlipV2;
            $empPaySlip->gender = $row['gender'] ?? null;
            $empPaySlip->designation = $row['designation'];
            $empPaySlip->department = $row['department'] ?? null;
            $empPaySlip->location = $row['location'];
            $empPaySlip->father_name  = $row['father_name'] ?? null;
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
                $empPaySlipmonth->payroll_date =  $payroll_date;
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
                $empPaySlip->child_edu_allowance = $row["child_edu_allowance"] ?? 0;
                $empPaySlip->spl_alw = $row["spl_alw"] ?? 0;
                $empPaySlip->total_fixed_gross = $row["total_fixed_gross"] ?? 0;
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

                $empPaySlip->medical_allowance = $row["medical_allowance"] ?? 0;
                $empPaySlip->medical_allowance_earned = $row["medical_allowance_earned"] ?? 0;
                $empPaySlip->medical_allowance_arrear = $row["medical_allowance_arrear"] ?? 0;

                $empPaySlip->earned_spl_alw = $row["earned_spl_alw"];
                $empPaySlip->spl_alw_arrear = $row["spl_alw_arrear"];

                $empPaySlip->communication_allowance = $row["communication_allowance"];
                $empPaySlip->communication_allowance_earned = $row['communication_allowance_earned'] ?? 0;
                $empPaySlip->communication_allowance_arrear = $row['communication_allowance_arrear'] ?? 0;
                $empPaySlip->food_allowance = $row["food_allowance"];
                $empPaySlip->food_allowance_earned = $row['food_allowance_earned'] ?? 0;
                $empPaySlip->food_allowance_arrear = $row['food_allowance_arrear'] ?? 0;

                $empPaySlip->washing_allowance = $row['washing_allowance'] ?? 0;
                $empPaySlip->washing_allowance_earned = $row['washing_allowance_earned'] ?? 0;
                $empPaySlip->washing_allowance_arrear = $row['washing_allowance_arrear'] ?? 0;

                $empPaySlip->uniform_allowance = $row['uniform_allowance'] ?? 0;
                $empPaySlip->uniform_allowance_earned = $row['uniform_allowance_earned'] ?? 0;
                $empPaySlip->wuniform_allowance_arrear = $row['wuniform_allowance_arrear'] ?? 0;

                $empPaySlip->vehicle_reimbursement = $row["vehicle_reimbursement"];
                $empPaySlip->vehicle_reimbursement_earned = $row["vehicle_reimbursement_earned"];
                $empPaySlip->vehicle_reimbursement_arrear = $row["vehicle_reimbursement_arrear"];

                $empPaySlip->driver_salary = $row["driver_salary"];
                $empPaySlip->driver_salary_earned = $row["driver_salary_earned"];
                $empPaySlip->driver_salary_arrear = $row["driver_salary_arrear"];

                $empPaySlip->fuel_reimbursement = $row["fuel_reimbursement"];
                $empPaySlip->fuel_reimbursement_earned = $row["fuel_reimbursement_earned"];
                $empPaySlip-> fuel_reimbursement_arrear  = $row["fuel_reimbursement_arrear"];

                $empPaySlip->lta = $row["lta"];
                $empPaySlip->earned_lta = $row["earned_lta"];
                $empPaySlip->lta_arrear = $row["lta_arrear"];

                $empPaySlip->other_allowance = $row["other_allowance"];
                $empPaySlip->other_allowance_earned = $row["other_allowance_earned"];
                $empPaySlip->other_allowance_arrear = $row["other_allowance_arrear"];

                $empPaySlip->overtime = $row["overtime"];
                $empPaySlip->ovetime_hours = $row["ovetime_hours"] ?? 0;
                $empPaySlip->overtime_arrear = $row["overtime_arrear"] ?? 0;

                $empPaySlip->daily_allowance = $row["daily_allowance"] ?? 0;
                $empPaySlip->total_earned_gross = $row["total_earned_gross"];
                $empPaySlip->pf_wages = $row["pf_wages"] ?? 0;
                $empPaySlip->pf_wages_arrear = $row["pf_wages_arrear"] ?? 0;
                $empPaySlip->epfr = $row["epfr"] ?? 0;
                $empPaySlip->epfr_arrear  = $row["epfr_arrear"] ?? 0;
                $empPaySlip->edli_charges = $row["edli_charges"] ?? 0;
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
                $empPaySlip->salary_adv_arrear = $row['salary_adv_arrear'];
                $empPaySlip->uniform_deductions = $row['uniform_deductions'];
                $empPaySlip->canteen_dedn = $row['canteen_dedn'];
                $empPaySlip->loan_deductions = $row['loan_deductions'];
                $empPaySlip->other_deduc = $row["other_deduc"];
                $empPaySlip->lwf = $row["lwf"] ?? 0;
                $empPaySlip->total_deductions = $row["total_deductions"];
                $empPaySlip->net_take_home = $row["net_take_home"];
                $empPaySlip->rupees = $row["rupees"];
                $empPaySlip->el_opn_bal = $row["el_opn_bal"] ?? 0;
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
                $empPaySlip->vpf_arrear = $row['vpf_arrear'] ?? 0;
                $empPaySlip->vpf = $row['vpf'] ?? 0;
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


            $html =  view('vmt_payslip_templates.template_payslip_' . $processed_clientName, $data);

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

        $emp_pay_month =  date("F", $month);

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
        $response = base64_encode($pdf->output([$client_name . '.pdf']));;

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
            $query_payroll_id =  $query_payslip->id;


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
                    'id', 'emp_payroll_id as PAYROLL_MONTH', 'month_days as MONTH_DAYS', 'worked_Days as Worked_Days', 'lop as LOP', 'arrears_Days as ArrearS_Days', 'basic as BASIC', 'hra as HRA', 'spl_alw as SPL_ALW',
                    'overtime as Overtime', 'travel_conveyance', 'total_earned_gross as TOTAL_EARNED_GROSS', 'prof_tax as PROF_TAX', 'income_tax', 'sal_adv as SAL_ADV', 'other_deduc as OTHER_DEDUC', 'total_deductions as TOTAL_DEDUCTIONS', 'epfr as EPFR', 'employee_esic as EMPLOYEE_ESIC',
                    'net_take_home as NET_TAKE_HOME', 'employer_esi as EMPLOYER_ESI'
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
    public function getEmployeeAllPayslipList($user_id)
    {

        //Validate
        $validator = Validator::make(
            $data = [
                "user_id" => $user_id,
            ],
            $rules = [
                "user_id" => 'required|exists:users,id',
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

            //$user_id = User::where('user_code', $user_code)->first()->id;


            $query_payslips = VmtEmployeePaySlipV2::join('vmt_emp_payroll', 'vmt_emp_payroll.id', '=', 'vmt_employee_payslip_v2.emp_payroll_id')
                ->leftjoin('vmt_payroll', 'vmt_payroll.id', '=', 'vmt_emp_payroll.payroll_id')
                ->where('vmt_emp_payroll.user_id', $user_id)
                ->orderBy('vmt_payroll.payroll_date', 'ASC')
                ->get([
                    'vmt_employee_payslip_v2.id as id',
                    'vmt_emp_payroll.is_payslip_released as payslip_release_status',
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
            $isSent    = \Mail::to($query_user->email)->send(new PayslipMail(request()->getSchemeAndHttpHost(), $pdf->output(), $month, $year, $image_view));

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
//dd($response);

            $response['yearly_ctc'] =(integer) $response->cic * 12;
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
    public function generatePayslip($user_code, $month, $year, $type, $serviceVmtAttendanceService)
    {

        $validator = Validator::make(
            $data = [
                "user_code" => $user_code,
                "year" => $year,
                "month" => $month,
                "type" => $type,

            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "year" => 'required',
                "month" => 'required',
                "type" => 'required',
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


            $user_data = User::where('user_code', $user_code)->first();
            $payroll_data = VmtPayroll::leftJoin('vmt_client_master', 'vmt_client_master.id', '=', 'vmt_payroll.client_id')
                ->leftJoin('vmt_emp_payroll', 'vmt_emp_payroll.payroll_id', '=', 'vmt_payroll.id')
                ->leftJoin('users', 'users.id', '=', 'vmt_emp_payroll.user_id')
                ->leftJoin('vmt_employee_payslip_v2', 'vmt_employee_payslip_v2.emp_payroll_id', '=', 'vmt_emp_payroll.id')
                ->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                ->leftJoin('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
                ->where('user_code', $user_code)
                ->whereYear('payroll_date', $year)
                ->whereMonth('payroll_date', $month);

             if($payroll_data->doesntExist()){

                return response()->json([
                    'status' => 'success',
                    'message' => "payslip data not found",
                    'data' => ''
                ]);
             }

            //get leave data
            $start_date = Carbon::create($year, $month)->startOfMonth()->format('Y-m-d');

            $end_date = Carbon::create($year, $month)->lastOfMonth()->format('Y-m-d');

            $getleavedetails = $serviceVmtAttendanceService->leavetypeAndBalanceDetails($user_data->id, $start_date, $end_date, $month);

            $leave_data = array();

            foreach ($getleavedetails as $key => $single_leave_type) {

                if ($single_leave_type['leave_type']  <> "Sick Leave / Casual Leave" &&  $single_leave_type['leave_type'] <> "Earned Leave") {

                    if ($single_leave_type['availed'] != 0) {

                        array_push($leave_data, $single_leave_type);
                    }
                } else {
                    array_push($leave_data, $single_leave_type);
                }
            }

            $getpersonal['leave_data'] = $leave_data;


            // $financial_time   = VmtOrgTimePeriod::where('status','1')->first()->start_date;
            // $start_date =  Carbon::parse($financial_time );
            // $diff_months  = $start_date->diffInMonths(Carbon::now());

            // $months = [];
            // for($i=0; $i<$diff_months; $i++){
            //     $month = Carbon::parse($start_date)->addMonths($i)->format('Y-m-d');
            //     array_push($months,$month);
            // }

            // $months_details =[];
            // for($i=0; $i<count($months); $i++){
            // $vmt_payroll  =  VmtPayroll::join('vmt_emp_payroll','vmt_emp_payroll.payroll_id','=','vmt_payroll.id')
            //             ->join('vmt_employee_payslip_v2','vmt_employee_payslip_v2.emp_payroll_id','=','vmt_emp_payroll.id')
            //             ->where('vmt_emp_payroll.user_id',$user_data->id)
            //             ->where('payroll_date',$months[$i])
            //             ->get()->toArray();
            //             array_push($months_details,$vmt_payroll);
            // }

            $getpersonal['client_details'] = VmtClientMaster::where('id', $user_data->client_id)->get(
                [
                    'client_fullname',
                    'client_logo',
                    'address',
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
                        'vmt_employee_office_details.officical_mail',
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
                        'vmt_employee_payslip_v2.earned_basic as Basic',
                        'vmt_employee_payslip_v2.earned_hra as HRA',
                        'vmt_employee_payslip_v2.earned_stats_bonus as Statuory Bonus',
                        'vmt_employee_payslip_v2.other_earnings as Other Earnings',
                        'vmt_employee_payslip_v2.earned_spl_alw as Special Allowance',
                        'vmt_employee_payslip_v2.travel_conveyance as Travel Conveyance ',
                        'vmt_employee_payslip_v2.earned_child_edu_allowance as Child Education Allowance',
                        'vmt_employee_payslip_v2.communication_allowance_earned as Communication Allowance',
                        'vmt_employee_payslip_v2.food_allowance_earned as Food Allowance',
                        'vmt_employee_payslip_v2.vehicle_reimbursement_earned as Vehicle Reimbursement',
                        'vmt_employee_payslip_v2.driver_salary_earned as Driver Salary',
                        'vmt_employee_payslip_v2.earned_lta as Leave Travel Allowance',
                        'vmt_employee_payslip_v2.other_allowance_earned as Other Allowance',
                        'vmt_employee_payslip_v2.overtime as Overtime',
                    ]
                )->toArray();


            $getarrears = $payroll_data
                ->get(
                    [
                        'vmt_employee_payslip_v2.basic_arrear as Basic',
                        'vmt_employee_payslip_v2.hra_arrear as HRA',
                        'vmt_employee_payslip_v2.earned_stats_arrear as Statuory Bonus',
                        'vmt_employee_payslip_v2.spl_alw_arrear  as Special Allowance',
                        'vmt_employee_payslip_v2.child_edu_allowance_arrear as Child Education Allowance',
                    ]
                )->toArray();
            //need  to add over_time arrears


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

            $getCompensatorydata = $payroll_data
                ->get(
                    [
                        'vmt_employee_compensatory_details.basic as Basic',
                        'vmt_employee_compensatory_details.hra as HRA',
                        'vmt_employee_compensatory_details.Statutory_bonus as Statuory Bonus',
                        'vmt_employee_compensatory_details.special_allowance as Special Allowance',
                        'vmt_employee_compensatory_details.child_education_allowance as Child Education Allowance',
                        'vmt_employee_compensatory_details.communication_allowance as Communication Allowance',
                        'vmt_employee_compensatory_details.food_allowance as Food Allowance',
                        'vmt_employee_compensatory_details.vehicle_reimbursement as Vehicle Reimbursement',
                        'vmt_employee_compensatory_details.driver_salary as Driver Salary',
                        'vmt_employee_compensatory_details.lta as Leave Travel Allowance',
                        'vmt_employee_compensatory_details.other_allowance as Other Allowance',
                    ]
                )->toArray();


            $getpersonal['date_month'] = [
                "Month" => DateTime::createFromFormat('!m', $month)->format('M'),
                "Year" => DateTime::createFromFormat('Y', $year)->format('Y'),
                "abs_logo" => '/assets/clients/ess/logos/AbsLogo1.png',
            ];

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
            $getpersonal['arrears'] = [];
            foreach ($getarrears as $single_payslip) {
                foreach ($single_payslip as $key => $single_details) {

                    if ($single_details == "0" || $single_details == null || $single_details == "") {
                        unset($single_payslip[$key]);
                    }
                }
                array_push($getpersonal['arrears'], $single_payslip);
            }

            if (!empty($getpersonal['earnings'])) {
                $total_value = 0;
                foreach ($getpersonal['earnings'][0] as $single_data) {
                    $total_value += ((int) $single_data);
                }
                foreach ($getpersonal['arrears'][0] as $single_arrear) {
                    $total_value += ((int) $single_arrear);
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

            $getpersonal['compensatory_data'] = [];
            foreach ($getCompensatorydata as $single_payslip) {
                foreach ($single_payslip as $key => $single_details) {

                    if ($single_details == "0" || $single_details == null || $single_details == "") {
                        unset($single_payslip[$key]);
                    }
                }
                array_push($getpersonal['compensatory_data'], $single_payslip);
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

            //dd($getpersonal);

            $get_payslip =  AbsActivePayslip::where('is_active', '1')->first();
            $status = "";
            $message = "";

            if ($type == "pdf") {

                $html = view('dynamic_payslip_templates.dynamic_payslip_template_pdf', $getpersonal);

                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $pdf = new Dompdf($options);
                $pdf->loadhtml($html, 'UTF-8');
                $pdf->setPaper('A4', 'portrait');
                $pdf->render();
                // $pdf->stream("payslip.pdf");

                $response['user_code'] = $user_code;
                $response['month'] = $month;
                $response['year'] = $year;
                $response['emp_name']  = $user_data->name;
                $response['payslip'] = base64_encode($pdf->output(['payslip.pdf']));
            } elseif ($type == "html") {

                $html = view('dynamic_payslip_templates.dynamic_payslip_template_view', $getpersonal);

                $response = base64_encode($html);
            } else if ($type == "mail") {

                $html = view('dynamic_payslip_templates.dynamic_payslip_template_pdf', $getpersonal);

                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $pdf = new Dompdf($options);
                $pdf->loadhtml($html, 'UTF-8');
                $pdf->setPaper('A4', 'portrait');
                $pdf->render();

                $isSent = \Mail::to($getpersonal['personal_details'][0]['officical_mail'])
                    ->send(new PayslipMail(request()->getSchemeAndHttpHost(), $pdf->output(), $month, $year));

                if ($isSent) {
                    $status = "success";
                    $message = "Employee payslip send successfully";
                } else {
                    $status = "failure";
                    $message = "Error while send employee payslip";
                }
                return response()->json([
                    'status' => $status,
                    'message' => $message,
                    'data' => ''
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => "data fetch successfully",
                'data' => $response
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'failure',
                'message' => "Error while fetch payslip details ",
                'data' => $e->getmessage() . "  Error line  " . $e->getline()
            ]);
        }
    }

    // public function generatetemplates($type)
    // {


    //     if($type =="pdf"){
    //         $html = view('');


    //             $options = new Options();
    //             $options->set('isHtml5ParserEnabled', true);
    //             $options->set('isRemoteEnabled', true);

    //             $pdf = new Dompdf($options);
    //             $pdf->loadhtml($html, 'UTF-8');
    //             $pdf->setPaper('A4', 'portrait');
    //             $pdf->render();
    //             // $pdf->stream("payslip.pdf");
    //             $response = base64_encode($pdf->output(['payslip.pdf']));
    //             return $response;

    //     }elseif($type =="html"){

    //         $html = view('appointment_mail_templates.appointment_Letter_dunamis_machines');

    //         return $html;

    //     }else if($type =="mail"){

    //         $html = view('');

    //         $options = new Options();
    //         $options->set('isHtml5ParserEnabled', true);
    //         $options->set('isRemoteEnabled', true);

    //         $pdf = new Dompdf($options);
    //         $pdf->loadhtml($html, 'UTF-8');
    //         $pdf->setPaper('A4', 'portrait');
    //         $pdf->render();

    //         $isSent = \Mail::to($getpersonal['personal_details'][0]['officical_mail'])
    //         ->send(new PayslipMail(request()->getSchemeAndHttpHost(), $pdf->output(), $month, $year));

    //         if($isSent){
    //             dd('success');
    //         }else{
    //             dd('failure');
    //         }

    //     }

    // }
    public function viewPayslipdetails($user_code, $month, $year, $serviceVmtAttendanceService)
    {

        // $user_code = "BA002";

        try {

            $user_data = User::where('user_code', $user_code)->first();
            $payroll_data = VmtPayroll::join('vmt_client_master', 'vmt_client_master.id', '=', 'vmt_payroll.client_id')
                ->leftJoin('vmt_emp_payroll', 'vmt_emp_payroll.payroll_id', '=', 'vmt_payroll.id')
                ->leftJoin('users', 'users.id', '=', 'vmt_emp_payroll.user_id')
                ->leftJoin('vmt_employee_payslip_v2', 'vmt_employee_payslip_v2.emp_payroll_id', '=', 'vmt_emp_payroll.id')
                ->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                ->leftJoin('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
                ->where('user_code', $user_code)
                ->whereYear('payroll_date', $year)
                ->whereMonth('payroll_date', $month);


            //get leave data
            $start_date = Carbon::create($year, $month)->startOfMonth()->format('Y-m-d');
            $end_date = Carbon::create($year, $month)->lastOfMonth()->format('Y-m-d');

            $getleavedetails = $serviceVmtAttendanceService->leavetypeAndBalanceDetails($user_data->id, $start_date, $end_date, $month);

            $leave_data = array();

            foreach ($getleavedetails as $key => $single_leave_type) {

                if ($single_leave_type['leave_type']  <> "Sick Leave / Casual Leave" &&  $single_leave_type['leave_type'] <> "Earned Leave") {

                    if ($single_leave_type['availed'] != 0) {

                        array_push($leave_data, $single_leave_type);
                    }
                } else {
                    array_push($leave_data, $single_leave_type);
                }
            }

            $getpersonal['leave_data'] = $leave_data;
            $getpersonal['client_details'] = VmtClientMaster::where('id', $user_data->client_id)->get(
                [
                    'client_fullname',
                    'client_logo',
                    'address',
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
                        'vmt_employee_office_details.officical_mail',
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
                        'vmt_employee_payslip_v2.earned_basic as Basic',
                        'vmt_employee_payslip_v2.earned_hra as HRA',
                        'vmt_employee_payslip_v2.earned_stats_bonus as Statuory Bonus',
                        'vmt_employee_payslip_v2.other_earnings as Other Earnings',
                        'vmt_employee_payslip_v2.earned_spl_alw as Special Allowance',
                        'vmt_employee_payslip_v2.travel_conveyance as Travel Conveyance ',
                        'vmt_employee_payslip_v2.earned_child_edu_allowance as Child Education Allowance',
                        'vmt_employee_payslip_v2.communication_allowance_earned as Communication Allowance',
                        'vmt_employee_payslip_v2.food_allowance_earned as Food Allowance',
                        'vmt_employee_payslip_v2.vehicle_reimbursement_earned as Vehicle Reimbursement',
                        'vmt_employee_payslip_v2.driver_salary_earned as Driver Salary',
                        'vmt_employee_payslip_v2.earned_lta as Leave Travel Allowance',
                        'vmt_employee_payslip_v2.other_allowance_earned as Other Allowance',
                        'vmt_employee_payslip_v2.overtime as Overtime',
                    ]
                )->toArray();


            $getarrears = $payroll_data
                ->get(
                    [
                        'vmt_employee_payslip_v2.basic_arrear as Basic',
                        'vmt_employee_payslip_v2.hra_arrear as HRA',
                        'vmt_employee_payslip_v2.earned_stats_arrear as Statuory Bonus',
                        'vmt_employee_payslip_v2.spl_alw_arrear  as Special Allowance',
                        'vmt_employee_payslip_v2.child_edu_allowance_arrear as Child Education Allowance',
                    ]
                )->toArray();
            //need  to add over_time arrears


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

            $getCompensatorydata = $payroll_data
                ->get(
                    [
                        'vmt_employee_compensatory_details.basic as Basic',
                        'vmt_employee_compensatory_details.hra as HRA',
                        'vmt_employee_compensatory_details.Statutory_bonus as Statuory Bonus',
                        'vmt_employee_compensatory_details.special_allowance as Special Allowance',
                        'vmt_employee_compensatory_details.child_education_allowance as Child Education Allowance',
                        'vmt_employee_compensatory_details.communication_allowance as Communication Allowance',
                        'vmt_employee_compensatory_details.food_allowance as Food Allowance',
                        'vmt_employee_compensatory_details.vehicle_reimbursement as Vehicle Reimbursement',
                        'vmt_employee_compensatory_details.driver_salary as Driver Salary',
                        'vmt_employee_compensatory_details.lta as Leave Travel Allowance',
                        'vmt_employee_compensatory_details.other_allowance as Other Allowance',
                    ]
                )->toArray();


            $getpersonal['date_month'] = [
                "Month" => DateTime::createFromFormat('!m', $month)->format('M'),
                "Year" => DateTime::createFromFormat('Y', $year)->format('Y'),
                "abs_logo" => '/assets/clients/ess/logos/AbsLogo1.png',
            ];

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
            $getpersonal['arrears'] = [];
            foreach ($getarrears as $single_payslip) {
                foreach ($single_payslip as $key => $single_details) {

                    if ($single_details == "0" || $single_details == null || $single_details == "") {
                        unset($single_payslip[$key]);
                    }
                }
                array_push($getpersonal['arrears'], $single_payslip);
            }

            if (!empty($getpersonal['earnings'])) {
                $total_value = 0;
                foreach ($getpersonal['earnings'][0] as $single_data) {
                    $total_value += ((int) $single_data);
                }
                foreach ($getpersonal['arrears'][0] as $single_arrear) {
                    $total_value += ((int) $single_arrear);
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

            $getpersonal['compensatory_data'] = [];
            foreach ($getCompensatorydata as $single_payslip) {
                foreach ($single_payslip as $key => $single_details) {

                    if ($single_details == "0" || $single_details == null || $single_details == "") {
                        unset($single_payslip[$key]);
                    }
                }
                array_push($getpersonal['compensatory_data'], $single_payslip);
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

            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $getpersonal
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => "Error while fetchingdata ",
                'data' => $e->getMessage()
            ]);
        }
    }
    public function getEmployeeYearlyAndMonthlyCTC($user_code)
    {
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
            $profile_pic = null;
            //Get the user record and update avatar column
            $user_query =  User::where('user_code', $user_code)->first();
            $avatar_filename = $user_query->avatar;
            //Get the image from PRIVATE disk and send as BASE64
            $profile_pic = Storage::disk('private')->get($user_code . "/profile_pics/" . $avatar_filename);
            if ($profile_pic) {
                $profile_pic = base64_encode($profile_pic);
            }
            $compensatory_query = Compensatory::where('user_id', $user_query->id)->first();
            $response['profile_pic'] = $profile_pic;
            $response['profile_name'] = $user_query->name;
            $response['monthly_ctc'] = $compensatory_query->cic;
            $response['yearly_ctc'] =   $response['monthly_ctc'] * 12;
            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error in [getEmployeeYearlyAndMonthlyCTC()]",
                "data" => $e
            ]);
        }
    }
}
