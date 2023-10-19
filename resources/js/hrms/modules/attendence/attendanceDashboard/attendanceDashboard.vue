<template>
    <LoadingSpinner v-if="useDashboard.canShowLoading" class="absolute z-50 bg-white" />
    <div class="w-full">
        <p class="mb-2 text-2xl font-semibold text-black">
            Attendance dashboard
        </p>
        <div class="flex justify-between items-center p-2 bg-white border rounded-lg">
            <div class="mx-2">
                <p class=" font-[14px] font-['Poppins']  text-gray-500 ">
                    Daily Analytics - <span class="mb-2 text-sm font-semibold">
                        {{ dayjs(new Date()).format('MMMM DD,YYYY') }}</span>
                </p>
            </div>
            <div class="flex items-center justify-end gap-3 mx-4 ">
                <div>
                    <Dropdown @change="useDashboard.send_selectedDepartment(department)" optionValue="id"
                        v-model="department" optionLabel="name" :options="useDashboard.departments"
                        placeholder="Select a Department" class="w-full md:w-18rem h-[36px]" />
                </div>
                <div>
                    <Dropdown optionLabel="name" placeholder="Select a Location" class="w-full md:w-14rem h-[36px]" />
                </div>
                <div><i class=" pi pi-calendar text-[#000] text-[16px]"></i></div>
            </div>
        </div>

        <div class="my-3 ">
            <AttendanceCount />
        </div>

        <div class="grid grid-cols-3 gap-2">
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

        <div class="my-3 ">
            <Shifts />
        </div>
    </div>

    <Sidebar v-model:visible="useDashboard.canShowShiftDetails" position="right" :style="{ width: '70vw !important' }">
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
        <div class="" v-if="Object.values(useDashboard.currentlySelectedShiftDetails).length >= 1">
            <DataTable scrollable scrollHeight="450px"
                :value="useDashboard.currentlySelectedShiftDetails ? useDashboard.currentlySelectedShiftDetails : []">
                <Column field="Employee_Code" header="User code"></Column>
                <Column field="Employee_Name" header="Name"></Column>
                <Column field="shift_start_time" header="Shift start time"></Column>
                <Column field="shift_end_time" header="Shift end time"></Column>
                <Column field="grace_time" header="Grace time"></Column>
            </DataTable>
        </div>
        <div v-else class="flex justify-center">
            <img class="h-[450px]" src="../../../assests/images/no-data.svg" alt="" srcset="">
        </div>
    </Sidebar>
    <Sidebar v-model:visible="useDashboard.canShowAttendanceOverview" position="right"
        :style="{ width: '70vw !important' }">
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">
                {{ useDashboard.selectedAttendanceOverviewReport }} Reports</p>
            <div class="relative right-0 mx-4 font-semibold fs-5 ">
                <button class=" bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]"
                    @click="btn_download = !btn_download, downloadAttendanceExcelExcelFile()">
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
        <div class="" v-if="Object.values(useDashboard.currentlySelectedShiftDetails).length >= 1">
            <DataTable scrollable scrollHeight="500px"
                :value="useDashboard.currentlySelectedShiftDetails ? useDashboard.currentlySelectedShiftDetails : []">
                <Column field="Employee_Code" header="Employee_Code" style="white-space: nowrap;"></Column>
                <Column field="Employee_Name" header="Employee_Name" style="white-space: nowrap;"></Column>
                <Column field="Department" header="Department" style="white-space: nowrap;"></Column>
                <Column field="Process" header="Process" style="white-space: nowrap;"></Column>
                <Column field="Location" header="Location" style="white-space: nowrap;"></Column>
            </DataTable>

        </div>
        <div v-else class="flex justify-center">
            <img class="h-[450px]" src="../../../assests/images/no-data.svg" alt="" srcset="">
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

onMounted(async () => {

    await useDashboard.getAttendanceDashboardMainSource()
    useDashboard.GetDepartment();
});

const department = ref();
onMounted(async () => {

    await useDashboard.getAttendanceDashboardMainSource()
    useDashboard.GetDepartment();
});


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

    });

    worksheet.addRow(['']);

    // Merge three cells for the author message
    const authorRow = worksheet.addRow(['']); // Add an empty row
    authorRow.getCell(1).value = authorMessage;
    worksheet.mergeCells(authorRow.number, 1, authorRow.number, 3); // Merge three cells
    authorRow.getCell(1).alignment = { wrapText: true };
    authorRow.getCell(1).font = { italic: true };


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




const downloadAttendanceExcelExcelFile = async () => {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Sheet1');

    // Specify the headers you want to include in the Excel file
    // const desiredHeaders = ['user_code', 'user_code', 'shift_start_time', 'shift_end_time', 'shift_end_time'];
    const desiredHeaders = ['Employee_Code', 'Employee_Name', 'Department', 'Process', 'Location'];
    const authorMessage = 'This report generated by ABShrms payroll software ';
    // Add headers to the worksheet
    // const headers = Object.keys(useDashboard.ShowEmployeeStatuswise[0]);
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
    Object.values(useDashboard.downloadAttendanceOverviewDetails[0]).forEach((item, index) => {
        console.log(item);
        const row = [];
        headers.forEach((header) => {
            row.push(item[header]);
        });
        worksheet.addRow(row);

    });

    worksheet.addRow(['']);

    // Merge three cells for the author message
    const authorRow = worksheet.addRow(['']); // Add an empty row
    authorRow.getCell(1).value = authorMessage;
    worksheet.mergeCells(authorRow.number, 1, authorRow.number, 3); // Merge three cells
    authorRow.getCell(1).alignment = { wrapText: true };
    authorRow.getCell(1).font = { italic: true };


    // Create a Blob from the workbook
    const blob = await workbook.xlsx.writeBuffer();

    // Create a Blob URL for the Excel file
    const blobURL = window.URL.createObjectURL(new Blob([blob]));

    // Create a temporary link element to trigger the download
    const link = document.createElement('a');
    link.href = blobURL;
    link.download = `${useDashboard.selectedAttendanceOverviewReport}_${new Date()}.xlsx`; // Set the desired file name
    link.click();

    // Clean up the Blob URL
    window.URL.revokeObjectURL(blobURL);
};



const btn_download = ref(false)
const toggleClass = ref('downloaded');


</script>




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
