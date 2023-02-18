<?php

use App\Models\VmtEmployeeLeaveBalance;
use App\Models\VmtMasterConfig;
use App\Models\VmtOrgRoles;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployee;
use App\Models\VmtBloodGroup;
use App\Models\VmtLeaves;
use App\Models\ConfigPms;
use App\Models\VmtEmployeeOfficeDetails;
use Illuminate\Support\Facades\Auth;

function required()
{
    $required = "<span class='text-danger required_star'>*</span>";
    return $required;
}

function fetchMasterConfigValue($config_name)
{
    return VmtMasterConfig::where('config_name', '=', $config_name)->get()->value('config_value');
}

function getEmployeeClientDetails($emp_id)
{
    $emp_client_id = User::find($emp_id)->client_id;
    //$client_code = preg_replace('/\d/', '', $emp_code);

    $query_client_details = VmtClientMaster::where('id', '=', $emp_client_id);

    if ($query_client_details->exists())
        return $query_client_details->first();
    else
        return null;
}

function getClientList()
{
    return VmtClientMaster::all();
}

function getBloodGroupName($blood_group_id)
{
    if (!empty($blood_group_id))
        return VmtBloodGroup::find($blood_group_id)->name;
    else
        return null;
}

function getEmployeeActiveStatus($user_id)
{

    if (!empty($user_id)) {
        $active_status = User::find($user_id)->active;

        if ($active_status == "1")
            return "Active";
        else
        if ($active_status == "0")
            return "Yet to Activate";
        else
        if ($active_status == "-1")
            return "Left";
        else
            return null;
    } else
        return null;
}


function sessionGetSelectedClientCode()
{
    $query_client = VmtClientMaster::find(session('client_id'));

    if (!empty($query_client))
        return $query_client->client_code;
    else
        return "";
}

function sessionGetSelectedClientName()
{

    $query_client = VmtClientMaster::find(session('client_id'));

    if (!empty($query_client))
        return $query_client->client_name;
    else
        return "";
}

function getClientName($user_id)
{
    $query_client = VmtClientMaster::find(User::find($user_id)->client_id);

    if (!empty($query_client))
        return $query_client->client_name;
    else
        return "";
}

function getOrganization_HR_Details()
{
    $master_config_value = VmtMasterConfig::where('config_name', 'hr_userid')->first();

    if (empty($master_config_value)) {
        // dd("HR not set");
        return null;
    } else {
        $master_config_value = $master_config_value->config_value;

        $hr_details = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->where('users.id', $master_config_value)->first(['users.name', 'vmt_employee_office_details.officical_mail']);
    }
    // dd($hr_details);

    return $hr_details;
}

function fetchPMSConfigValue($config_name)
{
    return ConfigPms::first()->value($config_name);
}

function isEmailExists($email)
{
    if (User::where('email', $email)->exists())
        return "true";
    else
        return "false";
}

function isEmpCodeExists($emp_code)
{
    if (User::where('user_code', $emp_code)->exists())
        return "true";
    else
        return "false";
}


function updateUserRole($user_code, $role_name)
{
    $role = VmtOrgRoles::where('name', $role_name)->first('id');
    //dd($role_id);
    $user = User::where('user_code', $user_code)->first();
    $user->org_role = $role->id;
    $user->save();
}

function currentLoggedInUserRole()
{
    return $role = VmtOrgRoles::where('id', auth()->user()->org_role)->value('name');
}

function getUserRole($org_role_id)
{
    return $role = VmtOrgRoles::where('id', $org_role_id)->value('name');
}

function getTeamMembersUserIds($user_id)
{
    $user_code = User::find($user_id)->user_code;

    $user_ids = VmtEmployeeOfficeDetails::where('l1_manager_code', $user_code)->pluck('user_id');

    //dd($user_ids);
    return $user_ids;
}

/*
    !!!! TODO :  Need to remove this function
*/
function getCurrentClientName()
{
    $client_name = VmtClientMaster::all()->value('client_name');
    //dd($client_name);
    return $client_name;
}

function hasSubClients()
{
    $sub_clients_count = VmtClientMaster::all()->count();
    if ($sub_clients_count > 1)
        return true;
    else
        return false;
}


function fetchClients()
{

    return VmtClientMaster::all(['id', 'client_name', 'client_logo']);
}

/*
        Check whether all the documents for the given
        employee code is approved or not

    */
