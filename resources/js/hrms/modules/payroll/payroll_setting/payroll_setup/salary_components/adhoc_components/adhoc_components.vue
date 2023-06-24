<template>
    <div class="w-full my-4">
        <div class="flex mx-2">
            <div class="w-9">
                <p class="font-semibold text-gray-600 fs-6">Adhoc Components refer to salary components that are not
                    part of an employee regular monthly pay and are typically added for a specific payroll month. These
                    compenents can take various forms.such as a joining bonus,reimbursements,leave encashment at the end
                    year, or penalty for late arrival.</p>
            </div>
            <div class="px-5">
                <InputText class="w-full" placeholder="Search...." />
            </div>
        </div>
        <div class="flex gap-8  my-4 ">
            <div class="w-6">
                <div class="flex justify-between  my-4">
                    <p class="w-4 mx-1 font-semibold fs-5.5">Adhoc Allowances</p>
                    <button class="text-blue-500" @click="dailogAdhocComponents = true"><i class="pi pi-plus mx-1" style="font-size: 0.8rem"></i>Add new</button>
                </div>
                <div id="table">
                    <DataTable :value="helper.filterSource(usePayroll.salaryComponentsSource, 3)">
                        <Column field="comp_name" header="Name"></Column>
                        <Column field="is_taxable" header="Tax Status">
                            <template #body="{ data }">
                                <p>{{ helper.findIsSelected(data.is_taxable) }}</p>
                            </template>
                        </Column>
                        <Column header="Actions">
                            <template #body="{data}">
                                <i @click="usePayroll.editAdhocSalaryComponents(data,3),dailogAdhocComponents = true" class="pi pi-pencil cursor-pointer" style="font-size: 1rem"></i>
                                <i class="pi pi-trash mx-3 cursor-pointer" style="font-size: 1rem"></i>
                            </template>
                        </Column>
                    </DataTable>

                </div>
            </div>
            <div class="w-6">
                <div>
                    <div class="flex justify-between mx-2 my-4">
                        <p class="w-4 font-semibold fs-5.5">Deductions</p>
                        <button class="text-blue-500" @click="dailogDeduction = true"><i class="pi pi-plus mx-1" style="font-size: 0.8rem"></i>Add new</button>
                    </div>
                    <div id="table">
                        <DataTable :value="helper.filterSource(usePayroll.salaryComponentsSource, 2)">
                            <Column field="comp_name" header="Name"></Column>
                            <Column field="impact_on_gross" header="Impact on gross">
                                <template #body="{ data }">
                                    <p>{{ helper.findIsSelected(data.impact_on_gross) }}</p>
                                </template>
                            </Column>
                            <Column header="Actions">
                                <template #body="{data}">
                                    <i @click="usePayroll.editAdhocSalaryComponents(data,2),dailogDeduction = true" class="pi pi-pencil cursor-pointer" style="font-size: 1rem"></i>
                                    <i class="pi pi-trash mx-3" style="font-size: 1rem"></i>
                                </template>
                            </Column>
                        </DataTable>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <Dialog v-model:visible="dailogDeduction" :modal="true" :closable="true"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Deduction</span>
        </template>
        <div class="">
            <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Name</label>
            <InputText v-model="usePayroll.deductionComponents.comp_name" class="w-full" placeholder="Enter name  " />
        </div>
        <div class="my-4">
            <p class="block mb-2 font-semibold fs-6 text-gray-700 ">Does this have an impact on the gross amount</p>
            <div class="form-check form-check-inline my-2">
                <input v-model="usePayroll.deductionComponents.impact_on_gross" style="height: 20px;width: 20px;"
                    class="form-check-input" type="radio" name="esi" id="full_day" value="1" />
                <label class="form-check-label leave_type ms-2" for="full_day">Yes</label>
            </div>
            <div class="form-check form-check-inline mx-7">
                <input v-model="usePayroll.deductionComponents.impact_on_gross" style="height: 20px;width: 20px;"
                    class="form-check-input" type="radio" name="esi" id="full_day" value="0" />
                <label class="form-check-label leave_type ms-2" for="full_day">No</label>
            </div>
        </div>
        <div class="float-right">
            <div class="flex">
                <button @click="dailogDeduction = false" class="btn btn-orange-outline">Cancel</button>
                <button class="btn btn-orange mx-2" @click="usePayroll.saveNewSalaryComponent(2),dailogDeduction = false">Add</button>
            </div>
        </div>
    </Dialog>

    <Dialog v-model:visible="dailogAdhocComponents" :modal="true" :closable="true"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Adhoc Components</span>
        </template>
        <div class="">
            <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Name</label>
            <InputText class="w-full" placeholder="Enter name" v-model="usePayroll.adhocComponents.comp_name" />
        </div>
        <div class="my-4">
            <p class="block mb-2 font-semibold fs-6 text-gray-700 ">Does this have tax status</p>
            <div class="form-check form-check-inline my-2">
                <input v-model="usePayroll.adhocComponents.is_taxable" style="height: 20px;width: 20px;"
                    class="form-check-input" type="radio" name="esi" id="full_day" value="1" />
                <label class="form-check-label leave_type ms-2" for="full_day">Yes</label>
            </div>
            <div class="form-check form-check-inline mx-7">
                <input v-model="usePayroll.adhocComponents.is_taxable" style="height: 20px;width: 20px;"
                    class="form-check-input" type="radio" name="esi" id="full_day" value="0" />
                <label class="form-check-label leave_type ms-2" for="full_day">No</label>
            </div>
        </div>
        <div class="float-right">
            <div class="flex">
                <button @click="dailogAdhocComponents = false" class="btn btn-orange-outline">Cancel</button>
                <button @click="usePayroll.saveNewSalaryComponent(3),dailogAdhocComponents = false" class="btn btn-orange mx-2">Add</button>
            </div>
        </div>
    </Dialog>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import { usePayrollMainStore } from '../../../../stores/payrollMainStore';
import { usePayrollHelper } from '../../../../stores/payrollHelper';

const usePayroll = usePayrollMainStore()
const helper = usePayrollHelper()

const dailogDeduction = ref(false)
const dailogAdhocComponents = ref(false)



</script>
