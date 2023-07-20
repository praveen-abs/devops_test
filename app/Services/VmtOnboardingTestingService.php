<?php

namespace App\Services;

use Illuminate\Support\Collection;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtClientMaster;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\Department;
use App\Models\VmtMaritalStatus;
use App\Models\Bank;
use App\Models\VmtEmployeeWorkShifts;
use App\Models\VmtWorkShifts;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtOrgRoles;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class VmtOnboardingTestingService {


    public function createOrUpdate_OnboardData($data, $can_onboard_employee, $existing_user_id = null, $onboard_type = null)
    {
        //dd("heeey");
        $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id, onboard_type : $onboard_type);

        if(!empty($response) && $response['status'] == 'success')
        {

             try{

                $user_data = $response['data'];

                $save_details = $this->Save_EmployeeOnboard_Data($data,$user_data,$onboard_type);

                 $response=([
                    'status' => $save_details['status'],
                    'message' => '',
                    'data' =>''
                ]);

                return $response;

              }catch(Exception $e){

                return $response=([
                    'status' => 'failure',
                    'message' => 'Error while saving record ',
                    'data' =>$e->getMessage()." ".$e->getline()

                ]);
              }
       }else{

        return $response=([
            'status' => $response['status'],
            'message' => 'Error while saving record ',
            'data' =>$response['data']

        ]);

       }
  }

  public function createOrUpdate_BulkOnboardData($data, $can_onboard_employee, $existing_user_id = null,$onboard_type = null)
  {
      //dd("heeey");
      $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id, onboard_type : $onboard_type);

      if(!empty($response) && $response['status'] == 'success')
      {

           try{

              $user_data = $response['data'];

              $save_details = $this->Save_EmployeeOnboard_Data($data, $user_data, $onboard_type);

               $response=([
                  'status' => $save_details['status'],
                  'message' => 'Employee details saved successfully',
                  'data' =>''
              ]);

              return $response;

            }catch(Exception $e){

              return $response=([
                  'status' => 'failure',
                  'message' => 'Error while saving record ',
                  'data' =>$e->getMessage()." ".$e->getline()

              ]);
            }
     }else{

      return $response=([
          'status' => $response['status'],
          'message' => 'Error while saving record ',
          'data' =>$response['data']

      ]);

     }
}
  public function createOrUpdate_QuickOnboardData($data, $can_onboard_employee, $existing_user_id = null,$onboard_type = null)
  {
      //dd("heeey");
      $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id, onboard_type : $onboard_type );

      if(!empty($response) && $response['status'] == 'success')
      {

           try{

              $user_data = $response['data'];

              $save_details = $this->Save_Employee_QuickOnboard_Data($data,$user_data, $onboard_type);

               $response=([
                  'status' => $save_details['status'],
                  'message' => 'Employee details saved successfully',
                  'data' =>''
              ]);

              return $response;

            }catch(Exception $e){

              return $response=([
                  'status' => 'failure',
                  'message' => 'Error while saving record ',
                  'data' =>$e->getMessage()." ".$e->getline()

              ]);
            }
     }else{

      return $response=([
          'status' => $response['status'],
          'message' => 'Error while saving record ',
          'data' =>$response['data']

      ]);

     }
}

