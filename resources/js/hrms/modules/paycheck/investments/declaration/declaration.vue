<template>
    <div class="p-1">
        <div class=" justify-content-center align-items-center">
            <div class="mx-2 ">
                <div class="my-3">
                    <p class="font-semibold text-black fs-2">Tax Deductions FY 2022-2023</p>
                </div>
                <div class="flex my-1 text-left text-black bg-red-100 border-l-4 rounded-lg border-l-red-400 w-7 ">
                    <i class="mx-2 my-2.5 pi pi-times-circle text-red-500 font-bold" style="font-size: 1.5rem"></i>
                    <div style="font-weight: 600;" class="px-1 my-2 fs-5 d-flex ">Kindly update your <span
                            class="font-semibold text-blue-400 fs-5">PAN to</span> avoid 20$ TDS
                        deduction (if applicable) </div>
                </div>
                <div class="my-4 rounded-lg card ">
                    <div class="card-body">
                        <!-- <p class="text-black font-meduim fs-6">You have the option of either using a new
                            regime(with no tax deducations), or
                            using the same regime as FY 2019-20.To help you make an informed decision., we are displaying
                            your
                            tax
                            liability in both these regimes,and you can choose the option that you prefer.For us to
                            accurately
                            calculated your tax liabilities , please ensure you full in all the information requested
                            below,irrespective of the regime that you pick</p> -->
                        <p class="text-lg font-semibold text-black" style="line-height: 25px;">
                            Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your
                            investment amount till last day of every month until the cutoff date of Feb 27, 2024. Last date
                            for submitting your investment proofs is Feb 27, 2024. '$' - Not considered for exemption if
                            opted for New tax regime (Section 115BAC). You can declare your investment amount till last day
                            of every month until the cutoff date of Feb 27, 2024.Last date for submitting your investment
                            proofs is Feb 27, 2024.
                        </p>
                    </div>
                </div>
                <div class="flex justify-between gap-6 my-4">
                    <div class="w-7">
                        <div class="font-semibold fs-4 ">Your current chosen tax regime is <strong
                                class="text-blue-500 underline fs-4"
                                style="font-family: Verdana, Geneva, Tahoma, sans-serif;">OLD
                                TAX REGIME</strong> <span class="text-sm text-green-600">Maximum benefit</span> </div>

                        <!-- text-sm -->
                        <p class="text-gray-600 fs-6 fst-italic">The confirmed old tax regime will be used in future payroll
                            calculations
                        </p>
                        <div>
                        </div>
                    </div>
                    <div>
                        <!-- <button @click="switch_regime_dailo = true" type="button" class="px-2 btn btn-primary">
                            Old Tax Regime</button> -->


                    </div>
                    <div class="text-end">

                        <button @click="switch_regime_dailog = true" type="button"
                            class="p-2 text-lg text-end text-orange-400 font-bold hover:text-white border border-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-400  rounded-lg  px-5 py-2.5  ml-8 mb-2 dark:border-orange-400 dark:text-orange-400dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-orange-400">
                            Switch Regime
                        </button>

                        <!-- <button  @click="switch_regime_dailog = true" class="btn btn-orange">Switch Regime</button> -->

                    </div>



                </div>
                <div class="flex h-full py-2 my-4 bg-orange-100 border-l-4 rounded-lg border-l-orange-400">
                    <i class="mx-2 my-1 font-bold text-orange-500 pi pi-info-circle" style="font-size: 1.5rem"></i>
                    <p class="ml-2 font-semibold text-black fs-5">
                        Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your
                        investment amount till last day of every month.
                    </p>
                </div>
            </div>
        </div>

        <DataTable :value="tax_deduction" dataKey="id">
            <template #empty> No Data Found. </template>
            <template #loading> Loading customers data. Please wait. </template>
            <Column field="section" header="Particulars">
            </Column>
            <Column field="new_regime" header="New Tax Regime">
                <template #body="slotProps">
                    <p v-if="slotProps.data.section == 'Total Tax Laibility'">
                        {{ formula.taxCalculation(300003,'new') }}
                    </p>
                    <p v-else>
                        {{ slotProps.data.new_regime }}
                    </p>            
                </template>
            </Column>
            <Column field="old_regime" header="Old Tax Regime">
                <template #body="slotProps">
                    <p v-if="slotProps.data.section == 'Total Tax Laibility'">
                        {{ formula.taxCalculation(300002,'old',58) }}
                    </p>
                    <p v-else>
                        {{ slotProps.data.old_regime }}
                    </p>     
                </template>
            </Column>
        </DataTable>

        <div class="my-3">
            <p class="font-semibold text-black fs-2">Declaration</p>
        </div>

        <div class="my-3 card">
            <div class="grid gap-4 my-1 md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 card-body">
                <div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400">
                    <p class="font-semibold fs-6 ">Net Taxable Income</p>
                    <div class="flex gap-8">
                        <h6 class="text-lg font-bold w-7">INR 4,82,246 </h6>
                        <p class="text-orange-400 underline"> Income Tax Computation</p>
                    </div>
                </div>
                <div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400">
                    <p class="font-semibold fs-6 ">Total Tax Payable</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>

                <div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400 ">
                    <p class="font-semibold fs-6 ">Tax Paid Till Now</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>
            </div>
        </div>

        <div class="my-3">
            <div>
                <p class="text-2xl font-semibold ">Important!</p>
                <div class="mx-2">
                    <ul class="font-semibold f-13">
                        <li class="my-2 text-lg font-semibold">
                            '$' - Not considered for exemption if opted for New tax regime (Section 115BAC).
                        </li>
                        <li class="my-2 text-lg font-semibold">
                            You can declare your investment amount till last day of every month until the cutoff date of Feb
                            27, 2024.
                        </li>
                        <li class="my-2 text-lg font-semibold">
                            Last date for submitting your investment proofs is Feb 27, 2024.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="my-2 card">
            <div class="card-body">
                <div>
                    <p class="font-semibold fs-4 ">My Declaration</p>
                    <p class="my-2 font-semibold fs-6"> Below are the declarations done by you under various sections.</p>
                </div>
                <div class="my-2 table-responsive">
                    <DataTable :rows="7" dataKey="id" :value="data">
                        <template #empty> No Data Found. </template>
                        <template #loading> Loading customers data. Please wait. </template>
                        <Column field="particulars" header="S.No">
                            <template #body="slotProps">
                                {{ slotProps.index + 1 }}
                            </template>
                        </Column>
                        <Column field="section_name" header="Declarations"></Column>
                        <Column field="dec_amount" header="Amount Declared">
                            <template #body="slotProps">
                                {{ investmentStore.formatCurrency(slotProps.data.dec_amount) }}
                            </template>
                        </Column>
                        <Column field="proof_submitted" header="Proof Submitted"></Column>
                        <Column field="amount_rejected" header="Amount Rejected ">
                            <template #body="slotProps">
                                {{ investmentStore.formatCurrency(slotProps.data.amount_rejected) }}
                            </template>
                        </Column>
                        <Column field="amount_accepted" header="Amount Accepted ">
                            <template #body="slotProps">
                                {{ investmentStore.formatCurrency(slotProps.data.amount_accepted) }}
                            </template>
                        </Column>
                    </DataTable>
                </div>
                <div class="my-6">
                    <div>
                        <p class="my-2 font-semibold fs-5">Month- Month Tax Deduction Details</p>
                        <p class="my-2 font-semibold fs-6">Below deductions are based on your declared amount. Tax amount
                            may change based on the amount approved.</p>
                    </div>
                    <div>
                        <div class="grid gap-4 md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 card-body ">
                            <div class="text-left rounded-lg ">
                                <p class="my-2 font-semibold fs-3 text-ash-medium ">Total Tax Payable</p>
                                <div class="flex gap-2">
                                    <h6 class="mb-0 font-semibold fs-4">INR 0</h6>
                                </div>
                            </div>
                            <div class="p-2 text-left rounded-lg ">
                                <p class="my-2 font-semibold fs-3 text-ash-medium ">Tax Paid Till Now</p>
                                <h6 class="mb-0 font-semibold fs-4 ">INR 0</h6>
                            </div>

                            <div class="p-2 text-left rounded-lg ">
                                <p class="my-2 font-semibold fs-3 text-ash-medium ">Remaining Tax Amount</p>
                                <h6 class="mb-0 font-semibold fs-4">INR 0</h6>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <DataTable :paginator="true" :rows="1" dataKey="id" scrollable>
                            <template #empty> No Data Found. </template>
                            <template #loading> Loading customers data. Please wait. </template>
                            <Column field="particulars" header="Month" frozen class="font-bold">
                                <template #body>
                                    <p>
                                        Monthly Tax
                                    </p>
                                </template>
                            </Column>
                            <Column field="new_regime" header="Apr 23"></Column>
                            <Column field="old_regime" header="May 23"></Column>
                            <Column field="old_regime" header="June 23 "></Column>
                            <Column field="old_regime" header="July 23 "></Column>
                            <Column field="new_regime" header="Aug 23"></Column>
                            <Column field="old_regime" header="Sep 23"></Column>
                            <Column field="old_regime" header="Oct 23 "></Column>
                            <Column field="old_regime" header="Nov 23 "></Column>
                            <Column field="old_regime" header="Dec 23 "></Column>
                            <Column field="old_regime" header="Jan 23 "></Column>
                            <Column field="old_regime" header="Feb 23 "></Column>
                            <Column field="old_regime" header="Mar 23 "></Column>
                        </DataTable>
                    </div>
                    <div class="flex my-3">
                        <p class="font-semibold fs-6">
                            <strong class="text-red-600">*</strong>
                            Projected Income Tax does not include any revisions, bonuses or other additional projected
                            payments other than salary.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="switch_regime_dailog" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 text-lg font-semibold modal-title text-primary">Confirm Switching Regime</h6>

        </template>

        <p class="">Your current switching regime is <span class="text-lg font-semibold text-primary">New Tax
                Regime</span> </p>

        <p class="my-3 text-justify text-gray-500">
            Are you sure you want to switch your regime? You cannot change your regime selection once you
            have confirmed your selection.
        </p>
        <p class="text-justify text-gray-500">
            In case of an incorrect selection, your only option will be to change your selection when you
            file your tax returns for the current financial year.
        </p>


        <div class="mt-5 text-end">
            <button id="confirm_switchRegime"
                class="px-4 py-2 text-lg text-center text-white bg-orange-700 rounded-md">Confirm</button>
        </div>


    </Dialog>

    <!-- <div class="mt-6 row">
        <input type="number" v-model="amount" name="" class="form-control col-2" id="">
        <input type="number" v-model="age" name="" class="mx-4 form-control col-1" id="">
        <Dropdown editable v-model="regime" :options="regimeOption" optionLabel="name" optionValue="value"
            class="mx-4 col-2" placeholder="Choose Regime" />
        <div class="col-4">
            <button class="btn btn-orange" @click="calucate()">click</button>
        </div>
    </div>
    <h1>{{ totalTax }}</h1> -->
