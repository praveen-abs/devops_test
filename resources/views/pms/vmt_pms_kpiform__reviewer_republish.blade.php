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
<div class="loader" style="display:none;"></div>

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
        <div class="col-12">
            <div class="container-fluid mb-1 mt-3 ">
                <form id="kpiTableForm">
                    <input type="hidden" name="kpiAssignedId" value="{{ $kpiAssignedId }}">
                    <div class="row mb-3 d-flex align-items-center">
                        <div class="col-auto">
                            <label for="name">Form Name:</label>
                        </div>
                        <div class="col">
                            <input type="text"  disabled class="form-control" value="{{ $configHeaderFormName }}" required>
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
                                    @foreach($columnHeader as $config)
                                    <th class="sort" data-sort="customer_name"
                                        data-name='dimension' data-filterable="false">@if(isset($config)) {{ $config }} @endif</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="tbody content-container" id="tbody">
                                <?php $i = 1; ?>
                                @foreach($data as $formData)
                                <tr class="addition-content cursor-pointer" id="content1">
                                    <td class="text-box-td p-1">
                                        <span  name="numbers" id="" class="tableInp" >{{ $i }}</span>
                                    </td>
                                    @if(isset($columnHeader['dimension']))
                                    <td class="text-box-td">
                                        <textarea name="dimension[]" id="dimension" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->dimension }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['kpi']))
                                    <td class="text-box-td">
                                        <textarea name="kpi[]" id="kpi" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->kpi }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['operational']))
                                    <td class="text-box-td">
                                        <textarea name="operational[]" id="operational" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->operational_definition }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['measure']))
                                    <td class="text-box-td">
                                        <textarea name="measure[]" id="measure" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->measure }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['frequency']))
                                    <td class="text-box-td">
                                        <textarea name="frequency[]" id="frequency" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->frequency }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['target']))
                                    <td class="text-box-td">
                                        <textarea name="target[]" id="target" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->target }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['stretchTarget']))
                                    <td class="text-box-td">
                                        <textarea name="stretchTarget[]" id="stretchTarget" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->stretch_target }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['source']))
                                    <td class="text-box-td">
                                        <textarea name="source[]" id="source" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->source }}</textarea>
                                    </td>
                                    @endif
                                    @if(isset($columnHeader['kpiWeightage']))
                                    <td class="text-box-td">
                                        <textarea name="kpiWeightage[]" id="kpiWeightage" class="text-box" row="2" cols="20"
                                            placeholder="type here">{{ $formData->kpi_weightage }}</textarea>
                                    </td>
                                    @endif
                                    <?php $i++; ?>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
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

<!--Sweet alert JS-->
<script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
//Accessed when KPI form saved successfully
var isKPIFormSaved = false;

$(document).ready(function(){
    $('#save-table').click(function() {
        var form_data = new FormData(document.getElementById("kpiTableForm"));
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{ route('republishFormEdited') }}",
            dataType: "json",
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                swal('Success','Form Upadtes Successfully!','success');
                
                $('.loader').hide();
            },
            error: function(error) {
                $('.loader').hide();
            }
        });
    });
});
</script>

@endsection
