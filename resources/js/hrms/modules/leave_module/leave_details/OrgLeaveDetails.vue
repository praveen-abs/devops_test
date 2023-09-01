<template>
    <div class="card top-line">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-content-center">
                    <h6 class="h-7 mt-3 text-lg font-semibold text-gray-900 modal-title">Org Leave Balance</h6>
                    <div class=" my-2 d-flex justify-content-between align-items-center">
                        <div></div>
                        <div class=" d-flex ">
                            <div class="">
                                <label for=" " class="text-lg font-semibold">Start Date</label>
                                <Calendar v-model="leaveModuleStore.selectedStartDate" dateFormat="dd-mm-yy" class="pl-3"
                                    style="  border-radius: 7px; height: 30px; width: 100px;" :maxDate="new Date()" />
                            </div>
                            <div class="">
                                <label for=" " class=" text-lg font-semibold mx-2 ">End Date</label>
                                <Calendar class="mr-3" v-model="leaveModuleStore.selectedEndDate" dateFormat="dd-mm-yy"
                                    style="  border-radius: 7px; height: 30px;width: 100px;" :maxDate="new Date()" />

                            </div>

                            <button class=" btn-orange py-1  px-4 rounded" style="height: 30px;"
                                @click="leaveModuleStore.getOrgLeaveBalance(dayjs(leaveModuleStore.selectedStartDate).format('YYYY-MM-DD'), dayjs(leaveModuleStore.selectedEndDate).format('YYYY-MM-DD'))">submit</button>
                        </div>

                    </div>
                </div>
                <div>



                    <DataTable :value="leaveModuleStore.array_orgLeaveBalance" :paginator="true" :rows="10" class=""
                        dataKey="user_code" @rowExpand="onRowExpand" @rowCollapse="onRowCollapse"
                        v-model:expandedRows="expandedRows" v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                        @select-all-change="onSelectAllChange" @row-select="onRowSelect" @row-unselect="onRowUnselect"
                        :rowsPerPageOptions="[5, 10, 25]"
                        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">

                        <Column :expander="true" />
                        <!-- <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column> -->
                        <Column field="user_code" header="Employee Id" sortable></Column>
                        <Column field="name" header="Employee Name">
                        </Column>
                        <Column field="location" header="Location" :sortable="false">
                        </Column>
                        <Column field="department" header="Department">

                        </Column>
                        <Column field="total_leave_balance" header="Total Leave Balance"></Column>
                        <template #expansion="slotProps">
                            <div>
                                <DataTable :value="slotProps.data.leave_balance_details" responsiveLayout="scroll"
                                    v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                                    @select-all-change="onSelectAllChange">
                                    <Column field="leave_type" header="Leave Type">{{ slotProps.data.leave_type }}</Column>
                                    <Column field="opening_balance" header="Opening Balance">

                                    </Column>
                                    <Column field="avalied" header="Avalied">

                                    </Column>

                                    <Column field="closing_balance" header="Closing Balance">

                                    </Column>
                                </DataTable>
                            </div>
                        </template>

                    </DataTable>


                </div>
            </div>

        </div>

    </div>


    <div class="mt-3 row">
        <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
            <div class="mb-0 card leave-history">
                <div class="card-body">
                    <div class="flex justify-between">
                        <div>
                            <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Org Leave history</h6>
                        </div>
                        <div class="d-flex justify-content-end">
                            <label for="" class="my-2 text-lg font-semibold">Select Month</label>
                            <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="selectedLeaveDate"
                                style="border-radius: 7px; height: 30px;"  @date-select="leaveModuleStore.getAllEmployeesLeaveHistory(selectedLeaveDate.getMonth() + 1, selectedLeaveDate.getFullYear(), statuses)"  />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <DataTable :value="leaveModuleStore.array_orgLeaveHistory" responsiveLayout="scroll"
                            :paginator="true" :rowsPerPageOptions="[5, 10, 25]"
                            currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" :rows="5"
                            v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name']"
                            style="white-space: nowrap;">
                            <template #empty> No Employee data..... </template>
                            <Column class="font-bold" field="employee_name" header="Employee Name">
                                <template #body="slotProps">
                                    {{ slotProps.data.employee_name }}
                                </template>
                                <template #filter="{ filterModel, filterCallback }">
                                    <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                                        class="p-column-filter" :showClear="true" />
                                </template>
                            </Column>
                            <Column field="leave_type" header="Leave Type">

                            </Column>
                            <Column field="start_date" header="Start Date">
                                <template #body="slotProps">
                                    {{ dayjs(slotProps.data.start_date).format('DD-MMM-YYYY') }}
                                </template>
                            </Column>
                            <Column field="end_date" header="End Date">
                                <template #body="slotProps">
                                    {{ dayjs(slotProps.data.end_date).format('DD-MMM-YYYY') }}
                                </template>
                            </Column>
                            <Column field="total_leave_datetime" header="Total Leave Days">

                            </Column>
                            <Column field="leave_reason" header="Leave Reason">
                                <template #body="slotProps">
                                    <div v-if="slotProps.data.leave_reason &&
                                        slotProps.data.leave_reason.length > 70
                                        ">
                                        <p @click="toggle" class="font-medium text-orange-400 underline cursor-pointer">
                                            More...
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
                            <Column field="status" header="Status">
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
                                                v-if="slotProps.value">{{ slotProps.value }}</span>
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
                                    <Button type="button" icon="" class=" text-white Button py-2.5" label="View"
                                        @click="leaveModuleStore.getLeaveDetails(slotProps.data)" style="height: 2em" />
                                </template>
                            </Column>
                        </DataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useLeaveModuleStore } from "../LeaveModuleService";
import dayjs from 'dayjs';

const leaveModuleStore = useLeaveModuleStore();


const leave_types = ref();
const leave_data = ref();
const loading = ref(true);
const selectedLeaveDate = ref();
const expandedRows = ref([]);
const selectedAllEmployee = ref();
const selectedDate = ref();

//   const filters = ref({
//     global: { value: null, matchMode: FilterMatchMode.CONTAINS },
//     name: {
//         value: null,
//         matchMode: FilterMatchMode.STARTS_WITH,
//         matchMode: FilterMatchMode.EQUALS,
//         matchMode: FilterMatchMode.CONTAINS,
//     },
//     status: { value: 'Pending', matchMode: FilterMatchMode.EQUALS },
// });

const filters = ref({
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
    await leaveModuleStore.getOrgLeaveBalance();

    await leaveModuleStore.getAllEmployeesLeaveHistory(dayjs().month() + 1, dayjs().year(), ["Approved", "Pending", "Rejected"]);
    console.log("Org Leave details : " + leaveModuleStore.array_orgLeaveHistory);
    //    isLoading.value = false;
});

// function getdateAndMonth(){
// }


</script>

{
    <!--

<template>
    <div class="card flex justify-content-center">
        <Calendar v-model="date" showIcon />
    </div>
</template>

<script setup>
import { ref } from "vue";

const date = ref();
</script>
     -->
}
