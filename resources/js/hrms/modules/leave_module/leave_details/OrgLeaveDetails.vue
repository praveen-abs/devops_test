<template>
    <div class="card top-line">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
                    <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Org Leave Balance</h6>
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
                    <h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Org Leave history</h6>
                    <div class="table-responsive">
                      <div class="d-flex justify-content-end">
                          <label for="" class="my-2 text-lg font-semibold">Select Month</label>
                          <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="selectedLeaveDate"
                              style=" border: 1px solid orange; border-radius: 7px; height: 38px;" />
                          <Button class="h-10 mb-2 btn btn-orange" label="Submit"
                              @click="leaveModuleStore.getAllEmployeesLeaveHistory(selectedLeaveDate.getMonth() + 1, selectedLeaveDate.getFullYear(), statuses)" />
                      </div>
                        <DataTable :value="leaveModuleStore.array_orgLeaveHistory" responsiveLayout="scroll" :paginator="true"
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
                      <Column field="total_leave_datetime" header="Total Leave Days">

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

                      <Column field="" header="Action" style="min-width: 15rem">
                                <template #body="slotProps">
                                    <Button type="button" icon="" class=" text-white Button py-2.5"
                                        label="View" @click="leaveModuleStore.getLeaveDetails(slotProps.data)"
                                        style="height: 2em" />
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

     await leaveModuleStore.getAllEmployeesLeaveHistory(dayjs().month()+1 , dayjs().year() , ["Approved", "Pending", "Rejected"]);
     console.log("Org Leave details : "+leaveModuleStore.array_orgLeaveHistory);
  //    isLoading.value = false;
  });


  </script>
