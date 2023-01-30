<template>
    <div>
        <ConfirmDialog></ConfirmDialog>
        <Toast />
        <Dialog header="Confirmation" v-model:visible="canShowConfirmation" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '350px'}" :modal="true">
            <div class="confirmation-content">
                <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                <span>Are you sure you want to {{currentlySelectedStatus}}?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processApproveReject()" class="p-button-text" autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog()" class="p-button-text"/>
            </template>
        </Dialog>
        <div class="card">

            <DataTable :value="att_regularization" :paginator="true" :rows="10"
                    paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                    responsiveLayout="scroll"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">

                <Column field="employee_name" header="Name">
                    <template #body="slotProps">
                        <div class="employee_name">
                            {{ slotProps.data.employee_name }}
                        </div>
                    </template>
                </Column>
                <Column field="attendance_date" header="Date"></Column>
                <Column field="regularization_type" header="Type"></Column>
                <Column field="user_time" header="Actual Time"></Column>
                <Column field="regularize_time" header="Regularize Time"></Column>
                <Column field="reason_type" header="Reason"></Column>
                <Column field="reviewer_comments" header="Approver Comments"></Column>
                <Column field="reviewer_reviewed_date" header="Reviewed Date"></Column>
                <Column field="status" header="Status">
                    <template #body="slotProps">
                        <div :class="css_statusColumn(slotProps.data)">
                            {{ slotProps.data.status }}
                        </div>
                    </template>
                </Column>
                <Column style="width: 300px;" field="" header="Action">
                    <template #body="slotProps">
                        <!-- <Button icon="pi pi-check" class="p-button-success"  @click="confirmDialog(slotProps.data,'Approved')" label="Approval" />
                        <Button icon="pi pi-times" class="p-button-danger" @click="confirmDialog(slotProps.data,'Rejected')" label="Rejected" /> -->
                       
                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button"  label="Approval"  @click="showConfirmDialog(slotProps.data,'Approve')"
                        style="height: 2em;" />
                        <span><Button type="button" icon="pi pi-times-circle" class="p-button-danger Button "  label="Rejected" style="margin-left: 8px;height: 2em;"  @click="showConfirmDialog(slotProps.data,'Reject')" />
                        </span>
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>
<script setup>

    import { ref, onMounted } from 'vue';
    import axios from 'axios'
    import  { useConfirm } from "primevue/useconfirm";
    import  { useToast }  from "primevue/usetoast";

    let att_regularization = ref();
    let canShowConfirmation = ref(false);


    //const confirm = useConfirm();
    const toast = useToast();

    let currentlySelectedStatus = ref('');
    let currentlySelectedRowData = ref();

    onMounted(() => {
        let url = window.location.origin + '/fetch-regularization-approvals';

        console.log("AJAX URL : " + url);

        axios.get(url)
            .then((response) => {
                console.log("Axios : " + response.data);
                att_regularization.value = response.data;

            });

    })

    function showConfirmDialog(selectedRowData, status){
        canShowConfirmation.value = true;
        currentlySelectedStatus.value = status;
        currentlySelectedRowData.value = selectedRowData;

        console.log("Selected Row Data : "+JSON.stringify(selectedRowData));
    }

    function hideConfirmDialog(){
        canShowConfirmation.value = false;
        currentlySelectedStatus.value = '';
        currentlySelectedRowData.value = ref();

    }

    //PrimeVue ConfirmDialog code -- Keeping here for reference
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
                    'pending': data.status === 'Pending',
                    'approved':  data.status === 'Approved',
                    'rejected':  data.status === 'Rejected',
                 }
            ];
        };

    function processApproveReject() {

        console.log("Processing Rowdata : "+ JSON.stringify(currentlySelectedRowData.value));


        axios.post(window.location.origin + '/attendance-regularization-approvals', {
            id: currentlySelectedRowData.value.id,
            status: currentlySelectedStatus.value == "Approve" ? "Approved" : currentlySelectedStatus.value =="Reject" ? "Rejected" : currentlySelectedStatus.value ,
            status_text: 'Reviewer commented'
        })
        .then((response) => console.log(response))

    }


</script>
<style scoped lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap');

.employee_name{
    font-weight: bold;
}

.pending {
    font-weight: 700;
    color: #FFA726;
}


.approved {
    font-weight: 700;
    color: #26ff2d;
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

</style>
