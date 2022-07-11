<!-- ========== App Menu ========== -->
<?php
    $logoObj = \DB::table('vmt_general_info')->first();

    if($logoObj){
        $logoSrc = $logoObj->logo_img;
    }else{
        $logoSrc = 'assets/images/vasa.jpg';
    }
    //dd($logoSrc);
?>



<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box ">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <!-- <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" height="22"> -->
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
            <span class="logo-lg">
                <!-- <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" height="80"> -->
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <!-- <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" height="22"> -->
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
            <span class="logo-lg">
                <!-- <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" height="80"> -->
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>

        <hr class="">
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <!-- <li class="menu-title"><span>@lang('translation.menu')</span></li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span >@lang('translation.dashboards')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link" >@lang('translation.analytics')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm" class="nav-link" >@lang('translation.crm')</a>
                            </li>
                            <li class="nav-item">
                                <a href="index" class="nav-link" >@lang('translation.ecommerce')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto" class="nav-link" >@lang('translation.crypto')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects" class="nav-link" >@lang('translation.projects')</a>
                            </li>
                        </ul>
                    </div>
                </li>  -->

                <!-- end Dashboard Menu -->
                <li class="nav-item">
                    @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin'))
                    <a class="nav-link menu-link" href="{{url('vmt_hr_dashboard')}}">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18.46 18.46">
                                <path id="bxs-dashboard"
                                    d="M5.526,14.756h6.153A1.026,1.026,0,0,0,12.7,13.73v-8.2A1.026,1.026,0,0,0,11.679,4.5H5.526A1.026,1.026,0,0,0,4.5,5.526v8.2A1.026,1.026,0,0,0,5.526,14.756ZM4.5,21.935A1.026,1.026,0,0,0,5.526,22.96h6.153A1.026,1.026,0,0,0,12.7,21.935v-4.1a1.026,1.026,0,0,0-1.026-1.026H5.526A1.026,1.026,0,0,0,4.5,17.832Zm10.256,0a1.026,1.026,0,0,0,1.026,1.026h6.153a1.026,1.026,0,0,0,1.026-1.026V14.756a1.026,1.026,0,0,0-1.026-1.026H15.781a1.026,1.026,0,0,0-1.026,1.026Zm1.026-10.256h6.153a1.026,1.026,0,0,0,1.026-1.026V5.526A1.026,1.026,0,0,0,21.935,4.5H15.781a1.026,1.026,0,0,0-1.026,1.026v5.128A1.026,1.026,0,0,0,15.781,11.679Z"
                                    transform="translate(-4.5 -4.5)" fill="#686363" />
                            </svg>
                        </i>
                        <span data-key="t-landing">Dashboard</span>
                    </a>
                    @else
                    <a class="nav-link menu-link" href="{{url('index')}}">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18.46 18.46">
                                <path id="bxs-dashboard"
                                    d="M5.526,14.756h6.153A1.026,1.026,0,0,0,12.7,13.73v-8.2A1.026,1.026,0,0,0,11.679,4.5H5.526A1.026,1.026,0,0,0,4.5,5.526v8.2A1.026,1.026,0,0,0,5.526,14.756ZM4.5,21.935A1.026,1.026,0,0,0,5.526,22.96h6.153A1.026,1.026,0,0,0,12.7,21.935v-4.1a1.026,1.026,0,0,0-1.026-1.026H5.526A1.026,1.026,0,0,0,4.5,17.832Zm10.256,0a1.026,1.026,0,0,0,1.026,1.026h6.153a1.026,1.026,0,0,0,1.026-1.026V14.756a1.026,1.026,0,0,0-1.026-1.026H15.781a1.026,1.026,0,0,0-1.026,1.026Zm1.026-10.256h6.153a1.026,1.026,0,0,0,1.026-1.026V5.526A1.026,1.026,0,0,0,21.935,4.5H15.781a1.026,1.026,0,0,0-1.026,1.026v5.128A1.026,1.026,0,0,0,15.781,11.679Z"
                                    transform="translate(-4.5 -4.5)" fill="#686363" />
                            </svg>
                        </i>
                        <span data-key="t-landing">Dashboard</span>
                    </a>
                    @endif
                </li>



                <!-- Navigation Menu for attendance-->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#attendanceDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="17.48" height="23.307"
                                viewBox="0 0 17.48 23.307">
                                <path id="clipboard-user-solid"
                                    d="M15.295,2.913H12.842a4.344,4.344,0,0,0-8.2,0H2.185A2.185,2.185,0,0,0,0,5.1V21.122a2.186,2.186,0,0,0,2.185,2.185h13.11a2.185,2.185,0,0,0,2.185-2.185V5.1A2.185,2.185,0,0,0,15.295,2.913Zm-6.555,0A1.457,1.457,0,1,1,7.283,4.37,1.457,1.457,0,0,1,8.74,2.913Zm0,5.827a2.913,2.913,0,1,1-2.913,2.913A2.913,2.913,0,0,1,8.74,8.74Zm4.37,11.653H4.37a.728.728,0,0,1-.728-.728,3.641,3.641,0,0,1,3.642-3.642H10.2a3.642,3.642,0,0,1,3.642,3.642A.73.73,0,0,1,13.11,20.393Z"
                                    fill="#686363" />
                            </svg></i>
                        <span>Attendance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="attendanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link py-1">Leave</a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link py-1" role="button"><span>Attendance
                                    </span></a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link py-1"
                                    role="button"><span>Timesheet</span></a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link py-1"
                                    role="button"><span>Performance</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link py-1" role="button"><span>Expenses &
                                        Trevel</span></a>
                            </li>


                        </ul>
                    </div>
                </li>


                <!-- Organization -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#orgDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">

                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22.04" height="17.142"
                                viewBox="0 0 22.04 17.142">
                                <path id="sitemap-solid"
                                    d="M7.959,33.837A1.837,1.837,0,0,1,9.8,32h2.449a1.837,1.837,0,0,1,1.837,1.837v2.449a1.837,1.837,0,0,1-1.837,1.837h-.306v1.531h5.816A2.144,2.144,0,0,1,19.9,41.8V43.02H20.2a1.837,1.837,0,0,1,1.837,1.837v2.449A1.837,1.837,0,0,1,20.2,49.142H17.754a1.837,1.837,0,0,1-1.837-1.837V44.856a1.837,1.837,0,0,1,1.837-1.837h.306V41.8a.307.307,0,0,0-.306-.306H11.938V43.02h.306a1.837,1.837,0,0,1,1.837,1.837v2.449a1.837,1.837,0,0,1-1.837,1.837H9.8a1.837,1.837,0,0,1-1.837-1.837V44.856A1.837,1.837,0,0,1,9.8,43.02H10.1V41.489H4.285a.307.307,0,0,0-.306.306V43.02h.306a1.837,1.837,0,0,1,1.837,1.837v2.449a1.837,1.837,0,0,1-1.837,1.837H1.837A1.837,1.837,0,0,1,0,47.305V44.856A1.837,1.837,0,0,1,1.837,43.02h.306V41.8a2.143,2.143,0,0,1,2.143-2.143H10.1V38.122H9.8a1.837,1.837,0,0,1-1.837-1.837Z"
                                    transform="translate(0 -32)" fill="#686363" />
                            </svg>
                        </i>

                        <span>Organization</span>
                    </a>
                    <div class="collapse menu-dropdown" id="orgDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{url('vmt-employess/directory')}}" id="" class="nav-link py-1"
                                    aria-expanded="false"><span>Dashboard</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt-employess/directory')}}" id="tds"
                                    class="nav-link py-1"><span>Directory </span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt-employee-hierarchy')}}" id="tds" class="nav-link py-1"><span>ORG
                                        structure</span></a>
                            </li>

                            <li class="nav-item ">
                                <a href="{{url('vmt_employeeOnboarding')}}" id="" class="nav-link py-1"
                                    aria-expanded="false"><span>Onboarding</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="" id="tds" class="nav-link py-1"><span>Exit</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="" id="tds" class="nav-link py-1"><span>Documents</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="" id="tds" class="nav-link py-1"><span>Assets</span></a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Performance -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#PerformanceDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">

                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22.058" height="12.253"
                                viewBox="0 0 22.058 12.253">
                                <path id="arrow-trend-up-solid"
                                    d="M14.705,98.451a1.225,1.225,0,0,1,0-2.451h6.127a1.224,1.224,0,0,1,1.225,1.225v6.127a1.225,1.225,0,0,1-2.451,0v-3.167l-6.487,6.483a1.223,1.223,0,0,1-1.731,0l-4.071-4.032-5.226,5.258a1.225,1.225,0,0,1-1.733-1.731l6.128-6.127a1.223,1.223,0,0,1,1.731,0l4.036,4.032,5.618-5.652Z"
                                    transform="translate(0 -96)" fill="#686363" />
                            </svg>
                        </i>


                        <span>Performance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="PerformanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt-pms-assigngoals')}}"
                                    class="nav-link py-1"><span>Dashboard</span></a>
                            </li>

                            @can('360_Degree_Review')
                            <li class="nav-item">
                                <a href="{{url('vmt_360review')}}" class="nav-link py-1" role="button"><span>360 Degree
                                        Review</span></a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <!-- team -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#teamDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22.058" height="15.44"
                                viewBox="0 0 22.058 15.44">
                                <path id="people-group-solid"
                                    d="M6.342,33.93A1.93,1.93,0,1,1,4.412,32,1.931,1.931,0,0,1,6.342,33.93Zm.841,3.733a4.954,4.954,0,0,0-1.668,3.712,4.768,4.768,0,0,0,1.1,3.119v.741a1.1,1.1,0,0,1-1.1,1.1H3.309a1.1,1.1,0,0,1-1.1-1.1v-.924A3.86,3.86,0,0,1,3.86,36.963h1.1a3.917,3.917,0,0,1,2.22.7Zm-4.977,1.7a2.2,2.2,0,0,0,0,2.916Zm13.235,5.869v-.741a4.963,4.963,0,0,0-.565-6.831,3.843,3.843,0,0,1,2.22-.7h1.1a3.86,3.86,0,0,1,1.654,7.348v.924a1.1,1.1,0,0,1-1.1,1.1H16.543A1.1,1.1,0,0,1,15.441,45.235Zm4.412-2.954a2.2,2.2,0,0,0,0-2.916Zm-.276-8.351A1.93,1.93,0,1,1,17.646,32,1.931,1.931,0,0,1,19.576,33.93Zm-10.753.276a2.206,2.206,0,1,1,2.206,2.206A2.207,2.207,0,0,1,8.823,34.206Zm6.617,7.169a3.862,3.862,0,0,1-2.206,3.488v1.475a1.1,1.1,0,0,1-1.1,1.1H9.926a1.1,1.1,0,0,1-1.1-1.1V44.862a3.86,3.86,0,0,1,1.654-7.348h1.1A3.858,3.858,0,0,1,15.441,41.375ZM8.823,42.832V39.917a2.2,2.2,0,0,0,0,2.916Zm4.412-2.916v2.916a2.2,2.2,0,0,0,0-2.916Z"
                                    transform="translate(0 -32)" fill="#686363" />
                            </svg>
                        </i>
                        <span>Team</span>
                    </a>
                    <div class="collapse menu-dropdown" id="teamDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('indexPerformanceDashboard')}}"
                                    class="nav-link py-1"><span>Summary</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_appraisalreview')}}" class="nav-link py-1"
                                    role="button"><span>Leave</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_appraisalreview')}}" class="nav-link py-1"
                                    role="button"><span>Attendance</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_appraisalreview')}}" class="nav-link py-1"
                                    role="button"><span>Expenses & Trevel</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_360review')}}" class="nav-link py-1"
                                    role="button"><span>Timesheet</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_360review')}}" class="nav-link py-1" role="button"><span>Profile
                                        change</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_360review')}}" class="nav-link py-1" role="button"><span>Salary on
                                        hold</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_360review')}}" class="nav-link py-1"
                                    role="button"><span>Performance</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- pay roll -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#payRollDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20.736" height="20.736"
                                viewBox="0 0 20.736 20.736">
                                <g id="Group_34191" data-name="Group 34191" transform="translate(-18 -625)">
                                    <path id="envelope-open-solid"
                                        d="M19.991,6.6c-1.008-.795-1.843-1.432-6.654-4.925C12.664,1.183,11.328,0,10.384,0h-.032C9.408,0,8.072,1.183,7.4,1.676,2.584,5.169,1.75,5.77.741,6.6A1.943,1.943,0,0,0,0,8.132v10.66a1.944,1.944,0,0,0,1.944,1.944H18.792a1.937,1.937,0,0,0,1.944-1.908V8.132A1.926,1.926,0,0,0,19.991,6.6ZM12.28,14.884a3.068,3.068,0,0,1-3.822,0L2.592,10.323V8.444C3.449,7.772,4.474,7,8.926,3.766c.129-.094.279-.21.445-.338.224-.17.665-.513,1-.721.332.208.775.551,1,.723.166.128.316.244.452.343,4.42,3.213,5.461,3.991,6.328,4.671V10.32Z"
                                        transform="translate(18 625)" fill="#686363" />
                                    <path id="bx-rupee"
                                        d="M13.792,6.871V6H9v.871h1.525a1.3,1.3,0,0,1,1.226.871H9v.871h2.751a1.3,1.3,0,0,1-1.226.871H9v1.052l2.433,2.433h1.232l-2.614-2.614h.473a2.181,2.181,0,0,0,2.134-1.742h1.133V7.742H12.658a2.149,2.149,0,0,0-.4-.871Z"
                                        transform="translate(16.972 625.883)" fill="#686363" />
                                </g>
                            </svg>
                        </i>


                        <span>Pay Roll</span>
                    </a>
                    <div class="collapse menu-dropdown" id="payRollDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{url('vmt_home')}}" class="nav-link py-1"
                                    role="button"><span>Dashboard</span></a>
                            </li>
                            @can('Team')
                            <li class="nav-item">
                                <a href="{{url('vmt_salary_details')}}" class="nav-link py-1" role="button"><span>Salary
                                        Details</span></a>
                            </li>
                            @endcan
                            @can('ORG')
                            <li class="nav-item">
                                <a href="{{url('vmt_investments')}}" class="nav-link py-1"
                                    role="button"><span>Investments</span></a>
                            </li>
                            @endcan
                            @can('360_Degree_Review')
                            <li class="nav-item">
                                <a href="{{url('vmt_form16')}}" class="nav-link py-1" role="button"><span>
                                        Form 16</span></a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <!-- pay check -->
                <li class="nav-item">
                    <a class="nav-link menu-link" id="employeeInfo" href="#paycheckDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="21.946" height="17.549"
                                viewBox="0 0 21.946 17.549">
                                <path id="money-bill-transfer-solid"
                                    d="M18.346.241a.788.788,0,0,1,1.135,0l2.195,2.194a.741.741,0,0,1,.271.582.645.645,0,0,1-.271.552L19.481,5.764a.745.745,0,0,1-1.135,0,.793.793,0,0,1,0-1.135l.792-.82h-5.97a.8.8,0,0,1-.823-.792.822.822,0,0,1,.823-.823l5.97-.031-.792-.759a.827.827,0,0,1,0-1.164ZM3.57,12.9l-.76.82,5.938-.031a.821.821,0,0,1,.823.823.787.787,0,0,1-.823.823l-5.938.031.76.789a.745.745,0,0,1,0,1.135.744.744,0,0,1-1.134,0L.241,15.092A.727.727,0,0,1,0,14.509a.808.808,0,0,1,.241-.552l2.195-2.195a.791.791,0,0,1,1.134,0,.745.745,0,0,1,0,1.135Zm-.309-10.7h8.326a1.723,1.723,0,0,0-.2.792A1.765,1.765,0,0,0,13.168,4.77H16.5a2.195,2.195,0,0,0,.97,1.468,2.138,2.138,0,0,0,.2.237,1.786,1.786,0,0,0,2.524,0l.658-.662v7.355a2.2,2.2,0,0,1-2.195,2.195h-8.3a1.856,1.856,0,0,0-1.612-2.637l-3.3.031a2.216,2.216,0,0,0-.97-1.437,2.138,2.138,0,0,0-.2-.237,1.785,1.785,0,0,0-2.523,0l-.69.662V4.389A2.214,2.214,0,0,1,3.261,2.195Zm0,4.389A2.177,2.177,0,0,0,5.456,4.389H3.261Zm15.393,6.584V10.973a2.2,2.2,0,0,0-2.195,2.195Zm-7.712-1.1A3.292,3.292,0,1,0,7.65,8.779,3.3,3.3,0,0,0,10.942,12.071Z"
                                    transform="translate(0 0)" fill="#686363" />
                            </svg>
                        </i>


                        <span>Paycheck</span>

                    </a>
                    <div class="collapse menu-dropdown" id="paycheckDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{url('vmt_home')}}" class="nav-link py-1"
                                    role="button"><span>Dashboard</span></a>
                            </li>
                            @can('Team')
                            <li class="nav-item">
                                <a href="{{url('vmt_salary_details')}}" class="nav-link py-1" role="button"><span>Salary
                                        Details</span></a>
                            </li>
                            @endcan
                            @can('ORG')
                            <li class="nav-item">
                                <a href="{{url('vmt_investments')}}" class="nav-link py-1"
                                    role="button"><span>Investments</span></a>
                            </li>
                            @endcan
                            @can('360_Degree_Review')
                            <li class="nav-item">
                                <a href="{{url('vmt_form16')}}" class="nav-link py-1" role="button"><span>
                                        Form 16</span></a>
                            </li>
                            @endcan
                        </ul>


                    </div>




                </li>
                <!-- claims -->
                <li class="nav-item">
                    <a class="nav-link menu-link" id="employeeInfo" href="#claimsDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="21.946" height="17.354"
                                viewBox="0 0 21.946 17.354">
                                <g id="Group_34184" data-name="Group 34184" transform="translate(-18 -404.98)">
                                    <path id="hand-holding-dollar-solid_1_" data-name="hand-holding-dollar-solid (1)"
                                        d="M21.763,12.881a1.528,1.528,0,0,0-2.142-.324l-4.585,3.377H10.417a.588.588,0,0,1-.578-.612.611.611,0,0,1,.578-.613h3a1.3,1.3,0,0,0,1.278-1.02,1.228,1.228,0,0,0-1.211-1.432H7.32a4.58,4.58,0,0,0-2.839,1.005L2.7,14.708.578,14.674A.646.646,0,0,0,0,15.321V19a.61.61,0,0,0,.578.614H13.835a4.014,4.014,0,0,0,2.363-.776C22.12,14.52,22.265,13.563,21.763,12.881Z"
                                        transform="translate(18 402.724)" fill="#686363" />
                                    <path id="bx-rupee"
                                        d="M13.792,6.871V6H9v.871h1.525a1.3,1.3,0,0,1,1.226.871H9v.871h2.751a1.3,1.3,0,0,1-1.226.871H9v1.052l2.433,2.433h1.232l-2.614-2.614h.473a2.181,2.181,0,0,0,2.134-1.742h1.133V7.742H12.658a2.149,2.149,0,0,0-.4-.871Z"
                                        transform="translate(17.577 398.98)" fill="#686363" />
                                </g>
                            </svg>
                        </i>

                        <span>Claims</span>

                    </a>
                    <div class="collapse menu-dropdown" id="claimsDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="#transitionDrop-Down" id="" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false"> Transaction</a>
                                <div class="collapse menu-dropdown" id="transitionDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('vmt-assign-roles')}}" class="nav-link">Employee
                                                Entry</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item tdItem">
                                <a href="#reportsDrop-Down" id="tds" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" class="nav-link">Reports</a>
                                <div class="collapse  menu-dropdown" id="reportsDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('vmt-assign-roles')}}" class="nav-link">Appraisal Reports</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('vmt-assign-roles')}}" class="nav-link">Appraisal Review
                                                Reports</a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>




                </li>


                <!-- reports -->
                <li class="nav-item">
                    <a class="nav-link menu-link" id="employeeInfo" href="#reportsDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.46" height="18.46"
                                viewBox="0 0 18.46 18.46">
                                <path id="flag-solid_1_" data-name="flag-solid (1)"
                                    d="M2.308,17.883a.58.58,0,0,1-.577.577H.577A.58.58,0,0,1,0,17.883V1.154a1.154,1.154,0,0,1,2.308,0ZM17.173,0a1.686,1.686,0,0,0-.7.153A9.327,9.327,0,0,1,12.589,1.16C10.427,1.16,9.171.011,6.68.011A11.134,11.134,0,0,0,3.461.568V13.205A10.225,10.225,0,0,1,6.521,12.7c2.655,0,4.5,1.146,7.161,1.146a10.684,10.684,0,0,0,4.006-.833,1.114,1.114,0,0,0,.773-1.036V1.108A1.162,1.162,0,0,0,17.173,0Z"
                                    fill="#686363" />
                            </svg>

                        </i>

                        <span>
                            Reports</span>

                    </a>
                    <div class="collapse menu-dropdown" id="reportsDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link py-1" role="button"><span>Leave
                                        Report</span></a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link py-1" role="button"><span>Attendance
                                        Report</span></a>
                            </li>
                        </ul>
                    </div>




                </li>

                <!-- help desk -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#helpDeskDrop-down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20.79" height="13.86"
                                viewBox="0 0 20.79 13.86">
                                <path id="ticket-solid"
                                    d="M4.62,67.465H16.17v6.93H4.62ZM18.48,64a2.311,2.311,0,0,1,2.31,2.31V69.2a1.732,1.732,0,0,0,0,3.465V75.55a2.312,2.312,0,0,1-2.31,2.31H2.31A2.311,2.311,0,0,1,0,75.55V72.662A1.733,1.733,0,0,0,1.732,70.93,1.733,1.733,0,0,0,0,69.2V66.31A2.31,2.31,0,0,1,2.31,64ZM3.465,74.395A1.154,1.154,0,0,0,4.62,75.55H16.17a1.154,1.154,0,0,0,1.155-1.155v-6.93A1.154,1.154,0,0,0,16.17,66.31H4.62a1.154,1.154,0,0,0-1.155,1.155Z"
                                    transform="translate(0 -64)" fill="#686363" />
                            </svg>
                        </i>

                        <span>Help Desk</span>
                    </a>
                    <div class="collapse menu-dropdown" id="helpDeskDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-calendar" class="nav-link">@lang('translation.calendar')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">@lang('translation.chat')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-mailbox" class="nav-link">@lang('translation.mailbox')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false"
                                    aria-controls="sidebarEcommerce">@lang('translation.ecommerce')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-products"
                                                class="nav-link">@lang('translation.products')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-product-details"
                                                class="nav-link">@lang('translation.product-Details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-add-product"
                                                class="nav-link">@lang('translation.create-product')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-orders"
                                                class="nav-link">@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-order-details"
                                                class="nav-link">@lang('translation.order-details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-customers"
                                                class="nav-link">@lang('translation.customers')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-cart"
                                                class="nav-link">@lang('translation.shopping-cart')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-checkout"
                                                class="nav-link">@lang('translation.checkout')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-sellers"
                                                class="nav-link">@lang('translation.sellers')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-seller-details"
                                                class="nav-link">@lang('translation.sellers-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProjects">@lang('translation.projects')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-projects-list" class="nav-link">@lang('translation.list')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-overview"
                                                class="nav-link">@lang('translation.overview')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create"
                                                class="nav-link">@lang('translation.create-project')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTasks">@lang('translation.tasks')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban"
                                                class="nav-link">@lang('translation.kanbanboard')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view"
                                                class="nav-link">@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details"
                                                class="nav-link">@lang('translation.task-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCRM">@lang('translation.crm')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts"
                                                class="nav-link">@lang('translation.contacts')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies"
                                                class="nav-link">@lang('translation.companies')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals" class="nav-link">@lang('translation.deals')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads" class="nav-link">@lang('translation.leads')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto">@lang('translation.crypto')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions"
                                                class="nav-link">@lang('translation.transactions')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell"
                                                class="nav-link">@lang('translation.buy-sell')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders"
                                                class="nav-link">@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet"
                                                class="nav-link">@lang('translation.my-wallet')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico" class="nav-link">@lang('translation.ico-list')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc"
                                                class="nav-link">@lang('translation.kyc-application')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarInvoices">@lang('translation.invoices')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list"
                                                class="nav-link">@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details"
                                                class="nav-link">@lang('translation.details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create"
                                                class="nav-link">@lang('translation.create-invoice')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false"
                                    aria-controls="sidebarTickets">@lang('translation.supprt-tickets')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list"
                                                class="nav-link">@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details"
                                                class="nav-link">@lang('translation.ticket-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#configDrop-down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20.736" height="22" viewBox="0 0 20.736 22">
                                <path id="gear-solid_1_" data-name="gear-solid (1)"
                                    d="M35.378,7.159a.975.975,0,0,1-.271,1.057L33.247,9.909a8.19,8.19,0,0,1,0,2.183l1.861,1.693a.975.975,0,0,1,.271,1.057,10.907,10.907,0,0,1-.675,1.474l-.2.348a11.321,11.321,0,0,1-.95,1.345A.983.983,0,0,1,32.5,18.3l-2.393-.765a9.4,9.4,0,0,1-1.891,1.1l-.537,2.454a1.03,1.03,0,0,1-.782.765,11.228,11.228,0,0,1-1.865.15,10.99,10.99,0,0,1-1.788-.15,1.03,1.03,0,0,1-.782-.765l-.537-2.454a8.445,8.445,0,0,1-1.891-1.1l-2.392.765a.981.981,0,0,1-1.053-.292,11.275,11.275,0,0,1-.95-1.345l-.2-.348a10.717,10.717,0,0,1-.678-1.474.976.976,0,0,1,.273-1.057l1.859-1.693a8.336,8.336,0,0,1,0-2.183L15.033,8.216a.974.974,0,0,1-.273-1.057,10.768,10.768,0,0,1,.678-1.474l.2-.348a11.131,11.131,0,0,1,.95-1.343A.976.976,0,0,1,17.643,3.7l2.392.763A8.263,8.263,0,0,1,21.925,3.37L22.462.917a.975.975,0,0,1,.782-.766,11.131,11.131,0,0,1,3.652,0,.975.975,0,0,1,.782.766l.537,2.454a9.175,9.175,0,0,1,1.891,1.094L32.5,3.7a.978.978,0,0,1,1.053.293,11.125,11.125,0,0,1,.95,1.343l.2.348a10.907,10.907,0,0,1,.675,1.474ZM25.07,14.437a3.457,3.457,0,1,0-3.438-3.476A3.445,3.445,0,0,0,25.07,14.437Z"
                                    transform="translate(-14.702)" fill="#686363" />
                            </svg>
                        </i>


                        <span>Configuration</span>
                    </a>
                    <div class="collapse menu-dropdown" id="configDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="layouts-horizontal" target="_blank"
                                    class="nav-link">@lang('translation.horizontal')</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-detached" target="_blank"
                                    class="nav-link">@lang('translation.detached')</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-two-column" target="_blank"
                                    class="nav-link">@lang('translation.two-column')</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-vertical-hovered" target="_blank"
                                    class="nav-link">@lang('translation.hovered')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- exit -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#exitDrop-down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20.227" height="17.699"
                                viewBox="0 0 20.227 17.699">
                                <path id="right-from-bracket-solid"
                                    d="M3.793,49.7H6.321a1.264,1.264,0,1,0,0-2.528H3.793a1.264,1.264,0,0,1-1.264-1.264V35.793a1.264,1.264,0,0,1,1.264-1.264H6.321a1.264,1.264,0,0,0,0-2.528H3.793A3.793,3.793,0,0,0,0,35.793V45.906A3.793,3.793,0,0,0,3.793,49.7Zm16.15-9.541L14.25,34.785a.949.949,0,0,0-1.6.69l0,2.844H7.589a1.265,1.265,0,0,0-1.265,1.264v2.528a1.265,1.265,0,0,0,1.265,1.264h5.057l0,2.809a.949.949,0,0,0,1.6.69L19.943,41.5A.935.935,0,0,0,19.943,40.158Z"
                                    transform="translate(0 -32)" fill="#686363" />
                            </svg>
                        </i>
                        <span>Exit</span>
                    </a>
                    <div class="collapse menu-dropdown" id="exitDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="" class="nav-link py-1"><span> Resignation Entry
                                    </span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="tds" class="nav-link py-1"><span>Resignation Status
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </li>




                <!-- end Dashboard Menu -->


                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('translation.pages')</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span >@lang('translation.authentication')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSignIn" >@lang('translation.signin')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signin-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSignUp" >@lang('translation.signup')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signup-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signup-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarResetPass" >@lang('translation.password-reset')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarResetPass">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarLockScreen" >@lang('translation.lock-screen')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-lockscreen-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-lockscreen-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarLogout" >@lang('translation.logout')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLogout">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-logout-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-logout-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSuccessMsg" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSuccessMsg" >@lang('translation.success-message')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-success-msg-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-success-msg-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTwoStep" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTwoStep" >@lang('translation.two-step-verification')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTwoStep">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-twostep-basic" class="nav-link" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-twostep-cover" class="nav-link" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarErrors" >@lang('translation.errors')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarErrors">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-404-basic" class="nav-link" >@lang('translation.404-basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-cover" class="nav-link" >@lang('translation.404-cover')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-alt" class="nav-link" >@lang('translation.404-alt')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-500" class="nav-link" >@lang('translation.500')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span >@lang('translation.pages')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="pages-starter" class="nav-link" >@lang('translation.starter')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProfile" >@lang('translation.profile')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProfile">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="pages-profile" class="nav-link" >@lang('translation.simple-page')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages-profile-settings" class="nav-link" >@lang('translation.settings')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="pages-team" class="nav-link" >@lang('translation.team')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-timeline" class="nav-link" >@lang('translation.timeline')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-faqs" class="nav-link" >@lang('translation.faqs')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-pricing" class="nav-link" >@lang('translation.pricing')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-gallery" class="nav-link" >@lang('translation.gallery')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-maintenance" class="nav-link" >@lang('translation.maintenance')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-coming-soon" class="nav-link" >@lang('translation.coming-soon')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-sitemap" class="nav-link" >@lang('translation.sitemap')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-search-results" class="nav-link" >@lang('translation.search-results')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" target="_blank" href="landing">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                        <span class="badge badge-pill bg-danger" >@lang('translation.new')</span>

                    </a>
                </li> -->

                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('translation.components')</span></li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span >@lang('translation.base-ui')</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-alerts" class="nav-link" >@lang('translation.alerts')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-badges" class="nav-link" >@lang('translation.badges')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-buttons" class="nav-link" >@lang('translation.buttons')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-colors" class="nav-link" >@lang('translation.colors')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-cards" class="nav-link" >@lang('translation.cards')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-carousel" class="nav-link" >@lang('translation.carousel')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-dropdowns" class="nav-link" >@lang('translation.dropdowns')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-grid" class="nav-link" >@lang('translation.grid')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-images" class="nav-link" >@lang('translation.images')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-tabs" class="nav-link" >@lang('translation.tabs')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-accordions" class="nav-link" >@lang('translation.accordion-collapse')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-modals" class="nav-link" >@lang('translation.modals')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-offcanvas" class="nav-link" >@lang('translation.offcanvas')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-placeholders" class="nav-link" >@lang('translation.placeholders')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-progress" class="nav-link" >@lang('translation.progress')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-notifications" class="nav-link" >@lang('translation.notifications')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-media" class="nav-link" >@lang('translation.media-object')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-embed-video" class="nav-link" >@lang('translation.embed-video')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-typography" class="nav-link" >@lang('translation.typography')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-lists" class="nav-link" >@lang('translation.lists')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-general" class="nav-link" >@lang('translation.general')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-ribbons" class="nav-link" >@lang('translation.ribbons')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-utilities" class="nav-link" >@lang('translation.utilities')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAdvanceUI">
                        <i class="ri-stack-line"></i> <span >@lang('translation.advance-ui')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="advance-ui-sweetalerts" class="nav-link" >@lang('translation.sweet-alerts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-nestable" class="nav-link" >@lang('translation.nestable-list')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-scrollbar" class="nav-link" >@lang('translation.scrollbar')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-animation" class="nav-link" >@lang('translation.animation')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-tour" class="nav-link" >@lang('translation.tour')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-swiper" class="nav-link" >@lang('translation.swiper-slider')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-ratings" class="nav-link" >@lang('translation.ratings')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-highlight" class="nav-link" >@lang('translation.highlight')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-scrollspy" class="nav-link" >@lang('translation.scrollSpy')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets">
                        <i class="ri-honour-line"></i> <span >@lang('translation.widgets')</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarForms">
                        <i class="ri-file-list-3-line"></i> <span >@lang('translation.forms')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="forms-elements" class="nav-link" >@lang('translation.basic-elements')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-select" class="nav-link" >@lang('translation.form-select')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-checkboxs-radios" class="nav-link" >@lang('translation.checkboxs-radios')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-pickers" class="nav-link" >@lang('translation.pickers')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-masks" class="nav-link" >@lang('translation.input-masks')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-advanced" class="nav-link" >@lang('translation.advanced')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-range-sliders" class="nav-link" >@lang('translation.range-slider')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-validation" class="nav-link" >@lang('translation.validation')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-wizard" class="nav-link" >@lang('translation.wizard')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-editors" class="nav-link" >@lang('translation.editors')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-file-uploads" class="nav-link" >@lang('translation.file-uploads')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-layouts" class="nav-link" >@lang('translation.form-layouts')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-layout-grid-line"></i> <span >@lang('translation.tables')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="tables-basic" class="nav-link" >@lang('translation.basic-tables')</a>
                            </li>
                            <li class="nav-item">
                                <a href="tables-gridjs" class="nav-link" >@lang('translation.grid-js')</a>
                            </li>
                            <li class="nav-item">
                                <a href="tables-listjs" class="nav-link" >@lang('translation.list-js')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class="ri-pie-chart-line"></i> <span >@lang('translation.charts')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarApexcharts" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarApexcharts" >@lang('translation.apexcharts')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarApexcharts">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="charts-apex-line" class="nav-link" >@lang('translation.line')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-area" class="nav-link" >@lang('translation.area')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-column" class="nav-link" >@lang('translation.column')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-bar" class="nav-link" >@lang('translation.bar')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-mixed" class="nav-link" >@lang('translation.mixed')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-timeline" class="nav-link" >@lang('translation.timeline')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-candlestick" class="nav-link" >@lang('translation.candlstick')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-boxplot" class="nav-link" >@lang('translation.boxplot')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-bubble" class="nav-link" >@lang('translation.bubble')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-scatter" class="nav-link" >@lang('translation.scatter')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-heatmap" class="nav-link" >@lang('translation.heatmap')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-treemap" class="nav-link" >@lang('translation.treemap')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-pie" class="nav-link" >@lang('translation.pie')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-radialbar" class="nav-link" >@lang('translation.radialbar')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-radar" class="nav-link" >@lang('translation.radar')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-polar" class="nav-link" >@lang('translation.polar-area')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="charts-chartjs" class="nav-link" >@lang('translation.chartjs')</a>
                            </li>
                            <li class="nav-item">
                                <a href="charts-echarts" class="nav-link" >@lang('translation.echarts')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-compasses-2-line"></i> <span >@lang('translation.icons')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarIcons">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="icons-remix" class="nav-link" >@lang('translation.remix')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-boxicons" class="nav-link" >@lang('translation.boxicons')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-materialdesign" class="nav-link" >@lang('translation.material-design')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-lineawesome" class="nav-link" >@lang('translation.line-awesome')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-feather" class="nav-link" >@lang('translation.feather')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMaps">
                        <i class="ri-map-pin-line"></i> <span >@lang('translation.maps')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMaps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="maps-google" class="nav-link" data-key="t-google">
                                    Google
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="maps-vector" class="nav-link" data-key="t-vector">
                                    Vector
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="maps-leaflet" class="nav-link" data-key="t-leaflet">
                                    Leaflet
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-share-line"></i> <span >@lang('translation.multi-level')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" >@lang('translation.level-1.1')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAccount" >@lang('translation.level-1.2')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" >@lang('translation.level-2.1')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="sidebarCrm" >@lang('translation.level-2.2')
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" >@lang('translation.level-3.1')</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" >@lang('translation.level-3.2')</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> -->

            </ul>
        </div>
        <!-- Sidebar -->

    </div>

    <div class="navbar-brand-box" style=" position:absolute;bottom:20px;width:100%;height:50px;">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

</div>

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>




@section('script')
<!-- apexcharts -->
<script>

</script>
@endsection