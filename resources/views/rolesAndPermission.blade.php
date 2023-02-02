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
                <h6 class="mb-3">Employee roles and permissions</h6>
                <div class="roles-content">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-6 ">
                            <div class="roles-filter search-bar-wrapper">
                                <i class="fa fa-search"></i>
                                <input type="text" name="" id="" class="form-control w-75"
                                    placeholder="Search....">
                            </div>
                        </div>
                        <div class="col-6 col-sm-12 col-xl-6 col-lg-6 col-xxl-6 col-md-6 text-start">
                            <a role="button"  href="{{ route('Add-New') }}"  data-bs-target="" data-bs-toggle="" class="btn btn-orange "><i
                                    class="fa fa-plus-circle me-1"></i> Add New Role
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive roles-table-container">
                                <table class="table roles-table table-bordered">
                                    <thead>
                                        <th>Role</th>
                                        <th>Who has access</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td align="center">

                                                <div
                                                    class="role-descriptions d-flex align-items-center justify-content-center">
                                                    <div class="">
                                                        <h6 class="mb-1">Asset manager</h6>
                                                        <p class="text-muted">
                                                            The assest manger has all the
                                                        </p>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="chip">
                                                    <div class="d-flex align-items-center">
                                                        <div class="chips-img-xs me-2">
                                                            <img src="{{ URL::asset('assets/images/holiday/Diwali.png') }}"
                                                                class="rounded-circle h-100 w-100" alt="">
                                                        </div>

                                                        <div class="text-start ">
                                                            <span style="">Pravin </span>
                                                            {{-- <span>Lead Frotend Developer</span> --}}
                                                        </div>

                                                    </div>

                                                </div>
                                            </td>
                                            <td>

                                                <a class="btn fw-bold manage-button" href="{{ route('addPermission') }}" role="button">
                                                    Manage
                                                </a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
