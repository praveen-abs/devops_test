<template>
    <!-- {{ useDashboard.orgEmployeeDetailCount ? useDashboard.orgEmployeeDetailCount : [] }} -->
    <div class="w-full" v-if="useDashboard.orgEmployeeDetailCount">
        <p class=" font-[14px] font-['Poppins']  text-gray-500 ">
            Current month - <span class="mb-2 text-xl font-semibold">{{ dayjs(new
                Date()).format('MMMM') }}</span>
        </p>
        <div class="grid grid-cols-4 gap-3 my-2">
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer" @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.total_employees},useDashboard.reportName = `total_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.total_employee_count ? useDashboard.orgEmployeeDetailCount.total_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Active Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer "  @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.new_employees},useDashboard.reportName = `new_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.new_employee_count ? useDashboard.orgEmployeeDetailCount.new_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">New Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer"  @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.exit_employees},useDashboard.reportName =`active_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.exit_employee_count ? useDashboard.orgEmployeeDetailCount.exit_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Exit Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100 cursor-pointer"  @click="useDashboard.canShowSidebar = true,useDashboard.ShowEmployeeStatuswise = {...useDashboard.orgEmployeeDetailCount.yet_to_active_employees},useDashboard.reportName = `yet_to_active_employee_reports_${new Date()}`">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        {{ useDashboard.orgEmployeeDetailCount.yet_to_active_employee_count ? useDashboard.orgEmployeeDetailCount.yet_to_active_employee_count : 0 }}
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Yet to Active Employees </p>
            </div>
        </div>
    </div>

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
        <!-- {{ useDashboard.ShowEmployeeStatuswise ? useDashboard.ShowEmployeeStatuswise : [] }} -->
        <div class="" v-if="Object.values(useDashboard.ShowEmployeeStatuswise).length >= 1">
            <DataTable scrollable scrollHeight="450px"
                :value="useDashboard.ShowEmployeeStatuswise ? useDashboard.ShowEmployeeStatuswise : []">
                <Column field="Employee Code" header="Employee Code"></Column>
                <Column field="Employee Name" header="Employee Name"
                    style="text-align: left !important;white-space: no !important;"></Column>
                <Column field="Department" header="Department"
                    style="text-align: left !important;white-space: no !important;"></Column>
                <Column field="Process" header="Process" style="text-align: left !important;white-space: no !important;">
                </Column>
                <Column field="Location" header="Work location"
                    style="text-align: left !important;white-space: no !important;"></Column>
            </DataTable>
        </div>
        <div v-else class="flex justify-center">
            <img class="h-[450px]" src="../../../../assests/images/no-data.svg" alt="" srcset="">
        </div>
    </Sidebar>
</template>

<script setup>
import dayjs from 'dayjs'
import { useMainDashboardStore } from '../../stores/dashboard_service';
import { ref, onMounted, onUnmounted, watch } from 'vue'


const useDashboard = useMainDashboardStore()


const downloadExcelFile = async () => {
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Sheet1');

    // Specify the headers you want to include in the Excel file
    // const desiredHeaders = ['user_code', 'user_code', 'shift_start_time', 'shift_end_time', 'shift_end_time'];
    const desiredHeaders = ['Employee Code', 'Employee Name', 'Department', 'Process', 'Location'];
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
    width: 28rem ;
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

