<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\VmtEmployeePayCheckService;

class VmtAPIPaySlipController extends Controller
{



    public function getEmployeePayslipDetails(Request $request, VmtEmployeePayCheckService $serviceEmployeePayslipService){

       $response = $serviceEmployeePayslipService->getEmployeePayslipDetails( user_code : $request->user_code,
                                                                    year : $request->year,
                                                                    month : $request->month
                                                                );

        return $response;
    }


    public function getEmployeePayslipDetailsAsPDF(Request $request, VmtEmployeePayCheckService $serviceEmployeePayslipService){

       $response = $serviceEmployeePayslipService->getEmployeePayslipDetailsAsPDF( user_code : $request->user_code,
                                                                    year : $request->year,
                                                                    month : $request->month
                                                                );

        return $response;
    }

    public function getEmployeeAllPayslipList(Request $request, VmtEmployeePayCheckService $serviceEmployeePayslipService){

       $response = $serviceEmployeePayslipService->getEmployeeAllPayslipList( user_code : $request->user_code);

        return $response;
    }



    public function getEmployeeCompensatoryDetails(Request $request, VmtEmployeePayCheckService $serviceEmployeePayCheckService){

        $response = $serviceEmployeePayCheckService->getEmployeeCompensatoryDetails( user_code : $request->user_code);

         return $response;
    }



}
