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
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
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

                    <a class="nav-link menu-link" href="{{url('index')}}">

                        <i> <img src="{{ URL::asset('assets/images/sidebar_icons/dashboard.png') }}" alt=""
                                class="m-2"></i>
                        <span data-key="t-landing">Dashboard</span>


                    </a>
                </li>



                <!-- Navigation Menu for attendance-->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#attendanceDrop-Down" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRoles">
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/attendance.png') }}" alt=""
                                class="m-2"></i>
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

                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/organization.png') }}" alt=""
                                class="m-2"> </i>

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

                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/performance.png') }}" alt=""
                                class="m-2"></i>


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
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/team.png') }}" alt="" class="m-2"></i>
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
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/pay_roll.png') }}" alt=""
                                class="m-2"></i>


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
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/paycheck.png') }}" alt=""
                                class="m-2"></i>


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
                        <i> <img src="{{ URL::asset('assets/images/sidebar_icons/claims.png') }}" alt=""
                                class="m-2"></i>

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
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/report.png') }}" alt="" class="m-2"></i>

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
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/help_desk.png') }}" alt=""
                                class="m-2"></i>

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
                        <i><img src="{{ URL::asset('assets/images/sidebar_icons/configuration.png') }}" alt=""
                                class="m-2"></i>


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
                        <i> <img src="{{ URL::asset('assets/images/sidebar_icons/exit.png') }}" alt="" class="m-2"></i>
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