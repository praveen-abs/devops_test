<template>
    <LeaveBalance />
    <div class="mt-3 row">
        <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
            <div class="mb-0 card leave-history">
                <div class="card-body">
                    <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">
                        Leave history
                    </h6>
                    <div class="d-flex justify-content-end">
                        <label for="" class="my-2 text-lg font-semibold">Select Month</label>
                        <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="selectedLeaveDate"
                            style=" border: 1px solid orange; border-radius: 7px; height: 38px;" />
                        <Button class="h-10 mb-2 btn btn-orange" label="Submit"
                            @click="leaveModuleStore.getEmployeeLeaveHistory(selectedLeaveDate.getMonth() + 1, selectedLeaveDate.getFullYear(), statuses)" />
                    </div>


                    <div class="table-responsive">
                        <DataTable :value="leaveModuleStore.array_employeeLeaveHistory" :loading=isLoading :paginator="true"
                            :rows="5" dataKey="id" :rowsPerPageOptions="[5, 10, 25]"
                            paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                            responsiveLayout="scroll"
                            currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
                            v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name', 'status']">
                            <template #empty> No Employee data..... </template>
                            <template #loading> Loading customers data. Please wait. </template>
                            <Column field="leave_type" header="Leave Type" style="min-width: 8rem"></Column>
                            <Column field="start_date" header="Start Date" style="min-width: 8rem">
                                <template #body="slotProps">
                                    {{ dayjs(slotProps.data.start_date).format('DD-MMM-YYYY') }}
                                </template>
                            </Column>
                            <Column field="end_date" header="End Date" dataType="date" style="min-width: 8rem">
                                <template #body="slotProps">
                                    {{ dayjs(slotProps.data.end_date).format('DD-MMM-YYYY') }}
                                </template>
                            </Column>
                            <Column field="leave_reason" header="Leave Reason" style="min-width: 12rem">
                                <template #body="slotProps">
                                    <div v-if="slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70">
                                        <p @click="toggle" class="font-medium text-orange-400 underline cursor-pointer">
                                            explore more...
                                        </p>
                                        <OverlayPanel ref="overlayPanel" style="height: 80px">
                                            {{ slotProps.data.leave_reason }}
                                        </OverlayPanel>
                                    </div>
                                    <div v-else>
                                        {{ slotProps.data.leave_reason ?? "" }}
                                    </div>
                                </template>
                            </Column>
                            <Column field="reviewer_name" header="Approver Name"></Column>
                            <Column field="reviewer_comments" header="Approver Comments"></Column>

                            <Column field="status" header="Status" icon="pi pi-check">
                                <template #body="{ data }">
                                    <span :class="'customer-badge status-' + data.status">{{
                                        data.status
                                    }}</span>
                                </template>
                                <template #filter="{ filterModel, filterCallback }">
                                    <Dropdown v-model="filterModel.value" @change="filterCallback()" :options="statuses"
                                        placeholder="Select" class="p-column-filter" :showClear="true">
                                        <template #value="slotProps">
                                            <span :class="'customer-badge status-' + slotProps.value"
                                                v-if="slotProps.value">{{ slotProps.value
                                                }}</span>
                                            <span v-else>{{ slotProps.placeholder }}</span>
                                        </template>
                                        <template #option="slotProps">
                                            <span :class="'customer-badge status-' + slotProps.option">
                                                {{ slotProps.option }}</span>
                                        </template>
                                    </Dropdown>
                                </template>
                            </Column>

                            <Column field="" header="Action" style="min-width: 15rem">
                                <template #body="slotProps">
                                    <Button type="button" icon="pi pi-check-circle" class=" text-white Button py-2.5"
                                        label="View" @click="leaveModuleStore.getLeaveDetails(slotProps.data)"
                                        style="height: 2em" />
                                </template>
                            </Column>
                        </DataTable>
                        <!-- <div id="emp_leaveHistory" class="custom_gridJs"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Dialog header="Header" v-model:visible="leaveModuleStore.canShowLeaveDetails"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '50vw', borderTop: '5px solid #002f56' }"
        :modal="true" :closable="true" :closeOnEscape="true">
        <template #header>
            <div class="w-full ">
                <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                    class="fs-5 fw-bold">
                    Leave Details Request</h5>
            </div>
        </template>
        <div class="w-full">

            <div class="border w-full mt-5">
                <div class="p-3 pl-5 d-flex align-items-center border">
                    <div class="rounded-circle border d-flex justify-content-center align-items-center bg-orange-200"
                        style="width:80px ; height: 80px;">
                        <h1 class="fs-5 fw-bold">K K</h1>
                    </div>
                    <div class="ml-5">
                        <h1 class="fs-5 fw-bold mb-2">{{ leaveModuleStore.setLeaveDetails.name }}</h1>

                        <div>
                            <p class="fs-6 text-neutral-400 ">Requested on
                                {{ leaveModuleStore.setLeaveDetails.leaverequest_date }}</p>
                        </div>
                    </div>
                </div>
                <div class="border w-full d-flex py-4 px-4">
                    <div class=" shadow-sm  mx-2 p-1  rounded-lg">
                        <h1 class="text-center py-1 px-2 text-light rounded-top fw-bold" style="background-color: navy;">{{
                            dayjs(leaveModuleStore.setLeaveDetails.end_date).format('MMM') }}</h1>
                        <h1 class="text-center py-1 px-2 fs-5 fw-bold">{{
                            dayjs(leaveModuleStore.setLeaveDetails.end_date).format('DD') }}</h1>

                        <h1 class="text-center py-1 px-2 fs-6 fw-bold">{{
                            dayjs(leaveModuleStore.setLeaveDetails.end_date).format('dddd') }}</h1>
                    </div>
                    <div class="py-3">
                        <h1 class="fs- font-semibold">{{ leaveModuleStore.setLeaveDetails.total_leave_datetime }} Day of {{
                            leaveModuleStore.setLeaveDetails.leave_type }} <span class="font-semibold fs-6">({{leaveModuleStore.setLeaveDetails.leave_reason }})</span></h1>

                    </div>
                </div>
                <div class="border w-full py-4 px-4">
                    <h1 class="fs-5 fw-bold">Notified To:</h1>
                    <div class="card px-3 py-2 d-flex mt-3" style="min-width: 250px; max-width: 220px; display: flex;">
                        <div class="d-flex p-2 align-items-center">
                            <div class="rounded-circle bg-green-400 d-flex justify-content-center align-items-center"
                                style="width:40px ; height: 40px;">DK</div>
                            <div class="flex-column px-3">
                                <h1 class="fs-6 fw-bold ">{{ leaveModuleStore.setLeaveDetails.reviewer_name }}</h1>
                                <h1 class="py-2 text-neutral-400">Lorem, ipsum.</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border w-full  py-4 px-4 ">
                    <h1 class="fs-5 fw-bold">Approved by</h1>
                    <div class="card px-3 py-2 d-flex mt-3" style="min-width: 180px; max-width: 250px; display: flex;">
                        <div class="d-flex p-2 align-items-center">
                            <div class="rounded-circle bg-green-400 d-flex justify-content-center align-items-center"
                                style="width:40px ; height: 40px;"><i class="pi pi-check text-light"></i></div>
                            <div class="flex-column px-3">
                                <h1 class="fs-6 fw-bold ">{{ leaveModuleStore.setLeaveDetails.reviewer_name }}</h1>
                                <h1 class="py-2 text-neutral-400"> on {{ leaveModuleStore.setLeaveDetails.leaverequest_date }} </h1>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="my-4 mx-3">
                    <Textarea name="" id="" cols="80" rows="5" autoResize placeholder="Add Comment" />
                </div>
            </div>
        </div>
        <div class="text-end mx-4 my-4">
            <button class="btn btn-orange">Post</button>
        </div>
        <!-- {{ leaveModuleStore.setLeaveDetails }} -->
        <!-- {{ dayjs(slotProps.data.end_date).format('DD-MMM-YYYY') }} -->






    </Dialog>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import moment from "moment";
import { useLeaveModuleStore } from "../LeaveModuleService";
import LeaveBalance from "./EmployeeLeaveBalance.vue";
import dayjs from 'dayjs';

const leaveModuleStore = useLeaveModuleStore();
const isLoading = ref(true);

const overlayPanel = ref();
const selectedLeaveDate = ref();


const toggle = (event) => {
    overlayPanel.value.toggle(event);
};

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    status: { value: null, matchMode: FilterMatchMode.EQUALS },
});

const statuses = ref(["Pending", "Approved", "Rejected"]);

onMounted(async () => {
    // console.log( "Fetching leave details for current user : " +   leaveModuleStore.baseService.current_user_code );
    console.log(selectedLeaveDate.v);
    await leaveModuleStore.getEmployeeLeaveHistory(dayjs().month() + 1, dayjs().year(), ["Approved", "Pending", "Rejected"]);
    isLoading.value = false;
});



async function showLeaveDetails(leave_record_id) {
    console.log("Showing leave details for record_id : " + leave_record_id);

    await leaveModuleStore.getLeaveInformation(leave_record_id);
}
</script>
