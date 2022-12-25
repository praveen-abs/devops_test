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

 function __construct($payroll_month) {
        $this->payroll_month = $payroll_month;
 }
    public function collection()
    {
        $query_payroll_data = VmtEmployeePaySlip::leftjoin('vmt_employee_compensatory_details','vmt_employee_compensatory_details.user_id','=','vmt_employee_payslip.user_id')
                            ->where('vmt_employee_payslip.PAYROLL_MONTH', $this->payroll_month)->get();
        dd($query_payroll_data);

        return $query_payroll_data;

    }
}
