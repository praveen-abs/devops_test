<template>
    <div>
        <!-- {{ EmpDetailStore.array_EmpDetails_list }} -->
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

        <Dialog header="Confirmation" v-model:visible="canShowConfirmationAll"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '580px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{ currentlySelectedStatus }} all the documents of this employee?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processBulkDocumentsApproveReject()" class="p-button-text"
                    autofocus />
                <Button label="No" icon="pi pi-times" @click="hideBulkConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>

        <Dialog header="Confirmation" v-model:visible="canShowConfirmation"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{ currentlySelectedStatus }}?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="empDetailsDocumentApproveReject()" class="p-button-text"
                    autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog(true)" class="p-button-text" />
            </template>
        </Dialog>



        <DataTable :value="EmpDetailStore.array_EmpDetails_list" :paginator="true" :rows="10" class="" dataKey="user_code"
            @rowExpand="onRowExpand" @rowCollapse="onRowCollapse" v-model:expandedRows="expandedRows"
            v-model:selection="selectedAllEmployee" :selectAll="selectAll" @select-all-change="onSelectAllChange"
            @row-select="onRowSelect" @row-unselect="onRowUnselect" :rowsPerPageOptions="[5, 10, 25]"
            paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
            responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">

            <Column :expander="true" />
            <Column selectionMode="multiple" style="width: 1rem" :exportable="false"></Column>
            <Column field="user_code" header="Employee Id" sortable></Column>
            <Column field="name" header="Employee Name">
            </Column>
            <Column field="doc_status" header="Approval Status" :sortable="false">
                <template #body="{ data }">
                    {{ data.doc_status }}
                </template>
            </Column>
            <Column field="" header="Action">
                <template #body="slotProps">
                    <span>
                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button" label="Approve All"
                            @click="getBulkApprovalList(slotProps.data.documents, 'Approve')" style="height: 2.5em" />
                        <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button" label="Reject All"
                            style="margin-left: 8px; height: 2.5em"
                            @click="getBulkApprovalList(slotProps.data.documents, 'Reject')" />
                    </span>
                </template>
            </Column>
            <template #expansion="slotProps">
                <div>
                    <DataTable :value="slotProps.data.documents" responsiveLayout="scroll"
                        v-model:selection="selectedAllEmployee" :selectAll="selectAll"
                        @select-all-change="onSelectAllChange">
                        <Column field="doc_name" header="Document Name">{{ slotProps.data.doc_name }}</Column>
                        <Column field="doc_status" header="Status">
                            <!-- <template #body="{ data }">
                                <Tag :value="data.doc_status" :severity="getSeverity(data.doc_status)" />
                            </template> -->
                        </Column>
                        <Column field="" header="Action">
                            <template #body="slotProps">
                                <span>
                                    <Button type="button" icon="pi pi-check-circle" class="p-button-success Button"
                                        label="Approve" @click="showConfirmDialog(slotProps.data, 'Approve')"
                                        style="height: 2.5em" />
                                    <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button"
                                        label="Reject" style="margin-left: 8px; height: 2.5em"
                                        @click="showConfirmDialog(slotProps.data, 'Reject')" />
                                </span>
                            </template>
                        </Column>
                    </DataTable>
                </div>
            </template>

        </DataTable>


    </div>
</template>


<script setup>
import { ref, reactive, onMounted } from "vue";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { UseEmpDetailApprovalsStore } from "./EmpDetails_approvals_service";
import axios from "axios";
import map from 'lodash/map';

const EmpDetailStore = UseEmpDetailApprovalsStore();
const expandedRows = ref([]);
const selectedAllEmployee = ref();
const canShowConfirmationAll = ref(false);
const canShowConfirmation = ref(false);
let currentlySelectedStatus = null;
let currentlySelectedRowData = null;

onMounted(async () => {
    await EmpDetailStore.getEmpDetails_list();
    // console.log(EmpDetailStore.getEmpDetails_list());
});

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

function showConfirmDialog(selectedRowData, status) {
    canShowConfirmation.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;
    console.log("Selected Bulk Row Data : " + JSON.stringify(selectedRowData));
}
function showAllConfirmDialog(selectedRowData, status) {
    canShowConfirmationAll.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;
    console.log("Selected Bulk Row Data : " + JSON.stringify(selectedRowData));

}
function resetVars() {
    currentlySelectedStatus = "";
    currentlySelectedRowData = null;
}

function hideConfirmDialog(canClearData) {
    canShowConfirmation.value = false;

    if (canClearData) resetVars();
}

function hideBulkConfirmDialog(canClearData) {
    canShowConfirmationAll.value = false;
    if (canClearData) resetVars();
}

const getBulkApprovalList = (selectedRowData, status) => {
    canShowConfirmationAll.value = true;
    currentlySelectedStatus = status;
    currentlySelectedRowData = selectedRowData;
}

const processBulkDocumentsApproveReject = () => {


    hideBulkConfirmDialog();

    //Get the doc ids of the selected employees rowdata
    let processed_doc_ids = map(currentlySelectedRowData, 'record_id');

    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData.documents));
    console.log("currentlySelectedStatus : " + currentlySelectedStatus);

    console.log("Processed doc record ids : " + processed_doc_ids);


    axios.post("http://localhost:3000/saveEmpDetails", {
        record_id:processed_doc_ids,
        status:
            currentlySelectedStatus == "Approve"
                ? "Approved"
                : currentlySelectedStatus == "Reject"
                    ? "Rejected"
                    : currentlySelectedStatus,
        reviewer_comments: "",
    }
    ).then((res) => {
        console.log("testing data", res.data);

    }).finally(() => {
        resetVars();
    })


}


// const getBulkApprovalList = (data,selectedStatus) => {

// console.log(data);
// console.log(data[0].record_id);

// var selectList = {
//     record_id: data.record_id,
//     doc_status: selectedStatus == "Approve"
//                 ? "Approved"
//                 : selectedStatus == "Reject"
//                     ? "Rejected"
//                     : selectedStatus,
// };

// var form_data = new FormData();

// for (var key in selectList) {
//     form_data.append(key, selectList[key]);
// }
// console.log(form_data);


// }



function empDetailsDocumentApproveReject() {
    hideConfirmDialog();

    axios.post("http://localhost:3000/saveEmpDetails", {
        record_id: currentlySelectedRowData.record_id,
        status:
            currentlySelectedStatus == "Approve"
                ? "Approved"
                : currentlySelectedStatus == "Reject"
                    ? "Rejected"
                    : currentlySelectedStatus,
        reviewer_comments: "",
    }
    ).then((res) => {
        console.log("testing data", res.data);

    }).finally(() => {
        resetVars();

    })





}



</script>


