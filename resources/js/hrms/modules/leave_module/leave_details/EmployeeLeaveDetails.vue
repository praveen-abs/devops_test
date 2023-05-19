<template>
    <div class="mb-3 tw-card">
        <div class="mb-2 row">
            <div class="col-sm-6 col-xl-6 col-md-6 col-lg-6">
                <h6 class="text-lg font-semibold text-gray-900 modal-title">Leave Balance</h6>
            </div>
            <div class="col-6 justify-content-end d-flex">
                <!-- <div class="pendingLeave_notify me-3" >
                  <button class="btn btn-border-primary " data-bs-target="#leavepending_modal" data-bs-toggle="modal" >
                      Pending
                      </button>
                      <span class="badge badge-soft-light rounded-circle fs-13 bg-danger" >
                          0 </span>
                          </div> -->
            </div>
        </div>


        <!-- <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 xl:grid-cols-3" > -->

        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div class="tw-card dynamic-card ">
                <div class="text-center">
                    <p class="mb-2 text-base font-semibold ">
                        <!-- {{ $key }} -->
                    </p>
                    <h6 class="mb-0 text-sm font-semibold">
                        <!-- {{ $value }} -->
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="tw-card ">
        <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Leave Availed</h6>
        <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4"
            style="display: grid;">
            <div class="bg-indigo-100 border-l-4 border-indigo-300 tw-card ">
                <div class="text-center">
                    <p class="mb-2 text-base font-semibold ">
                        <!-- {{ $Leave_type }} -->
                    </p>
                    <h6 class="mb-0 text-base font-semibold">
                        <!-- {{ $balance }} -->
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 row">
        <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
            <div class="mb-0 card leave-history">
                <div class="card-body">
                    <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Leave history</h6>

                    <div class="table-responsive">

                        <DataTable :paginator="true" :rows="5" dataKey="id" :rowsPerPageOptions="[5, 10, 25]"
                            paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                            responsiveLayout="scroll"
                            currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
                            v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name', 'status']">
                            <template #empty> No Employee data..... </template>
                            <template #loading> Loading customers data. Please wait. </template>
                            <Column field="employee_name" header="Employee Name">
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
                                    <div v-if="slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70">
                                        <p @click="toggle" class="font-medium text-orange-400 underline cursor-pointer">
                                            explore more...
                                        </p>
                                        <OverlayPanel ref="overlayPanel" style="height: 80px;">
                                            {{ slotProps.data.leave_reason }}
                                        </OverlayPanel>
                                    </div>
                                    <div v-else>
                                        {{ slotProps.data.leave_reason ?? '' }}
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
                                            <span :class="'customer-badge status-' + slotProps.value"
                                                v-if="slotProps.value">{{
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
                                        <Button type="button" icon="pi pi-times-circle"
                                            class="text-white p-button-danger Button" label="Reject"
                                            style="margin-left: 8px; height: 2em"
                                            @click="showConfirmDialog(slotProps.data, 'Reject')" />
                                    </span>
                                </template>
                            </Column>
                        </DataTable>
                        <!-- <div id="emp_leaveHistory" class="custom_gridJs"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import moment from "moment";
import {useLeaveModuleStore} from '../LeaveModuleService'


const useLeaveStore = useLeaveModuleStore()

const overlayPanel = ref();
const toggle = (event) => {
    overlayPanel.value.toggle(event);
}

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

</script>