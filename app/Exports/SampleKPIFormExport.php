<?php

namespace App\Exports;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SampleKPIFormExport implements FromArray, WithHeadings
{

    protected $selected_kpi_columns;

    public function __construct(array $t_selected_kpi_columns)
    {
        $this->selected_kpi_columns = $t_selected_kpi_columns;
    }

    public function headings():array{
        $data = [
            'GREAT CONVERSATIONS - KPI Form (2018 - 2018)',
        ];
        $data1 = [
            'KPIs',
        ];
        return [$data,$data1];
    } 

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            [$this->selected_kpi_columns]

        ];
    }
}
