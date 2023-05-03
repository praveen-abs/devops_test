<template>
  <div>
    <!-- <ConfirmDialog></ConfirmDialog> -->
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
    <Dialog header="Error" v-model:visible="canShowErrorResponseScreen"
      :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
      <div class="confirmation-content">
        <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
        <span>Error while processing the request : {{  responseErrorMessage }}</span>
      </div>
      <template #footer>
        <Button label="Ok" icon="pi pi-check" autofocus />
      </template>
    </Dialog>
    <div>
      <DataTable :value="att_leaves" :paginator="true" :rows="10" dataKey="id" :rowsPerPageOptions="[5, 10, 25]"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
        v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']"
        style="white-space: nowrap;">
        <template #empty> No Employee found </template>
        <template #loading> Loading customers data. Please wait. </template>

        <Column class="font-bold" field="employee_name" header="Employee Name" style="min-width: 18em;">
          <template #body="slotProps">
            {{ slotProps.data.employee_name }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search" class="p-column-filter"
              :showClear="true" />
          </template>
        </Column>
        <Column field="leaverequest_date" header="Date" :sortable="true">
          <template #body="slotProps">
            <!-- {{ slotProps.data.reimbursement_date }} -->
            {{ dateFormat(slotProps.data.leaverequest_date, "dd-mm-yyyy, h:MM TT") }}
          </template>
        </Column>
        <Column field="leave_type" header="Leave Type"></Column>
        <Column field="start_date" header="Start Time">
          <template #body="slotProps">
            <!-- {{ slotProps.data.reimbursement_date }} -->
            {{ dateFormat(slotProps.data.start_date, "dd-mm-yyyy, h:MM TT") }}
          </template>
        </Column>
        <Column field="end_date" header="End Time">
          <template #body="slotProps">
            <!-- {{ slotProps.data.reimbursement_date }} -->
            {{ dateFormat(slotProps.data.end_date, "dd-mm-yyyy, h:MM TT") }}
          </template>
        </Column>
        <!-- <Column field="total_leave_datetime" header="Total"></Column> -->
        <Column field="leave_reason" header="Leave Reason" style="min-width: 25em;white-space:pre-wrap;">
          <template #body="slotProps">
            <div v-if="slotProps.data.leave_reason.length > 80">
              <p @click="toggle" class="font-medium text-orange-400 underline cursor-pointer">explore more...
              </p>
              <OverlayPanel ref="overlayPanel" style="height: 80px;">
                {{ slotProps.data.leave_reason }}
              </OverlayPanel>
            </div>
            <div v-else>
              {{ slotProps.data.leave_reason }}
            </div>
          </template>
        </Column>
        <Column field="reviewer_name" header="Approver Name"></Column>
        <Column field="reviewer_comments" header="Approver Comments"></Column>

        <Column field="status" header="Status" icon="pi pi-check">
          <template #body="{ data }">
            <Tag :value="data.status" :severity="getSeverity(data.status)" />
            <!-- <span :class="'customer-badge status-' + data.status">{{ data.status }}</span> -->
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <Dropdown v-model="filterModel.value" @change="filterCallback()" :options="statuses" placeholder="Select"
              class="p-column-filter" :showClear="true">
              <template #value="slotProps">
                <span :class="'customer-badge status-' + slotProps.value" v-if="slotProps.value">{{ slotProps.value
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

        <Column style="width: 300px" field="" header="Action">
          <template #body="slotProps">
            <!-- <Button icon="pi pi-check" class="p-button-success"  @click="confirmDialog(slotProps.data,'Approved')" label="Approval" />
                        <Button icon="pi pi-times" class="p-button-danger" @click="confirmDialog(slotProps.data,'Rejected')" label="Rejected" /> -->
            <span v-if="slotProps.data.status == 'Pending'">
              <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approve"
                @click="showConfirmDialog(slotProps.data, 'Approve')" style="height: 2em" />
              <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Reject"
                style="margin-left: 8px; height: 2em" @click="showConfirmDialog(slotProps.data, 'Reject')" />
            </span>
          </template>
        </Column>
      </DataTable>
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

let att_leaves = ref();
let canShowConfirmation = ref(false);
let canShowErrorResponseScreen = ref(false);
let responseErrorMessage = ref();
let canShowLoadingScreen = ref(false);
const confirm = useConfirm();
const toast = useToast();

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

const loading = ref(true);
const statuses = ref(["Pending", "Approved", "Rejected"]);

const overlayPanel = ref();
const toggle = (event) => {
    overlayPanel.value.toggle(event);
}

let currentlySelectedStatus = null;
let currentlySelectedRowData = null;

onMounted(() => {
  ajax_GetLeaveData();
});

function ajax_GetLeaveData() {
  let url = window.location.origin + "/fetch-leaverequests/org/Approved,Rejected,Pending";

  //console.log("AJAX URL : " + url);

  axios.get(url).then((response) => {
   // console.log("Axios : " + response.data);
    att_leaves.value = response.data;
    loading.value = false;
  });
}

function showConfirmDialog(selectedRowData, status) {
  canShowErrorResponseScreen.value =false;
  canShowConfirmation.value = true;
  currentlySelectedStatus = status;
  currentlySelectedRowData = selectedRowData;

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

function processApproveReject() {
  hideConfirmDialog(false);

  canShowLoadingScreen.value = true;

  //console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

  axios
    .post(window.location.origin + "/attendance-approve-rejectleave", {
      record_id: currentlySelectedRowData.id,
      status:
        currentlySelectedStatus == "Approve"
          ? "Approved"
          : currentlySelectedStatus == "Reject"
            ? "Rejected"
            : currentlySelectedStatus,
            review_comment: "",
    })
    .then((response) => {
      console.log(response);
      resetVars();
      canShowLoadingScreen.value = false;

      if(response.data.status == "success")
      {
            ajax_GetLeaveData();
      }
      else
      if(response.data.status == "failure")
      {
        canShowErrorResponseScreen.value = true;
        responseErrorMessage.value = response.data.message;
        return;
      }


    })
    .catch((error) => {
      canShowLoadingScreen.value = false;
      resetVars();

      console.log(error.toJSON());
    });
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

</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-datatable .p-datatable-thead>tr>th {
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

.p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
  margin-bottom: 0.5rem;
  visibility: hidden;
  position: absolute;
}

.p-button .p-component .p-button-sm {
  background-color: #003056;
}

.p-datatable .p-datatable-tbody>tr {
  font-size: 13px;

  .employee_name {
    font-weight: bold;
    font-size: 13.5px;
  }
}

.p-datatable .p-datatable-tbody>tr>td {
  text-align: left;
  border: 1px solid #dee2e6;
  border-top-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-left-width: 1px;
  border-width: 0 0 1px 0;
  padding: 1rem 0.6rem;
}

.p-datatable .p-datatable-tbody>tr>td:nth-child(1) {
  width: 200px;
}

.p-datatable .p-datatable-tbody>tr>td:nth-child(3) {
  width: 150px;
}

.p-datatable .p-datatable-tbody>tr>td:nth-child(6) {
  width: 200px;
}

// .main-content {
//   width: 105%;
// }

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

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
  width: 44%;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter-menu-button {
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

.p-datatable .p-datatable-thead>tr>th>.p-column-header-content>.p-column-title:nth-child(1) {
  margin-left: 30px;
}
</style>
