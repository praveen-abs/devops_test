<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LateComingReportExport implements FromArray, WithStrictNullComparison, WithHeadings, ShouldAutoSize
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
            'Late Coming Duration',
            'Day Status',
            'Regularise Status',
            'Reason For Late Coming',
            'Approved By',
            'Approved On',
            'Approver Comments'
        ];
    }

    public function array(): array
    {
        return [$this->report];
    }
}
