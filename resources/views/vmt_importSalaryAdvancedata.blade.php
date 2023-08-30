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

<div>

@vite('resources/js/hrms/modules/salary_loan_setting/salary_advance_excel_import/salary_advance_excel_import.js')
<div id="salary_advance_excel_import"></div>

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
                //$('#error-msg').html('Please wait. Uploading....');
               $('#success-msg').html('');
                var formData = new FormData(this);
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
                        if(ajaxData.status == 'success'){
                            Swal.fire({
                            title: ajaxData.message,
                            text: ajaxData.status,
                            type: "success"
                        })
                        }


                       // $('#error-msg').html('');
                      // $('#error-msg').append('<b>Upload Status : <br/></b>');
                       // $('#error-msg').append(ajaxData.message+' : <br/>');

                       // console.log('Data array length : '+ajaxData.data.length);

                        // for(var i=0; i < ajaxData.data.length; i++)
                        // {
                        //     var row_data = ajaxData.data[i];
                        //     $('#error-msg').append('<ul><li><b>'+ row_data.message+ '<b/></li></ul>');

                        //     if(ajaxData.status == 'failure'){

                        //         var json_error_fields = JSON.parse(row_data.error_fields);
                        //         var keys = Object.keys(json_error_fields);

                        //         for(var j=0;j<keys.length;j++)
                        //         {
                        //                 $('#error-msg').append('<p>&emsp;'+ json_error_fields[keys[j]]+ '</p>');
                        //         }
                        //     }

                        //     console.log(row_data.message);

                        // }//for
                    },
                    error: function(data) {
                        //console.log('error', data);
                       // $('#error-msg').html(data.responseText);
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
