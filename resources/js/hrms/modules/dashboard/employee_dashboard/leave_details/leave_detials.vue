<template>
    <div class="border-0 attendance-wrapper card w-100 box-shadow-md">
        <div class="card-body">
          <div class="mb-2 d-flex justify-content-between align-items-center">
            <span class="text-primary">Current Month</span>
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
                  <p class="text-primary">Present</p>
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
                  <p class="text-primary">Leave</p>
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
                  <p class="text-primary">Absent</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</template>
