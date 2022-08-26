<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PMSV2ReviewerReviewFormExport implements FromCollection, WithHeadings
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

    public function collection()
    {
        return $this->assignedKpiFormDetails;
    }
}
