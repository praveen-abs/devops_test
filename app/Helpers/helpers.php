<?php
use App\Models\VmtMasterConfig;
use App\Models\VmtOrgRoles;
use App\Models\User;

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
