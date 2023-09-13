<template>
    <LoadingSpinner v-if="useDashboard.canShowLoading" class="absolute z-50 bg-white" />
    <div class="w-full">
        <p class="mb-2 text-2xl  text-black font-semibold">
            Attendance dashboard
        </p>

        <div class="bg-white p-2 rounded-lg border flex justify-between">
            <div class="mx-2">
                <p class=" font-[14px] font-['Poppins']  text-gray-500 ">
                    Daily Analytics - <span class="mb-2 text-sm font-semibold">
                        {{ dayjs(new Date()).format('MMMM DD,YYYY') }}</span>
                </p>
            </div>
            <div class="flex justify-end gap-5 mx-4">
                <!-- <div>1</div>
                <div>2</div>
                <div>2</div> -->
            </div>
        </div>

        <div class=" my-3">
            <AttendanceCount />
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div>
                <ExceptionAnalytics />
            </div>
            <div>
                <AttendanceAnalytics />
            </div>
            <div>
                <Upcomings />
            </div>
        </div>

        <div class=" my-3">
            <Shifts />
        </div>
    </div>

    <!--
    <Dialog header="Shift Details" v-model:visible="useDashboard.canShowShiftDetails"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '50vw' }" :modal="true" :closable="true"
        :closeOnEscape="true">
        <DataTable :value="useDashboard.currentlySelectedShiftDetails">
            <Column field="user_code" header="User code"></Column>
            <Column field="name" header="Name"></Column>
            <Column field="shift_start_time" header="Shift start time"></Column>
            <Column field="shift_end_time" header="Shift end time"></Column>
            <Column field="grace_time" header="Grace time"></Column>
        </DataTable>
    </Dialog> -->
    <Sidebar v-model:visible="useDashboard.canShowShiftDetails" position="right" class="w-full">
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">{{ useDashboard.currentlySelectedShiftDetails ? useDashboard.currentlySelectedShiftDetails[0].shift_name : null }} Reports</p>
        </template>
       <div class="mt-6">
        <DataTable :value="useDashboard.currentlySelectedShiftDetails ? useDashboard.currentlySelectedShiftDetails : []">
            <Column field="user_code" header="User code"></Column>
            <Column field="name" header="Name"></Column>
            <Column field="shift_start_time" header="Shift start time"></Column>
            <Column field="shift_end_time" header="Shift end time"></Column>
            <Column field="grace_time" header="Grace time"></Column>
        </DataTable>
       </div>
    </Sidebar>

</template>


<script setup>
import dayjs from 'dayjs';

import AttendanceCount from './attendanceCount/attendanceCount.vue'
import ExceptionAnalytics from './exceptionAnalytics/exceptionAnalytics.vue';
import AttendanceAnalytics from './attendanceAnalytics/attendanceAnalytics.vue';
import Upcomings from './Upcomings/Upcomings.vue';
import Shifts from './Shifts/Shifts.vue';
import { onMounted } from 'vue';
import { useAttendanceDashboardMainStore } from './stores/attendanceDashboardMainStore';
import LoadingSpinner from '../../../components/LoadingSpinner.vue'


const useDashboard = useAttendanceDashboardMainStore()

onMounted(() => {
    useDashboard.getAttendanceDashboardMainSource()
})

</script>


<style>
.p-sidebar-right .p-sidebar
{
    width: 60%;
    height: 100%;
}
</style>
