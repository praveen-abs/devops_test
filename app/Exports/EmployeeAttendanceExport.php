<?php

namespace App\Exports;

use App\Models\User;
use App\Models\VmtEmployeeAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;


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


       $attendance_details = VmtEmployeeAttendance::leftJoin('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
       ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','users.id')
       ->get([
              'users.user_code',
              'users.name',
              'vmt_employee_office_details.designation',
              'vmt_employee_attendance.date',
              'vmt_employee_attendance.checkin_time',
              'vmt_employee_attendance.checkout_time',
              ]
        );

        $month = 12;

        $month_days_count = 31;

        $employee_list = User::where('is_ssa','0')
                    ->where('active','1')
                    ->get(['name','user_code']);

       // dd($employee_list);

        //for each user
        foreach($employee_list as $singleEmployee)
        {
            for($i = 1 ; $i <= $month_days_count ; $i++){


            }
        }
        //For each day in a month, find the attendance details


        /*
        foreach($attendance_details as $singleRecord)
        {
            //STATUS check : (P,A,etc)


            $checkin_time = new Carbon($singleRecord->checkin_time);
            $checkout_time = new Carbon($singleRecord->checkout_time);

            $duration = $checkin_time->diff($checkout_time)->format('%H:%I');

            $singleRecord["duration"] = $duration;
        }
        dd($attendance_details);

        return $attendance_details;
        */
    }
}
