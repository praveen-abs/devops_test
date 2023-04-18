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
use App\Services\VmtEmployeeService;

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
        //$private_file = "B090/onboarding_documents/AadharCardBack_B090_13-04-2023_18-23-34.jpg";
        $private_file = "/PLIPL068/onboarding_documents/voterIdB090_22-03-2023 15-47-22.jpg";
        //dd(file(storage_path('employees/'.$private_file)));
        return response()->file(storage_path('employees/'.$private_file));
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

    /*
        Send appointment letter as PDF attachement in email


    */
    public function mailTest_sendAppointmentLetter(Request $request, VmtEmployeeService $employeeService){

        $to_email = $request->email;
        $employeeData = array();

        //Add dummy data
        $employeeData['employee_name'] = "TestUser";
        $employeeData['employee_code'] = "ABS001";
        $employeeData['email'] = "karthigaiselvan28072000@gmail.com";

        $employeeData['basic'] = 10000;
        $employeeData['hra'] = 10000;
        $employeeData['special_allowance'] = 10000;
        $employeeData["basic"]  = 10000;
        $employeeData["statutory_bonus"] = 10000;
        $employeeData["child_education_allowance"]  = 10000;
        $employeeData["food_coupon"]  = 10000;
        $employeeData["lta"]  = 10000;
        $employeeData["special_allowance"]  = 10000;
        $employeeData["other_allowance"] = 10000;
        $employeeData['epf_employer_contribution'] = 10000;
        $employeeData['esic_employer_contribution'] = 10000;
        $employeeData['gross_monthly'] = 10000;
        $employeeData["epf_employer_contribution"] = 10000;
        $employeeData["professional_tax"] = 10000;
        $employeeData["net_income"] = 10000;

        $response = $employeeService->attachAppointmentLetterPDF($employeeData);

        return $response;

    }

}





