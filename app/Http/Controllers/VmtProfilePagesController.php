<?php

namespace App\Http\Controllers;

use \Datetime;
use Carbon\Carbon;
use Session as Ses;
use App\Models\User;
use App\Models\Bank;
use App\Models\Experience;
use App\Models\VmtEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtEmployeePaySlip;
use App\Imports\VmtPaySlip;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Encryption\Encrypter;

 class VmtProfilePagesController extends Controller
{

    // Show Profile info
    public function showProfilePage(Request $request){
        //dd($request->all());
        $user = null;

        //If empty, then show current user profile page
        if(empty($request->user_id))
        {
            $user = auth()->user();
        }
        else
        {
            $user = User::find(Crypt::decryptString($request->user_id));
            //dd("Enc User details from request : ".$user);
        }

        $enc_user_id = Crypt::encryptString($user->id);

        //dd($enc_user_id);
        $user_full_details = User::leftjoin('vmt_employee_details','vmt_employee_details.userid', '=', 'users.id')
                        ->leftjoin('vmt_employee_office_details','vmt_employee_office_details.user_id', '=', 'users.id')
                        ->where('users.id', $user->id)->first();


        $familydetails = VmtEmployeeFamilyDetails::where('user_id',$user->id)->get();
        $statutory_info= VmtEmployeeStatutoryDetails ::where('user_id',$user->id)->get();


        $exp = Experience::where('user_id',$user->id)->get();

        $maritalStatus = array('unmarried',
                            'married',
                            'divorced',
                            'widowed',
                            'seperated');

        $genderArray = array("Male", "Female", "Other");
        $bank = Bank::all();

        //dd($maritalStatus);
        if(!empty($user_full_details->l1_manager_code))
            $reportingManager = User::where('user_code',$user_full_details->l1_manager_code)->first();
        else
            $reportingManager = null;

        $allEmployees = User::where('user_code','<>',$user->id)->where('active',1)->get(['user_code','name']);
        $profileCompletenessValue  = calculateProfileCompleteness($user->id);

        //Payslip Tab
        $data =  DB::table('vmt_employee_payslip')
                ->where('vmt_employee_payslip.user_id', $user->id)->orderBy('PAYROLL_MONTH', 'DESC')
                ->get();

        $employees = VmtEmployeePaySlip::select('EMP_NO','EMP_NAME')->get();



        return view('pages-profile-new', compact('user','enc_user_id','allEmployees', 'maritalStatus','genderArray','user_full_details', 'familydetails', 'exp', 'reportingManager','profileCompletenessValue','bank','data','employees','statutory_info'));
    }


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


    public function updateBankInfo(Request $request) {
        $reDetails = VmtEmployee::where('userid', $request->id)->first();
        $details = VmtEmployee::find($reDetails->id);
        $details->bank_id = Bank::where('bank_name',$request->input('bank_name'))->value('id');
        $details->bank_ifsc_code = $request->input('bank_ifsc');
        $details->bank_account_number = $request->input('account_no');
        $details->pan_number = $request->input('pan_no');
        $details->save();
        Ses::flash('message', 'Bank Details Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }


    public function showPaySlip_HTMLView(Request $request){
        //dd($request->all());
        $user = null;

        //If empty, then show current user profile page
        if(empty($request->enc_user_id))
        {
            $user = auth()->user();
        }
        else
        {
            $user = User::find(Crypt::decryptString($request->enc_user_id));
        }

        $data['employee'] = VmtEmployeePaySlip::where([
                         ['user_id','=', $user->id],
                         ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
                         ])->first();

         $data['employee_name'] = $user->name;
         $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',$user->id)->first();
         $data['employee_details'] = VmtEmployee::where('userid',$user->id)->first();
         $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',$user->id)->first();


         //TODO : Need to show client specific payslip template.

         $processed_clientName = strtolower(str_replace(' ', '', sessionGetSelectedClientName()));

         //$html =  view('vmt_payslipTemplate', $data);
         $html =  view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);

         return $html;
    }

    public function showPaySlip_PDFView(Request $request)
    {
        if($request->emp_code != auth()->user()->user_code)
           // dd("Payslip View : You are not authorized to access this resource");

        $month = $request->selectedPaySlipMonth;
        $data['employee'] = VmtEmployeePaySlip::where([
            ['user_id','=', auth()->user()->id],
            ['PAYROLL_MONTH','=', $request->selectedPaySlipMonth],
            ])->first();

        // $data['employee_name'] = auth()->user()->name;
        // $data['designation'] = VmtEmployeeOfficeDetails::where('user_id',auth()->user()->id)->value('designation');
        // $data['employee_details'] = VmtEmployee::where('userid',auth()->user()->id)->first();

        $data['employee_name'] = auth()->user()->name;
        $data['employee_office_details'] = VmtEmployeeOfficeDetails::where('user_id',auth()->user()->id)->first();
        $data['employee_details'] = VmtEmployee::where('userid',auth()->user()->id)->first();
        $data['employee_statutory_details'] = VmtEmployeeStatutoryDetails::where('user_id',auth()->user()->id)->first();

        $processed_clientName = strtolower(str_replace(' ', '', sessionGetSelectedClientName()));
        $view = view('vmt_payslip_templates.template_payslip_'.$processed_clientName, $data);

       // $view = view('vmt_payslipTemplate', $data);

        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->download(auth()->user()->id."_".$month."_Payslip.pdf");
        //   return  PDF::loadView('vmt_payslipTemplate', $data)->download($month.'Payslip.pdf');

    }



    public function updateStatutoryInfo(Request $request){
       // dd($request->all());

        $statutory= VmtEmployeeStatutoryDetails ::where('user_id',$request->id);

       // dd($statutory->exists());

        if($statutory->exists())
        {
            $statutory = $statutory->first();
            $statutory->pf_applicable=$request->input('pf_applicable');
            $statutory->epf_number=$request->input('epf_number');
            $statutory->uan_number=$request->input('uan_number');
            $statutory->esic_applicable=$request->input('esic_applicable');
            $statutory->esic_number=$request->input('esic_number');
            $statutory->save();
        }
        else
        {
            $statutory = new VmtEmployeeStatutoryDetails;
            $statutory->pf_applicable=$request->input('pf_applicable');
            $statutory->epf_number=$request->input('epf_number');
            $statutory->uan_number=$request->input('uan_number');
            $statutory->esic_applicable=$request->input('esic_applicable');
            $statutory->esic_number=$request->input('esic_number');
            $statutory->save();
        }

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






}

