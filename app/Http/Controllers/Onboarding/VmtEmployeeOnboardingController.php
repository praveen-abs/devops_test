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

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
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

use App\Models\Compensatory;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use App\Mail\QuickOnboardLink;

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

        if(empty($request->all())){
            return view('onboarding.vmt_normal_onboarding_v2');
        }else{
        $user_id = Crypt::decrypt($request->uid);
        $can_onboard_employee =User::where('id',$user_id)->first()->is_onboarded;

        if($can_onboard_employee == '0'){
            return view('onboarding.vmt_normal_onboarding_v2');
        }else{
            return redirect()->route('index');
        }
    }

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

 public function processEmployeeOnboardForm_Normal(Request $request,VmtEmployeeService $employeeService ){

   try{
        $data=$request->all();

            $user_code =$data['employee_code'];

        $onboard_form_data =  array();

        $onboard_form_data  = $data;

        $currentLoggedinInUser = auth()->user();

        //Check whether we are updating existing user or adding new user.

              $existingUser = User::where('user_code',$user_code);


              if($existingUser->exists())
              {

                  //If current user is Admin, then its normal onboarding or updating existing user details.
                if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]))
                {
                      $result = $employeeService->createOrUpdate_OnboardData($onboard_form_data, $onboard_form_data['can_onboard_employee'], $existingUser->first()->id, $onboard_type = 'normal');

                      $message = "";
                      $isEmailSent = '';

                      if($result['status'] == "success")
                      {
                          if($request->input('can_onboard_employee') == "1")
                          {
                              //$isEmailSent  = $employeeService->attachAppointmentLetterPDF($onboard_form_data);
                              $message="Employee onboarded successfully";
                          }
                          else
                          {
                              $message="Employee details updated in draft";
                          }

                          $response = [
                              'status' => $result['status'],
                              'message' => $message,
                              'mail_status' => $isEmailSent ? "success" : "failure",
                               'data' =>$result['data'],
                          ];
                      }
                      else
                      {
                          //When error occured while storing User, then show error to UI
                          $response = [
                              'status' => $result['status'],
                              'message' => "Error while creating/update User details. LINE : ".__LINE__,
                              'data' => $result['data'],
                          ];

                      }

                  }
                  else //If the currentuser is quick onboareded emp and not yet onboarded, then save the form.
                  if($onboard_form_data['employee_code'] == $currentLoggedinInUser->user_code &&  $currentLoggedinInUser->onboard_type  == "quick")
                   {
                          $result = $employeeService->createOrUpdate_OnboardData($onboard_form_data, $request->input('can_onboard_employee'), $existingUser->first()->id,$onboard_type ='quick');

                          $message = "";

                          if($result['status'] == "success")
                          {
                              if($request->input('can_onboard_employee') == "1")
                              {
                                  $message="Employee onboarded successfully";
                              }else
                              {
                                 $message="Your Onboard information Saved in draft";
                              }

                              $response = [
                                  'status' => $result['status'],
                                  'message' => $message,
                                  'can_redirect' => $request->input('can_onboard_employee'), //if its "1", then redirect from onboarding form to under review page
                                  'data' =>$result['data'],

                              ];
                          }
                          else
                          { //When error occured while storing User, then show error to UI
                              $response = [
                                      'status' => $result['status'],
                                      'message' => "Error while creating/update User details : LINE : ".__LINE__,
                                      'data' => $result['data'],
                              ];
                          }
                  }

              } else { //we are inserting new user as NORMAL onboard.
                     //Check whether current login is admin

                  if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]) )
                  {
                      $result = $employeeService->createOrUpdate_OnboardData($onboard_form_data, $onboard_form_data['can_onboard_employee'],'', $onboard_type ='normal');

                      if($result['status'] == "success")
                      {
                          $response = [
                              'status' => 'success',
                              'message' => 'New Employee information Saved in draft',
                              'data'=>$result['data']
                          ];
                      }else
                      { //When error occured while storing User, then show error to UI
                          $response = [
                                  'status' => $result['status'],
                                  'message' => "Error while creating/update User details : LINE : ".__LINE__,
                                   'data' =>$result['data']
                          ];
                      }
                  }
              }
             }catch(\Exception $e){
                $response = [
                    'status' => 'failure',
                    'message' => "Error while creating/update Employee details",
                    'data' =>$e->getmessage()." ".$e->getline(),
                ];
            }
            return response()->json($response);
        }




           // Store employees with partial details for quick onboarding
    public function importQuickOnboardEmployeesExcelData(Request $request, VmtEmployeeService $employeeService)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $importDataArry = Excel::toArray(new VmtEmployeeImport, request()->file('file'));

        return $this->storeQuickOnboardEmployees($importDataArry, $employeeService);
    }

        // insert the employee to database for quick onboarding
     private function storeQuickOnboardEmployees($data,  $employeeService)
        {
            //For output jsonresponse
            $data_array = [];
            //For validation
            $isAllRecordsValid = true;
            $rules = [];
            $excelRowdata_row = $data;
            $currentRowInExcel = 0;

        if(empty($excelRowdata_row )){
            return $rowdata_response = [
                'status' => 'failure',
                'message' => 'Please fill the excel',
            ];
        }else{

            foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {

                $currentRowInExcel++;
                //Validation
                $rules = [
                    'employee_code' => ['distinct',
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
                    'basic' => 'required|numeric|min:0|not_in:0',
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
                    'not_in' => 'Field <b>:attribute</b> should be greater than zero: :values .',
                    'required' => 'Field <b>:attribute</b> is required',
                    'regex' => 'Field <b>:attribute</b> is invalid',
                    'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                    'unique' => 'Field <b>:attribute</b> should be unique',
                    'numeric' => 'Field <b>:attribute</b> is invalid',
                    'email' => 'Field <b>:attribute</b> is invalid'
                ];

                $validator = Validator::make($excelRowdata, $rules, $messages);

                if (!$validator->passes()) {

                    $rowDataValidationResult = [
                        'row_number' => $currentRowInExcel,
                        'status' => 'failure',
                        'message' => 'In Excel Row : ' . $currentRowInExcel . ' has following error(s)',
                        'data' => json_encode($validator->errors()),
                    ];

                    array_push($data_array, $rowDataValidationResult);
                    $isAllRecordsValid = false;
                  }
             }
         }

           //for each
            //Runs only if all excel records are valid
            if ($isAllRecordsValid) {
                foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                    $rowdata_response = $this->storeSingleRecord_QuickEmployee($excelRowdata,$VmtOnboardingTestingService);
                    array_push($data_array, $rowdata_response);
                }
             $response = [
                 'status' => $rowdata_response['status'],
                 'message' => "Excelsheet data import success",
                 'data' =>$data_array
              ];

            }else{
             $response = [
                 'status' => 'failure',
                 'message' =>"Please fix the below excelsheet data",
                 'data' =>$data_array
              ];
            }
            return response()->json($response);

        }

     private function storeSingleRecord_QuickEmployee($row,VmtEmployeeService $employeeService)
        {
             $message = $row['employee_code']  ." not imported ";
             $status = 'failure';
             try {
                $response = $employeeService->createOrUpdate_QuickOnboardData(data: $row, can_onboard_employee:"0", existing_user_id : null, onboard_type:'quick');

                 $status = $response['status'];

                if($response['status'] == "success")
                     $message =  $row['employee_code']  . ' added successfully';
                 else
                     $message =  $row['employee_code']  . ' has failed';

                //Sending mail
                $VmtClientMaster = VmtClientMaster::first();
                $image_view = url('/') . $VmtClientMaster->client_logo;

                \Mail::to($row["email"])->send(new QuickOnboardLink($row['employee_name'], $row['employee_code'], 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));

                return $rowdata_response = [
                    'status' => $status,
                    'message' => $message,
                    'data' =>''
                ];
            }
            catch (\Exception $e) {
                return $rowdata_response = [
                    'status' => $status,
                    'message' => $message,
                    'error_fields' =>  $e->getMessage()." ".$e->getline(),
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
                $importDataArry = Excel::toArray(new VmtEmployeeImport, request()->file('file'));
                return $this->storeBulkOnboardEmployees($importDataArry, $employeeService);
            } else {
                $data['failed'] = $validator->errors()->all();
                return response()->json($data);
            }
            // linking Manager To the employees;
            // $linkToManager  = \Excel::import(new VmtEmployeeManagerImport, request()->file('file'));
        }
        private function storeBulkOnboardEmployees($data,$VmtOnboardingTestingService)
        {

            ini_set('max_execution_time', 300);
            //For output jsonresponse
            $data_array = [];
            //For validation
            $isAllRecordsValid = true;

            $rules = [];

            // $excelRowdata = $data[0][0];
            $excelRowdata_row = $data;
            $currentRowInExcel = 0;
        if(empty($excelRowdata_row )){
            return $rowdata_response = [
                'status' => 'failure',
                'message' => 'Please fill the excel',
            ];

        }else{
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
                    'email' => 'nullable|email:strict|unique:users,email',
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
                    'spouse_dob' => 'nullable',
                    'no_of_child' => 'nullable|numeric',
                    'child_name' => 'nullable',
                    'child_dob' => 'nullable',
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
                     'dearness_allowance' => 'nullable',
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
            }
            } //for loop

            //Runs only if all excel records are valid
            if ($isAllRecordsValid) {
                foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                    $rowdata_response = $this->storeSingleRecord_BulkEmployee($excelRowdata, $employeeService);
                    array_push($data_array, $rowdata_response);
                }

                $response = [
                    'status' => $rowdata_response['status'],
                    'message' => "Excelsheet data import success",
                    'data' =>$data_array
                 ];

            } else {
                $response = [
                    'status' => 'failure',
                    'message' =>"Please fix the below excelsheet data",
                    'data' =>$data_array
                 ];
            }

            return response()->json($response);
        }

          /*

            $outputArray should be passed from parent function.
        */
        private function storeSingleRecord_BulkEmployee($row, $employeeService)
        {
            //DB level validation

              try{

                $response = $employeeService->createOrUpdate_BulkOnboardData(data: $row,can_onboard_employee:"0",existing_user_id : null,onboard_type  : "bulk");
                  $status = $response['status'];
                 if($status == "success")
                    $message =  $row['employee_code']  . ' added successfully';
                 else
                    $message =  $row['employee_code']  . ' has failed';

                       //  $message = "Employee OnBoard was Created   ";
                    //      $VmtClientMaster = VmtClientMaster::first();
                    //      $image_view = url('/') . $VmtClientMaster->client_logo;
                    //    $mail_send = \Mail::to($row["email"])->send(new QuickOnboardLink($row['employee_name'], $row['employee_code'], 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));

                        return  $rowdata_response = [
                            'row_number' => '',
                            'status' => $status,
                            'message' => $message,
                            'data' => '',
                        ];


                } catch(\Exception $e) {

                   return $rowdata_response = [
                    'status' => $status,
                    'message' => $message,
                    'mail_status'=>'failure',
                    'data' => json_encode(['error' => $e->getMessage()]),
                ];
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



    public function getEmployeeMandatoryDetails(Request $request){

        try{
        $data =array();


        $employees_user_code =User::pluck('user_code')->toarray();
        $user_code= array_filter($employees_user_code, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['user_code']=array_values($user_code);
//get

        $employees_email =User::pluck('email')->toarray();
        $email=array_filter($employees_email, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['email']=array_values($email);


        $employees_mobile_number =VmtEmployee::pluck('mobile_number')->toarray();
        $mobile_number = array_filter($employees_mobile_number, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['mobile_number']=array_values($mobile_number);


        $employees_aadhar_number =VmtEmployee::pluck('aadhar_number')->toarray();
        $aadhar_number= array_filter($employees_aadhar_number, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['aadhar_number']=array_values($aadhar_number);


        $employees_pan_number =VmtEmployee::pluck('pan_number')->toarray();
        $pan_number = array_filter($employees_pan_number, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['pan_number']=array_values($pan_number);


        $employees_bankaccount_number =VmtEmployee::pluck('bank_account_number')->toarray();
        $bankaccount_number = array_filter($employees_bankaccount_number, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['bankaccount_number']=array_values($bankaccount_number);

        $employees_officical_mail =VmtEmployeeOfficeDetails::join('users','users.id','=','vmt_employee_office_details.user_id')
                                                           ->where('active','<>','-1')
                                                           ->pluck('officical_mail')->toarray();
        $official_mail = array_filter($employees_officical_mail, static function($data){
            return !is_null($data) && $data !='NULL';
        });
        $data['official_mail']=array_values($official_mail);

        $response = ([
            'status'=>'success',
            'message'=>'',
            "data"=> $data
         ]);
        }catch(\Exception $e){
            $response = ([
                'status'=>'success',
                'message'=>'',
                "data"=> $e->getmessage()." ".$e->getline()
            ]);
        }

        return response()->json($response);
    }
}
