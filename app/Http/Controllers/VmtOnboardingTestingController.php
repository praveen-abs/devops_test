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

        $data=$request->all();
        $user_id =$data['employee_code'];

        $onboard_form_data =  array();

        $onboard_form_data  = $data;

        $currentLoggedinInUser = auth()->user();

        //Check whether we are updating existing user or adding new user.

              $existingUser = User::where('user_code',$user_id);

            if($existingUser->exists())
            {
                //If current user is Admin, then its normal onboarding or updating existing user details.
                if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]))
                {

                    // $result = $employeeService->createOrUpdate_OnboardFormData($onboard_form_data, $request->input('can_onboard_employee'), $existingUser->first()->id);

                $result = $VmtOnboardingTestingService->createOrUpdate_NormalOnboardData($onboard_form_data, $onboard_form_data['can_onboard_employee'], $existingUser->first()->id);

                    $message = "";
                    $isEmailSent  ="";
                    //dd($request->input('can_onboard_employee'));
                    if($result['status'] == "success")
                    {

                        if($request->input('can_onboard_employee') == "1") {

                            //$isEmailSent  = $VmtOnboardingTestingService->attachAppointmentLetterPDF($onboard_form_data);
                            $message="Employee onboarded successfully";

                        } else{

                            $message="Employee details updated in draft";
                        }

                        $response = [
                            'status' => 'success',
                            'message' => $message,
                            'mail_status' => $isEmailSent ? "success" : "failure",
                            'data'=>'',
                        ];

                    } else{
                        //When error occured while storing User, then show error to UI
                        $response = [
                            'status' => $result['status'] ,
                            'message' => "Error while creating/update User details. LINE : ".__LINE__,
                            'data'=>'',
                        ];
                    }

                }else{
                    $response = [
                        'status' => 'failure',
                        'message' => 'You are not authorized to perform this action. Please contact the Admin immediately',
                        'data'=>'',
                        'mail_status' => '',

                    ];
                }

            }else {
                //we are inserting new user as NORMAL onboard.
                //Check whether current login is admin
                if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]) )
                {

            $result = $VmtOnboardingTestingService->createOrUpdate_NormalOnboardData($onboard_form_data, $onboard_form_data['can_onboard_employee'], null,"normal","onboard_form");


                    if($result['status']  == "success"){
                        $response = [
                            'status' => 'success',
                            'message' => 'New Employee information Saved in draft',
                            'data'=>'',
                            'mail_status' => ''

                        ];
                    }else{
                        //When error occured while storing User, then show error to UI
                        $response = [
                                'status' => $result['status'] ,
                                'message' => "Error while creating/update User details : LINE : ".__LINE__,
                                'data'=>''
                        ];
                    }

                }else{

                    $response = [
                        'status' => 'failure',
                        'message' => 'You are not authorized to perform this action. Please contact the Admin immediately. Log : '.$currentLoggedinInUser,
                        'mail_status' => '',
                        'data'=>''
                    ];
                }
            }

            return response()->json($response);
        }


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

            $VmtClientMaster = VmtClientMaster::first();

            $rules = [];
            $responseJSON = [
                'status' => 'none',
                'message' => 'none',
                'data' => [],
            ];

            $excelRowdata_row = $data;
 //dd($excelRowdata_row);
            $currentRowInExcel = 0;
             if(empty($excelRowdata_row )){
                 return $rowdata_response = [
                     'status' => 'failure',
                     'message' => 'Please fill the excel',
                 ];

             }else{

            foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {

                $currentRowInExcel++;

                // var_dump($excelRowdata);exit();
                //Validation
                $rules = [
                    'employee_code' => ['unique:users,user_code|distinct',
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
           }

         }

           //for each
            //Runs only if all excel records are valid
            if ($isAllRecordsValid) {
                foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                    $rowdata_response = $this->storeSingleRecord_QuickEmployee($excelRowdata, $employeeService);
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

               // $this->deleteUser($user->id);

                return $rowdata_response = [
                    'status' => $status,
                    'message' => $message,
                    'error_fields' =>  $e->getMessage().$e->getline(),
                ];


                //$responseJSON['status'] = 'failure';
                //$responseJSON['message'] = $empNo . " not get added because of error " . $e->getMessage();
                //$responseJSON['data'] = json_encode(['error' => $e->getMessage()]);
                //$responseJSON['stacktrace'] = json_encode(report($e));
                //dd($e->getMessage());
                //$returnfailedMsg .= $empNo." not get added because of error ".$e->getMessage()." <br/>";
            }

        }
    }

