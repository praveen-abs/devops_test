<template>
    <div class="d-flex justify-content-end">
        <label for="" class="my-2 text-lg font-semibold">Select Month</label>
        <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="selectedPayRollDate.selectDate"
            style=" border: 1px solid orange; border-radius: 7px; height: 38px;" />
        <Button class="mb-2 h-10 btn btn-orange" label="Generate"
            @click="managePayslipStore.getAllEmployeesPayslipDetails(selectedPayRollDate.selectDate.getMonth() + 1, selectedPayRollDate.selectDate.getFullYear())" />
        <!-- {{ managePayslipStore.array_employees_list.user_code.data.data }} -->
    </div>
    <div class="my-4">

        <DataTable :value="managePayslipStore.array_employees_list" :paginator="true" :rows="10" dataKey="id"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]" v-model:selection="selectedPayRollDate.selectedProduct"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
            v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
            <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
            <Column field="user_code" header="Employee Code" headerStyle="width: 3rem">
            </Column>
            <Column field="name" header="Employee Name"></Column>
            <Column field="email" header="Personal Mail"></Column>
            <Column field="is_released" header="Released Payslip?"></Column>
            <Column field="is_" header="Payslip mail sent?"></Column>
            <Column header="View Payslip">
                <template #body="slotProps">
                    <Button class="btn-primary" label="View"
                        @click="managePayslipStore.getEmployeePayslipDetailsAsHTML(slotProps.data.user_code, selectedPayRollDate.selectDate.getMonth() + 1, selectedPayRollDate.selectDate.getFullYear())" />
                </template>
            </Column>

            <Column header="Action">
                <!-- <Button class="btn-success" label="Send Mail" @click="managePayslipStore.sendMail_employeePayslip(slotProps.data.user_code, selectedPayRollDate.selectDate.getMonth() + 1, selectedPayRollDate.selectDate.getFullYear() )" /> -->
                <template #body="slotProps">
                    <button class="btn-success rounded" @click="managePayslipStore.canShowConfirmation(slotProps.data)">Send
                        Mail</button>
                </template>

            </Column>

            <Dialog header="Confirmation" v-model:visible="managePayslipStore.show_dialogconfirmation"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
            <div class="confirmation-content">

                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to send Mail ?</span>
            </div>

            <div class="d-flex   mt-11 " style="position: relative; right: -180px; width: 140px;">

                <Button class="btn-success mr-3" label="Yes" icon="pi pi-check"
                    @click="managePayslipStore.sendMail_employeePayslip(JSON.stringify(managePayslipStore.array_employees_list.user_code), selectedPayRollDate.selectDate.getMonth() + 1, selectedPayRollDate.selectDate.getFullYear())"
                    autofocus />

                <Button label="No" icon="pi pi-times" @click="managePayslipStore.HideShowConfirmation"
                    class="p-button-text " autofocus />

            </div>

        </Dialog>


        </DataTable>



        {{ managePayslipStore.array_employees_list }}

    </div>





    <!-- <div class="d-flex justify-content-end">
        <Button class="mb-2 btn btn-primary" label="Submit" />
    </div>
    dialog for show details
     <div class="card flex justify-content-center inline-flex">
        <Dialog v-model:visible="managePayslipStore.canShowPayslipView" modal header="Header" :style="{ width: '50vw' }">
            <div v-html="managePayslipStore.paySlipHTMLView">

            </div>
        </Dialog>
    </div> -->
</template>

<script setup>
import { ref, onMounted, reactive } from "vue";
import axios from "axios";
import { useManagePayslipStore } from './ManagePayslipService';

const managePayslipStore = useManagePayslipStore();


const selectedPayRollDate = reactive({
    selectmonth: '',
    selectDate: '',
    selectyear: '',
});





onMounted(async () => {
    console.log(managePayslipStore.array_employees_list);
});


// function showConfirmDialog(selectedRowData, status) {
// canShowConfirmation.value = true;
// currentlySelectedStatus = status;
// currentlySelectedRowData = selectedRowData;

// console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
// }

// function hideConfirmDialog(canClearData) {
// canShowConfirmation.value = false;

// if (canClearData) resetVars();
// }

// function resetVars() {
// currentlySelectedStatus = "";
// currentlySelectedRowData = null;
// }

// const css_statusColumn = (data) => {
// return [
//     {
//     pending: data.status === "Pending",
//     approved: data.status === "Approved",
//     rejected: data.status === "Rejected",
//     },
// ];
// };

// function processApproveReject() {
// hideConfirmDialog(false);

// canShowLoadingScreen.value = true;

// console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

// axios
//     .post(window.location.origin + "/approvals-pms", {
//     kpiform_review_id: currentlySelectedRowData.pms_kpiform_review_id,
//     status:
//         currentlySelectedStatus == "Approve"
//         ? "Approved"
//         : currentlySelectedStatus == "Reject"
//         ? "Rejected"
//         : currentlySelectedStatus,
//     })
//     .then((response) => {
//     console.log("Response : " + response);

//     canShowLoadingScreen.value = false;

//     toast.add({ severity: "success", summary: "Info", detail: "Success", life: 3000 });
//     ajax_GetPMSFormsApprovalsData();

//     resetVars();
//     })
//     .catch((error) => {
//     canShowLoadingScreen.value = false;
//     resetVars();

//     console.log(error.toJSON());
//     });
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
    <div class="card flex justify-content-center">
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
