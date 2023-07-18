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

    public function createOrUpdate_NormalOnboardData($data, $can_onboard_employee, $existing_user_id = null)
    {
        //dd("heeey");
        $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id, onboard_type : 'normal');

        if(!empty($response) && $response['status'] == 'success')
        {

             try{

                $user_data = $response['data'];

                $response = $this->Save_EmployeeOnboard_Data($data,$user_data);

                 $response=([
                    'status' => $response['status'],
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

  public function createOrUpdate_BulkOnboardData($data, $can_onboard_employee, $existing_user_id = null)
  {
      //dd("heeey");
      $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id, onboard_type : 'bulk');

      if(!empty($response) && $response['status'] == 'success')
      {

           try{

              $user_data = $response['data'];

              $response = $this->Save_EmployeeOnboard_Data($data,$user_data);

               $response=([
                  'status' => $response['status'],
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
    public function Save_EmployeeOnboard_Data($data,$user_data){

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
        $newEmployee->dob   =  $dob ? $this->getdateFormatForDb($dob) : '';
        $newEmployee->doj   =  $doj ? $this->getdateFormatForDb($doj) : '';
        $newEmployee->dol   =  $doj ? $this->getdateFormatForDb($doj) : '';
        $newEmployee->gender   =    $data["gender"] ?? '';
        $data_mobile_number = empty($data["mobile_number"]) ? "" : strval($data["mobile_number"]);
        $newEmployee->mobile_number  = $data_mobile_number;
        $newEmployee->aadhar_number = $data["aadhar_number"] ?? '';
        $newEmployee->pan_number   =  isset($data["pan_number"]) ? ($data["pan_number"]) : " ";
        $newEmployee->dl_no   =  $data["dl_no"] ?? '';
        $newEmployee->nationality = $data["nationality"] ?? '';
        $newEmployee->passport_number = $data["passport_no"] ?? '';
        $newEmployee->passport_date =  $passport_date ? $this->getdateFormatForDb( $passport_date) : '';
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
            $empOffice->confirmation_period  = $confirmation_period ? $this->getdateFormatForDb( $confirmation_period) : '';
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
                    $familyMember->dob = $this->getdateFormatForDb( $dob_father);
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
                $familyMember->dob = $this->getdateFormatForDb( $dob_mother) ;
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
                    $familyMember->dob = $this->getdateFormatForDb(  $dob_spouse);
                }

            if(!empty($data["wedding_date"])){
                    $wedding_date = $data["wedding_date"];
                    $familyMember->wedding_date = $this->getdateFormatForDb( $wedding_date) ;
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
                    $familyMember->dob = $this->getdateFormatForDb( $child_dob) ;
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

                $this->uploadDocument($user_id, $data['Aadharfront'], 'Aadhar Card Front');
                $this->uploadDocument($user_id, $data['AadharBack'],'Aadhar Card Back');
                $this->uploadDocument($user_id, $data['panDoc'],'Pan Card');
                $this->uploadDocument($user_id, $data['passport'],'Passport');
                $this->uploadDocument($user_id, $data['voterId'],'Voter ID');
                $this->uploadDocument($user_id, $data['dlDoc'],'Driving License');
                $this->uploadDocument($user_id, $data['eductionDoc'],'Education Certificate');
                $this->uploadDocument($user_id, $data['releivingDoc'],'Relieving Letter');

                $newEmployee->save();

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

    private function Upload_BulkOnboardDetail($user,$row,$user_id){
        try{
            //dd($row);
            // $test = VmtMaritalStatus::where('name',"asdf" )->first()->id;
                // dd("Test : ".$test);

                //    dd($user_id);
            //store employee details
                    $newEmployee = VmtEmployee::where('userid',$user->id);

                    if($newEmployee->exists())
                    {
                        $newEmployee = $newEmployee->first();
                    }else{
                        $newEmployee = new VmtEmployee;
                    }

                    $doj=$row["doj"] ?? '';
                    $dob=$row["dob"] ?? '';

                    $newEmployee->userid   =    $user_id;
                    $newEmployee->gender   =    $row["gender"] ?? '';
                    $newEmployee->location   =    $row["location"] ?? '';
                    $newEmployee->doj   =  $doj ? $this->getdateFormatForDb($doj) : '';
                    $newEmployee->dol   =  $doj ? $this->getdateFormatForDb($doj) : '';
                    $newEmployee->dob   =  $dob ? $this->getdateFormatForDb($dob) : '';
                   // $newEmployee->location   =    $row["work_location"] ?? '';
                    $newEmployee->pan_number   =  isset($row["pan_no"]) ? ($row["pan_no"]) : "PANNOTAVBL";
                    $newEmployee->aadhar_number = $row["aadhar"] ?? '';

                    if(!empty($row["marital_status"])){
                    $marital_status_id=VmtMaritalStatus::where('name',ucfirst($row["marital_status"]) )->first()->id; // to get marital status id
                    $newEmployee->marital_status_id = $marital_status_id ?? '';
                    }

                    if(!empty($row['bank_name'])){
                    $bank_id=Bank::where('bank_name',$row['bank_name'])->first()->id;  // to get bank id
                    $newEmployee->bank_id  = $bank_id ?? '';
                    }

                    $newEmployee->bank_ifsc_code  = $row["bank_ifsc"] ?? '';
                    $newEmployee->bank_account_number  = $row["account_no"] ?? '';
                    $newEmployee->current_address_line_1   = $row["current_address"] ?? '';
                    $newEmployee->permanent_address_line_1   = $row["permanent_address"] ?? '';
                    $newEmployee->no_of_children = $row["no_of_child"] ?? '';
                    $data_mobile_number = empty($row["mobile_number"]) ? "" : strval($row["mobile_number"]);
                    $newEmployee->mobile_number  = $data_mobile_number;
                    $newEmployee->save();

                        //store employeeoffice details
                    $empOffice = VmtEmployeeOfficeDetails::where('user_id',$user_id);

                    if($empOffice->exists())
                    {
                        $empOffice = $empOffice->first();

                    }
                    else
                    {
                        $empOffice = new VmtEmployeeOfficeDetails;
                    }
                    $empOffice->user_id = $user_id; //Link between USERS and VmtEmployeeOfficeDetails table
                    if(!empty($row['department'])){
                    $department_id=Department::where('name',strtolower($row['department']))->first()->id;
                    $empOffice->department_id = $department_id ?? ''; // => "lk"
                    }
                    $empOffice->process = $row["process"] ?? ''; // => "k"
                    $empOffice->designation = $row["designation"] ?? ''; // => "k"
                    $empOffice->cost_center = $row["cost_center"] ?? '';
                    $empOffice->confirmation_period  =$row['confirmation_period']??'';
                    $empOffice->holiday_location  = $row["holiday_location"] ?? ''; // => "k"
                    $empOffice->l1_manager_code  = $row["l1_manager_code"] ?? ''; // => "k"
                    $empOffice->officical_mail  = $row["official_mail"] ?? ''; // => "k@k.in"
                    $empOffice->work_location  = $row["work_location"] ?? ''; // => "k"
                    $empOffice->official_mobile  = $row["official_mobile"] ?? ''; // => "1234567890"
                    $empOffice->emp_notice  = $row["emp_notice"] ?? ''; // => "0"
                    $empOffice->save();

                    $emp_workshift = new VmtEmployeeWorkShifts;
                    $emp_workshift->user_id = $user_id;
                    $work_shift_id =VmtWorkShifts::where('is_default','1')->first();
                    if(!empty($work_shift_id)){
                        $emp_workshift->work_shift_id = $work_shift_id->id;
                    }
                    $emp_workshift->is_active ='1';
                    $emp_workshift->save();
            //store employee_statutoryDetails details

                    $newEmployee_statutoryDetails = VmtEmployeeStatutoryDetails::where('user_id',$user_id);

                    if($newEmployee_statutoryDetails->exists())
                    {
                        $newEmployee_statutoryDetails = $newEmployee_statutoryDetails->first();
                    }
                    else
                    {
                        $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
                    }
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

            //store employee_familyDetails details

                    VmtEmployeeFamilyDetails::where('user_id',$user_id)->delete();

                    if(!empty($row['father_name'])){

                        $familyMember =  new VmtEmployeeFamilyDetails;
                        $familyMember->user_id  = $user_id;
                        $familyMember->name =   $row['father_name'];
                        $familyMember->relationship = 'Father';
                        $familyMember->gender = 'Male';
                            if(!empty($row["father_dob"])){
                                $dob_father=$row["father_dob"];
                                $familyMember->dob = $this->getdateFormatForDb( $dob_father);
                            }
                        $familyMember->save();
                    }

                    if(!empty($row['mother_name'])){
                        $familyMember =  new VmtEmployeeFamilyDetails;
                        $familyMember->user_id  = $user_id;
                        $familyMember->name =   $row['mother_name'];
                        $familyMember->relationship = 'Mother';
                        $familyMember->gender = 'Female';
            //for bulk onboarding
                            if(!empty($row["mother_dob"])){
                                $dob_mother=$row["mother_dob"];
                                $familyMember->dob = $this->getdateFormatForDb( $dob_mother) ;
                            }
                        $familyMember->save();
                    }

                    if ((strtolower($row['marital_status']))=='married') {
                        $familyMember =  new VmtEmployeeFamilyDetails;
                        $familyMember->user_id  = $user_id;
                        $familyMember->name =   $row['spouse_name'];
                        $familyMember->relationship = 'Spouse';

                        if(!empty($row['gender']=='Male')){
                            $familyMember->gender = 'Female';
                        }else{
                            $familyMember->gender = 'Male';
                        }
                         //for bulk onboarding
                        if(!empty($row["spouse_dob"])){
                            $dob_spouse =  $row["spouse_dob"];
                            $familyMember->dob = $this->getdateFormatForDb(  $dob_spouse);
                        }

                        $familyMember->save();

                    }

                    if (!empty($row['child_name'])) {
                        $familyMember =  new VmtEmployeeFamilyDetails;
                        $familyMember->user_id  = $user_id;
                        $familyMember->name =  $row['child_name'];
                        $familyMember->relationship = 'Children';
                        $familyMember->gender = '---';

                        if(!empty($row["child_dob"]))
                        $familyMember->dob= $row["child_dob"];
                        //   $familyMember->dob = $this->getdateFormatForDb($child_dob) ;
                        $familyMember->save();

                    }



            //store employee_compensatory Details details

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
                    $compensatory->gross = $row["fixed_gross"] ?? '' ;
                    $compensatory->epf_employer_contribution = $row["epf_employer_contribution"] ?? '' ;
                    $compensatory->esic_employer_contribution = $row["esic_employer_contribution"] ?? '' ;
                    $compensatory->insurance = $row["insurance"] ?? '' ;
                    $compensatory->graduity = $row["graduity"] ?? '' ;
                    $compensatory->dearness_allowance = $row["dearness_allowance"] ?? '' ;
                    $compensatory->cic = $row["ctc_cost_to_company"] ?? '' ;
                    $compensatory->epf_employee = $row["epf_employee"] ?? '' ;
                    $compensatory->esic_employee = $row["esic_employee"] ?? '' ;
                    $compensatory->professional_tax = $row["professional_tax"] ?? '' ;
                    $compensatory->labour_welfare_fund = $row["labour_welfare_fund"] ?? '' ;
                    $compensatory->net_income = $row["net_income"] ?? '' ;
                    $compensatory->save();


                return $response=([
                    'status' => 'success',
                    'message' =>'',
                    'data' =>'',
                ]);
        }
        catch(\Exception $e)
        {
            $this->deleteEmployee($user_id);

            return response()->json([
                'status' => 'failure',
                'message' => '',
                'data' =>"Error while saving record : ".$e->getMessage()
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

                if($user_data->exists()){
                    $user_data->delete();
                }

            $emp_details=VmtEmployee::find($user_id);

                if( $emp_details->exists()){
                    $emp_details->delete();
                }

            $emp_office_details = VmtEmployeeOfficeDetails::find($user_id);

                if($emp_office_details->exists()){
                    $emp_office_details->delete();
                }

            $emp_statutory_details =VmtEmployeeStatutoryDetails::find($user_id);

                if($emp_statutory_details->exists()){
                    $emp_statutory_details->delete();
                }

            $emp_compensatory_details=Compensatory::find($user_id);
                if($emp_compensatory_details->exists()){
                    $emp_compensatory_details->delete();
                }

    }
    private function getdateFormatForDb($date){


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
                $processed_date->format('Y-m-d');
            }

            return $processed_date;
        }
        catch(\Exception $e){
            dd("Error for input date : ".$e->getMessage());
        }
    }



}
