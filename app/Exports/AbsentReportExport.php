<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class AbsentReportExport implements FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $report;

    public function __construct($data)
    {
        $this->report = $data;
    }
    public function array(): array
    {
        return [$this->report];
    }
}
