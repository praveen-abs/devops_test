@extends('layouts.master')


<?php
//Icons for calendar
$svg_icon_rejected = '/images/icons/svg_icon_rejected.svg';
$svg_icon_approved = '/images/icons/svg_icon_accepted.svg';
$svg_icon_pending = '/images/icons/svg_icon_pending.svg';
$svg_icon_notApplied = '/images/icons/svg_icon_notApplied.svg';

?>
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/attendance_calendar.css') }}">
@endsection
@section('content')
    {{-- @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent --}}

    <div class="leave_calendar-wrapper mt-30">

        {{-- <button type="button" class="btn btn-orange" data-bs-target="#regularizationModal" data-bs-toggle="modal">Apply Request</button> --}}

        <div class="card left-line mb-2">
            <div class="card-body py-1">
                <div class="row">
                    {{-- <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-3">
                        <h6>Timesheet</h6>
                    </div> --}}

                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 ">
                        <div class="calender-mid_content">
                            <div class="row ">
                                <div class=" col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3  ">
                                    <p class="text-muted fw-normal f-18"><i class="fa fa-calendar me-2" id="calendarIcon"
                                            aria-hidden="true"></i>
                                        <span class="dates " id="display_date"></span>
                                    </p>
                                </div>
                                <div class=" col-sm-5 col-md-5 col-xl-5 col-lg-5 col-xxl-5  ">

                                    <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                                        <li class="nav-item active ember-view me-2" role="presentation">
                                            <a class="nav-link active ember-view " id="tab_timesheet" data-bs-toggle="pill"
                                                href="" data-bs-target="#" role="tab" aria-controls="pills-home"
                                                aria-selected="true">
                                                Timesheet</a>
                                        </li>

                                        @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR', 'Manager']))
                                            <li class="nav-item mx-2 ember-view" role="presentation ">
                                                <a class="nav-link ember-view" id="tab_teamtimesheet" data-bs-toggle="pill"
                                                    data-bs-target="#" type="button" role="tab"
                                                    aria-controls="payslips" aria-selected="false">Team Timesheet</a>
                                            </li>
                                        @endif

                                        @if (Str::contains(currentLoggedInUserRole(), ['Super Admin', 'Admin', 'HR']))
                                            <li class="nav-item ml-2  ember-view" role="presentation ">
                                                <a class="nav-link ember-view" id="tab_orgtimesheet" data-bs-toggle="pill"
                                                    data-bs-target="#" type="button" role="tab"
                                                    aria-controls="annual-earnings" aria-selected="false">Org Timesheet</a>
                                            </li>
                                        @endif

                                    </ul>

                                </div>
                                <div class=" col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4 ">
                                    <div class="d-flex justify-content-end">
                                        <select class="form-select border-orange me-2" id="">
                                            <option selected hidden disabled>Department</option>

                                        </select>
                                        <select class="form-select border-orange" id="">
                                            <option selected disabled hidden>Export</option>

                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="fas fa-fingerprint me-2  text-success "></i>Biometric</p>

                    </div>

                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="fa fa-exclamation-circle text-warning fs-15 me-2"></i>Not Applied</p>

                    </div>

                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="badge bg-primary rounded-pill  me-2  ">LC</i>Late Coming
                        </p>

                    </div>
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="badge bg-info  rounded-pill  me-2  ">MOP</i>Missed Out
                            Punch</p>

                    </div>
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="fa fa-laptop   me-2 text-info"></i>Web </p>

                    </div>
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="fa fa-times-circle    me-2 text-danger"></i>Rejected </p>

                    </div>

                </div>
                <div class="row">

                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class='fa fa-check-circle text-success me-1'></i> Approved </p>

                    </div>
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="fa fa-question-circle fs-15 text-secondary me-2"></i>Pending</p>

                    </div>

                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="badge bg-orange rounded-pill  me-2  ">EG</i>Early Going
                        </p>

                    </div>
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="badge bg-dark rounded-pill  me-3  ">MIP</i>Missed In
                            Punch</p>

                    </div>
                    <div class="col-2">

                        <p class="fw-bold text-primary"><i class="fa fa-mobile text-dark fs-15 me-3  "></i>Mobile</p>

                    </div>


                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 pe-0 col-xl-3 col-lg-3 col-xxl-3  left-panel">
                <div class="card  mb-0" style="height:500px;min-height:657px;overflow-y:auto;">
                    <div class="card-body px-1">
                        <div class="search-content ms-2  mb-3">
                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control w-100 py-1 rounded" id="searchInput_box"
                                placeholder="Search Employees...">
                        </div>

                        <div class="showEmployee_attendance">
                            <ul class="list-unstyled " id="sidepanel_employees_list">


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xl-9 col-lg-9 col-xxl-9 right-panel ">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show active fade" id="attendanceMonth_tab" role="tabpanel"
                        aria-labelledby="pills-contact-tab">
                        <div class="calendar-wrapper card box_shadow_0 card mb-0 border-0">
                            <div class="card-body ">
                                <div class="_wrapper vh-100">
                                    <div class=" h-100  _container-calendar">
                                        <div
                                            class="_button-container-calendar d-flex align-items-center justify-content-between">
                                            <button id="_previous" onclick="previous()" class="previous"><i
                                                    class="fa fa-chevron-left"></i></button>
                                            <h6 id="_monthAndYear" class="_monthAndYear"></h6>
                                            <button id="_next" onclick="next()" class="next"><i
                                                    class="fa fa-chevron-right"></i></button>
                                        </div>
                                        <table class="_table-calendar" id="_calendar" data-lang="en">


                                            <thead id="_thead-month"></thead>
                                            <tbody id="_calendar-body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal  custom-modal" aria-hidden="true" id="regularizationModal" tabindex="-1" aria-labelledby=""
            aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered   modal-md">
                <div class="modal-content top-line">
                    <div class="modal-header border-0 py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Attendance Regularization</h6>
                        <button type="button" class="modal-close popUp-close outline-none  border-0"
                            data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>

                    <div class="modal-body">
                        <form id="regularizationForm">
                            @csrf
                            <input type="hidden" name="regularization_type" id="regularization_type" value="" />
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-6"><label class="text-ash-medium fs-15">Date</label></div>
                                        <div class="col-6">
                                            <span class="text-ash-medium fs-15" id="current_date">--/--/----,Monday</span>

                                            <input type="hidden" class="text-ash-medium form-control fs-15"
                                                name="attendance_date" id="attendance_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2" id="div_actual_user_time">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="text-ash-medium fs-15">
                                                Actual Timing <span id="timing_label_suffix">(Late Arrival)</span>
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <span class="text-ash-medium fs-15" id="actual_user_time"></span>
                                            <input type="hidden" name="attendance_user" id="attendance_user">
                                            <input type="hidden" class="text-ash-medium form-control fs-15"
                                                name="user_time" id="user_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-6"><label class="text-ash-medium fs-15">Regularize Timing
                                                as</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="text-ash-medium form-control fs-15" name="regularize_time"
                                                id="regularize_time">
                                        </div>
                                    </div>
                                </div>
                                <div id="div_reason_editable">
                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-6"><label class="text-ash-medium fs-15">Reason</label></div>
                                            <div class="col-6">
                                                <select name="reason" class="form-select btn-line-orange"
                                                    id="reason_mip" onchange="showReasonBox(this)">
                                                    <option selected hidden disabled>
                                                        Choose Reason for MIP
                                                    </option>
                                                    <option value="Permission">Permission</option>
                                                    <option value="Forgot to Punch">Forgot to Punch</option>
                                                    <option value="Technical Error">Technical Error</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <select name="reason" class="form-select btn-line-orange"
                                                    id="reason_mop" onchange="showReasonBox(this)">
                                                    <option selected hidden disabled>
                                                        Choose Reason for MOP
                                                    </option>
                                                    <option value="Permission">Permission</option>
                                                    <option value="Forgot to Punch">Forgot to Punch</option>
                                                    <option value="Technical Error">Technical Error</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <select name="reason" class="form-select btn-line-orange" id="reason_lc"
                                                    onchange="showReasonBox(this)">
                                                    <option selected hidden disabled>
                                                        Choose Reason for LC
                                                    </option>
                                                    <option value="Permission">Permission</option>
                                                    <option value="Technical Error">Technical Error</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <select name="reason" class="form-select btn-line-orange" id="reason_eg"
                                                    onchange="showReasonBox(this)">
                                                    <option selected hidden disabled>
                                                        Choose Reason for EG
                                                    </option>
                                                    <option value="Permission">Permission</option>
                                                    <option value="Technical Error">Technical Error</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                                                    placeholder="Reason here...." style="display:none"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="div_reason_noneditable">
                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-6"><label class="text-ash-medium fs-15">Reason</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="text-ash-medium form-control fs-15"
                                                    name="txt_reason_noneditable" id="txt_reason_noneditable"
                                                    value="EMPTY" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2" id="div_custom_reason">
                                        <div class="row">
                                            <div class="col-6"><label class="text-ash-medium fs-15">Custom Reason</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="text-ash-medium form-control fs-15"
                                                    name="txt_customreason_noneditable" id="txt_customreason_noneditable"
                                                    value="EMPTY" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-6"><label class="text-ash-medium fs-15">Status</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="text-ash-medium form-control fs-15" name="txt_apply_status"
                                                    id="txt_apply_status" value="EMPTY" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>



                    </div>
                    <div class="modal-footer border-0 py-2" id="div_btn_applyRegularize">

                        <button type="button" class="btn btn-orange" onclick="attendanceRegularize()">Apply
                            Request</button>
                    </div>

                </div>
            </div>


        </div>

    </div>
