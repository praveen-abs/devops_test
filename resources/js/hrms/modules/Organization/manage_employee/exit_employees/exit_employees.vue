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

    <div>
      <DataTable :value="manageEmployeesStore.exit_employees_data" :paginator="true" :rows="10" dataKey="id"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"   :rowsPerPageOptions="[5, 10, 25]"
        v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
        <template #empty> No customers found. </template>
        <template #loading> Loading customers data. Please wait. </template>

        <Column class="font-bold"  field="emp_name" header="Employee Name">
          <template #body="slotProps">
            {{ slotProps.data.emp_name }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search" class="p-column-filter"
              :showClear="true" />
          </template>
        </Column>
        <Column field="emp_code" header="Employee Code" :sortable="true"></Column>
        <Column field="emp_designation" header="Designation" style="min-width: 15rem;"></Column>
        <Column field="l1_manager_name" header="Reporting Manager"></Column>
        <Column field="doj" header="DOJ"  style="min-width: 10rem;">
          <template #body="slotProps">{{ dayjs(slotProps.data.doj).format('DD-MMM-YYYY') }}</template>
        </Column>
        <Column field="blood_group_id" header="Blood Group"></Column>
        <Column field="profile_completeness" header="Profile Completeness">
          <template #body="slotProps">
            <ProgressBar :value="slotProps.data.profile_completeness"></ProgressBar>
          </template>
        </Column>
        <Column field="enc_user_id" header="View Profile">
          <template #body="slotProps">
            <Button icon="pi pi-eye" severity="success" label="View" @click="openProfilePage(slotProps.data.enc_user_id)" class="btn btn-orange " style="height: 2em" raised />
          </template>
        </Column>
      </DataTable>
    </div>
  </div>
</template>
<script setup>
import dayjs from 'dayjs';

import { ref, onMounted } from "vue";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

import { useManageEmployeesStore } from '../manage_service'

const manageEmployeesStore = useManageEmployeesStore()


onMounted(() => {
  manageEmployeesStore.ajax_exit_employees_data()
});

let att_regularization = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
const confirm = useConfirm();
const toast = useToast();
// const loading = ref(true);

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

function openProfilePage(uid){
    window.location.href = "/pages-profile-new?uid="+uid;
}


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
  width: 20%;
}

// .main-content {
//   width: 110%;
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

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
  width: 55%;
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
