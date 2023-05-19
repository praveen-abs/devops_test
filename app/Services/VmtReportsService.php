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
            array_push($response,$singleEmployee->toArray());


        }
      return $response;

    }
}
