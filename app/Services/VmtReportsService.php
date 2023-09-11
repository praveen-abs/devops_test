<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Department;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtMaritalStatus;
use App\Models\vmt_employee_details;
use App\Models\VmtBloodGroup;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtOrgTimePeriod;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class VmtReportsservice
{
    public function fetchAnnualEarnedDetails($start_date, $end_date)
    {
        $response = array();
        $employees = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
            ->where('is_ssa', 0)->whereDate('doj', '<=', $end_date)->get(['users.id', 'user_code', 'name', 'doj', 'dob']);
        foreach ($employees as $singleEmployee) {
            $payslip_for_single_employee = VmtEmployeePaySlip::where('user_id', $singleEmployee->id)
                ->whereBetween('PAYROLL_MONTH', [$start_date, $end_date])->get([
                    'Earned_BASIC', 'BASIC_ARREAR', 'Earned_HRA', 'HRA_ARREAR', 'Earned_CHILD_EDU_ALLOWANCE',
                    'CHILD_EDU_ALLOWANCE_ARREAR', 'Earned_SPL_ALW', 'SPL_ALW_ARREAR', 'Overtime', 'TOTAL_EARNED_GROSS', 'PF_WAGES', 'PF_WAGES_ARREAR_EPFR', 'EPFR', 'EPFR_ARREAR',
                    'EDLI_CHARGES', 'EDLI_CHARGES_ARREARS', 'PF_ADMIN_CHARGES', 'PF_ADMIN_CHARGES_ARREARS', 'EMPLOYER_ESI', 'Employer_LWF', 'CTC', 'EPF_EE', 'EPF_EE_ARREAR', 'EMPLOYEE_ESIC',
                    'PROF_TAX', 'income_tax', 'SAL_ADV', 'CANTEEN_DEDN', 'OTHER_DEDUC', 'LWF', 'TOTAL_DEDUCTIONS', 'NET_TAKE_HOME', 'earned_stats_bonus', 'earned_stats_arrear', 'travel_conveyance', 'other_earnings'
                ]);
            foreach ($payslip_for_single_employee as $single_payslip) {
                $single_payslip = $single_payslip->toArray();
                foreach ($single_payslip as $key => $value) {
                    $singleEmployee[$key] = $singleEmployee[$key] + (int)$value;
                    //$singleEmployee->$key=$value;
                }
            }
            array_push($response, $singleEmployee->toArray());
        }
        return $response;
    }
    public function getEmployeesCTCDetails($type, $client_id, $active_status, $department_id,  $date_req)
    {

        $validator = Validator::make(
            $data = [
                'client_id' => $client_id,
                'type' => $type,
                'active_status' => $active_status,
                'department_id' => $department_id,
                'date' => $date_req,
            ],
            $rules = [
                'client_id' => 'nullable|exists:vmt_client_master,id',
                'type' => 'nullable',
                'active_status' => 'nullable',
                'department_id' => 'nullable|exists:vmt_department,id',
                'date' => 'nullable'
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

            if (empty($client_id)) {
                $client_id = VmtClientMaster::pluck('id');
            } else {
                $client_id = VmtClientMaster::where('id', $client_id)->pluck('id');
            }


            if (empty($active_status)) {
                $active_status = ['1', '0', '-1'];
            } else {
                $active_status = [$active_status];
            }
            if (empty($date_req)) {
                $date_req = Carbon::now()->format('Y-m-d');
            }

            if (empty($department_id)) {
                $get_department = Department::pluck('id');
            } else {
                $get_department = [$department_id];
            }


            $date = Carbon::now()->format('M-Y');
            // $Category = 'All';
            $processed_array = array();
            $response = array();
            $headings = array();
            $temp_ar = array();
            $headers = array();

            $emp_ctc_detail = user::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->join('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                ->join('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
                ->join('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
                ->where('vmt_employee_details.doj', '<', $date_req)
                ->whereIn('users.client_id', $client_id)
                ->whereIn('users.active', $active_status)
                ->whereIn('vmt_employee_office_details.department_id', $get_department)
                ->get();

            foreach ($emp_ctc_detail as $singleemployeedata) {

                $temp_ar['Employee Code'] = $singleemployeedata->user_code;
                $temp_ar['Employee Name'] = $singleemployeedata->name;
                $temp_ar['Gender'] = $singleemployeedata->Gender;
                $temp_ar['Designation'] = $singleemployeedata->designation;
                if ($singleemployeedata->active == 1) {
                    $temp_ar['Employee Status'] = "Active";
                } else if ($singleemployeedata->active == -1) {
                    $temp_ar['Employee Status'] = "Exit";
                } else if ($singleemployeedata->active == 0) {
                    $temp_ar['Employee Status'] = 'Not Yet Active';
                }

                $temp_ar['DOJ (D-M-Y)'] = carbon::parse($singleemployeedata->doj)->format('d-M-Y');

                if ($type == 'detailed') {
                    $temp_ar['DOB (D-M-Y)'] = carbon::parse($singleemployeedata->dob)->format('d-M-Y');
                    $temp_ar['PAN Number'] =  $singleemployeedata->pan_number;
                    $temp_ar['Aadhar Number'] =  $singleemployeedata->aadhar_number;
                    $temp_ar['Mobile Number'] =  $singleemployeedata->mobile_number;
                    $temp_ar['Email ID'] =  $singleemployeedata->email;
                    $temp_ar['UAN NO'] =  $singleemployeedata->uan_number;
                    $temp_ar['EPF Number'] =  $singleemployeedata->epf_number;
                    $temp_ar['ESIC Number'] =  $singleemployeedata->esic_number;
                    $temp_ar['Bank Name'] =  $singleemployeedata->bank_name;
                    $temp_ar['Bank Account No'] =  $singleemployeedata->bank_account_number;
                    $temp_ar['IFSC Code'] =  $singleemployeedata->bank_ifsc_code;
                }

                $temp_ar['Basic'] =  $singleemployeedata->basic;
                $temp_ar['House Rent Allowance'] =  $singleemployeedata->hra;
                $temp_ar['Special Allowance'] =  $singleemployeedata->special_allowance;
                $temp_ar['Fixed Gross'] =  $singleemployeedata->gross;
                $temp_ar['EPFER'] =  $singleemployeedata->epf_employer_contribution;
                $temp_ar['EDLI Charges'] =  $singleemployeedata->epf_employer_contribution;
                $temp_ar['PF ADMIN Charges'] =  $singleemployeedata->pf_admin_charges;
                $temp_ar['ESICER'] =  $singleemployeedata->esic_employer_contribution;
                $temp_ar['Insurance'] =  $singleemployeedata->insurance;
                $temp_ar['LWFER'] =  $singleemployeedata->labour_welfare_fund;
                $temp_ar['CTC'] =  $singleemployeedata->cic;
                $temp_ar['EPFEE'] =  $singleemployeedata->epf_employee;
                $temp_ar['ESICEE'] =  $singleemployeedata->esic_employee;
                $temp_ar['Income Tax'] =  $singleemployeedata->Income_tax;
                $temp_ar['Professional Tax'] =  $singleemployeedata->professional_tax;
                $temp_ar['LWFEE '] =  $singleemployeedata->lwfee;
                $temp_ar['Total Deduction'] =   (int)$temp_ar['EPFEE'] + (int)$temp_ar['ESICEE'] +  (int)$temp_ar['Income Tax'] + (int)$temp_ar['Professional Tax'] + (int)$temp_ar['LWFEE '];
                $temp_ar['NET Pay '] =  $singleemployeedata->net_income;
                array_push($processed_array, $temp_ar);
            }

            foreach ($processed_array[0] as $key => $value) {
                $headings = $key;
                array_push($headers, $headings);
            }

            $response['headers'] =   $headers;
            $response['rows'] = $processed_array;


            return $response;
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while fetching data',
                'error' =>  $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];

            try {


                if (empty($client_id)) {
                    $client_id = VmtClientMaster::pluck('id');
                } else {
                    $client_id = VmtClientMaster::where('id', $client_id)->pluck('id');
                }


                if (empty($active_status)) {
                    $active_status = ['1', '0', '-1'];
                } else {
                    $active_status = [$active_status];
                }

                // if(empty($department_id)){
                //     $get_department = Department::pluck('id');
                // }else{
                //     $get_department = [$department_id];
                // }


                $date = Carbon::now()->format('M-Y');
                $Category = 'All';
                $processed_array = array();
                $response = array();
                $headings = array();
                $temp_ar = array();
                $headers = array();

                $emp_ctc_detail = user::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                    ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                    ->join('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                    ->join('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
                    ->join('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
                    // ->where('vmt_employee_details.doj','<',$date)
                    ->whereIn('users.client_id', $client_id);
                // ->whereIn('users.active',$active_status)
                //  dd($department_id != null);
                if ($department_id != null) {
                    $emp_ctc_detail  =   $emp_ctc_detail->where('vmt_employee_office_details.department_id', $department_id);
                }
                $emp_ctc_detail  =   $emp_ctc_detail->get();
                //  dd( $emp_ctc_detail [0]);
                foreach ($emp_ctc_detail as $singleemployeedata) {

                    $temp_ar['Employee Code'] = $singleemployeedata->user_code;
                    $temp_ar['Employee Name'] = $singleemployeedata->name;
                    $temp_ar['Gender'] = $singleemployeedata->Gender;
                    $temp_ar['Designation'] = $singleemployeedata->designation;
                    if ($singleemployeedata->active == 1) {
                        $temp_ar['Employee Status'] = "Active";
                    } else if ($singleemployeedata->active == -1) {
                        $temp_ar['Employee Status'] = "Exit";
                    } else if ($singleemployeedata->active == 0) {
                        $temp_ar['Employee Status'] = 'Not Yet Active';
                    }

                    $temp_ar['DOJ (DD/MM/YYYY)'] = carbon::parse($singleemployeedata->doj)->format('d-M-Y');

                    if ($type == 'detailed') {
                        $temp_ar['DOB (DD/MM/YYYY)'] = carbon::parse($singleemployeedata->dob)->format('d-M-Y');
                        $temp_ar['PAN Number'] =  $singleemployeedata->pan_number;
                        $temp_ar['Aadhar Number'] =  $singleemployeedata->aadhar_number;
                        $temp_ar['Mobile Number'] =  $singleemployeedata->mobile_number;
                        $temp_ar['Email ID'] =  $singleemployeedata->email;
                        $temp_ar['UAN NO'] =  $singleemployeedata->uan_number;
                        $temp_ar['EPF Number'] =  $singleemployeedata->epf_number;
                        $temp_ar['ESIC Number'] =  $singleemployeedata->esic_number;
                        $temp_ar['Bank Name'] =  $singleemployeedata->bank_name;
                        $temp_ar['Bank Account No'] =  $singleemployeedata->bank_account_number;
                        $temp_ar['IFSC Code'] =  $singleemployeedata->bank_ifsc_code;
                    }

                    $temp_ar['Basic'] =  $singleemployeedata->basic;
                    $temp_ar['House Rent Allowance'] =  $singleemployeedata->hra;
                    $temp_ar['Special Allowance'] =  $singleemployeedata->special_allowance;
                    $temp_ar['Fixed Gross'] =  $singleemployeedata->gross;
                    $temp_ar['EPFER'] =  $singleemployeedata->epf_employer_contribution;
                    $temp_ar['EDLI Charges'] =  $singleemployeedata->epf_employer_contribution;
                    $temp_ar['PF ADMIN Charges'] =  $singleemployeedata->pf_admin_charges;
                    $temp_ar['ESICER'] =  $singleemployeedata->esic_employer_contribution;
                    $temp_ar['Insurance'] =  $singleemployeedata->insurance;
                    $temp_ar['LWFER'] =  $singleemployeedata->labour_welfare_fund;
                    $temp_ar['CTC'] =  $singleemployeedata->cic;
                    $temp_ar['EPFEE'] =  $singleemployeedata->epf_employee;
                    $temp_ar['ESICEE'] =  $singleemployeedata->esic_employee;
                    $temp_ar['Income Tax'] =  $singleemployeedata->Income_tax;
                    $temp_ar['Professional Tax'] =  $singleemployeedata->professional_tax;
                    $temp_ar['LWFEE '] =  $singleemployeedata->lwfee;
                    $temp_ar['Total Deduction'] =   (int)$temp_ar['EPFEE'] + (int)$temp_ar['ESICEE'] +  (int)$temp_ar['Income Tax'] + (int)$temp_ar['Professional Tax'] + (int)$temp_ar['LWFEE '];
                    $temp_ar['NET Pay '] =  $singleemployeedata->net_income;
                    array_push($processed_array, $temp_ar);
                }

                foreach ($processed_array[0] as $key => $value) {
                    $headings = $key;
                    array_push($headers, $headings);
                }

                $response['headers'] =   $headers;
                $response['rows'] = $processed_array;


                return $response;
            } catch (\Exception $e) {
                $response = [
                    'status' => 'failure',
                    'message' => 'Error while fetching data',
                    'error' =>  $e->getMessage(),
                    'error_verbose' => $e->getTraceAsString()
                ];
            }
        }
    }

    public function getEmployeesMasterDetails($type, $client_id, $active_status, $department_id)

    {


        $validator = Validator::make(
            $data = [
                'client_id' => $client_id,
                'type' => $type,
                'active_status' => $active_status,
                'department_id' => $department_id,
            ],
            $rules = [
                'client_id' => 'nullable|exists:vmt_client_master,id',
                'type' => 'nullable',
                'active_status' => 'nullable',
                'department_id' => 'nullable|exists:vmt_department,id',
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

            if (empty($client_id)) {
                $client_id = VmtClientMaster::pluck('id');
            } else {
                $client_id = VmtClientMaster::where('id', $client_id)->pluck('id');
            }


            if (empty($active_status)) {
                $active_status = ['1', '0', '-1'];
            } else {
                $active_status = [$active_status];
            }

            if (empty($department_id)) {
                $get_department = Department::pluck('id');
            } else {
                $get_department = [$department_id];
            }

            $date = Carbon::now()->format('M-Y');
            //$client_id = array(1);
            $Category = 'All';
            $response = array();
            $headings = array();
            $type = '';
            $temp_ar = array();
            $emp_master_detail = user::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                ->rightJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'users.id')
                ->leftJoin('vmt_banks', 'vmt_banks.id', '=', 'vmt_employee_details.bank_id')
                ->leftJoin('vmt_department', 'vmt_department.id', '=', 'vmt_employee_office_details.department_id')
                ->whereIn('users.client_id', $client_id)
               // ->whereIn('vmt_employee_office_details.department_id', $get_department)
                ->get();
         //   dd($emp_master_detail);

            foreach ($emp_master_detail as $single_details) {
                $temp_ar['Employee Code'] = $single_details->user_code;
                $temp_ar['Employee Name'] = $single_details->name;
                $temp_ar['Gender'] = $single_details->gender;
                $temp_ar['Designation'] = $single_details->designation;
                $temp_ar['DOB (D-M-Y)'] = Carbon::parse($single_details->dob)->format('d-M-Y');
                $temp_ar['DOJ (D-M-Y)'] = carbon::parse($single_details->doj)->format('d-M-Y');
                if ($single_details->active == 1) {
                    $temp_ar['Employee Status'] = "Active";
                } else if ($single_details->active == -1) {
                    $temp_ar['Employee Status'] = "Exit";
                } else if ($single_details->active == 0) {
                    $temp_ar['Employee Status'] = 'Not Yet Active';
                }

                $temp_ar['Department'] = Department::where('id', $single_details->department_id)->first()->name ?? '';
                $temp_ar['Process'] = $single_details->process;
                $temp_ar['Marital Status'] = VmtMaritalStatus::where('id', $single_details->marital_status_id)->first()->name ?? '';
                $temp_ar['PAN Number'] = $single_details->pan_number;
                $temp_ar['Aadhar Number'] = $single_details->aadhar_number;
                $temp_ar['Mobile Number'] = $single_details->mobile_number;
                $temp_ar['Official Email'] = $single_details->officical_mail;
                $temp_ar['UAN Number'] = $single_details->uan_number;
                $temp_ar['EPF Number'] = $single_details->epf_number;
                $temp_ar['ESIC Number'] = $single_details->esic_number;
                $temp_ar['Bank Name'] = $single_details->bank_name;
                $temp_ar['Bank Account No'] = $single_details->bank_account_number;
                $temp_ar['IFSC Code'] = $single_details->bank_ifsc_code;
                //for father mother detail
                $user_id = User::where('user_code', $single_details->user_code)->first()->id;
                $family_details =  VmtEmployeeFamilyDetails::where('user_id', $user_id)->get(['name', 'relationship']);
                foreach ($family_details as $singleFamilyDetails) {
                    $temp_ar[$singleFamilyDetails->relationship . " Name"] = $singleFamilyDetails->name;
                }
                $temp_ar['Present Address'] = $single_details->present_address;
                $temp_ar['Permanent Address'] = $single_details->permanent_address;
                $temp_ar['Basic'] = $single_details->basic;
                $temp_ar['House Rent Allowance'] = $single_details->hra;
                $temp_ar['Special Allowance'] = $single_details->special_allowance;
                $temp_ar['Fixed Gross'] = $single_details->gross;
                $temp_ar['EPFER'] = $single_details->epf_employer_contribution;
                $temp_ar['EDLI Charges'] = $single_details->edli_charges;
                $temp_ar['PF ADMIN Charges'] = $single_details->pf_admin_charges;
                $temp_ar['ESICR'] = $single_details->esic_employer_contribution;
                $temp_ar['Insurance'] = $single_details->insurance;
                $temp_ar['LWFER'] = $single_details->labour_welfare_fund;
                $temp_ar['CTC'] = $single_details->cic;
                $temp_ar['EPFEE'] = $single_details->epf_employee;
                $temp_ar['ESICEE'] = $single_details->esic_employee;
                $temp_ar['Income Tax'] = $single_details->Income_tax;
                $temp_ar['Professional Tax'] = $single_details->professional_tax;
                $temp_ar['LWFEE'] = $single_details->lwfee;
                $temp_ar['Total Deduction'] =    (int)$temp_ar['EPFEE'] + (int)$temp_ar['ESICEE'] +  (int)$temp_ar['Income Tax'] + (int)$temp_ar['Professional Tax'] + (int)$temp_ar['LWFEE'];
                $temp_ar['NET Pay '] =  $single_details->net_income;








                // $temp_ar['Office Mobile Number'] = $single_details->official_mobile;
                // $temp_ar['Last Working Day (D-M-Y)'] = carbon::parse($single_details->dol)->format('d-M-Y');
                // $temp_ar['Business Unit'] = $single_details->process;
                // $temp_ar['Location'] = $single_details->work_location;
                // $temp_ar['Worker Type'] = $single_details->work_location;
                // $temp_ar['Reporting Managers Employee Code'] = $single_details->l1_manager_code;
                // $temp_ar['Marriage Date (D-M-Y)'] = $single_details->wedding_date;
                // $temp_ar['Blood Group'] = VmtBloodGroup::where('id', $single_details->blood_group_id)->first()->name ?? '';
                // $temp_ar['Salary Payment Mode'] = $single_details->;
                // $temp_ar['IFSC Code'] = $single_details->bank_ifsc_code;
                // $temp_ar['NATIONALITY'] = $single_details->nationality;
                // $temp_ar['NATIONALITY'] = $single_details->nationality;
                // $temp_ar['Dearness Allowance'] = $single_details->dearness_allowance;
                // $temp_ar['Child Education Allowance'] = $single_details->child_education_allowance;
                // $temp_ar['Communication Allowance'] = $single_details->communication_allowance;
                // $temp_ar['Food Allowance'] = $single_details->food_allowance;
                // $temp_ar['Travel Reimbursement (LTA)'] = $single_details->lta;
                // $temp_ar['STATUTORY BONUS'] = $single_details->Statutory_bonus;
                // $temp_ar['Other Allowance'] = $single_details->other_allowance;
                // $temp_ar['Physically Handicapped'] = $single_details->physically_challenged;
                // $temp_ar['Driver Salary'] = $single_details->driver_salary;
                // $temp_ar['Employer EPF'] = $single_details->washing_allowance; 
                // $temp_ar['Washing Allowance'] = $single_details->washing_allowance; 
                // if ($single_details->esic_number =='NOT APPLICABLE' ) {
                //     $temp_ar['ESI Eligible'] = "Yes";
                // } else if ($single_details->esic_number != 'NOT APPLICABLE') {
                //     $temp_ar['ESI Eligible'] = "No";


                // $temp_ar['House Rent Allowance'] = $single_details->hra;
                // $temp_ar['Special Allowance'] = $single_details->special_allowance;
                // $temp_ar['Employer EPF'] = $single_details->epf_employer_contribution; 
                // $temp_ar['Employer ESIC	'] = $single_details->esic_employer_contribution; 

                //Get family details

                array_push($response, $temp_ar);
                unset($temp_ar);
            }
            return $response;
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while fetching data',
                'error' =>  $e->getMessage(),
                'error_verbose' => $e->getTraceAsString()
            ];
        }
    }
}
