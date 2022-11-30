@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payCheck.css') }}">
@endsection
@section('content')
    <div class="profile_page-wrapper mt-30 container-fluid">
        <div class="row">
            <div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xxl-3 col-xl-3">

                <div class="card top-line mb-0 ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end">
                                <button class="btn outline-none border-0 bg-transparent m-0 p-0">
                                    <i class="fa fa-id-card text-success" aria-hidden="true"></i>
                                </button>

                                {{-- <i class="bi bi-person-vcard"></i> --}}
                            </div>
                            <div class="col-12 text-center">
                                <div class="profile-img d-flex justify-content-center">
                                    @include('ui-profile-avatar-lg', [
                                        'currentUser' => $user,
                                    ])
                                    <span class="personal-edit img-edit"><a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#edit_profileImg" id="pencil-on-avatar">
                                            <i class="ri-pencil-fill"></i></a></span>
                                </div>
                                <div class="mt-4">
                                    <div class="progress-wrapper border-bottom-liteAsh ">
                                        <div class="mb-1 d-flex justify-content-between ">
                                            <span class="text-muted f-12">Profile Completeness</span>
                                            <span class="text-muted text-end f-12 fw-bold">
                                                {{ $profileCompletenessValue }}%
                                            </span>
                                        </div>
                                        <div class="progress progress-bar-content mb-2">
                                            <div class="progress-bar bg-danger " role="progressbar"
                                                style="width:{{ $profileCompletenessValue }}%"
                                                aria-valuenow="{{ $profileCompletenessValue }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted f-10 text-start mb-2 fw-bold">Your profile is completed</p>
                                    </div>

                                    <div class="profile-mid-right-content mb-4 text-center ">
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Employee Code</p>
                                            <p class="text-primary f-15 fw-bold">Employee</p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Location</p>
                                            <p class="text-primary f-15 fw-bold">Location</p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Department</p>
                                            <p class="text-primary f-15 fw-bold">Department</p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Reporting To</p>
                                            <p class="text-primary f-15 fw-bold">Reporting</p>
                                        </div>
                                    </div>
                                    <div class="profile-bottom-right-content  text-center ">
                                        <button class="btn btn-danger"><i class="fa fa-sign-out me-2"></i> Logout </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xxl-9 col-xl-9">
                <div class="card  mb-2 top-line">
                    <div class="card-body pb-0 pt-1">
                        <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                            <li class="nav-item  ember-view " role="presentation">
                                <a class="nav-link active ember-view " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#employee_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Employee Details</a>
                            </li>
                            <li class="nav-item  ember-view mx-4" role="presentation">
                                <a class="nav-link  ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#family_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Family</a>
                            </li>
                            <li class="nav-item  ember-view" role="presentation">
                                <a class="nav-link  ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#experience_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Experience</a>
                            </li>
                            <li class="nav-item  ember-view mx-4" role="presentation">
                                <a class="nav-link  ember-view " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#paycheck_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Paycheck</a>
                            </li>

                            <li class="nav-item  ember-view" role="presentation">
                                <a class="nav-link  ember-view " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#finance_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Finance</a>
                            </li>
                            <li class="nav-item  ember-view mx-4" role="presentation">
                                <a class="nav-link  ember-view " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#document_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Document</a>
                            </li>

                        </ul>
                    </div>

                </div>


                <div class="tab-content " id="pills-tabContent">
                    <div class="tab-pane fade active show" id="employee_det" role="tabpanel" aria-labelledby="">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">General Information
                                        <span class="personal-edit"><a href="#" class="edit-icon"
                                                data-bs-toggle="modal" data-bs-target="#edit_generalInfo"><i
                                                    class="ri-pencil-fill"></i></a></span>
                                    </h6>
                                    <ul class="personal-info">
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title">Birthday</div>
                                            <div class="text">
                                                {{ date('d F', strtotime($user_full_details->dob)) }}
                                            </div>
                                        </li>
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title">Gender </div>
                                            <div class="text">{{ $user_full_details->gender ?? '' }}</div>
                                        </li>
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title">Date Of Joining (DOJ)</div>
                                            <div class="text">

                                            </div>
                                        </li>
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title">Marital Status </div>
                                            <div class="text text-capitalize">
                                                {{ $user_full_details->marital_status ?? '' }}</div>
                                        </li>
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title"> Blood Group</div>
                                            <div class="text">

                                            </div>
                                        </li>
                                        <li class=" pb-1">
                                            <div class="title">Physically Handicapped</div>
                                            <div class="text">

                                            </div>
                                        </li>


                                    </ul>
                                </form>
                            </div>

                        </div>

                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">Contact Information
                                        <span class="personal-edit"><a href="#" class="edit-icon"
                                                data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i
                                                    class="ri-pencil-fill"></i></a></span>
                                    </h6>

                                    <ul class="personal-info">
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title">Personal Email</div>
                                            <div class="text">
                                                {{ $user->email }}
                                            </div>
                                        </li>
                                        <li class="border-bottom-liteAsh pb-1">
                                            <div class="title">Office Email</div>
                                            <div class="text">

                                            </div>
                                        </li>
                                        <li class=" pb-1">
                                            <div class="title">Mobile Number</div>
                                            <div class="text">
                                                {{ !empty($user_full_details->mobile_number) ? $user_full_details->mobile_number : '' }}
                                            </div>
                                        </li>
                                    </ul>

                                </form>
                            </div>

                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">Address
                                        <span class="personal-edit"><a href="#" class="edit-icon"
                                                data-bs-toggle="modal" data-bs-target="#edit_addressInfo"><i
                                                    class="ri-pencil-fill"></i></a></span>
                                    </h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="personal-info">
                                                <li class="border-bottom-liteAsh pb-1 flex-column">
                                                    <div class="title">Current Address </div>
                                                    <div class="text">
                                                        {{ $user_full_details->current_address_line_1 ?? '' }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="personal-info">
                                                <li class="border-bottom-liteAsh pb-1 flex-column">
                                                    <div class="title">permanent Address </div>
                                                    <div class="text">
                                                        {{ $user_full_details->current_address_line_2 ?? '' }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">Family Information
                                        <span class="personal-edit"><a href="#" class="edit-icon"
                                                data-bs-toggle="modal" data-bs-target="#edit_familyInfo"><i
                                                    class="ri-pencil-fill"></i></a></span>
                                    </h6>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-primary">
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Relationship
                                                </th>
                                                <th>
                                                    Date Of Birth
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                            </thead>
                                            <tbody>
                                                @if (!empty($familydetails))
                                                    @foreach ($familydetails as $singledetail)
                                                        <tr>
                                                            <td>{{ $singledetail->name }}</td>
                                                            <td>{{ $singledetail->relationship }}</td>
                                                            <td>{{ $singledetail->dob }}</td>
                                                            <td>{{ $singledetail->phone_number }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">Experience Information
                                        <span class="personal-edit"><a href="#" class="edit-icon"
                                                data-bs-toggle="modal" data-bs-target="#edit_experienceInfo"><i
                                                    class="ri-pencil-fill"></i></a></span>
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-primary">
                                                <th>
                                                    Organization
                                                </th>
                                                <th>
                                                    Designation
                                                </th>
                                                <th>
                                                    From
                                                </th>
                                                <th>
                                                    To
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="paycheck_det" role="tabpanel" aria-labelledby="">
                    </div>
                    <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">
                    </div>
                    <div class="tab-pane fade" id="document_det" role="tabpanel" aria-labelledby="">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">Documents Of Employee
                                        <span class="personal-edit"><a href="#" class="edit-icon"
                                                data-bs-toggle="modal" data-bs-target="#edit_document"><i
                                                    class="ri-pencil-fill"></i></a></span>
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-primary">
                                                <th>
                                                    Document Type
                                                </th>
                                                <th>
                                                    Number / ID
                                                </th>
                                                <th>
                                                    Action
                                                </th>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit_profileImg" class="modal  custom-modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered " role="document">
                <div class="modal-content profile-box">
                    <div class="modal-header border-0  text-end d-flex justify-content-end">
                        {{-- <h6 class="modal-title">Edit
                            User </h6> --}}
                        <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('storeProfileImage', $user->id) }}" Method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" d-flex align-items-center justify-content-center">
                                        <div class="profile-img-wrap edit-img">
                                            <img id="profile_round_image_dist" class="rounded-circle header-profile-user"
                                                src="@if (!empty($user->avatar)) {{ URL::asset('images/' . $user->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                                alt="">
                                            <div class="fileupload btn">
                                                <span class="btn-text">Change</span>
                                                <input type='file' name="profilePic" class="upload" accept="image/*"
                                                    onchange="readURL(this);" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-right">
                                    <button class="btn btn-border-orange submit-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit_addressInfo" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                <div class="modal-content top-line">
                    <div class="modal-header border-0 ">
                        <h6 class="">Employee
                            Information</h6>
                        <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center justify-content-center">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $user->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    @if (!empty($user_full_details->dob))
                                                        <input class="form-control datetimepicker" type="date"
                                                            max="9999-12-31" name="dob"
                                                            value="{{ date('Y-m-d', strtotime($user_full_details->dob)) }}"
                                                            readonly>
                                                    @else
                                                        <input class="form-control datetimepicker" type="date"
                                                            max="9999-12-31" name="dob" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Gender</label>

                                                <select class="form-select form-control" name="gender"
                                                    aria-label="Default select">
                                                    <option selected hidden disabled>Choose Gender</option>
                                                    @foreach ($genderArray as $item)
                                                        <option value="{{ $item }}"
                                                            @if (!empty($user_full_details->gender) && $user_full_details->gender == $item) selected @endif>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">

                                                <label>Reports To <span class="text-danger">*</span></label>
                                                <select class="form-select form-control" name="report">
                                                    <option disabled hidden selected>Select Report</option>

                                                    @foreach ($allEmployees as $singleEmp)
                                                        <option value="{{ $singleEmp->user_code }}"
                                                            @if (!empty($reportingManager) && $reportingManager->user_code == $singleEmp->user_code) selected @endif>
                                                            {{ $singleEmp->user_code . ' (' . $singleEmp->name . ')' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Phone Number</label>
                                        <input type=text size=20 maxlength=10 onkeypress='return isNumberKey(event)'
                                            class="form-control" name="mobile_number"
                                            value="{{ $user_full_details->mobile_number ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="present_email"
                                            onkeypress='return isValidEmail(email)' class="form-control"
                                            value="{{ $user->email ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Current Address Line - 1</label>
                                        <textarea name="current_address_line_1" id="current_address_line_1" cols="30" rows="3"
                                            class="form-control" value="{{ $user_full_details->current_address_line_1 ?? '' }}">{{ $user_full_details->current_address_line_1 ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Current Address Line - 2</label>
                                        <textarea name="current_address_line_2" id="current_address_line_2" cols="30" rows="3"
                                            class="form-control" value="{{ $user_full_details->current_address_line_2 ?? '' }}">{{ $user_full_details->current_address_line_2 ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Permanent Address Line - 1</label>
                                        <textarea name="permanent_address_line_1" id="permanent_address_line_1" cols="30" rows="3"
                                            class="form-control" value="{{ $user_full_details->permanent_address_line_1 ?? '' }}">{{ $user_full_details->permanent_address_line_1 ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Permanent Address Line - 2</label>
                                        <textarea name="permanent_address_line_2" id="permanent_address_line_2" cols="30" rows="3"
                                            class="form-control" value="{{ $user_full_details->permanent_address_line_2 ?? '' }}">{{ $user_full_details->permanent_address_line_2 ?? '' }}</textarea>
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

        <div id="edit_experienceInfo" class="modal custom-modal fade " role="dialog" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content profile-box top-line">
                    <div class="modal-header border-0">
                        <h6 class="modal-title">Experience
                            Information</h6>
                        <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateExperienceInfo', $user->id) }}" Method="POST">
                            @csrf
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="javascript:void(0);" class="delete-icon text-end"><i
                                                class="   ri-delete-bin-line"></i></a>

                                        <div class="exp-content-container">
                                            <div class="row exp-addition-content" id="content1">
                                                <input type="hidden" name="ids[]">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <label class="focus-label">Company Name</label>
                                                        <input type="text" name="company_name[]"
                                                            class="form-control floating" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <label class="focus-label">Location</label>
                                                        <input type="text" name="location[]"
                                                            class="form-control floating" value="" required>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <label class="focus-label">Job Position</label>
                                                        <input type="text" name="job_position[]"
                                                            class="form-control floating" value="" required>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <label class="focus-label">Period From</label>
                                                        <div class="cal-icon">
                                                            <input type="date" max="9999-12-31" name="period_from[]"
                                                                class="form-control floating datetimepicker"
                                                                value="" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 form-focus focused">
                                                        <div class="cal-icon">
                                                            <label class="focus-label">Period To</label>
                                                            <input type="date" max="9999-12-31" name="period_to[]"
                                                                class="form-control floating datetimepicker"
                                                                value="" required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more text-end">
                                            <div class="text-primary f-13" id="exp-add-more">
                                                <i class=" ri-add-circle-fill"></i> Add More
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

        <div id="edit_generalInfo" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content profile-box top-line">
                    <div class="modal-header border-0">
                        <h6 class="modal-title">Personal
                            Information</h6>
                        <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updatePersonalInfo', $user->id) }}" Method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Passport No</label>
                                        <input type="text" class="form-control" name="passport_number"
                                            value="{{ $user_full_details->passport_number ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Passport Expiry Date</label>
                                        <div class="cal-icon">
                                            @if (!empty($user_full_details->passport_date))
                                                <input class="form-control datetimepicker" name="passport_date"
                                                    type="date" max="9999-12-31"
                                                    value="{{ date('Y-m-d', strtotime($user_full_details->passport_date)) }}">
                                            @else
                                                <input class="form-control datetimepicker" name="passport_date"
                                                    type="date" max="9999-12-31" value="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Tel</label>
                                        <input class="form-control" value="{{ $user_full_details->mobile_number ?? '' }}"
                                            name="mobile_number" minlength="10" maxlength="10" type="number"
                                            maxlength="10" minlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <select placeholder="Choose nationality" name="nationality" id="nationality"
                                            class="onboard-form form-control textbox form-select  select2_form_without_search"
                                            required>
                                            <option value="" hidden selected disabled>Choose nationality</option>
                                            <option value="Indian" @if ($user_full_details->nationality == 'Indian') selected @endif>
                                                Indian</option>
                                            <option value="Other Nationality"
                                                @if ($user_full_details->nationality == 'Other Nationality') selected @endif>Other Nationality
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Religion</label>
                                        <div class="cal-icon">
                                            <input class="form-control onboard-form" pattern-data="name" name="religion"
                                                type="text" pattern-data="alpha"
                                                value="{{ $user_full_details->religion ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Marital status <span class="text-danger">*</span></label>
                                        <select class="form-select form-control text-capitalize" name="marital_status"
                                            required>
                                            <option class="" selected hidden disabled>Select Marital</option>
                                            @foreach ($maritalStatus as $item_maritalStatus)
                                                <option @if (!empty($user_full_details->marital_status) && $user_full_details->marital_status == $item_maritalStatus) selected @endif
                                                    value="{{ $item_maritalStatus }}">{{ ucfirst($item_maritalStatus) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Spouse Name</label>
                                        <input class="form-control onboard-form" type="text" name="spouse"
                                            pattern-data="alpha" value="{{ $user_full_details->spouse_name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>No. of children </label>
                                        <input class="form-control onboard-form" type="number" name="no_of_children"
                                            maxlength="2" value="{{ $user_full_details->no_of_children ?? '' }}">
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

        <div id="edit_familyInfo" class="modal custom-modal fade " role="dialog" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content profile-box">
                    <div class="modal-header  border-0">
                        <h6 class="modal-title">Family
                            Information</h6>
                        <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updtaeFamilyInfo', $user->id) }}" Method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if (!empty($familydetails) && count($familydetails) > 0)
                                @foreach ($familydetails as $singledetail)
                                    {{-- <div class="content-container"> --}}
                                    <div class="family-addition-container">
                                        <div class="card mb-3 addition-content" id="content1">
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-md-12 m-0 text-end">
                                                        <button
                                                            class="btn text-danger delete-btn p-0 bg-transparent outline-none border-0 f-12 plus-sign"
                                                            type="button"><i class="f-12 me-1 fa text-danger  fa-trash"
                                                                aria-hidden="true"></i>Delete
                                                            </i></button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Name <span class="text-danger">*</span></label>
                                                            <input name="name[]" class="form-control onboard-form"
                                                                type="text" pattern-data="name" required
                                                                value="{{ $singledetail->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Relationship <span class="text-danger">*</span></label>
                                                            <input name="relationship[]" class="form-control onboard-form"
                                                                type="text" pattern-data="alpha" required
                                                                value="{{ $singledetail->relationship }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Date of birth <span class="text-danger">*</span></label>
                                                            <input name="dob[]" class="form-control onboard-form"
                                                                type="date" max="9999-12-31" required
                                                                value="{{ $singledetail->dob }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Phone <span class="text-danger">*</span></label>
                                                            <input name="phone_number[]" class="form-control onboard-form"
                                                                type="number" maxlength="10" minlength="10" required
                                                                value="{{ $singledetail->phone_number }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div> --}}
                                    </div>
                                @endforeach

                                <div class="add-more text-end mb-2" style="cursor:pointer;">
                                    {{-- <div id="add_more" class="text-primary  cursor-pointer">
                                        <i class=" ri-add-circle-fill"></i> Add More
                                    </div> --}}
                                    <button id="add_more"
                                        class="btn text-primary p-0 bg-transparent outline-none border-0 f-12 plus-sign"
                                        type="button"><i class="f-12 me-1 fa  fa-plus-circle" aria-hidden="true"></i>Add
                                        More</i></button>
                                </div>
                            @else
                                <div class="family-addition-container">
                                    <div class="card mb-3 addition-content" id="content1">
                                        <div class="card-body">
                                            <!-- <h3 class="card-title fw-bold">Education Informations <a href="javascript:void(0);"
                                                                                        {{-- class="delete-icon"><i class="   ri-delete-bin-line"></i></a> --}}
                                                                                </h3> -->

                                            <div class="row ">
                                                <div class="col-md-12 m-0 text-end">
                                                    <button
                                                        class="btn text-danger delete-btn p-0 bg-transparent outline-none border-0 f-12 plus-sign"
                                                        type="button"><i class="f-12 me-1 fa text-danger  fa-trash"
                                                            aria-hidden="true"></i>Delete
                                                        </i></button>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Name<span class="text-danger">*</span></label>
                                                        <input name="name[]" class="form-control onboard-form"
                                                            type="text" pattern-data="name" required value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input name="relationship[]" class="form-control onboard-form"
                                                            type="text" pattern-data="alpha" required value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input name="dob[]" class="form-control onboard-form"
                                                            type="date" max="9999-12-31" required value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input name="phone_number[]" class="form-control onboard-form"
                                                            type="number" maxlength="10" minlength="10" required
                                                            value="">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="add-more text-end mb-2" style="cursor:pointer;">
                                    {{-- <button id="add_more" class="text-primary  cursor-pointer">
                                    <i class=" ri-add-circle-fill"></i> Add More
                                </button> --}}
                                    <button id="add_more"
                                        class="btn text-primary p-0 bg-transparent outline-none border-0 f-12 plus-sign"
                                        type="button"><i class="f-12 me-1 fa  fa-plus-circle" aria-hidden="true"></i>Add
                                        More</i></button>
                                </div>
                            @endif

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
    </div>
@endsection
@section('script')
    @yield('script-profile-avatar')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>

    <script>
        $(document).ready(function() {

            @if (!empty($reportingManager))
                generateProfileShortName_VendorScript("manager_shortname", "{{ $reportingManager->name }}");
            @endif

            console.log("ready!");
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
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
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
            $('.exp-content-container').append('<div class="row exp-addition-content" id="content' + length +
                '"><input type="hidden" name="ids[]"><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Company Name</label><input type="text" class="form-control floating" name="company_name[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Location</label><input type="text" class="form-control floating" name="location[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Job Position</label><input type="text" class="form-control floating" name="job_position[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Period From</label><div class="cal-icon"><input type="date" max="9999-12-31" class="form-control floating datetimepicker" name="period_from[]" required></div></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><div class="cal-icon"><label class="focus-label">Period To</label><input type="date" max="9999-12-31"  class="form-control floating datetimepicker" name="period_to[]" required></div></div></div></div>'
            );
        });

        $('#add_more').click(function() {
            var id = $('.addition-content:last').attr('id');
            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }
            $('.family-addition-container').append(' <div class="card mb-2  addition-content" id="content' +
                length +
                '"><div class="card-body"> <div class="row" > <div class="col-md-12 m-0 text-end"><button class="btn text-danger delete-btn p-0 bg-transparent outline-none border-0 f-12 plus-sign" type="button"><i class="f-12 me-1 fa text-danger  fa-trash" aria-hidden="true"></i>Delete</i></button></div><div class="col-md-6"><div class="form-group mb-3"><label>Name <span class="text-danger">*</span></label><input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Relationship <span class="text-danger">*</span></label><input name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Date of birth <span class="text-danger">*</span></label><input name="dob[]" class="form-control onboard-form" type="date" max="9999-12-31" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Phone <span class="text-danger">*</span></label><input name="phone_number[]" class="form-control onboard-form" type="number" maxlength="10" minlength="10" required></div></div></div>'
            );
        });

        // emergency contact

        $('#addMore_emergencyCont').click(function() {
            var id = $('.emergency-addition-content:last').attr('id');
            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }
            $('.emergency-content-wrapper').append(
                ' <div class="card mb-3  emergency-addition-content" id="content' +
                length +
                '"><div class="card-body"> <div class="row" > <div class="col-md-12 m-0 text-end"><button class="btn text-danger delete-btn p-0 bg-transparent outline-none border-0 f-12 plus-sign" type="button"><i class="f-12 me-1 fa text-danger  fa-trash" aria-hidden="true"></i>Delete</i></button></div><div class="col-md-6"><div class="form-group mb-3"><label>Name <span class="text-danger">*</span></label><input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Relationship <span class="text-danger">*</span></label><input name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Phone<span class="text-danger">*</span></label><input name="dob[]" class="form-control onboard-form" type="text"  required></div></div></div>'
            );
        });




        // delete card funtion
        // $('.delete-btn').click(function() {
        //     var $target = $(this).parents('');
        //     $target.hide('slow', function() {
        //         $target.remove();
        //     });
        // })


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
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;

        }

        function isValidEmail(email) {
            const re =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        // $(".progress-bar").animate({
        // style="width: {{ $profileCompletenessValue }}%"
        // }, 2500);

        $('body').on('click', '.close-modal', function() {
            $('#notificationModal').hide();
            $('#notificationModal').addClass('fade');
        });


        $('.view-file').on('click', function(e) {
            console.log($(this).data('src'));
            var docHtmlString = "<img src=" + $(this).data('src') +
                " width='100%' / style='width:100%;height:400px;'>";
            $('#modalBody').html(docHtmlString);

            $('#notificationModal').show();
        })

        function approveOrRejectDocument(docName, aproveStatus) {
            $.ajax({
                url: "{{ route('vmt-store-documents-review') }}",
                type: "POST",
                data: {
                    user_code: $('#hidden_user_code').val(),
                    doc_name: docName,
                    approve_status: aproveStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert("Document reviewed successfully");
                    //window.location.href = "/";
                    location.reload();
                }
            });
        }

        function approveAllDocument() {
            //e.preventDefault();
            console.log('aprove_All');

            var doc_reviewed = {
                aadhar_card_file: 1,
                aadhar_card_backend_file: 1,
                pan_card_file: 1,
                passport_file: 1,
                voters_id_file: 1,
                dl_file: 1,
                education_certificate_file: 1,
                reliving_letter_file: 1
            }

            $.ajax({
                url: "{{ route('vmt-store-documents-review-approve-all') }}",
                type: "POST",
                data: {
                    user_code: $('#hidden_user_code').val(),
                    doc_array: doc_reviewed,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert("All Documents approved successfully");
                    //window.location.href = "/";
                    location.reload();
                }
            });
        }
    </script>
@endsection
