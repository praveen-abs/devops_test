<template>
    <!-- <div style="display: none;">
        <LeaveApply />
    </div> -->
    <div v-for="leaveBalance in useDashboard.leaveBalancePerMonthSource" :key="leaveBalance.leave_type" class="bg-gray-200 max-w-sm ">
        <div class="flex  ">
            <div class="leave-balance-container">
                <div class="m-auto leave-balance-available">
                    <span class="">{{ leaveBalance.leave_balance }}</span>
                    <span class="">/</span>
                    <span class="">{{ leaveBalance.avalied_leaves }}</span>
                </div>
            </div>
            <div class="">
                <p class=" font-semibold text-lg text-primary">{{ leaveBalance.leave_type }}</p>
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
