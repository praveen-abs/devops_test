<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared;

class ImportExistingSalaryAdvanceData implements ToModel,  WithHeadingRow
{

    public function model(array $row)
    {
        return $row;
    }

}
