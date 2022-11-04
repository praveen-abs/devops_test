@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/calendar-vanila.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/attendance_calendar.css') }}">
@endsection
@section('content')
    @component('components.attendance_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent

    <div class="leave_calendar-wrapper">

        <button type="button" class="btn btn-orange" data-bs-target="#newClient" data-bs-toggle="modal">Apply Request</button>

        <div class="card mb-3">
            <div class="card-body py-1">
                <div class="row">
                    {{-- <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-3">
                        <h6>Timesheet</h6>
                    </div> --}}

                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 ">
                        <div class="calender-mid_content">
                            <div class="row ">
                                <div class=" col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3  ">
                                    <p class="text-muted fw-normal f-18"><i class="fa fa-calendar me-2"
                                            aria-hidden="true"></i>
                                        <span class="dates ">Oct 15,2022</span>
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
                                        <li class="nav-item mx-2 ember-view" role="presentation ">
                                            <a class="nav-link ember-view" id="tab_teamtimesheet" data-bs-toggle="pill"
                                                data-bs-target="#" type="button" role="tab" aria-controls="payslips"
                                                aria-selected="false">Team Timesheet</a>
                                        </li>
                                        <li class="nav-item ml-2  ember-view" role="presentation ">
                                            <a class="nav-link ember-view" id="tab_orgtimesheet" data-bs-toggle="pill"
                                                data-bs-target="#" type="button" role="tab"
                                                aria-controls="annual-earnings" aria-selected="false">Org Timesheet</a>
                                        </li>

                                    </ul>

                                </div>
                                <div class=" col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4 ">
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown topbar-user me-2">
                                            <button type="button" class="btn bg-primary text-white show"
                                                id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                <div class="d-flex align-items-center page-header-user-dropdown">
                                                    {{-- <i class="fa fa-file me-2" aria-hidden="true"></i> --}}
                                                    <span class="f-12 mx-2 d-flex align-items-center">
                                                        Department
                                                        <span
                                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                                        <i class="fa fa-caret-down ms-2" aria-hidden="true"></i>
                                                    </span>

                                                </div>
                                            </button>
                                            <div class="dropdown-menu  dropdown-menu-end  justify-content-center"
                                                data-popper-placement="bottom-end"
                                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-4px, 40px);min-width:130px;">
                                                <!-- item-->

                                            </div>
                                        </div>
                                        <div class="dropdown topbar-user ">
                                            <button type="button" class="btn bg-primary text-white show"
                                                id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                <div class="d-flex align-items-center page-header-user-dropdown">

                                                    <i class="fa fa-file me-2" aria-hidden="true"></i>
                                                    <span class="f-12 mx-2 d-flex align-items-center">
                                                        Export
                                                        <span
                                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"></span>
                                                        <i class="fa fa-caret-down ms-2" aria-hidden="true"></i>
                                                    </span>

                                                </div>
                                            </button>
                                            <div class="dropdown-menu  dropdown-menu-end  justify-content-center"
                                                data-popper-placement="bottom-end"
                                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-4px, 40px);min-width:130px;">
                                                <!-- item-->
                                                <div class="px-3 py-0 d-flex">
                                                    <a class="text-muted "><i class="fa fa-file-excel-o me-2"
                                                            aria-hidden="true"></i>Excel</a>
                                                    <a class="text-muted "><i class="fa fa-file-pdf-o me-2"
                                                            aria-hidden="true"></i>Pdf</a>
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
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-3 col-lg-3 col-xxl-3 mb-3">
                <div class="card mb-0" style="max-height:660px;min-height:660px;overflow-x:auto;">
                    <div class="card-body">
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
            <div class="col-sm-12 col-md-12 col-xl-9 col-lg-9 col-xxl-9 ">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show active fade" id="attendanceMonth_tab" role="tabpanel"
                        aria-labelledby="pills-contact-tab">
                        <div class="calendar-wrapper  box_shadow_0 card mb-0 border-0">
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


        <div class="modal fade " id="newClient" tabindex="-1" aria-labelledby="newInventry" aria-modal="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                <div class="modal-content top-line">
                    <div class="modal-header border-0 py-2">
                        <h6 class="modal-title" id="exampleModalLabel">Attendance Regularization</h6>
                        <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal"
                            aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-6"><label class="text-ash-medium fs-15">Date</label></div>
                                    <div class="col-6"><span class="text-ash-medium fs-15">27-10-2022,Monday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-6"><label class="text-ash-medium fs-15">Actual Timing (Late
                                            Arrival)</label></div>
                                    <div class="col-6"><span class="text-ash-medium fs-15">8:10</span></div>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-6"><label class="text-ash-medium fs-15">Regularize Timing
                                            as</label>
                                    </div>
                                    <div class="col-6"><span class="text-ash-medium fs-15">8:10</span></div>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-6"><label class="text-ash-medium fs-15">Reason</label></div>
                                    <div class="col-6"> <select class="form-select btn-line-primary" id=""
                                            onchange="showReasonBox(this)">
                                            <option selected hidden disabled>Choose Reason</option>
                                            <option value="0"></option>
                                            <option value="1">Reason</option>
                                            <option value="2">Others</option>

                                        </select></div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="" id="reasonBox" cols="30" rows="3" class="form-control "
                                            placeholder="Reason here...." style="display:none"></textarea>
                                    </div>



                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer border-0 py-2">

                        <button type="button" class="btn btn-orange">Apply Request</button>
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
        var currentlySelectedUser = 0;




        function ajaxGetMonthlyDate_TimeSheet(selectedMonth, selectedUserID) {
            $.ajax({
                url: "{{ route('fetch-attendance-user-timesheet') }}",
                type: "GET",
                data: {
                    month: selectedMonth + 1,
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

                    showCalendar(selectedMonth, '2022', data);

                }
            });
        }

        function ajaxGetTeamMembersDetails(user_code) {
            $.ajax({
                url: "{{ route('fetch-attendance-team-timesheet') }}",
                type: "GET",
                data: {
                    user_code: user_code,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);

                    //update sidepanel
                    $('#sidepanel_employees_list').html('');

                    data.forEach((element) => {

                        var html = '<li class="list_employee_attendance p-2 w-100" >' +
                            '<div class="d-flex employee_list_item" data-userid=' + element.id + '>' +
                            '<div class="user_pic me-3 d-flex justify-content-center align-items-center bg-primary rounded-circle">' +
                            '<span class="text-white">Pr</span>' +
                            '</div>' +
                            '<div class="user_content d-flex  align-items-center flex-column">' +
                            '<p class="fw-bold text-primary f-15">' + element.name + '</p>' +
                            '<p class=" text-muted f-12">' + element.designation + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</li>';

                        $('#sidepanel_employees_list').append(html);

                    });

                    tbl = document.getElementById("_calendar-body");
                    tbl.innerHTML = "";

                    //showCalendar(currentMonth, currentYear, data);
                    //when employee name selected, update the calendar
                    $('.employee_list_item').click(function() {
                        currentlySelectedUser = $(this).attr('data-userid');
                        console.log("currentlySelectedUser : " + currentlySelectedUser);
                        ajaxGetMonthlyDate_TimeSheet(currentMonth, currentlySelectedUser);

                    });

                }
            });
        }

        function ajaxGetOrgMembersDetails() {
            $.ajax({
                url: "{{ route('fetch-attendance-org-timesheet') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);

                    //update sidepanel
                    $('#sidepanel_employees_list').html('');

                    data.forEach((element) => {

                        var html = '<li class="list_employee_attendance p-2 w-100" >' +
                            '<div class="d-flex employee_list_item" data-userid=' + element.id + '>' +
                            '<div class="user_pic me-3 d-flex justify-content-center align-items-center bg-primary rounded-circle">' +
                            '<span class="text-white">Pr</span>' +
                            '</div>' +
                            '<div class="user_content d-flex  align-items-center flex-column">' +
                            '<p class="fw-bold text-primary f-15">' + element.name + '</p>' +
                            '<p class=" text-muted f-12">' + element.designation + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</li>';

                        $('#sidepanel_employees_list').append(html);

                    });

                    tbl = document.getElementById("_calendar-body");
                    tbl.innerHTML = "";
                    //showCalendar(currentMonth, currentYear, data);

                    //when employee name selected, update the calendar
                    $('.employee_list_item').click(function() {
                        currentlySelectedUser = $(this).attr('data-userid');
                        console.log("currentlySelectedUser : " + currentlySelectedUser);
                        ajaxGetMonthlyDate_TimeSheet(currentMonth, currentlySelectedUser);

                    });

                }
            });
        }

        function updateTimeSheetForCurrentEmployee() {

            //show the current user in sidepanel for TimeSheet tab
            $('#sidepanel_employees_list').html('');


            var html = '<li class="list_employee_attendance p-2 w-100" >' +
                '<div class="d-flex employee_list_item" onclick="" data-userid="{{ $current_employee_detail->id }}">' +
                '<div class="user_pic me-3 d-flex justify-content-center align-items-center bg-primary rounded-circle">' +
                '<span class="text-white">Pr</span>' +
                '</div>' +
                '<div class="user_content d-flex  align-items-center flex-column">' +
                '<p class="fw-bold text-primary f-15">{{ $current_employee_detail->name }}</p>' +
                '<p class=" text-muted f-12">{{ $current_employee_detail->designation }}</p>' +
                '</div>' +
                '</div>' +
                '</li>';

            $('#sidepanel_employees_list').append(html);

            //when employee name selected, update the calendar
            $('.employee_list_item').click(function() {
                console.log($(this).attr('data-userid'));

                ajaxGetMonthlyDate_TimeSheet(currentMonth, "{{ Auth::user()->id }}");


            });

        }



        $(document).ready(function() {



            //For timesheet tab
            updateTimeSheetForCurrentEmployee();
            ajaxGetMonthlyDate_TimeSheet(currentMonth, {{ Auth::user()->id }});


            $('#tab_timesheet').click(function() {

                console.log("Timesheet");
                const d = new Date();

                var selectedMonth = d.getMonth();

                updateTimeSheetForCurrentEmployee();
                ajaxGetMonthlyDate_TimeSheet(currentMonth, {{ Auth::user()->id }});

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
                ajaxGetMonthlyDate_TimeSheet(currentMonth, currentlySelectedUser);


            });

        });



        function showReasonBox(selected) {

            if (selected.value > 0) {
                document.getElementById('reasonBox').style.display = "block";
            } else {
                document.getElementById('reasonBox').style.display = "none";
            }

        }

        function showRegularizationModal(element) {
            $('#newClient').show();
            $('#newClient').removeClass('fade');

            console.log("Showing modal");
        }

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
            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentlySelectedUser);
        }

        function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            //showCalendar(currentMonth, currentYear);
            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentlySelectedUser);

        }

        function jump() {
            currentYear = parseInt(selectYear.value);
            //currentMonth = parseInt(selectMonth.value);
            //showCalendar(currentMonth, currentYear);
            ajaxGetMonthlyDate_TimeSheet(currentMonth, currentlySelectedUser);

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
                    if (i === 0 && j < firstDay) {
                        cell = document.createElement("td");
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
                        cell.className = "_date-picker";

                        //check if the user is 'late coming'
                        var arrival_time =


                            cell.innerHTML = " <div class='w-100 h-100'><p class='show_date' >" + date +
                            "</p>  <div class='d-flex mt-3 flex-column bio_check align-items-start' > <span class='check-in f-10 text-success'><i class='fa fa-arrow-down' style='transform: rotate(-45deg);'></i> <span id='checkin_time_" +
                            year + "-" + (month + 1) + "-" + dateText +
                            "'></span><input type='button' onclick ='showRegularizationModal(this)' value='R' data-cellid ='checkin_time_" +
                            year + "-" + (month + 1) + "-" + dateText +
                            "'/></span> <span class='check-out f-10 text-danger'><i class='fa fa-arrow-down' style='transform: rotate(230deg);'></i> <span id='checkout_time_" +
                            year + "-" + (month + 1) + "-" + dateText + "'></span></span></div></div>";

                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            cell.className = "_date-picker selected";
                        }
                        row.appendChild(cell);
                        date++;
                    }


                }

                tbl.appendChild(row);
            }

            ajax_monthly_data.forEach((element) => {
                //Get the date from the checkin time
                console.log(element);
                var calendar_cell_id = "";
                var calendar_cell_id_value = "";

                if (element.checkin_time) {
                    calendar_cell_id = element.checkin_time.split(" ")[0];
                    calendar_cell_id_value = element.checkin_time.split(" ")[1];
                    //Find the calendar cell ID based on above checkin date
                    $('#checkin_time_' + calendar_cell_id).html(calendar_cell_id_value);
                } else {
                    $('#checkin_time_' + calendar_cell_id).html('---');
                }

                if (element.checkout_time) {
                    calendar_cell_id = element.checkout_time.split(" ")[0];
                    calendar_cell_id_value = element.checkout_time.split(" ")[1];

                    //Find the calendar cell ID based on above checkin date
                    $('#checkout_time_' + calendar_cell_id).html(calendar_cell_id_value);
                    //checkin_time_2022-10-1
                } else {
                    $('#checkout_time_' + calendar_cell_id).html('---');
                }
            });

        }

        function daysInMonth(iMonth, iYear) {
            return 32 - new Date(iYear, iMonth, 32).getDate();
        }

        // for filter
        $(document).ready(function() {
            $("#searchInput_box").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#sidepanel_employees_list li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
