<?php

    use Illuminate\Support\Facades\Storage;
    use App\Models\VmtDocuments;
    use App\Models\VmtEmployeeDocuments;
    use App\Models\VmtEmployee;
    use App\Models\VmtPMS_KPIFormAssignedModel;
    use App\Models\VmtPMS_KPIFormDetailsModel;
    use App\Models\VmtGeneralInfo;
    use App\Models\VmtClientMaster;
    use App\Models\User;
    use App\Models\VmtPMS_KPIFormModel;
    use App\Models\VmtUserMailStatus;
    use App\Models\VmtEmployeePayslipStatus;
    use App\Models\VmtEmployeeMailStatus;
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
    <?php




        //  $is_response_docs = VmtEmployeeDocuments::where('user_id', $user_id);
        //  if($is_response_docs->exists())
        //  {
        //     $response_docs = VmtEmployeeDocuments::join('vmt_documents', 'vmt_documents.id', '=', 'vmt_employee_documents.doc_id')
        //     ->where('vmt_employee_documents.user_id', $response->id)
        //     ->get();
        //     dd($response_docs);
        //  }else{
        //     $response_docs = VmtDocuments::all();
        //     dd($response_docs);
        //  }
        // $emp_assignedpmsfrom=VmtPMS_KPIFormModel::join('vmt_pms_kpiform_details','vmt_pms_kpiform.id','=','vmt_pms_kpiform_details.vmt_pms_kpiform_id')
        //                                         ->join('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.vmt_pms_kpiform_id','=','vmt_pms_kpiform_details.vmt_pms_kpiform_id')
        //                                         ->join('users','users.id','=','vmt_pms_kpiform_assigned.assignee_id')
        //                                         ->where('vmt_pms_kpiform_assigned.assignee_id',$user_id)
        //                                         ->get();
        //  dd($emp_assignedpmsfrom->toarray());





    //     $query_client = VmtClientMaster::find(session('client_id'));
    //     if (!empty($query_client))
    //     return $query_client->client_name;
    // else
    //     return "";

         //to store mailstatus
         //$isSent=true;
    //    $user_code= 'IMA0002';
    //      $user_id=User::where('user_code',$user_code)->first()->id;

    //         $query_emp_welcomemailstatus =VmtEmployeeMailStatus::where('user_id',$user_id);

    //         if($query_emp_welcomemailstatus->exists())
    //         {
    //         //update
    //         $query_emp_welcomemailstatus = $query_emp_welcomemailstatus->first();
    //         $query_emp_welcomemailstatus->welcome_mail_status  = $isSent? '1':'0';
    //         dd($query_emp_welcomemailstatus);

    //         }
    //         else
    //         {
    //             //create new record
    //            $query_emp_welcomemailstatus = new VmtEmployeeMailStatus;
    //            $query_emp_welcomemailstatus->user_id=$user_id;
    //            $query_emp_welcomemailstatus->welcome_mail_status =$isSent? '1':'0';
    //            dd($query_emp_welcomemailstatus);

    //         }
    $user_id ="175";
    $response = VmtDocuments::leftJoin('vmt_employee_documents','vmt_employee_documents.doc_id','=','vmt_documents.id')
                    ->where('vmt_employee_documents.user_id',$user_id)
                    ->orWhereNull('vmt_employee_documents.id')
                    ->get();
                    dd($response->toarray());
?>


@endsection
