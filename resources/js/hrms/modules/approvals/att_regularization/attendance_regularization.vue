<template>
<div>
    <Toast />
    <Dialog header="Header" v-model:visible="loading" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>
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
        <DataTable :value="att_regularization" :paginator="true" :rows="10" dataKey="id"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
            v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
            <template #empty> No Employeee found. </template>
            <template #loading> Loading customers data. Please wait. </template>

            <Column class="font-bold" field="employee_name" header="Employee Name">
                <template #body="slotProps">
                    <div class="flex justify-content-center align-items-center">
                        <p v-if="JSON.parse(slotProps.data.employee_avatar).type == 'shortname'" if
                            class="p-2 w-3 h-18 text-semibold rounded-full bg-blue-900 text-white" >{{
                                JSON.parse(slotProps.data.employee_avatar).data }} </p>

                        <img v-else class="rounded-circle img-md w-3 userActive-status profile-img"
                            style="height: 30px !important;"
                            :src="`data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`" srcset=""
                            alt="" />
                        <p class=" text-left pl-2">{{ slotProps.data.employee_name }} </p>
                    </div>
                </template>
                <template #filter="{ filterModel, filterCallback }">
                    <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                        class="p-column-filter" :showClear="true" />
                </template>
            </Column>
            <Column field="attendance_date" header="Date" :sortable="true" style="min-width: 10rem;" >
                <template #body="slotProps">
                    <h1 class="text-right ">     {{ moment(slotProps.data.attendance_date).format('DD-MM-YYYY') }}</h1>
                </template>
            </Column>
            <Column field="regularization_type" header="Type" style="min-width: 10rem;">
                <template  #body="slotProps">
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
            <Column field="reviewer_comments" header="Approve Comments"></Column>
            <Column field="reviewer_reviewed_date" header="Reviewed Date"></Column>

            <Column field="status" header="Status" icon="pi pi-check">
                <template #body="{ data }">
                    <Tag :value="data.status" :severity="getSeverity(data.status)" />
                </template>
                <!-- <template #body="{ data }">
        <span :class="'customer-badge status-' + data.status">{{ data.status }}</span>
      </template> -->
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
                    <!-- <Button icon="pi pi-check" class="p-button-success"  @click="confirmDialog(slotProps.data,'Approved')" label="Approval" />
                    <Button icon="pi pi-times" class="p-button-danger" @click="confirmDialog(slotProps.data,'Rejected')" label="Rejected" /> -->
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
import { ref, onMounted } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import moment from "moment";

let att_regularization = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
const confirm = useConfirm();
const toast = useToast();
const loading = ref(true);

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
    let url = window.location.origin + "/fetch-att-regularization-data";

    console.log("AJAX URL : " + url);

    axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        att_regularization.value = Object.values(response.data);
        loading.value = false;
    });
}

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

////PrimeVue ConfirmDialog code -- Keeping here for reference
//const confirm = useConfirm();

// function confirmDialog(selectedRowData, status) {
//     console.log("Showing confirm dialog now...");

//     confirm.require({
//         message: 'Are you sure you want to proceed?',
//         header: 'Confirmation',
//         icon: 'pi pi-exclamation-triangle',
//         accept: () => {
//             toast.add({severity:'info', summary:'Confirmed', detail:'You have '+status, life: 3000});
//         },
//         reject: () => {
//             console.log("Rejected");
//             //toast.add({severity:'error', summary:'Rejected', detail:'You have rejected', life: 3000});
//         }
//     });
// }

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

    axios
        .post(window.location.origin + "/attendance-regularization-approvals", {
            id: currentlySelectedRowData.id,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            status_text: "",
        })
        .then((response) => {
            console.log("Response : " + response);

            canShowLoadingScreen.value = false;

            toast.add({ severity: "success", summary: "Info", detail: "Success", life: 3000 });
            ajax_GetAttRegularizationData();

            resetVars();
        })
        .catch((error) => {
            canShowLoadingScreen.value = false;
            resetVars();

            console.log(error.toJSON());
        });
}
</script>