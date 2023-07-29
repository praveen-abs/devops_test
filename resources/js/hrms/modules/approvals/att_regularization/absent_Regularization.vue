<template>
    <div>
        <DataTable :value="arrayAbsent" :paginator="true" :rows="10" dataKey="id"
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
                            class="p-2 w-3 h-18 text-semibold rounded-full bg-blue-900 text-white">{{
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




            <Column class="font-bold" field="attendance_date" header="Attendance Date">
                <template #body="slotProps">
                    {{ dayjs(slotProps.data.attendance_date).format('DD-MMM-YYYY') }}
                </template>

            </Column>

            <Column class="font-bold" field="regularization_type" header="Regularization Type"> </Column>
            <Column class="font-bold" field="checkin_time" header="Checkin Time"> </Column>
            <Column class="font-bold" field="checkout_time" header="Checkout Time"> </Column>
            <Column class="font-bold" field="reason" header="Reason"> </Column>
            <Column class="font-bold" field="custom_reason" header="Custom Reason"> </Column>

            <Column class="font-bold" field="reviewer_comments" header="Reviewer Comments"> </Column>
            <Column class="font-bold" field="reviewer_reviewed_date" header="Reviewed Date"> </Column>
            <Column class="font-bold" field="status" header="Status">
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
            <Column class="font-bold" field="" header="Action">
                <template #body="slotProps">
                    <!-- <Button icon="pi pi-check" class="p-button-success"  @click="confirmDialog(slotProps.data,'Approved')" label="Approval" />
                <Button icon="pi pi-times" class="p-button-danger" @click="confirmDialog(slotProps.data,'Rejected')" label="Rejected" /> -->
                    <span style="width: 250px;display: block;" v-if="slotProps.data.status == 'Pending'">
                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approval"
                            @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2em" />
                        <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Rejected"
                            style="margin-left: 8px; height: 2em" @click="showConfirmDialog(slotProps.data, 'Reject')" />
                    </span>
                </template>

            </Column>



        </DataTable>

        <Dialog header="Confirmation" v-model:visible="canShowConfirmation"
            :breakpoints="{ '960px': '80vw', '640px': '90vw' }" :style="{ width: '380px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{ currentlySelectedStatus }}?</span>
                <div class="w-full d-flex justify-center mt-12">
                    <Textarea v-model="reviewer_comment" v-if="reject == 'Reject'" rows="3" cols="30"
                        class="border rounded-md" />
                </div>

            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processApproveReject" class="p-button-text" autofocus />
                <Button label="No" icon="pi pi-times" @click="canShowConfirmation = false" class="p-button-text" />
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
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useNow, useDateFormat } from '@vueuse/core'

import dayjs from 'dayjs';
import { Service } from "../../Service/Service";

const arrayAbsent = ref();
const service = Service();
const swal = inject("$swal");



const canShowConfirmation = ref(false);
const canShowLoadingScreen = ref(false);
const reject = ref('');
const reviewer_comment = ref();

let currentlySelectedStatus = null;
let currentlySelectedRowData = null;

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


onMounted(() => {
    getAbsentRegularization();
})

async function getAbsentRegularization() {

    await axios.get('/fetch-absent-regularization-data').then((res) => {
        arrayAbsent.value = res.data;
        console.log(arrayAbsent.value);
    }).finally(() => {

    })

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

function showConfirmDialog(selectedRowData, status) {
    canShowConfirmation.value = true;
    currentlySelectedStatus = status;
    reject.value = status;

    currentlySelectedRowData = selectedRowData;

    console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
}

function hideConfirmDialog() {
    canShowConfirmation.value = false;
}

function processApproveReject() {
    hideConfirmDialog(false);

    canShowLoadingScreen.value = true;

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

    axios
        .post('/approveRejectAbsentRegularization', {
            record_id: currentlySelectedRowData.id,
            user_code: service.current_user_code,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            status_text: reviewer_comment.value,
            user_code: service.current_user_code,
        })
        .then((response) => {
            console.log("Response : " + response);
            canShowLoadingScreen.value = false;
            if (response.data.status == 'success') {
                Swal.fire(
                    'Good job!',
                    'Your request has been recorded successfully',
                    'success'
                )
            }
            toast.add({
                severity: "error",
                summary: "Failure",
                detail: `${response.data.message}`,
                life: 3000,
            });
            ajax_GetAttRegularizationData();
        })
        .catch((error) => {
            canShowLoadingScreen.value = false;
        }).finally(() => {
            getAbsentRegularization();
            reviewer_comment.value = null
        })
}


</script>
