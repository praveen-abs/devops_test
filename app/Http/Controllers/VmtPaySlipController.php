<?php

namespace App\Http\Controllers;

use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Imports\VmtPaySlip;
use App\Models\User;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;

use App\Services\VmtEmployeePayslipService;


class VmtPaySlipController extends Controller
{
    //

    // return form view to upload slip
    public function showPayRunPage(Request $request)
    {
        // code...
        return view('vmt_uploadPaySlip');
    }


    //
    public function uploadPaySlip(Request $request, VmtEmployeePayslipService $employeePaySlipService){

        return $employeePaySlipService->importBulkEmployeesPayslipExcelData($request->all());

        //$importDataArry = \Excel::import(new VmtPaySlip, request()->file('file'));
        //dd($importDataArry);
    }

    /*
        Fetch payslips for currently logged in user

    */
    public function showSalaryDetailsPage(Request $request) {

       $data =  DB::table('vmt_employee_payslip')
        ->where('vmt_employee_payslip.user_id', auth()->user()->id)->orderBy('PAYROLL_MONTH', 'DESC')
        ->get();


        if($data->count()!=0)
        {
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

            return view('vmt_salary_details', compact('data', 'result', 'compensatory'));

        }
        else
        {
            return view('vmt_nodata_salaryDetails');

        }

    }

    //vmt_payslipTemplate.blade.php
    // code add by hentry //
    public function download( $filename = '' )
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() . "/assets/" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }



    /// FOR INTERNAL TESTING

    // function internal_ShowSalaries(Request $request){

    //     //dd($request->user_code);
    //     $user_id = User::where('user_code', $request->user_code);

    //     if ($user_id->exists())
    //         $user_id = $user_id->first()->id;
    //     else
    //         dd("Employee not found ! Please enter the correct employee code");

    //     $data =  DB::table('vmt_employee_payslip')
    //     ->where('vmt_employee_payslip.user_id', $user_id)->orderBy('PAYROLL_MONTH', 'DESC')
    //     ->get();


    //     if($data->count()!=0)
    //     {
    //         $compensatory =  Compensatory::where('user_id', $user_id)->first();
    //         $result['CTC'] = 0;
    //         $result['TOTAL_EARNED_GROSS'] = 0;
    //         $result['TOTAL_DEDUCTIONS'] = 0;
    //         $result['BASIC'] = 0;
    //         $result['HRA'] = 0;
    //         $result['TOTAL_FIXED_GROSS'] = 0;
    //         $result['EPFR'] = 0;
    //         $result['TOTAL_PF_WAGES'] = 0;

    //         if ($data && $data[0]) {
    //             $result['CTC'] = $data[0]->CTC;
    //             $result['TOTAL_EARNED_GROSS'] = $data[0]->TOTAL_EARNED_GROSS;
    //             $result['TOTAL_DEDUCTIONS'] = $data[0]->TOTAL_DEDUCTIONS;
    //             $result['BASIC'] = $data[0]->BASIC;
    //             $result['HRA'] = $data[0]->HRA;
    //             $result['TOTAL_FIXED_GROSS'] = $data[0]->TOTAL_FIXED_GROSS;
    //             $result['EPFR'] = $data[0]->EPFR;

    //             $result['BASIC'] = $data[0]->BASIC;
    //             $result['HRA'] = $data[0]->HRA;
    //             $result['NET_TAKE_HOME'] = $data[0]->NET_TAKE_HOME;
    //             $result['PAYROLL_MONTH'] = $data[0]->PAYROLL_MONTH;
    //         }
    //         foreach($data as $d) {
    //             $result['TOTAL_PF_WAGES'] += $d->PF_WAGES;
    //         }

    //         return view('internal.vmt_showsalaries', compact('data', 'result', 'compensatory','user_id'));

    //     }
    //     else
    //     {
    //         return view('vmt_nodata_salaryDetails');

    //     }

    // }


}
