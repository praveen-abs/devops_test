<template>
    <div>
        <div class="card">


            <DataTable ref="dt" :value="products"  dataKey="id"
                :paginator="true" :rows="10"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown" :rowsPerPageOptions="[5,10,25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} products" responsiveLayout="scroll">

                <Column field="claim_type" header="Date"  style="min-width:12rem"> </Column>
                <Column  header="Mode Of Transport  "  style="min-width:8rem">
                    <template #body="slotProps">
                        {{  "&#x20B9;"+slotProps.data.claim_amount }}
                        </template>
                    </Column>

                <Column field="" header="From "  style="min-width:12rem">
                    <template #body="slotProps">
                        {{  "&#x20B9;"+slotProps.data.eligible_amount }}
                        </template>
                </Column>
                <Column field="" header="To"  style="min-width:12rem">
                    <template #body="slotProps">
                        {{  "&#x20B9;"+slotProps.data.eligible_amount }}
                        </template>
                </Column>

                <Column field="" header="Total Distance"  style="min-width:12rem">
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
                <label for="name">Date</label>
                <Calendar inputId="dateformat" v-model="employee_local_conveyance.travelled_date" dateFormat="yy-mm-dd" />
                {{ employee_local_conveyance.travelled_date }}

            </div>

            <div class="field col">
                <label for="Claim Amount">Mode of transport</label>
                <InputText v-model="employee_local_conveyance.mode_of_transport"  />
            </div>

            <div class="formgrid grid">

                <div class="field col">
                    <label for="Eligible Amount">From</label>
                    <InputText v-model="employee_local_conveyance.travel_from"  />
                </div>
                <div class="field col">
                    <label for="Claim Amount">To</label>
                    <InputText v-model="employee_local_conveyance.travel_to"  />
                </div>


            </div>
            <div class="field col">
                <label for="Eligible Amount">Distance travelled</label>
                <InputText  v-model="employee_local_conveyance.total_distance_travelledPle"    />
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
                <span v-if="employee_reimbursement">Are you sure you want to delete the <b>{{employee_reimbursement.claim_type}}</b>?</span>
            </div>
            <template #footer>
                <Button label="No" icon="pi pi-times" class="p-button-text" @click="deleteProductsDialog = false"/>
                <Button label="Yes" icon="pi pi-check" class="btn btn-orange  p-button-text" @click="deleteSelectedProducts" />
            </template>
        </Dialog>
    </div>
</template>


<script setup>

import { ref, onMounted, reactive } from 'vue';

import { useToast } from 'primevue/usetoast';

const emit = defineEmits({
    open:()=>  {

        submitted.value = false;
        productDialog.value = true;
    }
})





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

        const employee_local_conveyance=ref({
            travelled_date:'',
            mode_of_transport:'',
            travel_from:'',
            travel_to:'',
            total_distance_travelled:''
        })



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
            toast.add({severity:'success', summary: 'Successful', detail: 'Products Deleted', life: 3000});
        };




</script>
