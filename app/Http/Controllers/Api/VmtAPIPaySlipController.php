<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\VmtEmployeePayslipService;

class VmtAPIPaySlipController extends Controller
{



    public function getEmployeePayslipDetails(Request $request, VmtEmployeePayslipService $serviceEmployeePayslipService){

       $response = $serviceEmployeePayslipService->getEmployeePayslipDetails( user_code : $request->user_code,
                                                                    year : $request->year,
                                                                    month : $request->month
                                                                );

        return $response;
    }


    public function getEmployeePayslipDetailsAsPDF(Request $request, VmtEmployeePayslipService $serviceEmployeePayslipService){

       $response = $serviceEmployeePayslipService->getEmployeePayslipDetailsAsPDF( user_code : $request->user_code,
                                                                    year : $request->year,
                                                                    month : $request->month
                                                                );

        return $response;
    }

    public function getEmployeeAllPayslipList(Request $request, VmtEmployeePayslipService $serviceEmployeePayslipService){

       $response = $serviceEmployeePayslipService->getEmployeeAllPayslipList( user_code : $request->user_code);

        return $response;
    }







}
