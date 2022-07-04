@extends('layouts.master')
@section('title')
@lang('translation.profile')
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}">
@endsection
@section('content')
<div class="user-details-wrapper">
    <div class="profile-foreground ">
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

            <div class="d-flex align-items-center">
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
                    <a href="{{route('pages-profile-settings')}}" class="btn btn-success"><i
                            class="ri-edit-box-line align-bottom"></i>
                        Edit Profile</a>
                </div>
            </div>

        </div>
    </div>


    <div class=" mt-5">
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
                                                    <h4 class="user-name fw-bold">{{$user->name}}</h4>
                                                    <h6 class="departmnet fw-bold text-muted">{{$details->department}}</h6>
                                                    <h5 class="role text-muted fw-bold">{{$details->designation}}</h5>
                                                    <div class="staff-id fw-bold text-dark">Employee ID : {{$details->emp_no}}</div>
                                                    <div class="small fw-bold text-muted">Date of Join : {{date('d-m-Y', strtotime($details->doj))}}
                                                    </div>
                                                    <div class="staff-msg mt-4 "><a class="btn btn-custom"
                                                            href="chat.html">
                                                            <button class="btn btn-primary">Send Message</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Phone:</div>
                                                        <div class="text"><a href="">{{$details->mobile_number}}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href="">{{$user->email}}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Birthday:</div>
                                                        <div class="text">{{date('d F', strtotime($details->dob))}}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text">{{$details->present_address}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Gender:</div>
                                                        <div class="text">{{$details->gender}}</div>
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
                                                                {{$details->l1_manager_name}}
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
                                        <h3 class="card-title fw-bold">Personal Informations
                                            </span>
                                        </h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Passport No.</div>
                                                <div class="text">{{$details->passport}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Passport Exp Date.</div>
                                                <div class="text">{{$details->passport}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Tel</div>
                                                <div class="text"><a href="">{{$details->mobile_number}}</a></div>
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
                                                <div class="text">{{$details->marrital_status}}</div>
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
                                        <h3 class="card-title fw-bold">Emergency Contact </h3>
                                        <h5 class="section-title">Primary</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">{{$details->father_name}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">Father</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text">{{$details->mobile_number}}, {{$details->official_mobile}}</div>
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
                                        <h3 class="card-title fw-bold">Bank information</h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Bank name</div>
                                                <div class="text">{{$details->bank_name}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Bank account No.</div>
                                                <div class="text">{{$details->bank_account_number}}</div>
                                            </li>
                                            <li>
                                                <div class="title">IFSC Code</div>
                                                <div class="text">{{$details->bank_ifsc_code}}</div>
                                            </li>
                                            <li>
                                                <div class="title">PAN No</div>
                                                <div class="text">{{$details->pan_card}}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title fw-bold">Family Informations </h3>
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
                                                                            class=" ri-delete-bin-line"></i>
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
                                        <h3 class="card-title fw-bold">Education Informations
                                        </h3>
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
                                        <h3 class="card-title fw-bold">Experience </h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Web Designer at Zen
                                                                Corporation</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2
                                                                months)</span>
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
                                                            <span class="time">Jan 2013 - Present (5 years 2
                                                                months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Web Designer at Dalt
                                                                Technology</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2
                                                                months)</span>
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
                                <h3 class="card-title fw-bold"> Basic Salary Information</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="col-form-label">Salary basis <span
                                                        class="text-danger">*</span></label>
                                                <select class="select select2-hidden-accessible"
                                                    data-select2-id="select2-data-1-ecvr" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-3-iget">Select salary basis
                                                        type
                                                    </option>
                                                    <option>Hourly</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-2-xiji"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-hgdl-container"
                                                            aria-controls="select2-hgdl-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-hgdl-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select salary basis type">Select
                                                                salary basis
                                                                type</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="col-form-label">Salary amount <small
                                                        class="text-muted">per
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
                                                    data-select2-id="select2-data-4-dj2y" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-6-iwpp">Select payment type
                                                    </option>
                                                    <option>Bank transfer</option>
                                                    <option>Check</option>
                                                    <option>Cash</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
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
                                                                payment type</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 class="card-title fw-bold"> PF Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="col-form-label">PF contribution</label>
                                                <select class="select select2-hidden-accessible"
                                                    data-select2-id="select2-data-7-w8sh" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-9-r0ka">Select PF contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-8-lbfb"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-k79s-container"
                                                            aria-controls="select2-k79s-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-k79s-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select PF contribution">Select
                                                                PF contribution</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="col-form-label">PF No. <span
                                                        class="text-danger">*</span></label>
                                                <select class="select select2-hidden-accessible"
                                                    data-select2-id="select2-data-10-v11n" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-12-3a7c">Select PF
                                                        contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-11-0xtt"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-ku2h-container"
                                                            aria-controls="select2-ku2h-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-ku2h-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select PF contribution">Select
                                                                PF contribution</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
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
                                                    data-select2-id="select2-data-13-sglc" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-15-o5s2">Select PF
                                                        contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-14-t7xx"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-zo26-container"
                                                            aria-controls="select2-zo26-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-zo26-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select PF contribution">Select
                                                                PF contribution</span><span
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
                                                    data-select2-id="select2-data-16-y0rb" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-18-nnwh">Select additional
                                                        rate
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
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-17-ouwe"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-cc48-container"
                                                            aria-controls="select2-cc48-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-cc48-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select additional rate">Select
                                                                additional rate</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
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
                                                    data-select2-id="select2-data-19-dbno" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-21-ajce">Select PF
                                                        contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-20-rwtr"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-qvdw-container"
                                                            aria-controls="select2-qvdw-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-qvdw-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select PF contribution">Select
                                                                PF contribution</span><span
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
                                                    data-select2-id="select2-data-22-ah6g" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-24-ngjq">Select additional
                                                        rate
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
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-23-46iu"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-ij1t-container"
                                                            aria-controls="select2-ij1t-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-ij1t-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select additional rate">Select
                                                                additional rate</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
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
                                    <h3 class="card-title fw-bold"> ESI Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="col-form-label">ESI contribution</label>
                                                <select class="select select2-hidden-accessible"
                                                    data-select2-id="select2-data-25-9ci2" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-27-u74r">Select ESI
                                                        contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-26-tskv"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-r6du-container"
                                                            aria-controls="select2-r6du-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-r6du-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select ESI contribution">Select
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
                                                    data-select2-id="select2-data-28-mjdh" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-30-7ur7">Select ESI
                                                        contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-29-nbip"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-un38-container"
                                                            aria-controls="select2-un38-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-un38-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select ESI contribution">Select
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
                                                    data-select2-id="select2-data-31-k78f" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-33-6bk0">Select ESI
                                                        contribution
                                                    </option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-32-7jw0"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-5oth-container"
                                                            aria-controls="select2-5oth-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-5oth-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select ESI contribution">Select
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
                                                    data-select2-id="select2-data-34-23ui" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-36-9t77">Select additional
                                                        rate
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
                                                </select><span
                                                    class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="select2-data-35-uyht"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-vkjw-container"
                                                            aria-controls="select2-vkjw-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-vkjw-container" role="textbox"
                                                                aria-readonly="true"
                                                                title="Select additional rate">Select
                                                                additional rate</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
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





            </div>
        </div>





    </div>
</div>


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection