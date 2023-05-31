<template>
    <div class="mb-3 tw-card">
        <div class="flex items-center justify-between mb-3">
            <h6 class="text-2xl font-semibold ">Tax Saving Investment </h6>
            <select name="" id="" class="w-1/6 border-orange form-select disabled_focus">
                <option value="" selected hidden disabled>Apr 2023 - Mar 2024 </option>
                <!-- <option value="" selected hidden disabled>Apr 2024 - Mar 2025 </option>
                <option value="" selected hidden disabled>Apr 2025 - Mar 2026 </option> -->
            </select>
        </div>
        <div class="my-6 widget-card">
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4 lg:grid-cols-4">
                <div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400">
                    <p class="mb-2 font-semibold fs-6 ">Declared Amount </p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>
                <div class="p-2 text-center bg-indigo-100 border-l-4 rounded-lg tw-card border-l-indigo-400">
                    <p class="mb-2 font-semibold fs-6 ">Approved Amount</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>

                <div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400 ">
                    <p class="mb-2 font-semibold fs-6 ">Status</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>
                <div class="p-2 text-center border-l-4 rounded-lg tw-card bg-violet-100 border-l-violet-400">
                    <p class="mb-2 font-semibold fs-6 ">Late Date For Submission</p>
                    <h6 class="text-lg font-bold">INR 0</h6>
                </div>
            </div>
        </div>
    </div>

</template>


<script setup>
import {investmentMainStore} from '../../../stores/investmentMainStore'
const investmentStore = investmentMainStore()
</script>


