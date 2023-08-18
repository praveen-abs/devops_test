<template>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-4">
            <div class="flex justify-between my-2">
                <div>
                    <p class="font-semibold text-lg">Employee's State Insurance</p>
                </div>
                <div>2</div>
            </div>
            <div class="bg-gray-100 p-3 rounded-lg">
                <div class="my-2">
                    <p class="text-gray-600 text-md">ESI Number</p>
                    <input type="text" name="" id="" class="w-full border rounded-lg p-1 my-2"
                        v-model="usePayroll.addNewEsi.esi_number">
                </div>
                <div class="my-2">
                    <p class="text-gray-600 text-md">State</p>
                    <input type="text" name="" id="" class="w-full border rounded-lg p-1 my-2"
                        v-model="usePayroll.addNewEsi.state">
                </div>
                <div class="my-2">
                    <p class="text-gray-600 text-md">Location</p>
                    <input type="text" name="" id="" class="w-full border rounded-lg p-1 my-2"
                        v-model="usePayroll.addNewEsi.location">
                </div>
                <div class="my-2">
                    <p class="text-gray-600 text-md">Deduction cycle</p>
                    <input type="text" name="" id="" class="w-full border rounded-lg p-1 my-2"
                        v-model="usePayroll.addNewEsi.esi_deduction_cycle">
                </div>
                <div class="my-2">
                    <p class="text-gray-600 text-md">Employee Contribution Rate</p>
                    <div class="flex justify-between">
                        <div>
                            <input type="text" name="" id="" class="w-full border rounded-lg p-1 my-2"
                                v-model="usePayroll.addNewEsi.employee_contribution_rate">
                        </div>
                        <div>%</div>
                    </div>
                </div>
                <div class="my-2">
                    <p class="text-gray-600 text-md">Employer Contribution Rate</p>
                    <div class="flex justify-between">
                        <div>
                            <input type="text" name="" id="" class="w-full border rounded-lg p-1 my-2"
                                v-model="usePayroll.addNewEsi.employer_contribution_rate">
                        </div>
                        <div>%</div>
                    </div>
                </div>

            </div>

            <div class="bg-gray-100 p-4 rounded-lg my-2">
                <div class="flex ">
                    <input style="height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="status"
                        :true-value=1 :false-value=0 id="full_day"
                        v-model="usePayroll.addNewEsi.employer_contribution_in_ctc" />
                    <label class="form-check-label leave_type text-gray-600 text-sm mx-2" for="full_day">Employee's
                        contribution
                        is included in the CTC</label>
                </div>
            </div>
        </div>
        <div class="col-span-8">
            <div class="flex justify-between">
                <div>
                    <p class="font-medium text-lg">Example</p>
                    <p class="font-medium text-md text-gray-500">Let's Assume</p>
                </div>
                <div>
                    <label for="Toggle1" class="inline-flex items-center space-x-4 cursor-pointer dark:text-gray-100">
                        <span class="font-semibold text-lg text-gray-400">Disable ESI</span>
                        <span class="relative">
                            <input id="Toggle1" type="checkbox" class="hidden peer"  :true-value=1 :false-value=0  :value="1" v-model="usePayroll.addNewEsi.status">
                            <div
                                class="w-10 h-6 rounded-full shadow-inner dark:bg-gray-400 peer-checked:dark:bg-violet-400">
                            </div>
                            <div
                                class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-gray-800">
                            </div>
                        </span>
                        <span class="font-semibold text-lg ">Enable ESI</span>
                    </label>
                </div>
            </div>
            <div class="mb-6  mt-4 w-full">
                <DataTable :value="products" style="background-color: none;">
                    <Column field="product" header=""></Column>
                    <Column field="lastYearSale" header="Feb"></Column>
                    <Column field="thisYearSale" header="Mar"></Column>
                    <Column field="thisYearProfit" header="Apr"></Column>
                </DataTable>
            </div>
        </div>
    </div>
    <div class="w-full pb-12">
        <button class="float-right btn btn-orange" @click="usePayroll.saveNewEsi(usePayroll.addNewEsi)">Save</button>
        <button class="float-right btn btn-outline-orange mx-4">Cancel</button>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import { usePayrollMainStore } from "../../../../../stores/payrollMainStore";

const usePayroll = usePayrollMainStore()

const products = ref([
    {
        product: "Bamboo Watch",
        lastYearSale: 51,
        thisYearSale: 40,
        lastYearProfit: 54406,
        thisYearProfit: 43342,
    },
    {
        product: "Black Watch",
        lastYearSale: 83,
        thisYearSale: 9,
        lastYearProfit: 423132,
        thisYearProfit: 312122,
    },
    {
        product: "Blue Band",
        lastYearSale: 38,
        thisYearSale: 5,
        lastYearProfit: 12321,
        thisYearProfit: 8500,
    },
]);
</script>
