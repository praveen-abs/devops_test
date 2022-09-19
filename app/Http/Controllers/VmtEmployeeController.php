<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployeeHierarchy;
use App\Models\VmtEmployee;
use App\Models\Countries;
use App\Models\State;
use App\Models\Department;
use App\Models\Bank;
use App\Imports\VmtEmployeeManagerImport;
use Illuminate\Support\Facades\Auth;
use App\Imports\VmtEmployeeImport;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtClientMaster;
use App\Models\VmtMasterConfig;
use App\Models\VmtGeneralInfo;
use App\Models\Compensatory;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use App\Mail\QuickOnboardLink;
use Validator;
use PhpOffice\PhpSpreadsheet\Shared;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

class VmtEmployeeController extends Controller
{

    public function showEmployeeOnboardingPage(Request $request) {
        // Used for Quick onboarding
        //dd($request->email);
        if($request->has('email')){

            $employee  =  User::where('email', $request->email)->first();
            $clientData  = VmtEmployee::where('userid', $employee->id)->first();
            // dd($clientData);
            $empNo = '';
            if ($clientData) {
                $empNo = $clientData->emp_no;
            }
            $countries = Countries::all();
            $compensatory = Compensatory::where('user_id', $employee->id)->first();
            $india = Countries::where('country_code', 'IN')->first();
            $emp = VmtEmployeeOfficeDetails::all();
            $emp_details = VmtEmployeeOfficeDetails::where('emp_id', $clientData->id)->first();
            //  dd($clientData);
            $department = Department::all();
            $bank = Bank::all();
            $allEmployeesCode = User::where('is_admin',0)->where('active',1)->whereNotNull('user_code')->get(['user_code','name']);

            return view('vmt_employeeOnboarding', compact('empNo','emp_details','employee','clientData', 'countries', 'compensatory', 'bank', 'emp','department','allEmployeesCode'));
        }else{
            $clientData  = VmtClientMaster::first();
            $employee  =  User::orderBy('created_at','DESC')->where('user_code', 'LIKE', '%'.$clientData->client_code.'%')->first();
            if(empty($employee))
            {
               $client_code_series = VmtMasterConfig::where('config_name','=','client_code_series')->first()->value('config_value');
                $maxId = (int)($client_code_series) + 1;
            }else{
                $ucode =(int) filter_var($employee->user_code, FILTER_SANITIZE_NUMBER_INT);
                $maxId  = $ucode+1;
            }
            if ($clientData) {
                $empNo = $clientData->client_code.$maxId;
            } else {
                $empNo = $maxId;
            }
        $countries = Countries::all();
        $india = Countries::where('country_code', 'IN')->first();
        $emp = VmtEmployeeOfficeDetails::all();
        $bank = Bank::all();
        $department = Department::all();
        $allEmployeesCode = User::where('is_admin',0)->where('active',1)->whereNotNull('user_code')->get(['user_code','name']);
        //dd($allEmployeesCode);
        return view('vmt_employeeOnboarding', compact('empNo', 'countries','clientData', 'employee','india', 'emp', 'bank', 'department','allEmployeesCode'));

    }
    }
     // Show quick onboard form to employee
    public function showQuickOnboardForEmployee(Request $request){
        if($request->has('email')){
           $employee  =  User::where('email', $request->email)->first();
            $clientData  = VmtEmployee::where('userid', $employee->id)->first();
            $empNo = '';
            if ($clientData) {
                $empNo = $clientData->emp_no;
            }
            $countries = Countries::all();
            $compensatory = Compensatory::where('user_id', $employee->id)->first();
            $india = Countries::where('country_code', 'IN')->first();
            $emp = VmtEmployeeOfficeDetails::all();
            $emp_details = VmtEmployeeOfficeDetails::where('emp_id', $clientData->id)->first();
             // dd($emp);
            $department = Department::all();
            $bank = Bank::all();

            return view('vmt_employeeOnboarding_QuickUpload', compact('empNo','emp_details', 'countries', 'compensatory', 'bank', 'emp','department'));
        }
    }

    public function getState(Request $request) {
        $state = State::where('country_code', $request->code)->get();
        return response()->json($state);
    }

    public function showKpiData(Request $request) {
        $goals = VmtEmployeePMSGoals::where('employee_id', $request->id)->Join('vmt_kpi_table', 'vmt_kpi_table.id', '=', 'vmt_employee_pms_goals_table.kpi_table_id')->first();
        $kpi = VmtAppraisalQuestion::whereIn('id', explode(',', $goals->kpi_rows))->get();
        $data['kpi'] = $kpi;
        $data['goals'] = $goals;
        $data['rev'] = [];
        $data['emp'] = [];
        if ($goals) {
            $data['rev'] = User::where('id', explode(',',$goals->reviewer_id))->first();
            $data['emp'] = VmtEmployee::where('id', explode(',',$goals->employee_id))->first();
        }
        $data['goal'] = json_decode($goals->assignment_period, true);
        return response()->json($data);
    }

    public function updateUserAccountStatus(Request $request) {
        $user = User::find($request->id);
        $user->active = $request->input('status');
        $user->save();
        return 'User Account Status : '.$request->input('status');
    }

    //
    public function showEmployeeDirectory(Request $request){
        $vmtEmployees = VmtEmployee::join('users', 'users.id', '=', 'vmt_employee_details.userid')
                            ->leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id', '=', 'users.id' )
                            ->select(
                                'vmt_employee_details.*',
                                'users.name as emp_name',
                                'users.active as emp_status',
                                'users.email as email_id',
                                'users.id as user_id',
                                'users.avatar as avatar',
                                'vmt_employee_office_details.department_id',
                                'vmt_employee_office_details.designation',
                                'vmt_employee_office_details.l1_manager_code',
                                'vmt_employee_office_details.l1_manager_name',
                                'vmt_employee_office_details.l1_manager_designation'
                            )
                            ->orderBy('created_at', 'DESC')
                            ->where('users.active','1')
                            ->where('users.is_admin','0')
                            ->whereNotNull('emp_no')
                            ->get();

        $vmtEmployees_InActive = VmtEmployee::join('users', 'users.id', '=', 'vmt_employee_details.userid')
        ->leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id', '=', 'users.id' )
        ->select(
            'vmt_employee_details.*',
            'users.name as emp_name',
            'users.active as emp_status',
            'users.email as email_id',
            'users.id as user_id',
            'users.avatar as avatar',
            'vmt_employee_office_details.department_id',
            'vmt_employee_office_details.designation',
            'vmt_employee_office_details.l1_manager_code',
            'vmt_employee_office_details.l1_manager_name',
            'vmt_employee_office_details.l1_manager_designation'
        )
        ->orderBy('created_at', 'DESC')
        ->where('users.active','0')
        ->where('users.is_admin','0')
        ->whereNotNull('emp_no')
        ->get();

        return view('vmt_employeeDirectory', compact('vmtEmployees','vmtEmployees_InActive'));
    }


