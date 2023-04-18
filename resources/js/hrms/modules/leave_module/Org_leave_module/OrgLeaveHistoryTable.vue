<template>
    <div>
        <Toast />
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
                <Button label="Yes" icon="pi pi-check" @click="processApproveReject()" class="text-white p-button-text"
                    autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog(true)" class="text-white p-button-text" />
            </template>
        </Dialog>
        <div>
            <DataTable :value="Leave_data" :paginator="true" :rows="5" dataKey="id"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
                v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name', 'status']">
                <template #empty> No Employee data..... </template>
                <template #loading> Loading customers data. Please wait. </template>
                <Column field="name" header="Employee Name">
                    <template #body="slotProps">
                        <div></div>
                        {{ slotProps.data.employee_name }}
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                            class="p-column-filter" :showClear="true" />
                    </template>
                </Column>


                <Column field="leave_type" header="Leave Type" style="min-width: 8rem;"></Column>
                <Column field="start_date" header="Start Date">
                    <template #body="slotProps">
                        {{ moment(slotProps.data.start_date).format('DD-MM-YYYY') }}
                    </template>
                </Column>
                <Column field="end_date" header="End Date" dataType="date">
                    <template #body="slotProps">
                        
                        {{ moment(slotProps.data.end_date).format('DD-MM-YYYY') }}
                    </template>
                </Column>
                <Column field="leave_reason" header="Leave Reason" style="min-width: 12rem;">
                    <template #body="slotProps">
                        <div v-if="slotProps.data.leave_reason.length > 70">
                            <p @click="toggle" class="font-medium text-orange-400 underline cursor-pointer">explore more...
                            </p>
                            <OverlayPanel ref="overlayPanel" style="height: 80px;">
                                {{ slotProps.data.leave_reason }}
                            </OverlayPanel>
                        </div>
                        <div v-else>
                            {{ slotProps.data.leave_reason }}
                        </div>
                    </template>
                </Column>
                <Column field="reviewer_name" header="Approver Name"></Column>
                <Column field="reviewer_comments" header="Approver Comments"></Column>

                <Column field="status" header="Status" icon="pi pi-check">
                    <template #body="{ data }">
                        <span :class="'customer-badge status-' + data.status">{{ data.status }}</span>
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <Dropdown v-model="filterModel.value" @click="filterCallback()" :options="statuses"
                            placeholder="Select" class="p-column-filter" :showClear="true">
                            <template #value="slotProps">
                                <span :class="'customer-badge status-' + slotProps.value" v-if="slotProps.value">{{
                                    slotProps.value }}</span>
                                <span v-else>{{ slotProps.placeholder }}</span>
                            </template>
                            <template #option="slotProps">
                                <span :class="'customer-badge status-' + slotProps.option">
                                    {{
                                    slotProps.option
                                }}</span>
                            </template>
                        </Dropdown>
                    </template>
                </Column>

                <Column field="" header="Action" style="min-width: 15rem;">
                    <template #body="slotProps">
                        <span v-if="slotProps.data.status == 'Pending'">
                            <Button type="button" icon="pi pi-check-circle"
                                class="p-button-success text-white Button py-2.5" label="Approve"
                                @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2em" />
                            <Button type="button" icon="pi pi-times-circle" class="text-white p-button-danger Button"
                                label="Reject" style="margin-left: 8px; height: 2em"
                                @click="showConfirmDialog(slotProps.data, 'Reject')" />
                        </span>
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>

    <!-- <h4 v-for="Employee_Avatar  in Employee_Avatar" :key="Employee_Avatar.type"
   style="height: 50px;width: 50px;border-radius: 50%;text-align: center;" class="Employee_Avatar.color">{{Employee_Avatar.data}}</h4> -->
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import moment from "moment";

const Leave_data = ref();
const Employee_Avatar = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
const confirm = useConfirm();
const toast = useToast();
const loading = ref(true);
const overlayPanel = ref();
const toggle = (event) => {
    overlayPanel.value.toggle(event);
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

onMounted(() => {
    let url_org_leave =
        window.location.origin + "/fetch-leaverequests/org/Approved,Rejected,Pending";

    console.log("Fetching ORG LEAVE from url : " + url_org_leave);

    axios.get(url_org_leave).then((response) => {
        //  Leave_data.value =Object.values(response.data['employee_avatar'])

        //  Employee_Avatar.value=Object.values(Leave_data.employee_avatar)
        Leave_data.value = response.data;
        console.log("org_Leave_history" + Leave_data.value);

        loading.value = false;

        console.log(
            "Response Data ORG Leave History : " + Leave_data.value["reviewer_avatar"]
        );
    });
});

const formatDate = (value) => {
    return value.toLocaleDateString("es-PE", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
    });
};

function showConfirmDialog(selectedRowData, status) {
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

    canShowLoadingScreen.value = true;

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
    console.log("currentlySelectedStatus : " + currentlySelectedStatus);

    // axios.post(window.location.origin + '/reimbursements-approve-reject', {
    //     reimbursement_id: currentlySelectedRowData.id,
    //     status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus =="Reject" ? "Rejected" : currentlySelectedStatus ,
    //     reviewer_comments: ''
    // })
    // .then((response) => {
    //     console.log(response);

    //     canShowLoadingScreen.value = false;

    //     toast.add({severity:'info', summary: 'Info', detail:'Success', life: 3000});
    //     ajax_GetReimbursementData();

    //     resetVars();
    // })
    // .catch((error) => {

    //     canShowLoadingScreen.value = false;
    //     resetVars();

    //     console.log(error.toJSON());
    // });
}
</script>

<style lang="scss">
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

.p-datatable .p-datatable-tbody>tr>td:nth-child(1) {
    width: 200px;
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
    width: 44%;
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

.p-button-success span {
    color: #fff !important;
}
</style>
