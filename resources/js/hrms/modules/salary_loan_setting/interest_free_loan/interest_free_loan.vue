<template>
    <div class="px-4">

        <div class="row d-flex justify-content-start align-items-center cu">
            <div class="mt-5 d-flex">
                <div class="col-4 d-flex justify-content-start align-items-center">
                    <h1 class="text-xl  xl:text-2xl" >Interest Free Loan Feature</h1>
                </div>

                <div class="col">
                    <button class="orange_btn "
                        :class="[salaryStore.isInterestFreeLoaneature === 2 ? 'bg-white text-black border-1 border-black' : 'text-white']"
                        @click="salaryStore.isInterestFreeLoaneature = 1">Disabled</button>
                    <button class="Enable_btn"
                        :class="[salaryStore.isInterestFreeLoaneature === 2 ? 'bg-green-700 text-white' : '']"
                        @click="salaryStore.isInterestFreeLoaneature = 2">Enable</button>
                </div>
            </div>
            <div class="col" v-if="salaryStore.isInterestFreeLoaneature == '1'">
                <p class="fs-5">Please click the "Enable" button to activate the Interest Free Loan feature for use within
                    your
                    organization.</p>
            </div>

            <div class="col" v-if="salaryStore.isInterestFreeLoaneature == '2'">
                <div class="col-10">
                    <p class="fs-5">Please click the "Disable" button to deactivate the Interest Free Loan Feature.</p>

                    <div class="row d-flex justify-content-between align-items-center mt-5 w-8 " >
                        <div class="col-6">
                            <h1 class="text-xl  xl:text-2xl " >Select organization</h1>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-col position-relative">
                            <MultiSelect v-model="salaryStore.ifl.selectClientID"
                                :options="salaryStore.dropdownFilter.legalEntity" optionLabel="client_name" optionValue="id"
                                placeholder="Select Branches" :maxSelectedLabels="3" class="w-full  md:w-18rem" :class="[
                                    v$.selectClientID.$error ? 'p-invalid' : '',
                                ]" />
                            <span v-if="v$.selectClientID.$error"
                                class="text-red-400 fs-6 font-semibold position-absolute top-14">
                                {{ v$.selectClientID.required.$message.replace("Value", "Client Name") }}
                            </span>
                        </div>

                        </div>



                    </div>
                    <div class="my-4 d-flex justify-content-between align-items-center w-8">
                        <div class="col-6">
                            <h1 class=" text-xl  xl:text-2xl ">Name of interest Free Loan</h1>
                        </div>
                        <div class="col-6">
                            <div class=" position-relative ">
                            <InputText type="text" placeholder="Give Salary Advance a Name" v-model="salaryStore.ifl.name"
                                class="w-full d-flex justify-items-center md:w-18rem" :class="[
                                    v$.name.$error ? 'p-invalid ' : '',
                                ]" />
                            <span v-if="v$.name.$error" class="text-red-400 fs-6 font-semibold position-absolute top-12">
                                {{ v$.name.required.$message.replace("Value", "Client Name") }}
                            </span>
                        </div>

                        </div>


                    </div>

                    <h1 class="mt-10 fs-4 ">Eligible Employees and Amount</h1>
                    <p class="mt-3 fs-5">The employee's eligibility for the loan amount can be determined based on the
                        number of
                        years they have served in the organization.</p>
                </div>
                <div class=" col-12">
                    <div class="rounded-lg shadow-sm card border-L ">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="fs-5">The employee must have served for a minimum of
                                        <!-- <InputText type="text" v-model="salaryStore.ifl.minEligibile"
                                            style="max-width: 100px; " class="mx-2" /> -->
                                        <InputNumber v-model="salaryStore.ifl.minEligibile" inputId="withoutgrouping"
                                            :useGrouping="false" :class="[
                                                v$.minEligibile.$error ? 'p-invalid' : '',
                                            ]" />
                                        <span v-if="v$.minEligibile.$error"
                                            class="text-red-400 fs-6 font-semibold position-absolute top-14">
                                            {{ v$.minEligibile.required.$message.replace("Value", "") }}
                                        </span>
                                        months
                                    </h1>
                                </div>
                                <div class="col-12">
                                    <h1 class="fs-5 d-flex align-items-center">
                                        <RadioButton v-model="salaryStore.ifl.precent_Or_Amt" inputId="ingredient1"
                                            name="dectmeth" value="percnt" class="mx-3" />
                                        years to avail the loan amount of

                                        <!-- <InputText type="text"   v-model="salaryStore.ifl.availPerInCtc" style="max-width: 100px;" class="mx-2" /> -->
                                        <InputNumber v-if="salaryStore.ifl.precent_Or_Amt == 'percnt'"
                                            style="max-width: 100px;" v-model.number="salaryStore.ifl.availPerInCtc"
                                            inputId="withoutgrouping" :useGrouping="false" class="mx-2" />

                                        <InputNumber v-else disabled style="max-width: 100px;"
                                            v-model.number="salaryStore.ifl.availPerInCtc" inputId="withoutgrouping"
                                            :useGrouping="false" class="mx-2" />
                                        % of their CTC.
                                    </h1>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <RadioButton v-model="salaryStore.ifl.precent_Or_Amt" inputId="ingredient1"
                                        name="dectmeth" value="fixed" class="mx-3" />
                                    <h1 class="fs-5">Enter the maximum eligible amount of loan can be availed by the
                                        employees
                                        <!-- <InputText v-if="salaryStore.ifl.precent_Or_Amt == 'fixed'" type="text"
                                            v-model="salaryStore.ifl.max_loan_limit"  /> -->
                                        <InputNumber v-if="salaryStore.ifl.precent_Or_Amt == 'fixed'"
                                            v-model="salaryStore.ifl.max_loan_limit" inputId="withoutgrouping"
                                            :useGrouping="false" class="mx-2" />

                                        <InputNumber v-else disabled v-model="salaryStore.ifl.max_loan_limit"
                                            inputId="withoutgrouping" :useGrouping="false" class="mx-2" />
                                        <!-- <InputText v-else disabled type="text" v-model="salaryStore.ifl.max_loan_limit"
                                            style="width: 150px;" /> -->
                                    </h1>
                                </div>
                                <div class="col-10">
                                    <p class="fs-6 clr-gray ">(Note: This will be calculated based on the employee's date of
                                        joining.)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h1 class="mt-2 fs-4 ">Deduction Method</h1>
                    <p class="my-2 fs-5">In the case of an interest-free loan, the EMI would only consist of repayment of
                        the
                        principal amount borrowed, and no interest would be charged.</p>

                    <div class="row">
                        <div class="shadow-sm card border-L rounded-top">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7 d-flex justify-content-start align-items-center">
                                        <RadioButton v-model="salaryStore.ifl.deductMethod" inputId="ingredient1"
                                            name="dectmeth" value="1" />
                                        <label for="" class="mx-3 fs-5 clr-dark" style="line-height: 25px;">Begin deducting
                                            the EMI in the
                                            upcoming payroll.</label>
                                    </div>
                                </div>


                                <div class="my-1 row">
                                    <div class="col-7 d-flex justify-content-start align-items-center">
                                        <RadioButton v-model="salaryStore.ifl.deductMethod" inputId="ingredient1"
                                            name="dectmeth" value="emi" />
                                        <label for="" class="mx-3 fs-5 clr-dark">Employee can select the month when they
                                            would like their EMI
                                            payments to begin
                                        </label>
                                    </div>
                                </div>
                                <div class="ml-1 row" v-if="salaryStore.ifl.deductMethod == 'emi'">
                                    <div class="ml-4 col">
                                        <h2 class="fs-5 clr-dark">The EMI deductions should begin within
                                            <InputText type="text" v-model="salaryStore.ifl.cusDeductMethod"
                                                style="max-width: 100px;" class="mx-2" />months from the date
                                            the loan is taken.
                                        </h2>
                                    </div>
                                </div>
                                <div class="ml-1 row" v-if="salaryStore.ifl.deductMethod == 'emi'">
                                    <div class="ml-4 col">
                                        <p class="fs-6 clr-gray" style="line-height: 14px;">
                                            (Note: During the specified period, employees have the option to select the
                                            month in which they
                                            would
                                            like the EMI deductions to begin.)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fs-5 clr-dark">Please specify the maximum duration or tenure for the
                                            employee to repay the
                                            loan amount
                                            <!-- <InputText type="text" v-model="salaryStore.ifl.maxTenure"
                                                style="max-width: 100px;" class="mx-2" /> -->
                                            <InputNumber v-model="salaryStore.ifl.maxTenure" inputId="withoutgrouping"
                                                :useGrouping="false" class="mx-2" :class="[
                                                    v$.maxTenure.$error ? 'p-invalid' : '',
                                                ]" />
                                            <span v-if="v$.maxTenure.$error"
                                                class="text-red-400 fs-6 font-semibold position-absolute top-14">
                                                {{ v$.maxTenure.required.$message.replace("Value", "maximum duration") }}
                                            </span>
                                            months
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h1 class="my-3 fs-4 " style="margin-top: 30px !important;">Approval Setting</h1>
                    <p class="my-2 fs-5">Please choose the approval flow for Interest Free Loan Feature.</p>

                    <div class="card border-L">
                        <div class="py-3 row d-flex">
                            <div class="my-3 col col-2 d-flex align-items-center" style="width: 200px;">
                                <P class="mx-3 fs-5">Employee Request
                                </P>
                                <i class="text-green-400 pi pi-angle-double-right fs-4"></i>
                            </div>
                            <div class="col col-3 d-flex" style="width: 280px;">
                                <div class="w-10 p-1 rounded bg-slate-200 d-flex align-items-center "
                                    style="width: 225px !important;">
                                    <Dropdown v-model="salaryStore.selectedOption1" editable
                                        :options="salaryStore.filteredApprovalFlow" optionLabel="name" placeholder="Select"
                                        class="w-full pl-2 md:w-14rem"
                                        @change="salaryStore.toSelectoption(1, salaryStore.selectedOption1)" :class="[
                                            v$.selectedOption1.$error ? 'p-invalid' : '',
                                        ]" />
                                    <span v-if="v$.selectedOption1.$error"
                                        class="text-red-400 fs-6 font-semibold position-absolute top-14 mt-3">
                                        {{ v$.selectedOption1.required.$message.replace("Value", "Employee Request") }}
                                    </span>
                                    <button
                                        @click="salaryStore.option1 = 0, salaryStore.toSelectoption(4, salaryStore.selectedOption1)"
                                        v-if="salaryStore.selectedOption1" class="mx-2">
                                        <i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i>
                                    </button>
                                </div>
                                <button @click="salaryStore.option1 = 1" class="text-green-400 " style="width: 40px;"
                                    v-if="salaryStore.option1 == 0 && salaryStore.option == 1">
                                    <i class="pi pi-plus-circle fs-4"></i></button>
                                <button class="ml-4 text-green-400 " style="width: 40px;" v-if="salaryStore.option1 == 1">
                                    <i class="pi pi-angle-double-right fs-4"></i></button>
                            </div>


                            <div class="col col-3 d-flex" v-if="salaryStore.option1 == 1" style="width: 280px;">
                                <div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center col-8"
                                    style="width: 225px !important;">
                                    <Dropdown v-model="salaryStore.selectedOption2" editable
                                        :options="salaryStore.filteredApprovalFlow" optionLabel="name" placeholder="Select"
                                        class="w-full md:w-14rem pl-0.5"
                                        @change="salaryStore.toSelectoption(2, salaryStore.selectedOption2)" />
                                    <button
                                        @click="salaryStore.option1 = 0, salaryStore.toSelectoption(5, salaryStore.selectedOption2)"
                                        v-if="salaryStore.option1 == 1">
                                        <i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i>
                                    </button>
                                </div>
                                <button @click="salaryStore.option2 = 1" class="text-green-400 "
                                    v-if="salaryStore.option2 == 0 && salaryStore.option1 == 1" style="width: 40px;">
                                    <i class="pi pi-plus-circle fs-4"></i></button>

                                <button class="text-green-400 " style="width: 40px;" v-if="salaryStore.option2 == 1">
                                    <i class="ml-4 pi pi-angle-double-right fs-4"></i></button>
                            </div>


                            <div class="col col-3 d-flex" v-if="salaryStore.option2 == 1" style="width: 280px;">
                                <div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center"
                                    style="width: 225px !important;">
                                    <Dropdown v-model="salaryStore.selectedOption3" editable
                                        :options="salaryStore.filteredApprovalFlow" optionLabel="name" placeholder="Select"
                                        class="w-full pl-2 md:w-14rem"
                                        @change="salaryStore.toSelectoption(3, salaryStore.selectedOption3)" />
                                    <button
                                        @click="salaryStore.option2 = 0, salaryStore.toSelectoption(6, salaryStore.selectedOption3)"
                                        v-if="salaryStore.option2 == 1">
                                        <i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col" v-if="salaryStore.isInterestFreeLoaneature == '1'">
                    <div>
                        <p class="fs-5">Please click the "Enable" button to activate the Interest Free Loan Feature for use
                            within
                            your
                            organization.</p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="float-right" v-if="salaryStore.isInterestFreeLoaneature == '2'">
                        <button class="btn btn-border-primary">Cancel</button>
                        <!-- submitForm -->
                        <button class="mx-4 btn btn-primary" @click="submitForm">Save Changes</button>
                        <!-- <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, autem.</h1> -->
                    </div>
                </div>
            </div>

        </div>



    </div>
