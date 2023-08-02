<template>
    <!-- <div style="display: none;">
        <LeaveApply />
    </div> -->


    <div class="bg-white rounded-lg overflow-hidden p-2" style="height: 200px;">
        <span class="text-primary font-semibold fs-6">Leave Balance</span>
        <div class="bg-white rounded-lg overflow-x-scroll h-full">
            <div class="px-auto">
                <div v-for="leaveBalance in useDashboard.leaveBalancePerMonthSource" :key="leaveBalance.leave_type"
                    class="bg-gray-200  my-2 p-2 mx-2 rounded-lg ">
                    <div class="flex px-2">
                        <div class="">
                            <div class="">
                                <span class="text-3xl font-semibold text-black">{{ leaveBalance.leave_balance }}</span>
                                <span class="">/</span>
                                <span class="">{{ leaveBalance.avalied_leaves }}</span>
                            </div>
                        </div>
                        <div class="px-3">
                            <p class=" font-semibold text-primary text-[14px] align-bottom">{{ leaveBalance.leave_type }}</p>
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
