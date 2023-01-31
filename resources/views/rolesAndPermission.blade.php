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
                <h6>Employee roles and permissions</h6>
                <div class="roles-content">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-xl-8 col-lg-8 col-xxl-8 col-md-8 ">
                            <div class="roles-filter search-bar-wrapper">
                                <i class="fa fa-search"></i>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="Search....">
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 col-lg-4 col-xxl-4 col-md-4">
                            <button data-bs-target="#add-newHoliday" data-bs-toggle="modal" class="btn btn-orange "><i
                                    class="fa fa-plus-circle me-1"></i> Add New Role
                            </button>
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
                                                        <div class="chips-img-sm me-2">
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

                                                <button class="btn fw-bold manage-button">
                                                    Manage
                                                </button>

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
