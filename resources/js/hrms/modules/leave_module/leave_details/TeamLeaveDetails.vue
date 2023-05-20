<template>
  <div class="card top-line">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
                  <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Team Leave Balance</h6>
              </div>
              <div>
                  <DataTable :value="leave_data" responsiveLayout="scroll" :paginator="true"
                      :rowsPerPageOptions="[5, 10, 25]"
                      currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" :rows="5"
                      v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name']"
                      style="white-space: nowrap;">
                      <Column class="font-bold" field="employee_name" header="Employee Name">
                          <template #body="slotProps">
                              {{ slotProps.data.employee_name }}
                          </template>
                          <template #filter="{ filterModel, filterCallback }">
                              <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search"
                                  class="p-column-filter" :showClear="true" />
                          </template>
                      </Column>
                      <Column v-for="leave_type of leave_types" :header="leave_type" :key="leave_type.id"
                          field="array_leave_details">
                          <template #body="{ data }">
                              {{ data.array_leave_details[leave_type] }}
                          </template>
                      </Column>
                  </DataTable>
              </div>
          </div>

      </div>

  </div>
  <div class="mt-3 row">
      <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 ">
          <div class="mb-0 card leave-history">
              <div class="card-body">
                  <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Team Leave history</h6>
                  <div class="table-responsive">
                    <div class="d-flex justify-content-end">
                        <label for="" class="my-2 text-lg font-semibold">Select Month</label>
                        <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="ManagerselectedLeaveDate"
                            style=" border: 1px solid orange; border-radius: 7px; height: 38px;" />
                        <Button class="h-10 mb-2 btn btn-orange" label="Submit"
                            @click="leaveModuleStore.getTeamLeaveHistory(ManagerselectedLeaveDate.getMonth() + 1, ManagerselectedLeaveDate.getFullYear(), statuses)" />
                    </div>

                      <div id="team_leaveHistory" class="custom_gridJs"></div>
                      <DataTable :value="leaveModuleStore.array_teamLeaveHistory" responsiveLayout="scroll" :paginator="true"
                      :rowsPerPageOptions="[5, 10, 25]"
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
                      <Column field="leave_reason" header="Leave Reason">
                        <template #body="slotProps">
                            <div
                              v-if="
                                slotProps.data.leave_reason &&
                                slotProps.data.leave_reason.length > 70
                              "
                            >
                              <p
                                @click="toggle"
                                class="font-medium text-orange-400 underline cursor-pointer"
                              >
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
                      <Column field="status" header="Status">
                        <template #body="{ data }">
                            <span :class="'customer-badge status-' + data.status">{{
                              data.status
                            }}</span>
                          </template>
                          <template #filter="{ filterModel, filterCallback }">
                            <Dropdown
                              v-model="filterModel.value"
                              @change="filterCallback()"
                              :options="statuses"
                              placeholder="Select"
                              class="p-column-filter"
                              :showClear="true"
                            >
                              <template #value="slotProps">
                                <span
                                  :class="'customer-badge status-' + slotProps.value"
                                  v-if="slotProps.value"
                                  >{{ slotProps.value }}</span
                                >
                                <span v-else>{{ slotProps.placeholder }}</span>
                              </template>
                              <template #option="slotProps">
                                <span :class="'customer-badge status-' + slotProps.option">
                                  {{ slotProps.option }}</span
                                >
                              </template>
                            </Dropdown>
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


const leaves = ref();
const leave_types = ref();
const leave_data = ref();
const columns = ref();
const url = ref();
const loading = ref(true);
const teamleavehistory = ref();
const ManagerselectedLeaveDate = ref();

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

   await leaveModuleStore.getTeamLeaveHistory(dayjs().month()+1 , dayjs().year() , ["Approved", "Pending", "Rejected"]);
//    isLoading.value = false;
});





// onMounted(() => {
//   let currentLoggedInUserID = null;

//   axios.get(window.location.origin + "/currentUser").then((response) => {
//       currentLoggedInUserID = response.data;

//       axios.post(url_team_leave, { user_id: currentLoggedInUserID }).then((response) => {
//           leaves.value = Object.values(response.data);
//           leave_types.value = Object.values(response.data.leave_types);
//           leave_data.value = Object.values(response.data.employees);
//           loading.value = false;

//           //TODO : Need to fetch all the leaves types from the backend
//           //columns.value = Object.values(response.data.array_leave_details);

//           console.log(
//               "Response Data Team Leave: " + JSON.stringify(Object.values(response.data))
//           );
//       });
//   });

//   let url_team_leave = window.location.origin + "/fetch-team-leaves-balance/";

//   console.log("Fetching Team LEAVE from url : " + url_team_leave);
// });
</script>
