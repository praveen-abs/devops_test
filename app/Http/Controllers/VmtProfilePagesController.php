<?php

namespace App\Http\Controllers;

use Session as Ses;
use App\Models\Department;
use App\Models\User;
use App\Models\Bank;
use App\Models\Experience;
use App\Models\gender;
use App\Models\VmtBloodGroup;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtTempEmpNames;
use App\Models\VmtTempBankAccount;
use App\Models\VmtTempPancardDetails;
use App\Models\VmtTempEmployeeProofDocuments;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtDocuments;
use App\Services\VmtEmployeePayCheckService;

use App\Services\VmtProfilePagesService;
use App\Services\VmtEmployeeService;
use App\Mail\ApproveRejectEmpDetails;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class VmtProfilePagesController extends Controller
{

    // Show Profile info
    public function showProfilePage(Request $request)
    {
        //dd($documents_filenames);
        return view('profilePage_new');
    }

    public function updateProfilePicture(Request $request, VmtProfilePagesService $serviceProfilePagesService){
        return $serviceProfilePagesService->updateProfilePicture($request->user_code, $request->file_object);
    }

    public function getProfilePicture(Request $request, VmtProfilePagesService $serviceProfilePagesService){
        return $serviceProfilePagesService->getProfilePicture($request->user_code);
    }


    public function updateReportingManager(Request $request){


        $user_id  = User::where('user_code', $request->user_code)->first()->id;
        $query_EmpOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first();

        if($query_EmpOfficeDetails){
            $query_EmpOfficeDetails->l1_manager_code = $request->manager_user_code;
            $query_EmpOfficeDetails->save();
        }

        return [
            'status' => 'success',
            'message' => 'Reporting Manager updated successfully',
            'data' => ''
         ];
    }

    public function updateDepartment(Request $request){

        $user_id = User::where('user_code',$request->user_code)->first()->id;

        $query_EmpOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first();

        if($query_EmpOfficeDetails){
            $query_EmpOfficeDetails->department_id = $request->department_id;
            $query_EmpOfficeDetails->save();
        }

        return $response = [
            'status' => 'success',
            'message' => 'Department updated successfully',
            'data' => ''
         ];

    }
    public function updatetempEmplpoyeeName(Request $request,VmtProfilePagesService $serviceVmtProfilePagesService){
try{

        $user_id = User::where('user_code',$request->user_code)->first()->id;
        $employee_details = VmtTempEmpNames::where('user_id', $user_id)->first();

        if(!empty($employee_details)){

            $details=$employee_details;
         }else{
            $details = new VmtTempEmpNames;
         }
            $details->user_id = $user_id;
            $details->name = $request->name;
            $details->save();

        $emp_file =$serviceVmtProfilePagesService->uploadProofDocument($user_id, $request->emp_doc,$request->onboard_document_type );

         $response = [
            'status' => 'success',
            'message' => 'Employee Name updated successfully',
            'data' => ''
         ];
        } catch (\Exception $e) {
             $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Employee Name ',
                'error_message' => $e->getMessage()
            ];
        }
        return response()->json($response);

    }
    public function updateEmplpoyeeName($user_id,$doc_id){
     try{

        $Emp_details =VmtTempEmpNames::where('user_id', $user_id)->first();

        $emp_doc = VmtTempEmployeeProofDocuments::where('user_id',$user_id)->Where('doc_id',$doc_id)->first();

        if(!empty($Emp_details)){
                $details = User::where('id', $user_id)->first();
                $details->name =$Emp_details->name;
                $details->save();

        if(!empty($emp_doc)){
            $employee_doc_data = VmtEmployeeDocuments::where('user_id', $user_id)->Where('doc_id',$emp_doc->doc_id)->first();
            if( $employee_doc_data){
                $employee_documents =$employee_doc_data;
            }else{
                $employee_documents =new VmtEmployeeDocuments;
            }

            $employee_documents->user_id =$emp_doc->user_id;
            $employee_documents->doc_id =$emp_doc->doc_id;
            $employee_documents->doc_url =$emp_doc->doc_url;
            $employee_documents->status =$emp_doc->status;
            $employee_documents->save();
            $emp_doc->delete();
            $Emp_details->delete();
        }

         $response = [
            'status' => 'success',
            'message' => 'Employee Name updated successfully',
            'data' => ''
         ];
        }else{
             $response = [
                'status' => 'success',
                'message' => 'Employee Name uptodate for this user',
             ];
        }
        } catch (\Exception $e) {
             $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Employee Name ',
                'error_message' => $e->getMessage()
            ];
        }
        return response()->json($response);
    }

    public function updateGeneralInfo(Request $request) {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code',
                "dob" => 'required',
                "gender"  => 'required',
                "marital_status_id"  => 'required|integer',
                "blood_group_id"  => 'required|integer',
                "physically_challenged" => 'required',

            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

    try {


        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $details = VmtEmployee::where('userid', $user_id)->first();
        $details->dob = $request->dob;
        $details->gender = $request->gender;
        $details->marital_status_id =$request->marital_status_id;
        $details->blood_group_id =$request->blood_group_id;
        $details->physically_challenged = $request->physically_challenged;
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
    return response()->json($response);
}


    public function updateContactInfo(Request $request)
    {
    try {

        $query_user = user::where('user_code', $request->user_code)->first();
        $query_user->email =$request->email;
        $query_user->save();

        $employee_emp_details = VmtEmployee::where('userid', $query_user->id)->first();
        $employee_emp_details->mobile_number = $request->mobile_number;
        $employee_emp_details->save();

        $employee_office_details = VmtEmployeeOfficeDetails::where('user_id', $query_user->id)->first();
        $employee_office_details->officical_mail = $request->officical_mail;
         $employee_office_details->official_mobile = $request->official_mobile_number;
        $employee_office_details->save();


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
         return response()->json($response);

    }


    public function updateAddressInfo(Request $request)
    {

    try{
        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $details = VmtEmployee::where('userid', $user_id)->first();
        $details->current_address_line_1 = $request->current_address_line_1;
        $details->permanent_address_line_1 = $request->permanent_address_line_1;
        $details->save();

         $response = [
            'status' => 'success',
            'message' =>"Address details updated successfully"
         ];
    }catch(\Exception $e){
         $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Address Information ',
            'error_message' => $e->getMessage()
         ];
    }

         return response()->json($response);

    }

    public function deleteFamilyInfo(Request $request)
    {

    try{
        $familyDetails = VmtEmployeeFamilyDetails::where('id',$request->current_table_id)->delete();

         $response = [
            'status' => 'success',
            'message' =>"Family details deleted successfully"
         ];

        }catch(\Exception $e){
            $response = [
                'status' => 'failure',
                'message' => 'Error while Deletining Family Information ',
                'error_message' => $e->getMessage()
            ];
        }

         return response()->json($response);
    }

    public function addFamilyInfo(Request $request)
    {
    try{

        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $emp_familydetails = new VmtEmployeeFamilyDetails;
        $emp_familydetails->user_id = $user_id;
        $emp_familydetails->name = $request->name;
        $emp_familydetails->relationship = $request->relationship;
        $emp_familydetails->dob = $request->dob;
        $emp_familydetails->phone_number = $request->phone_number;
        $emp_familydetails->save();
        $response = [
            'status' => 'success',
            'message' =>"Family details Added successfully"
         ];
    }catch(\Exception $e){
         $response = [
            'status' => 'failure',
            'message' => 'Error while Adding Family Information ',
            'error_message' => $e->getMessage()
         ];
    }

         return response()->json($response);
    }

    public function updateFamilyInfo(Request $request)
    {
        try{
           //dd($request->all());
            $user_id = user::where('user_code', $request->user_code)->first()->id;
            $emp_familydetails = VmtEmployeeFamilyDetails::where('id',$request->current_table_id)->first();
            $emp_familydetails->user_id =$user_id;
            $emp_familydetails->name = $request->input('name');
            $emp_familydetails->relationship = $request->input('relationship');
            $emp_familydetails->dob = $request->input('dob');
            $emp_familydetails->phone_number = $request->input('phone_number');
            $emp_familydetails->save();

            $response = [
                'status' => 'success',
                'message' => 'Family Details Upadated Successfully ',
            ];
        }
        catch(\Exception $e){
            $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Family Information ',
                'error_message' => $e->getMessage()
            ];
        }

             return response()->json($response);
    }


