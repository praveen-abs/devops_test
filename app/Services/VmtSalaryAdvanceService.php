<?php

namespace App\Services;

use App\Models\Compensatory;
use App\Models\VmtEmpSalAdvDetails;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtLoanInterestSettings;
use App\Models\VmtSalaryAdvSettings;
use Carbon\Carbon;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Models\Department;
use App\Models\State;
use Exception;
use App\Models\VmtClientMaster;




class VmtSalaryAdvanceService
{

    public function getAllDropdownFilterSetting()
    {

        $current_client_id = auth()->user()->client_id;

        try {

            $queryGetDept = Department::select('id', 'name')->get();

            $queryGetDesignation = VmtEmployeeOfficeDetails::select('designation')->where('designation', '<>', 'S2 Admin')->distinct()->get();

            $queryGetLocation = VmtEmployeeOfficeDetails::select('work_location')->distinct()->get();

            $queryGetstate = State::select('id', 'state_name')->distinct()->get();

            if ($current_client_id == 1) {

                $queryGetlegalentity = VmtClientMaster::select('id', 'client_name')->distinct()->get();
            } elseif ($current_client_id == 0) {

                $queryGetlegalentity = VmtClientMaster::select('id', 'client_name')->distinct()->get();
            } elseif ($current_client_id == 2) {

                $queryGetlegalentity = VmtClientMaster::where('id', $current_client_id)->distinct()->get(['id', 'client_name']);
            } elseif ($current_client_id == 3) {

                $queryGetlegalentity = VmtClientMaster::where('id', $current_client_id)->distinct()->get(['id', 'client_name']);
            } elseif ($current_client_id == 4) {

                $queryGetlegalentity = VmtClientMaster::where('id', $current_client_id)->distinct()->get(['id', 'client_name']);
            }


            $getsalary  = ["department" => $queryGetDept, "designation" => $queryGetDesignation, "location" => $queryGetLocation, "state" => $queryGetstate, "legalEntity" => $queryGetlegalentity];


            return  response()->json($getsalary);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error fetching the dropdown value",
                "data" => $e,
            ]);
        }
    }

    public function SalAdvSettingsTable($department_id, $designation, $work_location, $client_name)
    {

        try {

            $select_employee = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->join('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                ->join('vmt_client_master', 'vmt_client_master.id', '=', 'users.client_id')
                ->where('process', '<>', 'S2 Admin')
                ->select(
                    'users.name',
                    'users.user_code',
                    'vmt_department.name as department_name',
                    'vmt_employee_office_details.designation',
                    'vmt_employee_office_details.work_location',
                    'vmt_client_master.client_name',
                );

            if (!empty($department_id)) {
                $select_employee = $select_employee->where('department_id', $department_id);
            }
            if (!empty($designation)) {
                $select_employee = $select_employee->where('designation', $designation);
            }
            if (!empty($work_location)) {
                $select_employee = $select_employee->where('work_location', $work_location);
            }
            if (!empty($client_name)) {
                $select_employee = $select_employee->where('client_id', $client_name);
            }

            return $select_employee->get();
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error fetching the employee",
                "data" => $e,
            ]);
        }
    }


    public function SalAdvShowEmployeeView()
    {

        try {

            $current_user_id = auth()->user()->id;
            // dd($current_user_id);

            $employee_user_id = VmtEmpAssignSalaryAdvSettings::where('user_id', $current_user_id)->first();


            if (isset($employee_user_id)) {

                $emp_compensatory = Compensatory::where('user_id', $current_user_id)->first();

                $employee_salary_adv = VmtSalaryAdvSettings::join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.salary_adv_id', '=', 'vmt_salary_adv_setting.id')
                    ->where('vmt_emp_assign_salary_adv_setting.user_id', $current_user_id)->first();


                $calculatevalue = ($emp_compensatory->net_income) * ($employee_salary_adv->percent_salary_adv) / 100;


                $multiple_months = array();
                for ($i = 1; $i <= $employee_salary_adv->deduction_period_of_months; $i++) {

                    $repayment_months = Carbon::now()->addMonths($i)->format('Y-m-d');

                    array_push($multiple_months, $repayment_months);
                }

                // dd( $repayment_months);

                $salary_adv['your_monthly_income'] = $emp_compensatory->net_income;
                $salary_adv['max_eligible_amount'] = $calculatevalue;
                $salary_adv['Repayment_date'] = $multiple_months;
                $salary_adv['eligible'] = "0";
                $salary_adv['percent_salary_amt'] = $employee_salary_adv->percent_salary_adv;

                // dd($salary_adv);

                return response()->json($salary_adv);
            } else {

                $salary_adv['eligible'] = "1";
                return response()->json($salary_adv);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error fetching the employee ",
                "data" => $e,
            ]);
        }
    }

    public function SalAdvEmpSaveSalaryAmt($mxe, $ra, $repdate, $reason)
    {

        try {

            $current_user_id = auth()->user()->id;

            $employee_user_id = VmtEmpAssignSalaryAdvSettings::where('user_id', $current_user_id)->first();

            $EmpApplySalaryAmt = new VmtEmpSalAdvDetails;
            $EmpApplySalaryAmt->vmt_emp_assign_salary_adv_id = $employee_user_id->id;
            $EmpApplySalaryAmt->eligible_amount = $mxe;
            $EmpApplySalaryAmt->borrowed_amount = $ra;
            $EmpApplySalaryAmt->requested_date  = date('Y-m-d');
            $EmpApplySalaryAmt->dedction_date  = $repdate;
            $EmpApplySalaryAmt->reason  = $reason;
            $EmpApplySalaryAmt->approver_flow  = "0";
            $EmpApplySalaryAmt->sal_adv_crd_sts = "0";
            $EmpApplySalaryAmt->save();

            return response()->json([
                'status' => 'save successfully',
                'message' => 'Done',

            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "",
                "data" => $e,
            ]);
        }
    }

    public function saveSalaryAdvanceSettings($eligibleEmployee, $perOfSalAdvance, $cusPerOfSalAdvance, $deductMethod, $cusDeductMethod, $approvalflow)
    {
        $json_approvalflow = json_encode($approvalflow);
        try {

            $saveSettingSALaryAdv = new VmtSalaryAdvSettings;
            $saveSettingSALaryAdv->percent_salary_adv = $perOfSalAdvance ?? $cusPerOfSalAdvance;
            $saveSettingSALaryAdv->deduction_period_of_months = $deductMethod ?? $cusDeductMethod;
            $saveSettingSALaryAdv->approver_flow = $json_approvalflow;
            $saveSettingSALaryAdv->save();

            $SalaryAdvSettings = $saveSettingSALaryAdv;

            foreach ($eligibleEmployee as $employee) {

                $user_id =  User::where('user_code', $employee['user_code'])->first();

                $vmtEmpAssignSalaryAdvSettings = new VmtEmpAssignSalaryAdvSettings;
                $vmtEmpAssignSalaryAdvSettings->user_id = $user_id->id;
                $vmtEmpAssignSalaryAdvSettings->salary_adv_id = $SalaryAdvSettings->id;
                $vmtEmpAssignSalaryAdvSettings->active = "0";
                $vmtEmpAssignSalaryAdvSettings->save();
            }

            return response()->json([
                'status' => 'save successfully',
                'message' => 'Done',

            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "",
                "data" => $e,
            ]);
        }
    }

    // public function saveLoanWithInterestSettings($min_month_served, $loan_applicable_type, $percent_of_ctc, $max_loan_amount, $loan_amt_interest, $deduction_starting_months, $max_tenure_months, $approver_flow)
    // {

    //     $validator = Validator::make(
    //         $data = [
    //             'min_month_served' => $min_month_served,
    //             'loan_applicable_type' => $loan_applicable_type,
    //             'percent_of_ctc' => $percent_of_ctc,
    //             "max_loan_amount" => $max_loan_amount,
    //             "loan_amt_interest" => $loan_amt_interest,
    //             "deduction_starting_months" => $deduction_starting_months,
    //             "max_tenure_months" => $max_tenure_months,
    //             "approver_flow" => $approver_flow,
    //         ],
    //         $rules = [

    //             'min_month_served' => 'required',
    //             'loan_applicable_type' => 'required',
    //             'percent_of_ctc' => 'required',
    //             "max_loan_amount" => 'required',
    //             "loan_amt_interest" => "required",
    //             "deduction_starting_months" => "required",
    //             "max_tenure_months" => "required",
    //             "approver_flow" => "required",

    //         ],
    //         $messages = [
    //             "required" => "Field :attribute is missing",
    //             "exists" => "Field :attribute is invalid"
    //         ]
    //     );


    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'failure',
    //             'message' => $validator->errors()->all()
    //         ]);
    //     }

    //     try {

    //         $save_loan_setting_data = new VmtLoanInterestSettings;
    //         $save_loan_setting_data->client_id = auth()->user()->client_id;
    //         $save_loan_setting_data->loan_applicable_type = $loan_applicable_type;
    //         if ($loan_applicable_type == 'fixed') {
    //             $save_loan_setting_data->min_month_served = $min_month_served;
    //             $save_loan_setting_data->percent_of_ctc = $percent_of_ctc;
    //         } else if ($loan_applicable_type == 'percent') {
    //             $save_loan_setting_data->max_loan_amount = $max_loan_amount;
    //         }
    //         $save_loan_setting_data->loan_amt_interest = $loan_amt_interest;
    //         $save_loan_setting_data->deduction_starting_months = $deduction_starting_months;
    //         $save_loan_setting_data->max_tenure_months = $max_tenure_months;
    //         $save_loan_setting_data->approver_flow = $approver_flow;
    //         $save_loan_setting_data->save();

    //         return response()->json([
    //             "status" => "success",
    //             "message" => "loan setting data saved successfully",
    //             "data" => '',
    //         ]);
    //     } catch (\Exception $e) {

    //         //dd("Error :: uploadDocument() ".$e);

    //         return response()->json([
    //             "status" => "failure",
    //             "message" => "Failed to save loan setting",
    //             "data" => $e->getMessage(),
    //         ]);
    //     }
    // }

    public function saveIntersetAndIntersetFreeLoanSettings(
        $loan_type,
        $client_id,
        $loan_applicable_type,
        $min_month_served,
        $max_loan_limit,
        $percent_of_ctc,
        $loan_amt_interest,
        $deduction_starting_months,
        $max_tenure_months,
        $approver_flow
    ) {

        $validator = Validator::make(
            $data = [
                "loan_type" => $loan_type,
                "client_id" => $client_id,
                'loan_applicable_type' => $loan_applicable_type,
                "min_month_served" => $min_month_served,
                "max_loan_limit" => $max_loan_limit,
                "percent_of_ctc" => $percent_of_ctc,
                "loan_amt_interest" => $loan_amt_interest,
                "deduction_starting_months" => $deduction_starting_months,
                "max_tenure_months" => $max_tenure_months,
                "approver_flow" => $approver_flow
            ],
            $rules = [
                "loan_type" => "required",
                "client_id" => "required",
                'loan_applicable_type' => "required",
                "min_month_served" => "required",
                "deduction_starting_months" => "required",
                "max_tenure_months" => "required",
                "approver_flow" => "required"
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
        $approver_flow = json_encode($approver_flow);
        $client_id = explode(",", $client_id);
        dd($approver_flow);
        foreach ($client_id as $single_cl_id) {
            try {
                if ($loan_type == 'InterestFreeLoan') {
                    $setting_for_loan = new VmtInterestFreeLoanSettings;
                } else if ($loan_type = 'InterestWithLoan') {
                    $setting_for_loan = new VmtLoanInterestSettings;
                    $setting_for_loan->loan_amt_interest = $loan_amt_interest;
                } else {
                    return response()->json([
                        'status' => 'failure',
                        'message' => 'Undefined Loan type'
                    ]);
                }

                $setting_for_loan->client_id = $single_cl_id;
                $setting_for_loan->loan_applicable_type = $loan_applicable_type;
                if ($loan_applicable_type == 'percnt') {
                    $setting_for_loan->percent_of_ctc = $percent_of_ctc;
                } else if ($loan_applicable_type == 'fixed') {
                    $setting_for_loan->max_loan_amount = $max_loan_limit;
                }
                $setting_for_loan->min_month_served = $min_month_served;
                $setting_for_loan->deduction_starting_months = $deduction_starting_months;
                $setting_for_loan->max_tenure_months = $max_tenure_months;
                $setting_for_loan->approver_flow = $approver_flow;
                $setting_for_loan->active = 1;
                $setting_for_loan->save();
            } catch (Exception $e) {
                return response()->json([
                    "status" => "failure",
                    "message" => "Failed to save interest Free loan setting",
                    "data" => $e->getMessage(),
                ]);
            }
        }
        return response()->json([
            'status' => 'failure',
            'message' => "Interest free loan setiings Saved Sucessfully"
        ]);
    }

    public function  showInterestFreeLoanEmployeeinfo()
    {
    }

    public function showEligibleInterestFreeLoanDetails($loan_type)
    {
        $validator = Validator::make(
            $data = [
                "loan_type" => $loan_type,
            ],
            $rules = [
                "loan_type" => "required",
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
        $user_id = auth()->user()->id;
        $doj = Carbon::parse(VmtEmployee::where('userid', $user_id)->first()->doj);
        $last_payroll_month = VmtEmployeePayroll::join('vmt_payroll', 'vmt_payroll.id', '=', 'vmt_emp_payroll.payroll_id')
            ->where('user_id', $user_id)->orderBy('vmt_payroll.payroll_date', 'DESC')->first()->payroll_date;
        // dd( $last_payroll_month);
        $avaliable_int_loans = VmtInterestFreeLoanSettings::where('client_id', sessionGetSelectedClientid())
            ->where('active', 1)->orderBy('min_month_served', 'DESC')->get();
        if ($loan_type == 'InterestWithLoan') {
            $avaliable_int_loans = VmtLoanInterestSettings::where('client_id', sessionGetSelectedClientid())
                ->where('active', 1)->orderBy('min_month_served', 'DESC')->get();
        } else if ($loan_type == 'InterestFreeLoan') {
            $avaliable_int_loans = VmtInterestFreeLoanSettings::where('client_id', sessionGetSelectedClientid())
                ->where('active', 1)->orderBy('min_month_served', 'DESC')->get();
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Undefined Loan type'
            ]);
        }
        $exp_month = $doj->diffInMonths(Carbon::now());
        //dd(36);
        // dd($avaliable_int_loans);
        foreach ($avaliable_int_loans as $single_record) {

            if ($single_record->min_month_served <= $exp_month) {
                if ($single_record->loan_applicable_type == 'fixed') {
                    $applicable_loan_info['max_loan_amount'] = $single_record->max_loan_amount;
                } else if ($single_record->loan_applicable_type == 'percnt') {
                    $yearly_ctc = Compensatory::where('user_id', $user_id)->first()->cic * 12;
                    $applicable_loan_info['max_loan_amount'] =   $yearly_ctc * $single_record->percent_of_ctc / 100;
                }
                $applicable_loan_info['max_tenure_months'] = $single_record->max_tenure_months;
                $applicable_loan_info['deduction_starting_month'] = Carbon::parse($last_payroll_month)
                    ->addMonth($single_record->deduction_starting_months)->format('Y-m-d');
                if ($loan_type == 'InterestWithLoan') {
                    $applicable_loan_info['loan_amt_interest'] = $single_record->loan_amt_interest;
                }
                return response()->json($applicable_loan_info);
            };
        }
        return null;
    }

    public function SalAdvApproverFlow()
    {

        $user_id = auth()->user()->id;

        $employee_salary_adv = VmtSalaryAdvSettings::join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.salary_adv_id', '=', 'vmt_salary_adv_setting.id')
            // ->leftjoin('vmt_emp_sal_adv_details','vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id','=','vmt_emp_assign_salary_adv_setting.id')

            ->get()->toArray();

        // dd($employee_salary_adv);



        foreach ($employee_salary_adv as $single_apprflow) {

            //    echo $single_apprflow['approver_flow'] ."<br>";
            $approver_flow  = json_decode(($single_apprflow['approver_flow']), true);

            foreach ($approver_flow as $approver_order) {
                // dd($approver_order['order']);


                if ($approver_order['order'] == 1) {
                    if ($approver_order['approver'] == "HR") {

                        $simma = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.user_id', '=', 'users.id')
                            ->join('vmt_emp_sal_adv_details', 'vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id', '=', 'vmt_emp_assign_salary_adv_setting.id')->get();

                        $res = array();
                        foreach ($simma as $simma1) {
                            if ($simma1['hr_id'] == $user_id) {

                                if ($simma1['approv_hr'] == "0") {


                                    array_push($res, $simma1);
                                    dd($res);
                                }
                            };
                        }
                    }

                    if ($approver_order['approver'] == "Finance Admin") {

                        $simma = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.user_id', '=', 'users.id')
                            ->join('vmt_emp_sal_adv_details', 'vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id', '=', 'vmt_emp_assign_salary_adv_setting.id')->get();

                        $res = array();
                        foreach ($simma as $simma1) {
                            if ($simma1['finance_admin_id'] == $user_id) {
                                if ($simma1['approv_finance_admin'] == "0") {

                                    array_push($res, $simma1);
                                    dd($res);
                                }
                            }
                        }
                        // dd ($res);
                    }
                    if ($approver_order['approver'] == "Line Manager") {
                        dd("line manager");
                    }
                }

                if ($approver_order['order'] == 2) {
                    if ($approver_order['approver'] == "HR") {
                        $simma = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.user_id', '=', 'users.id')
                            ->join('vmt_emp_sal_adv_details', 'vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id', '=', 'vmt_emp_assign_salary_adv_setting.id')->get();

                        $res = array();
                        foreach ($simma as $simma1) {
                            if ($simma1['hr_id'] == $user_id) {
                                if ($simma1['approv_hr'] == "0") {


                                    array_push($res, $simma1);
                                }
                            }
                        }
                    }

                    if ($approver_order['approver'] == "Finance Admin") {
                        $simma = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.user_id', '=', 'users.id')
                            ->join('vmt_emp_sal_adv_details', 'vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id', '=', 'vmt_emp_assign_salary_adv_setting.id')->get();

                        $res = array();
                        foreach ($simma as $simma1) {
                            if ($simma1['finance_admin_id'] == $user_id) {
                                if ($simma1['approv_finance_admin'] == "0") {


                                    array_push($res, $simma1);
                                }
                            }
                        }
                    }
                    if ($approver_order['approver'] == "Line Manager") {
                        dd("line manager");
                    }
                }
                dd($res);
                if ($approver_order['order'] == 3) {
                    if ($approver_order['approver'] == "HR") {
                        $simma = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.user_id', '=', 'users.id')
                            ->join('vmt_emp_sal_adv_details', 'vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id', '=', 'vmt_emp_assign_salary_adv_setting.id')->get();

                        $res = array();
                        foreach ($simma as $simma1) {
                            if ($simma1['hr_id'] == $user_id) {
                                if ($simma1['approv_hr'] == "0") {

                                    array_push($res, $simma1);
                                }
                            }
                        }
                    }
                    if ($approver_order['approver'] == "Finance Admin") {
                        $simma = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                            ->join('vmt_emp_assign_salary_adv_setting', 'vmt_emp_assign_salary_adv_setting.user_id', '=', 'users.id')
                            ->join('vmt_emp_sal_adv_details', 'vmt_emp_sal_adv_details.vmt_emp_assign_salary_adv_id', '=', 'vmt_emp_assign_salary_adv_setting.id')->get();

                        $res = array();
                        foreach ($simma as $simma1) {
                            if ($simma1['finance_admin_id'] == $user_id) {
                                if ($simma1['approv_finance_admin'] == "0") {


                                    array_push($res, $simma1);
                                }
                            }
                        }
                    }
                    if ($approver_order['approver'] == "Line Manager") {
                        dd("line manager");
                    }
                }
                dd($res);
            }
        }
    }

    public function applyLoan(
        $loan_type,
        $vmt_int_free_loan_id,
        $borrowed_amount,
        $interest_rate,
        $deduction_starting_month,
        $deduction_ending_month,
        $emi_per_month,
        $reason
    ) {
        $validator = Validator::make(
            $data = [
                "loan_type" => $loan_type,
                "vmt_int_free_loan_id"=>$vmt_int_free_loan_id,
                "borrowed_amount"=> $borrowed_amount,
                "deduction_starting_month"=>  $deduction_starting_month,
                "deduction_ending_month"=>$deduction_ending_month,
                "emi_per_month"=> $emi_per_month,
                "reason"=> $reason,
                "interest_rate"=>$interest_rate
            ],
            $rules = [
                "loan_type" => "required",
                "vmt_int_free_loan_id"=>"required",
                "borrowed_amount"=> "required",
                "deduction_starting_month"=> "required",
                "deduction_ending_month"=>"required",
                "emi_per_month"=> "required",
                "reason"=> "required",
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
    }
}
