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
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;




class DetailedAttendanceExport implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
     use Exportable;

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


        $attendance_data= VmtEmployeeAttendance::leftJoin('users as us', 'us.id', '=', 'vmt_employee_attendance.user_id')
        ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','us.id')
        ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','us.id')
       //->whereYear('vmt_employee_attendance.date',$request->attendance_year)
        ->select('user_code','name','designation','checkin_time','checkout_time',
                       'regularization_type','status')->get();


       foreach($attendance_data as $singledata){
               $user_code=(User::groupBy('user_code')->pluck('user_code'));
               //dd($user_code);
            if($user_code== $singledata->user_code){
                $user_code=Array();
                array_push($singledata->usercode,$singledata->checkin_time,$singledata->checkout_time,
                $singledata->regularization_type,$singledata->status);
            }else{
                dd($singledata->usercode);
                $singledata->usercode=array($singledata->usercode,$singledata->name,$singledata->designation,
            $singledata->checkin_time,$singledata->checkout_time,$singledata->regularization_type,$singledata->status);
            }
            $attendance_array=array();
            array_push($attendance_array,$singledata->usercode);
       }
          // dd($attendance_array);
    }

    // public function query()
	// {
    //     $attendance_data= VmtEmployeeAttendance::leftJoin('users as us', 'us.id', '=', 'vmt_employee_attendance.user_id')
    //     ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=','us.id')
    //     ->leftjoin('vmt_employee_attendance_regularizations','vmt_employee_attendance_regularizations.user_id','=','us.id')
    //    //->whereYear('vmt_employee_attendance.date',$request->attendance_year)
    //     ->select('user_code','name','designation','checkin_time','checkout_time',
    //                    'regularization_type','status');
    //                    dd($attendance_data->get()->user_code);
    //     if (User::where("user_code", $attendance_data->user_code)->exists()){

    //     }
    //      return $attendance_data;
	// }



    // public function map($attendance_data): array
    // {

    //     // This example will return 3 rows.
    //     // First row will have 2 column, the next 2 will have 1 column

    //     return [
    //         [
    //             $attendance_data->user_code,
    //             $attendance_data->name,
    //             $attendance_data->designation,
    //             $attendance_data->checkin_time,
    //             $attendance_data->checkout_time,
    //             $attendance_data->regularization_type,
    //             $attendance_data->status,

    //         ],
    //         // [
    //         //     $attendance_data->user_code,
    //         //     $attendance_data->name,
    //         //     $attendance_data->designation,
    //         // ]
    //     ];
    // }






}

