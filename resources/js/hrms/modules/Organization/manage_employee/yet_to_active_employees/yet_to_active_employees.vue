<template>
  <div>
    <!-- <ConfirmDialog></ConfirmDialog> -->
    <Toast />
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
    <!-- {{ manageEmployeesStore.yet_to_active_employees_data }} -->
    <div>
      <DataTable :value="manageEmployeesStore.yet_to_active_employees_data" :paginator="true" :rows="10" dataKey="id"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
        :rowsPerPageOptions="[5, 10, 25]" v-model:filters="filters" filterDisplay="menu" :loading="loading2"
        :globalFilterFields="['emp_name', 'emp_code', 'status']">
        <template #empty> No customers found. </template>
        <template #loading> Loading customers data. Please wait. </template>

        <Column class="font-bold" field="emp_name" header="Employee Name" style="min-width: 20rem;">
          <template #body="slotProps" >

            <div class=" d-flex justify-content-center align-items-center">

             <p v-if="JSON.parse(slotProps.data.emp_avatar).type =='shortname'" if class="p-2 w-2 h-18 text-semibold rounded-full bg-blue-900 text-white">{{ JSON.parse(slotProps.data.emp_avatar).data }} </p>

             <img v-else
             class="rounded-circle img-md w-2 userActive-status profile-img" style="height: 30px !important;"
             :src="`data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`" srcset="" alt="" />
             <p class=" text-left  pl-2">{{ slotProps.data.emp_name }} </p>
            </div>
             </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search" class="p-column-filter"
              :showClear="true" />
          </template>
        </Column>
        <Column field="emp_code" header="Employee Code">
          <template #body="slotProps">
            {{ slotProps.data.emp_code }}
          </template>
          <template #filter="{ filterModel, filterCallback }">
            <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search" class="p-column-filter"
              :showClear="true" />
          </template>
        </Column>
        <Column field="emp_designation" header="Designation" style="min-width: 15rem;"></Column>
        <Column field="reporting_manager_name" header="Reporting Manager"></Column>
        <Column field="doj" header="DOJ" style="min-width: 10rem;">
          <template #body="slotProps">{{ dayjs(slotProps.data.doj).format('DD-MMM-YYYY') }}</template>
        </Column>
        <!-- <Column field="blood_group_name" header="Blood Group"></Column> -->
        <Column field="profile_completeness" header="Profile Completeness">
          <template #body="slotProps">
            <ProgressBar  v-if="slotProps.data.profile_completeness <=39 "
                                :value="slotProps.data.profile_completeness" :class="[slotProps.data.profile_completeness <=39 ? 'progressbar' : '' ]" >
                            </ProgressBar>
                            <ProgressBar  class="progressbar_val2" v-if="slotProps.data.profile_completeness >=40 && slotProps.data.profile_completeness <=59"
                            :class="[slotProps.data.profile_completeness >=40 &&  slotProps.data.profile_completeness <=59]"  :value="slotProps.data.profile_completeness" >
                            </ProgressBar>

                            <ProgressBar class="progressbar_val3" v-if="slotProps.data.profile_completeness >=60"
                            :class="[slotProps.data.profile_completeness >=60]"
                                :value="slotProps.data.profile_completeness" >
                            </ProgressBar>
          </template>
        </Column>
        <Column field="is_onboarded" header="Onboarding Status">
          <template #body="slotProps">
            {{ slotProps.data.is_onboarded ? "Completed" : "Pending" }}
          </template>

        </Column>
        <Column field="doc_status" header="Docs Approval Status">
          <template #body="slotProps">
            {{
              slotProps.data.is_onboarded ? (slotProps.data.doc_status ? "Approved" : "Pending")
              : "Pending"

            }}
          </template>
        </Column>
        <Column field="enc_user_id" header="View Profile">
          <template #body="slotProps">
            <Button icon="pi pi-eye" severity="success" label="View" @click="openProfilePage(slotProps.data.enc_user_id)"
              class="btn btn-orange " style="height: 2em" raised />
          </template>
        </Column>
        <Column style="width: 300px" field="" header="Action">
          <template #body="slotProps">
            <!-- ACTIVATE button wont be shown if is_onboarded and doc_status are FALSE -->
            <div v-if="slotProps.data.is_onboarded && slotProps.data.doc_status">
              <Button icon="pi pi-check-circle" severity="success" label="Activate" class="p-button-success Button"
                @click="showConfirmDialog(slotProps.data, 'Active')" style="height: 2em" />
            </div>
            <div v-else>

            </div>
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
  manageEmployeesStore.ajax_yet_to_active_employees_data()
});

let att_regularization = ref();
let canShowConfirmation = ref(false);
let canShowLoadingScreen = ref(false);
const confirm = useConfirm();
const toast = useToast();
// const loading = ref(true);

function openProfilePage(uid) {
  window.location.href = "/pages-profile-new?uid=" + uid;
}

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS },
  emp_name: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },
  emp_code: {
    value: null,
    matchMode: FilterMatchMode.STARTS_WITH,
    matchMode: FilterMatchMode.EQUALS,
    matchMode: FilterMatchMode.CONTAINS,
  },

  status: { value: null, matchMode: FilterMatchMode.EQUALS },
});

const statuses = ref(["Pending", "Approved", "Rejected"]);

let currentlySelectedStatus = null;
let currentlySelectedRowData = null;


// function ajax_GetAttRegularizationData() {
//   let url = window.location.origin + "/fetch-att-regularization-data";

//   console.log("AJAX URL : " + url);

//   axios.get(url).then((response) => {
//     console.log("Axios : " + response.data);
//     att_regularization.value = response.data;
//     loading.value = false;
//   });
// }

function showConfirmDialog(selectedRowData, status) {
  let user_code = selectedRowData.emp_code
  let emp_status = selectedRowData.emp_status
  console.log(useManageEmployeesStore.emp_status);
  console.log(selectedRowData.emp_status);

  canShowConfirmation.value = true;
  currentlySelectedStatus = status;
  currentlySelectedRowData = selectedRowData;
  console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
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

  console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));


  axios
    .post(window.location.origin + "/onboarding/updateEmployeeActive", {
      user_code: currentlySelectedRowData.emp_code,
      active_status: 1
    })
    .then((response) => {
      console.log("Response : " + response);



      toast.add({ severity: "success", summary: "Activated", detail: `${currentlySelectedRowData.emp_name} Activated Successfully`, life: 3000 });
      //manageEmployeesStore.ajax_yet_to_active_employees_data();
      //    window.location.reload();

      resetVars();
    })
    .catch((error) => {
      canShowLoadingScreen.value = false;
      resetVars();

      //   console.log(error.toJSON());
    }).finally(() => {
      manageEmployeesStore.ajax_yet_to_active_employees_data();
      manageEmployeesStore.getActiveEmployees();

      canShowLoadingScreen.value = false;
    });
}
</script>
