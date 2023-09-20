<template>
    <div class="px-2">
        <div class="flex justify-between mb-[10px]">
            <h1 class=" text-black text-[24px] font-semibold ">Attendance Reports</h1>
            <div>
                    <button class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] border-[#DDDDDD] mx-2 rounded-[4px] " ><i class="mr-2 pi pi-filter"></i> Apply Filter</button>
            </div>
        </div>

        <div style="position: relative;">
            <div class="flex justify-between"> 
                <ul class="flex mb-3 divide-x max-[1200px]:!w-[50%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%]"
                    id="pills-tab" role="tablist">
                    <li class="nav-item !border-0  text-center font-['poppins'] text-[14px] text-[#001820]" role="presentation">
                  
                        <!-- <router-link to="" @click="activetab = 1"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 1 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            Master </router-link> -->
                            <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab =1" :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            DETAILED REPORT
                        </a>    

                        <div v-if="activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important">
                        </div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>

                    <li class=" nav-item  !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab = 2" :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            MUSTER ROLL
                        </a>    
                        <!-- <router-link to="/testing_pradeesh/employee_CTC" @click="activetab = 2"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 2 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            CTC </router-link> -->
                        <div v-if="activetab === 2" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                            <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <li class=" nav-item  !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab = 3" :class="[activetab === 3 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            CONSOLIDATE
                        </a>    
                        <!-- <router-link to="/testing_pradeesh/employee_CTC" @click="activetab = 2"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 2 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            CTC </router-link> -->
                        <div v-if="activetab === 3" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                            <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <li class=" nav-item  !border-0  flex items-center " role="presentation">
                        <a class="px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab = 4" :class="[activetab === 4 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            OVERTIME
                        </a>    
                        <!-- <router-link to="/testing_pradeesh/employee_CTC" @click="activetab = 2"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 2 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            CTC </router-link> -->
                        <div v-if="activetab === 4" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                            <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <li class=" nav-item !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab = 5" :class="[activetab === 5 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            OTHERS
                        </a>    
                        <!-- <router-link to="/testing_pradeesh/employee_CTC" @click="activetab = 2"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 2 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            CTC </router-link> -->
                        <div v-if="activetab === 5" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                            <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <!-- <div class="border-gray-300 border-b-[3px]  w-100 mt-[-7px] absolute bottom-0 z-0"></div> -->
                </ul>

                <ul class="flex justify-between max-[1200px]:w-[50%] max-[1200px]:justify-start flex-wrap max-[1024px]:w-[100%]">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black mx-1 font-semibold font-['poppins']">Period : </h1>                        
                        <Dropdown optionLabel="month" optionValue="date" :options="useEmployeeReport.PeriodMonth" v-model="periodDate"
                        @change="useEmployeeReport.updateEmployee_Basic_CTC(periodDate)" placeholder="Select period"
                    class="w-[120px]  mx-1 !h-10 my-1  !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black mx-2 font-semibold  font-['poppins']">Department : </h1>
                        <MultiSelect v-model="department" :options="useEmployeeReport.department" optionLabel="name"
                            placeholder="Department" @change="useEmployeeReport.getEmployeeCTCReports(department)"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[140px] my-1  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black mx-1 font-semibold  font-['poppins'] ">Legal Entity : </h1>
                        <MultiSelect @change="useEmployeeReport.sentFilterClientIds(legalEntity)" v-model="legalEntity"
                            :options="useEmployeeReport.client_ids" optionLabel="client_fullname" placeholder="Legal Entity"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[140px] my-1  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                </ul>

            </div>

            <!-- </div> -->
            <!-- Tab Content -->
            <div class="tab-content" id="">
                    <div>
                        <div class="card-body">
                            <div v-if="activetab === 1">
                                <attendanceBasicReports/>
                            </div>
                            <div v-if="activetab === 2">
                          
                            </div>
                            <div v-if="activetab === 3">
                         
                            </div>
                            <div v-if="activetab === 6">
                                <others_attendance_Reports/>
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
import attendanceBasicReports from './attendanceBasicReports/attendanceBasicReports.vue';
import others_attendance_Reports from './others_attendanceReports/others_attendance_Reports.vue';

import { EmployeeMasterStore } from "../employee_master_report/employee_master_reportsStore";




const useEmployeeReport = EmployeeMasterStore();

onMounted(() => {
    useEmployeeReport.fetchFilterClientIds();
    useEmployeeReport.getEmployeeCTC();
    useEmployeeReport.getALLdepartment();
    useEmployeeReport.getPeriodMonth();
    legalEntity.value = "";
    department.value = "";
    periodDate.value = "";
})



const activetab = ref(1);

const legalEntity = ref();

const department = ref();

const periodDate = ref();

const selectCategory = ref();

const dropdown = ref([
    {name: "Active" , id:1},
    {name: "Yet To Active" , id:0},
    {name: "Exit" , id:-1},
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

.p-dropdown-label,
.p-inputtext
{
    position: relative;
    top: 3px;
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
}</style>
