@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('assets/css/assign_goals.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
<!-- <link href="{{ URL::asset('assets/css/salary.css') }}" rel="stylesheet"> -->
<link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet">
<!-- prem content -->

<!--Custom style.css-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/quicksand.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/dashboard.css') }}">
<!--Bootstrap Calendar-->
<!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/bootstrap_calendar.css') }}"> -->

<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
<!--Animate CSS-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
<!--Map-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">

<!-- calendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
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
@component('components.performance_breadcrumb')
@slot('li_1')  @endslot
@endcomponent

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
                        {{-- <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control"
                            required>
                            <button type="button" class="btn btn-primary mx-2 w-50" id="upload-goal"><i class="ri-file-upload-fill mx-1"></i> Upload</button> --}}
                    </div>
                    <div class=" d-flex align-items-center">
                    <span>Download the </span>

                   {{--  <a href="{{ url('/assets/sample_kpi.xls')  }}" target="_blank" class="btn btn-primary mx-2"><i class="ri-file-download-fill mx-1"></i>
                            Sample File
                    </a> --}}
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="container-fluid mb-1 mt-3 ">
                <form id="kpiTableForm">
                    <div class="row mb-3 d-flex align-items-center">
                       {{--  <div class="col-auto">
                            <label for="name">Enter the name of the form:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div> --}}
                    <div class="table-responsive">
                    <table id="" style="width:130%;" class="table align-middle mb-0 table-bordered  responsive" data-paging="true" data-paging-size="10" data-paging-limit="3" data-paging-container="#paging-ui-container" data-paging-count-format="{PF} to {PL}" data-sorting="true" data-filtering="false" data-empty="No Results" data-filter-container="#filter-form-container" data-editing-add-text="Add New">
                            <thead class="thead" id="tHead">
                                <tr>
                                    <th scope="col" data-name='dimension' data-filterable="false" data-visible="{{$show['dimension']}}">@if($config && $config->header)
                                        {{$config->header['dimension']}} @else Dimension @endif</th></th>
                                    <th scope="col" data-name='kpi' data-filterable="false" data-visible="{{$show['kpi']}}">@if($config && $config->header)
                                        {{$config->header['kpi']}} @else KPI @endif</th>
                                    <th scope="col" data-name='operational' data-filterable="false" data-visible="{{$show['operational']}}">@if($config && $config->header)
                                        {{$config->header['operational']}} @else Operational Definition @endif</th>
                                    <th scope="col" data-name='measure' data-filterable="false" data-visible="{{$show['measure']}}">@if($config && $config->header)
                                        {{$config->header['measure']}} @else Measure @endif</th>
                                    <th scope="col" data-name='frequency' data-filterable="false" data-visible="{{$show['frequency']}}">@if($config && $config->header)
                                        {{$config->header['frequency']}} @else Frequency @endif</th>
                                    <th scope="col" data-name='target' data-filterable="false" data-visible="{{$show['target']}}">@if($config && $config->header)
                                        {{$config->header['target']}} @else Target @endif</th>
                                    <th scope="col" data-name='stretchTarget' data-filterable="false" data-visible="{{$show['stretchTarget']}}">@if($config && $config->header)
                                        {{$config->header['stretchTarget']}} @else Stretch Target @endif</th>
                                    <th scope="col" data-name='source' data-filterable="false" data-visible="{{$show['source']}}">@if($config && $config->header)
                                        {{$config->header['source']}} @else Source @endif</th>
                                    <th scope="col" data-name='kpiWeightage' data-filterable="false" data-visible="{{$show['kpiWeightage']}}">@if($config && $config->header)
                                        {{$config->header['kpiWeightage']}} @else KPI Weightage @endif</th>
                                 {{--    <th scope="col" data-name='kpiSelfReview' data-filterable="false" data-visible="true">KPI - Achievement (Self Review)</th>
                                    <th scope="col" data-name='kpiSelfAchivement' data-filterable="false" data-visible="true">Self KPI Achievement %</th>
                                    <th scope="col" data-name='comments' data-filterable="false" data-visible="true">Comments</th>
                                    @if (!$assignedGoals->is_hr_submitted || $show['managerCount'] < 2)
                                    <th scope="col" data-name='kpiManagerReview' data-filterable="false" data-visible="{{(($reviewCompleted && $assignedGoals->is_hr_submitted) || $show['manager']) ? 'true' :'false' }}">KPI - Achievement (Manager Review)</th>
                                    <th scope="col" data-name='kpiManagerAchivement' data-filterable="false" data-visible="{{(($reviewCompleted && $assignedGoals->is_hr_submitted) || $show['manager']) ? 'true' :'false' }}">Manager KPI Achievement %</th>
                                    @else
                                    @for($i=1; $i<=$show['managerCount']; $i++)
                                    <th scope="col" data-name='kpiManagerReview' data-filterable="false" data-visible="true">KPI - Achievement (Manager Review) - {{$i}}</th>
                                    @endfor
                                    @for($i=1; $i<=$show['managerCount']; $i++)
                                    <th scope="col" data-name='kpiManagerAchivement' data-filterable="false" data-visible="true">Manager KPI Achievement % - {{$i}}</th>
                                    @endfor
                                    @endif
                                    <th scope="col" data-name='kpiHrReview' data-filterable="false" data-visible="{{(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin')) ? 'true': 'false'}}">KPI - Achievement (HR Review)</th>
                                    <th scope="col" data-name='kpiHrAchivement' data-filterable="false" data-visible="{{(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin')) ? 'true': 'false'}}">HR KPI Achievement %</th>
                                </tr> --}}
                            </thead>
                            <tbody class="tbody" id="tbody">
                                @foreach($kpiRows as $index => $kpiRow)
                                <tr>
                                    <th scope="row">
                                        <div ><input class="form-control" type="text" name="dimension" id="dimension" value="{{$kpiRow->dimension}}"></div>
                                        <input class="form-control" type="text" name="kpi_id" id="kpi_id" value="{{$kpiRow->id}}"></div>
                                    </th>
                                    <td>
                                        <div><textarea class="form-control" name="kpi" id="kpi">{{$kpiRow->kpi}}</textarea></div>
                                    </td>
                                    <td>
                                        <div> <textarea class="form-control" name="operational_definition" id="
                                            operational">{{$kpiRow->operational_definition}}</textarea></div>
                                    </td>
                                    <td>
                                        <div><textarea class="form-control" name="measure" id="measure">{{$kpiRow->measure}}</textarea></div>
                                    </td>
                                    <td>
                                        <div> <textarea class="form-control" name="frequency" id="frequency">{{$kpiRow->frequency}}</textarea></div>
                                    </td>
                                    <td>
                                        <div><textarea class="form-control" name="target" id="
                                            target">{{$kpiRow->target}}</textarea></div>
                                    </td>
                                    <td>
                                        <div><textarea class="form-control" name="stretch_target" id="stretch_target">{{$kpiRow->stretch_target}}</textarea></div>
                                    </td>
                                    <td>
                                        <div><textarea class="form-control" name="source" id="source">{{$kpiRow->source}}</textarea></div>
                                    </td>
                                    <td>
                                        <div><textarea class="form-control" name="kpi_weightage" id="kpi_weightage">{{$kpiRow->kpi_weightage}}</textarea></div>
                                    </td>

                                    

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </form>
               {{--  <div class="align-items-center justify-content-end d-flex mt-2 cursor-pointer">
                <span class="plus-sign text-info "><i class="fa fa-plus f-20"></i>Add More</span>
                </div> --}}

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
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<!--  -->
@endsection

@section('script')
<!-- Prem assets -->
<!-- OWL CAROUSEL -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>

<!--Charts JS-->
<script src="{{ URL::asset('/assets/premassets/js/charts/chart.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/charts/demo.js') }}"></script>
<!--Maps-->
<script src="{{ URL::asset('/assets/premassets/js/maps/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/maps/jvector-maps.js') }}"></script>
<!--Bootstrap Calendar JS-->
<!-- <script src="{{ URL::asset('/assets/premassets/js/calendar/bootstrap_calendar.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/calendar/demo.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<!--Nice select-->
<script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

<!--Custom Js Script-->
<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/dashboard.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/footable.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/css/footable.bootstrap.min.css') }}"></script>


<!-- Prem assets ends -->

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

<!-- for date and time -->
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // $('#select-reviewer').select2({
    //     dropdownParent: '#createEmployee',
    //     minimumResultsForSearch: Infinity,
	// 	width: '100%'
    // });

    ft = FooTable.init('#kpiTable', {
    });

    $('body').on('keyup', '.bockquote', function() {
        var val = $(this).html();
        var id = $(this).attr('data-id');
        $('#'+id).val(val);
    })

    // $('#upload-goal').click(function() {
    //     // upload a file
    //     var form_data = new FormData(document.getElementById("upload_form"));
    //     $.ajax({
    //         type: "POST",
    //         url: "{{route('upload-file')}}",
    //         dataType : "json",
    //         contentType: false,
    //         processData: false,
    //         data: form_data,
    //         success: function(data){
    //             $('.addition-content').html('');
    //             var length = 1;
    //             var showdimension = "{{$show['dimension'] == 'true' ? 'block' : 'none'}}";
    //             var showkpi = "{{$show['kpi'] == 'true' ? 'block' : 'none'}}";
    //             var showoperational = "{{$show['operational'] == 'true' ? 'block' : 'none'}}";
    //             var showmeasure = "{{$show['measure'] == 'true' ? 'block' : 'none'}}";
    //             var showfrequency = "{{$show['frequency'] == 'true' ? 'block' : 'none'}}";
    //             var showtarget = "{{$show['target'] == 'true' ? 'block' : 'none'}}";
    //             var showstretchTarget = "{{$show['stretchTarget'] == 'true' ? 'block' : 'none'}}";
    //             var showsource = "{{$show['source'] == 'true' ? 'block' : 'none'}}";
    //             var showkpiWeightage = "{{$show['kpiWeightage'] == 'true' ? 'block' : 'none'}}";
    //             // $.each(data,function(k, v) {
    //                 $.each(data[0],function(key, value) {
    //                     var dimension = '';
    //                     var kpi = '';
    //                     var operational = '';
    //                     var measure = '';
    //                     var frequency = '';
    //                     var target = '';
    //                     var stretchTarget = '';
    //                     var source = '';
    //                     var kpiWeightage = '';
    //                     if (showdimension == 'block') {
    //                         dimension = '<td class="text-box-td p-1"><textarea name="dimension[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[0]+'</textarea></td>';
    //                     } else {
    //                         dimension = '<input type="hidden" name="dimension[]">';
    //                     }
    //                     if (showkpi == 'block') {
    //                         kpi = '<td class="text-box-td p-1"><textarea name="kpi[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[1]+'</textarea></td>';
    //                     } else {
    //                         kpi = '<input type="hidden" name="kpi[]">';
    //                     }
    //                     if (showoperational == 'block') {
    //                         operational = '<td class="text-box-td p-1"><textarea name="operational[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[2]+'</textarea></td>';
    //                     } else {
    //                         operational = '<input type="hidden" name="operational[]">';
    //                     }
    //                     if (showmeasure == 'block') {
    //                         measure = '<td class="text-box-td p-1"><textarea name="measure[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[3]+'</textarea></td>';
    //                     } else {
    //                         measure = '<input type="hidden" name="measure[]">';
    //                     }
    //                     if (showfrequency == 'block') {
    //                         frequency = '<td class="text-box-td p-1"><textarea name="frequency[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[4]+'</textarea></td>';
    //                     } else {
    //                         frequency = '<input type="hidden" name="frequency[]">';
    //                     }
    //                     if (showtarget == 'block') {
    //                         target = '<td } class="text-box-td p-1"> <textarea name="target[]" data-show="true" id="" class="text-box" cols="20" placeholder="type here">'+value[5]+'</textarea></td>';
    //                     } else {
    //                         target = '<input type="hidden" name="target[]">';
    //                     }
    //                     if (showstretchTarget == 'block') {
    //                         stretchTarget = '<td class="text-box-td p-1"><textarea name="stretchTarget[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here">'+value[6]+'</textarea></td>';
    //                     } else {
    //                         stretchTarget = '<input type="hidden" name="stretchTarget[]">';
    //                     }
    //                     if (showsource == 'block') {
    //                         source = '<td class="text-box-td p-1"><textarea name="source[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here">'+value[7]+'</textarea></td>';
    //                     } else {
    //                         source = '<input type="hidden" name="source[]">';
    //                     }
    //                     if (showkpiWeightage == 'block') {
    //                         kpiWeightage = '<td class="text-box-td p-1"><textarea name="kpiWeightage[]" data-show="true" id="" class="text-box" cols="10" placeholder="type here">'+value[8]+'</textarea></td>';
    //                     } else {
    //                         kpiWeightage = '<input type="hidden" name="kpiWeightage[]">';
    //                     }
    //                     $('.content-container').append('<tr class="addition-content cursor-pointer" id="content'+length+'"><td class="text-box-td p-1"><span  name="numbers" id="" class="tableInp" >'+length+'</span><div class="text-danger delete-row cursor-pointer"><i class="fa fa-trash f-20"></i></div></td>'+dimension+kpi+operational+measure+frequency+target+stretchTarget+source+kpiWeightage+'</tr>');
    //                     length++;
    //                 });
    //             // });
    //         }
    //     });
    // });
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
var kpi_id = $('#kpi_id').val();
console.log(kpi_id);

            // $.ajax({
            //     type: "POST",
            //    // url: "{{route('vmt_pms_kpi_create')}}",
            //     data: $('#kpiTableForm').serialize(),
            //     success: function(data){
            //         // $("#kpiTableForm :input").prop("disabled", true);
            //         // $(".table-btn").prop('disabled', true);
            //         // //$('#notificationModal').show();

            //         $('#modalBody').html("Kpi Form Table Saved.");
            //         // $('#info_message').html("Kpi Form Table Saved.");
            //         $('#Modal_Message').modal('show');
            //     }
            // });
      

    });


</script>

@endsection
