<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use App\Models\VmtEmployeeDetails;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\VmtClientMaster;
use App\Models\Bank;
use App\Models\Experience;
use App\Models\gender;
use App\Models\VmtBloodGroup;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeePaySlipV2;
use App\Models\VmtPayroll;
use App\Models\VmtEmpPayroll;
use App\Models\VmtMaritalStatus;
use App\Models\VmtTempEmployeeProofDocuments;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Services\VmtApprovalsService;
use App\Http\Controllers\VmtProfilePagesController;

class VmtProfilePagesService
{


    /*
        Store employee profile pic in 'storage\employees\PLIPL068\profile_pic'
        Add entry in Users table
    */
    public function updateProfilePicture($user_code, $file_object)
    {

        // dd($user_code,$file_object);

        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'file_object' => $file_object
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'file_object' => 'required'
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }



        try {

            //Create file name
            $date = date('d-m-Y_H-i-s');
            $file_name =  'pic_' . $user_code . '_' . $date . '.' . $file_object->extension();
            $path = $user_code . '/profile_pics';

            //Store the file in private path
            $file_object->storeAs($path, $file_name, 'private');

            //Get the user record and update avatar column
            $query_user = User::where('user_code', $user_code)->first();
            $query_user->avatar = $file_name;
            $query_user->save();

            return response()->json([
                "status" => "success",
                "message" => "Profile picture updated successfully",
                "data" => '',
            ]);
        } catch (\Exception $e) {

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Failed to save profile picture",
                "data" => $e,
            ]);
        }
    }

    public function getProfilePicture($user_code)
    {
        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try {

            //Get the user record and update avatar column
            $avatar_filename = User::where('user_code', $user_code)->first()->avatar;

            //Get the image from PRIVATE disk and send as BASE64
            $response = Storage::disk('private')->get($user_code . "/profile_pics/" . $avatar_filename);


            if ($response) {
                $response = base64_encode($response);
            } else // If no file found, then send this
            {
                return response()->json([
                    'status' => 'failure',
                    'message' => "Profile picture doesnt exist for the given user"
                ]);
            }

            return response()->json([
                "status" => "success",
                "message" => "Profile picture fetched successfully",
                "data" => $response,
            ]);
        } catch (\Exception $e) {

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch profile picture",
                "data" => $e,
            ]);
        }
    }
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
            ->where('users.id', $user_id)
            ->first();



        $response_docs = VmtEmployeeDocuments::join('vmt_documents', 'vmt_documents.id', '=', 'vmt_employee_documents.doc_id')
            ->where('vmt_employee_documents.user_id', $response->id)
            ->get();
        // check wheather employee proof documents approved or not .
        $emp_proof_docs = VmtTempEmployeeProofDocuments::join('vmt_documents', 'vmt_documents.id', '=', 'vmt_temp_employee_proof_documents.doc_id')
            ->where('vmt_temp_employee_proof_documents.user_id', $response->id)
            ->get();

        $employee_proof_doc_list = array(
            'Pan Card' => 'updatePancardInfo', 'Cheque leaf/Bank Passbook' => 'updateBankInfo',
            'Aadhar Card Front' => 'updateEmplpoyeeName', 'Birth Certificate' => 'updateEmplpoyeeName'
        );

        $update_user_data = array();
        if (!empty($emp_proof_docs)) {
            foreach ($employee_proof_doc_list  as $singledoc => $updateuserdata) {

                $emp_doc_status = $emp_proof_docs->Where('document_name', $singledoc)->first();

                if (!empty($emp_doc_status)) {
                    if ($emp_doc_status->status == 'Approved') {

                        $update_user_data = (new VmtProfilePagesController)->$updateuserdata($user_id, $emp_doc_status->doc_id);
                    }
                }
            }
        }
        $user_short_name = getUserShortName($user_id);

        $response['user_short_name'] = getUserShortName($user_id);

        $response['short_name_Color'] = shortNameBGColor($user_short_name);

        $user_client_data = User::where('id', $user_id)->first();

        $response['client_details'] = VmtClientMaster::where('id', $user_client_data->client_id)->first();

        $general_info = \DB::table('vmt_client_master')->first();

        $query_client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->client_logo;

        $response['client_logo'] = $query_client_logo;

        $response['employee_documents'] = $response_docs;

        $response['employee_documents_proof'] = $update_user_data;

        $response['Current_login_user'] = User::where('id',auth()->user()->id)->first();

        $year = Carbon::now()->year;
        $month = Carbon::now()->subMonth()->format('m');

        $response['payroll_summary'] = VmtEmployeePaySlipV2::join('vmt_emp_payroll', 'vmt_emp_payroll.id', '=', 'vmt_employee_payslip_v2.emp_payroll_id')
            ->join('vmt_payroll', 'vmt_payroll.id', 'vmt_emp_payroll.payroll_id')
            ->join('users', 'users.id', 'vmt_emp_payroll.user_id')
            ->whereYear('vmt_payroll.payroll_date', '=', $year)
            ->whereMonth('vmt_payroll.payroll_date', '=', $month)
            ->where('users.id', '=', $user_id)
            ->orderBy('vmt_payroll.updated_at', 'DESC')
            ->get([
                'vmt_payroll.payroll_date',
                'vmt_employee_payslip_v2.worked_Days',
                'vmt_employee_payslip_v2.lop'
            ]);

        //Add the documents details

        $response['avatar'] = $this->getProfilePicture($response->user_code);

        if (!empty($response['getEmployeeOfficeDetails']['department_id']))
            $response['getEmployeeOfficeDetails']['department_name'] = Department::find($response['getEmployeeOfficeDetails']['department_id'])->name ?? 'NA';

        if (!empty($response['getEmployeeOfficeDetails']['l1_manager_code']))
            $response['getEmployeeOfficeDetails']['l1_manager_name'] = User::where('user_code', $response['getEmployeeOfficeDetails']['l1_manager_code'])->first()->name ?? 'NA';

        if (!empty($response['getEmployeeDetails']['bank_id'])) {
            $response['getEmployeeDetails']['bank_name'] = Bank::find($response['getEmployeeDetails']['bank_id'])->bank_name;
        }

        if (!empty($response['getEmployeeDetails']['blood_group_id'])) {
            $response['getEmployeeDetails']['blood_group_name'] = VmtBloodGroup::where('id', $response['getEmployeeDetails']['blood_group_id'])->first()->name;
        }

        if (!empty($response['getEmployeeDetails']['marital_status_id'])) {
            $query = VmtMaritalStatus::where('id', $response['getEmployeeDetails']['marital_status_id']);

            // $response['getEmployeeDetails']['marital_status'] = VmtMaritalStatus::where('id',$response['getEmployeeDetails']['marital_status_id'])->first()->name;

            if ($query->exists()) {
                $response['getEmployeeDetails']['marital_status'] = $query->first()->name;
            } else {
                $response['getEmployeeDetails']['marital_status'] = 'Undefined';
            }
        }

        $response['profile_completeness'] = calculateProfileCompleteness($user_id);


        //Remove ID from user table
        unset($response['id']);
        //dd($response['getEmployeeDetails']);
        if(!empty($response['getEmployeeDetails'])){

            foreach ($response['getEmployeeDetails']->toArray() as $key => $value) {
                if ($value == null || empty($value) || $value == 'none') {
                    $response['getEmployeeDetails'][$key] = '';
                }
            }
           }
            //dd($response['getEmployeeDetails']);
        if(!empty($response['getEmployeeOfficeDetails'])){
            foreach ($response['getEmployeeOfficeDetails']->toArray() as $key => $value) {
                if ($value == null || empty($value) || $value == 'none') {
                    $response['getEmployeeOfficeDetails'][$key] = '';
                }
            }
        }

            if(!empty( $response['getFamilyDetails'])){
            foreach ($response['getFamilyDetails']->toArray() as $key => $value) {
                if ($value == null || empty($value) || $value == 'none') {
                    $response['getFamilyDetails'][$key] = '';
                }
            }
        }

            if(!empty($response['getExperienceDetails'])){
                foreach ($response['getExperienceDetails']->toArray() as $key => $value) {
                if ($value == null || empty($value) || $value == 'none') {
                    $response['getExperienceDetails'][$key] = '';
                }
            }
          }

            if(!empty($response['getStatutoryDetails'])){
            foreach ($response['getStatutoryDetails']->toArray() as $key => $value) {
                if ($value == null || empty($value) || $value == 'none') {
                    $response['getStatutoryDetails'][$key] = '';
                }
            }
          }

            if(!empty($response['getEmployeeDetails'])){
            foreach ($response['getEmergencyContactsDetails']->toArray() as $key => $value) {
                if ($value == null || empty($value) || $value == 'none') {
                    $response['getEmergencyContactsDetails'][$key] = '';
                }
            }
        }

            return $response;
    }
    public function getEmployeePrivateDocumentFile($user_code, $doc_name, $emp_doc_record_id = null)
    {
        // dd($user_code);

        try {

            if (empty($emp_doc_record_id)) {
                $user_id = User::where('user_code', $user_code)->first()->id;

                $doc_id = VmtDocuments::where('document_name', $doc_name)->first()->id;

                $doc_filename = VmtEmployeeDocuments::where('user_id', $user_id)->where('doc_id', $doc_id)->first()->doc_url;
            } else {
                //Get the filename directly from the record_id
                $query_emp_doc = VmtEmployeeDocuments::find($emp_doc_record_id);
                $user_code = User::find($query_emp_doc->user_id)->user_code;
                $doc_filename = $query_emp_doc->doc_url;
            }

            //Get the image from PRIVATE disk and send as BASE64
            $response = Storage::disk('private')->get($user_code . "/onboarding_documents/" . $doc_filename);

            if ($response) {
                $response = base64_encode($response);
            } else // If no file found, then send this
            {
                return response()->json([
                    'status' => 'failure',
                    'message' => "Employee document doesnt exist for the given user"
                ]);
            }

            return response()->json([
                "status" => "success",
                "message" => "Employee document fetched successfully",
                "data" => $response,
            ]);
        } catch (\Exception $e) {

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch profile picture",
                "data" => $e,
            ]);
        }
        return response()->file(storage_path('employees/' . $private_file));
    }

    public function updateEmployeeGeneralInformation($user_id, $birthday, $gender, $marital_status, $blood_group, $phy_challenged)
    {

        try {

            $details = VmtEmployee::where('userid', $user_id)->first();
            $details->dob = $birthday;
            $details->gender = $gender;
            $details->marital_status_id = VmtMaritalStatus::where('name', $marital_status)->first()->id;
            $details->blood_group_id = VmtBloodGroup::where('name', $blood_group)->first()->id;
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

    public function updateEmployeeContactInformation($user_code, $personal_email, $office_email, $mobile_number, $current_address_line_1, $current_address_line_2, $permanent_address_line_1, $permanent_address_line_2)
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

                $details->current_address_line_1 = $current_address_line_1;
                $details->current_address_line_2 = $current_address_line_2;
                $details->permanent_address_line_1 = $permanent_address_line_1;
                $details->permanent_address_line_2 = $permanent_address_line_2;

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
            $emp_familydetails = VmtEmployeeFamilyDetails::where('id', $record_id)->first();
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
        return $response;
    }
    public function deleteEmployeeFamilyDetails($record_id, $user_code)
    {
        try {



            $familyDetails = VmtEmployeeFamilyDetails::where('id', $record_id)->delete();
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
    public function updateEmployeeBankDetails($user_id, $bank_id, $bank_ifsc_code, $bank_account_number, $pan_number)
    {

        try {

            $details = VmtEmployee::where('userid', $user_id)->first();
            $details->bank_id = $bank_id;
            $details->bank_ifsc_code = $bank_ifsc_code;
            $details->bank_account_number = $bank_account_number;
            $details->pan_number = $pan_number;
            $details->save();


            return $response = [
                'status' => 'success',
                'message' => 'Bank details updated successfully',
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Bank Details ',
                'error_message' => $e->getMessage()
            ];
        }
    }
    public function addEmployeeExperianceDetails($user_code, $company_name, $location, $job_position, $period_from, $period_to)
    {


        try {
            //  dd($request->all());
            $user_id = user::where('user_code', $user_code)->first()->id;
            $exp = new Experience;
            $exp->user_id = $user_id;
            $exp->company_name = $company_name;
            $exp->location = $location;
            $exp->job_position = $job_position;
            $exp->period_from = $period_from;
            $exp->period_to = $period_to;
            $exp->save();
            $response = [
                'status' => 'success',
                'message' => "Experiance details Added successfully"
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Experiance Details ',
                'error_message' => $e->getMessage()
            ];
        }

        return $response;
    }
    public function updateEmployeeExperianceDetails($user_code, $company_name, $location, $job_position, $period_from, $period_to, $exp_current_table_id)
    {


        try {

            $user_id = user::where('user_code', $user_code)->first()->id;

            $exp = Experience::where('id', $exp_current_table_id)->first();
            $exp->user_id = $user_id;
            $exp->company_name = $company_name;
            $exp->location = $location;
            $exp->job_position = $job_position;
            $exp->period_from = $period_from;
            $exp->period_to = $period_to;
            $exp->save();
            $response = [
                'status' => 'success',
                'message' => "Experiance details updated successfully"
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Experience Information',
                'error_message' => $e->getMessage()
            ];
        }

        return $response;
    }
    public function deleteEmployeeExperianceDetails($exp_current_table_id)
    {


        try {
            $ExperianceDetails = Experience::where('id', $exp_current_table_id)->delete();
            $response = [
                'status' => 'success',
                'message' => "Experiance details deleted successfully"
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while deleting Experience Information ',
                'error_message' => $e->getMessage()
            ];
        }


        return $response;
    }
    public function uploadProofDocument($emp_id, $fileObject, $onboard_document_type)
    {

        try {
            $emp_code = User::find($emp_id)->user_code;

            if (empty($fileObject))
                return null;

            $onboard_doc_id = VmtDocuments::where('document_name', $onboard_document_type)->first();


            if ($onboard_doc_id->exists()) {
                $onboard_doc_id = $onboard_doc_id->id;
            } else
                return null;

            $employee_documents = VmtTempEmployeeProofDocuments::where('user_id', $emp_id)->where('doc_id', $onboard_doc_id);

            //check if document already uploaded
            if ($employee_documents->exists()) {

                $employee_documents = $employee_documents->first();

                $file_path = '/' . $emp_code . '/onboarding_documents' . '/' . $employee_documents->doc_url;

                //fetch the existing document and delete its file from STORAGE folder
                $file_exists_status = Storage::disk('private')->exists($file_path);
                if ($file_exists_status) {

                    //delete the file
                    Storage::disk('private')->delete($file_path);
                }
            } else {
                $employee_documents = new VmtTempEmployeeProofDocuments;
                $employee_documents->user_id = $emp_id;
                $employee_documents->doc_id = $onboard_doc_id;
            }


            $date = date('d-m-Y_H-i-s');
            $fileName =  str_replace(' ', '', $onboard_document_type) . '_' . $emp_code . '_' . $date . '.' . $fileObject->extension();
            $path = $emp_code . '/onboarding_documents';
            $filePath = $fileObject->storeAs($path, $fileName, 'private');
            $employee_documents->doc_url = $fileName;
            $employee_documents->status = 'Pending';
            $employee_documents->save();
        } catch (\Exception $e) {
            dd("Error :: uploadDocument() " . $e);
        }

        return "success";
    }
    public function getEmpProfileProofPrivateDoc($emp_doc_record_id = null)
    {
        // dd($user_code);

        try {


            //Get the filename directly from the record_id
            $query_emp_doc = VmtTempEmployeeProofDocuments::find($emp_doc_record_id);
            $user_code = User::find($query_emp_doc->user_id)->user_code;
            $doc_filename = $query_emp_doc->doc_url;


            //Get the image from PRIVATE disk and send as BASE64
            $response = Storage::disk('private')->get($user_code . "/onboarding_documents/" . $doc_filename);

            if ($response) {
                $response = base64_encode($response);
            } else // If no file found, then send this
            {
                return response()->json([
                    'status' => 'failure',
                    'message' => "Employee proof proof document doesnt exist for the given user"
                ]);
            }

            return response()->json([
                "status" => "success",
                "message" => "Employee document fetched successfully",
                "data" => $response,
            ]);
        } catch (\Exception $e) {

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch profile picture",
                "data" => $e,
            ]);
        }
        return response()->file(storage_path('employees/' . $private_file));
    }
}
