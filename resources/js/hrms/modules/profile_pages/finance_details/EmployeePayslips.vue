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
                                    <button class="bg-black text-white rounded-md p-2 mx-2"
                                    @click="employeePayslipStore.getEmployeePayslipDetailsAsPDF('', slotProps.data.PAYROLL_MONTH)">Download</button>
                                    <!-- bg-blue-500 -->
                                    <button class=" border-[2px] border-[#000] py-2 px-3 rounded-md"
                                    @click="employeePayslipStore.getEmployeePayslipDetailsAsHTML('', slotProps.data.PAYROLL_MONTH)">View</button>
                </template>

            </column>
        </DataTable>

    </div>
    <!-- <div class="d-flex justify-content-end">
        <Button class="mb-2 btn btn-primary" label="Submit" />
    </div> -->
    <!-- dialog for show details -->

    <Sidebar position="right" v-model:visible="employeePayslipStore.canShowPayslipView" modal header="Payslip"
        :style="{ width: '58vw' }">

        <div class=" flex justify-center w-[100%] my-3 rounded-lg">
            <div class="w-[95%] h-[90%] shadow-lg p-4 ">
                <div class="w-[100%] flex justify-between">
                    <div class="flex flex-col">
                        <h1 class=" text-[25px] ">PAYSLIP <span class=" text-gray-500 text-[25px]">MAR 2023</span></h1>
                        <h2 class=" text-[16px] mt-[10px] text-[#000]"
                            v-for="item in employeePayslipStore.paySlipHTMLView.data.client_details" :key="item">
                            {{ item.client_fullname }}</h2>
                        <p class=" w-[300px] mt-[10px]"
                            v-for="item in employeePayslipStore.paySlipHTMLView.data.client_details" :key="item">{{
                                item.address }}</p>
                    </div>
                    <div v-for="item in employeePayslipStore.paySlipHTMLView.data.client_details" :key="item">
                        <img :src="`${item.client_logo}`" alt="testing" class="w-[200px]">
                    </div>
                </div>
                <div class="mt-[30px]">
                    <h1 class="font-semibold  text-[16px] my-[16px]"
                        v-for="item in employeePayslipStore.paySlipHTMLView.data.personal_details" :key="item"> Employee
                        Name : {{ item.name }}</h1>
                    <div class="border-[1.5px] border-[#000] my-[12px]"></div>
                    <div class="mx-2 row border-b-[1px] border-[gray] py-2"
                        v-for="item in employeePayslipStore.paySlipHTMLView.data.personal_details" :key="item">
                        <div class="col-3">
                            <p class="">Employee Code</p>
                            <p class=" text-[#000] text-[12px]">{{ item.user_code ? item.user_code : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Date Joining</p>
                            <p class=" text-[#000]">{{ item.doj ? dayjs(item.doj).format('DD-MMM-YYYY') : '-' }} </p>
                        </div>
                        <div class="col-3">
                            <p>Department</p>
                            <p class=" text-[#000]">{{ item.department_name ? item.department_name : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Designation</p>
                            <p class=" text-[#000]">{{ item.designation ? item.designation : '-' }}</p>
                        </div>
                    </div>
                    <div class="mx-2 row border-b-[1px] border-[gray] py-2"
                        v-for="item in employeePayslipStore.paySlipHTMLView.data.personal_details" :key="item">
                        <div class="col-3">
                            <p>Payment Mode</p>
                            <p class=" text-[#000]"> {{ item.bank_account_number ? "Bank" : "cheque" }}</p>
                        </div>
                        <div class="col-3">
                            <p>Bank Name</p>
                            <p class=" text-[#000]">{{ item.bank_name ? item.bank_name : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Bank Account</p>
                            <p class=" text-[#000]">{{ item.bank_account_number ? item.bank_account_number : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Bank ISFC</p>
                            <p class=" text-[#000]">{{ item.bank_ifsc_code ? item.bank_ifsc_code : '-' }}</p>
                        </div>
                    </div>
                    <div class="py-2 mx-2 row" v-for="item in employeePayslipStore.paySlipHTMLView.data.personal_details"
                        :key="item">
                        <div class="col-3">
                            <p>PAN</p>
                            <p class=" text-[#000]"> {{ item.pan_number ? item.pan_number : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>ESIC</p>
                            <p class=" text-[#000]">Date Joined</p>
                        </div>
                        <div class="col-3">
                            <p>UAN</p>
                            <p class=" text-[#000]">{{ item.uan_number ? item.uan_number : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>EPF Number</p>
                            <p class=" text-[#000]">{{ item.epf_number ? item.epf_number : '-' }}</p>
                        </div>
                    </div>
                    <div class="border-[1.5px] border-[#000] my-[12px]"></div>
                </div>

                <div class="">
                    <h1 class="font-semibold  text-[16px] my-[16px]">LEAVE DETAILS</h1>
                    <div class="border-[1.5px] border-[#000] my-[12px]"></div>

                    <div class="py-2 mx-2 row">
                        <div class="col-3">
                            <p>Leave Type</p>
                            <p class=" text-[#000]" v-for="item in employeePayslipStore.paySlipHTMLView.data.leave_data"
                                :key="item">{{ item.leave_type ? item.leave_type : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Opening Balance</p>
                            <p class=" text-[#000]" v-for="item in employeePayslipStore.paySlipHTMLView.data.leave_data"
                                :key="item">{{ item.opening_balance ? item.opening_balance : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Availed</p>
                            <p class=" text-[#000]" v-for="item in employeePayslipStore.paySlipHTMLView.data.leave_data"
                                :key="item">{{ item.avalied ? item.avalied : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>Closing Balance</p>
                            <p class=" text-[#000]" v-for="item in employeePayslipStore.paySlipHTMLView.data.leave_data"
                                :key="item">{{ item.closing_balance ? item.closing_balance : '-' }}</p>
                        </div>
                    </div>


                </div>

                <div class="">
                    <h1 class="font-semibold  text-[16px] my-[16px]">SALARY DETAILS</h1>
                    <div class="border-[1.5px] border-[#000] my-[12px]"></div>
                    <div class="py-2 mx-2 row" v-for="item in employeePayslipStore.paySlipHTMLView.data.salary_details"
                        :key="item">
                        <div class="col-3">
                            <p>ACTUAL PAYABLE DAYS</p>
                            <p class=" text-[#000]">{{ item.month_days ? item.month_days : '-' }}</p>

                        </div>
                        <div class="col-3">
                            <p>TOTAL WORKING DAYS</p>
                            <p class=" text-[#000]">{{ item.worked_Days ? item.worked_Days : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>LOSS OF PAY DAYS</p>
                            <p class=" text-[#000]">{{ item.lop ? item.lop : '-' }}</p>
                        </div>
                        <div class="col-3">
                            <p>ARREAR DAYS PAYABLE</p>
                            <p class=" text-[#000]">{{ item.arrears_Days ? item.arrears_Days : '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 py-2 border-y-[1px] border-[gray] mx-2">
                    <div class="col-7 border-r-[1.4px] border-[gray]">
                        <table class=" w-[100%]">
                            <tr class="w-[100%]">
                                <td>
                                    <h1 class="font-semibold ">Earnings</h1>
                                    <h1 class="my-3"
                                        v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.earnings[0]"
                                        :key="index"
                                        :class="[key == 'Total Earnings' ? 'text-black text-[16px]' : 'text-black']"> {{ key }}
                                    </h1>
                                </td>

                                <td class="flex flex-col items-start pt-[2px]">
                                    <h1 class="font-semibold">Fixed</h1>
                                    <h1 v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.compensatory_data[0]"
                                        :key="index" class="mt-[12px] text-black"> {{ value }}</h1>
                                </td>

                                <td class=" flex flex-col items-start pt-[2px]"
                                    v-if="employeePayslipStore.paySlipHTMLView.data.arrears[0] != ''">
                                    <h1 class="font-semibold ">Arrears</h1>
                                    <h1 v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.arrears[0]"
                                        :key="index" class="mt-[12px]">{{ value }}</h1>
                                    <!-- <h1  v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.compensatory_data[0]" :key="index" class="my-3" >&nbsp;</h1> -->
                                </td>
                                <td v-if="employeePayslipStore.paySlipHTMLView.data.earnings[0]">
                                    <h1 class="font-semibold">Earned</h1>
                                    <h1 v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.earnings[0]"
                                        :key="index" class="my-3"
                                        :class="[key == 'Total Earnings' ? 'text-black text-[16px]' : '']"> {{ value }}</h1>
                                    <!-- <p class="my-2"  >&nbsp;</p> -->
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="col">
                        <table border="2" class=" w-[100%]">
                            <tr class="w-[100%]">
                                <td>
                                    <h1 class="font-semibold ">CONTRIBUTIONS</h1>
                                    <p class=" my-2 text-[#000]"
                                        v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.contribution[0]"
                                        :key="index">{{ key }}</p>
                                </td>
                                <td>
                                    <h1 class="font-semibold ">&nbsp;</h1>
                                    <p class=" my-2 text-[#000]"
                                        v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.contribution[0]"
                                        :key="index">{{ value }}</p>
                                </td>
                            </tr>
                            <!-- {{ employeePayslipStore.paySlipHTMLView.data.Tax_Deduction}} -->
                            <tr class="w-[100%]">
                                <td>
                                    <h1 class="font-semibold ">Tax Duductions</h1>
                                    <p class=" my-2 text-[#000]"
                                        v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.Tax_Deduction[0]"
                                        :key="index" :class="[key == 'Total Deduction' ? 'text-[18px] ' : ' text-black']">{{
                                            key }}</p>
                                </td>
                                <td>
                                    <h1 class="font-semibold ">&nbsp;</h1>
                                    <p class=" my-2 text-[#000]"
                                        v-for="(value, key, index) in  employeePayslipStore.paySlipHTMLView.data.Tax_Deduction[0]"
                                        :key="index" :class="[key == 'Total Deduction' ? 'text-[18px] ' : ' text-black']">{{
                                            value }}</p>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="my-2 row w-[100%] "
                    v-for="(value, key, index) in employeePayslipStore.paySlipHTMLView.data.over_all[0]" :key="index">
                    <div class="my-2 col-5">
                        <p class="">{{ key }} </p>
                    </div>
                    <div class="my-2 col-7">
                        <p class="text-[16px]"> <span class=" text-[16px]" style=" font-family:sans-serif !important;"
                                v-if="key == 'Net Salary Payable'">₹ </span> {{ value }}</p>
                    </div>
                </div>
                <div>
                    <p class="mt-2 ">*** Note:All amounts displayed in this payslips are in INR</p>
                    <p class="mt-[50px]">**This is computer generated statement,does not require signature.</p>
                </div>
                <div class="">
                    <div class="flex items-center float-right">
                        <p class="mx-2">Powered by </p>
                        <img :src="`${employeePayslipStore.paySlipHTMLView.data.date_month.abs_logo}`" alt=""
                            class="w-[140px] h-[50px]">
                    </div>
                </div>


            </div>
        </div>

</Sidebar>
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
const op = ref();

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


function toggle(event){
    op.value.toggle(event);
}


</script>

<style>
.dropdown:hover .dropdown-content {
    display: block !important;
}

.p-overlaypanel .p-overlaypanel-content {
    padding: 0;
    z-index: 0 !important;
}
</style>


