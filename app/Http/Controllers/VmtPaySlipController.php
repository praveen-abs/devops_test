<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Imports\VmtPaySlip;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;


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
    public function uploadPaySlip(Request $request){
        $importDataArry = \Excel::import(new VmtPaySlip, request()->file('file'));
        return "Processed";
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
        ->where('vmt_employee_payslip.user_id', auth()->user()->id)->orderBy('created_at', 'DESC')
        ->get();
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
        return view('vmt_salary_details', compact('data', 'result', 'compensatory'));
    }

    public function payslipPdfView(Request $request){
        //dd($request);
        $data['employee'] = VmtEmployeePaySlip::where([
                        ['user_id','=', auth()->user()->id],
                        ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
                        ])->first();
        //dd($data);
        // return view('vmt_payslipTemplate', $data);
        // download PDF file with download method
        // $pdf = new Dompdf();
        $html =  view('vmt_payslipTemplate', $data);
        // $pdf->loadHtml($html, 'UTF-8');
        // $pdf->setPaper('A4', 'portrait');
        // $pdf->render();
        // $filename = $data['employee']->Rename;
        // return $pdf->stream($filename, ["Attachment" => false]);
        // dd($html);

        // return $pdf->download($data['employee']->Rename.'.pdf');
        return $html;
        // return view('vmt_employee_pay_slip', compact('employees', 'html'));
    }

     public function pdfview(Request $request)
    {

        $generalInfo = VmtGeneralInfo::first();

        $month = $request->selectedPaySlipMonth;
        $data= VmtEmployeePaySlip::where([
                    ['user_id','=', auth()->user()->id],
                    ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
                    ])->first();

        $view = view('vmt_payslipTemplate')
                ->with('employee',$data)
                ->with('generalInfo',$generalInfo);

        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->download($month.'Payslip.pdf');
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


    // code end by hentry //

}
