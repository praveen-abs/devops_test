<?php

namespace App\Imports;

use App\Group;
use App\Models\VmtInvFormSection;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use App\Models\User;
use App\Models\VmtInvForm;
use App\Models\VmtInvSection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;


class VmtInvSectionImport implements OnEachRow,WithHeadingRow
{

    use Importable;

    private $form_id;

    public function __construct(int $form_id)
    {
        $this->form_id = $form_id;
    }

    public function onRow(Row $row)
    {
       // dd($row);
        $rowIndex = $row->getIndex();
        $row    = $row->toArray();

        //Create sections
        $query_vmtInvSection = new VmtInvSection;
        $query_vmtInvSection->section = $row['section'];
        $query_vmtInvSection->particular = $row['particular'];
        $query_vmtInvSection->reference = $row['references'];
        $query_vmtInvSection->max_amount = $row['max_amount'];
        $query_vmtInvSection->save();

        //Link table
        $query_vmtInvfromse = new VmtInvFormSection;
        $query_vmtInvfromse->form_id = $this->form_id;
        $query_vmtInvfromse->section_id = $query_vmtInvSection->id;
        $query_vmtInvfromse->save();


    }
}
