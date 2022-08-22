<?php

namespace App\Exports;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromArray;

class SampleKPIFormExport implements FromArray
{

    protected $selected_kpi_columns;

    public function __construct(array $t_selected_kpi_columns)
    {
        $this->selected_kpi_columns = $t_selected_kpi_columns;
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
