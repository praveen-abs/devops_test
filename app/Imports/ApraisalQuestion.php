<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\VmtAppraisalQuestion;

use Illuminate\Support\Facades\Auth;

class ApraisalQuestion implements ToModel,  WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //
        if($row['dimension'] != null){
            $vmtApQuestion = new VmtAppraisalQuestion; 
            $vmtApQuestion->dimension   =    $row["dimension"]; 
            $vmtApQuestion->kpi   =    $row["kpi"]; 
            $vmtApQuestion->operational_definition   =    $row["operational_definition"];  
            $vmtApQuestion->measure   =    $row["measure"];  
            $vmtApQuestion->frequency   =    $row["frequency"];  
            $vmtApQuestion->target   =    $row["target"];  
            $vmtApQuestion->stretch_target   =    $row["stretch_target"];   
            $vmtApQuestion->source   =    $row["source"];  
            $vmtApQuestion->kpi_weightage   =    $row["kpi_weightage"];  
            $vmtApQuestion->author_id   =    auth::user()->id; 
            $vmtApQuestion->author_name   =    auth::user()->name;  
            $vmtApQuestion->save();
        }
    }
}
