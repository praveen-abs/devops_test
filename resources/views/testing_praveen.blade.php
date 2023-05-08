<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtDocuments;
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
    // $doc_filename='AadharCardBack_B090_17-04-2023_12-22-55.jpg';
    // $user_code='B090';
    // $response = Storage::disk('private')->get($user_code . "/onboarding_documents/" . $doc_filename);
    // // $response = base64_encode($response);
    // dd($response);


    // $user_code = "PLIPL100";

    // $emp_client_code = preg_replace('/\d+/', '', $user_code );

    // $result = VmtClientMaster::where('client_code', $emp_client_code)->exists();


    //PERMISSIONS
    // $test = config('vmt_roles_permissions.permissions');
    // dd($test['MANAGE_PAYSLIPS_can_view']);

    $user_code =  "sa100";
    $query = User::where('user_code', $user_code);
    if($query->exists())
    {
        echo "User exists : ".$query->first()->user_code;
    }
    else
    {
        echo "User doesnt exist";
    }

?>

</body>
</html>
@endsection
