<?php

namespace App\Http\Controllers\Onboarding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\State;
use App\Models\Department;
use App\Models\VmtBloodGroup;
use App\Models\Bank;
use App\Models\VmtEmployee;
use App\Models\VmtMaritalStatus;
use App\Imports\VmtEmployeeManagerImport;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Imports\VmtEmployeeImport;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtClientMaster;
use App\Models\VmtMasterConfig;
use App\Models\VmtGeneralInfo;
use App\Models\Compensatory;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use App\Mail\QuickOnboardLink;
use Validator;
use PhpOffice\PhpSpreadsheet\Shared;
use Dompdf\Options;
use Dompdf\Dompdf;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\VmtEmployeeFamilyDetails;
use App\Services\VmtEmployeeService;
use App\Services\VmtEmployeeDocumentsService;
use App\Services\Admin\VmtEmployeeMailNotifMgmtService;

class VmtEmployeeOnboardingController extends Controller
{

    public function isEmployeePersonalEmailAlreadyExists(Request $request){
        //dd($request->all());
        //dd(User::where('email',$request->mail)->exists());

        if(!empty($request->mail))
            return User::where('email',$request->mail)->exists() ? "true" : "false";
        else
            return false;
    }

    public function isEmployeeCodeAlreadyExists(Request $request){
        //dd($request->all());
        //dd(User::where('email',$request->mail)->exists());

        if(!empty($request->user_code))
            return User::where('user_code',$request->user_code)->exists() ? "true" : "false";
        else
            return false;
    }
    public function isAadharNoAlreadyExists(Request $request){
        //dd($request->aadhar_number);
        //dd(User::where('email',$request->mail)->exists());

        $aadhar_number = str_replace(" ",'',$request->aadhar_number);

        if(!empty($request->aadhar_number))
            return VmtEmployee::where('aadhar_number',$aadhar_number)->exists() ? "true" : "false";
        else
            return false;
    }
    public function isPanCardAlreadyExists(Request $request){



        if(!empty($request->pan_number) && !empty($request->user_code))
        {
            $user_id = User::where('user_code', $request->user_code)->first()->id;

            //Check if pan exists for user other than given user_code user
            return VmtEmployee::where('pan_number',$request->pan_number)
                                ->where('userid','<>',$user_id)
                                ->exists() ? "true" : "false";
        }
        else
        if(!empty($request->pan_number))
            return VmtEmployee::where('pan_number',$request->pan_number)->exists() ? "true" : "false";
        else
            return false;
    }

    public function isMobileNoAlreadyExists(Request $request){
       // dd($request->all());
        //dd(User::where('email',$request->mail)->exists());

        if(!empty($request->mobile_number)){

            return VmtEmployee::where('mobile_number',$request->mobile_number)->exists() ? "true" : "false";
        }
        else
            return false;
    }
    public function isAcNoAlreadyExists(Request $request){
        //dd($request->all());
        //dd(User::where('email',$request->mail)->exists());

        if(!empty($request->mobile_number))
            return User::where('user_code',$request->AccountNumber)->exists() ? "true" : "false";
        else
            return false;
    }

    private function generateEmployeeCode()
    {
        $employeeCode_Format = VmtMasterConfig::where('config_name', '=', 'employee_code_prefix')->value('config_value') .
                               VmtMasterConfig::where('config_name', '=', 'employee_code_median')->value('config_value');

        //dd("Emp code format : " .$employeeCode_Format);

        $number_series = VmtMasterConfig::where('config_name', '=', 'employee_code_suffix_series')->value('config_value');

        //Get the recently created employee based on DOJ
        //$employee  =  User::orderBy('created_at', 'DESC')->where('user_code', 'LIKE', '%' . $employeeCode_Format . '%')->first();
        $recentlyJoinedEmployee_usercode = User::leftJoin('vmt_employee_details','vmt_employee_details.userid', '=' , 'users.id')
                                //->get('users.user_code');
                                ->orderBy('vmt_employee_details.doj','DESC')
                                ->first('users.user_code');
                               // ->get(['users.user_code', 'vmt_employee_details.doj']);


        //dd($recentlyJoinedEmployee_usercode);
        if (empty($recentlyJoinedEmployee_usercode)) {
            $maxId = (int)($number_series) + 1;
        } else {
            $ucode = (int) filter_var($recentlyJoinedEmployee_usercode, FILTER_SANITIZE_NUMBER_INT);
            $maxId  = $ucode + 1;
        }

        return $employeeCode_Format.$maxId;

    }
    public function showEmployeeOnboardingPage($user_id=null)
    {
        // Used for Quick onboarding
        //dd($request->email);

        $is_employeeCode_editable = fetchMasterConfigValue("is_employee_code_editable_in_normal_onboarding");

        $countries = Countries::all();
        $emp = VmtEmployeeOfficeDetails::all();
        $department = Department::all();
        $state = State::where('country_code','IN')->get(['id','state_name']);
        $blood_group = VmtBloodGroup::all();

        $bank = Bank::all();

        if (!empty($user_id)) {

            $employee_user  =  User::where('id', $user_id)->first();
            $employee_details  = VmtEmployee::where('userid', $employee_user->id)->first();
            $emp_office_details = VmtEmployeeOfficeDetails::where('user_id', $employee_user->id)->first();
            $compensatory = Compensatory::where('user_id', $employee_user->id)->first();
            $emp_statutory_details = VmtEmployeeStatutoryDetails::where('user_id', $employee_user->id)->first();
            //dd($employee_details);
            $empNo = '';
            if ($employee_details) {
                $empNo = $employee_user->user_code;
            }


            $allEmployeesUserCode = User::where('id','<>',$employee_user->id)
                            ->where('is_ssa', 0)->where('active', 1)->whereNotNull('user_code')->get(['user_code', 'name']);

            $assigned_l1_manager_name = User::where('user_code', $emp_office_details->l1_manager_code)->value('name');
            $emp_family_details = VmtEmployeeFamilyDetails::where('user_id', $user_id)->get();

            return view('vmt_employeeOnboarding', compact('empNo','user_id','is_employeeCode_editable','emp_family_details', 'emp_office_details', 'emp_statutory_details','employee_user','blood_group', 'employee_details', 'countries','state', 'compensatory', 'bank', 'emp', 'department', 'allEmployeesUserCode','assigned_l1_manager_name'));
        }
        else
        {
            $empNo = $this->generateEmployeeCode();

            $emp = VmtEmployeeOfficeDetails::all();
            $allEmployeesUserCode = User::where('is_ssa', 0)->where('active', 1)->whereNotNull('user_code')->get(['user_code', 'name']);
            //dd($allEmployeesCode);
            return view('vmt_employeeOnboarding', compact('empNo','is_employeeCode_editable', 'countries', 'state', 'emp', 'bank', 'department', 'allEmployeesUserCode','blood_group'));
        }
    }

    public function showNormalOnboardingPage(Request $request)
    {
        return view('onboarding.vmt_normal_onboarding_v2');
    }

