<template>
    <!-- {{useDashboard.attendanceDashboardWorkShiftSource ?  useDashboard.attendanceDashboardWorkShiftSource  : []}} -->
    <div class="bg-white p-2 rounded-lg border" v-if="useDashboard.attendanceDashboardWorkShiftSource ">
        <span class="font-semibold text-[14px] text-[#000] font-['Poppins]">Shift</span>
        <div class="grid grid-cols-6 gap-2 my-2">
            <div class="bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer" @click="useDashboard.canShowShiftDetails = true , useDashboard.currentlySelectedShiftDetails = {...shift.work_shift_employee_data}"
                v-for="(shift, index) in useDashboard.attendanceDashboardWorkShiftSource " :key="index">
                <div class="w-full bg-gray-200 p-2 rounded-lg">
                    <span class="font-semibold text-[12px] text-[#000] font-['Poppins]">{{
                        shift.work_shift_employee_data[0] ?  shift.work_shift_employee_data[0].shift_name : '-' }}</span>
                </div>
                <div class="p-2">
                    <div>
                        <p class="font-semibold text-sm text-[#000] font-['Poppins]">Shift Timing</p>
                        <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">
                            {{ shift.work_shift_employee_data[0] ? convertToAMPM(shift.work_shift_employee_data[0].shift_start_time) : '-' }}
                            -
                            {{ shift.work_shift_employee_data[0] ? convertToAMPM(shift.work_shift_employee_data[0].shift_end_time) : '-' }}
                        </p>
                    </div>
                    <div class="my-3">
                        <p class="font-semibold text-sm text-[#000] font-['Poppins]">Total Employees</p>
                        <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">{{
                            shift.work_shift_assigned_employees  ? shift.work_shift_assigned_employees : '-' }}
                        </p>
                    </div>
                    <div class="flex justify-between ">
                        <div>
                            <p class="font-semibold text-sm text-[#000] font-['Poppins]">Present</p>
                            <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">-</p>
                        </div>
                        <div class="mx-3">
                            <p class="font-semibold text-sm text-[#000] font-['Poppins]">Absent</p>
                            <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">-</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>


<script setup>
import { useAttendanceDashboardMainStore } from '../stores/attendanceDashboardMainStore.js';

const useDashboard = useAttendanceDashboardMainStore()



function convertToAMPM(railwayTime) {
    // Split the railway time into hours and minutes
    const [hours, minutes] = railwayTime.split(':').map(Number);

    // Determine whether it's AM or PM
    const period = hours >= 12 ? 'PM' : 'AM';

    // Convert hours to 12-hour format
    const hours12 = hours % 12 === 0 ? 12 : hours % 12;

    // Format the time in AM/PM format
    const timeInAMPM = `${hours12}:${String(minutes).padStart(2, '0')} ${period}`;

    return timeInAMPM;
}

</script>
