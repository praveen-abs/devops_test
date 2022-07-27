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

class VmtEmployeeManagerImport implements ToModel,  WithHeadingRow
{
    
    public function model(array $row)
    {
        //dd($row);
        if($row['l1_manager_email'] != null){


            $managerData =  User::where('email', $row['l1_manager_email'])
                                ->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                                ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
                                ->select('users.name', 'users.id', 'users.email', 'vmt_employee_details.emp_no', 'vmt_employee_office_details.designation', 'vmt_employee_office_details.department_id' )
                                ->first();

            $empData     =  User::where('email', $row['email_id'])->first();
            if($managerData){
                $empOffice =  VmtEmployeeOfficeDetails::where('user_id', $empData->id)->orderBy('updated_at', 'DESC')->first();
                $empOffice->l1_manager_code  = $managerData->emp_no;// => "k"
                $empOffice->l1_manager_designation  = $managerData->designation;// => "k"
                $empOffice->l1_manager_name  = $managerData->name;
                $empOffice->save();
            }

          

            return $empData;
           
        }
        
    }
}
