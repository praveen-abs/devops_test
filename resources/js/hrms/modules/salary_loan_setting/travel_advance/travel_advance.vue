<template>
    <div class="px-5">
        <div class="row d-flex justify-content-start align-items-center">
            <div class="d-flex mt-4">
                <div class="col-3 fs-4" style="position: relative; left: -8px">
                    <h1 class="fw-bolder">Travel Advance Feature</h1>
                </div>
                <div class="col">
                    <button class="orange_btn" :class="[
                        salaryStore.isTravelAdvanceFeatureEnabled === 2
                            ? 'bg-white text-black border-1 border-black'
                            : 'text-white',
                    ]" @click="salaryStore.isTravelAdvanceFeatureEnabled = 1">
                        Disabled
                    </button>
                    <button class="Enable_btn" :class="[
                            salaryStore.isTravelAdvanceFeatureEnabled === 2
                                ? 'bg-green-700 text-white'
                                : '',
                        ]" @click="salaryStore.isTravelAdvanceFeatureEnabled = 2">
                        Enable
                    </button>
                </div>
            </div>

            <div class="col" v-if="salaryStore.isTravelAdvanceFeatureEnabled == '1'">
                <div>
                    <p class="fs-5">
                        Please click the "Enable" button to activate the Travel Advance
                        Feature for use within your organization.
                    </p>
                </div>
            </div>
            <div v-else class="row">
                <div class="col-10">
                    <p class="fs-5">
                        Please click the "Disable" button to deactivate the Travel Advance
                        Feature.
                    </p>
                    <h1 class="mt-10 fs-4 fw-bolder">Eligible Employees</h1>
                    <p class="my-2 fs-5">
                        Kindly choose the employees who are eligible for the Travel Advance
                        Feature.
                    </p>
                </div>
                <div class="col-12">
                    <div class="rounded-lg shadow-sm card">
                        <div class="card-body" style="border-top: 3px solid var(--navy)">
                            <div class="row">
                                <div class="col-10">
                                    <h1 style="
                      border-left: 3px solid var(--orange);
                      padding-left: 15px;
                      font-size: 18px;
                    ">
                                        Employees
                                    </h1>
                                </div>
                                <div class="col-10">
                                    <span class="p-input-icon-left">
                                        <i class="pi pi-search" />
                                        <InputText placeholder="Search" class="h-15" />
                                    </span>
                                </div>
                                <div class="col-12">
                                    <div class="px-2 row">
                                        <div class="col">
                                            <div style="padding: 10px"
                                                class="border rounded d-flex justify-content-start align-items-center border-color">
                                                <input type="checkbox" class="mr-3" style="width: 20px; height: 20px" />
                                                <h1>Clear Filters</h1>
                                            </div>

                                            <!-- <Dropdown v-model="opt" editable :options="op" optionLabel="dep" optionValue="dep"
                            placeholder="Department" class="w-full text-red-500 md: border-color" /> -->

                                            <!-- {{ opt }} -->
                                        </div>
                                        <div class="col">
                                            <Dropdown v-model="opt" editable :options="op" optionLabel="dep"
                                                optionValue="dep" placeholder="Department"
                                                class="w-full text-red-500 md: border-color" />
                                        </div>
                                        <div class="col">
                                            <Dropdown v-model="opt1" editable :options="op" optionLabel="dep"
                                                optionValue="dep" placeholder="Designation"
                                                class="w-full text-red-500 md: border-color" />
                                        </div>
                                        <div class="col">
                                            <Dropdown v-model="opt2" editable :options="op" optionLabel="dep"
                                                optionValue="dep" placeholder="Location"
                                                class="w-full text-red-500 md: border-color" />
                                        </div>
                                        <div class="col">
                                            <Dropdown v-model="opt3" editable :options="op" optionLabel="dep"
                                                optionValue="dep" placeholder="State"
                                                class="w-full text-red-500 md: border-color" />
                                        </div>
                                        <div class="col">
                                            <Dropdown v-model="opt4" editable :options="op" optionLabel="dep"
                                                optionValue="dep" placeholder="Branch"
                                                class="w-full text-red-500 md: border-color" />
                                        </div>
                                        <div class="col">
                                            <Dropdown v-model="opt5" editable :options="op" optionLabel="dep"
                                                optionValue="dep" placeholder="Legal Entity"
                                                class="w-full text-red-500 md: border-color" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- table components  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h1 class="my-3 fs-4 fw-bolder">Travel Advance Limit</h1>
                    <p class="my-2 fs-5">
                        What is the maximum Limit for the travel allowance that can be
                        availed.
                    </p>

                    <div class="shadow-sm card border-L rounded-top">
                        <div class="card-body">
                            <div class="row justify-content-start align-items-center">
                                <div class="col-6 fs-5">
                                    Is there a maximium limit on the travel allowance that can be
                                    availed?
                                </div>
                                <div class="col-1">
                                    <div class="flex flex-wrap gap-3">
                                        <div class="flex justify-content-center align-items-center">
                                            <RadioButton v-model="salaryStore.ta.tdl" inputId="ingredient1" name="limit"
                                                value="yes" />
                                            <label for="ingredient1" class="ml-2 fs-5">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="flex align-items-center">
                                        <RadioButton v-model="salaryStore.ta.tdl" inputId="ingredient2" name="limit"
                                            value="no" />
                                        <label for="ingredient2" class="ml-2 fs-5">No</label>
                                    </div>
                                </div>
                                <div class="col-12" v-if="activetab1 == '2'">
                                    <label for="" class="fs-5">Enter the maximum amount can be availed per month
                                        <InputText type="text" class="mx-3" v-model="value" style="max-width: 100px" />
                                    </label>
                                </div>

                                <!--  -->
                            </div>
                        </div>
                    </div>

                    <h1 class="my-3 fs-3 fw-bolder" style="margin-top: 30px !important">
                        Deduction
                    </h1>
                    <p class="my-2 fs-5">Please choose the method of deduction.</p>
                    <div class="card border-L">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h1 class="fs-5">
                                        Is this advance can be decducted from claim
                                    </h1>
                                </div>
                                <div class="col-1">
                                    <div class="flex align-items-center">
                                        <RadioButton v-model="salaryStore.ta.deductMethod" inputId="ingredient2"
                                            name="pizza" value="yes" />
                                        <label for="ingredient2" class="ml-2 fs-5">yes</label>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="flex align-items-center">
                                        <RadioButton v-model="salaryStore.ta.deductMethod" inputId="ingredient2"
                                            name="pizza" value="no" />
                                        <label for="ingredient2" class="ml-2 fs-5">No</label>
                                    </div>
                                </div>

                                <div class="col d-flex align-items-center fs-5 txt_underline">
                                    <h1 class="text-primary" @click="dialog_ViewExample_Visible = true">
                                        View Example
                                    </h1>
                                </div>

                                <template>
                                    <div class="card flex justify-content-center">
                                        <Button label="Show" icon="pi pi-external-link" />
                                        <Dialog v-model:visible="dialog_ViewExample_Visible" modal header="Header"
                                            :style="{ width: '50vw' }">
                                            <template #header>
                                                <div>
                                                    <h1 style="border-left: 3px solid var(--orange); padding-left: 8px;" class="fs-4 ">Travel Advance Deduction Example</h1>
                                                </div>
                                            </template>
                                            <div class="card">
                                                    <DataTable :value="sample" rowGroupMode="rowspan"
                                                        groupRowsBy="selected"
                                                        sortField="selected"
                                                      showGridlines>

                                                        <Column field="selected" header="if Selected" class="bg-light"></Column>
                                                        <Column field="ta" header="Travel Advance "> </Column>
                                                        <Column field="bs" header="Bills Submited"> </Column>
                                                        <Column field="category" header="Payable Amount to the Employee">
                                                        </Column>
                                                    </DataTable>
                                                </div>

                                        </Dialog>
                                    </div>
                                </template>
                                <!-- <template> -->

                                            <!-- </template> -->
                            </div>
                        </div>
                    </div>

                    <h1 class="mt-4 mb-4 fs-4 fw-bolder">Claim Settings</h1>
                    <div class="card border-L">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <h1 class="fs-5">
                                        is it for employess to submit bills or receipt to clam
                                        travel allowances?
                                    </h1>
                                </div>
                                <div class="col-1 d-flex justify-content-start align-items-center">
                                    <input type="radio" name="" style="width: 50px" checked />
                                    <p class="mx-3 fs-5">yes</p>
                                </div>
                                <div class="col-1 d-flex justify-content-start align-items-center">
                                    <input type="radio" style="width: 50px" checked />
                                    <p class="mx-3 fs-5">No</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 d-flex justify-content-start align-items-center">
                                    <p class="fs-5">
                                        The employees Sumbit the bills within
                                        <InputText type="text" class="mx-3" v-model="salaryStore.ta.sumbitWithIn"
                                            style="max-width: 100px" />
                                        months for the date of travel advance.
                                    </p>
                                </div>

                                <div class="col-12 d-flex justify-content-start align-items-center">
                                    <input type="checkbox" class="mr-4" style="width: 20px; height: 20px" name="" id=""
                                        v-model="salaryStore.ta.isDeductedInsubsequentpayroll" />
                                    <p class="fs-5">
                                        If bills are by the employee within the above timeframe, the
                                        amount can be deducted from the employee's subsequent
                                        payroll.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1 class="my-3 fs-4 fw-bolder" style="margin-top: 30px !important">
                        Approval Setting
                    </h1>
                    <p class="my-2 fs-5">
                        Please choose the approval flow for Travel Advance.
                    </p>

                    <div class="card border-L">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7 d-flex justify-content-start align-items-center">
                                    <input type="radio" name="Dedution_method" checked />
                                    <label for="" class="mx-3 fs-5" style="line-height: 25px">Employee Request
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                        Line Manager
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                        HR
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                        Finance Admin
                                    </label>
                                </div>
                            </div>
                            <div class="my-3 row">
                                <div class="col-7 d-flex justify-content-start align-items-center">
                                    <input type="radio" name="Dedution_method" checked />
                                    <label for="" class="mx-3 fs-5" style="line-height: 25px">Employee Request
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                        HR
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                        Finance Admin
                                    </label>
                                </div>
                            </div>
                            <div class="my-3 row">
                                <div class="col-7 d-flex justify-content-start align-items-center">
                                    <input type="radio" name="Dedution_method" checked />
                                    <label for="" class="mx-3 fs-5" style="line-height: 25px">Employee Request
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>
                                        HR
                                    </label>
                                </div>
                            </div>
                            <div class="my-3 row">
                                <div class="col-7 d-flex justify-content-start align-items-center">
                                    <input type="radio" name="Dedution_method" checked />
                                    <label for="" class="mx-3 fs-5" style="line-height: 25px">Employee Request
                                        <i class="pi pi-arrow-right" style="font-size: 1rem"></i>

                                        Finance Admin
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Next screen  -->
        </div>

        <div class="row">
            <div class="col">
                <div class="float-right" v-if="salaryStore.isTravelAdvanceFeatureEnabled == '2'">
                    <button class="btn btn-border-primary">Cancel</button>
                    <button class="mx-4 btn btn-primary" @click="salaryStore.saveInterestfreeLoan">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, reactive, onMounted } from "vue";
