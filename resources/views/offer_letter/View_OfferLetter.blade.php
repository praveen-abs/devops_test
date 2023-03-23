@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    @vite(['resources/scss/views/offer_letter.scss'])
@endsection
@section('content')
    @vite('resources/js/hrms/modules/onboarding_module/offer_letter/offer_letter_master/offer_letter_master.js')
    <div id="OfferLetterMaster"></div>
@endsection