    //
    public function create(){
        $users  = User::all();
        $edit   = true;
        return view('vmt_create_modify_employee_hierarchy', compact('users', 'edit'));
    }

    public function edit(){
        $users  = User::all();
        $edit   = true;
        return view('vmt_create_modify_employee_hierarchy', compact('users', 'edit'));
    }

    public function viewHierarchy($id){
        $selfData        =   User::select('id', 'name')->where('id', $id)->first();
        $userHierarchy   =   VmtEmployeeHierarchy::where('user_id', $id)->get();
        if($userHierarchy->count() > 0){
            $childIds    =   $userHierarchy->pluck('child_nodes');
            $parentIds   =   $userHierarchy->pluck('parent_id');

            if($parentIds[0] != null){
               $parentData =   User::select('id', 'name')->where('id', $parentIds[0])->first();
            }

            $childArray  = [];
            $childData   =   User::select('id', 'name')->whereIn('id', $childIds)->get();

            foreach ($childData as $key => $value) {
                $childArray[] = array( "text" => array( "name" => $value->name ), "_json_id" => $value->id);
            }

            if(isset($parentData)){
                $reponseArray   =  array(
                    "text"      => array( "name" => $parentData->name ),"_json_id" => $parentData->id,
                    "children"  => array(
                        array(
                            "text"      => array("name" => $selfData->name),
                            "_json_id"  => $selfData->id, "children" => $childArray,
                        )
                    )
                );
                return $reponseArray;
            }else{
                return array(
                    "text"     => array( "name" => $selfData->name ),
                    "_json_id" => $selfData->id,
                    "children" => $childArray
                );
            }
            return array('child' => $childIds, 'parent' => $parentIds, "self_id" => $id);
        }else{
            return array(
                "text"     => array( "name" => $selfData->name ),
                "_json_id" => $selfData->id,
                "children" => []
            );
        }
    }

    //
    public function store(Request $request){
        $prevChilds = VmtEmployeeHierarchy::where('user_id', $request->parent)->get();
        foreach ($prevChilds as $key => $value) {
            $value->delete();
        }

        $parentNode  = VmtEmployeeHierarchy::where('child_nodes', $request->parent)->first();
        //dd($parentNode);
        if($parentNode){
            $parentId  = $parentNode->user_id;
        }else{
            $parentId  = null;
        }
        if($request->has('childs')){
            $childrenList   = $request->childs;
            $totalChild     = count($childrenList);
            if($totalChild > 0){
                foreach ($childrenList as $key => $childVal) {
                    // code...
                    $newHierarchy              = new VmtEmployeeHierarchy;
                    $newHierarchy->user_id     = $request->parent;
                    $newHierarchy->child_nodes = $childVal;
                    $newHierarchy->child_count = $totalChild;
                    $newHierarchy->parent_id    = $parentId;
                    $newHierarchy->save();
                }
            }
            return "Saved";
        }else{
            return "Please select node";
        }

    }




