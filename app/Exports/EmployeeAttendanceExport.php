<?php

namespace App\Exports;

use App\Models\VmtEmployeeAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class EmployeeAttendanceExport implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Emp Code',
            'Name',
            'Designation',
            'In Punch',
            'Out Punch'
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

    //     VmtEmployeeAttendance::leftJoin('users as us', 'us.id', '=', 'vmt_employee_attendance.user_id')
    //    ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','us.id')
    //    ->get(['user_code','name','designation','checkin_time','checkout_time']);


       return VmtEmployeeAttendance::leftJoin('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
       ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','users.id')
       ->get(['users.user_code',
              'users.name',
              'vmt_employee_office_details.designation',
              'vmt_employee_attendance.checkin_time',
              'vmt_employee_attendance.checkout_time'
              ]
        );

    }
}
