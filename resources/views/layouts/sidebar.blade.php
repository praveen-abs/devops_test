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
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box ">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <img src="{{ URL::asset($logoSrc) }}" alt="">
            <!-- <img src="{{ URL::asset('assets/images/vasa.jpg') }}" alt="" class=""> -->
        </a>

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
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="{{url('index')}}">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <!-- <img src="{{ URL::asset('assets/images/dashboard.png') }}" alt="" class="m-2"> -->

                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="20.256" height="20.252" viewBox="0 0 20.256 20.252">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="-0.294" x2="2.872" y2="5.051"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#e84a06" />
                                        <stop offset="0.191" stop-color="#2c0f38" />
                                        <stop offset="1" stop-color="#050349" />
                                    </linearGradient>
                                </defs>
                                <g id="home" transform="translate(-1 -0.053)">
                                    <g id="Group_68" data-name="Group 68" transform="translate(1 0.053)">
                                        <g id="Group_67" data-name="Group 67" transform="translate(0 0)">
                                            <path id="Path_584" data-name="Path 584"
                                                d="M47.137,34.321a.5.5,0,0,0-.652.005l-1.359,1.216v-.159a.338.338,0,0,0-.675,0v.764l-.563.5a.338.338,0,0,0,.45.5l2.475-2.216,2.475,2.216a.338.338,0,1,0,.45-.5Z"
                                                transform="translate(-42.086 -32.851)" fill="url(#linear-gradient)" />
                                            <path id="Path_585" data-name="Path 585"
                                                d="M65.175,119.52a.338.338,0,0,0-.338.338v2.363H61.462v-2.363a.338.338,0,0,0-.675,0v2.577a.467.467,0,0,0,.473.461h3.78a.468.468,0,0,0,.473-.462v-2.576A.338.338,0,0,0,65.175,119.52Z"
                                                transform="translate(-58.422 -114.795)" fill="url(#linear-gradient)" />
                                            <path id="Path_586" data-name="Path 586"
                                                d="M63.15,221.92a2.363,2.363,0,1,0,2.363,2.363A2.363,2.363,0,0,0,63.15,221.92Zm-1.688,2.363a1.691,1.691,0,0,1,1.35-1.654v1.463l-1.249.749A1.664,1.664,0,0,1,61.462,224.283Zm.449,1.136,1.186-.712.982.982A1.671,1.671,0,0,1,61.911,225.419Zm2.645-.207-1.069-1.069v-1.514a1.685,1.685,0,0,1,1.069,2.583Z"
                                                transform="translate(-58.422 -213.144)" fill="url(#linear-gradient)" />
                                            <path id="Path_587" data-name="Path 587"
                                                d="M248.763,38.912V37.757a.533.533,0,0,0-.532-.532h-.961a.533.533,0,0,0-.532.532v1.155h-.675V36.8a.585.585,0,0,0-.584-.584h-.857a.585.585,0,0,0-.584.584v2.116h-.675V35.2a.675.675,0,0,0-.675-.675h-.675a.675.675,0,0,0-.675.675v3.713H241a.338.338,0,0,1-.338-.338v-4.05a.338.338,0,1,0-.675,0v4.05A1.013,1.013,0,0,0,241,39.587h7.763a.338.338,0,0,0,0-.675Zm-6.075,0h-.675V35.2h.675Zm2.7,0h-.675V36.887h.675Zm2.7,0h-.675V37.9h.675v1.013Z"
                                                transform="translate(-230.534 -32.837)" fill="url(#linear-gradient)" />
                                            <path id="Path_588" data-name="Path 588"
                                                d="M248.763,209.579H241a.337.337,0,0,1-.338-.338v-.535l1.111-1.111a.345.345,0,0,1,.477,0l.4.4a1.013,1.013,0,0,0,1.432,0l1.408-1.408a.345.345,0,0,1,.477,0l.4.4a1.015,1.015,0,0,0,1.432,0l1.21-1.21a.338.338,0,0,0-.477-.477l-1.21,1.21a.338.338,0,0,1-.477,0l-.4-.4a1.037,1.037,0,0,0-1.432,0l-1.408,1.408a.338.338,0,0,1-.477,0l-.4-.4a1.037,1.037,0,0,0-1.432,0l-.634.634v-2.56a.338.338,0,0,0-.675,0v4.05A1.013,1.013,0,0,0,241,210.254h7.763a.338.338,0,0,0,0-.675Z"
                                                transform="translate(-230.534 -196.753)" fill="url(#linear-gradient)" />
                                            <path id="Path_589" data-name="Path 589"
                                                d="M21.254,15.732V1.925A1.789,1.789,0,0,0,19.566.053H2.69A1.789,1.789,0,0,0,1,1.925V15.732A1.789,1.789,0,0,0,2.69,17.6h5.4v.675H6.74a1.35,1.35,0,0,0-1.35,1.35v.338a.337.337,0,0,0,.338.338h10.8a.337.337,0,0,0,.338-.338V19.63a1.35,1.35,0,0,0-1.35-1.35h-1.35V17.6h5.4A1.789,1.789,0,0,0,21.254,15.732Zm-5.738,3.222a.675.675,0,0,1,.675.675H6.065a.675.675,0,0,1,.675-.675Zm-6.751-.675V17.6h4.725v.675Zm10.8-1.35H2.69a1.118,1.118,0,0,1-1.013-1.2V14.9h18.9v.828A1.118,1.118,0,0,1,19.566,16.929Zm1.013-15v12.3H1.677V1.925A1.118,1.118,0,0,1,2.69.728H19.566A1.118,1.118,0,0,1,20.579,1.925Z"
                                                transform="translate(-1 -0.053)" fill="url(#linear-gradient)" />
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            <span data-key="t-landing">Dashboard</span>
                        </div>

                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="#attendanceDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRoles">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.022" height="17.411"
                                viewBox="0 0 16.022 17.411">
                                <g id="Group_34125" data-name="Group 34125" transform="translate(-31.989 -162.122)">
                                    <path id="Path_15916" data-name="Path 15916"
                                        d="M13.6,5.69h.574a2.488,2.488,0,0,1,2.595,2.365V19.292a2.488,2.488,0,0,1-2.595,2.365H4.145A2.488,2.488,0,0,1,1.55,19.292V8.055A2.488,2.488,0,0,1,4.145,5.69h.574"
                                        transform="translate(30.839 157.477)" fill="none" stroke="#500505"
                                        stroke-linecap="round" stroke-miterlimit="10" stroke-width="0.8" />
                                    <g id="Group_34123" data-name="Group 34123" transform="translate(35.955 162.472)">
                                        <ellipse id="Ellipse_1161" data-name="Ellipse 1161" cx="1.611" cy="1.611"
                                            rx="1.611" ry="1.611" transform="translate(2.486 0)" fill="none"
                                            stroke="#500505" stroke-linecap="round" stroke-miterlimit="10"
                                            stroke-width="0.7" />
                                        <line id="Line_6" data-name="Line 6" x2="8.104" transform="translate(0 3.223)"
                                            fill="none" stroke="#500505" stroke-linecap="round" stroke-miterlimit="10"
                                            stroke-width="0.7" />
                                    </g>
                                    <g id="Group_34124" data-name="Group 34124" transform="translate(36.747 169.388)">
                                        <ellipse id="Ellipse_1162" data-name="Ellipse 1162" cx="1.673" cy="1.673"
                                            rx="1.673" ry="1.673" transform="translate(1.755 0)" fill="none"
                                            stroke="#500505" stroke-linecap="round" stroke-miterlimit="10"
                                            stroke-width="0.7" />
                                        <path id="Path_15917" data-name="Path 15917"
                                            d="M20.737,57.8H13.93c0-1.341.56-2.427,1.249-2.43h4.309c.689,0,1.248,1.089,1.249,2.43"
                                            transform="translate(-13.93 -50.788)" fill="none" stroke="#500505"
                                            stroke-linecap="round" stroke-miterlimit="10" stroke-width="0.7" />
                                    </g>
                                </g>
                            </svg>

                            <span>Attendance</span>
                        </div>

                    </a>
                    <div class="collapse menu-dropdown" id="attendanceDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Leave </a>
                                <div class="collapse menu-dropdown" id="settingsDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <input type="date" class="form-control">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link py-1" role="button"><span>
                                        Attendance </span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link py-1" role="button"><span>
                                        Timesheet </span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link py-1" role="button"><span>
                                        Performance </span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt_noData')}}" class="nav-link py-1" role="button"><span>Expenses &
                                        Trevel</span></a>
                            </li>

                            <!-- <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" role="button"><span>
                                        Expenses & Travel </span> </a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1"
                                    data-bs-toggle="collapse"><span>My Report</span>

                                </a>
                                <div class="collapse menu-dropdown" id="settingsDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">

                                            <a href="{{url('vmt-general-settings')}}" class="nav-link py-1">
                                                <span>In/ Out Punch Reports</span>
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('vmt-general-settings')}}" class="nav-link py-1">

                                                <span>Leave Balance</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">

                                            <a href="{{url('vmt-general-settings')}}" class="nav-link py-1">
                                                <span>Holiday List</span>
                                            </a>
                                            <div class="collapse menu-dropdown" id="settingsDrop-Down">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{url('vmt-general-settings')}}" class="nav-link">

                                                            <div class="">

                                                                <input type="date" class="form-control"
                                                                    id="displayName">


                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </li>

                @hasrole("Admin")
                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="#reportDrop-Down" data-bs-toggle="collapse" role="button"

                        aria-expanded="false" aria-controls="sidebarRoles">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center ">
                            <svg id="laptop" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="22.596" height="22.596"
                                viewBox="0 0 22.596 22.596">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#3d016c" />
                                        <stop offset="1" stop-color="#181619" />
                                    </linearGradient>
                                </defs>
                                <path id="Path_624" data-name="Path 624" d="M48,448h.729v.729H48Zm0,0"
                                    transform="translate(-45.813 -427.591)" fill="url(#linear-gradient)" />
                                <path id="Path_625" data-name="Path 625" d="M80,448h.729v.729H80Zm0,0"
                                    transform="translate(-76.356 -427.591)" fill="url(#linear-gradient)" />
                                <path id="Path_626" data-name="Path 626" d="M112,448h.729v.729H112Zm0,0"
                                    transform="translate(-106.898 -427.591)" fill="url(#linear-gradient)" />
                                <path id="Path_627" data-name="Path 627" d="M384,448h2.916v.729H384Zm0,0"
                                    transform="translate(-366.507 -427.591)" fill="url(#linear-gradient)" />
                                <path id="Path_628" data-name="Path 628"
                                    d="M21.867,18.951V6.924A1.824,1.824,0,0,0,20.045,5.1H18.951a5.1,5.1,0,0,0-10.2,0h-6.2A1.824,1.824,0,0,0,.729,6.924V18.951H0v1.822A1.824,1.824,0,0,0,1.822,22.6H20.773A1.824,1.824,0,0,0,22.6,20.773V18.951ZM20.045,5.831a1.1,1.1,0,0,1,1.093,1.093V18.951h-.729V7.289a.73.73,0,0,0-.729-.729h-.944a5.066,5.066,0,0,0,.157-.729ZM9.687,3.763l3.868,1.612L14.88,9.348A4.367,4.367,0,0,1,9.687,3.763ZM15.572,9.12,14.266,5.2l2.919-2.919A4.365,4.365,0,0,1,15.572,9.12ZM13.849.729A4.353,4.353,0,0,1,16.67,1.766L13.764,4.672,9.97,3.091A4.374,4.374,0,0,1,13.849.729ZM1.458,6.925A1.1,1.1,0,0,1,2.551,5.831H8.805a5.019,5.019,0,0,0,.157.729H2.916a.73.73,0,0,0-.729.729V18.951H1.458ZM21.867,20.773a1.1,1.1,0,0,1-1.093,1.093H1.822A1.1,1.1,0,0,1,.729,20.773V19.68H8.237a2.832,2.832,0,0,0,1.9.729h2.312a2.832,2.832,0,0,0,1.9-.729h4.592v-.729H14.062l-.107.107a2.11,2.11,0,0,1-1.5.622H10.142a2.11,2.11,0,0,1-1.5-.622l-.106-.107H2.916V7.289h6.33a5.091,5.091,0,0,0,9.206,0H19.68V19.68h2.187Zm0,0"
                                    fill="url(#linear-gradient)" />
                                <path id="Path_629" data-name="Path 629"
                                    d="M94.213,290.187a1.087,1.087,0,0,0-.605.184l-1.271-.953a1.077,1.077,0,0,0,.055-.324,1.093,1.093,0,1,0-2.187,0,1.082,1.082,0,0,0,.064.356l-2.041,1.633a1.072,1.072,0,0,0-1.226.054l-1.572-1.048a1.069,1.069,0,0,0,.037-.266,1.093,1.093,0,0,0-2.187,0,1.069,1.069,0,0,0,.037.266l-1.572,1.048a1.082,1.082,0,0,0-.652-.221,1.093,1.093,0,1,0,1.093,1.093,1.069,1.069,0,0,0-.037-.266l1.571-1.048a1.073,1.073,0,0,0,1.3,0l1.571,1.048a1.071,1.071,0,0,0-.037.266,1.093,1.093,0,1,0,2.187,0,1.082,1.082,0,0,0-.064-.356l2.041-1.633A1.079,1.079,0,0,0,91.9,290l1.271.953a1.077,1.077,0,0,0-.055.324,1.093,1.093,0,1,0,1.093-1.093Zm-13.12,2.187a.364.364,0,1,1,.364-.364A.365.365,0,0,1,81.093,292.373Zm3.28-2.187a.364.364,0,1,1,.364-.364A.365.365,0,0,1,84.373,290.187Zm3.28,2.187a.364.364,0,1,1,.364-.364A.365.365,0,0,1,87.653,292.373Zm3.644-2.916a.364.364,0,1,1,.364-.364A.365.365,0,0,1,91.3,289.458Zm2.916,2.187a.364.364,0,1,1,.364-.364A.365.365,0,0,1,94.213,291.644Zm0,0"
                                    transform="translate(-76.355 -274.88)" fill="url(#linear-gradient)" />
                                <path id="Path_630" data-name="Path 630"
                                    d="M85.831,176H80v5.1h5.831Zm-.729,4.373H80.729v-3.644H85.1Zm0,0"
                                    transform="translate(-76.356 -167.982)" fill="url(#linear-gradient)" />
                                <path id="Path_631" data-name="Path 631" d="M112,208h2.916v.729H112Zm0,0"
                                    transform="translate(-106.898 -198.524)" fill="url(#linear-gradient)" />
                                <path id="Path_632" data-name="Path 632" d="M112,240h2.916v.729H112Zm0,0"
                                    transform="translate(-106.898 -229.067)" fill="url(#linear-gradient)" />
                                <path id="Path_633" data-name="Path 633" d="M224,256h.729v.729H224Zm0,0"
                                    transform="translate(-213.795 -244.338)" fill="url(#linear-gradient)" />
                                <path id="Path_634" data-name="Path 634" d="M256,256h7.289v.729H256Zm0,0"
                                    transform="translate(-244.338 -244.338)" fill="url(#linear-gradient)" />
                            </svg>
                            <span>My
                                Report</span>
                        </div>

                    </a>
                    <div class="collapse menu-dropdown" id="reportDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link  py-1"><span> Leave Report
                                    </span></a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link py-1"><span> Attendance Report
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif


                @hasrole("Admin")
                <li class="nav-item">

                    <a class="nav-link menu-link d-flex" href="#ORG-Drop-Down" data-bs-toggle="collapse" role="button">
                    <hr class="vertical-line">
                    <div class="d-flex flex-column align-items-center justify-content-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="22.365" height="22.365" viewBox="0 0 22.365 22.365">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.261" y1="0.06" x2="1" y2="1.058"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#350039" />
                                        <stop offset="1" stop-color="#4b1717" />
                                    </linearGradient>
                                </defs>
                                <g id="crm" transform="translate(-1 -1)">
                                    <path id="Path_539" data-name="Path 539"
                                        d="M21.427,18.953a2.16,2.16,0,0,0-.947-3.852v-.393a1.806,1.806,0,0,0-1.8-1.8H12.543V11.59a1.118,1.118,0,0,0,1.8-.854,1.123,1.123,0,0,0,1.082-1.082,1.123,1.123,0,0,0,1.082-1.082,1.124,1.124,0,0,0,.756-1.918l-.075-.075a3.42,3.42,0,0,0-5.006-4.639A3.418,3.418,0,0,0,7.358,6.78a1.118,1.118,0,0,0,.861,1.791A1.123,1.123,0,0,0,9.3,9.654a1.123,1.123,0,0,0,1.082,1.082,1.108,1.108,0,0,0,1.439,1.036V12.9H5.689a1.806,1.806,0,0,0-1.8,1.8V15.1a2.16,2.16,0,0,0-.947,3.852A3.25,3.25,0,0,0,1,21.922v1.443H7.493V21.922a3.25,3.25,0,0,0-1.939-2.969A2.16,2.16,0,0,0,4.607,15.1v-.393a1.084,1.084,0,0,1,1.082-1.082h6.132V15.1a2.16,2.16,0,0,0-.947,3.852,3.25,3.25,0,0,0-1.939,2.969v1.443h6.493V21.922a3.25,3.25,0,0,0-1.939-2.969,2.16,2.16,0,0,0-.947-3.852V13.626h6.132a1.084,1.084,0,0,1,1.082,1.082V15.1a2.16,2.16,0,0,0-.947,3.852,3.25,3.25,0,0,0-1.939,2.969v1.443h6.493V21.922a3.25,3.25,0,0,0-1.939-2.969ZM14.533,1.721a2.7,2.7,0,0,1,2.141,4.341L15.015,4.4a2.913,2.913,0,0,0,.309-.263l-.51-.51a2.09,2.09,0,0,1-1.487.616h-.572l-.616.616a.359.359,0,0,1-.255.106H10.528a.149.149,0,0,1-.106-.255l2.2-2.2a2.683,2.683,0,0,1,1.909-.791Zm-4.7,0a2.679,2.679,0,0,1,1.836.725L9.912,4.2a.871.871,0,0,0,.616,1.487h1.355a1.076,1.076,0,0,0,.765-.317l.4-.4h.273a2.82,2.82,0,0,0,1.035-.2l2.392,2.392a.4.4,0,0,1-.572.572l-.858-.858-.51.51.858.858a.4.4,0,0,1-.572.572l-.858-.858-.51.51.858.858a.4.4,0,0,1-.572.572l-.858-.858-.51.51.858.858a.4.4,0,0,1-.572.572l-.12-.12a1.122,1.122,0,0,0-1-1.561,1.123,1.123,0,0,0-1.082-1.082A1.123,1.123,0,0,0,9.654,7.136,1.125,1.125,0,0,0,8.532,6.05a1.113,1.113,0,0,0-.663.22A2.7,2.7,0,0,1,9.832,1.721ZM7.854,7.449a.4.4,0,0,1,.118-.286l.273-.273a.4.4,0,0,1,.572.572l-.273.273a.4.4,0,0,1-.69-.286ZM8.936,8.532a.4.4,0,0,1,.118-.286l.273-.273a.4.4,0,0,1,.572.572l-.273.273a.4.4,0,0,1-.69-.286Zm1.082,1.082a.4.4,0,0,1,.118-.286l.273-.273a.4.4,0,0,1,.572.572l-.273.273a.4.4,0,0,1-.69-.286ZM11.5,11.1a.4.4,0,0,1-.286-.69l.273-.273a.4.4,0,0,1,.572.572l-.273.273A.4.4,0,0,1,11.5,11.1ZM6.772,21.922v.721H6.05V21.2H5.329v1.443H3.164V21.2H2.443v1.443H1.721v-.721a2.525,2.525,0,1,1,5.05,0ZM5.689,17.233A1.443,1.443,0,1,1,4.247,15.79,1.444,1.444,0,0,1,5.689,17.233Zm9.018,4.689v.721h-.721V21.2h-.721v1.443H11.1V21.2h-.721v1.443H9.658v-.721a2.525,2.525,0,1,1,5.05,0Zm-1.082-4.689a1.443,1.443,0,1,1-1.443-1.443A1.444,1.444,0,0,1,13.626,17.233Zm5.05,0a1.443,1.443,0,1,1,1.443,1.443A1.444,1.444,0,0,1,18.676,17.233Zm3.968,5.411h-.721V21.2H21.2v1.443H19.036V21.2h-.721v1.443h-.721v-.721a2.525,2.525,0,0,1,5.05,0Z"
                                        fill="url(#linear-gradient)" />
                                    <path id="Path_540" data-name="Path 540" d="M38,38h.721v.721H38Z"
                                        transform="translate(-23.653 -23.653)" fill="url(#linear-gradient)" />
                                    <path id="Path_541" data-name="Path 541" d="M42,38h.721v.721H42Z"
                                        transform="translate(-26.21 -23.653)" fill="url(#linear-gradient)" />
                                    <path id="Path_542" data-name="Path 542" d="M46,38h.721v.721H46Z"
                                        transform="translate(-28.767 -23.653)" fill="url(#linear-gradient)" />
                                    <path id="Path_543" data-name="Path 543" d="M16,38h.721v.721H16Z"
                                        transform="translate(-9.589 -23.653)" fill="url(#linear-gradient)" />
                                    <path id="Path_544" data-name="Path 544" d="M20,38h.721v.721H20Z"
                                        transform="translate(-12.146 -23.653)" fill="url(#linear-gradient)" />
                                    <path id="Path_545" data-name="Path 545" d="M24,38h.721v.721H24Z"
                                        transform="translate(-14.703 -23.653)" fill="url(#linear-gradient)" />
                                </g>
                            </svg>

                            <span>Org</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="ORG-Drop-Down">
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
                            <!-- <li class="nav-item ">
                                <a href="{{url('vmt_clientOnboarding')}}" id="" class="nav-link py-1" aria-expanded="false"><span>Client On-Boarding</span> </a>
                            </li> -->
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
                @endif

                <!-- performance -->

                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="#reportDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="22.8" height="23.896" viewBox="0 0 22.8 23.896">
                                <defs>
                                    <linearGradient id="linear-gradient" y1="-0.198" x2="1" y2="1.223"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#11bb2d" />
                                        <stop offset="1" stop-color="#232020" />
                                    </linearGradient>
                                </defs>
                                <g id="Goals" transform="translate(0 -0.001)">
                                    <path id="Path_15919" data-name="Path 15919"
                                        d="M24.5,19.839l-.019-.035c-.077-.158-.166-.3-.255-.455l-.17-.278h0c-.1-.147-.216-.3-.336-.44l-.054-.062-.386.425-.436.467.911.189h0c.089.147.174.293.251.448l-.772-.154h0l.081.135a3.112,3.112,0,0,1,.151.274,5.172,5.172,0,0,1,.567,2.374,5.257,5.257,0,1,1-5.265-5.249,5.2,5.2,0,0,1,1.637.262,3.292,3.292,0,0,1,.386.143l-.22-.7a3.859,3.859,0,0,1,.459.17l.278.892.482-.5.386-.428-.1-.066a5.909,5.909,0,0,0-.822-.421c-.17-.069-.317-.127-.452-.17l-.058-.019a6.419,6.419,0,1,0,3.744,3.208Z"
                                        transform="translate(-7.577 -10.022)" fill="url(#linear-gradient)" />
                                    <path id="Path_15920" data-name="Path 15920"
                                        d="M21.148,9.97l-.845.923a9.9,9.9,0,0,1,.942,4.246A10.036,10.036,0,1,1,11.209,5.1a9.862,9.862,0,0,1,2.652.359l.872-.977a11.032,11.032,0,0,0-3.54-.575,11.174,11.174,0,1,0,9.955,6.06Z"
                                        transform="translate(0 -2.4)" fill="url(#linear-gradient)" />
                                    <path id="Path_15921" data-name="Path 15921" d="M37.951,18.78l-.031.035.031.05Z"
                                        transform="translate(-23.283 -11.531)" fill="url(#linear-gradient)" />
                                    <path id="Path_15922" data-name="Path 15922"
                                        d="M37.089,20.5l-.436.467.911.189A5.55,5.55,0,0,0,37.089,20.5ZM36.078,18.78l-.031.035.031.05Zm-1.208.085.278.892.479-.506A5.558,5.558,0,0,0,34.87,18.865Z"
                                        transform="translate(-21.411 -11.531)" fill="url(#linear-gradient)" />
                                    <path id="Path_15923" data-name="Path 15923"
                                        d="M37.089,20.5l-.436.467.911.189A5.55,5.55,0,0,0,37.089,20.5ZM36.078,18.78l-.031.035.031.05Zm-1.208.085.278.892.479-.506A5.558,5.558,0,0,0,34.87,18.865Z"
                                        transform="translate(-21.411 -11.531)" fill="url(#linear-gradient)" />
                                    <path id="Path_15924" data-name="Path 15924"
                                        d="M39.3,4.632a.973.973,0,0,0-.629-.683l-1.339-.475-.386-.135-.695-.228a.575.575,0,0,1-.347-.336h0L35.75,2.39,35.056.622a.957.957,0,0,0-.71-.6.969.969,0,0,0-.9.289l-1.787,1.93-.849.907-1.2,1.289a.977.977,0,0,0-.228.969l.386,1.235c.135.042.282.1.452.17a5.909,5.909,0,0,1,.826.409l.1.066.031-.035-.664-2.1L31.956,3.6l.826-.9,1.312-1.4.73,1.9a.475.475,0,0,0,.046.1l-.282.3-.143.158-.8.853L31.478,6.921l-.3.32.019.093-.05-.031-.386.428-.494.49-.3.324L27.178,11.53a.965.965,0,0,0,.046,1.363.946.946,0,0,0,.656.259.961.961,0,0,0,.706-.3l2.876-3.088.309-.332.436-.467.386-.425.054.062c.12.143.232.293.336.44h0l.17.278c.089.151.178.3.255.455l.876.189a.8.8,0,0,0,.193.023.977.977,0,0,0,.714-.313L36.65,8.106l.834-.892,1.575-1.687A.969.969,0,0,0,39.3,4.632ZM36.847,6.211l-.807.865L34.419,8.813,32.7,8.458l.309-.332L35.1,5.895l.772-.849.3-.32.289-.309L38,4.949Z"
                                        transform="translate(-16.528 0)" fill="url(#linear-gradient)" />
                                    <path id="Path_15925" data-name="Path 15925"
                                        d="M35.678,17.82l-.386.428a5.559,5.559,0,0,0-.772-.386l-.22-.7c.135.042.282.1.452.17a5.909,5.909,0,0,1,.822.425Z"
                                        transform="translate(-21.061 -10.536)" fill="url(#linear-gradient)" />
                                    <path id="Path_15926" data-name="Path 15926"
                                        d="M41.854,23.375l-.749-.154h0a5.551,5.551,0,0,0-.475-.656l.386-.425.054.062c.12.143.232.293.336.44h0l.17.278A2.824,2.824,0,0,1,41.854,23.375Z"
                                        transform="translate(-24.947 -13.594)" fill="url(#linear-gradient)" />
                                </g>
                            </svg>
                            <span>Performance</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="reportDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt-pms-assigngoals')}}"
                                    class="nav-link py-1"><span>Dashboard</span></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"><span>KPI Table</span>
                                </a>
                                <div class="collapse menu-dropdown" id="settingsDrop-Down">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{url('vmt_uploadApraisalQuestion')}}" class="nav-link py-1">
                                                <span>Create KPI Table</span>
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('vmt-apraisal-questions')}}" class="nav-link py-1">

                                                <span>View KPI Table</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('#')}}" class="nav-link py-1">

                                                <span>Assign KPI Table</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                            <!-- @can('Self_Appraisal')
                            <li class="nav-item">
                                <a href="{{url('vmt_appraisalreview')}}" class="nav-link py-1" role="button"><span>Self
                                        Appraisal Review</span></a>
                            </li>
                            @endcan
                            @can('Team')
                            <li class="nav-item">
                                <a href="{{url('vmt_appraisalreview')}}" class="nav-link py-1" role="button"><span>Team
                                        Appraisal Review</span></a>
                            </li>
                            @endcan
                            @can('ORG')
                            <li class="nav-item">
                                <a href="{{url('vmt_appraisalreview')}}" class="nav-link py-1" role="button"><span>Org
                                        Appraisal Review</span></a>
                            </li>
                            @endcan -->
                            @can('360_Degree_Review')
                            <li class="nav-item">
                                <a href="{{url('vmt_360review')}}" class="nav-link py-1" role="button"><span>360 Degree
                                        Review</span></a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                @hasrole("Manager")
                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="#reportDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center ">
                            <img src="{{ URL::asset('assets/images/performance.png') }}" alt=""
                                class="m-2"><span>Team</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="reportDrop-Down">
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
                @endif


                <!-- payroll -->
                <!-- <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="#reportDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <div class="d-flex flex-column align-items-center justify-content-center ">
                        <img src="{{ URL::asset('assets/images/payroll.png') }}" alt="" class="m-2"><span>Payroll</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="reportDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('vmt-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Payroll Analytics</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1"><span>Run Payroll</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Payroll Admin</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Component Claims</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Loans</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Perks</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Reports</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Form 16</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vmt-assign-roles')}}" class="nav-link py-1" data-bs-toggle="collapse"
                                    role="button"><span>Employee Information</span></a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                @hasrole("Admin")
                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" href="{{url('index')}}">
                    <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="23" height="23" viewBox="0 0 23 23">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#805e02" />
                                        <stop offset="1" stop-color="#3f3d3d" />
                                    </linearGradient>
                                    <linearGradient id="linear-gradient-12" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#7b5b05" />
                                        <stop offset="1" stop-color="#545454" />
                                    </linearGradient>
                                </defs>
                                <g id="supplier" transform="translate(-1 -1)">
                                    <path id="Path_546" data-name="Path 546"
                                        d="M45.532,24.935a1.107,1.107,0,0,0-.377.07A2.413,2.413,0,0,0,43.9,23a2.225,2.225,0,1,0-2.53.1,2.594,2.594,0,0,0-1.215,1.978L40,26.79H38.113a1.113,1.113,0,1,0,0,2.226h.2a2.217,2.217,0,0,0-.568,1.484v3.524a1.3,1.3,0,0,0,2.6,0V32.355h1.484v2.226H40.339v.742h5.194v-.742H44.048V32.329a2.971,2.971,0,0,0,2.6-2.942V26.048A1.114,1.114,0,0,0,45.532,24.935Zm-4.452-3.71a1.484,1.484,0,1,1,1.484,1.484A1.485,1.485,0,0,1,41.081,21.226ZM39.6,31.242v2.782a.556.556,0,0,1-1.113,0V30.5a1.485,1.485,0,0,1,1.484-1.484h.5a1.845,1.845,0,0,0,1.847-1.687l.248-2.731-.739-.068-.248,2.731a1.107,1.107,0,0,1-1.108,1.012H38.113a.371.371,0,0,1,0-.742H40a.739.739,0,0,0,.739-.674l.155-1.711a1.854,1.854,0,0,1,1.856-1.695,1.671,1.671,0,0,1,1.669,1.669v3.524a1.485,1.485,0,0,1-1.484,1.484H40.71A1.114,1.114,0,0,0,39.6,31.242Zm3.71,3.339h-.742V32.355h.742Zm2.6-5.194a2.228,2.228,0,0,1-2.226,2.226H40.339v-.371a.371.371,0,0,1,.371-.371h2.226a2.228,2.228,0,0,0,2.226-2.226v-2.6a.371.371,0,1,1,.742,0Z"
                                        transform="translate(-22.645 -11.323)" fill="url(#linear-gradient)" />
                                    <path id="Path_547" data-name="Path 547"
                                        d="M9.532,26.79H7.646L7.49,25.079A2.594,2.594,0,0,0,6.276,23.1a2.227,2.227,0,1,0-2.53-.1,2.413,2.413,0,0,0-1.255,2,1.1,1.1,0,0,0-.377-.07A1.114,1.114,0,0,0,1,26.048v3.339a2.971,2.971,0,0,0,2.6,2.942v2.251H2.113v.742H7.306v-.742H5.823V32.355H7.306v1.669a1.3,1.3,0,0,0,2.6,0V30.5a2.217,2.217,0,0,0-.568-1.484h.2a1.113,1.113,0,1,0,0-2.226ZM3.6,21.226A1.484,1.484,0,1,1,5.081,22.71,1.485,1.485,0,0,1,3.6,21.226ZM5.081,34.581H4.339V32.355h.742Zm2.226-2.968H3.968a2.228,2.228,0,0,1-2.226-2.226V26.048a.371.371,0,1,1,.742,0v2.6A2.228,2.228,0,0,0,4.71,30.871H6.935a.371.371,0,0,1,.371.371Zm2.226-3.339H7.178A1.107,1.107,0,0,1,6.07,27.262l-.248-2.731-.739.068.248,2.731a1.845,1.845,0,0,0,1.847,1.687h.5A1.485,1.485,0,0,1,9.161,30.5v3.524a.556.556,0,0,1-1.113,0V31.242a1.114,1.114,0,0,0-1.113-1.113H4.71a1.485,1.485,0,0,1-1.484-1.484V25.121A1.671,1.671,0,0,1,4.9,23.452a1.854,1.854,0,0,1,1.856,1.695l.155,1.711a.739.739,0,0,0,.739.675H9.532a.371.371,0,0,1,0,.742Z"
                                        transform="translate(0 -11.323)" fill="url(#linear-gradient)" />
                                    <path id="Path_548" data-name="Path 548"
                                        d="M26.935,8.711a4.081,4.081,0,1,0-3.71,0V14.1l1.855,2.782L26.935,14.1Zm-5.194-3.63a3.339,3.339,0,1,1,3.339,3.339,3.343,3.343,0,0,1-3.339-3.339ZM23.968,9a4.077,4.077,0,0,0,.742.139v4.47h-.742Zm1.113,6.538-.791-1.186h1.581Zm1.113-1.928h-.742V9.142A4.014,4.014,0,0,0,26.194,9Z"
                                        transform="translate(-12.581)" fill="url(#linear-gradient)" />
                                    <path id="Path_549" data-name="Path 549"
                                        d="M51.677,8.855A1.857,1.857,0,0,0,49.823,7H46.855A1.857,1.857,0,0,0,45,8.855V10.71h4.823A1.857,1.857,0,0,0,51.677,8.855Zm-5.935,0a1.114,1.114,0,0,1,1.113-1.113h2.968a1.113,1.113,0,1,1,0,2.226H45.742Z"
                                        transform="translate(-27.677 -3.774)" fill="url(#linear-gradient)" />
                                    <path id="Path_550" data-name="Path 550" d="M49,11h.742v.742H49Z"
                                        transform="translate(-30.194 -6.29)" fill="url(#linear-gradient)" />
                                    <path id="Path_551" data-name="Path 551" d="M53,11h.742v.742H53Z"
                                        transform="translate(-32.71 -6.29)" fill="url(#linear-gradient)" />
                                    <path id="Path_552" data-name="Path 552" d="M57,11h.742v.742H57Z"
                                        transform="translate(-35.226 -6.29)" fill="url(#linear-gradient)" />
                                    <path id="Path_553" data-name="Path 553"
                                        d="M2.855,10.71H7.677V8.855A1.857,1.857,0,0,0,5.823,7H2.855a1.855,1.855,0,1,0,0,3.71Zm0-2.968H5.823A1.114,1.114,0,0,1,6.935,8.855V9.968H2.855a1.113,1.113,0,1,1,0-2.226Z"
                                        transform="translate(0 -3.774)" fill="url(#linear-gradient)" />
                                    <path id="Path_554" data-name="Path 554" d="M13,11h.742v.742H13Z"
                                        transform="translate(-7.548 -6.29)" fill="url(#linear-gradient)" />
                                    <path id="Path_555" data-name="Path 555" d="M9,11h.742v.742H9Z"
                                        transform="translate(-5.032 -6.29)" fill="url(#linear-gradient)" />
                                    <path id="Path_556" data-name="Path 556" d="M5,11h.742v.742H5Z"
                                        transform="translate(-2.516 -6.29)" fill="url(#linear-gradient)" />
                                    <path id="rupee"
                                        d="M1.82.693V.9a.062.062,0,0,1-.065.065h-.34a.757.757,0,0,1-.261.474,1.028,1.028,0,0,1-.559.223q.338.361.93,1.086a.055.055,0,0,1,.008.069.059.059,0,0,1-.059.036h-.4a.06.06,0,0,1-.051-.024Q.407,2.085.018,1.672A.061.061,0,0,1,0,1.627V1.37a.062.062,0,0,1,.019-.046.062.062,0,0,1,.046-.019H.292a.915.915,0,0,0,.431-.087A.4.4,0,0,0,.93.965H.065A.062.062,0,0,1,0,.9V.693A.062.062,0,0,1,.065.628H.9Q.786.4.359.4H.065A.062.062,0,0,1,.019.38.062.062,0,0,1,0,.334V.065A.062.062,0,0,1,.065,0H1.751a.062.062,0,0,1,.065.065V.272a.062.062,0,0,1-.065.065H1.279a.7.7,0,0,1,.13.292h.347A.062.062,0,0,1,1.82.693Z"
                                        transform="translate(11.627 3.712)" fill="url(#linear-gradient-12)" />
                                </g>
                            </svg>

                            <span>Paycheck</span>
                        </div>

                    </a>
                    <div class="collapse menu-dropdown" id="reportDrop-Down">
                        <ul class="nav nav-sm flex-column">


                            <li class="nav-item">
                                <a href="{{url('vmt_home')}}" class="nav-link py-1" role="button"><span>Home</span></a>
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
                @endif


                <!-- Navigation Menu for Ticketting-->
                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" id="employeeInfo" href="#ticketingDrop-Down"

                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebar360questions">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="25.75" height="25.75" viewBox="0 0 25.75 25.75">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#5b036d" />
                                        <stop offset="1" stop-color="#2e2626" />
                                    </linearGradient>
                                </defs>
                                <g id="checklist" transform="translate(0 0)">
                                    <path id="Path_599" data-name="Path 599"
                                        d="M18.3,13.29a1.241,1.241,0,0,1,.691.209l2.9,1.934a2.074,2.074,0,0,0,1.152.349H25.75v-.831H23.045a1.243,1.243,0,0,1-.692-.209l-1.172-.781V0H5.4V2.492H0V25.75H15.782V23.258h5.4V19.764c.026-.006.053-.008.079-.015l1.932-.483A5.406,5.406,0,0,1,24.5,19.1H25.75v-.831H24.5a6.247,6.247,0,0,0-1.513.186l-1.932.483a5.431,5.431,0,0,1-3.02-.116l-.7-.233a6.227,6.227,0,0,0-1.972-.32H11.743a1.248,1.248,0,0,1,1.246-1.246h4.569a1.243,1.243,0,0,0,.146-2.477l.341-1.261Zm-.525,6.325a6.217,6.217,0,0,0,1.972.32c.2,0,.4-.017.6-.037v2.529H15.782V21.069a1.5,1.5,0,0,0,.319-.592l.34-1.26a5.36,5.36,0,0,1,.634.165Zm-2.166-.5L15.3,20.26a.686.686,0,0,1-.661.506H14.5a.684.684,0,0,1-.661-.863l.216-.8h1.308c.081,0,.162.006.243.01ZM13.2,19.1l-.157.581a1.505,1.505,0,0,0,.713,1.7l-.13.521.806.2.129-.516h.08a1.509,1.509,0,0,0,.313-.037v3.359H.831V3.322h5.4V.83H20.351V13.407l-.9-.6A2.073,2.073,0,0,0,18.3,12.46h-.032L20,6.064a1.516,1.516,0,0,0-1.463-1.911H18.4a1.518,1.518,0,0,0-1.463,1.12L15.782,9.545V2.492H7.061v.831h7.891V12.46h-.859a2.054,2.054,0,0,0-1.234.415H8.722v.831h3.264l-.831.831H8.722v.831h1.6l-.694.694a1.289,1.289,0,0,0,1.288,2.153c0,.02-.006.04-.006.06a.831.831,0,0,0,.831.831ZM16.4,16.2H14.845L16.6,9.708l1.425.475Zm-3.186-2.543a1.256,1.256,0,0,1,.881-.365h.678l-.339,1.253a2.058,2.058,0,0,0-1.392.6l-2.163,2.163a.466.466,0,0,1-.8-.329.463.463,0,0,1,.137-.329Zm.415,2.077a1.252,1.252,0,0,1,.57-.32l-.212.786h-.823Zm5.568-9.884-.509,1.882-1.425-.475.477-1.764a.686.686,0,0,1,.661-.506h.135a.685.685,0,0,1,.661.863Zm-2.15,2.21,1.425.475-.229.848-1.425-.475Zm.512,7.309a.415.415,0,0,1,0,.831h-.3l.225-.831Zm0,0"
                                        fill="url(#linear-gradient)" />
                                    <path id="Path_600" data-name="Path 600"
                                        d="M42.8,80H32v4.153H42.8Zm-.831,3.323H32.831V80.831h9.137Zm0,0"
                                        transform="translate(-30.339 -75.847)" fill="url(#linear-gradient)" />
                                    <path id="Path_601" data-name="Path 601" d="M64,112h.831v.831H64Zm0,0"
                                        transform="translate(-60.677 -106.186)" fill="url(#linear-gradient)" />
                                    <path id="Path_602" data-name="Path 602" d="M96,112h.831v.831H96Zm0,0"
                                        transform="translate(-91.016 -106.186)" fill="url(#linear-gradient)" />
                                    <path id="Path_603" data-name="Path 603" d="M128,112h.831v.831H128Zm0,0"
                                        transform="translate(-121.355 -106.186)" fill="url(#linear-gradient)" />
                                    <path id="Path_604" data-name="Path 604" d="M160,112h.831v.831H160Zm0,0"
                                        transform="translate(-151.694 -106.186)" fill="url(#linear-gradient)" />
                                    <path id="Path_605" data-name="Path 605" d="M192,112h.831v.831H192Zm0,0"
                                        transform="translate(-182.032 -106.186)" fill="url(#linear-gradient)" />
                                    <path id="Path_606" data-name="Path 606"
                                        d="M36.984,210.492h-.831v1.661H32.831v-3.323h2.492V208H32v4.984h4.984Zm0,0"
                                        transform="translate(-30.339 -197.202)" fill="url(#linear-gradient)" />
                                    <path id="Path_607" data-name="Path 607"
                                        d="M63.328,178.344l-3.86,3.86-.537-.537-.587.587,1.124,1.124,4.447-4.447Zm0,0"
                                        transform="translate(-55.315 -169.085)" fill="url(#linear-gradient)" />
                                    <path id="Path_608" data-name="Path 608"
                                        d="M36.153,348.153H32.831v-3.323h2.492V344H32v4.984h4.984v-2.492h-.831Zm0,0"
                                        transform="translate(-30.339 -326.141)" fill="url(#linear-gradient)" />
                                    <path id="Path_609" data-name="Path 609"
                                        d="M58.931,317.667l-.587.587,1.124,1.124,4.447-4.447-.587-.587-3.86,3.86Zm0,0"
                                        transform="translate(-55.315 -298.025)" fill="url(#linear-gradient)" />
                                    <path id="Path_610" data-name="Path 610" d="M256,440h.831v.831H256Zm0,0"
                                        transform="translate(-242.71 -417.157)" fill="url(#linear-gradient)" />
                                    <path id="Path_611" data-name="Path 611" d="M152,440h4.569v.831H152Zm0,0"
                                        transform="translate(-144.109 -417.157)" fill="url(#linear-gradient)" />
                                    <path id="Path_612" data-name="Path 612" d="M168,216h5.4v.831H168Zm0,0"
                                        transform="translate(-159.278 -204.786)" fill="url(#linear-gradient)" />
                                </g>
                            </svg>

                            <span>Ticketing</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="ticketingDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="" class="nav-link py-1" role="button"
                                    aria-expanded="false"><span> Raise
                                        Ticket </span> </a>

                            </li>
                            <li class="nav-item ">
                                <a href="{{url('vmt_noData')}}" id="tds" role="button" aria-expanded="false"
                                    class="nav-link py-1"><span>Ticket Status </span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                @hasrole("Admin")
                @else
                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" role="button">
                        <div class="d-flex flex-column align-items-center justify-content-center ">
                            <img src="{{ URL::asset('assets/images/ticketing.png') }}" alt="" class="m-2">
                            <span>Documents</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="ticketingDrop-Down">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="" id="" class="nav-link py-1" aria-expanded="false"><span> Personal Documents
                                    </span> </a>
                            </li>
                            <li class="nav-item ">
                                <a href="" id="tds" aria-expanded="false" class="nav-link py-1"><span>Official Documents
                                    </span></a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                @endhasrole

                <!-- Exit -->
                <li class="nav-item">
                    <a class="nav-link menu-link d-flex" id="employeeInfo" href="#ticketingDrop-Down"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebar360questions">
                        <hr class="vertical-line">
                        <div class="d-flex flex-column align-items-center justify-content-center px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.811" height="20.127"
                                viewBox="0 0 19.811 20.127">
                                <g id="Group_34159" data-name="Group 34159" transform="translate(-30.25 -492.249)">
                                    <path id="Path_15918" data-name="Path 15918"
                                        d="M14,2.312h3a2,2,0,0,1,2,2v1m-5,13h3a2,2,0,0,0,2-2v-1m-12-5H7m7,0h5m0,0-2-2m2,2-2,2M2.425,17.74l6,1.8A2,2,0,0,0,11,17.624V3A2,2,0,0,0,8.425,1.084l-6,1.8A2,2,0,0,0,1,4.8V15.824A2,2,0,0,0,2.425,17.74Z"
                                        transform="translate(30 492)" fill="none" stroke="#340000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </g>
                            </svg>
                            <span>Exit</span>
                        </div>
                    </a>
                    <div class="collapse menu-dropdown" id="ticketingDrop-Down">
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

                <!-- org -->
                <!-- 
                <li class="nav-item">
                    <a class="nav-link menu-link" id="employeeInfo" href="#ticketingDrop-Down" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebar360questions">
                        <i class="ri-dashboard-2-line"></i> <span>Org</span>

                    </a>

                    <div class="collapse menu-dropdown" id="ticketingDrop-Down">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item ">
                                <a href="" id="" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false"><span>Roles and Permissions</span> </a>

                            </li>

                        </ul>
                    </div>




                </li> -->



                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span >@lang('translation.apps')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-calendar" class="nav-link" >@lang('translation.calendar')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link" >@lang('translation.chat')</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-mailbox" class="nav-link" >@lang('translation.mailbox')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEcommerce" >@lang('translation.ecommerce')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-products" class="nav-link" >@lang('translation.products')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-product-details" class="nav-link" >@lang('translation.product-Details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-add-product" class="nav-link" >@lang('translation.create-product')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-orders" class="nav-link" >@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-order-details" class="nav-link" >@lang('translation.order-details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-customers" class="nav-link" >@lang('translation.customers')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-cart" class="nav-link" >@lang('translation.shopping-cart')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-checkout" class="nav-link" >@lang('translation.checkout')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-sellers" class="nav-link" >@lang('translation.sellers')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-seller-details" class="nav-link" >@lang('translation.sellers-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProjects" >@lang('translation.projects')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-projects-list" class="nav-link" >@lang('translation.list')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-overview" class="nav-link" >@lang('translation.overview')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create" class="nav-link" >@lang('translation.create-project')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTasks" >@lang('translation.tasks')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban" class="nav-link" >@lang('translation.kanbanboard')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view" class="nav-link" >@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details" class="nav-link" >@lang('translation.task-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCRM" >@lang('translation.crm')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts" class="nav-link" >@lang('translation.contacts')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies" class="nav-link" >@lang('translation.companies')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals" class="nav-link" >@lang('translation.deals')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads" class="nav-link" >@lang('translation.leads')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto" >@lang('translation.crypto')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions" class="nav-link" >@lang('translation.transactions')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell" class="nav-link" >@lang('translation.buy-sell')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders" class="nav-link" >@lang('translation.orders')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet" class="nav-link" >@lang('translation.my-wallet')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico" class="nav-link" >@lang('translation.ico-list')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc" class="nav-link" >@lang('translation.kyc-application')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarInvoices" >@lang('translation.invoices')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list" class="nav-link" >@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details" class="nav-link" >@lang('translation.details')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create" class="nav-link" >@lang('translation.create-invoice')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTickets" >@lang('translation.supprt-tickets')
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list" class="nav-link" >@lang('translation.list-view')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details" class="nav-link" >@lang('translation.ticket-details')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span >@lang('translation.layouts')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="layouts-horizontal" target="_blank" class="nav-link" >@lang('translation.horizontal')</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-detached" target="_blank" class="nav-link" >@lang('translation.detached')</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-two-column" target="_blank" class="nav-link" >@lang('translation.two-column')</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-vertical-hovered" target="_blank" class="nav-link" >@lang('translation.hovered')</a>
                            </li>
                        </ul>
                    </div>
                </li>  -->

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


</div>

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>




@section('script')
<!-- apexcharts -->
<script>

</script>
@endsection