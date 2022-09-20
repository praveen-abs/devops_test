<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VmtAPIPaySlipController extends Controller
{
    /*
        Input : year, month

    */
    public function getMonthlyPayslipData(Request $request) {


        $data = [
            "payslip_month" => "September",
            "payslip_pdf" => "asdfasdfasdfasdfasdf",
            "earnings" => [
                "Basic" => "8000.00",
                "House Rent Allowance" => "9000.00",
                "Total Earnings" => "10000.00"
            ],
                "deductions" => [
                "EPF Contribution" => "8000.00",
                "House Rent Allowance" => "9000.00",
                "Total Earnings" => "10000.00"
            ],
            "Total Net Pay" => "16,000.00"
        ];

        return response()->json([
            'status' => 'success',
            'message'=> 'Not implemented',
            'data'   => $data
        ]);
    }

    public function getAvailablePayslipList(Request $request){


        $data = [

            "year" => "2021",
            "available_payslip_months" => ["Jan","Feb","Mar","Apr","May","June"]


        ];

        // {
        //     "status": "success",
        //     "message": "",
        //     "data": [
        //             {
        //                     "year" : "2021",
        //                     "available_payslip_months" : ["Jan","Feb","Mar","Apr","May","June"]

        //             },
        //             {
        //                     "year" : "2022",
        //                     "available_payslip_months" : ["Jan","Feb","Mar"]

        //             }

        //     ]
        // }

        return response()->json([
            'status' => 'success',
            'message'=> 'Not implemented',
            'data'   => $data
        ]);
    }
}
