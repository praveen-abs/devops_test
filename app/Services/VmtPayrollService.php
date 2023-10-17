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


class VmtPayrollService
{


    public function getCurrentPayrollMonth()
    {

        // start date and end date of current payroll month from the payroll table

        $current_payroll_date = date("Y-m-d");

        dd($current_payroll_date);
    }

    /*
        For UI :
        Get the payroll outcome section data.
    */
    public function getPayrollOutcomes($client_code, $payroll_month)
    {
        // dd('sdcfc');
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
        $payroll_month = date('m', $processed_date);
        $payroll_year = date('Y', $processed_date);

        //dd($payroll_month." , ".$payroll_year);



        try {

            //Base structure of Payroll Outcomes for UI
            $response_data = [
                "currency_type" => "INR",
                "employee_payables" => [
                    "bank_transfer" => 0.0,
                    "cheques" => 0.0,
                    "cash" => 0.0,
                ],
                "income_tax" => [
                    "title" => "Income Tax (TDS - 192 B)",
                    "tds_payable" => 0.0,
                    "no_of_employees" => 0.0,
                ],
                "EPF" => [
                    "employee_share" => 0.0,
                    "vpf_share" => 0.0,
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
                // "insurance"=>[
                //     "employee_share"=>0.0,
                //     "employer_share"=>0.0,
                //     "total"=>0.0,
                // ]
            ];

            //Get all the employees earnings details
            $query_employees_payroll_details = VmtPayroll::join('vmt_client_master', 'vmt_client_master.id', '=', 'vmt_payroll.client_id')
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
                ->where('users.is_ssa', '0')
                ->whereYear('payroll_date', $payroll_year)
                ->whereMonth('payroll_date', $payroll_month);
            // dd($query_employees_payroll_details );
            $array_overall_earnings = $query_employees_payroll_details->get(
                [
                    //'users.user_code as User-code',
                    //'users.name as Name',
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

            $array_overall_contributions = $query_employees_payroll_details
                ->get(
                    [
                        'vmt_employee_payslip_v2.epf_ee as EPF Employee',
                        'vmt_employee_payslip_v2.employee_esic as ESIC Employee ',
                        'vmt_employee_payslip_v2.vpf as VPF',
                    ]
                )->toArray();


            $array_overall_taxdeduction = $query_employees_payroll_details
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

            $array_overall_epf = $query_employees_payroll_details
                ->get([
                    'vmt_employee_payslip_v2.epfr',
                    'vmt_employee_payslip_v2.epf_ee',
                    'vmt_employee_payslip_v2.vpf',
                    'vmt_employee_payslip_v2.edli_charges',
                    'vmt_employee_payslip_v2.pf_admin_charges',
                ]);

            $array_overall_esic = $query_employees_payroll_details
                ->get([
                    'vmt_employee_payslip_v2.employer_esi',
                    'vmt_employee_payslip_v2.employee_esic',
                ]);

            $array_overall_PT = $query_employees_payroll_details
                ->get([
                    'vmt_employee_payslip_v2.prof_tax',
                ]);


            $response_data["employee_payables"]["total"] = $this->calculateOverallNetSalaryPayables($array_overall_earnings, $array_overall_contributions, $array_overall_taxdeduction);
            $response_data["EPF"] =  $this->getOverall_EPF($array_overall_epf);
            $response_data["ESIC"] = $this->getOverall_ESIC($array_overall_esic);
            $response_data["professional_tax"] = $this->getOverall_PT($array_overall_PT);

            // $response_data["overall_EPF"]=
            // foreach($employees_payroll_details as $singleEmployeePayrollDetails){
            //     //$total_employees_payables = $singleEmployeePayrollDetails->
            // }


            //Calculate the total payables for the give employees
            // $total_amount = ($getpersonal['earnings'][0]['Total Earnings']) - ($getpersonal['contribution'][0]['Total Contribution']) - ($getpersonal['Tax_Deduction'][0]['Total Deduction']);


            return response()->json([
                "status" => "success",
                "message" => "Payroll outcomes fetched successfully",
                "data" => $response_data

            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch Payroll Outcome details",
                "error" => $e->getMessage() . ' | Line : ' . $e->getLine(),
                "error_verbose" => $e->getTraceAsString(),
            ], 400);
        }
    }

    private function calculateOverallNetSalaryPayables($array_overall_earnings, $array_overall_contributions, $array_overall_deductions)
    {
        //dd(json_encode($array_overall_earnings). "\n ------ \n ". json_encode($array_overall_contributions). "\n ------ \n ". json_encode($array_overall_deductions) );
        //    dd($array_overall_earnings);
        $validator = Validator::make(
            $data = [
                'array_overall_earnings' => $array_overall_earnings,
                'array_overall_contributions' => $array_overall_contributions,
                'array_overall_deductions' => $array_overall_deductions
            ],
            $rules = [
                'array_overall_earnings' => 'required|array',
                'array_overall_contributions' => 'required|array',
                'array_overall_deductions' => 'required|array',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
                'array' => 'Field :attribute is not an array',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $overall_net_salary = 0;
        $overall_earnings = 0;
        $overall_contributions = 0;
        $overall_deductions = 0;

        //calculate the overall earnings
        foreach ($array_overall_earnings as $singleEmployeeEarnings) {
            foreach ($singleEmployeeEarnings as $key => $value) {
                if (!empty($value))
                    $overall_earnings += $value;
            }
        }

        //calculate the overall contributions
        foreach ($array_overall_contributions as $singleEmployeeContributions) {

            foreach ($singleEmployeeContributions as $key => $value) {
                if (!empty($value))
                    $overall_contributions += $value;
            }
        }

        foreach ($array_overall_deductions as $singleEmployeeDeductions) {

            foreach ($singleEmployeeDeductions as $key => $value) {
                if (!empty($value))
                    $overall_deductions += $value;
            }
        }

        $overall_net_salary = $overall_earnings - $overall_contributions - $overall_deductions;

        return $overall_net_salary;
    }

    private function getOverall_EPF($array_overall_epf)
    {
        $EPF = array();
        $overall_employee_epf = 0;
        $overall_vpf_share = 0;
        $overall_employer_epf = 0;
        $other_charges = 0;
        foreach ($array_overall_epf as $single_employee_epf) {
            // dd($overall_employee_epf);
            $overall_employer_epf += (int)$single_employee_epf->epfr;
            $overall_vpf_share += (int)$single_employee_epf->vpf;
            $overall_employee_epf += (int)$single_employee_epf->epf_ee;
            $other_charges  += (int) $single_employee_epf->edli_charges + $single_employee_epf->pf_admin_charges;
        }
        $EPF["employee_share"] = $overall_employee_epf;
        $EPF["vpf_share"] = $overall_vpf_share;
        $EPF["employer_share"] = $overall_employer_epf;
        $EPF["other_charges"] = $other_charges;
        return $EPF;
    }

    private function getOverall_ESIC($array_overall_esic)
    {
        $ESIC = array();
        $overall_employee_esic = 0;
        $overall_employer_esic = 0;
        foreach ($array_overall_esic as $single_employee_esic) {
            $overall_employee_esic +=(int)$single_employee_esic->employee_esic;
            $overall_employer_esic +=(int)$single_employee_esic->employer_esi;
        }
        $ESIC["employee_share"] = $overall_employee_esic;
        $ESIC["employer_share"] = $overall_employer_esic;
        return $ESIC;
    }

    private  function getOverall_PT($array_overall_PT)
    {
        $professional_tax = array();
        $overall_tax = 0;
        foreach ($array_overall_PT as $simple_employee_tax) {
            $overall_tax +=(int)$simple_employee_tax->prof_tax;
        }
        $professional_tax["tds_payable"] = $overall_tax;
        return $professional_tax;
    }
}
