<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BasicAttendanceExport implements FromArray,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $attendanceResponseArray;
    private $ar1;
    private $ar2;
    private $heading_dates;
    private $reportresponse;

    public function __construct($attendanceResponseArray,$ar1,$ar2,$heading_dates,$reportresponse)
    {
          $this->attendanceResponseArray = $attendanceResponseArray;
          $this->ar1=$ar1;
          $this->ar2=$ar2;
          $this->heading_dates=$heading_dates;
          $this->reportresponse=$reportresponse;
    }

    public function headings():array
    {
        return[
            $this->heading_dates
        ];
     }

    public function array(): array
    {
           $data= array();

       // dd(count($this->reportresponse));
        for($i=0;$i<count($this->reportresponse);$i++){
            array_push($data,$this->reportresponse[$i]);
        }

        return $data;

    }


    // public function collection()
    // {
    //    //dd($this->attendanceResponseArray);

    //    return new Collection([
    //     [1, 2, 3]
    //     ]);
    // }
}
