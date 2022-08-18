@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/css/app.min.css') }}">
<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
@endsection



@section('content')
@component('components.organization_breadcrumb')
@slot('li_1') @endslot
@endcomponent


<div class=" directory-wrapper bg-white px-3 pt-3 pb-0 mt8-mb25">
    <h6 class="mb-0">Employee Directory</h6>
    <!-- <div class="row">
        <div class="col-12">
            <div class="row ">
                <div class="card card-animate">
                    <div class="card-body p-0">

                        <ul class="nav sub-topnav">
                            <li routerlinkactive="active" class="active">
                                <a routerlink="directory" href="{{url('vmt-employess/directory')}}">Employee
                                    Directory</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Organization Tree</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="logins" href="#/org/employees/logins">Logins</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="profile-changes" href="#/org/employees/profile-changes">Profile
                                    Changes</a>

                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="privateprofiles" href="#/org/employees/privateprofiles">Private
                                    Profiles</a>
                            </li>
                            <li routerlinkactive="active">
                                <a href="/#/org/employees/probation/in-probation">Probation</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="settings" href="#/org/employees/settings">Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-title">
                <h1>Employee Directory</h1>
            </div>
            <div class="card clear-margin-x clear-margin-b">
                <div class="card-body p-0">
                    <div class="row" style="border: 1px solid #f8f8f9;">
                        <div class="pt-1 col-2 dropdown-hover" style="border-right:1px solid #f8f8f9;">
                            <div class="dropdown">
                                <button type="button" class="btn" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="d-flex align-items-center">
                                        <span class="text-start ms-xl-2">
                                            <span class="wrap-text w-100"><span class="text-media">Department</span>
                                                <span><i class="fa fa-angle-down"></i></span></span>
                                            <span
                                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="input-search border-top-0 mx-16 mb-10">
                                        <input type="text" placeholder="Search"
                                            class="form-control h-100 w-100 text-normal ng-untouched ng-pristine ng-valid">
                                        <span class="ic-search icon icon-xs mt-8"></span>
                                    </div>
                                    <label class="dropdown-item">
                                        <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                            id="departmentNameSelectAll">
                                        <label for="departmentNameSelectAll">Select All</label>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName26546Hyderabad HQ_Customer Success">
                                            <label class="text-truncate-1"
                                                for="departmentName26546Hyderabad HQ_Customer Success"
                                                title="Hyderabad HQ_Customer Success">Hyderabad HQ_Customer
                                                Success</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName115611% Management %">
                                            <label class="text-truncate-1" for="departmentName115611% Management %"
                                                title="% Management %">% Management %</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName31801Hyderabad HQ_Inside Sales">
                                            <label class="text-truncate-1"
                                                for="departmentName31801Hyderabad HQ_Inside Sales"
                                                title="Hyderabad HQ_Inside Sales">Hyderabad HQ_Inside Sales</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="departmentName159730Solutions">
                                            <label class="text-truncate-1" for="departmentName159730Solutions"
                                                title="Solutions">Solutions</label>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pt-1 col-2 dropdown-hover" style="border-right:1px solid #f8f8f9;">
                            <div class="dropdown">
                                <button type="button" class="btn" id="page-user-dropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="d-flex align-items-center">
                                        <span class="text-start ms-xl-2">
                                            <span class="wrap-text w-100"><span class="text-media">Location
                                                </span><span><i class="fa fa-angle-down"></i></span></span>
                                            <span
                                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="input-search border-top-0 mx-16 mb-10">
                                        <input type="text" placeholder="Search"
                                            class="form-control h-100 w-100 text-normal ng-untouched ng-pristine ng-valid">
                                        <span class="ic-search icon icon-xs mt-8"></span>
                                    </div>
                                    <label class="dropdown-item">
                                        <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                            id="locationSelectAll">
                                        <label for="locationSelectAll">Select All</label>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="locationName26546Hyderabad HQ_Customer Success">
                                            <label class="text-truncate-1"
                                                for="locationName26546Hyderabad HQ_Customer Success"
                                                title="Hyderabad HQ_Customer Success">Hyderabad HQ_Customer
                                                Success</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="locationName115611% Management %">
                                            <label class="text-truncate-1" for="locationName115611% Management %"
                                                title="% Management %">% Management %</label>
                                        </span>
                                    </label>
                                    <label class="dropdown-item">
                                        <span class="pl-24">
                                            <input type="checkbox" class="checkbox-sm ng-untouched ng-pristine ng-valid"
                                                id="locationName31801Hyderabad HQ_Inside Sales">
                                            <label class="text-truncate-1"
                                                for="locationName31801Hyderabad HQ_Inside Sales"
                                                title="Hyderabad HQ_Inside Sales">Hyderabad HQ_Inside Sales</label>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pt-1 col-8">
                            <div class="input-search mr-40 d-flex">
                                <span class="mt-2"><i class="fa fa-search"></i></span>
                                <input type="text" placeholder="Search" name="filter" style="padding:6px;"
                                    autocomplete="off"
                                    class="mt-1 border-0 h-100 w-100 ng-untouched ng-pristine ng-valid">
                            </div>
                            <div class="reset-filter bg-white">
                                <a class="icon-click">
                                    <span tooltip="Clear filters" container="body"
                                        class="ic-clear-filter icon icon-lg"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="float:right;" class="p-3">
                        <div>
                            <p class="text-x-small text-muted">Showing 8 of 8</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div> -->
    <!-- <div class="directory-content ">
        <div class="row">
            <div class="col-8">
                <div class="float-left directory-left d-flex">
                    <div class="search-content header-item w-50 ">
                        <i class=" ri-search-line "></i>
                        <input type="text" class="form-control py-1 search-bar rounded-pill directory-search-bar  w-75 "
                            placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex directory-right float-right justify-content-end align-items-center">
                    <div class="btn border-0 outline-none mx-2 ">
                        <i class="ri-menu-add-line fw-bold"></i>
                    </div>
                    <a href="{{route('vmt_employeeOnboarding')}}" class="btn   btn-orange  fw-bold ">
                        <i class="ri-add-line fw-bold mx-1"></i>
                        Onboard Employee
                    </a>
                </div>
            </div>
        </div>
    </div> -->

    <div class="table-responsive">
        <div class="container-fluid px-2 bg-white" style="position:relative;">
            <button class="btn btn-primary py-1 fw-bold left-corner-btn"><a href="{{route('vmt_employeeOnboarding')}}" class=" text-white">
                    <i class="ri-add-line fw-bold mx-1"></i>
                    Onboard Employee
                </a></button>
            <table class=" table table-borderd " id="directory-table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Employee Code</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Reporting Manager</th>
                        <!-- <th scope="col">Email Id</th> -->
                        <th scope="col">Date Of Joining</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Actions</th>
                        {{-- <th scope="col">Status</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($vmtEmployees as $key => $employee)
                    <tr>

                        <td>
                            <div class="d-flex justify-content-start align-items-center table-img">
                                <div class="mx-2 d-flex justify-content-center align-items-center profile-name-icon">
                                    @if( empty($employee->avatar) || !file_exists(public_path('images/'. $employee->avatar)) )
                                        @php
                                        preg_match('/(?:\w+\. )?(\w+).*?(\w+)(?: \w+\.)?$/',$employee->emp_name , $result);
                                        $name = strtoupper($result[1][0].$result[2][0]);
                                        @endphp
                                        <!--span class="badge rounded-circle h-10 w-10   badge-primary ms-2"-->
                                        <span class="align-middle fw-bold text-white">{{$name}}</span><!--/span-->
                                    @else
                                        <img src="{{ URL::asset('images/'.$employee->avatar) }}" alt="" class="h-100 w-100" />
                                    @endif

                                </div>
                                <span>

                                    {{$employee->emp_name}}

                                </span>
                            </div>
                        </td>
                        <td> {{$employee->emp_no}}</td>
                        <td>{{$employee->designation}}</td>
                        <td>{{$employee->l1_manager_name }}</td>
                        <td>{{$employee->doj }}</td>
                        <!-- <td><span>{{$employee->email_id }}</span></td> -->
                        <td>B <sup>+</sup></td>
                        <td>70%</td>
                        <td>
                            <!-- <div class="d-flex justify-content-center align-items-center"> -->
                            <a href="{{route('pages_impersonate_profile', $employee->userid)}}"
                                class="btn border-0 outline-none bg-transparent p-0  mx-1">
                                <i class="ri-pencil-line text-orange fw-bold"></i>
                            </a>

                            <!-- </div> -->
                        </td>
                        {{-- <td>
                            <div class="switch-field align-items-center  justify-content-center">
                                <input type="hidden" value="{{$employee->user_id}}" name="id{{$key}}" id="id{{$key}}">
                                <input class="status" type="radio" id="radio-one{{$key}}" name="{{$key}}" value="1"
                                    @if($employee->emp_status) checked @endif />
                                <label for="radio-one{{$key}}">Active</label>
                                <input class="status" type="radio" id="radio-two{{$key}}" name="{{$key}}" value="0"
                                    @if(!$employee->emp_status) checked @endif>
                                <label for="radio-two{{$key}}">Inactive</label>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
</div>

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- data table -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $(function() {
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
            },
        });
    });

    $('.status').click(function() {
        var status = $(this).val();
        var name = $(this).attr('name');
        var id = $('#id' + name).val();
        $.ajax({
            url: "{{route('updateUserAccountStatus')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "status": status,
                "id": id,
            },
            success: function(data) {
                //window.location.reload();
                console.log(data);
            }
        });
    });

    $('#directory-table').DataTable({

    });

    $('body').on('click', '.topbarNav', function() {
        $('.topbarNav').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id');
        $('.topbarContent').hide();
        $('.emp-' + id).css("display", "block");
    });

    $('#calendar_type').change(function() {
        calendar();
    });

    function calendar() {
        if ($('#calendar_type').val() == 'financial_year') {
            $('#year').val('Apr');
        } else {
            $('#year').val('Jan');
        }
    }

    $('#frequency').change(function() {
        frequency();
    });


    $('body').on('click', '.popover-close', function() {
        $("[data-toggle=popover]").popover('hide');
    });


    var options = [];
    $('.dropdown-menu a').on('click', function(event) {
        var $target = $(event.currentTarget),
            val = $target.attr('data-value'),
            $inp = $target.find('input'),
            idx;
        if ((idx = options.indexOf(val)) > -1) {
            options.splice(idx, 1);
            setTimeout(function() {
                $inp.prop('checked', false)
            }, 0);
        } else {
            options.push(val);
            setTimeout(function() {
                $inp.prop('checked', true)
            }, 0);
        }
        $(event.target).blur();
        return false;
    });

});
</script>
@endsection
