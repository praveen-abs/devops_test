<template>
    <div>
        <div class="table-responsive">

            <DataTable resizableColumns columnResizeMode="expand" ref="dt" dataKey="id" :paginator="true" :rows="10"
                :value="sample"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

                <Column header="Sections" field="section" style="min-width: 8rem">
                    <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                </Column>

                <Column field="particular" header="Particulars" style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                </Column>

                <Column field="ref" header="References " style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                </Column>

                <Column field="max_limit" header="Max Limit" style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                </Column>

                <Column field="Declaration Amount" header="Declaration Amount" style="min-width: 12rem">
                    <template #body="slotProps">
                        <div v-if="slotProps.data.section == '80EE'">
                            <button @click="visible = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EE</button>
                        </div>
                        <div v-else-if="slotProps.data.section == '80EEA'">
                            <button @click="visible1 = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EEA</button>
                        </div>
                        <div v-else-if="slotProps.data.section == '80EEB'">
                            <button @click="visible2 = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EEB</button>
                        </div>
                        <div v-else>
                            <InputText type="text" v-model="slotProps.data.test" @focusout="te(slotProps.data)" />
                        </div>
                    </template>
                </Column>
                <Column field="Status" header="Status" style="min-width: 12rem">
                    <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                </Column>
                <Column field="" header="Action" style="min-width: 12rem">

                    <template #body>
                        <button class="m-auto bg-transparent border-0 outline-none " type="button" aria-haspopup="true"
                            @click="toggle" aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>

                        <OverlayPanel ref="op" class="p-4">
                            <div class="p-3 mx-4">
                                <a class="py-4 my-4 dropdown-item" href="#"><i
                                        class="py-2 my-4 fa fa-pencil-square-o text-info me-2" aria-hidden="true"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="#"><i class="my-4 fa fa-times-circle-o text-danger me-2"
                                        aria-hidden="true"></i> Clear</a>
                            </div>
                        </OverlayPanel>


                    </template>
                </Column>
            </DataTable>

        </div>

        <div class="my-3 text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button>
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4 "
                @click="investmentStore.investment_exemption_steps--">Previous</button>
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="investmentStore.investment_exemption_steps++">Next</button>
        </div>

        <!-- Declaration Amount Dailog -->






        <Dialog v-model:visible="visible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
            <template #header>
                <h6 class="mb-1 modal-title text-primary">80EE<span class="ml-3 text-xs font-semibold text-gray-400">(The
                        maximum deduction of Rs 50,000 can
                        be claimed under this section)</span> </h6>
            </template>
            <div
                class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">

                <div class="">
                    <label for="sanction_date" class="block mb-2 font-medium text-gray-900 ">Loan
                        Sanction Date</label>
                    <input type="date" id="sanction_date" v-model="investmentStore.other_Exe.loan_sanction_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>



                <div class="">

                    <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                        Type</label>
                    <select id="lender_type"  v-model="investmentStore.other_Exe.lender_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Type</option>
                        <option>Others</option>
                        <option>Financial Institution</option>

                    </select>
                </div>

                <div class="">
                    <label for="property_value" class="block mb-2 font-medium text-gray-900 ">Property
                        Value</label>
                    <input type="text" id="property_value"  v-model="investmentStore.other_Exe.property_value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="loan_amount" class="block mb-2 font-medium text-gray-900 ">Loan
                        Amount</label>
                    <input type="text" id="loan_amount" v-model="investmentStore.other_Exe.loan_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="declaration_amount" class="block mb-2 font-medium text-gray-900 ">Interest
                        Amount Paid</label>
                    <input type="text" id="declaration_amount" v-model="investmentStore.other_Exe.interest_amount_paid"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>

            </div>
            <div class="text-end">
                <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md" @click="investmentStore.save80EE">Save</button>
            </div>


        </Dialog>


        <Dialog v-model:visible="visible1" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
            <template #header>
                <h6 class="mb-1 modal-title text-primary">80EEA <span class="ml-3 text-xs font-semibold text-gray-400">(The
                        maximum deduction available under
                        this section is Rs. 1.5 Lakhs)</span> </h6>
            </template>

            <div
                class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">

                <div class="">
                    <label for="sanction_date" class="block mb-2 font-medium text-gray-900 ">Loan
                        Sanction Date</label>
                    <input type="date" id="sanction_date"  v-model="investmentStore.other_Exe.loan_sanction_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>



                <div class="">

                    <label for="lender_type" class="block mb-2 font-medium text-gray-900 ">Lender
                        Type</label>
                    <select id="lender_type"  v-model="investmentStore.other_Exe.lender_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose Type</option>
                        <option>Others</option>
                        <option>Financial Institution</option>

                    </select>
                </div>

                <div class="">
                    <label for="property_value" class="block mb-2 font-medium text-gray-900 ">Property
                        Value</label>
                    <input type="text" id="property_value"  v-model="investmentStore.other_Exe.property_value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="loan_amount" class="block mb-2 font-medium text-gray-900 ">Loan
                        Amount</label>
                    <input type="text" id="loan_amount"  v-model="investmentStore.other_Exe.loan_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                        required>
                </div>
                <div class="">
                    <label for="declaration_amount" class="block mb-2 font-medium text-gray-900 ">Interest
                        Amount Paid</label>
                    <input type="text" id="declaration_amount" v-model="investmentStore.other_Exe.interest_amount_paid"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>

            </div>
            <div class="text-end">
                <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md" @click="investmentStore.save80EEA">Save</button>
            </div>

        </Dialog>



        <Dialog v-model:visible="visible2" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">

            <template #header>
                <h6 class="mb-1 modal-title text-primary"> 80EEB<span class="ml-3 text-xs font-semibold text-gray-400">(The
                        maximum deduction available under
                        this section is Rs. 1.5 Lakhs for electric vehicle purchase)</span> </h6>
            </template>





            <div
                class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">
                <div class="">
                    <label for="sanction_date" class="block mb-2 font-medium text-gray-900 ">Loan
                        Sanction Date</label>
                    <input type="date" id="sanction_date" v-model="investmentStore.other_Exe.loan_sanction_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>



                <div class="">

                    <label for="vechicle_brand" class="block mb-2 font-medium text-gray-900 ">Vechicle Brand</label>
                    <select id="vechicle_brand" v-model="investmentStore.other_Exe.vechicle_brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected hidden disabled>Choose Vechicle</option>
                        <option value="">TATA</option>
                        <option value="">Hyundai</option>
                        <option value="">Mahindra</option>
                        <option value="">Kia</option>
                        <option value="">MG</option>

                    </select>
                </div>

                <div class="">
                    <label for="vechicle_model" class="block mb-2 font-medium text-gray-900 ">Vechicle Model
                    </label>
                    <!-- {{-- <input type="text" id=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required> --}} -->
                    <select id="vechicle_model" v-model="investmentStore.other_Exe.vechicle_model"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected hidden>Choose Model</option>
                        <option value="">Tata Tiago</option>
                        <option value="">Tata Tigor</option>
                        <option value="">Tata Nexon</option>
                        <option value="">Tata AVINYA</option>
                        <option value="">Tata Punch</option>
                        <option value="">Tata CURVV SUV Coupe</option>
                        <option value="">Mahindra eVerito</option>
                        <option value="">Mahindra e2oPlus</option>
                        <option value="">Mahindra eSupro</option>
                        <option value="">Mahindra Treo</option>
                        <option value="">Mahindra Treo Zor</option>
                        <option value="">Mahindra eAlfa Mini</option>
                        <option value="">Hyundai Kona Electric</option>
                        <option value="">Hyundai IONIQ 5</option>
                        <option value="">Mahindra XUV400 EV</option>
                        <option value="">Mahindra E Verito</option>
                        <option value="">Kia EV6</option>
                        <option value="">MG ZS EV</option>


                    </select>
                </div>

                <div class="">
                    <label for="declaration_amount" class="block mb-2 font-medium text-gray-900 ">Interest
                        Amount Paid</label>
                    <input type="text" id="declaration_amount" v-model="investmentStore.other_Exe.interest_amount_paid"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>

            </div>
            <div class="text-end">
                <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md" @click="investmentStore.save80EEB">Save</button>
            </div>


        </Dialog>


    </div>
</template>

<script setup>
import { ref } from "vue";
import { investmentMainStore } from "../../../stores/investmentMainStore";

const investmentStore = investmentMainStore()

const visible = ref(false)
const visible1 = ref(false)
const visible2 = ref(false)



const sample = ref([
    { id: 1, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 2, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 3, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 4, section: "80EE", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 5, section: "80EEA", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 6, section: "80EEB", particular: "House Rent Allowance", ref: 'data', max: '1000' },
])


const text = ref()

const te = (data) => {
    console.log(text.value);
    console.log(data.test);
}


const op = ref();
const toggle = (event) => {
    op.value.toggle(event);
}




</script>





