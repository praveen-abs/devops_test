@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<style>
    
.profile-box {
    border-radius: 12px !important;
    box-shadow: rgb(60 64 67 / 30%) 0px 1px 2px 0px, rgb(60 64 67 / 15%) 0px 2px 6px 2px !important;
}
.profile-box .card-body{
    padding: 5px !important;
}
.card-top-border {
    border-top: 7px solid #002F56!important;
}

</style>
@endsection

@section('content')

<div class="main">
    <div class="">
        <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <div class="">
                        <div id="msform">
                            @if ($data && $data->id)
                            <form id="form-1" method="POST" action="{{route('store_config_pms', $data->id)}}" enctype="multipart/form-data">
                            @else
                            <form id="form-1" method="POST" action="{{route('store_config_pms')}}" enctype="multipart/form-data">
                            @endif
                                @csrf
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text">
                                            <h5>PMS Configuration</h5>
                                        </div>
                                        <div class="form-card">
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_columns">Column needs to be shown in KPI{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <select placeholder="Select Column" name="selected_columns[]" id="selected_columns" class="onboard-form form-control select2_form_without_search" multiple required>
                                                        <option value="">Select Column</option>
                                                        <option value="dimension" @if($data && $data->selected_columns && in_array('dimension', explode(',', $data->selected_columns))) selected @endif>Dimension</option>
                                                        <option value="kpi" @if($data && $data->selected_columns && in_array('kpi', explode(',', $data->selected_columns))) selected @endif>KPI</option>
                                                        <option value="operational" @if($data && $data->selected_columns && in_array('operational', explode(',', $data->selected_columns))) selected @endif>Operational</option>
                                                        <option value="measure" @if($data && $data->selected_columns && in_array('measure', explode(',', $data->selected_columns))) selected @endif>Measure</option>
                                                        <option value="frequency" @if($data && $data->selected_columns && in_array('frequency', explode(',', $data->selected_columns))) selected @endif>Frequency</option>
                                                        <option value="target" @if($data && $data->selected_columns && in_array('target', explode(',', $data->selected_columns))) selected @endif>Target</option>
                                                        <option value="stretchTarget" @if($data && $data->selected_columns && in_array('stretchTarget', explode(',', $data->selected_columns))) selected @endif>Stretch Target</option>
                                                        <option value="source" @if($data && $data->selected_columns && in_array('source', explode(',', $data->selected_columns))) selected @endif>Source</option>
                                                        <option value="kpiWeightage" @if($data && $data->selected_columns && in_array('kpiWeightage', explode(',', $data->selected_columns))) selected @endif>KPI Weightage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Head needs to be shown in KPI{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <select placeholder="Select Head" name="selected_head" id="selected_head" class="onboard-form form-control select2_form_without_search" required>
                                                        <option value="">Select Head</option>
                                                        <option value="manager" @if($data && $data->selected_head && 'manager' == $data->selected_head) selected @endif>Manager</option>
                                                        <option value="hr" @if($data && $data->selected_head && 'hr' == $data->selected_head) selected @endif>HR</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h6 class="mt-3">Change column name as per your preference</h6>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Dimension{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="dimension" value="{{$data && $data->header && $data->header['dimension'] ? $data->header['dimension'] : 'Dimension'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">KPI{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="kpi" value="{{$data && $data->header && $data->header['kpi'] ? $data->header['kpi'] : 'KPI'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Operational Definition{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="operational" value="{{$data && $data->header && $data->header['operational'] ? $data->header['operational'] : 'Operational Definition'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Measure{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="measure" value="{{$data && $data->header && $data->header['measure'] ? $data->header['measure'] : 'Measure'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Frequency{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="frequency" value="{{$data && $data->header && $data->header['frequency'] ? $data->header['frequency'] : 'Frequency'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Target{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="target" value="{{$data && $data->header && $data->header['target'] ? $data->header['target'] : 'Target'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Stretch Target{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="stretchTarget" value="{{$data && $data->header && $data->header['stretchTarget'] ? $data->header['stretchTarget'] : 'Stretch Target'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Source{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="source" value="{{$data && $data->header && $data->header['source'] ? $data->header['source'] : 'Source'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">KPI Weightage{!! required() !!}</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="kpiWeightage" value="{{$data && $data->header && $data->header['kpiWeightage'] ? $data->header['kpiWeightage'] : 'KPI Weightage ( % )'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-12 text-right"><button type="submit" data="row-6" next="row-6" placeholder="" name="next" class="btn btn-orange   text-center" value="Submit">Submit</button>
                                                </div>
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

    <!--Main Content-->
</div>


@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


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