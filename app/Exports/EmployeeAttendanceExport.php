<?php

namespace App\Exports;

use App\Models\VmtEmployeeAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeAttendanceExport implements FromCollection,WithHeadings
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
    public function collection()
    {


       return VmtEmployeeAttendance::leftJoin('users as us', 'us.id', '=', 'vmt_employee_attendance.user_id')
       ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','us.id')
       ->get(['user_code','name','designation','checkin_time','checkout_time']);

    }
}
