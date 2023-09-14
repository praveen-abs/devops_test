<template>
        <loadingSpinner v-if="useEmployeeReport.canShowLoading" class="absolute z-50 bg-white" />
    <div class="px-4">
        <div class="flex justify-between mb-[10px]">
            <h1 class=" text-black text-[24px] font-semibold ">Employee Master Report</h1>
            <div>
                <!-- <button class="px-2 py-2 bg-black rounded-lg hover:bg-sky-700"
                    @click="useEmployeeReport.getEmployeeCTC();"><i class="pi pi-filter"></i></button> -->
                    
                    <button @click="useEmployeeReport.updateEmployeeApplyFilter(2)" v-if="useEmployeeReport.filterbtn === 1&&activetab === 2" class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] border-[#DDDDDD] mx-2 rounded-[4px] " ><i class="mr-2 pi pi-filter"></i> Apply Filter</button>
                    <button @click="useEmployeeReport.updateEmployeeApplyFilter(1)" v-if="useEmployeeReport.filterbtn === 2 && activetab === 2" class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px] " ><i class="mr-2 pi pi-times"></i> Clear Filter</button>
                    <button @click="useEmployeeReport.updateEmployeeMasterApplyFilter(2)"  v-if="useEmployeeReport.filterbtn === 1 && activetab === 1" class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] border-[#DDDDDD] mx-2 rounded-[4px] " ><i class="mr-2 pi pi-filter"></i> Apply Filter</button>
                    <button @click="useEmployeeReport.updateEmployeeMasterApplyFilter(1)" v-if="useEmployeeReport.filterbtn === 2 && activetab === 1" class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px] " ><i class="mr-2 pi pi-times"></i> Clear Filter</button>
            </div>
        </div>

        <div style="position: relative;">
            <!-- <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line"> -->
            <div class=" flex w-[100%] ">
                <ul class="flex mb-3 divide-x col-3 max-[1300px]:w-[50%] w-[35%] nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%] !border-0 "
                    id="pills-tab" role="tablist">
                    <li class="w-[50%] nav-item !border-0  text-center font-['poppins'] text-[14px] text-[#001820]" role="presentation">
                  
                        <!-- <router-link to="" @click="activetab = 1"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 1 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            Master </router-link> -->
                            <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820] w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab =1" :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            Employee
                            Master
                        </a>    

                        <div v-if="activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important">
                        </div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>

                    <li class=" nav-item w-[50%] !border-0  flex items-center " role="presentation">
                        <a class="px-2 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]  w-[100%]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                            aria-selected="true" @click="activetab = 2" :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            Employee
                            CTC
                        </a>    
                        <!-- <router-link to="/testing_pradeesh/employee_CTC" @click="activetab = 2"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 2 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            CTC </router-link> -->
                        <div v-if="activetab === 2" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                            <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl" style="border:2.2px solid #dcdcdc !important"></div>
                    </li>
                    <!-- <div class="border-gray-300 border-b-[3px]  w-100 mt-[-7px] absolute bottom-0 z-0"></div> -->
                </ul>

                <ul class="flex justify-between max-[1200px]:w-[50%] w-[65%] max-[1200px]:justify-start  flex-wrap max-[1024px]:w-[100%] ">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2  font-semibold font-['poppins']">Period : </h1>
                        
                        <!-- <MultiSelect v-model="periodDate" :options="useEmployeeReport.PeriodMonth" optionLabel="month"
                            placeholder="Select period" @change="useEmployeeReport.updateEmployee_Basic_CTC(periodDate)"
                            optionValue="date" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[140px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" /> -->
                            
                        <!-- <Dropdown  optionLabel="month" editable v-model="periodDate" @change="useEmployeeReport.updateEmployee_Basic_CTC(periodDate)" :options="useEmployeeReport.PeriodMonth" optionValue="date" placeholder="Select period" class=" min-w-[100px] w-[114px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"  /> -->
                        
                        <Dropdown optionLabel="month" optionValue="date" :options="useEmployeeReport.PeriodMonth" v-model="useEmployeeReport.period_Date"
                        @change="useEmployeeReport.updateEmployee_Basic_CTC(useEmployeeReport.period_Date)" placeholder="Select period"
                    class="w-[150px]  mx-2 !h-10  !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]" />

                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins']">Department : </h1>
                        <!-- <Dropdown v-model="department" editable  optionLabel="name" placeholder="Department" class="w-[200px] !font-semibold !font-['poppins'] text-[#000] !h-10 !bg-[#E6E6E6]" optionValue="id" :options="useEmployeeReport.department" @change="useEmployeeReport.getEmployeeCTCReports(department)" />
                         -->
                        <MultiSelect v-model="useEmployeeReport.Department" :options="useEmployeeReport.department" optionLabel="name"
                            placeholder="Department" @change="useEmployeeReport.getEmployeeCTCReports(useEmployeeReport.Department)"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[150px]   !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins'] ">Legal Entity : </h1>
                        <!-- <Dropdown @change="useEmployeeReport.sentFilterClientIds(legalEntity)" v-model="legalEntity" editable  optionLabel="client_fullname" :options="useEmployeeReport.client_ids" optionValue="id" placeholder="Legal Entity" class="w-[200px] !font-semibold !font-['poppins'] text-[#000] !h-10 !bg-[#E6E6E6]"  /> -->

                        <MultiSelect @change="useEmployeeReport.sentFilterClientIds(useEmployeeReport.legal_Entity)" v-model="useEmployeeReport.legal_Entity"
                            :options="useEmployeeReport.client_ids" optionLabel="client_fullname" placeholder="Legal Entity"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[150px]  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">

                        <!-- <Dropdown optionLabel="name" optionValue="id" :options="dropdown" v-model="useEmployeeReport.select_Category"
                    @change="useEmployeeReport.sentcategory(useEmployeeReport.select_Category)" placeholder="Select Category"
                    class="w-[150px]  mx-2 !h-10  !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]" /> -->

                    <MultiSelect  @change="useEmployeeReport.sentcategory(useEmployeeReport.select_Category)" v-model="useEmployeeReport.select_Category"
                    optionValue="id" :options="dropdown" optionLabel="name" placeholder="Select Category"
                             :maxSelectedLabels="3"
                            class="min-w-[100px] w-[150px]  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6] mx-2 " />
                    </li>
                </ul>

            </div>

            <!-- </div> -->
            <!-- Tab Content -->
            <div class="tab-content" id="">
                    <div>
                        <div class="card-body">
                            <div v-if="activetab === 1">
                                <Employee_Master />
                            </div>
                            <div v-if="activetab === 2">
                                <!-- <EmployeeSummary /> -->
                                <employee_CTC />
                            </div>
                            <div v-if="activetab === 3">
                                <!-- <salary_Revision_Cancelled /> -->
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
import employee_CTC from "./employee_CTC.vue";
import Employee_Master from './Employee_Master.vue';
import { EmployeeMasterStore } from "./employee_master_reportsStore";
import loadingSpinner from "../../../components/LoadingSpinner.vue";




const useEmployeeReport = EmployeeMasterStore();

onMounted(() => {
    useEmployeeReport.fetchFilterClientIds();
    useEmployeeReport.getEmployeeCTC();
    useEmployeeReport.getALLdepartment();
    useEmployeeReport.getPeriodMonth();

})



const activetab = ref(1);



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
    top: 2px;
}

.p-inputtext::placeholder
{
    color: #000 !important;
}

.p-dropdown-label::placeholder,
.p-inputtext::placeholder
{
    color: #000 !important;
    font-size:10px;
}

.p-placeholder
{
    color: #000 !important;
    font-family: 'poppins';
    font-size:12px;
    /* font-size:11px; */
}

.p-inputtext{
    color: #000 !important;
    font-family: 'poppins';
}
.p-dropdown-label{
    position: relative;
    top:-2px;
}
</style>
