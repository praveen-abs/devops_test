<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtOrgRoles;

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
        $onboard_user = $this->createOrUpdate_User(data: $data, can_onboard_employee : $can_onboard_employee, user_id: $existing_user_id);

        if(!empty($onboard_user))
        {
            $this->createOrUpdate_EmployeeDetails( $onboard_user, $data);
            $this->createOrUpdate_EmployeeOfficeDetails( $onboard_user->id, $data);
            $this->createOrUpdate_EmployeeStatutoryDetails( $onboard_user->id, $data);
            $this->createOrUpdate_EmployeeFamilyDetails( $onboard_user->id, $data);
            //$this->createOrUpdate_EmployeeOfficeDetails( $onboard_user->id, $data);

        }
        else
        {
            return null;
        }


        return $onboard_user;
    }

    private function createOrUpdate_User($data, $can_onboard_employee,$user_id=null) : User
    {
        $newUser = null;

        if(! empty($user_id))
        {

            $newUser = User::where('id',$user_id);

            if($newUser->exists())
            {
                $newUser = $newUser->first();
            }
            else
            {
                $newUser = new User;
            }
        }
        else
        {
            $newUser = new User;
        }

        $newUser->name = $data['employee_name'];
        $newUser->email = $data["email"];
        $newUser->password = Hash::make('Abs@123123');
        $newUser->avatar = $data['employee_code'] . '_avatar.jpg';
        $newUser->user_code = strtoupper($data['employee_code']);
        $newUser->active = '0';
        $newUser->is_onboarded = $can_onboard_employee;
        $newUser->onboard_type = 'normal';
        $newUser->org_role = '5';
        $newUser->is_ssa = '0';
        $newUser->save();

        return $newUser;
    }


    private function createOrUpdate_EmployeeDetails($user,$row)
    {
        $newEmployee = VmtEmployee::where('userid',$user->id);

        if($newEmployee->exists())
        {
            $newEmployee = $newEmployee->first();
        }
        else
        {
            $newEmployee = new VmtEmployee;
        }

        $newEmployee->userid = $user->id;
        $newEmployee->emp_no   =    $row["employee_code"] ?? '';
        $newEmployee->gender   =    $row["gender"] ?? '';
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

        $newEmployee->marital_status = $row["marital_status"] ?? '';

        $newEmployee->mobile_number  = strval($row["mobile_no"]);
        $newEmployee->blood_group  = $row["blood_group"] ?? '';
        $newEmployee->physically_challenged  = $row["physically_challenged"] ?? 'no';
        $newEmployee->bank_name   = $row["bank_name"] ?? '';
        $newEmployee->bank_ifsc_code  = $row["bank_ifsc"] ?? '';
        $newEmployee->bank_account_number  = $row["account_no"] ?? '';
        // $newEmployee->present_address   = $row["current_address_line_1"] ?? '' . ' , ' . $row["current_address_line_2"] ?? '';
        // $newEmployee->permanent_address   = $row["permanent_address_line_1"] ?? '' . ' , ' . $row["permanent_address_line_2"] ?? '';
        $newEmployee->current_address_line_1   = $row["current_address_line_1"] ?? '';
        $newEmployee->current_address_line_2   = $row["current_address_line_2"] ?? '' ;
        $newEmployee->permanent_address_line_1   = $row["permanent_address_line_1"] ?? '';
        $newEmployee->permanent_address_line_2   = $row["permanent_address_line_2"] ?? '';
        $newEmployee->current_city   = $row["current_city"] ?? '';
        $newEmployee->permanent_city   = $row["permanent_city"] ?? '';
        $newEmployee->current_pincode   = $row["current_pincode"] ?? '';
        $newEmployee->permanent_pincode   = $row["permanent_pincode"] ?? '';

        $newEmployee->mother_name   = $row["mother_name"] ?? '';

        if (!empty($row['marital_status'])) {
            if ($row['marital_status'] <> 'unmarried') {
                $newEmployee->spouse_name   = $row["spouse_name"];
                $newEmployee->spouse_age   = $row["spouse_dob"];
                if ($row['no_of_child'] > 0) {
                    // $newEmployee->kid_name   = json_encode($row["child_name"]);
                    // $newEmployee->kid_age  = json_encode($row["child_dob"]);
                }
            }
        } else {
            $row['marital_status'] = '';
        }

        $newEmployee->aadhar_card_file = $this->fileUpload('aadhar_card_file', $user->user_code);
        $newEmployee->aadhar_card_backend_file = $this->fileUpload('aadhar_card_backend_file', $user->user_code);
        $newEmployee->pan_card_file = $this->fileUpload('pan_card_file', $user->user_code);
        $newEmployee->passport_file = $this->fileUpload('passport_file', $user->user_code);
        $newEmployee->voters_id_file = $this->fileUpload('voters_id_file', $user->user_code);
        $newEmployee->dl_file = $this->fileUpload('dl_file', $user->user_code);
        $newEmployee->education_certificate_file = $this->fileUpload('education_certificate_file', $user->user_code);
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
    }

    private function createOrUpdate_EmployeeOfficeDetails($user_id,$user_data)
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

         $empOffice->user_id = $user_id; //Link between USERS and VmtEmployeeOfficeDetails table
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

    private function createOrUpdate_EmployeeStatutoryDetails($user_id,$user_data)
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
        $newEmployee_statutoryDetails->ptax_location = $row["ptax_location"] ?? '';
        $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"] ?? '';
        $newEmployee_statutoryDetails->lwf_location = $row["lwf_location"] ?? '';
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
        if ($familyData['marital_status'] <> 'unmarried') {
            $familyMember =  new VmtEmployeeFamilyDetails;
            $familyMember->user_id  = $user_id;
            $familyMember->name =   $familyData['spouse_name'];
            $familyMember->relationship = 'Spouse';
            $familyMember->gender = $familyData['spouse_gender'];

            if(!empty($familyData["spouse_dob"]))
                $familyMember->dob =  $familyData["spouse_dob"];
            //$familyData["spouse_dob"];

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

    private function createOrUpdate_EmployeeCompensatory($user_id,$user_data)
    {
        Compensatory::where('user_id', $user_id->id)->delete();

        $newEmployee=new VmtEmployee;
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


    public function deleteEmployee($user_id)
    {
        User::where('id',$user_id)->delete();

        VmtEmployee::where('userid',$user_id)->delete();
        VmtEmployeeOfficeDetails::where('user_id', $user_id->id)->delete();
        VmtEmployeeStatutoryDetails::where('user_id', $user_id)->delete();
        Compensatory::where('user_id', $user_id)->delete();

    }


    public function fileUpload($file, $emp_code)
    {

        if (request()->has($file)) {
            $docUploads = request()->file($file);
            $docUploadsName = 'doc_' .$emp_code.'_'. $file . "_" . time() . '.' . $docUploads->getClientOriginalExtension();

            $emp_document_path = public_path('employee_documents/'.$emp_code);
            // dd($emp_document_path);
            if(!File::isDirectory($emp_document_path)){
                File::makeDirectory($emp_document_path, 0777, true, true);
            }
            else
            {
                //get the filename
                $user_id = User::where('user_code',$emp_code)->first('id');
                $existing_file = VmtEmployee::where('userid',$user_id->id)->value($file);

                //Delete the old file
                if( isset($existing_file) && File::isFile($emp_document_path.'/'.$existing_file)){
                   // dd("File found : ".$emp_document_path.'/'.$existing_file);
                   File::delete($emp_document_path.'/'.$existing_file);
                }
                else
                {
                   //If file doesnt exists, delete the entry

                }


            }

            //Upload the new file
            $docUploads->move($emp_document_path, $docUploadsName);
            return $docUploadsName;
        }
        else
        {
            return "";
        }
    }

}
