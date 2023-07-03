<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtExcelGeneratorService;
use App\Exports\QuickOnbaordSampleExport;
use Maatwebsite\Excel\Facades\Excel;

class VmtExcelGeneratorController extends Controller
{
    public function downloadQuickOnbaordExcel(Request $request, VmtExcelGeneratorService $vmtExcelGeneratorService){

         return Excel::download(new QuickOnbaordSampleExport($vmtExcelGeneratorService->downloadQuickOnbaordExcel()), 'Quick Onbaord.xlsx');;
    }
}
