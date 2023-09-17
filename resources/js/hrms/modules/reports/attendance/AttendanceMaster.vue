<template>
    <div class="px-2">
        <div class="flex justify-between mb-[10px]">
            <h1 class=" text-black text-[24px] font-semibold ">Attendance Reports</h1>
            <div>
                <button
                    class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] border-[#DDDDDD] mx-2 rounded-[4px] "><i
                        class="mr-2 pi pi-filter"></i> Apply Filter</button>
            </div>
        </div>
        <div style="position: relative;">
            <div class="flex justify-between">
                <ul class="flex mb-3 divide-x max-[1200px]:!w-[50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]"
                    id="pills-tab" role="tablist">
                    <li class="nav-item !border-0  text-center font-['poppins'] text-[14px] text-[#001820]"
                        role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]"
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="Reports_store.activetab = 1"
                            :class="[Reports_store.activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            DETAILED REPORT
                        </a>

                        <div v-if="Reports_store.activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important">
                        </div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"
                            style="border:2.2px solid #dcdcdc !important"></div>
                    </li>

                    <li class=" nav-item  !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]"
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="Reports_store.activetab = 2"
                            :class="[Reports_store.activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            MUSTER ROLL
                        </a>

                        <div v-if="Reports_store.activetab === 2" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"
                            style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <li class=" nav-item  !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]"
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="Reports_store.activetab = 3"
                            :class="[Reports_store.activetab === 3 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            CONSOLIDATE
                        </a>
                        <div v-if="Reports_store.activetab === 3" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"
                            style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <li class=" nav-item  !border-0  flex items-center " role="presentation">
                        <a class="px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]"
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="Reports_store.activetab = 4"
                            :class="[Reports_store.activetab === 4 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            OVERTIME
                        </a>

                        <div v-if="Reports_store.activetab === 4" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"
                            style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <li class=" nav-item !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]"
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="Reports_store.activetab = 5"
                            :class="[Reports_store.activetab === 5 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            OTHERS
                        </a>
                        <div v-if="Reports_store.activetab === 5" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"
                            style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                </ul>

                <ul
                    class="flex justify-between max-[1200px]:w-[50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black mx-1 font-semibold font-['poppins']">Period : </h1>
                        <Dropdown optionLabel="month" optionValue="date" :options="Reports_store.PeriodMonth"
                            v-model="periodDate" @change="Reports_store.getSelectoption('date',periodDate,Reports_store.activetab)"
                            placeholder="Select period"
                            class="w-[120px]  mx-1 !h-10 my-1  !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black mx-2 font-semibold  font-['poppins']">Department : </h1>
                        <MultiSelect v-model="department" :options="Reports_store.department" optionLabel="name"
                            placeholder="Department" @change="Reports_store.getSelectoption('department',department,Reports_store.activetab)"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[140px] my-1  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black mx-1 font-semibold  font-['poppins'] ">Legal Entity : </h1>
                        <MultiSelect @change="Reports_store.getSelectoption('legal_entity',legalEntity,Reports_store.activetab)" v-model="legalEntity"
                            :options="Reports_store.legal_entity" optionLabel="client_fullname" placeholder="Legal Entity"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[140px] my-1  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                </ul>

            </div>

            <!-- </div> -->
            <!-- Tab Content -->
            <div class="tab-content" id="">

                <div class="card-body">

                    <div>
                        <div class="bg-white p-2 flex  justify-between">

                            <div>
                                <InputText placeholder="Search" v-model="filters['global'].value" class="border-color !h-10"
                                    style="height: 3em; font-['poppins'] " />
                            </div>
                            <div class="flex items-center ">
                                <button class=" bg-[#E6E6E6] p-2 mx-2 rounded-md w-[120px]"
                                    @click="Reports_store.btn_download = !Reports_store.btn_download, Reports_store.downloadEmployeeMaster()">
                                    <p class=" relative left-2 font-['poppins']">Download</p>
                                    <div id="btn-download" style=" position: absolute; right: 0;"
                                        :class="[Reports_store.btn_download == true ? toggleClass : ' ']">
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


                        </div>

                        <div>

                            <DataTable :value="Reports_store.AttendanceReportSource" paginator :rows="5"
                                :rowsPerPageOptions="[5, 10, 20, 50]"
                                paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                                currentPageReportTemplate="{first} to {last} of {totalRecords}" responsiveLayout="scroll">
                                <Column v-for="col of Reports_store.AttendanceReportDynamicHeaders" :key="col.title"
                                    :field="col.title" :header="col.title"
                                    style="white-space: nowrap;text-align: left; !important">
                                </Column>
                            </DataTable>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { EmployeeMasterStore } from "../employee_master_report/employee_master_reportsStore";
import { UseReports_store } from "./store/reports_store";

import others_attendance_Reports from './others_attendanceReports/others_attendance_Reports.vue';
import halfdayabsentreport from './HalfDayAbsentReport/halfdayabsentreport.vue';
import attendanceAbsentReports from './attendanceAbsentReports/attendanceAbsentReports.vue';
import attendanceBasicReports from './attendanceBasicReports/attendanceBasicReports.vue';
import attendanceOvertimeReports from './attendanceOvertimeReports/attendanceOvertimeReports.vue'
import attendanceEarlygoingReports from './attendanceEarlygoingReports/attendanceEarlygoingReports.vue';
import attendanceLatecomingReports from './attendanceLatecomingReports/attendanceLatecomingReports.vue'
import attendanceReport_Detailed from './attendanceDetailReports/AttendanceReport_Detailed.vue';
import { FilterMatchMode } from 'primevue/api';


const useEmployeeReport = EmployeeMasterStore();

const Reports_store = UseReports_store();

const filters = ref({
    'global': { value: null, matchMode: FilterMatchMode.CONTAINS },
});

onMounted(() => {
    Reports_store.fetchFilterClientId();
    // Reports_store.getEmployeeCTC();
    Reports_store.get_All_Department();
    Reports_store.getPeriodMonth();
    legalEntity.value = "";
    department.value = "";
    periodDate.value = "";
});



const activetab = ref(1);

const legalEntity = ref();

const department = ref();

const periodDate = ref();

const selectCategory = ref();

const dropdown = ref([
    { name: "Active", id: 1 },
    { name: "Yet To Active", id: 0 },
    { name: "Exit", id: -1 },
])






</script>

<style>
.dropdown:hover .dropdown-content
{
    display: block !important;
}

.p-overlaypanel .p-overlaypanel-content
{
    padding: 0;
    z-index: 0 !important;
}

.p-inputtext
{
    position: relative;
    top: 7px;
}

.p-inputtext::placeholder
{
    color: #000 !important;
}

.p-dropdown-label::placeholder,
.p-inputtext::placeholder
{
    color: #000 !important;
}

.p-placeholder
{
    color: #000 !important;
    font-family: 'poppins';
    /* font-size:11px; */
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
