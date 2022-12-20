<?php

namespace App\Http\Controllers;

use \Datetime;
use Carbon\Carbon;
use Session as Ses;
use App\Models\User;
use App\Models\Experience;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtEmployeeOfficeDetails;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

 class VmtProfilePagesController extends Controller
{
    public function updateGeneralInfo(Request $request) {
        // dd($request->all());
         $details = VmtEmployee::where('userid', $request->id)->first();
         $details->dob = $request->input('dob');
         $details->gender = $request->input('gender');
         $details->marital_status = $request->input('marital_status');
         $details->doj=$request->input('doj');
         
         $details->save();
         
         return redirect()->back();
     }

     public function updateContactInfo(Request $request){
 
           $user = User::find($request->id);
           $user->email=$request->input('present_email');
           $user->save();

           $employee_office_details=VmtEmployeeOfficeDetails::where('user_id',$request->id)->first();
           $employee_office_details->officical_mail=$request->input('officical_mail');
           $employee_office_details->save();

           $details = VmtEmployee::where('userid', $request->id)->first();
           
           //dd($details);
           if($details->exists())
           {
               $details->mobile_number = $request->input('mobile_number');
               $details->save();
            }
        
              return redirect()->back();
             }

             
        
     public function updateAddressInfo(Request $request){

             $details = VmtEmployee::where('userid', $request->id)->first();
             $details->current_address_line_1 = $request->input('current_address_line_1');
             $details->permanent_address_line_1 = $request->input('permanent_address_line_1');
             $details->save();
           
             return redirect()->back();
             }

    
    public function updateFamilyInfo(Request $request) {
      
        $familyDetails = VmtEmployeeFamilyDetails::where('user_id',$request->id)->delete();

        $count = sizeof($request->input('name'));
        for($i=0 ; $i < $count ; $i++)
        {
            $emp_familydetails = new VmtEmployeeFamilyDetails;

            $emp_familydetails->user_id = $request->id;
            $emp_familydetails->name = $request->input('name')[$i];
            $emp_familydetails->relationship = $request->input('relationship')[$i];
            $emp_familydetails->dob = $request->input('dob')[$i];
            $emp_familydetails->phone_number = $request->input('phone_number')[$i];

            $emp_familydetails->save();
            
        }

        return redirect()->back();
    }

    public function updateExperienceInfo(Request $request) {

        $idArr = $request->input('ids');
        $companyNameArr = $request->input('company_name');
        $locationArr = $request->input('location');
        $jobPositionArr = $request->input('job_position');
        $periodFromArr = $request->input('period_from');
        $periodToArr = $request->input('period_to');
        foreach($request->input('company_name') as $k => $val) {
            if ($idArr[$k] && $idArr[$k] > 0) {
                $exp = Experience::find($idArr[$k]);
            } else {
                $exp = new Experience;
            }
            $exp->user_id = $request->id;
            $exp->company_name = $companyNameArr[$k];
            $exp->location = $locationArr[$k];
            $exp->job_position = $jobPositionArr[$k];
            $exp->period_from = $periodFromArr[$k];
            $exp->period_to = $periodToArr[$k];
            $exp->save();

        }

        Ses::flash('message', 'Bank Details Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }


    
    //
    public function storePersonalInfo(Request $request) {
       // dd($request->all());
        $file = $request->file('profilePic');
        $user = User::find($request->id);
        $user->name = $request->input('name');
        $number = mt_rand(1000000000, 9999999999);
        $user->save();
        $report = $request->input('report');
        $code = VmtEmployee::select('emp_no', 'name', 'designation')->join('vmt_employee_office_details', 'user_id', '=', 'vmt_employee_details.userid')->join('users', 'users.id', '=', 'vmt_employee_details.userid')->where('emp_no', $report)->first();
         
        // $reDetails = VmtEmployee::where('userid', $request->id)->first();
        // $details = VmtEmployee::find($reDetails->id);
        // $details->current_address_line_1 = $request->input('current_address_line_1');
        // $details->permanent_address_line_1 = $request->input('permanent_address_line_1');
        // $details->save();
         
    
         return redirect()->back();
    }

    // Show Profile info
    public function showProfilePage(Request $request){
        $user = Auth::user();
        $user_full_details = User::leftjoin('vmt_employee_details','vmt_employee_details.userid', '=', 'users.id')
                        ->leftjoin('vmt_employee_office_details','vmt_employee_office_details.user_id', '=', 'users.id')
                        ->where('users.id', $user->id)->first();

         
        $familydetails = VmtEmployeeFamilyDetails::where('user_id',$user->id)->get();

        
        $exp = Experience::where('user_id',$user->id)->get();

        $maritalStatus = array('unmarried',
                            'married',
                            'divorced',
                            'widowed',
                            'seperated');

        $genderArray = array("Male", "Female", "Other");

        //dd($maritalStatus);
        if(!empty($user_full_details->l1_manager_code))
            $reportingManager = User::where('user_code',$user_full_details->l1_manager_code)->first();
        else
            $reportingManager = null;

        $allEmployees = User::where('user_code','<>',$user->id)->where('active',1)->get(['user_code','name']);
        $profileCompletenessValue  = calculateProfileCompleteness($user->id);

        return view('pages-profile-new', compact('user','allEmployees', 'maritalStatus','genderArray','user_full_details', 'familydetails', 'exp', 'reportingManager','profileCompletenessValue'));
    }

    
 
    

}

