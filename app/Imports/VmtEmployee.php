<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use App\Models\VmtEmployee as EmployeeModel;
use App\Models\VmtEmployeeOfficeDetails; 

class VmtEmployee implements ToModel,  WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //dd($row);
        if($row['emp_no'] != null){

            $user =  User::create([
                'name' => $row['emp_name'],
                'email' => $row["email_id"],
                'password' => Hash::make('abcd@1234'),
                'avatar' =>  $row["emp_no"],
            ]);
            $user->assignRole("Employee");

            $newEmployee = new EmployeeModel; 

            $newEmployee->userid = $user->id; 
            //dd($row['reporting_manager']);
            //$newEmployee->email_id   = $row["email_id"];
            $newEmployee->emp_no   =    $row["emp_no"]; 
            //$newEmployee->emp_name   =    $row["emp_name"]; 
            $newEmployee->gender   =    $row["gender"];  
            //$newEmployee->manager_emp_id = $row['reporting_manager'];
            //$newEmployee->designation   =    $row["designation"];  
            //$newEmployee->department   =    $row["department"];  
            $newEmployee->status   =    $row["status"];  
            $newEmployee->doj   =    $row["doj"];   
            $newEmployee->dol   =    $row["dol"];  
            $newEmployee->location   =    $row["location"];  
            $newEmployee->dob   =    $row["dob"]; 
            $newEmployee->father_name   =    $row["father_name"];  
            $newEmployee->pan_number   =    $row["pan_number"]; 
            $newEmployee->aadhar_number = $row["aadhar_number"];  
            $newEmployee->uan = $row["uan"]; 
            $newEmployee->epf_number = $row["epf_number"];
            $newEmployee->esic_number = $row["esic_number"];
            $newEmployee->marrital_status = $row["marrital_status"];
            $newEmployee->basic  = $row["basic"];
            $newEmployee->hra   = $row["hra"];
            $newEmployee->child_edu_allowance  = $row["child_edu_allowance"];
            $newEmployee->spl_alw  = $row["spl_alw"];
            $newEmployee->total_fixed_gross  = $row["total_fixed_gross"];
            $newEmployee->epfemployer  =  $row["epfemployer"];
            $newEmployee->esicemployer  =  $row["esicemployer"];
            $newEmployee->ctc = $row["ctc"];
            $newEmployee->epfemployee = $row["epfemployee"]; 
            $newEmployee->esicemployee = $row["esicemployee"];  
            $newEmployee->pt = $row["pt"];
            $newEmployee->net = $row["net"]; 
            $newEmployee->esic_applicability = $row["esic_applicability"];
            $newEmployee->mobile_number  = $row["mobile_number"]; 
            $newEmployee->bank_name   = $row["bank_name"];
            $newEmployee->bank_ifsc_code  = $row["bank_ifsc_code"]; 
            $newEmployee->bank_account_number  = $row["bank_account_number"]; 
            $newEmployee->present_address   = $row["present_address"];
            $newEmployee->permanent_address   = $row["permanent_address"];
            $newEmployee->father_age   = $row["father_age"];
            $newEmployee->mother_name   = $row["mother_name"];
            $newEmployee->mother_age  = $row["mother_age"];
            $newEmployee->spouse_name   = $row["spouse_name"];
            $newEmployee->spouse_age   = $row["spouse_age"];
            $newEmployee->kid_name   = $row["kid_name"];
            $newEmployee->kid_age  = $row["kid_age"];

            $newEmployee->save();


            $empOffice = new VmtEmployeeOfficeDetails;
            $empOffice->emp_id   = $newEmployee->id;
            $empOffice->user_id = $user->id; 
            $empOffice->department = $row["department"];// => "lk"
            $empOffice->designation = $row["designation"];// => "k"
            //$empOffice->l1_manager_  = $row["reporting_manager"];// => "k"
            $empOffice->officical_mail = $row["official_email"];
            $empOffice->save();

            \Mail::to($row["email_id"])->send(new WelcomeMail($row["email_id"], 'abcd@1234', url('login')  ));

            return $newEmployee;
           
        }
        
    }
}
