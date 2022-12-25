<?php

namespace App\Exports;

use App\Models\VmtEmployeePaySlip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VmtPayrollReports implements FromCollection,WithColumnWidths,WithStyles,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $payroll_month;

    function __construct($payroll_month)
    {
        $this->payroll_month = $payroll_month;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 27,
            'C' => 37.43,
            'D' => 11,
            'E' => 11,
            'F' => 12.5,
            'G' => 20,
            'H' => 13,
            'I' => 20,
            'J' => 25,
            'K' => 8,
            'L' => 14,
            'M' => 9,
            'N' => 14.5,
            'O' => 14.5,
            'P' => 35,
            'Q' => 10.5,
            'R' => 6.5,
            'S' => 6.5,
            'T' => 6.5,
            'U' => 7,
            'V' => 6.5,
            'W' => 6.5,
            'X' => 6.5,
            'Y' => 6.5,
            'Z' => 6.5,
            'BD' => 11.5,






        ];
    }

    public function headings():array{
        return[
            'Employee Code',
            'Employee Name',
            'Designation',
            'DOJ',
            'DOB',
            'Location',
            'Aadhaar Number',
            'PAN',
            'UAN',
            'EPF Number',
            'ESIC Number',
            'Bank Name',
            'Bank Account Number',
            'IFSC Code',
            'Mobile',
            'Email ID',
            'Payroll Month',
            'Basic',
            'HRA',
            'Special Allowance',
            'Total Fixed Gross',
            'Month Days',
            'Worked Days',
            'Arrears Days',
            'LOP',
            'Basic',
            'BASIC Arrears',
            'HRA',
            'HRA Arrears',
            'Special Allowance',
            'SPL ALW Arrears',
            'Overtime',
            'Total Earned Gross',
            'PF Wages',
            'PF Wages Arrear',
            'EPFR',
            'EPFR Arrears',
            'EDLI Charges',
            'EDLI Charges Arrears',
            'PF Admin Charges',
            'PF Admin Charges Arrears',
            'Employer ESIC',
            'Employer LWF',
            'CTC',
            'EPF EE',
            'EPF EE Arrear',
            'Emplyee ESIC',
            'Professional Tax',
            'Salary Advance',
            'Canteen Deduction',
            'Other Deductions',
            'LWF',
            'Total Deductions',
           'Net'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
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
                     'vmt_employee_details.doj',
                     'vmt_employee_details.dob',

                     'vmt_employee_office_details.work_location',

                      'vmt_employee_details.Aadhar_Number',
                      'vmt_employee_details.PAN_Number',

                     'vmt_employee_statutory_details.uan_number',
                     'vmt_employee_statutory_details.epf_number',
                     'vmt_employee_statutory_details.esic_number',

                     'vmt_employee_details.bank_id',
                     'vmt_employee_details.bank_account_number',
                     'vmt_employee_details.bank_ifsc_code',
                     'vmt_employee_details.mobile_number',

                     'vmt_employee_office_details.officical_mail',

                     //Abry and Enitiy
                     'vmt_employee_payslip.PAYROLL_MONTH',
                     //Total Emoluments
                     'vmt_employee_payslip.BASIC',
                     'vmt_employee_payslip.HRA',
                     'vmt_employee_payslip.SPL_ALW',
                     'vmt_employee_payslip.TOTAL_FIXED_GROSS',
                     //ESIC Applicablity
                     'vmt_employee_payslip.MONTH_DAYS',
                     'vmt_employee_payslip.Worked_Days',
                     'vmt_employee_payslip.Arrears_Days',
                     'vmt_employee_payslip.LOP',
                     'vmt_employee_payslip.Earned_BASIC',
                     'vmt_employee_payslip.BASIC_ARREAR',
                     'vmt_employee_payslip.Earned_HRA',
                     'vmt_employee_payslip.HRA_ARREAR',
                     'vmt_employee_payslip.Earned_SPL_ALW',
                     'vmt_employee_payslip.SPL_ALW_ARREAR',
                     'vmt_employee_payslip.Overtime',
                     //Overtime Arrears
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
                     //VPF
                     'vmt_employee_payslip.EPF_EE_ARREAR',
                     'vmt_employee_payslip.EMPLOYEE_ESIC',
                     'vmt_employee_payslip.PROF_TAX',
                     //'vmt_employee_payslip.TDS',
                     //incomeTax
                     'vmt_employee_payslip.SAL_ADV',
                     'vmt_employee_payslip.CANTEEN_DEDN',
                     'vmt_employee_payslip.OTHER_DEDUC',
                     'vmt_employee_payslip.LWF',
                     'vmt_employee_payslip.TOTAL_DEDUCTIONS',
                     'vmt_employee_payslip.NET_TAKE_HOME'






                     //  'vmt_employee_office_details.DEPARTMENT_ID'
                    //  'vmt_employee_payslip.CHILD_EDU_ALLOWANCE',
                    //  'vmt_employee_payslip.CHILD_EDU_ALLOWANCE_ARREAR',
                    //  'vmt_employee_payslip.Earned_CHILD_EDU_ALLOWANCE',
                    //  'vmt_employee_payslip.Rupees',
                    //  'vmt_employee_payslip.EL_Opn_Bal',
                    //  'vmt_employee_payslip.Availed_EL',
                    //  'vmt_employee_payslip.Balance_EL',
                    //  'vmt_employee_payslip.SL_Opn_Bal',
                    //  'vmt_employee_payslip.Availed_SL',
                    //  'vmt_employee_payslip.Balance_SL',
                    //  'vmt_employee_payslip.Rename',
            )
            ->get();
        // dd($query_payroll_data);

        return $query_payroll_data;
    }
}
