<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PMSV2ReviewerReviewFormExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // used for download excel sheet from reviewer review form
    protected $id;

    function __construct($assignedKpiFormDetails) {
        $this->assignedKpiFormDetails = $assignedKpiFormDetails;
    }

    public function headings():array{
        return[
            'Dimension',
            'kpi',
            'Operational Definition',
            'Measure',
            'Frequency',
            'Target',
            'Stretch Target',
            'Source',
            'KPI Weightage',
            'KPI - Achievement (Manager Review)',
            'Manager KPI Achievement %',
        ];
    } 

    public function columnWidths(): array
    {
        return [
            'B' => 30,            
            'B' => 30,            
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'J' => 30,
            'K' => 30,          
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [            
            'A'    => ['alignment' => ['wrapText' => true]],
            'B'    => ['alignment' => ['wrapText' => true]],
            'C'    => ['alignment' => ['wrapText' => true]],
            'D'    => ['alignment' => ['wrapText' => true]],
            'E'    => ['alignment' => ['wrapText' => true]],
            'F'    => ['alignment' => ['wrapText' => true]],
            'G'    => ['alignment' => ['wrapText' => true]],
            'H'    => ['alignment' => ['wrapText' => true]],
            'I'    => ['alignment' => ['wrapText' => true]],
            'J'    => ['alignment' => ['wrapText' => true]],
            'K'    => ['alignment' => ['wrapText' => true]],
        ];
    }
    
    public function collection()
    {
        return $this->assignedKpiFormDetails;
    }
}
