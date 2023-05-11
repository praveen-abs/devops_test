<template>
    <div class="mb-4 tw-card bg-gray-50">
        <!-- {{ investmentStore.hraSource }} -->
        <div class="table-responsive">
            <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="investmentStore.hraSource"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
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

                <Column field="max_amount" header="Max Limit" style="min-width: 12rem">
                </Column>

                <Column field="Declaration Amount" header="Declaration Amount" style="min-width: 12rem">
                    <template #body>
                        <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"
                            @click="investmentStore.dailogAddNewRental = true"><i class="fa fa-plus-circle me-2"
                                aria-hidden="true"></i>
                            Add Rented</button>
                    </template>
                </Column>
                <Column field="status" header="Status" style="min-width: 12rem">
                    <template #body="slotProps">
                        <div v-if="slotProps.data.status">
                            <Tag value="Completed" severity="success" />
                        </div>
                        <div v-else>
                            <Tag value="Pending" severity="warning" />
                        </div>
                    </template>
                </Column>
                <Column field="" header="Action" style="min-width: 12rem">
                    <template #body="slotProps">
                        <button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-10 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>

                        </button>
                        <button class="p-2 bg-red-200 border-red-500 rounded-xl"
                            @click="investmentStore.editHraNewRental(slotProps.data)">
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


    <div class="bg-gray-50 tw-card rounded-xl">
        <div class="flex justify-between mb-3">
            <span class="mx-4 my-2 mt-2 text-lg font-semibold text-indigo-950">Rental Property</span>
            <button class="my-3 mr-4 btn btn-border-orange" @click="investmentStore.dailogAddNewRental = true"><i
                    class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                Add Rented</button>
        </div>

        <div class="mb-3 col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12">
            <div class="mb-3 table-responsive">


                <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="investmentStore.hra_data"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Landlord Name" field="landlord_name" style="min-width: 8rem">
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="landlord_PAN" header="Landlord PAN" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="from_month" header="From Month " style="min-width: 12rem">
                        <template #body="slotProps">
                            {{ moment(slotProps.data.from_month).format('DD-MM-YYYY') }}
                        </template>
                    </Column>

                    <Column field="to_month" header="To Month" style="min-width: 12rem">
                        <template #body="slotProps">
                            {{ moment(slotProps.data.to_month).format('DD-MM-YYYY') }}
                        </template>
                    </Column>

                    <Column field="city" header="City" style="min-width: 12rem">
                        <template #body="slotProps">
                            {{ slotProps.data.reimbursment_remarks }}
                        </template>
                    </Column>
                    <Column field="total_rent_paid" header="Total Rent" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>
                    <Column field="" header="Action" style="min-width: 12rem">

                        <template #body="slotProps">
                            <!-- <button class="m-auto bg-transparent border-0 outline-none " type="button" aria-haspopup="true"
                                @click="toggle" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>

                            <Button icon="pi pi-pencil" outlined rounded severity="danger"
                                @click="investmentStore.editHraNewRental(slotProps.data)" />

                            <OverlayPanel ref="op">
                                <a class="dropdown-item"><i class="fa fa-pencil-square-o text-info me-2"
                                        aria-hidden="true"></i> Edit</a>
                                <a class="dropdown-item"><i class="fa fa-times-circle-o text-danger me-2"
                                        aria-hidden="true"></i> Clear</a>
                            </OverlayPanel> -->
                            <button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-10 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>

                            </button>
                            <button class="p-2 bg-red-200 border-red-500 rounded-xl"
                                @click="investmentStore.editHraNewRental(slotProps.data)">
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
    <div class="my-3 text-end">
        <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"
            @click="investmentStore.saveHRA">Save</button>
        <button @click="investmentStore.investment_exemption_steps++"
            class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button>
    </div>



    <Dialog v-model:visible="investmentStore.dailogAddNewRental" modal
        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">

        <template #header>
            <span class="text-lg font-semibold modal-title text-indigo-950">Add New Rental</span>

        </template>

        <div
            class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">

            <div class="">
                <label for="rentFrom_month" class="block mb-2 font-medium text-gray-900 ">From
                    Month</label>
                <input type="date" id="rentFrom_month"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    v-model="investmentStore.hra.from_month" required>
            </div>
            <div class="">
                <label for="toFrom_month" class="block mb-2 font-medium text-gray-900 ">To
                    Month</label>
                <input type="date" id="toFrom_month
                                                                                                    "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    v-model="investmentStore.hra.to_month" required>
            </div>
            <div class="">
                <label for="metro_city" class="block mb-2 font-medium text-gray-900 ">City</label>
                <!-- {{-- <input type="text" id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required> --}} -->
                <select id="metro_city" v-model="investmentStore.hra.city"
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
                    v-model="investmentStore.hra.total_rent_paid" required>
            </div>

        </div>
        <div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">
            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Landlord
                    Name <span class="text-red-600">*</span> </label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    v-model="investmentStore.hra.landlord_name" required>
            </div>

            <div class="">
                <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">Landlord
                    PAN <span class="text-red-600">*</span> </label>
                <input type="text" id="lender_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    v-model="investmentStore.hra.landlord_PAN" required>
            </div>

        </div>
        <div class="grid mb-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1">
            <label for="lender_name" class="block mb-2 font-medium text-gray-900 ">
                Address </label>
            <textarea name="" id="" rows="3"
                class="bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                v-model="investmentStore.hra.address" required></textarea>
        </div>
        <div class="text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                @click="investmentStore.saveHraNewRental">Save</button>
        </div>
    </Dialog>

    <Dialog header="Header" v-model:visible="investmentStore.canShowLoading"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
        :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>
</template>


<script setup>
import { onMounted } from "vue";
import { investmentMainStore } from "../../../stores/investmentMainStore";

