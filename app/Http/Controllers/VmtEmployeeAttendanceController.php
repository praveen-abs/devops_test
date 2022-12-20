<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeeAttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class VmtEmployeeAttendanceController extends Controller
{
    public function export()
    {
        return Excel::download(new EmployeeAttendanceExport, 'Attendance.xlsx');
    }
}
