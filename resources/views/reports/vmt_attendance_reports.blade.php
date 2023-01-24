@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

    <style>
        .dt-button {
            transition: 0.4s ease-in;
            font-weight: 600;
            padding: 5px 8px;
            font-size: 13px;
            border: 1px solid #ee6a04;
            background-color: transparent;
            color: #ee6a04;
            border-radius: 5px;
            margin: 5px 5px 0px 0px;
            float: right;
        }
    </style>
@endsection

@section('content')
    <div class="parollReports-wrapper mt-30 ">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="">year</label>
                        <select id="dropdown_attendance_year" class="form-select ">
                            <option value="all" selected>---Select Year----</option>
                            @foreach ($attendance_available_years as $key => $value)
                                <option value="{{ $value }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-3">
                        <label for=""> Month</label>
                        <select id="dropdown_attendance_month" class="form-select " style="">
                            <option value="All">---All Month----</option>
                        </select>

                    </div>
                    {{-- <div class="col-3">
                        <label for="">Designation</label>
                        <select id="dropdown_designation" class="form-select " style=""
                            aria-label=".form-select-sm example">
                            <option value="all">---Select All----</option>
                            @foreach ($designation as $key => $value)
                                <option value="{{ $value }}"> {{ $value }} </option>
                            @endforeach
                        </select>

                    </div> --}}

                    <div class="col-3 d-flex align-items-center justify-content-end text-end">
                        <button id="loadData" class="btn btn-orange " style="margin-top:22px"><i
                                class="fa fa-file-o me-2"></i>Generate</button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">


                        <div id="employee-table" class="noCustomize_gridjs">


                            <div class="table-responsive">
                                <table id="attendanceReportTable" class="display table table-striped nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Emp Code</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>In Punch</th>
                                            <th>Out Punch</th>
                                            <th>Regularization Type</th>
                                            <th>status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>





    <script>
        $(document).ready(function() {
            //Ajax For Month For Given Year
            var selectedAttendanceYear = $('#dropdown_attendance_year').find(":selected").val();
            $('#dropdown_attendance_year').on('change', function() {
                var selectedAttendanceYear = $('#dropdown_attendance_year').find(":selected").val();
                $.ajax({
                    url: "{{ route('fetchAttendanceForGivenYear') }}",
                    type: 'GET',
                    contentType: "text/plain",
                    dataType: 'json',
                    data: {
                        attendance_year: selectedAttendanceYear,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        var monthsArray = Object.values(data);
                        //console.log(monthsArray);
                        var len = monthsArray.length;
                        //console.log(len);
                        $("#dropdown_attendance_month").empty();
                        for (var i = 0; i < len; i++) {
                            var month;
                            if (monthsArray[i] == 01) {
                                month = "Jan";
                            } else if (monthsArray[i] == 02) {
                                month = "Feb";
                            } else if (monthsArray[i] == 03) {
                                month = "Mar";
                            } else if (monthsArray[i] == 04) {
                                month = "Apr";
                            } else if (monthsArray[i] == 05) {
                                month = "May";
                            } else if (monthsArray[i] == 06) {
                                month = "Jun";
                            } else if (monthsArray[i] == 07) {
                                month = "Jul";
                            } else if (monthsArray[i] == 08) {
                                month = "Aug";
                            } else if (monthsArray[i] == 09) {
                                month = "Sep";
                            } else if (monthsArray[i] == 10) {
                                month = "Oct";
                            } else if (monthsArray[i] == 11) {
                                month = "Nov";
                            } else if (monthsArray[i] == 12) {
                                month = "Dec";
                            }
                            console.log(month);


                            $("#dropdown_attendance_month").append("<option value='" +
                                monthsArray[i] + "'>" + month +
                                "</option>");

                        }

                    },
                    error: function(e) {
                        console.log("There was an error with your request...");
                        console.log("error: " + JSON.stringify(e));
                    }
                });
            });


            $("#attendanceReportTable").DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        title: selectedAttendanceYear + " - Payroll Report",
                    },
                    {
                        extend: 'excel',
                        title: selectedAttendanceYear + " - Payroll Report",
                    },
                    {
                        extend: 'csv',
                        title: selectedAttendanceYear + " - Payroll Report",
                    },
                    {
                        extend: 'print',
                        title: selectedAttendanceYear + " - Payroll Report",
                    },
                ],

            });





            $("#loadData").click(function() {
                //loadData();
                var selectedAttendanceMonth = $('#dropdown_attendance_month').find(":selected").val();
                var selectedAttendanceYear = $('#dropdown_attendance_year').find(":selected").val();
                // var designation = $('#dropdown_designation').find(":selected").val();

                $.ajax({
                    url: "{{ route('fetchAttendanceInfo') }}",
                    type: 'GET',
                    contentType: "text/plain",
                    dataType: 'json',
                    data: {
                        attendance_month: selectedAttendanceMonth,
                        attendance_year: selectedAttendanceYear,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#attendanceReportTable").DataTable().clear();
                        var length = Object.keys(data).length;
                        //console.log(Object.values(data));
                        console.log("sfsfs", length);
                        for (var i = 0; i < length; i++) {
                            console.log(data[i].user_code);
                            // $('#attendanceReportTable').dataTable().fnAddData([
                            //     data[i].user_code,
                            //     data[i].name,
                            //     data[i].DESIGNATION,
                            //     data[i].checkin_time,
                            //     data[i].checkout_time,
                            //     data[i].regularization_type,
                            //     data[i].status,
                            // ]);
                        }
                    },
                    error: function(e) {
                        console.log("There was an error with your request...");
                        console.log("error: " + JSON.stringify(e));
                    }
                });
            });







        });
    </script>
@endsection
