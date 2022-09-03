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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
