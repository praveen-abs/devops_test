<template>
    <div>
        <h1 class=" text-black text-[24px]">Employee Master Report</h1>

        <div style="position: relative;">
            <!-- <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line"> -->
            <div class="row flex w-[100%]">

                <ul class="col-4 divide-x nav nav-pills divide-solid nav-tabs-dashed mb-3 "  id="pills-tab" role="tablist">
                    <li class=" nav-item" role="presentation">
                        <a class="px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]" id=""
                            data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true"
                            @click="activetab = 1"
                            :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                            Employee CTC
                        </a>
                        <div v-if="activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px]" style="border:2px solid #F9BE00 !important">
                        </div>
                        <div v-else class=" border-3 h-1 rounded-l-3xl border-gray-300"></div>
                    </li>

                    <li class=" nav-item position-relative  border-0" role="presentation">
                        <a class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]" id=""
                            data-bs-toggle="pill" href="" @click="activetab = 2"
                            :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']" role="tab"
                            aria-controls="" aria-selected="true">
                            Employee Master
                        </a>
                        <div v-if="activetab === 2" class=" h-1 position-absolute left-0 w-full"
                            style="border:2px solid #F9BE00 !important"></div>
                        <div v-else class=" border-3 h-1  border-gray-300"></div>
                    </li>
                    <div class="border-gray-300 border-b-[3px]  w-100 mt-[-7px]"></div>
                </ul>

                <ul class="col-8 flex justify-between ">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2  font-semibold font-['poppins']">Period : </h1>
                         <Dropdown  optionLabel="name" placeholder="Select period" class="h-[3rem] min-w-[100px] w-[200px] font-['poppins']" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold font-['poppins']">Department : </h1>
                        <Dropdown  optionLabel="name" placeholder="IT" class="w-[200px]"/>
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins']" >Legal Entity : </h1>
                        <Dropdown @change="useEmployeeReport.sentFilterClientIds(legalEntity)" v-model="legalEntity" editable  optionLabel="client_fullname" :options="useEmployeeReport.client_ids" optionValue="id" placeholder="Legal Entity" class="w-[200px] font-['poppins']"  />
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
import Employee_Master from './Employee_Master.vue';
import { EmployeeMasterStore } from "./employee_master_reportsStore"



const useEmployeeReport = EmployeeMasterStore();

onMounted(()=>{
    useEmployeeReport.fetchFilterClientIds();
    legalEntity.value = "legal Entity";
})



const activetab = ref(1);

const legalEntity = ref();






</script>

<style></style>
