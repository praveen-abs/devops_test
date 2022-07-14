@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">

<style>
table {
    /* border-collapse: separate; */
    /* border-radius: 10px !important; */
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px !important;

}

table th {
    /* color: #4c9393; */
    background-color: #b0bff1;
    padding: 15px 10px !important;
}

tbody {
    background-color: #fff;
}

tbody tr:hover {
    background-color: #f3f3f9;

}

td {
    border: solid 1px #000;
    border-style: none solid solid none;
    padding: 10px;
    font-weight: 600;
    color: #878aa5;

}

td .btn i {
    font-size: 16px;
}


/* tr:first-child th:first-child {
    border-top-left-radius: 10px !important;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 10px !important;
}

tr:first-child th:last-child {
    border-top-right-radius: 10px !important;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 10px !important;
} */


/* for radio button */
.switch-field {
    display: flex;

}

/* .directory-right button {
    background-color: #b0bff1!important;

} */

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
    background-color: #fff;
    color: #1c8b8d;
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 10px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    /* box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1); */
    transition: all 0.1s ease-in-out;
    margin-bottom: 0px !important;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked+label {
    background-color: #b0bff1!important;
    box-shadow: none;
}

.switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
}

.directory-search-bar {
    background:#fff !important;
}
.directory-search-bar:focus{
    border:2px solid #1c8b8d !important;
}

</style>


@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Employee Directories @endslot
@endcomponent

<div class=" project-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="row mb-3">
                <div class="card card-animate">
                    <div class="card-body p-0">
                        <!-- <h5>Employee Directory</h5> -->
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
                                <!---->
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
                    </div><!-- end card body -->
                </div><!-- end card body -->
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
    </div>
    <div class="directory-content my-3 ">
        <div class="row">
            <div class="col-8">
                <div class="float-left directory-left d-flex">
                    <div class="switch-field align-items-center">
                        <input type="radio" id="radio-one" name="switch-one" value="Active" checked />
                        <label for="radio-one ">Active</label>
                        <input type="radio" id="radio-two" name="switch-one" value="Inactive" />
                        <label for="radio-two ">Inactive</label>
                    </div>

                    <div class="search-content header-item w-50 mx-5">

                        <i class=" ri-search-line "></i>
                        <input type="text" class="form-control search-bar directory-search-bar w-50 "
                            placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex directory-right float-right justify-content-end">
                    <div class="btn border-0 outline-none mx-2 ">
                        <i class="ri-menu-add-line fw-bold"></i>
                    </div>
                    <button class="btn border-0 outline-none onboard-employee-btn bg-danger text-white">
                        <i class="ri-add-line fw-bold mx-1"></i>
                        Onboard Employee
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="w-100 align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Employee Code</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Reporting Manager</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Reminder</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vmtEmployees as $key => $employee)
                <tr>
                    <td> <span>{{$employee->emp_no}}</span></td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                            @if($employee->avatar)
                                <img src="{{ URL::asset('assets/images/') }}/{{$employee->avatar}}" alt=""
                                    class="avatar-xs rounded-circle" />
                            @else
                                <img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            @endif
                            </div>
                            <div class="flex-grow-1">
                            {{$employee->emp_name}}
                            </div>
                        </div>
                    </td>

                    <td><span>{{$employee->designation}}</span></td>
                    <td><span>{{$employee->l1_manager_name }}</span></td>

                    <td><span>{{$employee->email_id }}</span></td>
                    <td><span> B <sup>+</sup></span></td>
                    <td>{{$employee->percentage}}%</td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <a href="{{route('pages-profile')}}" class="btn border-0 outline-none bg-transparent p-0  mx-1">
                                <i class="ri-pencil-line text-primary fw-bold"></i>
                            </a>
                            <button class="btn border-0 outline-none bg-transparent p-0  ">
                                <i class="ri-delete-bin-line text-danger fw-bold"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <button class="btn border-0 outline-none bg-transparent p-0">
                            <i class="ri-alarm-line fw-bold "></i>
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
        <!-- end table -->
    </div>

</div><!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

    $('body').on('click', '.topbarNav', function() {
        $('.topbarNav').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id');
        $('.topbarContent').hide();
        $('.emp-' + id).css("display", "block");
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