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

class VmtTestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $generalInfo = VmtGeneralInfo::first();

        // $month = $request->selectedPaySlipMonth;
        $data= VmtEmployeePaySlip::where([
                    ['user_id','=', auth()->user()->id],

                    ])->first();
          //dd($data);
        // return view('vmt_payslipTemplate', $data);
        // download PDF file with download method
        // $pdf = new Dompdf();
        $html =  view('testing', $data);
        // $pdf->loadHtml($html, 'UTF-8');
        // $pdf->setPaper('A4', 'portrait');
        // $pdf->render();
        // $filename = $data['employee']->Rename;
        // return $pdf->stream($filename, ["Attachment" => false]);
        // dd($html);

        // return $pdf->download($data['employee']->Rename.'.pdf');
        return $html;
    }

}
