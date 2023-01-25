@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/roles_permission.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="roles-permission-wrapper mt-30">
        <div class="card">

            <div class="card-body">

                <div class="newRole-content">
                    <h5 class="mb-3 text-ash-dark">Create new job role</h5>

                    <div class="row mb-2">
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                            <p class="fw-bold text-ash-dark fs-15">Role Details</p>
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                            <label for="" class="">Role title</label>
                            <input type="text" name="" id="" class="form-control   w-50"
                                placeholder="Role title">
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                            <label for="" class="">Role Description</label>
                            <textarea type="text" name="" id="" class="form-control  w-50 resize-none " cols=""
                                rows="4"></textarea>
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                            <label for="" class="">Assign to</label>
                            <div class="roles-filter search-bar-wrapper">
                                <i class="fa fa-search"></i>
                                <input type="text" name="" id="" class="form-control w-50"
                                    placeholder="Search....">
                            </div>
                        </div>
                        {{-- selected user will appear while searching them and choosed   --}}
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">

                            <div id="" class="selected-user-container form-control w-50 " cols=""
                                rows="4">
                                {{-- <div class="chip"> --}}
                                <div class="chip align-items-center">
                                    <div class="chips-img-sm me-2">
                                        <img src="{{ URL::asset('assets/images/holiday/Diwali.png') }}"
                                            class="rounded-circle h-100 w-100" alt="">
                                    </div>

                                    <div class="text-start ">
                                        <p style="">Pravin </p>
                                        <p>Lead Frotend Developer</p>
                                    </div>
                                    <span class="closebtn btn outlin-none border-0 text-muted"
                                        onclick="this.parentElement.style.display='none'">&times;</span>

                                </div>

                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">
                            <h5 class="mb-3 text-ash-dark">Create new job role</h5>
                        </div>
                        <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-6 mb-3">
                            <div class="accordion" id="roles_permissions">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="asset_heading">
                                        <div class="d-flex align-items-center ">
                                            <button
                                                class="accordion-button fs-15  text-ash-dark fw-bold outline-none border-0"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#asset_previleges"
                                                aria-expanded="true" aria-controls="">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id=""> Assets Privileges

                                            </button>
                                        </div>
                                    </h2>
                                    <div id="asset_previleges" class="accordion-collapse collapse "
                                        aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                        <div class="accordion-body">

                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="d-flex align-items-center"> <input
                                                            class="form-check-input me-2" type="checkbox" value=""
                                                            id=""> <span>View Asset Dashboard</span>
                                                    </div>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="asset_heading">
                                        <div class="d-flex align-items-center ">
                                            <button
                                                class="accordion-button fs-15  text-ash-dark fw-bold outline-none border-0"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#attendance_privileges" aria-expanded="true"
                                                aria-controls="">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id=""> Attendance Privileges
                                            </button>
                                        </div>
                                    </h2>
                                    <div id="attendance_privileges" class="accordion-collapse collapse " aria-labelledby=""
                                        data-bs-parent="#roles_permissions">
                                        <div class="accordion-body">

                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="d-flex align-items-center"> <input
                                                            class="form-check-input me-2" type="checkbox" value=""
                                                            id=""> <span>View employees attendance details
                                                        </span>
                                                    </div>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="asset_heading">
                                        <div class="d-flex align-items-center ">
                                            <button
                                                class="accordion-button fs-15  text-ash-dark fw-bold outline-none border-0"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#employee_document" aria-expanded="true"
                                                aria-controls="">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id=""> Employee Document

                                            </button>
                                        </div>
                                    </h2>
                                    <div id="employee_document" class="accordion-collapse collapse "
                                        aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                        <div class="accordion-body">

                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="d-flex align-items-center"> <input
                                                            class="form-check-input me-2" type="checkbox" value=""
                                                            id=""> <span>View Asset Dashboard</span>
                                                    </div>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="asset_heading">
                                        <div class="d-flex align-items-center ">
                                            <button
                                                class="accordion-button fs-15  text-ash-dark fw-bold outline-none border-0"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#finance_previleges" aria-expanded="true"
                                                aria-controls="">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id=""> Employee Finance Privileges


                                            </button>
                                        </div>
                                    </h2>
                                    <div id="finance_previleges" class="accordion-collapse collapse "
                                        aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                        <div class="accordion-body">

                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="d-flex align-items-center"> <input
                                                            class="form-check-input me-2" type="checkbox" value=""
                                                            id=""> <span>View Asset Dashboard</span>
                                                    </div>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="asset_heading">
                                        <div class="d-flex align-items-center ">
                                            <button
                                                class="accordion-button fs-15  text-ash-dark fw-bold outline-none border-0"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#leave_previleges" aria-expanded="true" aria-controls="">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id=""> leave Privileges



                                            </button>
                                        </div>
                                    </h2>
                                    <div id="leave_previleges" class="accordion-collapse collapse "
                                        aria-labelledby="asset_heading" data-bs-parent="#roles_permissions">
                                        <div class="accordion-body">

                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="d-flex align-items-center"> <input
                                                            class="form-check-input me-2" type="checkbox" value=""
                                                            id=""> <span>View Asset Dashboard</span>
                                                    </div>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 col-lg-12 col-xxl-12 col-md-12 mb-3">

                            <div class="d-flex align-items-center justify-content-end">
                                <button class="btn btn-light me-2">Cancel</button>
                                <button class="btn btn-orange">Create Role</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
