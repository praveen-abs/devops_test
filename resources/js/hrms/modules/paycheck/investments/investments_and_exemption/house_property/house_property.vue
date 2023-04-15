<template>
    <ul class="mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
        <li class="nav-item " role="presentation">
            <a class="mx-4 nav-link active " id="" data-bs-toggle="pill" href="" data-bs-target="#self_occupied_property"
                role="tab" aria-controls="" aria-selected="true">
                Self Occupied Property
            </a>
        </li>

        <li class="nav-item " role="presentation">
            <a class="mx-4 nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#letOut_property" role="tab"
                aria-controls="" aria-selected="true">
                Let Out Property
            </a>
        </li>
        <li class="nav-item " role="presentation">
            <a class="mx-4 nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#deemed_property" role="tab"
                aria-controls="" aria-selected="true">
                Deemed Let Out Property
            </a>
        </li>
    </ul>

    <div class="tab-content " id="">
        <div class="tab-pane fade active show" id="self_occupied_property" role="tabpanel" aria-labelledby="">
            <!-- Table Header -->

            <!-- <th scope="col">Lender Name</th>
            <th scope="col">Lender PAN</th>
            <th scope="col">Lender Type</th>
            <th scope="col">Loss From Housing Property</th>
            <th scope="col">Action</th> -->
            
        </div>
        <div class="tab-pane fade " id="letOut_property" role="tabpanel" aria-labelledby="">

            <!-- Table Header -->

            <!-- <th scope="col">Lender Name</th>
            <th scope="col">Lender PAN</th>
            <th scope="col">Lender Type</th>
            <th scope="col">Rent Received</th>
            <th scope="col">Municipal Tax</th>
            <th scope="col">Maintenace</th>
            <th scope="col">Net Value</th>
            <th scope="col">Interest</th>
            <th scope="col">Income/Loss</th>
            <th scope="col">Action</th> -->


        </div>
        <div class="tab-pane fade " id="deemed_property" role="tabpanel" aria-labelledby="">

            <!-- Table Header -->

            <!-- <th scope="col">Lender Name</th>
            <th scope="col">Lender PAN</th>
            <th scope="col">Lender Type</th>
            <th scope="col">Rent Received</th>
            <th scope="col">Municipal Tax</th>
            <th scope="col">Maintenace</th>
            <th scope="col">Net Value</th>
            <th scope="col">Interest</th>
            <th scope="col">Income/Loss</th>
            <th scope="col">Action</th> -->


        </div>
    </div>





    <button @click="visible = true" class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
        Self Occupied Property</button>
    <button @click="visible1 = true" class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
        Let Out Property</button>
    <button @click="visible2 = true" class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
        Deemed Let Out Property</button>



    <div class="my-3 text-end">
        <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
        <button
            class="px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Previous</button>
        <button
            class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button>
    </div>

    <Dialog v-model:visible="visible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Self Occupied Property</h6>

        </template>
        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                    Name</label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                    PAN</label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>



            <div class="">

                <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                    Type</label>
                <select id="lender_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose Type</option>
                    <option>Others</option>
                    <option>Financial Institution</option>

                </select>
            </div>
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Loss
                    From Housing Property</label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
        </div>
        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">
                    Address</label>
                <!-- {{-- <input type="text" id="lender_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required> --}} -->
                <textarea name="" id="" rows="3"
                    class="bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required></textarea>
            </div>
        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
        </div>

    </Dialog>


    <Dialog v-model:visible="visible1" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Let Out Property</h6>
        </template>


        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                    Name</label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="lender_pan" class="block mb-2 font-medium text-gray-900 ">Lender
                    PAN</label>
                <input type="text" id="lender_pan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>


            <div class="">

                <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                    Type</label>
                <select id="lender_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose Type</option>
                    <option>Others</option>
                    <option>Financial Institution</option>

                </select>
            </div>

            <div class="">
                <label for="rend_received" class="block mb-2 font-medium text-gray-900 ">Rent
                    Received</label>
                <input type="text" id="rend_received"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">

                <label for="municipal_tax" class="block mb-2 font-medium text-gray-900 ">Municipal
                    Tax</label>

                <input type="text" id="municipal_tax"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="maintenance" class="block mb-2 font-medium text-gray-900 ">Maintenance</label>
                <input type="text" id="maintenance"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Net_Value" class="block mb-2 font-medium text-gray-900 ">Net
                    Value</label>
                <input type="text" id="Net_Value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Interest" class="block mb-2 font-medium text-gray-900 ">Interest</label>
                <input type="text" id="Interest"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Income/Loss" class="block mb-2 font-medium text-gray-900 ">Income/Loss</label>
                <input type="text" id="Income/Loss"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
        </div>


    </Dialog>


    <Dialog v-model:visible="visible2" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Deemed Let Out Property</h6>
        </template>

        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                    Name</label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="lender_pan" class="block mb-2 font-medium text-gray-900 ">Lender
                    PAN</label>
                <input type="text" id="lender_pan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>


            <div class="">

                <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                    Type</label>
                <select id="lender_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose Type</option>
                    <option>Others</option>
                    <option>Financial Institution</option>

                </select>
            </div>

            <div class="">
                <label for="rend_received" class="block mb-2 font-medium text-gray-900 ">Rent
                    Received</label>
                <input type="text" id="rend_received"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">

                <label for="municipal_tax" class="block mb-2 font-medium text-gray-900 ">Municipal
                    Tax</label>
                <!-- {{ -- < select id = "municipal_tax"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " >
                    <option selected > Choose Municipal < /option>

                        < /select> --}} -->
                <input type="text" id="municipal_tax"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="maintenance" class="block mb-2 font-medium text-gray-900 ">Maintenance</label>
                <input type="text" id="maintenance"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Net_Value" class="block mb-2 font-medium text-gray-900 ">Net
                    Value</label>
                <input type="text" id="Net_Value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Interest" class="block mb-2 font-medium text-gray-900 ">Interest</label>
                <input type="text" id="Interest"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Income/Loss" class="block mb-2 font-medium text-gray-900 ">Income/Loss</label>
                <input type="text" id="Income/Loss"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
        </div>



    </Dialog>
</template>


<script setup>
import { ref } from "vue";

const visible = ref(false)
const visible1 = ref(false)
const visible2 = ref(false)

</script>