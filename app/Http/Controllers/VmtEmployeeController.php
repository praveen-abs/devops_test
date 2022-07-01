<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployeeHierarchy;
use App\Models\VmtEmployee;
use App\Imports\VmtEmployee as VmtEmployeeImport;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtClientMaster;
use Illuminate\Support\Facades\Hash;

use App\Mail\WelcomeMail; 

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
        return view('vmt_employeeOnboarding', compact('empNo'));
    }

    //
    public function showEmployeeDirectory(Request $request){
        $vmtEmployees = VmtEmployee::orderBy('created_at', 'DESC')->get();
        foreach ($vmtEmployees as $row => $value) {
            // code...
            if($value->manager_emp_id != null){
                $vmtEmployees[$row]['manager_data'] = VmtEmployee::where('emp_no', $value->manager_emp_id)->select('emp_no', 'emp_name', 'designation', 'department')->first();
            }
        }
        return view('vmt_employeeDirectory', compact('vmtEmployees'));
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
        $row = $request->all();
        $newEmployee = new VmtEmployee; 
        $newEmployee->emp_no   =    $row["employee_code"]; 
        $newEmployee->emp_name   =    $row["employee_name"]; 
        $newEmployee->gender   =    $row["gender"];  
        $newEmployee->designation   =    $row["designation"];  
        $newEmployee->department   =    $row["department"];  
        //$newEmployee->status   =    $row["status"];  
        $newEmployee->doj   =    $row["doj"];   
        $newEmployee->dol   =    $row["doj"];  
        $newEmployee->location   =    $row["work_location"];  
        $newEmployee->dob   =    $row["dob"]; 
        $newEmployee->father_name   =    $row["father_name"];  
        $newEmployee->pan_number   =    $row["pan_no"]; 
        $newEmployee->aadhar_number = $row["aadhar"];  
        //$newEmployee->uan = $row["uan"]; 
        //$newEmployee->epf_number = $row["epf_number"];
        //$newEmployee->esic_number = $row["esic_number"];
        //$newEmployee->marrital_status = $row["marrital_status"];
      
        $newEmployee->mobile_number  = $row["mobile_no"]; 
        $newEmployee->email_id   = $row["email"];
        $newEmployee->bank_name   = $row["bank_name"];
        $newEmployee->bank_ifsc_code  = $row["bank_ifsc"]; 
        $newEmployee->bank_account_number  = $row["account_no"]; 
        $newEmployee->present_address   = $row["current_address"];
        $newEmployee->permanent_address   = $row["permanent_address"];
        //$newEmployee->father_age   = $row["father_age"];
        $newEmployee->mother_name   = $row["mother_name"];
        //$newEmployee->mother_age  = $row["mother_age"];
        $newEmployee->spouse_name   = $row["spouse_name"];
        $newEmployee->spouse_age   = $row["spouse_dob"];
        $newEmployee->kid_name   = $row["child_name"];
        $newEmployee->kid_age  = $row["child_dob"];

        $newEmployee->aadhar_card = $this->fileUpload('aadhar_card');
        $newEmployee->pan_card = $this->fileUpload('pan_card');
        $newEmployee->passport = $this->fileUpload('passport');
        $newEmployee->voters_id = $this->fileUpload('voters_id');
        $newEmployee->dl_file = $this->fileUpload('dl_file');
        $newEmployee->education_certificate = $this->fileUpload('education_certificate');
        $newEmployee->reliving_letter = $this->fileUpload('reliving_letter');

        $newEmployee->save();

        $user =  User::create([
            'name' => $row['employee_name'],
            'email' => $row["email"],
            'password' => Hash::make('123123123'),
            'avatar' =>  'avatar-1.jpg',
        ]);
        $user->assignRole("Employee");

        $newEmployee->userid = $user->id; 
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
            $empOffice->l1_manager_designation  = $row["l1_manager_designation"];// => "k"
            $empOffice->l1_manager_name  = $row["l1_manager_name"];// => "k"
            $empOffice->l2_manager_code  = $row["l2_manager_code"];// => "kk"
            $empOffice->l2_manager_designation  = $row["l2_manager_designation"];// => "k"
            $empOffice->l2_manager_name  = $row["l2_manager_name"]; // => "k"
            $empOffice->l3_manager_code  = $row["l3_manager_code"]; // => "kk"
            $empOffice->l3_manager_designation  = $row["l3_manager_designation"]; // => "k"
            $empOffice->l3_manager_name  = $row["l3_manager_name"]; // => "kk"
            $empOffice->l4_manager_code  = $row["l4_manager_code"]; // => "kk"
            $empOffice->l4_manager_designation  = $row["l4_manager_designation"]; // => "kk"
            $empOffice->l4_manager_name  = $row["l4_manager_name"]; // => "kk"
            $empOffice->work_location  = $row["work_location"]; // => "k"
            $empOffice->officical_mail  = $row["officical_mail"]; // => "k@k.in"
            $empOffice->official_mobile  = $row["official_mobile"]; // => "1234567890"
            $empOffice->emp_notice  = $row["emp_notice"]; // => "0"
            $empOffice->save();
        }

        \Mail::to($row["email"])->send(new WelcomeMail($row["email"], '123123123', 'http://vasagroup.abshrms.com'  ));
        return "Saved";
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
        $importDataArry = \Excel::import(new VmtEmployeeImport, request()->file('file'));
        return "Processed";
    }
}
