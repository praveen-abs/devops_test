<template>
    <div class="card mb-0 approvals_wrapper mt-30">
        <div class="card-body b-left">
            <div class="filter-content">
                <div class="row">
                    <div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
                        <nav>
                            <ul class="d-flex">
                                <li>Shift & Week Offs</li>
                                <li>Flexible Shift</li>
                                <li>Rotational shift</li>
                                <li>Holidays</li>
                            </ul>
                        </nav>
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

/*
    Input : Emp array obj
    Output : A 1-D array of emp ids.

*/
function getEmployeeIDsArray() {
    const temp = [];

    _.flatMap(selectedEmployees.value, function (data) {
        temp.push(data.user_id);
    });

    return temp;
    //console.log("Output : "+temp);
}

function saveWorkShiftDetails() {
    hideConfirmDialog(false);

    canShowLoadingScreen.value = true;

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

    //squash all the emp details
    let array_assignedEmp_ids = getEmployeeIDsArray();

    //Shift name
    //Selected employees
    axios
        .post(window.location.origin + "/attendance_settings/save-shiftdetails", {
            selectedEmployees: array_assignedEmp_ids,
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

// function processApproveReject() {
//   hideConfirmDialog(false);

//   canShowLoadingScreen.value = true;

//   console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));

//   axios
//     .post(window.location.origin + "/attendance-approve-rejectleave", {
//       leave_id: currentlySelectedRowData.id,
//       status:
//         currentlySelectedStatus == "Approve"
//           ? "Approved"
//           : currentlySelectedStatus == "Reject"
//           ? "Rejected"
//           : currentlySelectedStatus,
//       leave_rejection_text: "",
//     })
//     .then((response) => {
//       console.log(response);
//       ajax_GetLeaveData();

//       canShowLoadingScreen.value = false;

//       resetVars();
//     })
//     .catch((error) => {
//       canShowLoadingScreen.value = false;
//       resetVars();

//       console.log(error.toJSON());
//     });
// }
</script>


<style>
:root {
    --clr-blue: #002f56;
    --clr-orange: rgb(255, 83, 10);
    --clr-drk-gray: #6c757d;
    --clr-gray: #646464;
    --clr-lit-gray: #e2e2e2;
    --clr-med-gray: #c9c9c9;
    --clr-white: #fff;
}

.card-body {
    border-radius: 4px;
    padding: 8px 8px 0 10px;
}

.b-left {
    border-left: 5px solid var(--clr-blue);

}

.filter-content nav li {
    list-style: none;
    color: var(--clr-drk-gray);
    font-weight: 700;
    font-size: 15px;
    line-height: 40px;
    margin: 0 20px;
    border-bottom: 3px solid transparent;
}

.filter-content nav li:hover {
    cursor: pointer;
    border-bottom: 3px solid var(--clr-orange);
    transition: 0.5s;
}
</style>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

// .p-datatable .p-datatable-thead>tr>th {
//     text-align: center;
//     padding: 1.3rem 1rem;
//     border: 1px solid #dee2e6;
//     border-top-width: 1px;
//     border-right-width: 1px;
//     border-bottom-width: 1px;
//     border-left-width: 1px;
//     border-width: 0 0 1px 0;
//     font-weight: 600;
//     color: #fff;
//     background: #003056;
//     transition: box-shadow 0.2s;
//     font-size: 13px;

//     .p-column-title {
//         font-size: 13px;
//     }

//     .p-column-filter {
//         width: 100%;
//     }

//     #pv_id_2 {
//         height: 30px;
//     }

//     .p-fluid .p-dropdown .p-dropdown-label {
//         margin-top: -10px;
//     }

//     .p-dropdown .p-dropdown-label.p-placeholder {
//         margin-top: -12px;
//     }

//     .p-column-filter-menu-button {
//         color: white;
//         margin-left: 10px;
//     }

//     .p-column-filter-menu-button:hover {
//         color: white;
//         border-color: transparent;
//         background: #023e70;
//     }
// }

// .p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
//     margin-bottom: 0.5rem;
//     visibility: hidden;
//     position: absolute;
// }

// .p-button .p-component .p-button-sm {
//     background-color: #003056;
// }

// .p-datatable .p-datatable-tbody>tr {
//     font-size: 13px;

//     .employee_name {
//         font-weight: bold;
//         font-size: 13.5px;
//     }
// }

// .p-datatable .p-datatable-tbody>tr>td {
//     text-align: left;
//     border: 1px solid #dee2e6;
//     border-top-width: 1px;
//     border-right-width: 1px;
//     border-bottom-width: 1px;
//     border-left-width: 1px;
//     border-width: 0 0 1px 0;
//     padding: 1rem 0.6rem;
// }

// .p-datatable .p-datatable-tbody>tr>td:nth-child(1) {
//     width: 200px;
// }

// .p-datatable .p-datatable-tbody>tr>td:nth-child(3) {
//     width: 150px;
// }

// .p-datatable .p-datatable-tbody>tr>td:nth-child(6) {
//     width: 200px;
// }

// .main-content {
//     width: 105%;
// }

// .pending {
//     font-weight: 700;
// }

// .approved {
//     font-weight: 700;
// }

// .p-button.p-component.p-button-success.Button {
//     padding: 8px;
// }

// .rejected {
//     font-weight: 700;
//     color: #ff2634;
// }

// .p-button.p-component.p-button-danger.Button {
//     padding: 8px;
// }

// .p-confirm-dialog-icon.pi.pi-exclamation-triangle {
//     color: red;
// }

// .p-button.p-component.p-confirm-dialog-accept {
//     background-color: #003056;
// }

// .p-button.p-component.p-confirm-dialog-reject.p-button-text {
//     color: #003056;
// }

// .p-column-filter-overlay-menu .p-column-filter-buttonbar {
//     padding: 1.25rem;
//     position: absolute;
//     visibility: hidden;
// }

// .p-datatable .p-datatable-thead>tr>th .p-column-filter {
//     width: 44%;
// }

// .p-datatable .p-datatable-thead>tr>th .p-column-filter-menu-button {
//     color: white;
//     border-color: transparent;
// }

// .p-column-filter-menu-button.p-column-filter-menu-button-open {
//     background: none;
// }

// .p-column-filter-menu-button.p-column-filter-menu-button-active {
//     background: none;
// }

// /* For Sort */

// .p-datatable .p-sortable-column:not(.p-highlight):hover {
//     background: #003056;
//     color: white;
// }

// .p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
//     color: white;
// }

// .p-datatable .p-sortable-column.p-highlight {
//     background: #003056;
//     color: white;
// }

// .p-datatable .p-sortable-column.p-highlight:hover {
//     background: #003056;
//     color: white;
// }

// .p-datatable .p-sortable-column:focus {
//     box-shadow: none;
//     outline: none;
//     color: white;
// }

// .p-datatable .p-sortable-column .p-sortable-column-icon {
//     color: white;
// }

// .pi-sort-amount-down::before {
//     content: "\e9a0";
//     color: white;
// }

// .pi-sort-amount-up-alt::before {
//     content: "\e9a2";
//     color: white;
// }
</style>

