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

                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Full Name </th>
                                                        <td class="text-muted">{{$employee->emp_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Designation </th>
                                                        <td class="text-muted">{{$employee->designation}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Department</th>
                                                        <td class="text-muted">{{$employee->department}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile</th>
                                                        <td class="text-muted">{{$employee->mobile_number}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail</th>
                                                        <td class="text-muted">{{$employee->email_id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location</th>
                                                        <td class="text-muted">{{$employee->location}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted">{{$employee->doj}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Date Of Birth:</th>
                                                        <td class="text-muted">{{$employee->dob}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- <p class="text-uppercase fw-medium text-muted text-truncate mb-3"></p>
                                    {{$employee->designation}}<br>
                                    <p class="text-muted mb-2">
                                    Department: <span style="color: #000; padding-left: 8px;">{{$employee->department}}</span></p>
                                    <p class="text-muted mb-2">Location: <span style="color: #000; padding-left: 8px;"></span>
                                        <br>
                                    </p>

                                    <p class="text-muted mb-1">Mobile: <span style="color: #000; padding-left: 8px;">{{$employee->mobile_number}}</span></p>
                                    <p class="text-muted mb-1">Email: <span style="color: #000; padding-left: 8px;">{{$employee->email_id}}</span></p>

                                    <p class="text-muted mb-1"> <span style="color: #000; padding-left: 8px;">{{$employee->dob}}</span></p>
                                    <p class="text-muted mb-1">Joining Date: <span style="color: #000; padding-left: 8px;">{{$employee->doj}}</span></p> -->
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                            @else


                            @endhasrole

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"> <img class="rounded-circle header-profile-user"
                                                src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                                alt="Header Avatar"></a>
                                    </div>
                                </div>
                                <div class="profile-basic justify-content-center d-flex">
                                    <div class="row w-100">
                                        <div class="col-md-5">
                                            <div class="profile-info-left h-100">
                                                <h3 class="user-name m-t-0  mb-0">John Doe</h3>
                                                <h6 class="text-muted">UI/UX Design Team</h6>
                                                <h5 class="text-muted">Web Designer</h5>
                                                <div class="staff-id">Employee ID : FT-0001</div>
                                                <div class="small doj text-muted">Date of Join : 1st Jan 2013</div>
                                                <div class="staff-msg mt-4 "><a class="btn btn-custom" href="chat.html">
                                                        <button class="btn btn-primary">Send Message</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">9876543210</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href="">johndoe@example.com</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text">24th July</div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text">1861 Bayonne Ave, Manchester Township, NJ, 08759
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">Male</div>
                                                </li>
                                                <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img class="rounded-circle header-profile-user"
                                                                    src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                                                    alt="Header Avatar">
                                                            </div>
                                                        </div>
                                                        <a href="profile.html">
                                                            Jeffery Lalor
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-bs-toggle="tab"
                                    class="nav-link active">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="#bank_statutory" data-bs-toggle="tab" class="nav-link">Bank
                                    &amp;
                                    Statutory <small class="text-danger">(Admin Only)</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">

                <div id="emp_profile" class="pro-overview tab-pane fade active show">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Personal Informations
                                        
                                    </h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Passport No.</div>
                                            <div class="text">9876543210</div>
                                        </li>
                                        <li>
                                            <div class="title">Passport Exp Date.</div>
                                            <div class="text">9876543210</div>
                                        </li>
                                        <li>
                                            <div class="title">Tel</div>
                                            <div class="text"><a href="">9876543210</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Nationality</div>
                                            <div class="text">Indian</div>
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            <div class="text">Christian</div>
                                        </li>
                                        <li>
                                            <div class="title">Marital status</div>
                                            <div class="text">Married</div>
                                        </li>
                                        <li>
                                            <div class="title">Employment of spouse</div>
                                            <div class="text">No</div>
                                        </li>
                                        <li>
                                            <div class="title">No. of children</div>
                                            <div class="text">2</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Emergency Contact </h3>
                                    <h5 class="section-title">Primary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            <div class="text">John Doe</div>
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            <div class="text">Father</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            <div class="text">9876543210, 9876543210</div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h5 class="section-title">Secondary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            <div class="text">Karen Wills</div>
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            <div class="text">Brother</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            <div class="text">9876543210, 9876543210</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Bank information</h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Bank name</div>
                                            <div class="text">ICICI Bank</div>
                                        </li>
                                        <li>
                                            <div class="title">Bank account No.</div>
                                            <div class="text">159843014641</div>
                                        </li>
                                        <li>
                                            <div class="title">IFSC Code</div>
                                            <div class="text">ICI24504</div>
                                        </li>
                                        <li>
                                            <div class="title">PAN No</div>
                                            <div class="text">TC000Y56</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Family Informations</h3>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Relationship</th>
                                                    <th>Date of Birth</th>
                                                    <th>Phone</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Leo</td>
                                                    <td>Brother</td>
                                                    <td>Feb 16th, 2019</td>
                                                    <td>9876543210</td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a aria-expanded="false" data-bs-toggle="dropdown"
                                                                class="action-icon dropdown-toggle" href="#"><i
                                                                    class="ri-more-2-fill material-icons"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i
                                                                        class=" ri-pencil-fill m-r-5"></i> Edit</a>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="  ri-delete-bin-5-fill-o m-r-5"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations </h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and
                                                            Science
                                                            (UG)</a>
                                                        <div>Bsc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and
                                                            Science
                                                            (PG)</a>
                                                        <div>Msc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Experience </h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Basic Salary Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Salary basis <span
                                                    class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-1-ecvr" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-3-iget">Select salary basis type
                                                </option>
                                                <option>Hourly</option>
                                                <option>Daily</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-2-xiji"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-hgdl-container"
                                                        aria-controls="select2-hgdl-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-hgdl-container" role="textbox"
                                                            aria-readonly="true" title="Select salary basis type">Select
                                                            salary basis
                                                            type</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Salary amount <small class="text-muted">per
                                                    month</small></label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="text" class="form-control"
                                                    placeholder="Type your salary amount" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Payment type</label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-4-dj2y" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-6-iwpp">Select payment type
                                                </option>
                                                <option>Bank transfer</option>
                                                <option>Check</option>
                                                <option>Cash</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-5-s3wp"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-37e7-container"
                                                        aria-controls="select2-37e7-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-37e7-container" role="textbox"
                                                            aria-readonly="true" title="Select payment type">Select
                                                            payment type</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> PF Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">PF contribution</label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-7-w8sh" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-9-r0ka">Select PF contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-8-lbfb"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-k79s-container"
                                                        aria-controls="select2-k79s-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-k79s-container" role="textbox"
                                                            aria-readonly="true" title="Select PF contribution">Select
                                                            PF contribution</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">PF No. <span
                                                    class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-10-v11n" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-12-3a7c">Select PF contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-11-0xtt"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-ku2h-container"
                                                        aria-controls="select2-ku2h-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-ku2h-container" role="textbox"
                                                            aria-readonly="true" title="Select PF contribution">Select
                                                            PF contribution</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-13-sglc" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-15-o5s2">Select PF contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-14-t7xx"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-zo26-container"
                                                        aria-controls="select2-zo26-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-zo26-container" role="textbox"
                                                            aria-readonly="true" title="Select PF contribution">Select
                                                            PF contribution</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-16-y0rb" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-18-nnwh">Select additional rate
                                                </option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-17-ouwe"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-cc48-container"
                                                        aria-controls="select2-cc48-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-cc48-container" role="textbox"
                                                            aria-readonly="true" title="Select additional rate">Select
                                                            additional rate</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-19-dbno" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-21-ajce">Select PF contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-20-rwtr"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-qvdw-container"
                                                        aria-controls="select2-qvdw-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-qvdw-container" role="textbox"
                                                            aria-readonly="true" title="Select PF contribution">Select
                                                            PF contribution</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-22-ah6g" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-24-ngjq">Select additional rate
                                                </option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-23-46iu"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-ij1t-container"
                                                        aria-controls="select2-ij1t-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-ij1t-container" role="textbox"
                                                            aria-readonly="true" title="Select additional rate">Select
                                                            additional rate</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> ESI Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">ESI contribution</label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-25-9ci2" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-27-u74r">Select ESI contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-26-tskv"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-r6du-container"
                                                        aria-controls="select2-r6du-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-r6du-container" role="textbox"
                                                            aria-readonly="true" title="Select ESI contribution">Select
                                                            ESI contribution</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">ESI No. <span
                                                    class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-28-mjdh" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-30-7ur7">Select ESI contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-29-nbip"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-un38-container"
                                                        aria-controls="select2-un38-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-un38-container" role="textbox"
                                                            aria-readonly="true" title="Select ESI contribution">Select
                                                            ESI contribution</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Employee ESI rate</label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-31-k78f" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-33-6bk0">Select ESI contribution
                                                </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-32-7jw0"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-5oth-container"
                                                        aria-controls="select2-5oth-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-5oth-container" role="textbox"
                                                            aria-readonly="true" title="Select ESI contribution">Select
                                                            ESI contribution</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Additional rate <span
                                                    class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-34-23ui" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-36-9t77">Select additional rate
                                                </option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-35-uyht"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-vkjw-container"
                                                        aria-controls="select2-vkjw-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-vkjw-container" role="textbox"
                                                            aria-readonly="true" title="Select additional rate">Select
                                                            additional rate</span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- profile info modal -->

            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-3 new-role-header d-flex align-items-center">
                            <h4 class="modal-title mb-1 text-primary">Profile Information</h4>
                            <hr class="bottom-dash">
                            <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">

                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle">
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" value="John">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" value="Doe">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Birth Date</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control datetimepicker" type="text"
                                                            value="05/06/1985">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Gender</label>


                                                <select class="form-select  " aria-label="Default select">
                                                    <option selected>-</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="4487 Snowbird Lane">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>State</label>
                                            <input type="text" class="form-control" value="New York">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Country</label>
                                            <input type="text" class="form-control" value="United States">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Pin Code</label>
                                            <input type="text" class="form-control" value="10523">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" value="631-889-3206">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="select-menu form-control  ">

                                            <div class="select-btn">
                                                <span class="sBtn-text text-muted">--Select Gender--</span>
                                                <i class="bx bx-chevron-down mx-3 text-muted"></i>
                                            </div>

                                            <ul class="options ">
                                                <li class="option">

                                                    <span class="option-text">Male</span>
                                                </li>
                                                <li class="option">

                                                    <span class="option-text">Female</span>
                                                </li>
                                                <li class="option">

                                                    <span class="option-text">Other</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="select-menu form-control">

                                            <div class="select-btn">
                                                <span class="sBtn-text text-muted">--Select Gender--</span>
                                                <i class="bx bx-chevron-down mx-3 text-muted"></i>
                                            </div>

                                            <ul class="options ">
                                                <li class="option">

                                                    <span class="option-text">Male</span>
                                                </li>
                                                <li class="option">

                                                    <span class="option-text">Female</span>
                                                </li>
                                                <li class="option">

                                                    <span class="option-text">Other</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Reports To <span class="text-danger">*</span></label>
                                            <select class="select select2-hidden-accessible"
                                                data-select2-id="select2-data-46-mnpp" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-48-u3m6">-</option>
                                                <option>Wilmer Deluna</option>
                                                <option>Lesley Grauer</option>
                                                <option>Jeffery Lalor</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-47-2xsw"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-cedl-container"
                                                        aria-controls="select2-cedl-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-cedl-container" role="textbox"
                                                            aria-readonly="true" title="-">-</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- modal -->

            <div id="personal_info_modal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-3 new-role-header d-flex align-items-center">
                            <h4 class="modal-title mb-1 text-primary">Personal Information</h4>
                            <hr class="bottom-dash">
                            <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Passport Expiry Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Tel</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Religion</label>
                                            <div class="cal-icon">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="select form-control select2-hidden-accessible"
                                                data-select2-id="select2-data-49-p0wk" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-51-s1yq">-</option>
                                                <option>Single</option>
                                                <option>Married</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-50-5xxf"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-you7-container"
                                                        aria-controls="select2-you7-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-you7-container" role="textbox"
                                                            aria-readonly="true" title="-">-</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Employment of spouse</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>No. of children </label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- emergency modal-->
            <div id="emergency_contact_modal" class="modal custom-modal fade show" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-3 new-role-header d-flex align-items-center">
                            <h4 class="modal-title mb-1 text-primary">Personal Information</h4>
                            <hr class="bottom-dash">
                            <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- family modal-->

            <div id="family_info_modal" class="modal custom-modal fade show" role="dialog" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-3 new-role-header d-flex align-items-center">
                            <h4 class="modal-title mb-1 text-primary">Family Information</h4>
                            <hr class="bottom-dash">
                            <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="  ri-delete-bin-5-fill-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="  ri-delete-bin-5-fill-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- education modal-->
            <div id="education_info" class="modal custom-modal fade show" role="dialog" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-3 new-role-header d-flex align-items-center">
                            <h4 class="modal-title mb-1 text-primary">Education Information</h4>
                            <hr class="bottom-dash">
                            <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="  ri-delete-bin-5-fill-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="Oxford University"
                                                            class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="BE Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="Grade A"
                                                            class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="  ri-delete-bin-5-fill-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="Oxford University"
                                                            class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="BE Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" value="Grade A"
                                                            class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- experience modal-->

            <div id="experience_info" class="modal custom-modal fade show" role="dialog" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-3 new-role-header d-flex align-items-center">
                            <h4 class="modal-title mb-1 text-primary">Experience Information</h4>
                            <hr class="bottom-dash">
                            <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="  ri-delete-bin-5-fill-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" class="form-control floating"
                                                            value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" class="form-control floating"
                                                            value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" class="form-control floating"
                                                            value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="  ri-delete-bin-5-fill-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" class="form-control floating"
                                                            value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" class="form-control floating"
                                                            value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <input type="text" class="form-control floating"
                                                            value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text"
                                                                class="form-control floating datetimepicker"
                                                                value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
        </div>
        <!--end row-->
        @endsection
        @section('script')
        <script src="{{ URL::asset('assets/libs/swiper/swiper.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
        @endsection