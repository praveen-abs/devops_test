<template>
    <div class="grid grid-cols-7 gap-4 " v-if="useDashboard.attendanceOverview">
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Present', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.present_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.present_emps })">
            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class="mr-2 text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.present_count }}
                </span>
                <img class=" right-8 w-[16px] h-[16px]" src="../../../../assests/images/present-img.png" alt="">
            </div>

            <p class=" text-lg underline text-center text-gray-500 font-[Poppins] font-medium mt-[10px] ">Present</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Absent', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.absent_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.absent_emps })">

            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class="text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.absent_count }}
                </span>
                <img class="ml-6 w-[20px] h-[20px]" src="../../../../assests/images/Absent.png" alt="">
            </div>
            <p class=" text-lg underline text-center text-gray-500 font-[Poppins] font-medium mt-[10px]">Absent</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Leave', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.leave_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.leave_emps })">
            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class=" text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.leave_emp_count }}
                </span>
                <img src="../../../../assests/images/Leave.png" alt="" class=" ml-6 w-[20px] h-[20px]" >
            </div>
            <p class=" text-lg underline text-center text-gray-500 font-[Poppins] font-medium mt-[10px]">Leave</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Late coming', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.lc_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.lc_emps })">
            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class=" text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.lg_count }}
                </span>
                <img src="../../../../assests/images/Early_going.png" class=" ml-6 w-[20px] h-[20px]" alt="">
            </div>
            <p class=" text-lg   underline font-semibold text-center text-gray-500  mt-[10px] ">Late coming</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Early going', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.eg_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.eg_emps })">
            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class=" text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.eg_count }}
                </span>
                <img src="../../../../assests/images/Late_coming.png" class=" ml-6  w-[20px] h-[20px]" alt="">
            </div>
            <p class=" text-lg  underline font-semibold text-center text-gray-500 mt-[10px]">Early going</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Missed in punch', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.mip_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.mip_emps })">
            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class=" text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.mip_count }}
                </span>
                <img src="../../../../assests/images/MIP_MOP.png" class=" ml-6 w-[20px] h-[20px]" alt="" >

            </div>
            <p class=" text-lg  underline font-semibold text-center text-gray-500  mt-[10px]">Missed in punch</p>
        </div>
        <div class=" bg-white rounded-lg p-2 border cursor-pointer transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"
            @click="useDashboard.selectedAttendanceOverviewReport = 'Missed out punch', useDashboard.canShowAttendanceOverview = true, useDashboard.currentlySelectedShiftDetails = { ...useDashboard.attendanceOverview.mop_emps }, useDashboard.downloadAttendanceOverviewDetails.push({ ...useDashboard.attendanceOverview.mop_emps })">
            <div class="px-auto mx-auto flex justify-around items-center w-[86px]">
                <span class=" text-3xl font-semibold text-center">
                    {{ useDashboard.attendanceOverview.mop_count }}
                </span>
                <img src="../../../../assests/images/MIP_MOP.png" class=" ml-6 w-[20px] h-[20px]" alt="" >
            </div>
            <p class="text-lg underline font-semibold text-center text-gray-500  mt-[10px]">Missed out punch</p>
        </div>
    </div>
</template>
<script setup>
import { useAttendanceDashboardMainStore } from '../stores/attendanceDashboardMainStore.js';

const useDashboard = useAttendanceDashboardMainStore()

</script>
