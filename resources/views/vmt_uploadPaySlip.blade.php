@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/employee_bulk.css') }}" rel="stylesheet">
@endsection

@section('content')
@component('components.payroll_breadcrumb')
@slot('li_1') @endslot
@endcomponent
<div class="upload-payslip-wrapper">
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow profile-box card-top-border ">
                <div class="form-control">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="col-form-label">
                                <h5 class=""> Upload Data</h5>
                                <div class="col col-form-label">
                                    <ul class="list-style-numbered list-style-circle p-4">
                                        <form method="POST" id='role-form' action="{{url('/vmt-payslip')}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <li>Download the
                                                <a href="{{ url('/assets/payslip_sheet.xls')  }}" target="_blank">
                                                    <span class="text-link" style=" color: blue;">Sample File</span></a>

                                            </li>
                                            <li>Read the upload instructions on the right before uploading .</li>
                                            <li>Fill the information in excel template</li>
                                            <li>Upload the excel sheet <input name="file" type="file">
                                                <button type="submit" class=" btn btn-primary">Upload</button>
                                                <span container="body" class="icon ic-info cursor-pointer"></span>
                                            </li>
                                    </ul>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 ">
                            <div class="col-form-label">
                                <h5> Upload Instructions</h5>
                                <div class="alert alert-warning">Read these instructions before uploading the file.
                                </div>
                                <div>
                                    <ul class="list-style-circle">
                                        <li class="pl-28"> Client Code, Client Name, Billing Currency, Project Code,
                                            Project
                                            Name, Start Date, Billing Type are required to create new projects and
                                            clients.
                                        </li>

                                        <li class="pl-28">To add new project under existing client, client name and
                                            client
                                            code given in excel should be same as client name and client code</li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--   <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                </div>

                <div class="card-body  pb-2">
                    <xhr-file-upload>
                                    <div class="d-inline-flex justify-content-center align-items-center">
                                        <div containerclass="max-w-300" container="body" class="d-inline-block position-relative"><button class="btn btn-sm btn-primary">Upload Excel File</button><input type="file" name="fileupload" class="input-file" accept=".xlsx"></div>
                                        <div class="ml-8"><span containerclass="max-w-300" container="body" class="icon ic-info cursor-pointer"></span>

                            </div>
                            <xhr-file-upload>
                                  

                    <div> --}}
                {{--   <form method="POST" id='role-form' action="{{url('/vmt-payslip')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Select Files</label>
                    <div class="col-md-10">
                        <input name="file" type="file">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="text-end col-xl-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form> --}}
            </div>
        </div><!-- end card body -->
    </div>
    {{-- </div>end col --}}
    {{-- </div>end row --}}
    <div style="z-index: 11">
        <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-checkbox-circle-fill align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0" id="alert-msg">Yey! Everything worked!</h6>
                    </div>
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

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
$('#role-form').on('submit', function(e) {
    e.preventDefault();

    //var formData = new FormData(this);
    var roleUri = $('#role-form').attr('action');
    console.log(roleUri);

    $.ajax({
        type: "POST",
        url: roleUri,
        enctype: 'multipart/form-data',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data) {
            $('#alert-msg').html(data);
            var toastLiveExample3 = document.getElementById("borderedToast2");
            var toast = new bootstrap.Toast(toastLiveExample3);
            toast.show();
            //alert(data); // show response from the php script.
        }
    })
    //console.log($('#role-form').serialize());
});
</script>
@endsection