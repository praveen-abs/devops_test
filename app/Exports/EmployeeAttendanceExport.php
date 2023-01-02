<?php

namespace App\Exports;

use App\Models\User;
use App\Models\VmtEmployeeAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromArray;




class EmployeeAttendanceExport implements WithHeadings,WithStyles,WithMapping,FromCollection
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
            'Out Punch',
            'Regularization Type',
            'Status'
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

       return VmtEmployeeAttendance::leftJoin('users as us', 'us.id', '=', 'vmt_employee_attendance.user_id')
       ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','us.id')
       ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','us.id')


       ->get(['user_code','name','designation','checkin_time','checkout_time','regularization_type','status']);

    //     */
    //     $attendance_details = VmtEmployeeAttendance::leftJoin('users', 'users.id', '=', 'vmt_employee_attendance.user_id')
    //             ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','users.id')
    //             ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','users.id')
    //             ->select([
    //                    'users.user_code',
    //                    'users.name',
    //                    'vmt_employee_office_details.designation',
    //                    'vmt_employee_attendance.date',
    //                    'vmt_employee_attendance.checkin_time',
    //                    'vmt_employee_attendance.checkout_time',
    //                    'vmt_employee_attendance_regularizations.regularization_type',
    //                    'vmt_employee_attendance_regularizations.status',
    //                    ]
    //              )//->where('vmt_employee_attendance.date','=','2022-'.'09-'.$i)
    //              //->orderby('vmt_employee_attendance.date')
    //              ->get();
    }





    /**
    * @var VmtEmployeeAttendance $attendance_details

    */


    public function map($attendance_details): array
    {

        $array_checkoutTime= array();




        array_push($array_checkoutTime, $attendance_details->checkout_time);





        // $check_len=count($array_checkoutTime);
        // for($i=0;$i<$check_len;$i++){
        //     array_push($array_time, $attendance_details->checkout_time);
        //     $time_len=count($array_time);
        //     return  $time_len;
        // }



    //    dd($array_checkoutTime);

       return [
        // [   // $attendance_details->name,
        //     // $attendance_details->designation,
        //     // $array_time,]
        //     // $array_checkoutTime
        // ],
        // [$time_len]



            ['6','7','8','9','10'],
            [$array_checkoutTime]

             ];

    }
}

