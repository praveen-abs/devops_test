<template>
    <!-- {{useDashboard.attendanceDashboardWorkShiftSource ?  useDashboard.attendanceDashboardWorkShiftSource  : []}} -->
    <div class="bg-white p-2 rounded-[6px] border" v-if="useDashboard.attendanceDashboardWorkShiftSource">
        <span class="font-semibold text-[#000] font-['Poppins] text-[16px]">Shift</span>
        <!-- grid grid-cols-6 -->

        <div class="flex flex-row w-[100%]">

            <div class=" mx-[10px] flex   my-2">
                <div :class="cardBody_Bg_Color(index)"
                    class="w-[213px] h-[200px] mx-[10px] rounded-[6px] cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
                    @click="useDashboard.canShowShiftDetails = true, useDashboard.currentlySelectedShiftDetails = { ...shift.work_shift_employee_data }, useDashboard.downloadShiftDetails.push({ ...shift.work_shift_employee_data })"
                    v-for="(shift, index) in useDashboard.attendanceDashboardWorkShiftSource " :key="index">
                    <div class="w-full rounded-t-[8px] pl-[12px] py-2 " :class="cardheader_Bg_Color(index)">
                        <span class="font-semibold  text-[16px] font-['Poppins] " :class="text(index)">
                            {{ shift.work_shift_employee_data[0].shift_name }}
                        </span>
                    </div>
                    <div class="p-3">
                        <div>
                            <p class="font-semibold text-sm text-[#000] font-['Poppins]">Shift Timing</p>
                            <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">
                                {{ convertToAMPM(shift.work_shift_employee_data[0].shift_start_time) }}
                                -
                                {{ convertToAMPM(shift.work_shift_employee_data[0].shift_end_time) }}
                            </p>
                        </div>
                        <div class="my-3">
                            <p class="font-semibold text-sm text-[#000] font-['Poppins]">Total Employees</p>
                            <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">{{
                                shift.work_shift_assigned_employees ? shift.work_shift_assigned_employees : '-' }}
                            </p>
                        </div>
                        <div class="flex justify-between ">
                            <div>
                                <p class="font-semibold text-sm text-[#000] font-['Poppins]">Present</p>
                                <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">
                                    {{ shift.present_count ? shift.present_count : 0 }}
                                </p>
                            </div>
                            <div class="mx-3">
                                <p class="font-semibold text-sm text-[#000] font-['Poppins]">Absent</p>
                                <p class="font-medium text-[12px] text-gray-600 font-['Poppins]">
                                    {{ shift.absent_count ? shift.absent_count : 0 }}
                                </p>
                            </div>
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

const cardheader = [
    'bg-[#FFD757]',
    'bg-[#D91010]',
    'bg-[#FFBC6D]',
    'bg-[#B8B8B8]',
    'bg-[#000000]',
    'bg-[#FFE9A3]',
];

const cardheader_Bg_Color = (index) => {
    // console.log(index);
    return cardheader[index % cardheader.length];
};

const cardBody = [
    'bg-[#FFF3CB]',
    'bg-[#FFC6C6]',
    'bg-[#FFEBD3]',
    'bg-[#EEEEEE]',
    'bg-[#E3E3E3]',
    'bg-[#FFF7DF]',
];

const cardBody_Bg_Color = (index) => {
    // console.log(index);
    return cardBody[index % cardBody.length];
};

const cardtext = [
    'text-[#000]',
    'text-[#ffff]',
    'text-[#000]',
    'text-[#000]',
    'text-[#ffff]',
    'text-[#000]',
];

const text = (index) => {
    // console.log(index);
    return cardtext[index % cardtext.length];
};

</script>