    /*
        Save employee onboarding details
        -Normal Onboarding, Quick


    */
    public function employeeOnboard(Request $request)
    {
        // code...
        try
        {
            $row = $request->all();

            $user =  User::create([
                'name' => $row['employee_name'],
                'email' => $row["email"],
                'password' => Hash::make('Abs@123123'),
                'avatar' =>  $row['employee_name'].'_avatar.jpg',
                'user_code' =>  $row['employee_code'],
                'active' => '0',
                'is_onboarded' => '1',
                'onboard_type' => 'normal',
                'is_admin' => '0'
            ]);
            $user->assignRole("Employee");

            $newEmployee = new VmtEmployee;
            $newEmployee->userid = $user->id;
            $newEmployee->emp_no   =    $row["employee_code"];
            //$newEmployee->emp_name   =    $row["employee_name"];
            $newEmployee->gender   =    $row["gender"];
            //$newEmployee->designation   =    $row["designation"];
            //$newEmployee->department   =    $row["department"];
            //$newEmployee->status   =    $row["status"];
            $newEmployee->doj   =    $row["doj"];
            $newEmployee->dol   =    $row["doj"];
            $newEmployee->location   =    $row["work_location"];
            $newEmployee->dob   =    $row["dob"];
            $newEmployee->father_name   =  $row["father_name"];
            $newEmployee->pan_number   =  isset( $row["pan_no"] ) ? ($row["pan_no"]) : "";
            $newEmployee->pan_ack   =    $row["pan_ack"];
            $newEmployee->aadhar_number = $row["aadhar"];
            $newEmployee->epf_number = $row["epf_number"];

            $newEmployee->esic_number = $row["esic_number"];
            $newEmployee->marrital_status = $row["marital_status"];

            $newEmployee->mobile_number  = $row["mobile_no"];
            $newEmployee->blood_group  = $row["blood_group"];
            //$newEmployee->email_id   = $row["email"];
            $newEmployee->bank_name   = $row["bank_name"];
            $newEmployee->bank_ifsc_code  = $row["bank_ifsc"];
            $newEmployee->bank_account_number  = $row["account_no"];
            $newEmployee->present_address   = $row["current_address"];
            $newEmployee->permanent_address   = $row["permanent_address"];
            //$newEmployee->father_age   = $row["father_age"];
            $newEmployee->mother_name   = $row["mother_name"];
            //$newEmployee->mother_age  = $row["mother_age"];
            if ($row['marital_status'] <> 'unmarried') {
                $newEmployee->spouse_name   = $row["spouse_name"];
                $newEmployee->spouse_age   = $row["spouse_dob"];
                if ($row['no_child'] > 0) {
                    $newEmployee->kid_name   = json_encode($row["child_name"]);
                    $newEmployee->kid_age  = json_encode($row["child_dob"]);
                }
            }

            $newEmployee->aadhar_card_file = $this->fileUpload('aadhar_card');
            $newEmployee->aadhar_card_backend_file = $this->fileUpload('aadhar_card_backend');
            $newEmployee->pan_card_file = $this->fileUpload('pan_card');
            $newEmployee->passport_file = $this->fileUpload('passport');
            $newEmployee->voters_id_file = $this->fileUpload('voters_id');
            $newEmployee->dl_file = $this->fileUpload('dl_file');
            $newEmployee->education_certificate_file = $this->fileUpload('education_certificate');
            $newEmployee->reliving_letter_file = $this->fileUpload('reliving_letter');

            $newEmployee->save();

            if($newEmployee){

                //Statutory Details
                $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
                $newEmployee_statutoryDetails->user_id = $user->id;
                $newEmployee_statutoryDetails->uan_number = $row["uan_number"];
                $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"];
                $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"];
                $newEmployee_statutoryDetails->ptax_location = $row["ptax_location"];
                $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"];
                $newEmployee_statutoryDetails->lwf_location = $row["lwf_location"];
                $newEmployee_statutoryDetails->save();

                //Create Employee Details
                $empOffice  = new VmtEmployeeOfficeDetails;
                $empOffice->emp_id = $newEmployee->id; // Need to remove this in future
                $empOffice->user_id = $newEmployee->userid; //Link between USERS and VmtEmployeeOfficeDetails table
                $empOffice->department_id = $row["department"];// => "lk"
                $empOffice->process = $row["process"];// => "k"
                $empOffice->designation = $row["designation"];// => "k"
                $empOffice->cost_center = $row["cost_center"];// => "k"
                $empOffice->confirmation_period  = $row['confirmation_period'];// => "k"
                $empOffice->holiday_location  = $row["holiday_location"];// => "k"
                $empOffice->l1_manager_code  = $row["l1_manager_code"];// => "k"
                // $empOffice->l1_manager_designation  = $row["l1_manager_designation"];// => "k"
                $empOffice->l1_manager_name  = $row["l1_manager_name"];// => "k"
                // $empOffice->l2_manager_code  = $row["l2_manager_code"];// => "kk"
                // $empOffice->l2_manager_designation  = $row["l2_manager_designation"];// => "k"
                // $empOffice->l2_manager_name  = $row["l2_manager_name"]; // => "k"
                // $empOffice->l3_manager_code  = $row["l3_manager_code"]; // => "kk"
                // $empOffice->l3_manager_designation  = $row["l3_manager_designation"]; // => "k"
                // $empOffice->l3_manager_name  = $row["l3_manager_name"]; // => "kk"
                // $empOffice->l4_manager_code  = $row["l4_manager_code"]; // => "kk"
                // $empOffice->l4_manager_designation  = $row["l4_manager_designation"]; // => "kk"
                // $empOffice->l4_manager_name  = $row["l4_manager_name"]; // => "kk"
                $empOffice->work_location  = $row["work_location"]; // => "k"
                $empOffice->officical_mail  = $row["officical_mail"]; // => "k@k.in"
                $empOffice->official_mobile  = $row["official_mobile"]; // => "1234567890"
                $empOffice->emp_notice  = $row["emp_notice"]; // => "0"
                $empOffice->save();
            }

            if ($empOffice) {
                $compensatory = new Compensatory;
                $compensatory->user_id = $newEmployee->userid;
                $compensatory->basic = $row["basic"];
                $compensatory->hra = $row["hra"];
                $compensatory->Statutory_bonus = $row["statutory_bonus"];
                $compensatory->child_education_allowance = $row["child_education_allowance"];
                $compensatory->food_coupon = $row["food_coupon"];
                $compensatory->lta = $row["lta"];
                $compensatory->special_allowance = $row["special_allowance"];
                $compensatory->other_allowance = $row["other_allowance"];
                $compensatory->gross = $row["gross"];
                $compensatory->epf_employer_contribution = $row["epf_employer_contribution"];
                $compensatory->esic_employer_contribution = $row["esic_employer_contribution"];
                $compensatory->insurance = $row["insurance"];
                $compensatory->graduity = $row["graduity"];
                $compensatory->cic = $row["cic"];
                $compensatory->epf_employee = $row["epf_employee"];
                $compensatory->esic_employee = $row["esic_employee"];
                $compensatory->professional_tax = $row["professional_tax"];
                $compensatory->labour_welfare_fund = $row["labour_welfare_fund"];
                $compensatory->net_income = $row["net_income"];
                $compensatory->save();
            }

            // sent welcome email along with appointment Letter
            $isEmailSent  = $this->attachApoinmentPdf($row);


            if ($isEmailSent) {
                return "Saved";
            } else {
                return "Error";
            }
        }
        catch (Throwable $e) {
            return "Error";
        }
    }

    //
    public function getChildrenList($id)
    {
        // code...
        return VmtEmployeeHierarchy::where('user_id', $id)->get();
    }


    // show bulk upload form
    public function bulkUploadEmployee(Request $request){
        return view('vmt_employeeOnboarding_BulkUpload');
    }