</template>
<script setup>

import { ref, reactive, onMounted, computed } from 'vue';
import { salaryAdvanceSettingMainStore } from '../stores/salaryAdvanceSettingMainStore';
import useValidate from '@vuelidate/core';
import { required, email, minLength, sameAs } from '@vuelidate/validators';

const salaryStore = salaryAdvanceSettingMainStore()
const showPopup = ref(false)

onMounted(() => {
    salaryStore.getClientsName('int_free_loan');
    salaryStore.getCurrentStatus('int_free_loan');
})
const value = ref();
const options = ref(['Off', 'On']);

const selectClientID = ref();

const ingredient = ref('');

const opt = ref()
const op = ref([
    { id: 1, dep: "res" }
])

onMounted(() => {
    opt.value = "Department"
});



const rules = computed(() => {
    return {
        name: { required },
        selectClientID: { required },
        minEligibile: { required },
        maxTenure: { required },
        selectedOption1: { required }
    }
})

function reset() {
    salaryStore.isInterestFreeLoaneature = 1
}

const v$ = useValidate(rules, salaryStore.ifl)



const submitForm = () => {
    v$.value.$validate() // checks all inputs
    if (!v$.value.$error) {
        // if ANY fail validation
        console.log('Form successfully submitted.')
        salaryStore.saveInterestfreeLoan();
    } else {
        console.log('Form failed submitted.')
    }
}


</script>
<style>
* {
    font-family: sans-serif;
}

:root {
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
}

.clr {
    color: var(--navy);
}

.clr-dark {
    color: #454545;

}

.clr-gray {
    color: #949494;
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

}

.border-L {

    border-left: 3px solid var(--navy);
}

.border-color {
    color: #003154;
    border: 2px solid #003154;
}

.border-color::placeholder {
    color: #002f56 !important;
}

input[type=radio] {
    border: 0px;
    width: 20px;
    height: 20px;
    color: var(--orange) !important;
    background-color: var(--orange) !important;
}

input[type='radio']:after {
    width: 20px;
    height: 20px;
    /* border-radius: 15px; */
    top: -2px;
    left: -1px;
    position: relative;
    background-color: var(--orange);
    content: '';
    display: inline-block;
    visibility: visible;
    /* border: 2px solid white; */
}

.p-dropdown-label.p-inputtext {
    color: var(--navy);
}
</style>

