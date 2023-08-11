<template>
    <div class="mr-4 card"  >
        <div class="px-5 row d-flex justify-content-start align-items-center card-body">
            <div class="flex justify-between gap-6 my-2">
                <div class=" max-[1300px]:w-[30%px]" >
                    <p class="text-[14px] font-['Poppins'] font-medium">The company allows employees to request a salary advance of up to <strong
                            class="text-lg"> {{useEmpStore.percent_salary_amt}}%</strong> of their monthly salary.</p>
                </div>
                <div class="float-right flex ">
                    <button class="btn btn-border-orange font-['Poppins'] w-[100px] h-[30px]"> <p class="font-['Poppins']">View Report</p></button>
                    <button @click="openPosition('top')" class="mx-2 btn btn-orange flex items-center w-[135px] h-[30px]"><i class="mx-2 fa fa-plus"
                            aria-hidden="true"></i><p class="font-['Poppins']">New Request</p></button>
                </div>
            </div>

            <div class="my-6 widget-card">
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5">
                    <div class="py-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400">
                        <p class="mb-2 text-ash-medium text-[14px]">Total Advance Amount</p>
                        <h6 class="mb-0 text-base text-gray-500" v-if="useEmpStore.loanDashboard.total_borrowed_amt===null">
                            -</h6>
                        <h6 class="mb-0 text-base text-gray-500" v-else >
                            {{useEmpStore.loanDashboard.total_borrowed_amt}}</h6>
                    </div>
                    <div class="p-3 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400">
                        <p class="mb-2 text-ash-medium text-[14px] "> Total Repaid Amount</p>
                        <h6 class="mb-0 text-base  text-gray-500">
                            {{useEmpStore.loanDashboard.total_repaid_amt }}
                        </h6>
                        <h6 class="mb-0 text-base text-gray-500" v-if="useEmpStore.loanDashboard.total_repaid_amt===null">
                            -</h6>
                     
                    </div>
                    <div class="p-3 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400 ">
                        <p class="mb-2 text-ash-medium  text-[14px] ">Balance Amount</p>
                        <h6 class="mb-0 font-semibold text-base text-gray-500">{{useEmpStore.loanDashboard.balance_amt}}</h6>
                        <h6 class="mb-0 text-base text-gray-500"  v-if="useEmpStore.loanDashboard.balance_amt===null">
                            -</h6>
                    
                    </div>
                    <div class="p-3 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400">
                        <p class="mb-2 text-[14px] text-ash-medium ">Pending Request</p>
                        <h6 class="mb-0  text-[14px]  text-gray-500">{{useEmpStore.loanDashboard.pending_request}}</h6>
                        <h6 class="mb-0 text-base text-gray-500"  v-if="useEmpStore.loanDashboard.balance_amt===null">
                            -</h6>
                   
                    </div>
                    <div class="p-3 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400">
                        <p class="mb-2 text-[14px] text-ash-medium ">Completed Rquests</p>
                      
                        <h6 class="mb-0 text-base text-gray-500" v-if="useEmpStore.loanDashboard.balance_amt===null">
                            -</h6>
                            <h6 class="mb-0 text-[14px]  text-gray-500" >{{useEmpStore.loanDashboard.compeleted_request
                            }}</h6>
                   
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <DataTable :value="useEmpStore.arraySalaryDetails" ref="dt" dataKey="id" :paginator="true" :rows="10"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Request ID" field="request_id" style="min-width: 8rem"></Column>
                    <Column field="borrowed_amount" header="Advance Amount" style="min-width: 12rem"> </Column>
                    <Column field="" header="Paid On " style="min-width: 12rem"></Column>
                    <Column field="dedction_date" header="Expected Return" style="min-width: 12rem"></Column>
                    <Column field="sal_adv_status" header="Status" style="min-width: 12rem">
                        {{slotProps.data.sal_adv_status}}
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="useEmpStore.dailogSalaryAdvance" modal :position="position" 
        :style="{ width: '50vw', borderTop: '5px solid #002f56', height: '100vh' }">
        <template #header>
            <h1 class="mx-3 fs-4 text-xxl " style="border-left:3px solid var(--orange) ; padding-left:10px  ;">New Salary
                Advance Request</h1>
        </template>
        <div class=" w-100 h-100" v-if="useEmpStore.sa.isEligibleEmp == 0" >
            <div class="flex pb-2 bg-gray-100 rounded-lg gap-3 shadow-md">
                <div class="w-5 p-4 ">
                    <span class="font-semibold">Your Monthly Income</span>
                    <input id="rentFrom_month" v-model="useEmpStore.sa.ymi" readonly
                        class="my-2  border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-300 ">
                </div>
                <div class="w-5 p-4 mx-4">
                    <span class="font-semibold">Required Amount</span>
                    <input id="rentFrom_month" v-model="useEmpStore.sa.ra"
                        class="my-2  border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" :class="[  v$.ra.$error ? 'border border-red-500' : '' ]" />
                    <span v-if="v$.ra.$error" class="font-semibold text-red-400 fs-6">
                        {{ v$.ra.$errors[0].$message }}
                    </span>
                    <p class="text-sm font-semibold text-gray-500">Max Eligible Amount : {{ useEmpStore.sa.mxe }} </p>
                </div>
            </div>

            <div class="gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md">
                <span class="font-semibold ">Repayment</span>
                <p class="my-2 text-gray-600 fs-5 text-md ">The advance amount will be deducted from the next month's
                    salary
                    <!-- <strong class="text-black fs-5">{{dayjs(useEmpStore.sa.repdate).format('DD-MM-YYYY')}}</strong> -->
                    <Dropdown v-model="useEmpStore.sa.repdate" :options="useEmpStore.sa.storeRepDate" optionLabel="date" optionValue="date" placeholder="Select a Date" class="w-full md:w-14rem" />
                </p>
            </div>
            <div class="gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md">
                <span class="font-semibold ">Reason</span>
                <Textarea class="my-3 capitalize form-control textbox" autoResize type="text" rows="3" v-model="useEmpStore.sa.reason" :class="[  v$.reason.$error ? 'p-invalid' : '' ]" />
                <span v-if="v$.reason.$error" class="font-semibold text-red-400 fs-6">
                    {{ v$.reason.$errors[0].$message }}
                </span>
            </div>
            <div class="float-right ">
                <button class="btn btn-border-orange">Cancel</button>
                <button class="mx-4 btn btn-orange" @click="submitForm">Submit</button>
            </div>
        </div>
        <div class="" v-else>
            <div class="h-100 w-100">
                <img src="../../../../assests/images/svg_oops.svg" alt="" srcset="" class=" w-100 h-[400px]">
                <p class="my-2 font-semibold fs-3 text-center">You are not eligible to apply salary advance</p>
            </div>
        </div>

    </Dialog>
