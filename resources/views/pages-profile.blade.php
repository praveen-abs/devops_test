@extends('layouts.master')
@section('title')
@lang('translation.settings')
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">
@endsection
@section('content')

<div class="container-fluid user-details-wrapper mt-30 ">
    <div class="row">
        <div class="col-12">
            <div class="pro-overview">
                <div class="row">
                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 d-flex">
                        <div class="card profile-box border-0 flex-fill ">
                            <div class="card-body">
                                <div class="profile-wrapper d-flex w-100 ">
                                    <div class="profile-img d-flex">
                                        @include('ui-profile-avatar-lg',[
                                            'currentUserName' => $user->name,
                                            ])
                                        <span class="personal-edit img-edit"><a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#personal_info" id="pencil-on-avatar">
                                            <i class="ri-pencil-fill"></i></a></span>
                                    </div>
                                    <div class="profile-info w-75 ">
                                        <h6 class="fw-bold mb-2 pt-1">{{$user->name}}
                                        </h6>
                                        <p class="departmnet fw-bold f-15 text-muted">{{$details->department}}</p>
                                        <p class="role text-muted f-15 fw-bold">{{$details->designation}}</p>
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-2">Profile Completeness</h6>
                                    <!-- <div class="staff-id fw-bold text-dark">Employee ID :
                                        {{$details->emp_no}}</div>
                                    <div class="small fw-bold text-muted">Date of Join :
                                        {{date('d-m-Y', strtotime($details->doj))}}</div> -->

                                    <div class="progress-wrapper">

                                        <div class="mb-1 d-flex -justify-content-between ">
                                            <p class="text-muted f-12">Profile Percentage</p>
                                            <p class="text-muted text-end f-12 fw-bold">{{ $profileCompletenessValue}}%</p>
                                        </div>
                                                            <div class="progress progress-bar-content mb-2">
                                            <div class="progress-bar " role="progressbar" style="width:{{ $profileCompletenessValue}}%"
                                                aria-valuenow="{{ $profileCompletenessValue}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                            <p class="text-muted f-12 fw-bold">Your profile is completed</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12s">
                        <div class="card profile-box employee-info-card flex-fill">
                            <div class="card-body">
                                <h6 class="">Employee Informations
                                    <span class="personal-edit"><a href="#" class="edit-icon" data-bs-toggle="modal"
                                            data-bs-target="#employee_info"><i class="ri-pencil-fill"></i></a></span>
                                </h6>
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
                                                    @if ($rep && $rep->avatar)
                                                    <img class="w-100 h-100 soc-det-img "
                                                        src="{{ URL::asset('images/' . $rep->avatar) }}"
                                                        alt="Header Avatar">
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                            @if ($rep && $rep->name)
                                            <a href="profile.html">
                                                {{$rep->name}}
                                            </a>
                                            @else
                                                ---
                                            @endif
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 ">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                 <form action="{{route('updatePersonalInformation', $user->id)}}" Method="POST"
                        enctype="multipart/form-data">
                                <h6 class="">Personal Informations
                                    <span class="personal-edit"><a href="#" class="edit-icon" data-bs-toggle="modal"
                                            data-bs-target="#personal_info_modal"><i
                                                class="ri-pencil-fill"></i></a></span>
                                </h6>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Passport No.</div>
                                        <div class="text">
                                         {{$details->passport_number}}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">Passport Exp Date.</div>
                                        <div class="text">{{$details->passport_date}}</div>
                                    </li>
                                    <li>
                                        <!-- <div class="title">Tel</div>
                                        <div class="text"><a href="">{{$details->mobile_number}}</a></div> -->
                                    </li>
                                    <li>
                                        <div class="title">Nationality</div>
                                        <div class="text">{{$details->nationality}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Religion</div>
                                        <div class="text">{{$details->religion}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Marital status</div>
                                        <div class="text">{{$details->marrital_status}}</div>
                                    </li>
                                    <li>
                                        <div class="title">Spouse Name</div>
                                        <div class="text">{{$details->spouse_name}}</div>
                                    </li>
                                    <li>
                                        <div class="title">No. of children</div>
                                        <div class="text">{{$details->children}}</div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h6 class="">Experience Details
                                    <span class="personal-edit">
                                        <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#experience_info">
                                            <i class="ri-pencil-fill"></i>
                                        </a>
                                    </span>
                                </h6>
                                <div class="table-responsive" id="experience-detail-table">
                                    <table class="table table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Organization</th>
                                                <th>Designation</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($exp)
                                            @foreach($exp as $k => $info)
                                            <tr>
                                                <td>{{$info['company_name']}}</td>
                                                <td>{{$info['job_position']}}</td>
                                                <td>{{$info['period_from']}}</td>
                                                <td>{{$info['period_to']}}</td>
                                                {{-- <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a aria-expanded="false" data-bs-toggle="dropdown"
                                                            class="action-icon dropdown-toggle" href="#"><i
                                                                class="ri-more-2-fill material-icons"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item"><i
                                                                    class=" ri-pencil-fill m-r-5"></i>
                                                                Edit</a>
                                                            <a href="#" class="dropdown-item"><i
                                                                    class=" ri-delete-bin-line"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="fw-bold mb-0 ">Family Informations
                                                                    </h6>
                                                                    <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#family_info_modal">
                                                                        <i class=" ri-pencil-fill"></i>
                                                                    </a>
                            </div>
                                <div class="table-responsive">
                                    <table class="table table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Relationship</th>
                                                <th>Date of Birth</th>
                                                <th>Phone</th>
                                                {{-- <th></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($details->family_info_json && $details->family_info_json['name'])
                                            @foreach($details->family_info_json['name'] as $k => $info)
                                            <tr>
                                                <td>{{$details->family_info_json['name'][$k]}}</td>
                                                <td>{{$details->family_info_json['relationship'][$k]}}</td>
                                                <td>{{$details->family_info_json['dob'][$k]}}</td>
                                                <td>{{$details->family_info_json['phone'][$k]}}</td>
                                                {{-- <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a aria-expanded="false" data-bs-toggle="dropdown"
                                                            class="action-icon dropdown-toggle" href="#"><i
                                                                class="ri-more-2-fill material-icons"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item"><i
                                                                    class=" ri-pencil-fill m-r-5"></i>
                                                                Edit</a>
                                                            <a href="#" class="dropdown-item"><i
                                                                    class=" ri-delete-bin-line"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h3 class="card-title fw-bold">Leave Details
                                    <span class="personal-edit"><a href="#" class="edit-icon" data-bs-toggle="modal"
                                            data-bs-target="#leave_info"><i class="ri-pencil-fill"></i></a></span>
                                </h3>
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Allocated Paid Leaves</div>
                                        <!-- <div class="text">{{$details->passport}}</div> -->
                                        <div class="text">21</div>
                                    </li>
                                    <li>
                                        <div class="title"> Paid Leave Balance</div>
                                        <!-- <div class="text">{{$details->passport}}</div> -->
                                        <div class="text">19</div>
                                    </li>
                                    <li>
                                        <div class="title">Allocated Restricted Holidays</div>
                                        <div class="text">2</div>
                                    </li>
                                    <li>
                                        <div class="title">Allocated Restricted Balance</div>
                                        <div class="text">4</div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 d-flex">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h6 class="">Bank information
                                    <span class="personal-edit"><a href="#" class="edit-icon" data-bs-toggle="modal"
                                            data-bs-target="#Bank_info"><i class="ri-pencil-fill"></i></a></span>

                                </h6>
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
                                        <div class="text">{{$details->pan_number}}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4 col-lg-6 col-sm-12 d-flex">
                        <div class="card profile-box flex-fill ">
                            <div class="card-body">
                                <h6 class="">Emergency Contact <a href="#" class="edit-icon"
                                        data-bs-toggle="modal" data-bs-target="#emergency_contact_modal"><i
                                            class=" ri-pencil-fill"></i></a></h6>

                                                                        <h6 class="text-muted">Primary</h6>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['primary_name']) ? $details->contact_json['primary_name'] : '-'}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['primary_relationship']) ? $details->contact_json['primary_relationship'] : '-'}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone - 1 </div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['primary_phone1']) ? $details->contact_json['primary_phone1'] : '-'}}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Phone - 2</div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['primary_phone2']) ? $details->contact_json['primary_phone2'] : '-'}}
                                                </div>
                                            </li>
                                        </ul>

                                    <!-- <hr> -->
                                    <!-- <div class="col-md-6 col-lg-6 col-xl-6  col-sm-12 w-100">
                                        <h5 class="section-title">Secondary</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['secondary_name']) ? $details->contact_json['secondary_name'] : '-'}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['secondary_relationship']) ? $details->contact_json['secondary_relationship'] : '-'}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text">{{($details->contact_json && $details->contact_json['secondary_phone1']) ? $details->contact_json['secondary_phone1'] : '-'}}, {{($details->contact_json && $details->contact_json['secondary_phone2']) ? $details->contact_json['secondary_phone2'] : '-'}}</div>
                                            </li>
                                        </ul>
                                    </div> -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">

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
                                    <select class="form-select form-control select2-hidden-accessible"
                                        data-select2-id="select2-data-1-ecvr" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-3-iget">Select salary basis
                                            type
                                        </option>
                                        <option>Hourly</option>
                                        <option>Daily</option>
                                        <option>Weekly</option>
                                        <option>Monthly</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-2-xiji" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-hgdl-container"
                                                aria-controls="select2-hgdl-container"><span
                                                    class="select2-selection__rendered" id="select2-hgdl-container"
                                                    role="textbox" aria-readonly="true"
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
                                    <label class="col-form-label">Salary amount <small class="text-muted">per
                                            month</small></label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" placeholder="Type your salary amount"
                                            value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="col-form-label">Payment type</label>
                                    <select class="form-select form-control select2-hidden-accessible"
                                        data-select2-id="select2-data-4-dj2y" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-6-iwpp">Select payment type
                                        </option>
                                        <option>Bank transfer</option>
                                        <option>Check</option>
                                        <option>Cash</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-5-s3wp" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-37e7-container"
                                                aria-controls="select2-37e7-container"><span
                                                    class="select2-selection__rendered" id="select2-37e7-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select payment type">Select
                                                    payment type</span><span class="select2-selection__arrow"
                                                    role="presentation"><b
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
                                        data-select2-id="select2-data-7-w8sh" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-9-r0ka">Select PF contribution
                                        </option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-8-lbfb" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-k79s-container"
                                                aria-controls="select2-k79s-container"><span
                                                    class="select2-selection__rendered" id="select2-k79s-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select PF contribution">Select
                                                    PF contribution</span><span class="select2-selection__arrow"
                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                    <select class="select select2-hidden-accessible"
                                        data-select2-id="select2-data-10-v11n" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-12-3a7c">Select PF
                                            contribution
                                        </option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-11-0xtt" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-ku2h-container"
                                                aria-controls="select2-ku2h-container"><span
                                                    class="select2-selection__rendered" id="select2-ku2h-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select PF contribution">Select
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
                                        <option data-select2-id="select2-data-15-o5s2">Select PF
                                            contribution
                                        </option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-14-t7xx" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-zo26-container"
                                                aria-controls="select2-zo26-container"><span
                                                    class="select2-selection__rendered" id="select2-zo26-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select PF contribution">Select
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
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-17-ouwe" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-cc48-container"
                                                aria-controls="select2-cc48-container"><span
                                                    class="select2-selection__rendered" id="select2-cc48-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select additional rate">Select
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
                                        <option data-select2-id="select2-data-21-ajce">Select PF
                                            contribution
                                        </option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-20-rwtr" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-qvdw-container"
                                                aria-controls="select2-qvdw-container"><span
                                                    class="select2-selection__rendered" id="select2-qvdw-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select PF contribution">Select
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
                                    <select class="select ">
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
                                    </select>
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
                                        data-select2-id="select2-data-25-9ci2" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-27-u74r">Select ESI
                                            contribution
                                        </option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-26-tskv" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-r6du-container"
                                                aria-controls="select2-r6du-container"><span
                                                    class="select2-selection__rendered" id="select2-r6du-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select ESI contribution">Select
                                                    ESI contribution</span><span class="select2-selection__arrow"
                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                    <select class="select select2-hidden-accessible"
                                        data-select2-id="select2-data-28-mjdh" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-30-7ur7">Select ESI
                                            contribution
                                        </option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-29-nbip" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-un38-container"
                                                aria-controls="select2-un38-container"><span
                                                    class="select2-selection__rendered" id="select2-un38-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select ESI contribution">Select
                                                    ESI contribution</span><span class="select2-selection__arrow"
                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="col-form-label">Employee ESI rate</label>
                                    <select class="select ">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="col-form-label">Additional rate <span
                                            class="text-danger">*</span></label>
                                    <select class="select select2-hidden-accessible"
                                        data-select2-id="select2-data-34-23ui" tabindex="-1" aria-hidden="true">
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
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="select2-data-35-uyht" style="width: 100%;"><span
                                            class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-vkjw-container"
                                                aria-controls="select2-vkjw-container"><span
                                                    class="select2-selection__rendered" id="select2-vkjw-container"
                                                    role="textbox" aria-readonly="true"
                                                    title="Select additional rate">Select
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

    <!-- employee info -->

    <div id="employee_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="">Employee
                        Information</h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updatePersonalInformation', $user->id)}}" Method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-center">
                                {{-- <div class="profile-img-wrap edit-img"> --}}
                                  <!--   <img id="profile_round_image_dist1" class="rounded-circle header-profile-user"
                                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="Header Avatar"> -->
                                         {{-- @php
                                    preg_match('/(?:\w+\. )?(\w+).*?(\w+)(?: \w+\.)?$/',Auth::user()->name , $result);
                                    $name = strtoupper($result[1][0].$result[2][0]);

                                    if (Auth::user()->avatar == null || Auth::user()->avatar =='' ){
                                    @endphp
                                        <span class="badge rounded-circle h-100 w-100 header-profile-user badge-primary ml-2"><i
                                            class="align-middle">{{$name}}</i></span>
                                    @php
                                    }else{
                                    @endphp
                                    <img id="profile_round_image_dist1" class="rounded-circle header-profile-user"
                                        src="{{URL::asset('images/'. Auth::user()->avatar)}}" alt="">


                                    @php
                                    }
                                    @endphp --}}
                                    {{-- <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input type='file' name="profilePic" class="upload"  accept="image/*" onchange="readURL(this);" />
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Birth Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="date" max="9999-12-31"
                                                    name="dob" value="{{date('Y-m-d', strtotime($details->dob))}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Gender</label>
                                        <select class="form-select form-control" name="gender" aria-label="Default select" disabled>
                                            <option selected>-</option>
                                            <option value="male" @if($details->gender == 'male') selected
                                                @endif>Male</option>
                                            <option value="female" @if($details->gender == 'female') selected
                                                @endif>Female</option>
                                            <option value="other" @if($details->gender == 'other') selected
                                                @endif>Other</option>
                                        </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">

                                    <label>Reports To <span class="text-danger">*</span></label>
                                    @if($report_key == 1 || $report_key == '1' )
                                    <select class="form-select form-control" name="report" disabled>
                                        @else
                                        <select class="form-select form-control" name="report" >
                                        @endif
                                        <option>Select</option>
                                    
                                        @foreach($code as $c)
                                        <option value="{{$c->emp_no}}" @if($rep && $rep->emp_no == $c->emp_no) selected
                                                @endif>{{$c->emp_no . ' (' .$c->name. ')'}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- <div class="col-md-6">
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
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Phone Number</label>
                                    <input type=text  size=20 maxlength=10 onkeypress='return isNumberKey(event)' class="form-control"  name="mobile_number"  value="{{$details->mobile_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">

                                 <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" name="present_email" onkeypress='return isValidEmail(email)' class="form-control"
                                        value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Address</label>
                                    <textarea name="address_PI" id="address_PI" cols="30" rows="3"  class="form-control"  value="{{$details->present_address}}">{{ $details->present_address? $details->present_address : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- personal info -->
    <div id="personal_info" class="modal  custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered " role="document">
            <div class="modal-content profile-box">
                <div class="modal-header  new-role-header d-flex align-items-center">
                    <h6 class="">Personal
                        Information</h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('storeProfileImage', $user->id)}}" Method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" d-flex align-items-center justify-content-center">
                                    <div class="profile-img-wrap edit-img">
                                    <img id="profile_round_image_dist" class="rounded-circle header-profile-user"
                                        src="@if (!empty($user->avatar)){{ URL::asset('images/' . $user->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="">
                                    <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input type='file' name="profilePic" class="upload"  accept="image/*" onchange="readURL(this);" />
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-orange submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- bank informatios -->
    <div id="Bank_info" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header d-flex align-items-center">
                    <h6 class="">Bank Information
                    </h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateBankInfo', $user->id)}}" Method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Bank name</label>
                                    <select name="bank_name" id="bank_name" class="form-select form-control onboard-form" required>
                                        <option value="">Select</option>
                                        @foreach($bank as $b)
                                        <option value="{{$b->bank_name}}" min-data="{{$b->min_length}}" max-data="{{$b->max_length}}" @if($details->bank_name == $b->bank_name) selected @endif>{{$b->bank_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Bank account No</label>
                                    <div class="cal-icon">
                                        <input name="account_no" type="number" minlength="9" maxlength="18" class="form-control onboard-form" value="{{$details->bank_account_number}}" pattern-data="account" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>IFSC Code</label>
                                    <input name="bank_ifsc" class="form-control onboard-form" value="{{$details->bank_ifsc_code}}" type="text" pattern-data="ifsc" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>PAN No</label>
                                    <input name="pan_no" class="form-control onboard-form" value="{{$details->pan_number}}" type="text" pattern-data="pan" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- leave information -->
    <div id="leave_info" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header">
                    <h6 class="">Leave Information
                    </h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateLeaveInfo', $user->id)}}" Method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Allocated Paid Leaves</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Paid Leave Balance</label>
                                    <div class="cal-icon">
                                        <input class="form-control" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Allocated Restricted Holidays</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Allocated Restricted Balance</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div id="personal_info_modal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header">
                    <h6 class="">Personal
                        Information</h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updatePersonalInfo', $user->id)}}" Method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Passport No</label>
                                    <input type="text" class="form-control" name="passport_number" value="{{$details->passport_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Passport Expiry Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" name="passport_date" type="date" max="9999-12-31" value="{{date('Y-m-d', strtotime($details->passport_data))}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Tel</label>
                                    <input class="form-control" value="{{$details->mobile_number}}" name="mobile_number" minlength="10" maxlength="10" type="number" maxlength="10" minlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nationality <span class="text-danger">*</span></label>
                                    <input class="form-control onboard-form" type="text" name="nationality" pattern-data="alpha" value="{{$details->nationality}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Religion</label>
                                    <div class="cal-icon">
                                        <input class="form-control onboard-form" pattern-data="name" name="religion" type="text" pattern-data="alpha" value="{{$details->religion}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Marital status <span class="text-danger">*</span></label>
                                    <select class="form-select form-control" name="marital_status" required>
                                        <option>Select</option>
                                        <option @if($details->marital_status == 'single') selected @endif>Un Married</option>
                                        <option @if($details->marital_status == 'married') selected @endif>Married</option>
                                        <option @if($details->marital_status == 'divorced') selected @endif>Divorces</option>
                                        <option @if($details->marital_status == 'widowed') selected @endif>Widowe</option>
                                        <option @if($details->marital_status == 'seperated') selected @endif>Seperated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Spouse Name</label>
                                    <input class="form-control onboard-form" type="text" name="spouse" pattern-data="alpha" value="{{$details->spouse_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>No. of children </label>
                                    <input class="form-control onboard-form" type="number" name="children" maxlength="2" value="{{$details->children}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- emergency modal-->
    <div id="emergency_contact_modal" class="modal custom-modal fade show" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header new-role-header d-flex align-items-center">
                    <h6 class="">Emergency Contact
                    </h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updtaeEmergencyInfo', $user->id)}}" Method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-muted">Primary Contact</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" name="primary_name" class="form-control onboard-form" pattern-data="name" value="{{($details->contact_json && $details->contact_json['primary_name']) ? $details->contact_json['primary_name'] : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input name="primary_relationship" class="form-control onboard-form" type="text" pattern-data="alpha" value="{{($details->contact_json && $details->contact_json['primary_relationship']) ? $details->contact_json['primary_relationship'] : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Phone 1<span class="text-danger">*</span></label>
                                            <input name="primary_phone1" class="form-control onboard-form" type="number" maxlength="10" minlength="10" value="{{($details->contact_json && $details->contact_json['primary_phone1']) ? $details->contact_json['primary_phone1'] : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Phone 2</label>
                                            <input name="primary_phone2" class="form-control onboard-form" type="number" maxlength="10" minlength="10" value="{{($details->contact_json && $details->contact_json['primary_phone2']) ? $details->contact_json['primary_phone2'] : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- family modal-->

    <div id="family_info_modal" class="modal custom-modal fade show" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header new-role-header">
                    <h6 class="modal-title">Family
                        Information</h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updtaeFamilyInfo', $user->id)}}" Method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold">Education Informations <a href="javascript:void(0);"
                                            {{-- class="delete-icon"><i class="   ri-delete-bin-line"></i></a> --}}
                                    </h3>
                                    <div class="content-container">
                                        <div class="row addition-content" id="content1">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required value="{{($details->family_info_json && $details->family_info_json['name']) ? $details->family_info_json['name'][0] : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input name="relationship[]" class="form-control onboard-form" type="text"
                                                        pattern-data="alpha" required value="{{($details->family_info_json && $details->family_info_json['relationship']) ? $details->family_info_json['relationship'][0] : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Date of birth <span class="text-danger">*</span></label>
                                                    <input name="dob[]" class="form-control onboard-form" type="date"
                                                        max="9999-12-31" required value="{{($details->family_info_json && $details->family_info_json['dob']) ? $details->family_info_json['dob'][0] : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input name="phone[]" class="form-control onboard-form" type="number"
                                                        maxlength="10" minlength="10" required value="{{($details->family_info_json && $details->family_info_json['phone']) ? $details->family_info_json['phone'][0] : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more" style="cursor:pointer;">
                                        <div id="add_more" class="text-secondary">
                                            <i class=" ri-add-circle-fill"></i> Add More
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- education modal-->
    <div id="education_info" class="modal custom-modal fade show" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header">
                    <h6 class="">Education
                        Information</h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold">Education Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="   ri-delete-bin-line"></i></a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Institution</label>
                                                <input type="text" value="Oxford University"
                                                    class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Subject</label>
                                                <input type="text" value="Computer Science"
                                                    class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Starting Date</label>
                                                <div class="cal-icon">
                                                    <input type="text" value="01/06/2002"
                                                        class="form-control floating datetimepicker">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Complete Date</label>
                                                <div class="cal-icon">
                                                    <input type="text" value="31/05/2006"
                                                        class="form-control floating datetimepicker">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Degree</label>
                                                <input type="text" value="BE Computer Science"
                                                    class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Grade</label>
                                                <input type="text" value="Grade A" class="form-control floating">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold">Education Informations <a href="javascript:void(0);"
                                            {{-- class="delete-icon"><i class="   ri-delete-bin-line"></i></a> --}}
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Institution</label>
                                                <input type="text" value="Oxford University"
                                                    class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Subject</label>
                                                <input type="text" value="Computer Science"
                                                    class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <div class="cal-icon">
                                                    <label class="focus-label">Starting Date</label>
                                                    <input type="date" max="9999-12-31" value="01/06/2002"
                                                        class="form-control floating datetimepicker">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Complete Date</label>
                                                <div class="cal-icon">
                                                    <input type="date" max="9999-12-31" value="31/05/2006"
                                                        class="form-control floating datetimepicker">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Degree</label>
                                                <input type="text" value="BE Computer Science"
                                                    class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 form-focus focused">
                                                <label class="focus-label">Grade</label>
                                                <input type="text" value="Grade A" class="form-control floating">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more ">
                                        <a href="javascript:void(0);" class="text-secondary"><i
                                                class=" ri-add-circle-fill"></i> Add
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- experience modal-->

    <div id="experience_info" class="modal custom-modal fade show" role="dialog" aria-modal="true"s>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content profile-box">
                <div class="modal-header">
                    <h6 class="">Experience
                        Information</h6>
                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateExperienceInfo', $user->id)}}" Method="POST">
                        @csrf
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="">Experience Informations <a href="javascript:void(0);"
                                            class="delete-icon"><i class="   ri-delete-bin-line"></i></a>
                                    </h6>
                                    <div class="exp-content-container">
                                        <div class="row exp-addition-content" id="content1">
                                            <input type="hidden" name="ids[]">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 form-focus focused">
                                                    <label class="focus-label">Company Name</label>
                                                    <input type="text" name="company_name[]" class="form-control floating" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 form-focus focused">
                                                    <label class="focus-label">Location</label>
                                                    <input type="text" name="location[]" class="form-control floating" value="" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 form-focus focused">
                                                    <label class="focus-label">Job Position</label>
                                                    <input type="text" name="job_position[]" class="form-control floating" value="" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 form-focus focused">
                                                    <label class="focus-label">Period From</label>
                                                    <div class="cal-icon">
                                                        <input type="date" max="9999-12-31" name="period_from[]" class="form-control floating datetimepicker" value="" required>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 form-focus focused">
                                                    <div class="cal-icon">
                                                        <label class="focus-label">Period To</label>
                                                        <input type="date" max="9999-12-31" name="period_to[]" class="form-control floating datetimepicker" value="" required>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <div class="text-secondary" id="exp-add-more">
                                            <i class=" ri-add-circle-fill"></i> Add More
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


<!--end row-->
@endsection
@section('script')
@yield('script-profile-avatar')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
$( document ).ready(function() {
    
    console.log( "ready!" );
});

$('body').on('keyup', ".onboard-form", function() {
    var inputvalues = $(this).val();
    var data = $(this).attr('name');
    if ($(this).attr('maxlength')) {
        var dtl = $(this).val().length;
        var val = parseInt($(this).attr('maxlength'));
        if(dtl>val){
            $(this).val($(this).val().substr(0,val));
        }
    }
    if ($(this).attr('pattern-data') != undefined && $(this).attr('pattern-data') != '' && inputvalues !=
        '') {
        var pattern = {
            'pan': /^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}?$/,
            'ifsc': /^([A-Z]){4}0([A-Z0-9]){6}?$/,
            'aadhar': /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/,
            'passport': /^[a-zA-Z]{2}[0-9]{7}$/,
            'account': /^[0-9]{9,18}$/,
            'dl': /^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/,
            'gst': /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
            'alp-num': /^[a-zA-Z0-9]+$/,
            'alpha': /^[a-zA-Z]+$/,
            'name': /^[a-zA-Z.]+$/,
        };
        var regex = $(this).attr('pattern-data');
        if (!pattern[regex].test(inputvalues)) {
            var v = $(this).val();
            if (regex == 'name') {
                $(this).val(v.replace(/[_\W0-9]+/g, ''));
            } else if (regex == 'alpha') {
                $(this).val(v.replace(/[_\W0-9.]+/g, ''));
            } else if (regex == 'alp-num') {
                $(this).val(v.replace(/[_\W.]+/g, ''));
            }
        }
    }
});

$('.edit-icon').click(function() {
    var modalid = $(this).attr('data-bs-target');
    $(modalid).modal('show');
    if (modalid == '#experience_info') {
        var expInfo = @json($exp);
        if (expInfo.length > 0) {
            $('.exp-content-container').html('');
        }
        var id = $('.addition-content:last').attr('id');
        var expInfoCount = 1;
        if (id) {
            expInfoCount = parseInt(id.replace('content', '')) + 1;
        }
        console.log(expInfo);

        $.each(expInfo,function(key, value) {
            $('.exp-content-container').append('<div class="row exp-addition-content" id="content' + expInfoCount +'"><input type="hidden" name="ids[]" value="'+value['id']+'"><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Company Name</label><input type="text" class="form-control floating" value="'+value['company_name']+'" name="company_name[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Location</label><input type="text" class="form-control floating" value="'+value['location']+'" name="location[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Job Position</label><input type="text" class="form-control floating" value="'+value['job_position']+'" name="job_position[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Period From</label><div class="cal-icon"><input type="date" max="9999-12-31"  class="form-control floating datetimepicker" value="'+value['period_from']+'" name="period_from[]" required></div></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><div class="cal-icon"><label class="focus-label">Period To</label><input type="date" max="9999-12-31"  class="form-control floating datetimepicker" value="'+value['period_to']+'" name="period_to[]" required></div></div></div></div>'
            );
            expInfoCount++;
        });
    }
    if (modalid == '#family_info_modal') {
        var familyInfo = @json($details->family_info_json);
        var id = $('.exp-addition-content:last').attr('id');
        var familyInfoCount = 1;
        if (id) {
            familyInfoCount = parseInt(id.replace('content', '')) + 1;
        }
        $.each(familyInfo['name'],function(key, value) {
            if (key > 0) {
                $('.content-container').append('<div class="row addition-content" id="content' + familyInfoCount +'"><input type="hidden" name="ids[]"><div class="col-md-6"><div class="form-group mb-3"><label>Name <span class="text-danger">*</span></label><input value="'+familyInfo['name'][key]+'" name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Relationship <span class="text-danger">*</span></label><input value="'+familyInfo['relationship'][key]+'" name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Date of birth <span class="text-danger">*</span></label><input value="'+familyInfo['dob'][key]+'" name="dob[]" class="form-control onboard-form" type="date" max="9999-12-31" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Phone <span class="text-danger">*</span></label><input value="'+familyInfo['phone'][key]+'" name="phone[]" class="form-control onboard-form" type="number" maxlength="10" minlength="10" required></div></div></div>'
                );
                familyInfoCount++;
            }
        });
    }
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#profile_round_image_dist')
				.attr('src', e.target.result);

			$('#profile_round_image_dist1')
				.attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
}


$('#exp-add-more').click(function() {
    var id = $('.exp-addition-content:last').attr('id');
    var length = 1;
    if (id) {
        length = parseInt(id.replace('content', '')) + 1;
    }
    $('.exp-content-container').append('<div class="row exp-addition-content" id="content' + length +'"><input type="hidden" name="ids[]"><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Company Name</label><input type="text" class="form-control floating" name="company_name[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Location</label><input type="text" class="form-control floating" name="location[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Job Position</label><input type="text" class="form-control floating" name="job_position[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Period From</label><div class="cal-icon"><input type="date" max="9999-12-31" class="form-control floating datetimepicker" name="period_from[]" required></div></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><div class="cal-icon"><label class="focus-label">Period To</label><input type="date" max="9999-12-31"  class="form-control floating datetimepicker" name="period_to[]" required></div></div></div></div>'
    );
});

$('#add_more').click(function() {
    var id = $('.addition-content:last').attr('id');
    var length = 1;
    if (id) {
        length = parseInt(id.replace('content', '')) + 1;
    }
    $('.content-container').append('<div class="row addition-content" id="content' + length +
        '"><div class="col-md-6"><div class="form-group mb-3"><label>Name <span class="text-danger">*</span></label><input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Relationship <span class="text-danger">*</span></label><input name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Date of birth <span class="text-danger">*</span></label><input name="dob[]" class="form-control onboard-form" type="date" max="9999-12-31" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Phone <span class="text-danger">*</span></label><input name="phone[]" class="form-control onboard-form" type="number" maxlength="10" minlength="10" required></div></div></div>'
    );
});


const optionMenu = $(".select-menu"),
    selectBtn = $(".select-btn"),
    options = $(".option"),
    sBtn_text = $(".sBtn-text");

selectBtn.click(function() {
    optionMenu.classList.toggle("active")
});

options.each((option) => {
    option.addEventListener("click", () => {
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;

        optionMenu.classList.remove("active");

    });
});

$('#bank_name').change(function() {
    var min = $('#bank_name option:selected').attr('min-data');
    var max = $('#bank_name option:selected').attr('max-data');
    $('#account_no').attr('minlength', min);
    $('#account_no').attr('maxlength', min);
});

$('body').on('keyup', ".onboard-form", function() {
    var inputvalues = $(this).val();
    var data = $(this).attr('name');
    if ($(this).attr('maxlength')) {
        var dtl = $(this).val().length;
        var val = parseInt($(this).attr('maxlength'));
        if (dtl > val) {
            $(this).val($(this).val().substr(0, val));
        }
    }
    if ($(this).attr('pattern') != undefined && $(this).attr('pattern') != '' && inputvalues !=
        '') {
        var pattern = {
            'pan': /^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}?$/,
            'ifsc': /^([A-Z]){4}0([A-Z0-9]){6}?$/,
            'aadhar': /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/,
            'passport': /^[a-zA-Z]{2}[0-9]{7}$/,
            'account': /^[0-9]{9,18}$/,
            'dl': /^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/,
            'gst': /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
            'alp-num': /^[a-zA-Z0-9]+$/,
            'alpha': /^[a-zA-Z]+$/,
            'name': /^[a-zA-Z.]+$/,
        };
        var regex = $(this).attr('pattern');
        if (!pattern[regex].test(inputvalues)) {
            $('.' + data + '_label').addClass('patternErr');
            var v = $(this).val();
            if (regex == 'name') {
                $(this).val(v.replace(/[_\W0-9]+/g, ''));
            } else if (regex == 'alpha') {
                $(this).val(v.replace(/[_\W0-9.]+/g, ''));
            } else if (regex == 'alp-num') {
                $(this).val(v.replace(/[_\W.]+/g, ''));
            }
        } else {
            $('.' + data + '_label').removeClass('patternErr');
        }
    }
});
</script>
<!-- number validation  -->
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;

}

function isValidEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
    // $(".progress-bar").animate({
    // style="width: {{ $profileCompletenessValue}}%"
    // }, 2500);

</script>
@endsection
