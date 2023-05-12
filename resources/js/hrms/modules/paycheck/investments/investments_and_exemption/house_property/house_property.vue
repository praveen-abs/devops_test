<template>
    <!-- <ul class="mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist">
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
    </ul> -->

    <!-- {{ investmentStore.house_props_data }} -->

    <div class="tab-content " id="">
        <div class="tab-pane fade active show" id="self_occupied_property" role="tabpanel" aria-labelledby="">

            <!-- Table Header -->

            <!-- <th scope="col">Lender Name</th>
            <th scope="col">Lender PAN</th>
            <th scope="col">Lender Type</th>
            <th scope="col">Loss From Housing Property</th>
            <th scope="col">Action</th> -->



            <div class="text-end">
                <button @click="investmentStore.dailog_SelfOccupiedProperty = true"
                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                    New</button>
            </div>
{{ investmentStore.housePropertySource }}
            <div class=" table-responsive">
                <DataTable ref="dt" dataKey="id" rowGroupMode="rowspan" groupRowsBy="property_type" sortMode="single"
                    :sortOrder="+1" sortField="property_type" :paginator="true" :rows="10" scrollable 
                    :value="investmentStore.housePropertySource"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">


                    <Column header="Property Type" field="property_type" style="min-width: 15rem" frozen >
                        <template #body="slotProps">
                            <div v-if="slotProps.data.property_type == 'Deemed Let Out Property'">
                                <span class="text-lg font-bold text-red-400">{{ slotProps.data.property_type }}</span>
                            </div>
                            <div v-if="slotProps.data.property_type == 'Self Occupied Property'">
                                <span class="text-lg font-bold text-blue-500">{{ slotProps.data.property_type }}</span>
                            </div>
                            <div v-if="slotProps.data.property_type == 'Let Out Property'">
                                <span class="text-lg font-bold text-green-500">{{ slotProps.data.property_type }}</span>
                            </div>

                        </template>
                    </Column>

                    <Column header="Lender Name" field="lender_name" style="min-width: 12rem"  >
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="lender_pan" header="Lender PAN" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="lender_type" header="Lender Type " style="min-width: 12rem">
                        <template #body="slotProps">

                            <p v-if="slotProps.data.lender_type == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data.lender_type }}
                            </p>
                        </template>
                    </Column>

                    <Column field="loss_from_housing_property" header="Loss From Housing Property" style="min-width: 18rem">
                        <template #body="slotProps">

                            <p v-if="slotProps.data.loss_from_housing_property == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data.loss_from_housing_property }}
                            </p>
                        </template>
                    </Column>
                    <Column field="rent_received" header="Rent Received" style="min-width: 12rem" >
                        <template #body="slotProps">
                            <p v-if="slotProps.data.rent_received == ''">
                                -
                            </p>
                            <p v-else>
                                <!-- {{ slotProps.data.rent_received }} -->
                            </p>
                        </template>
                    </Column>
                    <Column field="maintenance" header="Maintenace" style="min-width: 12rem" >
                        <template #body="slotProps">

                            <p v-if="slotProps.data.maintenance == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data.maintenance }}
                            </p>
                        </template>
                    </Column>

                    <Column field="net_value" header="Net Value" style="min-width: 12rem"  >
                        <template #body="slotProps">

                            <p v-if="slotProps.data.net_value == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data.net_value }}
                            </p>
                        </template>
                    </Column>
                    <Column field="interest" header="Interest" style="min-width: 12rem" >
                        <template #body="slotProps">

                            <p v-if="slotProps.data.interest == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data.interest }}
                            </p>
                        </template>
                    </Column>
                    <Column field="income_loss" header="Income/Loss"  style="min-width: 12rem">
                        <template #body="slotProps">

                            <p v-if="slotProps.data.income_loss == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data.income_loss }}
                            </p>
                        </template>
                    </Column>



                    <Column field="" header="Action" style="min-width: 12rem"  >

                        <template #body="slotProps">
                            <button class="m-auto bg-transparent border-0 outline-none " type="button" aria-haspopup="true"
                                @click="toggle" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>

                            <Button icon="pi pi-pencil" outlined rounded severity="danger"
                                @click="investmentStore.editHraNewRental(slotProps.data)" />



                            <OverlayPanel ref="op" class="p-4">
                                <div class="p-3 mx-4">
                                    <button class="py-4 my-4" @click="investmentStore.editHraNewRental"><i
                                            class="py-2 my-4 fa fa-pencil-square-o text-info me-2" aria-hidden="true"></i>
                                        Edit</button>
                                    <button class=""><i class="my-4 fa fa-times-circle-o text-danger me-2"
                                            aria-hidden="true"></i> Clear</button>
                                </div>
                            </OverlayPanel>


                        </template>
                    </Column>
                </DataTable>

            </div>

        </div>

        <div class="my-3 text-end">
        <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
        <button class="px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
            @click="investmentStore.investment_exemption_steps--">Previous</button>
        <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
            @click="investmentStore.investment_exemption_steps++">Next</button>
    </div>

    <Dialog v-model:visible="investmentStore.dailog_SelfOccupiedProperty" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>

            <h6 class="mb-1 modal-title text-primary">House Property Type</h6>
            <Dropdown class="w-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                v-model="property_type" :options="property_types" optionLabel="name" optionValue="code"
                placeholder="Select a Property" />
        </template>


        <!-- SOP -->

        <div v-if="property_type == 'Self Occupied Property'">
            <div
                class="grid my-4 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">
                <div class="">
                    <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                        Name</label>
                    <input type="text" id="lender_name" v-model="investmentStore.sop.lender_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                        PAN</label>
                    <input type="text" id="lender_name" v-model="investmentStore.sop.lender_pan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>



                <div class="">

                    <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                        Type</label>
                    <Dropdown class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        v-model="investmentStore.sop.lender_type" :options="lender_types" optionLabel="name"
                        optionValue="code" placeholder="Select a Property" />
                    <!-- <select id="lender_type" v-model="investmentStore.sop.lender_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Type</option>
                        <option>Others</option>
                        <option>Financial Institution</option>

                    </select> -->
                </div>
                <div class="">
                    <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Loss
                        From Housing Property</label>
                    <input type="text" id="lender_name" v-model="investmentStore.sop.loss_from_housing_property"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
            </div>
            <div
                class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1">
                <div class="">
                    <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">
                        Address</label>
                    <!-- {{-- <input type="text" id="lender_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required> --}} -->
                    <textarea name="" id="" rows="3" v-model="investmentStore.sop.address"
                        class="bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required></textarea>
                </div>
            </div>
            <div class="text-end">
                <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                    @click="investmentStore.saveSelfOccupiedProperty">Save</button>
            </div>

        </div>


        <!-- LOP -->

        <div v-if="property_type == 'Let Out Property'">

            <div
                class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
                <div class="">
                    <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                        Name</label>
                    <input type="text" id="lender_name" v-model="investmentStore.lop.lender_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="lender_pan" class="block mb-2 font-medium text-gray-900 ">Lender
                        PAN</label>
                    <input type="text" id="lender_pan" v-model="investmentStore.lop.lender_pan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>


                <div class="">

                    <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                        Type</label>
                    <Dropdown class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        v-model="investmentStore.lop.lender_type" :options="lender_types" optionLabel="name"
                        optionValue="code" placeholder="Select a Property" />
                    <!-- <select id="lender_type" v-model="investmentStore.lop.lender_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Type</option>
                        <option>Others</option>
                        <option>Financial Institution</option>

                    </select> -->
                </div>

                <div class="">
                    <label for="rend_received" class="block mb-2 font-medium text-gray-900 ">Rent
                        Received</label>
                    <input type="text" id="rend_received" v-model="investmentStore.lop.rent_received"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">

                    <label for="municipal_tax" class="block mb-2 font-medium text-gray-900 ">Municipal
                        Tax</label>

                    <input type="text" id="municipal_tax" v-model="investmentStore.lop.municipal_tax"
                        @input="investmentStore.income_loss_calculation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="maintenance" class="block mb-2 font-medium text-gray-900">Maintenance</label>
                    <input type="text" id="maintenance" v-model="investmentStore.lop.maintenance" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        <span class="text-sm font-semibold text-gray-500">(Auto-calculated)</span>
                </div>
                <div class="">
                    <label for="Net_Value" class="block mb-2 font-medium text-gray-900 ">Net
                        Value</label>
                    <input type="text" id="Net_Value" v-model="investmentStore.lop.net_value" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                        required>
                        <span class="text-sm font-semibold text-gray-500">(Auto-calculated)</span>
                </div>
                <div class="">
                    <label for="Interest" class="block mb-2 font-medium text-gray-900 ">Interest</label>
                    <input type="text" id="Interest" v-model="investmentStore.lop.interest"
                        @input="investmentStore.income_loss_calculation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        
                </div>
                <div class="">
                    <label for="Income/Loss" class="block mb-2 font-medium text-gray-900 ">Income/Loss</label>
                    <input type="text" id="Income/Loss" v-model="investmentStore.lop.income_loss" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        <span class="text-sm font-semibold text-gray-500">(Auto-calculated)</span>
                </div>
            </div>
            <div class="text-end">
                <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                    @click="investmentStore.saveLetOutProperty">Save</button>
            </div>

        </div>


        <!-- DLOP -->

        <div v-if="property_type == 'Deemed Let Out Property'">
            <div
                class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
                <div class="">
                    <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                        Name</label>
                    <input type="text" id="lender_name" v-model="investmentStore.dlop.lender_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="lender_pan" class="block mb-2 font-medium text-gray-900 ">Lender
                        PAN</label>
                    <input type="text" id="lender_pan" v-model="investmentStore.dlop.lender_pan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>


                <div class="">

                    <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                        Type</label>
                    <Dropdown class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        v-model="investmentStore.dlop.lender_type" :options="lender_types" optionLabel="name"
                        optionValue="code" placeholder="Select a Property" />
                
                </div>

                <div class="">
                    <label for="rend_received" class="block mb-2 font-medium text-gray-900 ">Rent
                        Received</label>
                    <input type="text" id="rend_received" v-model="investmentStore.dlop.rent_received"
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
                    <input type="text" id="municipal_tax" v-model="investmentStore.dlop.municipal_tax"  @input="investmentStore.income_loss_calculation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="maintenance" class="block mb-2 font-medium text-gray-900 ">Maintenance</label>
                    <input type="text" id="maintenance" v-model="investmentStore.dlop.maintenance" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        <span class="text-sm font-semibold text-gray-500">(Auto-calculated)</span>
                </div>
                <div class="">
                    <label for="Net_Value" class="block mb-2 font-medium text-gray-900 ">Net
                        Value</label>
                    <input type="text" id="Net_Value" v-model="investmentStore.dlop.net_value" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                        required>
                        <span class="text-sm font-semibold text-gray-500">(Auto-calculated)</span>
                </div>
                <div class="">
                    <label for="Interest" class="block mb-2 font-medium text-gray-900 ">Interest</label>
                    <input type="text" id="Interest" v-model="investmentStore.dlop.interest"  @input="investmentStore.income_loss_calculation"                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="Income/Loss" class="block mb-2 font-medium text-gray-900 ">Income/Loss</label>
                    <input type="text" id="Income/Loss" v-model="investmentStore.dlop.income_loss" readonly 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        <span class="text-sm font-semibold text-gray-500">(Auto-calculated)</span>
                </div>
            </div>
            <div class="text-end">
                <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                    @click="investmentStore.saveDeemedLetOutProperty">Save</button>
            </div>

        </div>


    </Dialog>


    <!-- Code End -->


    <!-- Don't Delete below   -->



        
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

            <div class="text-end">
                <button @click="investmentStore.dailog_LetOutProperty = true"
                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                    New</button>
            </div>

            <div class="table-responsive">
                <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="investmentStore.house_props_data"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Lender Name" field="lender_name" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="lender_pan" header="Lender PAN" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="lender_type" header="Lender Type " style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>
                    <Column field="rent_received" header="Rent Received" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>
                    <Column field="maintenance" header="Maintenace" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>

                    <Column field="net_value" header="Net Value" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>
                    <Column field="interest" header="Interest" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>
                    <Column field="income_loss" header="Income/Loss" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>



                    <Column field="" header="Action" style="min-width: 12rem">

                        <template #body="slotProps">
                            <button class="m-auto bg-transparent border-0 outline-none " type="button" aria-haspopup="true"
                                @click="toggle" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>

                            <Button icon="pi pi-pencil" outlined rounded severity="danger"
                                @click="investmentStore.editHraNewRental(slotProps.data)" />



                            <OverlayPanel ref="op" class="p-4">
                                <div class="p-3 mx-4">
                                    <button class="py-4 my-4" @click="investmentStore.editHraNewRental"><i
                                            class="py-2 my-4 fa fa-pencil-square-o text-info me-2" aria-hidden="true"></i>
                                        Edit</button>
                                    <button class=""><i class="my-4 fa fa-times-circle-o text-danger me-2"
                                            aria-hidden="true"></i> Clear</button>
                                </div>
                            </OverlayPanel>


                        </template>
                    </Column>
                </DataTable>


            </div>


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

            <div class="text-end">
                <button @click="investmentStore.dailog_DeemedLetOutProperty = true"
                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                    New</button>
            </div>

            <div class="table-responsive">
                <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="investmentStore.house_props_data"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Lender Name" field="lender_name" style="min-width: 8rem">
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="lender_pan" header="Lender PAN" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="lender_type" header="Lender Type " style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>
                    <Column field="rent_received" header="Rent Received" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>
                    <Column field="maintenance" header="Maintenace" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>

                    <Column field="net_value" header="Net Value" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>
                    <Column field="interest" header="Interest" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>
                    <Column field="income_loss" header="Income/Loss" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>



                    <Column field="" header="Action" style="min-width: 12rem">

                        <template #body="slotProps">
                            <button class="m-auto bg-transparent border-0 outline-none " type="button" aria-haspopup="true"
                                @click="toggle" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>

                            <Button icon="pi pi-pencil" outlined rounded severity="danger"
                                @click="investmentStore.editHraNewRental(slotProps.data)" />



                            <OverlayPanel ref="op" class="p-4">
                                <div class="p-3 mx-4">
                                    <button class="py-4 my-4" @click="investmentStore.editHraNewRental"><i
                                            class="py-2 my-4 fa fa-pencil-square-o text-info me-2" aria-hidden="true"></i>
                                        Edit</button>
                                    <button class=""><i class="my-4 fa fa-times-circle-o text-danger me-2"
                                            aria-hidden="true"></i> Clear</button>
                                </div>
                            </OverlayPanel>


                        </template>
                    </Column>
                </DataTable>


            </div>


        </div>
    </div>






    <!-- <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
        Let Out Property</button>
    <button  class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
        Deemed Let Out Property</button> -->



   

    <!-- 
    <Dialog v-model:visible="investmentStore.dailog_LetOutProperty" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Let Out Property</h6>
        </template>


        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                    Name</label>
                <input type="text" id="lender_name" v-model="investmentStore.lop.lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="lender_pan" class="block mb-2 font-medium text-gray-900 ">Lender
                    PAN</label>
                <input type="text" id="lender_pan" v-model="investmentStore.lop.lender_pan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>


            <div class="">

                <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                    Type</label>
                <select id="lender_type" v-model="investmentStore.lop.lender_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose Type</option>
                    <option>Others</option>
                    <option>Financial Institution</option>

                </select>
            </div>

            <div class="">
                <label for="rend_received" class="block mb-2 font-medium text-gray-900 ">Rent
                    Received</label>
                <input type="text" id="rend_received" v-model="investmentStore.lop.rent_received"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">

                <label for="municipal_tax" class="block mb-2 font-medium text-gray-900 ">Municipal
                    Tax</label>

                <input type="text" id="municipal_tax" v-model="investmentStore.lop.municipal_tax"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="maintenance" class="block mb-2 font-medium text-gray-900 ">Maintenance</label>
                <input type="text" id="maintenance" v-model="investmentStore.lop.maintenance"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Net_Value" class="block mb-2 font-medium text-gray-900 ">Net
                    Value</label>
                <input type="text" id="Net_Value" v-model="investmentStore.lop.net_value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Interest" class="block mb-2 font-medium text-gray-900 ">Interest</label>
                <input type="text" id="Interest" v-model="investmentStore.lop.interest"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Income/Loss" class="block mb-2 font-medium text-gray-900 ">Income/Loss</label>
                <input type="text" id="Income/Loss" v-model="investmentStore.lop.income_loss"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                @click="investmentStore.saveLetOutProperty">Save</button>
        </div>
        </div>
       


    </Dialog>


    <Dialog v-model:visible="investmentStore.dailog_DeemedLetOutProperty" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Deemed Let Out Property</h6>
        </template>

        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Lender
                    Name</label>
                <input type="text" id="lender_name" v-model="investmentStore.dlop.lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="lender_pan" class="block mb-2 font-medium text-gray-900 ">Lender
                    PAN</label>
                <input type="text" id="lender_pan" v-model="investmentStore.dlop.lender_pan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>


            <div class="">

                <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                    Type</label>
                <select id="lender_type" v-model="investmentStore.dlop.lender_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose Type</option>
                    <option>Others</option>
                    <option>Financial Institution</option>

                </select>
            </div>

            <div class="">
                <label for="rend_received" class="block mb-2 font-medium text-gray-900 ">Rent
                    Received</label>
                <input type="text" id="rend_received" v-model="investmentStore.dlop.rent_received"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">

                <label for="municipal_tax" class="block mb-2 font-medium text-gray-900 ">Municipal
                    Tax</label>
              
                <input type="text" id="municipal_tax" v-model="investmentStore.dlop.municipal_tax"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="maintenance" class="block mb-2 font-medium text-gray-900 ">Maintenance</label>
                <input type="text" id="maintenance" v-model="investmentStore.dlop.maintenance"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Net_Value" class="block mb-2 font-medium text-gray-900 ">Net
                    Value</label>
                <input type="text" id="Net_Value" v-model="investmentStore.dlop.net_value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Interest" class="block mb-2 font-medium text-gray-900 ">Interest</label>
                <input type="text" id="Interest" v-model="investmentStore.dlop.interest"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
            <div class="">
                <label for="Income/Loss" class="block mb-2 font-medium text-gray-900 ">Income/Loss</label>
                <input type="text" id="Income/Loss" v-model="investmentStore.dlop.income_loss"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
            </div>
        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                @click="investmentStore.saveDeemedLetOutProperty">Save</button>
        </div>



    </Dialog> -->
</template>


<script setup>
import { onMounted, ref } from "vue";
import { investmentMainStore } from "../../../stores/investmentMainStore";


const investmentStore = investmentMainStore()

const property_type = ref();
const property_types = ref([
    { name: 'Self Occupied Property', code: 'Self Occupied Property' },
    { name: 'Let Out Property', code: 'Let Out Property' },
    { name: 'Deemed Let Out Property', code: 'Deemed Let Out Property' },

]);
const lender_types = ref([
    { name: 'Financial Institution', code: 'Financial Institution' },
    { name: 'Others', code: 'Others' },

]);

onMounted(() => {
    investmentStore.fetchSelfOccupiedProperty()
})
</script>