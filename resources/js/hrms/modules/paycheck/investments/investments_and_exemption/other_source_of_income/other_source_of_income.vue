<template>
    <div>
        <div class="table-responsive">
            <DataTable resizableColumns columnResizeMode="expand" ref="dt" dataKey="id" :paginator="true" :rows="10"
                :value="investmentStore.otherIncomeSource"
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
                    <template #body="slotProps">
                        <div v-if="slotProps.data.section == '80EE'">
                            <button @click="investmentStore.dailog_80EE = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EE</button>
                        </div>
                        <div v-else-if="slotProps.data.section == '80EEA'">
                            <button @click="investmentStore.dailog_80EEA = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EEA</button>
                        </div>
                        <div v-else-if="slotProps.data.section == '80EEB'">
                            <button @click="investmentStore.dailog_80EEB = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EEB</button>
                        </div>
                        <!-- <div v-else-if="slotProps.data.section == '80EEB'" class="dec_amt">
                            <button @click="investmentStore.dailog_80EEB = true"
                                class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Add
                                80EEB</button>
                        </div> -->
                        <div v-else>
                            <InputText class="text-lg font-semibold w-7" type="text" v-model="slotProps.data.dec_amt"
                                @focusout="investmentStore.getDeclarationAmount(slotProps.data)" />
                        </div>
                    </template>
                </Column>
                <Column field="Status" header="Status" style="min-width: 12rem">
                    <template #body="slotProps">
                        <div v-if="slotProps.data.status">
                            <Tag value="Completed" severity="success" />
                        </div>
                        <div v-else>
                            <!-- <Tag value="Pending" severity="warning" /> -->
                            <span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20">Pending</span>
                        </div>
                    </template>
                </Column>
                <Column field="" header="Action" style="min-width: 12rem">
                    <template #body="slotProps">
                        <button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"
                            @click="investmentStore.editHraNewRental(slotProps.data)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-10 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                    </template>
                </Column>
            </DataTable>

        </div>
        <div class="my-3 text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
            <button class="px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="investmentStore.investment_exemption_steps--">Previous</button>
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="investmentStore.investment_exemption_steps++">Next</button>
        </div>
    </div>
</template>


<script setup>
import { ref } from "vue";
import { investmentMainStore } from "../../../stores/investmentMainStore";

const investmentStore = investmentMainStore()


</script>