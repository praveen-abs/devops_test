<template>
    <Toast />
    <div class="flex justify-between my-2">
        <h6 class="mb-3 text-lg font-semibold">Documents Approvals</h6>
<!--
        <Button type="button" icon="pi pi-times-circle" severity="success" v-if="!selectedAllEmployee == ''"
            class="mx-4 p-button-success Button" label="Approve all" style=" height: 2.5em"
            @click="showConfirmDialogForBulkApproval(selectedAllEmployee, 'Approve')" /> -->
    </div>
    <div>
        <Dialog header="Header" v-model:visible="canShowLoadingScreen" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog>

        <Dialog header="Confirmation" v-model:visible="canShowConfirmation"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{ currentlySelectedStatus }}?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processSingleDocumentApproveReject()" class="p-button-text"
                    autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>

        <Dialog header="Confirmation" v-model:visible="canShowBulkConfirmation"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '580px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{ currentlySelectedStatus }} all the documents of this employee?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processBulkDocumentsApproveReject()" class="p-button-text"
                    autofocus />
                <Button label="No" icon="pi pi-times" @click="hideBulkConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>

        <Dialog header="Confirmation" v-model:visible="canShowBulkConfirmationAll"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '580px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{ currentlySelectedStatus }} all the documents of selected employees?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processBulkDocumentsApproveReject()" class="p-button-text"
                    autofocus />
                <Button label="No" icon="pi pi-times" @click="hideBulkConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>

        <div>
            <!-- {{ data_review_documents }} -->
            <DataTable :value="data_review_documents" :paginator="true" :rows="10" class="" dataKey="user_code"
                @rowExpand="onRowExpand" @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows"
                v-model:selection="selectedAllEmployee" :selectAll="selectAll" @select-all-change="onSelectAllChange"
                @row-select="onRowSelect" @row-unselect="onRowUnselect" :rowsPerPageOptions="[5, 10, 25]"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                <template #empty> No Onboarding documents for the selected status filter </template>
                <template #loading> Loading employees data. Please wait. </template>
                <Column :expander="true" />
                <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
                <Column field="user_code" header="Employee Id" sortable></Column>

                <Column field="name" header="Employee Name">
                    <!-- <template #body="slotProps">
                        {{ slotProps.data.employee_name }}
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                            class="p-column-filter" :showClear="true" />
                    </template> -->
                </Column>

                <Column class="fontSize13px" field="doj" header="Date Of Joining">
                    <template #body="slotProps">
                        {{ dayjs(slotProps.data.doj).format('DD-MMM-YYYY') }}
                    </template>
                </Column>


                <Column class="fontSize13px" field="doc_status" header="Approval Status" :sortable="false">
                    <template #body="{ data }">
                        <!-- <Tag :value="data.doc_status" :severity="getSeverity(data.doc_status)" /> -->
                        {{ data.doc_status }}
                    </template>
                </Column>
                <Column field="" header="Action">
                    <template #body="slotProps">
                        <span>
                            <Button type="button" icon="pi pi-check-circle" class="p-button-success Button"
                                label="Approve All" @click="showBulkConfirmDialog(slotProps.data, 'Approve')"
                                style="height: 2.5em" />
                            <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button"
                                label="Reject All" style="margin-left: 8px; height: 2.5em"
                                @click="showBulkConfirmDialog(slotProps.data, 'Reject')" />
                        </span>
                    </template>
                </Column>

                <template #expansion="slotProps">

                    <div class="orders-subtable">
                        <DataTable :value="slotProps.data.documents" responsiveLayout="scroll"
                            v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                            @select-all-change="onSelectAllChange">
                            <!-- <Column selectionMode="multiple" style="width: 3rem" :exportable="false"></Column> -->
                            <!-- <Column field="" header="Date" sortable>
                                <template #body="slotProps">
                                    <p style="white-space: nowrap;"> {{ moment(slotProps.data.date).format('DD-MMM-YYYY') }}
                                    </p>
                                </template>
                            </Column> -->
                            <Column field="doc_name" header="Document Name"></Column>
                            <!-- <Column field="doc_url" header="Document Url"></Column> -->
                            <Column field="doc_status" header="Status">
                                <template #body="{ data }">
                                    <Tag :value="data.doc_status" :severity="getSeverity(data.doc_status)" />
                                </template>
                            </Column>
                            <Column field="" header="View">
                                <template #body="slotProps">
                                    <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="View"
                                        @click="showDocDialog(slotProps.data.record_id)" style="height: 2em" />
                                </template>
                            </Column>
                            <Column field="" header="Action">
                                <template #body="slotProps">
                                    <span>
                                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button"
                                            label="Approve" @click="showConfirmDialog(slotProps.data, 'Approve')"
                                            style="height: 2.5em" />
                                        <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button"
                                            label="Reject" style="margin-left: 8px; height: 2.5em"
                                            @click="showConfirmDialog(slotProps.data, 'Reject')" />
                                    </span>
                                </template>
                            </Column>
                        </DataTable>
                    </div>
                </template>
            </DataTable>

            <Dialog v-model:visible="dialog_visible" modal header="Documents" :style="{ width: '40vw' }">


                <img :src="`data:image/png;base64,${documentPath}`" :alt="doc_url" class="block pb-3 m-auto" />

            </Dialog>

        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onRenderTracked, onUpdated, nextTick, onBeforeMount, onBeforeUpdate } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useToast } from "primevue/usetoast";
