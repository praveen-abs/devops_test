<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box ">
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="{{route('index')}}">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363" class="bi bi-grid-fill" viewBox="0 0 16 16">
                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                            </svg>
                        </i>
                        <span data-key="t-landing">Dashboard</span>
                    </a>
                    <!-- <a class="nav-link sidebar menu-link pt-0" href="{{route('index')}}">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363" class="bi bi-grid-fill" viewBox="0 0 16 16">
                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                            </svg>
                        </i>
                        <span data-key="t-landing">Dashboard</span>
                    </a> -->
                </li>


                <!-- CRM -->
                @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))

                <li class="nav-item">

                    <a class="nav-link sidebar menu-link pt-0" href="#crmDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_34352" data-name="Group 34352" transform="translate(2635 -5134)">
                                    <path id="handshake-angle-solid_1_" data-name="handshake-angle-solid (1)" d="M5.792,2.187h-1.8V2.8a.889.889,0,0,1-.766.9.855.855,0,0,1-.943-.85V1.419l-.291.175a1.751,1.751,0,0,0-.848,1.5l-.95.55a.379.379,0,0,0-.139.518L1,5.806a.382.382,0,0,0,.519.139l1.227-.709H4.368a.761.761,0,0,0,.76-.76.57.57,0,0,0,.57-.57v-.57h.095a.285.285,0,0,0,.285-.285v-.57A.294.294,0,0,0,5.792,2.187Zm1.753-.434L6.6.107a.382.382,0,0,0-.519-.139L4.85.677H4.107a2.406,2.406,0,0,0-1.271.364.382.382,0,0,0-.177.321v1.5a.475.475,0,0,0,.95,0V1.807H5.792a.665.665,0,0,1,.665.665V2.81l.95-.549A.366.366,0,0,0,7.546,1.752Z" transform="translate(-2630.798 5139.144)" fill="#686363" />
                                    <path id="gear-wide" d="M8.931.727a.961.961,0,0,0-1.864,0L7,1.013a.96.96,0,0,1-1.622.434l-.2-.211a.96.96,0,0,0-1.613.931l.08.284A.96.96,0,0,1,2.451,3.638l-.284-.081A.96.96,0,0,0,1.236,5.17l.211.2A.96.96,0,0,1,1.013,7l-.286.071a.961.961,0,0,0,0,1.864L1.013,9a.96.96,0,0,1,.434,1.622l-.211.2a.96.96,0,0,0,.931,1.613l.284-.08a.96.96,0,0,1,1.187,1.187l-.081.283a.96.96,0,0,0,1.613.931l.2-.211A.96.96,0,0,1,7,14.986l.071.286a.961.961,0,0,0,1.864,0L9,14.986a.96.96,0,0,1,1.622-.434l.2.211a.96.96,0,0,0,1.613-.931l-.08-.284a.96.96,0,0,1,1.187-1.187l.283.081a.96.96,0,0,0,.931-1.613l-.211-.2A.96.96,0,0,1,14.986,9l.286-.071a.961.961,0,0,0,0-1.864L14.986,7a.96.96,0,0,1-.434-1.622l.211-.2a.96.96,0,0,0-.931-1.613l-.284.08a.96.96,0,0,1-1.187-1.186l.081-.284a.96.96,0,0,0-1.613-.931l-.2.211A.96.96,0,0,1,9,1.013ZM8,13a5,5,0,1,1,5-5,5,5,0,0,1-5,5Z" transform="translate(-2635 5134)" fill="#686363" />
                                </g>
                            </svg>


                        </i>
                        <span>CRM</span>
                    </a>
                    <div class="collapse menu-dropdown" id="crmDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('vmt-vendor-route')}}" class="nav-link sidebar py-1">
                                    <span>Vendor</span>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="{{route('vmt-clients-route')}}" class="nav-link sidebar py-1" role="button"><span>Client</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <!-- Navigation Menu for attendance-->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#attendanceDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363" class="bi bi-fingerprint" viewBox="0 0 16 16">
                                <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z" />
                                <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z" />
                                <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z" />
                                <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z" />
                                <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z" />
                            </svg></i>
                        <span>Attendance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="attendanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item active">
                                <a href="{{route('attendance-dashboard')}}" class="nav-link sidebar py-1">
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))
                                <li class="nav-item">
                                    <a href="{{url('attendance_approvals')}}" class="nav-link sidebar py-1">Approvals</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('attendance_shift_woff_hday')}}" class="nav-link sidebar py-1">Shift/WeeklyOff/Holidays</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('attendance_tracking')}}" class="nav-link sidebar py-1">Tracking</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('attendance_overtime')}}" class="nav-link sidebar py-1">OverTime</a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-calendar" class="nav-link sidebar py-1" role="button">
                                        <span>Attendance</span>
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Timesheet</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('attendance_leave')}}" class="nav-link sidebar py-1">Leave</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button">
                                    <span>Expenses & Travel</span>
                                </a>
                            </li>

                            @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))
                                <li class="nav-item">
                                    <a href="{{route('attendance-leavereports')}}" class="nav-link sidebar py-1"><span>Reports</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('attendance_settings')}}" class="nav-link sidebar py-1"><span>Settings</span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>


                <!-- Organization -->
                @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#orgDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRoles">

                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22.04" height="17.142" viewBox="0 0 22.04 17.142">
                                <path id="sitemap-solid" d="M7.959,33.837A1.837,1.837,0,0,1,9.8,32h2.449a1.837,1.837,0,0,1,1.837,1.837v2.449a1.837,1.837,0,0,1-1.837,1.837h-.306v1.531h5.816A2.144,2.144,0,0,1,19.9,41.8V43.02H20.2a1.837,1.837,0,0,1,1.837,1.837v2.449A1.837,1.837,0,0,1,20.2,49.142H17.754a1.837,1.837,0,0,1-1.837-1.837V44.856a1.837,1.837,0,0,1,1.837-1.837h.306V41.8a.307.307,0,0,0-.306-.306H11.938V43.02h.306a1.837,1.837,0,0,1,1.837,1.837v2.449a1.837,1.837,0,0,1-1.837,1.837H9.8a1.837,1.837,0,0,1-1.837-1.837V44.856A1.837,1.837,0,0,1,9.8,43.02H10.1V41.489H4.285a.307.307,0,0,0-.306.306V43.02h.306a1.837,1.837,0,0,1,1.837,1.837v2.449a1.837,1.837,0,0,1-1.837,1.837H1.837A1.837,1.837,0,0,1,0,47.305V44.856A1.837,1.837,0,0,1,1.837,43.02h.306V41.8a2.143,2.143,0,0,1,2.143-2.143H10.1V38.122H9.8a1.837,1.837,0,0,1-1.837-1.837Z" transform="translate(0 -32)" fill="#686363" />
                            </svg>
                        </i>

                        <span>Organization</span>
                    </a>
                    <div class="collapse menu-dropdown" id="orgDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item ">
                                <a href="{{url('employeesDirectory')}}" id="tds" class="nav-link sidebar py-1"><span>Directory </span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('showOrgTree')}}" id="tds" class="nav-link sidebar py-1"><span>ORG
                                        structure</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('department')}}" id="tds" class="nav-link sidebar py-1"><span>Department</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{url('employeeOnboarding')}}" id="" class="nav-link sidebar py-1" aria-expanded="false"><span>Onboarding</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('bulkEmployeeOnboarding')}}" id="" class="nav-link sidebar py-1" aria-expanded="false"><span>Onboarding Bulk Upload</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('quickEmployeeOnboarding')}}" id="" class="nav-link sidebar py-1" aria-expanded="false"><span>Onboarding Quick Upload</span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('page-not-found')}}" id="tds" class="nav-link sidebar py-1"><span>Exit</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('vmt-documents-route')}}" id="tds" class="nav-link sidebar py-1"><span>Documents</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('assetinventory-index')}}" id="tds" class="nav-link sidebar py-1"><span>Assets</span></a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('manage-employees-page')}}" id="tds" class="nav-link sidebar py-1"><span>Manage Employees</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif


                @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#mytasksDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                                <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5Zm6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
                            </svg>
                        </i>

                        <span>My Tasks</span>

                    </a>
                    <div class="collapse menu-dropdown" id="mytasksDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{route('vmt-approvals-emp-documents')}}" id="" class="nav-link sidebar py-1" data-bs-toggle="" role="button" aria-expanded="false"><span>
                                Documents Approval</span> </a>
                                <!-- <div class="collapse menu-dropdown sub-dropdown" id="approvalDrop-Down">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('vmt-approvals-emp-documents')}}" class="nav-link sidebar">
                                                <span> Documents Approval</span> </a>
                                        </li>
                                    </ul>
                                </div> -->
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <!-- Performance -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#PerformanceDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.058" height="12.253" viewBox="0 0 22.058 12.253">
                                <path id="arrow-trend-up-solid" d="M14.705,98.451a1.225,1.225,0,0,1,0-2.451h6.127a1.224,1.224,0,0,1,1.225,1.225v6.127a1.225,1.225,0,0,1-2.451,0v-3.167l-6.487,6.483a1.223,1.223,0,0,1-1.731,0l-4.071-4.032-5.226,5.258a1.225,1.225,0,0,1-1.733-1.731l6.128-6.127a1.223,1.223,0,0,1,1.731,0l4.036,4.032,5.618-5.652Z" transform="translate(0 -96)" fill="#686363" />
                            </svg>

                        </i>
                        <span>Performance</span>
                    </a>
                    <div class="collapse menu-dropdown" id="PerformanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))
                            <li class="nav-item">
                                <!-- <a href="{{url('vmt-pms-assigngoals')}}" class="nav-link sidebar py-1"><span>Dashboard</span></a> -->
                                <a href="{{ route('pms-dashboard') }}" class="nav-link sidebar py-1"><span>Org Appraisal</span></a>
                            </li>
                            @endif
                            @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR","Manager"]))
                            <li class="nav-item">
                                <a href="{{ route('team-appraisal-pms-dashboard') }}" class="nav-link"><span>Team Appraisal</span></a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('employee-appraisal-pms-dashboard') }}" class="nav-link"><span>Employee Appraisal</span></a>
                            </li>
                            @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))

                            <li class="nav-item">
                                <a href="{{route('vmt_config_pms')}}" class="nav-link"><span>PMS Config</span></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                @if((Str::contains( currentLoggedInUserRole(), ["Admin","HR","Manager"]) ))
                <!-- team -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#teamDrop-Down" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11.2" viewBox="0 0 16 11.2">
                                <path id="people-group-solid" d="M4.6,33.4A1.4,1.4,0,1,1,3.2,32,1.4,1.4,0,0,1,4.6,33.4Zm.61,2.707A3.594,3.594,0,0,0,4,38.8a3.459,3.459,0,0,0,.8,2.262V41.6a.8.8,0,0,1-.8.8H2.4a.8.8,0,0,1-.8-.8v-.67A2.8,2.8,0,0,1,2.8,35.6h.8a2.841,2.841,0,0,1,1.61.507ZM1.6,37.343a1.6,1.6,0,0,0,0,2.115ZM11.2,41.6v-.537a3.6,3.6,0,0,0-.41-4.955A2.788,2.788,0,0,1,12.4,35.6h.8a2.8,2.8,0,0,1,1.2,5.33v.67a.8.8,0,0,1-.8.8H12A.8.8,0,0,1,11.2,41.6Zm3.2-2.142a1.6,1.6,0,0,0,0-2.115ZM14.2,33.4A1.4,1.4,0,1,1,12.8,32,1.4,1.4,0,0,1,14.2,33.4Zm-7.8.2A1.6,1.6,0,1,1,8,35.2,1.6,1.6,0,0,1,6.4,33.6Zm4.8,5.2a2.8,2.8,0,0,1-1.6,2.53V42.4a.8.8,0,0,1-.8.8H7.2a.8.8,0,0,1-.8-.8V41.33A2.8,2.8,0,0,1,7.6,36h.8A2.8,2.8,0,0,1,11.2,38.8ZM6.4,39.857V37.743a1.6,1.6,0,0,0,0,2.115Zm3.2-2.115v2.115a1.6,1.6,0,0,0,0-2.115Z" transform="translate(0 -32)" fill="#686363" />
                            </svg>

                        </i>
                        <span>Team</span>
                    </a>
                    <!-- <div class="collapse menu-dropdown" id="teamDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1"><span>Summary</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Leave</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Attendance</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Expenses & Trevel</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Timesheet</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Profile
                                        change</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Salary
                                        on
                                        hold</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Performance</span></a>
                            </li>
                        </ul>
                    </div> -->
                </li>
                @endif

                @if( Str::contains( currentLoggedInUserRole(), ["Admin","HR"]))
                <!-- pay roll -->

                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#payRollDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12.652" viewBox="0 0 16 12.652">
                                <g id="Group_34184" data-name="Group 34184" transform="translate(-18 -404.98)">
                                    <path id="hand-holding-dollar-solid_1_" data-name="hand-holding-dollar-solid (1)" d="M15.867,12.712a1.114,1.114,0,0,0-1.562-.236l-3.343,2.462H7.595a.429.429,0,0,1-.422-.447.446.446,0,0,1,.422-.447H9.78a.95.95,0,0,0,.932-.743.9.9,0,0,0-.883-1.044H5.336a3.339,3.339,0,0,0-2.07.733l-1.3,1.054L.422,14.019A.471.471,0,0,0,0,14.491v2.68a.445.445,0,0,0,.422.447h9.665a2.926,2.926,0,0,0,1.723-.566C16.126,13.907,16.232,13.209,15.867,12.712Z" transform="translate(18 400.015)" fill="#686363" />
                                    <path id="bx-rupee" d="M12.493,6.635V6H9v.635h1.112a.951.951,0,0,1,.894.635H9v.635h2.006a.951.951,0,0,1-.894.635H9v.767l1.774,1.774h.9L9.767,9.176h.345a1.59,1.59,0,0,0,1.556-1.27h.826V7.27h-.826a1.567,1.567,0,0,0-.293-.635Z" transform="translate(15.253 398.98)" fill="#686363" />
                                </g>
                            </svg>
                        </i>


                        <span>Payroll</span>
                    </a>
                    <div class="collapse menu-dropdown" id="payRollDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{route('payRun')}}" class="nav-link sidebar py-1" role="button"><span>Pay
                                        Run</span></a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                <!-- pay check -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#paycheckDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="Subtraction_5" data-name="Subtraction 5" d="M14,16H2a2,2,0,0,1-1.94-1.517L8,10.072l7.941,4.412A2,2,0,0,1,14,16Zm2-2.627h0L10.307,10.21,16,6.873v6.5Zm-16,0v-6.5L5.693,10.21,0,13.371ZM6.5,9.5h0L3,7.5v-6A1.5,1.5,0,0,1,4.5,0h7A1.5,1.5,0,0,1,13,1.5v6l-3.5,2L8,8.75,6.5,9.5Zm.183-4.585v.579L8.021,6.832H8.7L7.261,5.395h.26a1.2,1.2,0,0,0,1.173-.958h.623V3.958H8.694a1.184,1.184,0,0,0-.221-.479h.844V3H6.682v.48h.839a.72.72,0,0,1,.674.479H6.682v.479H8.2a.718.718,0,0,1-.674.479ZM14,6.886V3.133l.941.5A2,2,0,0,1,16,5.4v.313L14,6.885Zm-12,0H2L0,5.713V5.4A2,2,0,0,1,1.059,3.635L2,3.133V6.886Z" fill="#686363" />
                            </svg>
                        </i>
                        <span>Paycheck</span>
                    </a>
                    <div class="collapse menu-dropdown" id="paycheckDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('paycheckDashboard')}}" class="nav-link sidebar py-1" role="button"><span>Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('vmt_salary_details')}}" class="nav-link sidebar py-1" role="button"><span>Salary
                                        Details</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('vmt-investments-route')}}" class="nav-link sidebar py-1" role="button"><span>Investments</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('vmt-form16-route')}}" class="nav-link sidebar py-1" role="button"><span>
                                        Form 16</span></a>
                            </li>
                        </ul>
                    </div>
                </li>



                <!-- claims -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#claimsDrop-Down" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="18.46" height="24.613" viewBox="0 0 18.46 24.613">
                                <g id="Group_34506" data-name="Group 34506" transform="translate(-9251 -13713)">
                                    <path id="file-earmark-medical-fill" d="M13.219,0H5.077A3.077,3.077,0,0,0,2,3.077v18.46a3.077,3.077,0,0,0,3.077,3.077H17.383a3.077,3.077,0,0,0,3.077-3.077V7.241a1.538,1.538,0,0,0-.45-1.087l-5.7-5.7A1.538,1.538,0,0,0,13.219,0Zm.318,5.384V2.307l4.615,4.615H15.076A1.538,1.538,0,0,1,13.537,5.384Zm-7.692,10h7.692a.769.769,0,0,1,0,1.538H5.846a.769.769,0,0,1,0-1.538Zm0,3.077h7.692a.769.769,0,0,1,0,1.538H5.846a.769.769,0,0,1,0-1.538Z" transform="translate(9249 13713)" fill="#686363" />
                                    <path id="rupee" d="M3.257,1.24v.37a.112.112,0,0,1-.116.116H2.532a1.356,1.356,0,0,1-.468.849,1.84,1.84,0,0,1-1,.4q.606.646,1.665,1.944a.1.1,0,0,1,.014.123.105.105,0,0,1-.105.065H1.929a.107.107,0,0,1-.091-.044Q.729,3.732.033,2.992A.109.109,0,0,1,0,2.912V2.452A.111.111,0,0,1,.034,2.37a.111.111,0,0,1,.082-.034H.522a1.637,1.637,0,0,0,.771-.156.709.709,0,0,0,.372-.454H.116A.112.112,0,0,1,0,1.61V1.24a.112.112,0,0,1,.116-.116h1.5Q1.407.715.642.715H.116A.111.111,0,0,1,.034.68.111.111,0,0,1,0,.6V.116A.112.112,0,0,1,.116,0H3.134A.112.112,0,0,1,3.25.116v.37A.112.112,0,0,1,3.134.6H2.289a1.254,1.254,0,0,1,.232.522h.62a.112.112,0,0,1,.116.116Z" transform="translate(9256.973 13720.691)" fill="#fff" />
                                </g>
                            </svg>

                        </i>

                        <span>Claims</span>

                    </a>
                </li>


                <!-- reports -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" id="employeeInfo" href="#reportsDrop-Down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                            </svg>
                        </i>
                        <span> Reports</span>
                    </a>
                    <div class="collapse menu-dropdown" id="reportsDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Leave
                                        Report</span></a>
                            </li>
                            <li class="nav-item">

                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1" role="button"><span>Attendance
                                        Report</span></a>
                            </li>
                        </ul>
                    </div>
                </li>




                <!-- help desk -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#helpDeskDrop-down" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="18.306" height="16" viewBox="0 0 18.306 16">
                                <path id="customer-care-icon" d="M12.179,8.14l-.079.244-.012.021-.01.013a1.077,1.077,0,0,1-.3.034,1.913,1.913,0,0,0,.091-.839h0a.228.228,0,0,1,.091-.2,1.016,1.016,0,0,0,.355-.505l.049-.389a.734.734,0,0,0-.028-.156.114.114,0,0,0-.016-.043h-.039a.228.228,0,0,1-.215-.226,3.837,3.837,0,0,0-.2-1.509,2.143,2.143,0,0,0-.994-.785c-.073-.031-.149-.066-.223-.1-1.36,1.421-2.486-.407-4.1,2.346H6.491c-.021.048-.043.1-.064.149l-.012.024A.228.228,0,0,1,6.1,6.3q-.055-.031-.063-.027c-.009,0-.019.024-.033.055a.7.7,0,0,0-.049.228,1.358,1.358,0,0,0,.3.949.225.225,0,0,1,.07.158,2.167,2.167,0,0,0,.991,1.816l.223.194a2.5,2.5,0,0,0,1.639.718,2.236,2.236,0,0,0,1.566-.706h.669l-.121.115-.22.209a2.711,2.711,0,0,1-1.883.842,2.969,2.969,0,0,1-1.947-.834l-.218-.191A2.591,2.591,0,0,1,5.92,8.152L5.2,8.21a.533.533,0,0,1-.6-.436l-.279-2.2A.529.529,0,0,1,4.8,4.989l.234-.019a.265.265,0,0,1-.024-.1A4.317,4.317,0,0,1,7.188.459a4.435,4.435,0,0,1,4.337.225A3.918,3.918,0,0,1,13.181,4.9a.365.365,0,0,1-.027.08l.356.04a.568.568,0,0,1,.505.636L13.74,7.754a.585.585,0,0,1-.654.49h0a4.207,4.207,0,0,1-.149.466,1.043,1.043,0,0,1-.223.347c-.3.307-1.26.307-1.6.307h-.894a1.043,1.043,0,0,1-.782.3c-.495,0-.894-.262-.894-.585s.4-.585.894-.585a1.052,1.052,0,0,1,.754.3h.916a3.2,3.2,0,0,0,1.2-.139.447.447,0,0,0,.1-.149l.1-.316-.325-.037ZM5.661,4.046A3.863,3.863,0,0,1,11.537,1.71a2.786,2.786,0,0,1,.636.5,3.146,3.146,0,0,0-1.016-1.043,3.7,3.7,0,0,0-1.8-.574,3.633,3.633,0,0,0-1.85.377A3.522,3.522,0,0,0,5.661,4.046Zm1.01,6.828,1.374,3.6.691-1.965L8.4,12.143c-.255-.372-.167-.794.3-.87a3.405,3.405,0,0,1,.511-.01,2.7,2.7,0,0,1,.562.022c.438.1.484.52.265.858l-.332.369.69,1.966,1.244-3.605c.894.807,4.054.97,5.041,1.52,1.368.766,1.33,2.235,1.63,3.605H0c.3-1.357.267-2.851,1.63-3.605C2.844,11.716,5.677,11.768,6.671,10.874Z" transform="translate(0 0.001)" fill="#686363" />
                            </svg>

                        </i>

                        <span>Help Desk</span>
                    </a>
                    <!-- <div class="collapse menu-dropdown" id="helpDeskDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar  py-1"><span>Calendar</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1"><span>Chat</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('page-not-found')}}" class="nav-link sidebar py-1"><span>Mail-Box</span></a>
                            </li>
                        </ul>
                    </div> -->
                </li>

                @if( Str::contains( currentLoggedInUserRole(), ["Admin"]))
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#configDrop-down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#686363" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                        </i>
                        <span>Configuration</span>
                    </a>
                    <div class="collapse menu-dropdown" id="configDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('view-config-master')}}" class="nav-link"><span>Master Config</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('vmt_clientOnboarding-route')}}" class="nav-link"><span> Client
                                        Onboarding</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('document_preview')}}" class="nav-link">Document Template<span>
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <!-- exit -->
                <li class="nav-item">
                    <a class="nav-link sidebar menu-link pt-0" href="#exitDrop-down" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20.227" height="17.699" viewBox="0 0 20.227 17.699">
                                <path id="right-from-bracket-solid" d="M3.793,49.7H6.321a1.264,1.264,0,1,0,0-2.528H3.793a1.264,1.264,0,0,1-1.264-1.264V35.793a1.264,1.264,0,0,1,1.264-1.264H6.321a1.264,1.264,0,0,0,0-2.528H3.793A3.793,3.793,0,0,0,0,35.793V45.906A3.793,3.793,0,0,0,3.793,49.7Zm16.15-9.541L14.25,34.785a.949.949,0,0,0-1.6.69l0,2.844H7.589a1.265,1.265,0,0,0-1.265,1.264v2.528a1.265,1.265,0,0,0,1.265,1.264h5.057l0,2.809a.949.949,0,0,0,1.6.69L19.943,41.5A.935.935,0,0,0,19.943,40.158Z" transform="translate(0 -32)" fill="#686363" />
                            </svg>
                        </i>
                        <span>Exit</span>
                    </a>
                    <div class="collapse menu-dropdown" id="exitDrop-down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{route('page-not-found')}}" id="" class="nav-link sidebar py-1"><span> Resignation
                                        Entry
                                    </span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('page-not-found')}}" id="tds" class="nav-link sidebar py-1"><span>Resignation
                                        Status
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>


    </div>
    <div class="sidebar-bottom-bg" style="z-index:1;">
        <img src="{{ URL::asset('assets/images/sidebar_icons/sidebar-bg.png') }}" alt="" class="h-100 w-100">
    </div>
</div>
