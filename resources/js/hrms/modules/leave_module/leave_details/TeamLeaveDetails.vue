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
                      <div id="team_leaveHistory" class="custom_gridJs"></div>

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

const leaves = ref();
const leave_types = ref();
const leave_data = ref();
const columns = ref();
const url = ref();
const loading = ref(true);

const filters = ref({
  employee_name: {
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
      matchMode: FilterMatchMode.EQUALS,
      matchMode: FilterMatchMode.CONTAINS,
  },
});

onMounted(() => {
  let currentLoggedInUserID = null;

  axios.get(window.location.origin + "/currentUser").then((response) => {
      currentLoggedInUserID = response.data;

      axios.post(url_team_leave, { user_id: currentLoggedInUserID }).then((response) => {
          leaves.value = Object.values(response.data);
          leave_types.value = Object.values(response.data.leave_types);
          leave_data.value = Object.values(response.data.employees);
          loading.value = false;

          //TODO : Need to fetch all the leaves types from the backend
          //columns.value = Object.values(response.data.array_leave_details);

          console.log(
              "Response Data Team Leave: " + JSON.stringify(Object.values(response.data))
          );
      });
  });

  let url_team_leave = window.location.origin + "/fetch-team-leaves-balance/";

  console.log("Fetching Team LEAVE from url : " + url_team_leave);
});
</script>