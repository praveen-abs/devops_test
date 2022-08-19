@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')

@component('components.configuration_breadcrumb')
@slot('li_1') @endslot
@endcomponent


    <div class="master-config-wrapper mt-8">
        <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <div class="">
                        <div id="msform">
                            <form id="form_config_master" method="POST" action="{{route('store-config-master')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card shadow  profile-box  p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text">
                                            <h6>Master Configuration</h6>
                                        </div>
                                        <div class="form-card">
                                            <h6 class="mt-3">Onboarding : </h6>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Client Code</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 mt-2">
                                                    <input placeholder="" type="text" name="client_code" value="{{ isset($data['client_code']) ? $data["client_code"] : "" }}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Client Code Series</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 mt-2">
                                                    <input placeholder="" type="number" name="client_code_series" value="{{ isset($data['client_code_series']) ? $data["client_code_series"] : "" }}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Send Appointment Letter after Onboard form submit?</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    @if($data['can_send_appointmentletter_after_onboarding'] == "true")
                                                        <input type="radio" id="true_option" name="can_send_appointmentletter_after_onboarding" class="" value="true" checked="checked">
                                                        <label for="true_option">Yes</label>
                                                        <input type="radio" id="false_option" name="can_send_appointmentletter_after_onboarding" value="false">
                                                        <label for="false_option">No</label>
                                                    @else
                                                        <input type="radio" id="true_option" name="can_send_appointmentletter_after_onboarding" value="true">
                                                        <label for="true_option">Yes</label>
                                                        <input type="radio" id="false_option" name="can_send_appointmentletter_after_onboarding" value="false" checked="checked">
                                                        <label for="false_option">No</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-primary my-2 header-card-text">
                                            <div class="col-12 text-right"><button type="submit" data="row-6" next="row-6" placeholder="" id="next" class="btn btn-orange   text-center">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>


@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- for validating -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2_form_without_search').each(function() {
            var placeholder = $(this).attr('placeholder')
            placeholder = (placeholder == undefined) ? '' : placeholder;

            $(this).select2({
                width: '100%',
                minimumResultsForSearch: Infinity,
                placeholder: placeholder,
            });
        });
    });
</script>

@endsection
