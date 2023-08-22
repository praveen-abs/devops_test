<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsentReportExport implements FromArray,WithStrictNullComparison,WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $report;

    public function __construct($data)
    {
        $this->report = $data;
    }
    public function headings():array
    {
        return[
          'Employee Code',
          'Employee Name',
          'Date',
          'Shift Name',
          'In Punch',
          'Out Punch',
          'Status',
          'Day Status'
        ];
     }

    public function array(): array
    {
        return [$this->report];
    }
}
