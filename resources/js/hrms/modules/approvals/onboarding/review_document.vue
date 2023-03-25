<template>
    <div class="container-fluid documentReview_wrapper mt-30">

        <input type="hidden" name="hidden_user_code" id="hidden_user_code" value="{{ $user_code }}" />
        <div class="card shadow  profile-box card-top-border p-2">
            <div class="card-body">
                <h6 class="mb-0 text-start">Documents Review</h6>
                <div class="header-card-text text-end">

                            <button class="btn  btn-orange" onclick="approveAllDocument()">Approve All</button>

                </div>
                <div class="form-card mb-2 mt-2">


                    <DataTable :value="data_reimbursements" :paginator="true" :rows="10" class="mt-6 " dataKey="user_id"
                    @rowExpand="onRowExpand" @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows"
                    v-model:selection="selectedAllEmployee"  :selectAll="selectAll" @select-all-change="onSelectAllChange" @row-select="onRowSelect" @row-unselect="onRowUnselect"
                    paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                    responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                    <template #empty> No Reimbursement data for the selected status filter </template>
                    <template #loading> Loading customers data. Please wait. </template>
                    <Column :expander="true" />
                    <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
                    <Column field="user_code" header="Employee Id" sortable></Column>

                    <Column field="name" header="Employee Name">
                        <template #body="slotProps">
                            {{ slotProps.data.employee_name }}
                        </template>
                        <template #filter="{ filterModel, filterCallback }">
                            <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                                class="p-column-filter" :showClear="true" />
                        </template>
                    </Column>

                    <Column class="fontSize13px" field="total_distance_travelled" header="Overall Distance Travelled"
                        :sortable="false">
                        <template #body="slotProps">
                            {{ slotProps.data.total_distance_travelled + " KM" }}
                        </template>
                    </Column>


                    <Column class="fontSize13px" field="total_expenses" header="Overall Reimbursements" :sortable="false">
                        <template #body="slotProps">
                            {{ "&#8377; " + slotProps.data.total_expenses }}
                        </template>
                    </Column>
                    <Column field="" header="Action">
                        <template #body="slotProps">
                            <span v-if="slotProps.data.has_pending_reimbursements == 'true'">
                                <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approve"
                                    @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2.5em" />
                                <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Reject"
                                    style="margin-left: 8px; height: 2.5em"
                                    @click="showConfirmDialog(slotProps.data, 'Reject')" />
                            </span>
                        </template>
                    </Column>

                    <template #expansion="slotProps">

                        <div class="orders-subtable">
                            <DataTable :value="slotProps.data.reimbursement_data" responsiveLayout="scroll"
                                v-model:selection="selectedAllEmployee" :selectAll="selectAll" @select-all-change="onSelectAllChange">
                                <!-- <Column selectionMode="multiple" style="width: 3rem" :exportable="false"></Column> -->
                                <Column field="" header="Date" sortable>
                                    <template #body="slotProps">
                                        <p style="white-space: nowrap;"> {{ moment(slotProps.data.date).format('DD-MMM-YYYY') }}
                                        </p>
                                    </template>
                                </Column>
                                <Column field="from" header="From"></Column>
                                <Column field="to" header="To"></Column>
                                <Column field="user_comments" header="Comments"></Column>
                                <Column field="vehicle_type" header="Mode of transport"></Column>
                                <Column class="fontSize13px" field="distance_travelled" header="Distance Covered"></Column>
                                <Column class="fontSize13px" field="total_expenses" header="Total Expenses">
                                    <template #body="slotProps">
                                        {{ "&#8377; " + slotProps.data.total_expenses }}
                                    </template>
                                </Column>
                                <Column field="status" header="Status" sortable>
                                    <template #body="slotProps">
                                        <span :class="'order-badge order-' + slotProps.data.status">{{
                                            slotProps.data.status
                                        }}</span>
                                    </template>
                                </Column>
                            </DataTable>
                        </div>
                    </template>
                </DataTable>

                </div>
            </div>
        </div>
    </div>


    <!-- <div id="notificationModal" class="modal custom-modal fade" role="dialog"  style="opacity:1; display:none;background:#00000073;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
        <div class="modal-content top-line">
            <div id="modalHeader" class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                <h6 class="modal-title mb-1 text-primary"  >
                 Documents Review</h6>
                <button type="button" class="close-modal outline-none bg-transparent border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"  id="modalBody">



        {{-- <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true"
            style="opacity:1; display:none;background:#00000073;">
            <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true"
                aria-labelledby="">
                <div class="modal-content">
                    <div class="modal-header py-2 bg-primary">
                        <div class="w-100 modal-header-content d-flex align-items-center py-2">
                            <h5 class="modal-title text-white" id="modalHeader">Documents
                            </h5>
                            <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>
                    </div>
                    <div class="modal-body"> --}}


                            <div class="text-end">
                                <button type="button" id="button_close" class="btn btn-border-primary close-modal"
                                    data-bs-dismiss="modal">Close</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>




<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";



const employee_documents = ref()




onMounted(() => {

    let  document = '/documents'

    let user_code = 'BA024'

    axios.get(`/employee-documents/${user_code}`).then(res =>{
        employee_documents.value=res.data
        console.log(res.data);
    }).catch(err => {
        console.log(err);
    }).finally(()=>{
        console.log("documents reviewed");
    })
});

</script>








<style lang="scss">
.main-content {
    width: 85%;
}

.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1.3rem 1rem;
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
</style>

