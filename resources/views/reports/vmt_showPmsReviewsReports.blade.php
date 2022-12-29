@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="vendor-wrapper mt-30 card">

        <div class="card-body">
            <h6 class="">PMS Reports</h6>

            <div class=" text-start mb-2">
                <span>
                    <b>Calendar Year</b>
                    <input type="text" name="calendar_type" id="dropdownCalender_year" readonly
                        value="{{ $query_configPms->calendar_type }}" />
                    {{-- <select placeholder="Select Calendar Type" style="width:auto;" aria-label=".form-select-sm example"
                        id="dropdownCalender_year" class="form-select form-select-sm">
                        <option name="financial_year" @if ($query_configPms->calendar_type == 'financial_year') selected @endif
                            value="financial_year">Financial Year</option>
                        <option name="calendar_year" @if ($query_configPms->calendar_type == 'calendar_year') selected @endif
                            value="calendar_year">Calendar Year</option>
                    </select> --}}
                </span>
            </div>

            <div class=" text-start mb-2">
                <span>
                    <b>Year</b>
                    <input type="text"  id="year" readonly
                        value="{{ $query_configPms->year }}" size="25" />

                </span>
            </div>

            <div class=" text-start mb-2">
                <span>
                    <b>Assignment Period</b>
                    <select placeholder="Select Calendar Type" style="width:auto;" aria-label=".form-select-sm example"
                        id="dropdownAssignment_period" class="form-select form-select-sm">
                        <option value="" selected>Select</option>
                        <option data-group="financial_year" name="Q1" value="q1">Q1 (Apr-Jun)</option>
                        <option data-group="financial_year" name="Q2" value="q2"> Q2 (Jul-Sept)</option>
                        <option data-group="financial_year" name="Q3" value="q3"> Q3 (Oct-Dec)</option>
                        <option data-group="financial_year" name="Q4" value="q4"> Q4 (Jan-March)</option>
                        <option data-group="calendar_year" name="Q1" value="q1">Q1 (Jan-March)</option>
                        <option data-group="calendar_year" name="Q2" value="q2"> Q2 (Apr-Jun)</option>
                        <option data-group="calendar_year" name="Q3" value="q3"> Q3 (Jul-Sept)</option>
                        <option data-group="calendar_year" name="Q4" value="q4"> Q4 (Oct-Dec)</option>
                        </option>
                    </select>
                </span>
            </div>



            <div class=" text-end mb-2">
                <button class="btn btn-orange me-2" id="btn_downloadReport">Download Report</button>
            </div>



            <div class="vendor-table-wrapper">
                <div id="employee-table" class="noCustomize_gridjs"></div>
            </div>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {


            var calenderType = $('#dropdownCalender_year').val();

            if (calenderType == 'financial_year') {
                document.getElementById("dropdownCalender_year").value = "Financial Year";
                console.log("1 " + calenderType);
                var sub = $('#dropdownAssignment_period');

                    sub.find('option').not(':first').hide();

                    $('option', sub).filter(function() {
                            console.log("Assign Period"+calenderType);
                        if ($(this).attr('data-group') == calenderType) {
                            $(this).show();

                        }
                    });


                    $('#dropdownCalender_year').trigger('change');

            } else if (calenderType == 'calender_year') {
                document.getElementById("dropdownCalender_year").innerHTML = "Calender Year";
                console.log("2" + calenderType);
            }



            $('#btn_downloadReport').on('click', function(e) {

                console.log("Download payroll reports....");
                let selectedCalenderType = calenderType.find(":selected").val();
                console.log(selectedCalenderType);
                let URL = '/reports/generatePmsReviewsReports?calender_type=' + selectedCalenderType +
                    '&_token={{ csrf_token() }}';
                console.log("Generated URL : " + URL);

                window.location = URL;




            });

            // $('#dropdownAssignment_period').on('change', function() {
            //     console.log($(this).find(":selected").val());
            //     var sub = $('#dropdownAssignment_period');

            //         sub.find('option').not(':first').hide();

            //         $('option', sub).filter(function() {
            //                 console.log("Assign Period"+calenderType);
            //             if ($(this).attr('data-group') == calenderType) {
            //                 $(this).show();

            //             }
            //         });


            //         $('#dropdownCalender_year').trigger('change');

            // });





        });
    </script>
@endsection
