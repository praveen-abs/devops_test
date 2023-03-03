<template>

<div class="reimbursement-wrapper mt-30">
    <div class="card  left-line mb-2">
        <div class="card-body  pb-1 pt-1">
            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">

                    <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                        <li class="nav-item text-muted " role="presentation">
                            <a class="nav-link active pb-2" data-bs-toggle="tab" href="#reimbursement"
                                aria-selected="true" role="tab">
                                Reimbursement
                            </a>
                        </li>
                        <li class="nav-item text-muted ms-5" role="presentation">
                            <a class="nav-link  pb-2" data-bs-toggle="tab" href="#localConveyance"
                                aria-selected="true" role="tab">
                                Local Conveyance
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 d-flex justify-content-end">
                    <select name="" id="" class="form-select border-primary w-50 me-3">
                        <option value="" disabled hidden selected>Choose Month</option>
                        <option value="">Jan 2023</option>
                        <option value="">Feb 2023</option>
                    </select>
                    <button @click="openNew" class="btn btn-orange"><i class="fa fa-plus-circle me-1"></i>Add Claim</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane show fade active" id="reimbursement" role="tabpanel"
                    aria-labelledby="pills-profile-tab">
                    <div id="table">
                        <div>
                            <div class="card">


                                <DataTable ref="dt" :value="products"  dataKey="id"
                                    :paginator="true" :rows="10"
                                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown" :rowsPerPageOptions="[5,10,25]"
                                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} products" responsiveLayout="scroll">

                                    <Column field="claim_type" header="Claim type"  style="min-width:12rem"> </Column>
                                    <Column  header="Claim amount"  style="min-width:8rem">
                                        <template #body="slotProps">
                                            {{  "&#x20B9;"+slotProps.data.claim_amount }}
                                            </template>
                                        </Column>

                                    <Column field="" header="Eligible Amount"  style="min-width:12rem">
                                        <template #body="slotProps">
                                            {{  "&#x20B9;"+slotProps.data.eligible_amount }}
                                            </template>
                                    </Column>

                                    <Column :exportable="false" field="upload" header="Action"  style="min-width:8rem">
                                        <template #body="slotProps">
                                            <Button style="height: 30px;" icon="pi pi-pencil"  class="p-button-rounded p-button-warning mr-2" @click="editProduct(slotProps.data)" />
                                            <Button style="height: 30px;" icon="pi pi-trash"  class="p-button-rounded p-button-danger mr-2" @click="confirmDeleteSelected(slotProps.data)" />
                                        </template>
                                    </Column>
                                </DataTable>
                            </div>

                            <Dialog v-model:visible="productDialog" :style="{width: '450px'}" header="Reimbursement Detials" :modal="true" class="p-fluid">
                                <div class="field">
                                    <label for="name">Claim Type</label>
                                    <!-- <Dropdown id="inventoryStatus" v-model="employee_reimbursement.claim_type" :options="statuses" optionLabel="label" placeholder="Select a Status"></Dropdown> -->
                                    <select class="form-select textbox onboard-form form-control"  v-model="employee_reimbursement.claim_type" >
                                        <option  v-for="types in statuses" :key="types.value">
                                            {{ types.label }}
                                        </option>
                                      </select>
                                </div>

                                <div class="formgrid grid">
                                    <div class="field col">
                                        <label for="Claim Amount">Claim Amount</label>
                                        <InputNumber v-model="employee_reimbursement.claim_amount" mode="currency" currency="INR" locale="en-IN"  />
                                    </div>

                                    <div class="field col">
                                        <label for="Eligible Amount">Eligible Amount</label>
                                        <InputNumber  v-model="employee_reimbursement.eligible_amount" mode="currency" currency="INR" locale="en-IN" integeronly  />
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="mb-3">file Upload</label>
                                    <div class="formgrid">
                                        <Button label="Upload" icon="pi pi-upload" class="p-button-primary" @click="saveProduct" />
                                    </div>
                                </div>


                                <template #footer>
                                    <Button label="Cancel" icon="pi pi-times" style="height: 30px;color:black" class="p-button-text" @click="hideDialog"/>
                                    <Button label="Save" icon="pi pi-check" style="height: 30px;background: rgb(255 135 38);color: white;" @click="saveProduct" />
                                </template>
                            </Dialog>

                            <Dialog v-model:visible="deleteProductDialog" :style="{width: '450px'}" header="Confirm" :modal="true">
                                <div class="confirmation-content">
                                    <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                                    <span v-if="employee_reimbursement">Are you sure you want to delete <b>{{employee_reimbursement.claim_type}}</b>?</span>
                                </div>
                                <template #footer>
                                    <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteProductDialog = false"/>
                                    <Button label="Yes" icon="pi pi-check" class="p-button-text" @click="deleteProduct" />
                                </template>
                            </Dialog>

                            <Dialog v-model:visible="deleteProductsDialog" :style="{width: '450px'}" header="Confirm" :modal="true">
                                <div class="confirmation-content">
                                    <i class="pi pi-exclamation-triangle mr-3" style="font-size: 2rem" />
                                    <span v-if="product">Are you sure you want to delete the selected products?</span>
                                </div>
                                <template #footer>
                                    <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteProductsDialog = false"/>
                                    <Button label="Yes" icon="pi pi-check" class="btn btn-orange  p-button-text" @click="deleteSelectedProducts" />
                                </template>
                            </Dialog>
                        </div>
                    </div>
                </div>

                </div>
                <div class="tab-pane show fade active" id="localConveyance" role="tabpanel"
                    aria-labelledby="pills-profile-tab">

                </div>
            </div>
        </div>
    </div>