    // store employeess from excel sheet to database
    public function storeBulkEmployee(Request $request){

        $validator =    Validator::make(
                            $request->all(),
                            ['file' => 'required|file|mimes:xls,xlsx'],
                            ['required' => 'The :attribute is required.']
                        );

        if($validator->passes()){
            $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));
            $data = $this->uploadEmployee($importDataArry);
            return response()->json($data);
        }else{
            $data['failed'] = $validator->errors()->all();
            return response()->json($data);
        }
        // linking Manager To the employees;
        // $linkToManager  = \Excel::import(new VmtEmployeeManagerImport, request()->file('file'));
    }

    /*
        For bulk upload employees
    */
    public function uploadEmployee($data) {

        $rules = [];
        $empNo=0;
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

       // $excelRowdata = $data[0][0];
        $excelRowdata_row = $data;
        foreach($excelRowdata_row[0]  as $key => $excelRowdata){

        //Validation
        $rules = [
            'employee_code' => 'nullable|unique:users,user_code',
            'employee_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:male,female,other',
            'doj' => 'required|dateformat:d-m-Y',
            'work_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'dob' => 'required|dateformat:d-m-Y|before:-18 years',
            'father_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'father_gender' => 'required|in:male,female,other',
            'father_dob' => 'required|date',

            'pan_no' => 'required|regex:/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u',
            'pan_ack' => 'required_if:pan_no,==,""',
            'aadhar' => 'required|regex:/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u',
            'marital_status' => 'required|in:unmarried,married,widowed,separated,divorced',
            'mobile_no' => 'required|regex:/^([0-9]{10})?$/u|numeric',
            'bank_name' => 'required',
            'bank_ifsc' => 'required|regex:/(^([A-Z]){4}0([A-Z0-9]){6}?$)/u',
            'account_no' => 'required',
            'current_address' => 'required',
            'permanent_address' => 'required',
            'mother_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'mother_gender' => 'required|in:male,female,other',
            'mother_dob' => 'required|dateformat:d-m-Y',
            'spouse_name' => 'nullable|required_unless:marital_status,unmarried|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'spouse_dob' => 'nullable|required_unless:marital_status,unmarried|dateformat:d-m-Y',
            'no_of_child' => 'nullable|numeric',
            'child_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'child_dob' => 'nullable|date_format:d-m-Y',
            'department' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'process' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'designation' => 'required',
            'cost_center' => 'required',
            'confirmation_period' => 'required',
            'holiday_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'l1_manager_code' => 'required|regex:/(^([a-zA-z0-9.]+)(\d+)?$)/u',
            'l1_manager_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'work_location' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
            'official_mail' => 'required|email',
            'official_mobile' => 'nullable|regex:/^([0-9]{10})?$/u|numeric',
            'emp_notice' => 'required|numeric',
            'basic' => 'required|numeric',
            'hra' => 'required|numeric',
            'statutory_bonus' => 'required|numeric',
            'child_education_allowance' => 'required|numeric',
            'food_coupon' => 'required|numeric',
            'lta' => 'required|numeric',
            'special_allowance' => 'required|numeric',
            'other_allowance' => 'required|numeric',
            'epf_employer_contribution' => 'required|numeric',
            'insurance' => 'required|numeric',
            'graduity' => 'required|numeric',
            'epf_employee' => 'required|numeric',
            'esic_employee' => 'required|numeric',
            'professional_tax' => 'required|numeric',
            'labour_welfare_fund' => 'required|numeric',
            'uan_number' => 'required|numeric',
            'pf_applicable' => 'required|in:yes,Yes,no,No',
            'esic_applicable' => 'required|in:yes,Yes,no,No',
            'ptax_location' =>'required',
            'tax_regime' =>'required',
            'lwf_location' =>'required',
            'esic_employer_contribution' =>'required|numeric',

        ];

        $messages = [
            'dateformat' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
            'in' => 'Field <b>:attribute</b> should have the following values : :values .',
            'required' => 'Field <b>:attribute</b> is required',
            'regex' => 'Field <b>:attribute</b> is invalid',
            'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
            'unique' => 'Field <b>:attribute</b> should be unique',
        ];

        $validator = Validator::make($excelRowdata, $rules, $messages);

        if (!$validator->passes()) {
           // $returnfailedMsg .= $empNo." not get added because of error ".json_encode($validator->errors()->all())." <br/>";

            $responseJSON['status'] = 'failure';
            $responseJSON['message'] = $empNo." not get added because of error ";
            $responseJSON['data'] = json_encode($validator->errors());

        }
        else
        {
            //DB level validation


                $validated = $validator->validated();


                $row=$validated;

                if(isset($row['employee_code']))
                {
                    $empNo = $row['employee_code'];
                }
                else
                {
                    $clientData  = VmtClientMaster::first();
                    $maxId  = VmtEmployee::max('id')+1;
                    if ($clientData) {
                        $empNo = $clientData->client_code.$maxId;
                    } else {
                        $empNo = $maxId;
                    }
                }


                try {
                    $user =  User::create([
                        'name' => $row['employee_name'],
                        'email' => $row["email"],
                        'password' => Hash::make('Abs@123123'),
                        'avatar' =>  $row['employee_name'].'_avatar.jpg',
                        'user_code' =>  $empNo,
                        'active' => '0',
                        'is_onboarded' => '1',
                        'onboard_type' => 'bulk',
                        'is_default_password_updated' => '0',


                    ]);
                    $user->save();
                    $user->assignRole("Employee");
                    // var_dump($row['dob']);
                    //  dd($row['dob'];
                    $newEmployee = new VmtEmployee;
                    $newEmployee->userid = $user->id;
                    $newEmployee->emp_no   =    $empNo;
                    $newEmployee->gender   =    $row["gender"];
                    $newEmployee->doj   =  $row['doj'];
                    $newEmployee->dol   =   $row['doj'];
                    $newEmployee->location   =    $row["work_location"];
                    $newEmployee->dob   =   $row['dob'];
                    $newEmployee->father_name   =  $row["father_name"];
                    $newEmployee->father_gender   =  $row["father_gender"];
                    $newEmployee->father_dob   =  $row['father_dob'];

                    $newEmployee->pan_number   =  isset( $row["pan_no"] ) ? ($row["pan_no"]) : "";
                    $newEmployee->pan_ack   =    $row["pan_ack"];
                    $newEmployee->aadhar_number = $row["aadhar"];
                    $newEmployee->marrital_status = $row["marital_status"];
                    $newEmployee->mobile_number  = $row["mobile_no"];
                    $newEmployee->bank_name   = $row["bank_name"];
                    $newEmployee->bank_ifsc_code  = $row["bank_ifsc"];
                    $newEmployee->bank_account_number  = $row["account_no"];
                    $newEmployee->present_address   = $row["current_address"];
                    $newEmployee->permanent_address   = $row["permanent_address"];
                    $newEmployee->mother_name   = $row["mother_name"];
                    $newEmployee->mother_gender   = $row["mother_gender"];
                    $newEmployee->mother_dob   = $row["mother_dob"];
                    if ($row['marital_status'] <> 'unmarried') {
                        $newEmployee->spouse_name   = $row["spouse_name"];
                        $newEmployee->spouse_age   = $row["spouse_dob"];
                        if ($row['no_of_child'] > 0) {
                            $newEmployee->kid_name   = json_encode($row["child_name"]);
                            $newEmployee->kid_age  = json_encode($row["child_dob"]);
                        }
                    }
                    $newEmployee->save();

                    if($newEmployee){
                        $empOffice  = new VmtEmployeeOfficeDetails;
                        $empOffice->emp_id = $newEmployee->id;
                        $empOffice->user_id = $newEmployee->userid;
                        $empOffice->department_id = $row["department"];
                        $empOffice->process = $row["process"];
                        $empOffice->designation = $row["designation"];
                        $empOffice->cost_center = $row["cost_center"];
                        $empOffice->confirmation_period  = $row['confirmation_period'];
                        $empOffice->holiday_location  = $row["holiday_location"];

                        if($this->isUserExist( $row["l1_manager_code"]))
                            $empOffice->l1_manager_code  = $row["l1_manager_code"];

                        // $empOffice->l1_manager_name  = $row["l1_manager_name"];
                        $empOffice->work_location  = $row["work_location"];
                        $empOffice->officical_mail  = $row["official_mail"];
                        $empOffice->official_mobile  = $row["official_mobile"];
                        $empOffice->emp_notice  = $row["emp_notice"];
                        $empOffice->save();
                    }

                    if ($empOffice) {

                        //Statutory Details
                        $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
                        $newEmployee_statutoryDetails->user_id = $user->id;
                        $newEmployee_statutoryDetails->uan_number = $row["uan_number"];
                        $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"];
                        $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"];
                        $newEmployee_statutoryDetails->ptax_location = $row["ptax_location"];
                        $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"];
                        $newEmployee_statutoryDetails->lwf_location = $row["lwf_location"];
                        $newEmployee_statutoryDetails->save();

                        $compensatory = new Compensatory;
                        $compensatory->user_id = $newEmployee->userid;
                        $compensatory->basic = $row["basic"];
                        $compensatory->hra = $row["hra"];
                        $compensatory->Statutory_bonus = $row["statutory_bonus"];
                        $compensatory->child_education_allowance = $row["child_education_allowance"];
                        $compensatory->food_coupon = $row["food_coupon"];
                        $compensatory->lta = $row["lta"];
                        $compensatory->special_allowance = $row["special_allowance"];
                        $compensatory->other_allowance = $row["other_allowance"];
                        $compensatory->gross = $row["basic"] + $row["hra"] + $row["statutory_bonus"] + $row["child_education_allowance"] + $row["food_coupon"] + $row["lta"] + $row["special_allowance"] + $row["other_allowance"];
                        $compensatory->epf_employer_contribution = $row["epf_employer_contribution"];
                        $compensatory->esic_employer_contribution = $row["esic_employer_contribution"];
                        $compensatory->insurance = $row["insurance"];
                        $compensatory->graduity = $row["graduity"];
                        $compensatory->cic = $compensatory->gross + $row["epf_employer_contribution"] + $row["esic_employer_contribution"] + $row["insurance"] + $row["graduity"];
                        $compensatory->epf_employee = $row["epf_employee"];
                        $compensatory->esic_employee = $row["esic_employee"];
                        $compensatory->professional_tax = $row["professional_tax"];
                        $compensatory->labour_welfare_fund = $row["labour_welfare_fund"];
                        $compensatory->net_income = $compensatory->gross + $row["epf_employee"] + $row["esic_employee"] + $row["professional_tax"] + $row["labour_welfare_fund"] - ($row["epf_employer_contribution"] - $row["esic_employer_contribution"] - $row["insurance"] - $row["graduity"]);
                        $compensatory->save();
                    }

                    //Add new items into $row
                    $row['net_income'] = $compensatory->gross + $row["epf_employee"] + $row["esic_employee"] + $row["professional_tax"] + $row["labour_welfare_fund"] - ($row["epf_employer_contribution"] - $row["esic_employer_contribution"] - $row["insurance"] - $row["graduity"]);

                    // if ($newEmployee && $empOffice) {
                    //     $returnsuccessMsg .= $empNo." get added<br/>";
                    // } else {
                    //     $failedCount++;
                    //     $returnfailedMsg .= $empNo." not get added<br/>";
                    // }

                    if(fetchMasterConfigValue("can_send_appointmentmail_after_onboarding") == "true") {
                        $isEmailSent  = $this->attachApoinmentPdf($row);
                    }

                    $responseJSON['status'] = 'success';
                    $responseJSON['message'] = $empNo." get added";

                    $returnsuccessMsg = "";

                } catch (\Exception $e) {
                    $this->deleteUser($user->id);
                    $responseJSON['status'] = 'failure';
                    $responseJSON['message'] = $empNo." not get added because of error ".$e->getMessage();
                    $responseJSON['data'] = json_encode(['error'=>$e->getMessage()]);
                    //$responseJSON['stacktrace'] = json_encode(report($e));
                    //dd($e->getMessage());
                    //$returnfailedMsg .= $empNo." not get added because of error ".$e->getMessage()." <br/>";
                }
            }
        }

        //$data = ['success'=> $returnsuccessMsg, 'failed'=> $returnfailedMsg, 'failure_json' => $failureJSON, 'success_count'=> $addedCount, 'failed_count'=> $failedCount];
        return $responseJSON;
    }

    public function isUserExist($t_emp_code)
    {
        if(empty(User::where('user_code',$t_emp_code)->where('is_admin','0')->first()))
          return false;
        else
          return true;
    }

    // Generate Employee Apoinment PDF after onboarding
    public function attachApoinmentPdf($employeeData){
        //dd($employeeData);
        $VmtGeneralInfo = VmtGeneralInfo::first();
        $empNameString  = $employeeData['employee_name'];
        $filename = 'appoinment_letter_'.$empNameString.'_'.time().'.pdf';
        $data = $employeeData;
        $data['basic_monthly'] = $employeeData['basic'];
        $data['basic_yearly'] = intval($employeeData['basic']) * 12;
        $data['hra_monthly'] = $employeeData['hra'];
        $data['hra_yearly'] = intval($employeeData['hra']) * 12;
        $data['spl_allowance_monthly'] = $employeeData['special_allowance'];
        $data['spl_allowance_yearly'] = intval($employeeData['special_allowance'])*12;
        $data['gross_monthly'] = $employeeData["basic"] + $employeeData["hra"] + $employeeData["statutory_bonus"] + $employeeData["child_education_allowance"] + $employeeData["food_coupon"] + $employeeData["lta"] + $employeeData["special_allowance"] + $employeeData["other_allowance"];
        $data['gross_yearly'] = intval($data['gross_monthly']) * 12;
        $data['employer_epf_monthly'] = $employeeData['epf_employer_contribution'];
        $data['employer_epf_yearly'] = intval($employeeData['epf_employer_contribution']) * 12;
        $data['employer_esi_monthly'] = $employeeData['esic_employer_contribution'];
        $data['employer_esi_yearly'] = intval($employeeData['esic_employer_contribution']) * 12;
        $data['ctc_monthly'] = $data['gross_monthly'];
        $data['ctc_yearly'] = intval( $data['gross_monthly']) * 12;
        $data['employee_epf_monthly'] =  $employeeData["epf_employer_contribution"];
        $data['employee_epf_yearly'] = intval($employeeData["epf_employer_contribution"]) * 12;
        $data['employer_pt_monthly'] = $employeeData["professional_tax"];
        $data['employer_pt_yearly'] =  intval($employeeData["professional_tax"]) * 12;
        $data['net_take_home_monthly'] = $employeeData["net_income"];
        $data['net_take_home_yearly'] = intval($employeeData["net_income"]) * 12;
        // download PDF file with download method
        $pdf = new Dompdf();
        $html =  view('testing', compact('data'));
        $pdf->loadHtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $docUploads =  $pdf->output();
        \File::put(public_path('/').$filename, $docUploads);
        $fileAttr  = file_get_contents(public_path('/').$filename);
        $image_view = url('/').$VmtGeneralInfo->logo_img;
        $appoinmentPath = "";
        if(fetchMasterConfigValue("can_send_appointmentletter_after_onboarding") == "true") {
            $appoinmentPath = public_path('/').$filename;
        }
        $isSent    = \Mail::to($employeeData['email'])->send(new WelcomeMail($employeeData['employee_code'], 'Abs@123123', request()->getSchemeAndHttpHost() ,  $appoinmentPath ,$image_view));

        return $isSent;
    }

    /*
     *  Quick Onboarding Employee
     *
     */
      // Showing view for uploading quick onboaring excel sheet
    public function bulkUploadEmployeeForQuickOnboarding(){
        return view('vmt_quick_employee_upload');
    }

    // Store employees with partial details for quick onboarding
    public function storeEmployeeForQuickOnboarding(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);
        $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));
        return $this->storeQuickOnboardEmployee($importDataArry);
    }

    // insert the employee to database for quick onboarding
    public function storeQuickOnboardEmployee($data){


         $VmtGeneralInfo = VmtGeneralInfo::first();

         $rules = [];

         $responseJSON = [
             'status' => 'none',
             'message' => 'none',
             'data' => [],
         ];
        $returnsuccessMsg = '';
        $returnfailedMsg = '';
        $addedCount = 0;
        $failedCount = 0;
        $empNo=0;
        $excelRowdata_row = $data;
        foreach($excelRowdata_row[0]  as $key => $excelRowdata){



                    // var_dump($excelRowdata);exit();
                    //Validation
                $rules = [
                    'employee_code' => 'nullable|unique:users,user_code',
                    'employee_name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    'email' => 'required|email|unique:users,email',
                    'l1_manager_code' => 'required|regex:/(^([a-zA-z0-9.]+)(\d+)?$)/u',
                    'doj' => 'required|dateformat:d-m-Y',
                    'mobile_no' => 'required|regex:/^([0-9]{10})?$/u|numeric',
                    'designation' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    'basic' => 'required|numeric',
                    'hra' => 'required|numeric',
                    'statutory_bonus' => 'required|numeric',
                    'child_education_allowance' => 'required|numeric',
                    'food_coupon' => 'required|numeric',
                    'lta' => 'required|numeric',
                    'special_allowance' => 'required|numeric',
                    'other_allowance' => 'required|numeric',
                    'epf_employer_contribution' => 'required|numeric',
                    'esic_employer_contribution'=> 'required|numeric',
                    'insurance' => 'required|numeric',
                    'graduity' => 'required|numeric',
                    'epf_employee' => 'required|numeric',
                    'esic_employee' => 'required|numeric',
                    'professional_tax' => 'required|numeric',
                    'labour_welfare_fund' => 'required|numeric',
                ];

                $messages = [
                    'dateformat' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
                    'in' => 'Field <b>:attribute</b> should have the following values : :values .',
                    'required' => 'Field <b>:attribute</b> is required',
                    'regex' => 'Field <b>:attribute</b> is invalid',
                    'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                    'unique' => 'Field <b>:attribute</b> should be unique',
                ];

           // var_dump($excelRowdata);exit();

            $validator = Validator::make($excelRowdata, $rules, $messages);
        // var_dump($validator);

            if (!$validator->passes()) {
                // $returnfailedMsg .= $empNo." not get added because of error ".json_encode($validator->errors()->all())." <br/>";

                $responseJSON['status'] = 'failure';
                $responseJSON['message'] = $empNo." not get added because of error ";
                $responseJSON['data'] = json_encode($validator->errors());

            }
            else
            {

                $validated = $validator->validated();


                $row=$validated;

               // var_dump($row['employee_code']);
                        $empNo = $row['employee_code'];

                        if($this->isUserExist($row["l1_manager_code"])){



                            try {

                            $user =  User::create([
                                'name' => $row['employee_name'],
                                'email' => $row["email"],
                                'password' => Hash::make('Abs@123123'),
                                'avatar' =>  $row['employee_name'].'_avatar.jpg',
                                'user_code' =>  $empNo,
                                'active' => '1',
                                'is_onboarded' => '0',
                                'onboard_type' => 'quick',
                                'is_admin' => '0',
                                'is_default_password_updated' => '0',

                            ]);

                            $user->save();

                            $user->assignRole("Employee");

                            $newEmployee = new VmtEmployee;
                            $newEmployee->userid = $user->id;
                            $newEmployee->emp_no   =    $empNo;
                            //$newEmployee->gender   =    $row["gender"];
                            $newEmployee->doj   =    $row['doj'];
                            $newEmployee->dol   =    $row['doj'];
                            $newEmployee->mobile_number   =    $row['mobile_no'];
                            $newEmployee->save();

                            if($newEmployee){
                                $empOffice  = new VmtEmployeeOfficeDetails;
                                $empOffice->emp_id      = $newEmployee->id;
                                $empOffice->user_id     = $newEmployee->userid;
                                $empOffice->designation = $row["designation"];
                                $empOffice->save();
                            }

                            if ($empOffice) {
                                $compensatory = new Compensatory;
                                $compensatory->user_id = $newEmployee->userid;
                                $compensatory->basic = $row["basic"];
                                $compensatory->hra = $row["hra"];
                                $compensatory->Statutory_bonus = $row["statutory_bonus"];
                                $compensatory->child_education_allowance = $row["child_education_allowance"];
                                $compensatory->food_coupon = $row["food_coupon"];
                                $compensatory->lta = $row["lta"];
                                $compensatory->special_allowance = $row["special_allowance"];
                                $compensatory->other_allowance = $row["other_allowance"];
                                $compensatory->gross = $row["basic"] + $row["hra"] + $row["statutory_bonus"] + $row["child_education_allowance"] + $row["food_coupon"] + $row["lta"] + $row["special_allowance"] + $row["other_allowance"];
                                $compensatory->epf_employer_contribution = $row["epf_employer_contribution"];
                                $compensatory->esic_employer_contribution = $row["esic_employer_contribution"];
                                $compensatory->insurance = $row["insurance"];
                                $compensatory->graduity = $row["graduity"];
                                $compensatory->cic = $compensatory->gross + $row["epf_employer_contribution"] + $row["esic_employer_contribution"] + $row["insurance"] + $row["graduity"];
                                $compensatory->epf_employee = $row["epf_employee"];
                                $compensatory->esic_employee = $row["esic_employee"];
                                $compensatory->professional_tax = $row["professional_tax"];
                                $compensatory->labour_welfare_fund = $row["labour_welfare_fund"];
                                $compensatory->net_income = $compensatory->gross + $row["epf_employee"] + $row["esic_employee"] + $row["professional_tax"] + $row["labour_welfare_fund"] - ($row["epf_employer_contribution"] - $row["esic_employer_contribution"] - $row["insurance"] - $row["graduity"]);
                                $compensatory->save();
                            }



                        $image_view = url('/').$VmtGeneralInfo->logo_img;

                        $responseJSON['status'] = 'success';
                        $responseJSON['message'] = $empNo." get added";

                        $returnsuccessMsg = "";

                            \Mail::to($row["email"])->send(new QuickOnboardLink($row['employee_name'], $empNo, 'Abs@123123', request()->getSchemeAndHttpHost(),$image_view));
                    } catch (\Exception $e) {

                        $this->deleteUser($user->id);
                        $responseJSON['status'] = 'failure';
                        $responseJSON['message'] = $empNo." not get added because of error ".$e->getMessage();
                        $responseJSON['data'] = json_encode(['error'=>$e->getMessage()]);
                        //$responseJSON['stacktrace'] = json_encode(report($e));
                        //dd($e->getMessage());
                        //$returnfailedMsg .= $empNo." not get added because of error ".$e->getMessage()." <br/>";
                    }

                    }else{
                        $returnfailedMsg .= "<li>"." Reporting Manager (".$row['l1_manager_code'] .") is not available ";
                        $returnfailedMsg .= "</li>";
                        $failedCount++;
                    }


                }
            }
            return $responseJSON;



    }
    // DELETE USER BASE ALL DATA IN DB

    public function deleteUser($data_id){
        $user = User::where('id', $data_id)->delete();
        $Compensatory = Compensatory::where('user_id', $data_id)->delete();
        $VmtEmployeeOfficeDetails = VmtEmployeeOfficeDetails::where('user_id', $data_id)->delete();
        $VmtEmployee = VmtEmployee::where('userid', $data_id)->delete();

    }

    /*
        Called when quick onboarded employee submits the documents from their login.
        After this, the employee is onboarded sucessfully.
    */
    public function storeEmployeeDocuments(Request $request)
    {

        $currentEmployeeDetails = VmtEmployee::where('userid',auth()->user()->id)->first();

        //dd($currentEmployeeDetails->toArray());

        $currentEmployeeDetails->aadhar_card_file = $this->fileUpload('aadhar_card');
        $currentEmployeeDetails->aadhar_card_backend_file = $this->fileUpload('aadhar_card_backend');
        $currentEmployeeDetails->pan_card_file = $this->fileUpload('pan_card');
        $currentEmployeeDetails->passport_file = $this->fileUpload('passport');
        $currentEmployeeDetails->voters_id_file = $this->fileUpload('voters_id');
        $currentEmployeeDetails->dl_file = $this->fileUpload('dl_file');
        $currentEmployeeDetails->education_certificate_file = $this->fileUpload('education_certificate');
        $currentEmployeeDetails->reliving_letter_file = $this->fileUpload('reliving_letter');

        $currentEmployeeDetails->save();

        // //set the onboard status to 1
        $currentUser = User::where('id',auth()->user()->id)->first();
        $currentUser->is_onboarded = '1';
        $currentUser->save();

        return "Saved";
    }

    public function updatePassword(Request $request)
    {
        if(isset($request->password))
        {
            $currentUser = User::where('id',auth()->user()->id)->first();
            $currentUser->password = Hash::make($request->password);
            $currentUser->is_default_password_updated = '1';
            $currentUser->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Password updated successfully.',
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'failure',
                'message' => 'Password should not be empty.',
            ]);
        }
    }

    public function fileUpload($file) {
        if (request()->has($file)) {
            $docUploads = request()->file($file);
            $docUploadsName = 'doc_'.$docUploads->getClientOriginalName()."_".time() . '.' . $docUploads->getClientOriginalExtension();
            $docUploadsPath = public_path('/images/');
            $docUploads->move($docUploadsPath, $docUploadsName);
            return $docUploadsName;
        }
        return null;
    }

    // Store quick onboard employee data to Database
    public function storeQuickOnboardFormEmployee(Request $request){
       // dd($request->all());
        // code...
        try
        {
            $row = $request->all();
            $user =  User::where('email',  $row["email"])->first();
            $user->assignRole("Employee");

            $newEmployee = VmtEmployee::where('userid', $user->id)->first();
            $newEmployee->userid = $user->id;
            $newEmployee->emp_no   =    $row["employee_code"];
            //$newEmployee->emp_name   =    $row["employee_name"];
            $newEmployee->gender   =    $row["gender"];
            //$newEmployee->designation   =    $row["designation"];
            //$newEmployee->department   =    $row["department"];
            //$newEmployee->status   =    $row["status"];
            $newEmployee->doj   =   $row['doj'];
            $newEmployee->dol   =   $row['doj'];
            $newEmployee->location   =    $row["work_location"];
            $newEmployee->dob   =    $row['dob'];
            $newEmployee->father_name   =  $row["father_name"];
            $newEmployee->pan_number   =  isset( $row["pan_no"] ) ? ($row["pan_no"]) : "";
            $newEmployee->pan_ack   =    $row["pan_ack"];
            $newEmployee->aadhar_number = $row["aadhar"];
            //$newEmployee->uan = $row["uan"];
            //$newEmployee->epf_number = $row["epf_number"];
            //$newEmployee->esic_number = $row["esic_number"];
            $newEmployee->marrital_status = $row["marital_status"];

            $newEmployee->mobile_number  = $row["mobile_no"];
            //$newEmployee->email_id   = $row["email"];
            $newEmployee->bank_name   = $row["bank_name"];
            $newEmployee->bank_ifsc_code  = $row["bank_ifsc"];
            $newEmployee->bank_account_number  = $row["account_no"];
            $newEmployee->present_address   = $row["current_address"];
            $newEmployee->permanent_address   = $row["permanent_address"];
            //$newEmployee->father_age   = $row["father_age"];
            $newEmployee->mother_name   = $row["mother_name"];
            //$newEmployee->mother_age  = $row["mother_age"];
            if ($row['marital_status'] <> 'unmarried') {
                $newEmployee->spouse_name   = $row["spouse_name"];
                $newEmployee->spouse_age   = $row["spouse_dob"];
                if ($row['no_child'] > 0) {
                    $newEmployee->kid_name   = json_encode($row["child_name"]);
                    $newEmployee->kid_age  = json_encode($row["child_dob"]);
                }
            }

            $newEmployee->aadhar_card_file = $this->fileUpload('aadhar_card');
            $newEmployee->aadhar_card_backend_file = $this->fileUpload('aadhar_card_backend');
            $newEmployee->pan_card_file = $this->fileUpload('pan_card');
            $newEmployee->passport_file = $this->fileUpload('passport');
            $newEmployee->voters_id_file = $this->fileUpload('voters_id');
            $newEmployee->dl_file = $this->fileUpload('dl_file');
            $newEmployee->education_certificate_file = $this->fileUpload('education_certificate');
            $newEmployee->reliving_letter_file = $this->fileUpload('reliving_letter');

            $newEmployee->save();


            if($newEmployee){
                $empOffice  = VmtEmployeeOfficeDetails::where('user_id', $user->id)->first();
                $empOffice->emp_id = $newEmployee->id; // Need to remove this in future
                $empOffice->user_id = $newEmployee->userid; //Link between USERS and VmtEmployeeOfficeDetails table
                $empOffice->department_id = $row["department"];// => "lk"
                $empOffice->process = $row["process"];// => "k"
                $empOffice->designation = $row["designation"];// => "k"
                $empOffice->cost_center = $row["cost_center"];// => "k"
                $empOffice->confirmation_period  = $row['confirmation_period'];// => "k"
                $empOffice->holiday_location  = $row["holiday_location"];// => "k"
                $empOffice->l1_manager_code  = $row["l1_manager_code"];// => "k"
                // $empOffice->l1_manager_designation  = $row["l1_manager_designation"];// => "k"
                $empOffice->l1_manager_name  = $row["l1_manager_name"];// => "k"
                // $empOffice->l2_manager_code  = $row["l2_manager_code"];// => "kk"
                // $empOffice->l2_manager_designation  = $row["l2_manager_designation"];// => "k"
                // $empOffice->l2_manager_name  = $row["l2_manager_name"]; // => "k"
                // $empOffice->l3_manager_code  = $row["l3_manager_code"]; // => "kk"
                // $empOffice->l3_manager_designation  = $row["l3_manager_designation"]; // => "k"
                // $empOffice->l3_manager_name  = $row["l3_manager_name"]; // => "kk"
                // $empOffice->l4_manager_code  = $row["l4_manager_code"]; // => "kk"
                // $empOffice->l4_manager_designation  = $row["l4_manager_designation"]; // => "kk"
                // $empOffice->l4_manager_name  = $row["l4_manager_name"]; // => "kk"
                $empOffice->work_location  = $row["work_location"]; // => "k"
                $empOffice->officical_mail  = $row["officical_mail"]; // => "k@k.in"
                $empOffice->official_mobile  = $row["official_mobile"]; // => "1234567890"
                $empOffice->emp_notice  = $row["emp_notice"]; // => "0"
                $empOffice->save();
            }

            if ($empOffice) {

                $newEmployee_statutoryDetails->uan_number = $row["uan_number"];
                $newEmployee_statutoryDetails->pf_applicable = $row["pf_applicable"];
                $newEmployee_statutoryDetails->esic_applicable = $row["esic_applicable"];
                $newEmployee_statutoryDetails->ptax_location = $row["ptax_location"];
                $newEmployee_statutoryDetails->tax_regime = $row["tax_regime"];
                $newEmployee_statutoryDetails->lwf_location = $row["lwf_location"];

                $compensatory = new Compensatory;
                $compensatory->user_id = $newEmployee->userid;
                $compensatory->basic = $row["basic"];
                $compensatory->hra = $row["hra"];
                $compensatory->Statutory_bonus = $row["statutory_bonus"];
                $compensatory->child_education_allowance = $row["child_education_allowance"];
                $compensatory->food_coupon = $row["food_coupon"];
                $compensatory->lta = $row["lta"];
                $compensatory->special_allowance = $row["special_allowance"];
                $compensatory->other_allowance = $row["other_allowance"];
                $compensatory->gross = $row["gross"];
                $compensatory->epf_employer_contribution = $row["epf_employer_contribution"];
                $compensatory->esic_employer_contribution = $row["esic_employer_contribution"];
                $compensatory->insurance = $row["insurance"];
                $compensatory->graduity = $row["graduity"];
                $compensatory->cic = $row["cic"];
                $compensatory->epf_employee = $row["epf_employee"];
                $compensatory->esic_employee = $row["esic_employee"];
                $compensatory->professional_tax = $row["professional_tax"];
                $compensatory->labour_welfare_fund = $row["labour_welfare_fund"];
                $compensatory->net_income = $row["net_income"];
                $compensatory->save();
            }

            // sent welcome email along with appointment Letter
            $isEmailSent  = $this->attachApoinmentPdf($row);


            if ($isEmailSent) {
                return "Saved";
            } else {
                return "Error";
            }
        }
        catch (Throwable $e) {
            return "Error";
        }
    }

}