</template>



<script setup>
import axios from 'axios'
import { onMounted, reactive, ref } from 'vue'
import { investmentFormulaStore } from '../../stores/investmentFormulaStore'
import { investmentMainStore } from '../../stores/investmentMainStore';
const data = ref()
onMounted(() => {
    axios.get('/investments/investment-summary').then(res => {
        data.value = res.data
        // let compensatory = res.data.find(ele => {
        //     return ele.gross
        // })
        // let Reimbersument = res.data.find(ele => {
        //     return ele.section_name.includes('Reimbersument')
        // })

        // let hra = res.data.find(ele => {
        //     return ele.section_name.includes('HRA')
        // })

        // tax_deduction.push({ id: '1', particulars: 'Total Gross Income', values: compensatory.gross * 12, old_regime: '0', new_regime: '0' })
        // tax_deduction.push({ id: '2', particulars: 'Allowance Tax Income', values: parseInt(Reimbersument.dec_amount) + parseInt(compensatory.gross) + parseInt(compensatory.professional_tax) + parseInt(hra.dec_amount), old_regime: '0', new_regime: '0' })
        // tax_deduction.push({ id: '3', particulars: 'Excemption 80c & others ', values: compensatory.Excemption, old_regime: '0', new_regime: '0' })
        // tax_deduction.push({ id: '4', particulars: 'Total Taxable Income', old_regime: '0', new_regime: '0' })
        // tax_deduction.push({ id: '5', particulars: 'Total Tax Liability', old_regime: '0', new_regime: '0' })

    })

    axios.get('/investments/TaxDeclaration').then(res => {
        tax_deduction.value = res.data
    })

})

