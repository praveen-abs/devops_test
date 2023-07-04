<template>
    <div>

        <div class="mr-4 card">
            <div class="px-5 row d-flex justify-content-start align-items-center card-body">
                <div class="flex justify-between gap-6 my-2">
                    <div class=" fs-4">
                        <p class="text-xl font-medium text-justify">Five Team members are eligible for the Interest Free
                            Loan as per the
                            <span class="text-lg text-primary text-decoration-underline"> Company's Loan Policy</span>
                        </p>
                    </div>

                    <div class="float-right ">
                        <button class="btn btn-border-orange">View Report</button>
                        <button class="mx-2 btn btn-orange" @click="ShowDialogApprovalAll">
                            Approval All
                        </button>

                        <Dialog header="Confirmation" v-model:visible="canShowConfirmationAll"
                            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '400px' }" :modal="true">
                            <div class="confirmation-content">
                                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                            </div>
                            <template #footer>
                                <Button label="Yes" icon="pi pi-check" @click="processBulkApproveReject('Approve')"
                                    class="p-button-text" autofocus />
                                <!-- <button class="btn"></button> -->
                                <Button label="No" icon="pi pi-times" @click="hideBulkConfirmDialog(true)"
                                    class="p-button-text" />
                            </template>
                        </Dialog>

                        <Dialog v-model:visible="canshowInterestFLR" header="Header" :style="{ width: '58vw' }" modal
                            :position="position">
                            <template #header>
                                <div>
                                    <h1 style="border-left: 3px solid var( --orange);padding-left: 5px ;" class="fs-4">New
                                        Interest Free Loan Request</h1>
                                </div>
                            </template>
                            <div class="card bg-gray-100 bottom-0 mb-10" style="border:none">
                                <div class="card-body">
                                    <div class="row mx-2">
                                        <div class="col mx-2">
                                            <h1 class="fs-5 my-2">Required Amount</h1>
                                            <InputText type="text" v-model="interestWithLoan.Advance_Amount"
                                                placeholder="&#8377; Enter The Required Amount" />
                                            <p class="fs-6 my-2" style="color: var(--clr-gray)">Max Eligible Amount : 20,000
                                            </p>
                                        </div>
                                        <div class="col mx-2">
                                            <h1 class="fs-5 my-2">Monthly EMI</h1>
                                            <InputText type="text" v-model="interestWithLoan.Monthly_EMI"
                                                placeholder="&#8377; " />
                                        </div>
                                        <div class="col mx-2">
                                            <h1 class="fs-5 my-2">Term</h1>
                                            <!-- <Dropdown :options="cities" optionLabel="name" placeholder="1.5"
                                                class="w-full md:w-10rem" v-model="interestWithLoan.Term_year" /> -->
                                            <InputText class="w-full md:w-10rem" type="text"
                                                v-model="interestWithLoan.Term_year" placeholder="&#8377; " />
                                            <label for="" class="fs-5 ml-2" style="color:var(--navy) ; ">Years</label>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="card bg-gray-100 bottom-0 my-4" style="border:none ">
                                <div class="card-body mx-4">
                                    <div class="row">
                                        <!-- fw-bolder -->
                                        <h1 class="fs-4 my-2 ">EMI Dedution</h1>
                                        <h1 class="fs-5 text-gray-600 mb-3">The EMI Dedution Will begin from the Upcoming
                                            Payroll</h1>
                                        <div class="col-4">
                                            <h1 class="fs-5 my-2 ml-2">EMI Start Month</h1>
                                            <Calendar showIcon v-model="interestWithLoan.EMI_start_month"
                                                dateFormat="dd/mm/yy" />
                                        </div>

                                        <div class="col-4 mx-2">
                                            <h1 class="fs-5 my-2 ml-2">EMI End Month</h1>
                                            <Calendar showIcon v-model="interestWithLoan.EMI_End_month"
                                                dateFormat="dd/mm/yy" />
                                        </div>
                                        <div class="col-3">
                                            <h1 class="fs-5 my-2 ml-2">Total Months</h1>
                                            <InputText type="text" v-model="interestWithLoan.Total_Months"
                                                style="width: 150px !important;" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 my-6 bg-gray-100 rounded-lg gap-6">
                                <span class="font-semibold ">Reason</span>
                                <Textarea v-model="interestWithLoan.reviewer_comments"
                                    class="my-3 capitalize form-control textbox" autoResize type="text" rows="3" />
                            </div>
                            <div class="gap-6 p-4 my-6 bg-gray-100 rounded-lg">
                                <span class="font-semibold ">your Comments</span>
                                <Textarea class="my-3 capitalize form-control textbox" v-model="reviewer_comments"
                                    autoResize type="text" rows="3" style="border:none; outline-: none;" />
                                <!-- {{ SA_Request_comments }} -->
                            </div>


                            <template #footer>
                                <div class="float-right ">
                                    <button class="btn bg-red-500 text-white px-5"
                                        @click="approveAndReject('Reject')">Reject</button>
                                    <button class="mx-4 btn bg-green-500  text-white px-5"
                                        @click="approveAndReject('Approve')">Approve</button>
                                </div>
                                <!-- <Button label="" icon="pi pi-times" @click="visible = false" text />
                            <Button label="Yes" icon="pi pi-check" @click="visible = false" text /> -->
                            </template>
                        </Dialog>
                    </div>
                </div>

                <div class="my-6 widget-card">
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5">
                        <div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400">
                            <p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p>
                            <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                        </div>
                        <div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400">
                            <p class="mb-2 font-bold text-ash-medium f-13 "> Total Repaid Amount</p>
                            <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                        </div>

                        <div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400 ">
                            <p class="mb-2 font-bold text-ash-medium f-13 ">Balance Amount</p>
                            <h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6>
                        </div>
                        <div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400">
                            <p class="mb-2 font-bold text-ash-medium f-13 ">Pending Request</p>
                            <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                        </div>
                        <div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400">
                            <p class="mb-2 font-bold text-ash-medium f-13 ">Completed Rquests</p>
                            <h6 class="mb-0 text-base font-semibold text-gray-500">-</h6>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- {{ useEmpStore.isInterestFreeLoaneature }} -->
                    <DataTable :value="UseInterestFreeLoan.arrayIFL_List" :paginator="true" :rows="10" class="" dataKey="id"
                        @rowExpand="onRowExpand" @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows"
                        v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                        @select-all-change="onSelectAllChange" @row-select="onRowSelect" @row-unselect="onRowUnselect"
                        :rowsPerPageOptions="[5, 10, 25]"
                        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">

                        <Column :expander="true" />
                        <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
                        <Column field="request_Id" header="Request ID" sortable></Column>
                        <Column field="Emp_Id" header="Employee ID">
                        </Column>
                        <Column field="Employee_Name" header="Employee Name" :sortable="false">
                            <!-- <template #body="{ data }">
                    {{ data.doc_status }}
                </template> -->
                        </Column>
                        <Column field="Advance_Amount" header="Advance Amount">
                        </Column>
                        <Column field="Date" header="Date">

                        </Column>
                        <Column field="Status" header="Status">
                            <template #body="slotProps">
                                <!-- {{ slotProps.data.Status }} -->
                                <h6 v-if="slotProps.data.Status == 'Pending'" class="text-orange-500">
                                    {{ slotProps.data.Status }}
                                </h6>
                                <h6 v-if="slotProps.data.Status == 'Approved'" class=" text-green-500">
                                    {{ slotProps.data.Status }}
                                </h6>
                                <h6 v-if="slotProps.data.Status == 'Rejected'" class="text-red-500">
                                    {{ slotProps.data.Status }}
                                </h6>
                            </template>
                        </Column>
                        <template #expansion="slotProps">
                            <div>
                                <DataTable :value="slotProps.data.emp_details" responsiveLayout="scroll"
                                    v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                                    @select-all-change="onSelectAllChange">
                                    <Column field="request_Id" header="request ID">{{ slotProps.data.doc_name }}</Column>
                                    <Column field="Advance_Amount" header="Advance Amount">
                                    </Column>
                                    <Column field="paid_on" header="Paid On">

                                    </Column>
                                    <Column field="" header="Expected Return">
                                    </Column>

                                    <Column field="" header="Action">
                                        <template #body="slotProps">
                                            <div>
                                                <Button type="button" icon="pi pi-eye" class="p-button-success Button"
                                                    label="view" @click="showConfirmDialog(slotProps.data)"
                                                    style="height: 2.5em" />
                                            </div>
                                        </template>
                                    </Column>
                                </DataTable>
                            </div>
                        </template>

                    </DataTable>

                </div>

            </div>
        </div>