    /*
        Fetches all the required data for the normal onboarding page.
        These data are shown in onboarding form. Only standard selection data are sent
    */
    public function fetchNormalOnboardingPageData(Request $request){
        $is_employeeCode_editable = fetchMasterConfigValue("is_employee_code_editable_in_normal_onboarding");

        $db_countries = Countries::all();
        $employee_office_details = VmtEmployeeOfficeDetails::all();
        $db_departments = Department::all();
        $db_indianStates = State::where('country_code','IN')->get(['id','state_name']);
        $db_bloodGroups = VmtBloodGroup::all();

        $db_banks = Bank::all();

        dd("un-implemented");
    }

    /*
        Fetches the quickonboarded emp data.


    */
    public function fetchQuickOnboardedEmployeeData(Request $request, VmtEmployeeService $employeeService){

            try{


                $user_id = Crypt::decrypt($request->encr_uid);
                $response = $employeeService->getQuickOnboardedEmployeeData($user_id);

                return response()->json($response, 200);
            }
            catch(\Exception $e)
            {
                return response()->json("Decrypt Error : ".$e->getMessage(), 500);

            }

            return $response;
    }

     // Show quick onboard form to employee
     public function showQuickOnboardForEmployee(Request $request)
     {
         if ($request->has('email')) {
             $employee  =  User::where('email', $request->email)->first();
             $clientData  = VmtEmployee::where('userid', $employee->id)->first();
             $empNo = '';
             if ($clientData) {
                 $empNo = $employee->user_code;
             }
             $countries = Countries::all();
             $compensatory = Compensatory::where('user_id', $employee->id)->first();
             $india = Countries::where('country_code', 'IN')->first();
             $emp = VmtEmployeeOfficeDetails::all();
             $emp_details = VmtEmployeeOfficeDetails::where('user_id', $clientData->id)->first();
             // dd($emp);
             $department = Department::all();
             $bank = Bank::all();

             return view('vmt_employeeOnboarding_QuickUpload', compact('empNo', 'emp_details', 'countries', 'compensatory', 'bank', 'emp', 'department'));
         }
     }

    // Showing view for uploading quick onboaring excel sheet
    public function showQuickOnboardUploadPage()
    {

        return view('vmt_quick_employee_upload');
    }

    // show bulk upload form
    public function showBulkOnboardUploadPage(Request $request)
    {
        return view('vmt_employeeOnboarding_BulkUpload');
    }


