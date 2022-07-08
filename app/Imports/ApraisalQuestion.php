<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

use App\Models\VmtAppraisalQuestion;

use Illuminate\Support\Facades\Auth;

class ApraisalQuestion implements ToModel,  WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //
        if($row[0] != null || $row[0] != 'END'){
            $vmtApQuestion = new VmtAppraisalQuestion; 
            $vmtApQuestion->dimension   =    $row[0]; 
            $vmtApQuestion->kpi   =    $row[1]; 
            $vmtApQuestion->operational_definition   =    $row[2];  
            $vmtApQuestion->measure   =    $row[3];  
            $vmtApQuestion->frequency   =    $row[4];  
            $vmtApQuestion->target   =    $row[5];  
            $vmtApQuestion->stretch_target   =    $row[6];   
            $vmtApQuestion->source   =    $row[7];  
            $vmtApQuestion->kpi_weightage   =    $row[8];  
            $vmtApQuestion->author_id   =    auth::user()->id; 
            $vmtApQuestion->author_name   =    auth::user()->name;  
            $vmtApQuestion->save();
        }
    }

    public function startRow(): int
    {
        return 4;
    }
}
