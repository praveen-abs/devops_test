<?php

    use Illuminate\Support\Facades\Storage;
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


  {{-- @vite('resources/js/hrms/modules/Organization/employee_docs_upload/EmployeeDocsUpload.js')
   <div id="EmployeeDocsUpload"></div> --}}


    {{-- <!-- @vite('resources/js/hrms/modules/paycheck/investments/investment.js')
   <div id="Investments"></div> -->--}}

   {{-- @vite('resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.js') --}}
   {{-- <div id="SalaryAdvanceLoan"></div> --}}

     {{-- @vite('resources\js\hrms\modules\leave_policy_Settings\Leave_Policy_Setting_Master\Leave_Policy_Setting_Master.js') --}}
     {{-- <div id="Leave_Policy_Setting_Master"></div> --}}


     @vite('resources/js/hrms/modules/paycheck/investments/investments_and_exemption/testing_tableMaster/testing_table.js')
     <div id="testing_table"></div>


</body>
</html>
@endsection

