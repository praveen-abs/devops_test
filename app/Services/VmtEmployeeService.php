<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use \stdClass;

use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtOrgRoles;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;


class VmtEmployeeService {

    protected $org_roles;

    protected $session;
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
        $this->org_roles = VmtOrgRoles::all(['id','name'])->keyBy('name');

    }

    public function testUser($user_data){
        //dd($user_data);

        $newUser = User::where('user_code',$user_data['employee_code']);

        if($newUser->exists())
        {
            $newUser = $newUser->first();
        }
        else
        {
            $newUser = new User;
        }

        $newUser->email = "Fake@gmail.com";
        $newUser->save();

        //dd($newUser);
        dd($this->org_roles->toArray());

    }


    /*
        Called this when the normal onboard form is submitted

    */
    public function createOrUpdate_OnboardFormData($data, $can_onboard_employee, $existing_user_id = null)
    {



        $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id);

        if(!empty($response) && $response->status == 'success')
        {
            try
            {

                $onboard_user = $response->response_object;
                $this->createOrUpdate_EmployeeDetails( $onboard_user, $data);
                $this->createOrUpdate_EmployeeOfficeDetails( $onboard_user->id, $data);
                dd('---------------------');
                $this->createOrUpdate_EmployeeStatutoryDetails( $onboard_user->id, $data);
                $this->createOrUpdate_EmployeeFamilyDetails( $onboard_user->id, $data);
                $this->createOrUpdate_EmployeeCompensatory( $onboard_user->id, $data);

                //$message_part =" onboarded successfully.";
            }
            catch(\Exception $e)
            {
                dd($e);
               return null;
            }
        }
        dd($response);

        return $response;
    }

    private function createOrUpdate_User($data, $can_onboard_employee,$user_id=null)
    {
        $newUser = null;

        try
        {
            if(! empty($user_id))
            {

                $newUser = User::where('id',$user_id);

                $newUser = $newUser->first();

                //Update existing user
                $newUser->name = $data['employee_name'];
                $newUser->email = $data["email"];
                //$newUser->password = Hash::make('Abs@123123');
                //$newUser->avatar = $data['employee_code'] . '_avatar.jpg';
                $newUser->user_code = strtoupper($data['employee_code']);
                //$newUser->active = '0';
                $newUser->is_onboarded = $can_onboard_employee;
                //$newUser->onboard_type = 'normal';
                //$newUser->org_role = '5';
                //$newUser->is_ssa = '0';
                $newUser->save();

            }
            else
            {
                $newUser = $this->CreateNewUser($data, $can_onboard_employee);
            }
        }
        catch(\Exception $e)
        {
            $response = new stdClass;
            $response->status = "failure";
            $response->message = $e;

            return $response;
        }

        $response = new stdClass;
        $response->status = "success";
        $response->response_object = $newUser;

        return $response;
    }

    private function CreateNewUser($data, $can_onboard_employee)
    {
        $newUser = new User;

        $newUser->name =$data['employee_name'];
        $newUser->email = $data["email"];
        $newUser->password = Hash::make('Abs@123123');
        //$newUser->avatar = $data['employee_code'] . '_avatar.jpg';
        $newUser->user_code = strtoupper($data['employee_code']);
        $newUser->active = '0';
        $newUser->is_default_password_updated = '0';

        $newUser->is_onboarded = $can_onboard_employee;
        $newUser->onboard_type = 'normal';
        $newUser->org_role = '5';
        $newUser->is_ssa = '0';
        $newUser->save();

        return $newUser;
    }

    private function createOrUpdate_EmployeeDetails($user,$row)
    {
        //Sdd("Inside emp details");
        $newEmployee = VmtEmployee::where('userid',$user->id);
        // dd($newEmployee->exists());
        if($newEmployee->exists())
        {
            $newEmployee = $newEmployee->first();
        }
        else
        {
            $newEmployee = new VmtEmployee;
        }

        $doj=$row["doj"];
        $dob=$row["dob"];


        $newEmployee->userid   =    $user->id;
        $newEmployee->emp_no   =    $row["employee_code"] ?? '';
        $newEmployee->gender   =    $row["gender"] ?? '';
        $newEmployee->doj   =    $this->getdateFormatForDb($doj);
        $newEmployee->dol   =    $this->getdateFormatForDb($doj);
        $newEmployee->dob   =    $this->getdateFormatForDb($dob);
        $newEmployee->location   =    $row["work_location"] ?? '';
        $newEmployee->father_name   =  $row["father_name"] ?? '';
        $newEmployee->pan_number   =  isset($row["pan_number"]) ? ($row["pan_number"]) : "";
        $newEmployee->dl_no   =  $row["dl_no"] ?? '';
        $newEmployee->passport_number = $row["passport_no"] ?? '';
        $newEmployee->passport_date = $row["passport_date"] ?? '';

        //$newEmployee->pan_ack   =    $row["pan_ack"];
        $newEmployee->aadhar_number = $row["aadhar_number"] ?? '';

        $newEmployee->marital_status = $row["marital_status"] ?? '';

        $newEmployee->nationality = $row["nationality"] ?? '';

        $newEmployee->mobile_number  = strval($row["mobile_number"]);
        $newEmployee->blood_group_id  = $row["blood_group_id"] ?? '';
        $newEmployee->physically_challenged  = $row["physically_challenged"] ?? 'no';
        $newEmployee->bank_id   = $row["bank_id"] ?? '';
        $newEmployee->bank_ifsc_code  = $row["bank_ifsc"] ?? '';
        $newEmployee->bank_account_number  = $row["AccountNumber"] ?? '';
        // $newEmployee->present_address   = $row["current_address_line_1"] ?? '' . ' , ' . $row["current_address_line_2"] ?? '';
        // $newEmployee->permanent_address   = $row["permanent_address_line_1"] ?? '' . ' , ' . $row["permanent_address_line_2"] ?? '';
        $newEmployee->current_address_line_1   = $row["current_address_line_1"] ?? '';
        $newEmployee->current_address_line_2   = $row["current_address_line_2"] ?? '' ;
        $newEmployee->permanent_address_line_1   = $row["permanent_address_line_1"] ?? '';
        $newEmployee->permanent_address_line_2   = $row["permanent_address_line_2"] ?? '';
        $newEmployee->current_country_id   = $row["current_country"] ?? '';
        $newEmployee->permanent_country_id   = $row["permanent_country"] ?? '';
        $newEmployee->current_state_id   = $row["current_state"] ?? '';
        $newEmployee->permanent_state_id   = $row["permanent_state"] ?? '';
        $newEmployee->current_city   = $row["current_city"] ?? '';
        $newEmployee->permanent_city   = $row["permanent_city"] ?? '';
        $newEmployee->current_pincode   = $row["current_pincode"] ?? '';
        $newEmployee->permanent_pincode   = $row["permanent_pincode"] ?? '';

        if (!empty($row['marital_status'])) {
            if ($row['marital_status'] <> 'unmarried') {
                $newEmployee->no_of_children   = $row["no_of_children"] ?? 0;

                if (!empty($row['no_of_children']) && $row['no_of_children'] > 0) {
                    // $newEmployee->kid_name   = json_encode($row["child_name"]);
                    // $newEmployee->kid_age  = json_encode($row["child_dob"]);
                }
            }
        } else {
            $row['marital_status'] = '';
        }


        $newEmployee->aadhar_card_file = $this->uploadDocument( $row['Aadharfront'], $user->user_code, 'aadhar_front_');
        $newEmployee->aadhar_card_backend_file = $this->uploadDocument($row['AadharBack'], $user->user_code,'aadhar_back_');
        $newEmployee->pan_card_file = $this->uploadDocument($row['panDoc'], $user->user_code,'pan_');
        $newEmployee->passport_file = $this->uploadDocument($row['passport'], $user->user_code,'passport_');
        $newEmployee->voters_id_file = $this->uploadDocument($row['voterId'], $user->user_code,'voter_id_');
        $newEmployee->dl_file = $this->uploadDocument($row['dlDoc'], $user->user_code,'driver_license_');
        $newEmployee->education_certificate_file = $this->uploadDocument($row['eductionDoc'], $user->user_code,'edu_doc_');
        $newEmployee->reliving_letter_file = $this->uploadDocument($row['releivingDoc'],$user->user_code,'reliving_letter_');
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
    }

    private function createOrUpdate_EmployeeOfficeDetails($user_id,$row)
    {

        $empOffice = VmtEmployeeOfficeDetails::where('user_id',$user_id);

        if($empOffice->exists())
        {
            $empOffice = $empOffice->first();
        }
        else
        {
            $empOffice = new VmtEmployeeOfficeDetails;
        }
        //dd($row);
         $empOffice->user_id = $user_id; //Link between USERS and VmtEmployeeOfficeDetails table
         $empOffice->department_id = $row["department"] ?? ''; // => "lk"
         $empOffice->process = $row["process"] ?? ''; // => "k"
         $empOffice->designation = $row["designation"] ?? ''; // => "k"
         $empOffice->cost_center = $row["cost_center"] ?? ''; // => "k"
         $empOffice->probation_period  = $row['probation_period'] ?? ''; // => "k"
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

    private function createOrUpdate_EmployeeStatutoryDetails($user_id,$row)
    {
        $newEmployee_statutoryDetails = VmtEmployeeStatutoryDetails::where('user_id',$user_id);

        if($newEmployee_statutoryDetails->exists())
        {
            $newEmployee_statutoryDetails = $newEmployee_statutoryDetails->first();
        }
        else
        {
            $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
        }

        //Statutory Details
        $newEmployee_statutoryDetails->user_id = $user_id;
        $newEmployee_statutoryDetails->uan_number = $row["uan_number"] ?? '';
        $newEmployee_statutoryDetails->epf_number = $row["epf_number"] ?? '';
        $newEmployee_statutoryDetails->esic_number = $row["esic_number"] ?? '';
        $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"] ?? '';
        $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"] ?? '';
        $newEmployee_statutoryDetails->ptax_location_state_id = $row["ptax_location"] ?? '';
        $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"] ?? '';
        $newEmployee_statutoryDetails->lwf_location_state_id = $row["lwf_location"] ?? '';
        $newEmployee_statutoryDetails->save();
    }

    private function createOrUpdate_EmployeeFamilyDetails($user_id, $familyData)
    {
        //delete old records
        VmtEmployeeFamilyDetails::where('user_id',$user_id)->delete();

        if(!empty($familyData['father_name'])){

            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['father_name'];
            $familyMember->relationship = 'Father';
            $familyMember->gender = $familyData['father_gender'];


            //dd($familyData["dob_father"]);
            if(!empty($familyData["dob_father"]))
                $familyMember->dob = $familyData["dob_father"];

            $familyMember->save();
           // dd($familyMember);

        }

        if(!empty($familyData['mother_name'])){
            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['mother_name'];
            $familyMember->relationship = 'Mother';
            $familyMember->gender = $familyData['mother_gender'];

            if(!empty($familyData["dob_mother"]))
                $familyMember->dob = $familyData["dob_mother"];
            //$familyData["mother_dob"];

            $familyMember->save();
        }
        //dd($familyData);

        if (!empty($familyData['marital_status']) && $familyData['marital_status'] <> 'unmarried') {
            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['spouse_name'];
            $familyMember->relationship = 'Spouse';
            $familyMember->gender = $familyData['spouse_gender'] ?? '';

            if(!empty($familyData["dob_spouse"]))
                $familyMember->dob =  $familyData["dob_spouse"];

            if(!empty($familyData["wedding_date"]))
                $familyMember->wedding_date =  $familyData["wedding_date"];


            $familyMember->save();

            if (!empty($familyData['child_name'])) {
                $familyMember =  new VmtEmployeeFamilyDetails;
                $familyMember->user_id  = $user_id;
                $familyMember->name =   $familyData['child_name'];
                $familyMember->relationship = 'Children';
                $familyMember->gender = '---';

                if(isset($familyData["child_dob"]))
                    $familyMember->dob =   $familyData["child_dob"];
                //$familyData["child_dob"];

                $familyMember->save();
            }
        }

    }

    private function createOrUpdate_EmployeeEmergencyContactsDetails($user_data)
    {
    }

    private function createOrUpdate_EmployeeCompensatory($user_id,$row)
    {
        $compensatory = Compensatory::where('user_id',$user_id);

        if($compensatory->exists())
        {
            $compensatory = $compensatory->first();
        }
        else
        {
            $compensatory = new Compensatory;
        }


        $compensatory->user_id = $user_id;
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


    public function deleteEmployee($user_id)
    {
        User::where('id',$user_id)->delete();

        VmtEmployee::where('userid',$user_id)->delete();
        VmtEmployeeOfficeDetails::where('user_id', $user_id->id)->delete();
        VmtEmployeeStatutoryDetails::where('user_id', $user_id)->delete();
        Compensatory::where('user_id', $user_id)->delete();

    }

    public function uploadDocument($fileObject, $emp_code, $filename){


        $date=date('d-m-Y H-i-s');
        $fileName = $filename.$emp_code.'_'.$date.'.'.$fileObject->extension();
        $path='employee/emp_'.$emp_code.'/documents';
        $filePath = $fileObject->storeAs($path,$fileName, 'private');
        return $fileName;
    }

    // public function fileUpload($file, $emp_code)
    // {

    //     // dd( $file->file->getClientOriginalName());
    //     if (!empty($file)) {
    //         $docUploads =$file;
    //         $docUploadsName = 'doc_' .$emp_code.'_'. $file . "_" . time() . '.' . $docUploads->getClientOriginalExtension();
    //         dd(Storage::disk('private')->exists($emp_code));
    //         $emp_document_path = Storage::disk('private');


    //         //Upload the new file
    //         $docUploads->storeAs($emp_code,$docUploadsName,'private');
    //         //$docUploads->move($emp_document_path, $docUploadsName);
    //         return $docUploadsName;
    //     }
    //     else
    //     {
    //         return "";
    //     }
    // }

    // Generate Employee Apoinment PDF after onboarding
    public function attachApoinmentPdf($employeeData)
    {
        //dd($employeeData);
        $VmtGeneralInfo = VmtGeneralInfo::first();
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

        $image_view = url('/') . $VmtGeneralInfo->logo_img;
        $appoinmentPath = "";

        if (fetchMasterConfigValue("can_send_appointmentletter_after_onboarding") == "true") {

            //Fetch appointment letter based on client name
            $client_name = str_replace(' ', '', sessionGetSelectedClientName());
            //$client_name = Str::lower(str_replace(' ', '', getCurrentClientName()) );
            $viewfile_appointmentletter = 'vmt_appointment_templates.mailtemplate_appointmentletter_'.$client_name;

            //check if template exists
            if (view()->exists($viewfile_appointmentletter)) {

                $html =  view($viewfile_appointmentletter, compact('data'));

                $pdf = new Dompdf();
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


    public function isUserExist($t_emp_code)
    {
        if (empty(User::where('user_code', $t_emp_code)->where('is_ssa', '0')->first()))
            return false;
        else
            return true;
    }

    private function getdateFormatForDb($date){
          //Check if its in proper format
          $processed_date = \DateTime::createFromFormat('d-m-Y', $date);

          //If date is in 'd-m-y' format, then convert into one
          if( $processed_date)
          {
              //Then convert to Y-m-d
              $processed_date =  $processed_date->format('Y-m-d');
          }
          else
          {
              //If date is not in 'd-m-y' format, then convert into 'd-m-y'

              $processed_date = \DateTime::createFromFormat('Y-m-d', $date)->format('Y-m-d');

          }

        return $processed_date;
    }

}