public function addExperienceInfo(Request $request)
{

    try{

        $user_id = user::where('user_code', $request->user_code)->first()->id;
            $exp = new Experience;
            $exp->user_id = $user_id;
            $exp->company_name = $request->company_name;
            $exp->location = $request->experience_location;
            $exp->job_position = $request->job_position;
            $exp->period_from = $request->period_from;
            $exp->period_to = $request->period_to;
            $exp->save();

        $response = [
            'status' => 'success',
            'message' =>"Experiance details Added successfully"
        ];
    } catch(\Exception $e){
        $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Family Information ',
            'error_message' => $e->getMessage()
        ];
    }

         return response()->json($response);
    }

    public function updateExperienceInfo(Request $request)
    {

        try{
            $user_id = user::where('user_code', $request->user_code)->first()->id;
                $exp = Experience::where('id',$request->exp_current_table_id)->first();
                $exp->user_id = $user_id;
                $exp->company_name = $request->company_name;
                $exp->location = $request->experience_location;
                $exp->job_position = $request->job_position;
                $exp->period_from = $request->period_from;
                $exp->period_to = $request->period_to;
                $exp->save();
            $responseJSON = [
                'status' => 'success',
                'message' =>"Experiance details updated successfully"
            ];
        }catch(\Exception $e){
             $response = [
                'status' => 'failure',
                'message' => 'Error while updateing Experience Information ',
                'error_message' => $e->getMessage()
            ];
         }
            return response()->json($responseJSON);
    }

    public function deleteExperienceInfo(Request $request)
    {
    try{
        $ExperianceDetails = Experience::where('id',$request->exp_current_table_id)->delete();
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
        return response()->json($response);

    }


    public function updatetempBankInfo(Request $request ,VmtProfilePagesService $serviceVmtProfilePagesService)
    {

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "user_code" => 'required|exists:users,user_code', //not used now
                "bank_id" => 'required|integer',
                "account_no" => 'required',
                "bank_ifsc" =>'required',

            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid",
                "email" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            $user_id = user::where('user_code', $request->user_code)->first()->id;
            $emp_bank_details = VmtTempBankAccount::where('user_id', $user_id)->first();

            if(!empty($emp_bank_details)){
                $details=$emp_bank_details;
            }else{
                $details = new VmtTempBankAccount;
            }
                $details->user_id = $user_id;
                $details->bank_id = $request->bank_id;
                $details->bank_account_number = $request->account_no;
                $details->bank_ifsc_code = $request->bank_ifsc;
                $details->save();

            $emp_file =$serviceVmtProfilePagesService->uploadProofDocument($user_id, $request->PassBook,$request->onboard_document_type );

            $response = [
                'status' => 'success',
                'message' =>"Bank details updated successfully"
            ];
        }catch(\Exception $e){
            $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Bank Information ',
            'error_message' => $e->getMessage()
            ];
        }

         return response()->json($response);

    }
    public function updateBankInfo($user_id,$doc_id)
    {
        try{

            $bank_details = VmtTempBankAccount::where('user_id', $user_id)->first();
            $emp_doc = VmtTempEmployeeProofDocuments::where('user_id',$user_id)->Where('doc_id',$doc_id)->first();

            if(!empty($bank_details)){
                    $details = VmtEmployee::where('userid', $user_id)->first();
                    $details->bank_id = $bank_details->bank_id;
                    $details->bank_ifsc_code = $bank_details->bank_ifsc_code;
                    $details->bank_account_number = $bank_details->bank_account_number;
                    $details->save();

            if(!empty($emp_doc)){
                $employee_doc_data = VmtEmployeeDocuments::where('user_id', $user_id)->Where('doc_id',$emp_doc->doc_id)->first();
                if( $employee_doc_data){
                    $employee_documents =$employee_doc_data;
                }else{
                    $employee_documents =new VmtEmployeeDocuments;
                }
                    $employee_documents->user_id =$emp_doc->user_id;
                    $employee_documents->doc_id =$emp_doc->doc_id;
                    $employee_documents->doc_url =$emp_doc->doc_url;
                    $employee_documents->status =$emp_doc->status;
                    $employee_documents->save();
                    $emp_doc->delete();
                    $bank_details->delete();
            }

            $response = [
                'status' => 'success',
                'message' =>"Bank details updated successfully"
            ];
        }else{
            $response = [
                'status' => 'success',
                'message' =>"Bank details uptodate for this user"
            ];
        }
        }catch(\Exception $e){
            $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Bank Information ',
            'error_message' => $e->getMessage()
            ];
        }

         return response()->json($response);

    }
    public function updatetempPancardInfo(Request $request ,VmtProfilePagesService $serviceVmtProfilePagesService)
    {
        try{

            $user_id = user::where('user_code', $request->user_code)->first()->id;
            $pancard_details = VmtTempPancardDetails::where('user_id', $user_id)->first();

                if(!empty($pancard_details)){
                    $details=$pancard_details;
                }else{
                    $details = new VmtTempPancardDetails;
                }
                    $details->user_id =$user_id;
                    $details->pan_number =$request->pan_no;
                    $details->save();

            $emp_file =$serviceVmtProfilePagesService->uploadProofDocument($user_id, $request->pancard,$request->onboard_document_type);

            $response = [
                'status' => 'success',
                'message' =>"Pancard details updated successfully"
            ];
        }catch(\Exception $e){
            $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Pancard Information ',
            'error_message' => $e->getMessage()
            ];
        }

         return response()->json($response);

    }
    public function updatePancardInfo($user_id,$doc_id)
    {
        try{

            $pancard_details = VmtTempPancardDetails::where('user_id', $user_id)->first();
            $emp_doc = VmtTempEmployeeProofDocuments::where('user_id',$user_id)->Where('doc_id',$doc_id)->first();


            if(!empty($pancard_details)){
                    $details = VmtEmployee::where('userid', $user_id)->first();
                    $details->pan_number =$pancard_details->pan_number;
                    $details->save();


            if(!empty($emp_doc)){
                $employee_doc_data = VmtEmployeeDocuments::where('user_id', $user_id)->Where('doc_id',$emp_doc->doc_id)->first();
                if( $employee_doc_data){
                    $employee_documents =$employee_doc_data;
                }else{
                    $employee_documents =new VmtEmployeeDocuments;
                }
                    $employee_documents->user_id =$emp_doc->user_id;
                    $employee_documents->doc_id =$emp_doc->doc_id;
                    $employee_documents->doc_url =$emp_doc->doc_url;
                    $employee_documents->status =$emp_doc->status;
                    $employee_documents->save();
                    $emp_doc->delete();
                    $pancard_details->delete();
            }


            $response = [
                'status' => 'success',
                'message' =>"Pancard details updated successfully"
            ];
        }else{
            $response = [
                'status' => 'success',
                'message' =>"Pancard details not Exists for this employee"
            ];
        }
        }catch(\Exception $e){
            $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Pancard Information ',
            'error_message' => $e->getMessage()
            ];
        }

         return response()->json($response);

    }


    public function showPaySlip_HTMLView(Request $request, VmtEmployeePayCheckService $employeePaySlipService)
    {
        return $employeePaySlipService->showPaySlip_HTMLView(Crypt::decryptString($request->enc_user_id), $request->selectedPaySlipMonth);
    }

    public function showPaySlip_PDFView(Request $request, VmtEmployeePayCheckService $employeePaySlipService)
    {
        //return $employeePaySlipService->showPaySlip_PDFView(Crypt::decryptString($request->enc_user_id), $request->selectedPaySlipMonth);
        return $employeePaySlipService->getEmployeePayslipDetailsAsPDF(Crypt::decryptString($request->user_code), $request->year, $request->month);

    }



    public function updateStatutoryInfo(Request $request)
    {
        // dd($request->all());
       try{
        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $statutory = VmtEmployeeStatutoryDetails::where('user_id', $user_id );



       if ($statutory->exists()) {
        // dd($request->all());
            $statutory = $statutory->first();
            $statutory->user_id=  $user_id;
            $statutory->pf_applicable=$request->input('pf_applicable');
            $statutory->epf_number=$request->input('epf_number');
            $statutory->uan_number=$request->input('uan_number');
            $statutory->esic_applicable=$request->input('esic_applicable');
            $statutory->esic_number=$request->input('esic_number');
            //$statutory->epf_abry_eligible= $request->input('epf_abry_eligible');
            //$statutory->eps_pansion_eligible=$request->input('eps_pansion_eligible');
            $statutory->save();
        }
        else
        {
            $statutory = new VmtEmployeeStatutoryDetails;
            $statutory->user_id=  $user_id;
            $statutory->pf_applicable=$request->input('pf_applicable');
            $statutory->epf_number=$request->input('epf_number');
            $statutory->uan_number=$request->input('uan_number');
            $statutory->esic_applicable=$request->input('esic_applicable');
            $statutory->esic_number=$request->input('esic_number');
            //$statutory->epf_abry_eligible =$request->input('epf_abry_eligible');
            //$statutory->eps_pansion_eligible =$request->input('eps_pansion_eligible');
            $statutory->save();
        }

     $response = [
            'status' => 'success',
            'message'=>'statutory details updated successfully'
        ];
    }catch(\Exception $e){
        $response = [
        'status' => 'failure',
        'message' => 'Error while statutory Information ',
        'error_message' => $e->getMessage()
        ];
    }

     return response()->json($response);


    }







    /*
        Req. params :
         File name, Document_type, which document

    */
    public function uploadEmployeeDocument(Request $request){
        //dd($request->file());
        $docName = time().'_'.$request->file->getClientOriginalName();
        $docPath = $request->file('file')->storeAs('employee_documents', $docName);
       // dd('----------'.$docName.'----------------------'. $docPath);
       dd($docPath);
       return $docPath;
    }




    //////////////////////////////////////////////////////////
    // Updated functions via service class

    public function showProfilePage_v3(Request $request){

        // if($request->has('uid'))
        //     if($request->has('sid'))
        //     {
        //         //if SID found, then admin is viewing employee profile
        //         dd("SID : ".$request->sid);
        //         return redirect()->route('profile-page-v3', ['uid' =>$request->uid , 'sid' =>$request->sid]);

        //     }
        //     else
        //     {
        //        // dd("UID : ".$request->uid);

        //         //if no SID, then send current user_id. This means employee is seeing the profile
        //         return redirect()->route('profile-page-v3', ['uid' =>$request->uid]);
        //     }
        // else
        // {
        //     //Then current user id in UID
        //     return redirect()->route('profile-page-v3', ['uid' =>$request->uid]);

        // }

        //if ONLY uid found, show current logged in user
        //if($request->)

        //if uid and sid found, show selected emp user


        //if nothing found, show current logged in user


       // $user_id == Crypt::decrypt($request->uid);
       // return redirect()->route('profile-page-v3', ['uid' =>$request->uid]);

       return view('profilePage_new', compact('user', 'user_full_details', 'reportingManager', 'profileCompletenessValue', 'data', 'employees'));

    }

    public function fetchEmployeeProfilePagesDetails(Request $request, VmtProfilePagesService $serviceVmtProfilePagesService){

        $user_id = null;

        //If empty, then show current user profile page
        if (empty($request->uid)) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = User::find(Crypt::decryptString($request->uid))->id;
            //dd("Enc User details from request : ".$user);
        }

        return $serviceVmtProfilePagesService->getEmployeeProfileDetails($user_id);
    }

    public function getEmployeePrivateDocumentFile(Request $request,VmtProfilePagesService $profilepagesservice){


        $response = $profilepagesservice->getEmployeePrivateDocumentFile($request->user_code, $request->document_name, $request->emp_doc_record_id);
        return $response;

    }
    public function getEmpProfileProofPrivateDoc(Request $request,VmtProfilePagesService $profilepagesservice){


        $response = $profilepagesservice->getEmpProfileProofPrivateDoc($request->emp_doc_record_id);
        return $response;

    }
    public function SingleDocumentProofApproval(Request $request){

        //Validate the request
               $validator = Validator::make(
                   $request->all(),
                   $rules = [
                       'record_id' => 'required',
                       'status' => 'required',
                       'approver_user_id' => 'required',
                   ],
                   $messages = [
                       'required' => 'Field :attribute is missing',
                       'exists' => 'Field :attribute is invalid',
                       //'integer' => 'Field :attribute should be integer',
                   ]
               );

               if ($validator->fails()) {
                   return response()->json([
                               'status' => 'failure',
                               'message' => $validator->errors()->all()
                   ]);
               }

               try
               {
                    $record_id =$request->record_id;
                    $status =$request->status;

                   $query_doc_data = VmtTempEmployeeProofDocuments::find($record_id);
                   $query_doc_data->status = $status;
                   $query_doc_data->save();


                   $message = "";
                   $mail_status = "";

                   $VmtClientMaster = VmtClientMaster::first();
                   $image_view = url('/') . $VmtClientMaster->client_logo;

                   $emp_avatar = json_decode(getEmployeeAvatarOrShortName($request->approver_user_id));
                   $employee_user=VmtTempEmployeeProofDocuments::find($record_id);
                   $DocType = VmtDocuments::where('id', $employee_user->doc_id)->first()->document_name;
                   $employee_mail = VmtEmployeeOfficeDetails::where('user_id', $employee_user->user_id)->first()->officical_mail;
                   $obj_employee = User::where('id', $employee_user->user_id)->first();


                   $isSent    = \Mail::to($employee_mail)->send(
                       new ApproveRejectEmpDetails(
                           $obj_employee->name,
                           $obj_employee->user_code,
                           $DocType,
                           User::find($request->approver_user_id)->name,
                           User::find($request->approver_user_id)->user_code,
                           request()->getSchemeAndHttpHost(),
                           $image_view,
                           $emp_avatar,
                           $status
                       )
                   );

                   if ($isSent) {
                       $mail_status = "success";
                   } else {
                       $mail_status = "failure";
                   }




               return response()->json([
                   "status"=>'success',
                   "message"=>"Document status updated successfully",
                   'mail_status' => $mail_status,
               ]);
               }catch(\Exception $e){
                $response = [
                    'status' => 'failure',
                    'message' => '',
                    'error_message' => $e->getMessage()
                    ];
                    return   $response;
            }
       }


       public function BulkDocumentProofApprovals(Request $request){

           //Validate the request
           $validator = Validator::make(
               $request->all(),
               $rules = [
                   'record_id' => 'required',// Need to check the given ids inside service class.
                   'status' => 'required',
                   'approver_user_id' => 'required',
               ],
               $messages = [
                   'required' => 'Field :attribute is missing',
                   'exists' => 'Field :attribute is invalid',
                   //'integer' => 'Field :attribute should be integer',
               ]
           );

           if ($validator->fails()) {
               return response()->json([
                           'status' => 'failure',
                           'message' => $validator->errors()->all()
               ]);
           }

           try
               {
                    $record_ids =$request->record_id;
                    $status =$request->status;


                   $query_docs = VmtTempEmployeeProofDocuments::whereIn('id',$record_ids)->get();

                   foreach($query_docs as $singleDoc)
                   {
                       $singleDoc->status = $status;
                       $singleDoc->save();


                   $message = "";
                   $mail_status = "";

                   $VmtClientMaster = VmtClientMaster::first();
                   $image_view = url('/') . $VmtClientMaster->client_logo;

                   $emp_avatar = json_decode(getEmployeeAvatarOrShortName($request->approver_user_id));
                   $DocType = VmtDocuments::where('id', $singleDoc->doc_id)->first()->document_name;
                   $employee_mail = VmtEmployeeOfficeDetails::where('user_id', $singleDoc->user_id)->first()->officical_mail;
                   $obj_employee = User::where('id', $singleDoc->user_id)->first();


                   $isSent  = \Mail::to($employee_mail)->send(
                       new ApproveRejectEmpDetails(
                           $obj_employee->name,
                           $obj_employee->user_code,
                           $DocType,
                           User::find($request->approver_user_id)->name,
                           User::find($request->approver_user_id)->user_code,
                           request()->getSchemeAndHttpHost(),
                           $image_view,
                           $emp_avatar,
                           $status
                       )
                   );
                }

                   if ($isSent) {
                       $mail_status = "success";
                   } else {
                       $mail_status = "failure";
                   }


                   return response()->json([
                       "status"=>'success',
                       "message"=>"All documents status updated successfully",
                       'mail_status' => $mail_status,
                   ]);
           }catch(\Exception $e){
            $response = [
                'status' => 'failure',
                'message' => '',
                'error_message' => $e->getMessage()
                ];
            return $response;
       }

       }

}
