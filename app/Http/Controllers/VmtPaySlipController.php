<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeePaySlip;
use App\Imports\VmtPaySlip;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

use Illuminate\Support\Facades\DB;


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
        ->where('vmt_employee_payslip.user_id', auth()->user()->id)
        ->get();

        //dd($data);
        return view('vmt_salary_details', compact('data'));  
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
        $month = $request->selectedPaySlipMonth;
           $data['employee'] = VmtEmployeePaySlip::where([
                        ['user_id','=', auth()->user()->id],
                        ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
                        ])->first();
            view()->share('employee',$data);
      
      return  PDF::loadView('vmt_payslipTemplate', $data)->download($month.'Payslip.pdf');
       
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
