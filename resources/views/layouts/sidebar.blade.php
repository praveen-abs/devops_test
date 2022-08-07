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
        <!-- <a href="index" class="logo logo-dark">
            <span class="logo-sm d-flex justify-content-center align-items-center">
                <div class="image-circle d-flex justify-content-center align-items-center">
                <img class="rounded-circle header-profile-user"
                                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="Header Avatar">
                                        </div>
                                        <span class="">{{Auth::user()->name}}</span>
                
            </span>
            <span class="logo-lg d-flex justify-content-center align-items-center flex-column">
                <div class="image-circle d-flex justify-content-center align-items-center">
                <img class="rounded-circle header-profile-user"
                                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="Header Avatar">
                                        </div>
                                        <span class="mt-1">{{Auth::user()->name}}</span>
                                        <span class="mt-1">UI</span>
            </span>
        </a> -->
        <!-- Light Logo-->
        <!-- <a href="index" class="logo logo-light">
            <span class="logo-sm d-flex justify-content-center align-items-center">
                <div class="image-circle">
                 <img class="rounded-circle header-profile-user"
                                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="Header Avatar">
                                        </div> 
                                        <span class="">{{Auth::user()->name}}</span>
            </span>
            <span class="logo-lg d-flex justify-content-center align-items-center">
                <div class="image-circle">
                 <img class="rounded-circle header-profile-user"
                                        src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                                        alt="Header Avatar">
                                        </div>
                                        <span class="">{{Auth::user()->name}}</span>
            </span>
        </a> -->
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>



    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <!-- <li class="menu-title"><span>@lang('translation.menu')</span></li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span >@lang('translation.dashboards')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link sidebar" >@lang('translation.analytics')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm" class="nav-link sidebar" >@lang('translation.crm')</a>
                            </li>
                            <li class="nav-item">
                                <a href="index" class="nav-link sidebar" >@lang('translation.ecommerce')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto" class="nav-link sidebar" >@lang('translation.crypto')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects" class="nav-link sidebar" >@lang('translation.projects')</a>
                            </li>
                        </ul>
                    </div>
                </li>  -->

                <!-- end Dashboard Menu -->
                <li class="nav-item">
                    @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin'))
                    <a class="nav-link sidebar menu-link pt-0" href="{{url('index')}}">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-grid-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                            </svg>
                        </i>
                        <span data-key="t-landing">Dashboard</span>
                    </a>
                    @else
                    <a class="nav-link sidebar menu-link pt-0" href="{{url('index')}}">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-grid-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                            </svg>
                        </i>
                        <span data-key="t-landing">Dashboard</span>
                    </a>
                    @endif
                </li>


                <!-- CRM -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#crmDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 23.4 23.9">
                                <defs>
                                    <style>
                                    .cls-1 {
                                        font-size: 5.37px;
                                        font-family: BerlinSansFB-Reg, Berlin Sans FB;
                                    }

                                    .cls-1,
                                    .cls-4 {
                                        fill: #686363;
                                    }

                                    .cls-2,
                                    .cls-3 {
                                        fill: none;
                                        stroke: #354a00;
                                        stroke-miterlimit: 10;
                                    }

                                    .cls-2 {
                                        stroke-width: 0.5px;
                                    }

                                    .cls-3 {
                                        stroke-width: 0.8px;
                                    }
                                    </style>
                                </defs><text class="cls-1" transform="translate(6.39 17.13)">CRM</text>
                                <path class="cls-2"
                                    d="M13.57,9V8a1.7,1.7,0,0,0-1-1.57,1.07,1.07,0,0,1-.89.46,1.08,1.08,0,0,1-.89-.46A1.71,1.71,0,0,0,9.78,8v.88" />
                                <path class="cls-2"
                                    d="M12.79,5.81a1.07,1.07,0,0,1-.22.66,1.1,1.1,0,0,1-.9.46,1.08,1.08,0,0,1-.89-.46,1.07,1.07,0,0,1-.22-.66,1.12,1.12,0,0,1,2.23,0Z" />
                                <circle class="cls-2" cx="11.71" cy="6.17" r="3.37" />
                                <path class="cls-2"
                                    d="M5.27,2.93,3.53,4.67a.13.13,0,0,1-.21-.09V4.06H.54A.14.14,0,0,1,.4,3.92V1.77a.14.14,0,0,1,.14-.14H3.32V1.11A.13.13,0,0,1,3.53,1L5.27,2.76A.14.14,0,0,1,5.27,2.93Z" />
                                <path class="cls-2"
                                    d="M23,1.78V3.94a.14.14,0,0,1-.14.14H20.07v.64a.13.13,0,0,1-.22.09L18,3a.13.13,0,0,1,0-.18L19.85.92a.13.13,0,0,1,.22.09v.64h2.79A.13.13,0,0,1,23,1.78Z" />
                                <path class="cls-3"
                                    d="M1,20.49H22.41a.59.59,0,0,1,.59.59v1a1.41,1.41,0,0,1-1.41,1.41H1.81A1.41,1.41,0,0,1,.4,22.09v-1A.59.59,0,0,1,1,20.49Z" />
                                <path class="cls-3"
                                    d="M14.07,20.49V21A1.11,1.11,0,0,1,13,22.08H10.35A1.1,1.1,0,0,1,9.25,21v-.49" />
                                <path class="cls-3"
                                    d="M17.23,6.17h3.35a.86.86,0,0,1,.86.86v12.6a.86.86,0,0,1-.86.86H2.77a.87.87,0,0,1-.86-.86V7a.87.87,0,0,1,.86-.86h3.4" />
                                <path class="cls-3"
                                    d="M15.65,7.74h4.16a.15.15,0,0,1,.14.15V18.83a.15.15,0,0,1-.14.15H3.62a.15.15,0,0,1-.15-.15V7.89a.15.15,0,0,1,.15-.15H7.75" />
                                <path class="cls-4"
                                    d="M17.29,4.92l-.88-.15a5.14,5.14,0,0,0-.35-.84l.52-.73a.76.76,0,0,0-.09-1l-.77-.77a.77.77,0,0,0-1-.09L14,1.87a5.09,5.09,0,0,0-.88-.36L13,.64A.76.76,0,0,0,12.22,0h-1.1a.78.78,0,0,0-.76.64l-.15.89a5.14,5.14,0,0,0-.84.35l-.72-.51a.8.8,0,0,0-.45-.14.77.77,0,0,0-.54.22l-.78.78a.77.77,0,0,0-.08,1L7.32,4A5.24,5.24,0,0,0,7,4.8L6.11,5a.77.77,0,0,0-.65.76V6.8a.77.77,0,0,0,.65.76L7,7.72s0,0,0,0a4.22,4.22,0,0,0,.35.82l-.51.71a.77.77,0,0,0,.08,1L7.7,11a.73.73,0,0,0,.54.23.77.77,0,0,0,.44-.14l.74-.53a4.89,4.89,0,0,0,.82.34l.14.88a.78.78,0,0,0,.76.64h1.1a.76.76,0,0,0,.76-.64l.15-.88a4.22,4.22,0,0,0,.85-.35l.72.52a.8.8,0,0,0,.45.14.74.74,0,0,0,.54-.23l.78-.77a.77.77,0,0,0,.08-1l-.51-.73a5,5,0,0,0,.33-.79s0,0,0-.06l.87-.14a.77.77,0,0,0,.65-.76V5.68A.78.78,0,0,0,17.29,4.92Zm-.06,1.86a.09.09,0,0,1-.06.07L16.08,7a.33.33,0,0,0-.28.26,4,4,0,0,1-.15.45,3.15,3.15,0,0,1-.31.64.35.35,0,0,0,0,.38l.64.91a.05.05,0,0,1,0,.08l-.77.78a.06.06,0,0,1-.05,0h0l-.9-.65a.37.37,0,0,0-.39,0,4.18,4.18,0,0,1-1.09.45l-.17.11a.38.38,0,0,0-.08.17l-.19,1.1s0,0-.07,0H11.15s-.07,0-.07,0l-.18-1.1,0-.08h0l-.38-.24a4,4,0,0,1-.92-.4.33.33,0,0,0-.17,0,.39.39,0,0,0-.21.06l-.91.65h0a.06.06,0,0,1-.05,0l-.77-.77a.06.06,0,0,1,0-.09l.64-.9a.35.35,0,0,0,0-.38,3.43,3.43,0,0,1-.32-.67,3.45,3.45,0,0,1-.14-.42.35.35,0,0,0-.28-.26L6.22,6.87s0,0,0-.07V5.71a.07.07,0,0,1,0-.07l1.09-.18a.34.34,0,0,0,.28-.26A4.32,4.32,0,0,1,8,4.11a.35.35,0,0,0,0-.38l-.65-.92a.06.06,0,0,1,0-.08L8.16,2s0,0,.05,0h0l.9.64a.37.37,0,0,0,.39,0,4.2,4.2,0,0,1,1.09-.46.36.36,0,0,0,.25-.28l.19-1.1A.07.07,0,0,1,11.13.7h1.09s.07,0,.07.06l.18,1.08a.38.38,0,0,0,.27.29,4.14,4.14,0,0,1,1.11.46.35.35,0,0,0,.38,0l.9-.65h0a.06.06,0,0,1,.05,0l.78.78a.07.07,0,0,1,0,.09l-.64.9a.35.35,0,0,0,0,.38,4.32,4.32,0,0,1,.45,1.09.33.33,0,0,0,.28.26l1.09.18a.07.07,0,0,1,.06.07Z" />
                            </svg></i>
                        <span>CRM</span>
                    </a>
                    <div class="collapse menu-dropdown" id="crmDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1">
                                    <span>Vendor</span>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Client</span></a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Navigation Menu for attendance-->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#attendanceDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-fingerprint" viewBox="0 0 16 16">
                                <path
                                    d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z" />
                                <path
                                    d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z" />
                                <path
                                    d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z" />
                                <path
                                    d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z" />
                                <path
                                    d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z" />
                            </svg></i>
                        <span>Attendance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="attendanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1">
                                    <span> Leave</span>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="apps-calendar" class="nav-link sidebar py-1" role="button"><span>Attendance
                                    </span></a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Timesheet</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Expenses &
                                        Trevel</span></a>
                            </li>


                        </ul>
                    </div>
                </li>


                <!-- Organization -->
                @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin'))
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#orgDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">

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
                                <a href="{{url('vmt-employess/directory')}}" id="tds"
                                    class="nav-link sidebar py-1"><span>Directory </span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt-employee-hierarchy')}}" id="tds"
                                    class="nav-link sidebar py-1"><span>ORG
                                        structure</span></a>
                            </li>

                            <li class="nav-item ">
                                <a href="{{url('vmt_employeeOnboarding')}}" id="" class="nav-link sidebar py-1"
                                    aria-expanded="false"><span>Onboarding</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('emp-bulk-upload')}}" id="" class="nav-link sidebar py-1"
                                    aria-expanded="false"><span>Onboarding Bulk Upload</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('emp-quick-upload')}}" id="" class="nav-link sidebar py-1"
                                    aria-expanded="false"><span>Onboarding Quick Upload</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="tds"
                                    class="nav-link sidebar py-1"><span>Exit</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="tds"
                                    class="nav-link sidebar py-1"><span>Documents</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('vmt-assetinventory-index')}}" id="tds"
                                    class="nav-link sidebar py-1"><span>Assets</span></a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                <!-- Performance -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#PerformanceDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                            </svg>
                        </i>
                        <span>Performance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="PerformanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt-pms-assigngoals')}}"
                                    class="nav-link sidebar py-1"><span>Dashboard</span></a>
                            </li>

                            @can('360_Degree_Review')
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1" role="button"><span>360
                                        Degree
                                        Review</span></a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin') ||
                auth()->user()->hasrole('Manager'))
                <!-- team -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#teamDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11.2" viewBox="0 0 16 11.2">
                                <path id="people-group-solid"
                                    d="M4.6,33.4A1.4,1.4,0,1,1,3.2,32,1.4,1.4,0,0,1,4.6,33.4Zm.61,2.707A3.594,3.594,0,0,0,4,38.8a3.459,3.459,0,0,0,.8,2.262V41.6a.8.8,0,0,1-.8.8H2.4a.8.8,0,0,1-.8-.8v-.67A2.8,2.8,0,0,1,2.8,35.6h.8a2.841,2.841,0,0,1,1.61.507ZM1.6,37.343a1.6,1.6,0,0,0,0,2.115ZM11.2,41.6v-.537a3.6,3.6,0,0,0-.41-4.955A2.788,2.788,0,0,1,12.4,35.6h.8a2.8,2.8,0,0,1,1.2,5.33v.67a.8.8,0,0,1-.8.8H12A.8.8,0,0,1,11.2,41.6Zm3.2-2.142a1.6,1.6,0,0,0,0-2.115ZM14.2,33.4A1.4,1.4,0,1,1,12.8,32,1.4,1.4,0,0,1,14.2,33.4Zm-7.8.2A1.6,1.6,0,1,1,8,35.2,1.6,1.6,0,0,1,6.4,33.6Zm4.8,5.2a2.8,2.8,0,0,1-1.6,2.53V42.4a.8.8,0,0,1-.8.8H7.2a.8.8,0,0,1-.8-.8V41.33A2.8,2.8,0,0,1,7.6,36h.8A2.8,2.8,0,0,1,11.2,38.8ZM6.4,39.857V37.743a1.6,1.6,0,0,0,0,2.115Zm3.2-2.115v2.115a1.6,1.6,0,0,0,0-2.115Z"
                                    transform="translate(0 -32)" fill="#686363" />
                            </svg>

                        </i>
                        <span>Team</span>
                    </a>
                    <div class="collapse menu-dropdown" id="teamDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"><span>Summary</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Leave</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Attendance</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Expenses & Trevel</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Timesheet</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Profile
                                        change</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1" role="button"><span>Salary
                                        on
                                        hold</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Performance</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin'))
                <!-- pay roll -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#payRollDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12.652" viewBox="0 0 16 12.652">
                                <g id="Group_34184" data-name="Group 34184" transform="translate(-18 -404.98)">
                                    <path id="hand-holding-dollar-solid_1_" data-name="hand-holding-dollar-solid (1)"
                                        d="M15.867,12.712a1.114,1.114,0,0,0-1.562-.236l-3.343,2.462H7.595a.429.429,0,0,1-.422-.447.446.446,0,0,1,.422-.447H9.78a.95.95,0,0,0,.932-.743.9.9,0,0,0-.883-1.044H5.336a3.339,3.339,0,0,0-2.07.733l-1.3,1.054L.422,14.019A.471.471,0,0,0,0,14.491v2.68a.445.445,0,0,0,.422.447h9.665a2.926,2.926,0,0,0,1.723-.566C16.126,13.907,16.232,13.209,15.867,12.712Z"
                                        transform="translate(18 400.015)" fill="#686363" />
                                    <path id="bx-rupee"
                                        d="M12.493,6.635V6H9v.635h1.112a.951.951,0,0,1,.894.635H9v.635h2.006a.951.951,0,0,1-.894.635H9v.767l1.774,1.774h.9L9.767,9.176h.345a1.59,1.59,0,0,0,1.556-1.27h.826V7.27h-.826a1.567,1.567,0,0,0-.293-.635Z"
                                        transform="translate(15.253 398.98)" fill="#686363" />
                                </g>
                            </svg>
                        </i>


                        <span>Payroll</span>
                    </a>
                    <div class="collapse menu-dropdown" id="payRollDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{url('vmt-payslip')}}" class="nav-link sidebar py-1" role="button"><span>Pay
                                        Run</span></a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                <!-- pay check -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#paycheckDrop-Down"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebar360questions">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="Subtraction_5" data-name="Subtraction 5"
                                    d="M14,16H2a2,2,0,0,1-1.94-1.517L8,10.072l7.941,4.412A2,2,0,0,1,14,16Zm2-2.627h0L10.307,10.21,16,6.873v6.5Zm-16,0v-6.5L5.693,10.21,0,13.371ZM6.5,9.5h0L3,7.5v-6A1.5,1.5,0,0,1,4.5,0h7A1.5,1.5,0,0,1,13,1.5v6l-3.5,2L8,8.75,6.5,9.5Zm.183-4.585v.579L8.021,6.832H8.7L7.261,5.395h.26a1.2,1.2,0,0,0,1.173-.958h.623V3.958H8.694a1.184,1.184,0,0,0-.221-.479h.844V3H6.682v.48h.839a.72.72,0,0,1,.674.479H6.682v.479H8.2a.718.718,0,0,1-.674.479ZM14,6.886V3.133l.941.5A2,2,0,0,1,16,5.4v.313L14,6.885Zm-12,0H2L0,5.713V5.4A2,2,0,0,1,1.059,3.635L2,3.133V6.886Z"
                                    fill="#686363" />
                            </svg>
                        </i>
                        <span>Paycheck</span>
                    </a>
                    <div class="collapse menu-dropdown" id="paycheckDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt_home')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Dashboard</span></a>
                            </li>
                            @can('Team')
                            <li class="nav-item">
                                <a href="{{url('vmt_salary_details')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Salary
                                        Details</span></a>
                            </li>
                            @endcan
                            @can('ORG')
                            <li class="nav-item">
                                <a href="{{url('vmt_investments')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Investments</span></a>
                            </li>
                            @endcan
                            @can('360_Degree_Review')
                            <li class="nav-item">
                                <a href="{{url('vmt_form16')}}" class="nav-link sidebar py-1" role="button"><span>
                                        Form 16</span></a>
                            </li>
                            @endcan
                        </ul>


                    </div>




                </li>
                <!-- claims -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#claimsDrop-Down"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebar360questions">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                                <path
                                    d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                <path
                                    d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5Zm6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
                            </svg>
                        </i>

                        <span>Claims</span>

                    </a>
                    <div class="collapse menu-dropdown" id="claimsDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="#transitionDrop-Down" id="" class="nav-link sidebar py-1"
                                    data-bs-toggle="collapse" role="button" aria-expanded="false"><span>
                                        Transaction</span> </a>
                                <div class="collapse menu-dropdown sub-dropdown" id="transitionDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('vmt-assign-roles')}}" class="nav-link sidebar">
                                                <span> Employee Entry</span> </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item tdItem">
                                <a href="#reportsDrop-Down" id="tds" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" class="nav-link sidebar py-1"><span> Reports</span> </a>
                                <div class="collapse  menu-dropdown sub-dropdown" id="reportsDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('vmt-assign-roles')}}" class="nav-link sidebar"><span>
                                                    Appraisal Reports</a>
                                            </span>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('vmt-assign-roles')}}" class="nav-link sidebar"><span>
                                                    Appraisal Review
                                                    Reports </span></a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>




                </li>


                <!-- reports -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#reportsDrop-Down"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebar360questions">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-flag-fill" viewBox="0 0 16 16">
                                <path
                                    d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                            </svg>
                        </i>
                        <span> Reports</span>

                    </a>
                    <div class="collapse menu-dropdown" id="reportsDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1" role="button"><span>Leave
                                        Report</span></a>
                            </li>
                            <li class="nav-item">

                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar py-1"
                                    role="button"><span>Attendance
                                        Report</span></a>
                            </li>
                        </ul>
                    </div>




                </li>

                <!-- help desk -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#helpDeskDrop-down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="18.306" height="16" viewBox="0 0 18.306 16">
                                <path id="customer-care-icon"
                                    d="M12.179,8.14l-.079.244-.012.021-.01.013a1.077,1.077,0,0,1-.3.034,1.913,1.913,0,0,0,.091-.839h0a.228.228,0,0,1,.091-.2,1.016,1.016,0,0,0,.355-.505l.049-.389a.734.734,0,0,0-.028-.156.114.114,0,0,0-.016-.043h-.039a.228.228,0,0,1-.215-.226,3.837,3.837,0,0,0-.2-1.509,2.143,2.143,0,0,0-.994-.785c-.073-.031-.149-.066-.223-.1-1.36,1.421-2.486-.407-4.1,2.346H6.491c-.021.048-.043.1-.064.149l-.012.024A.228.228,0,0,1,6.1,6.3q-.055-.031-.063-.027c-.009,0-.019.024-.033.055a.7.7,0,0,0-.049.228,1.358,1.358,0,0,0,.3.949.225.225,0,0,1,.07.158,2.167,2.167,0,0,0,.991,1.816l.223.194a2.5,2.5,0,0,0,1.639.718,2.236,2.236,0,0,0,1.566-.706h.669l-.121.115-.22.209a2.711,2.711,0,0,1-1.883.842,2.969,2.969,0,0,1-1.947-.834l-.218-.191A2.591,2.591,0,0,1,5.92,8.152L5.2,8.21a.533.533,0,0,1-.6-.436l-.279-2.2A.529.529,0,0,1,4.8,4.989l.234-.019a.265.265,0,0,1-.024-.1A4.317,4.317,0,0,1,7.188.459a4.435,4.435,0,0,1,4.337.225A3.918,3.918,0,0,1,13.181,4.9a.365.365,0,0,1-.027.08l.356.04a.568.568,0,0,1,.505.636L13.74,7.754a.585.585,0,0,1-.654.49h0a4.207,4.207,0,0,1-.149.466,1.043,1.043,0,0,1-.223.347c-.3.307-1.26.307-1.6.307h-.894a1.043,1.043,0,0,1-.782.3c-.495,0-.894-.262-.894-.585s.4-.585.894-.585a1.052,1.052,0,0,1,.754.3h.916a3.2,3.2,0,0,0,1.2-.139.447.447,0,0,0,.1-.149l.1-.316-.325-.037ZM5.661,4.046A3.863,3.863,0,0,1,11.537,1.71a2.786,2.786,0,0,1,.636.5,3.146,3.146,0,0,0-1.016-1.043,3.7,3.7,0,0,0-1.8-.574,3.633,3.633,0,0,0-1.85.377A3.522,3.522,0,0,0,5.661,4.046Zm1.01,6.828,1.374,3.6.691-1.965L8.4,12.143c-.255-.372-.167-.794.3-.87a3.405,3.405,0,0,1,.511-.01,2.7,2.7,0,0,1,.562.022c.438.1.484.52.265.858l-.332.369.69,1.966,1.244-3.605c.894.807,4.054.97,5.041,1.52,1.368.766,1.33,2.235,1.63,3.605H0c.3-1.357.267-2.851,1.63-3.605C2.844,11.716,5.677,11.768,6.671,10.874Z"
                                    transform="translate(0 0.001)" fill="#686363" />
                            </svg>

                        </i>

                        <span>Help Desk</span>
                    </a>
                    <div class="collapse menu-dropdown" id="helpDeskDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link sidebar  py-1"><span>Calendar</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link sidebar py-1"><span>Chat</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-mailbox" class="nav-link sidebar py-1"><span>Mail-Box</span></a>
                                <!-- </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false"
                                    aria-controls="sidebarEcommerce">@lang('translation.ecommerce')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-products"
                                                class="nav-link sidebar">@lang('translation.products')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-product-details"
                                                class="nav-link sidebar">@lang('translation.product-Details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-add-product"
                                                class="nav-link sidebar">@lang('translation.create-product')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-orders"
                                                class="nav-link sidebar">@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-order-details"
                                                class="nav-link sidebar">@lang('translation.order-details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-customers"
                                                class="nav-link sidebar">@lang('translation.customers')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-cart"
                                                class="nav-link sidebar">@lang('translation.shopping-cart')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-checkout"
                                                class="nav-link sidebar">@lang('translation.checkout')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-sellers"
                                                class="nav-link sidebar">@lang('translation.sellers')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-seller-details"
                                                class="nav-link sidebar">@lang('translation.sellers-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProjects">@lang('translation.projects')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-projects-list" class="nav-link sidebar">@lang('translation.list')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-overview"
                                                class="nav-link sidebar">@lang('translation.overview')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create"
                                                class="nav-link sidebar">@lang('translation.create-project')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTasks">@lang('translation.tasks')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban"
                                                class="nav-link sidebar">@lang('translation.kanbanboard')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view"
                                                class="nav-link sidebar">@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details"
                                                class="nav-link sidebar">@lang('translation.task-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCRM">@lang('translation.crm')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts"
                                                class="nav-link sidebar">@lang('translation.contacts')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies"
                                                class="nav-link sidebar">@lang('translation.companies')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals" class="nav-link sidebar">@lang('translation.deals')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads" class="nav-link sidebar">@lang('translation.leads')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto">@lang('translation.crypto')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions"
                                                class="nav-link sidebar">@lang('translation.transactions')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell"
                                                class="nav-link sidebar">@lang('translation.buy-sell')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders"
                                                class="nav-link sidebar">@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet"
                                                class="nav-link sidebar">@lang('translation.my-wallet')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico" class="nav-link sidebar">@lang('translation.ico-list')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc"
                                                class="nav-link sidebar">@lang('translation.kyc-application')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarInvoices">@lang('translation.invoices')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list"
                                                class="nav-link sidebar">@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details"
                                                class="nav-link sidebar">@lang('translation.details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create"
                                                class="nav-link sidebar">@lang('translation.create-invoice')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false"
                                    aria-controls="sidebarTickets">@lang('translation.supprt-tickets')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list"
                                                class="nav-link sidebar">@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details"
                                                class="nav-link sidebar">@lang('translation.ticket-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </li>

                @if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin'))
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#configDrop-down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363"
                                class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                        </i>
                        <span>Configuration</span>
                    </a>
                    <div class="collapse menu-dropdown" id="configDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('vmt_config_pms')}}" class="nav-link"><span>Master Config</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_clientOnboarding')}}" class="nav-link"><span> Client
                                        Onboarding</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <!-- exit -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#exitDrop-down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLayouts">
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
                                <a href="{{url('vmt_noData')}}" id="" class="nav-link sidebar py-1"><span> Resignation
                                        Entry
                                    </span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="tds" class="nav-link sidebar py-1"><span>Resignation
                                        Status
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </li>




                <!-- end Dashboard Menu -->


                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('translation.pages')</span></li>

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span >@lang('translation.authentication')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSignIn" >@lang('translation.signin')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signin-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSignUp" >@lang('translation.signup')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signup-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signup-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarResetPass" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarResetPass" >@lang('translation.password-reset')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarResetPass">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarLockScreen" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarLockScreen" >@lang('translation.lock-screen')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-lockscreen-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-lockscreen-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarLogout" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarLogout" >@lang('translation.logout')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLogout">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-logout-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-logout-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSuccessMsg" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSuccessMsg" >@lang('translation.success-message')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-success-msg-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-success-msg-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTwoStep" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTwoStep" >@lang('translation.two-step-verification')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTwoStep">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-twostep-basic" class="nav-link sidebar" >@lang('translation.basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-twostep-cover" class="nav-link sidebar" >@lang('translation.cover')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarErrors" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarErrors" >@lang('translation.errors')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarErrors">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-404-basic" class="nav-link sidebar" >@lang('translation.404-basic')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-cover" class="nav-link sidebar" >@lang('translation.404-cover')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-alt" class="nav-link sidebar" >@lang('translation.404-alt')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-500" class="nav-link sidebar" >@lang('translation.500')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span >@lang('translation.pages')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="pages-starter" class="nav-link sidebar" >@lang('translation.starter')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProfile" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProfile" >@lang('translation.profile')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProfile">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="pages-profile" class="nav-link sidebar" >@lang('translation.simple-page')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages-profile-settings" class="nav-link sidebar" >@lang('translation.settings')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="pages-team" class="nav-link sidebar" >@lang('translation.team')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-timeline" class="nav-link sidebar" >@lang('translation.timeline')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-faqs" class="nav-link sidebar" >@lang('translation.faqs')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-pricing" class="nav-link sidebar" >@lang('translation.pricing')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-gallery" class="nav-link sidebar" >@lang('translation.gallery')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-maintenance" class="nav-link sidebar" >@lang('translation.maintenance')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-coming-soon" class="nav-link sidebar" >@lang('translation.coming-soon')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-sitemap" class="nav-link sidebar" >@lang('translation.sitemap')</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-search-results" class="nav-link sidebar" >@lang('translation.search-results')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" target="_blank" href="landing">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                        <span class="badge badge-pill bg-danger" >@lang('translation.new')</span>

                    </a>
                </li> -->

                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('translation.components')</span></li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span >@lang('translation.base-ui')</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-alerts" class="nav-link sidebar" >@lang('translation.alerts')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-badges" class="nav-link sidebar" >@lang('translation.badges')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-buttons" class="nav-link sidebar" >@lang('translation.buttons')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-colors" class="nav-link sidebar" >@lang('translation.colors')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-cards" class="nav-link sidebar" >@lang('translation.cards')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-carousel" class="nav-link sidebar" >@lang('translation.carousel')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-dropdowns" class="nav-link sidebar" >@lang('translation.dropdowns')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-grid" class="nav-link sidebar" >@lang('translation.grid')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-images" class="nav-link sidebar" >@lang('translation.images')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-tabs" class="nav-link sidebar" >@lang('translation.tabs')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-accordions" class="nav-link sidebar" >@lang('translation.accordion-collapse')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-modals" class="nav-link sidebar" >@lang('translation.modals')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-offcanvas" class="nav-link sidebar" >@lang('translation.offcanvas')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-placeholders" class="nav-link sidebar" >@lang('translation.placeholders')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-progress" class="nav-link sidebar" >@lang('translation.progress')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-notifications" class="nav-link sidebar" >@lang('translation.notifications')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-media" class="nav-link sidebar" >@lang('translation.media-object')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-embed-video" class="nav-link sidebar" >@lang('translation.embed-video')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-typography" class="nav-link sidebar" >@lang('translation.typography')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-lists" class="nav-link sidebar" >@lang('translation.lists')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-general" class="nav-link sidebar" >@lang('translation.general')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-ribbons" class="nav-link sidebar" >@lang('translation.ribbons')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-utilities" class="nav-link sidebar" >@lang('translation.utilities')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAdvanceUI">
                        <i class="ri-stack-line"></i> <span >@lang('translation.advance-ui')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="advance-ui-sweetalerts" class="nav-link sidebar" >@lang('translation.sweet-alerts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-nestable" class="nav-link sidebar" >@lang('translation.nestable-list')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-scrollbar" class="nav-link sidebar" >@lang('translation.scrollbar')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-animation" class="nav-link sidebar" >@lang('translation.animation')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-tour" class="nav-link sidebar" >@lang('translation.tour')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-swiper" class="nav-link sidebar" >@lang('translation.swiper-slider')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-ratings" class="nav-link sidebar" >@lang('translation.ratings')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-highlight" class="nav-link sidebar" >@lang('translation.highlight')</a>
                            </li>
                            <li class="nav-item">
                                <a href="advance-ui-scrollspy" class="nav-link sidebar" >@lang('translation.scrollSpy')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="widgets">
                        <i class="ri-honour-line"></i> <span >@lang('translation.widgets')</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarForms">
                        <i class="ri-file-list-3-line"></i> <span >@lang('translation.forms')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="forms-elements" class="nav-link sidebar" >@lang('translation.basic-elements')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-select" class="nav-link sidebar" >@lang('translation.form-select')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-checkboxs-radios" class="nav-link sidebar" >@lang('translation.checkboxs-radios')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-pickers" class="nav-link sidebar" >@lang('translation.pickers')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-masks" class="nav-link sidebar" >@lang('translation.input-masks')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-advanced" class="nav-link sidebar" >@lang('translation.advanced')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-range-sliders" class="nav-link sidebar" >@lang('translation.range-slider')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-validation" class="nav-link sidebar" >@lang('translation.validation')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-wizard" class="nav-link sidebar" >@lang('translation.wizard')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-editors" class="nav-link sidebar" >@lang('translation.editors')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-file-uploads" class="nav-link sidebar" >@lang('translation.file-uploads')</a>
                            </li>
                            <li class="nav-item">
                                <a href="forms-layouts" class="nav-link sidebar" >@lang('translation.form-layouts')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-layout-grid-line"></i> <span >@lang('translation.tables')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="tables-basic" class="nav-link sidebar" >@lang('translation.basic-tables')</a>
                            </li>
                            <li class="nav-item">
                                <a href="tables-gridjs" class="nav-link sidebar" >@lang('translation.grid-js')</a>
                            </li>
                            <li class="nav-item">
                                <a href="tables-listjs" class="nav-link sidebar" >@lang('translation.list-js')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class="ri-pie-chart-line"></i> <span >@lang('translation.charts')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarApexcharts" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarApexcharts" >@lang('translation.apexcharts')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarApexcharts">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="charts-apex-line" class="nav-link sidebar" >@lang('translation.line')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-area" class="nav-link sidebar" >@lang('translation.area')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-column" class="nav-link sidebar" >@lang('translation.column')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-bar" class="nav-link sidebar" >@lang('translation.bar')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-mixed" class="nav-link sidebar" >@lang('translation.mixed')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-timeline" class="nav-link sidebar" >@lang('translation.timeline')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-candlestick" class="nav-link sidebar" >@lang('translation.candlstick')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-boxplot" class="nav-link sidebar" >@lang('translation.boxplot')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-bubble" class="nav-link sidebar" >@lang('translation.bubble')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-scatter" class="nav-link sidebar" >@lang('translation.scatter')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-heatmap" class="nav-link sidebar" >@lang('translation.heatmap')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-treemap" class="nav-link sidebar" >@lang('translation.treemap')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-pie" class="nav-link sidebar" >@lang('translation.pie')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-radialbar" class="nav-link sidebar" >@lang('translation.radialbar')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-radar" class="nav-link sidebar" >@lang('translation.radar')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="charts-apex-polar" class="nav-link sidebar" >@lang('translation.polar-area')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="charts-chartjs" class="nav-link sidebar" >@lang('translation.chartjs')</a>
                            </li>
                            <li class="nav-item">
                                <a href="charts-echarts" class="nav-link sidebar" >@lang('translation.echarts')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-compasses-2-line"></i> <span >@lang('translation.icons')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarIcons">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="icons-remix" class="nav-link sidebar" >@lang('translation.remix')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-boxicons" class="nav-link sidebar" >@lang('translation.boxicons')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-materialdesign" class="nav-link sidebar" >@lang('translation.material-design')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-lineawesome" class="nav-link sidebar" >@lang('translation.line-awesome')</a>
                            </li>
                            <li class="nav-item">
                                <a href="icons-feather" class="nav-link sidebar" >@lang('translation.feather')</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMaps">
                        <i class="ri-map-pin-line"></i> <span >@lang('translation.maps')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMaps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="maps-google" class="nav-link sidebar" data-key="t-google">
                                    Google
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="maps-vector" class="nav-link sidebar" data-key="t-vector">
                                    Vector
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="maps-leaflet" class="nav-link sidebar" data-key="t-leaflet">
                                    Leaflet
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#sidebarMultilevel" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-share-line"></i> <span >@lang('translation.multi-level')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link sidebar" >@lang('translation.level-1.1')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link sidebar" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAccount" >@lang('translation.level-1.2')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link sidebar" >@lang('translation.level-2.1')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link sidebar" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="sidebarCrm" >@lang('translation.level-2.2')
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link sidebar" >@lang('translation.level-3.1')</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link sidebar" >@lang('translation.level-3.2')</a>
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

    <!-- <div class="navbar-brand-box" style=" position:absolute;bottom:20px;width:100%;height:50px;"> -->
    <!-- Dark Logo-->
    <!-- <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
        </a> -->
    <!-- Light Logo-->
    <!-- <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/abs logo.png') }}" alt="" class="">
            </span>
        </a> -->
    <!-- <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button> -->
    <!-- </div> -->

    <div class="sidebar-bottom-bg" style="z-index:1;">
        <img src="{{ URL::asset('assets/images/sidebar_icons/sidebar-bg.png') }}" alt="" class="h-100 w-100">
    </div>

</div>

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->





@section('script')
<!-- apexcharts -->
<script>

</script>
@endsection