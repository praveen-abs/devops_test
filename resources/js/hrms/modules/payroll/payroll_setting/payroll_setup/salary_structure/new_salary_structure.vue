<template>
    <div class="w-full">
        <div class="mx-6 py-6">
            <p class="text-gray-00 font-semibold fs-4 ">New Salary Structure</p>
            <p class="text-gray-500 font-semibold fs-6">Create custom salary package by selecting the relevant components
                and configuring their corresponding
                calculation </p>
        </div>
        <div class="flex">
            <div class="w-5">
                <p class="text-gray-700 font-semibold fs-5 mx-6">Structure Details</p>
                <div class="p-4 my-2 mx-6 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                    <div class="">
                        <label for="metro_city" class="block mb-2  text-gray-700 font-semibold fs-6">Structure Name</label>
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
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the option
                                for provident fund (PF)
                                contributions</p>
                        </div>
                        <div class="flex my-5">
                            <input type="checkbox" name="" id="" style="height: 20px;width: 20px;" class="form-check-input">
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the coverage
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
                            <p class="mx-3 text-gray-800 font-semibold fs-6">This salary is eligible for flexible benefit
                                plan(FBP)</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full mr-4">
                <div class="flex justify-between">
                    <p class="text-gray-700 font-semibold fs-6">Salary Components</p>
                    <button class="btn btn-orange w-4">Add Components</button>
                </div>
                <div class="my-2 ">
                    <DataTable :value="products">
                        <Column field="product" header="Code"></Column>
                        <Column field="lastYearSale" header="Name"></Column>
                        <Column field="thisYearSale" header="Category"></Column>
                    </DataTable>
                </div>
            </div>
        </div>
        <div class="float-right">
            <div class="flex">
                <button @click=" visbile = false" class="btn btn-orange-outline">Cancel</button>
                <button class="btn btn-orange mx-2">Save</button>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import { ref, onMounted } from "vue";

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
  