<template>
  <div>
    <DataTable :value="leaves" :rows="5" :rowsPerPageOptions="[5, 10, 25]" :paginator="true" responsiveLayout="scroll"
      v-model:expandedRows="expandedRows" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
      @rowExpand="onRowExpand" @rowCollapse="onRowCollapse"
      paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
      v-model:filters="filters" filterDisplay="menu" :globalFilterFields="['name', 'status']">
      <Column expander style="width: 2rem;"/>
      <Column field="user_code" header="Employee Code"></Column>
      <Column field="name" header="Employee Name"></Column>
      <Column field="location" header="Location"></Column>
      <Column field="department" header="Department"></Column>
      <Column field="total_leave_balance" header="Total Leave Balance"></Column>

      <template #expansion="slotProps">
        <div class="p-3">
          <DataTable :value="slotProps.data.leave_balance_details">
            <Column field="leave_type" header="Leave Type"></Column>
            <Column field="opening_balance" header="Opening Balance "></Column>
            <Column field="avalied" header="Availed Leave"></Column>
            <Column field="closing_balance" header="Closing Balance "></Column>
          </DataTable>
        </div>
      </template>
    </DataTable>

    <Dialog header="Header" v-model:visible="loading" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '25vw'}" :modal="true" :closable="false" :closeOnEscape="false">
          <template #header>
              <ProgressSpinner style="width:50px;height:50px" strokeWidth="8" fill="var(--surface-ground)" animationDuration="2s" aria-label="Custom ProgressSpinner"/>
          </template>
          <template #footer>
              <h5 style="text-align: center;">Please wait...</h5>
          </template>
      </Dialog>


  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import axios from "axios";

const leaves = ref();
const leave_types = ref();
const leave_data = ref();


const columns = ref();
const url = ref();
const loading = ref(true);
const expandedRows = ref([]);
const selectedAllEmployee = ref();


onMounted(() => {
  let url_org_leave = window.location.origin + "/fetch-org-leaves-balance";

  console.log("Fetching ORG LEAVE from url : " + url_org_leave);

  //leaves.value = values().data;
  //console.log("Ref data : "+JSON.stringify(values().data));

  axios.get(url_org_leave).then((response) => {
    console.log(response.data);
    leaves.value = response.data;
  }).finally(()=>{
    loading.value = false
  });
});
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-datatable .p-datatable-thead>tr>th {
  text-align: center;
  padding: 1rem 1rem;
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
  //   width: 200px;
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
-
