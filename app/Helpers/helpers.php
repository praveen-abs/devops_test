<?php
use App\Models\VmtMasterConfig;
use App\Models\VmtOrgRoles;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployee;

function required()
{
  $required = "<span class='text-danger required_star'>*</span>";
  return $required;
}

function fetchMasterConfigValue($config_name)
{
    return VmtMasterConfig::where('config_name','=',$config_name)->get()->value('config_value');

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

function hasSubClients()
{
    $sub_clients_count = VmtClientMaster::all()->count();
    if($sub_clients_count > 1)
        return true;
    else
        return false;
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
                if($value == -1 || $value == 0 )
                {
                    return false;
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
