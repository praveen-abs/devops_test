@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="vendor-wrapper mt-30 card">

        <div class="card-body">
            <h6 class="">PMS Reports</h6>

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
                let URL = 'generatePmsReviewsReports';
                console.log("Generated URL : " + URL);

                window.location = URL;




            });



        });
    </script>
@endsection
