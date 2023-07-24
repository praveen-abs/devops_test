<template>
<div style="display: none;">
  <LeaveApply />
  </div>
  <div class="border-0 leave-balance-wrapper card w-100 box-shadow-md h-100 overflow-x-hidden overflow-y-auto h-2 scroll-bar">
    <div class="card-body">
      <div class="mb-3 card-title d-flex align-items-center justify-content-between f-18 text-primary" id="">
        <span class="text-primary font-semibold fs-6">Leave Balance</span>
      </div>

      <div class="contents">
        <div class="card leave-balance-card" v-for="leaveBalance in useDashboard.leaveBalancePerMonthSource" :key="leaveBalance.leave_type"
        @click="useLeave.leaveApplyDailog = true" >
          <div class="p-0 card-body" >
            <div class="d-flex leave-balance-content">
              <div class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3 leave-balance-container">
                <div class="m-auto leave-balance-available">
                  <span class="">{{leaveBalance.leave_balance}}</span>
                  <span class="">/</span>
                  <span class="">{{leaveBalance.avalied_leaves}}</span>
                </div>
              </div>
              <div class="col-sm-9 col-md-9 col-xl-9 col-lg-9 d-flex col-xxl-9 leave-balance-type">
                <p class=" font-semibold text-lg text-primary">{{leaveBalance.leave_type}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useLeaveService } from "../../../leave_module/leave_apply/leave_apply_service";
import { useMainDashboardStore } from "../../stores/dashboard_service";
import LeaveApply from "../../../leave_module/leave_apply/LeaveApply.vue";


const useDashboard = useMainDashboardStore()
const useLeave = useLeaveService()
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
