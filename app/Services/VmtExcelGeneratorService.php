<?php

namespace App\Services;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\VmtClientMaster;
class VmtExcelGeneratorService {

    public function downloadQuickOnbaordExcel(){
        $onbaord_excel_details = array();
        $onbaord_excel_details['title'] = sessionGetSelectedClientName();
        $onbaord_excel_details['client_list'] = VmtClientMaster::pluck('client_fullname');
       return  $onbaord_excel_details;
    }
}
