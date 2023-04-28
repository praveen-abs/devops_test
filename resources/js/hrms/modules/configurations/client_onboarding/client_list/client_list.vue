<template>

        <DataTable ref="dt" :value="client_onboarding_data" dataKey="id"
            :paginator="true" :rows="10"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="Client Code" field="client_code" style="min-width: 8rem">
                <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
            </Column>

            <Column field="client_name" header="Client Name" style="min-width: 12rem">
                <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
            </Column>

            <Column field="authorised_person_contact_number" header="Contact " style="min-width: 12rem">
                <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
            </Column>

            <Column field="authorised_person_contact_email" header="Email" style="min-width: 12rem">
                <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
            </Column>

            <Column field="contract_start_date" header="Contract End Date" style="min-width: 12rem">
                <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
            </Column>
            <Column field="contract_end_date" header="Contract End Date" style="min-width: 12rem">
                <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
            </Column>
            <Column field="subscription_type" header="Subscription Type'" style="min-width: 12rem">
                <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
            </Column>


        </DataTable>
        {{ client_onboarding_data }}

</template>
<script setup>

import { ref, onMounted, reactive, onUpdated } from 'vue';
import axios from 'axios'
import { useToast } from "primevue/usetoast";


const client_onboarding_data = ref([])

onMounted(()=>{
    axios.get('/vmt-clients-fetchall').then(res =>{
        console.log(res.data);
        client_onboarding_data.value = res.data
       
    })
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


