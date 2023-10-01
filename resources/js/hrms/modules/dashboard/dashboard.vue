<template>
    <!-- <Dialog header="Header" v-model:visible="canShowLoadingScreen" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog> -->
    <!-- <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                    <Events />

                </div>
            </div>
        </div>
    </div> -->


    <!-- <div class="dashboard-wrapper mt-30">
        <div class="mb-2 card left-line">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted me-5" role="presentation">
                        <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#dashboard" aria-selected="true"
                            role="tab">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link" data-bs-toggle="tab" href="#hrDashboard" aria-selected="true" role="tab">
                            HR Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->

    <!-- <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show fade active " id="dashboard" role="tabpanel" aria-labelledby="pills-profile-tab">
                <employee_dashboard />
            </div>
            <div class="tab-pane show fade " id="hrDashboard" role="tabpanel" aria-labelledby="pills-profile-tab">
                <hr_dashboard />
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ipad-query">
                            <Events />

                        </div>
                    </div>
                </div>


            </div>

        </div> -->
    <!-- </div> -->
    <div class="col"
        v-if="service.current_user_role == 1 || service.current_user_role == 2 || service.current_user_role == 3">
        <button class=" font-semibold text-sm p-1.5 rounded-l-lg"
            :class="[useDashboard.currentDashboard === 0 ? 'bg-green-200 text-black border border-black' : 'bg-white text-slate-700 border border-black']"
            @click="useDashboard.currentDashboard = 0">Self-dashboard</button>
        <button class=" font-semibold text-sm p-1.5 rounded-r-lg"
            :class="[useDashboard.currentDashboard === 1 ? 'bg-green-200 text-black border border-black' : 'bg-white text-slate-700 border border-black']"
            @click="useDashboard.currentDashboard = 1">Org-dashboard</button>
    </div>
    <loadingSpinner v-if="useDashboard.canShowLoading" />

    <transition v-else-if="useDashboard.currentDashboard == 1"
        enter-active-class="transition ease-out transform duration-600" enter-class="translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-100 ease-in transform"
        leave-class="translate-y-0 opacity-100" leave-to-class="translate-y-2 opacity-0">
        <Hr_dashboard />
    </transition>
    <transition v-else enter-active-class="transition ease-out transform duration-600" enter-class="translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-100 ease-in transform"
        leave-class="translate-y-0 opacity-100" leave-to-class="translate-y-2 opacity-0">
        <employee_dashboard />
    </transition>

    <Sidebar v-model:visible="useDashboard.canShowSidebar" position="right" class="w-full">
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 "> Reports</p>
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
        <div class="mt-6" v-if="useDashboard.ShowEmployeeStatuswise">
            <DataTable :value="useDashboard.ShowEmployeeStatuswise ? useDashboard.ShowEmployeeStatuswise : []">
                <Column field="user_code" header="User code"></Column>
                <Column field="name" header="Name" style="text-align: left !important;white-space: no !important;"></Column>
                <Column field="department_name" header="Department"
                    style="text-align: left !important;white-space: no !important;"></Column>
                <Column field="process" header="Process" style="text-align: left !important;white-space: no !important;">
                </Column>
                <Column field="location" header="Work location"
                    style="text-align: left !important;white-space: no !important;"></Column>
            </DataTable>
        </div>
    </Sidebar>
</template>


<script setup>
import employee_dashboard from './employee_dashboard/employee_dashboard.vue'
import * as ExcelJS from 'exceljs'

import loadingSpinner from '../../components/LoadingSpinner.vue'
import { useMainDashboardStore } from './stores/dashboard_service'
import { ref, onMounted, onUnmounted, watch } from 'vue'
import { Service } from '../Service/Service'
import Hr_dashboard from './hr_dashboard/hr_dashboard.vue';
import axios from 'axios'

const useDashboard = useMainDashboardStore();
const canShowLoadingScreen = ref();
const service = Service()


// Watch for changes in receivedData
const stopWatchingData = watch(useDashboard.allEventSource, (newValue, oldValue) => {
    if (newValue !== null) {
        handleData(newValue);
    }
});

onMounted(async () => {
    if (useDashboard.isDashboardDataReceived && useDashboard.isHrDashboardDataReceived) {
        canShowLoadingScreen.value = true;
        await useDashboard.getMainDashboardData();
        await useDashboard.getHrDashboardMainSource()

        // await useDashboard.getAttendanceStatus();
        Service();
        canShowLoadingScreen.value = false;
        axios.get('/clear_cache').then(res=>{
            console.log(res.data);
        })
    }


})

// Clean up the watcher when the component is unmounted
onUnmounted(() => {
    stopWatchingData();
});




const downloadExcelFile = async () => {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Sheet1');

    // Specify the headers you want to include in the Excel file
    // const desiredHeaders = ['user_code', 'user_code', 'shift_start_time', 'shift_end_time', 'shift_end_time'];
    const desiredHeaders = ['user_code', 'name', 'department', 'process', 'location'];
    const authorMessage = 'this report generated by ABShrms payroll software ';
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
    Object.values(useDashboard.ShowEmployeeStatuswise).forEach((item, index) => {
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

        // worksheet.addRow(row).eachCell((cell) => {
        //     cell.style = cellStyle;
        // });

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
    link.download = `${useDashboard.reportName}.xlsx`; // Set the desired file name
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
    width: 80%;
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
