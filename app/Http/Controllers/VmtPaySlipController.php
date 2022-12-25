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
    public function uploadPaySlipView(Request $request)
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

    //
    public function payslipView(Request $request){
        $employees = VmtEmployeePaySlip::select('EMP_NO','EMP_NAME')->get();
        return view('vmt_employee_pay_slip', compact('employees'));
    }

    /*
        Fetch payslips for currently logged in user

    */
    public function paySlipIndex(Request $request) {
       // $data = VmtEmployeePaySlip::all();

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

        // dd($compensatory);
    }

    /*
        Shown as Pop up
    */
    public function payslipPdfView(Request $request){
       //    dd("asd");

        //dd($request);
        $data['employee'] = VmtEmployeePaySlip::where([
                        ['user_id','=', auth()->user()->id],
                        ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
                        ])->first();

        $data['employee_name'] = auth()->user()->name;
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',auth()->user()->id)->first();
        $data['employee_details'] = VmtEmployee::where('userid',auth()->user()->id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',auth()->user()->id)->first();


        //TODO : Need to show client specific payslip template.

        $processed_clientName = strtolower(str_replace(' ', '', sessionGetSelectedClientName()));

        //$html =  view('vmt_payslipTemplate', $data);
        $html =  view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);

        return $html;
    }

     public function pdfview(Request $request)
    {
        if($request->emp_code != auth()->user()->user_code)
            dd("Payslip View : You are not authorized to access this resource");

        $month = $request->selectedPaySlipMonth;
        $data['employee'] = VmtEmployeePaySlip::where([
            ['user_id','=', auth()->user()->id],
            ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
            ])->first();

        // $data['employee_name'] = auth()->user()->name;
        // $data['designation'] = VmtEmployeeOfficeDetails::where('user_id',auth()->user()->id)->value('designation');
        // $data['employee_details'] = VmtEmployee::where('userid',auth()->user()->id)->first();

        $data['employee_name'] = auth()->user()->name;
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',auth()->user()->id)->first();
        $data['employee_details'] = VmtEmployee::where('userid',auth()->user()->id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',auth()->user()->id)->first();

        $processed_clientName = strtolower(str_replace(' ', '', sessionGetSelectedClientName()));
        $view = view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);

       // $view = view('vmt_payslipTemplate', $data);

        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->download(auth()->user()->id."_".$month."_Payslip.pdf");
        //   return  PDF::loadView('vmt_payslipTemplate', $data)->download($month.'Payslip.pdf');

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

    function internal_ShowSalaries(Request $request){

        //dd($request->user_code);
        $user_id = User::where('user_code', $request->user_code);

        if ($user_id->exists())
            $user_id = $user_id->first()->id;
        else
            dd("Employee not found ! Please enter the correct employee code");

        $data =  DB::table('vmt_employee_payslip')
        ->where('vmt_employee_payslip.user_id', $user_id)->orderBy('PAYROLL_MONTH', 'DESC')
        ->get();


        if($data->count()!=0)
        {
            $compensatory =  Compensatory::where('user_id', $user_id)->first();
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

            return view('internal.vmt_showsalaries', compact('data', 'result', 'compensatory','user_id'));

        }
        else
        {
            return view('vmt_nodata_salaryDetails');

        }

    }


    public function internal_ShowSelectedPayslip(Request $request){

        //dd($request->user_id);


        //dd($request);
        $data['employee'] = VmtEmployeePaySlip::
                        where('user_id','=', $request->user_id)->
                        where('PAYROLL_MONTH','=', $request->selectedPaySlipMonth)
                        ->first();

        $data['employee_name'] = User::find($request->user_id)->name;
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',$request->user_id)->first();
        $data['employee_details'] = VmtEmployee::where('userid',$request->user_id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',$request->user_id)->first();


        //TODO : Need to show client specific payslip template.

        $html =  view('vmt_payslipTemplate', $data);

        return $html;
    }
}