import dayjs from 'dayjs';
import map from 'lodash/map';


const dialog_visible = ref(false)
let data_review_documents = ref();
let canShowConfirmation = ref(false);
let canShowBulkConfirmation = ref(false);
let canShowBulkConfirmationAll = ref(false);
let canShowLoadingScreen = ref(false);
const toast = useToast();
const expandedRows = ref([]);
const selectedAllEmployee = ref();

const documentPath = ref()


const showDocDialog = (record_id) => {

    dialog_visible.value = true

    axios.post('/view-profile-private-file', {
        emp_doc_record_id: record_id,
    }).then(res => {
        console.log(res.data.data);
        documentPath.value = res.data.data
        console.log("data sent", documentPath.value);
    });


}
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },

    status: { value: 'Pending', matchMode: FilterMatchMode.EQUALS },
});
const statuses = ref(["Pending", "Approved", "Rejected"]);

let currentlySelectedStatus = null;
let currentlySelectedRowData = null;

onMounted(() => {

    data_review_documents.value = [];

    ajax_GetReviewDocumentData();


});



function ajax_GetReviewDocumentData() {

    canShowLoadingScreen = true;

    axios.get("/fetch-onboarded-doc").then((response) => {
        // console.log("Axios : " + response.data);
        data_review_documents.value = response.data;
        canShowLoadingScreen = false;

        console.log(response.data);
    });
}

/*
    Retrieves the given document image.
    Invoked when VIEW button is clicked
*/
function ajax_getDocumentImage() {

}

function showConfirmDialogForBulkApproval(selectedRowData, status) {
    console.log(selectedAllEmployee.value);
    const ob = Object.values(selectedAllEmployee.value)


    ob.forEach(ent => {
        console.log(ent.employee_name);
    })

    canShowBulkConfirmationAll.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;

    console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}

function showConfirmDialog(selectedRowData, status) {
    canShowConfirmation.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;

    console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}

function showBulkConfirmDialog(selectedRowData, status) {
    canShowBulkConfirmation.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;

    console.log("Selected Bulk Row Data : " + JSON.stringify(selectedRowData));
}

function hideConfirmDialog(canClearData) {
    canShowConfirmation.value = false;

    if (canClearData) resetVars();
}

function hideBulkConfirmDialog(canClearData) {
    canShowBulkConfirmation.value = false;

    if (canClearData) resetVars();
}

function resetVars() {
    currentlySelectedStatus = "";
    currentlySelectedRowData = null;
}

const selected_status = ref()

const generate_ajax = () => {

    axios.post(window.location.origin + "/fetch_all_reimbursements_as_groups", {
        selected_year: year,
        selected_month: month,
        selected_status: selected_status.value,
    }).then(res => {
        console.log("data sent");
        console.log("data from " + res.employee_name);
        get_data.value = res.data
    }).catch(err => {
        console.log(err);
    })

}


const css_statusColumn = (data) => {
    return [
        {
            pending: data.status === "Pending",
            approved: data.status === "Approved",
            rejected: data.status === "Rejected",
        },
    ];
};

function processSingleDocumentApproveReject() {
    hideConfirmDialog(false);

    canShowLoadingScreen = true;

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
    console.log("currentlySelectedStatus : " + currentlySelectedStatus);

    axios.post("/approvals/onboarding-docs-approve-reject", {
        record_id: currentlySelectedRowData.record_id,
        status:
            currentlySelectedStatus == "Approve"
                ? "Approved"
                : currentlySelectedStatus == "Reject"
                    ? "Rejected"
                    : currentlySelectedStatus,
        reviewer_comments: "",
    })
        .then((response) => {
            console.log(response.data);
            ajax_GetReviewDocumentData();
            canShowLoadingScreen = false;
            toast.add({ severity: "success", summary: "Status", detail: "Processed Successfully !", life: 3000 });

            resetVars();
        })
        .catch((error) => {
            canShowLoadingScreen = false;
            resetVars();

            console.log(error.toJSON());
        });
}

function processBulkDocumentsApproveReject() {
    hideBulkConfirmDialog(false);

    canShowLoadingScreen = true;

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData.documents));
    console.log("currentlySelectedStatus : " + currentlySelectedStatus);

    //Get the doc ids of the selected employees rowdata
    let processed_doc_ids = map(currentlySelectedRowData.documents, 'record_id');

    console.log("Processed doc record ids : " + processed_doc_ids);

    axios.post("/approvals/onboarding-bulkdocs-approve-reject", {
        record_ids: processed_doc_ids,
        status:
            currentlySelectedStatus == "Approve"
                ? "Approved"
                : currentlySelectedStatus == "Reject"
                    ? "Rejected"
                    : currentlySelectedStatus,
        reviewer_comments: "",
    })
        .then((response) => {
            console.log(response.data);
            ajax_GetReviewDocumentData();
            canShowLoadingScreen = false;

            //toast.add({ severity: "success", summary: "", detail: " Successfully Approved !", life: 3000 });

            resetVars();
        })
        .catch((error) => {
            canShowLoadingScreen = false;
            resetVars();

            console.log(error.toJSON());
        });
}

const getSeverity = (status) => {
    switch (status) {
        case 'Rejected':
            return 'danger';

        case 'Approved':
            return 'success';


        case 'Pending':
            return 'warning';

    }
};




</script>

<style lang="scss">
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
