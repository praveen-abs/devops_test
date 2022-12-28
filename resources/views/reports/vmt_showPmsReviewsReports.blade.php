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
                    <select placeholder="Select Calendar Type" style="width:auto;" aria-label=".form-select-sm example"
                        id="dropdownCalender_year" class="form-select form-select-sm">
                        <option value="">Select</option>
                        <option name="financial_year" value="financial_year">Financial Year</option>
                        <option name="calendar_year" value="calendar_year">Calendar Year</option>

                        {{-- <option value="hr" @if ($data && $data->selected_head && 'hr' == $data->selected_head) selected @endif>HR --}}
                        </option>
                    </select>
                </span>
            </div>

            <div class=" text-start mb-2">
                <span>
                    <b>Assignment Period</b>
                    <select placeholder="Select Calendar Type" style="width:auto;" aria-label=".form-select-sm example"
                        id="dropdownAssignment_period" class="form-select form-select-sm">
                        <option value="" selected >Select</option>
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

            $('#btn_downloadReport').on('click', function(e) {

                console.log("Download payroll reports....");
                let selectedCalenderType = $('#dropdownCalender_year').find(":selected").val();
                console.log(selectedCalenderType);
                let URL = '/reports/generatePmsReviewsReports?calender_type=' + selectedCalenderType +
                    '&_token={{ csrf_token() }}';
                console.log("Generated URL : " + URL);

                window.location = URL;




            });

           $('#dropdownAssignment_period').on('change', function() {
                console.log($(this).find(":selected").val());
           });

            $(function() {
                $('#dropdownCalender_year').on('change', function() {
                    var val = $('#dropdownCalender_year').val();
                    console.log(val);
                    var sub = $('#dropdownAssignment_period');
                    if (val == "") {
                        $('#dropdownAssignment_period').find('option').hide();
                    } else {
                        sub.find('option').not(':first').hide();

                        $('option', sub).filter(function() {

                            if ($(this).attr('data-group') == val) {
                                $(this).show();

                            }
                        });
                    }


                });
                $('#dropdownCalender_year').trigger('change');
            });



        });
    </script>
@endsection
