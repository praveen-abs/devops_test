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
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">{{ useDashboard.currentlySelectedShiftDetails ?
                useDashboard.currentlySelectedShiftDetails[0].shift_name : null }} Reports</p>
            <div class="relative right-0 mx-4 font-semibold fs-5 ">

                <button class=" bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]"
                    @click="btn_download = !btn_download, downloadExcelFile()">
                    <p class=" relative left-2 font-['poppins']">Download</p>
                    <div id="btn-download" style=" position: absolute; right: 0;"
                        :class="[btn_download == true ? toggleClass : ' ']">
                        <svg width="22px" height="16px" viewBox="0 0 22 16">
                            <path
                                d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15"
                                id="check"></path>
                            <polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline>
                            <path d="M8,1 L8,11" class="svg-out"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </template>
        <div class="mt-6">
            <DataTable
                :value="useDashboard.currentlySelectedShiftDetails ? useDashboard.currentlySelectedShiftDetails : []">
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
import * as ExcelJS from 'exceljs'

import AttendanceCount from './attendanceCount/attendanceCount.vue'
import ExceptionAnalytics from './exceptionAnalytics/exceptionAnalytics.vue';
import AttendanceAnalytics from './attendanceAnalytics/attendanceAnalytics.vue';
import Upcomings from './Upcomings/Upcomings.vue';
import Shifts from './Shifts/Shifts.vue';
import { onMounted, ref } from 'vue';
import { useAttendanceDashboardMainStore } from './stores/attendanceDashboardMainStore';
import LoadingSpinner from '../../../components/LoadingSpinner.vue'
import * as XLSX from "xlsx";
import { saveAs } from "file-saver";


const useDashboard = useAttendanceDashboardMainStore()

onMounted(() => {
    useDashboard.getAttendanceDashboardMainSource()
})


const downloadExcelFile = async () => {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Sheet1');

    // Specify the headers you want to include in the Excel file
    const desiredHeaders = ['user_code', 'user_code', 'shift_start_time', 'shift_end_time', 'shift_end_time'];
    // const desiredHeaders = ['user_code', 'user_code', 'department', 'process', 'location', 'shift_start_time', 'shift_end_time', 'shift_end_time'];
    const authorMessage = 'this report generated by ABShrms payroll software ';
    // Add headers to the worksheet
    // const headers = Object.keys(useDashboard.currentlySelectedShiftDetails[0]);
    const headers = desiredHeaders
    const headerRow = worksheet.addRow(headers);
    headerRow.eachCell((cell, colNumber) => {
        cell.fill = {
            type: 'pattern',
            pattern: 'solid',
            fgColor: { argb: '252f70' }, // blue color for header background
        };
        cell.font = {
            bold: true,
            color: { argb: 'ffffff' }, // white color for header text
        };
        worksheet.getColumn(colNumber).width = 20;
    });


    // Add data to the worksheet
    Object.values(useDashboard.currentlySelectedShiftDetails).forEach((item, index) => {
        console.log(item);
        const row = [];
        headers.forEach((header) => {
            row.push(item[header]);
        });
        worksheet.addRow(row);


        const rowNumber = index + 2; // Offset by 2 (header row + 1) to account for 1-based indexing
        const isOddRow = rowNumber % 2 === 1;

        const cellStyle = {
            fill: {
                type: 'pattern',
                pattern: 'solid',
                fgColor: isOddRow ? { argb: 'cad1fa' } : { argb: 'cad1fa' }, // Red for odd rows, green for even rows
            },
        };

        worksheet.addRow(row).eachCell((cell) => {
            cell.style = cellStyle;
        });

    });

    // Generate the report content (replace this with your report data)
    const reportData = [
        ['', '', ''],
        ['', '', ''],
        [authorMessage, '', ''],
        // Add more rows for your report
    ];

    // Add the report data after the last row of data
    reportData.forEach((rowData) => {
        worksheet.addRow(rowData);
    });

    // Create a Blob from the workbook
    const blob = await workbook.xlsx.writeBuffer();

    // Create a Blob URL for the Excel file
    const blobURL = window.URL.createObjectURL(new Blob([blob]));

    // Create a temporary link element to trigger the download
    const link = document.createElement('a');
    link.href = blobURL;
    link.download = 'shift.xlsx'; // Set the desired file name
    link.click();

    // Clean up the Blob URL
    window.URL.revokeObjectURL(blobURL);
};


const btn_download = ref(false)
const toggleClass = ref('downloaded');


</script>


<style>
.p-sidebar-right .p-sidebar
{
    width: 60%;
    height: 100%;
}
</style>


<style lang="sass" scoped>
#btn-download
  cursor: pointer
  display: block
  width: 48px
  height: 48px
  border-radius: 50%
  -webkit-tap-highlight-color: transparent
  //transform: scale(2)
  //centering
  position: absolute
  top: calc(50% - 24px)
  left: calc(15% - 24px)
  &:hover
    //  background: rgba(#223254,.03)
  svg
    margin: 16px 0 0 16px
    fill: none
    transform: translate3d(0,0,0)
    polyline,
    path
      stroke: #000
      stroke-width: 1.5
      stroke-linecap: round
      stroke-linejoin: round
      transition: all .3s ease
      transition-delay: .3s
    path#check
      stroke-dasharray: 38
      stroke-dashoffset: 114
      transition: all .4s ease
  &.downloaded
    svg
      .svg-out
        opacity: 0
        animation: drop .3s linear
        transition-delay: .4s
      path#check
        stroke: #20CCA5
        stroke-dashoffset: 174
        transition-delay: .4s

@keyframes drop
  20%
    transform: (translate(0, -3px))
  80%
    transform: (translate(0, 2px))
  95%
    transform: (translate(0, 0))


</style>
