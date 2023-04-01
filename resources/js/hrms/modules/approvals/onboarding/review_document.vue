<template>
    <Toast />


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
                <Button label="Yes" icon="pi pi-check" @click="processApproveReject()" class="p-button-text" autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>
        <div>
            <DataTable :value="data_review_documents" :paginator="true" :rows="10" class="mt-6 " dataKey="user_id"
                @rowExpand="onRowExpand" @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows"
                v-model:selection="selectedAllEmployee" :selectAll="selectAll" @select-all-change="onSelectAllChange"
                @row-select="onRowSelect" @row-unselect="onRowUnselect"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                <template #empty> No Reimbursement data for the selected status filter </template>
                <template #loading> Loading customers data. Please wait. </template>
                <Column :expander="true" />
                <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
                <Column field="user_code" header="Employee Id" sortable></Column>

                <Column field="employee_name" header="Employee Name">
                    <!-- <template #body="slotProps">
                        {{ slotProps.data.employee_name }}
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                            class="p-column-filter" :showClear="true" />
                    </template> -->
                </Column>

                <Column class="fontSize13px" field="total_distance_travelled" header="Date Of Joining"
                    >
                    <!-- <template #body="slotProps">
                        {{ slotProps.data.total_distance_travelled + " KM" }}
                    </template> -->
                </Column>


                <Column class="fontSize13px" field="total_expenses" header="Approval Status" :sortable="false">
                    <!-- <template #body="slotProps">
                        {{ "&#8377; " + slotProps.data.total_expenses }}
                    </template> -->
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
                        <DataTable :value="slotProps.data.onboard_doc" responsiveLayout="scroll"
                            v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                            @select-all-change="onSelectAllChange">
                            <!-- <Column selectionMode="multiple" style="width: 3rem" :exportable="false"></Column> -->
                            <Column field="" header="Date" sortable>
                                <template #body="slotProps">
                                    <p style="white-space: nowrap;"> {{ moment(slotProps.data.date).format('DD-MMM-YYYY') }}
                                    </p>
                                </template>
                            </Column>
                            <Column field="document_name" header="Document Name"></Column>
                            <Column field="doc_url" header="Document Url"></Column>
                            <Column field="" header="View">
                            </Column>
                            <!-- <Column field="vehicle_type" header="Mode of transport"></Column>
                            <Column class="fontSize13px" field="distance_travelled" header="Distance Covered"></Column>
                            <Column class="fontSize13px" field="total_expenses" header="Total Expenses">
                                <template #body="slotProps">
                                    {{ "&#8377; " + slotProps.data.total_expenses }}
                                </template>
                            </Column> -->
                            <!-- <Column field="status" header="Status" sortable>
                                <template #body="slotProps">
                                    <img :alt="slotProps.data.name" :src="`http://localhost:8000/${slotProps.data.doc_url}`" width="32" style="vertical-align: middle" class="ml-2" />

                                </template>
                            </Column> -->
                        </DataTable>
                    </div>
                </template>
            </DataTable>

            <div v-for="doc in data_review_documents" :key="doc">
                <img :src="doc.doc_url" alt="">
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onRenderTracked, onUpdated, nextTick,onBeforeMount, onBeforeUpdate } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import moment from 'moment'
import { watch } from "vue";


let data_review_documents = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
const data_checking = ref(false)
const confirm = useConfirm();
const toast = useToast();
const loading = ref(true);
const expandedRows = ref([]);
const view_reimbursment_detials = ref(false);
const view_reimbursment_action = ref(false);
const selectedAllEmployee = ref();
const selectedOneEmployee = ref();
const metaKey = ref(true);


const data = () => {
    show.value = true;

}




const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },

    status: { value: null, matchMode: FilterMatchMode.EQUALS },
});
const statuses = ref(["Pending", "Approved", "Rejected"]);

let currentlySelectedStatus = null;
let currentlySelectedRowData = null;
const isdisabled = ref(true)

onMounted(() => {
    data_review_documents.value = [];
    selected_date.value = new Date()
   console.log(selected_date.value);
   ajax_GetReviewDocumentData()


});



