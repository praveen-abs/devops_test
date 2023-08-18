<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtInvEmpFormdata;
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
use App\Models\VmtInvFormSection;
use Carbon\Carbon;
use App\Models\VmtEmployeePaySlipV2;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use App\Services\VmtEmployeeService;
use App\Services\VmtAttendanceService;
use App\Mail\WelcomeMail;
use App\Models\VmtDocuments;
use App\Jobs\sendemailjobs;
use Illuminate\Support\Facades\Validator;


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

        // $array_mail = ["sheltonfdo23@gmail.com"];

        // $client_id=User::where('user_code',$user_code)->first();

        // $VmtClientMaster = VmtClientMaster::where('id',$client_id->client_id)->first();

        // $image_view = url('/') . $VmtClientMaster->client_logo;

        // $response = array();
        // try {

        //     foreach ($array_mail as $recipient) {
                $isSent = \Mail::to('sheltonfdo23@gmail.com')->send(new WelcomeMail());

                return $isSent ? "Success" : "failure";

                // $temp[$recipient] = $isSent;

    //             array_push($response, $temp);
    //         }

    //         return response()->json([
    //             "output" => $response
    //         ]);
    //     } catch (\Exception $e) {
    //         dd("Error : " . $e);
    //     }
    }

    public function sendHTMLEmail(Request $request) {

        try{

            $validator = Validator::make(
                $request->all(),
                $rules = [
                    "email" => 'required',
                ],
                $messages = [
                    "required" => "Field :attribute is missing",
                ]
            );

            if($validator->fails()){
                return response()->json([
                        'status' => 'failure',
                        'message' => $validator->errors()->all()
                ]);
            }

            $isSent = \Mail::to($request->email)->send(new TestEmail($request->email));

            return "success";
        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "",
                "data" => $e->getMessage(),
            ]);
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

        $payroll_month= VmtPayroll::whereMonth('payroll_date', $month)
                    ->whereYear('payroll_date', $year)->where('client_id',$query_user->client_id)->first();
            //dd(payroll_month);

            $emp_payslip_id =VmtEmployeePayroll::where('user_id',$user_id)->where('payroll_id',$payroll_month->id)->first()->id;

            $data['employee_payslip'] = VmtEmployeePaySlipV2::where('emp_payroll_id',$emp_payslip_id)->first();

            $data['emp_payroll_month'] = $payroll_month;

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
        $response = base64_encode($pdf->output([$client_name . '.pdf']));
        ;

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

        public function numberToWord($num)
        {
            $num    = ( string ) ( ( int ) $num );
            if( ( int ) ( $num ) && ctype_digit( $num ) )
            {
                $words  = array( );
                $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );

                $list1  = array('','one','two','three','four','five','six','seven',
                    'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                    'fifteen','sixteen','seventeen','eighteen','nineteen');

                $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                    'seventy','eighty','ninety','hundred');

                $list3  = array('','thousand','million','billion','trillion',
                    'quadrillion','quintillion','sextillion','septillion',
                    'octillion','nonillion','decillion','undecillion',
                    'duodecillion','tredecillion','quattuordecillion',
                    'quindecillion','sexdecillion','septendecillion',
                    'octodecillion','novemdecillion','vigintillion');

                $num_length = strlen( $num );

                $levels = ( int ) ( ( $num_length + 2 ) / 3 );

                $max_length = $levels * 3;

                $num    = substr( '00'.$num , -$max_length );

                $num_levels = str_split( $num , 3 );

                foreach( $num_levels as $num_part )

                {
                    $levels--;

                    $hundreds   = ( int ) ( $num_part / 100 );

                    $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );

                    $tens       = ( int ) ( $num_part % 100 );

                    $singles    = '';

                    if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )

                {
                    $commas = $commas - 1;
                }

                $words  = implode( ', ' , $words );

                $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );

                if( $commas )
                {
                    $words  = str_replace( ',' , ' ' , $words );
                }
                return $words;
            }
            else if( ! ( ( int ) $num ) )
            {
                return 'Zero';
            }
            return '';
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


        $query_form_details = VmtInvForm::where('form_name', 'investment 1')->first();
        // dd( $query_form_details);
        //Get the query structure
        //PSC0060

        $user_id = User::where('user_code', 'SA100')->first()->id;
        $year = "2023-01-01";

        //get assigned form id
        $query_fempAssigned_table = VmtInvFEmpAssigned::where('user_id', $user_id)
           // ->where('year', $year)
            ->first();

        $assigned_form_id = $query_fempAssigned_table->form_id;
        $f_emp_id = $query_fempAssigned_table->id;

        //Get the form template
        $query_inv_form_template = VmtInvFormSection::leftjoin('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
            ->leftjoin('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
             ->leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
            ->leftjoin('vmt_inv_f_emp_assigned','vmt_inv_f_emp_assigned.id','=','vmt_inv_emp_formdata.f_emp_id')
         //  ->where('vmt_inv_formsection.form_id', $assigned_form_id)

            ->get(
                // [
                //     'vmt_inv_formsection.section_id',
                //     'vmt_inv_section.section',
                //     'vmt_inv_section.particular',
                //     'vmt_inv_section.reference',
                //     'vmt_inv_section.max_amount',
                //     'vmt_inv_section_group.section_group',
                //     'vmt_inv_formsection.id as fs_id',

                // ]
            )->toArray();

            dd($query_inv_form_template);
    // employee declaration amount
        $inv_emp_value = VmtInvFEmpAssigned::leftjoin('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.f_emp_id', '=', 'vmt_inv_f_emp_assigned.id')
            ->where('vmt_inv_f_emp_assigned.user_id', $user_id)->get();


                    // json decode popup value;
            $popdecode = array();
            foreach($inv_emp_value as $details_tem){

                    $rentalDetail['id'] =$details_tem["id"];
                    $rentalDetail['user_id'] =$details_tem["user_id"];
                    $rentalDetail['form_id'] =$details_tem["form_id"];
                    $rentalDetail['f_emp_id'] = $details_tem["f_emp_id"];
                    $rentalDetail['year'] = $details_tem["year"];
                    $rentalDetail['fs_id'] = $details_tem["fs_id"];
                    $rentalDetail['dec_amount'] = $details_tem["dec_amount"];
                    $rentalDetail['json_popups_value'] = (json_decode($details_tem["json_popups_value"], true));
                    array_push($popdecode,$rentalDetail);

            };

        $arr = array();
        foreach ($query_inv_form_template as $single_template) {
            foreach ($popdecode as $single_emp_env_value) {

                  if($single_template['fs_id']==$single_emp_env_value['fs_id']){
                    $single_template['id']=$single_emp_env_value['id'];
                    $single_template['user_id']=$single_emp_env_value['user_id'];
                    $single_template['form_id']=$single_emp_env_value['form_id'];
                    $single_template['year']=$single_emp_env_value['year'];
                    $single_template['f_emp_id']=$single_emp_env_value['f_emp_id'];
                    $single_template['dec_amount']=$single_emp_env_value['dec_amount'];
                    $single_template['json_popups_value']=$single_emp_env_value['json_popups_value'];
                  }
            }
            array_push($arr, $single_template);
        }

       $query_inv_form_template = $arr;


        $count = 0;
        foreach ($query_inv_form_template as $single_inv_form_template) {

            if (!array_key_exists($single_inv_form_template["section_group"], $query_inv_form_template)) {
                $query_inv_form_template[$single_inv_form_template["section_group"]] = array();
                array_push($query_inv_form_template[$single_inv_form_template["section_group"]], $single_inv_form_template);
            } else {
                array_push($query_inv_form_template[$single_inv_form_template["section_group"]], $single_inv_form_template);

            }

            //remove from outer json
            unset($query_inv_form_template[$count]);

            $count++;

        }
        dd($query_inv_form_template);



        $response["form_name"] = $query_form_details->form_name;
        $response["form_details"] = $query_inv_form_template;





        return response()->json([
            "status" => "success",
            "message" => "",
            "data" => $response,
        ]);


    }


    public function testEmployeeDocumentsJoin(Request $request)
    {
        // $user_id = User::where('user_code', auth()->user()->user_code)->first()->id;

        $v_form_template =VmtInvFormSection::join('vmt_inv_section', 'vmt_inv_section.id', '=', 'vmt_inv_formsection.section_id')
        ->join('vmt_inv_section_group', 'vmt_inv_section_group.id', '=', 'vmt_inv_section.sectiongroup_id')
         ->join('vmt_inv_emp_formdata', 'vmt_inv_emp_formdata.fs_id', '=', 'vmt_inv_formsection.id')
        ->join('vmt_inv_f_emp_assigned','vmt_inv_f_emp_assigned.id','=','vmt_inv_emp_formdata.f_emp_id')
        ->join('users','users.id','=','vmt_inv_f_emp_assigned.user_id')->orderBy('name', 'asc')
        ->get();
            return  $v_form_template;

    }

    public function jobsmail()
    {

        $jobs = (new sendemailjobs())
            ->delay(Carbon::now()->addSeconds(5));

        dispatch($jobs);

        return "mail send successfully";
    }

    public function test_getTeamEmployeesLeaveDetails(Request $request,  VmtAttendanceService $serviceVmtAttendanceService){
        return $serviceVmtAttendanceService->getTeamEmployeesLeaveDetails("MC0005",5, 2023, ["Approved","Rejected","Pending"] );
    }

    public function test_getAppointmentTemplates(){

        $data=
            [
            "can_onboard_employee" => "1",
            "emp_client_code" => "IMA",
            "employee_code" => "IMA43857",
            "doj" => "2023-08-14",
            "ctc_in_words" => "Hiii",
            "aadhar_number" => "4134 3214 3214",
            "passport_number" => null,
            "bank_id" => "1",
            "employee_name" => "vishnu",
            "gender" => "Male",
            "pan_number" => "kfoPi4354i",
            "passport_date" => null,
            "AccountNumber" => "524354354543",
            "dob" => "2000-01-17",
            "mobile_number" => "4325245435",
            "dl_no" => "353453",
            "blood_group_name" => "2",
            "bank_ifsc" => "INIB000K001",
            "marital_status" => "1",
            "email" => "vishnu@abshrms.com",
            "nationality" => "Indian",
            "physically_challenged" => "no",
            "current_address_line_1" => "dsasdsa",
            "current_address_line_2" => "sdsa",
            "current_country" => "5",
            "current_state" => "4",
            "current_city" => "Chennai",
            "current_pincode" => "213123",
            "permanent_address_line_1" => "dsasdsa",
            "permanent_address_line_2" => "sdsa",
            "permanent_country" => "5",
            "permanent_state" => "4",
            "permanent_city" => "Chennai",
            "permanent_pincode" => "213123",
            "department" => "1",
            "process" => null,
            "designation" => "IT",
            "cost_center" => null,
            "probation_period" => null,
            "work_location" => "Chennai",
            "l1_manager_code_id" => "PSC0060",
            "holiday_location" => null,
            "officical_mail" => null,
            "official_mobile" => null,
            "emp_notice" => null,
            "confirmation_period" => "2023-08-17",
            "father_name" => "Appa",
            "dob_father" => "1990-01-09",
            "father_gender" => "Male",
            "father_age" => "33",
            "mother_name" => "Amma",
            "dob_mother" => "1992-05-26",
            "mother_gender" => "Female",
            "mother_age" => "31",
            "spouse_name" => null,
            "wedding_date" => null,
            "spouse_gender" => "Female",
            "dob_spouse" => null,
            "no_of_children" => null,
            "basic" => "2547192",
            "hra" => "1273596",
            "statutory_bonus" => "32432",
            "child_education_allowance" => "34",
            "food_coupon" => "324",
            "lta" => "324",
            "special_allowance" => "1240158",
            "other_allowance" => "324",
            "gross" => "5094384",
            "epf_employer_contribution" => "1800",
            "graduity" => "324",
            "insurance" => "323.75",
            "cic" => "5096831",
            "epf_employee" => "1800",
            "esic_employee" => "0",
            "esic_employer_contribution" => "0",
            "professional_tax" => null,
            "labour_welfare_fund" => null,
            "net_income" => "5092584",
            "releivingDoc" => null,
            "voterId" => null,
            "passport" => null,
            "dlDoc" => null,
            "basic_monthly" => 13143,
        "basic_yearly" => 10,
        "hra_monthly" => 253255,
        "hra_yearly" => 9683968,
        "spl_allowance_monthly" => 336363,
        "spl_allowance_yearly" => 53366,
        "gross_monthly" => 2664666,
        "gross_yearly" => 43666,
        "employer_epf_monthly" => 251515,
        "employer_epf_yearly" => 25355,
        "employer_esi_monthly" => 2555,
        "employer_esi_yearly" => 5232525,
        "ctc_monthly"=> 25255,
        "ctc_yearly" => 2525255,
        "employee_epf_monthly" =>  2353436,
        "employee_epf_yearly" => 35255,
        "employee_esi_monthly" => 2555,
        "employee_esi_yearly" => 5232525,
        "employer_pt_monthly" => 35255525252,
        "employer_pt_yearly" =>  532525525,
        "net_take_home_monthly" => 352535,
        "net_take_home_yearly" => 52235,
            ];

        $VmtClientMaster = VmtClientMaster::first();
        $image_view = url('/') . $VmtClientMaster->client_logo;
        $appoinmentPath = "";
        $client_name = strtolower(str_replace(' ', '_', sessionGetSelectedClientName()));
//dd($client_name);
        $html = view('appointment_mail_templates.appointment_Letter_' . $client_name,$data);

                        $options = new Options();
                        $options->set('isHtml5ParserEnabled', true);
                        $options->set('isRemoteEnabled', true);

                        $pdf = new Dompdf($options);
                        $pdf->loadhtml($html, 'UTF-8');
                        $pdf->setPaper('A4', 'portrait');
                        $pdf->render();

                        $docUploads =  $pdf->output();
                        $client_id =sessionGetSelectedClientid();

                        $VmtClientMaster = VmtClientMaster::where("id",$client_id)->first();
                        $image_view = url('/') . $VmtClientMaster->client_logo;

                        // dd( $docUploads);
                         $filename = 'appoinment_letter_' . $data['employee_name'] . '_' . time() . '.pdf';
                         $file_path = public_path('appoinmentLetter/'.$filename);
                         file_put_contents($file_path, $docUploads);
                         $appoinmentPath = public_path('appoinmentLetter/') . $filename;
                    $isSent = \Mail::to('vishnu@abshrms.com')->send(new WelcomeMail("ABS123", 'Abs@123123', request()->getSchemeAndHttpHost(),  $appoinmentPath, $image_view,$VmtClientMaster->client_code));

                    }

                }





