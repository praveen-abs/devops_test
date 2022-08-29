@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('assets/css/assign_goals.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

<!--Custom style.css-->

<!--Animate CSS-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
<!--Map-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<style>
    .output {
        font: 1rem 'Fira Sans', sans-serif;
    }

    blockquote {
        background: white;
        border-radius: 5px;
        margin: 0 !important;
        height: 100px;
        overflow-y:auto;
    }

    blockquote p {
        padding: 15px;
    }

    /* blockquote p::before {
        content: '\201C';
    }

    blockquote p::after {
        content: '\201D';
    } */

    [contenteditable='true'] {
        caret-color: red;
    }
</style>
@endsection


@section('content')
{{-- @component('components.performance_breadcrumb')
@slot('li_1')  @endslot
@endcomponent --}}

<div class="container-fluid ">
    <div class="cards-wrapper">
    <div class="row">
        <div class="col-12">
            <h5>Goals / Areas of development</h5>
        </div>
    </div>
    <div class="row">
            <div class="col-12 ">
            <form id="upload_form" enctype="multipart/form-data">
                <div class="d-flex align-items-center justify-content-between">
                    @csrf
                    <div class="d-flex align-items-center">
                        <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control"
                            required>
                            <button type="button" class="btn btn-primary mx-2 w-50" id="upload-goal"><i class="ri-file-upload-fill mx-1"></i> Upload</button>
                    </div>
                    <div class=" d-flex align-items-center">
                    <span>Download the </span>

                    <!-- <a href="{{ url('/assets/sample_kpi.xls')  }}" target="_blank" class="btn btn-primary mx-2"><i class="ri-file-download-fill mx-1"></i> -->
                    <a href="{{ route('generate.sample.KPI.excel.sheet') }}" target="_blank" class="btn btn-orange mx-2"><i class="ri-file-download-fill mx-1"></i>
                            Sample File
                    </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="container-fluid mb-1 mt-3 ">
                <form id="kpiTableForm">
                    <div class="row mb-3 d-flex align-items-center">
                        <div class="col-auto">
                            <label for="name">Enter the name of the form:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id='kpiTable' class="table table-borderd align-middle mb-0" data-paging="true"
                            data-paging-size="10" data-paging-limit="3" data-paging-container="#paging-ui-container"
                            data-paging-count-format="{PF} to {PL}" data-sorting="true" data-filtering="false"
                            data-empty="No Results" data-filter-container="#filter-form-container"
                            data-editing-add-text="Add New">
                            @csrf
                            <thead class="bg-primary thead" id="tHead">
                                <tr class="text-uppercase">
                                    <th class="sort" data-sort="id">#</th>
                                    <th class="sort" data-sort="customer_name"
                                        data-name='dimension' data-filterable="false"
                                        data-visible="{{$show['dimension']}}">@if($config && $config->header)
                                        {{$config->header['dimension']}} @else Dimension @endif</th>
                                    <th class="sort" data-sort="product_name"
                                        data-name='kpi' data-filterable="false" data-visible="{{$show['kpi']}}">
                                        @if($config && $config->header) {{$config->header['kpi']}} @else KPI @endif</th>
                                    <th class="sort" data-sort="date"
                                        data-name='operational' data-filterable="false"
                                        data-visible="{{$show['operational']}}">@if($config && $config->header)
                                        {{$config->header['operational']}} @else Operational Definition @endif</th>
                                    <th class="sort" data-sort="amount"
                                        data-name='measure' data-filterable="false" data-visible="{{$show['measure']}}">
                                        @if($config && $config->header) {{$config->header['measure']}} @else Measure
                                        @endif</th>
                                    <th class="sort" data-sort="payment"
                                        data-name='frequency' data-filterable="false"
                                        data-visible="{{$show['frequency']}}">@if($config && $config->header)
                                        {{$config->header['frequency']}} @else Frequency @endif</th>
                                    <th class="sort" data-sort="status"  data-name='target'
                                        data-filterable="false" data-visible="{{$show['target']}}">@if($config &&
                                        $config->header) {{$config->header['target']}} @else Target @endif</th>
                                    <th class="sort" data-sort="status"
                                        data-name='stretchTarget' data-filterable="false"
                                        data-visible="{{$show['stretchTarget']}}">@if($config && $config->header)
                                        {{$config->header['stretchTarget']}} @else Stretch Target @endif</th>
                                    <th class="sort" data-sort="status"  data-name='source'
                                        data-filterable="false" data-visible="{{$show['source']}}">@if($config &&
                                        $config->header) {{$config->header['source']}} @else Source @endif</th>
                                    <th class="sort" data-sort="status"                                         data-name='kpiWeightage' data-filterable="false"
                                        data-visible="{{$show['kpiWeightage']}}">@if($config && $config->header)
                                        {{$config->header['kpiWeightage']}} @else KPI Weightage ( % ) @endif</th>
                                </tr>
                            </thead>
                            <tbody class="tbody content-container" id="tbody">
                                <tr class="addition-content cursor-pointer" id="content1">
                                    <td class="text-box-td p-1">
                                        <span  name="numbers" id="" class="tableInp" >1</span>
                                        <div class="text-danger delete-row cursor-pointer">
                                            <i class="fa fa-trash f-20"></i>
                                        </div>
                                    </td>
                                    <td class="text-box-td">
                                        <textarea data-show="{{$show['dimension']}}" name="dimension[]" id="dimension" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['kpi']}}" name="kpi[]" id="" class="text-box"  row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['operational']}}" name="operational[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['measure']}}" name="measure[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['frequency']}}" name="frequency[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['target']}}" name="target[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['stretchTarget']}}" name="stretchTarget[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['source']}}" name="source[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                    <td class="text-box-td ">
                                        <textarea data-show="{{$show['kpiWeightage']}}" name="kpiWeightage[]" id="" class="text-box" row="2" cols="20"
                                            placeholder="type here"></textarea>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="align-items-center justify-content-end d-flex mt-2 cursor-pointer">
                <span class="plus-sign text-info "><i class="fa fa-plus f-20"></i>Add More</span>
                </div>

                <div class="buttons d-flex justify-content-end align-items-center mt-4 ">
                    <button class="btn btn-orange table-btn mx-2" id="save-table">Save</button>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Change Reviewr window -->

