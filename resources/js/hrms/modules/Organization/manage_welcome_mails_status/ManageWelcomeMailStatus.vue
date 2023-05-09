<template>
    {{ ManageWelcomeMailStatusStore.array_employees_list }}

    <DataTable :value="ManageWelcomeMailStatusStore.array_employees_list" :paginator="true" :rows="10" dataKey="id"
    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
    :rowsPerPageOptions="[5, 10, 25]"
    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
    v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
    <Column headerStyle="width: 3rem"></Column>
    <Column field="empcode" header="Employee code"  headerStyle="width: 3rem">
    </Column>
    <Column field="empname" header="Employee Name"></Column>
    <Column field="personal mail" header="Personal Mail"></Column>
    <Column field="welcome_mail_status" header="Welcome Mail Status">
    <template #body="slotProps">
        <div>
            <Button @click="welcome_mail_status_view_btn(slotProps.data)" label="Send mail" class="btn btn-primary" />
        </div>
    </template>
    </Column>
    <Column field="onboard_docs_approval_mail_status" header="Onboard Document Approval Mail Status">
        <template #body="slotProps">
            <div v-if="slotProps.data">
          </div>
        </template>
        <!-- onboard_docs_approval_mail_status -->
    </Column>
    <!-- <Column field="" header="Mail Status">  </Column> -->
    <Column field="acc_activation_mail_status" header="Activation Mail Status"></Column>

</DataTable>


</template>

<script setup>
import { ref, onMounted, reactive, computed } from "vue";
import { useManageWelcomeMailStatusStore } from './ManageWelcomeMailStatusService';

const ManageWelcomeMailStatusStore = useManageWelcomeMailStatusStore();



// const canShowPayslipHTMLView = ref(false);
// const show_dialogconfirmation = ref(false);
// const show_releasePayslip_dialogconfirmation = ref(false);
// const show_downloadPayslip_dialogconfirmation = ref(false);

// const selectedPayRollDate = ref();

// const selectedUserCode = ref();



onMounted( () => {
    ManageWelcomeMailStatusStore.getManageWelcomeMailStatus()

});

// const is_released = computed(() => {
//     if (managePayslipStore.is_released == 1) return "Released";
// })

// async function showPaySlipHTMLView(selected_user_code) {
//     console.log("Showing payslip html for (user_code, month): " + selected_user_code + " , " + parseInt(managePayslipStore.selectedPayRollDate.getMonth() + 1));

//     await managePayslipStore.getEmployeePayslipDetailsAsHTML(selected_user_code, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());

//     canShowPayslipHTMLView.value = true;

// }

// function showConfirmationDialog(selected_user_code) {
//     selectedUserCode.value = selected_user_code;

//     show_dialogconfirmation.value = true;

// }


// function showReleasePayslipConfirmationDialog(selected_user_code) {
//     selectedUserCode.value = selected_user_code;

//     show_releasePayslip_dialogconfirmation.value = true;
// }
// function showdownloadPayslipConfirmationDialog(selected_user_code) {
//     selectedUserCode.value = selected_user_code;

//     show_downloadPayslip_dialogconfirmation.value = true;
// }

// async function sendMail(selectedUserCode) {

//     await managePayslipStore.sendMail_employeePayslip(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
//     show_dialogconfirmation.value = false;

// }

// async function updatePayslipReleaseStatus(selectedUserCode) {
//     await managePayslipStore.updatePayslipReleaseStatus(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear(), 1);
//     show_releasePayslip_dialogconfirmation.value = false;

// }
// async function downloadPayslipReleaseStatus(selectedUserCode) {
//     await managePayslipStore.downloadPayslipReleaseStatus(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
//     show_downloadPayslip_dialogconfirmation.value = false;

// }



</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-dialog-mask .p-component-overlay .p-component-overlay-enter {
    z-index: 0 !important;
}

.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1rem 0.5rem;
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


{

<!--



<template>
    <div class="flex card justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="visible = true" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <template #footer>
                <Button label="No" icon="pi pi-times" @click="visible = false" text />
                <Button label="Yes" icon="pi pi-check" @click="visible = false" autofocus />
            </template>
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";

const visible = ref(false);
</script>

-->


}
