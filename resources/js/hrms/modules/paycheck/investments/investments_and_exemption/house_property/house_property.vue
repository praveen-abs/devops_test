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

    <!-- {{ investmentStore.housePropertySource }} -->

    <div class="tab-content " id="">
        <div class="tab-pane fade active show" id="self_occupied_property" role="tabpanel" aria-labelledby="">

            <div class="table-responsive">
                <DataTable resizableColumns columnResizeMode="expand" ref="dt" dataKey="fs_id" :paginator="true" :rows="25"
                    :value="investmentStore.housePropertySource" editMode="row"
                    v-model:editingRows="investmentStore.editingRowSource"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]" @row-edit-save="onRowEditSave" tableClass="editable-cells-table"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Sections" field="section" style="min-width: 8rem">
                    </Column>

                    <Column field="particular" header="Particulars" style="min-width: 12rem">
                
                    </Column>

                    <Column field="reference" header="References " style="min-width: 12rem">
                        <template #body="slotProps">
                            <button type="button" class="border-0 outline-none btn btn-transprarent"
                                v-tooltip="slotProps.data.reference">
                                <i class="fa fa-exclamation-circle text-warning" aria-hidden="true"></i>
                            </button>
                        </template>
                    </Column>

                    <!-- <Column field="max_amount" header="Max Limit" style="min-width: 12rem">
                        <template #body="slotProps">
                            {{ investmentStore.formatCurrency(slotProps.data.max_amount) }}
                        </template>
                    </Column> -->

                    <Column field="dec_amount" header="Declaration Amount" style="min-width: 12rem">
                        <template #body="slotProps">
                            
                            <div v-if="slotProps.data.particular == 'Self Occupied Property'">
                                <div v-if="slotProps.data.json_popups_value">
                                    {{slotProps.data['json_popups_value'].fs_id}}                          
                                </div>
                                <div v-else>
                                    <button @click="investmentStore.getSopSlotData(slotProps.data)"
                                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                                    New</button>
                                </div>                       
                            </div>
                            <div v-else-if="slotProps.data.particular == 'Let Out Property'">
                                <div v-if="slotProps.data.json_popups_value">
                                    {{slotProps.data['json_popups_value'].fs_id}}                          
                                </div>
                                <div v-else>
                                    <button @click="investmentStore.getLopSlotData(slotProps.data)"
                                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                                    New</button>
                                </div>
                             
                            </div>
                            <div v-else-if="slotProps.data.particular == 'Deemed Let Out Property'">
                                <div v-if="slotProps.data.json_popups_value">
                                    {{slotProps.data['json_popups_value'].fs_id}}                          
                                </div>
                                <div v-else>
                                    <button @click="investmentStore.getDlopSlotData(slotProps.data)"
                                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                                    New</button>
                                </div>
                              
                            </div>
                            <div v-else-if="slotProps.data.dec_amount" class="dec_amt">
                                {{ investmentStore.formatCurrency(slotProps.data.dec_amount) }}
                            </div>


                        </template>
                        <template #editor="{ data, field }">
                            <InputNumber v-model="data[field]" mode="currency" currency="INR" locale="en-US"
                                class="w-5 text-lg font-semibold" />
                        </template>

                    </Column>

                    <Column field="status" header="Status" style="min-width: 12rem">
                        <template #body="slotProps">
                            <div v-if="slotProps.data.dec_amount">
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20">Completed</span>
                            </div>
                            <div v-else>
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20">Pending</span>
                            </div>
                        </template>
                    </Column>
                    <Column :rowEditor="true" style="width: 10%; min-width: 8rem" bodyStyle="text-align:center"
                        header="Action">
                    </Column>
                </DataTable>

            </div>


            <!-- 
            <div class="text-end">
                <button @click="investmentStore.dailog_SelfOccupiedProperty = true"
                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                    New</button>
                <button @click="investmentStore.dailog_LetOutProperty = true"
                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                    New</button>
                <button @click="investmentStore.dailog_DeemedLetOutProperty = true"
                    class="px-4 py-2 mb-3 text-center text-white bg-indigo-600 rounded-md">Add
                    New</button>
            </div> -->
            <!-- {{ investmentStore.housePropertySource}} -->
            
            <div class=" table-responsive">
                <DataTable ref="dt" dataKey="id" rowGroupMode="rowspan" groupRowsBy="property_type" sortMode="single"
                    :sortOrder="+1" sortField="property_type" :paginator="true" :rows="10" scrollable
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">


                    <Column header="Property Type" field="property_type" style="min-width: 15rem" frozen>
                        <template #body="slotProps">
                        
                            <div v-if="slotProps.data.property_type == 'Deemed Let Out Property'">
                                <span class="text-lg font-bold text-red-400">{{ slotProps.data['json_popups_value'].property_type }}</span>
                            </div>
                            <div v-if="slotProps.data.property_type == 'Self Occupied Property'">
                                <span class="text-lg font-bold text-blue-500">{{ slotProps.data['json_popups_value'].property_type }}</span>
                            </div>
                            <div v-if="slotProps.data.property_type == 'Let Out Property'">
                                <span class="text-lg font-bold text-green-500">{{ slotProps.data['json_popups_value'].property_type }}</span>
                            </div>

                        </template>
                    </Column>

                    <Column header="Lender Name" field="lender_name" style="min-width: 12rem">
                        <template #body="slotProps">
                        <!-- {{  slotProps.data['json_popups_value'].lender_name }} -->
                      </template>
                    </Column>

                    <Column field="lender_pan" header="Lender PAN" style="min-width: 12rem">
                        <template #body="slotProps">
                            <!-- {{  slotProps.data['json_popups_value'].lender_pan }} -->
                      </template>
                    </Column>

                    <Column field="lender_type" header="Lender Type " style="min-width: 12rem">
                        <template #body="slotProps">

                            <!-- <p v-if="slotProps.data['json_popups_value'].lender_type == ''">
                                -
                            </p>
                            <p v-else>
                                {{  slotProps.data['json_popups_value'].lender_type }}
                            </p> -->
                        </template>
                    </Column>

                    <Column field="loss_from_housing_property" header="Loss From Housing Property" style="min-width: 18rem">
                        <template #body="slotProps">
                            <!-- <p v-if="slotProps.data['json_popups_value'].loss_from_housing_property == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data['json_popups_value'].loss_from_housing_property }}
                            </p>  -->
                        </template>
                    </Column>
                    <Column field="rent_received" header="Rent Received" style="min-width: 12rem">
                        <template #body="slotProps">
                            <!-- <p v-if="slotProps.data['json_popups_value'].rent_received == ''">
                                -
                            </p>
                            <p v-else>
                                {{slotProps.data['json_popups_value'].rent_received}}
                            </p> -->
                        </template>
                    </Column>
                    <Column field="maintenance" header="Maintenace" style="min-width: 12rem">
                        <template #body="slotProps">
                            <!-- <p v-if="slotProps.data['json_popups_value'].maintenance == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data['json_popups_value'].maintenance }}
                            </p> -->
                        </template>
                    </Column>

                    <Column field="net_value" header="Net Value" style="min-width: 12rem">
                        <template #body="slotProps">

                            <!-- <p v-if="slotProps.data['json_popups_value'].net_value == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data['json_popups_value'].net_value }}
                            </p> -->
                        </template>
                    </Column>
                    <Column field="interest" header="Interest" style="min-width: 12rem">
                        <template #body="slotProps">

                            <!-- <p v-if="slotProps.data['json_popups_value'].interest == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data['json_popups_value'].interest }}
                            </p> -->
                        </template>
                    </Column>
                    <Column field="income_loss" header="Income/Loss" style="min-width: 12rem">
                        <template #body="slotProps">

                            <!-- <p v-if="slotProps.data['json_popups_value'].income_loss == ''">
                                -
                            </p>
                            <p v-else>
                                {{ slotProps.data['json_popups_value'].income_loss }}
                            </p> -->
                        </template>
                    </Column>
                    <Column field="" header="Action" style="min-width: 12rem">
                        <template>
                            <button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-10 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>

                            </button>
                            <button class="p-2 bg-red-200 border-red-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-10 h-8 font-bold">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
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
                        <template>
                            <button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-10 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>

                            </button>
                            <button class="p-2 bg-red-200 border-red-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-10 h-8 font-bold">
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








    <Dialog v-model:visible="investmentStore.dailog_SelfOccupiedProperty" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Self Occupied Property</h6>
        </template>
        <div class="grid my-4 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">
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
                    v-model="investmentStore.sop.lender_type" :options="lender_types" optionLabel="name" optionValue="code"
                    placeholder="Select a Property" />
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
        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1">
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


    </Dialog>

    <Dialog v-model:visible="investmentStore.dailog_LetOutProperty" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Let Out Property</h6>
        </template>


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

        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                @click="investmentStore.saveLetOutProperty">Save</button>
        </div>



    </Dialog>


    <Dialog v-model:visible="investmentStore.dailog_DeemedLetOutProperty" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
        <template #header>
            <h6 class="mb-1 modal-title text-primary">Deemed Let Out Property</h6>
        </template>

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

    </Dialog>
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
    investmentStore.fetchPropertyType()
})
</script>