@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/employee_bulk.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
@endsection
@section('content')

{{-- @component('components.organization_breadcrumb')
@slot('li_1') @endslot
@endcomponent --}}

    <div class="uploadEmployee-wrpper mt-30 ">
        <div class="border-0 shadow card profile-box card-top-border">
            <div class="form-control">
                <div class="row">
                    <div class="col-md-5 col-xl-5 col-sm-12">
                        <h6 class="text-xl font-semibold"> Employee Quick Onboarding</h6>
                        <div class="col col-form-label">
                            <ul class="list-style-numbered ">
                                <li class="my-4"><i class="text-green-500 fa fa-step-forward" aria-hidden="true"></i> Download the
                                    {{-- <a class="choose-file ms-1" href="http://127.0.0.1:8000/assets/sample_employeeBulkOnboarding.xlsx" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                          <p class="mx-4">Sample file</p>
                                    </a> --}}

                                    <a class="choose-file ms-1" href="{{ url('/assets/ABSQuickOnboarding.xlsx') }}" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i>Sample File</span></a>
                                </li>
                                <li class="my-4"><i class="text-green-500 fa fa-step-forward" aria-hidden="true"></i> Read the upload instructions on the right before uploading .</li>
                                <li class="my-4"><i class="text-green-500 fa fa-step-forward" aria-hidden="true"></i> Fill the information in excel template</li>
                                <li class="my-4">
                                    <form method="POST" id='role-form'
                                        action="{{ url('vmt-employess/quick-onboarding/upload') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <!-- <span class="">Please Upload the employees details excel-sheet.</span> -->
                                            <div class="p-2 my-4 bg-gray-100 rounded-lg">
                                                  <span class="choose-file ms-1">
                                                <input name="file" type="file" required>
                                                <i class="fa fa-file" aria-hidden="true"></i>
                                                Choose file
                                            </span>
                                            <span style="width: 500px;" class="mx-4 text-bold" id="uploaded_doc"></span>
                                        </div>
                                            <!-- <span class="choose-file ms-1">
                                                <input name="file" type="file" required>
                                                <i class="fa fa-file" aria-hidden="true"></i>
                                                Choose file
                                            </span> -->
                                        </div>

                                            {{-- <div class="col-md-10">
                                                <input id="upload_doc" name="file" type="file" required>
                                            </div> --}}

                                            <span style="width: 500px;" class="font-bold" id="uploaded_doc"></span>




                                            <div class="text-end">
                                                <button type="submit" class="btn btn-orange">Upload</button>
                                            </div>

                                        <div class="">

                                                <p id="success-msg"></p>
                                                <p id="error-msg"></p>


                                        </div>
                                    </form>
                                </li>
                            </ul>

                            </form>
                        </div>
                    </div>

                    <div class="col-md-7 ">
                        <div class="col-form-label">
                            <h6 > Upload Instructions</h4>
                                <div class="py-2 my-4 alert f-12 alert-warning"><i class='fa fa-warning text-danger'></i> Read
                                    these instructions before uploading the file.</div>
                                <div>
                                    <ul class="list-style" style="">
                                        <li class="my-4"><i class="text-green-500 fa fa-check" aria-hidden="true"></i> Employee Number,Employee Name, Email, Date of joining
                                            and Location fields are required to add employees in.</li>
                                        <li class="my-4"><i class="text-green-500 fa fa-check"></i> Enter  mobile number is mandatory while adding employee </li>
                                 
                              
                                        <li class="my-4"><i class="text-green-500 fa fa-check"></i> Email id should be valid to receive all notifications such as leave request
                                            notifications, Attendance request notification and Timesheet reminder
                                            notifications etc. </li>

                                        <li class="my-4"> <i class="text-green-500 fa fa-check"></i> Employee email is unique across . So, cannot add same employee in two
                                            Organizations with same email. </li>

                                        <li class="my-4"><i class="text-green-500 fa fa-check"></i> Designation is mandatory since it will help to identify employees in People picker
                                            search results when 2 or more employees have same Name. </li>
                                        <li class="my-4"><i class="text-green-500 fa fa-check"></i> Please check email notifications in Junk / Spam / Filtered folders if they are
                                            not visible in Inbox. </li>
                                        <!---->
                                    </ul>

                                </div>
                        </div>
                    </div>
                </div>
            </div>



        </div><!-- end card -->
        {{-- </div>end col --}}
        {{-- </div>end row --}}
        <div style="z-index: 11">
            <div id="borderedToast2" class="mt-3 overflow-hidden toast toast-border-success" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                            <i class="align-middle ri-checkbox-circle-fill"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0" id="alert-msg">Yey! Everything worked!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <!-- ui notifications -->

        <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
        <!-- apexcharts -->

        <!-- dashboard init -->

        <script type="text/javascript">
            $('#role-form').on('submit', function(e) {
                e.preventDefault();
                $('#error-msg').html('Please wait. Uploading....');
                $('#success-msg').html('');
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
                    success: function(ajaxData) {
                        console.log("Got response....");
                        console.log("Status message : "+ajaxData.status);
                        console.log(ajaxData);
                        Swal.fire({
                            title: data.message,
                            text: data.status,
                            type: "success"
                        }).then(function() {
                            location.reload();
                        });

                        $('#error-msg').html('');
                        $('#error-msg').append('<b>Upload Status : <br/></b>');
                        $('#error-msg').append(ajaxData.message+' : <br/>');

                        console.log('Data array length : '+ajaxData.data.length);

                        for(var i=0; i < ajaxData.data.length; i++)
                        {
                            var row_data = ajaxData.data[i];
                            $('#error-msg').append('<ul><li><b>'+ row_data.message+ '<b/></li></ul>');

                            if(ajaxData.status == 'failure'){

                                var json_error_fields = JSON.parse(row_data.error_fields);
                                var keys = Object.keys(json_error_fields);

                                for(var j=0;j<keys.length;j++)
                                {
                                        $('#error-msg').append('<p>&emsp;'+ json_error_fields[keys[j]]+ '</p>');
                                }
                            }

                            console.log(row_data.message);

                        }//for
                    },
                    error: function(data) {
                        //console.log('error', data);
                        $('#error-msg').html(data.responseText);
                    }
                })
                //console.log($('#role-form').serialize());
            });


       $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#uploaded_doc").html(fileName)
        });
    });
        </script>
    @endsection
