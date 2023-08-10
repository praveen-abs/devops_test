<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\ValidationException;

class VmtLoanExcel implements ToCollection, ToModel,  WithHeadingRow
{
    /**
     * @param Collection $collection
     */

    public function model(array $row)
    {
        return $row;
    }
    public function collection(Collection $collection)
    {
    }
}
