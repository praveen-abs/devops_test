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
        overflow-y: auto;
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

<div class="container-fluid bg-white p-2 ">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xxl-12 col-xl-12 col-lg-12">
            <h6 class="">Goals / Areas of development</h6>
        </div>
        <div class="col-sm-12 col-md-12 col-xxl-12 col-xl-12 col-lg-12">

            <form id="upload_form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center">
                        @csrf
                        <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control w-50" required>
                        <button type="button" class="btn btn-orange mx-2 " id="upload-goal"><i class="ri-file-upload-fill mx-1"></i> Upload</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center justify-content-end ">
                        <span>Download the </span>
                        <!-- <a href="{{ url('/assets/sample_kpi.xls')  }}" target="_blank" class="btn btn-primary mx-2"><i class="ri-file-download-fill mx-1"></i> -->
                        <a href="{{ route('generate.sample.KPI.excel.sheet',$selectedYear) }}" target="_blank" class="btn btn-orange mx-2"><i class="ri-file-download-fill mx-1"></i>
                            Sample File
                        </a>

                    </div>
                </div>
            </form>

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
                            <table id='kpiTable' class="table table-borderd align-middle mb-0" data-paging="true" data-paging-size="10" data-paging-limit="3" data-paging-container="#paging-ui-container" data-paging-count-format="{PF} to {PL}" data-sorting="true" data-filtering="false" data-empty="No Results" data-filter-container="#filter-form-container" data-editing-add-text="Add New">
                                @csrf
                                <thead class="bg-primary thead" id="tHead">
                                    <tr class="text-uppercase">
                                        <th class="sort" data-sort="id">#</th>
                                        <th class="sort" data-sort="customer_name" data-name='dimension' data-filterable="false" data-visible="{{$show['dimension']}}">@if($config && $config->header)
                                            {{$config->header['dimension']}} @else Dimension @endif
                                        </th>
                                        <th class="sort" data-sort="product_name" data-name='kpi' data-filterable="false" data-visible="{{$show['kpi']}}">
                                            @if($config && $config->header) {{$config->header['kpi']}} @else KPI @endif</th>
                                        <th class="sort" data-sort="date" data-name='operational' data-filterable="false" data-visible="{{$show['operational']}}">@if($config && $config->header)
                                            {{$config->header['operational']}} @else Operational Definition @endif
                                        </th>
                                        <th class="sort" data-sort="amount" data-name='measure' data-filterable="false" data-visible="{{$show['measure']}}">
                                            @if($config && $config->header) {{$config->header['measure']}} @else Measure
                                            @endif</th>
                                        <th class="sort" data-sort="payment" data-name='frequency' data-filterable="false" data-visible="{{$show['frequency']}}">@if($config && $config->header)
                                            {{$config->header['frequency']}} @else Frequency @endif
                                        </th>
                                        <th class="sort" data-sort="status" data-name='target' data-filterable="false" data-visible="{{$show['target']}}">@if($config &&
                                            $config->header) {{$config->header['target']}} @else Target @endif</th>
                                        <th class="sort" data-sort="status" data-name='stretchTarget' data-filterable="false" data-visible="{{$show['stretchTarget']}}">@if($config && $config->header)
                                            {{$config->header['stretchTarget']}} @else Stretch Target @endif
                                        </th>
                                        <th class="sort" data-sort="status" data-name='source' data-filterable="false" data-visible="{{$show['source']}}">@if($config &&
                                            $config->header) {{$config->header['source']}} @else Source @endif</th>
                                        <th class="sort" data-sort="status" data-name='kpiWeightage' data-filterable="false" data-visible="{{$show['kpiWeightage']}}">@if($config && $config->header)
                                            {{$config->header['kpiWeightage']}} @else KPI Weightage ( % ) @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tbody content-container" id="tbody">
                                    <tr class="addition-content cursor-pointer" id="content1">
                                        <td class="text-box-td p-1">
                                            <span name="numbers" id="" class="tableInp">1</span>
                                            <div class="text-danger delete-row cursor-pointer">
                                                <i class="fa fa-trash f-20"></i>
                                            </div>
                                        </td>
                                        <td class="text-box-td">
                                            <textarea data-show="{{$show['dimension']}}" name="dimension[]" id="dimension" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['kpi']}}" name="kpi[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['operational']}}" name="operational[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['measure']}}" name="measure[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['frequency']}}" name="frequency[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['target']}}" name="target[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['stretchTarget']}}" name="stretchTarget[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['source']}}" name="source[]" id="" class="text-box" row="2" cols="20" placeholder="type here"></textarea>
                                        </td>
                                        <td class="text-box-td ">
                                            <textarea data-show="{{$show['kpiWeightage']}}" name="kpiWeightage[]" id="" class="text-box" row="2" cols="20" placeholder="type percentage value only" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 37'></textarea>
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


        <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
            <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
                <div class="modal-content">
                    <div class="modal-header py-2 bg-primary">

                        <div class="w-100 modal-header-content d-flex align-items-center py-2">
                            <h5 class="modal-title text-white" id="modalHeader">Success
                            </h5>
                            <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal" aria-label="Close">
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
    </div>
</div>

<!--  -->
@endsection