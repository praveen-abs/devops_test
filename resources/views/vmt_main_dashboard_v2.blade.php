@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

            @vite('resources/js/hrms/modules/dashboard/dashboard.js')
            <div id="Dashboard"></div>

@endsection
