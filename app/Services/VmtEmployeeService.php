<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\Department;
use App\Models\VmtMaritalStatus;
use App\Models\Bank;
use App\Models\VmtClientMaster;
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
    public function createOrUpdate_OnboardFormData($data, $can_onboard_employee, $existing_user_id = null, $onboard_type = null, $onboard_import_type)
    {
        //dd("heeey");
        $response = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id, onboard_type : $onboard_type);

        if(!empty($response) && $response->status == 'success')
        {

            try
            {
                $onboard_user = $response->response_object;

                if($onboard_import_type == "excel_quick")
                {

                    $this->createOrUpdate_EmployeeDetails( $onboard_user, $data, $onboard_import_type);
                    $this->createOrUpdate_EmployeeOfficeDetails( $onboard_user->id, $data);
                    $this->createOrUpdate_EmployeeCompensatory( $onboard_user->id, $data);

                }
                else
                if($onboard_import_type == "excel_bulk")
                {
                    //validate date fields before saving in table
                   $t_response =  $this->Upload_BulkOnboardDetail( $onboard_user, $data,$onboard_user->id);
                }
                else
                if($onboard_import_type == "onboard_form")//for normal , quick form onboard
                {
                    $this->createOrUpdate_EmployeeDetails( $onboard_user, $data, $onboard_import_type);
                    $this->createOrUpdate_EmployeeOfficeDetails( $onboard_user->id, $data);
                    $this->createOrUpdate_EmployeeStatutoryDetails( $onboard_user->id, $data);
                    $this->createOrUpdate_EmployeeFamilyDetails( $onboard_user->id, $data,$onboard_import_type);
                    $this->createOrUpdate_EmployeeCompensatory( $onboard_user->id, $data);
                }

                return "success";
            }
            catch(\Exception $e)
            {
               // dd($e);

                return "failure : ".$e;
            }
        }
        else{
            dd("ERROR : createOrUpdate_User() response is empty");
            //dd($response);
            return "failure :: createOrUpdate_User() response obj is null ".__LINE__;
        }

    }

    private function createOrUpdate_User($data, $can_onboard_employee,$user_id=null, $onboard_type)
    {
        $newUser = null;

        try
        {
            if(!empty($user_id))
            {

                $newUser = User::where('id',$user_id)->first();;

                //Update existing user
                $newUser->name = $data['employee_name'];

                $newUser->email = empty($data["email"]) ? '' : $data["email"];

                //$newUser->password = Hash::make('Abs@123123');
                //$newUser->avatar = $data['employee_code'] . '_avatar.jpg';

                //$newUser->active = '0';
                $newUser->is_onboarded = $can_onboard_employee;
                //$newUser->onboard_type = 'normal';
                //$newUser->org_role = '5';
                //$newUser->is_ssa = '0';
                $newUser->save();

            }
            else
            {
                $newUser = $this->CreateNewUser($data, $can_onboard_employee, $onboard_type);
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

            $emp_client_code = preg_replace('/\d+/', '',strtoupper($data['employee_code']) );
            $newUser->client_id = VmtClientMaster::where('client_code', $emp_client_code)->first()->id;

            $newUser->active = '0';
            $newUser->is_default_password_updated = '0';

            $newUser->is_onboarded = $can_onboard_employee;

            $newUser->onboard_type = $onboard_type; //normal, quick, bulk

            $newUser->org_role = '5';
            $newUser->is_ssa = '0';
            $newUser->save();

            return $newUser;
        }
        catch(\Exception $e){
            dd("Error in VmtEmployeeService::CreateNewUser() : ".$e);
        }
    }

    //for bulck onboard
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




            return "bulk onboard success";
    }
    catch(\Exception $e)
    {
        dd("Error while saving record : ".$e);
    }

}



    private function createOrUpdate_EmployeeDetails($user,$row, $onboard_import_type)
    {
        //dd($row);
        //Sdd("Inside emp details");
        try{
        $newEmployee = VmtEmployee::where('userid',$user->id);

        //dd($newEmployee->exists());
        if($newEmployee->exists())
        {
            $newEmployee = $newEmployee->first();
        }
        else
        {
            $newEmployee = new VmtEmployee;
        }

        $doj=$row["doj"] ?? '';
        $dob=$row["dob"] ?? '';
        $passport_date =  $row["passport_date"] ?? '';

        $newEmployee->userid   =    $user->id;
        $newEmployee->gender   =    $row["gender"] ?? '';

        $newEmployee->doj   =  $doj ? $this->getdateFormatForDb($doj) : '';
        $newEmployee->dol   =  $doj ? $this->getdateFormatForDb($doj) : '';
        $newEmployee->dob   =  $dob ? $this->getdateFormatForDb($dob) : '';
        $newEmployee->location   =    $row["work_location"] ?? '';
        $newEmployee->pan_number   =  isset($row["pan_number"]) ? ($row["pan_number"]) : "PANNOTAVBL";
        $newEmployee->dl_no   =  $row["dl_no"] ?? '';
        $newEmployee->passport_number = $row["passport_no"] ?? '';

        $newEmployee->passport_date =  $passport_date ? $this->getdateFormatForDb( $passport_date) : '';

        //$newEmployee->pan_ack   =    $row["pan_ack"];
        $newEmployee->aadhar_number = $row["aadhar_number"] ?? '';
        $newEmployee->marital_status_id = $row["marital_status"] ?? '';;
        $newEmployee->nationality = $row["nationality"] ?? '';
        $data_mobile_number = empty($row["mobile_number"]) ? "" : strval($row["mobile_number"]);
        $newEmployee->mobile_number  = $data_mobile_number;
        $newEmployee->blood_group_id  = $row["blood_group_name"] ?? '';
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
        $newEmployee->no_of_children   = $row["no_of_children"] ?? 0;





        if($onboard_import_type != "excel_quick" && $onboard_import_type != "excel_bulk")
        {
            $this->uploadDocument($user->id, $row['Aadharfront'], 'Aadhar Card Front');
            $this->uploadDocument($user->id, $row['AadharBack'],'Aadhar Card Back');
            $this->uploadDocument($user->id, $row['panDoc'],'Pan Card');
            $this->uploadDocument($user->id, $row['passport'],'Passport');
            $this->uploadDocument($user->id, $row['voterId'],'Voter ID');
            $this->uploadDocument($user->id, $row['dlDoc'],'Driving License');
            $this->uploadDocument($user->id, $row['eductionDoc'],'Education Certificate');
            $this->uploadDocument($user->id, $row['releivingDoc'],'Relieving Letter');

            // $docReviewArray = array(

            //     'aadhar_card_file' => -1,
            //     'aadhar_card_backend_file' => -1,
            //     'pan_card_file' => -1,
            //     'passport_file' => -1,
            //     'voters_id_file' => -1,
            //     'dl_file' => -1,
            //     'education_certificate_file' => -1,
            //     'reliving_letter_file' => -1
            // );
          //  $newEmployee->docs_reviewed = json_encode($docReviewArray);


        }


        $newEmployee->save();
    }catch(\Exception $e){
        dd("Error while saving record : ".$e);
    }

    }

    private function createOrUpdate_EmployeeOfficeDetails($user_id,$row)
    {
        try{
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
         $confirmation_period= $row['confirmation_period'] ?? '';
         $empOffice->user_id = $user_id; //Link between USERS and VmtEmployeeOfficeDetails table
         $empOffice->department_id = $row["department"] ?? ''; // => "lk"
         $empOffice->process = $row["process"] ?? ''; // => "k"
         $empOffice->designation = $row["designation"] ?? ''; // => "k"
         $empOffice->cost_center = $row["cost_center"] ?? ''; // => "k"
         $empOffice->probation_period  = $row['probation_period'] ?? ''; // => "k"
         //dd("conf date: " .$confirmation_period);
         $empOffice->confirmation_period  = $confirmation_period ? $this->getdateFormatForDb( $confirmation_period) : ''; // => "k"
         $empOffice->holiday_location  = $row["holiday_location"] ?? ''; // => "k"
         $empOffice->l1_manager_code  = $row["l1_manager_code_id"] ?? ''; // => "k"
         $empOffice->work_location  = $row["work_location"] ?? ''; // => "k"
         $empOffice->officical_mail  = $row["officical_mail"] ?? ''; // => "k@k.in"
         $empOffice->official_mobile  = $row["official_mobile"] ?? ''; // => "1234567890"
         $empOffice->emp_notice  = $row["emp_notice"] ?? ''; // => "0"
         $empOffice->save();
        }catch(\Exception $e){
            dd("Error while saving record : ".$e);
        }

    }

    private function createOrUpdate_EmployeeStatutoryDetails($user_id,$row)
    {
        try{
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
    }catch(\Exception $e){
        dd("Error while saving record : ".$e);
    }

    }

    private function createOrUpdate_EmployeeFamilyDetails($user_id, $familyData,$onboard_import_type)
    {
        try{
        //delete old records
        VmtEmployeeFamilyDetails::where('user_id',$user_id)->delete();

        if(!empty($familyData['father_name'])){

            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['father_name'];
            $familyMember->relationship = 'Father';
            $familyMember->gender = $familyData['father_gender'];


//for bulk onboarding

              if(!empty($familyData["dob_father"])){
                $dob_father=$familyData["dob_father"];
                $familyMember->dob = $this->getdateFormatForDb( $dob_father);
                }
              $familyMember->save();


        }

        if(!empty($familyData['mother_name'])){
            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['mother_name'];
            $familyMember->relationship = 'Mother';
            $familyMember->gender = $familyData['mother_gender'];
//for bulk onboarding


              if(!empty($familyData["dob_mother"])){
                $dob_mother=$familyData["dob_mother"];
                $familyMember->dob = $this->getdateFormatForDb( $dob_mother) ;

            }
            $familyMember->save();
        }


        if ( !empty($familyData['spouse_name'])){
            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['spouse_name'];
            $familyMember->relationship = 'Spouse';
            $familyMember->gender = $familyData['spouse_gender'] ?? '';

//for bulk onboarding if($onboard_import_type == "excel_bulk"){


             if(!empty($familyData["dob_spouse"])){
               $dob_spouse =  $familyData["dob_spouse"];
                $familyMember->dob = $this->getdateFormatForDb(  $dob_spouse);

            }

            if(!empty($familyData["wedding_date"])){
               $wedding_date = $familyData["wedding_date"];
               $familyMember->wedding_date = $this->getdateFormatForDb( $wedding_date) ;

            }
            $familyMember->save();
        }


            if (!empty($familyData['child_name'])){
                $familyMember =  new VmtEmployeeFamilyDetails;
                $familyMember->user_id  = $user_id;
                $familyMember->name =   $familyData['child_name'];
                $familyMember->relationship = 'Children';
                $familyMember->gender = '---';

                if(!empty($familyData["child_dob"])){
                $child_dob= $familyData["child_dob"];
                $familyMember->dob = $this->getdateFormatForDb( $child_dob) ;
                }
                //$familyData["child_dob"];
                $familyMember->save();
            }

            }catch(\Exception $e){
                dd("Error while saving record : ".$e);
            }



    }

    private function createOrUpdate_EmployeeEmergencyContactsDetails($user_data)
    {
    }

    private function createOrUpdate_EmployeeCompensatory($user_id,$row)
    {
        try{
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
    }catch(\Exception $e){
        dd("Error while saving record : ".$e);
    }
    }


    public function deleteEmployee($user_id)
    {
        User::where('id',$user_id)->delete();

        VmtEmployee::where('userid',$user_id)->delete();
        VmtEmployeeOfficeDetails::where('user_id', $user_id->id)->delete();
        VmtEmployeeStatutoryDetails::where('user_id', $user_id)->delete();
        Compensatory::where('user_id', $user_id)->delete();

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
            dd("Error :: uploadDocument() ".$e);
        }

        return "success";

    }

    public function viewDocument($fileObject, $emp_code, $filename){


    }

    public function downloadDocument($fileObject, $emp_code, $filename){


    }


    // Generate Employee Appointment PDF after onboarding
    public function attachAppointmentLetterPDF($employeeData)
    {
       // dd($employeeData);
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
            $client_name = str_replace(' ', '', sessionGetSelectedClientName());
            //$client_name = Str::lower(str_replace(' ', '', getCurrentClientName()) );
            $viewfile_appointmentletter = 'vmt_appointment_templates.mailtemplate_appointmentletter_'.$client_name;

            //check if template exists
            if (view()->exists($viewfile_appointmentletter)) {
                $html =  view($viewfile_appointmentletter, compact('data'));
               // dd($data);
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $pdf = new Dompdf($options);
                $pdf->loadHtml($html, 'UTF-8');
                $pdf->setPaper('A4', 'portrait');
                $pdf->render();
                $docUploads =  $pdf->output();
               // dd( $docUploads);
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
            dd("Error for input date : ".$date);
        }
    }

    public function getQuickOnboardedEmployeeData($user_id){

        $query_emp_details  = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                                ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
                                ->join('vmt_employee_compensatory_details','vmt_employee_compensatory_details.user_id','=','users.id')
                                ->where('users.id','=',$user_id)
                                ->first();

        return $query_emp_details;
    }

    /*

        Fetch all the documents uploaded by the employees.




    */
    function fetchAllEmployeesDocumentsAsGroups(Request $request){

        $json_response = array();

        //Get all the  doc for the given user_id
        $query_pending_onboard_docs = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                                        ->join('vmt_employee_documents','vmt_employee_documents.user_id','=','users.id')
                                        ->join('vmt_documents','vmt_documents.id','=','vmt_employee_documents.doc_id')
                                        ->where('vmt_employee_documents.status',"Pending")
                                        ->where('users.is_ssa',"0")
                                        ->where('users.is_onboarded',"1")
                                        ->where('users.active','<>',"-1")
                                        ->where('vmt_employee_documents.status','<>',"Approved")
                                        ->get([
                                            'users.name as name',
                                            'vmt_employee_details.doj as doj',
                                            'users.user_code as user_code',
                                            'vmt_documents.document_name as doc_name',
                                            'vmt_employee_documents.id as record_id',
                                            'vmt_employee_documents.status as doc_status',
                                            'vmt_employee_documents.doc_url as doc_url'
                                        ]);

        // //store all the documents in single key
        foreach($query_pending_onboard_docs as $single_pending_docs){

            $user_code = $single_pending_docs->user_code;

            if(array_key_exists($user_code, $json_response))
            {
                array_push($json_response[$user_code]["documents"], [
                                            "record_id" => $single_pending_docs->record_id,
                                            "doc_name" => $single_pending_docs->doc_name,
                                            "doc_url" => $single_pending_docs->doc_url,
                                            "doc_status" => $single_pending_docs->doc_status
                ]);
            }
            else
            {
                $user_details = [
                    "name" => $single_pending_docs->name,
                    "user_code" =>  $single_pending_docs->user_code,
                    "doj" => $single_pending_docs->doj,
                    "documents" => array([
                                    "record_id" => $single_pending_docs->record_id,
                                    "doc_name" => $single_pending_docs->doc_name,
                                    "doc_url" => $single_pending_docs->doc_url,
                                    "doc_status" => $single_pending_docs->doc_status
                                   ]),
                ];

                $json_response[$user_code] = $user_details;
                //array_push(, $user_details);
            }
        }


        return array_values($json_response);

    }


    public function updateEmployeeActiveStatus($user_code, $active_status){

        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'active_status' => $active_status
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                'active_status' => 'required',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        $query_user = User::where('user_code',$user_code)->first();

        if(!empty($query_user))
        {
            $query_user->active = $active_status;
            $query_user->save();
        }
        else
        {
            return response()->json([
                'status' => 'failure',
                'message' => "User not found"
            ]);
        }
    }

    public function getEmployeeRole($user_code){
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try{

            $response = User::join('vmt_org_roles','vmt_org_roles.id','=','users.org_role')
                        ->where('users.user_code', $user_code)
                        ->get(['vmt_org_roles.name as role'])
                        ->first();

            return response()->json([
                'status' => 'success',
                'message' => "",
                'data' => $response
            ]);

        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "Error[ getEmployeeRole() ] ",
                'data' => $e
            ]);
        }
    }
}