@endsection

@section('script')
    <script>
        var shift_start_time = "{{ $shift_start_time }}";
        var shift_end_time = "{{ $shift_end_time }}";

        var today = new Date();
        var currentMonth = today.getMonth();
        var currentYear = today.getFullYear();
        var selectYear = document.getElementById("_year");
        var currentlySelectedUser = "{{ Auth::user()->id }}";




        function ajaxGetMonthlyDate_TimeSheet(selectedMonth, selectedYear, selectedUserID) {
            $.ajax({
                url: "{{ route('fetch-attendance-user-timesheet') }}",
                type: "GET",
                data: {
                    month: selectedMonth + 1,
                    year: selectedYear,
                    user_id: selectedUserID,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);

                    // //update sidepanel
                    // $('#sidepanel_employees_list').html('');

                    // var html = '<li class="list_employee_attendance p-2 w-100" >'+
                    //                 '<div class="d-flex">'+
                    //                     '<div class="user_pic me-3 d-flex justify-content-center align-items-center bg-primary rounded-circle">'+
                    //                         '<span class="text-white">Pr</span>'+
                    //                     '</div>'+
                    //                     '<div class="user_content d-flex  align-items-center flex-column">'+
                    //                         '<p class="fw-bold text-primary f-15">'+element.name+'</p>'+
                    //                         '<p class=" text-muted f-12">'+element.designation+'</p>'+
                    //                     '</div>'+
                    //                 '</div>'+
                    //             '</li>';

                    // $('#sidepanel_employees_list').append(html);
                    showCalendar(selectedMonth, selectedYear, data);

                }
            });
        }

        function ajaxGetTeamMembersDetails(user_code) {
            $.ajax({
                url: "{{ route('fetch-team-members') }}",
                type: "GET",
                data: {
                    user_code: user_code,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    var avatar_data = '';

                    //update sidepanel
                    $('#sidepanel_employees_list').html('');

                    data.forEach((element) => {

                        var avatar_data = '';

                        if (element.employee_avatar.type == 'shortname') {

                            avatar_data =
                                '<div class="user_pic d-flex justify-content-center align-items-center bg-primary  rounded-circle"><span class="text-white fw-bold">' +
                                element.employee_avatar.data +
                                '</span></div>';

                        } else
                        if (element.employee_avatar.type == 'avatar') {
                            var imageURL = "images/" + element.employee_avatar.data;

                            avatar_data =
                                ' <div class="user_pic bg-ash rounded-circle"><img class=" w-100 h-100 rounded-circle header-profile-user" src="' +
                                imageURL + '" alt="user"></div>';
                        }

                        var html = '<li class="list_employee_attendance p-1 w-100" >' +
                            '<a class="w-100  d-flex employee_list_item w-100 p-2" data-userid=' +

                            element
                            .id + '>' +
                            '<div class=" me-2 d-flex col-auto">' +
                            avatar_data +
                            '</div>' +
                            '<div class="user_content text-start">' +
                            '<p class="fw-bold text-primary f-13">' + element.name + '</p>' +
                            '<p class=" text-muted f-11">' + element.designation + '</p>' +
                            '</div>' +
                            '</a>' +
                            '</li>';

                        $('#sidepanel_employees_list').append(html);

                    });

                    tbl = document.getElementById("_calendar-body");
                    tbl.innerHTML = "";

                    //showCalendar(currentMonth, currentYear, data);
                    //when employee name selected, update the calendar
                    $('.employee_list_item').click(function() {
                        currentlySelectedUser = $(this).attr('data-userid');
                        console.log("currentlySelectedUser : " + currentlySelectedUser +
                            ", Month - Year : " + currentMonth + " , " + currentYear);
                        ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, currentlySelectedUser);

                    });

                }
            });
        }

        function ajaxGetOrgMembersDetails() {
            $.ajax({
                url: "{{ route('fetch-org-members') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);

                    //update sidepanel
                    $('#sidepanel_employees_list').html('');

                    data.forEach((element) => {

                        var avatar_data = '';

                        if (element.employee_avatar.type == 'shortname') {

                            avatar_data =
                                ' <div class="bg-primary user_pic d-flex  justify-content-center align-items-center  rounded-circle"> <span class="text-white fw-bold">' +
                                element.employee_avatar.data +
                                '</span></div>';


                        } else
                        if (element.employee_avatar.type == 'avatar') {

                            var imageURL = "images/" + element.employee_avatar.data;

                            avatar_data =
                                '<div class="user_pic bg-ash rounded-circle"><img class=" w-100 rounded-circle  h-100 header-profile-user" src="' +
                                imageURL + '" alt="user"></div>';


                        }


                        var html = '<li class="list_employee_attendance p-1 " >' +
                            '<a class="  d-flex employee_list_item w-100 p-2" data-userid=' +

                            element
                            .id + '>' +
                            '<div class="col-auto me-2 ">' +
                            avatar_data +
                            '</div>' +
                            '<div class="user_content text-start ">' +
                            '<p class="fw-bold text-primary f-13">' + element.name + '</p>' +
                            '<p class=" text-muted f-11">' + element.designation + '</p>' +
                            '</div>' +
                            '</a>' +
                            '</li>';

                        $('#sidepanel_employees_list').append(html);

                    });

                    tbl = document.getElementById("_calendar-body");
                    tbl.innerHTML = "";
                    //showCalendar(currentMonth, currentYear, data);

                    //when employee name selected, update the calendar
                    $('.employee_list_item').click(function() {
                        currentlySelectedUser = $(this).attr('data-userid');
                        console.log("currentlySelectedUser : " + currentlySelectedUser +
                            ", Month - Year : " + currentMonth + " , " + currentYear);
                        ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, currentlySelectedUser);

                    });

                }
            });
        }



        function updateTimeSheetForCurrentEmployee() {

            var avatar_data = '';

            @if ($current_employee_detail->employee_avatar['type'] == 'shortname')

                avatar_data =
                    '<div class="bg-primary user_pic d-flex justify-content-center align-items-center  rounded-circle"> <span class="text-white fw-bold">{{ $current_employee_detail->employee_avatar['data'] }}</span></div>';
            @elseif ($current_employee_detail->employee_avatar['type'] == 'avatar')
                var imageURL = "images/" + '{{ $current_employee_detail->employee_avatar['data'] }}';

                avatar_data =
                    ' <div class="user_pic bg-ash rounded-circle "><img class=" rounded-circle w-100 h-100 header-profile-user" src="' +
                    imageURL +
                    '" alt="--"></div>';
            @endif

            //show the current user in sidepanel for TimeSheet tab
            $('#sidepanel_employees_list').html('');


            var html = '<li class="list_employee_attendance p-1 " >' +
                '<a class="  d-flex employee_list_item w-100 p-2" data-userid=' +
                '{{ $current_employee_detail->id }}' +
                '>' +
                '<div class="col-auto me-2 ">' +
                avatar_data +
                '</div>' +
                '<div class="user_content  text-start">' +
                '<p class="fw-bold text-primary f-13">{{ $current_employee_detail->name }}</p>' +
                '<p class=" text-muted f-11">{{ $current_employee_detail->designation }}</p>' +
                '</div>' +
                '</a>' +
                '</li>';

            $('#sidepanel_employees_list').append(html);

            //when employee name selected, update the calendar
            $('.employee_list_item').click(function() {
                console.log($(this).attr('data-userid'));

                ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, "{{ Auth::user()->id }}");


            });

        }


        function removeAndShowPanel() {

            if ($('#tab_timesheet').hasClass('active')) {
                $('.left-panel').css('display', 'none');
                $('.right-panel').addClass('col-xl-12 col-lg-12');
                $('#tab_timesheet').click(function() {
                    $('.left-panel').css('display', 'none');
                    $('.right-panel').addClass('col-xl-12 col-lg-12');
                    updateTimeSheetForCurrentEmployee();
                });

                updateTimeSheetForCurrentEmployee();

            }

            $('#tab_teamtimesheet').click(function() {
                $('.right-panel').removeClass('col-xl-12 col-lg-12');
                $('.right-panel').addClass('col-xl-9 col-lg-9');
                $('.left-panel').css('display', 'block');
                ajaxGetTeamMembersDetails("{{ Auth::user()->user_code }}");
            });


            $('#tab_orgtimesheet').click(function() {
                $('.right-panel').removeClass('col-xl-12 col-lg-12');
                $('.right-panel').addClass('col-xl-9 col-lg-9');
                $('.left-panel').css('display', 'block');
                ajaxGetOrgMembersDetails("{{ Auth::user()->user_code }}");
            });

        }

        removeAndShowPanel();


        $(document).ready(function() {
            var months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
                "AUG", "SEP", "OCT", "NOV", "DEC"
            ];
            // $("#calendarIcon").click(function() {
            //     var months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
            //         "AUG", "SEP", "OCT", "NOV", "DEC"
            //     ];
            //     var val = shortMoth[today.getMonth()] + " " + today.getDate() + "," + today.getFullYear();
            //     $("#display_date").text(val).show();
            // });

            function showDates() {
                var val = months[today.getMonth()] + " " + today.getDate() + "," + today.getFullYear();
                $("#display_date").text(val).show();
            }
            showDates();



            //For timesheet tab
            updateTimeSheetForCurrentEmployee();
            console.log("INIT : Getting timesheet data for the YYYY-MM : " + currentYear + " - " + currentMonth);

            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, {{ Auth::user()->id }});


            $('#tab_timesheet').click(function() {

                console.log("Timesheet");
                const d = new Date();

                var selectedMonth = d.getMonth();

                updateTimeSheetForCurrentEmployee();
                ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, {{ Auth::user()->id }});

            });

            $('#tab_teamtimesheet').click(function() {

                console.log("Team timesheet");

                ajaxGetTeamMembersDetails("{{ Auth::user()->user_code }}");
            });


            $('#tab_orgtimesheet').click(function() {

                console.log("Org timesheet");

                ajaxGetOrgMembersDetails();
            });


            //when employee name selected, update the calendar
            $('.employee_list_item').click(function() {
                console.log($(this).attr('data-userid'));
                currentlySelectedUser = $(this).attr('data-userid');
                console.log("currentlySelectedUser : " + currentlySelectedUser);
                ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, currentlySelectedUser);


            });

        });



        function showReasonBox(selected) {

            if (selected.value == "Others") {
                document.getElementById('reasonBox').style.display = "block";
            } else {
                document.getElementById('reasonBox').style.display = "none";
            }

        }

        function showMissedInMissedOutPunchModal(element) {
            alert("Not yet implemented");
        }

        function showRegularizationModal(element) {
            let t_regularization_type = $(element).val();
            let selected_date = $(element).data('currentdate');
            let t_user_id = $(element).data('userid');

            //Based on data-applystatus, we will fetch the value from server.
            //If data-applystatus != None, then make Ajax request
            console.log("Status : " + $(element).data('applystatus'));
            if ($(element).data('applystatus') != 'None') {
                ////UI changes in modal popup

                //Disable textbox
                $('#regularize_time').attr('disabled', 'disabled');

                //Hide Reason dropdown div
                $('#div_reason_editable').hide();

                //Enable Non-editable reason div
                $('#div_reason_noneditable').show();

                //Hide the Apply Regulaize button
                $('#div_btn_applyRegularize').hide();

                /*
                    Input params : selectedDate, regularization_type
                    Output params : reason,custom_reason, status

                */
                $.ajax({
                    url: "{{ route('fetch-regularization-data') }}",
                    type: "POST",
                    data: {
                        user_id: t_user_id,
                        selected_date: selected_date,
                        regularization_type: t_regularization_type,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        console.log("Reason Type : " + data.reason_type);

                        //Update the non-editable UIs
                        $('#txt_reason_noneditable').val(data.reason_type); //editable

                        if (data.custom_reason != "")
                            $('#div_custom_reason').show();
                        else
                            $('#div_custom_reason').hide();


                        $('#txt_customreason_noneditable').val(data.custom_reason); //editable
                        $('#txt_apply_status').val(data.status); //editable

                        //show Modal
                        $('#regularizationModal').fadeIn(0);

                    }
                });
            } else {
                //Hide non-editable stuffs
                //Reset modal element states
                //Enable textbox
                $('#regularize_time').attr('disabled', false);

                //Show Reason dropdown div
                $('#div_reason_editable').show();

                //Show actual time
                $('#div_actual_user_time').show();


                //Disable Non-editable reason div
                $('#div_reason_noneditable').hide();
                $('#div_custom_reason').hide();

                //Show the Apply Regularize button
                $('#div_btn_applyRegularize').show();

                //remove old values
                $('#txt_reason_noneditable').val(''); //editable
                $('#txt_customreason_noneditable').val(''); //editable
                $('#txt_apply_status').val(''); //editable

                //Based on Regularization Type, show the dropdowns
                $('#reason_mip').hide();
                $('#reason_mop').hide();
                $('#reason_lc').hide();
                $('#reason_eg').hide();

                if ($(element).val() == "LC") {
                    $('#reason_lc').show();
                } else
                if ($(element).val() == "EG") {
                    $('#reason_eg').show();

                } else
                if ($(element).val() == "MIP") {
                    $('#reason_mip').show();
                } else
                if ($(element).val() == "MOP") {
                    $('#reason_mop').show();
                }

                //show Modal
                $('#regularizationModal').fadeIn(0);
            }

            //Set UI elements
            $('#current_date').html(selected_date);

            //Hide all reason dropdowns

            if ($(element).val() == "LC") {
                //On modal popup
                $('#actual_user_time').html(moment($(element).data('checkintime'), ["HH:mm"]).format('h:mm A'));
                $('#timing_label_suffix').html('( Late Arrival )');
                $('#regularize_time').val(shift_start_time); //editable


                //Hidden vars
                $('#attendance_date').val(selected_date);
                $('#user_time').val($(element).data('checkintime'));
                $('#attendance_user').val(currentlySelectedUser);
                $('#regularization_type').val("LC");

            } else
            if ($(element).val() == "EG") {
                $('#actual_user_time').html(moment($(element).data('checkouttime'), ["HH:mm"]).format('h:mm A'));
                $('#timing_label_suffix').html('( Early Going )');
                $('#regularize_time').val(shift_end_time);

                //Hidden vars
                $('#attendance_date').val(selected_date);
                $('#user_time').val($(element).data('checkouttime'));
                $('#attendance_user').val(currentlySelectedUser);
                $('#regularization_type').val("EG");

            } else
            if ($(element).val() == "MIP") {

                $('#div_actual_user_time').hide();

                //$('#actual_user_time').html($(element).data('actual_timing'));
                $('#regularize_time').val(shift_start_time);

                $('#attendance_date').val(selected_date);
                $('#user_time').val($(element).data('actual_timing'));
                $('#attendance_user').val(currentlySelectedUser);
                $('#regularization_type').val("MIP");
                $('#timing_label_suffix').html('( MIP )');
                //$('#')
            } else
            if ($(element).val() == "MOP") {
                $('#div_actual_user_time').hide();

                //$('#actual_user_time').html($(element).data('actual_timing'));
                $('#regularize_time').val(shift_end_time);

                $('#attendance_date').val(selected_date);
                $('#user_time').val($(element).data('actual_timing'));
                $('#attendance_user').val(currentlySelectedUser);
                $('#regularization_type').val("MOP");
                $('#timing_label_suffix').html('( MOP )');
                //$('#')

            }

            // $('#regularizationModal').addClass('fade');
        }

        function attendanceRegularize() {


            console.log("Attendance user : " + $('#attendance_user').val());

            // body...
            console.log($('#regularizationForm').serialize());

            $.ajax({
                url: "{{ route('attendance-req-regularization') }}",
                type: "POST",
                data: $('#regularizationForm').serialize(),
                success: function(data) {
                    console.log(data);


                    //Change the LC button to 'Applied' status


                    //alert(data.message);
                    Swal.fire({
                        title: "Info",
                        text: data.message,
                        type: data.status
                    }).then(function() {
                        // location.reload();
                    });
                    $('#regularizationModal').fadeOut(400);
                    //update sidepanel

                    //Update the calendar for this user
                    ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, $('#attendance_user').val());

                }
            });
        }


        $('.modal-close').click(function() {
            $('#regularizationModal').fadeOut(0);



        })

        function generate_year_range(start, end) {
            var years = "";
            for (var year = start; year <= end; year++) {
                years += "<option value='" + year + "'>" + year + "</option>";
            }
            return years;
        }


        //selectMonth = document.getElementById("_month");


        createYear = generate_year_range(1970, 2050);
        /** or
         * createYear = generate_year_range( 1970, currentYear );
         */

        //document.getElementById("_year").innerHTML = createYear;

        var calendar = document.getElementById("_calendar");
        var lang = calendar.getAttribute('data-lang');

        var months = "";
        var days = "";


        var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];

        var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        if (lang == "en") {
            months = monthDefault;
            days = dayDefault;
        } else {
            months = monthDefault;
            days = dayDefault;
        }


        var $dataHead = "<tr>";
        for (dhead in days) {
            $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
        }
        $dataHead += "</tr>";

        //alert($dataHead);
        document.getElementById("_thead-month").innerHTML = $dataHead;


        monthAndYear = document.getElementById("_monthAndYear");
        //showCalendar(currentMonth, currentYear);



        function next() {
            currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
            currentMonth = (currentMonth + 1) % 12;
            //showCalendar(currentMonth, currentYear);
            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, currentlySelectedUser);
        }

        function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            //showCalendar(currentMonth, currentYear);
            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, currentlySelectedUser);

        }

        function jump() {
            currentYear = parseInt(selectYear.value);
            //currentMonth = parseInt(selectMonth.value);
            //showCalendar(currentMonth, currentYear);
            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentYear, currentlySelectedUser);

        }

        function showCalendar(month, year, ajax_monthly_data) {



            var firstDay = (new Date(year, month)).getDay();

            tbl = document.getElementById("_calendar-body");


            tbl.innerHTML = "";


            monthAndYear.innerHTML = months[month] + " " + year;
            //selectYear.value = year;
            //selectMonth.value = month;

            // creating all cells
            var date = 1;
            //top to bottom

            for (var i = 0; i < 6; i++) {

                var row = document.createElement("tr");

                //left to right
                for (var j = 0; j < 7; j++) {

                    var isWeekEnd = isWeekEndDays(date, month, year);


                    if (i === 0 && j < firstDay) {
                        cell = document.createElement("td");
                        // cell.setAttribute('class','p-0');
                        cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    } else if (date > daysInMonth(month, year)) {
                        break;
                    } else {
                        var dateText = "";

                        if (date < 10)
                            dateText = "0" + date;
                        else
                            dateText = "" + date;

                        cell = document.createElement("td");
                        cell.setAttribute("data-date", dateText);
                        cell.setAttribute("data-month", month + 1);
                        cell.setAttribute("data-year", year);

                        cell.setAttribute("data-month_name", months[month]);
                        cell.className = "_date-picker p-0";


                        if (isWeekEnd) {
                            cell.innerHTML =
                                " <div class='w-100 h-100 p-2' style='background-color:#e7e7e7;'> <span class='show_date' >" +
                                date +
                                "</span> <span>Week Off </span> <div class='d-flex mt-2 flex-column bio_check align-items-start' > <div class='check-in f-10 text-success w-100 d-flex justify-content-between'> </div> <div class='w-100 d-flex justify-content-between check-out mt-2 f-10 text-danger'> </div></div></div>";

                        } else {

                            let processedMonth = month + 1;

                            if (processedMonth < 10) {
                                // console.log("Month is less than 10 : "+month+". Adding '0' as prefix");
                                processedMonth = "0" + processedMonth;
                                // console.log("Processed month value : "+processedMonth);
                                // return ;
                            }

                            let currentDate = year + "-" + processedMonth + "-" + dateText;

                            let ajax_data_currentdate = ajax_monthly_data[currentDate];
                            //console.log("testing " + currentDate);
                            let todayDate = new Date().toISOString().slice(0, 10)
                            //console.log("today" + todayDate);

                            if (ajax_data_currentdate) {

                                if (ajax_data_currentdate.isAbsent) {
                                    if (todayDate > currentDate) {

                                        cell.innerHTML = " <div class='w-100 h-100 p-2'><p class='show_date' >" + date +
                                                "</p>  <div class='d-flex mt-2 flex-column bio_check align-items-start'><div class='w-100 d-flex  check-out mt-2 f-10 text-danger'><span class='f-11' id='checkout_time_" +
                                                year + "-" + (month + 1) + "-" + dateText +
                                                "'>Absent <br><span style='color:black;font-size:10px;text-align:center;margin-left:5px' id='statement'></span></span>";

                                        // if (ajax_data_currentdate.absent_status == "Not Applied")
                                        // {
                                        //     cell.innerHTML = cell.innerHTML + "<span>Leave Applied</span>";
                                        //     $("#statement").html(" Leave Not Applied")

                                        // }
                                        // else
                                        if (ajax_data_currentdate.absent_status == "Pending")
                                        {
                                            // $("#statement").attr("src","{{ URL::asset($svg_icon_pending) }}")
                                            cell.innerHTML = cell.innerHTML + "<span style='position: relative;top: -30px; left: -15px;font-weight: 700;color: #b2b223;'>Approval Pending</span>";
                                            // $("#statement").html("Leave Pending ")

                                        }
                                        else
                                        if (ajax_data_currentdate.absent_status == "Rejected")
                                        {
                                            cell.innerHTML = cell.innerHTML + "<span style='position: relative;top: -30px; left: -20px;font-weight: 700;'>Leave Rejected</span>";
                                            // $("#statement").html("Leave Rejected ")
                                            // $("#statement").attr("src","{{ URL::asset($svg_icon_rejected) }}")

                                        }
                                        else
                                        if (ajax_data_currentdate.absent_status == "Revoked")
                                        {
                                            cell.innerHTML = cell.innerHTML + "<span>Revoked</span>";
                                            // $("#statement").html("Leave Revoked ")

                                        }
                                        else
                                        if (ajax_data_currentdate.absent_status == "Approved")
                                        {
                                            cell.innerHTML = cell.innerHTML + "<span style='position: relative;top: -30px; left: -17px;font-weight: 700;color: green;'>Leave Approved</span>";
                                            // $("#statement").attr("src","{{ URL::asset($svg_icon_approved) }}")

                                            // $("#statement").html("Leave Approved ")
                                        }
                                        // else
                                        // {
                                        //     cell.innerHTML = cell.innerHTML + "<span>ERROR!</span>";
                                        //     $("#statement").html("ERROR ")
                                        // }
                                    } else {
                                        cell.innerHTML = " <div class='w-100 h-100 p-2'><p class='show_date' >" + date +
                                            "</p>  </div>"

                                    }



                                } else {
                                    let final_checkin_button_code = "";
                                    let final_checkout_button_code = "";
                                    let final_checkin_time = ajax_data_currentdate.checkin_time ?? "";
                                    let ui_final_checkin_time = final_checkin_time == "" ? "--:--:--" : moment(
                                        final_checkin_time, ["HH:mm"]).format('h:mm a');

                                    if (ajax_data_currentdate.lc_status == "Approved" || ajax_data_currentdate.mip_status ==
                                        "Approved")
                                        final_checkin_time == "" ? "--:--:--" : moment(final_checkin_time, ["HH:mm"])
                                        .format('h:mm a');

                                    let final_checkout_time = ajax_data_currentdate.checkout_time ?? "";
                                    let ui_final_checkout_time = final_checkout_time == "" ? "--:--:--" : moment(
                                        final_checkout_time, ["HH:mm"]).format('h:mm a');

                                    //If not absent, show the dates
                                    let html_LC_Status = ajax_data_currentdate.isLC ?
                                        "<img src='{{ URL::asset($svg_icon_pending) }}' class='calendar_icon'>" : "";

                                    let html_LC_Button =
                                        "<input type='button' onclick ='showRegularizationModal(this)' title='Late Coming' class='f-10 btn-primary bn ms-2 lc_btn border-0 p-1 text-white' data-userid='" +
                                        ajax_data_currentdate.user_id + "' data-applystatus='" + ajax_data_currentdate
                                        .lc_status + "' data-currentdate='" + currentDate + "' data-checkintime='" +
                                        final_checkin_time + "' value='LC' />&nbsp;&nbsp;";

                                    let html_MIP_Button =
                                        "<input type='button' onclick ='showRegularizationModal(this)' title='Missed In Punch' class='f-10 btn-primary bn ms-2 lc_btn border-0 p-1 text-white' data-userid='" +
                                        ajax_data_currentdate.user_id + "' data-applystatus='" + ajax_data_currentdate
                                        .mip_status + "' data-currentdate='" + currentDate + "' value='MIP' />&nbsp;&nbsp;";

                                    let html_EG_Button =
                                        "<input type='button' onclick ='showRegularizationModal(this)' title='Early Going' class='f-10 btn-orange bn ms-2 lc_btn border-0 p-1 text-white' data-userid='" +
                                        ajax_data_currentdate.user_id + "' data-applystatus='" + ajax_data_currentdate
                                        .eg_status + "' data-currentdate='" + currentDate + "' data-checkouttime='" +
                                        final_checkout_time + "' value='EG'/>&nbsp;&nbsp;";

                                    let html_MOP_Button =
                                        "<input type='button' onclick ='showRegularizationModal(this)' title='Missed Out Punch'  class='f-10 btn-orange bn ms-2 lc_btn border-0 p-1 text-white ' data-userid='" +
                                        ajax_data_currentdate.user_id + "' data-applystatus='" + ajax_data_currentdate
                                        .mop_status + "' data-currentdate='" + currentDate + "' value='MOP' />&nbsp;&nbsp;";




                                    if (ajax_data_currentdate.isLC) {
                                        final_checkin_button_code = html_LC_Button + getStatusIcon(ajax_data_currentdate
                                            .lc_status);
                                    } else
                                    if (ajax_data_currentdate.isMIP) {
                                        final_checkin_button_code = html_MIP_Button + getStatusIcon(ajax_data_currentdate
                                            .mip_status);
                                    }

                                    if (ajax_data_currentdate.isEG) {
                                        final_checkout_button_code = html_EG_Button + getStatusIcon(ajax_data_currentdate
                                            .eg_status);
                                    } else
                                    if (ajax_data_currentdate.isMOP) {
                                        final_checkout_button_code = html_MOP_Button + getStatusIcon(ajax_data_currentdate
                                            .mop_status);
                                    }


                                    cell.innerHTML = " <div class='w-100 h-100 p-2'><p class='show_date' >" + date +

                                        "</p>  <div class='d-flex mt-2 flex-column bio_check align-items-center' > <div class='check-in f-10 text-success w-100 d-flex align-items-center justify-content-start'><i class='fa fa-arrow-down me-1' style='transform: rotate(-45deg);'></i><span class='f-11' id='checkin_time_" +
                                        year + "-" + processedMonth + "-" + dateText + "'>" + ui_final_checkin_time +
                                        getAttendanceModeIcon(ajax_data_currentdate.attendance_mode_checkin) +
                                        "</span>" +
                                        final_checkin_button_code +
                                        "</div> <div class='w-100 d-flex align-items-center justify-content-start  check-out mt-2 f-10 text-danger'><i class='fa fa-arrow-down me-1' style='transform: rotate(230deg);'></i><span class='f-11' id='checkout_time_" +
                                        year + "-" + processedMonth + "-" + dateText + "'>" + ui_final_checkout_time +
                                        getAttendanceModeIcon(ajax_data_currentdate.attendance_mode_checkout) +
                                        "</span>" +
                                        final_checkout_button_code +
                                        "</div></div></div>";
                                }
                            }

                        }



                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            cell.className = "_date-picker selected";
                        }

                        row.appendChild(cell);
                        date++;
                    }


                }

                tbl.appendChild(row);
            }

        }

        function getAttendanceModeIcon(attendance_mode) {
            console.log("Attendance mode : " + attendance_mode);

            if (attendance_mode == "biometric")
                // return '&nbsp;<i class="fa-solid fa-fingerprint"></i>';
                return '&nbsp;<i class="fas fa-fingerprint"></i>';
            else
            if (attendance_mode == "web")
                return '&nbsp;<i class="fa fa-laptop"></i>';
            else
            if (attendance_mode == "mobile")
                return '&nbsp;<i class="fa fa-mobile-phone"></i>';
            else
                return ''; // when attendance_mode column is empty.


        }

        function getStatusIcon(status) {
            if (status == "None") {
                // return "<img src='{{ URL::asset($svg_icon_notApplied) }}' alt='Not Applied' class='calendar_icon' title='Not Applied'>";
                return " <i class='fa fa-exclamation-circle fs-15 text-warning me-2' title='Not Applied'></i>";

            } else
            if (status == "Pending") {
                // return "<img src='{{ URL::asset($svg_icon_pending) }}' alt='Pending' title='Pending' class='calendar_icon'>";
                return "<i class= 'fa fa-question-circle text-secondary me-2 fs-15 ' title='Pending'  ></i>";

            } else
            if (status == "Approved") {
                // return "<img src='{{ URL::asset($svg_icon_approved) }}' alt='Approved' title='Approved' class='calendar_icon'>";
                return "<i class='fa fa-check-circle text-success fs-15'  title='Approved'></i>";

            } else
            if (status == "Rejected") {
                // return "<img src='{{ URL::asset($svg_icon_rejected) }}' alt='Rejected' title='rejected' text='Rejected' class='calendar_icon'>";
            }  return "<i class='fa fa-times-circle text-danger fs-15'  title='rejected'></i>";
        }

        function daysInMonth(iMonth, iYear) {
            return 32 - new Date(iYear, iMonth, 32).getDate();
        }

        function isWeekEndDays(iDay, iMonth, iYear) {
            var dayValue = (new Date(iYear, iMonth, iDay)).getDay();
            if (dayValue == 0) {
                return true;
            } else {
                return false;
            }
        }



        // for filter
        $(document).ready(function() {
            $("#searchInput_box").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#sidepanel_employees_list li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('body').on('click', '.list_employee_attendance ', function() {
                $('.list_employee_attendance ').removeClass('active');
                $(this).addClass('active');



            });




        });
    </script>
@endsection
