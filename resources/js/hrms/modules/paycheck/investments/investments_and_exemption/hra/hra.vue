<template>
    <div class="mb-4 tw-card bg-gray-50">

        <strong>table</strong>
        <!-- <thead>
             <tr>
                
                                            <th scope="col">Sections</th>
                                            <th scope="col">Particulars</th>
                                            <th scope="col">References</th>
                                            <th scope="col">Max Limit</th>
                                            <th scope="col">Declaration Amount</th>
                                            {{-- <th scope="col">Proofs</th>

                                                <th scope="col">Status</th> --}}
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead> -->

    </div>

    <div class="tw-card bg-gray-50">
        <div class="flex justify-between mb-3">
            <span class="text-lg font-semibold text-indigo-950">Rental Property</span> <button
                class="btn btn-border-orange" @click="visible =true"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                Add Rented</button>
        </div>

        <div class="mb-3 col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12">
            <div class="mb-3 table-responsive">
                <!-- <thead>
                    <tr>
                        <th scope="col">Landlord Name</th>
                        <th scope="col">Landlord PAN</th>
                        <th scope="col">From Month</th>
                        <th scope="col">To Month</th>
                        <th scope="col">City</th>
                        <th scope="col">Total Rent</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead> -->

            </div>
        </div>

    </div>
    <div class="my-3 text-end">
        <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button>
        <button
            class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button>
    </div>

    <Dialog v-model:visible="visible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">

        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Rental </span>

        </template>

        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">

            <div class="">
                <label for="rentFrom_month" class="block mb-2 font-medium text-gray-900 ">From
                    Month</label>
                <input type="date" id="rentFrom_month"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="toFrom_month" class="block mb-2 font-medium text-gray-900 ">To
                    Month</label>
                <input type="date" id="toFrom_month
                                                    "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="metro_city" class="block mb-2 font-medium text-gray-900 ">City</label>
                <!-- {{-- <input type="text" id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required> --}} -->
                <select id="metro_city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected disabled hiddedn>Choose Metro</option>
                    <option>Chennai</option>
                    <option>Mumbai</option>
                    <option>Hyderabad</option>
                    <option>Kolkatta</option>
                    <option>Other Non Metro</option>

                </select>
            </div>
            <div class="">
                <label for="rendPaid_inp" class="block mb-2 font-medium text-gray-900 ">Total
                    Rent Paid</label>
                <input type="text" id="rendPaid_inp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>

        </div>
        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Landlord
                    Name <span class="text-red-600">*</span> </label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Landlord
                    PAN <span class="text-red-600">*</span> </label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
        </div>
        <div class="grid mb-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1">
            <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">
                Address </label>
            <textarea name="" id="" rows="3"
                class="bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required></textarea>
        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
        </div>
    </Dialog>
</template>


<script setup>
import { ref } from "vue";



const visible = ref(false)

</script>