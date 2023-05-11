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
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeePaySlip;
use App\Services\VmtEmployeePayCheckService;
use App\Services\VmtProfilePagesService;
use App\Services\VmtEmployeeService;
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

    public function updateGeneralInfo(Request $request) {

    try{
         $user_id = user::where('user_code', $request->user_code)->first()->id;
         $details = VmtEmployee::where('userid', $user_id )->first();
         $details->dob = $request->input('dob');
         $details->gender = $request->input(['gender']);
         $details->marital_status_id = $request->input(['marital_status_id']);
         $details->doj=$request->input('doj');
         $details->blood_group_id = $request->input(['blood_group_id']);
         $details->physically_challenged = $request->input(['physically_challenged']);

        $details->save();

         $response = [
            'status' => 'success',
            'message' =>"General details updated successfully"
         ];
    }catch(\Exception $e){
         $response = [
            'status' => 'failure',
            'message' => 'Error while updateing General Information ',
            'error_message' => $e->getMessage()
         ];
    }
         return response()->json($response);

    }

    public function updateContactInfo(Request $request)
    {
        //dd($request->all());
    try{
        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $user = User::find($user_id);

        $user->email = $request->input('email');
        $user->save();

        $employee_office_details = VmtEmployeeOfficeDetails::where('user_id', $user_id )->first();
        $employee_office_details->officical_mail = $request->input('officical_mail');
        $employee_office_details->official_mobile = $request->input('official_mobile_number');
        $employee_office_details->save();

        $details = VmtEmployee::where('userid', $user_id )->first();

       // dd($details);

        if ($details->exists()) {
            $details->mobile_number = $request->input('mobile_number');
            $details->save();
        }

         $response = [
            'status' => 'success',
            'message' =>"Contact details updated successfully"
         ];
    }catch(\Exception $e){
         $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Contact Information ',
            'error_message' => $e->getMessage()
         ];
    }

         return response()->json($response);

    }


    public function updateAddressInfo(Request $request)
    {
        //  dd($request->all());
    try{
        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $details = VmtEmployee::where('userid', $user_id)->first();
        $details->current_address_line_1 = $request->input('current_address_line_1');
        $details->permanent_address_line_1 = $request->input('permanent_address_line_1');
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
        // dd($request->all());
        $user_id = user::where('user_code', $request->user_code)->first()->id;
        $emp_familydetails = new VmtEmployeeFamilyDetails;
        $emp_familydetails->user_id = $user_id;
        $emp_familydetails->name = $request->input('name');
        $emp_familydetails->relationship = $request->input('relationship');
        $emp_familydetails->dob = $request->input('dob');
        $emp_familydetails->phone_number = $request->input('phone_number');
        $emp_familydetails->save();

        $familyDetails = VmtEmployeeFamilyDetails::where('id',$request->current_table_id )->delete();
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
        //  dd($request->all());
        $user_id = user::where('user_code', $request->user_code)->first()->id;
            $exp = new Experience;
            $exp->user_id = $user_id;
            $exp->company_name = $request->input('company_name');
            $exp->location = $request->input('experience_location');
            $exp->job_position = $request->input('job_position');
            $exp->period_from = $request->input('period_from');
            $exp->period_to = $request->input('period_to');
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
    {// dd($request->all());
        try{
            $user_id = user::where('user_code', $request->user_code)->first()->id;
                $exp = Experience::where('id',$request->exp_current_table_id)->first();;
                $exp->user_id = $user_id;
                $exp->company_name = $request->input('company_name');
                $exp->location = $request->input('experience_location');
                $exp->job_position = $request->input('job_position');
                $exp->period_from = $request->input('period_from');
                $exp->period_to = $request->input('period_to');
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
        $familyDetails = Experience::where('id',$request->exp_current_table_id)->delete();
        $response = [
            'status' => 'success',
            'message' =>"Experiance details deleted successfully"
          ];
    }catch(\Exception $e){
         $response = [
            'status' => 'failure',
            'message' => 'Error while updateing Experience Information ',
            'error_message' => $e->getMessage()
         ];
    }
        return response()->json($response);

    }


    public function updateBankInfo(Request $request ,VmtEmployeeService $employeeService)
    {
      
        try{
            $user_id = user::where('user_code', $request->user_code)->first()->id;
            $details = VmtEmployee::where('userid', $user_id)->first();
            $details->bank_id = $request->input('bank_id');
            $details->bank_ifsc_code = $request->input('bank_ifsc');
            $details->bank_account_number = $request->input('account_no');
            $details->pan_number = $request->input('pan_no');
            $details->save();
            $emp_file =$employeeService->uploadDocument($user_id, $request->PassBook,$onboard_document_type='Check' );
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


}
