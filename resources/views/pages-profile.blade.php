@extends('layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}">
@endsection
@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ URL::asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                        alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{Auth::user()->name}}</h3>
                    <p class="text-white-75">User</p>
                    <div class="hstack text-white-50 gap-1">

                    </div>
                </div>
            </div>
            <!--end col-->
 
            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                       
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="pages-profile-settings" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">


                                @hasrole("Employee")
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

                                    <p class="text-muted mb-1">Mobile: <span style="color: #000; padding-left: 8px;">{{$employee->mobile_number}}</span></p>
                                    <p class="text-muted mb-1">Email: <span style="color: #000; padding-left: 8px;">{{$employee->email_id}}</span></p>

                                    <p class="text-muted mb-1">Date Of Birth: <span style="color: #000; padding-left: 8px;">{{$employee->dob}}</span></p>
                                    <p class="text-muted mb-1">Joining Date: <span style="color: #000; padding-left: 8px;">{{$employee->doj}}</span></p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                                @else

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Full Name </th>
                                                        <td class="text-muted">Ram</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                        <td class="text-muted">9876543210</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">daveadame@abs.com</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted">India
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted">24 Nov 2021</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                                @endhasrole
 
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Skills</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Photoshop</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">illustrator</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Javascript</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                        </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/swiper/swiper.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
