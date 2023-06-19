@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')
<div class="mb-0 mt-30">
    @vite('resources/js/hrms/modules/roles_permission/RolesPermission.js')
    <div id="VJS_RolesPermissions"></div>
</div>
@endsection