<!-- Vertically Centered -->
<div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
    <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="modalHeader">Success
                    </h5>
                    <button
                        type="button"
                        class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mt-4">
                    <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                    <p class="text-muted mb-4" id="modalBody"> Table Saved, Please publish goals.</p>
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Error Message Notification -->

<div class="position-fixed top-0 end-0 p-4" style="z-index: 11">
    <div id="errorMessageNotif_fieldsEmpty" class="toast toast-border-danger overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

        <div class="toast-body">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                    <i class="ri-alert-line align-middle"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Please fill all the fields.</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Default bootstrap model -->


<div class="modal zoomIn" id="Modal_Message">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Info</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <b id="info_message">Please fill all the fields.</b>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" id="Modal_Message_CloseBtn" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<!--  -->
@endsection

@section('script')
<!-- Prem assets -->
<!-- OWL CAROUSEL -->


<!--Nice select-->
<script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

<!--Custom Js Script-->
<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/footable.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/css/footable.bootstrap.min.css') }}"></script>


<!-- Prem assets ends -->

<!-- apexcharts -->
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>


<!-- for date and time -->
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
//Accessed when KPI form saved successfully
var isKPIFormSaved = false;

$(document).ready(function(){

    
    // $('#select-reviewer').select2({
    //     dropdownParent: '#createEmployee',
    //     minimumResultsForSearch: Infinity,
    //  width: '100%'
    // });



    $('#Modal_Message_CloseBtn').click(function() {
        console.log(isKPIFormSaved);
        if(isKPIFormSaved === true)
        {
            window.location.href = '/pms'; //relative to domain
            console.log("Redirecting to PMS dashboard");
        }
        console.log("Closed modal box");
    });

    ft = FooTable.init('#kpiTable', {
    });

    $('body').on('keyup', '.bockquote', function() {
        var val = $(this).html();
        var id = $(this).attr('data-id');
        $('#'+id).val(val);
    })

    $('#upload-goal').click(function() {
        // upload a file

        var showdimension = "{{$show['dimension']}}";
        var showkpi = "{{$show['kpi']}}";
        var showoperational = "{{$show['operational']}}";
        var showmeasure = "{{$show['measure']}}";
        var showfrequency = "{{$show['frequency']}}";
        var showtarget = "{{$show['target']}}";
        var showstretchTarget = "{{$show['stretchTarget']}}";
        var showsource = "{{$show['source']}}";
        var showkpiWeightage = "{{$show['kpiWeightage']}}";
        var availableValues = [];
        var nonAvailableValues = []
        if(showdimension == 'true'){
            availableValues.push('dimension[]');
        }else{
            nonAvailableValues.push('dimension[]');
        }
        if(showkpi == 'true'){
            availableValues.push('kpi[]');
        }else{
            nonAvailableValues.push('dimension[]');
        }
        if(showoperational == 'true'){
            availableValues.push('operational[]');
        }else{
            nonAvailableValues.push('operational[]');
        }
        if(showmeasure == 'true'){
            availableValues.push('measure[]');
        }else{
            nonAvailableValues.push('measure[]');
        }
        if(showfrequency == 'true'){
            availableValues.push('frequency[]');
        }else{
            nonAvailableValues.push('frequency[]');
        }
        if(showtarget == 'true'){
            availableValues.push('target[]');
        }else{
            nonAvailableValues.push('target[]');
        }
        if(showstretchTarget == 'true'){
            availableValues.push('stretchTarget[]');
        }else{
            nonAvailableValues.push('stretchTarget[]');
        }
        if(showsource == 'true'){
            availableValues.push('source[]');
        }else{
            nonAvailableValues.push('source[]');
        }
        if(showkpiWeightage == 'true'){
            availableValues.push('kpiWeightage[]');
        }else{
            nonAvailableValues.push('kpiWeightage[]');
        }

        var form_data = new FormData(document.getElementById("upload_form"));
        $.ajax({
            type: "POST",
            url: "{{route('upload-file')}}",
            dataType : "json",
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                console.log(data);
                $('.addition-content').html('');
                var values = [];
                var dataResultNotAvailableColumns =  '';
                var length = 1;
                $.each(data[0],function(key, value) {
                    var dataResult =  '';
                    var increment = 0;
                    $.each(availableValues,function(keyAvailable, valueAvailable) {  
                        var test = '<td class="text-box-td p-1"><textarea name="'+valueAvailable+'" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[increment]+'</textarea></td>';
                        dataResult += test;
                        increment++;
                    });
                    $.each(nonAvailableValues,function(keyNotAvailable, valueNotAvailable) {   
                        var test = '<input type="hidden" name="'+valueNotAvailable+'">';
                        dataResult += test;
                    });
                    $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td>'+dataResult+'</tr>');
                            length++;
                });
                // var getAvaibleColumnHeader = getAvailableColumns();
                // getAvailableColumns();
                
                // var length = 1;
                // var showdimension = "{{$show['dimension'] == 'true' ? 'block' : 'none'}}";
                // var showkpi = "{{$show['kpi'] == 'true' ? 'block' : 'none'}}";
                // var showoperational = "{{$show['operational'] == 'true' ? 'block' : 'none'}}";
                // var showmeasure = "{{$show['measure'] == 'true' ? 'block' : 'none'}}";
                // var showfrequency = "{{$show['frequency'] == 'true' ? 'block' : 'none'}}";
                // var showtarget = "{{$show['target'] == 'true' ? 'block' : 'none'}}";
                // var showstretchTarget = "{{$show['stretchTarget'] == 'true' ? 'block' : 'none'}}";
                // var showsource = "{{$show['source'] == 'true' ? 'block' : 'none'}}";
                // var showkpiWeightage = "{{$show['kpiWeightage'] == 'true' ? 'block' : 'none'}}";
                // $.each(data,function(k, v) {
                    // $.each(data[0],function(key, value) {
                    //     console.log(key);
                    //     console.log(value);
                    //     var dimension = '';
                    //     var kpi = '';
                    //     var operational = '';
                    //     var measure = '';
                    //     var frequency = '';
                    //     var target = '';
                    //     var stretchTarget = '';
                    //     var source = '';
                    //     var kpiWeightage = '';
                    //     if (showdimension == 'block') {
                    //         dimension = '<td class="text-box-td p-1"><textarea name="dimension[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[0]+'</textarea></td>';
                    //     } else {
                    //         dimension = '<input type="hidden" name="dimension[]">';
                    //     }
                    //     if (showkpi == 'block') {
                    //         kpi = '<td class="text-box-td p-1"><textarea name="kpi[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[1]+'</textarea></td>';
                    //     } else {
                    //         kpi = '<input type="hidden" name="kpi[]">';
                    //     }
                    //     if (showoperational == 'block') {
                    //         operational = '<td class="text-box-td p-1"><textarea name="operational[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[2]+'</textarea></td>';
                    //     } else {
                    //         operational = '<input type="hidden" name="operational[]">';
                    //     }
                    //     if (showmeasure == 'block') {
                    //         measure = '<td class="text-box-td p-1"><textarea name="measure[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[3]+'</textarea></td>';
                    //     } else {
                    //         measure = '<input type="hidden" name="measure[]">';
                    //     }
                    //     if (showfrequency == 'block') {
                    //         frequency = '<td class="text-box-td p-1"><textarea name="frequency[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[4]+'</textarea></td>';
                    //     } else {
                    //         frequency = '<input type="hidden" name="frequency[]">';
                    //     }
                    //     if (showtarget == 'block') {
                    //         target = '<td } class="text-box-td p-1"> <textarea name="target[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[5]+'</textarea></td>';
                    //     } else {
                    //         target = '<input type="hidden" name="target[]">';
                    //     }
                    //     if (showstretchTarget == 'block') {
                    //         stretchTarget = '<td class="text-box-td p-1"><textarea name="stretchTarget[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here">'+value[6]+'</textarea></td>';
                    //     } else {
                    //         stretchTarget = '<input type="hidden" name="stretchTarget[]">';
                    //     }
                    //     if (showsource == 'block') {
                    //         source = '<td class="text-box-td p-1"><textarea name="source[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here">'+value[7]+'</textarea></td>';
                    //     } else {
                    //         source = '<input type="hidden" name="source[]">';
                    //     }
                    //     if (showkpiWeightage == 'block') {
                    //         kpiWeightage = '<td class="text-box-td p-1"><textarea name="kpiWeightage[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here">'+value[8]+'</textarea></td>';
                    //     } else {
                    //         kpiWeightage = '<input type="hidden" name="kpiWeightage[]">';
                    //     }
                    //     $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td>'+dimension+kpi+operational+measure+frequency+target+stretchTarget+source+kpiWeightage+'</tr>');
                    //     length++;
                    // });
                // });
            }
        });
    });
});

