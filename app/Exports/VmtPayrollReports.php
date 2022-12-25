<?php

namespace App\Exports;

use App\Models\VmtEmployeePaySlip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtPayrollReports implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $payroll_month;

    function __construct($payroll_month)
    {
        $this->payroll_month = $payroll_month;
    }

    public function collection()
    {
        $query_payroll_data = VmtEmployeePaySlip::leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_employee_payslip.user_id')
            ->leftJoin('users', 'users.id', '=', 'vmt_employee_payslip.user_id')
            ->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_payslip.user_id')
            ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'vmt_employee_payslip.user_id')
            ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'vmt_employee_payslip.user_id')
            ->where('vmt_employee_payslip.PAYROLL_MONTH', $this->payroll_month)
            ->select('users.user_code',
                     'users.name',

                     'vmt_employee_office_details.DESIGNATION',
                     'vmt_employee_office_details.DEPARTMENT_ID',
                     'vmt_employee_details.PAN_Number',
                     'vmt_employee_details.Aadhar_Number',
                     'vmt_employee_details.bank_id',
                     'vmt_employee_details.bank_account_number',
                     'vmt_employee_details.bank_ifsc_code',

                     'vmt_employee_statutory_details.uan_number',
                     'vmt_employee_statutory_details.epf_number',
                     'vmt_employee_statutory_details.esic_number',

                     'vmt_employee_payslip.PAYROLL_MONTH',
                     'vmt_employee_payslip.BASIC',
                     'vmt_employee_payslip.HRA',
                     'vmt_employee_payslip.CHILD_EDU_ALLOWANCE',
                     'vmt_employee_payslip.SPL_ALW',
                     'vmt_employee_payslip.TOTAL_FIXED_GROSS',
                     'vmt_employee_payslip.MONTH_DAYS',
                     'vmt_employee_payslip.Worked_Days',
                     'vmt_employee_payslip.Arrears_Days',
                     'vmt_employee_payslip.LOP',
                     'vmt_employee_payslip.Earned_BASIC',
                     'vmt_employee_payslip.BASIC_ARREAR',
                     'vmt_employee_payslip.Earned_HRA',
                     'vmt_employee_payslip.HRA_ARREAR',
                     'vmt_employee_payslip.Earned_CHILD_EDU_ALLOWANCE',
                     'vmt_employee_payslip.CHILD_EDU_ALLOWANCE_ARREAR',
                     'vmt_employee_payslip.Earned_SPL_ALW',
                     'vmt_employee_payslip.SPL_ALW_ARREAR',
                     'vmt_employee_payslip.Overtime',
                     'vmt_employee_payslip.TOTAL_EARNED_GROSS',
                     'vmt_employee_payslip.PF_WAGES',
                     'vmt_employee_payslip.PF_WAGES_ARREAR_EPFR',
                     'vmt_employee_payslip.EPFR',
                     'vmt_employee_payslip.EPFR_ARREAR',
                     'vmt_employee_payslip.EDLI_CHARGES',
                     'vmt_employee_payslip.EDLI_CHARGES_ARREARS',
                     'vmt_employee_payslip.PF_ADMIN_CHARGES',
                     'vmt_employee_payslip.PF_ADMIN_CHARGES_ARREARS',
                     'vmt_employee_payslip.EMPLOYER_ESI',
                     'vmt_employee_payslip.Employer_LWF',
                     'vmt_employee_payslip.CTC',
                     'vmt_employee_payslip.EPF_EE',
                     'vmt_employee_payslip.EPF_EE_ARREAR',
                     'vmt_employee_payslip.EMPLOYEE_ESIC',
                     'vmt_employee_payslip.PROF_TAX',
                     'vmt_employee_payslip.TDS',
                     'vmt_employee_payslip.SAL_ADV',
                     'vmt_employee_payslip.CANTEEN_DEDN',
                     'vmt_employee_payslip.OTHER_DEDUC',
                     'vmt_employee_payslip.LWF',
                     'vmt_employee_payslip.TOTAL_DEDUCTIONS',
                     'vmt_employee_payslip.NET_TAKE_HOME',
                     'vmt_employee_payslip.Rupees',
                     'vmt_employee_payslip.EL_Opn_Bal',
                     'vmt_employee_payslip.Availed_EL',
                     'vmt_employee_payslip.Balance_EL',
                     'vmt_employee_payslip.SL_Opn_Bal',
                     'vmt_employee_payslip.Availed_SL',
                     'vmt_employee_payslip.Balance_SL',
                     'vmt_employee_payslip.Rename',
            )
            ->get();
        // dd($query_payroll_data);

        return $query_payroll_data;
    }
}
