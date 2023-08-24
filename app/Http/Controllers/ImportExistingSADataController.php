<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportExistingSalaryAdvanceData;

class ImportExistingSADataController extends Controller
{
    //
    public function saveSalaryAdvanceUploadPage(){

        return view('vmt_importSalaryAdvancedata');

    }

    public function imporExistingSalaryAdvanceData(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $importDataArry = \Excel::toArray(new ImportExistingSalaryAdvanceData, request()->file('file'));

        return $this->storeBulkFinComponentsPayslips($importDataArry);

    }
    public function storeBulkFinComponentsPayslips($data)
    {
        // dd($data[0]);

        $max_loan_amount = array();
        $max_tenure = array();
        for($i=0; $i<count($data[0]); $i++){
             $max_loan_amount[] = $data[0][$i]['loan_amount'];
             $max_tenure[] = $data[0][$i]['tenure'];
        }
        // dd($max_tenure);
              $max_amt  = max($max_loan_amount);
              $max_tenur = max($max_tenure);
        dd($max_tenur);

        // dd($get_max);

    }
}
