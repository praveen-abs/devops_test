<template>
    <div class="table-responsive">
        <DataTable ref="dt" :value="_instance_profilePagesStore.employeeDetails.get_employee_details" dataKey="id" :paginator="true" :rows="10"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="name" style="min-width: 8rem">
                <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
            </Column>

            <Column field="Status" header="Status" style="min-width: 12rem">
    
            </Column>

            <Column field="dob" header="Reason " style="min-width: 12rem">
            </Column>

            <Column style="width: 300px" field="" header="Action">
                <template #body="slotProps">
                    <!-- <Button icon="pi pi-check" class="p-button-success"  @click="confirmDialog(slotProps.data,'Approved')" label="Approval" />
                        <Button icon="pi pi-times" class="p-button-danger" @click="confirmDialog(slotProps.data,'Rejected')" label="Rejected" /> -->
                    <span v-if="slotProps.data.status == 'Pending'">
                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approval"
                            @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2em" />
                        <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Rejected"
                            style="margin-left: 8px; height: 2em" @click="showConfirmDialog(slotProps.data, 'Reject')" />
                    </span>
                </template>
            </Column>


        </DataTable>
    </div>
</template>


<script setup>
import axios from "axios";
import { ref } from "vue";

import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const _instance_profilePagesStore = profilePagesStore()

const fetch_data = Service()




const Documents = ref()

const fetchDocuments = () => {

    let url = "http://localhost:3000/Empdetails"

    console.log("Axios:" + url);

    axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        console.log(response.data);
        Documents.value = response.data;
        // loading.value = false;
    });
}



</script>