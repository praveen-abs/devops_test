<template>
    <div class=" justify-content-center align-items-center">
        <div class="mx-2 ">
            <div class="my-3">
                <p class="text-2xl text-black">Tax Deductions FY 2022-2023</p>
            </div>
            <div class="p-1 my-2 text-black bg-red-100 border-red-100 rounded-lg">
                <div class="px-2 my-2">Kindly update your <span>PAN to</span> avoid 20$ TDS deduction (if applicable) </div>
            </div>
            <div class="my-4 bg-gray-100 rounded-lg border-1">
                <p class="p-2 text-black">You have the option of either using a new regime(with no tax deducations), or
                    using the same regime as FY 2019-20.To help you make an informed decision., we are displaying your tax
                    liability in both these regimes,and you can choose the option that you prefer.For us to accurately
                    calculated your tax liabilities , please ensure you full in all the information requested
                    below,irrespective of the regime that you pick</p>
            </div>
            <div class="flex gap-6 my-4">
                <div class="w-6">
                    <div class="text-xl ">Your current chosen tax regime is <span class="text-xl font-bold text-black">Old
                            Tax Regime</span> </div>

                    <p class="font-normal text-md">The confirmed old tax regime will be used in future payroll calculations
                    </p>
                    <div>
                    </div>
                </div>
                <div>
                    <button @click="switch_regime_dailo = true" type="button"
                        class="p-2 font-bold text-white bg-blue-500 rounded-lg ">
                        Old Tax Regime</button>

                </div>
                <div>


                    <button @click="switch_regime_dailog = true" type="button"
                        class="p-2 text-orange-400 font-bold hover:text-white border border-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-orange-400 dark:text-orange-400dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-orange-400">
                        Switch Regime
                    </button>

                    <!-- <button class="bg-orange-400">Switch Regime</button> -->

                </div>



            </div>
            <div class="h-full p-3 my-4 bg-blue-50">
                <p class="text-blue-700">
                    Choosing old regime will give you an additional benefits of &#x20B9; 41,222.00 as compared to New
                    Regime.Calculations are based on the latest
                </p>
            </div>
        </div>
    </div>

    <DataTable :value="att_regularization" :paginator="true" :rows="10" dataKey="id"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
        v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
        <template #empty> No Data Found. </template>
        <template #loading> Loading customers data. Please wait. </template>
        <Column field="regularization_type" header="Particulars"></Column>
        <Column field="user_time" header="New Tax Regime"></Column>
        <Column field="regularize_time" header="Old Tax Regime"></Column>
    </DataTable>




    <Dialog v-model:visible="switch_regime_dailog" modal header="Header"  :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <template #footer>
            <Button label="No" icon="pi pi-times" @click="switch_regime_dailog = false"  />
            <Button label="Yes" icon="pi pi-check" @click="switch_regime_dailog = false"  />
        </template>
    </Dialog>
</template>



<script setup>
import { ref } from 'vue'

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

