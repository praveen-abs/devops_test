<template>
    <div class="table-responsive">
        <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="documents"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="document_name" style="min-width: 8rem">
            </Column>

            <Column field="status" header="Status" style="min-width: 12rem">

            </Column>

            <Column field="document_url" header="Reason " style="min-width: 12rem">
            </Column>

            <Column field="" header="View " style="min-width: 12rem">
                <template #body="slotProps">
                    <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="view"
                        @click="showDocument(slotProps.data)" style="height: 2em" />
                </template>

            </Column>

            <!-- <Column style="width: 300px" field="" header="view">
                <template #body="slotProps">
                    <span v-if="slotProps.data.status == 'Pending'">
                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approval"
                            @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2em" />
                        <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Rejected"
                            style="margin-left: 8px; height: 2em" @click="showConfirmDialog(slotProps.data, 'Reject')" />
                    </span>
                </template>
            </Column> -->


        </DataTable>

        <Dialog v-model:visible="visible" modal header="Documents" :style="{ width: '40vw' }">
            <img v-if="view_document.document_url" :src="`employee/emp_B090/documents/${view_document.document_url}`"
                :alt="view_document.document_url" class="block pb-3 m-auto" />

        </Dialog>
        <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_details }} -->
    </div>  
</template>



<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const _instance_profilePagesStore = profilePagesStore()

const fetch_data = Service()

const view_document = ref({})

const visible = ref(false)

const documents = ref([
    {
        document_name: "Aadhar Front", document_url: 'voterIdB090_22-03-2023 15-47-22.jpg', status: "pending"
    },
    {
        document_name: "Aadhar back", document_url: 'doc_BA011_education_certificate_file_1664774711.JPG', status: "pending"
    }
]
)

const showDocument = (document) => {

    view_document.value = { ...document }
    console.log(view_document.value);
    visible.value = true

}

</script>