<!--
        <Dialog header="Header" v-model:visible="UseInterestFreeLoan.canShowLoadingScreen"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
            :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog> -->

    </div>
</template>

<script setup>
import { onMounted, ref, reactive } from "vue";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { UseSalaryAdvanceApprovals } from '../store/loanAdvanceMainStore';
import dayjs from 'dayjs';

const UseInterestFreeLoan = UseSalaryAdvanceApprovals();

onMounted(async () => {
    await UseInterestFreeLoan.getInterestFreeLoanDetails()
})


const expandedRows = ref([]);
const selectedAllEmployee = ref();
const reviewer_comments = ref();
const canshowInterestFLR = ref(false);
const currentlySelectedRowData = ref();
const currentlySelectedStatus = ref();
const canShowConfirmationAll = ref(false);
// const


const interestWithLoan = ref();
// EMI_start_month:"",
// EMI_End_month:"",
// Monthly_EMI:"",
// Term_year:"",
// Advance_Amount:"",
// Total_Months:"",
// reason:""


function showConfirmDialog(selectedRowData, status) {
    console.log(selectedRowData);
    canshowInterestFLR.value = true;
    currentlySelectedStatus.value = status;
    currentlySelectedRowData.value = selectedRowData;
    interestWithLoan.value = selectedRowData;
    // required_Amount.required_Amount = selectedRowData.Advance_Amount
}

function hideBulkConfirmDialog() {
    canShowConfirmationAll.value = false;
    canshowInterestFLR.value = false;
}



const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS,
    },
    status: { value: 'Pending', matchMode: FilterMatchMode.EQUALS },
});

function ShowDialogApprovalAll() {
    canShowConfirmationAll.value = true;
}

async function approveAndReject(status) {
    hideBulkConfirmDialog()
    // showAppoverDialog.value = false;
    console.log(currentlySelectedRowData.value, status);
    await UseInterestFreeLoan.IFLapproveAndReject(currentlySelectedRowData.value, status, reviewer_comments.value)
    currentlySelectedStatus.value = status;
}

async function processBulkApproveReject(status){

    currentlySelectedStatus.value= status;
    await UseInterestFreeLoan.IFLbulkApproveAndReject(currentlySelectedStatus.value,UseInterestFreeLoan.arrayIFL_List);
}




</script>
