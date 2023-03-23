@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    @vite(['resources/scss/views/offer_letter.scss'])
@endsection
@section('content')
  @vite('resources/js/hrms/modules/onboarding_module/offer_letter/offer_letter_generation/offer_letter_generation.js')
     <div id="OfferLetter"></div>
   @endsection
<!--
@section('script')
  <script>
        $(document).ready(function() {
            $('#create_offer').click(() => {
                $('.no-data-wrapper').css('display', 'none');
                $('#createOffer_content').css('display', 'block');

            });




        })
    </script>
@endsection -->
