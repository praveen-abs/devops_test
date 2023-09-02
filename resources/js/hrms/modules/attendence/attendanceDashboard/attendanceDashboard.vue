<template>
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
                <div>1</div>
                <div>2</div>
                <div>2</div>
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
</template>


<script setup>
import dayjs from 'dayjs';

import AttendanceCount from './attendanceCount/attendanceCount.vue'
import ExceptionAnalytics from './exceptionAnalytics/exceptionAnalytics.vue';
import AttendanceAnalytics from './attendanceAnalytics/attendanceAnalytics.vue';
import Upcomings from './Upcomings/Upcomings.vue';
import Shifts from './Shifts/Shifts.vue';



</script>
