<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtOnboardingDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\VmtEmployee;
    use App\Models\Department;
    use App\Models\VmtGeneralInfo;
    use App\Models\VmtClientMaster;
    use App\Models\User;
    use App\Mail\QuickOnboardLink;
    use App\Services\VmtApprovalsService;


?>

@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
<!doctype html>
<html lang="en">
<head>


</head>
<body>
<?php


    // $employee_name='vishnu'
    // $employee_code='DM001'
    // $VmtGeneralInfo = VmtGeneralInfo::first();
    //            $image_view = url('/') . $VmtGeneralInfo->logo_img;

    //            \Mail::to($row["email"])->send(new QuickOnboardLink('employee_name', 'employee_code', 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));

    //            return $rowdata_response = [
    //                'row_number' => '',
    //                'status' => $status,
    //                'message' => $message,
    //                'error_fields' => [],
    //            ];

    // $query_client = VmtClientMaster::find(session('client_id'));

    // if (!empty($query_client))
    //     echo $query_client->client_name;
    // else
    //     echo "";
    // $doc_filename='AadharCardBack_B090_17-04-2023_12-22-55.jpg';
    // $user_code='B090';
    // $response = Storage::disk('private')->get($user_code . "/onboarding_documents/" . $doc_filename);
    // // $response = base64_encode($response);
    // dd($response);

    //   $value='DM001';

    //   $emp_client_code = preg_replace('/\d+/', '', $value );

    //   $result = VmtClientMaster::where('client_code', $emp_client_code)->first()->id;
//    $aadhar_number=str_replace(" ",'','3004 6226 9097');
//     if(!empty($aadhar_number))
//             echo VmtEmployee::where('aadhar_number',$aadhar_number)->exists() ? "true" : "false";
//         else
//             echo false;
// $record_ids='228';
//  $query_docs = VmtEmployeeDocuments::where('User_id','366')->pluck('Status');
// dd($query_docs);
// $VmtGeneralInfo = VmtGeneralInfo::first();
//                      $image_view = url('/') . $VmtGeneralInfo->logo_img;
//                    $mail_send = \Mail::to("vvishva185@gmail.com")->send(new QuickOnboardLink('Vishnu', 'DM001', 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));
//                   echo  $mail_send->exists();

// dd(auth()->user()->id);
// $query_vmtEmployees = VmtEmployee::join('users', 'users.id', '=', 'vmt_employee_details.userid')
//             ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
//             ->select(
//                 'users.name as emp_name',
//                 'users.user_code as emp_code',
//                 'users.active as emp_status',
//                 'users.is_onboarded as is_onboarded',
//                 'users.email as email_id',
//                 'users.id as user_id',
//                 'users.avatar as avatar',
//                 'vmt_employee_details.doj as doj',
//                 'vmt_employee_details.blood_group_id as blood_group_id',
//                 'vmt_employee_office_details.department_id',
//                 'vmt_employee_office_details.designation as emp_designation',
//                 'vmt_employee_office_details.l1_manager_code as l1_manager_code',
//                 'vmt_employee_office_details.l1_manager_name',
//                 'vmt_employee_office_details.l1_manager_designation'
//             )
//             ->orderBy('users.name', 'ASC')
//             ->where('users.active', '0')
//             ->where('users.is_ssa', '0')
//           ->get('is_onboarded');
$query= array();
$query=User::where("is_onboarded", '0')->get('email');
dd($query);

?>

</body>
</html>
@endsection
