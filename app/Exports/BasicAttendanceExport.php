<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BasicAttendanceExport implements FromArray,WithHeadings,ShouldAutoSize
{

    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $heading_dates;
    private $reportresponse;

    public function __construct($data)
    {
          $this->heading_dates=$data[0];
          $this->reportresponse=$data[1];
    }

    public function headings():array
    {
        return[
            $this->heading_dates
        ];
     }

    public function array(): array
    {
           $single_employee= array();

       // dd(count($this->reportresponse));
        for($i=0;$i<count($this->reportresponse);$i++){
            array_push($single_employee,$this->reportresponse[$i]);
        }

        return  $single_employee;

    }


    // public function collection()
    // {
    //    //dd($this->attendanceResponseArray);

    //    return new Collection([
    //     [1, 2, 3]
    //     ]);
    // }
}
