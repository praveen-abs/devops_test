<template>
    <div class="grid grid-cols-7 gap-4 " v-if=" useDashboard.attendanceOverview">
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                   {{ useDashboard.attendanceOverview.present_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Present</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.absent_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Absent</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.leave_emp_count }}
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Leave</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                   0
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Late coming</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                   0
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Early going</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                   0
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Missed in punch</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                   0
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
