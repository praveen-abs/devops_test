@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="vendor-wrapper mt-30 card">

         <div class="card-body">
            <h6 class="">Payroll Reports</h6>

            <div class=" text-end mb-2">
                <button class="btn btn-orange me-2" id="btn_downloadReport">Download Report</button>
            </div>


            <div class=" text-start mb-2">
                <span>
                    <b>Payroll Month</b>
                    <select id="dropdown_payroll_month" class="form-select form-select-sm" style="width:auto;" aria-label=".form-select-sm example">
                        @foreach($payroll_months as $key => $value)
                            <option value="{{ $value }}"
                            {{-- @if( !empty($currentClientID) && $currentClientID == $client->id) selected  @endif --}}
                            >
                                {{$key}}
                            </option>
                        @endforeach
                    </select>
                </span>
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

            // $('#dropdown_payroll_month').on('change', function() {
            //     console.log("Selected payroll month : "+$(this).find(":selected").val());
            // });

           // $('#dropdown_payroll_month').find(":selected");

            // if (document.getElementById("employee-table")) {
            //     const grid = new gridjs.Grid({
            //         columns: [{
            //                 id: 'number',
            //                 name: 'id',
            //                 hidden: true

            //             },
            //             {
            //                 id: 'name ',
            //                 name: 'Employee Name',

            //             },
            //             {
            //                 id: 'month',
            //                 name: 'Month',
            //             },

            //         ],
            //         pagination: {
            //             limit: 10
            //         },
            //         sort: true,
            //         search: true,
            //         server: {
            //             url: '{{ route('fetchAllEmployeePayrollDetails', ['payroll_month' => 'sss']) }}',
            //             then: data => data.map(
            //                 employee => [
            //                     employee.id,
            //                     employee.name,
            //                 ]
            //             )
            //         }



            //     }).render(document.getElementById("employee-table"));


            // }



        });
        $('#btn_downloadReport').on('click', function(e) {
            let selectedPayRollMonth = $('#dropdown_payroll_month').find(":selected").val();
            $.ajax({
                    url: "{{ route('generatePayrollReports') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        "payroll_month":selectedPayRollMonth,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log("Downloading excelsheet....");
                        var url = window.URL || window.webkitURL;
                        var objectUrl = url.createObjectURL(data);
                        window.open(objectUrl);

                    },
                    error: function(data) {


                    }
            });

        });
    </script>
@endsection
