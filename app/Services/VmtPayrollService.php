<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class VmtPayrollService{


    public function getCurrentPayrollMonth(){

        // start date and end date of current payroll month from the payroll table

        $current_payroll_date = date("Y-m-d");

        dd($current_payroll_date);

    }

    /*
        For UI :
        Get the payroll outcome section data.
    */
    public function getPayrollOutcomes($payroll_month){
        // $validator = Validator::make(
        //     $data = [
        //         'payroll_month' => $payroll_month,
        //     ],
        //     $rules = [
        //         'payroll_month' => 'nullable|exists:vmt_client_master,id',
        //     ],
        //     $messages = [
        //         'required' => 'Field :attribute is missing',
        //         'exists' => 'Field :attribute is invalid',
        //     ]
        // );

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'failure',
        //         'message' => $validator->errors()->all()
        //     ]);
        // }


        try{
            $data = '';

            return response()->json([
                "status" => "success",
                "message" => "Payroll outcomes fetched successfully",
                "data" => $data

            ]);


        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch Payroll Outcome details",
                "data" => $e->getmessage(),
            ],400);
        }



    }


}
