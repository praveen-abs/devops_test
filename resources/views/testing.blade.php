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
<!-- 
     @vite('resources/js/hrms/modules/Organization/manage_employee/ManageEmployee.js')
     <div id="vjs_manage_employee"></div> -->

  <!-- @vite('resources/js/hrms/modules/paycheck/investments/investment.js')
   <div id="Investments"></div>  -->

    <!-- @vite('resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.js') -->
   <!-- <div id="SalaryAdvanceLoan"></div> -->



   <!-- @vite('resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_master.js')
   <div id="vjs_Attendance_master"></div> -->
   
   <!-- @vite('resources/js/hrms/modules/leave_module/leave_apply_v2/leave_apply_v2.js')
  <div id="vjs_leaveapply_v2"></div> -->

  <!-- @vite('resources/js/hrms/modules/leave_module/leave_balance/leave_balance.js')
  <div id="LeaveBalance"></div> -->

  @vite('resources/js/hrms/modules/roles_permission/RolesPermission.js')
  <div id="RolesPermission"></div>
</body>
</html>
@endsection

