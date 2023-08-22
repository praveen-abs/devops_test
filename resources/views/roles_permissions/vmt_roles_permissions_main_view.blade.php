@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
@vite('resources/js/hrms/modules/roles_permission/RolesPermission.js')
<div id="VJS_RolesPermissions"></div>
@endsection
