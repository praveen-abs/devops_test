<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Imports\VmtPaySlip;


class VmtPayCheckController extends Controller
{
     public function index(Request $request){
        $id = auth()->user()->id;
       $data =  DB::table('vmt_employee_details')
        ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','vmt_employee_details.userid')
        ->join('vmt_employee_payslip','vmt_employee_payslip.user_id','=','vmt_employee_details.userid')
        ->where('vmt_employee_details.userid', auth()->user()->id)->orderBy('vmt_employee_payslip.created_at', 'DESC')
        ->get();
        // $dataemployee =  DB::table('vmt_employee_details')
        // ->where('vmt_employee_details.userid', auth()->user()->id)->orderBy('created_at', 'DESC')
        // ->get();
        foreach ($data as $key => $value) {
            // code...
 // dd($value->epfemployer);
        $dataVmtHome = [];
        $dataVmtHome['NET_TAKE_HOME'] = $value->NET_TAKE_HOME;
        $dataVmtHome['TOTAL_DEDUCTIONS'] = $value->TOTAL_DEDUCTIONS;
        $dataVmtHome['TOTAL_CON'] = $value->TOTAL_DEDUCTIONS+$value->NET_TAKE_HOME;
        $dataVmtHome['epfemployer'] = $value->epfemployer;
        $dataVmtHome['your_employee'] = $value->epfemployee;
        $dataVmtHome['TOTAL_FIXED_GROSS'] = $value->TOTAL_FIXED_GROSS;
        $json_PayCheck = json_encode($dataVmtHome);
        }
        
       // dd($data)
        $compensatory =  Compensatory::where('user_id', auth()->user()->id)->first();
        $result['CTC'] = 0;
        $result['TOTAL_EARNED_GROSS'] = 0;
        $result['TOTAL_DEDUCTIONS'] = 0;
        $result['BASIC'] = 0;
        $result['HRA'] = 0;
        $result['TOTAL_FIXED_GROSS'] = 0;
        $result['EPFR'] = 0;
        $result['TOTAL_PF_WAGES'] = 0;
        
        if ($data && $data[0]) {
            $result['CTC'] = $data[0]->CTC;
            $result['TOTAL_EARNED_GROSS'] = $data[0]->TOTAL_EARNED_GROSS;
            $result['TOTAL_DEDUCTIONS'] = $data[0]->TOTAL_DEDUCTIONS;
            $result['BASIC'] = $data[0]->BASIC;
            $result['HRA'] = $data[0]->HRA;
            $result['TOTAL_FIXED_GROSS'] = $data[0]->TOTAL_FIXED_GROSS;
            $result['EPFR'] = $data[0]->EPFR;

            $result['BASIC'] = $data[0]->BASIC;
            $result['HRA'] = $data[0]->HRA;
            $result['NET_TAKE_HOME'] = $data[0]->NET_TAKE_HOME;
            $result['PAYROLL_MONTH'] = $data[0]->PAYROLL_MONTH;
        }
        foreach($data as $d) {
            $result['TOTAL_PF_WAGES'] += $d->PF_WAGES;
        }

        // dd($compensatory);
        return view('vmt_home' , compact('data', 'result', 'compensatory','json_PayCheck'));  
        // return view('vmt_home', compact('employees'));
    }
}
