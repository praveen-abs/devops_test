<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\AbsSalaryProjection;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtInvEmpFormdata;
use App\Models\vmtInvEmp_Fsp_Popups;
use App\Models\VmtInvForm;
use App\Models\VmtPayroll;
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
use App\Models\VmtOrgTimePeriod;
use App\Models\VmtInvestmentParticulars;
use App\Models\VmtEmployeePayroll;
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
use App\Http\Controllers\VmtEmployeeBirthdayController;
use Carbon\CarbonPeriod;
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

        $VmtClientMaster = VmtClientMaster::where('id',$client_id->client_id)->first();

        $image_view = url('/') . $VmtClientMaster->client_logo;

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
            "ctc_in_words" => "one lakh forty-seven thousand four hundred sixty-three",
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
            'food_coupon_monthly'=> 0,
            'food_coupon_yearly' =>0,
            'lta_monthly' => 0,
            'lta_yearly' => 0,
            'CEA_yearly' => 0,
            'CEA_monthly' => 0,
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
        $html = view('dynamic_payslip_templates.appointment_letter_langro_india_pvt_ltd',$data);
    //    return  $html;
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

     public function Tesingtdsworksheet(Request $request){


            // $html = view('dynamic_payslip_templates.dynamic_payslip_v2');

            // // return $html;

            // $options = new Options();
            // $options->set('isHtml5ParserEnabled', true);
            // $options->set('isRemoteEnabled', true);

            // $pdf = new Dompdf($options);
            // $pdf->loadhtml($html, 'UTF-8');
            // $pdf->setPaper('A4', 'portrait');
            // $pdf->render();

            // $docUploads =  $pdf->stream();

            $start_date = '2023-07-01';
            $single_users = '194';

            $payslip_id = VmtPayroll::join('vmt_emp_payroll','vmt_emp_payroll.payroll_id','=','vmt_payroll.id')
                    ->where('vmt_payroll.payroll_date', $start_date)
                    ->where('vmt_emp_payroll.user_id', $single_users)
                    ->first([
                        'vmt_emp_payroll.id as id'
                    ]);

                    // dd($payslip_id);


         $payslip_details  = AbsSalaryProjection::where('vmt_emp_payroll_id',$payslip_id->id)->get()->toarray();

         dd($payslip_details);



        }
     public function tdsProjection(Request $request){

try{
        DB::table('abs_salary_projection')->truncate();
    $client_details = VmtClientMaster::Where('client_fullname',"!=","All")->get(['id','client_name'])->toarray();


    for($i=0;$i<count($client_details);$i++){


        $timeperiod = VmtOrgTimePeriod::where('status', '1')->first();
        $start_date = Carbon::parse($timeperiod->start_date)->format('Y-m-d');

        $end_date = Carbon::parse($timeperiod->end_date)->format('Y-m-01');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        $current_date = Carbon::now();


        $existing_employee_data = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                    ->where('client_id',$client_details[$i]['id'] )->where('users.active',"1")->where('users.is_ssa',"0")->get(['users.id','vmt_employee_details.doj','users.client_id'])->toarray();
//dd($existing_employee_data);


     foreach ($existing_employee_data as $key => $single_users) {


               $fin_end_date = Carbon::parse($timeperiod->end_date);

                    if($single_users['doj'] < $start_date){

                        $fin_start_date = Carbon::parse($timeperiod->start_date);


                    }else if(Carbon::parse($single_users['doj'])->format('m') != Carbon::parse($current_date)->format('m')){

                         $fin_start_date = Carbon::parse($single_users['doj']);

                    }

            $date_range = CarbonPeriod::create($fin_start_date->startOfMonth()->format('Y-m-d'),'1 month',$current_date->subMonths()->endOfMonth()->format('Y-m-d'));


            $finyear_date_range = CarbonPeriod::create($fin_start_date->startOfMonth()->format('Y-m-d'),'1 month',$fin_end_date->endOfMonth() ->format('Y-m-d'));


            $previous_month_payslip_date = array();
            $financial_year_date = array();

                        foreach ($date_range  as $key => $single_date) {

                            $payroll_date = $single_date->format('Y-m-d');

                            $previous_month_payslip_date[]=$payroll_date;
                        }

                        foreach ($finyear_date_range  as $key => $single_fin_date) {

                            $fin_year_date = $single_fin_date->format('Y-m-d');

                            $financial_year_date[]=$fin_year_date;
                        }
                //dd($previous_month_payslip_date, $financial_year_date);

    foreach ($previous_month_payslip_date as $key => $single_month) {

              foreach ($financial_year_date as $key => $single_fin_month) {

             $emp_payroll ='';

            $payroll_date = VmtPayroll::where('payroll_date',  $single_month)->where('client_id',$single_users['client_id'] )->first();

            if(!empty($payroll_date)){
                   $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $single_users['id'])->first();

            }


            $res = array();

                if ($single_fin_month == $single_month) {

                    $payslip_id = VmtPayroll::join('vmt_emp_payroll','vmt_emp_payroll.payroll_id','=','vmt_payroll.id')
                                            ->where('vmt_payroll.payroll_date',  $single_month)
                                            ->where('vmt_emp_payroll.user_id', $single_users['id'])
                                            ->first(['vmt_emp_payroll.id as id']);
                    if(!empty($payslip_id)){

                        $payslip_details  = VmtEmployeePaySlipV2::where('emp_payroll_id',$payslip_id->id)->first();
                    }

                    if (!empty($payslip_details)) {

                        if(!empty($emp_payroll)){

                        $salary_project_data = new AbsSalaryProjection;
                        $salary_project_data->vmt_emp_payroll_id = $emp_payroll->id;
                        $salary_project_data->payroll_months = $single_fin_month;
                        $salary_project_data->basic = $payslip_details['basic'];
                        $salary_project_data->hra = $payslip_details['hra'];
                        $salary_project_data->child_edu_allowance = $payslip_details['child_edu_allowance'];
                        $salary_project_data->spl_alw = $payslip_details['spl_alw'];
                        $salary_project_data->total_fixed_gross = $payslip_details['total_fixed_gross'];
                        $salary_project_data->month_days = $payslip_details['month_days'];
                        $salary_project_data->worked_Days = $payslip_details['worked_Days'];
                        $salary_project_data->arrears_Days = $payslip_details['arrears_Days'];
                        $salary_project_data->lop = $payslip_details['lop'];
                        $salary_project_data->earned_basic = $payslip_details['earned_basic'];
                        $salary_project_data->basic_arrear = $payslip_details['basic_arrear'];
                        $salary_project_data->earned_hra = $payslip_details['earned_hra'];
                        $salary_project_data->hra_arrear = $payslip_details['hra_arrear'];
                        $salary_project_data->earned_child_edu_allowance = $payslip_details['earned_child_edu_allowance'];
                        $salary_project_data->earned_child_edu_allowance = $payslip_details['child_edu_allowance_arrear'];
                        $salary_project_data->earned_spl_alw = $payslip_details['earned_spl_alw'];
                        $salary_project_data->earned_spl_alw = $payslip_details['spl_alw_arrear'];
                        $salary_project_data->overtime = $payslip_details['overtime'];
                        $salary_project_data->total_earned_gross = $payslip_details['total_earned_gross'];
                        $salary_project_data->pf_wages = $payslip_details['pf_wages'];
                        $salary_project_data->pf_wages_arrear_epfr = $payslip_details['pf_wages_arrear_epfr'];
                        $salary_project_data->epfr = $payslip_details['epfr'];
                        $salary_project_data->epfr_arrear = $payslip_details['epfr_arrear'];
                        $salary_project_data->edli_charges = $payslip_details['edli_charges'];
                        $salary_project_data->edli_charges_arrears = $payslip_details['edli_charges_arrears'];
                        $salary_project_data->pf_admin_charges = $payslip_details['pf_admin_charges'];
                        $salary_project_data->pf_admin_charges_arrears = $payslip_details['pf_admin_charges_arrears'];
                        $salary_project_data->employer_esi = $payslip_details['employer_esi'];
                        $salary_project_data->employer_lwf = $payslip_details['employer_lwf'];
                        $salary_project_data->ctc = $payslip_details['ctc'];
                        $salary_project_data->epf_ee = $payslip_details['epf_ee'];
                        $salary_project_data->employee_esic = $payslip_details['employee_esic'];
                        $salary_project_data->prof_tax = $payslip_details['prof_tax'];
                        $salary_project_data->income_tax = $payslip_details['income_tax'];
                        $salary_project_data->sal_adv = $payslip_details['sal_adv'];
                        $salary_project_data->canteen_dedn = $payslip_details['canteen_dedn'];
                        $salary_project_data->other_deduc = $payslip_details['other_deduc'];
                        $salary_project_data->lwf = $payslip_details['lwf'];
                        $salary_project_data->total_deductions = $payslip_details['total_deductions'];
                        $salary_project_data->net_take_home = $payslip_details['net_take_home'];
                        $salary_project_data->rupees = $payslip_details['rupees'];
                        $salary_project_data->el_opn_bal = $payslip_details['el_opn_bal'];
                        $salary_project_data->availed_el = $payslip_details['availed_el'];
                        $salary_project_data->balance_el = $payslip_details['balance_el'];
                        $salary_project_data->sl_opn_bal = $payslip_details['sl_opn_bal'];
                        $salary_project_data->availed_sl = $payslip_details['availed_sl'];
                        $salary_project_data->balance_sl = $payslip_details['balance_sl'];
                        $salary_project_data->rename = $payslip_details['rename'];
                        $salary_project_data->greetings = $payslip_details['greetings'];
                        $salary_project_data->stats_bonus = $payslip_details['stats_bonus'];
                        $salary_project_data->email = $payslip_details['email'];
                        $salary_project_data->earned_stats_bonus = $payslip_details['earned_stats_bonus'];
                        $salary_project_data->earned_stats_arrear = $payslip_details['earned_stats_arrear'];
                        $salary_project_data->travel_conveyance = $payslip_details['travel_conveyance'];
                        $salary_project_data->other_earnings = $payslip_details['other_earnings'];
                        $salary_project_data->save();
                           }

                    }else{
                        return 'no payslip data found for '.$single_users['id'].'user'  ." ".$single_month." ".$single_fin_month;
                    }

                    array_push($res,$payslip_details);
                } else {

                    $compensatory_details = User::join('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')->where('user_id', $single_users['id'])->first();

                    $salary_project_data = new AbsSalaryProjection;

                    if(!empty($emp_payroll)){

                        $salary_project_data->vmt_emp_payroll_id = $emp_payroll->id;
                        $salary_project_data->payroll_months =$single_fin_month;
                        $salary_project_data->basic = $payslip_details['basic']??0;
                        $salary_project_data->hra = $payslip_details['hra']??0;
                        $salary_project_data->child_edu_allowance = $payslip_details['child_education_allowance']??0;
                        $salary_project_data->spl_alw = $payslip_details['spl_alw']??0;
                        $salary_project_data->total_fixed_gross = $payslip_details['gross']??0;
                        $salary_project_data->month_days = $payslip_details['month_days']??0;
                        $salary_project_data->worked_Days = $payslip_details['worked_Days']??0;
                        $salary_project_data->arrears_Days = $payslip_details['arrears_Days']??0;
                        $salary_project_data->lop = $payslip_details['lop']??0;
                        $salary_project_data->earned_basic = $payslip_details['basic']??0;
                        $salary_project_data->basic_arrear = $payslip_details['basic_arrear']??0;
                        $salary_project_data->earned_hra = $payslip_details['hra']??0;
                        $salary_project_data->hra_arrear = $payslip_details['hra_arrear']??0;
                        $salary_project_data->earned_child_edu_allowance = $payslip_details['child_education_allowance']??0;
                        $salary_project_data->earned_child_edu_allowance = $payslip_details['child_edu_allowance_arrear']??0;
                        $salary_project_data->earned_spl_alw = $payslip_details['special_allowance']??0;
                        $salary_project_data->earned_spl_alw = $payslip_details['spl_alw_arrear']??0;
                        $salary_project_data->overtime = $payslip_details['overtime']??0;
                        $salary_project_data->total_earned_gross = $payslip_details['gross']??0;
                        $salary_project_data->pf_wages = $payslip_details['pf_wages']??0;
                        $salary_project_data->pf_wages_arrear_epfr = $payslip_details['pf_wages_arrear_epfr']??0;
                        $salary_project_data->epfr = $payslip_details['epfr']??0;
                        $salary_project_data->epfr_arrear = $payslip_details['epfr_arrear']??0;
                        $salary_project_data->edli_charges = $payslip_details['edli_charges']??0;
                        $salary_project_data->edli_charges_arrears = $payslip_details['edli_charges_arrears']??0;
                        $salary_project_data->pf_admin_charges = $payslip_details['pf_admin_charges']??0;
                        $salary_project_data->pf_admin_charges_arrears = $payslip_details['pf_admin_charges_arrears']??0;
                        $salary_project_data->employer_esi = $payslip_details['esic_employer_contribution']??0;
                        $salary_project_data->employer_lwf = $payslip_details['employer_lwf']??0;
                        $salary_project_data->ctc = $payslip_details['cic']??0;
                        $salary_project_data->epf_ee = $payslip_details['epf_employee']??0;
                        $salary_project_data->employee_esic = $payslip_details['esic_employee']??0;
                        $salary_project_data->prof_tax = $payslip_details['professional_tax']??0;
                        $salary_project_data->income_tax = $payslip_details['income_tax']??0;
                        $salary_project_data->sal_adv = $payslip_details['sal_adv']??0;
                        $salary_project_data->canteen_dedn = $payslip_details['canteen_dedn']??0;
                        $salary_project_data->other_deduc = $payslip_details['other_deduc']??0;
                        $salary_project_data->lwf = $payslip_details['lwf']??0;
                        $salary_project_data->total_deductions = $payslip_details['total_deductions']??0;
                        $salary_project_data->net_take_home = $payslip_details['net_income']??0;
                        $salary_project_data->rupees = $payslip_details['rupees']??0;
                        $salary_project_data->el_opn_bal = $payslip_details['el_opn_bal']??0;
                        $salary_project_data->availed_el = $payslip_details['availed_el']??0;
                        $salary_project_data->balance_el = $payslip_details['balance_el']??0;
                        $salary_project_data->sl_opn_bal = $payslip_details['sl_opn_bal']??0;
                        $salary_project_data->availed_sl = $payslip_details['availed_sl']??0;
                        $salary_project_data->balance_sl = $payslip_details['balance_sl']??0;
                        $salary_project_data->rename = $payslip_details['rename']??0;
                        $salary_project_data->greetings = $payslip_details['greetings']??0;
                        $salary_project_data->stats_bonus = $payslip_details['stats_bonus']??0;
                        $salary_project_data->email = $payslip_details['email']??0;
                        $salary_project_data->earned_stats_bonus = $payslip_details['Statutory_bonus']??0;
                        $salary_project_data->earned_stats_arrear = $payslip_details['earned_stats_arrear']??0;
                        $salary_project_data->travel_conveyance = $payslip_details['travel_conveyance']??0;
                        $salary_project_data->other_earnings = $payslip_details['other_earnings']??0;
                        $salary_project_data->save();


                    }


                    array_push($res,$compensatory_details);
            }
        }

    }
  }
}
return $response =([
                'status '=>"success",
                "message" =>"",
                "data" => ""]);

}catch(\Exception $e){
    return $response =([
        "status"=>"failure",
        "user_data" =>  $single_users['id']." ".$single_month,
        "user_month" => $single_users['id']." ".$single_month,
        "data"=>$e->getmessage()."".$e->getline()
    ]);
}

    }
}








