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
                                                    <label class="" for="selected_columns">Column needs to be shown in KPI</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <!-- <select placeholder="Select Column" name="selected_columns[]" id="selected_columns" class="onboard-form form-control select2_form_without_search" multiple required>
                                                        <option value="">Select Column</option> -->
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="dimension_check" id="dimension_check" @if($data && $data->selected_columns && in_array('dimension', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="dimension_check" style="margin-left:2px;">Dimension</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="kpi_check" id="kpi_check" @if($data && $data->selected_columns && in_array('kpi', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="kpi_check" style="margin-left:2px;">KPI</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="operational_check" id="operational_check" @if($data && $data->selected_columns && in_array('operational', explode(',', $data->selected_columns))) operational_check @endif>
                                                            <label for="operational" style="margin-left:2px;">Operational</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="measure_check" id="measure_check" @if($data && $data->selected_columns && in_array('measure', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="measure_check" style="margin-left:2px;">Measure</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="frequency_check" id="frequency_check" @if($data && $data->selected_columns && in_array('frequency', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="frequency_check" style="margin-left:2px;">Frequency</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="target_check" id="target_check" @if($data && $data->selected_columns && in_array('target', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="target_check" style="margin-left:2px;">Target</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="stretchTarget_check" id="stretchTarget_check" @if($data && $data->selected_columns && in_array('stretchTarget', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="stretchTarget_check" style="margin-left:2px;">Stretch Target</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="source_check" id="source_check" @if($data && $data->selected_columns && in_array('source', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="source_check" style="margin-left:2px;">Source</label>
                                                        </div>
                                                        <div class="col-3">
                                                            <input class="mr-1" type="checkbox" name="kpiWeightage_check" id="kpiWeightage_check" @if($data && $data->selected_columns && in_array('kpiWeightage', explode(',', $data->selected_columns))) checked @endif>
                                                            <label for="kpiWeightage_check" style="margin-left:2px;">KPI Weightage</label>
                                                        </div>
                                                    <!-- </select> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Final KPI score based on</label>
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
                                                    <label class="" for="selected_head">Dimension</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="dimension" value="{{$data && $data->header && $data->header['dimension'] ? $data->header['dimension'] : 'Dimension'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">KPI</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="kpi" value="{{$data && $data->header && $data->header['kpi'] ? $data->header['kpi'] : 'KPI'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Operational Definition</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="operational" value="{{$data && $data->header && $data->header['operational'] ? $data->header['operational'] : 'Operational Definition'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Measure</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="measure" value="{{$data && $data->header && $data->header['measure'] ? $data->header['measure'] : 'Measure'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Frequency</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="frequency" value="{{$data && $data->header && $data->header['frequency'] ? $data->header['frequency'] : 'Frequency'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Target</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="target" value="{{$data && $data->header && $data->header['target'] ? $data->header['target'] : 'Target'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Stretch Target</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="stretchTarget" value="{{$data && $data->header && $data->header['stretchTarget'] ? $data->header['stretchTarget'] : 'Stretch Target'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">Source</label>
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7 mt-2">
                                                    <input placeholder="" type="text" name="source" value="{{$data && $data->header && $data->header['source'] ? $data->header['source'] : 'Source'}}" class="onboard-form form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 mt-2">
                                                    <label class="" for="selected_head">KPI Weightage</label>
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
