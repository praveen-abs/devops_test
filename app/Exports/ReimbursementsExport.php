<?php

namespace App\Exports;

use App\Models\VmtEmployeeReimbursements;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;

class ReimbursementsExport implements FromCollection,ShouldAutoSize,FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $reimbursements_data;
    public function array(): array
    {
        return [
            [1, 2, 3],
            [4, 5, 6]
        ];
    }
}