function isAllDocumentsApproved($user_id)
{
    $json_documents_filenames = json_decode(VmtEmployee::where('userid', $user_id)->value('docs_reviewed'));

    if (!empty($json_documents_filenames)) {

        //check whether each document value is '1'
        foreach ($json_documents_filenames as $key => $value) {
            //-1 = Not yet approved
            //0 = Rejected
            if ($key == "aadhar_card_file" || $key == "pan_card_file" || $key == "aadhar_card_backend_file") {
                if ($value == -1 || $value == 0) {
                    return false;
                }
            }
        }

        return true;
    } else {
        // dd($documents_filenames);

        return false;
    }
}

function getAllBloodGroupNames()
{
    return VmtBloodGroup::all(['id', 'name']);
}


function getUserShortName($user_id)
{

    $username = User::find($user_id)->name;
    $dotPattern = preg_split('/\.+/', $username);
    $whiteSpacePattern = preg_split('/\s+/', $username);
    $singleWordPattern = str_split($username);


    if (count($dotPattern) > 1) {
        $toStore = trim($dotPattern[0])[0] . trim($dotPattern[1])[0];
        return $toStore;
    } else
    if (count($whiteSpacePattern) > 1) {
        $toStore = $whiteSpacePattern[0][0] . $whiteSpacePattern[1][0];
        return $toStore;
    } else {
        $toStore = $singleWordPattern[0] . $singleWordPattern[1];
        return $toStore;
    }

    // return $whiteSpacePattern;
}

function shortNameBGColor($shortName)
{

    $colorPalette = "";
    $getAsciiCodeFirstChar = ord(strtoupper($shortName[0]));
    $getAsciiCodeSecondChar = ord(strtoupper($shortName[1]));
    if (($getAsciiCodeFirstChar >= 65 && $getAsciiCodeFirstChar < 68) && ($getAsciiCodeSecondChar >= 65 && $getAsciiCodeSecondChar < 68)) {
        $colorPalette = "color_wildBlueYonder";
        return $colorPalette;
    } else if (($getAsciiCodeFirstChar >= 65 && $getAsciiCodeFirstChar < 68) && ($getAsciiCodeSecondChar >= 68 && $getAsciiCodeSecondChar < 72)) {
        $colorPalette = "color_disco-400";
        return $colorPalette;
    } else if (($getAsciiCodeFirstChar >= 65 && $getAsciiCodeFirstChar < 68) && ($getAsciiCodeSecondChar >= 72 && $getAsciiCodeSecondChar < 76)) {
        $colorPalette = "color_cinnabar";
        return $colorPalette;
    } else if (($getAsciiCodeFirstChar >= 65 && $getAsciiCodeFirstChar < 68) && ($getAsciiCodeSecondChar >= 76 && $getAsciiCodeSecondChar < 85)) {
        $colorPalette = "color-green-400";
        return $colorPalette;
    } else if (($getAsciiCodeFirstChar >= 65 && $getAsciiCodeFirstChar < 68) && ($getAsciiCodeSecondChar >= 85 && $getAsciiCodeSecondChar <= 89)) {
        $colorPalette = "color_navyBlue";
        return $colorPalette;
    } else if (($getAsciiCodeFirstChar >= 68 && $getAsciiCodeFirstChar < 72) && ($getAsciiCodeSecondChar >= 65 && $getAsciiCodeSecondChar < 68)) {
        $colorPalette = "color-pink-200";
        return $colorPalette;
    }

    else if (($getAsciiCodeFirstChar >= 68 && $getAsciiCodeFirstChar < 72) && ($getAsciiCodeSecondChar >= 65 && $getAsciiCodeSecondChar < 75)) {
        $colorPalette = "color-pink-600";
        return $colorPalette;
    }
    else if (($getAsciiCodeFirstChar >= 72 && $getAsciiCodeFirstChar < 78) && ($getAsciiCodeSecondChar >= 65 && $getAsciiCodeSecondChar < 72)) {
        $colorPalette = "color-pink-400 ";
        return $colorPalette;
    }
    else if (($getAsciiCodeFirstChar >= 72 && $getAsciiCodeFirstChar < 78) && ($getAsciiCodeSecondChar >= 72 && $getAsciiCodeSecondChar < 80)) {
        $colorPalette = "lighthWisteria";
        return $colorPalette;
    } else if (($getAsciiCodeFirstChar >= 78 && $getAsciiCodeFirstChar < 75) && ($getAsciiCodeSecondChar >= 75 && $getAsciiCodeSecondChar < 85)) {
        $colorPalette = "color-sandal-600";
        return $colorPalette;
    }

    else if ($getAsciiCodeFirstChar >= 70 && $getAsciiCodeFirstChar < 80) {
        $colorPalette = "color_disco-600";
        return $colorPalette;
    }

    else if (($getAsciiCodeFirstChar >= 80 && $getAsciiCodeFirstChar < 85) && ($getAsciiCodeSecondChar >= 65 && $getAsciiCodeSecondChar < 75)){
        $colorPalette = "color-gradient-green";
        return $colorPalette;
    }
    else if (($getAsciiCodeFirstChar >= 80 && $getAsciiCodeFirstChar < 85) && ($getAsciiCodeSecondChar >= 75 && $getAsciiCodeSecondChar < 82)){
        $colorPalette = "color-gradient-orange";
        return $colorPalette;
    }

    else if (($getAsciiCodeFirstChar >= 85 && $getAsciiCodeFirstChar < 89) && ($getAsciiCodeSecondChar >= 75 && $getAsciiCodeSecondChar < 80)){
        $colorPalette = "color-gradient-pink";
        return $colorPalette;
    }
    else if (($getAsciiCodeFirstChar >= 80 && $getAsciiCodeFirstChar < 85) && ($getAsciiCodeSecondChar >= 80 && $getAsciiCodeSecondChar < 85)){
        $colorPalette = " color-gradient-green-200";
        return $colorPalette;
    }

    else if  (($getAsciiCodeFirstChar >= 85 && $getAsciiCodeFirstChar < 89) && ($getAsciiCodeSecondChar >= 65 && $getAsciiCodeSecondChar < 75)){
        $colorPalette = "color-blue-600";
        return $colorPalette;
    }

    else {
        $colorPalette = "downy";
        return $colorPalette;
    }
}


