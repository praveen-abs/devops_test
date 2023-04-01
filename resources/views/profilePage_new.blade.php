<?php use Carbon\Carbon; ?>
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
                                <button class="btn outline-none border-0 bg-transparent m-0 p-0"
                                    data-bs-target="#show_idCard" data-bs-toggle="modal">
                                    <i class="fa fa-id-card text-success" aria-hidden="true"></i>
                                </button>

                                {{-- <i class="bi bi-person-vcard"></i> --}}
                            </div>
                            <div class="col-12 text-center">


                                <div class="rounded-circle img-xl
                                 mx-auto userActive-status profile-img"
                                    style="border:6px solid #c2c2c2c2">
                                    @include('ui-profile-avatar-lg', [
                                        'currentUser' => $user,
                                    ])
                                    <a class="edit-icon  " data-bs-toggle="modal" data-bs-target="#edit_profileImg"
                                        id="">
                                        <i class="fa fa-camera"></i></a>
                                </div>


                                <div class="mt-4">
                                    <div class="progress-wrapper border-bottom-liteAsh ">
                                        <div class="mb-1 text-center">
                                            <h6 class="text-center">{{ $user->name }}</h6>
                                        </div>
                                        <div class="mb-1 d-flex justify-content-between ">
                                            <span class="text-muted f-12">Profile Completeness :</span>
                                            <span class="text-muted text-end f-12 fw-bold" id="prograssBar_percentage">

                                            </span>
                                        </div>
                                        <div class="progress progress-bar-content mb-2">
                                            <div class="progress-bar  " role="progressbar" id="profile_progressBar"
                                                aria-valuenow="{{ $profileCompletenessValue }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted f-10 text-start mb-2 fw-bold">Your profile is completed</p>
                                    </div>

                                    <div class="profile-mid-right-content mb-4 text-center ">
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Employee Status</p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ getEmployeeActiveStatus($user->id) ?? '-' }}
                                            </p>

                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Employee Code</p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $user_full_details->user_code ?? '-' }}
                                            </p>

                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Employee Designation</p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $user_full_details->designation ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Location</p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $user_full_details->work_location ?? '-' }}</p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Department
                                                @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))
                                                <a role="button" class="edit-icon" data-bs-toggle="modal"
                                                data-bs-target="#edit_department"><i class="ri-pencil-fill"></i></a>
                                                @endif
                                            </p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $department ?? '-' }}

                                            </p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Reporting To
                                                @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))

                                                <a role="button"
                                                    class="edit-icon" data-bs-toggle="modal"
                                                    data-bs-target="#edit_reportingManager"><i
                                                        class="ri-pencil-fill"></i></a>
                                                @endif
                                                    </p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $user_full_details->l1_manager_name ?? '-' }}</p>

                                        </div>
                                    </div>
                                    <div class="profile-bottom-right-content  text-center ">
                                        {{-- <button class="btn btn-danger"><i class="fa fa-sign-out me-2"></i> Logout </button> --}}
                                        <button class="btn btn-danger"><i class="fa fa-sign-out me-1"></i> Action </button>
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
                            <li class="nav-item  " role="presentation">
                                <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#employee_details" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Employee Details</a>
                            </li>
                            <li class="nav-item  mx-4" role="presentation">
                                <a class="nav-link  " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#family_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Family</a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link  " id="pills-home-tab" data-bs-toggle="pill" href=""
                                    data-bs-target="#experience_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Experience</a>
                            </li>
                            <li class="nav-item  mx-4 " role="presentation">
                                <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#finance_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Finance</a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                                    data-bs-target="#document_det" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Document</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content " id="pills-tabContent">

                    <div class="tab-pane fade active show" id="employee_details" role="tabpanel" aria-labelledby="">
                        @vite('resources/js/hrms/modules/profile_pages/EmployeeDetails.js')
                        <div id="EmployeeDetails"></div>
                    </div>

                    {{-- family_det --}}
                    <div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">
                        {{-- <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="">Family Information
                                    <!-- <span class="personal-edit">
                                        <a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#edit_familyInfo">

                                            </a>
                                    </span> -->
                                    <button type="button" class="btn_txt edit-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="ri-pencil-fill"></i>
                                            </button>
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
                                                        <td>{{ date('d-M-Y', strtotime($singledetail->dob)) }}</td>
                                                        <td>{{ $singledetail->phone_number }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>


                                </form>
                            </div>
                        </div> --}}

                        @vite('resources/js/hrms/modules/profile_pages/FamilyDetails.js')
                        <div id="familyinformation">
                        </div>

                    </div>

                    {{-- experience_det --}}
                    <div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">
                        {{-- <div class="card mb-2">
                            <div class="card-body">
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
                                            @if ($exp)
                                                @foreach ($exp as $k => $info)
                                                    <tr>
                                                         date('M-Y', strtotime($employee_payslip->PAYROLL_MONTH))
                                                        <td>{{ $info['company_name'] }}</td>
                                                        <td>{{ $info['job_position'] }}</td>
                                                        <td>{{ date('d-M-Y', strtotime($info['period_from'])) }}</td>
                                                        <td>{{ date('d-M-Y', strtotime($info['period_to'])) }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif



                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </form>
                            </div>
                        </div>--}}

                        @vite('resources/js/hrms/modules/profile_pages/ExperienceDetails.js')
                        <div id="ExperienceDetails"></div>

                    </div>

                    {{-- finance_det --}}
                    <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">

                        @vite('resources/js/hrms/modules/profile_pages/FinanceDetails.js')
                        <div id="FinanceDetails"></div>
                    </div>

                </div>



                <div id="edit_department" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content profile-box">
                            <div class="modal-header  ">
                                <h6 class="modal-title">Edit Department
                                </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label>Department<span class="text-danger">*</span></label>

                                    <select class="form-select form-control" name="gender" aria-label="Default select"
                                        id="selected_dep">
                                        <option selected hidden disabled>Choose Gender</option>
                                        @foreach ($allDepartments as $singleDepartment)
                                            <option value="{{ $singleDepartment->id }}"
                                                @if (!empty($department) && $department == $singleDepartment->name) selected @endif>
                                                {{ $singleDepartment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right">
                                    <button class="btn btn-orange submit-btn" id="save_department">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div id="edit_reportingManager" class="modal custom-modal fade" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content profile-box">
                            <div class="modal-header  ">
                                <h6 class="modal-title">Edit Reporting Manager
                                </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label>Manager Name<span class="text-danger">*</span></label>

                                    <select class="form-select form-control" name="gender"
                                        aria-label="Default select"id="selected_report_manager">
                                        <option selected hidden disabled>Choose Reporting Manager</option>
                                        @foreach ($allEmployees as $singleEmployee)
                                            <option value="{{ $singleEmployee->user_code }}">
                                                {{ $singleEmployee->user_code }} - {{ $singleEmployee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right">
                                    <button class="btn btn-orange submit-btn" id="save_reportingManager">Save</button>
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
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
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
                                                    <img id="profile_round_image_dist"
                                                        class="rounded-circle header-profile-user"
                                                        src="@if (!empty($user->avatar)) {{ URL::asset('images/' . $user->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                                        alt="">
                                                    <div class="fileupload btn">
                                                        <span class="btn-text">Change</span>
                                                        <input type='file' name="profilePic" class="upload"
                                                            accept="image/*" onchange="readURL(this);" />
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

                <div id="edit_generalInfo" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content profile-box top-line">
                            <div class="modal-header border-0">
                                <h6 class="modal-title">General Information
                                </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            {{-- <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Birth Date<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                @if (!empty($user_full_details->dob))
                                                    <input class="form-control datetimepicker" type="date"
                                                        max="9999-12-31" name="dob"
                                                        value="{{ date('Y-m-d', strtotime($user_full_details->dob)) }}">
                                                @else
                                                    <input class="form-control datetimepicker" type="date"
                                                        max="9999-12-31" name="dob" value="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Gender<span class="text-danger">*</span></label>

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

                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Date Of Joining(DOJ)<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                @if (!empty($user_full_details->doj))
                                                    <input class="form-control " type="date" max="9999-12-31"
                                                        name="doj"
                                                        value="{{ date('Y-m-d', strtotime($user_full_details->doj)) }}">
                                                @else
                                                    <input class="form-control onboard" type="date" max="9999-12-31"
                                                        name="doj" value="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Blood Group <span class="text-danger"></span></label>
                                            <select class="form-select form-control text-capitalize" name="blood_group"
                                                required>
                                                <option class="" selected hidden disabled>Select Blood Group
                                                </option>
                                                @foreach ($array_bloodgroup as $bloodgroup)
                                                    <option @if (!empty($user_full_details->blood_group_id) && $user_full_details->blood_group_id == $bloodgroup->id) selected @endif
                                                        value="{{ $bloodgroup->id }}">{{ $bloodgroup->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="form-select form-control text-capitalize" name="marital_status"
                                                required>
                                                <option class="" selected hidden disabled>Select Marital
                                                </option>
                                                @foreach ($maritalStatus as $item_maritalStatus)
                                                    <option @if (!empty($user_full_details->marital_status) && $user_full_details->marital_status == $item_maritalStatus) selected @endif
                                                        value="{{ $item_maritalStatus }}">
                                                        {{ ucfirst($item_maritalStatus) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Physically Handicapped</label>
                                            @if (!empty($user_full_details->physically_challenged))
                                                <input type="text" name="physically_challenged"
                                                    id="physical_challenge" class="form-control "
                                                    value=" {{ $user_full_details->physically_challenged }}">
                                            @else
                                                <input type="text" name="physically_challenged"
                                                    id="physical_challenge" class="form-control " value="">
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="text-right col-12">
                                    <button id="btn_submit_generalInfo"
                                        class="btn btn-border-orange submit-btn">Save</button>
                                </div>

                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- personal informatios -->
                <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                        <div class="modal-content top-line">
                            <div class="modal-header border-0 ">
                                <h6 class="modal-title"> Contact Information
                                </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                @csrf
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                            <label>Personal Email</label>
                                            <input type="email" name="present_email"
                                                onkeypress='return isValidEmail(email)' class="form-control"
                                                value="{{ $user->email ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label> Office Email</label>
                                            <input type="email" onkeypress='return isValidEmail (email)'
                                                class="form-control" name="officical_mail"
                                                value="{{ !empty($user_full_details->officical_mail) ? $user_full_details->officical_mail : '-' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                            <label>Mobile Number</label>
                                            <input type="text" size=20 maxlength=10 name="mobile_number"
                                                onkeypress='return isNumberKey(event)' class="form-control"
                                                value="{{ !empty($user_full_details->mobile_number) ? $user_full_details->mobile_number : '-' }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-right">
                                            <button id="btn_submit_contact_info"
                                                class="btn btn-border-orange submit-btn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- payslip informatios -->
                <div id="payslipModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content profile-box">
                            <div class="modal-header  ">
                                <h6 class="modal-title">Pay Slip
                                </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="slipAfterView">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- address informatios -->
                <div id="edit_addressInfo" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                        <div class="modal-content top-line">
                            <div class="modal-header border-0 ">
                                <h6 class="modal-title"> Address
                                </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Current Address</label>
                                        <textarea name="current_address_line_1" id="current_address_line_1" cols="30" rows="3"
                                            class="form-control" value="{{ $user_full_details->current_address_line_1 ?? '-' }}">{{ $user_full_details->current_address_line_1 ?? '-' }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Permanent Address </label>
                                        <textarea name="permanent_address_line_1" id="permanent_address_line_1" cols="30" rows="3"
                                            class="form-control" value="{{ $user_full_details->permanent_address_line_1 ?? '-' }}">{{ $user_full_details->permanent_address_line_1 ?? '-' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-right">
                                        <button
                                            id="btn_submit_address"class="btn btn-border-orange submit-btn">Save</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
                <!--  -->
                <!--  -->
                <!--  -->


                <!-- family informatios old -->

<!-- end -->

                <!--  -->
                <!--  -->
                <!--  -->
                <!-- family informatios new  -->

                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg div">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title txt" id="exampleModalLabel">Family Information
                            </h6>
                            <button type="button" class="btn-close rounded-circle Btn" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @if (empty($familydetails))
                        <div class="modal-body" id="ul_id">

                            <div class="input-card">
                                <!-- <button class="delete_btn text-danger">
                                    <i class="f-12 me-1 fa text-danger  fa-trash"aria-hidden="true"></i>
                                 Delete </button> -->
                                <ul>
                                    <li>
                                        <div class="space-between">
                                            <div class="input_text flex-col">
                                            <span>Name <span class="text-danger">*</span></span>
                                            <input type="text" name="familyDetails_Name[]" pattern-data="name" id="familyDetails_Name" required  >
                                            </div>
                                            <div class="input_text flex-col">
                                            <span>Relationship<span class="text-danger">*</span></span>
                                            <input type="text" name="familyDetails_Relationship[]" id="familyDetails_Relationship"  pattern-data="alpha" required >
                                            </div>
                                        </div>
                                        <div class="space-between M-T">
                                            <div class="input_text flex-col">
                                            <span>Date of birth <span class="text-danger">*</span></span>
                                            <input type="date" id="datemin" name="familyDetails_dob[]"  min="2000-01-02">
                                            </div>

                                            <div class="input_text flex-col">
                                            <span>phone<span class="text-danger">*</span></span>
                                            <input type="number"   minlength="10" maxlength="10" id="familyDetails_phoneNumber" name="familyDetails_phoneNumber[]">
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        @else
                            @foreach ($familydetails as $singledetail)
                                <div class="modal-body" id="ul_id">

                                    <div class="input-card">
                                        <button class="delete_button_family_details text-danger" data-family-details-id="{{ $singledetail->id }}" >
                                            <i class="f-12 me-1 fa text-danger  fa-trash"aria-hidden="true"></i>
                                        Delete </button>
                                        <ul>
                                            <li>
                                                <div class="space-between">
                                                    <div class="input_text flex-col">
                                                    <span>Name <span class="text-danger">*</span></span>
                                                    <input type="text" name="familyDetails_Name[]" pattern-data="name"
                                                     value="{{ $singledetail->name }}" required  >
                                                    </div>
                                                    <div class="input_text flex-col">
                                                    <span>Relationship<span class="text-danger">*</span></span>
                                                    <input type="text" name="familyDetails_Relationship[]"  pattern-data="alpha"
                                                    value="{{ $singledetail->relationship }}" required >
                                                    </div>
                                                </div>
                                                <div class="space-between M-T">
                                                    <div class="input_text flex-col">
                                                    <span>Date of birth <span class="text-danger">*</span></span>
                                                    <input type="date"  name="familyDetails_dob[]"
                                                    value="{{ date('Y-m-d', strtotime($singledetail->dob)) }}"  min="2000-01-02">
                                                    </div>

                                                    <div class="input_text flex-col">
                                                    <span>Phone<span class="text-danger">*</span></span>
                                                    <input type="number"   minlength="10" maxlength="10" name="familyDetails_phoneNumber[]" value="{{ $singledetail->phone_number }}">
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                @endforeach
                        @endif

                        <div class="modal-footer flex-column mdl">
                            <button type="button" class="add_more bg-light " id="Add_Mores">
                            <i class=" ri-add-circle-fill"></i>
                            <h6>Add More</h6>
                            </button>
                            <button type="button" class="submit_btn" id="submit_button_family_details">submit</button>
                        </div>
                        </div>
                    </div>
                </div> --}}

              <!--  -->
              <!--  -->

              <!--  -->



                <!-- experience informatios -->
                <div id="edit_experienceInfo" class="modal custom-modal fade " role="dialog" aria-modal="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content profile-box top-line">
                            <div class="modal-header border-0">
                                <h6 class="modal-title">Experience
                                    Information</h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- <form action="{{ route('updateExperienceInfo', $user->id) }}" Method="POST"> --}}
                                @csrf
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <a href="javascript:void(0);" class="delete-icon text-end"><i
                                                    class="   ri-delete-bin-line"></i>
                                            </a> -->

                                            <div class="exp-content-container">

                                                <ul id="experienceinfo_ul_list_id">
                                                        <li>
                                                            <div class="row exp-addition-content" id="content1">
                                                                    <a href="javascript:void(0);" class="delete-icon text-end"><i
                                                                    class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                <input type="hidden" name="ids[]">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3 form-focus focused">
                                                                            <label class="focus-label">Company Name</label>
                                                                            <input type="text" name="experienceDetials_company_name[]"
                                                                                class="form-control floating" value="" required>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <label class="focus-label">Location</label>
                                                                        <input type="text" name="experienceDetials_location[]"
                                                                            class="form-control floating" value="" required>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <label class="focus-label">Job Position</label>
                                                                        <input type="text" name="experienceDetials_job_position[]"
                                                                            class="form-control floating" value="" required>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <label class="focus-label">Period From</label>
                                                                        <div class="cal-icon">
                                                                            <input type="date" max="9999-12-31"
                                                                                name="experienceDetials_period_from[]"
                                                                                class="form-control floating datetimepicker"
                                                                                value="" required>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <div class="cal-icon">
                                                                            <label class="focus-label">Period To</label>
                                                                            <input type="date" max="9999-12-31" name="experienceDetials_period_to[]"
                                                                                class="form-control floating datetimepicker"
                                                                                value="" required>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                <!-- <div class="row exp-addition-content" id="content1">
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
                                                                <input type="date" max="9999-12-31"
                                                                    name="period_from[]"
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
                                                </div> -->



                                            </div>
                                            <!-- <div class="add-more text-end">
                                                <div class="text-primary f-13" id="exp-add-more">
                                                    <i class=" ri-add-circle-fill"></i> Add More
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!--  -->
                                    <div class="add-more text-end">
                                                <div class="text-primary f-13" id="exp-add-more">
                                                    <i class=" ri-add-circle-fill"></i> Add More
                                                </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="text-right">
                                        <button id="btn_submit_experience_info"
                                            class="btn btn-orange submit-btn">Submit</button>
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>




                <div id="show_idCard" class="modal custom-modal fade" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
                        <div class="modal-content profile-box">
                            <div class="modal-header border-0  text-end d-flex justify-content-between">
                                <h6 class="modal-title">Digital
                                    Id Preview </h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body mx-auto text-center">

                                <div class="card-sm card mb-3" style="">
                                    <div class="card-body text-center ">
                                        <img src=" {{ URL::asset(session()->get('client_logo_url')) }}" alt=""
                                            class="" height="50" width="130">


                                        {{-- <img src="{{ URL::asset($generalInfo->logo_img) }}" alt=""
                                        class=""> --}}
                                        {{-- <div class="profile-img d-flex justify-content-center flex-column text-center"> --}}
                                        <div class="profile-img img-xl rounded my-2 mx-auto">
                                            @include('ui-profile-avatar-lg', [
                                                'currentUser' => $user,
                                            ])
                                        </div>
                                        <p class="fw-bold f-14 text-primary text-center mt-4 ">{{ $user->name }}
                                        </p>
                                        <p class=" f-14 text-ash  text-center mt-2">
                                            {{ !empty($user_full_details->designation) ? $user_full_details->designation : '' }}
                                        </p>
                                        <p class="fw-bold f-14 text-center text-muted mt-2 ">
                                            {{ $user_full_details->user_code }}</p>
                                        {{-- </div> --}}


                                    </div>
                                </div>
                                {{-- <button class="btn btn-orange"><i class="fa fa-download me-2"></i>Download</button> --}}



                            </div>
                        </div>
                    </div>
                </div>

                <div id="show_documents" class="modal custom-modal fade" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
                        <div class="modal-content profile-box">
                            <div class="modal-header border-0  text-end d-flex justify-content-between">
                                <h6 class="modal-title">View Documents </h6>
                                <button type="button" class="closes btn-close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <div id="documents_content"></div>



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
    @yield('script-profile-avatar')
    @vite(['resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.js'])


    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            let empActiveStatus = "{{ getEmployeeActiveStatus($user->id) ?? 'null' }}";

            if (empActiveStatus == "Active") {
                $('.userActive-status').css('border-color', '#2e9102');

            } else if (empActiveStatus == "Yet to Activate") {
                $('.userActive-status').css('border-color', '#ff0000');
            } else {
                $('.userActive-status').css('border-color', '#ffb10b');
            }


            let storeProfileValue = {{ $profileCompletenessValue }};
            console.log(storeProfileValue);

            if (storeProfileValue > 0 && storeProfileValue < 50) {
                $("#profile_progressBar").css('background-color', '#cd0101');
            } else if (storeProfileValue > 51 && storeProfileValue < 80) {
                $("#profile_progressBar").css('background-color', '#ddc801');
            } else {
                $("#profile_progressBar").css('background-color', '#2e9102');
            }

            $("#profile_progressBar").animate({
                width: "{{ $profileCompletenessValue }}%"
            }, {
                duration: 2500,
                easing: "linear",
                step: function(percentageValue) {
                    $("#prograssBar_percentage").text(Math.round(percentageValue * 100 / 100) + "%");
                }
            });

            // @if (!empty($reportingManager))
            //     generateProfileShortName_VendorScript("manager_shortname", "{{ $reportingManager->id }}");
            // @endif

            console.log("ready!");
        });




        $('#save_department').click(function() {
            var department_id = $('#selected_dep').val();

            let emp_id = "{{ $user_full_details->user_id }}";

            $.ajax({
                url: "{{ route('profile-pages-updatedepartment') }}",
                type: 'POST',
                data: {
                    emp_id: emp_id,
                    department_id: department_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    location.reload();
                }
            });


        });

        $('#save_reportingManager').click(function() {
            var manager_user_code = $('#selected_report_manager').val();
            var current_user_id = '{{ $user_full_details->user_id }}';
            console.log(current_user_id);

            $.ajax({
                url: "{{ route('profile-pages-update-reporting-mgr') }}",
                type: 'POST',
                data: {
                    manager_user_code: manager_user_code,
                    current_user_id: current_user_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    location.reload();
                }
            });
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
            if ($(this).attr('pattern-data') != undefined && $(this).attr('pattern-data') != '' &&
                inputvalues !=
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


        $('#add_experienceDetails').click(function() {
            var id = $('.exp-addition-card:last').attr('id');
            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }
            $('.exp-content-container').append(
                '<input type="hidden" name="ids[]"><div class="card  exp-addition-card" id="content' +
                length +
                '"><div class="card-body"><div class="row"> <div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Company Name</label><input type="text" class="form-control floating" name="company_name[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Location</label><input type="text" class="form-control floating" name="location[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Job Position</label><input type="text" class="form-control floating" name="job_position[]" required></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><label class="focus-label">Period From</label><div class="cal-icon"><input type="date" max="9999-12-31" class="form-control floating datetimepicker" name="period_from[]" required></div></div></div><div class="col-md-6"><div class="form-group mb-3 form-focus focused"><div class="cal-icon"><label class="focus-label">Period To</label><input type="date" max="9999-12-31"  class="form-control floating datetimepicker" name="period_to[]" required></div></div></div></div></div></div>'
            );
        });

        $('#addMore_family').click(function() {
            var id = $('.addition-content:last').attr('id');

            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }

            $('.family-addition-container').append(' <div class="card mb-2  addition-content" id="content' +
                length +
                '"><div class="card-body"> <div class="row" > <div class="col-md-12 m-0 text-end"><button class="btn text-danger delete-btn-family p-0 bg-transparent outline-none border-0 f-12 plus-sign" type="button"><i class="f-12 me-1 fa text-danger  fa-trash" aria-hidden="true"></i>Delete</i></button></div><div class="col-md-6"><div class="form-group mb-3"><label>Name <span class="text-danger">*</span></label><input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Relationship <span class="text-danger">*</span></label><input name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Date of birth <span class="text-danger">*</span></label><input name="dob[]" class="form-control onboard-form" type="date" max="9999-12-31" required></div></div><div class="col-md-6"><div class="form-group mb-3"><label>Phone <span class="text-danger">*</span></label><input name="phone_number[]" class="form-control onboard-form" type="number" maxlength="10" minlength="10" required></div></div></div>'
            );
            //$('.family-addition-container').append('<h2>test</h2>');
        });

        $('.delete-btn-family').click(function(){
//            console.log("Family Details : Deleting DIV id : "+parentDiV);
            console.log("Family Details delete button clicked");

            let parentDiv = $(this).parent().parent().parent().parent().attr('id');

            //Remove the div
            $('#'+parentDiv).remove();

            //Need to put sweet alert for deleting data in backend




            console.log("Family Details : Deleting DIV id : "+parentDiv);

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


        $('body').on('click', '.close-modal', function() {
            $('#notificationModal').hide();
            $('#notificationModal').addClass('fade');
        });


        $('.view-file').on('click', function(e) {
            console.log($(this).data('src'));
            var docHtmlString = "<img src=" + $(this).data('src') +
                " width='100%' / style='width:100%;height:400px;'>";

            $('#documents_content').html(docHtmlString);

            // $('#show_documents').show();
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

        $(document).ready(function() {
            $("#btn_submit_generalInfo").on('click', function(e) {
                e.preventDefault();
                var dob = $("input[name='dob']").val();
                var gender = $("select[name='gender']").val();
                var doj = $("input[name='doj']").val();
                var marital_status = $("select[name='marital_status']").val();
                var blood_group = $("select[name='blood_group']").val();
                var physically_challenged = $("input[name='physically_challenged']").val();

                $.ajax({
                    url: "{{ route('updateGeneralInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        dob: dob,
                        gender: gender,
                        doj: doj,
                        marital_status: marital_status,
                        blood_group: blood_group,
                        physically_challenged: physically_challenged,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        Swal.fire({

                            text: 'General Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }


                });
                console.log(physical_challenge);
            });
        });


        $(document).ready(function() {
            $("#btn_submit_contact_info").on('click', function(e) {
                e.preventDefault();

                var present_email = $("input[name='present_email']").val();
                var officical_mail = $("input[name='officical_mail']").val();
                var mobile_number = $("input[name='mobile_number']").val();
                console.log(mobile_number);

                $.ajax({
                    url: "{{ route('updateContactInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        present_email: present_email,
                        officical_mail: officical_mail,
                        mobile_number: mobile_number,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        Swal.fire({

                            text: 'Contact Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }

                });

            });
        });


        $(document).ready(function() {
            $("#btn_submit_address").on('click', function(e) {
                e.preventDefault();

                var current_address_line_1 = $("textarea[name='current_address_line_1']").val();
                var permanent_address_line_1 = $("textarea[name='permanent_address_line_1']").val();

                $.ajax({
                    url: "{{ route('addressInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        current_address_line_1: current_address_line_1,
                        permanent_address_line_1: permanent_address_line_1,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({
                            text: 'Address Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }


                });

            });
        });



        $(document).ready(function() {
            $("body").on("click", "#deleteFamily_btn", function() {

                $.ajax({
                    url: "{{ route('deleteFamilyInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        // Swal.fire({
                        //     text: 'Family Information Updated',
                        //     icon: 'success'
                        // }).then((result) => {

                        //     if (result.isConfirmed) {
                        //         location.reload();

                        //     }
                        // })
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(

                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                $(this).parents(".addition-content").remove();

                                location.reload();
                            }
                        })
                    }

                });





            });
        });

        $(document).ready(function() {
        });

        // $(document).ready(function() {
        //     $("#btn_submit_experience_info").on('click', function(e) {
        //         e.preventDefault();
        // 'ids[]': ids,
        // name="ids[]"
        //         var ids = $('input[name="ids[]"]').map(function() {
        //             return this.value;
        //         }).get();

        //         var company_name = $('input[name="company_name[]"]').map(function() {
        //             return this.value;
        //         }).get();

        //         var t_location = $('input[name="location[]"]').map(function() {
        //             return this.value;
        //         }).get();

        //         var job_position = $('input[name="job_position[]"]').map(function() {
        //             return this.value;
        //         }).get();

        //         var period_from = $('input[name="period_from[]"]').map(function() {
        //             return this.value;
        //         }).get();

        //         var period_to = $('input[name="period_to[]"]').map(function() {
        //             return this.value;
        //         }).get();


        //         $.ajax({
        //             url: "{{ route('updateExperienceInfo', $user->id) }}",
        //             type: 'POST',
        //             data: {
        //                 'ids[]': ids,
        //                 'company_name[]': company_name,
        //                 'location[]': t_location,
        //                 'job_position[]': job_position,
        //                 'period_from[]': period_from,
        //                 'period_to[]': period_to,
        //                 _token: '{{ csrf_token() }}'
        //             },
        //             success: function(data) {
        //                 Swal.fire({

        //                     text: 'Experience Information Updated',
        //                     icon: 'success'
        //                 }).then((result) => {
        //                     console.log("Experience Update status : "+result);
        //                     /* Read more about isConfirmed, isDenied below */
        //                     if (result.isConfirmed) {
        //                         location.reload();
        //                     }
        //                 })
        //             }


        //         });

        //     });
        // });

        $(document).ready(function() {
            $("#btn_submit_bank_info").on('click', function(e) {
                e.preventDefault();

                var bank_name = $("select[name='bank_name']").val();
                var account_no = $("input[name='account_no']").val();
                var bank_ifsc = $("input[name='bank_ifsc']").val();
                var pan_no = $("input[name='pan_no']").val();

                $.ajax({
                    url: "{{ route('updateBankInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        bank_name: bank_name,
                        account_no: account_no,
                        bank_ifsc: bank_ifsc,
                        pan_no: pan_no,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({

                            text: 'Bank Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }

                });
            });
        });

        $(document).ready(function() {
            $("#btn_submit_statutory_info").on('click', function(e) {
                e.preventDefault();

                var pf_applicable = $("select[name='pf_applicable']").val();
                var epf_number = $("input[name='epf_number']").val();
                var uan_number = $("input[name='uan_number']").val();
                var esic_applicable = $("select[name='esic_applicable']").val();
                var esic_number = $("input[name='esic_number']").val();

                $.ajax({
                    url: "{{ route('updateStatutoryInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        pf_applicable: pf_applicable,
                        epf_number: epf_number,
                        uan_number: uan_number,
                        esic_applicable: esic_applicable,
                        esic_number: esic_number,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.paySlipView').on('click', function() {
                var url = $(this).attr('data-url');
                var t_paySlipMonth = $(this).attr('data');
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        selectedPaySlipMonth: t_paySlipMonth,
                        enc_user_id: "{{ $enc_user_id }}"
                    },
                    success: function(data) {
                        var content =
                            '<div class="row " style=""><div class=""><div class="fill body payslip-filter-pdf mb-4"> <i class="icon icon-blue icon-xlg vertical-align-text-bottom text-secondary ri-filter-2-fill"> </i> <div class="dropdown cursor-pointer payslip-dropdown"><div id="ember127" class="ember-view"><div class="dropdown-toggle" data-toggle="dropdown"><span>Financial Year : </span><span class="font-semibold fw-bold text-dark h5">2022 - 23</span><span class="caret "></span></div><ul class="dropdown-menu dropdown-menu-right"><li data-ember-action="" data-ember-action-129="129"><a>2022 - 23</a></li> </ul></div></div></div></div><div class="">' +
                            data + '</div></div>';
                        $("#slipAfterView").html(content);
                        $('#payslipModal').modal('show');
                        console.log("Clicked View ");
                    }
                });
            });

            $('.paySlipPDF').on('click', function() {
                var url = $(this).attr('data-url');
                let t_paySlipMonth = $(this).attr('data');
                let enc_userid = "{{ $enc_user_id }}";

                window.open(url + "?selectedPaySlipMonth=" + t_paySlipMonth + "&enc_user_id=" + enc_userid,
                    '_blank');
                // $.ajax({
                //     type: "GET",
                //     url: url,
                //     data: {
                //         selectedPaySlipMonth: t_paySlipMonth,
                //         enc_user_id: "{{ $enc_user_id }}"
                //     },
                //     success: function(data) {
                //         console.log("Downloading Payslip PDF........");
                //         return data;
                //         // var content =
                //         //     '<div class="row " style=""><div class=""><div class="fill body payslip-filter-pdf mb-4"> <i class="icon icon-blue icon-xlg vertical-align-text-bottom text-secondary ri-filter-2-fill"> </i> <div class="dropdown cursor-pointer payslip-dropdown"><div id="ember127" class="ember-view"><div class="dropdown-toggle" data-toggle="dropdown"><span>Financial Year : </span><span class="font-semibold fw-bold text-dark h5">2022 - 23</span><span class="caret "></span></div><ul class="dropdown-menu dropdown-menu-right"><li data-ember-action="" data-ember-action-129="129"><a>2022 - 23</a></li> </ul></div></div></div></div><div class="">' +
                //         //     data + '</div></div>';
                //         // $("#slipAfterView").html(content);
                //         // $('#payslipModal').modal('show');
                //         // console.log("Clicked View ");
                //     }
                // });
            });

            // new code---->

            $("#Add_Mores").click(()=>{
                console.log("hi");
                $('#ul_id').prepend(
                    ` <div class="input-card">
                    <button class="delete_button_family_details text-danger">
                          <i class="f-12 me-1 fa text-danger  fa-trash"aria-hidden="true"></i>
                          Delete
                    </button>
                        <ul >
                            <li>
                            <div class="space-between">
                                <div class="input_text flex-col">
                                <span>Name <span class="text-danger">*</span></span>
                                <input type="text" name="familyDetails_Name[]">
                                </div>
                                <div class="input_text flex-col">
                                <span>Relationship<span class="text-danger">*</span></span>
                                <input type="text" name="familyDetails_Relationship[]">
                                </div>
                            </div>
                            <!--  -->
                            <!--  -->

                            <!--  -->
                            <div class="space-between M-T">
                                <div class="input_text flex-col">
                                <span>Date of birth <span class="text-danger">*</span></span>
                                <input type="date" id="datemin" name="familyDetails_dob[]"  min="2000-01-02">
                                </div>
                                <!--  -->
                                <div class="input_text flex-col">
                                <span>phone<span class="text-danger">*</span></span>
                                <input type="number" name="familyDetails_phoneNumber[]"  minlength="10" maxlength="10">
                                </div>
                            </div>
                            <!--  -->
                            </li>
                        </ul>
                        </div>`
                )
            })

            $(document).on('click','.delete_button_family_details',function(){
                            $(this).parent().remove();
              });

            // $(document).ready(function(){
            //   $("#Add_Mores").click(function(){
            //     // $("#ul_id").append(`<li class="list">${$("#val").val()}<button id="delete"><i class="fa-solid fa-xmark" ></i></button</li>`);
            //       $("#ul_id").append(
            //         ` <div class="input-card">
            //         <button class="delete_button_family_details text-danger">
            //               <i class="f-12 me-1 fa text-danger  fa-trash"aria-hidden="true"></i>
            //               Delete
            //         </button>
            //             <ul >
            //                 <li>
            //                 <div class="space-between">
            //                     <div class="input_text flex-col">
            //                     <span>Name <span class="text-danger">*</span></span>
            //                     <input type="text" name="familyDetails_Name[]">
            //                     </div>
            //                     <div class="input_text flex-col">
            //                     <span>Relationship<span class="text-danger">*</span></span>
            //                     <input type="text" name="familyDetails_Relationship[]">
            //                     </div>
            //                 </div>
            //                 <!--  -->
            //                 <!--  -->

            //                 <!--  -->
            //                 <div class="space-between M-T">
            //                     <div class="input_text flex-col">
            //                     <span>Date of birth <span class="text-danger">*</span></span>
            //                     <input type="date" id="datemin" name="familyDetails_dob[]"  min="2000-01-02">
            //                     </div>
            //                     <!--  -->
            //                     <div class="input_text flex-col">
            //                     <span>phone<span class="text-danger">*</span></span>
            //                     <input type="number" name="familyDetails_phoneNumber[]"  minlength="10" maxlength="10">
            //                     </div>
            //                 </div>
            //                 <!--  -->
            //                 </li>
            //             </ul>
            //             </div>`
            //       );

            //   });
            //  });

            //  $('.delete_button_family_details').on('click', function() {
            //     let familyDetails_id = $(this).attr('data-family-details-id');
            //     // let t_paySlipMonth = $(this).attr('data');
            //     console.log("Deleting familyDetails_id : "+familyDetails_id);


            // });








             $("#submit_button_family_details").click(function(){

                let test = $("input[name='familyDetails_Name[]'").map(function(){return $(this).val();}).get();
                console.log("hello world : "+test);



                var name = $('input[name="familyDetails_Name[]"]').map(function() {
                    return this.value;
                }).get();

                var relationship = $('input[name="familyDetails_Relationship[]"]').map(function() {
                    return this.value;
                }).get();

                var dob = $('input[name="familyDetails_dob[]"]').map(function() {
                    return this.value;
                }).get();

                var phone_number = $('input[name="familyDetails_phoneNumber[]"]').map(function() {
                    return this.value;
                }).get();





                $.ajax({
                    url: "{{ route('updateFamilyInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        'name[]': name,
                        'relationship[]': relationship,
                        'dob[]': dob,
                        'phone_number[]': phone_number,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        // Swal.fire({
                        //     text: 'Family Information Updated',
                        //     icon: 'success'
                        // })
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                                location.reload();
                        })
                    }



                });



             });




        });

        // $(document).ready(()=>{
        //     $.ajax({
        //             url: "{{ route('updateFamilyInfo', $user->id) }}",
        //             type: 'GET',
        //             data: {
        //                console.log(data);
        //             },
        //             success: function(data) {
        //                       console.log("Documents:" + data);
        //                 // })
        //                     Swal.fire({
        //                     position: 'center',
        //                     icon: 'success',
        //                     title: 'Your work has been saved',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                 }).then((result) => {
        //                     /* Read more about isConfirmed, isDenied below */
        //                         location.reload();
        //                 })
        //             }



        //         });
        // })

        // experience information bug fixing:
        // content1

        $(document).ready(function(){
              $("#exp-add-more").click(function(){
                // $("#ul_id").append(`<li class="list">${$("#val").val()}<button id="delete"><i class="fa-solid fa-xmark" ></i></button</li>`);
                  $("#experienceinfo_ul_list_id").append(
                    ` <div class="row exp-addition-content" id="content1">
                                                                    <a href="javascript:void(0);" class="delete-icon text-end"><i
                                                                    class="ri-delete-bin-line"></i>
                                                                    </a>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3 form-focus focused">
                                                                            <label class="focus-label">Company Name</label>
                                                                            <input type="text" name="experienceDetials_company_name[]"
                                                                                class="form-control floating" value="" required>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <label class="focus-label">Location</label>
                                                                        <input type="text" name="experienceDetials_location[]"
                                                                            class="form-control floating" value="" required>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <label class="focus-label">Job Position</label>
                                                                        <input type="text" name="experienceDetials_job_position[]"
                                                                            class="form-control floating" value="" required>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <label class="focus-label">Period From</label>
                                                                        <div class="cal-icon">
                                                                            <input type="date" max="9999-12-31"
                                                                                name="experienceDetials_period_from[]"
                                                                                class="form-control floating datetimepicker"
                                                                                value="" required>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3 form-focus focused">
                                                                        <div class="cal-icon">
                                                                            <label class="focus-label">Period To</label>
                                                                            <input type="date" max="9999-12-31" name="experienceDetials_period_to[]"
                                                                                class="form-control floating datetimepicker"
                                                                                value="" required>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>`
                  )
                })
        });

                // content1





              //


        $(document).on('click','.delete-icon ',function(){
                            $(this).parent().remove();
              });

        $("#delete-icon").click(function(){
                console.log("logg");
                Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!',
                            }).then((result) => {
                            if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            }
                          })
            })


            $("#btn_submit_experience_info").click(function(){
                // console.log("hello guys");

                let test = $("input[name='experienceDetials_company_name[]'").map(function(){return $(this).val();}).get();
                console.log("hello world : "+test);




                var ids = $('input[name="ids[]"]').map(function() {
                    return this.value;
                }).get();

                var company_name = $('input[name="experienceDetials_company_name[]"]').map(function() {
                    return this.value;
                }).get();

                var experience_location = $('input[name="experienceDetials_location[]"]').map(function() {
                    return this.value;
                }).get();

                var job_position = $('input[name="experienceDetials_job_position[]"]').map(function() {
                    return this.value;
                }).get();

                var period_from = $('input[name="experienceDetials_period_from[]"]').map(function() {
                    return this.value;
                }).get();

                var period_to = $('input[name="experienceDetials_period_to[]"]').map(function() {
                    return this.value;
                }).get();

                $.ajax({
                    url: "{{ route('updateExperienceInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        'ids[]': ids,
                        'company_name[]': company_name,
                        'experience_location[]': experience_location,
                        'job_position[]':job_position,
                        'period_from[]': period_from,
                        'period_to[]':  period_to,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        // Swal.fire({
                        //     text: 'Family Information Updated',
                        //     icon: 'success'
                        // })
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                                location.reload();
                        })
                    }
                });

        });




    </script>

    <style>

</style>
@endsection
