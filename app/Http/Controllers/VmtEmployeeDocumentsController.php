<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtEmployeeDocumentsService;


class VmtEmployeeDocumentsController extends Controller
{
    public function getEmployeeDocumentsSettings(Request $request, VmtEmployeeDocumentsService $serviceVmtEmployeeDocumentsService){
        return $serviceVmtEmployeeDocumentsService->getEmployeeDocumentsSettings();
    }
}
