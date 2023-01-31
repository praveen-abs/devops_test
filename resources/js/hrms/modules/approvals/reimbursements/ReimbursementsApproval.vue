<template>
    <div>
            <Toast />
        <Dialog header="Header" v-model:visible="canShowLoadingScreen" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '25vw'}" :modal="true" :closable="false" :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width:50px;height:50px" strokeWidth="8" fill="var(--surface-ground)" animationDuration="2s" aria-label="Custom ProgressSpinner"/>
            </template>
            <template #footer>
                <h5 style="text-align: center;">Please wait...</h5>
            </template>
        </Dialog>

        <Dialog header="Confirmation" v-model:visible="canShowConfirmation" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '350px'}" :modal="true" >
            <div class="confirmation-content">
                <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                <span>Are you sure you want to {{currentlySelectedStatus}}?</span>
            </div>
            <template #footer>
                <Button label="Yes" icon="pi pi-check" @click="processApproveReject()" class="p-button-text" autofocus />
                <Button label="No" icon="pi pi-times" @click="hideConfirmDialog(true)" class="p-button-text"/>
            </template>
        </Dialog>
    
        <div class="card">
                <DataTable :value="data_reimbursements" responsiveLayout="scroll" :paginator="true" :rows="5" class="p-datatable-sm">
                <Column field="name" header="Name">
                    <template #body="slotProps">
                        <div class="employee_name">
                            {{ slotProps.data.name }}
                        </div>
                    </template>
                </Column>
                <Column class="fontSize13px" field="reimbursement_date" header="Date"></Column>
                <!-- <Column field="user_data" header="User Data"></Column> -->
                <Column class="fontSize13px" field="from" header="From"></Column>
                <Column class="fontSize13px" field="to" header="To"></Column>
                <Column class="fontSize13px" field="vehicle_type" header="Model Of Transport"></Column>
                <Column class="fontSize13px" field="distance_travelled" header="Distance Covered"></Column>
                <Column class="fontSize13px" field="" header="Total Expenses"></Column>






                <!-- <Column field="reviewer_comments" header="Approver Comm ents"></Column>
                <Column field="reviewer_reviewed_date" header="Reviewed Date"></Column> -->
                <Column field="status" header="Status">
                    <template #body="slotProps">
                        <div :class="css_statusColumn(slotProps.data)">
                            {{ slotProps.data.status }}
                        </div>
                    </template>
                </Column>
                <Column field="" header="Action">
                    <template #body="slotProps">
                        
                        <Button type="button" icon="pi pi-check-circle" class="p-button-success Button"  label="Approval" @click="onClickButton(slotProps.data)" 
                        style="height: 2em;" />
                        <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button "  label="Reject" style="margin-left: 8px;height: 2em;" @click="onClickButton(slotProps.data)" />
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>
<script setup>

    import { ref, onMounted } from 'vue';
    import axios from 'axios'
    import { useConfirm } from "primevue/useconfirm";
    import { useToast } from "primevue/usetoast";

    let data_reimbursements = ref();
    const confirm = useConfirm();
    const toast = useToast();

    onMounted(() => {
        let url_pending = window.location.origin + '/fetch_pending_reimbursements';
        let url_approved_rejected = window.location.origin + '/fetch_approved_rejected_reimbursements';

        console.log("AJAX URL : " + url_pending);

        axios.get(url_pending)
            .then((response) => {
                // console.log("Axios : " + response.data);
                data_reimbursements.value = response.data;

            });

    })

    const css_statusColumn = (data) => {
            return [
                {
                    'pending': data.status === 'Pending',
                    'approved':  data.status === 'Approved',
                    'rejected':  data.status === 'Rejected',
                 }
            ];
        };

    function onClickButton(selectedRowData) {
        console.log("Successfulyy");
    
        //console.log("Button clicked : "+JSON.stringify(event));
        //console.log("Button clicked : "+event[0].employee_name);
        confirm.require({
                message: 'Are you sure you want to proceed?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    toast.add({severity:'success', summary:'Confirmed', detail:'You have accepted', life: 3000});
                },
   reject: () => {
                    toast.add({severity:'error', summary:'Rejected', detail:'You have rejected', life: 3000});
                }
            });
        

        // console.log("Button clicked : "+JSON.stringify(selectedRowData));
    }




</script>
<style  lang="scss">
.p-datatable .p-datatable-thead >tr>th{
    text-align: center;
    padding: 0.3rem 1rem;
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
   
  }
  
.employee_name{
    font-weight: bold;
    font-size: 13px;
}
.p-column-title {
    font-size: 13.5px;
  }
  .fontSize13px{
    font-size: 13px;
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
.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
    color: red;
  }
  .p-button.p-component.p-confirm-dialog-accept {
    background-color: #003056;
  }
  .p-button.p-component.p-confirm-dialog-reject.p-button-text {
    color: #003056;
  }

@media screen and (max-width: 960px) {
    button {
        width: 100%;
        margin-bottom: .5rem;
    }


}
.p-datatable .p-datatable-tbody>tr>td:nth-child(1){
    width: 240px;
}

</style>
