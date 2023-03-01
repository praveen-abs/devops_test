<template>
    <div>
            <!-- <ConfirmDialog></ConfirmDialog> -->
            <Toast />
            <Dialog header="Header" v-model:visible="loading" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '25vw'}" :modal="true" :closable="false" :closeOnEscape="false">
                <template #header>
                    <ProgressSpinner style="width:50px;height:50px" strokeWidth="8" fill="var(--surface-ground)" animationDuration="2s" aria-label="Custom ProgressSpinner"/>
                </template>
                <template #footer>
                    <h5 style="text-align: center;">Please wait...</h5>
                </template>
            </Dialog>
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
            <div>


                <DataTable :paginator="true" :rows="10" dataKey="id"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                 responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                <template #empty>
                    No Reimbursement data for the selected status filter
                </template>
                <template #loading>
                    Loading customers data. Please wait.
                </template>
                <Column field="name" header="Employee Name" >
                    <template #body="slotProps">
                        {{ slotProps.data.name}}
                    </template>
                      <template #filter="{filterModel,filterCallback}">
                        <InputText v-model="filterModel.value" @input="filterCallback()"  placeholder="Search" class="p-column-filter" :showClear="true" />
                       </template>
                </Column>
                <Column class="fontSize13px" field="reimbursement_date" header="Date" :sortable="true">
                    <template #body="slotProps">
                    <!-- {{ slotProps.data.reimbursement_date }} -->
                        {{ dateFormat(slotProps.data.reimbursement_date, "dd-mm-yyyy, h:MM TT") }}
                    </template>
                </Column>
                <!-- <Column field="user_data" header="User Data"></Column> -->
                <Column class="fontSize13px" field="from" header="From"></Column>
                <Column class="fontSize13px" field="to" header="To"></Column>
                <Column class="fontSize13px" field="vehicle_type" header="Mode Of Transport"></Column>
                <Column class="fontSize13px" field="distance_travelled" header="Distance Covered"></Column>
                <Column class="fontSize13px" field="total_expenses" header="Total Expenses">
                    <template #body="slotProps">
                        {{  "&#8377; "+slotProps.data.total_expenses  }}
                    </template>
                </Column>



                <Column field="" header="Action">
                    <template #body="slotProps">
                        <span v-if="slotProps.data.status == 'Pending'">

                            <Button type="button" icon="pi pi-check-circle" class="p-button-success Button"  label="Approve" @click="showConfirmDialog(slotProps.data,'Approve')"
                            style="height: 2em;" />
                            <Button type="button" icon="pi pi-times-circle" class="p-button-danger Button "  label="Reject" style="margin-left: 8px;height: 2em;" @click="showConfirmDialog(slotProps.data,'Reject')" />
                        </span>
                    </template>
                </Column>
            </DataTable>
            <Button label="Submit" icon="pi pi-check" iconPos="right" />
        </div>
    </div>
</template>

