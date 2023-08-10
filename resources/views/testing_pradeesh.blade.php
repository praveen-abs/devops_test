<?php

use Illuminate\Support\Facades\Storage;
use App\Models\VmtClientMaster;
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
     {{-- @vite( 'resources/js/hrms/modules/roles_permission/RolesPermission.js') --}}
     {{-- <div id="RolesPermission"></div> --}}

     {{-- @vite('resources/js/hrms\modules\profile_pages\EmployeeDocumentsManager.js')
     <div id="vjs_employeeDocsManager"></div> --}}

       {{-- @vite('resources/js/hrms/modules/onboarding_module/onboarding_form_mgmt/OnboardingFormMgmt.js')
            <div id="OnboardingFromMgmt"></div> --}}

            {{-- @vite('resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_master.js')
            <div id="vjs_attendance_master"></div> --}}

    {{-- @vite('resources/js/hrms/modules/configurations/attendance_settings/ManageShift/GeneralShift/GeneralShift.js')
            <div id="General_Shift"></div> --}}

    @vite('resources/js/hrms/modules/approvals/employeeDetails_approvals/EmpDetails_approvals.js')
    {{-- <div id="EmpDetails_approvals"></div> --}}

    @vite('resources/js/hrms/modules/configurations/holidays/Holidays_Master.js')
    {{-- <div id="Holidays_Master"></div> --}}
    @vite('resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.js')
    {{-- <div class="mt-6" id="SalaryAdvanceLoan"></div> --}}

    <!-- @vite('resources/js/hrms/modules/approvals/roles_permission/RolesAndPermission.js')
    <div id="AdminRolesPermission"></div> -->

     @vite('resources/js/hrms/modules/payroll/salary_Revision/salary_Revision.js')
         {{-- <div id="salary_Revision"></div> --}}

         @vite('resources/js/hrms/modules/approvals/exit_approval/resignation_approval.js')
         {{-- <div id="resignation_approval"></div> --}}

</body>

</html>
@endsection
