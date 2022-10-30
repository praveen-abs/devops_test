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

        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-3">
                        <h6>Attendance Report</h6>
                    </div>

                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 mb-3">
                        <div class="calender-mid_content">
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 mb-2 b-line">
                                    <p class="text-muted fw-normal f-18"><i class="fa fa-calendar me-2"
                                            aria-hidden="true"></i>
                                        <span class="dates ">Oct 15,2022</span>
                                    </p>
                                </div>
                                <div class="col-sm-5 col-md-5 col-xl-5 col-lg-5 col-xxl-5 mb-2 b-line">

                                    <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                                        {{-- <li class="nav-item active ember-view mx-4" role="presentation">
                                            <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill"
                                                href="" data-bs-target="#attendanceDay_tab" role="tab"
                                                aria-controls="pills-home" aria-selected="true">
                                                Day</a>
                                        </li>
                                        <li class="nav-item mx-4 ember-view" role="presentation ">
                                            <a class="nav-link ember-view" id="payslips-tab" data-bs-toggle="pill"
                                                data-bs-target="#attendanceWeek_tab" type="button" role="tab"
                                                aria-controls="payslips" aria-selected="false">Week</a>
                                        </li> --}}
                                        <li class="nav-item mx-4  ember-view" role="presentation ">
                                            <a class="nav-link active ember-view" id="annual-earnings-tab" data-bs-toggle="pill"
                                                data-bs-target="#attendanceMonth_tab" type="button" role="tab"
                                                aria-controls="annual-earnings" aria-selected="false">Month</a>
                                        </li>

                                    </ul>

                                </div>
                                <div class="col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4 mb-2 b-line">
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



                    <div class="col-sm-12 col-md-12 col-xl-3 col-lg-3 col-xxl-3 mb-3">
                        <div class="search-content ms-2  mb-3">
                            <i class=" ri-search-line "></i>
                            <input type="text" class="search-bar form-control w-100 py-1 rounded" placeholder="Search">
                        </div>

                        <div class="showEmployee_attendance">
                            <ul class="list-unstyled ">
                                <li class="list_employee_attendance p-2 w-100">

                                    <div class="d-flex">
                                        <div
                                            class="user_pic me-3 d-flex justify-content-center align-items-center bg-primary rounded-circle">
                                            <span class="text-white">Pr</span>
                                        </div>

                                        <div class="user_content d-flex  align-items-center flex-column">
                                            <p class="fw-bold text-primary f-15">Praveen</p>
                                            <p class=" text-muted f-12">Full stack developer</p>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-9 col-lg-9 col-xxl-9 ">
                        <div class="tab-content" id="pills-tabContent">
                            {{-- <div class="tab-pane fade show active" id="attendanceDay_tab" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="zp-container bg-white nav-tab-body-top">
                                    <div class="fill body content scroll-x scroll-y salary-details-container">
                                        <div class="ytd-chart-section ytd-summary-column">
                                            <div class="ytd-chart">
                                                <div id="ember142" class="ember-view">
                                                    <svg style="width:100%;height:400px" viewBox="0 0 900 300"
                                                        preserveAspectRatio="xMinYMid meet">
                                                        <g id="points">
                                                            <rect width="250" height="50" x="60"
                                                                style="fill: rgb(239 176 169);" />
                                                        </g>
                                                        <g class="line-container" transform="translate(75, 10)">
                                                            <g class="line-paths">
                                                                <path class="line-path" d="M72,0Z"
                                                                    style="stroke: rgb(32, 142, 255); stroke-width: 3px; fill: none;">
                                                                </path>
                                                                <path class="area-path" d="M72,0ZL72,247ZZ"
                                                                    style="fill: rgb(248, 251, 255);"></path>
                                                            </g>

                                                            <g class="x-axis" transform="translate(0,250)">
                                                                <g class="tick" transform="translate(0,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-0 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">8 AM</tspan>

                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(72,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-1 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">9 AM</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(147,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-2 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">10 AM</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(219,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-3 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">11 AM</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(294,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-4 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">12 AM</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(369,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-5 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">1 Pm</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(441,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-6 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">2 Pm</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(516,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-7 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">3 Pm</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(588,0)"
                                                                    style="opacity: 1;">
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">4 Pm</tspan>
                                                                    </text>
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-8 cursor-pointer">
                                                                    </line>
                                                                </g>
                                                                <g class="tick" transform="translate(663,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-9 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">5 Pm</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(738,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-10 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">6 Pm</tspan>
                                                                    </text>
                                                                </g>
                                                                <g class="tick" transform="translate(805,0)"
                                                                    style="opacity: 1;">
                                                                    <line y2="-280" y1="60" x2="0"
                                                                        class="line line-11 cursor-pointer">
                                                                    </line>
                                                                    <text dy="0" y="-310" x="0"
                                                                        style="text-anchor: middle;">
                                                                        <tspan style="font-size: 12px;">7 Pm</tspan>
                                                                    </text>
                                                                </g>
                                                                <path class="domain" d="M0,-250V0H805V-250"></path>
                                                            </g>

                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="tab-pane fade" id="attendanceWeek_tab" role="tabpanel"
                                aria-labelledby="pills-profile-tab">



                            </div> --}}
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
                                    <div class="col-6"><span class="text-ash-medium fs-15">27-10-2022,Monday</span></div>
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
                                    <div class="col-6"><label class="text-ash-medium fs-15">Regularize Timing as</label>
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
        function showReasonBox(selected) {

            if (selected.value > 0) {
                document.getElementById('reasonBox').style.display = "block";
            } else {
                document.getElementById('reasonBox').style.display = "none";
            }

        }



        function generate_year_range(start, end) {
            var years = "";
            for (var year = start; year <= end; year++) {
                years += "<option value='" + year + "'>" + year + "</option>";
            }
            return years;
        }

        today = new Date();
        currentMonth = today.getMonth();
        currentYear = today.getFullYear();
        selectYear = document.getElementById("_year");
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
        } else if (lang == "id") {
            months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
                "November", "Desember"
            ];
            days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
        } else if (lang == "fr") {
            months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre",
                "Novembre", "Décembre"
            ];
            days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
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
        showCalendar(currentMonth, currentYear);



        function next() {
            currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
            currentMonth = (currentMonth + 1) % 12;
            showCalendar(currentMonth, currentYear);
        }

        function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            showCalendar(currentMonth, currentYear);
        }

        function jump() {
            currentYear = parseInt(selectYear.value);
            //currentMonth = parseInt(selectMonth.value);
            showCalendar(currentMonth, currentYear);
        }

        function showCalendar(month, year) {

            var firstDay = (new Date(year, month)).getDay();

            tbl = document.getElementById("_calendar-body");


            tbl.innerHTML = "";


            monthAndYear.innerHTML = months[month] + " " + year;
            //selectYear.value = year;
            //selectMonth.value = month;

            // creating all cells
            var date = 1;
            for (var i = 0; i < 6; i++) {

                var row = document.createElement("tr");


                for (var j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        cell = document.createElement("td");
                        cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    } else if (date > daysInMonth(month, year)) {
                        break;
                    } else {
                        cell = document.createElement("td");
                        cell.setAttribute("data-date", date);
                        cell.setAttribute("data-month", month + 1);
                        cell.setAttribute("data-year", year);

                        cell.setAttribute("data-month_name", months[month]);
                        cell.className = "_date-picker";
                        cell.innerHTML = " <div class='w-100 h-100'> <p class='show_date' >" + date +
                            "</p>  <div class='d-flex mt-3 flex-column bio_check align-items-start' > <span class='check-in f-10 text-success'><i class='fa fa-arrow-down' style='transform: rotate(-45deg);'></i>  8:00 AM </span> <span class='check-out f-10 text-danger'><i class='fa fa-arrow-down' style='transform: rotate(230deg);'></i>7:00 PM </span></div>   </div>";






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

        function daysInMonth(iMonth, iYear) {
            return 32 - new Date(iYear, iMonth, 32).getDate();
        }
    </script>
@endsection
