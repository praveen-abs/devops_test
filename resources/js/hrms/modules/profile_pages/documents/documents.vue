<template>
    <div class="table-responsive">
        <!-- {{ _instance_profilePagesStore.employeeDetails }} -->
        <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="_instance_profilePagesStore.employeeDetails.employee_documents"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="document_name" style="min-width: 8rem">
                {{_instance_profilePagesStore.employeeDetails.employee_documents.document_name }}
            </Column>

            <Column field="doc_url" header="Status" style="min-width: 12rem">
                {{_instance_profilePagesStore.employeeDetails.employee_documents.doc_url }}

            </Column>

            <Column field="doc_url" header="Reason " style="min-width: 12rem">

            </Column>

            <Column field="" header="View " style="min-width: 12rem">
                <template #body="slotProps">
                    <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="view"
                        @click="showDocument(slotProps.data)" style="height: 2em" />
                    <!-- <a :href="`employees/${_instance_profilePagesStore.employeeDetails.user_code}/onboarding_documents/${slotProps.data.doc_url}`">click</a> -->
                    <!-- <a :href="view-profile-private-file">click</a> -->
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
            <!-- <img v-if="view_document.doc_url" :src="`data:image/jpeg;base64,${btoa(documentPath)}`"
                :alt="view_document.doc_url" class="block pb-3 m-auto" /> -->

                <img v-if="view_document.doc_url" :src="`http://127.0.0.1:8000/employees/${_instance_profilePagesStore.employeeDetails.user_code}/onboarding_documents/${view_document.doc_url}`"
                :alt="view_document.doc_url" class="block pb-3 m-auto" />
                <!-- <img v-if="view_document.doc_url" v-bind:src="`http://127.0.0.1:8000/view-profile-private-file/${_instance_profilePagesStore.employeeDetails.user_code}/onboarding_documents/${view_document.doc_url}`"
                :alt="view_document.doc_url" class="block pb-3 m-auto" /> -->
<!--
                /view-private-file -->
                <img src="" alt="">
                <a href=""></a>

        </Dialog>
        <!-- {{ _instance_profilePagesStore.employeeDetails.employee_documents }} -->
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

const visible = ref(false);

const documentPath = ref();

// const documents = ref([
//     {
//         document_name: "Aadhar Front", document_url: 'voterIdB090_22-03-2023 15-47-22.jpg', status: "pending"
//     },
//     {
//         document_name: "Aadhar back", document_url: 'doc_BA011_education_certificate_file_1664774711.JPG', status: "pending"
//     }
// ]
// )

const showDocument = (document) => {

    view_document.value = { ...document }
    console.log(view_document.value);
     console.log(view_document.value.doc_url);
    visible.value = true


     axios.post('/view-profile-private-file',{
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        document_name:view_document.value.document_name
        }).then(res=>{
            console.log(res.data);

            documentPath.value = res.data
            console.log("data sent");
    });
}

// function getImageBlob (image_url) {
//     return axios.get(image_url).then(response => window.URL.createObjectURL(response.data))
//   }





</script>
