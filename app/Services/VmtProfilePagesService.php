<?php

namespace App\Services;

use App\Models\User;
use App\Models\VmtEmployeeDetails;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtDocuments;
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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VmtProfilePagesService
{


    /*
        Store employee profile pic in 'storage\employees\PLIPL068\profile_pic'
        Add entry in Users table
    */
    public function updateProfilePicture($user_code, $file_object){

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

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }



        try{

            //Create file name
            $date = date('d-m-Y_H-i-s');
            $file_name =  'pic_'.$user_code.'_'.$date.'.'.$file_object->extension();
            $path = $user_code.'/profile_pics';

            //Store the file in private path
            $file_object->storeAs($path, $file_name, 'private');

            //Get the user record and update avatar column
            $query_user = User::where('user_code',$user_code)->first();
            $query_user->avatar = $file_name;
            $query_user->save();

            return response()->json([
                "status" => "success",
                "message" => "Profile picture updated successfully",
                "data" => '',
            ]);


        }
        catch(\Exception $e){

            //dd("Error :: uploadDocument() ".$e);

            return response()->json([
                "status" => "failure",
                "message" => "Failed to save profile picture",
                "data" => $e,
            ]);

        }

    }

    public function getProfilePicture($user_code){
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

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            //Get the user record and update avatar column
            $avatar_filename = User::where('user_code',$user_code)->first()->avatar;

            //Get the image from PRIVATE disk and send as BASE64
            $response = Storage::disk('private')->get($user_code."/profile_pics/".$avatar_filename);

            if($response)
            {
                $response = base64_encode($response);
            }
            else// If no file found, then send this
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


        }
        catch(\Exception $e){

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

        // dd($response->id);



           $response_docs = VmtEmployeeDocuments::join('vmt_documents', 'vmt_documents.id', '=', 'vmt_employee_documents.doc_id')
           ->where('vmt_employee_documents.user_id', $response->id)
           ->get();

           $general_info = \DB::table('vmt_general_info')->first();
           $query_client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;

        // $response['client_logo'] = base64_encode($query_client_logo);
        $response['client_logo'] = $query_client_logo;

        //dd($response_docs);
        $response['employee_documents'] = $response_docs;

        //Add the documents details
        $response['avatar'] = $this->getProfilePicture($response->user_code);

        if(!empty($response['getEmployeeOfficeDetails']['department_id']))
            $response['getEmployeeOfficeDetails']['department_name'] = Department::find($response['getEmployeeOfficeDetails']['department_id'])->name ?? 'NA';

        if(!empty($response['getEmployeeOfficeDetails']['l1_manager_code']))
            $response['getEmployeeOfficeDetails']['l1_manager_name'] = User::where('user_code',$response['getEmployeeOfficeDetails']['l1_manager_code'])->first()->name ?? 'NA';

        if(!empty($response['getEmployeeDetails']['bank_id']))
        {

            $response['getEmployeeDetails']['bank_name'] = Bank::find($response['getEmployeeDetails']['bank_id'])->first()->bank_name;

        }


        $response['profile_completeness'] = calculateProfileCompleteness($user_id);


        //Remove ID from user table
        unset($response['id']);


        return $response;
    }
    public function getEmployeePrivateDocumentFile($user_code, $doc_name, $emp_doc_record_id=null)
    {
        // dd($user_code);

        try{

            if(empty($emp_doc_record_id))
            {
                $user_id=User::where('user_code',$user_code)->first()->id;

                $doc_id = VmtDocuments::where('document_name', $doc_name)->first()->id;

                $doc_filename = VmtEmployeeDocuments::where('user_id',$user_id)->where('doc_id', $doc_id)->first()->doc_url;
            }
            else
            {
                //Get the filename directly from the record_id
                $query_emp_doc = VmtEmployeeDocuments::find($emp_doc_record_id);
                $user_code = User::find($query_emp_doc->user_id)->user_code;
                $doc_filename = $query_emp_doc->doc_url;

            }

            //Get the image from PRIVATE disk and send as BASE64
            $response = Storage::disk('private')->get($user_code . "/onboarding_documents/" .$doc_filename);

            if($response)
            {
                $response = base64_encode($response);
            }
            else// If no file found, then send this
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


        }
        catch(\Exception $e){

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

    public function updateEmployeeContactInformation($user_code, $personal_email, $office_email, $mobile_number, $current_address_line_1, $current_address_line_2, $permanent_address_line_1 , $permanent_address_line_2)
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
    public function updateEmployeeBankDetails($user_id,$bank_id,$bank_ifsc_code,$bank_account_number,$pan_number)
    {

        try{

            $details = VmtEmployee::where('userid', $user_id)->first();
            $details->bank_id =$bank_id;
            $details->bank_ifsc_code =$bank_ifsc_code;
            $details->bank_account_number =$bank_account_number;
            $details->pan_number =$pan_number;
            $details->save();


        return $response=[
            'status' => 'success',
            'message' => 'Bank details updated successfully',
        ];
    } catch(\Exception $e){
        $response = [
        'status' => 'failure',
        'message' => 'Error while updateing Bank Details ',
        'error_message' => $e->getMessage()
        ];
    }
}
    public function addEmployeeExperianceDetails($user_code,$company_name,$location,$job_position,$period_from,$period_to)
    {


    try{
        //  dd($request->all());
        $user_id = user::where('user_code', $user_code)->first()->id;
            $exp = new Experience;
            $exp->user_id = $user_id;
            $exp->company_name = $company_name;
            $exp->location = $location;
            $exp->job_position = $job_position ;
            $exp->period_from = $period_from ;
            $exp->period_to = $period_to;
            $exp->save();
        $response = [
            'status' => 'success',
            'message' =>"Experiance details Added successfully"
        ];
    } catch(\Exception $e){
        $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Experiance Details ',
            'error_message' => $e->getMessage()
        ];
    }

         return $response;
}
    public function updateEmployeeExperianceDetails($user_code,$company_name,$location,$job_position,$period_from,$period_to,$exp_current_table_id)
    {


    try{
        //  dd($request->all());
        $user_id = user::where('user_code', $user_code)->first()->id;
        $exp = Experience::where('id',$exp_current_table_id)->first();
            $exp->user_id = $user_id;
            $exp->company_name = $company_name;
            $exp->location = $location;
            $exp->job_position = $job_position ;
            $exp->period_from = $period_from ;
            $exp->period_to = $period_to;
            $exp->save();
        $response = [
            'status' => 'success',
            'message' =>"Experiance details updated successfully"
        ];
    } catch(\Exception $e){
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


        try{
            $ExperianceDetails = Experience::where('id',$exp_current_table_id)->delete();
            $response = [
                'status' => 'success',
                'message' =>"Experiance details deleted successfully"
              ];
        }catch(\Exception $e){
             $response = [
                'status' => 'failure',
                'message' => 'Error while deleting Experience Information ',
                'error_message' => $e->getMessage()
             ];
        }


         return $response;
}
}
