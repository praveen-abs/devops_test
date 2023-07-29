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



        public function storeQuickOnboardEmployees( Request $request,VmtOnboardingTestingService $VmtOnboardingTestingService )
        {
            $data = $request->all();
            $data_array =array();
            $onboard_data =array();
            foreach ($data  as $key => $excelRowdata) {

            $processed_data = str_replace(array(' (dd-mmm-yyyy)',' '),array('','_'),array_keys($excelRowdata));

            $Emp_data = array_combine(array_map('strtolower', $processed_data),array_values($excelRowdata));

            array_push($onboard_data,$Emp_data);
            }
           // dd($onboard_data);
            foreach ($onboard_data  as $key => $excelRowdata) {

                            $rowdata_response = $this->storeSingleRecord_QuickEmployee($excelRowdata,$VmtOnboardingTestingService);
                            array_push($data_array, $rowdata_response);
                        }

                     $response = [
                         'status' => $rowdata_response['status'],
                         'message' => "Excelsheet data import success",
                         'data' =>$data_array
                      ];

                      return response()->json($response);
                }

      public function storeSingleRecord_QuickEmployee($row,VmtOnboardingTestingService $VmtOnboardingTestingService)
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

        public function storeBulkOnboardEmployees(Request $request,VmtOnboardingTestingService $VmtOnboardingTestingService){

            $data = $request->all();
            $data_array =array();
            $onboard_data =array();
            foreach ($data  as $key => $excelRowdata) {

            $processed_data = str_replace(array(' (dd-mmm-yyyy)',' '),array('','_'),array_keys($excelRowdata));

            $Emp_data = array_combine(array_map('strtolower', $processed_data),array_values($excelRowdata));

            array_push($onboard_data,$Emp_data);
            }

            foreach ($onboard_data  as $key => $excelRowdata) {
                            $rowdata_response = $this->storeSingleRecord_BulkEmployee($excelRowdata,$VmtOnboardingTestingService);
                            array_push($data_array, $rowdata_response);
                        }

                     $response = [
                         'status' => $rowdata_response['status'],
                         'message' => "Excelsheet data import success",
                         'data' =>$data_array
                      ];

                      return response()->json($response);

        }
          /*

            $outputArray should be passed from parent function.
        */
        private function storeSingleRecord_BulkEmployee($row,VmtOnboardingTestingService $VmtOnboardingTestingService)
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

