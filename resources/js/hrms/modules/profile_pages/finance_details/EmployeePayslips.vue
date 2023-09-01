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
                    <Button class="btn-primary z-0" label="View "
                        @click="employeePayslipStore.getEmployeePayslipDetailsAsHTML('', slotProps.data.PAYROLL_MONTH)" />
                </template>
            </Column>
            <column header="Download">
                <template #body="slotProps">
                    <!-- {{slotProps.data}} -->
                    <Button class="btn-primary z-0" label="Download "
                        @click="employeePayslipStore.getEmployeePayslipDetailsAsPDF('', slotProps.data.PAYROLL_MONTH)" />
                </template>

            </column>
        </DataTable>
        </div>
    <!-- <div class="d-flex justify-content-end">
        <Button class="mb-2 btn btn-primary" label="Submit" />
    </div> -->
    <!-- dialog for show details -->
    <div class="card flex justify-content-center inline-flex">
        <Dialog v-model:visible="employeePayslipStore.canShowPayslipView" modal header="Payslip" :style="{ width: '58vw' }">
            <div v-html="employeePayslipStore.paySlipHTMLView">
            </div>
        </Dialog>
    </div>
</template>

<script setup>
import dayjs from 'dayjs';

import { ref, onMounted, reactive } from "vue";
import axios from "axios";
import { FilterMatchMode } from 'primevue/api';
import { useEmployeePayslipStore } from './EmployeePayslipsService';
import loadingSpinner from '../../../components/LoadingSpinner.vue'



const employeePayslipStore = useEmployeePayslipStore()

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