<script setup>

    import { ref, onMounted } from 'vue';
    import dateFormat, { masks } from "dateformat";
    import axios from 'axios'
    import {FilterMatchMode,FilterOperator} from 'primevue/api';
    import  { useConfirm } from "primevue/useconfirm";
    import  { useToast }  from "primevue/usetoast";


    let data_reimbursements = ref();
    const two_wheller_km_price=ref(3);
    const four_wheller_km_price=ref(4);
    const total_expenses =ref();
    let canShowConfirmation = ref(false);
    let canShowLoadingScreen = ref(false);
    const confirm = useConfirm();
    const toast = useToast();
    const loading=ref(true)


    const filters = ref({
            global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            name: {
             value: null,
                     matchMode: FilterMatchMode.STARTS_WITH,
                     matchMode:FilterMatchMode.EQUALS,
                     matchMode:FilterMatchMode.CONTAINS,

                    },

             status:  { value: null, matchMode: FilterMatchMode.EQUALS },

        });
    const statuses = ref([
            'Pending', 'Approved', 'Rejected'
    ]);

    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;

    onMounted(() => {
        ajax_GetReimbursementData();
    })

    function ajax_GetReimbursementData(){
        let url_all_reimbursements = window.location.origin + '/fetch_all_reimbursements';


        console.log("AJAX URL : " + url_all_reimbursements);

        axios.get(url_all_reimbursements)
            .then((response) => {
                // console.log("Axios : " + response.data);
                data_reimbursements.value = response.data;
                console.log(response.data);
                loading.value=false

            });

    }

    function showConfirmDialog(selectedRowData, status){
        canShowConfirmation.value = true;
        currentlySelectedStatus = status;
        currentlySelectedRowData = selectedRowData;

        console.log("Selected Row Data : "+JSON.stringify(selectedRowData));
    }

    function hideConfirmDialog(canClearData){
        canShowConfirmation.value = false;

        if(canClearData)
            resetVars();

    }

    function resetVars(){
        currentlySelectedStatus = '';
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
                    'pending': data.status === 'Pending',
                    'approved':  data.status === 'Approved',
                    'rejected':  data.status === 'Rejected',
                 }
            ];
        };

    function processApproveReject() {

        hideConfirmDialog(false);

        canShowLoadingScreen.value = true;

        console.log("Processing Rowdata : "+ JSON.stringify(currentlySelectedRowData));
        console.log("currentlySelectedStatus : "+ currentlySelectedStatus);


        axios.post(window.location.origin + '/reimbursements-approve-reject', {
            reimbursement_id: currentlySelectedRowData.id,
            status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus =="Reject" ? "Rejected" : currentlySelectedStatus ,
            reviewer_comments: ''
        })
        .then((response) => {
            console.log(response);

            canShowLoadingScreen.value = false;

            toast.add({severity:'info', summary: 'Info', detail:'Success', life: 3000});
            ajax_GetReimbursementData();

            resetVars();
        })
        .catch((error) => {

            canShowLoadingScreen.value = false;
            resetVars();

            console.log(error.toJSON());
        });
    }

</script>


<style  lang="scss">
.main-content{
    width: 101%;
}
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
      .p-dropdown .p-dropdown-label.p-placeholder{
        margin-top: -12px;
      }

    .p-column-filter-menu-button{
        color: white;
        margin-left: 10px;

    }
    .p-column-filter-menu-button:hover {
        color:white;
        border-color: transparent;
        background: #023e70;
      }

  }
  .p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
    margin-bottom: 0.5rem;
    visibility: hidden;
    position: absolute;
  }

  .p-button .p-component .p-button-sm{
    background-color: #003056;
  }

.p-datatable .p-datatable-tbody > tr{
    font-size: 13px;
    .employee_name{
        font-weight: bold;
        font-size: 13.5px;
    }


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


@media screen and (max-width: 960px) {
    button {
        width: 100%;
        margin-bottom: .5rem;
    }


}
.p-datatable .p-datatable-tbody>tr>td:nth-child(1){
    width: 200px;
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
  .p-column-filter-menu-button.p-column-filter-menu-button-open{
    background: none;
  }
  .p-column-filter-menu-button.p-column-filter-menu-button-active{
    background: none;

  }
  .p-datatable .p-datatable-thead > tr > th .p-column-filter {
    width: 50%;
  }

  /* For Sort */

  .p-datatable .p-sortable-column:not(.p-highlight):hover {
    background: #003056;
    color:white;
  }
  .p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
      color:white
  }
   .p-datatable .p-sortable-column.p-highlight {
    background: #003056;
    color:white;
  }

  .p-datatable .p-sortable-column.p-highlight:hover {
    background: #003056;
    color:white;
  }
  .p-datatable .p-sortable-column:focus {
    box-shadow: none;
    outline: none;
    color: white;
  }
  .p-datatable .p-sortable-column .p-sortable-column-icon{
    color:white
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
