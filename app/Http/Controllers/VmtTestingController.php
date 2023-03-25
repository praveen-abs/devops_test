<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Imports\VmtPaySlip;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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


     /*
        Download private file.

     */
    public function downloadPrivateFile(){
        $private_file = "employee/emp_B090/documents/voterIdB090_22-03-2023 15-47-22.jpg";

        //dd(Storage::disk('private')->allFiles());
        return Storage::disk('private')->download($private_file);
    }

    /*
       View private file such as image

    */
    public function viewPrivateFile(){
        $private_file = "employee/emp_B090/documents/voterIdB090_22-03-2023 15-47-22.jpg";

        return response()->file(storage_path('uploads/'.$private_file));
    }

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
       $pathToFile = storage_path('uploads\employee\emp_B090\documents/' . "voterIdB090_21-03-2023 12-32-42.png");
        //$pathToFile = public_path('images/'.'avatar_SA100_2023-01-18_05_57_46pm.JPG');

        // if(!File::exists($pathToFile)){
        //     abort(404);
        // }else{
        //     $file = File::get( $pathToFile);
        //     $type = File::mimeType($pathToFile);
        //     $response = Response::make($file, 200);
        //     $response->header("Content-Type", $type);
        // }

        $base64 = base64_encode( $pathToFile);
        $image_data = 'data:'.mime_content_type( $pathToFile) . ';base64,' . $base64;
       // dd( $image_data);
        return view('testing',compact('pathToFile','image_data','base64'));
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

    public function retriveFiles(Request $request){
        $pathToFile = storage_path('uploads\employee\emp_B090\documents/' . "voterIdB090_21-03-2023 12-32-42.png");
    //     dd( $pathToFile);
    //     dd(Storage::disk('local')->getAdapter()->applyPathPrefix('\employee\emp_B090\documents'));
    //     dd(Storage::disk('private')->path(''));
    //     dd(Storage::disk('private')->getAdapter()->setprefixer());
    //     dd(Storage::disk('private')->get('voterIdB090_21-03-2023 12-32-42.png'));
    //      //dd(Storage::disk('private')->directories('employee/emp_B090') );
    //    dd(Storage::disk('D:\Laravelworks\lara_abs_pms\storage\uploads\employee\emp_B090\documents')->exists('voterIdB090_21-03-2023 12-32-42.png'));
        //  dd((Storage::get($pathToFile)));
    return $pathToFile;
    }


}





