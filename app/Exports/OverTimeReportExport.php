<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;


class OverTimeReportExport implements FromArray,WithStrictNullComparison,ShouldAutoSize,WithHeadings
{
    protected $report;
    public function __construct($data)
    {
        $this->report = $data;
    }
    public function headings(): array
    {
        return [
            'Employee Code',
            'Employee Name',
            'Date',
            'Shift Name',
            'In Punch',
            'Out Punch',
            'Over Time Duration',
        ];
    }

    public function array(): array
    {
        return [$this->report];
    }
    
}