const investmentStore = investmentMainStore()
const formula = investmentFormulaStore()
const compensatoryValues = reactive()
const reimbursementValues = reactive()
const hraValues = reactive()
var tax_deduction = ref()

const amount = ref()
const regime = ref()
const age = ref()
const totalTax = ref()

const calucate = () => {
    totalTax.value = formula.taxCalculation(amount.value, regime.value, age.value)
    console.log(totalTax.value);
}

onMounted(() => {
})

const regimeOption = ref([
    { name: "old", value: "old" },
    { name: "new", value: "new" }
])








const switch_regime_dailog = ref(false);
const switch_regime_dailo = ref(false);


</script>



<style scoped>
.p-dropdown .p-dropdown-label.p-placeholder {
    position: relative;
    top: -5px;
    border: 1px solid red;
    color: #6c757d;
}

.p-button .p-fileupload-choose {
    /* height: 2.1em; */
}

i,
span,
.tabview-custom {
    vertical-align: middle;
}

span {
    margin: 0 0.5rem;
}

.AadharCardFront {
    margin-left: 20px;
}

.label {
    width: 170px;
}

.p-tabview p {
    line-height: 1.5;
    margin: 0;
}

dialog>header {
    color: #002f56 !important;
}

.form-selects {
    padding: 0;
    width: 100%;
    height: 2.5rem;
}

.save {
    border: 1px solid #e63b1f;
    color: #e63b1f;
}

.p-dialog-header {
    border-left: #e63b1f 5px solid !important;
}

.form-selects ::-webkit-scrollbar {
    width: 10px !important;
    border-radius: 12px !important;
}

/* Track */
.form-selects ::-webkit-scrollbar-track {
    background: #f1f1f1 !important;
}

/* Handle */
.form-selects ::-webkit-scrollbar-thumb {
    background: #888 !important;
    border-radius: 12px !important;
}

/* Handle on hover */
.form-selects ::-webkit-scrollbar-thumb:hover {
    background: #252222 !important;
    border-radius: 12px !important;
}

Dialog {
    color: #002f56;
}

.p-dialog .p-dialog-header .p-dialog-title {
    font-weight: 700;
    font-size: 1.25rem;
    color: #002f56;
}
</style>

