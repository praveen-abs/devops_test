<template>
    <!-- <div class="row" style="height: 210px;">
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4">
      <WelcomeCard />
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
      <LeaveDetials />
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
      <HolidayWidget />
    </div>
  </div>
  <div class="row" >
    <div class="col-sm-6 col-md-6 col-xl-4 col-lg-4 col-xxl-4" style="height: 380px;">
      <Notification />
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4" style="height: 380px;">
      <LeaveBalance />
    </div>
    <div class="h-3 col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4" style="height: 380px;">
      <Calender />
    </div>
  </div> -->
    <div class="p-3">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <WelcomeCard />
            </div>
            <div>
                <LeaveDetials />
            </div>
            <div class="bg-white rounded-lg">carsouekl</div>
        </div>
        <div class="grid grid-rows-3 grid-flow-col gap-4 my-3">
            <div class="col-span-2  grid grid-cols-2 gap-5">
                <div class="bg-white rounded-lg">1</div>
                <div class="bg-white rounded-lg">1</div>
            </div>
            <div class="row-span-2 col-span-2 bg-white">event</div>
            <div class="row-span-4 bg-white rounded-lg">log</div>

        </div>

    </div>
</template>

<script setup>
import WelcomeCard from "./welcome_card/welcome_card.vue";
import LeaveDetials from "./leave_details/leave_details.vue";
import Notification from "./notifications/notification.vue";
import LeaveBalance from "./leave_balance/leave_balance.vue";
import Calender from "./calender/calender.vue";
import HolidayWidget from "./holiday_widget/holiday_widget.vue";
</script>


<style>
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888888;
    border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #a1a1a1;
}
</style>
