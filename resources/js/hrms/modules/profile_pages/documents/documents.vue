<template>
    <div class="table-responsive">
        <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10" :value="_instance_profilePagesStore.employeeDetails.employee_documents"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="document_name" style="min-width: 8rem">
            </Column>

            <Column field="status" header="Status" style="min-width: 12rem">

            </Column>

            <Column field="doc_url" header="Reason " style="min-width: 12rem">
            </Column>

            <Column field="" header="View " style="min-width: 12rem">
                <template #body="slotProps">
                    <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="view"
                        @click="showDocument(slotProps.data)" style="height: 2em" />
                </template>

            </Column>


        </DataTable>

        <Dialog v-model:visible="visible" modal header="Documents" :style="{ width: '40vw' }">
            <!-- <img v-if="view_document.doc_url" :src="documentPath"
                :alt="view_document.doc_url" class="block pb-3 m-auto" /> -->

                <img v-if="view_document.document_url" :src="`employees/${_instance_profilePagesStore.employeeDetails.user_code}/onboarding_documents/${view_document.document_url}`"
                :alt="view_document.document_url" class="block pb-3 m-auto" />
<!--
                /view-private-file -->
                <!-- `http://127.0.0.1:8000/view-private-file/${view_document.document_url}` -->


        </Dialog>
        <!-- {{ _instance_profilePagesStore.employeeDetails.user_code }} -->
    </div>
</template>
<!-- <a href="http://127.0.0.1:8000/view-private-file/">link</a> -->



<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const _instance_profilePagesStore = profilePagesStore()


const fetch_data = Service()

const view_document = ref({})

const documentPath = ref()

const visible = ref(false)

const documents = ref([
    {
        document_name: "Aadhar Front", document_url: 'AadharCardBack_B095_15-04-2023_13-38-10.jpg', status: "pending"
    },
    {
        document_name: "Aadhar back", document_url: 'AadharCardFront_B095_15-04-2023_13-38-09.jpg', status: "pending"
    }
]
)

const showDocument = (document) => {

    view_document.value = { ...document }
    console.log(view_document.value);
    // <!-- console.log(view_document.value.doc_url); -->
    visible.value = true


    // <!-- axios.post('/view-profile-private-file',{
    //     user_code: _instance_profilePagesStore.employeeDetails.user_code,
    //     doc_url:view_document.value.doc_url
    //     }).then(res=>{
    //         console.log(res.data);
    //         documentPath.value = res.data
    //     console.log("data sent");
    // }) -->

}

</script>
