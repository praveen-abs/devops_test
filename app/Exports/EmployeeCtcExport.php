<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeCtcExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function ExportEmployeeCtcReport()
    {
            return[

                'EmployeeCode',
                'Employee Name',
                'Gender',
                'designation',
                'Emplpoyee Status',
                'DOB',
                'DOJ',
                'PAN Number',
                'Aadhar Number',
                'Mobile Number',
                'Email ID',

            ];

    }
}
