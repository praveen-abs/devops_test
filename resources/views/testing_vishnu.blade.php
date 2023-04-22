<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtOnboardingDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\Department;
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
// $onboard_document_type = 'Aadhar sCard Front';
// $onboard_doc_id = VmtOnboardingDocuments::where('document_name',$onboard_document_type)->first();

// if($onboard_doc_id == null)
//     echo("doc empty");

//dd($onboard_doc_id);
    // $user_docs = VmtOnboardingDocuments::leftJoin('vmt_employee_documents', 'vmt_employee_documents.doc_id', '=', 'vmt_onboarding_documents.id')
    //                                     ->where('vmt_employee_documents.user_id',auth()->user()->id)
    //                                     ->where('vmt_onboarding_documents.is_mandatory','1')
    //                                     ->get(['vmt_employee_documents.user_id','vmt_onboarding_documents.document_name','vmt_employee_documents.doc_url']);

    // //dd($user_docs->toArray());
    // $mandatory_doc_ids = VmtOnboardingDocuments::where('is_mandatory','1')->pluck('id');

    // $user_uploaded_docs_ids = VmtEmployeeDocuments::whereIn('doc_id',$mandatory_doc_ids)
    //                 ->where('vmt_employee_documents.user_id',auth()->user()->id)
    //                 ->pluck('doc_id');

    // echo("Mandatory Docs IDS : ".$mandatory_doc_ids);
    // echo("<br/>User Uploaded Docs IDS : ".$user_uploaded_docs_ids);


    // $missing_mandatory_doc_ids = array_diff($mandatory_doc_ids->toArray(), $user_uploaded_docs_ids->toArray());
    //  //dd($missing_mandatory_doc_ids);
    //  foreach($missing_mandatory_doc_ids as $single_mandatory_id){
    //    // $missing_mandatory_doc_name[] = VmtOnboardingDocuments::where('id',$single_mandatory_id)->first()->document_name;
    //  }
    //  //dd($missing_mandatory_doc_name);

    // if(count($mandatory_doc_ids) == count($user_uploaded_docs_ids)){
    //           dd('hiii');
    // }else{
    //     echo '<br/>bye';
    // }

    $employee_name='vishnu'
    $employee_code='DM001'
    $VmtGeneralInfo = VmtGeneralInfo::first();
               $image_view = url('/') . $VmtGeneralInfo->logo_img;

               \Mail::to($row["email"])->send(new QuickOnboardLink('employee_name', 'employee_code', 'Abs@123123', request()->getSchemeAndHttpHost(), $image_view));

               return $rowdata_response = [
                   'row_number' => '',
                   'status' => $status,
                   'message' => $message,
                   'error_fields' => [],
               ];
?>

</body>
</html>
@endsection
