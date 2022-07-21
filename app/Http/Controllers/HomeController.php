<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\VmtGeneralSettings;
use App\Models\VmtGeneralInfo;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Bank;
use App\Models\Experience;
use App\Models\VmtEmployeeAttendance;
use App\Mail\TestEmail;
use Session as Ses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Ses::put('lang', $locale);
            Ses::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar =  $avatarName;
        }

        $user->update();
        if ($user) {
            Ses::flash('message', 'User Details Updated successfully!');
            Ses::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Ses::flash('message', 'Something went wrong!');
            Ses::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Ses::flash('message', 'Password updated successfully!');
                Ses::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Ses::flash('message', 'Something went wrong!');
                Ses::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }

    // general Settings
    public function generalSettings(Request $request){
        return view('vmt_appraisalFlow_generalSettings');
    }

    public function updateExperienceInfo(Request $request) {
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $saveId = [];
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
            $exp->emp_id = $reDetails->id;
            $exp->user_id = $request->id;
            $exp->company_name = $companyNameArr[$k];
            $exp->location = $locationArr[$k];
            $exp->job_position = $jobPositionArr[$k];
            $exp->period_from = $periodFromArr[$k];
            $exp->period_to = $periodToArr[$k];
            $exp->save();
            array_push($saveId, $exp->id);
        }
        $details->experience_json = implode(',', $saveId);
        $details->save();
        Ses::flash('message', 'Bank Details Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function updateBankInfo(Request $request) {
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $details->bank_name = $request->input('bank_name');
        $details->bank_ifsc_code = $request->input('bank_ifsc');
        $details->bank_account_number = $request->input('account_no');
        $details->pan_number = $request->input('pan_no');
        $details->save();
        Ses::flash('message', 'Bank Details Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function updtaeFamilyInfo(Request $request) {
        $familyInfo = json_encode(['name'=> $request->input('name'), 'relationship'=> $request->input('relationship'),'dob'=> $request->input('dob'), 'phone'=> $request->input('phone')]);
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $details->family_info_json = $familyInfo;
        $details->save();
        Ses::flash('message', 'Personal Information Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function updtaeEmergencyInfo(Request $request) {
        $contact = json_encode(['primary_name'=> $request->input('primary_name'), 'primary_relationship'=> $request->input('primary_relationship'),'primary_phone1'=> $request->input('primary_phone1'), 'primary_phone2'=> $request->input('primary_phone2'), 'secondary_name'=> $request->input('secondary_name'), 'secondary_relationship'=> $request->input('secondary_relationship'),'secondary_phone1'=> $request->input('secondary_phone1'), 'secondary_phone2'=> $request->input('secondary_phone2')]);
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $details->contact_json = $contact;
        $details->save();
        Ses::flash('message', 'Personal Information Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function updatePersonalInfo(Request $request) {
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $details->marrital_status = $request->input('marital_status');
        $details->mobile_number = $request->input('mobile_number');
        $details->save();
        Ses::flash('message', 'Personal Information Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function storeProfileImage(Request $request) {
        $file = $request->file('profilePic');
        $user = User::find($request->id);
        $user->name = $request->input('name');
        if ($file) { 
            $filename = 'avatar-'.$request->id.'.'. $file->getClientOriginalExtension();
            $destination = public_path('/images');
            $file->move($destination, $filename);
            $user->avatar = $filename;
        }
        $user->save();
        Ses::flash('message', 'User Details Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    // 
    public function storePersonalInfo(Request $request) {
        $file = $request->file('profilePic');
        $user = User::find($request->id);
        $user->name = $request->input('name');
        if ($file) { 
            $filename = 'avatar-'.$request->id.'.'. $file->getClientOriginalExtension();
            $destination = public_path('/images');
            $file->move($destination, $filename);
            $user->avatar = $filename;
        }
        $user->save();
        $report = $request->input('report');
        $code = VmtEmployee::select('emp_no', 'name', 'designation')->join('vmt_employee_office_details', 'emp_id', '=', 'vmt_employee_details.id')->join('users', 'users.id', '=', 'vmt_employee_details.userid')->where('emp_no', $report)->first();
        if ($code) {
            $reDetails = VmtEmployeeOfficeDetails::where('user_id', $request->id)->first();
            $details = VmtEmployeeOfficeDetails::find($reDetails->id);
            $details->l1_manager_name = $code->name;
            $details->l1_manager_code = $code->emp_no;
            $details->l1_manager_designation = $code->designation;
            $details->save();
        }
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $details->dob = $request->input('dob');
        $details->gender = $request->input('gender');
        $details->present_address = $request->input('present_address');
        $details->mobile_number = $request->input('mobile_number');
        $details->save();
        Ses::flash('message', 'User Details Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function storeGeneralSettings(Request $request){
        //dd($request->all());
        $vmtSettings = VmtGeneralSettings::orderBy('id', 'desc')->first();
        if($vmtSettings){

        }else{
            $vmtSettings = new VmtGeneralSettings;
        }
        $vmtSettings->workflow_component  = $request->has('workflow_component')  ?  $request->workflow_component : null ;// => "Option-2"
        $vmtSettings->associate_wise_template  = $request->has('associate_wise_template')  ?  $request->associate_wise_template : null ;// => "on"
        $vmtSettings->kra_competency  = $request->has('kra_competency')  ?  $request->kra_competency : null ;// => "Option-3"
        $vmtSettings->increment_percentage  = $request->has('increment_percentage')  ? $request->increment_percentage : null  ;//=> "Option-3"
        $vmtSettings->report_component  =  $request->has('report_component')  ? $request->report_component : null ;// => "Option-2"
        $vmtSettings->rating_preference  = $request->has('rating_preference')  ? $request->rating_preference : null  ;// => "Option-2"
        $vmtSettings->annual_score_calculation  = $request->has('annual_score_calculation')  ? $request->annual_score_calculation : null  ;// => "Option-3"
        $vmtSettings->show_employee_review_rating  =  $request->has('show_employee_review_rating')  ? $request->show_employee_review_rating : null ; // => "on"
        $vmtSettings->employee_review_components  =  $request->has('employee_review_components')  ? $request->employee_review_components : null ; // => "Option-1"
        $vmtSettings->percentage_components  =  $request->has('percentage_components')  ? $request->percentage_components : null ; // => "Option-2"
        $vmtSettings->percentage_groupwise  = $request->has('percentage_groupwise')  ? $request->percentage_groupwise : null  ; // => "on"
        $vmtSettings->finalscore_calculation_method  =  $request->has('finalscore_calculation_method')  ? $request->finalscore_calculation_method : null ; // => "Option-2"
        $vmtSettings->achievement_based_rating  =  $request->has('achievement_based_rating')  ? $request->achievement_based_rating : null ; // => "on"
        $vmtSettings->show_all_managers_to_employee  =  $request->has('show_all_managers_to_employee')  ? $request->show_all_managers_to_employee : null ; // => "on"
        $vmtSettings->show_rated_managers  =  $request->has('show_rated_managers')  ? $request->show_rated_managers : null ; // => "on"
        $vmtSettings->rating_period_based  =  $request->has('rating_period_based')  ? $request->rating_period_based : null ; // => "na"
        $vmtSettings->rating_component  =  $request->has('rating_component')  ? $request->rating_component : null ; // => "Option-2"
        $vmtSettings->save();
        return "Settings Saved";
    }

    public function vmt_topbar_settings(Request $request){
        return view('vmt_topbar_settings');
    }

    //
    public function storeGeneralInfo(Request $request){

        $vmtGeneralInfo = VmtGeneralInfo::first();
        if($vmtGeneralInfo){

        }else{
            $vmtGeneralInfo  = new VmtGeneralInfo;
            //$vmtGeneralInfo = vmtGeneralInfo::first();
        }
        //$vmtGeneralInfo->short_name  = ;
        if ($request->file('logo')) {
            $avatar = $request->file('logo');
            $avatarName = time() . '-logo.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/generalinfo/');
            $avatar->move($avatarPath, $avatarName);
            $vmtGeneralInfo->logo_img =  '/generalinfo/'.$avatarName;
        }

        if($request->file('background-img')) {
            $avatar = $request->file('background-img');
            $avatarName = time() . '-bg.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/generalinfo/');
            $avatar->move($avatarPath, $avatarName);
            $vmtGeneralInfo->background_img =  '/generalinfo/'.$avatarName;
        }
        $vmtGeneralInfo->short_name  = $request->short_name;
        $vmtGeneralInfo->login_instruction = $request->login_instructions;

        $vmtGeneralInfo->save();
        return "General Info Saved";
    }

    public function updtaeCheckin(Request $request) {
        $checked = $request->input('checkin');
        if ($checked == 'true') {
            $attendance = new VmtEmployeeAttendance;
            $attendance->user_id = auth()->user()->id;
            $attendance->date = date('Y-m-d');
            $attendance->checkin_time = date('Y-m-d H:i:s');
            $attendance->save();
            //Ses::flash('message', 'You have successfully checkedin!');
            //Ses::flash('alert-class', 'alert-success');
            //return 'You have successfully checkedin!';
            return response()->json([
                'message' => 'You have successfully checkedin!',
                'time' => $attendance->checkin_time,
            ]);
        } else {
            $attendance = VmtEmployeeAttendance::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first();
            $attendance->user_id = auth()->user()->id;
            $attendance->date = date('Y-m-d');
            $attendance->checkout_time = date('Y-m-d H:i:s');
            $attendance->save();
            //Ses::flash('message', 'You have successfully checkedout!');
            //Ses::flash('alert-class', 'alert-success');
            return response()->json([
                'message' => 'You have successfully checked out!',
                'time' => $attendance->checkout_time,
            ]);
        }
    }

    // Show Profile info
    public function showProfile(Request $request){
        $user = Auth::user();
        $details = VmtEmployee::join('vmt_employee_office_details', 'emp_id', '=', 'vmt_employee_details.id')->where('userid', $user->id)->first();
        $details['contact_json'] = json_decode($details['contact_json'], true);
        $details['family_info_json'] = json_decode($details['family_info_json'], true);
        if($user->hasrole('Employee')) {
            $employee = VmtEmployee::first();
        } else {
            $employee = null;
        }
        $bank = Bank::all(); 
        $exp = Experience::whereIn('id', explode(',', $details->experience_json))->get(); 
        $code = VmtEmployee::join('users', 'users.id', '=', 'userid')->join('vmt_employee_office_details', 'emp_id', '=', 'vmt_employee_details.id')->where('emp_no', '<>' , $details->emp_no)->get();
        $rep = VmtEmployee::select('emp_no', 'name', 'avatar')->join('vmt_employee_office_details', 'emp_id', '=', 'vmt_employee_details.id')->join('users', 'users.id', '=', 'vmt_employee_details.userid')->where('emp_no', $details->l1_manager_code)->first();
        return view('pages-profile', compact( 'employee', 'user', 'details', 'bank', 'exp', 'code', 'rep'));
    }

    public function showProfilePage(Request $request) {
        $user = Auth::user();
        $details = VmtEmployee::join('vmt_employee_office_details', 'emp_id', '=', 'vmt_employee_details.id')->where('userid', $user->id)->first();
        if($user->hasrole('Employee')) {
            $employee = VmtEmployee::first();
        } else {
            $employee = null;
        }
        $bank = Bank::all(); 
        $exp = Experience::whereIn('id', explode(',', $details->experience_josn))->get();
        $code = VmtEmployee::join('users', 'users.id', '=', 'userid')->where('emp_no', '<>' , $details->emp_no)->get();
        $rep = VmtEmployee::select('l1_manager_code', 'l1_manager_name', 'avatar')->join('vmt_employee_office_details', 'emp_id', '=', 'vmt_employee_details.id')->join('users', 'users.id', '=', 'vmt_employee_details.userid')->where('emp_no', $details->l1_manager_code)->first();
        return view('pages-profile-settings', compact( 'employee', 'user', 'details', 'bank', 'exp', 'code', 'rep'));
    }

    //
    public function testEmail(Request $request){
        //::
        \Mail::to('rahul.sgsits2015@gmail.com')->send(new TestEmail());
    }
}
