<template>
  <div>
    <!-- <ConfirmDialog></ConfirmDialog> -->
    <Toast />
    <Dialog
      header="Header"
      v-model:visible="loading"
      :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
      :style="{ width: '25vw' }"
      :modal="true"
      :closable="false"
      :closeOnEscape="false"
    >
      <template #header>
        <ProgressSpinner
          style="width: 50px; height: 50px"
          strokeWidth="8"
          fill="var(--surface-ground)"
          animationDuration="2s"
          aria-label="Custom ProgressSpinner"
        />
      </template>
      <template #footer>
        <h5 style="text-align: center">Please wait...</h5>
      </template>
    </Dialog>
    <Dialog
      header="Header"
      v-model:visible="canShowLoadingScreen"
      :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
      :style="{ width: '25vw' }"
      :modal="true"
      :closable="false"
      :closeOnEscape="false"
    >
      <template #header>
        <ProgressSpinner
          style="width: 50px; height: 50px"
          strokeWidth="8"
          fill="var(--surface-ground)"
          animationDuration="2s"
          aria-label="Custom ProgressSpinner"
        />
      </template>
      <template #footer>
        <h5 style="text-align: center">Please wait...</h5>
      </template>
    </Dialog>

    <Dialog
      header="Confirmation"
      v-model:visible="canShowConfirmation"
      :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
      :style="{ width: '350px' }"
      :modal="true"
    >
      <div class="confirmation-content">
        <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
        <span>Proceed to save the shift details?</span>
      </div>
      <template #footer>
        <Button
          label="Yes"
          icon="pi pi-check"
          @click="saveWorkShiftDetails()"
          class="p-button-text"
          autofocus
        />
        <Button
          label="No"
          icon="pi pi-times"
          @click="hideConfirmDialog(true)"
          class="p-button-text"
        />
      </template>
    </Dialog>

    <div>
      <span>Shift Name </span>
      <span><InputText type="text" v-model="txt_shift_name" /></span>
      <br />
    </div>
    <div>
      <DataTable
        :value="att_emp_details"
        v-model:selection="selectedEmployees"
        :paginator="true"
        :rows="10"
        dataKey="emp_code"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
        v-model:filters="filters"
        filterDisplay="menu"
        :loading="loading2"
        :globalFilterFields="['name', 'status']"
      >
        <template #empty> No Employee found </template>
        <template #loading> Loading employee data. Please wait. </template>
        <Column selectionMode="multiple" headerStyle="width: 1em"></Column>
        <Column headerStyle="width: 20em" field="emp_code" header="Employee ID">
          <template #body="slotProps">
            {{ slotProps.data.emp_code }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText
              v-model="filterModel.value"
              @input="filterCallback()"
              placeholder="Search"
              class="p-column-filter"
              :showClear="true"
            />
          </template>
        </Column>
        <Column headerStyle="width: 20em" field="employee_name" header="Employee Name">
          <template #body="slotProps">
            {{ slotProps.data.employee_name }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText
              v-model="filterModel.value"
              @input="filterCallback()"
              placeholder="Search"
              class="p-column-filter"
              :showClear="true"
            />
          </template>
        </Column>
        <Column headerStyle="width: 20em" field="designation" header="Designation">
          <template #body="slotProps">
            {{ slotProps.data.designation }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText
              v-model="filterModel.value"
              @input="filterCallback()"
              placeholder="Search"
              class="p-column-filter"
              :showClear="true"
            />
          </template>
        </Column>
        <Column headerStyle="width: 20em" field="department_name" header="Department">
          <template #body="slotProps">
            {{ slotProps.data.department_name }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText
              v-model="filterModel.value"
              @input="filterCallback()"
              placeholder="Search"
              class="p-column-filter"
              :showClear="true"
            />
          </template>
        </Column>
        <Column headerStyle="width: 5em" field="work_location" header="Location">
          <template #body="slotProps">
            {{ slotProps.data.work_location }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText
              v-model="filterModel.value"
              @input="filterCallback()"
              placeholder="Search"
              class="p-column-filter"
              :showClear="true"
            />
          </template>
        </Column>
      </DataTable>
      <Button label="Assign" @click="showConfirmDialog()" />
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import dateFormat, { masks } from "dateformat";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

let att_emp_details = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
let selectedEmployees = ref();
let txt_shift_name = ref();
const confirm = useConfirm();
const toast = useToast();

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS },
  emp_code: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },
  employee_name: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },
  designation: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },
  department_name: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },
  location: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },
});

const loading = ref(true);

let currentlySelectedStatus = null;
let currentlySelectedRowData = null;

onMounted(() => {
  ajax_GetEmployeeDetails();
});

function onClickGetEmployees() {
  console.log(
    "onClickGetEmployees() button clicked : Shift Name :: " + txt_shift_name.value
  );
  console.log("Selected Employees : " + JSON.stringify(selectedEmployees.value));
}

function ajax_GetEmployeeDetails() {
  let url = window.location.origin + "/attendance_settings/fetch-emp-details";

  console.log("AJAX URL : " + url);

  axios.get(url).then((response) => {
    console.log("Axios : " + response.data);
    att_emp_details.value = response.data;
    loading.value = false;
  });
}

