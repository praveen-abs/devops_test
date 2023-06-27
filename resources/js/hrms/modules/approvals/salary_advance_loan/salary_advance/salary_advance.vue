<template>
    <div class="mr-4 card">
        <div class="px-5 row d-flex justify-content-start align-items-center card-body">
            <div class="flex justify-between gap-6 my-2">
                <div class="w-8 fs-4">
                    <p class="text-xl font-medium">The company allows employees to request a salary advance of up to <strong
                            class="text-lg"> 100%</strong> of their monthly salary.</p>
                </div>

                <div class="float-right ">
                    <button class="btn btn-border-orange">View Report</button>
                    <button @click="ShowDialogApprovalAll" class="mx-4 btn btn-orange">
                        <!-- <i class="mx-2 fa fa-plus"
                            aria-hidden="true"></i> -->
                            Approval All</button>
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
            </div>



            <DataTable :value="SalaryAdvanceApprovals.arraySalaryAdvance" :paginator="true" :rows="10" class="" dataKey="id"
            @rowExpand="onRowExpand" @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows"
            v-model:selection="selectedAllEmployee" :selectAll="selectAll" @select-all-change="onSelectAllChange"
            @row-select="onRowSelect" @row-unselect="onRowUnselect" :rowsPerPageOptions="[5, 10, 25]"
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
            <Column field="Date" header="Date" >

            </Column>
            <Column field="Status" header="Status"  >
                <template #body="slotProps">
                    <!-- {{ slotProps.data.Status }} -->
                    <h6 v-if="slotProps.data.Status == 'Pending'" class="text-orange-500">
                        {{slotProps.data.Status}}
                    </h6>
                    <h6 v-if="slotProps.data.Status == 'Approved'" class=" text-green-500" >
                    {{slotProps.data.Status }}
                    </h6>
                    <h6 v-if="slotProps.data.Status=='Rejected'" class="text-red-500">
                        {{slotProps.data.Status }}
                    </h6>
                </template>
            </Column>
            <template #expansion="slotProps">
                <div>
                    <DataTable :value="slotProps.data.emp_details" responsiveLayout="scroll"
                        v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                        @select-all-change="onSelectAllChange" >
                        <Column field="request_Id" header="request ID">{{ slotProps.data.doc_name }}</Column>
                        <Column field="Advance_Amount" header="Advance Amount">
                        </Column>
                        <Column field="paid_on" header="Paid On" >

                        </Column>
                        <Column field="" header="Expected Return" >
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

    <Dialog header="Confirmation" v-model:visible="canShowConfirmationAll"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '400px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <!-- <span>Are you sure you want to {{ currentlySelectedStatus }} all the documents of this employee?</span> -->
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processBulkApproveReject('Approve')" class="p-button-text"
                    autofocus />
                    <!-- <button class="btn"></button> -->
                <Button label="No" icon="pi pi-times" @click="hideBulkConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>



    <Dialog modal v-model:visible="showAppoverDialog"
        :style="{ width: '50vw', borderTop: '5px solid #002f56', height: '100vh' }">
        <template #header>
            <h1 class="mx-3 fs-4 text-xxl " style="border-left:3px solid var(--orange) ; padding-left:10px  ;">New Salary
                Advance Request</h1>
        </template>
        <!-- v-model="currentlySelectedRowData." -->

        <div class="flex pb-2 bg-gray-100 rounded-lg gap-7">
            <div class="w-4 p-4 mx-4">
                <span class="font-semibold">Required Amount</span>
                {{currentlySelectedRowData.Advance_Amount}}
                <input id="rentFrom_month"
                    class="my-2  border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="required_Amount.required_Amount" >
                <p class="text-sm font-semibold text-gray-500">Max Eligible Amount : 20,000</p>
            </div>
            <div class="w-5 p-4 mx-4 ">
                <span class="font-semibold">Required Amount</span>
                <div class="w-full">
                    <p class="my-2 text-gray-600 fs-5 text-md text-clip">The advance amount will be deducted from the next month's
                salary <strong class="text-black fs-5">(ie, March 31, 2023)</strong> </p>

                </div>

            </div>

        </div>

        <div class="gap-6 p-4 my-6 bg-gray-100 rounded-lg">
            <span class="font-semibold ">Reason</span>
            <div class="border w-full h-28 rounded bg-slate-50 p-2 ">Lorem ipsum dolor sit.</div>
        </div>
        <div class="gap-6 p-4 my-6 bg-gray-100 rounded-lg">
            <span class="font-semibold ">your Comments</span>
            <Textarea class="my-3 capitalize form-control textbox" v-model="reviewer_comments"  autoResize type="text" rows="3" style="border:none; outline-: none;"  />
            <!-- {{ SA_Request_comments }} -->
        </div>

        <div class="float-right ">
            <button class="btn bg-red-500 text-white px-5" @click="approveAndReject('Reject')">Reject</button>
            <button class="mx-4 btn bg-green-500  text-white px-5" @click="approveAndReject('Approve')" >Approve</button>
        </div>

    </Dialog>

    <Dialog header="Header" v-model:visible="SalaryAdvanceApprovals.canShowLoadingScreen" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog>
  <!-- {{ SalaryAdvanceApprovals.arraySalaryAdvance }} -->
</template>



<script setup>
import { onMounted, reactive, ref } from 'vue';
import { FilterMatchMode, FilterOperator } from "primevue/api";
import {UseSalaryAdvanceApprovals} from '../store/salary_advance_loanStore';
import { required } from '@vuelidate/validators';

const SalaryAdvanceApprovals  = UseSalaryAdvanceApprovals();

const expandedRows = ref([]);
const selectedAllEmployee =  ref();
const currentlySelectedStatus = ref();

const currentlySelectedRowData = ref();
const showAppoverDialog = ref(false);
const canShowConfirmationAll = ref(false);
const reviewer_comments = ref();
const required_Amount = reactive({
    required_Amount:""
});

onMounted(()=>{

SalaryAdvanceApprovals.getEmpDetails();

})

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


function showConfirmDialog(selectedRowData, status){
    console.log(selectedRowData);
    showAppoverDialog.value = true;
    currentlySelectedStatus.value = status;
    currentlySelectedRowData.value = selectedRowData;
    required_Amount.required_Amount = selectedRowData.Advance_Amount
    console.log( required_Amount.required_Amount);
}

async function approveAndReject(status){
    showAppoverDialog.value = false;
    console.log(currentlySelectedRowData.value,status);
   await  SalaryAdvanceApprovals.SAapproveAndReject(currentlySelectedRowData.value,status,reviewer_comments.value)
    currentlySelectedStatus.value = status;
}

function ShowDialogApprovalAll(){
    canShowConfirmationAll.value = true;
}

function hideBulkConfirmDialog(){
    canShowConfirmationAll.value = false;
}

async function processBulkApproveReject(status){
    hideBulkConfirmDialog();
    currentlySelectedStatus.value= status;
    await SalaryAdvanceApprovals.SAbulkApproveAndReject(currentlySelectedStatus.value,SalaryAdvanceApprovals.arraySalaryAdvance);
}




</script>
