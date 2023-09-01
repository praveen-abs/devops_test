<template>
    <LoadingSpinner v-if="employeePayslipStore.loading" class="absolute z-50 bg-white" />
        <div class="w-full">
            <h2 class="font-semibold text-lg my-2">Salary Details</h2>
        <DataTable :value="employeePayslipStore.array_employeePayslips_list" :paginator="true" :rows="10" dataKey="id"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]" sortField="PAYROLL_MONTH" :sortOrder="-1"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
            v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name']">
            <Column field="PAYROLL_MONTH" header="Month" :sortable="true">
                <template #body="slotProps">
                    {{ dayjs(slotProps.data.PAYROLL_MONTH).format('DD-MMM-YYYY') }}
                </template>
                <!-- <template #filter="{ filterModel, filterCallback }">
                    <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                        class="p-column-filter" :showClear="true" />
                </template> -->
            </Column>

            <Column field="TOTAL_EARNED_GROSS" header="Gross Pay"></Column>
            <Column field="Reimbursements" header="Reimbursements">
                <template #body="slotProps">
                    {{ 0 }}
                </template>
            </Column>
            <Column field="TOTAL_DEDUCTIONS" header="Deductions"></Column>
            <Column field="NET_TAKE_HOME" header="Take Home"></Column>

            <Column header="Action">
                <template #body="slotProps">
                    <Button class="z-0 btn-primary" label="View "
                        @click="employeePayslipStore.getEmployeePayslipDetailsAsHTML('', slotProps.data.PAYROLL_MONTH)" />
                </template>
            </Column>
            <column header="Download">
                <template #body="slotProps">
                    <!-- {{slotProps.data}} -->
                    <Button class="z-0 btn-primary" label="Download "
                        @click="employeePayslipStore.getEmployeePayslipDetailsAsPDF('', slotProps.data.PAYROLL_MONTH)" />
                </template>

            </column>
        </DataTable>

        <button class="p-2 bg-black text-[12px] text-white mt-10" @click="viewpayslip = true">view</button>
    </div>
    <!-- <div class="d-flex justify-content-end">
        <Button class="mb-2 btn btn-primary" label="Submit" />
    </div> -->
    <!-- dialog for show details -->
    <div class="flex inline-flex card justify-content-center">
        <Dialog v-model:visible="employeePayslipStore.canShowPayslipView" modal header="Payslip" :style="{ width: '58vw' }">
            <div v-html="employeePayslipStore.paySlipHTMLView">
            </div>
        </Dialog>
    </div>

    <Dialog v-model:visible="viewpayslip" modal header="Payslip" :style="{ width: '58vw' }">
        <div class="w-[100%] h-[100]%">
            <div class="w-[100%] flex justify-between">
                <div class="flex flex-col">
                    <h1 class=" text-[25px] ">PAYSLIP <span class=" text-gray-500 text-[25px]">MAR 2023</span></h1>
                    <h2 class=" text-[16px] mt-[10px] text-[#000]">Lorem ipsum dolor sit.</h2>
                    <p class=" w-[300px] mt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta doloribus
                        magni ad corrupti iusto, et corporis laborum error?</p>
                </div>
                <div>
                    <img src="../../../assests/images/logo_avatar_live.png" width="100" alt="">
                </div>
            </div>
            <div class="mt-[30px]">
                <h1 class="font-semibold  text-[16px] my-[16px]">Employee Name : PRADEESH</h1>
                <div class="border-[1.5px] border-[#000] my-[12px]"></div>

                <div class="px-2 row">
                    <div class="col-3">
                        <p>Employee Number</p>
                        <p class=" text-[#000]">12312</p>
                    </div>
                    <div class="col-3">
                        <p>Date Joined</p>
                        <p class=" text-[#000]">Date Joined</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">Marteting</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">Marteting</p>
                    </div>
                </div>
                <div class="px-2 row">
                    <div class="col-3">
                        <p>Employee Number</p>
                        <p class=" text-[#000]">12312</p>
                    </div>
                    <div class="col-3">
                        <p>Date Joined</p>
                        <p class=" text-[#000]">Date Joined</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">Marteting</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">Marteting</p>
                    </div>
                </div>
                <div class="px-2 row">
                    <div class="col-3">
                        <p>Employee Number</p>
                        <p class=" text-[#000]">12312</p>
                    </div>
                    <div class="col-3">
                        <p>Date Joined</p>
                        <p class=" text-[#000]">Date Joined</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">Marteting</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">Marteting</p>
                    </div>
                </div>
                <div class="border-[1.5px] border-[#000] my-[12px]"></div>
            </div>

            <div class="">

            </div>
        </div>
    </Dialog>
</template>

<script setup>
import dayjs from 'dayjs';

import { ref, onMounted, reactive } from "vue";
import axios from "axios";
import { FilterMatchMode } from 'primevue/api';
import { useEmployeePayslipStore } from './EmployeePayslipsService';
import loadingSpinner from '../../../components/LoadingSpinner.vue'



const employeePayslipStore = useEmployeePayslipStore()

const viewpayslip = ref(true);

onMounted(async () => {
    console.log("EmployeePayslips,vue loaded");
    await employeePayslipStore.getEmployeeAllPayslipList();

});

const filters = ref({
    PAYROLL_MONTH: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
});

</script>


