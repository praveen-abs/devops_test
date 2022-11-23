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
        <div class="card shadow profile-box card-top-border border-0">
            <div class="form-control">
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-sm-12 col-xl-12">
                        <h6>  Employee Quick Onboarding</h6>
                        <div class="col col-form-label">
                            <ul class="list-style-numbered list-style-circle ">
                                <li>Download the
                                    {{-- <a class="choose-file ms-1" href="http://127.0.0.1:8000/assets/sample_employeeBulkOnboarding.xlsx" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        Sample file
                                    </a> --}}

                                    <a class="choose-file ms-1" href="{{ url('/assets/ABSQuickOnboarding.xlsx') }}" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i>Sample File</span></a>
                                </li>
                                <li>Read the upload instructions on the right before uploading .</li>
                                <li>Fill the information in excel template</li>
                                <li>
                                    <form method="POST" id='role-form'
                                        action="{{ url('vmt-employess/quick-onboarding/upload') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <span>Please Upload the employees details excel-sheet.</span>
                                            <span class="choose-file ms-1">
                                                <input name="file" type="file" required>
                                                <i class="fa fa-file" aria-hidden="true"></i>
                                                Choose file
                                            </span>
                                        </div>

                                            {{-- <div class="col-md-10">
                                                <input name="file" type="file" required>
                                            </div> --}}




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

                    <div class="col-md-6 ">
                        <!--  <div class="col-form-label">
                                    <h5> Upload Instructions</h4>
                                    <div class="alert alert-warning">Read these instructions before uploading the file.</div>
                                    <div>
                                    <ul class="list-style-circle"><li> Employee Number, First name, Last name, Display name, Email, Date of joining and Location fields are required to add employees in . </li><li> Either email or mobile number is required while adding employee incase of login with OTP </li><li> Date of Birth is required to show Upcoming birthdays notification in Home page widget, Income tax and Professional Tax calculation. </li><li> Gender is required to validate Statutory leave(Maternity or Paternity Leave) and Professional Tax Calculation. </li><li> PAN number is required to generate Bank Transfer statements for Salary payments. </li><li> Email id should be valid to receive all  notifications such as leave request notifications, Attendance request notification and Timesheet reminder notifications etc. </li><li> Employee email is unique across . So, cannot add same employee in two Organizations with same email. </li><li> Job Title is optional but it will help to identify employees in People picker search results when 2 or more employees have same Name. </li><li> Department is useful to search or filter employees by Department in few reports. </li><li> PAN information(Name on PAN, DOB on Pan, Father name on Pan) and Bank Information(Bank Payment Mode, Bank Name, IFSC code, Account Number, Name on Bank account) are required to generate Bank Transfer statements for Salary payments. </li><li> Provident Fund Information(PF Number, PF Joining date, Name on PF account, UAN), Aadhar Information(Aadhar number, Name on Aadhar, Aadhar enrollment number) are required for PF Monthly Electronic Return(ECR) and Reports. </li><li> ESI Information(ESI number) is required for ESI Reports. </li><li> Please check  email notifications in Junk / Spam / Filtered folders if they are not visible in Inbox. </li></ul>

                                    </div>
                                </div> -->
                    </div>
                </div>
            </div>



        </div><!-- end card -->
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
        </script>
    @endsection
