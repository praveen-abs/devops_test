<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\VmtEmployee;
    use App\Models\Department;
    use App\Models\VmtGeneralInfo;
    use App\Models\VmtClientMaster;
    use App\Models\User;
    use App\Models\VmtUserMailStatus;
    use App\Mail\QuickOnboardLink;
    use App\Services\VmtApprovalsService;
    use App\Mail\WelcomeMail;


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
// $user_official_mail = User::leftjoin('vmt_user_mail_status','vmt_user_mail_status.user_id','users.id')
//         ->where('users.active','<>','-1')
//         ->where('users.email','!=','')
//         ->select(
//                 'users.User_code as empcode',
//                 'users.name as empname'  ,
//                 'users.email as email',
//                 'vmt_user_mail_status.welcome_mail_status as welcomemailstatus'
//               )
//         ->get();
//         // dd($user_official_mail);


            try{
                $user_code='DMC072';


             $user_mail = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
            ->where('users.user_code',$user_code)
            ->first()->email;

            $emp_name = User::where('user_code',$user_code)->first()->name;
            $VmtGeneralInfo = VmtGeneralInfo::first();
            $image_view = url('/') . $VmtGeneralInfo->logo_img;

            $response  = array();

            $isSent = \Mail::to($user_mail)->send(new WelcomeMail($user_code,'Abs@123123', request()->getSchemeAndHttpHost(), "", $image_view));

            //Store the sent status in ' vmt_user_mail_status'
            if($isSent){
                $mail_status='1';
            }
            else{
              $mail_status='0';
            }
            //to store mailstatus
            $user_id=User::where('user_code',$user_code)->first()->id;
        if( $user_id->exists()){
            $Welcome_mail_status=VmtUserMailStatus::find($user_id);
            $Welcome_mail_status->user_id=$user_id;
            $Welcome_mail_status->Welcome_mail_status=$mail_status;
            $Welcome_mail_status->save();
            }else{
            $Welcome_mail_status= new VmtUserMailStatus;
            $Welcome_mail_status->user_id=$user_id;
            $Welcome_mail_status->Welcome_mail_status=$mail_status;
            $Welcome_mail_status->save();
            }




            return response()->json([
                'status' => 'success',
                'message' => "Welcome Mail Notification sent successfully!",
                'data' => ""

            ]);
            dd('hiii');
        } catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "",
                'data' => $e

            ]);
            dd('bye');
        }




?>

</body>
</html>
@endsection
