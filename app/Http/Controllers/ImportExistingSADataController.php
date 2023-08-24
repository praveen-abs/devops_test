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
        dd($data);
    }
}
