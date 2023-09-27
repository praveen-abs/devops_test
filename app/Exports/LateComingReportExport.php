<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class LateComingReportExport implements FromArray,WithStrictNullComparison,WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $report;
    protected $last_row;

    private $headers;
    public function __construct($data)
    {
        $this->report = $data['rows'];
        $this->last_row=count($this->report)+2;
        $this->headers = $data['headers'];
    }
    public function headings():array
    {
        return $this->headers;
     }

    public function array(): array
    {
        return [$this->report];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A'.$this->last_row.':G'.$this->last_row)->setCellValue('A'.$this->last_row, " This report is generated by ABShrms Payroll Software : ".Carbon::now()->format('d-M-Y'));
        $sheet->getStyle('A'.$this->last_row.':G'.$this->last_row)->getFont()->setBold(true);
    }
}
