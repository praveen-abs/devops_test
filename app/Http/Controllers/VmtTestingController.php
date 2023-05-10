<?php

namespace App\Http\Controllers;

use App\Models\VmtEmployeeDocuments;
use App\Models\vmtInvEmp_Fsp_Popups;
use App\Models\VmtInvForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Imports\VmtPaySlip;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use PDF;
use App\Models\VmtEmployeeInvestmentsDeclarationAmount;
use App\Models\VmtEmployeeInvestmentsDeclarationFields;
use App\Models\VmtInvestmentForm;
use App\Models\VmtInvestmentParticulars;
use App\Models\VmtInvestmentSections;
use App\Models\VmtInvestmentSection_Particulars;
use App\Models\VmtInvestmentForm_SectionParticulars;
use App\Models\VmtInvestmentDeclarationsFields;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtClientMaster;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttenanceWorkShifttime;
use App\Imports\VmtInvSectionImport;
use App\Models\VmtInvFEmpAssigned;


use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;
use Illuminate\Support\Facades\Storage;
use App\Services\VmtEmployeeService;
use App\Mail\WelcomeMail;
use App\Models\VmtDocuments;

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
    public function downloadPrivateFile()
    {
        $private_file = "employee/emp_B090/documents/voterIdB090_22-03-2023 15-47-22.jpg";

        //dd(Storage::disk('private')->allFiles());
        return Storage::disk('private')->download($private_file);
    }

    /*
    View private file such as image
    */
    public function viewPrivateFile()
    {
        //$private_file = "B090/onboarding_documents/AadharCardBack_B090_13-04-2023_18-23-34.jpg";
        $private_file = "/PLIPL068/onboarding_documents/voterIdB090_22-03-2023 15-47-22.jpg";
        //dd(file(storage_path('employees/'.$private_file)));
        return response()->file(storage_path('employees/' . $private_file));
    }


    public function viewBASE64_PrivateFile()
    {
        //dd("asda");

        //$private_file = "B090/onboarding_documents/AadharCardBack_B090_13-04-2023_18-23-34.jpg";
        $private_file = "PLIPL068/profile_pics/mk.jpg";
        //dd(file(storage_path('employees/'.$private_file)));
        $output = File::get(storage_path('employees/' . $private_file));

        return base64_encode($output);
    }

    public function testingpdf()
    {
        $client_name = 'brandavatar';
        $viewfile_appointmentletter = 'vmt_appointment_templates.mailtemplate_appointmentletter_' . $client_name;
        $html = view($viewfile_appointmentletter);

        $pdf = new Dompdf();
        $pdf->loadHtml($html, 'UTF-8');
        //    dd($pdf);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream($client_name . '.pdf');
    }
    public function fileUploadingTest(Request $request)
    {
        dd($request->all());
        $emp_code = 'SA300';
        $date = date('d-m-Y H-i-s');
        $fileName = 'aadhar_' . $emp_code . '_' . $date . '.' . $request->file->extension();
        $path = 'employee/emp_';

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $emp_document_path = Storage::disk('private');

        dd(File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true));
        if (!$emp_document_path->exists('Emp_code')) {
            File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true);
        }
        $filePath = $request->file->storeAs('Emp_code', $fileName, 'private');
        $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
        $fileModel->file_path = '/storage/' . $filePath;
        $fileModel->save();
        return back()
            ->with('success', 'File has been uploaded.')
            ->with('file', $fileName);
    }

    public function viewpdf()
    {
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

        $base64 = base64_encode($pathToFile);
        $image_data = 'data:' . mime_content_type($pathToFile) . ';base64,' . $base64;
        // dd( $image_data);
        return view('testing', compact('pathToFile', 'image_data', 'base64'));
    }


    public function retriveFiles(Request $request)
    {
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
    public function mailTest_sendAppointmentLetter(Request $request, VmtEmployeeService $employeeService)
    {

        $to_email = $request->email;
        $employeeData = array();

        //Add dummy data
        $employeeData['employee_name'] = "TestUser";
        $employeeData['employee_code'] = "ABS001";
        $employeeData['email'] = "karthigaiselvan28072000@gmail.com";

        $employeeData['basic'] = 10000;
        $employeeData['hra'] = 10000;
        $employeeData['special_allowance'] = 10000;
        $employeeData["basic"] = 10000;
        $employeeData["statutory_bonus"] = 10000;
        $employeeData["child_education_allowance"] = 10000;
        $employeeData["food_coupon"] = 10000;
        $employeeData["lta"] = 10000;
        $employeeData["special_allowance"] = 10000;
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

    public function investmenttesting()
    {
        $investment_formname = "invertment form 1";

        //Get investment form
        //$form_id = VmtInvestmentForm::where('form_name',$investment_formname)->first()->id;

        $inv_form_details = VmtInvestmentForm::join('vmt_investment_form_secpat', 'vmt_investment_form_secpat.form_id', '=', 'vmt_investment_forms.id')
            ->join('vmt_investment_section_particulars', 'vmt_investment_section_particulars.id', '=', 'vmt_investment_form_secpat.sec_pat_id') //Get sections_particulars id
            ->join('vmt_investment_sections', 'vmt_investment_sections.id', '=', 'vmt_investment_section_particulars.section_id') // Get Sections
            ->join('vmt_investment_particulars', 'vmt_investment_particulars.id', '=', 'vmt_investment_section_particulars.particular_id') // Get Particular id
            ->join('vmt_inv_fsp_popups', 'vmt_inv_fsp_popups.fsp_id', '=', 'vmt_investment_form_secpat.id')
            ->join('vmt_inv_emp_fsp_popups', 'vmt_inv_emp_fsp_popups.fsp_popups_id', '=', 'vmt_inv_fsp_popups.id')
            ->join('vmt_inv_popup_fields', 'vmt_inv_popup_fields.id', '=', 'vmt_inv_fsp_popups.popupfield_id')
            ->join('vmt_inv_popup_list', 'vmt_inv_popup_list.id', '=', 'vmt_inv_popup_fields.popups_list_id')
            ->join('vmt_emp_investments_dec_amt', 'vmt_emp_investments_dec_amt.form_sectionparticular_id', '=', 'vmt_investment_form_secpat.id')



            // ->where('vmt_investment_forms.form_name',$investment_formname)
            ->get([
                'vmt_investment_sections.section_name as section_name',
                'vmt_investment_particulars.particular_name as particular_name',
                'vmt_investment_particulars.references as references',
                'vmt_investment_particulars.amount_max_limit as amount_max_limit',
                'vmt_inv_popup_list.popups_list as popup_name',
                'vmt_inv_popup_fields.field_name as field_name',
                'vmt_inv_emp_fsp_popups.popup_value as popup_value',
                'vmt_inv_emp_fsp_popups.user_id as User_id',
                'vmt_emp_investments_dec_amt.declaration_amount as Declaration_amount',

            ]);
        // dd($inv_form_details);

        return ($inv_form_details->toArray());
        //   dd($inv_form_details->toArray());


        // $siimm2 = VmtInvestmentForm_SectionParticulars::join('vmt_emp_investments_dec_fields', 'vmt_investment_form_secpat.id', '=', 'vmt_emp_investments_dec_fields.form_sectionparticular_id')
        //     ->join('vmt_emp_investments_dec_amt', 'vmt_investment_form_secpat.id', '=', 'vmt_emp_investments_dec_amt.form_sectionparticular_id')
        //     ->first();

        // dd([$invesform, $invesdec, $invessec_pat, $investsec, $investparticular]);
    }

    public function testSendBulkMail()
    {

        $array_mail = ["sheltonfdo23@gmail.com", "praveenkumar.techdev@gmail.com"];

        $VmtGeneralInfo = VmtGeneralInfo::first();
        $image_view = url('/') . $VmtGeneralInfo->logo_img;

        $response  = array();
        try {

            foreach ($array_mail as $recipient) {
                $isSent = \Mail::to($recipient)->send(new WelcomeMail("emp_code 123", 'Abs@123123', request()->getSchemeAndHttpHost(), "", $image_view));

                $temp[$recipient] = $isSent;

                array_push($response, $temp);
            }

            return response()->json([
                "output" => $response
            ]);
        } catch (\Exception $e) {
            dd("Error : " . $e);
        }
    }

    public function exportattenance(Request $request)
    {
        $users = User::all()->toArray();

        //  return $users;
        // dd($users);
        // dd(gettype($users));

        return Excel::download(new AttenanceWorkShifttime($users), 'testings.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function downloadPaySlip_pdfView(Request $request)
    {

        if (empty($request->uid)) {
            if (empty($request->user_code)) {
                $user_code = auth()->user()->user_code;
            } else
                $user_code = $request->user_code;
        } else {
            $user_code = User::find(Crypt::decryptString($request->uid))->user_code;
            //dd("Enc User details from request : ".$user);
        }
        $user_id = User::where('user_code', $user_code)->first()->id;
        $month = $request->month;
        $year = $request->year;
        $user = null;

        //If empty, then show current user profile page
        if (empty($user_id)) {
            $user = auth()->user();
        } else {
            $user = User::find($user_id);
        }

        $data['employee_payslip'] = VmtEmployeePaySlip::where('user_id', $user_id)
            ->whereMonth('payroll_month', $month)
            ->whereYear('payroll_month', $year)->first();
        // dd($data['employee_payslip']);

        $data['employee_name'] = $user->name;
        // dd( $data['employee_name']);
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id', $user->id)->first();
        $data['employee_details'] = VmtEmployee::where('userid', $user->id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id', $user->id)->first();

        $query_client = VmtClientMaster::find($user->client_id);

        $data['client_logo'] = $query_client->client_logo;
        $client_name = $query_client->client_name;

        $processed_clientName = strtolower(str_replace(' ', '', $client_name));

        //dd($client_name);
        //$html =  view('vmt_payslipTemplate', $data);
        //dd($data['employee_statutory_details']->uan_number)


        // $pdf = PDF::loadView('vmt_payslip_templates.template_payslip_brandavatar', $data);

        $html = view('vmt_payslip_templates.template_payslip_' . $processed_clientName, $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadhtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        //$response=base64_encode($pdf->stream([$client_name.'.pdf']));
        $response = base64_encode($pdf->output([$client_name . '.pdf']));;

        return response()->json([
            'status' => 'success',
            'message' => "",
            'data' => $response
        ]);

        // Mail::send('vmt_payslip_templates.template_payslip_brandavatar', $data, function ($message) use ($data, $pdf) {

        //     $message->to('sathishrain2001@gmail', 'sathishrain2001@gmail.com')

        //         ->subject($data['employee_name'])

        //         ->attachData($pdf->output(), "text.pdf");

        // });

        //  dd('Mail sent successfully');
    }

    public function testinginvest(Request $request)
    {

        // dd($request->all());

        //   $simma = new vmtInvEmp_Fsp_Popups;
        //   $simma->user_id = ('141');
        //   $simma->fsp_popups_id = ('2');
        //   $simma->popup_value = $request->input('from_month');
        //   $simma->popup_value = $request->input('to_month');
        //   $simma->save();

        $createMultipleUsers = [
            ['user_id' => '141', 'fsp_popups_id' => '1', 'popup_value' => $request->input('from_month')],
            ['user_id' => '141', 'fsp_popups_id' => '2', 'popup_value' => $request->input('to_month')],
            ['user_id' => '141', 'fsp_popups_id' => '5', 'popup_value' => $request->input('city')],
            ['user_id' => '141', 'fsp_popups_id' => '6', 'popup_value' => $request->input('totalRent')],
            ['user_id' => '141', 'fsp_popups_id' => '7', 'popup_value' => $request->input('land_lard')],
            ['user_id' => '141', 'fsp_popups_id' => '8', 'popup_value' => $request->input('landpan')],
            ['user_id' => '141', 'fsp_popups_id' => '9', 'popup_value' => $request->input('address')],

        ];

        vmtInvEmp_Fsp_Popups::insert($createMultipleUsers);





        return 'save successfully';
    }


    public function importexcell(Request $request)
    {
        // dd($request->all());
        $invform = new VmtInvForm;
        $invform->form_name = $request->form_name;
        $invform->save();

        Excel::import(new VmtInvSectionImport($invform->id), $request->file);



        return "save successfully";
    }


    public function testinginestmentsection()
    {


        $query_details = VmtInvFEmpAssigned::join('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.f_emp_id', '=', 'vmt_inv_f_emp_assigned.id')
            ->join('vmt_inv_formsection', 'vmt_inv_formsection.id', '=', 'vmt_inv_emp_formdata.fs_id')
            ->join('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
            ->join('vmt_inv_form', 'vmt_inv_form.id', '=', 'vmt_inv_formsection.form_id')
            ->where('form_name', 'inv form1')
            ->get([
                'form_name',
                'vmt_inv_f_emp_assigned.user_id',
                'vmt_inv_section.section',
                'vmt_inv_section.particular',
                'vmt_inv_section.reference',
                'vmt_inv_section.max_amount',
                'vmt_inv_emp_formdata.dec_amount',
                'vmt_inv_f_emp_assigned.year',

            ])->toArray();

        dd($query_details);
















        // $simma =VmtInvForm::join('vmt_inv_formsection','vmt_inv_formsection.form_id','=','vmt_inv_form.id')
        //                     ->join('vmt_inv_f_emp_assigned','vmt_inv_f_emp_assigned.form_id','=','vmt_inv_form.id')
        //                     ->join('vmt_inv_emp_formdata','vmt_inv_emp_formdata.f_emp_id','=','vmt_inv_f_emp_assigned.id')
        //                     ->join('vmt_inv_section','vmt_inv_section.id','=','vmt_inv_formsection.section_id')
        // ->join('vmt_inv_emp_formdata','vmt_inv_formsection.id','=','vmt_inv_emp_formdata.fs_id')
        // ->get();


        //  dd($simma->toArray());

        //  return $simma ;


    }

    public function testEmployeeDocumentsJoin(Request $request){
        //$response = VmtDocuments::all()->toArray();

        $response = VmtDocuments::leftJoin('vmt_employee_documents','vmt_employee_documents.doc_id','=','vmt_documents.id')
                    ->where('vmt_employee_documents.user_id','266')
                    ->orWhereNull('vmt_employee_documents.id')
                    ->get()
                    ->toArray();

        dd($response);
    }
}