function getEmployeeAvatarOrShortName($user_id)
{

    try {
        // dd($user_id);
        $user = User::where('id', $user_id);
        $avatar = $user->value('avatar');
        $responseJSON = null;

        //IF images doesnt exists, then generate ShortName
        if (empty($avatar) || !file_exists(public_path('images/' . $avatar))) {
            //send the shortname
            $responseJSON['type'] = 'shortname';
            $responseJSON['data'] = strtoupper(getUserShortName($user_id));
        } else {
            //send the profile pic
            $responseJSON['type'] = 'avatar';
            $responseJSON['data'] = $avatar;
        }

        //Add color

        $responseJSON['color'] = shortNameBGColor($responseJSON['data']);

        return json_encode($responseJSON);
    } catch (Throwable $e) {
        dd("ERROR : helper.php :: getEmployeeAvatarOrShortName() for user_id : " . $e);
    }
}

function isAppointmentLetterTemplateAvailable()
{

    $client_name = str_replace(' ', '', sessionGetSelectedClientName());

    //$client_name = Str::lower(str_replace(' ', '', getCurrentClientName()) );
    $viewfile_appointmentletter = 'mailtemplate_appointmentletter_' . $client_name;
    //dd($viewfile_appointmentletter);
    //dd('vmt_appointment_templates.'.$viewfile_appointmentletter);
    //Throw error if appointment letter missing for this client
    if (view()->exists('vmt_appointment_templates.' . $viewfile_appointmentletter)) {
        return true;
    } else {
        return false;
    }
}

function calculateProfileCompleteness($user_id)
{

    $user_full_details = User::leftjoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
        ->leftjoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
        ->leftjoin('vmt_employee_family_details', 'vmt_employee_family_details.user_id', '=', 'users.id')
        ->leftjoin('vmt_employee_emergency_contact_details', 'vmt_employee_emergency_contact_details.user_id', '=', 'users.id')

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

    foreach ($user_full_details->toArray() as $key => $value) {
        if (empty($value)) {
            //dd($key);
            $count_null_fields++;
        }
    }

    //dd($count_total_fields);
    //dd($count_null_fields);
    //dd($user_full_details);

    $value = (int)(round((($count_total_fields - $count_null_fields) / $count_total_fields) * 100));
    //dd($value);
    return $value;
}
