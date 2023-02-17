<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;

class PMSFormsExport implements FromArray,WithHeadings
{
    protected $formDetails;
    public function __construct($pms_assignedFormDetails)
    {
        $this->formDetails = $pms_assignedFormDetails;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function headings():array{
        return[
            'KPI',
            'Frequency',
            'Target',
            'KPI Weightage ( % )',
        ];
    }

    public function array(): array
    {
          return $this->formDetails;
    }

}
