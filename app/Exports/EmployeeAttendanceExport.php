<?php

namespace App\Exports;

use App\Models\VmtEmployeeAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeAttendanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VmtEmployeeAttendance::all();
    }
}
