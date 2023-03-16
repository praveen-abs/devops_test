<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Imports\VmtPaySlip;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use PDF;

use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;
use Illuminate\Support\Facades\Storage;

class VmtTestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //     $generalInfo = VmtGeneralInfo::first();

    //     // $month = $request->selectedPaySlipMonth;
    //     $data= VmtEmployeePaySlip::where([
    //                 ['user_id','=', auth()->user()->id],

    //                 ])->first();
    //       //dd($data);
    //     // return view('vmt_payslipTemplate', $data);
    //     // download PDF file with download method
    //     // $pdf = new Dompdf();
    //     $html =  view('testing', $data);
    //     // $pdf->loadHtml($html, 'UTF-8');
    //     // $pdf->setPaper('A4', 'portrait');
    //     // $pdf->render();
    //     // $filename = $data['employee']->Rename;
    //     // return $pdf->stream($filename, ["Attachment" => false]);
    //     // dd($html);

    //     // return $pdf->download($data['employee']->Rename.'.pdf');
    //     return $html;
    // }


    public function testingpdf(){
        $client_name='brandavatar';
        $viewfile_appointmentletter = 'vmt_appointment_templates.mailtemplate_appointmentletter_'.$client_name;
        $html =  view($viewfile_appointmentletter);

                $pdf = new Dompdf();
                $pdf->loadHtml($html, 'UTF-8');
            //    dd($pdf);
                $pdf->setPaper('A4', 'portrait');
                $pdf->render();

                return $pdf->stream($client_name.'.pdf');
    }
    public function fileUploadingTest(Request $request){
        dd($request->all());
        $emp_code='SA300';
        $date=date('d-m-Y H-i-s');
        $fileName = 'aadhar_'.$emp_code.'_'.$date.'.'.$request->file->extension();
        $path='employee/emp_';

        $fileName = time().'_'. $request->file->getClientOriginalName();
         $emp_document_path = Storage::disk('private');

        dd(File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true));
        if(!$emp_document_path->exists('Emp_code')){
        File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true);
        }
        $filePath =  $request->file->storeAs('Emp_code', $fileName, 'private');
        $fileModel->name = time().'_'.$request->file->getClientOriginalName();
        $fileModel->file_path = '/storage/' . $filePath;
        $fileModel->save();
        return back()
        ->with('success','File has been uploaded.')
        ->with('file', $fileName);
    }

    public function viewpdf(){
        return view('testing');
    }


    // public function fileUploadingTest(Request $request)
    // {
    //   dd($request->all());
    //    $file=new Files();
    //    if($request->file()) {
    //         $file=new Files();
    //          $file_name = time().'_'.$request->file->getClientOriginalName();
    //          $file_path = $request->file('file_link')->storeAs('uploads', $file_name, 'public');

    //          $file->file_name = time().'_'.$request->file->getClientOriginalName();
    //          $file->file_path = '/storage/' . $file_path;
    //          $file->save();
    //          return response()->json([
    //             'message' => 'File  added'
    //         ]);
    //     }
    // }


}





