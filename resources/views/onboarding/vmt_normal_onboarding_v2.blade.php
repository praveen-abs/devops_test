@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">


    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .floating input {
            width: 100% !important;
            margin-left: 0 !important;
            height: 2.9em;
        }

        #current_address_copy {
            height: 12px !important;
            width: 12px !important;
        }

        .addfiles {
            padding: 7px;
            border-radius: 2px;
        }

        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('{{ URL::asset('assets/images/loader.gif') }}') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: 0.4;
        }
    </style>
@endsection


@section('content')

<div id="vjs_normal_onboarding"></div>

@endsection
@section('script')

@vite('resources/js/hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.js')

<div id="vjs_normal_onboarding"></div>
@endsection



