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
            <DataTable :value="leaveModuleStore.array_employeeLeaveHistory" :loading=isLoading :paginator="true" :rows="5"
              dataKey="id" :rowsPerPageOptions="[5, 10, 25]"
              paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
              responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
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
                      <span :class="'customer-badge status-' + slotProps.value" v-if="slotProps.value">{{ slotProps.value
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
                  <Button type="button" icon="pi pi-check-circle" class=" text-white Button py-2.5" label="View"
                    @click="leaveModuleStore.getLeaveDetails(slotProps.data)" style="height: 2em" />
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
    :breakpoints="{ '960px': '75vw', '640px': '90vw' }"  :style="{ width: '50vw', borderTop: '5px solid #002f56' }" :modal="true" :closable="false"
    :closeOnEscape="false">
    <template #header>
      <div>
        <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
          class="fs-5 fw-bold">
           Leave Details Request</h5>
      </div>
      </template>

      {{ leaveModuleStore.setLeaveDetails.emp_name }}

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