import { salaryAdvanceSettingMainStore } from "../stores/salaryAdvanceSettingMainStore";

const salaryStore = salaryAdvanceSettingMainStore();

const value = ref();
const options = ref(["Off", "On"]);

const dialog_ViewExample_Visible = ref(false);

const activetab = ref(1);
const activetab1 = ref(1);

const ingredient = ref("");

const opt = ref();
const op = ref([{ id: 1, dep: "res" }]);

onMounted(() => {
    opt.value = "Department";
    opt1.value = "Designation";
    opt2.value = "Location";
    opt3.value = "State";
    opt4.value = "Branch";
    opt5.value = "Legal Entity";
});

const sample = ref([
    {id:1,selected:"Yes",ta:"50,000","bs":'48,000',epa:100},
    {id:2,selected:"Yes",ta:"50,000","bs":'56,000',epa:100},
    {id:3,selected:"No",ta:"10","bs":100,epa:'6,000',}

]
)

const opt1 = ref();
const opt2 = ref();
const opt3 = ref();
const opt4 = ref();
const opt5 = ref();
const opt6 = ref();
</script>
<style>
:root {
    --orange: #ff4d00;
    --white: #fff;
    --navy: #002f56;
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

input[type="radio"] {
    border: 0px;
    width: 20px;
    height: 20px;
    color: var(--orange) !important;
    background-color: var(--orange) !important;
}

.p-dropdown-label.p-inputtext {
    color: var(--navy);
}

.txt_underline {
    text-decoration: underline #3b82f6;
}
</style>


{


<!--

<template>
    <div class="card flex justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="visible = true" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";

const visible = ref(false);
</script>





<script setup>
import { ref, onMounted } from 'vue';
import { ProductService } from '@/service/ProductService';

onMounted(() => {
    ProductService.getProductsMini().then((data) => (products.value = data));
});

const products = ref();

</script>



-->

}
