<?php

namespace App\Http\Controllers;
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
use App\Services\VmtOnboardingTestingService;



class VmtOnboardingTestingController extends Controller
{
    //
    public function processEmployeeOnboardForm_Normal(Request $request,VmtOnboardingTestingService $VmtOnboardingTestingService ){
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

                      $result = $VmtOnboardingTestingService->createOrUpdate_OnboardData($onboard_form_data, $onboard_form_data['can_onboard_employee'], $existingUser->first()->id, $onboard_type = 'normal');

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

                          $result = $VmtOnboardingTestingService->createOrUpdate_OnboardData($onboard_form_data, $request->input('can_onboard_employee'), $existingUser->first()->id,$onboard_type ='quick');

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

              }
              else { //we are inserting new user as NORMAL onboard.
                     //Check whether current login is admin

                  if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]) )
                  {
                      $result = $VmtOnboardingTestingService->createOrUpdate_OnboardData($onboard_form_data, $onboard_form_data['can_onboard_employee'],'', $onboard_type ='normal');

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
             }catch(Exception $e){
                $response = [
                    'status' => 'failure',
                    'message' => "Error while creating/update Employee details",
                    'data' =>$e->getmessage()." ".$e->getline(),
                ];
            }
            return response()->json($response);
        }


 public function importQuickOnboardEmployeesExcelData(Request $request, VmtOnboardingTestingService $VmtOnboardingTestingService)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));

        return $this->storeQuickOnboardEmployees($importDataArry, $VmtOnboardingTestingService);
    }

        // insert the employee to database for quick onboarding
     private function storeQuickOnboardEmployees($data,  $VmtOnboardingTestingService)
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

     private function storeSingleRecord_QuickEmployee($row,VmtOnboardingTestingService $VmtOnboardingTestingService)
        {
             $message = $row['employee_code']  ." not imported ";
             $status = 'failure';
             try {
                $response = $VmtOnboardingTestingService->createOrUpdate_QuickOnboardData(data: $row, can_onboard_employee:"0", existing_user_id : null, onboard_type:'quick');

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

        public function importBulkOnboardEmployeesExcelData(Request $request,VmtOnboardingTestingService $VmtOnboardingTestingService)
        {

            $validator =    Validator::make(
                $request->all(),
                ['file' => 'required|file|mimes:xls,xlsx'],
                ['required' => 'The :attribute is required.']
            );

            if ($validator->passes()) {
                $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));
                return $this->storeBulkOnboardEmployees($importDataArry, $VmtOnboardingTestingService);
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
                    $rowdata_response = $this->storeSingleRecord_BulkEmployee($excelRowdata, $VmtOnboardingTestingService);
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
        private function storeSingleRecord_BulkEmployee($row, $VmtOnboardingTestingService)
        {
            //DB level validation

              try{

                $response = $VmtOnboardingTestingService->createOrUpdate_BulkOnboardData(data: $row,can_onboard_employee:"0",existing_user_id : null,onboard_type  : "bulk");
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

    }