import { ref } from "vue";
import moment from "moment";

const test = () => {
    alert("test")
}

const op = ref();
const toggle = (event) => {
    op.value.toggle(event);
}

const investmentStore = investmentMainStore()

onMounted(async () => {
    console.log(await investmentStore.hraSource);
})




</script>


<style  lang="scss">
.p-button.p-component.p-button-icon-only.p-datepicker-trigger {
    height: 100%;
}

.p-inputtext.p-component {
    border: 0.1px solid rgb(187, 187, 187);
    width: 100%;
}

span .p-calendar.p-component.p-inputwrapper.p-calendar-w-btn {
    margin-right: 25px !important;
}


.p-button .p-component .p-button-icon-only .p-datepicker-trigger>button {
    height: 100%;

}

// .main-content {
//     width: 85%;
// }

.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1rem 1rem;
    border: 1px solid #dee2e6;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-width: 0 0 1px 0;
    font-weight: 600;
    color: #fff;
    background: #003056;
    transition: box-shadow 0.2s;
    font-size: 13px;

    .p-column-title {
        font-size: 13px;
    }

    .p-column-filter {
        width: 100%;
    }

    #pv_id_2 {
        height: 30px;
    }

    .p-fluid .p-dropdown .p-dropdown-label {
        margin-top: -10px;
    }

    .p-dropdown .p-dropdown-label.p-placeholder {
        margin-top: -12px;
    }

    .p-column-filter-menu-button {
        color: white;
        margin-left: 10px;
    }

    .p-column-filter-menu-button:hover {
        color: white;
        border-color: transparent;
        background: #023e70;
    }
}

.p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
    margin-bottom: 0.5rem;
    visibility: hidden;
    position: absolute;
}

.p-button .p-component .p-button-sm {
    background-color: #003056;
}

.p-datatable .p-datatable-tbody>tr {
    font-size: 13px;

    .employee_name {
        font-weight: bold;
        font-size: 13.5px;
    }
}

.employee_name {
    font-weight: bold;
    font-size: 13px;
}

.p-column-title {
    font-size: 13.5px;
}

.fontSize13px {
    font-size: 13px;
}

.pending {
    font-weight: 700;
    color: #ffa726;
}

.approved {
    font-weight: 700;
    color: #26ff2d;
}

.p-button.p-component.p-button-success.Button {
    padding: 8px;
}

.rejected {
    font-weight: 700;
    color: #ff2634;
}

.p-button.p-component.p-button-danger.Button {
    padding: 8px;
}

@media screen and (max-width: 960px) {
    button {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
    color: red;
}

.p-button.p-component.p-confirm-dialog-accept {
    background-color: #003056;
}

.p-button.p-component.p-confirm-dialog-reject.p-button-text {
    color: #003056;
}

.p-column-filter-overlay-menu .p-column-filter-buttonbar {
    padding: 1.25rem;
    position: absolute;
    visibility: hidden;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter-menu-button {
    color: white;
    border-color: transparent;
}

.p-column-filter-menu-button.p-column-filter-menu-button-open {
    background: none;
}

.p-column-filter-menu-button.p-column-filter-menu-button-active {
    background: none;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
    width: 50%;
}

/* For Sort */

.p-datatable .p-sortable-column:not(.p-highlight):hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
    color: white;
}

.p-datatable .p-sortable-column.p-highlight {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column.p-highlight:hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:focus {
    box-shadow: none;
    outline: none;
    color: white;
}

.p-datatable .p-sortable-column .p-sortable-column-icon {
    color: white;
}

.pi-sort-amount-down::before {
    content: "\e9a0";
    color: white;
}

.pi-sort-amount-up-alt::before {
    content: "\e9a2";
    color: white;
}

#file_upload {
    display: inline-block;
    background-color: #003056;
    color: white;
    padding: 0.5rem;
    font-family: sans-serif;
    border-radius: 0.3rem;
    cursor: pointer;
    margin-top: 1rem;
    width: 100%;
    height: 40px;
    font-weight: 700;
    text-align: center;
}

.p-calendar .p-inputtext .p-inputwrapper .p-component {
    flex: 1 1 auto;
    width: 1%;
    background: rebeccapurple;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component::-webkit-input-placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component:-ms-input-placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component::-ms-input-placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
}



:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: red;
}

::-ms-input-placeholder {
    /* Microsoft Edge */
    color: red;
}



.p-button {
    height: 2.5em;
}

.p-button .p-fileupload-choose {
    height: 2.1em;
}

i,
span,
.tabview-custom {
    vertical-align: middle;
}

span {
    margin: 0 .5rem;
}

.AadharCardFront {
    margin-left: 20px;
}

.label {
    width: 170px;
}

.p-tabview p {
    line-height: 1.5;
    margin: 0;
}
</style>




         <!-- <button class="m-auto bg-transparent border-0 outline-none " type="button" aria-haspopup="true"
                            @click="toggle" aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>

                        <Button icon="pi pi-check" aria-label="Filter" />
                        <Button icon="pi pi-pencil" outlined rounded severity="danger" class="p-2"
                            @click="investmentStore.editHraNewRental(slotProps.data)" />



                        <OverlayPanel ref="op" class="p-4">
                            <div class="p-3 mx-4">
                                <button class="py-4 my-4" @click="investmentStore.editHraNewRental">
                                    <i class="py-2 my-4 fa fa-pencil-square-o text-info me-2" aria-hidden="true"></i>
                                    Edit</button>
                                <button class=""><i class="my-4 fa fa-times-circle-o text-danger me-2"
                                        aria-hidden="true"></i> Clear</button>
                            </div>
                        </OverlayPanel> -->