function showConfirmDialog() {
  canShowConfirmation.value = true;

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

function saveWorkShiftDetails() {
  hideConfirmDialog(false);

  canShowLoadingScreen.value = true;

  console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

  //Shift name
  //Selected employees
  axios
    .post(window.location.origin + "/attendance_settings/save-shiftdetails", {
      selectedEmployees: selectedEmployees.value,
      workshift_name: txt_shift_name.value,
    })
    .then((response) => {
      console.log(response);
      ajax_GetEmployeeDetails();

      canShowLoadingScreen.value = false;

      resetVars();
    })
    .catch((error) => {
      canShowLoadingScreen.value = false;
      resetVars();

      console.log(error.toJSON());
    });
}

function processApproveReject() {
  hideConfirmDialog(false);

  canShowLoadingScreen.value = true;

  console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

  axios
    .post(window.location.origin + "/attendance-approve-rejectleave", {
      leave_id: currentlySelectedRowData.id,
      status:
        currentlySelectedStatus == "Approve"
          ? "Approved"
          : currentlySelectedStatus == "Reject"
          ? "Rejected"
          : currentlySelectedStatus,
      leave_rejection_text: "",
    })
    .then((response) => {
      console.log(response);
      ajax_GetLeaveData();

      canShowLoadingScreen.value = false;

      resetVars();
    })
    .catch((error) => {
      canShowLoadingScreen.value = false;
      resetVars();

      console.log(error.toJSON());
    });
}
</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-datatable .p-datatable-thead > tr > th {
  text-align: center;
  padding: 1.3rem 1rem;
  border: 1px solid #dee2e6;
  border-top-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-left-width: 1px;
  border-width: 0 0 1px 0;
  font-weight: 600;
  color: #fff;
  background: #003056;
  transition: box-shadow 0.2s;
  font-size: 13px;
  .p-column-title {
    font-size: 13px;
  }
  .p-column-filter {
    width: 100%;
  }
  #pv_id_2 {
    height: 30px;
  }
  .p-fluid .p-dropdown .p-dropdown-label {
    margin-top: -10px;
  }
  .p-dropdown .p-dropdown-label.p-placeholder {
    margin-top: -12px;
  }

  .p-column-filter-menu-button {
    color: white;
    margin-left: 10px;
  }
  .p-column-filter-menu-button:hover {
    color: white;
    border-color: transparent;
    background: #023e70;
  }
}
.p-column-filter-overlay-menu
  .p-column-filter-constraint
  .p-column-filter-matchmode-dropdown {
  margin-bottom: 0.5rem;
  visibility: hidden;
  position: absolute;
}

.p-button .p-component .p-button-sm {
  background-color: #003056;
}

.p-datatable .p-datatable-tbody > tr {
  font-size: 13px;
  .employee_name {
    font-weight: bold;
    font-size: 13.5px;
  }
}
.p-datatable .p-datatable-tbody > tr > td {
  text-align: left;
  border: 1px solid #dee2e6;
  border-top-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-left-width: 1px;
  border-width: 0 0 1px 0;
  padding: 1rem 0.6rem;
}
.p-datatable .p-datatable-tbody > tr > td:nth-child(1) {
  width: 200px;
}
.p-datatable .p-datatable-tbody > tr > td:nth-child(3) {
  width: 150px;
}
.p-datatable .p-datatable-tbody > tr > td:nth-child(6) {
  width: 200px;
}
.main-content {
  width: 105%;
}

.pending {
  font-weight: 700;
}

.approved {
  font-weight: 700;
}
.p-button.p-component.p-button-success.Button {
  padding: 8px;
}

.rejected {
  font-weight: 700;
  color: #ff2634;
}
.p-button.p-component.p-button-danger.Button {
  padding: 8px;
}

.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
  color: red;
}
.p-button.p-component.p-confirm-dialog-accept {
  background-color: #003056;
}
.p-button.p-component.p-confirm-dialog-reject.p-button-text {
  color: #003056;
}
.p-column-filter-overlay-menu .p-column-filter-buttonbar {
  padding: 1.25rem;
  position: absolute;
  visibility: hidden;
}
.p-datatable .p-datatable-thead > tr > th .p-column-filter {
  width: 44%;
}
.p-datatable .p-datatable-thead > tr > th .p-column-filter-menu-button {
  color: white;
  border-color: transparent;
}
.p-column-filter-menu-button.p-column-filter-menu-button-open {
  background: none;
}

.p-column-filter-menu-button.p-column-filter-menu-button-active {
  background: none;
}

/* For Sort */

.p-datatable .p-sortable-column:not(.p-highlight):hover {
  background: #003056;
  color: white;
}
.p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
  color: white;
}
.p-datatable .p-sortable-column.p-highlight {
  background: #003056;
  color: white;
}

.p-datatable .p-sortable-column.p-highlight:hover {
  background: #003056;
  color: white;
}
.p-datatable .p-sortable-column:focus {
  box-shadow: none;
  outline: none;
  color: white;
}
.p-datatable .p-sortable-column .p-sortable-column-icon {
  color: white;
}
.pi-sort-amount-down::before {
  content: "\e9a0";
  color: white;
}
.pi-sort-amount-up-alt::before {
  content: "\e9a2";
  color: white;
}
</style>
