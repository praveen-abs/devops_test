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
            "take_home" => "25000",
            "deductions" => "2000",
            "earnings" => [
                "basic" => "8000.00",
                "house_rent_allowance" => "9000.00",
                "total_earnings" => "10000.00"
            ],
            "deductions" => [
                "epf_contribution" => "8000.00",
                "employee_state_insurance" => "9000.00",
                "total_deductions" => "10000.00"
            ],
            "total_net_pay" => "16,000.00"
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