$(function () {
    $("#kpiTable").sortable({
        items: 'tr',
        cursor: 'pointer',
        axis: 'y',
        dropOnEmpty: false,
        start: function (e, ui) {
            ui.item.addClass("selected");
        },
        stop: function (e, ui) {
            ui.item.removeClass("selected");
            $(this).find("tr").each(function (index) {
            });
        }
    });
});
</script>
<script>

    $('body').on('click', '.plus-sign', function() {
        var showdimension = "{{$show['dimension'] == 'true' ? 'block' : 'none'}}";
        var showkpi = "{{$show['kpi'] == 'true' ? 'block' : 'none'}}";
        var showoperational = "{{$show['operational'] == 'true' ? 'block' : 'none'}}";
        var showmeasure = "{{$show['measure'] == 'true' ? 'block' : 'none'}}";
        var showfrequency = "{{$show['frequency'] == 'true' ? 'block' : 'none'}}";
        var showtarget = "{{$show['target'] == 'true' ? 'block' : 'none'}}";
        var showstretchTarget = "{{$show['stretchTarget'] == 'true' ? 'block' : 'none'}}";
        var showsource = "{{$show['source'] == 'true' ? 'block' : 'none'}}";
        var showkpiWeightage = "{{$show['kpiWeightage'] == 'true' ? 'block' : 'none'}}";
        var id = $('.addition-content:last').attr('id');
        var length = 1;
        if (id) {
            length = parseInt(id.replace('content', '')) + 1;
        }
        var dimension = '';
        var kpi = '';
        var operational = '';
        var measure = '';
        var frequency = '';
        var target = '';
        var stretchTarget = '';
        var source = '';
        var kpiWeightage = '';

        if (showdimension == 'block') {
            dimension = '<td class="text-box-td p-1"><textarea name="dimension[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here"></textarea></td>';
        } else {
            dimension = '<input type="hidden" name="dimension[]">';
        }
        if (showkpi == 'block') {
            kpi = '<td class="text-box-td p-1"><textarea name="kpi[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here"></textarea></td>';
        } else {
            kpi = '<input type="hidden" name="kpi[]">';
        }
        if (showoperational == 'block') {
            operational = '<td class="text-box-td p-1"><textarea name="operational[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here"></textarea></td>';
        } else {
            operational = '<input type="hidden" name="operational[]">';
        }
        if (showmeasure == 'block') {
            measure = '<td class="text-box-td p-1"><textarea name="measure[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here"></textarea></td>';
        } else {
            measure = '<input type="hidden" name="measure[]">';
        }
        if (showfrequency == 'block') {
            frequency = '<td class="text-box-td p-1"><textarea name="frequency[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here"></textarea></td>';
        } else {
            frequency = '<input type="hidden" name="frequency[]">';
        }
        if (showtarget == 'block') {
            target = '<td } class="text-box-td p-1"> <textarea name="target[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here"></textarea></td>';
        } else {
            target = '<input type="hidden" name="target[]">';
        }
        if (showstretchTarget == 'block') {
            stretchTarget = '<td class="text-box-td p-1"><textarea name="stretchTarget[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here"></textarea></td>';
        } else {
            stretchTarget = '<input type="hidden" name="stretchTarget[]">';
        }
        if (showsource == 'block') {
            source = '<td class="text-box-td p-1"><textarea name="source[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here"></textarea></td>';
        } else {
            source = '<input type="hidden" name="source[]">';
        }
        if (showkpiWeightage == 'block') {
            kpiWeightage = '<td class="text-box-td p-1"><textarea name="kpiWeightage[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here"></textarea></td>';
        } else {
            kpiWeightage = '<input type="hidden" name="kpiWeightage[]">';
        }
        $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td>'+dimension+kpi+operational+measure+frequency+target+stretchTarget+source+kpiWeightage+'</tr>');
    });

    $('body').on('click', '.delete-row', function() {
        $(this).parent().parent().remove();
    });

    $('body').on('click', '.close-modal', function() {
        $('#notificationModal').hide();
        $('#notificationModal').addClass('fade');
        window.location.reload();
    });


    // publishing tables
    $('body').on('click', '#save-table', function(e){
        // e.preventDefault();

        var isAllFieldsEntered = true;
        var canSaveForm = true;
        var kpiWeightageTotal = 0;
        var errorMessages = [];

        //Validate the input fields
        $("#kpiTableForm :input").each(function(){
            var input = $(this);
            //console.log(input.attr('name'));

            if(input.attr('name') == "kpiWeightage[]" && input.attr('data-show') == 'true')
            {
                kpiWeightageTotal =kpiWeightageTotal+parseInt(input.val().replace('%', ''));
                console.log("adding KPI weightage");
            }
            if(input.val().trim().length < 1 && input.attr('data-show') == 'true')
            {
                isAllFieldsEntered = false;
            }

        });

        //Check if form name entered
        if($('#name').val().trim().length==0)
        {
            isAllFieldsEntered = false;
            errorMessages.push("<li>KPI Form name is empty.</li>");
            console.log("KPI Form name is empty! ");
        }

        //Validate other fields
        if( isAllFieldsEntered)
        {
           // console.log($('textarea[name="kpiWeightage[]"]').attr('data-show'));

            //Validate KPI Weightage
            if(kpiWeightageTotal != 100 && $('textarea[name="kpiWeightage[]"]').attr('data-show') == 'true')
            {
                canSaveForm = false;
                //alert("KPI Weightage should be exactly 100%. Please validate.");
                errorMessages.push("<li>Please make sure that KPI Weightage is exactly 100%.</li>");
                //$('#error_message').html("Please make sure that KPI Weightage is exactly 100%.");
                //$('#errorModal_FillAllFields').modal('show');
            }



        }
        else
        {
            errorMessages.push("<li>Please fill all the fields in KPI Form.</li>");
            //alert("Please fill all the fields");
            // $('#error_message').html("Please fill all the fields.");
            // $('#errorModal_FillAllFields').modal('show');
            //var toast = new bootstrap.Toast($('#errorMessageNotif'));
            // setTimeout(() => {
            //     $('#errorMessageNotif_fieldsEmpty').toast('show');
            // }, 0);

            canSaveForm = false;
            console.log("Error : Some form fields are missing");
        }

        if(canSaveForm)
        {
            $.ajax({
                type: "POST",
                url: "{{route('saveKPIForm')}}",
                data: $('#kpiTableForm').serialize(),
                success: function(data){
                    $("#kpiTableForm :input").prop("disabled", true);
                    $(".table-btn").prop('disabled', true);
                    //$('#notificationModal').show();

                    $('#modalBody').html("Kpi Form Table Saved.");
                    $('#info_message').html("Kpi Form Table Saved.");
                    $('#Modal_Message').modal('show');
                    isKPIFormSaved = true;
                }
            });
        }
        else
        {
            console.log(errorMessages);
            $('#info_message').html("Please fix the following errors : <br/><br/><ul>"+errorMessages.join("").toString()+"</ul>");
            $('#Modal_Message').modal('show');
            isKPIFormSaved = false;
        }

    });


</script>

@endsection