private function createOrUpdate_User($data, $can_onboard_employee,$user_id=null, $onboard_type)
    {
        $newUser = null;

        try
        {

            if(!empty($user_id))
            {

                $newUser = User::where('id',$user_id)->first();

                //Update existing user
                $newUser->name = $data['employee_name'];
                $newUser->email = empty($data["email"]) ? '' : $data["email"];
                $newUser->is_onboarded = $can_onboard_employee;
                //$newUser->password = Hash::make('Abs@123123');
                //$newUser->avatar = $data['employee_code'] . '_avatar.jpg';
                //$newUser->active = '0';
                //$newUser->onboard_type = 'normal';
                //$newUser->org_role = '5';
                //$newUser->is_ssa = '0';
                $newUser->save();


            }
            else
            {
                $newUser = $this->CreateNewUser($data, $can_onboard_employee, $onboard_type);
            }

            $response = ([
                'status' => 'success',
                'message' =>'',
                'data' =>$newUser
            ]);

            return $response;
        }
        catch(\Exception $e)
        {

            $this->deleteEmployee($newUser->id);

            return $response=([
                'status' => 'failure',
                'message' =>'',
                'data' =>$e->getMessage()
            ]);


        }

    }

    private function CreateNewUser($data, $can_onboard_employee, $onboard_type)
    {
        try
        {

            $newUser = new User;
            $newUser->name =$data['employee_name'];
            $newUser->email = empty($data["email"]) ? '' : $data["email"];
            $newUser->password = Hash::make('Abs@123123');
            //$newUser->avatar = $data['employee_code'] . '_avatar.jpg';
            $newUser->user_code = strtoupper($data['employee_code']);
            $emp_client_code = preg_replace('/\d+/', '',strtoupper($data['employee_code']));
            $newUser->client_id = VmtClientMaster::where('client_code', $emp_client_code)->first()->id;
            $newUser->active = '0';
            $newUser->is_default_password_updated = '0';
            $newUser->is_onboarded = $can_onboard_employee;
            $newUser->onboard_type = $onboard_type; //normal, quick, bulk
            $newUser->org_role = '5';
            $newUser->is_ssa = '0';
            $newUser->save();

               return $response = $newUser;

        }
        catch(\Exception $e){

            $this->deleteEmployee($newUser->id);

            return $response=([
                'status' => 'failure',
                'message' =>'',
                'data' =>"Error in VmtEmployeeService::CreateNewUser() : ".$e->getMessage()
            ]);

        }
    }
    public function Save_EmployeeOnboard_Data($data,$user_data,$onboard_type){

        try{

        $user_id = $user_data->id;

        $newEmployee = VmtEmployee::where('userid',$user_id);

        if($newEmployee->exists())
        {
            $newEmployee = $newEmployee->first();
        }
        else
        {
            $newEmployee = new VmtEmployee;
        }

        $dob=$data["dob"] ?? '';
        $doj=$data["doj"] ?? '';
        $passport_date =  $data["passport_date"] ?? '';

        $newEmployee->userid   =    $user_id;
        $newEmployee->marital_status_id = $data["marital_status"] ?? '';
        $newEmployee->dob   =  $dob ? $this->getdateFormatForDb($dob,$user_id) : '';
        $newEmployee->doj   =  $doj ? $this->getdateFormatForDb($doj,$user_id) : '';
        $newEmployee->dol   =  $doj ? $this->getdateFormatForDb($doj,$user_id) : '';
        $newEmployee->gender   =    $data["gender"] ?? '';
        $data_mobile_number = empty($data["mobile_number"]) ? "" : strval($data["mobile_number"]);
        $newEmployee->mobile_number  = $data_mobile_number;
        $newEmployee->aadhar_number = $data["aadhar_number"] ?? '';
        $newEmployee->pan_number   =  isset($data["pan_number"]) ? ($data["pan_number"]) : " ";
        $newEmployee->dl_no   =  $data["dl_no"] ?? '';
        $newEmployee->nationality = $data["nationality"] ?? '';
        $newEmployee->passport_number = $data["passport_no"] ?? '';
        $newEmployee->passport_date =  $passport_date ? $this->getdateFormatForDb( $passport_date,$user_id) : '';
        //$newEmployee->pan_ack   =    $data["pan_ack"];
        $newEmployee->location   =    $data["work_location"] ?? '';
        $newEmployee->blood_group_id  = $data["blood_group_name"] ?? '';
        $newEmployee->physically_challenged  = $data["physically_challenged"] ?? 'no';
        $newEmployee->bank_id   = $data["bank_id"] ?? '';
        $newEmployee->bank_account_number  = $data["AccountNumber"] ?? '';
        $newEmployee->bank_ifsc_code  = $data["bank_ifsc"] ?? '';

        //employee address details
        $newEmployee->current_address_line_1   = $data["current_address_line_1"] ?? '';
        $newEmployee->current_address_line_2   = $data["current_address_line_2"] ?? '' ;
        $newEmployee->permanent_address_line_1   = $data["permanent_address_line_1"] ?? '';
        $newEmployee->permanent_address_line_2   = $data["permanent_address_line_2"] ?? '';
        $newEmployee->current_country_id   = $data["current_country"] ?? '';
        $newEmployee->permanent_country_id   = $data["permanent_country"] ?? '';
        $newEmployee->current_state_id   = $data["current_state"] ?? '';
        $newEmployee->permanent_state_id   = $data["permanent_state"] ?? '';
        $newEmployee->current_city   = $data["current_city"] ?? '';
        $newEmployee->permanent_city   = $data["permanent_city"] ?? '';
        $newEmployee->current_pincode   = $data["current_pincode"] ?? '';
        $newEmployee->permanent_pincode   = $data["permanent_pincode"] ?? '';
        $newEmployee->no_of_children   = $data["no_of_children"] ?? 0;

        $newEmployee->save();
        //save employee office details

     $empOffice = VmtEmployeeOfficeDetails::where('user_id',$user_id);

        if($empOffice->exists())
        {
            $empOffice = $empOffice->first();

        }
        else
        {
            $empOffice = new VmtEmployeeOfficeDetails;
        }
            //dd($data);
            $confirmation_period= $data['confirmation_period'] ?? '';
            $empOffice->user_id = $user_id;
            $empOffice->department_id = $data["department"] ?? '';
            $empOffice->process = $data["process"] ?? '';
            $empOffice->designation = $data["designation"] ?? '';
            $empOffice->cost_center = $data["cost_center"] ?? '';
            $empOffice->probation_period  = $data['probation_period'] ?? '';
            $empOffice->confirmation_period  = $confirmation_period ? $this->getdateFormatForDb( $confirmation_period,$user_id) : '';
            $empOffice->holiday_location  = $data["holiday_location"] ?? '';
            $empOffice->l1_manager_code  = $data["l1_manager_code_id"] ?? '';
            $empOffice->work_location  = $data["work_location"] ?? '';
            $empOffice->officical_mail  = $data["officical_mail"] ?? '';
            $empOffice->official_mobile  = $data["official_mobile"] ?? '';
            $empOffice->emp_notice  = $data["emp_notice"] ?? '';
            $empOffice->save();

        //assign default workshift to employee

            $emp_workshift = new VmtEmployeeWorkShifts;
            $emp_workshift->user_id = $user_id;
            $work_shift_id =VmtWorkShifts::where('is_default','1')->first();
            if(!empty($work_shift_id)){
                $emp_workshift->work_shift_id = $work_shift_id->id;
            }
            $emp_workshift->is_active ='1';
            $emp_workshift->save();

        //save statutory data of employee
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
            $newEmployee_statutoryDetails->uan_number = $data["uan_number"] ?? '';
            $newEmployee_statutoryDetails->epf_number = $data["epf_number"] ?? '';
            $newEmployee_statutoryDetails->esic_number = $data["esic_number"] ?? '';
            $newEmployee_statutoryDetails->pf_applicable = $data["pf_applicable"] ?? '';
            $newEmployee_statutoryDetails->esic_applicable = $data["esic_applicable"] ?? '';
            $newEmployee_statutoryDetails->ptax_location_state_id = $data["ptax_location"] ?? '';
            $newEmployee_statutoryDetails->tax_regime = $data["tax_regime"] ?? '';
            $newEmployee_statutoryDetails->lwf_location_state_id = $data["lwf_location"] ?? '';
            $newEmployee_statutoryDetails->save();

        //save family data of employees

            VmtEmployeeFamilyDetails::where('user_id',$user_id)->delete();
    //save father data
            if(!empty($data['father_name'])){
                $familyMember =  new VmtEmployeeFamilyDetails;
                $familyMember->user_id  = $user_id;
                $familyMember->name =   $data['father_name'];
                $familyMember->relationship = 'Father';
                $familyMember->gender = $data['father_gender'];

            if(!empty($data["dob_father"])){
                    $dob_father=$data["dob_father"];
                    $familyMember->dob = $this->getdateFormatForDb( $dob_father,$user_id);
                    }
                $familyMember->save();
            }
    //save mother data
            if(!empty($data['mother_name'])){
                $familyMember =  new VmtEmployeeFamilyDetails;
                $familyMember->user_id  = $user_id;
                $familyMember->name =   $data['mother_name'];
                $familyMember->relationship = 'Mother';
                $familyMember->gender = $data['mother_gender'];

            if(!empty($data["dob_mother"])){
                $dob_mother=$data["dob_mother"];
                $familyMember->dob = $this->getdateFormatForDb( $dob_mother,$user_id) ;
                }
                $familyMember->save();
            }
    //save spouse data
            if( !empty($data['spouse_name'])){
                $familyMember =  new VmtEmployeeFamilyDetails;
                $familyMember->user_id  = $user_id;
                $familyMember->name =   $data['spouse_name'];
                $familyMember->relationship = 'Spouse';
                $familyMember->gender = $data['spouse_gender'] ?? '';

            if(!empty($data["dob_spouse"])){
                    $dob_spouse =  $data["dob_spouse"];
                    $familyMember->dob = $this->getdateFormatForDb(  $dob_spouse,$user_id);
                }

            if(!empty($data["wedding_date"])){
                    $wedding_date = $data["wedding_date"];
                    $familyMember->wedding_date = $this->getdateFormatForDb( $wedding_date,$user_id) ;
                }
                $familyMember->save();
            }
    //save child data
            if (!empty($data['child_name'])){
                    $familyMember =  new VmtEmployeeFamilyDetails;
                    $familyMember->user_id  = $user_id;
                    $familyMember->name =   $data['child_name'];
                    $familyMember->relationship = 'Children';
                    $familyMember->gender = '---';

            if(!empty($data["child_dob"])){
                    $child_dob= $data["child_dob"];
                    $familyMember->dob = $this->getdateFormatForDb( $child_dob,$user_id) ;
                    }
                    $familyMember->save();
                }

        //save compensatory data of employee
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
            $compensatory->basic = $data["basic"] ?? '';
            $compensatory->hra = $data["hra"] ?? '';
            $compensatory->Statutory_bonus = $data["statutory_bonus"] ?? '' ;
            $compensatory->child_education_allowance = $data["child_education_allowance"] ?? '' ;
            $compensatory->food_coupon = $data["food_coupon"] ?? '' ;
            $compensatory->lta = $data["lta"] ?? '' ;
            $compensatory->special_allowance = $data["special_allowance"] ?? '' ;
            $compensatory->other_allowance = $data["other_allowance"] ?? '' ;
            $compensatory->gross = $data["gross"] ?? '' ;
            $compensatory->epf_employer_contribution = $data["epf_employer_contribution"] ?? '' ;
            $compensatory->esic_employer_contribution = $data["esic_employer_contribution"] ?? '' ;
            $compensatory->insurance = $data["insurance"] ?? '' ;
            $compensatory->graduity = $data["graduity"] ?? '' ;
            $compensatory->cic = $data["cic"] ?? '' ;
            $compensatory->epf_employee = $data["epf_employee"] ?? '' ;
            $compensatory->esic_employee = $data["esic_employee"] ?? '' ;
            $compensatory->professional_tax = $data["professional_tax"] ?? '' ;
            $compensatory->labour_welfare_fund = $data["labour_welfare_fund"] ?? '' ;
            $compensatory->net_income = $data["net_income"] ?? '' ;
            $compensatory->save();

        //save the onboard documents
              if($onboard_type == 'normal'){
                $this->uploadDocument($user_id, $data['Aadharfront'], 'Aadhar Card Front');
                $this->uploadDocument($user_id, $data['AadharBack'],'Aadhar Card Back');
                $this->uploadDocument($user_id, $data['panDoc'],'Pan Card');
                $this->uploadDocument($user_id, $data['passport'],'Passport');
                $this->uploadDocument($user_id, $data['voterId'],'Voter ID');
                $this->uploadDocument($user_id, $data['dlDoc'],'Driving License');
                $this->uploadDocument($user_id, $data['eductionDoc'],'Education Certificate');
                $this->uploadDocument($user_id, $data['releivingDoc'],'Relieving Letter');

              }


                return $response=([
                    'status' => 'success',
                    'message' => 'Employee details saved successfully',
                    'data' =>''
                ]);

            }catch(Exception $e){
                $this->deleteEmployee($user_id);

                return $response=([
                    'status' => 'failure',
                    'message' => 'Error while saving record ',
                    'data' =>$e->getMessage()." ".$e->getline()

                ]);
        }
    }
    public function Save_Employee_QuickOnboard_Data($data,$user_data,$onboard_type){

        try{

        $user_id = $user_data->id;

        $newEmployee = VmtEmployee::where('userid',$user_id);

        if($newEmployee->exists())
        {
            $newEmployee = $newEmployee->first();
        }
        else
        {
            $newEmployee = new VmtEmployee;
        }

        $dob=$data["dob"] ?? '';
        $doj=$data["doj"] ?? '';
        $passport_date =  $data["passport_date"] ?? '';

        $newEmployee->userid   =    $user_id;
        $newEmployee->marital_status_id = $data["marital_status"] ?? '';
        $newEmployee->dob   =  $dob ? $this->getdateFormatForDb($dob,$user_id) : '';
        $newEmployee->doj   =  $doj ? $this->getdateFormatForDb($doj,$user_id) : '';
        $newEmployee->dol   =  $doj ? $this->getdateFormatForDb($doj,$user_id) : '';
        $newEmployee->gender   =    $data["gender"] ?? '';
        $data_mobile_number = empty($data["mobile_number"]) ? "" : strval($data["mobile_number"]);
        $newEmployee->mobile_number  = $data_mobile_number;
        $newEmployee->aadhar_number = $data["aadhar_number"] ?? '';
        $newEmployee->pan_number   =  isset($data["pan_number"]) ? ($data["pan_number"]) : " ";
        $newEmployee->dl_no   =  $data["dl_no"] ?? '';
        $newEmployee->nationality = $data["nationality"] ?? '';
        $newEmployee->passport_number = $data["passport_no"] ?? '';
        $newEmployee->passport_date =  $passport_date ? $this->getdateFormatForDb( $passport_date,$user_id) : '';
        //$newEmployee->pan_ack   =    $data["pan_ack"];
        $newEmployee->location   =    $data["work_location"] ?? '';
        $newEmployee->blood_group_id  = $data["blood_group_name"] ?? '';
        $newEmployee->physically_challenged  = $data["physically_challenged"] ?? 'no';
        $newEmployee->bank_id   = $data["bank_id"] ?? '';
        $newEmployee->bank_account_number  = $data["AccountNumber"] ?? '';
        $newEmployee->bank_ifsc_code  = $data["bank_ifsc"] ?? '';

        //employee address details
        $newEmployee->current_address_line_1   = $data["current_address_line_1"] ?? '';
        $newEmployee->current_address_line_2   = $data["current_address_line_2"] ?? '' ;
        $newEmployee->permanent_address_line_1   = $data["permanent_address_line_1"] ?? '';
        $newEmployee->permanent_address_line_2   = $data["permanent_address_line_2"] ?? '';
        $newEmployee->current_country_id   = $data["current_country"] ?? '';
        $newEmployee->permanent_country_id   = $data["permanent_country"] ?? '';
        $newEmployee->current_state_id   = $data["current_state"] ?? '';
        $newEmployee->permanent_state_id   = $data["permanent_state"] ?? '';
        $newEmployee->current_city   = $data["current_city"] ?? '';
        $newEmployee->permanent_city   = $data["permanent_city"] ?? '';
        $newEmployee->current_pincode   = $data["current_pincode"] ?? '';
        $newEmployee->permanent_pincode   = $data["permanent_pincode"] ?? '';
        $newEmployee->no_of_children   = $data["no_of_children"] ?? 0;

        $newEmployee->save();
        //save employee office details

     $empOffice = VmtEmployeeOfficeDetails::where('user_id',$user_id);

        if($empOffice->exists())
        {
            $empOffice = $empOffice->first();

        }
        else
        {
            $empOffice = new VmtEmployeeOfficeDetails;
        }
            //dd($data);
            $confirmation_period= $data['confirmation_period'] ?? '';
            $empOffice->user_id = $user_id;
            $empOffice->department_id = $data["department"] ?? '';
            $empOffice->process = $data["process"] ?? '';
            $empOffice->designation = $data["designation"] ?? '';
            $empOffice->cost_center = $data["cost_center"] ?? '';
            $empOffice->probation_period  = $data['probation_period'] ?? '';
            $empOffice->confirmation_period  = $confirmation_period ? $this->getdateFormatForDb( $confirmation_period,$user_id) : '';
            $empOffice->holiday_location  = $data["holiday_location"] ?? '';
            $empOffice->l1_manager_code  = $data["l1_manager_code_id"] ?? '';
            $empOffice->work_location  = $data["work_location"] ?? '';
            $empOffice->officical_mail  = $data["officical_mail"] ?? '';
            $empOffice->official_mobile  = $data["official_mobile"] ?? '';
            $empOffice->emp_notice  = $data["emp_notice"] ?? '';
            $empOffice->save();

        //assign default workshift to employee

            $emp_workshift = new VmtEmployeeWorkShifts;
            $emp_workshift->user_id = $user_id;
            $work_shift_id =VmtWorkShifts::where('is_default','1')->first();
            if(!empty($work_shift_id)){
                $emp_workshift->work_shift_id = $work_shift_id->id;
            }
            $emp_workshift->is_active ='1';
            $emp_workshift->save();

        //save statutory data of employee

        //save compensatory data of employee
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
            $compensatory->basic = $data["basic"] ?? '';
            $compensatory->hra = $data["hra"] ?? '';
            $compensatory->Statutory_bonus = $data["statutory_bonus"] ?? '' ;
            $compensatory->child_education_allowance = $data["child_education_allowance"] ?? '' ;
            $compensatory->food_coupon = $data["food_coupon"] ?? '' ;
            $compensatory->lta = $data["lta"] ?? '' ;
            $compensatory->special_allowance = $data["special_allowance"] ?? '' ;
            $compensatory->other_allowance = $data["other_allowance"] ?? '' ;
            $compensatory->gross = $data["gross"] ?? '' ;
            $compensatory->epf_employer_contribution = $data["epf_employer_contribution"] ?? '' ;
            $compensatory->esic_employer_contribution = $data["esic_employer_contribution"] ?? '' ;
            $compensatory->insurance = $data["insurance"] ?? '' ;
            $compensatory->graduity = $data["graduity"] ?? '' ;
            $compensatory->cic = $data["cic"] ?? '' ;
            $compensatory->epf_employee = $data["epf_employee"] ?? '' ;
            $compensatory->esic_employee = $data["esic_employee"] ?? '' ;
            $compensatory->professional_tax = $data["professional_tax"] ?? '' ;
            $compensatory->labour_welfare_fund = $data["labour_welfare_fund"] ?? '' ;
            $compensatory->net_income = $data["net_income"] ?? '' ;
            $compensatory->save();


                return $response=([
                    'status' => 'success',
                    'message' => 'Employee details saved successfully',
                    'data' =>''
                ]);

            }catch(Exception $e){
                $this->deleteEmployee($user_id);

                return $response=([
                    'status' => 'failure',
                    'message' => 'Error while saving record ',
                    'data' =>$e->getMessage()." ".$e->getline()

                ]);
        }
    }


    public function uploadDocument($emp_id,$fileObject, $onboard_document_type){

        try{
            $emp_code = User::find($emp_id)->user_code;

            if(empty($fileObject))
                return null;

            $onboard_doc_id = VmtDocuments::where('document_name',$onboard_document_type);

            if($onboard_doc_id->exists())
                $onboard_doc_id = $onboard_doc_id->first()->id;
            else
                return null;

            $employee_documents = VmtEmployeeDocuments::where('user_id', $emp_id)->where('doc_id',$onboard_doc_id);

            //check if document already uploaded
            if( $employee_documents->exists()){

                $employee_documents = $employee_documents->first();

                $file_path = '/'.$emp_code.'/onboarding_documents'.'/'.$employee_documents->doc_url;

                //fetch the existing document and delete its file from STORAGE folder
                $file_exists_status = Storage::disk('private')->exists($file_path);
                if($file_exists_status){

                    //delete the file
                    Storage::disk('private')->delete($file_path);

                }

            }
            else
            {
                $employee_documents = new VmtEmployeeDocuments;
                $employee_documents->user_id = $emp_id;
                $employee_documents->doc_id = $onboard_doc_id;
            }


            $date = date('d-m-Y_H-i-s');
            $fileName =  str_replace(' ', '', $onboard_document_type).'_'.$emp_code.'_'.$date.'.'.$fileObject->extension();
            $path = $emp_code.'/onboarding_documents';
            $filePath = $fileObject->storeAs($path,$fileName, 'private');
            $employee_documents->doc_url = $fileName;

            $employee_documents_status = VmtEmployeeDocuments::where('user_id', $emp_id)
                                                               ->where('doc_id',$onboard_doc_id);

            if($employee_documents_status->exists() ){
                    $employee_documents_status = $employee_documents_status->first()->status;
               if($employee_documents_status == 'Approved')
                    $employee_documents->status = $employee_documents_status;
               else{
                $employee_documents->status ='Pending';
               }
            }else{

                $employee_documents->status = 'Pending';
             }


            $employee_documents->save();
        }
        catch(\Exception $e){

            return response()->json([
                'status' => 'failure',
                'message' => '',
                'data' =>"Error while saving record : ".$e->getMessage()
            ]);
        }

        return "success";

    }

    public function deleteEmployee($user_id)
    {
            $user_data = User::find($user_id);

                if(!empty($user_data)){
                    $user_data->delete();
                }

            $emp_details=VmtEmployee::find($user_id);

                if(!empty($emp_details)){
                    $emp_details->delete();
                }

            $emp_office_details = VmtEmployeeOfficeDetails::find($user_id);

                if(!empty($emp_office_details)){
                    $emp_office_details->delete();
                }

            $emp_statutory_details =VmtEmployeeStatutoryDetails::find($user_id);

                if(!empty($emp_statutory_details)){
                    $emp_statutory_details->delete();
                }

            $emp_compensatory_details=Compensatory::find($user_id);
                if(!empty($emp_compensatory_details)){
                    $emp_compensatory_details->delete();
                }
                return 'failure';
    }
    private function getdateFormatForDb($date,$user_id){


        try{
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

                $processed_date = DateTime::createFromFormat('Y-m-d', $date);

                if($processed_date){

                    $processed_date->format('Y-m-d');
                }
            }

            return $processed_date;
        }
        catch(\InvalidArgumentException  $e){

            return $response=([
                'status' => 'failure',
                'message' => 'Not a date',
                'data' =>"Error for input date : ".$e->getMessage()
            ]);
    }
}



}
