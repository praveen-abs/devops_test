<template>
    <div class="w-full" style="transition: opacity 0.5s ease;">
        <div class="mx-6 py-6">
            <i @click=" usePayroll.dailogNewSalaryStructure = false" class="pi pi-arrow-left py-auto mx-2 cursor-pointer"
                style="font-size: 1rem"></i>
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
                        <InputText class="w-full h-10" />
                    </div>
                    <div class="my-4">
                        <label for="metro_city" class="block mb-2  text-gray-700 font-semibold fs-6">Description</label>
                        <div class="flex gap-8 justify-evenly">
                            <Textarea :autoResize="true" rows="3" cols="90" placeholder="Enter the Reason" />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <p class="text-gray-700 font-semibold fs-5 mx-6">PF & ESI Setting</p>
                    <div class="p-4 my-2 mx-6 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">

                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the
                                option
                                for provident fund (PF)
                                contributions</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the
                                coverage
                                for employee state insurance
                                (ESI)</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is subject to TDS(Tax
                                deducted at source)</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
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
                    <DataTable :value="usePayroll.salaryStructureSource">
                        <Column field="comp_name" header="Components"></Column>
                        <Column field="calculation_method" header="Amount/Calculation"></Column>
                        <Column header="Action">
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
            </div>
        </div>
        <div class="flex justify-between my-5">
            <div></div>
            <div class="flex">
                <button @click=" usePayroll.dailogNewSalaryStructure = false" class="btn btn-orange-outline ">Cancel</button>
                <button class="btn btn-orange mx-2 ">Create structure</button>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="addSalaryComponents" :modal="true" :closable="true"
        :style="{ width: '80vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Components</span>
        </template>
        <!-- {{ usePayroll.salaryComponentsSource }} -->
        <DataTable :value="usePayroll.salaryComponentsSource" v-model:selection="selectedComponents" dataKey="id" :rows="5"
            :rowsPerPageOptions="[5, 10, 25]"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :paginator="true">
            <Column selectionMode="multiple"></Column>
            <Column field="comp_name" header="Name" style="min-width: 15rem"></Column>
            <Column field="comp_name" header="Type" style="min-width: 15rem"></Column>
            <Column header="Type of calculation" style="min-width: 22rem">
                <template #body="{ data }">
                    <p>{{ findCompType(data.comp_type_id) }};{{ data.calculation_method }}</p>
                </template>
            </Column>
        </DataTable>
        <div class="float-right">
            <div class="flex">
                <button @click=" usePayroll.dailogNewSalaryStructure = false" class="btn btn-orange-outline">Cancel</button>
                <button class="btn btn-orange mx-2"
                    @click="usePayroll.addsalaryComponents(selectedComponents), addSalaryComponents = false">Save</button>
            </div>
        </div>
    </Dialog>
</template>
  
<script setup>
import { ref, onMounted } from "vue";
import { usePayrollMainStore } from '../../../stores/payrollMainStore';

const usePayroll = usePayrollMainStore()

const addSalaryComponents = ref(false)
const selectedComponents = ref()

const componentTypes = ref([
    { id: 1, name: "Fixed", value: 1 },
    { id: 2, name: "Variable", value: 2 },
])
const calculationTypes = ref([
    { id: 1, name: "Flat Amount", value: 1 },
    { id: 2, name: "Percentage of CTC", value: 2 },
])

const findCompType = (value) => {
    let type = componentTypes.value.find(ele => {
        return ele.value == value
    })
    return type.name
}
</script>

<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
  