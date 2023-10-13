<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtPayroll;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class VmtPayrollService{


    public function getCurrentPayrollMonth(){

        // start date and end date of current payroll month from the payroll table

        $current_payroll_date = date("Y-m-d");

        dd($current_payroll_date);

    }

    /*
        For UI :
        Get the payroll outcome section data.
    */
    public function getPayrollOutcomes($client_code, $payroll_month){
        $validator = Validator::make(
            $data = [
                'payroll_month' => $payroll_month,
                'client_code' => $client_code
            ],
            $rules = [
                'payroll_month' => 'exists:vmt_payroll,payroll_date',
                'client_code' => 'exists:vmt_client_master,client_code',
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

        $processed_date = strtotime($payroll_month);
        $payroll_month = date('m',$processed_date);
        $payroll_year = date('Y',$processed_date);

        //dd($payroll_month." , ".$payroll_year);



        try{

            //Base structure of Payroll Outcomes for UI
            $response_data = [
                "currency_type" => "INR",
                "employee_payables" => [
                    "bank_transfer" => 0.0,
                    "cheques" => 0.0,
                    "cash" => 0.0,
                    "total" => 0.0,
                ],
                "income_tax" => [
                    "title" => "Income Tax (TDS - 192 B)",
                    "tds_payable" => 0.0,
                    "no_of_employees" => 0
                ],
                "EPF" => [
                    "employee_share" => 0.0,
                    "employer_share" => 0.0,
                    "other_charges" => 0.0,
                ],
                "ESIC" => [
                    "employee_share" => 0.0,
                    "employer_share" => 0.0,
                    "other_charges" => 0.0,
                ],
                "professional_tax" => [
                    "tax_payable" => 0.0,
                    "no_of_employees" => 0.0,
                    "states" => 0.0,

                ],
            ];

            //Get all the employees earnings details
            $employees_payroll_details = VmtPayroll::join('vmt_client_master', 'vmt_client_master.id', '=', 'vmt_payroll.client_id')
                            ->leftJoin('vmt_emp_payroll', 'vmt_emp_payroll.payroll_id', '=', 'vmt_payroll.id')
                            ->leftJoin('users', 'users.id', '=', 'vmt_emp_payroll.user_id')
                            ->leftJoin('vmt_employee_payslip_v2', 'vmt_employee_payslip_v2.emp_payroll_id', '=', 'vmt_emp_payroll.id')
                            //->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                            //->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                            ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
                            //->leftJoin('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                            //->leftJoin('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
                            //->where('user_code', 'BA020')
                            ->where('users.is_ssa','0')
                            ->whereYear('payroll_date', $payroll_year)
                            ->whereMonth('payroll_date', $payroll_month)
                            ->get();

            dd($employees_payroll_details->toArray());

            $total_employees_payables = 0;

            foreach($employees_payroll_details as $singleEmployeePayrollDetails){
               // $total_employees_payables = $singleEmployeePayrollDetails->
            }


            //Calculate the total payables for the give employees
           // $total_amount = ($getpersonal['earnings'][0]['Total Earnings']) - ($getpersonal['contribution'][0]['Total Contribution']) - ($getpersonal['Tax_Deduction'][0]['Total Deduction']);


            return response()->json([
                "status" => "success",
                "message" => "Payroll outcomes fetched successfully",
                "data" => $response_data

            ]);


        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch Payroll Outcome details",
                "data" => $e->getmessage(),
            ],400);
        }



    }


}
