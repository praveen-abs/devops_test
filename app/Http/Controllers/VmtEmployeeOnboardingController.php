<?php

namespace App\Http\Controllers;
use App\Models\VmtEmployeeStatutoryDetails;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VmtEmployee;
use Illuminate\Support\Facades\Hash;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;

class VmtEmployeeOnboardingController extends Controller
{

    public function testFunction($user_data)
    {
        dd($user_data);
    }

    private function createOrUpdate_User($row)
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
    }


    private function createOrUpdate_EmployeeDetails($user_id,$row)
    {
        VmtEmployee::where('userid',$user_id)->delete();

        $newEmployee = new VmtEmployee;

        $newEmployee->userid = $user_id;
        $newEmployee->emp_no   =    $row["employee_code"] ?? '';
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
        $newEmployee->marital_status = $row["marital_status"] ?? '';

        $newEmployee->mobile_number  = strval($row["mobile_no"]);
        $newEmployee->blood_group  = $row["blood_group"] ?? '';
        //$newEmployee->email_id   = $row["email"];
        $newEmployee->bank_name   = $row["bank_name"] ?? '';
        $newEmployee->bank_ifsc_code  = $row["bank_ifsc"] ?? '';
        $newEmployee->bank_account_number  = $row["account_no"] ?? '';
        $newEmployee->present_address   = $row["current_address_line_1"] ?? '' . ' , ' . $row["current_address_line_2"] ?? '';
        $newEmployee->permanent_address   = $row["permanent_address_line_1"] ?? '' . ' , ' . $row["permanent_address_line_2"] ?? '';
        //$newEmployee->father_age   = $row["father_age"];
        $newEmployee->mother_name   = $row["mother_name"] ?? '';
        //$newEmployee->mother_age  = $row["mother_age"];
        if (!empty($row['marital_status'])) {
            if ($row['marital_status'] <> 'unmarried') {
                $newEmployee->spouse_name   = $row["spouse_name"];
                $newEmployee->spouse_age   = $row["spouse_dob"];
                if ($row['no_child'] > 0) {
                    $newEmployee->kid_name   = json_encode($row["child_name"]);
                    $newEmployee->kid_age  = json_encode($row["child_dob"]);
                }
            }
        } else {
            $row['marital_status'] = '';
        }

        $newEmployee->aadhar_card_file = $this->fileUpload('aadhar_card_file', $user_id->user_code);
        $newEmployee->aadhar_card_backend_file = $this->fileUpload('aadhar_card_backend_file', $user_id->user_code);
        $newEmployee->pan_card_file = $this->fileUpload('pan_card_file', $user_id->user_code);
        $newEmployee->passport_file = $this->fileUpload('passport_file', $user_id->user_code);
        $newEmployee->voters_id_file = $this->fileUpload('voters_id_file', $user_id->user_code);
        $newEmployee->dl_file = $this->fileUpload('dl_file', $user_id->user_code);
        $newEmployee->education_certificate_file = $this->fileUpload('education_certificate_file', $user_id->user_code);
        $newEmployee->reliving_letter_file = $this->fileUpload('reliving_letter_file', $user_id->user_code);
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
         //Delete old record
         VmtEmployeeOfficeDetails::where('user_id', $user_id->id)->delete();
         $newEmployee = new VmtEmployee;
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

    private function createOrUpdate_EmployeeStatutoryDetails($user_id,$user_data)
    {

        //Delete old record
        VmtEmployeeStatutoryDetails::where('user_id', $user_id->id)->delete();

        //Statutory Details
        $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
        $newEmployee_statutoryDetails->user_id = $user_id->id;
        $newEmployee_statutoryDetails->uan_number = $row["uan_number"] ?? '';
        $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"] ?? '';
        $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"] ?? '';
        $newEmployee_statutoryDetails->ptax_location = $row["ptax_location"] ?? '';
        $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"] ?? '';
        $newEmployee_statutoryDetails->lwf_location = $row["lwf_location"] ?? '';
        $newEmployee_statutoryDetails->save();
    }

    private function createOrUpdate_EmployeeFamilyDetails($user_data)
    {
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

}
