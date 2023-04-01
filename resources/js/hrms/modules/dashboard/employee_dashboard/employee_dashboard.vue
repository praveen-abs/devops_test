<template>
      <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4">
                        <!-- @include('ui-dashboard-welcome-card') -->
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
                        <div class="border-0 attendance-wrapper card w-100 box-shadow-md">
                            <div class="card-body">
                                <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <span class=" text-primary">Current Month</span>
                                    <a role="button"><span class="text-primary fs-11">View All</span></a>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 col-xxl-4">
                                        <div class="border-0 card box-shadow-sm bg-green-lighten">
                                            <div class="py-2 mx-auto text-center card-body">
                                                <!-- <img src="{{ URL::asset('assets/images/dashboard/present.svg') }}"
                                                    class="" alt="present-icon" height="20px" width="20px"> -->
                                                <div class="d-flex">
                                                    <span class="h1">0</span><span class="mt-4 fs-12 ms-1">days</span>

                                                </div>
                                                <p class="text-primary ">Present</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 col-xxl-4">
                                        <div class="border-0 card box-shadow-sm bg-pink-lighten">
                                            <div class="py-2 mx-auto text-center card-body">
                                                <!-- <img src="{{ URL::asset('assets/images/dashboard/leave.svg') }}"
                                                    class="" alt="leave-icon" height="20px" width="20px"> -->
                                                <div class="d-flex">
                                                    <span class="h1">0</span><span class="mt-4 fs-12 ms-1">days</span>

                                                </div>
                                                <p class="text-primary ">Leave</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 col-xxl-4">
                                        <div class="border-0 card box-shadow-sm bg-sky-lighten">
                                            <div class="py-2 mx-auto text-center card-body">
<!-- 
                                                <img src="{{ URL::asset('assets/images/dashboard/absent.svg') }}"
                                                    class="" alt="absent-icon" height="20px" width="20px"> -->
                                                <div class="d-flex">
                                                    <span class="h1">0</span><span class="mt-4 fs-12 ms-1">days</span>

                                                </div>
                                                <p class="text-primary ">Absent </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
                        <!-- @include('ui-dashboard-holiday-card') -->
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6 col-md-6 col-xl-4 col-lg-4 col-xxl-4">
                        <div class="border-0 notification-wrapper card w-100 box-shadow-md">
                            <div class="card-body ">
                                <div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                    id=""> <span>Notifications</span> <i type="button"
                                        class=" position-relative fa fa-bell">
<!-- 
                                        {{-- <span
                                            class="top-0 position-absolute start-100 translate-middle badge rounded-circle bg-danger">
                                            5+
                                            <span class="visually-hidden">unread messages</span>
                                        </span> --}} -->
                                    </i> </div>
                                <div class="contents ">
                                    <div class="mb-0 mb-3 border-0 card border-left-orange bg-orange-lighten box-shadow-sm">
                                        <div class="p-2 card-body">
                                            <div class="notify-content ">
                                                <p class="mb-1 orange-median align-items-center d-flex justify-content-between"><span
                                                        class="">Leave</span><span
                                                        class="fs-11 ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0 mb-3 border-0 card border-left-skyBlue bg-sky-lighten box-shadow-sm">
                                        <div class="p-2 card-body">
                                            <div class="notify-content ">
                                                <p class="mb-1 sky-median d-flex justify-content-between"><span
                                                        class="">Leave</span><span
                                                        class="fs-11 ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0 mb-3 border-0 card border-left-green bg-green-lighten box-shadow-sm">
                                        <div class="p-2 card-body">
                                            <div class="notify-content ">
                                                <p class="mb-1 green-median d-flex justify-content-between"><span
                                                        class="">Leave</span><span
                                                        class="fs-11 ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0 border-0 card border-left-blue box-shadow-sm">
                                        <div class="p-2 card-body">
                                            <div class="notify-content ">
                                                <p class="mb-1 blue-median d-flex justify-content-between"><span
                                                        class="">Leave</span><span
                                                        class="fs-11 ">Request Approved</span></p>
                                                <div class="notify-message">
                                                    <p class="fs-10">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, alias.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4">

                        <div class="border-0 leave-balance-wrapper card w-100 box-shadow-md">
                            <div class="card-body ">
                                <div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary"
                                    id=""> <span>Leave Balance</span>
                                </div>

                                <div class="contents">
                                    <div class="card leave-balance-card">
                                        <div class="p-0 card-body">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 leave-balance-container">
                                                    <div class="m-auto leave-balance-available">
                                                        <span class="">9</span>
                                                        <span class="">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9 col-xl-9 col-lg-9 d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Casual Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card leave-balance-card">
                                        <div class="p-0 card-body">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 leave-balance-container">
                                                    <div class="m-auto leave-balance-available">
                                                        <span class="">9</span>
                                                        <span class="">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9 col-xl-9 col-lg-9 d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Casual Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card leave-balance-card">
                                        <div class="p-0 card-body">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 leave-balance-container">
                                                    <div class="m-auto leave-balance-available">
                                                        <span class="">9</span>
                                                        <span class="">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9 col-xl-9 col-lg-9 d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Casual Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card leave-balance-card">
                                        <div class="p-0 card-body">
                                            <div class="d-flex leave-balance-content">
                                                <div
                                                    class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 leave-balance-container">
                                                    <div class="m-auto leave-balance-available">
                                                        <span class="">9</span>
                                                        <span class="">/</span>
                                                        <span class="">1</span>
                                                    </div>

                                                </div>
                                                <div
                                                    class="col-sm-9 col-md-9 col-xl-9 col-lg-9 d-flex col-xxl-9 leave-balance-type">
                                                    <p class="text-primary">Sick Leave</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
                        <div class="border-0 calendar-wrapper card w-100">
                            <div class="p-0 card-body">
                                <div class="_wrapper">
                                    <div class=" _container-calendar">
                                        <div
                                            class="_button-container-calendar d-flex align-items-center justify-content-between">
                                            <button id="_previous" onclick="previous()" class="previous"><i
                                                    class="fa fa-chevron-left"></i></button>
                                            <h6 id="_monthAndYear" class="text-white _monthAndYear"></h6>
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
</template>