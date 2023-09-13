<template>
    <div class="px-4">
        <div class="flex justify-between mb-[10px]">
            <h1 class=" text-black text-[24px] font-semibold ">Employee Master Report</h1>

            <div>
                <Dropdown optionLabel="name" optionValue="id" :options="dropdown" v-model="selectCategory"
                    @change="UseEmployeeMaster.sentcategory(selectCategory)" placeholder="Select Category"
                    class="w-[220px] mx-2 min-w-[200px] !h-10  !font-semibold !font-['poppins'] !text-[#000] !bg-[#E6E6E6]" />
                <button class="px-3 py-2 text-white bg-black rounded-lg hover:bg-sky-700"
                    @click="UseEmployeeMaster.getEmployeeCTC">Filter All</button>
            </div>

        </div>


        <div style="position: relative;">
            <!-- <div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line"> -->
            <div class="row flex w-[100%] ">
                <ul class="flex mb-3 divide-x col-3 nav nav-pills divide-solid nav-tabs-dashed max-[1024px]:w-[100%] "
                    id="pills-tab" role="tablist">
                    <li class=" nav-item w-[50%] bottom-0" role="presentation">
                        <router-link to="" @click="activetab = 1"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 1 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            Master </router-link>

                        <div v-if="activetab === 1" class=" h-1 rounded-l-3xl relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important">
                        </div>
                        <div v-else class="h-1 border-gray-300 border-3 rounded-l-3xl"></div>
                    </li>

                    <li class=" nav-item w-[50%] bottom-0 " role="presentation">
                        <router-link to="employee_CTC" @click="activetab = 2"
                            class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]"
                            :class="[activetab === 2 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']">Employee
                            CTC </router-link>
                        <div v-if="activetab === 2" class=" w-[100%] h-1 relative top-[0px] !z-[10]"
                            style="border:2.2px solid #F9BE00 !important"></div>
                        <div v-else class="h-1 border-gray-300 border-3"></div>
                    </li>
                    <div class="border-gray-300 border-b-[3px]  w-100 mt-[-7px] absolute bottom-0 z-0"></div>
                </ul>

                <ul class="flex justify-between col-9 flex-wrap max-[1024px]:w-[100%] ">
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2  font-semibold font-['poppins']">Period : </h1>
                        <MultiSelect v-model="periodDate" :options="useEmployeeReport.PeriodMonth" optionLabel="month"
                            placeholder="Select period" @change="useEmployeeReport.updateEmployee_Basic_CTC(periodDate)"
                            optionValue="date" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[140px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                        <!-- <Dropdown  optionLabel="month" editable v-model="periodDate" @change="useEmployeeReport.updateEmployee_Basic_CTC(periodDate)" :options="useEmployeeReport.PeriodMonth" optionValue="date" placeholder="Select period" class=" min-w-[100px] w-[114px] !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]"  /> -->

                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins']">Department : </h1>
                        <!-- <Dropdown v-model="department" editable  optionLabel="name" placeholder="Department" class="w-[200px] !font-semibold !font-['poppins'] text-[#000] !h-10 !bg-[#E6E6E6]" optionValue="id" :options="useEmployeeReport.department" @change="useEmployeeReport.getEmployeeCTCReports(department)" />
                         -->
                        <MultiSelect v-model="department" :options="useEmployeeReport.department" optionLabel="name"
                            placeholder="Department" @change="useEmployeeReport.getEmployeeCTCReports(department)"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[200px]  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />
                    </li>
                    <li class="flex items-center">
                        <h1 class="text-[12px] text-black px-2 font-semibold  font-['poppins'] ">Legal Entity : </h1>
                        <!-- <Dropdown @change="useEmployeeReport.sentFilterClientIds(legalEntity)" v-model="legalEntity" editable  optionLabel="client_fullname" :options="useEmployeeReport.client_ids" optionValue="id" placeholder="Legal Entity" class="w-[200px] !font-semibold !font-['poppins'] text-[#000] !h-10 !bg-[#E6E6E6]"  /> -->

                        <MultiSelect @change="useEmployeeReport.sentFilterClientIds(legalEntity)" v-model="legalEntity"
                            :options="useEmployeeReport.client_ids" optionLabel="month" placeholder="Legal Entity"
                            optionValue="id" :maxSelectedLabels="3"
                            class="min-w-[100px] w-[200px]  !font-semibold !font-['poppins'] !h-10 text-[#000] !bg-[#E6E6E6]" />

                    </li>
                    <li class="flex items-center">

                    </li>
                </ul>

            </div>

            <!-- </div> -->
            <!-- Tab Content -->
            <div id="">
                <router-view></router-view>
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
