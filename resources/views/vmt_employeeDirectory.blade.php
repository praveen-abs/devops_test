@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Employee Directories @endslot
    @endcomponent
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row mb-3">
                <div class="card card-animate">
                        <div class="card-body">
                            <h5>Employee Directory</h5>
                        </div><!-- end card body -->
            </div>
            <div class="row">

                @foreach($vmtEmployees as $employee)
                <div class="col-xl-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm ">
                                   <img src="{{URL::asset('assets/images/vmt_user_icon.jpeg')}}">
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3" style="padding-left:36px;">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">{{$employee->emp_name}}</p>
                                    {{$employee->designation}}<br>
                                    <p class="text-muted mb-2">
                                    Department: <span style="color: #000; padding-left: 8px;">{{$employee->department}}</span></p>
                                    <p class="text-muted mb-2">Location: <span style="color: #000; padding-left: 8px;">{{$employee->location}}</span>
                                        <br>
                                    </p>
                                    <p class="text-muted mb-1">Email: <span style="color: #000; padding-left: 8px;">{{$employee->email_id}}</span></p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
                @endforeach
               
            </div><!-- end row -->

            
        </div><!-- end col -->

       
    </div><!-- end row -->

    
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