</template>
<script setup>
import { ref, reactive, onMounted, computed } from 'vue';
import useValidate from '@vuelidate/core'
import { required, email, minLength, sameAs, helpers } from '@vuelidate/validators'

import {useEmpSalaryAdvanceStore} from '../../stores/employeeSalaryAdvanceLoanMainStore'
import dayjs from 'dayjs';

const useEmpStore = useEmpSalaryAdvanceStore()

onMounted(() => {
   useEmpStore.fetchSalaryAdvance();
   useEmpStore.getSalaryDetails();
   useEmpStore.getEmployeeTotalvalue('sal_adv');
})

const eligibleRequiredAmount = (value) =>{
    if(value > useEmpStore.sa.mxe){
       return false
    }else{
        return true
    }
}

const rules = computed(() => {
    return {
        ra:{ required: helpers.withMessage('Required amount is required', required), eligibleRequiredAmount: helpers.withMessage('Must be lesser than max eligible amount', eligibleRequiredAmount) },
        reason:{required},
    }
})

const v$ = useValidate(rules, useEmpStore.sa)

const submitForm = () => {
    v$.value.$validate() // checks all inputs
    if (!v$.value.$error) {
        // if ANY fail validation
        console.log('Form successfully submitted.')
        useEmpStore.saveSalaryAdvance();
        v$.value.$reset();

    } else {
        console.log('Form failed validation')
    }
}





const position = ref('center');

const openPosition = (pos) => {
    position.value = pos;
    useEmpStore.dailogSalaryAdvance = true
}


</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital@0;1&display=swap');
:root {
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
}

*{
    font-family: 'Lobster', cursive;
    font-family: 'Poppins', sans-serif ;
}

.orange_btn {
    background-color: var(--orange);
    padding: 7px 30px;
    border-radius: 4px 0 0 4px;
    color: var(--white);
}

.Enable_btn {
    border: 1px solid var(--navy);
    padding: 7px 30px;
    border-radius: 0 4px 4px 0;

}

.cancel_btn {
    border: 1px solid var(--navy);
    padding: 7px 30px;
    border-radius: 4px 0 0 4px;

}</style>

