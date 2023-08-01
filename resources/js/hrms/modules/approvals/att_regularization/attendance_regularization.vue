<template>
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
            :breakpoints="{ '960px': '80vw', '640px': '90vw' }" :style="{ width: '380px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-2 pi pi-exclamation-triangle text-red-600" style="font-size: 1.3rem" />
                <span class="my-auto">Are you sure you want to {{ currentlySelectedStatus }}?</span>
            </div>
            <div class="w-full flex justify-left p-2" v-if="reject == 'Reject'">
                <Textarea v-model="reviewer_comment" rows="3" cols="30" class="border rounded-md" />
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processApproveReject" class="p-button-text" autofocus />
                <Button label="No" icon="pi pi-times" @click="canShowConfirmation = false" class="p-button-text" />
            </template>
        </Dialog>

        <div>
            <DataTable :value="att_regularization" :paginator="true" :rows="10" dataKey="id"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]" sortField="attendance_date" :sortOrder="-1"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
                v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name', 'status']">
                <template #empty> No Employeee found. </template>
                <template #loading> Loading customers data. Please wait. </template>

                <Column class="font-bold" field="employee_name" header="Employee Name">
                    <template #body="slotProps">
                        <!-- <div class="flex justify-content-center align-items-center">
                            <p v-if="JSON.parse(slotProps.data.employee_avatar).type == 'shortname'" if
                                class="p-2 w-3 h-18 text-semibold rounded-full bg-blue-900 text-white">{{
                                    JSON.parse(slotProps.data.employee_avatar).data }} </p>

                            <img v-else class="rounded-circle img-md w-3 userActive-status profile-img"
                                style="height: 30px !important;"
                                :src="`data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`" srcset=""
                                alt="" />
                        </div> -->
                        <p class=" text-left pl-2">{{ slotProps.data.employee_name }} </p>
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                            class="p-column-filter" :showClear="true" />
                    </template>
                </Column>
                <Column field="attendance_date" header="Date" :sortable="true" style="min-width: 10rem;" >
                    <template #body="slotProps">
                        <h1 class="text-right "> {{ moment(slotProps.data.attendance_date).format('DD-MM-YYYY') }}</h1>
                    </template>
                </Column>
                <Column field="regularization_type" header="Type" style="min-width: 10rem;">
                    <template #body="slotProps">
                        <div class="text-center  p-2">
                            {{ slotProps.data.regularization_type }}
                        </div>
                    </template>

                </Column>
                <Column field="user_time" header="Actual Time" style="min-width: 10rem;"></Column>
                <Column field="regularize_time" header="Regularize Time" style="min-width: 10rem;"></Column>
                <Column field="reason_type" header="Reason" style="min-width: 18rem;">
                    <template #body="slotProps">
                        <span v-if="slotProps.data.reason_type == 'Others'">
                            {{ slotProps.data.custom_reason }}
                        </span>
                        <span v-else>{{ slotProps.data.reason_type }}</span>

                    </template>
                </Column>


                <Column field="reviewer_name" header="Approve Name">
                    <template #body="slotProps">
                        <p class="text-bold">{{ slotProps.data.reviewer_name ? slotProps.data.reviewer_name : '---' }}</p>
                    </template>
                </Column>
                <Column field="reviewer_comments" header="Approve Comments">
                    <template #body="slotProps">
                        <p class="text-bold">
                            {{ slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : '---' }}
                        </p>
                    </template>
                </Column>
                <Column field="reviewer_reviewed_date" header="Reviewed Date">
                    <template #body="slotProps">
                        <p class="text-bold">
                            {{ slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : '---' }}
                        </p>
                    </template>
                </Column>

                <Column field="status" header="Status" icon="pi pi-check">
                    <template #body="{ data }">
                        <Tag :value="data.status" :severity="getSeverity(data.status)" />
                    </template>
                    <template #filter="{ filterModel, filterCallback }">
                        <Dropdown v-model="filterModel.value" @change="filterCallback()" :options="statuses"
                            placeholder="Select" class="p-column-filter" :showClear="true">
                            <template #value="slotProps">
                                <span :class="'customer-badge status-' + slotProps.value" v-if="slotProps.value">{{
                                    slotProps.value
                                }}</span>
                                <span v-else>{{ slotProps.placeholder }}</span>
                            </template>
                            <template #option="slotProps">
                                <span :class="'customer-badge status-' + slotProps.option">{{
                                    slotProps.option
                                }}</span>
                            </template>
                        </Dropdown>
                    </template>
                </Column>
                <Column field="" header="Action">
                    <template #body="slotProps">
                        <span style="width: 250px;display: block;" v-if="slotProps.data.status == 'Pending'">
                            <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approval"
                                @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2em" />
                            <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Rejected"
                                style="margin-left: 8px; height: 2em"
                                @click="showConfirmDialog(slotProps.data, 'Reject')" />
                        </span>
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, inject, onUpdated } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import moment from "moment";
import { Service } from "../../Service/Service";

let att_regularization = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
const confirm = useConfirm();
const toast = useToast();
const reject = ref('');
const reviewer_comment = ref();
const service = Service();
const swal = inject("$swal");



onUpdated(() => {
    canShowConfirmation ? reviewer_comment.value = null : ''
})


const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    employee_name: {
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
    ajax_GetAttRegularizationData();
});

function ajax_GetAttRegularizationData() {
    canShowLoadingScreen.value = true
    let url = window.location.origin + "/fetch-att-regularization-data";
    // console.log("AJAX URL : " + url);
    axios.get(url).then((response) => {
        // console.log("Axios : " + response.data);
        att_regularization.value = Object.values(response.data);
    }).finally(() => {
        canShowLoadingScreen.value = false
    });
}

function showConfirmDialog(selectedRowData, status) {
    canShowConfirmation.value = true;
    currentlySelectedStatus = status;
    reject.value = status;
    currentlySelectedRowData = selectedRowData;
    // console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}

function hideConfirmDialog(canClearData) {
    canShowConfirmation.value = false;
    if (canClearData) resetVars();
}

function resetVars() {
    currentlySelectedStatus = "";
    currentlySelectedRowData = null;
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



function processApproveReject() {
    hideConfirmDialog(false);
    canShowLoadingScreen.value = true;
    // console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

    axios
        .post(window.location.origin + "/attendance-regularization-approvals", {
            record_id: currentlySelectedRowData.id,
            approver_user_code: service.current_user_code,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            status_text: reviewer_comment.value,

        })
        .then((response) => {
            // console.log("Response : " + response);
            if (response.data.status == 'success') {
                toast.add({
                    severity: "success",
                    summary: "Success",
                    detail: 'Your request has been recorded successfully',
                    life: 3000,
                });
            } else {
                Swal.fire(
                    'Failure',
                    `${response.data.message}`,
                    'error'
                )
            }

            resetVars();
        })
        .catch((error) => {
            canShowLoadingScreen.value = false;
            resetVars();
            // console.log(error.toJSON());
        }).finally(() => {
            reviewer_comment.value = null
            canShowLoadingScreen.value = false;
            ajax_GetAttRegularizationData();
        });
}
</script>


<style>
.page-content {
    padding: calc(30px + 1.5rem) calc(1.5rem / 2) 60px calc(1.5rem / 2);
}
</style>
