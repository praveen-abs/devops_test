<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared;

class VmtFinancialComponents implements ToModel,  WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    //public function collection(Collection $row)
    //{
        //
        //dd($collection);
        //foreach ($collection as $key => $value) {
            // code...

        //}
    public function model(array $row)
    {
        return $row;
    }

    }
