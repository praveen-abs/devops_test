<template>
    <div class="px-2">
        <div class="row d-flex justify-content-start align-items-center ">
            <div class="d-flex">
                <div class="col-3 fs-4" style="position: relative; left: -8px;">
                    <h1 class="fw-bolder">Loan With interest Feature</h1>
                </div>
                <div class="col">
                    <button class="orange_btn "
                        :class="[salaryStore.isLoanWithInterestFeature === 2 ? 'bg-white text-black border-1 border-black' : 'text-white']"
                        @click="salaryStore.isLoanWithInterestFeature = 1">Disabled</button>
                    <button class="Enable_btn"
                        :class="[salaryStore.isLoanWithInterestFeature === 2 ? 'bg-green-700 text-white' : '']"
                        @click="salaryStore.isLoanWithInterestFeature = 2">Enable</button>
                </div>
            </div>

            <div class="col" v-if="salaryStore.isLoanWithInterestFeature == '1'">
                <p class="fs-5 ">Please click the "Enable" button to activate the Loan With interest Feature for use within
                    your
                    organization.</p>
                <div>

                </div>
            </div>
            <div v-else class="row">

                <div>

                    <div class="col-10 ">
                        <p class="fs-5 ">Please click the "Disable" button to deactivate the Loan With interest Feature.</p>
                        <h1 class="mt-10 fs-4 fw-bolder">Eligible Amount</h1>
                        <p class="my-2 fs-5 ">The employees not eligible for Interest Free Loan can also claim the Loan with
                            Interest
                        </p>

                        <div class=" col-12">
                            <div class="rounded-lg shadow-sm card border-L ">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 ">

                                            <h1 class="fs-5">Enter the maximum eligible amount of loan can be availed by the
                                                employees
                                                <InputText type="text" v-model="salaryStore.lwif.minEligibile"
                                                    style="width: 150px;" />
                                            </h1>
                                        </div>

                                        <div class="col-12">
                                            <h1 class="fs-5 d-flex align-items-center">
                                                <RadioButton v-model="salaryStore.ifl.precent_Or_Amt" inputId="ingredient1"
                                                    name="dectmeth" value="percnt" class="mx-3" />
                                                years to avail the loan amount of

                                                <!-- <InputText type="text"   v-model="salaryStore.ifl.availPerInCtc" style="max-width: 100px;" class="mx-2" /> -->
                                                <InputText type="text" v-if="salaryStore.ifl.precent_Or_Amt == 'percnt'"
                                                    v-model="salaryStore.ifl.availPerInCtc" style="max-width: 100px;"
                                                    class="mx-2" />
                                                <InputText type="text" v-else disabled
                                                    v-model="salaryStore.ifl.availPerInCtc" style="max-width: 100px;"
                                                    class="mx-2" />
                                                % of their CTC.
                                            </h1>
                                        </div>

                                        <div class="col-12 d-flex align-items-center">
                                            <RadioButton v-model="salaryStore.ifl.precent_Or_Amt" inputId="ingredient1"
                                                name="dectmeth" value="fixed" class="mx-3" />
                                            <h1 class="fs-5">The employee must have served for a minimum of
                                                <InputText type="text" v-model="salaryStore.ifl.minEligibile"
                                                    style="max-width: 100px; " class="mx-2" />
                                            </h1>
                                        </div>
                                        <div class="col-10">
                                            <p class="fs-6 clr-gray ">(Note: This will be calculated based on the employee's
                                                date of joining.)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h1 class="fw-bolder fs-4">Interest</h1>
                            <p class="my-2 fs-5">Percentage of Interest </p>
                            <div class="card border-L">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="fs-5">Enter the percentage of interest for the loan
                                                <InputText type="text" v-model="salaryStore.lwif.availPerInCtc"
                                                    style="width: 150px;" /> of the loan amount.
                                            </h1>
                                        </div>
                                        <div class="col-12">
                                            <p class="fs-6 clr-gray">(Note: Please ensure that the percentage entered for
                                                the loan interest rate
                                                is not higher than the current SBI lending rate.)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <h1 class="mt-2 fs-4 fw-bolder">Deduction Method</h1>
                            <p class="my-2 fs-5">The EMI, or Equated Monthly Installment, is the sum of the principal amount
                                borrowed
                                and the interest charged on the loan.</p>

                            <div class="row">
                                <div class="shadow-sm card border-L rounded-top">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7 d-flex justify-content-start align-items-center">
                                                <RadioButton v-model="salaryStore.lwif.deductMethod" inputId="ingredient1"
                                                    name="percofsaladvance" value="1" />

                                                <label for="" class="mx-3 fs-5 clr-dark" style="line-height: 25px;">Begin
                                                    deducting the EMI in the
                                                    upcoming payroll.</label>
                                            </div>
                                        </div>


                                        <div class="my-1 row">
                                            <div class="col-7 d-flex justify-content-start align-items-center">
                                                <RadioButton v-model="salaryStore.lwif.deductMethod" inputId="ingredient1"
                                                    name="percofsaladvance" value="emi" />
                                                <label for="" class="mx-3 fs-5 clr-dark">Employee can select the month when
                                                    they would like their
                                                    EMI
                                                    payments to begin
                                                </label>
                                            </div>
                                        </div>
                                        <div class="ml-1 row" v-if="salaryStore.lwif.deductMethod == 'emi'">
                                            <div class="ml-4 col">
                                                <h2 class="fs-5 clr-dark">The EMI deductions should begin within
                                                    <InputText type="text" v-model="salaryStore.lwif.cusDeductMethod"
                                                        style="max-width: 100px;" class="mx-2" />months from the date
                                                    the loan is taken.
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="ml-1 row" v-if="salaryStore.lwif.deductMethod == 'emi'">
                                            <div class="ml-4 col">
                                                <p class="fs- clr-gray" style="line-height: 14px;">
                                                    (Note: During the specified period, employees have the option to select
                                                    the month in which they
                                                    would
                                                    like the EMI deductions to begin.)</p>
                                            </div>
                                        </div>
                                        <div class="row" v-if="salaryStore.lwif.deductMethod == 'emi'">
                                            <div class="col">
                                                <p class="fs-5 clr-dark">Please specify the maximum duration or tenure for
                                                    the employee to repay
                                                    the
                                                    loan amount
                                                    <InputText type="text" v-model="salaryStore.lwif.maxTenure"
                                                        style="max-width: 100px;" class="mx-2" />
                                                    years
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                        </div>

                        <h1 class="my-3 fs-4 fw-bolder" style="margin-top: 30px !important;">Approval Setting</h1>
                        <p class="my-2 fs-5">Please choose the approval flow for Loan With Interest Feature.</p>

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
                                            :options="salaryStore.filteredApprovalFlow" optionLabel="name"
                                            placeholder="Select" class="w-full pl-2 md:w-14rem"
                                            @change="salaryStore.toSelectoption(1, salaryStore.selectedOption1)" />
                                        <button
                                            @click="salaryStore.option1 = 0, salaryStore.toSelectoption(4, salaryStore.selectedOption1)"
                                            v-if="salaryStore.selectedOption1" class="mx-2">
                                            <i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i>
                                        </button>
                                    </div>
                                    <button @click="salaryStore.option1 = 1" class="text-green-400 " style="width: 40px;"
                                        v-if="salaryStore.option1 == 0 && salaryStore.option == 1">
                                        <i class="pi pi-plus-circle fs-4"></i></button>
                                    <button class="ml-4 text-green-400 " style="width: 40px;"
                                        v-if="salaryStore.option1 == 1">
                                        <i class="pi pi-angle-double-right fs-4"></i></button>
                                </div>


                                <div class="col col-3 d-flex" v-if="salaryStore.option1 == 1" style="width: 280px;">
                                    <div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center col-8"
                                        style="width: 225px !important;">
                                        <Dropdown v-model="salaryStore.selectedOption2" editable
                                            :options="salaryStore.filteredApprovalFlow" optionLabel="name"
                                            placeholder="Select" class="w-full md:w-14rem pl-0.5"
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
                                            :options="salaryStore.filteredApprovalFlow" optionLabel="name"
                                            placeholder="Select" class="w-full pl-2 md:w-14rem"
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
                </div>

                <!--Next screen  -->

                <div class="row">
                    <div class="col">
                        <div class="float-right" v-if="salaryStore.isLoanWithInterestFeature == '2'">
                            <button class="btn btn-border-primary">Cancel</button>
                            <button class="mx-4 btn btn-primary" @click="salaryStore.saveLoanWithInterest">Save
                                Changes</button>
                        </div>
                    </div>
                </div>

            </div>
            <!--  -->
        </div>
    </div>
</template>
<script setup>

import { ref, reactive, onMounted } from 'vue';

import { salaryAdvanceSettingMainStore } from '../stores/salaryAdvanceSettingMainStore';

const salaryStore = salaryAdvanceSettingMainStore()

const opt = ref()
const op = ref([
    { id: 1, dep: "res" }
])

onMounted(() => {
    opt.value = "Department"
})


</script>
<style>
:root {
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
}

.clr {
    color: var(--navy) !important;
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

.p-dropdown-label.p-inputtext {
    color: var(--navy);
}
</style>

