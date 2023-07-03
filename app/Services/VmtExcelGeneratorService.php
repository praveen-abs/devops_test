<?php

namespace App\Services;
use Maatwebsite\Excel\Facades\Excel;
class VmtExcelGeneratorService {

    public function downloadQuickOnbaordExcel(){
        $onbaord_excel_details = array();
        $onbaord_excel_details['title'] = sessionGetSelectedClientName();
       return  $onbaord_excel_details;
    }
}
