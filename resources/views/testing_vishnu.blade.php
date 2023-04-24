<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtOnboardingDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\VmtEmployee;
    use App\Models\Department;
    use App\Models\VmtClientMaster;
    use App\Models\User;
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
    $mobile_number="8248023344";
    $user_code ='DM001';
    if(!empty($mobile_number)){

    echo VmtEmployee::where('mobile_number',$mobile_number)->exists() ? "true" : "false";
   }
   else
   echo false;

?>

</body>
</html>
@endsection
