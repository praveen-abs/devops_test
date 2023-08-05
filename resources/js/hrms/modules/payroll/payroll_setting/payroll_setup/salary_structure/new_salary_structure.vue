<template>
    <div class="w-full" style="transition: opacity 0.5s ease;">
        <div class="mx-6 py-6">
            <!-- <router-link :to="`/payrollSetup/structure/`">
                <i class="pi pi-arrow-left py-auto mx-2 cursor-pointer" style="font-size: 1rem"></i>
            </router-link> -->

            <p class="text-gray-00 font-semibold fs-4 ">New Salary Structure</p>
            <p class="text-gray-500 font-semibold fs-6">Create custom salary package by selecting the relevant
                components
                and configuring their corresponding
                calculation </p>
        </div>
        <div class="flex">
            <div class="w-5">
                <p class="text-gray-700 font-semibold fs-5 mx-6">Structure Details</p>
                <div class="p-4 my-2 mx-6 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                    <div class="">
                        <label for="metro_city" class="block mb-2  text-gray-700 font-semibold fs-6">Structure
                            Name</label>
                        <InputText class="w-full h-10" v-model="usePayroll.salaryStructure.structureName" />
                    </div>
                    <div class="my-4">
                        <label for="metro_city" class="block mb-2  text-gray-700 font-semibold fs-6">Description</label>
                        <div class="flex gap-8 justify-evenly">
                            <Textarea :autoResize="true" rows="3" cols="90" placeholder="Enter the Reason"
                                v-model="usePayroll.salaryStructure.description" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <p class="text-gray-700 font-semibold fs-5 mx-6">PF & ESI Setting</p>
                    <div class="p-4 my-2 mx-6 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">

                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input"
                                v-model="usePayroll.salaryStructure.pf" :true-value=1 :false-value=0>
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the
                                option
                                for provident fund (PF)
                                contributions</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input"
                                v-model="usePayroll.salaryStructure.esi" :true-value=1 :false-value=0>
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the
                                coverage
                                for employee state insurance
                                (ESI)</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input"
                                v-model="usePayroll.salaryStructure.tds" :true-value=1 :false-value=0>
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is subject to TDS(Tax
                                deducted at source)</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input"
                                v-model="usePayroll.salaryStructure.fbp" :true-value=1 :false-value=0>
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary is eligible for flexible
                                benefit
                                plan(FBP)</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full mr-4">
                <div class="flex justify-between">
                    <p class="text-gray-700 font-semibold fs-6">Salary Components</p>
                    <button @click="addSalaryComponents = true" class="btn btn-orange w-4">Add Components</button>
                </div>
                <div class="my-2 ">
                    <DataTable :value="usePayroll.salaryStructure.selectedComponents">
                        <Column field="comp_name" header="Components" style="min-width: 15rem">
                        </Column>
                        <Column field="calculation_method" header="Amount/Calculation" style="min-width: 15rem"></Column>
                        <Column header="Action" style="min-width: 15rem">
                            <template #body>
                                <button class="p-1 mx-4 bg-green-200 border-green-500 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-6 px-auto text-center">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button class="p-1 bg-red-200 border-red-500 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-6 font-bold">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </template>
                        </Column>
                    </DataTable>

                </div>
                <button @click="assignEmployee = true" class="text-blue-500"><i class="pi pi-plus mx-1"
                        style="font-size: 0.8rem"></i>Assign Employee</button>
            </div>
        </div>

        <div class="flex justify-between my-5">
            <div></div>
            <div class="flex">
                <router-link :to="`/payrollSetup/structure/`">
                    <button @click=" usePayroll.dailogNewSalaryStructure = false"
                        class="btn btn-orange-outline">Cancel</button>
                </router-link>

                <button class="btn btn-orange mx-2 " @click="usePayroll.saveNewsalaryStructure">Create structure</button>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="addSalaryComponents" :modal="true" :closable="true"
        :style="{ width: '80vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Components</span>
        </template>
        <DataTable :value="usePayroll.salaryComponentsSource"
            v-model:selection="usePayroll.salaryStructure.selectedComponents" dataKey="id"
            :rows="usePayroll.salaryComponentsSource.length">
            <Column selectionMode="multiple"></Column>
            <Column field="comp_name" header="Name" style="min-width: 15rem"></Column>
            <Column field="comp_name" header="Type" style="min-width: 15rem"></Column>
            <Column header="Type of calculation" style="min-width: 22rem">
                <template #body="{ data }">
                    <!-- <p>{{ helper.findCompType(data.comp_type_id) }};{{ data.calculation_method }}</p> -->
                </template>
            </Column>
        </DataTable>
        <div class="float-right my-4">
            <div class="flex">
                <button @click=" usePayroll.dailogNewSalaryStructure = false" class="btn btn-orange-outline">Cancel</button>
                <button class="btn btn-orange mx-2" @click="addSalaryComponents = false">Save</button>
            </div>
        </div>
    </Dialog>
    <Dialog v-model:visible="assignEmployee" :modal="true" :closable="true"
        :style="{ width: '95vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Assign Employees</span>
        </template>
        <div class=" col-12">
            <div class="row ">
                <div class=" float-right">
                    <span class="p-input-icon-left ">
                        <i class="pi pi-search" />
                        <InputText placeholder="Search" v-model="filters['global'].value" class="border-color "
                            style="height: 3em" />
                    </span>

                </div>
                <div class="col-12">

                    <div class="col-12">
                        <div class="px-2 row">
                            <div class="col">
                                <div style="padding: 10px"
                                    class="border rounded d-flex justify-content-start align-items-center border-color">
                                    <input type="checkbox" class="mr-3" style="width: 20px; height: 20px"
                                        @change="salaryStore.resetFilters" />
                                    <h1>Clear Filters</h1>
                                </div>
                            </div>
                            <div class="col">
                                <Dropdown v-model="opt" editable :options="salaryStore.dropdownFilter.department"
                                    optionLabel="name" optionValue="id"
                                    @change="salaryStore.getSelectoption('department', opt)" placeholder="Department"
                                    class="w-full text-red-500 md: border-color" />
                            </div>
                            <div class="col">
                                <Dropdown v-model="opt1" editable :options="salaryStore.dropdownFilter.designation"
                                    optionLabel="designation" optionValue="designation" placeholder="Designation"
                                    class="w-full text-red-500 md: border-color"
                                    @change="salaryStore.getSelectoption('designation', opt1)" />
                            </div>
                            <div class="col">
                                <Dropdown v-model="opt2" editable :options="salaryStore.dropdownFilter.location"
                                    optionLabel="work_location" optionValue="work_location" placeholder="Location"
                                    class="w-full text-red-500 md: border-color"
                                    @change="salaryStore.getSelectoption('work_location', opt2)" />
                            </div>
                            <div class="col">
                                <Dropdown v-model="opt3" editable :options="salaryStore.dropdownFilter.state"
                                    optionLabel="state_name" optionValue="id" placeholder="State"
                                    class="w-full text-red-500 md: border-color"
                                    @change="salaryStore.getSelectoption('state', opt3)" />
                            </div>
                            <div class="col">
                                <Dropdown v-model="opt5" editable :options="salaryStore.dropdownFilter.legalEntity"
                                    optionLabel="client_name" optionValue="id" placeholder="Legal Entity"
                                    class="w-full text-red-500 md: border-color"
                                    @change="salaryStore.getSelectoption('client_name', opt5)" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="salaryStore.eligbleEmployeeSource"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]" :filters="filters"
                v-model:selection="usePayroll.salaryStructure.assignedEmployees"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
                <Column selectionMode="multiple" headerStyle="width: 1.5rem"></Column>
                <Column field="user_code" header="Employee Name" style="min-width: 8rem"></Column>
                <Column field="name" header="Employee Name" style="min-width: 12rem"></Column>
                <Column field="department_name" header="Department " style="min-width: 12rem"></Column>
                <Column field="designation" header="Designation " style="min-width: 20rem"></Column>
                <Column field="work_location" header="Location " style="min-width: 12rem"></Column>
                <Column field="client_name" header="Legal Entity" style="min-width: 20rem"></Column>
            </DataTable>
        </div>
        <div class="float-right my-4">
            <div class="flex">
                <button @click=" assignEmployee = false" class="btn btn-orange-outline">Cancel</button>
                <button class="btn btn-orange mx-2" @click=" assignEmployee = false">Save</button>
            </div>
        </div>
    </Dialog>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { FilterMatchMode } from 'primevue/api';
