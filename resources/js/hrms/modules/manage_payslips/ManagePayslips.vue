<template>
    <div class="d-flex justify-content-end">
        <label for="" class="my-2 text-lg font-semibold">Select Month</label>
        <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="emp.selectDate"
            style=" border: 1px solid orange; border-radius: 7px; height: 38px;" />
        <Button class="mb-2 h-10 btn btn-orange" label="Generate" @click="managePayslipStore.getAllEmployeesPayslipDetails( emp.selectDate.getMonth() + 1 , emp.selectDate.getFullYear())" />
    </div>
    <div class="my-4">

        <DataTable :value="managePayslipStore.array_employees_list" :paginator="true" :rows="10" dataKey="id"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]" v-model:selection="emp.selectedProduct"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
            v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
            <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
            <Column field="user_code" header="Employee Code"></Column>
            <Column field="name" header="Employee Name"></Column>
            <Column field="email" header="Personal Mail"></Column>
            <Column header="View">
                <template #body="slotProps">
                    <Button class="btn-primary" label="view" @click="viewemployee(slotProps.data)" /></template>
            </Column>
            <Column header="Action">

                <template #body="slotProps">
                    <!-- <Button class="btn-success" label="Send" @click="viewemployee(slotProps.data)" /> -->
                    <Button class="btn-success" label="Send" @click="sendEmail(slotProps.data)" />
                </template>
            </Column>
        </DataTable>
    </div>
    <div class="d-flex justify-content-end">
        <Button class="mb-2 btn btn-primary" label="Submit" />
    </div>
    <!-- dialog for show details -->
    <div class="card flex justify-content-center inline-flex">
        <Dialog v-model:visible="dailog_employeeDetails" modal header="Header" :style="{ width: '50vw' }">
            {{ employeeDetails }}
        </Dialog>
    </div>
</template>

<script setup>
import { ref, onMounted, reactive ,inject} from "vue";
import axios from "axios";

// import { FilterMatchMode, FilterOperator } from "primevue/api";
// import { useConfirm } from "primevue/useconfirm";
// import { useToast } from "primevue/usetoast";

const swal = inject("$swal");

const dailog_employeeDetails = ref(false);
let canShowLoadingScreen = ref(true);


const employeeDetails = ref()

const viewemployee = (emp) => {
    employeeDetails.value = { emp }
    console.log(emp.user_code);
    dailog_employeeDetails.value = true
}



const ajaxData_employees_list = ref();


const emp = reactive({
    selectmonth: '',
    selectDate: '',
    selectyear: '',
});

const sendEmail = (data)=>{
    employeeDetails.value = data
    axios.post('http://localhost:3000/sendEmail',{
        user_code:data.user_code,
    }).then((res)=>{
        if (response.data.status == "Success") {
        // Swal.fire(response.data.status, response.data.message, "success");
        // window.location.reload()
         Swal.fire({
          title:response.data.status = "Success" ,
          text: response.data.message,
          icon: "success",
          showCancelButton: false,
        }).then((result) => {
          window.location.reload();
        })
        console.log(res.data);
    }}).catch((res)=>{
        console.log(res.data);

    }).finally((res)=>{

        console.log(res.data);
    })
}

  canShowLoadingScreen.value = false;

});

async function getAllEmployeesPayslipDetails(month, year){
    await managePayslipStore.getAllEmployeesPayslipDetails();
}



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
function monthYear() {
    let year = emp.selectDate.getFullYear();
    let month = emp.selectDate.getMonth() + 1;

    axios.post('/payroll/fetchEmployeePayslipDetails', {
        month: month,
        year: year,
        //selected:emp.selectedProduct,
    }).then((res) => {
        ajaxData_employees_list.value = res.data;
        console.log(res.data);
    })
        .catch((error) => console.log(error));

}





</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

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