function ajax_GetReviewDocumentData() {
    let url_all_review_documents =
        window.location.origin + "/fetch-onboarded-doc";

    console.log("AJAX URL : " + url_all_review_documents);

    axios.get(url_all_review_documents).then((response) => {
        // console.log("Axios : " + response.data);
        data_review_documents.value = response.data;
        console.log(response.data);
    });
}

function showConfirmDialog(selectedRowData, status) {
    canShowConfirmation.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;

    console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}
function showConfirmDialogForBulkApproval(selectedRowData, status) {
    console.log(selectedAllEmployee.value);
    const ob = Object.values(selectedAllEmployee.value)


    ob.forEach(ent => {
        console.log(ent.employee_name);
    })

    canShowConfirmation.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;

    console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}

function hideConfirmDialog(canClearData) {
    canShowConfirmation.value = false;

    if (canClearData) resetVars();
}

function resetVars() {
    currentlySelectedStatus = "";
    currentlySelectedRowData = null;
}

const selected_date = ref()
const selected_status = ref()
const show_table = ref(false)

const show = ref(false)

const get_data = ref()

const generate_ajax = () => {


    let filter_date = new Date(selected_date.value);

    let year = filter_date.getFullYear();
    let month = filter_date.getMonth() + 1;

    console.log((selected_date.value).toString());
    console.log(get_data);

    //show_table.value=true

    data_checking.value = true



    axios.post(window.location.origin + "/fetch_all_reimbursements_as_groups", {
        selected_year: year,
        selected_month: month,
        selected_status: selected_status.value,
    }).then(res => {
        console.log("data sent");
        console.log("data from " + res.employee_name);
        data_reimbursements.value = res.data
        get_data.value = res.data
        data_checking.value = false
    }).catch(err => {
        console.log(err);
    })

}

const download_ajax = () => {
    let filter_date = new Date(selected_date.value);
    data_checking.value = true

    let year = filter_date.getFullYear();
    let month = filter_date.getMonth() + 1;
    isdisabled.value = false

    let URL = '/reports/generate-manager-reimbursements-reports?selected_year=' + year + '&selected_month=' + month +
        '&selected_status=' + selected_status.value + '&_token={{ csrf_token() }}';
    window.location = URL;
    setTimeout(greet, 1000);

}

const test = () => {

    toast.add({ severity: 'warn', summary: 'Are you sure?', detail: 'Proceed to confirm', group: 'bc' });
}

const greet = () => {
    data_checking.value = false
}

setTimeout(greet, 3000);


const css_statusColumn = (data) => {
    return [
        {
            pending: data.status === "Pending",
            approved: data.status === "Approved",
            rejected: data.status === "Rejected",
        },
    ];
};

function processApproveReject() {
    hideConfirmDialog(false);

    // canShowLoadingScreen.value = true;

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
    console.log("currentlySelectedStatus : " + currentlySelectedStatus);

    axios
        .post(window.location.origin + "/reimbursements_bulk_approval", {
            reimbursement_id: currentlySelectedRowData,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            reviewer_comments: "",
        })
        .then((response) => {
            console.log(response);
                generate_ajax();
            // canShowLoadingScreen.value = false;

            toast.add({ severity: "success", summary: "", detail: " Successfully Approved !", life: 3000 });

            resetVars();
        })
        .catch((error) => {
            canShowLoadingScreen.value = false;
            resetVars();

            console.log(error.toJSON());
        });
}






const expandedRowGroups = ref();
const onRowGroupExpand = (event) => {
    toast.add({ severity: 'info', summary: 'Row Group Expanded', detail: 'Value: ' + event.data, life: 3000 });
};
const onRowGroupCollapse = (event) => {
    toast.add({ severity: 'success', summary: 'Row Group Collapsed', detail: 'Value: ' + event.data, life: 3000 });
};
const calculateCustomerTotal = (name) => {
    let total = 0;

    if (customers.value) {
        for (let customer of customers.value) {
            if (customer.representative.name === name) {
                total++;
            }
        }
    }

    return total;
};
const getSeverity = (status) => {
    switch (status) {
        case 'unqualified':
            return 'danger';

        case 'qualified':
            return 'success';

        case 'new':
            return 'info';

        case 'negotiation':
            return 'warning';

        case 'renewal':
            return null;
    }
};



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
}</style>
