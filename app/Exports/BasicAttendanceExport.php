<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BasicAttendanceExport implements FromCollection
{

    private $attendanceResponseArray;

    public function __construct($attendanceResponseArray)
    {
          $this->attendanceResponseArray = $attendanceResponseArray;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       dd($this->attendanceResponseArray['2023-01-02']);

        return $this->$attendanceResponseArray;
    }
}
