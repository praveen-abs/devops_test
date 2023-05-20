<template>
    <div class=" justify-content-center align-items-center">
        <div class="mx-2 ">
            <div class="my-3">
                <p class="text-2xl text-black">Tax Deductions FY 2022-2023</p>
            </div>
            <div class="p-2 my-2 text-black border-red-100 rounded-lg bg-red-50">
                <div style="font-weight: 600;" class="px-2 my-2 fs-5 d-flex ">Kindly update your <span
                        class="text-blue-400 fs-5">PAN to</span> avoid 20$ TDS
                    deduction (if applicable) </div>
            </div>
            <div class="my-4 bg-gray-100 rounded-lg border-1">
                <p style="font-weight: 400;" class="p-3 text-black fs-6">You have the option of either using a new
                    regime(with no tax deducations), or
                    using the same regime as FY 2019-20.To help you make an informed decision., we are displaying your tax
                    liability in both these regimes,and you can choose the option that you prefer.For us to accurately
                    calculated your tax liabilities , please ensure you full in all the information requested
                    below,irrespective of the regime that you pick</p>
            </div>
            <div class="flex gap-6 my-4">
                <div class="w-6">
                    <div class="text-2xl font-semibold ">Your current chosen tax regime is <span
                            class="font-semibold text-blue-500 fs-4">Old
                            Tax Regime</span> </div>

                    <!-- text-sm -->
                    <p class="text-gray-600 fs-6 fst-italic">The confirmed old tax regime will be used in future payroll
                        calculations
                    </p>
                    <div>
                    </div>
                </div>
                <div>
                    <button @click="switch_regime_dailo = true" type="button" class="px-2 px-4 btn btn-primary">
                        Old Tax Regime</button>
                    <span class="text-sm text-green-500">Maximum benefit</span>

                </div>
                <div>

                    <button @click="switch_regime_dailog = true" type="button"
                        class="p-2 text-orange-400 font-bold hover:text-white border border-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-400  rounded-lg text-sm px-5 py-2.5 text-center ml-8 mb-2 dark:border-orange-400 dark:text-orange-400dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-orange-400">
                        Switch Regime
                    </button>

                </div>



            </div>
            <div class="h-full p-3 my-4 bg-blue-50">
                <p class="text-blue-700 fs-6">
                    Choosing old regime will give you an additional benefits of &#x20B9; 41,222.00 as compared to New
                    Regime.Calculations are based on the latest released payroll - Jul 2022
                </p>
            </div>
        </div>
    </div>

    <DataTable :value="tax_deduction" :paginator="true" :rows="10" dataKey="id"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
        v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
        <template #empty> No Data Found. </template>
        <template #loading> Loading customers data. Please wait. </template>
        <Column field="particulars" header="Particulars">
        </Column>
        <Column field="new_regime" header="New Tax Regime"></Column>
        <Column field="old_regime" header="Old Tax Regime"></Column>
    </DataTable>




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
                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Confirm</button>
        </div>


    </Dialog>

    <div class="mt-6 row">
        <input type="number" v-model="amount" name="" class="form-control col-2" id="">
        <input type="number" v-model="age" name="" class="mx-4 form-control col-1" id="">
        <Dropdown editable  v-model="regime" :options="regimeOption" optionLabel="name"
            optionValue="value" class="mx-4 col-2" placeholder="Choose Regime" />
        <div class="col-4">
            <button class="btn btn-orange" @click="formula.taxCalculation(amount,regime,age)">click</button>
        </div>
    </div>
</template>



<script setup>
import { onMounted, ref } from 'vue'
import { investmentFormulaStore } from '../../stores/investmentFormulaStore'

const formula = investmentFormulaStore()

const amount = ref()
const regime = ref()
const age = ref()

const regimeOption = ref([
    {name:"old", value:"old"},
    {name:"new", value:"new"}
])



const tax_deduction = ref([
    { id: '1', particulars: 'Earings', old_regime: '0', new_regime: '0' },
    { id: '2', particulars: 'Exemption', old_regime: '0', new_regime: '0' },
    { id: '3', particulars: 'Standard Deduction', old_regime: '50000', new_regime: '50000' },
    { id: '4', particulars: 'Deduction', old_regime: '0', new_regime: '0' },
    { id: '5', particulars: 'Taxable Income', old_regime: '0', new_regime: '0' },
    { id: '6', particulars: 'Total Tax Liability', old_regime: '0', new_regime: '0' },
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

