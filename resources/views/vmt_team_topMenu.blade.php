@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">

@endsection
@section('content')

<div class="attendance-hierarchy-wrapper">
    <div class="row">
        <div class="col-12">
            <ul class="nav sub-topnav  topnav">
                <li routerlinkactive="active">
                    <a routerlink="directory" href="{{url('vmt-employess/directory')}}">Summary</a>
                </li>
                <li routerlinkactive="active" class="active">
                    <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Leave</a>
                </li>

                <li routerlinkactive="active">
                    <a routerlink="directory" href="{{url('vmt-employess/directory')}}">Attendance</a>
                </li>
                <li routerlinkactive="active" class="active">
                    <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Expenses & Trevel</a>
                </li>

                <li routerlinkactive="active">
                    <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Timesheet</a>
                </li>
                <li routerlinkactive="active" class="active">
                    <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Profile
                        change</a>
                </li>

                <li routerlinkactive="active">
                    <a routerlink="directory" href="{{url('vmt-employess/directory')}}">
                        Salary on
                        hold
                    </a>
                </li>

                <li routerlinkactive="active">
                    <a routerlink="directory" href="{{url('vmt-employess/directory')}}">
                    Performance
                    </a>
                </li>|


            </ul>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>


@endsection