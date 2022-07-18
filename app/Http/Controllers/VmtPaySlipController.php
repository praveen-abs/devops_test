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

    //
    public function payslipPdf(Request $request){
        $data['employee'] = VmtEmployeePaySlip::where('EMP_NO', $request->id)->first();
        //dd(public_path("storage/images/"));
        //$data['logoSrc']  = public_path('/assets/images/images/image2.png');
        //dd($data['logoSrc']);
        //$employee = VmtEmployeePaySlip::where('EMP_NO', $request->id)->first();
        //view()->share('employee', $data['employee']);
        //$pdf = PDF::loadView('vmt_uploadPaySlip', $data);
        return view('vmt_payslipTemplate', $data);
        // download PDF file with download method
        $pdf = new Dompdf();
        $html =  view('vmt_payslipTemplate', $data);       
        $pdf->loadHtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $filename = $data['employee']->Rename;
        return $pdf->stream($filename, ["Attachment" => false]);


        return $pdf->download($data['employee']->Rename.'.pdf');
        /*$options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('debugPng', false);
        $dompdf = new Dompdf($options);
        $dompdf->set_option("isPhpEnabled", true);
        $context = stream_context_create(array(
            'ssl' => array(
                'verify_peer'             => FALSE, 
                'verify_peer_name'        => FALSE,
                'allow_self_signed'       => TRUE,                
                'isPhpEnabled'            => TRUE,
                'isJavascriptEnabled'     => TRUE,
                'isHtml5ParserEnabled'    => TRUE,
                'isFontSubsettingEnabled' => TRUE,
            )
        ));*/
        // DOMPDF_FONT_HEIGHT_RATIO
        //$html =  view('vmt_payslipTemplate', $data); 
        //return $html;
        //$dompdf->setHttpContext($context);
        //$dompdf->load_html($html);
        //return $dompdf->download("1.pdf");
        //$dompdf->stream();
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
