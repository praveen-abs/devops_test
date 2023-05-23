<template>
    <div class="mb-3 tw-card">
        <div class="flex items-center justify-between mb-3">
            <h6 class="text-lg font-semibold ">Tax Saving Investment </h6>
            <select name="" id="" class="w-1/6 border-orange form-select disabled_focus">
                <option value="" selected hidden disabled>Apr 2023 - Mar 2024 </option>
                <!-- <option value="" selected hidden disabled>Apr 2024 - Mar 2025 </option>
                <option value="" selected hidden disabled>Apr 2025 - Mar 2026 </option> -->
            </select>
        </div>
        <div class="my-6 widget-card">
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4 lg:grid-cols-4">
                <div class="p-2 text-center border-l-4 rounded-lg tw-card bg-orange-50 border-l-orange-400">
                    <p class="mb-2 text-ash-medium f-13 ">Declared Amount </p>
                    <h6 class="mb-0 text-base font-semibold text-gray-500">{{ investmentStore.taxSavingInvestments.max_limit }}</h6>
                </div>
                <div class="p-2 text-center border-l-4 rounded-lg tw-card bg-indigo-50 border-l-indigo-400">
                    <p class="mb-2 text-ash-medium f-13 ">Approved Amount</p>
                    <h6 class="mb-0 text-base font-semibold text-gray-500">{{ investmentStore.taxSavingInvestments.declared_amt }}</h6>
                </div>

                <div class="p-2 text-center border-l-4 rounded-lg tw-card bg-green-50 border-l-green-400 ">
                    <p class="mb-2 text-ash-medium f-13 ">Status</p>
                    <h6 class="mb-0 text-base font-semibold text-gray-500">{{ investmentStore.taxSavingInvestments.status }}</h6>
                </div>
                <div class="p-2 text-center border-l-4 rounded-lg tw-card bg-violet-50 border-l-violet-400">
                    <p class="mb-2 text-ash-medium f-13 ">Late Date For Submission</p>
                    <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                </div>
            </div>
        </div>
    </div>

</template>


<script setup>
import {investmentMainStore} from '../../../stores/investmentMainStore'
const investmentStore = investmentMainStore()
</script>


