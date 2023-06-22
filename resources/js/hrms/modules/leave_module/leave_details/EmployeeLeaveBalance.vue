<template>
    <div class="mb-3 tw-card">
        <div class="mb-2 row">
            <div class="col-sm-6 col-xl-6 col-md-6 col-lg-6">
                <h6 class="text-lg font-semibold text-gray-900 modal-title">Leave Balance</h6>
            </div>
            <div class="col-6 justify-content-end d-flex">
                <LeaveApply />
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div v-for="leave_balance in useLeaveStore.array_employeeLeaveBalance" :key="leave_balance"
                class="p-1 my-4 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100 ">
                <p class="text-lg font-semibold text-center ">{{ leave_balance.leave_type }}</p>
                <p class="my-3 text-xl font-bold text-center">
                    <span v-if="leave_balance.leave_balance == ''">0</span>
                    <span v-else>{{ leave_balance.leave_balance }}</span>
                </p>
            </div>
        </div>
        <!-- <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 xl:grid-cols-3" > -->
        <!-- 
        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;" >
            <div class="tw-card " v-for="leave in leave_balance" :key="leave" :class="[leave.leave_type == 'sick' ? 'bg-red-300' :'']" >
                <div class="text-center">
                    <p class="mb-2 text-base font-semibold ">
                        {{ leave.leave_type }}
                    </p>
                    <h6 class="mb-0 text-sm font-semibold">
                        {{  }}
                    </h6>
                </div>
            </div>
        </div> -->
    </div>
    <div class="tw-card ">
        <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Leave Availed</h6>
        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div class="bg-indigo-100 border-l-4 border-indigo-300 tw-card"
                v-for="leave_balance in useLeaveStore.array_employeeLeaveBalance" :key="leave_balance">
                <div class="text-center">
                    <p class="mb-2 text-base font-semibold ">
                        {{ leave_balance.leave_type }}
                    </p>
                    <h6 class="mb-0 text-base font-semibold">
                        {{ leave_balance.avalied_leaves }}
                    </h6>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import LeaveApply from '../leave_apply/LeaveApply.vue'
import { useLeaveModuleStore } from '../LeaveModuleService';
import { ref } from 'vue';

const useLeaveStore = useLeaveModuleStore()

</script>