    public function processEmployeeOnboardForm_Normal_Quick(Request $request, VmtEmployeeService $employeeService)
    {



        $data=$request->all();
        $user_id =$data['employee_code'];
        //dd( $user_id);
        $response = "";
        $isEmailSent = "";
        $onboard_form_data =  array();
        //parse_str($request->all(), $onboard_form_data); (Removing this line, input from data is alreay in array)
        $onboard_form_data  = $data;
        $currentLoggedinInUser = auth()->user();
        // dd($employee_onboarding['can_onboard_employee']);


        //Check whether we are updating existing user or adding new user.

        $existingUser = User::where('user_code',$user_id);
        //dd($existingUser->exists());
        if($existingUser->exists())
        {

            //If current user is Admin, then its normal onboarding or updating existing user details.
            if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"])  && $currentLoggedinInUser->onboard_type  == "normal")
            {

                // $result = $employeeService->createOrUpdate_OnboardFormData($onboard_form_data, $request->input('can_onboard_employee'), $existingUser->first()->id);

                $result = $employeeService->createOrUpdate_OnboardFormData($onboard_form_data, $onboard_form_data['can_onboard_employee'], $existingUser->first()->id, "normal","onboard_form");

                $message = "";
                //dd($request->input('can_onboard_employee'));
                if($result == "success")
                {


                    if($request->input('can_onboard_employee') == "1")
                    {
                        $isEmailSent  = $employeeService->attachAppointmentLetterPDF($onboard_form_data);
                        $message="Employee onboarded successfully";
                    }
                    else
                    {
                        $message="Employee details updated in draft";
                    }

                    $response = [
                        'status' => 'success',
                        'message' => $message,
                        'mail_status' => $isEmailSent ? "success" : "failure",
                        'error' => '',
                        'error_verbose' =>''
                    ];
                }
                else
                {
                    //When error occured while storing User, then show error to UI

                    $response = [
                        'status' => $result,
                        'message' => "Error while creating/update User details. LINE : ".__LINE__,
                        'error' => "",
                        'error_verbose' =>''
                    ];

                }

            }
            else //If the currentuser is quick onboareded emp and not yet onboarded, then save the form.
            if($currentLoggedinInUser->is_onboarded == 0 && $currentLoggedinInUser->onboard_type  == "quick")
            {

                //check whether if emp_code is tampered
                if($onboard_form_data['employee_code'] == $currentLoggedinInUser->user_code)
                {
                    //$response = $this->storeEmployeeNormalOnboardForm($onboard_form_data, $request->input('can_onboard_employee'));

                    $result = $employeeService->createOrUpdate_OnboardFormData($onboard_form_data, $request->input('can_onboard_employee'), $existingUser->first()->id,"quick","onboard_form");

                    $message = "";

                    if($result == "success")
                    {
                        // if($request->input('can_onboard_employee') == "1")
                        // {
                        //     $isEmailSent  = $employeeService->attachAppointmentLetterPDF($onboard_form_data);
                        //     $message="Employee onboarded successfully";
                        // }
                        // else
                        // {
                            $message="Your Onboard information Saved in draft";
                      //  }

                        $response = [
                            'status' => 'success',
                            'message' => $message,
                            'mail_status' => $isEmailSent ? "success" : "failure",
                            'error' => '',
                            'error_verbose' =>''
                        ];
                    }
                    else
                    {
                        //When error occured while storing User, then show error to UI
                        $response = [
                                'status' => $result,
                                'message' => "Error while creating/update User details : LINE : ".__LINE__,
                                'error' => "",
                                'error_verbose' =>''
                        ];

                    }
                }
                else
                {
                    //dd("Emp code mismatch. Please contact HR immediately");

                    $response = [
                        'status' => 'failure',
                        'message' => 'Unauthorized Action :: Emp code mismatch. Please contact HR immediately',
                        'mail_status' => '',
                        'error' => '',
                        'error_verbose' =>''
                    ];

                }
            }
            else
            {
                //dd("You are not authorized to perform this action. Please contact the Admin immediately. Log : ".$currentLoggedinInUser);

                $response = [
                    'status' => 'failure',
                    'message' => 'You are not authorized to perform this action. Please contact the Admin immediately. Log : '.$currentLoggedinInUser,
                    'mail_status' => '',
                    'error' => '',
                    'error_verbose' =>''
                ];
            }

        }
        else
        {
            //we are inserting new user as NORMAL onboard.
            //Check whether current login is admin
            if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]) )
            {

                $result = $employeeService->createOrUpdate_OnboardFormData($onboard_form_data, $onboard_form_data['can_onboard_employee'], null,"normal","onboard_form");


                if($result == "success")
                {
                    $response = [
                        'status' => 'success',
                        'message' => 'New Employee information Saved in draft',
                        'mail_status' => '',
                        'error' => '',
                        'error_verbose' =>'',
                    ];
                }
                else
                {

                    //When error occured while storing User, then show error to UI
                    $response = [
                            'status' => $result,
                            'message' => "Error while creating/update User details : LINE : ".__LINE__,
                            'error' => "",
                            'error_verbose' =>''
                    ];

                }

            }
            else
            {

                $response = [
                    'status' => 'failure',
                    'message' => 'You are not authorized to perform this action. Please contact the Admin immediately. Log : '.$currentLoggedinInUser,
                    'mail_status' => '',
                    'error' => '',
                    'error_verbose' =>''
                ];

            }
        }

        return $response;
    }



    /*
        Save employee onboarding details
        -Normal Onboarding, Quick


    */
    private function storeEmployeeNormalOnboardForm($row, $can_onboard_employee)
    {


         //dd($can_onboard_employee);
        // code...
        try {

            $is_new_user = true;

            //Check if user already exists
            $user = User::where('email',$row["email"])->first();


            if(empty($user))
            {
              //  dd("emp doesnt exist");
                $user =  User::create([
                    'name' => $row['employee_name'],
                    'email' => $row["email"],
                    'password' => Hash::make('Abs@123123'),
                    'avatar' =>  $row['employee_name'] . '_avatar.jpg',
                    'user_code' => strtoupper($row['employee_code']),
                    'active' => '0',
                    'is_onboarded' => $can_onboard_employee,
                    'onboard_type' => 'normal',
                    'org_role' => '5',
                    'is_ssa' => '0'
                ]);

                $is_new_user = true;
            }
            else
            {
               // dd("emp exists");
               $is_new_user = false;

            }


            if($user)
            {

                //STORE EMPLOYEE DETAILS
                //Delete old data
                VmtEmployee::where('userid', $user->id)->delete();

                $newEmployee = new VmtEmployee;

                $newEmployee->userid = $user->id;
                //$newEmployee->emp_no   =    $row["employee_code"] ?? '';
                //$newEmployee->emp_name   =    $row["employee_name"];
                $newEmployee->gender   =    $row["gender"] ?? '';
                //$newEmployee->designation   =    $row["designation"];
                //$newEmployee->department   =    $row["department"];
                //$newEmployee->status   =    $row["status"];
                $newEmployee->doj   =    $row["doj"] ?? '';
                $newEmployee->dol   =    $row["doj"] ?? '';
                $newEmployee->location   =    $row["work_location"] ?? '';
                $newEmployee->dob   =    $row["dob"] ?? '';
                $newEmployee->father_name   =  $row["father_name"] ?? '';
                $newEmployee->pan_number   =  isset($row["pan_no"]) ? ($row["pan_no"]) : "";
                $newEmployee->dl_no   =  $row["dl_no"] ?? '';
                $newEmployee->passport_number = $row["passport_no"] ?? '';
                //$newEmployee->pan_ack   =    $row["pan_ack"];
                $newEmployee->aadhar_number = $row["aadhar"] ?? '';
                $newEmployee->epf_number = $row["epf_number"] ?? '';

                $newEmployee->esic_number = $row["esic_number"] ?? '';
                $newEmployee->marital_status = $row["marital_status_id"] ?? '';

                $newEmployee->mobile_number  = strval($row["mobile_no"]);
                $newEmployee->blood_group  = $row["blood_group"] ?? '';
                //$newEmployee->email_id   = $row["email"];
                $newEmployee->bank_name   = $row["bank_name"] ?? '';
                $newEmployee->bank_ifsc_code  = $row["bank_ifsc"] ?? '';
                $newEmployee->bank_account_number  = $row["account_no"] ?? '';
                // $newEmployee->current_address_line_1   = $row["current_address_line_1"] ?? '';
                // $newEmployee->current_address_line_2   = $row["current_address_line_2"] ?? '' ;
                // $newEmployee->permanent_address_line_1   = $row["permanent_address_line_1"] ?? '';
                // $newEmployee->permanent_address_line_2   = $row["permanent_address_line_2"] ?? '';
                // $newEmployee->current_city   = $row["current_city"] ?? '';
                // $newEmployee->permanent_city   = $row["permanent_city"] ?? '';

                //$newEmployee->father_age   = $row["father_age"];
                $newEmployee->mother_name   = $row["mother_name"] ?? '';
                //$newEmployee->mother_age  = $row["mother_age"];
                if (!empty($row['marital_status'] ))
                {
                    if($row['marital_status'] <> 'unmarried')
                    {
                        $newEmployee->spouse_name   = $row["spouse_name"];
                        $newEmployee->spouse_age   = $row["spouse_dob"];
                        if ($row['no_child'] > 0) {
                            $newEmployee->kid_name   = json_encode($row["child_name"]);
                            $newEmployee->kid_age  = json_encode($row["child_dob"]);
                        }
                    }
                }
                else
                {
                    $row['marital_status'] = '';
                }

                $newEmployee->aadhar_card_file = $this->fileUpload('aadhar_card_file',$user->user_code);
                $newEmployee->aadhar_card_backend_file = $this->fileUpload('aadhar_card_backend_file',$user->user_code);
                $newEmployee->pan_card_file = $this->fileUpload('pan_card_file',$user->user_code);
                $newEmployee->passport_file = $this->fileUpload('passport_file',$user->user_code);
                $newEmployee->voters_id_file = $this->fileUpload('voters_id_file',$user->user_code);
                $newEmployee->dl_file = $this->fileUpload('dl_file',$user->user_code);
                $newEmployee->education_certificate_file = $this->fileUpload('education_certificate_file',$user->user_code);
                $newEmployee->reliving_letter_file = $this->fileUpload('reliving_letter_file',$user->user_code);
                $docReviewArray = array(
                    'aadhar_card_file' => -1,
                    'aadhar_card_backend_file' => -1,
                    'pan_card_file' => -1,
                    'passport_file' => -1,
                    'voters_id_file' => -1,
                    'dl_file' => -1,
                    'education_certificate_file' => -1,
                    'reliving_letter_file' => -1
                );
                $newEmployee->docs_reviewed = json_encode($docReviewArray);
                $newEmployee->save();

                // store family member in vmt_employee_family_details tables
                $this->storeEmployeeFamilyMembers($row, $user->id);

            }

            if ($newEmployee) {

                //Delete old record
                VmtEmployeeStatutoryDetails::where('user_id', $user->id)->delete();

                //Statutory Details
                $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
                $newEmployee_statutoryDetails->user_id = $user->id;
                $newEmployee_statutoryDetails->uan_number = $row["uan_number"] ?? '';
                $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"] ?? '';
                $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"] ?? '';
                $newEmployee_statutoryDetails->ptax_location = $row["ptax_location"] ?? '';
                $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"] ?? '';
                $newEmployee_statutoryDetails->lwf_location = $row["lwf_location"] ?? '';
                $newEmployee_statutoryDetails->save();

                //Delete old record
                VmtEmployeeOfficeDetails::where('user_id', $user->id)->delete();

                //Create Employee Details
                $empOffice  = new VmtEmployeeOfficeDetails;
                $empOffice->user_id = $newEmployee->userid; //Link between USERS and VmtEmployeeOfficeDetails table
                $empOffice->department_id = $row["department"] ?? ''; // => "lk"
                $empOffice->process = $row["process"] ?? ''; // => "k"
                $empOffice->designation = $row["designation"] ?? ''; // => "k"
                $empOffice->cost_center = $row["cost_center"] ?? ''; // => "k"
                $empOffice->confirmation_period  = $row['confirmation_period'] ?? ''; // => "k"
                $empOffice->holiday_location  = $row["holiday_location"] ?? ''; // => "k"
                $empOffice->l1_manager_code  = $row["l1_manager_code"] ?? ''; // => "k"


                if ( !empty($row["l1_manager_code"]) && $this->isUserExist($row["l1_manager_code"]))
                {
                    $empOffice->l1_manager_code  = $row["l1_manager_code"];
                    updateUserRole($empOffice->l1_manager_code,"Manager");

                }

                $empOffice->l1_manager_name  = $row["l1_manager_name"] ?? ''; // => "k"
                $empOffice->work_location  = $row["work_location"] ?? ''; // => "k"
                $empOffice->officical_mail  = $row["officical_mail"] ?? ''; // => "k@k.in"
                $empOffice->official_mobile  = $row["official_mobile"] ?? ''; // => "1234567890"
                $empOffice->emp_notice  = $row["emp_notice"] ?? ''; // => "0"
                $empOffice->save();
            }

            if ($empOffice) {

                //Delete old record
                Compensatory::where('user_id', $user->id)->delete();

                $compensatory = new Compensatory;
                $compensatory->user_id = $newEmployee->userid;
                $compensatory->basic = $row["basic"] ?? '';
                $compensatory->hra = $row["hra"] ?? '';
                $compensatory->Statutory_bonus = $row["statutory_bonus"] ?? '' ;
                $compensatory->child_education_allowance = $row["child_education_allowance"] ?? '' ;
                $compensatory->food_coupon = $row["food_coupon"] ?? '' ;
                $compensatory->lta = $row["lta"] ?? '' ;
                $compensatory->special_allowance = $row["special_allowance"] ?? '' ;
                $compensatory->other_allowance = $row["other_allowance"] ?? '' ;
                $compensatory->gross = $row["gross"] ?? '' ;
                $compensatory->epf_employer_contribution = $row["epf_employer_contribution"] ?? '' ;
                $compensatory->esic_employer_contribution = $row["esic_employer_contribution"] ?? '' ;
                $compensatory->insurance = $row["insurance"] ?? '' ;
                $compensatory->graduity = $row["graduity"] ?? '' ;
                $compensatory->cic = $row["cic"] ?? '' ;
                $compensatory->epf_employee = $row["epf_employee"] ?? '' ;
                $compensatory->esic_employee = $row["esic_employee"] ?? '' ;
                $compensatory->professional_tax = $row["professional_tax"] ?? '' ;
                $compensatory->labour_welfare_fund = $row["labour_welfare_fund"] ?? '' ;
                $compensatory->net_income = $row["net_income"] ?? '' ;
                $compensatory->save();
            }

            $message_part = "---";
            $mail_status ="---";

            //If SAVE button pressed, dont onboard. Onboard if Submit button was pressed
            if($can_onboard_employee == "true")
            {
                // sent welcome email along with appointment Letter

                $isEmailSent  = $this->attachAppointmentLetterPDF($row);


                if ($isEmailSent) {
                    $mail_status="success";
                } else {
                    $mail_status="failure";
                }

                $message_part =" onboarded successfully";
            }
            else
            if($can_onboard_employee == "false")
            {
                $message_part =" saved in draft.";

            }

            return $response = [
                'status' => 'success',
                'message' => $row["employee_code"].$message_part,
                'mail_status' => $mail_status,
                'error' => "",
            ];
        } catch (\Exception $e) {

            $user->is_onboarded = '0';
            $user->save();

            $message = "";
            $error_field = "";

            //This error occurs when the form field is empty in UI.
            if(str_contains($e->getMessage(),"Undefined array key") )
            {
                $message = " not added due to missing field";
                $error_field = trim($e->getMessage(), "Undefined array key"); //get the field name only

            }
            else
            {
                $message = " not added due to following error";
                $error_field = $e->getMessage();
            }

            return $response = [
                'status' => 'failure',
                'message' => $row["employee_code"].$message,
                'mail_status' => '',
                'error' => $error_field,
                'error_verbose' =>$e
            ];
        }
    }

    // store employeess from excel sheet to database
    public function importBulkOnboardEmployeesExcelData(Request $request,VmtEmployeeService $employeeService)
    {

        $validator =    Validator::make(
            $request->all(),
            ['file' => 'required|file|mimes:xls,xlsx'],
            ['required' => 'The :attribute is required.']
        );

        if ($validator->passes()) {
            $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));
            return $this->storeBulkOnboardEmployees($importDataArry,$employeeService);
        } else {
            $data['failed'] = $validator->errors()->all();
            return response()->json($data);
        }
        // linking Manager To the employees;
        // $linkToManager  = \Excel::import(new VmtEmployeeManagerImport, request()->file('file'));
    }

    /*
        For bulk upload employees
    */
    private function storeBulkOnboardEmployees($data,$employeeService)
    {

        ini_set('max_execution_time', 300);
        //For output jsonresponse
        $data_array = [];
        //For validation
        $isAllRecordsValid = true;

        $rules = [];
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $data;
        $currentRowInExcel = 0;
        foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
          //  dd($excelRowdata);
            $currentRowInExcel++;

            //Validation
            $rules = [
                'employee_code' => ['unique:users,user_code',
                        function ($attribute, $value, $fail) {

                            $emp_client_code = preg_replace('/\d+/', '', $value );
                            $result = VmtClientMaster::where('client_code', $emp_client_code)->exists();

                            if (!$result) {
                                $fail('No matching client exists for the given <b> Employee Code <b>: '.$value);
                            }
                        },
                    ],
                'employee_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'email' => 'nullable|email:strict',
                'gender' => 'required|in:Male,male,Female,female,other',
                'doj' => 'required|date',
                'work_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'dob' => 'required|date|before:-18 years',
                'father_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'father_gender' => 'nullable|in:Male,male,Female,female,other',
                'father_dob' => 'nullable|date',

                'pan_no' => 'nullable|regex:/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u',
                'pan_ack' => 'nullable',
                'aadhar' => 'required|regex:/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u',
                'marital_status' => 'required|in:unmarried,married,widowed,separated,divorced',
                'mobile_no' => 'nullable|regex:/^([0-9]{10})?$/u|numeric',
                'bank_name' => 'required|exists:vmt_banks,bank_name',
                'bank_ifsc' => 'required|regex:/(^([A-Z]){4}0([A-Z0-9]){6}?$)/u',
                'account_no' => 'required',
                'current_address' => 'nullable',
                'permanent_address' => 'nullable',
                'mother_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'mother_gender' => 'nullable|in:Male,male,Female,female,other',
                'mother_dob' => 'nullable|date',
                'spouse_name' => 'nullable|required_unless:marital_status,unmarried|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'spouse_dob' => 'nullable|required_unless:marital_status,unmarried|date',
                'no_of_child' => 'nullable|numeric',
                'child_name' => 'nullable|required_unless:no_of_child,null,0|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'child_dob' => 'nullable|required_unless:no_of_child,null,0|date',
                'department' => 'required|exists:vmt_department,name',
                'process' => 'nullable',
                'designation' => 'required',
                'cost_center' => 'nullable',
                'confirmation_period' => 'nullable|date',
                'holiday_location' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'l1_manager_code' => 'nullable|regex:/(^([a-zA-z0-9.]+)(\d+)?$)/u',
                'l1_manager_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'work_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'official_mail' => 'nullable|email',
                'official_mobile' => 'nullable|regex:/^([0-9]{10})?$/u|numeric',
                'emp_notice' => 'nullable|numeric',
                'basic' => 'required|numeric',
                'hra' => 'required|numeric',
                'statutory_bonus' => 'required|numeric',
                'child_education_allowance' => 'required|numeric',
                'food_coupon' => 'required|numeric',
                'lta' => 'required|numeric',
                'special_allowance' => 'required|numeric',
                'other_allowance' => 'required|numeric',
                'epf_employer_contribution' => 'required|numeric',
                'insurance' => 'required|numeric',
                'graduity' => 'required|numeric',
                'epf_employee' => 'required|numeric',
                'esic_employee' => 'required|numeric',
                'professional_tax' => 'required|numeric',
                'labour_welfare_fund' => 'nullable|numeric',
                'uan_number' => 'nullable|numeric',
                'pf_applicable' => 'nullable|in:yes,Yes,no,No',
                'esic_applicable' => 'nullable|in:yes,Yes,no,No',
                'ptax_location' => 'nullable',
                'tax_regime' => 'nullable|in:old,Old,new,New',
                'lwf_location' => 'nullable',
                'esic_employer_contribution' => 'required|numeric',
                 'dearness_allowance' => 'nullable|numeric',
            ];

            $messages = [
                'numeric' => 'Field <b>:attribute</b> should be numeric',
                'date' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
                'in' => 'Field <b>:attribute</b> should have the following values : :values .',
                'required' => 'Field <b>:attribute</b> is required',
                'regex' => 'Field <b>:attribute</b> is invalid',
                'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                'unique' => 'Field <b>:attribute</b> should be unique',
                'dob.before' => 'Field <b>:attribute</b> should be above 18 years',
                'email' => 'Field <b>:attribute</b> is invalid',
                'pan_no.required_if' =>'Field <b>:attribute</b> is required if <b>pan ack</b> not provided ',
                'pan_ack.required_if' =>'Field <b>:attribute</b> is required if <b>pan no</b> not provided ',
                'required_unless' => 'Field <b>:attribute</b> is invalid',
                'exists' => 'Field <b>:attribute</b> doesnt exist in application.Kindly create one',

            ];

            $validator = Validator::make($excelRowdata, $rules, $messages);

            if (!$validator->passes()) {

                $rowDataValidationResult = [
                    'row_number' => $currentRowInExcel,
                    'status' => 'failure',
                    'message' => 'In Excel Row - '.$excelRowdata['employee_code'].' : ' . $currentRowInExcel . ' has following error(s)',
                    'error_fields' => json_encode($validator->errors()),
                ];

                array_push($data_array, $rowDataValidationResult);

                $isAllRecordsValid = false;
            }
        } //for loop

        //Runs only if all excel records are valid
        if ($isAllRecordsValid) {
            foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                $rowdata_response = $this->storeSingleRecord_BulkEmployee($excelRowdata, $employeeService);

                array_push($data_array, $rowdata_response);
            }

            $responseJSON['status'] = 'success';
            $responseJSON['message'] = "Excelsheet data import success";
            $responseJSON['mail_status'] =$rowdata_response['mail_status'] ?? "failure";
            $responseJSON['data'] = $data_array;
        } else {
            $responseJSON['status'] = 'failure';
            $responseJSON['message'] = "Please fix the below excelsheet data";
            $responseJSON['data'] = $data_array;
        }

        //dd($responseJSON);

        //$data = ['success'=> $returnsuccessMsg, 'failed'=> $returnfailedMsg, 'failure_json' => $failureJSON, 'success_count'=> $addedCount, 'failed_count'=> $failedCount];
        return response()->json($responseJSON);
    }

      /*

        $outputArray should be passed from parent function.
    */
    private function storeSingleRecord_BulkEmployee($row, $employeeService)
    {
        //DB level validation

          try{

            $response = $employeeService->createOrUpdate_OnboardFormData(data: $row,
                                                            can_onboard_employee:"0",
                                                            existing_user_id : null,
                                                            onboard_type  : "bulk",
                                                            onboard_import_type : "excel_bulk"
                                                             );
              $status = $response;
             if($response == "success")
                $message =  $row['employee_code']  . ' added successfully';
             else
                $message =  $row['employee_code']  . ' has failed';


                   //  $message = "Employee OnBoard was Created   ";
                //      $VmtGeneralInfo = VmtGeneralInfo::first();
                //      $image_view = url('/') . $VmtGeneralInfo->logo_img;
                //    $mail_send = \Mail::to($row["email"])->send(new QuickOnboardLink($row['employee_name'], $row['employee_code'], 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));

                    return  $rowdata_response = [
                        'row_number' => '',
                        'status' => $status,
                        'message' => $message,
                        'error_fields' => [],
                    ];


            } catch(\Exception $e) {
                //dd($e);
               // $this->deleteUser($user->id);

               return $rowdata_response = [
                'row_number' => '',
                'status' => $status,
                'message' => $message,
                'mail_status'=>'failure',
                'error_fields' => json_encode(['error' => $e->getMessage()]),
            ];
            }

        }


        // if (isset($row['employee_code'])) {
        //     $empNo = $row['employee_code'];
        // } else {
        //     $clientData  = VmtClientMaster::first();
        //     $maxId  = VmtEmployee::max('id') + 1;
        //     if ($clientData) {
        //         $empNo = $clientData->client_code . $maxId;
        //     } else {
        //         $empNo = $maxId;
        //     }
        // }


        // try {
        //     $user =  User::create([
        //         'name' => $row['employee_name'],
        //         'email' => $row["email"],
        //         'password' => Hash::make('Abs@123123'),
        //         'avatar' =>  $row['employee_name'] . '_avatar.jpg',
        //         'user_code' =>  strtoupper($empNo),
        //         'can_login' => '1',
        //         'active' => '0',
        //         'is_onboarded' => '0',
        //         'onboard_type' => 'bulk',
        //         'is_ssa' => '0',
        //         'org_role' =>'5', //employee role
        //         'is_default_password_updated' => '0'
        //     ]);
        //     $user->save();
        //     $marital_status_id=VmtMaritalStatus::where('name',ucfirst( $row["marital_status"]))->first()->id;   //to get id of marital_status
        //     // var_dump($row['dob']);
        //     //  dd($row['dob'];
        //     $newEmployee = new VmtEmployee;
        //     $newEmployee->userid = $user->id;
        //    // $newEmployee->emp_no   = $row["emp_no"] ?? '';
        //     $newEmployee->gender   =    $row["gender"];
        //     $newEmployee->doj   =   \DateTime::createFromFormat('d-m-Y', $row['doj'])->format('Y-m-d');
        //     $newEmployee->dol   =   \DateTime::createFromFormat('d-m-Y', $row['doj'])->format('Y-m-d');
        //     $newEmployee->location   =    $row["work_location"];
        //     $newEmployee->dob   =   \DateTime::createFromFormat('d-m-Y', $row['dob'])->format('Y-m-d');
        //    // $newEmployee->father_name   =  $row["father_name"];
        //    // $newEmployee->father_gender   =  $row["father_gender"];
        //    // $newEmployee->father_dob   =  $row['father_dob'];

        //     $newEmployee->pan_number   =  isset($row["pan_no"]) ? ($row["pan_no"]) : "";
        //     //$newEmployee->pan_ack   =    $row["pan_ack"];
        //     $newEmployee->aadhar_number = $row["aadhar"];
        //     $newEmployee->marital_status_id = $marital_status_id;
        //     $newEmployee->mobile_number  = strval($row["mobile_no"]);
        //     $newEmployee->bank_id   = Bank::where('bank_name',$row['bank_name'])->first()->id;
        //     $newEmployee->bank_ifsc_code  = $row["bank_ifsc"];
        //     $newEmployee->bank_account_number  = $row["account_no"];
        //     $newEmployee->current_address_line_1   = $row["current_address"];
        //     $newEmployee->permanent_address_line_1   = $row["permanent_address"];
        //    // $newEmployee->mother_name   = $row["mother_name"];
        //    // $newEmployee->mother_gender   = $row["mother_gender"];
        //    // $newEmployee->mother_dob   = $row["mother_dob"];


        //     if ($row['marital_status'] <> 'unmarried') {
        //        // $newEmployee->spouse_name   = $row["spouse_name"];
        //        // $newEmployee->spouse_age   = $row["spouse_dob"];
        //         if ($row['no_of_child'] > 0) {
        //            // $newEmployee->no_of_children = $row['no_of_child'];
        //             //$newEmployee->kid_name   = json_encode($row["child_name"]);
        //            // $newEmployee->kid_age  = json_encode($row["child_dob"]);
        //         }
        //     }
        //     $docReviewArray = array(
        //         'aadhar_card_file' => -1,
        //         'aadhar_card_backend_file' => -1,
        //         'pan_card_file' => -1,
        //         'passport_file' => -1,
        //         'voters_id_file' => -1,
        //         'dl_file' => -1,
        //         'education_certificate_file' => -1,
        //         'reliving_letter_file' => -1
        //     );
        //     $newEmployee->docs_reviewed = json_encode($docReviewArray);
        //     $newEmployee->save();

        //     // Storing family member in vmt_employee_family_details
        //     $this->storeEmployeeFamilyMembers($row, $user->id);

        //     if ($newEmployee) {
        //         $empOffice  = new VmtEmployeeOfficeDetails;
        //         $empOffice->user_id = $newEmployee->userid;
        //         $empOffice->department_id = $row["department"];
        //         $empOffice->process = $row["process"];
        //         $empOffice->designation = $row["designation"];
        //         $empOffice->cost_center = $row["cost_center"];
        //         $empOffice->confirmation_period  = $row['confirmation_period'];
        //         $empOffice->holiday_location  = $row["holiday_location"];

        //         if ( !empty($row["l1_manager_code"]))
        //         {
        //             $empOffice->l1_manager_code  = $row["l1_manager_code"];

        //             if($this->isUserExist($row["l1_manager_code"]))
        //                 updateUserRole($empOffice->l1_manager_code,"Manager");
        //         }

        //         // $empOffice->l1_manager_name  = $row["l1_manager_name"];
        //         $empOffice->work_location  = $row["work_location"];
        //         $empOffice->officical_mail  = $row["official_mail"];
        //         $empOffice->official_mobile  = $row["official_mobile"];
        //         $empOffice->emp_notice  = $row["emp_notice"];
        //         $empOffice->save();
        //     }

        //     if ($empOffice) {

        //         //Statutory Details
        //         $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
        //         $newEmployee_statutoryDetails->user_id = $user->id;
        //         $newEmployee_statutoryDetails->uan_number = $row["uan_number"];
        //         $newEmployee_statutoryDetails->epf_number = $row["epf_number"] ?? '';
        //         $newEmployee_statutoryDetails->esic_number = $row["esic_number"] ?? '';
        //         $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"];
        //         $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"];
        //         $newEmployee_statutoryDetails->ptax_location_state_id = $row["ptax_location"];
        //         $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"];
        //         $newEmployee_statutoryDetails->lwf_location_state_id = $row["lwf_location"];
        //         $newEmployee_statutoryDetails->save();

        //         $compensatory = new Compensatory;
        //         $compensatory->user_id = $newEmployee->userid;
        //         $compensatory->basic = $row["basic"];
        //         $compensatory->hra = $row["hra"];
        //         $compensatory->Statutory_bonus = $row["statutory_bonus"];
        //         $compensatory->child_education_allowance = $row["child_education_allowance"];
        //         $compensatory->food_coupon = $row["food_coupon"];
        //         $compensatory->lta = $row["lta"];
        //         $compensatory->special_allowance = $row["special_allowance"];
        //         $compensatory->other_allowance = $row["other_allowance"];
        //         $compensatory->gross = $row["basic"] + $row["hra"] + $row["statutory_bonus"] + $row["child_education_allowance"] + $row["food_coupon"] + $row["lta"] + $row["special_allowance"] + $row["other_allowance"];
        //         $compensatory->epf_employer_contribution = $row["epf_employer_contribution"];
        //         $compensatory->esic_employer_contribution = $row["esic_employer_contribution"];
        //         $compensatory->insurance = $row["insurance"];
        //         $compensatory->graduity = $row["graduity"];
        //         $compensatory->cic = $compensatory->gross + $row["epf_employer_contribution"] + $row["esic_employer_contribution"] + $row["insurance"] + $row["graduity"];
        //         $compensatory->epf_employee = $row["epf_employee"];
        //         $compensatory->esic_employee = $row["esic_employee"];
        //         $compensatory->professional_tax = $row["professional_tax"];
        //         $compensatory->labour_welfare_fund = $row["labour_welfare_fund"];
        //         $compensatory->net_income = $compensatory->gross + $row["epf_employee"] + $row["esic_employee"] + $row["professional_tax"] + $row["labour_welfare_fund"] - ($row["epf_employer_contribution"] - $row["esic_employer_contribution"] - $row["insurance"] - $row["graduity"]);
        //         $compensatory->save();
        //     }

        //     //Add new items into $row
        //     $row['net_income'] = $compensatory->gross + $row["epf_employee"] + $row["esic_employee"] + $row["professional_tax"] + $row["labour_welfare_fund"] - ($row["epf_employer_contribution"] - $row["esic_employer_contribution"] - $row["insurance"] - $row["graduity"]);







       // Generate Employee Apoinment PDF after onboarding
    public function attachAppointmentLetterPDF($employeeData)
       {
           //dd($employeeData);
           $empNameString  = $employeeData['employee_name'];
           $filename = 'appoinment_letter_' . $empNameString . '_' . time() . '.pdf';
           $data = $employeeData;
           $data['basic_monthly'] = $employeeData['basic'];
           $data['basic_yearly'] = intval($employeeData['basic']) * 12;
           $data['hra_monthly'] = $employeeData['hra'];
           $data['hra_yearly'] = intval($employeeData['hra']) * 12;
           $data['spl_allowance_monthly'] = $employeeData['special_allowance'];
           $data['spl_allowance_yearly'] = intval($employeeData['special_allowance']) * 12;
           $data['gross_monthly'] = $employeeData["basic"] + $employeeData["hra"] + $employeeData["statutory_bonus"] + $employeeData["child_education_allowance"] + $employeeData["food_coupon"] + $employeeData["lta"] + $employeeData["special_allowance"] + $employeeData["other_allowance"];
           $data['gross_yearly'] = intval($data['gross_monthly']) * 12;
           $data['employer_epf_monthly'] = $employeeData['epf_employer_contribution'];
           $data['employer_epf_yearly'] = intval($employeeData['epf_employer_contribution']) * 12;
           $data['employer_esi_monthly'] = $employeeData['esic_employer_contribution'];
           $data['employer_esi_yearly'] = intval($employeeData['esic_employer_contribution']) * 12;
           $data['ctc_monthly'] = $data['gross_monthly'];
           $data['ctc_yearly'] = intval($data['gross_monthly']) * 12;
           $data['employee_epf_monthly'] =  $employeeData["epf_employer_contribution"];
           $data['employee_epf_yearly'] = intval($employeeData["epf_employer_contribution"]) * 12;
           $data['employer_pt_monthly'] = $employeeData["professional_tax"];
           $data['employer_pt_yearly'] =  intval($employeeData["professional_tax"]) * 12;
           $data['net_take_home_monthly'] = $employeeData["net_income"];
           $data['net_take_home_yearly'] = intval($employeeData["net_income"]) * 12;


           $VmtGeneralInfo = VmtGeneralInfo::first();
           $image_view = url('/') . $VmtGeneralInfo->logo_img;
           $appoinmentPath = "";

           if (fetchMasterConfigValue("can_send_appointmentletter_after_onboarding") == "true") {

               //Fetch appointment letter based on client name
               $client_name = Str::lower(str_replace(' ', '', getCurrentClientName()) );
               $viewfile_appointmentletter = 'vmt_appointment_templates.mailtemplate_appointmentletter_'.$client_name;

               //check if template exists
               if (view()->exists($viewfile_appointmentletter)) {

                   $html =  view($viewfile_appointmentletter, compact('data'));

                   $options = new Options();
                   $options->set('isHtml5ParserEnabled', true);
                   $options->set('isRemoteEnabled', true);

                   $pdf = new Dompdf($options);
                   $pdf->loadHtml($html, 'UTF-8');
                   $pdf->setPaper('A4', 'portrait');
                   $pdf->render();
                   $docUploads =  $pdf->output();
                   \File::put(public_path('appoinmentLetter/') . $filename, $docUploads);
                   $appoinmentPath = public_path('appoinmentLetter/') . $filename;

               }

           }

           $notification_user = User::where('id',auth::user()->id)->first();
           $message = "Employee Bulk OnBoard was Created   ";

           Notification::send($notification_user ,new ViewNotification($message.$employeeData['employee_name']));
           $isSent    = \Mail::to($employeeData['email'])->send(new WelcomeMail($employeeData['employee_code'], 'Abs@123123', request()->getSchemeAndHttpHost(),  $appoinmentPath, $image_view));

           return $isSent;
       }



       // Store employees with partial details for quick onboarding
    public function importQuickOnboardEmployeesExcelData(Request $request, VmtEmployeeService $employeeService)
       {
           $request->validate([
               'file' => 'required|file|mimes:xls,xlsx'
           ]);
           $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));
           return $this->storeQuickOnboardEmployees($importDataArry, $employeeService);
       }

       // insert the employee to database for quick onboarding
    private function storeQuickOnboardEmployees($data,  $employeeService)
       {

           //For output jsonresponse
           $data_array = [];

           //For validation
           $isAllRecordsValid = true;

           $VmtGeneralInfo = VmtGeneralInfo::first();

           $rules = [];
           $responseJSON = [
               'status' => 'none',
               'message' => 'none',
               'data' => [],
           ];

           $excelRowdata_row = $data;
           $currentRowInExcel = 0;

           foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {

               $currentRowInExcel++;

               // var_dump($excelRowdata);exit();
               //Validation
               $rules = [
                   'employee_code' => ['unique:users,user_code',
                        function ($attribute, $value, $fail) {

                            $emp_client_code = preg_replace('/\d+/', '', $value );
                            $result = VmtClientMaster::where('client_code', $emp_client_code)->exists();

                            if (!$result) {
                                $fail('No matching client exists for the given Employee Code : '.$value);
                            }
                        },
                    ],
                   'employee_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                   'email' => 'nullable|email:strict|unique:users,email',
                   'l1_manager_code' => 'nullable|regex:/(^([a-zA-z0-9.]+)(\d+)?$)/u',
                   'doj' => 'required|date',
                   'mobile_number' => 'required|regex:/^([0-9]{10})?$/u|numeric|unique:vmt_employee_details,mobile_number',
                   'designation' => 'required',
                   'basic' => 'required|numeric',
                   'hra' => 'required|numeric',
                   'statutory_bonus' => 'required|numeric',
                   'child_education_allowance' => 'required|numeric',
                   'food_coupon' => 'required|numeric',
                   'lta' => 'required|numeric',
                   'special_allowance' => 'required|numeric',
                   'other_allowance' => 'required|numeric',
                   'epf_employer_contribution' => 'required|numeric',
                   'esic_employer_contribution' => 'required|numeric',
                   'insurance' => 'required|numeric',
                   'graduity' => 'required|numeric',
                   'epf_employee' => 'required|numeric',
                   'esic_employee' => 'required|numeric',
                   'professional_tax' => 'required|numeric',
                   'labour_welfare_fund' => 'required|numeric',
               ];

               $messages = [
                   'date' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
                   'in' => 'Field <b>:attribute</b> should have the following values : :values .',
                   'required' => 'Field <b>:attribute</b> is required',
                   'regex' => 'Field <b>:attribute</b> is invalid',
                   'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                   'unique' => 'Field <b>:attribute</b> should be unique',
                   'numeric' => 'Field <b>:attribute</b> is invalid',
                   'email' => 'Field <b>:attribute</b> is invalid'
               ];

               // var_dump($excelRowdata);exit();

               $validator = Validator::make($excelRowdata, $rules, $messages);
               // var_dump($validator);

               if (!$validator->passes()) {
                   // $returnfailedMsg .= $empNo." not get added because of error ".json_encode($validator->errors()->all())." <br/>";
                   $rowDataValidationResult = [
                       'row_number' => $currentRowInExcel,
                       'status' => 'failure',
                       'message' => 'In Excel Row : ' . $currentRowInExcel . ' has following error(s)',
                       'error_fields' => json_encode($validator->errors()),
                   ];

                   array_push($data_array, $rowDataValidationResult);

                   $isAllRecordsValid = false;
               }
           }//for each
           //Runs only if all excel records are valid
           if ($isAllRecordsValid) {
               foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                   $rowdata_response = $this->storeSingleRecord_QuickEmployee($excelRowdata, $employeeService);
                   array_push($data_array, $rowdata_response);
               }


               $responseJSON['status'] = 'success';
               $responseJSON['message'] = "Excelsheet data import success";
               $responseJSON['data'] = $data_array;
           } else {
               $responseJSON['status'] = 'failure';
               $responseJSON['message'] = "Please fix the below excelsheet data";
               $responseJSON['data'] = $data_array;
           }

           return response()->json($responseJSON);

       }

    private function storeSingleRecord_QuickEmployee($row, VmtEmployeeService $employeeService)
       {




           // return $response;

           //DB level validation
        //    if (isset($row['employee_code'])) {
        //        $empNo = $row['employee_code'];
        //    } else {
        //        $clientData  = VmtClientMaster::first();
        //        $maxId  = VmtEmployee::max('id') + 1;
        //        if ($clientData) {
        //            $empNo = $clientData->client_code . $maxId;
        //        } else {
        //            $empNo = $maxId;
        //        }
        //    }
            $message = $row['employee_code']  ." not imported ";
            $status = 'failure';
            try {
               $response = $employeeService->createOrUpdate_OnboardFormData(data: $row,
                                                                can_onboard_employee:"0",
                                                                existing_user_id : null,
                                                                onboard_type  : "quick",
                                                                onboard_import_type : "excel_quick"
                                                                );

                $status = $response;

               if($response == "success")
                    $message =  $row['employee_code']  . ' added successfully';
                else
                    $message =  $row['employee_code']  . ' has failed';

               //Sending mail
               $VmtGeneralInfo = VmtGeneralInfo::first();
               $image_view = url('/') . $VmtGeneralInfo->logo_img;

               \Mail::to($row["email"])->send(new QuickOnboardLink($row['employee_name'], $row['employee_code'], 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));

               return $rowdata_response = [
                   'row_number' => '',
                   'status' => $status,
                   'message' => $message,
                   'error_fields' => [],
               ];


           }
           catch (\Exception $e) {

              // $this->deleteUser($user->id);

               return $rowdata_response = [
                   'row_number' => '',
                   'status' => $status,
                   'message' => $message,
                   'error_fields' => json_encode(['error' => $e->getMessage()]),
               ];


               //$responseJSON['status'] = 'failure';
               //$responseJSON['message'] = $empNo . " not get added because of error " . $e->getMessage();
               //$responseJSON['data'] = json_encode(['error' => $e->getMessage()]);
               //$responseJSON['stacktrace'] = json_encode(report($e));
               //dd($e->getMessage());
               //$returnfailedMsg .= $empNo." not get added because of error ".$e->getMessage()." <br/>";
           }

       }

     /*
        Called when quick onboarded employee submits the documents from their login.
        After this, the employee is onboarded sucessfully.
    */
    public function storeEmployeeDocuments(Request $request, VmtEmployeeService $employeeService)
    {

        $bulkonboard_docs = $request->all();
        $rowdata_response = [
            'status' => 'empty',
            'message' => 'empty',
        ];


        try
        {

           // $this->uploadDocument($user->id, $row['Aadhar Back'], 'Aadhar Card Back');
            // $this->uploadDocument($user->id, $row['panDoc'], 'Pan Card');
            // $this->uploadDocument($user->id, $row['passport'], 'Passport');
            // $this->uploadDocument($user->id, $row['voterId'], 'Voter ID');
            // $this->uploadDocument($user->id, $row['dlDoc'], 'Driving License');
            // $this->uploadDocument($user->id, $row['eductionDoc'], 'Education Certificate');
            // $this->uploadDocument($user->id, $row['releivingDoc'],'Relieving Letter');
            $doc_upload_status = array();

            foreach( $bulkonboard_docs as $doc_name => $doc_obj){

               $processed_doc_name = str_replace('_',' ',$doc_name);

               $doc_upload_status[$doc_name] = $employeeService->uploadDocument(auth()->user()->id, $doc_obj, $processed_doc_name);
            }


            //Check if all mandatory docs are uploaded by user
            $mandatory_doc_ids = VmtDocuments::where('is_mandatory','1')->pluck('id');
            $user_uploaded_docs_ids = VmtEmployeeDocuments::whereIn('doc_id',$mandatory_doc_ids)
                                                           ->where('vmt_employee_documents.user_id',auth()->user()->id)
                                                           ->pluck('doc_id');

            $missing_mandatory_doc_ids = array_diff($mandatory_doc_ids->toArray(), $user_uploaded_docs_ids->toArray());


            // foreach($missing_mandatory_doc_ids as $single_mandatory_id){

            //     $missing_mandatory_doc_name[] = VmtDocuments::where('id',$single_mandatory_id)->first()->document_name;
            // }
            //dd("DOc upload status : ".$pending_docs);
  //dd(count($mandatory_doc_ids) == count($user_uploaded_docs_ids));

            if(count($mandatory_doc_ids) == count($user_uploaded_docs_ids))
              {
                  //set the onboard status to 1
                  $currentUser = User::where('id', auth()->user()->id)->first();
                  $currentUser->is_onboarded = '1';
                  $currentUser->save();

                return  $rowdata_response = [
                    'status' => 'Success',
                    'message' => 'All documents uploaded. You have been successfully onboarded',
                    'data' => $doc_upload_status
                ];

             }
            else
             {
                return $rowdata_response = [
                    'status' => 'Failure',
                    'message' => 'Please upload all mandatory documents',
                ];

             }

        }
        catch (\Throwable $e) {
            //dd("error! ".$e);
            return $rowdata_response = [
                'status' => 'failure',
                'message' => 'Error while uploading documents',
                'error_message' => $e->getMessage()
            ];
        }
    }

    public function viewProfilePagePrivateFile(Request $request){

        $private_file = 'employees/'.$request->user_code."/onboarding_documents";
        // dd(file(storage_path('employees'.$private_file)));
       return response()->file(storage_path($private_file));

    }

    public function updateEmployeeActiveStatus(Request $request, VmtEmployeeService $employeeService ,VmtEmployeeMailNotifMgmtService $serviceVmtEmployeeMailNotifMgmtService){

       $response= $employeeService->updateEmployeeActiveStatus($request->user_code, $request->active_status);

      // $Activation_mail_status =$serviceVmtEmployeeMailNotifMgmtService->send_AccActivationMailNotification($request->user_code);

       return $response;

    }

    public function getEmployeeAllDocumentDetails(Request $request, VmtEmployeeDocumentsService $serviceVmtEmployeeDocumentsService){
            return $serviceVmtEmployeeDocumentsService->getEmployeeAllDocumentDetails($request->user_code);
    }
}
