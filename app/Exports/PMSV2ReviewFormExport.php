<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PMSV2ReviewFormExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

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
            'KPI-Achievement (Self Review)',
            'Self KPI Achievement %',
            'Comments',
        ];
    } 

    public function collection()
    {
        return $this->assignedKpiFormDetails;
    }
}
