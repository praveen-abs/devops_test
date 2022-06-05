<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeePaySlip;
use App\Imports\VmtPaySlip;
use Dompdf\Options;
use Dompdf\Dompdf;

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

    //
    public function payslipPdf(Request $request){
        $data['employee'] = VmtEmployeePaySlip::where('EMP_NO', $request->id)->first();

        $options = new Options();
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
        ));
        // DOMPDF_FONT_HEIGHT_RATIO
        $html =  view('vmt_payslipTemplate', $data); 
        //return $html;
        $dompdf->setHttpContext($context);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream();
    }
    //vmt_payslipTemplate.blade.php

}
