
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

                                <div class=" d-flex justify-content-center">
                                    <div class="rounded-circle userActive-status profile-img"
                                        style="border:8px solid #c2c2c2c2">
                                        @include('ui-profile-avatar-lg', [
                                            'currentUser' => $user,
                                        ])
                                        <a class="edit-icon  " data-bs-toggle="modal" data-bs-target="#edit_profileImg"
                                            id="">
                                            <i class="fa fa-camera"></i></a>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="progress-wrapper border-bottom-liteAsh ">
                                        <div class="mb-1 text-center">
                                            <h6 class="text-center">{{ $user->name }}</h6>
                                        </div>
                                        <div class="mb-1 d-flex justify-content-between ">
                                            <span class="text-muted f-12">Profile Completeness</span>
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
                                            <p class="text-primary-old f-15 fw-bold">{{ $user_full_details->user_code ?? '-' }}
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
                                            <p class="text-muted f-12 fw-bold">Department</p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $user_full_details->department_id ?? '-' }}</p>
                                        </div>
                                        <div class="border-bottom-liteAsh py-2">
                                            <p class="text-muted f-12 fw-bold">Reporting To</p>
                                            <p class="text-primary-old f-15 fw-bold">
                                                {{ $user_full_details->l1_manager_name ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="profile-bottom-right-content  text-center ">
                                        {{-- <button class="btn btn-danger"><i class="fa fa-sign-out me-2"></i> Logout </button> --}}
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
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="">General Information
                                    <a href="#" class="edit-icon" data-bs-toggle="modal"
                                        data-bs-target="#edit_generalInfo"><i class="ri-pencil-fill"></i></a>
                                </h6>
                                <ul class="personal-info">
                                    <li class="border-bottom-liteAsh pb-1">
                                        <div class="title">Birthday</div>
                                        <div class="text">
                                            {{ date('d F', strtotime($user_full_details->dob ?? '-')) }}
                                        </div>
                                    </li>
                                    <li class="border-bottom-liteAsh pb-1">
                                        <div class="title">Gender </div>
                                        <div class="text">{{ $user_full_details->gender ?? '-' }}</div>
                                    </li>
                                    <li class="border-bottom-liteAsh pb-1">
                                        <div class="title">Date Of Joining (DOJ)</div>
                                        <div class="text">
                                            {{ date('d F', strtotime($user_full_details->doj ?? '-')) }}
                                        </div>
                                    </li>
                                    <li class="border-bottom-liteAsh pb-1">
                                        <div class="title">Marital Status </div>
                                        <div class="text text-capitalize">
                                            {{ $user_full_details->marital_status ?? '-' }}</div>
                                    </li>
                                    <li class="border-bottom-liteAsh pb-1">
                                        <div class="title"> Blood Group</div>
                                        <div class="text">
                                            {{ getBloodGroupName($user_full_details->blood_group_id) ?? '-' }}</div>
                                    </li>
                                    <li class=" pb-1">
                                        <div class="title">Physically Handicapped</div>
                                        <div class="text">

                                            {{ $user_full_details->physically_challenged ?? '-' }}</div>
                                    </li>
                                </ul>
                                </form>
                            </div>

                        </div>

                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="">Contact Information
                                    <span class="personal-edit"><a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i
                                                class="ri-pencil-fill"></i></a>
                                    </span>
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
                                            {{ !empty($user_full_details->officical_mail) ? $user_full_details->officical_mail : '-' }}
                                        </div>
                                    </li>
                                    <li class=" pb-1">
                                        <div class="title">Mobile Number</div>
                                        <div class="text">
                                            {{ !empty($user_full_details->mobile_number) ? $user_full_details->mobile_number : '-' }}
                                        </div>
                                    </li>
                                </ul>

                                </form>
                            </div>

                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
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
                                                    {{ $user_full_details->permanent_address_line_1 ?? '' }}
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
                                                        <td>{{ $info['company_name'] }}</td>
                                                        <td>{{ $info['job_position'] }}</td>
                                                        <td>{{ $info['period_from'] }}</td>
                                                        <td>{{ $info['period_to'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
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


                    <!-- paycheck -->

                    <div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby="">
                        <div class="card left-line mb-2 ">
                            <div class="card-body pb-0 pt-1">
                                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                                    <li class="nav-item  " role="presentation">
                                        <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#finance_summary" role="tab" aria-controls="pills-home"
                                            aria-selected="true">Summary
                                        </a>
                                    </li>
                                    <li class="nav-item mx-4  " role="presentation">
                                        <a class="nav-link " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#finance_pay" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            Paycheck
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item  " role="presentation">
                                        <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#finance_manageTax" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            Manage Tax
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content " id="pills-tabContent">
                            <div class="tab-pane fade active show" id="finance_summary" role="tabpanel"
                                aria-labelledby="">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="">
                                                    Payroll Summary

                                                </h6>
                                                {{-- <button class="btn btn-border-orange">View Payslip </button> --}}
                                            </div>


                                            <ul class="personal-info">
                                                <li class="border-bottom-liteAsh pb-1">
                                                    <div class="title">Last Processed</div>
                                                    <div class="text">
                                                        -
                                                    </div>
                                                </li>
                                                <li class="border-bottom-liteAsh pb-1">
                                                    <div class="title">Total Working Days</div>
                                                    <div class="text">
                                                        -
                                                    </div>
                                                </li>
                                                <li class=" pb-1">
                                                    <div class="title">Loss Of Pay(LOP)</div>
                                                    <div class="text">
                                                        -
                                                    </div>
                                                </li>
                                            </ul>

                                        </form>

                                    </div>
                                </div>

                                <div class="card mb-2">
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <h6 class="">Bank Information
                                                <span class="personal-edit"><a href="#" class="edit-icon"
                                                        data-bs-toggle="modal" data-bs-target="#Bank_info"><i
                                                            class="ri-pencil-fill"></i></a></span>
                                            </h6>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Bank Name</div>
                                                    <?php $bank_name = App\Models\Bank::where('id', $user_full_details->bank_id)->value('bank_name'); ?>
                                                    <div class="text">{{ $bank_name ?? '-' }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Bank Account No.</div>
                                                    <div class="text">
                                                        {{ $user_full_details->bank_account_number ?? '-' }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">IFSC Code</div>
                                                    <div class="text">{{ $user_full_details->bank_ifsc_code ?? '-' }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">PAN No</div>
                                                    <div class="text">{{ $user_full_details->pan_number ?? '-' }}</div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>

                                <div class="card mb-2">
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <h6 class="">Statutory Information
                                                <span class="personal-edit"><a href="#" class="edit-icon"
                                                        data-bs-toggle="modal" data-bs-target="#statutory_info"><i
                                                            class="ri-pencil-fill"></i></a></span>
                                            </h6>


                                            {{-- @if (!empty($statutory_info))
                                                @foreach ($statutory_info as $detail) --}}
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">PF Applicable</div>
                                                    <div class="text">{{ $detail->pf_applicable ?? '-' }}

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">EPF Number</div>
                                                    <div class="text">{{ $detail->epf_number ?? '-' }}

                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">UAN Number</div>
                                                    <div class="text">{{ $detail->uan_number ?? '-' }}

                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">ESIC Applicable</div>
                                                    <div class="text">{{ $detail->esic_applicable ?? '-' }}

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">ESIC Number</div>
                                                    <div class="text">{{ $detail->esic_number ?? '-' }}

                                                    </div>
                                                </li>
                                            </ul>
                                            {{-- @endforeach
                                            @endif --}}

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="finance_pay" role="tabpanel" aria-labelledby="">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <ul class="nav nav-pills mb-4   nav-tabs-dashed" id="pills-tab" role="tablist">
                                            {{-- <li class="nav-item  " role="presentation">
                                                <a class="nav-link active " id="" data-bs-toggle="pill"
                                                    href="" data-bs-target="#pay_summary" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">Payroll Summary
                                                </a>
                                            </li> --}}
                                            <li class="nav-item   " role="presentation">
                                                <a class="nav-link active" id="" data-bs-toggle="pill"
                                                    href="" data-bs-target="#pay_slips" role="tab"
                                                    aria-controls="" aria-selected="true">
                                                    Pay Slips
                                                </a>
                                            </li>
                                            {{-- <li class="nav-item  " role="presentation">
                                                <a class="nav-link  " id="" data-bs-toggle="pill"
                                                    href="" data-bs-target="#pay_incomeTax" role="tab"
                                                    aria-controls="" aria-selected="true">
                                                    Income Tax
                                                </a>
                                            </li> --}}
                                            {{-- <li class="nav-item  " role="presentation">
                                                <a class="nav-link  " id="" data-bs-toggle="pill"
                                                    href="" data-bs-target="#pay_claims" role="tab"
                                                    aria-controls="" aria-selected="true">
                                                    Component Claims
                                                </a>
                                            </li> --}}
                                        </ul>
                                        {{-- </div>
                                        </div> --}}

                                        <div class="tab-content " id="pills-tabContent">
                                            {{-- <div class="tab-pane fade active show" id="pay_summary" role="tabpanel"
                                                aria-labelledby="">
                                                <div class="paysummary_container mb-3">

                                                    <div class="row">
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 border-rtb   left-line">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">Current
                                                                        Compension
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">INR 1,50,000
                                                                        / Annum</h6>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 border-rtb   left-line">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">
                                                                        Legal Entry
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">-</h6>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 border-rtb   left-line">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">
                                                                        Remuneration
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">Monthly</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 border-rtb   left-line">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">
                                                                        Pay Cycle
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">Monthly</h6>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col-6 text-start mb-3">
                                                                <h6>Salary Timeline</h6>

                                                            </div>
                                                            <div class="col-6 text-end mb-2">
                                                                <button class="btn btn-orange">Revise Salary</button>
                                                            </div>
                                                            <div class="col-2">
                                                                <ul class="timeLine_period">
                                                                    <li class="period active text-center">
                                                                        <p class="f-12  text-center period-month fw-bold">
                                                                            Mar 01,2022</p>
                                                                        <span
                                                                            class="period-status badge bg-info">Current</span>
                                                                    </li>
                                                                    <li class="period  text-center">
                                                                        <p class="f-12  text-center period-month fw-bold">
                                                                            Mar 01,2022</p>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="accordion"
                                                                    id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item mb-4">
                                                                        <h2 class="accordion-header"
                                                                            id="panelsStayOpen-headingOne">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#timeLine-collapseOne"
                                                                                aria-expanded="true" aria-controls="">
                                                                                <div class="d-flex me-3 justify-content-center align-items-center rounded-circle"
                                                                                    style="height: 40px;width:40px;background-color:#91ddbe;">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="22.058" height="12.253"
                                                                                        viewBox="0 0 22.058 12.253">
                                                                                        <path id="arrow-trend-up-solid"
                                                                                            d="M14.705,98.451a1.225,1.225,0,0,1,0-2.451h6.127a1.224,1.224,0,0,1,1.225,1.225v6.127a1.225,1.225,0,0,1-2.451,0v-3.167l-6.487,6.483a1.223,1.223,0,0,1-1.731,0l-4.071-4.032-5.226,5.258a1.225,1.225,0,0,1-1.733-1.731l6.128-6.127a1.223,1.223,0,0,1,1.731,0l4.036,4.032,5.618-5.652Z"
                                                                                            transform="translate(0 -96)"
                                                                                            fill="#686363" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between">
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Regular Salary</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            1,15,91,555
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="f-15 text-dark_green  mx-4  d-flex align-items-center">
                                                                                        +</div>
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Others</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            54,00,000
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="f-15 mx-3 text-dark_green d-flex align-items-center ">
                                                                                        +</div>
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Bonus</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            26,91,555
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="f-15 mx-3 text-dark_green  d-flex align-items-center ">
                                                                                        =</div>
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Total </p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            35,00,00
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </button>
                                                                        </h2>
                                                                        <div id="timeLine-collapseOne"
                                                                            class="accordion-collapse collapse "
                                                                            aria-labelledby="panelsStayOpen-headingOne">
                                                                            <div class="accordion-body">
                                                                                <div class="row">
                                                                                    <div class="col-4">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Regular Salary</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold text-center">
                                                                                            INR
                                                                                            35,00,00 / Annum
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Other</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold text-center">
                                                                                            INR
                                                                                            35,00,00 / Annum
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-4 d-flex    justify-content-end align-items-center">
                                                                                        <button
                                                                                            class="btn btn-border-orange">Salary-breakup</button>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="salaryTimeline_container mt-4">

                                                                                    <div class="row">

                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        Salary Per Month
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        ESIC Employer
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        PF-Employeer
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        Effective Form
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item mb-4">
                                                                        <h2 class="accordion-header"
                                                                            id="panelsStayOpen-headingOne">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#timeLine-collapseTwo"
                                                                                aria-expanded="true" aria-controls="">
                                                                                <div class="d-flex me-3 justify-content-center align-items-center rounded-circle"
                                                                                    style="height: 40px;width:40px;background-color:#91ddbe;">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="22.058" height="12.253"
                                                                                        viewBox="0 0 22.058 12.253">
                                                                                        <path id="arrow-trend-up-solid"
                                                                                            d="M14.705,98.451a1.225,1.225,0,0,1,0-2.451h6.127a1.224,1.224,0,0,1,1.225,1.225v6.127a1.225,1.225,0,0,1-2.451,0v-3.167l-6.487,6.483a1.223,1.223,0,0,1-1.731,0l-4.071-4.032-5.226,5.258a1.225,1.225,0,0,1-1.733-1.731l6.128-6.127a1.223,1.223,0,0,1,1.731,0l4.036,4.032,5.618-5.652Z"
                                                                                            transform="translate(0 -96)"
                                                                                            fill="#686363" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between">
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Regular Salary</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            1,15,91,555
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="f-15 text-dark_green  mx-4  d-flex align-items-center">
                                                                                        +</div>
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Others</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            54,00,000
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="f-15 mx-3 text-dark_green d-flex align-items-center ">
                                                                                        +</div>
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Bonus</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            26,91,555
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="f-15 mx-3 text-dark_green  d-flex align-items-center ">
                                                                                        =</div>
                                                                                    <div class="">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Total </p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold">
                                                                                            INR
                                                                                            35,00,00
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </button>
                                                                        </h2>
                                                                        <div id="timeLine-collapseTwo"
                                                                            class="accordion-collapse collapse "
                                                                            aria-labelledby="panelsStayOpen-headingOne">
                                                                            <div class="accordion-body">
                                                                                <div class="row">
                                                                                    <div class="col-4">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Regular Salary</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold text-center">
                                                                                            INR
                                                                                            35,00,00 / Annum
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <p
                                                                                            class="text-dark_green  mb-2 f-12 text-center">
                                                                                            Other</p>
                                                                                        <p
                                                                                            class="mb-0 text-dark_green  f-14 fw-bold text-center">
                                                                                            INR
                                                                                            35,00,00 / Annum
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-4 d-flex    justify-content-end align-items-center">
                                                                                        <button
                                                                                            class="btn btn-border-orange">Salary-breakup</button>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="salaryTimeline_container mt-4">

                                                                                    <div class="row">

                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        Salary Per Month
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        ESIC Employer
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        PF-Employeer
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                                                            <div class="card mb-0">
                                                                                                <div
                                                                                                    class="card-body text-center">
                                                                                                    <p
                                                                                                        class="text-ash-medium  f-11 ">
                                                                                                        Effective Form
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="mb-0 f-14 fw-bold text-primary-old">
                                                                                                        -</p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="tab-pane fade active show" id="pay_slips" role="tabpanel"
                                                aria-labelledby="">

                                                {{-- <h6 class=""> Pay Slips</h6> --}}
                                                <div id="" class="ember-view">
                                                    <div class="table-responsive ">
                                                        <table class="table table-hover">
                                                            <thead class="fw-bold text-muted h5">
                                                                <tr>
                                                                    <th width="">Month</th>
                                                                    <th width="">Gross Pay</th>
                                                                    <th width="">Reimbursements</th>
                                                                    <th width="">Deductions</th>
                                                                    <th width="">Take Home</th>
                                                                    <th width="" class="text-capitalize">
                                                                        payslip</th>
                                                                    <th width="">Tax Worksheet</th>
                                                                    <th width="">Action</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                @foreach ($data as $d)
                                                                    <tr data-ember-action="" data-ember-action-131="131">
                                                                        <td>
                                                                            <a href="#/salary-details/payslips/335214000001040001/details"
                                                                                id="ember132"
                                                                                class="ember-view text-secondary">
                                                                                {{ Carbon::parse($d->PAYROLL_MONTH)->format('M-y') }}
                                                                            </a>

                                                                            <span class="status-label">
                                                                                <!---->
                                                                            </span>
                                                                        </td>
                                                                        <td>₹{{ $d->TOTAL_EARNED_GROSS }}
                                                                        </td>
                                                                        <td>₹0.00</td>
                                                                        <td>₹{{ $d->TOTAL_DEDUCTIONS }}</td>
                                                                        <td>₹{{ $d->NET_TAKE_HOME }}</td>
                                                                        <td>
                                                                            <div data="{{ $d->PAYROLL_MONTH }}"
                                                                                data-url="{{ route('vmt_employee_payslip_htmlview') }}"
                                                                                style="cursor: pointer"
                                                                                class="ember-view  paySlipView text-info">
                                                                                View
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a href="" id="ember134"
                                                                                class="ember-view  text-info">
                                                                                View
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            @php

                                                                                $selectedPaySlipMonth = $d->PAYROLL_MONTH;
                                                                            @endphp
                                                                            <div data="{{ $d->PAYROLL_MONTH }}"
                                                                                data-url="{{ route('vmt_employee_payslip_pdf') }}"
                                                                                style="cursor: pointer"
                                                                                class="ember-view  paySlipPDF text-info">
                                                                                Download PDF
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- <div class="tab-pane fade" id="pay_incomeTax" role="tabpanel"
                                                aria-labelledby="">
                                                <div class="row mb-3">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-6 col-xl-6">
                                                        <h6>Tax Saving Investment </h6>
                                                    </div>

                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-6 col-xl-6">
                                                        <div class="d-flex justify-content-end">
                                                            <select name="" id=""
                                                                class="border-orange w-50 form-select disabled_focus">
                                                                <option value="" selected="" hidden=""
                                                                    disabled="">Apr 2022 - Mar 2023 </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-card mb-3">

                                                    <div class="row ">
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 h_80 border-rtb  left-line ">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium mb-2 f-13 ">Maximum Limit
                                                                    </p>

                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">INR 1,50,000

                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0  border-rtb  left-line ">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">Amount
                                                                        Declared
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">INR 1,50,000

                                                                    </p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 border-rtb  left-line">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">Auto Approved
                                                                        Amount</p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">INR 1,50,000

                                                                    </p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3">
                                                            <div class="card box_shadow_0 border-rtb   left-line ">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">Amount
                                                                        Accepted
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">INR 1,50,000

                                                                    </p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 ">
                                                            <div class="card box_shadow_0 border-rtb   left-line">
                                                                <div class="card-body text-center">
                                                                    <p class="text-ash-medium  f-13 ">Amount
                                                                        Rejected
                                                                    </p>
                                                                    <p class="mb-0 f-14 fw-bold text-primary-old">INR 1,50,000

                                                                    </p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="reimbursment_container">
                                                    <h6 class="mb-3">Reimbursement</h6>
                                                    <div class="table-responsive">
                                                        <table class="table investment_table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Sections</th>
                                                                    <th scope="col">Particulars</th>
                                                                    <th scope="col">References</th>
                                                                    <th scope="col">Max Limit</th>
                                                                    <th scope="col">Declaration Amount</th>
                                                                    <th scope="col">Proofs</th>

                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                    <td> 17(2)</td>
                                                                    <td class="noWhite-space">

                                                                        <p>Vehicle Reimbursement</p>
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="form-check me-2">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="cc"
                                                                                    id="below_cc">
                                                                                <label class="form-check-label"
                                                                                    for="below_cc">
                                                                                    Below 1600 CC
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="cc"
                                                                                    id="above_cc">
                                                                                <label class="form-check-label"
                                                                                    for="above_cc">

                                                                                    Above 2400 CC
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                    <td>

                                                                        <button type="button"
                                                                            class="btn btn-transprarent border-0 outline-none "
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="If Cubic Capacity is below 1.6 ltrs (1600CC) expenses can be considered upto 1800pm & If Cubic Capacity is above 1.6 ltrs then  expenses can be considered upto 2400pm">
                                                                            <i class="fa fa-exclamation-circle  text-warning"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                    </td>
                                                                    <td>28800</td>

                                                                    <td>
                                                                        <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                            cols="5" rows="1"></textarea>
                                                                    </td>

                                                                    <td align="">

                                                                        <div class="upload_file ">

                                                                            <i class="fa fa-upload"
                                                                                aria-hidden="true"><input type="file"
                                                                                    name="" id=""
                                                                                    multiple></i>


                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <p>Not Submitted</p>
                                                                    </td>
                                                                    <td>


                                                                        <div class="dropdown investment_dropDown">
                                                                            <button
                                                                                class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                                type="button" id="dropdownMenuButton"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <i class="fa fa-ellipsis-v"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="fa fa-pencil-square-o text-info me-2"
                                                                                        aria-hidden="true"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="fa fa-times-circle-o text-danger me-2"
                                                                                        aria-hidden="true"></i>
                                                                                    Clear</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#"></a>
                                                                            </div>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td> 17(2)</td>
                                                                    <td>Driver Reimbursement</td>
                                                                    <td>

                                                                        <button type="button"
                                                                            class="btn btn-transprarent border-0 outline-none "
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Maximum exemption will be restricted to Rs.900/- per month or amount paid under CTC  whichever is less.">
                                                                            <i class="fa fa-exclamation-circle  text-warning"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                    </td>
                                                                    <td>10800</td>

                                                                    <td>
                                                                        <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                            cols="5" rows="1"></textarea>
                                                                    </td>

                                                                    <td align="">

                                                                        <div class="upload_file ">

                                                                            <i class="fa fa-upload"
                                                                                aria-hidden="true"><input type="file"
                                                                                    name="" id=""
                                                                                    multiple></i>


                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <p>Not Submitted</p>
                                                                    </td>
                                                                    <td>


                                                                        <div class="dropdown investment_dropDown">
                                                                            <button
                                                                                class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                                type="button" id="dropdownMenuButton"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <i class="fa fa-ellipsis-v"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="fa fa-pencil-square-o text-info me-2"
                                                                                        aria-hidden="true"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="fa fa-times-circle-o text-danger me-2"
                                                                                        aria-hidden="true"></i>
                                                                                    Clear</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#"></a>
                                                                            </div>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td> 17(2)</td>
                                                                    <td>Vehicle Reimbursement</td>
                                                                    <td>

                                                                        <button type="button"
                                                                            class="btn btn-transprarent border-0 outline-none "
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Exemption will be restricted to the extend of bills provided or as per CTC, whichever is less. Maximum amount of exemption is ">
                                                                            <i class="fa fa-exclamation-circle  text-warning"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                    </td>
                                                                    <td>36000</td>

                                                                    <td>
                                                                        <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                            cols="5" rows="1"></textarea>
                                                                    </td>

                                                                    <td align="">

                                                                        <div class="upload_file ">

                                                                            <i class="fa fa-upload"
                                                                                aria-hidden="true"><input type="file"
                                                                                    name="" id=""
                                                                                    multiple></i>


                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <p>Not Submitted</p>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown investment_dropDown">
                                                                            <button
                                                                                class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                                type="button" id="dropdownMenuButton"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <i class="fa fa-ellipsis-v"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="fa fa-pencil-square-o text-info me-2"
                                                                                        aria-hidden="true"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="#"><i
                                                                                        class="fa fa-times-circle-o text-danger me-2"
                                                                                        aria-hidden="true"></i>
                                                                                    Clear</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#"></a>
                                                                            </div>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="tab-pane fade" id="pay_claims" role="tabpanel"
                                                aria-labelledby="">
                                                <div class="card mb-2">
                                                    <div class="card-body">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="finance_manageTax" role="tabpanel" aria-labelledby="">
                                <div class="card mb-2">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                    <div class="tab-pane fade" id="document_det" role="tabpanel" aria-labelledby="">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div id="vjs_employeeDocsManager"></div>
                                <!--
                                <form action="{{ route('updatePersonalInformation', $user->id) }}" Method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="">Documents Of Employee
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-primary">
                                                <th>
                                                    Document Name
                                                </th>
                                                <th>
                                                    Document View
                                                </th>
                                                {{-- <th>
                                                    Action
                                                </th> --}}
                                            </thead>
                                            <tbody>
                                                {{-- <?php dd($documents_filenames); ?> --}}
                                                {{-- <?php dd(count($documents_filenames->toArray())); ?> --}}
                                                @foreach ( $documents_filenames[0] as $key => $value )
                                                    @if (!empty($value))
                                                        <tr>

                                                            <td>{{ $key }}</td>
                                                            <td>
                                                                @if (Str::contains($value, '.pdf'))
                                                                    <a target="_blank"
                                                                        href="{{ URL::asset('employee_documents/' . $value) }}">View
                                                                        Documents</a>
                                                                @else
                                                                    <a class="view-file text-info"
                                                                        data-src="{{ URL::asset('employee_documents/'  . $value) }}"
                                                                        style="cursor:pointer">
                                                                        {{ 'View Documents' }}
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                -->
                            </div>
                        </div>

                    </div>

                    {{-- <img src='{{ URL::asset('svg_icon_pending') }}' alt='view' title='view' class='icon'>  --}}

                    <div id="edit_profileImg" class="modal  custom-modal fade" style="display: none;"
                        aria-hidden="true">
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

                    <div id="edit_generalInfo" class="modal custom-modal fade" style="display: none;"
                        aria-hidden="true">
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
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
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
                                        <div class="col-6">
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

                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label>Date Of Joining(DOJ)<span class="text-danger">*</span></label>
                                                <div class="cal-icon">
                                                    @if (!empty($user_full_details->doj))
                                                        <input class="form-control onboard" type="date"
                                                            max="9999-12-31" name="doj"
                                                            value="{{ date('Y-m-d', strtotime($user_full_details->doj)) }}">
                                                    @else
                                                        <input class="form-control onboard" type="date"
                                                            max="9999-12-31" name="doj" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label>Blood Group <span class="text-danger"></span></label>
                                                <select class="form-select form-control text-capitalize"
                                                    name="blood_group" required>
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


                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label>Marital status <span class="text-danger">*</span></label>
                                                <select class="form-select form-control text-capitalize"
                                                    name="marital_status" required>
                                                    <option class="" selected hidden disabled>Select Marital</option>
                                                    @foreach ($maritalStatus as $item_maritalStatus)
                                                        <option @if (!empty($user_full_details->marital_status) && $user_full_details->marital_status == $item_maritalStatus) selected @endif
                                                            value="{{ $item_maritalStatus }}">
                                                            {{ ucfirst($item_maritalStatus) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label>Physically Handicapped</label>
                                                <input type="text" name="" id=""
                                                    class="form-control "
                                                    value=" {{ $user_full_details->physically_challenged ?? '-' }}">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button id="btn_submit_generalInfo"
                                                class="btn btn-border-orange submit-btn">Save</button>
                                        </div>
                                    </div>
                                </div>
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
                                                <button id=btn_submit_contact_info
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

                    <!-- family informatios -->
                    <div id="edit_familyInfo" class="modal custom-modal fade " role="dialog" aria-modal="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content profile-box">
                                <div class="modal-header  border-0">
                                    <h6 class="modal-title">Family
                                        Information</h6>
                                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">

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
                                                                    type="button"><i
                                                                        class="f-12 me-1 fa text-danger  fa-trash"
                                                                        aria-hidden="true"></i>Delete
                                                                    </i></button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label>Name <span class="text-danger">*</span></label>
                                                                    <input name="name[]"
                                                                        class="form-control onboard-form" type="text"
                                                                        pattern-data="name" required
                                                                        value="{{ $singledetail->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label>Relationship <span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="relationship[]"
                                                                        class="form-control onboard-form" type="text"
                                                                        pattern-data="alpha" required
                                                                        value="{{ $singledetail->relationship }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label>Date of birth <span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="dob[]"
                                                                        class="form-control onboard-form" type="date"
                                                                        max="9999-12-31" required
                                                                        value="{{ $singledetail->dob }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label>Phone <span class="text-danger">*</span></label>
                                                                    <input name="phone_number[]"
                                                                        class="form-control onboard-form" type="number"
                                                                        maxlength="10" minlength="10" required
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
                                            {{-- <div id="add_more" class="text-primary-old  cursor-pointer">
                                        <i class=" ri-add-circle-fill"></i> Add More
                                    </div> --}}
                                            <button id="add_more"
                                                class="btn text-primary-old p-0 bg-transparent outline-none border-0 f-12 plus-sign"
                                                type="button"><i class="f-12 me-1 fa  fa-plus-circle"
                                                    aria-hidden="true"></i>Add
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
                                                                type="button"><i
                                                                    class="f-12 me-1 fa text-danger  fa-trash"
                                                                    aria-hidden="true"></i>Delete
                                                                </i></button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label>Name<span class="text-danger">*</span></label>
                                                                <input name="name[]" class="form-control onboard-form"
                                                                    type="text" pattern-data="name" required
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label>Relationship <span
                                                                        class="text-danger">*</span></label>
                                                                <input name="relationship[]"
                                                                    class="form-control onboard-form" type="text"
                                                                    pattern-data="alpha" required value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label>Date of birth <span
                                                                        class="text-danger">*</span></label>
                                                                <input name="dob[]" class="form-control onboard-form"
                                                                    type="date" max="9999-12-31" required
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Phone <span class="text-danger">*</span></label>
                                                                <input name="phone_number[]"
                                                                    class="form-control onboard-form" type="number"
                                                                    maxlength="10" minlength="10" required
                                                                    value="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="add-more text-end mb-2" style="cursor:pointer;">
                                            {{-- <button id="add_more" class="text-primary-old  cursor-pointer">
                                    <i class=" ri-add-circle-fill"></i> Add More
                                </button> --}}
                                            <button id="add_more"
                                                class="btn text-primary-old p-0 bg-transparent outline-none border-0 f-12 plus-sign"
                                                type="button"><i class="f-12 me-1 fa  fa-plus-circle"
                                                    aria-hidden="true"></i>Add
                                                More</i></button>
                                        </div>
                                    @endif

                                    <div class="col-12">
                                        <div class="text-right">
                                            <button id="btn_submit_family_info"
                                                class="btn btn-orange submit-btn">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                                    <input type="date" max="9999-12-31"
                                                                        name="period_to[]"
                                                                        class="form-control floating datetimepicker"
                                                                        value="" required>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-more text-end">
                                                    <div class="text-primary-old f-13" id="exp-add-more">
                                                        <i class=" ri-add-circle-fill"></i> Add More
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button id=btn_submit_experience_info
                                                class="btn btn-orange submit-btn">Submit</button>
                                        </div>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- bank informatios -->
                    <div id="Bank_info" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content profile-box top-line">
                                <div class="modal-header d-flex align-items-center border-0">
                                    <h6 class="">Bank Information
                                    </h6>
                                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form action="{{ route('updateBankInfo', $user->id) }}" Method="POST"> --}}
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Bank Name</label>
                                                @if (!empty($bank))
                                                    <select name="bank_name" id="bank_name"
                                                        class="form-select form-control onboard-form" required>
                                                        <option value="">Select</option>
                                                        @foreach ($bank as $b)
                                                            @if (!empty($b->bank_name) && !empty($b->min_length) && !empty($b->max_length))
                                                                <option value="{{ $b->bank_name ?? '' }}"
                                                                    min-data="{{ $b->min_length }}"
                                                                    max-data="{{ $b->max_length }}"
                                                                    @if (!empty($user_full_details->bank_name) && $user_full_details->bank_name == $b->bank_name) selected @endif>
                                                                    {{ $b->bank_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Bank Account No</label>
                                                <div class="cal-icon">
                                                    <input name="account_no" type="number" minlength="9"
                                                        maxlength="18" class="form-control onboard-form"
                                                        value="{{ $user_full_details->bank_account_number ?? '' }}"
                                                        pattern-data="account" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>IFSC Code</label>
                                                <input name="bank_ifsc" class="form-control onboard-form"
                                                    value="{{ $user_full_details->bank_ifsc_code ?? '' }}" type="text"
                                                    pattern-data="ifsc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>PAN No</label>
                                                <input name="pan_no" class="form-control onboard-form"
                                                    value="{{ $user_full_details->pan_number ?? '' }}" type="text"
                                                    pattern-data="pan" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button
                                                id="btn_submit_bank_info"class="btn btn-orange submit-btn">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Statutory Details  -->
                    <div id="statutory_info" class="modal custom-modal fade" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content profile-box  ">
                                <div class="modal-header   border-0">
                                    <h6>Statutory Details</h6>
                                    <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @csrf

                                <div class="modal-body">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="floating">
                                                <label for="" class="float-label">PF
                                                    Applicable<span class="text-danger">*</span></label>
                                                <select placeholder="PF Applicable" name="pf_applicable"
                                                    id="pf_applicable"
                                                    class="onboard-form form-control textbox  select2_form_without_search"
                                                    required>
                                                    <option value="" hidden selected disabled>PF
                                                        Applicable</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-md-6 ">
                                            <div class="form-group mb-3">
                                                <label>EPF Number</label>
                                                <input type="text" placeholder="EPF Number" name="epf_number"
                                                    id="epf_number" class="onboard-form form-control "
                                                    value=" {{ $detail->epf_number ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label>UAN Number</label>
                                                <input name="uan_number" id="uan_number" minlength="12" maxlength="12"
                                                    class="form-control onboard-form"
                                                    value="{{ $detail->uan_number ?? '' }}" type="text"
                                                    pattern-data="ifsc" required>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="float-label">ESIC
                                                    Applicable<span class="text-danger">*</span></label>
                                                <?php
                                                $value = '';

                                                if (!empty($statutory) && $statutory->esic_applicable) {
                                                    $value = $statutory->esic_applicable;
                                                }

                                                ?>
                                                <select placeholder="ESIC Applicable" name="esic_applicable"
                                                    id="esic_applicable"
                                                    class="onboard-form form-control textbox  select2_form_without_search"
                                                    required>
                                                    <option value="" hidden selected disabled>ESIC
                                                        Applicable</option>
                                                    <option value="yes"
                                                        @if ($value == 'yes') selected @endif>
                                                        Yes
                                                    </option>
                                                    <option value="no"
                                                        @if ($value == 'no') selected @endif>
                                                        No
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="floating">
                                                <label for="" class="float-label">ESIC Number</label>

                                                <input type="text" placeholder="ESIC Number" name="esic_number"
                                                    id="esic_number" minlength="10" maxlength="10"
                                                    class="onboard-form form-control textbox "
                                                    value="{{ $detail->esic_number ?? '' }}" />
                                                <span class="error" id="error_esic_number"></span>
                                            </div>
                                        </div>




                                    </div>

                                    <div class="col-12">
                                        <div class="text-right">
                                            <button
                                                id="btn_submit_statutory_info"class="btn btn-border-orange submit-btn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Statutory Details  -->
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
                                            <img src=" {{ URL::asset(session()->get('client_logo_url')) }}"
                                                alt="" class="" height="50" width="130">


                                            {{-- <img src="{{ URL::asset($generalInfo->logo_img) }}" alt=""
                                        class=""> --}}
                                            {{-- <div class="profile-img d-flex justify-content-center flex-column text-center"> --}}
                                            <div class="profile-img d-flex justify-content-center">
                                                @include('ui-profile-avatar-lg', [
                                                    'currentUser' => $user,
                                                ])
                                            </div>
                                            <p class="fw-bold f-14 text-primary-old text-center mt-4 ">{{ $user->name }}
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

            @if (!empty($reportingManager))
                generateProfileShortName_VendorScript("manager_shortname",
                    "{{ $reportingManager->name }}");
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

        $(document).ready(function() {
            $("#btn_submit_generalInfo").on('click', function(e) {
                e.preventDefault();
                var dob = $("input[name='dob']").val();
                var gender = $("select[name='gender']").val();
                var doj = $("input[name='doj']").val();
                var marital_status = $("select[name='marital_status']").val();
                var blood_group = $("select[name='blood_group']").val();

                $.ajax({
                    url: "{{ route('updateGeneralInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        dob: dob,
                        gender: gender,
                        doj: doj,
                        marital_status: marital_status,
                        blood_group: blood_group,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        Swal.fire({
                            title: "Good job!",
                            text: 'You clicked the button!',
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
            $("#btn_submit_contact_info").on('click', function(e) {
                e.preventDefault();

                var present_email = $("input[name='present_email']").val();
                var officical_mail = $("input[name='officical_mail']").val();
                var mobile_number = $("input[name='mobile_number']").val();

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
                        location.reload();
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
                        location.reload();
                    }

                });

            });
        });

        $(document).ready(function() {
            $("#btn_submit_family_info").on('click', function(e) {
                e.preventDefault();

                var name = $('input[name="name[]"]').map(function() {
                    return this.value;
                }).get();

                var relationship = $('input[name="relationship[]"]').map(function() {
                    return this.value;
                }).get();

                var dob = $('input[name="dob[]"]').map(function() {
                    return this.value;
                }).get();

                var phone_number = $('input[name="phone_number[]"]').map(function() {
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
                        location.reload();
                    }

                });

            });
        });

        $(document).ready(function() {
            $("#btn_submit_experience_info").on('click', function(e) {
                e.preventDefault();
                var ids = $('input[name="ids[]"]').map(function() {
                    return this.value;
                }).get();

                var company_name = $('input[name="company_name[]"]').map(function() {
                    return this.value;
                }).get();

                var location = $('input[name="location[]"]').map(function() {
                    return this.value;
                }).get();

                var job_position = $('input[name="job_position[]"]').map(function() {
                    return this.value;
                }).get();

                var period_from = $('input[name="period_from[]"]').map(function() {
                    return this.value;
                }).get();

                var period_to = $('input[name="period_to[]"]').map(function() {
                    return this.value;
                }).get();


                $.ajax({
                    url: "{{ route('updateExperienceInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        'ids[]': ids,
                        'company_name[]': company_name,
                        'location[]': location,
                        'job_position[]': job_position,
                        'period_from[]': period_from,
                        'period_to[]': period_to,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        window.location.reload();
                    }

                });

            });
        });

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
                        location.reload();
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
                let enc_userid =  "{{ $enc_user_id }}";

                window.open(url+"?selectedPaySlipMonth="+t_paySlipMonth+"&enc_user_id="+enc_userid,'_blank');
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
        });
    </script>
@endsection
