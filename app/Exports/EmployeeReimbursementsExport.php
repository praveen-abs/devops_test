<?php

namespace App\Exports;

use App\Models\VmtEmployeeReimbursements;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeReimbursementsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VmtEmployeeReimbursements::all();
    }
}
