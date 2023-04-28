<template>

    <!-- Month -->
    <div class="card inline-flex justify-content-center mr-6">
        <Dropdown v-model="emp.selectmonth" :options="Month" optionLabel="Name" placeholder="Month" class="w-full md:w-14rem" />
    </div>

    <!-- Year -->
    <div class="card inline-flex justify-content-center mr-6 ">
        <Dropdown v-model="emp.selectyear" :options="Year" optionLabel="Name" placeholder="Year" class="w-full md:w-14rem" />
    </div>
     <!-- button  -->

     <Button class="mb-2" label="Submit" @click="monthYear()"/>

    <!-- datatable -->
    <div class="card">
        <DataTable v-model:selection="emp.selectedProduct" :value="ajaxData_employees_list" dataKey="id" tableStyle="min-width: 50rem">
            <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
            <Column field="name" header="Emp_Name"></Column>
            <Column  header="View">
             <template  #body="slotProps">
                <Button class="btn-primary" label="view"
                @click="viewemployee(slotProps.data)"/></template>
            </Column>
        </DataTable>
    </div>
    <!-- ******** -->
    <Button class="mb-2" label="Submit" />



    <!-- dialog for show details -->


    <div class="card flex justify-content-center inline-flex">
        <!-- <Button label="Show" icon="pi pi-external-link"  /> -->
        <Dialog v-model:visible="dailog_employeeDetails"  modal header="Header" :style="{ width: '50vw' }">

                    {{ employeeDetails }}

        </Dialog>
    </div>

    <!--  -->
</template>

<script setup>
import { ref, onMounted,reactive } from "vue";
import axios from "axios";
// import { FilterMatchMode, FilterOperator } from "primevue/api";
// import { useConfirm } from "primevue/useconfirm";
// import { useToast } from "primevue/usetoast";

const dailog_employeeDetails=ref(false);

const employeeDetails= ref()

const viewemployee =(emp) =>{
    employeeDetails.value = {emp}
    console.log(emp);
    dailog_employeeDetails.value = true
}


const Month = ref([
    {Name:'January',value:'01'},
    {Name:'Febraury',value:'02'},
    {Name:'March',value:'03'},
    {Name:'April',value:'04'},
    {Name:'May',value:'05'},
    {Name:'June',value:'06'},
    {Name:'July',value:'07'},
    {Name:'August',value:'08'},
    {Name:'September',value:'09'},
    {Name:'October',value:'10'},
    {Name:'November',value:'11'},
    {Name:'December',value:'12'},
]);

const Year = ref([
    {Name:'2023'},
    {Name:'2022'},
    {Name:'2021'},
    {Name:'2020'},
    {Name:'2019'},
    {Name:'2018'},
    {Name:'2017'},
    {Name:'2016'},
    {Name:'2015'},
]);

const ajaxData_employees_list = ref();


// let pms_data = ref();
// let canShowConfirmation = ref(false);
// let canShowLoadingScreen = ref(false);
// const confirm = useConfirm();
// const toast = useToast();
// const loading = ref(true);

// const filters = ref({
// global: { value: null, matchMode: FilterMatchMode.CONTAINS },
// employee_name: {
//     value: null,
//     matchMode: FilterMatchMode.STARTS_WITH,
//     matchMode: FilterMatchMode.EQUALS,
//     matchMode: FilterMatchMode.CONTAINS,
// },

// status: { value: null, matchMode: FilterMatchMode.EQUALS },
// });

// const statuses = ref(["Pending", "Approved", "Rejected"]);

// let currentlySelectedStatus = null;
// let currentlySelectedRowData = null;

// onMounted(() => {
// ajax_GetPMSFormsApprovalsData();
// });

// function ajax_GetPMSFormsApprovalsData() {
// let url = window.location.origin + "/fetch_approvals_pmsforms";

// console.log("AJAX URL : " + url);

// axios.get(url).then((response) => {
//     console.log("Axios : " + response.data);
//     pms_data.value = response.data;
//     loading.value = false;
// });
// }

const emp = reactive({
    selectmonth:'',
    selectyear:'',
    selectedProduct:'',
});



axios.get(`/db/getuserName`).then(res=>{

    ajaxData_employees_list.value = res.data;

    console.log(ajaxData_employees_list.value);

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
function monthYear(){
    axios.post('/payroll/fetchEmployeePayslipDetails',{
        month: emp.selectmonth.value,
        year: emp.selectyear.Name,
        //selected:emp.selectedProduct,
    }) .then((res) => {
        ajaxData_employees_list.value = res.data;
        console.log(res.data);
    })
    .catch((error) => console.log(error));

}





</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-datatable .p-datatable-thead > tr > th {
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
.p-datatable .p-datatable-thead > tr > th .p-column-filter {
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
