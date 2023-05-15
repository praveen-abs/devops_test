<template>
    <div class="table-responsive">

        <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10"
            :value="_instance_profilePagesStore.employeeDetails.employee_documents"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="document_name" style="min-width: 8rem">
                {{ _instance_profilePagesStore.employeeDetails.employee_documents.document_name }}
            </Column>

            <Column field="status" header="Status" style="min-width: 12rem">
                {{ _instance_profilePagesStore.employeeDetails.employee_documents.status }}

            </Column>

            <Column field="reason" header="Reason " style="min-width: 12rem">

            </Column>
            <!-- <Column field="Browerupload" header="Upload Document" style="min-width:12rem;">
                <template #body="slotProps" >
                    <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="View"
                        @click="showDocument(slotProps.data)" style="height: 2em" />
                </template>
            </Column> -->

            <Column field="" header="View " style="min-width: 12rem">
                <template #body="slotProps">
                    <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="View"
                        @click="showDocument(slotProps.data)" style="height: 2em" />

                </template>

            </Column>

        </DataTable>

        <Dialog v-model:visible="visible" modal header="Documents" :style="{ width: '40vw' }" v-if="loading == false " >
            <div class="w-full h-full d-flex justify-content-center ">
                <img v-if="view_document.doc_url" v-bind:src="`data:image/png;base64,${documentPath}`" class=""
                    alt="File not found" style="object-fit: cover; max-width: 400px; , min-height: 350px; height:300px" />
            </div>


            <!-- <img :src="`data:image/png;base64,${}`" /> -->
        </Dialog>

        <Dialog header="Header" v-model:visible="loading"
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

const loading = ref(false);

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
    loading.value = true


    axios.post('/view-profile-private-file', {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        document_name: view_document.value.document_name
    }).then(res => {
        console.log(res.data.data);
        documentPath.value = res.data.data
        console.log("data sent", documentPath.value);

    }).finally(()=>{

        loading.value = false;

    })
}

// function getImageBlob (image_url) {
//     return axios.get(image_url).then(response => window.URL.createObjectURL(response.data))
//   }







</script>