</template>


<script setup>
import { ref, onMounted, reactive } from 'vue';

import { useToast } from 'primevue/usetoast';

        // onMounted(() => {
        //     productService.value.getProducts().then(data => products.value = data);
        // })

        const toast = useToast();
        const dt = ref();
        const products = ref([
       {"id": "1000","claim_type": "Bamboo Watch","claim_amount": 65,"eligible_amount": 24,},
       {"id": "1001","claim_type": "Black Watch","claim_amount": 72,"eligible_amount": 61,},


        ]);
        const productDialog = ref(false);
        const deleteProductDialog = ref(false);
        const deleteProductsDialog = ref(false);
        const employee_reimbursement = ref({
            claim_type:'',
            claim_amount:Number,
            eligible_amount:Number,
            File:''

        });



        const submitted = ref(false);
        const statuses = ref([
	     	{label: 'Mobile Bills',value: 'Mobile Bills'},
	     	{label: 'Accommodation',value: 'Accommodation'},
	     	{label: 'Mobile Bills',value: 'Mobile Bills'},
            {label: 'Travel Expenses',value: 'Travel Expenses'},
	     	{label: 'Miscellaneous',value: 'Miscellaneous'},
	     	{label: 'Medical Expenses',value: 'Medical Expenses'},
            {label: 'Others',value: 'Others'}
           ]);


        const openNew = () => {

            submitted.value = false;
            productDialog.value = true;
        };
        const hideDialog = () => {
            productDialog.value = false;
            submitted.value = false;
        };

        const editProduct = (prod) => {
            employee_reimbursement.value = {...prod};
            productDialog.value = true;
        };
    const saveProduct = () => {
    submitted.value = true;
    products.value.push(employee_reimbursement.value);
    toast.add({ severity: 'success', summary: 'Successful', detail: 'Product Created', life: 3000 });
    productDialog.value = false;
    console.log(employee_reimbursement.value);
};

const claim=()=>{
    console.log(type.value);
    employee_reimbursement.claim_type=type.value
}

        const deleteProduct = () => {

            deleteProductDialog.value = false;

            toast.add({severity:'success', summary: 'Successful', detail: 'Product Deleted', life: 3000});
        };


        const confirmDeleteSelected = () => {
            deleteProductsDialog.value = true;
        };
        const confirmDeleteProduct = (prod) => {
            employee_reimbursement.value = prod;
            deleteProductDialog.value = true;
        };
        const deleteSelectedProducts = () => {

            deleteProductsDialog.value = false;
            selectedProducts.value = null;
            toast.add({severity:'success', summary: 'Successful', detail: 'Products Deleted', life: 3000});
        };


</script>






<style  lang="scss">
.main-content{
    width: 80%;
}
.p-datatable .p-datatable-thead >tr>th{
    text-align: center;
    padding: 1rem 1rem;
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
