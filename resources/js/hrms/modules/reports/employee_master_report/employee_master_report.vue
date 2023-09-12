<template>
    <div class="px-4">
        <h1 class=" text-black text-[24px]">Employee Master Report</h1>

        <div style="position: relative;">
            <!-- <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line"> -->
            <div class="row flex w-[100%] ">

                <ul class="mb-3 divide-x col-4 nav nav-pills divide-solid nav-tabs-dashed "  id="pills-tab" role="tablist">
                    <li class=" nav-item" role="presentation">
                        <a class="px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]" id=""
                            data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="activetab = 1"
                            :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                         
                            Employee Master 
                        </a>
                        <div v-if="activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px]" style="border:2px solid #F9BE00 !important">
                        </div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"></div>
                    </li>

                    <li class="border-0 nav-item position-relative" role="presentation">
                        <a class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]" id=""
                            data-bs-toggle="pill" href="" @click="activetab = 2"
                            :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']" role="tab"
                            aria-controls="" aria-selected="true">
                            Employee CTC
                        </a>
                        <div v-if="activetab === 2" class="left-0 w-full h-1 position-absolute"
                            style="border:2px solid #F9BE00 !important"></div>
                        <div v-else class="h-1 border-gray-300 border-3"></div>
                    </li>
                    <div class="border-gray-300 border-b-[3px]  w-100 mt-[-7px]"></div>
                </ul>

                <ul class="flex justify-between col-8 ">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2  font-semibold font-['poppins']">Period : </h1>
                         <Dropdown  optionLabel="month" editable v-model="periodDate" @change="useEmployeeReport.updateEmployee_Basic_CTC(periodDate)" :options="useEmployeeReport.PeriodMonth" optionValue="date" placeholder="Select period" class=" min-w-[100px] w-[114px] !font-semibold !font-['poppins'] !h-10 text-[#000] "  />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins']">Department : </h1>
                        <Dropdown v-model="department" editable  optionLabel="name" placeholder="Department" class="w-[200px] !font-semibold !font-['poppins'] text-[#000] !h-10" optionValue="id" :options="useEmployeeReport.department" @change="useEmployeeReport.getEmployeeCTCReports(department)" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins'] " >Legal Entity : </h1>
                        <Dropdown @change="useEmployeeReport.sentFilterClientIds(legalEntity)" v-model="legalEntity" editable  optionLabel="client_fullname" :options="useEmployeeReport.client_ids" optionValue="id" placeholder="Legal Entity" class="w-[200px] !font-semibold !font-['poppins'] text-[#000] !h-10"  />
                    </li>
                </ul>

            </div>

            <!-- </div> -->
            <!-- Tab Content -->
            <div class="tab-content" id="">
                <div>
                    <div class="card-body">
                        <div v-if="activetab === 1">
                            <!-- <salary_Revision_pending /> -->
                            <employee_CTC />
                        </div>
                        <div v-if="activetab === 2">
                            <Employee_Master/>
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
import { EmployeeMasterStore } from "./employee_master_reportsStore"



const useEmployeeReport = EmployeeMasterStore();

onMounted(()=>{
    useEmployeeReport.fetchFilterClientIds();
    useEmployeeReport.getALLdepartment();
    useEmployeeReport.getPeriodMonth();
    legalEntity.value = "legal Entity";
    department.value = "Department";
    periodDate.value = "Select period";
})



const activetab = ref(1);

const legalEntity = ref();

const department = ref();

const periodDate = ref();






</script>

<style>

</style>
