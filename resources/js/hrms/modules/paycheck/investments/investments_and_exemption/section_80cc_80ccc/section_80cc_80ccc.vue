<template>
    <div>
        <div class="table-responsive">
            <DataTable  resizableColumns columnResizeMode="expand"  ref="dt" dataKey="id" :paginator="true" :rows="10" :value="sample"
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
                        <InputText type="text" v-model="slotProps.data.test" @focusout="te(slotProps.data)" />
                 
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
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4"
                @click="investmentStore.investment_exemption_steps--">Previous</button>
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="investmentStore.investment_exemption_steps++">Next</button>
        </div>
    </div>
</template>


<script setup>
import { onMounted } from "vue";
import { investmentMainStore } from "../../../stores/investmentMainStore";

import { ref } from "vue";

const op = ref();
const toggle = (event) => {
    op.value.toggle(event);
}

const investmentStore = investmentMainStore()

const sample = ref([
    { id: 1, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 2, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 3, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' }
])

const text = ref()

const te = (data) =>{
    console.log(text.value);
    console.log(data.test);
}


</script>