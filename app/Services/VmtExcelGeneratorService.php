<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\VmtClientMaster;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToArray;

class VmtExcelGeneratorService
{

    public function downloadQuickOnbaordExcel()
    {
        $onbaord_excel_details = array();
        $onbaord_excel_details['title'] = sessionGetSelectedClientName();
        if(VmtClientMaster::count()==1){
           $client_list_query = VmtClientMaster::pluck('client_fullname')->toArray();
        }else{
            if(sessionGetSelectedClientid()==1){
                $client_list_query = VmtClientMaster::whereNotIn('id',[1])->pluck('client_fullname')->toArray();
            }else{
                $client_list_query = VmtClientMaster::where('id',sessionGetSelectedClientid())->pluck('client_fullname')->toArray();
            }
        }
        $onbaord_excel_details['client_list'] = (sprintf('"%s"', implode(',',      $client_list_query)));
        $onbaord_excel_details['department'] = (sprintf('"%s"', implode(',',   Department::pluck('name')->toArray())));
        return  $onbaord_excel_details;
    }
}
