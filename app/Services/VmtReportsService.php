<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtClientMaster;
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
    public function getEmployeesCTCDetails($type,$client_id)
    {

        $validator = Validator::make(
            $data = [
                'client_id' => $client_id,
                'type' => $type,
            ],
            $rules = [
                'client_id' => 'nullable|exists:vmt_client_master,id',
                'type' => 'nullable',
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

        try{
        
                if(empty($client_id)){
                    $client_id = VmtClientMaster::pluck('id');
                }else{
                    $client_id = VmtClientMaster::where('id', $client_id)->get(['id']);
                }
             

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
                    ->whereIn('users.client_id',$client_id)
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

            }
            catch(\Exception $e){
                $response = [
                    'status' => 'failure',
                    'message' => 'Error while fetching data',
                    'error' =>  $e->getMessage(),
                    'error_verbose' => $e->getTraceAsString()
                ];
    
            }
      
    }
  
   
}
