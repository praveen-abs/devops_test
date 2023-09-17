<template>
        <!-- <loadingSpinner v-if="useEmployeeReport.canShowLoading" class="absolute z-50 bg-white" /> -->
    <div class="px-2">
        <div class="flex justify-between mb-[10px]">
            <h1 class=" text-black text-[24px] font-semibold ">Employee Master Report</h1>
            <div>
<!-- 
                <button @change="useEmployeeReport.clearfilterBtn(activetab)"
                    class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px] "><i
                        class="mr-2 pi pi-times"></i> Clear Filter</button> -->

                        <button @click="useEmployeeReport.clearfilterBtn(activetab)"
                    class=" flex items-center text-[#000] !font-semibold !font-['poppins'] px-3 py-2 border-[1px] bg-[#F9BE00] mx-2 rounded-[4px] "><i
                        class="mr-2 pi pi-times"></i> Clear Filter</button> 
            </div>
        </div>

        <div style="position: relative;">
            <!-- <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line"> -->
            <div class="grid grid-cols-12  w-[100%] ">
                <ul class="grid items-center grid-cols-2 col-span-3 whitespace-nowrap"
                    id="pills-tab" role="tablist">
                    <li class=" nav-item text-center font-['poppins'] text-[14px] text-[#001820]"
                        role="presentation" >
                        <a class="p-2 position-relative font-['poppins'] text-[14px] text-[#001820] w-[100%] "
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="activetab = 1"
                            :class="[activetab === 1 ? ' rounded-l-[2px] font-semibold !border-b-[2px] !border-[#F9BE00]' : 'font-medium !text-[#8B8B8B] ']" >
                            Employee
                            Master
                        </a>

                        <!-- <div v-if="activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px] !z-[10]"
                            >
                        </div> 
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"
                            style="border:2.2px solid #dcdcdc !important"></div> -->
                    </li>

                    <li class="flex items-center nav-item" role="presentation">
                        <a class="p-2 position-relative font-['poppins'] text-[14px] text-[#001820]  w-[100%]"
                            id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="activetab = 2"
                            :class="[activetab === 2 ? 'rounded-r-[2px] font-semibold !border-b-[2px] !border-[#F9BE00]' : 'font-medium !text-[#8B8B8B]']">
                            Employee
                            CTC
                        </a>
                    </li>
                    <!-- <div class="border-gray-300 border-b-[3px]  w-100 mt-[-7px] absolute bottom-0 z-0"></div> -->
                </ul>

                <ul class="grid grid-cols-4 col-span-9 gap-4 ">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2  font-semibold font-['poppins'] whitespace-nowrap">Period : </h1>


                        <Dropdown optionLabel="month" optionValue="date" :options="useEmployeeReport.PeriodMonth"
                            v-model="useEmployeeReport.period_Date"
                            @change="useEmployeeReport.getSelectoption('date',useEmployeeReport.period_Date,activetab)"
                            placeholder="Select period"
                            class="w-[150px]  mx-2 !h-10  !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]" />

                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins']  whitespace-nowrap">Department : </h1>
    
                        <MultiSelect v-model="useEmployeeReport.Department" :options="useEmployeeReport.department"
                            optionLabel="name" placeholder="Department"
                            @change="useEmployeeReport.getSelectoption('department',useEmployeeReport.Department,activetab)" optionValue="id"
                            :maxSelectedLabels="3"
                            class="min-w-[100px] w-[150px]   !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins']  whitespace-nowrap">Legal Entity : </h1>
                        <MultiSelect @change="useEmployeeReport.getSelectoption('legal_entity',useEmployeeReport.legal_Entity,activetab)"
                            v-model="useEmployeeReport.legal_Entity" :options="useEmployeeReport.client_ids"
                            optionLabel="client_fullname" placeholder="Legal Entity" optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[150px]  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center my-1">

                        <MultiSelect @change="useEmployeeReport.getSelectoption('Category',useEmployeeReport.select_Category,activetab)"
                            v-model="useEmployeeReport.select_Category" optionValue="id" :options="dropdown"
                            optionLabel="name" placeholder="Select Category" :maxSelectedLabels="3"
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
    // useEmployeeReport.getEmployeeCTC();
    useEmployeeReport.getALLdepartment();
    useEmployeeReport.getPeriodMonth();

})

const activeClass = ref('border-[1px] border-[#F9BE00]');

const deactivate = ref('border-[1px] border-[#DCDCDC]');



const activetab = ref(1);



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
    font-size: 10px;
}

.p-placeholder
{
    color: #000 !important;
    font-family: 'poppins';
    font-size: 12px;
    /* font-size:11px; */
}

.p-inputtext
{
    color: #000 !important;
    font-family: 'poppins';
}

.p-dropdown-label
{
    position: relative;
    top: -2px;
}

.p-multiselect-header::after
{
    content: "All";
    font-weight: 502;
    position: absolute;
    left: 50px;
}
a{
    color:#000 !important;
}
</style>
