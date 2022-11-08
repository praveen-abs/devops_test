<?php
use App\Models\VmtMasterConfig;
use App\Models\VmtOrgRoles;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployee;
use App\Models\VmtBloodGroup;
use App\Models\VmtLeaves;
use App\Models\ConfigPms;

function required()
{
  $required = "<span class='text-danger required_star'>*</span>";
  return $required;
}

function fetchMasterConfigValue($config_name)
{
    return VmtMasterConfig::where('config_name','=',$config_name)->get()->value('config_value');

}

function fetchPMSConfigValue($config_name){
    return ConfigPms::first()->value($config_name);
}

function isEmailExists($email)
{
    if(User::where('email',$email)->exists())
        return "true";
    else
        return "false";

}

function isEmpCodeExists($emp_code)
{
    if(User::where('user_code',$emp_code)->exists())
        return "true";
    else
        return "false";

}


function updateUserRole($user_code,$role_name)
{
    $role = VmtOrgRoles::where('name',$role_name)->first('id');
    //dd($role_id);
    $user = User::where('user_code',$user_code)->first();
    $user->org_role = $role->id;
    $user->save();
}

function currentLoggedInUserRole()
{
    return $role = VmtOrgRoles::where('id',auth()->user()->org_role)->value('name');
}

function getUserRole($org_role_id)
{
    return $role = VmtOrgRoles::where('id',$org_role_id)->value('name');
}

function hasSubClients()
{
    $sub_clients_count = VmtClientMaster::all()->count();
    if($sub_clients_count > 1)
        return true;
    else
        return false;
}

function getAllLeaveTypes()
{
    return VmtLeaves::all(['id','leave_type']);
}

function fetchSubClients(){

    return VmtClientMaster::all(['id','client_name']);

}

    /*
        Check whether all the documents for the given
        employee code is approved or not

    */
    function isAllDocumentsApproved($user_id)
    {
        $json_documents_filenames = json_decode( VmtEmployee::where('userid', $user_id)->value('docs_reviewed') );

        if(!empty($json_documents_filenames)){

            //check whether each document value is '1'
            foreach($json_documents_filenames as $key => $value)
            {
                //-1 = Not yet approved
                //0 = Rejected
                if($key == "aadhar_card_file" || $key == "pan_card_file" || $key == "aadhar_card_backend_file" )
                {
                    if($value == -1 || $value == 0 )
                    {
                        return false;
                    }
                }
            }

            return true;
        }
        else
        {
            // dd($documents_filenames);

            return false;
        }
    }

    function getAllBloodGroupNames()
    {
        return VmtBloodGroup::all(['id','name']);

    }


    function getEmployeeAvatarOrShortName($user_id){

        try{

            // dd($user_id);
            $user = User::where('id',$user_id);
            $avatar = $user->value('avatar');

            $responseJSON = null;

            //IF images doesnt exists, then generate ShortName
            if(empty($avatar) || !file_exists(public_path('images/'.$avatar)) )
            {
                //send the shortname
                $responseJSON['type'] = 'shortname';

                //Remove DOT from name
                $emp_name =  preg_replace('#[^\pL\pN/-]+#', '',  $user->value('name'));
                $array_emp_name = explode(' ',$emp_name);

                //If name is single word
                if(count($array_emp_name) == 1)
                {
                    $responseJSON['data'] = $array_emp_name[0][0].$array_emp_name[0][1];
                }
                else
                {
                    //If first word is SINGLE CHAR
                    if(strlen($array_emp_name[0]) == 1)
                    {
                        $responseJSON['data'] = $array_emp_name[0][0].$array_emp_name[1][0];

                    }
                    else //If Two words are found(each with multiple chars)
                    {
                        $responseJSON['data'] = $array_emp_name[0][0].$array_emp_name[0][1];
                    }
                }


                $responseJSON['data'] = strtoupper($responseJSON['data']);
            }
            else
            {


                //send the profile pic

                $responseJSON['type'] = 'avatar';
                $responseJSON['data'] = $avatar;
            }

            return $responseJSON;
        } catch (Throwable $e) {
            dd("ERROR : helper.php :: getEmployeeAvatarOrShortName() for user_id  ");
        }
    }

    function calculateProfileCompleteness($user_id)
    {

        $user_full_details = User::leftjoin('vmt_employee_details','vmt_employee_details.userid', '=', 'users.id')
                        ->leftjoin('vmt_employee_office_details','vmt_employee_office_details.user_id', '=', 'users.id')
                        ->leftjoin('vmt_employee_family_details','vmt_employee_family_details.user_id', '=', 'users.id')
                        ->leftjoin('vmt_employee_emergency_contact_details','vmt_employee_emergency_contact_details.user_id', '=', 'users.id')

                        //Employee info

                        ->select(
                            'vmt_employee_details.mobile_number',
                            'users.email',
                            'vmt_employee_details.dob',
                            'vmt_employee_details.present_address',
                            'vmt_employee_details.gender',
                            'vmt_employee_office_details.l1_manager_code',
                        //Personal Info
                            'vmt_employee_details.passport_number',
                            'vmt_employee_details.passport_date',
                            'vmt_employee_details.nationality',
                            'vmt_employee_details.religion',
                            'vmt_employee_details.marital_status',
                            'vmt_employee_details.spouse_name',
                        //Documents
                            'vmt_employee_details.aadhar_card_file',
                            'vmt_employee_details.aadhar_card_backend_file',
                            'vmt_employee_details.pan_card_file',
                            'vmt_employee_details.passport_file',
                            'vmt_employee_details.voters_id_file',
                            'vmt_employee_details.dl_file',
                            'vmt_employee_details.education_certificate_file',
                            'vmt_employee_details.reliving_letter_file',

                            //'vmt_employee_details.no_of_children',


                        //Family Informations
                            'vmt_employee_family_details.name',
                            'vmt_employee_family_details.relationship',
                            'vmt_employee_family_details.dob',
                            'vmt_employee_family_details.phone_number',

                        //Bank Informations
                            'vmt_employee_details.bank_id',
                            'vmt_employee_details.bank_ifsc_code',
                            'vmt_employee_details.bank_account_number',

                        //Emergency Contact
                            'vmt_employee_emergency_contact_details.name',
                            'vmt_employee_emergency_contact_details.relationship',
                            'vmt_employee_emergency_contact_details.phone_number_1',
                            'vmt_employee_emergency_contact_details.phone_number_2'

                        )->where('users.id', $user_id)->first();

        $count_total_fields = count($user_full_details->toArray());
        $count_null_fields = 0;

        foreach($user_full_details->toArray() as $key => $value)
        {
            if(empty($value))
            {
                //dd($key);
                $count_null_fields++;
            }
        }

        //dd($count_total_fields);
        //dd($count_null_fields);
        //dd($user_full_details);

        $value = (int)( round(( ($count_total_fields -$count_null_fields)/$count_total_fields) * 100 ));
        //dd($value);
        return $value;
    }



