<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployeeHierarchy;
use App\Models\VmtEmployee;
use App\Models\Countries;
use App\Models\State;
use App\Models\Bank;
use App\Imports\VmtEmployeeManagerImport;
use Illuminate\Support\Facades\Auth;
use App\Imports\VmtEmployeeImport;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtClientMaster;
use App\Models\Compensatory;
use App\Models\VmtEmployeePMSGoals;
use App\Models\VmtAppraisalQuestion;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail; 
use Validator;

use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

class VmtEmployeeController extends Controller
{
    //
    public function index(Request $request){
        $users  = User::all();
        return view('vmt_view_employee_hierarchy', compact('users'));
    }

    public function employeeOnboarding(Request $request) {
        $clientData  = VmtClientMaster::first();
        $maxId  = VmtEmployee::max('id')+1;
        if ($clientData) {
            $empNo = $clientData->client_code.$maxId;
        } else {
            $empNo = $maxId;
        }
        $countries = Countries::all();
        $india = Countries::where('country_code', 'IN')->first();
        $emp = VmtEmployeeOfficeDetails::all(); 
        $bank = Bank::all(); 
        return view('vmt_employeeOnboarding', compact('empNo', 'countries', 'india', 'emp', 'bank'));
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
    //
    public function showEmployeeDirectory(Request $request){
        $vmtEmployees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
                            ->leftJoin('vmt_employee_office_details', 'vmt_employee_details.id','=', 'vmt_employee_office_details.emp_id' )
                            ->select(
                                'vmt_employee_details.*', 
                                'users.name as emp_name', 
                                'users.email as email_id',
                                'users.avatar as avatar',
                                'vmt_employee_office_details.department',
                                'vmt_employee_office_details.designation', 
                                'vmt_employee_office_details.l1_manager_code',
                                'vmt_employee_office_details.l1_manager_name',
                                'vmt_employee_office_details.l1_manager_designation'
                            )
                            ->orderBy('created_at', 'DESC')
                            ->whereNotNull('emp_no')
                            ->get();
        foreach($vmtEmployees as $emp) {
            $assignedGoals  = VmtEmployeePMSGoals::where('employee_id', $emp->id)->first();
            if ($assignedGoals) {
                $percentArray = (json_decode($assignedGoals->hr_kpi_percentage, true));
                if ($percentArray && count($percentArray) > 0) {
                    $emp['percentage'] = array_sum($percentArray)/count($percentArray);
                } else {
                    $emp['percentage'] = 0;
                }
            } else {
                $emp['percentage'] = 0;
            }
        }
        $employees = VmtEmployee::leftJoin('users', 'users.id', '=', 'vmt_employee_details.userid')
        ->select(
            'vmt_employee_details.*', 
            'users.name as emp_name', 
            'users.avatar as avatar', 
        )
        ->orderBy('created_at', 'ASC')
        ->whereNotNull('emp_no')
        ->get();
        if (auth()->user()->hasrole('Employee')) {
            $emp = VmtEmployee::join('vmt_employee_office_details',  'user_id', '=', 'vmt_employee_details.userid')->where('userid', auth()->user()->id)->first();
            $rev = VmtEmployee::where('emp_no', $emp->l1_manager_code)->first();
            $users = User::where('id', $rev->userid)->get();
        } elseif (auth()->user()->hasrole('Manager')) {
            $users = User::join('vmt_employee_pms_goals_table',  'vmt_employee_pms_goals_table.reviewer_id', '=', 'users.id')->get();
        } else {
            $currentEmpCode = VmtEmployee::where('userid', auth::user()->id)->first()->value('emp_no');
            $users = VmtEmployeeOfficeDetails::leftJoin('users', 'users.id', '=', 'vmt_employee_office_details.user_id')
            ->select(
                'users.name', 
                'users.id as id',
                'vmt_employee_office_details.officical_mail as email',
            )
            ->orderBy('users.name', 'ASC')
            ->where('l1_manager_code', strval($currentEmpCode))
            ->get();
        }
        return view('vmt_employeeDirectory', compact('vmtEmployees', 'users', 'employees'));
    }

    //
    public function getChildForUser($id, Request $request){
        $childrenIds  =  VmtEmployeeHierarchy::where('user_id', $id)->pluck('child_nodes');
        return $childrenIds;
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


    public function fileUpload($file) {
        if (request()->has($file)) {
            $docUploads = request()->file($file);
            $docUploadsName = 'doc_'.time() . '.' . $docUploads->getClientOriginalExtension();
            $docUploadsPath = public_path('/images/');
            $docUploads->move($docUploadsPath, $docUploadsName);
            return $docUploadsName;
        }
        return null;
    }

    //
    public function employeeOnboard(Request $request)
    {
        // code...
        try
        {
            $row = $request->all();
            $user =  User::create([
                'name' => $row['employee_name'],
                'email' => $row["email"],
                'password' => Hash::make('123123123'),
                'avatar' =>  'avatar-1.jpg',
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
            if ($row['marital_status'] <> 'single') {
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
                $empOffice  = new VmtEmployeeOfficeDetails; 
                $empOffice->emp_id = $newEmployee->id; // Need to remove this in future
                $empOffice->user_id = $newEmployee->userid; //Link between USERS and VmtEmployeeOfficeDetails table
                $empOffice->department = $row["department"];// => "lk"
                $empOffice->process = $row["process"];// => "k"
                $empOffice->designation = $row["designation"];// => "k"
                $empOffice->cost_center = $row["cost_center"];// => "k"
                $empOffice->confirmation_period  = $row["confirmation_period"];// => "k"
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
                $compensatory->Statutory_bonus = $row["Statutory_bonus"];
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

    // store employee details in DB
    public function storeEmployeeData(Request $request){
        dd($request->all());
    }


    // show bulk upload form
    public function bulkUploadEmployee(Request $request){
        return view('vmt_uploadEmployees');
    }

    // store employeess from excel sheet to database
    public function storeBulkEmployee(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);
        $importDataArry = \Excel::toArray(new VmtEmployeeImport, request()->file('file'));

        // linking Manager To the employees; 
        // $linkToManager  = \Excel::import(new VmtEmployeeManagerImport, request()->file('file'));

        $data = $this->uploadEmployee($importDataArry);
        return response()->json($data);
    }

    public function uploadEmployee($data) {
        $rules = [];
        $returnsuccessMsg = '';
        $returnfailedMsg = '';
        $addedCount = 0;
        $failedCount = 0;
        foreach($data[0] as $key => $row) {
            $clientData  = VmtClientMaster::first();
            $maxId  = VmtEmployee::max('id')+1;
            if ($clientData) {
                $empNo = $clientData->client_code.$maxId;
            } else {
                $empNo = $maxId;
            }
            $row['doj'] = date('Y-m-d', $row['doj']);
            $row['dob'] = date('Y-m-d', $row['dob']);
            $row['spouse_dob'] = date('Y-m-d', $row['spouse_dob']);
            $row['confirmation_period'] = date('Y-m-d', $row['confirmation_period']);
            $row['mobile_no'] = (int)$row['mobile_no'];
            $rules = [
                'employee_name' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'email' => 'required|email',
                'gender' => 'required|in:male,female,other',
                'doj' => 'required|date',
                'work_location' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'dob' => 'required|date|before:-18 years',
                'father_name' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'pan_no' => 'required|regex:/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u',
                'pan_ack' => 'required_if:pan_no,==,""',
                'aadhar' => 'required|regex:/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u',
                'marital_status' => 'required|in:single,married,widowed,separated,divorced',
                'mobile_no' => 'required|regex:/^([0-9]{10})?$/u|numeric',
                'bank_name' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'bank_ifsc' => 'required|regex:/(^([A-Z]){4}0([A-Z0-9]){6}?$)/u',
                'account_no' => 'required|regex:/^([0-9]{9,18})?$/u|numeric',
                'current_address' => 'required',
                'permanent_address' => 'required',
                'mother_name' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'spouse_name' => 'required_unless:marital_status,single|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'spouse_dob' => 'required_unless:marital_status,single|date',
                'child_name' => 'nullable|regex:/(^(,?[a-zA-z. ])$)/u',
                'child_dob' => 'nullable|regex:/(^(,?([0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$)/u',
                'department' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'process' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'designation' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'cost_center' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'confirmation_period' => 'required|date',
                'holiday_location' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'l1_manager_code' => 'required|regex:/(^([a-zA-z0-9.]+)(\d+)?$)/u',
                'l1_manager_name' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'work_location' => 'required|regex:/(^([a-zA-z.]+)(\d+)?$)/u',
                'official_mail' => 'required|email',
                'official_mobile' => 'required|regex:/^([0-9]{10})?$/u|numeric',
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
            ];
            $messages = [
                'required' => 'The :attribute field is required.',
                'min' => 'The :attribute field should be atleast :min character.',
                'max' => 'The :attribute field should be not more than :max character.',
                'numeric' => 'The :attribute field sould contain only numbers.',
                'email' => 'The :attribute field email is not valid.',
                'date' => 'The :attribute field date is not valid.',
                'in' => 'The :attribute field date is not valid. the option should be like :in',
                'regex' => 'The :attribute field is not valid.',
                'before' => 'The :attribute should be above 18 years.',
            ];
            $validator = Validator::make($row, $rules, $messages);
            if ($validator->passes()) {
                $user =  User::create([
                    'name' => $row['employee_name'],
                    'email' => $row["email"],
                    'password' => Hash::make('123123123'),
                    'avatar' =>  'avatar-1.jpg',
                ]);
                $user->assignRole("Employee");
                
                $newEmployee = new VmtEmployee;
                $newEmployee->userid = $user->id;
                $newEmployee->emp_no   =    $empNo;
                $newEmployee->gender   =    $row["gender"];
                $newEmployee->doj   =    $row["doj"]; 
                $newEmployee->dol   =    $row["doj"];
                $newEmployee->location   =    $row["work_location"];
                $newEmployee->dob   =    $row["dob"];
                $newEmployee->father_name   =  $row["father_name"];
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
                if ($row['marital_status'] <> 'single') {
                    $newEmployee->spouse_name   = $row["spouse_name"];
                    $newEmployee->spouse_age   = $row["spouse_dob"];
                    if ($row['no_child'] > 0) {
                        $newEmployee->kid_name   = json_encode($row["child_name"]);
                        $newEmployee->kid_age  = json_encode($row["child_dob"]);
                    }
                }
                $newEmployee->save();
                
                if($newEmployee){
                    $empOffice  = new VmtEmployeeOfficeDetails;
                    $empOffice->emp_id = $newEmployee->id;
                    $empOffice->user_id = $newEmployee->userid;
                    $empOffice->department = $row["department"];
                    $empOffice->process = $row["process"];
                    $empOffice->designation = $row["designation"];
                    $empOffice->cost_center = $row["cost_center"];
                    $empOffice->confirmation_period  = $row["confirmation_period"];
                    $empOffice->holiday_location  = $row["holiday_location"];
                    $empOffice->l1_manager_code  = $row["l1_manager_code"];
                    $empOffice->l1_manager_name  = $row["l1_manager_name"];
                    $empOffice->work_location  = $row["work_location"];
                    $empOffice->officical_mail  = $row["official_mail"];
                    $empOffice->official_mobile  = $row["official_mobile"];
                    $empOffice->emp_notice  = $row["emp_notice"];
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

                if ($newEmployee && $empOffice) {
                    $addedCount++;
                    $returnsuccessMsg .= $empNo." get added";
                } else {
                    $failedCount++;
                    $returnfailedMsg .= $empNo." not get added";
                }
                \Mail::to($row["email"])->send(new WelcomeMail($row["email"], '123123123', 'http://vasagroup.abshrms.com'));
            } else {
                $returnfailedMsg .= $empNo." not get added because of error ".json_encode($validator->errors()->all());
                $failedCount++;
            }
        }

        $data = ['success'=> $returnsuccessMsg, 'failed'=> $returnfailedMsg, 'success_count'=> $addedCount, 'failed_count'=> $failedCount];
        return $data;
    }


    // Generate Employee Apoinment PDF after onboarding
    public function attachApoinmentPdf($employeeData){
        $empNameString  = $employeeData['employee_name'];
        $filename = 'appoinment_letter_'.$empNameString.'_'.time().'.pdf';
        $data = $employeeData;
        $data['basic_monthly'] = "--No Data--";
        $data['basic_yearly'] = "--No Data--";
        $data['hra_monthly'] = "--No Data--";
        $data['hra_yearly'] = "--No Data--";
        $data['spl_allowance_monthly'] = "--No Data--";
        $data['spl_allowance_yearly'] = "--No Data--";
        $data['gross_monthly'] = "--No Data--";
        $data['gross_yearly'] = "--No Data--";
        $data['employer_epf_monthly'] = "--No Data--";
        $data['employer_epf_yearly'] = "--No Data--";
        $data['employer_esi_monthly'] = "--No Data--";
        $data['employer_esi_yearly'] = "--No Data--";
        $data['ctc_monthly'] = "--No Data--";
        $data['ctc_yearly'] = "--No Data--";
        $data['employee_epf_monthly'] = "--No Data--";
        $data['employee_epf_yearly'] = "--No Data--";
        $data['employer_esi_monthly'] = "--No Data--";
        $data['employer_esi_yearly'] = "--No Data--";
        $data['employer_pt_monthly'] = "--No Data--";
        $data['employer_pt_yearly'] = "--No Data--";
        $data['net_take_home_monthly'] = "--No Data--";
        $data['net_take_home_yearly'] = "--No Data--";
        // download PDF file with download method
        $pdf = new Dompdf();
        $html =  view('vmt_appoinment_letterPdf', compact('data'));       
        $pdf->loadHtml($html, 'UTF-8');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $docUploads =  $pdf->output();
        \File::put(public_path('/').$filename, $docUploads);
        $fileAttr  = file_get_contents(public_path('/').$filename);
        $appoinmentPath = public_path('/').$filename;
        $isSent    = \Mail::to($employeeData['email'])->send(new WelcomeMail($employeeData['email'], '123123123', 'http://vasagroup.abshrms.com' ,  $appoinmentPath));
        return $isSent; 
    }
}
