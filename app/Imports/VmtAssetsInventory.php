<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VmtAssetsInventory implements ToModel,  WithHeadingRow
{
    public function model(array $row)
    {
        return $row;
    }
}
