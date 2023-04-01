<template>
  <div class="row">
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4">
      <WelcomeCard />
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
      <LeaveDetials />
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
      <!-- @include('ui-dashboard-holiday-card') -->
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-6 col-xl-4 col-lg-4 col-xxl-4">
      <Notification />
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4 col-xxl-4">
      <LeaveBalance />
    </div>
    <div class="h-3 col-sm-12 col-md-6 col-xl-4 col-lg-4 d-flex col-xxl-4">
      <!-- <Calender /> -->
    </div>
  </div>
</template>

<script setup>
import WelcomeCard from "./welcome_card/welcome_card.vue";
import LeaveDetials from "./leave_details/leave_detials.vue";
import Notification from "./notifications/notification.vue";
import LeaveBalance from "./leave_balance/leave_balance.vue";
import Calender from "./calender/calender.vue";
</script>
