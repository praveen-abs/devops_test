@extends('layouts.master')
{{-- @include('ui-onboarding')
 --}}
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    input {
        /* width: 100% !important;
        margin-left: 0 !important;
        height: 2.9em; */
    }

    #current_address_copy {
        height: 12px !important;
        width: 12px !important;
    }

    .addfiles {
        padding: 7px;
        border-radius: 2px;
    }
</style>
@endsection
@section('content')

@component('components.attendance_breadcrumb')
    @slot('li_1')
    @endslot
@endcomponent



    <div class="container-fluid ">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="">
                    <div id="msform">

                        <div class="card shadow  profile-box card-top-border p-2">
                            <div class="card-body">
                                <h6 class="mb-0 text-start">Daily Attendance</h6>

                                <div class="header-card-text text-end">
                                    <form method="GET" class="form-inline">
                                        <input type="date" name="date" value="{{\Request::get('date')}}" class="form-control" placeholder="select date" >

                                        <button class="btn  btn-primary" type="submit" >Apply</button>
                                </form>
                                </div>
                                <div class="form-card mb-2 mt-2">

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Employee Code</th>
                                                <th>Check-in Time </th>
                                                <th>Check-out Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>

                                                <td>{{$user->user_code}}
                                                </td>
                                                <td>{{$user->name}}
                                                </td>

                                                <td>{{$user->check_in_time ? $user->check_in_time : 'Absent' }}
                                                </td>

                                                <td>{{
                                                    $user->check_out_time ? $user->check_out_time : 'Absent'
                                                }}
                                                </td>



                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>




@endsection

@section('script')


<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>

<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
<!--Progressbar JS-->
<script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>

<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>


<script>







        // $("#button_close").click(function(){
        //     window.location.href = "/";
        // });
</script>


@endsection
