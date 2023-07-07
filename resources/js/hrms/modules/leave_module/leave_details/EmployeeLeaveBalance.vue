<template>
    <div class="mb-3 tw-card">
        <!-- <div class="mb-2 row">
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
        </div> -->


        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-6 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 my-4 mx-2"
            style="display: grid;">
            <div class="card p-2 rounded-lg border-1 border-orange-300"
                v-for="leave_balance in useLeaveStore.array_employeeLeaveBalance" :key="leave_balance">
                <div class="card-body">
                    <h6 class="text-lg font-bold text-center dark:text-white h-6"> {{ leave_balance.leave_type }} </h6>
                    <h1
                        class=" text-center my-5 mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl ext-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                        <span
                            class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">CL</span>
                    </h1>

                    <div class="mx-4">
                        <h6 class="text-sm font-semibold dark:text-white">Available : {{ leave_balance.avalied_leaves }}
                        </h6>
                        <h6 class="text-sm font-semibold dark:text-white my-3">Taken : {{ leave_balance.leave_balance }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Dialog header="Header" v-model:visible="visibel" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '75vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <Leave_apply_v2 />
    </Dialog>
</template>

<script setup>
import LeaveApply from '../leave_apply/LeaveApply.vue'
import Leave_apply_v2 from '../leave_apply_v2/leave_apply_v2.vue';
import { useLeaveModuleStore } from '../LeaveModuleService';
import { ref } from 'vue';
const visibel = ref(false)


const useLeaveStore = useLeaveModuleStore()

</script>
