<template>
    <div class="px-2">
        <div class="row d-flex justify-content-start align-items-center ">
            <div class="d-flex" v-if="CreateLoanWithNewFrom == 1">
                <div class="col-3  d-flex align-items-center justify-content-start" style="position: relative; left: -8px;">
                    <h1 class=" text-xl  xl:text-2xl ">Loan With interest Feature</h1>
                </div>
                <div class="col">
                    <button class="orange_btn "
                        :class="[salaryStore.isLoanWithInterestFeature === 1 ? 'bg-white text-black border-1 border-black' : 'text-white']"
                        @click="salaryStore.isLoanWithInterestFeature = 0">Disabled</button>
                    <button class="Enable_btn"
                        :class="[salaryStore.isLoanWithInterestFeature === 1 ? 'bg-green-700 text-white' : '']"
                        @click="salaryStore.isLoanWithInterestFeature = 1">Enable</button>
                </div>
                <!-- {{loanStores.CreateLoanWithNewFrom  }} -->
                <div class="col">

                    <button @click="CreateLoanWithNewFrom = 2" v-if="CreateLoanWithNewFrom == 1"
                        class=" rounded-md text-white bg-blue-800 px-4 py-2 float-right">
                        <i class="pi pi-plus mx-1"></i> Create New From
                    </button>
                </div>
            </div>

            <div class="col" v-if="CreateLoanWithNewFrom == 1">
                <p class="fs-5 "
                    v-if="salaryStore.isLoanWithInterestFeature == 0 || salaryStore.isLoanWithInterestFeature == null">
                    Please click the "Enable" button to activate the Loan With interest Feature for use within
                    your
                    organization.</p>
                <p class="fs-5 " v-if="salaryStore.isLoanWithInterestFeature == '1'">Please click the "Disable" button to
                    deactivate the Loan With interest Feature.</p>

                <div class="row d-flex justify-items-center align-items-center">
                    <div class="col-3">
                        <h1 class="fs-4 ">Select organization</h1>
                    </div>

                    <div class="col">
                        <!-- v-model="salaryStore.sa.selectClientID" -->
                        <!-- {{ salaryStore.client_name_status }} -->

                        <MultiSelect v-model="salaryStore.client_name_status" :options="salaryStore.ClientsName"
                            optionLabel="client_name" :trueValue="1" :falseValue="0" optionValue="id"
                            placeholder="Select Branches" :maxSelectedLabels="3" class="w-full  md:w-18rem"
                            @change="selectClientId('loan_with_int')" />
                    </div>
                </div>

                <div class="row ml-1 mr-3 mt-2 ">


                    <div class="col-12 border-1 rounded-md h-28 d-flex flex-column align-items-center justify-content-between p-3 even-card shadow-sm mb-2 blink"
                        v-for="(item, index) in salaryStore.interestwithLoanHistory" :key="index">
                
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <h1 class="  fs-5">Settings Name : {{ item.name }}</h1>
                            <h1 class=" fs-5">Client Name: {{ item.client_name }}</h1>

                            <button class=" underline text-blue-400 fs-5 "
                                @click="viewDetails(item.setting_prev_details)">View Details</button>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class=" fs-5"> {{
                                    item.dedction_period }} months. </h1>
                            </div>

                            <h1 class=" fs-5" v-if="item.setting_prev_details.loan_applicable_type == 'percnt' " >{{ item.loan_type }} : {{ item.perct }}%</h1>
                            <h1 class="fs-5" v-if="item.setting_prev_details.loan_applicable_type =='fixed'">maximum Loan Amount: {{item.setting_prev_details.max_loan_amount}}</h1>
                        </div>
                        <!-- {{ item }} -->
                    </div>
                </div>
            </div>





            <div v-if="CreateLoanWithNewFrom == 2">
                <createNewInterestWithloan />
            </div>

            <!-- <div v-if="">

             </div> -->


            <!--  -->
        </div>
    </div>
</template>
<script setup>

import { ref, reactive, onMounted, computed } from 'vue';
import { salaryAdvanceSettingMainStore } from '../stores/salaryAdvanceSettingMainStore';
import useValidate from '@vuelidate/core';
import { required, email, minLength, sameAs } from '@vuelidate/validators';
import { loanSettingsStore } from '../stores/loanSettingsStores';
import createNewInterestWithloan from './createNewInterestWithloan.vue';

const salaryStore = salaryAdvanceSettingMainStore();
const loanStores = loanSettingsStore();
salaryStore.getClientsName('loan_with_int');
salaryStore.getCurrentStatus('loan_with_int');
salaryStore.getInterestFreeAndInterestWithLoanHistory('InterestWithLoan');

const opt = ref()
const op = ref([
    { id: 1, dep: "res" }

])

const CreateLoanWithNewFrom = ref(1);

onMounted(() => {
    opt.value = "Department";
    salaryStore.getClientsName('loan_with_int');
    salaryStore.getCurrentStatus('loan_with_int');

})


const rules = computed(() => {
    return {
        selectClientID: { required },
        minEligibile: { required },
        loan_amt_interest: { required },
        maxTenure: { required },
        selectedOption1: { required }
    }
})

const v$ = useValidate(rules, salaryStore.lwif)

const submitForm = () => {
    v$.value.$validate() // checks all inputs
    if (!v$.value.$error) {
        // if ANY fail validation
        console.log('Form successfully submitted.')
        salaryStore.saveLoanWithInterest();
    } else {
        console.log('Form failed submitted.')
    }

}

function selectClientId(data) {
    salaryStore.sendClient_code(data);
}

function viewDetails(val) {
    console.log(val);

}

</script>
<style>
:root
{
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
}

.clr
{
    color: var(--navy) !important;
}

.orange_btn
{
    background-color: var(--orange);
    padding: 7px 30px;
    border-radius: 4px 0 0 4px;
    color: var(--white);
}

.Enable_btn
{
    border: 1px solid var(--navy);
    padding: 7px 30px;
    border-radius: 0 4px 4px 0;

}

.cancel_btn
{
    border: 1px solid var(--navy);
    padding: 7px 30px;
    border-radius: 4px 0 0 4px;

}

.border-L
{

    border-left: 3px solid var(--navy);
}

.border-color
{
    color: #003154;
    border: 2px solid #003154;
}

.border-color::placeholder
{
    color: #002f56 !important;
}

input[type=radio]
{
    border: 0px;
    width: 20px;
    height: 20px;
    color: var(--orange) !important;
    background-color: var(--orange) !important;
}

.p-dropdown-label.p-inputtext
{
    color: var(--navy);
}

.arrow
{
    text-align: center;
    margin: 8% 0;
}

.bounce
{
    -moz-animation: bounce 2s infinite;
    -webkit-animation: bounce 2s infinite;
    animation: bounce 2s infinite;
}

@keyframes bounce
{

    0%,
    20%,
    50%,
    80%,
    100%
    {
        transform: translateY(0);
    }

    40%
    {
        transform: translateY(-30px);
    }

    60%
    {
        transform: translateY(-15px);
    }
}</style>

