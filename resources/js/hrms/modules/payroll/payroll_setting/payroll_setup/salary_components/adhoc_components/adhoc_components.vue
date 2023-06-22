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
            <div class="w-5">
                <div class="flex justify-between  my-4">
                    <p class="w-4 mx-1 font-semibold fs-5.5">Adhoc Allowances</p>
                    <button class="text-blue-500">Add new</button>
                </div>
                <div id="table">
                    <DataTable :value="products">
                        <Column field="name" header="Name"></Column>
                        <Column field="category" header="Tax Status"></Column>
                        <Column field="category" header="Actions"></Column>
                    </DataTable>

                </div>
            </div>
            <div class="w-5 ml-6">
                <div>
                    <div class="flex justify-between mx-2 my-4">
                        <p class="w-4 font-semibold fs-5.5">Deductions</p>
                        <button class="text-blue-500">Add new</button>
                    </div>
                    <div id="table">
                        <DataTable :value="products">
                            <Column field="code" header="Name"></Column>
                            <Column field="name" header="Affect gross"></Column>
                            <Column field="category" header="Actions"></Column>
                        </DataTable>

                    </div>
                </div>
                <div>
                    <div class="flex justify-between mx-2 my-4">
                        <p class="w-4 mx-1 font-semibold fs-5.5">Bonus</p>
                        <button  class="text-blue-500">Add new</button>
                    </div>
                    <div id="table">
                        <DataTable :value="products">
                            <Column field="name" header="Name"></Column>
                            <Column field="category" header="Affect gross"></Column>
                            <Column field="quantity" header="Actions"></Column>
                        </DataTable>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <Dialog v-model:visible="visbile" :modal="true" :closable="true"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Deduction</span>
        </template>
        <div class="">
            <label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700 ">Name</label>
            <InputText class="w-full" placeholder="Enter name  " />
        </div>
        <div class="my-4">
            <p class="block mb-2 font-semibold fs-6 text-gray-700 ">Does this have an impact on the gross amount</p>
            <div class="form-check form-check-inline my-2">
                <input v-model="usePayroll.salaryComponents.isConsiderForESI" style="height: 20px;width: 20px;"
                    class="form-check-input" type="radio" name="esi" id="full_day" value="1" />
                <label class="form-check-label leave_type ms-2" for="full_day">Yes</label>
            </div>
            <div class="form-check form-check-inline mx-7">
                <input v-model="usePayroll.salaryComponents.isConsiderForESI" style="height: 20px;width: 20px;"
                    class="form-check-input" type="radio" name="esi" id="full_day" value="0" />
                <label class="form-check-label leave_type ms-2" for="full_day">No</label>
            </div>
        </div>
        <div class="float-right">
            <div class="flex">
                <button @click=" visbile = false" class="btn btn-orange-outline">Cancel</button>
                <button class="btn btn-orange mx-2">Add</button>
            </div>
        </div>
    </Dialog>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import { usePayrollMainStore } from '../../../../stores/payrollMainStore';

const usePayroll = usePayrollMainStore()

const visbile = ref(false)



</script>
