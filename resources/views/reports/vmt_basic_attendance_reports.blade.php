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

        #loading {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 100;
            width: 100vw;
            height: 100vh;
            background-color: rgba(192, 192, 192, 0.5);
            background-image: url("https://i.stack.imgur.com/MnyxU.gif");
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <div class="parollReports-wrapper mt-30 " >
        <div class="card" >
            <div class="card-body">
                <div class="row mb-3" >
                    <div class="col-3" >
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
                    <div  class="col-3">
                        <label for=""> Month</label>
                        <select id="dropdown_attendance_month" class="form-select " style="">
                            <option value="all" selected>---Select Month----</option>
                            {{-- <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option> --}}



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
                        <button id="generate_btn" class="btn btn-orange " style="margin-top:22px"><i
                                class="fa fa-file-o me-2"></i>Generate</button>
                    </div>

                </div>

                <div class="row" >
                    <div class="col-12">

                    </div>

                </div>

            </div>
        </div>
        <div id="loading"></div>
    </div>
@endsection
@section('script')

    <script>
           $(document).ready(function(){

            $('#dropdown_attendance_year').on('change',function(){
                let selectedYear= $('#dropdown_attendance_year').val();
                $.ajax({
                    url: "{{ route('fetchAttendanceMonthForGivenYear') }}",
                    type: 'GET',
                    contentType: "text/plain",
                    dataType: 'json',
                    data: {
                        attendance_year: selectedYear,
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
                                month = "January";
                            } else if (monthsArray[i] == 02) {
                                month = "February";
                            } else if (monthsArray[i] == 03) {
                                month = "March";
                            } else if (monthsArray[i] == 04) {
                                month = "April";
                            } else if (monthsArray[i] == 05) {
                                month = "May";
                            } else if (monthsArray[i] == 06) {
                                month = "June";
                            } else if (monthsArray[i] == 07) {
                                month = "July";
                            } else if (monthsArray[i] == 08) {
                                month = "August";
                            } else if (monthsArray[i] == 09) {
                                month = "September";
                            } else if (monthsArray[i] == 10) {
                                month = "October";
                            } else if (monthsArray[i] == 11) {
                                month = "November";
                            } else if (monthsArray[i] == 12) {
                                month = "December";
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

            $('#generate_btn').on('click',function(){
                let year= $('#dropdown_attendance_year').val();
                let month=$('#dropdown_attendance_month').val();
                let month_name=$('#dropdown_attendance_month option:selected').text();
                $.ajax({
                        type: 'GET',
                        url: '{{ route("basicAttendanceReport") }}',
                        data: {
                                year:year,
                                month:month,
                                "_token": "{{ csrf_token() }}"
                        },
                        xhrFields:{
                                    responseType: 'blob'
                         },
                beforeSend: function() {
                    $("#loader").show();
               },
                success: function(data) {
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(data);
                link.download =  year+' - '+month_name+` Basic Report.xlsx`;
                 link.click();
               },
               error: function(data) {
                //
               },
               complete:function(data){
                     $("#loader").hide();

                }
        });
            });
           });
    </script>
@endsection
