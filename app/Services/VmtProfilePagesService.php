<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeDetails;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtOnboardingDocuments;
use App\Models\VmtEmployeeDocuments;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Bank;
use App\Models\Experience;
use App\Models\gender;
use App\Models\VmtBloodGroup;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtMaritalStatus;
use App\Services\VmtEmployeePayslipService;
use Illuminate\Support\Facades\Crypt;

class VmtProfilePagesService
{

    /*

        Get employee details related to profile pages.

    */

    public function getEmployeeProfileDetails(int $user_id)
    {

        $response = User::with(
            [
                'getEmployeeDetails',
                'getEmployeeOfficeDetails',
                'getFamilyDetails',
                'getExperienceDetails',
                'getStatutoryDetails',
                'getEmergencyContactsDetails',
                // 'getEmployeeDocuments',
            ]
        )
            //->join('vmt_onboarding_documents', 'vmt_onboarding_documents.id', '=', 'vmt_employee_documents.doc_id')
            ->where('users.id', $user_id)
            ->first();

        // dd($response->id);
        $response_docs = DB::table('vmt_employee_documents')
            ->join('vmt_onboarding_documents', 'vmt_onboarding_documents.id', '=', 'vmt_employee_documents.doc_id')
            ->where('vmt_employee_documents.user_id', $response->id)
            ->get();
        // dd($response_docs);

        //dd($response_docs);
        $response['employee_documents'] = $response_docs;

        //Add the documents details



        //Remove ID from user table
        unset($response['id']);


        return $response;
    }
    public function getEmployeePrivateDocumentFile($user_code, $doc_name)
    {

        $doc_id = VmtOnboardingDocuments::where('document_name', $doc_name)->first()->id;
        $doc_filename = VmtEmployeeDocuments::where('doc_id', $doc_id)->first()->doc_url;
        $private_file = $user_code . "/onboarding_documents/" . $doc_filename;
        //dd(file(storage_path('employees/'.$private_file)));
        return response()->file(storage_path('employees/' . $private_file));
    }

    public function updateEmployeeGeneralInformation($user_code, $birthday, $gender, $doj, $marital_status, $blood_group, $phy_challenged)
    {

        try {
            $user_id = user::where('user_code', $user_code)->first()->id;
            $details = VmtEmployee::where('userid', $user_id)->first();
            $details->dob = $birthday;
            $details->gender = $gender;
            $details->marital_status_id = VmtMaritalStatus::where('name', $marital_status)->first()->id;
            $details->doj = $doj;
            $details->blood_group_id = $blood_group;
            $details->physically_challenged = $phy_challenged;

            $details->save();

            return $response = [
                'status' => 'success',
                'message' => "General details updated successfully",
            ];
        } catch (\Exception $e) {
            return $response = [
                'status' => 'failure',
                'message' => 'Error while updateing General Information ',
                'error_message' => $e->getMessage()
            ];
        }
    }

    public function updateEmployeeContactInformation($user_code, $personal_email, $office_email, $mobile_number, $current_address, $permanent_address)
    {


        try {
            $query_user = user::where('user_code', $user_code)->first();
            $query_user->email = $personal_email;
            $query_user->save();

            $employee_office_details = VmtEmployeeOfficeDetails::where('user_id', $query_user->id)->first();
            $employee_office_details->officical_mail = $office_email;
            // $employee_office_details->official_mobile = $mobile_number;
            $employee_office_details->save();

            $details = VmtEmployee::where('userid', $query_user->id)->first();

            // dd($details);

            if ($details->exists()) {
                $details->mobile_number = $mobile_number;
                $details->save();
            }

            return $response = [
                'status' => 'success',
                'message' => "Contact details updated successfully"
            ];
        } catch (\Exception $e) {
            return $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Contact Information ',
                'data' => $e->getMessage()
            ];
        }
    }


    public function addFamilyDetails($user_code, $name, $relationship, $dob, $phone_number)
    {
        try {
            // dd($request->all());
            $user_id = user::where('user_code', $user_code)->first()->id;
            $emp_familydetails = new VmtEmployeeFamilyDetails;
            $emp_familydetails->user_id = $user_id;
            $emp_familydetails->name = $name;
            $emp_familydetails->relationship = $relationship;
            $emp_familydetails->dob = $dob;
            $emp_familydetails->phone_number = $phone_number;
            $emp_familydetails->save();

            return  $response = [
                'status' => 'success',
                'message' => "Family details Added successfully"
            ];
        } catch (\Exception $e) {
            return $response = [
                'status' => 'failure',
                'message' => 'Error while Adding Family Information ',
                'error_message' => $e->getMessage()
            ];
        }
    }
    public function UpdateFamilyDetails($record_id, $name, $relationship, $dob, $phone_number)
    {
        try {
            //dd($request->all());
            //$user_id = user::where('user_code', $user_code)->first()->id;
            $emp_familydetails = VmtEmployeeFamilyDetails::find('id', $record_id);
            $emp_familydetails->name = $name;
            $emp_familydetails->relationship = $relationship;
            $emp_familydetails->dob = $dob;
            $emp_familydetails->phone_number = $phone_number;
            $emp_familydetails->save();

            $response = [
                'status' => 'success',
                'message' => 'Family Details Upadated Successfully ',
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Family Information ',
                'error_message' => $e->getMessage()
            ];
        }
    }
    public function deleteFamilyDetails($record_id, $user_code)
    {
        try {
            $user_id = user::where('user_code', $user_code)->first()->id;

            $familyDetails = VmtEmployeeFamilyDetails::where('id', $record_id)->first();
            $familyDetails->where('user_id', $user_id)->delete();
            return $response = [
                'status' => 'success',
                'message' => "Family details deleted successfully"
            ];
        } catch (\Exception $e) {
            return   $response = [
                'status' => 'failure',
                'message' => 'Error while Deletining Family Information ',
                'error_message' => $e->getMessage()
            ];
        }
    }
}