import { usePayrollMainStore } from '../../../stores/payrollMainStore';
import { usePayrollHelper } from '../../../stores/payrollHelper';
import { useRouter, useRoute } from "vue-router";
import { salaryAdvanceSettingMainStore } from "../../../../salary_loan_setting/stores/salaryAdvanceSettingMainStore";
const router = useRouter();
const route = useRoute();
const helper = usePayrollHelper()
const salaryStore = salaryAdvanceSettingMainStore()


onMounted(() => {
    console.log(route.params.id);
})

const usePayroll = usePayrollMainStore()

const addSalaryComponents = ref(false)
const assignEmployee = ref(false)
const selectedComponents = ref()





const filters = ref({
    'global': { value: null, matchMode: FilterMatchMode.CONTAINS },
});

const opt = ref()
const opt1 = ref()
const opt2 = ref();
const opt3 = ref();
const opt4 = ref();
const opt5 = ref();
const opt6 = ref();


onMounted(() => {
    opt.value = "Department"
    opt1.value = "Designation"
    opt2.value = "Location"
    opt3.value = "State"
    opt4.value = "Branch"
    opt5.value = "Legal Entity"
    salaryStore.getDropdownFilterDetails()
})
</script>

<style>
:root {
    --orange: #FF4D00;
    --white: #fff;
    --navy: #002f56;
}

.p-dropdown-label.p-inputtext {
    color: var(--navy);
}

.border-color {
    color: #003154;
    /* border: 2px solid #3B82F6 !important; */
    border: 2px solid #003487 !important;
}
</style>
