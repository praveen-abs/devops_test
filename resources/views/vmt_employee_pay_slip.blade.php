@extends('layouts.master')
@section('css')

    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection


@section('content')
@component('components.payroll_breadcrumb')
@slot('li_1')  @endslot
@endcomponent
    

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"><!-- Please Fill Form --></h4>
                </div><!-- end card header -->

                <div class="card-body  pb-2">
                    <div>
                        <form method="GET" id='role-form' action="{{url('vmt-payslip-pdf')}}">
                            
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Select Employee</label>
                                <div class="col-md-9">
                                    <select class="form-select" name="id" required>
                                        <option>Select Employee</option>
                                        @foreach($employees as $user)
                                            <option value="{{$user->EMP_NO}}">{{$user->EMP_NAME .' ('.$user->EMP_NO.')'}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            <div class="row mt-2">
                                <div class="text-end col-xl-12">
                                    <button type="submit" class="btn btn-primary">Generate PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
<div style="z-index: 11">
    <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true" >
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
    <script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
    <!-- apexcharts -->

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        
       

       /* $('#role-form').on('submit', function(e){
            e.preventDefault();
            var roleUri = $('#role-form').attr('action');
            console.log(roleUri);

            $.ajax({
                type: "GET",
                url: roleUri,
                data: $('#role-form').serialize(), // serializes the form's elements.
                success: function(data)
                {
                  $('#alert-msg').html(data);
                  var toastLiveExample3 = document.getElementById("borderedToast2");
                    var toast = new bootstrap.Toast(toastLiveExample3);
                    toast.show();
                  //alert(data); // show response from the php script.
                }
            })
            //console.log($('#role-form').serialize());
        });*/

    </script>
@endsection
