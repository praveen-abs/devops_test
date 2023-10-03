<template>
    <div class="grid grid-cols-7 gap-4 " v-if="useDashboard.attendanceOverview">
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Present',useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.present_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.present_emps })">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.present_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Present</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Absent', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.absent_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.absent_emps })">

            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.absent_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Absent</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Leave',useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.leave_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.leave_emps })">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.leave_emp_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Leave</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Late coming',useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.lc_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.lc_emps })">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.lg_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Late coming</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Early going',useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.eg_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.eg_emps })">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.eg_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Early going</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Missed in punch',useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.mip_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.mip_emps })">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.mip_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Missed in punch</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Missed out punch',useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.mop_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.mop_emps })">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.mop_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Missed out punch</p>
        </div>
    </div>
</template>
<script setup>
import { useAttendanceDashboardMainStore } from '../stores/attendanceDashboardMainStore.js';

const useDashboard = useAttendanceDashboardMainStore()

</script>
