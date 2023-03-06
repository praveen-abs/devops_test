import { defineStore } from "pinia";
import { ref, onMounted, reactive } from 'vue';
import { useToast } from 'primevue/usetoast';



export const employee_reimbursment_service = defineStore('employee_reimbursment_service', () => {

    const products = ref([
        { "id": "1000", "claim_type": "Bamboo Watch", "claim_amount": 65, "eligible_amount": 24, },
        { "id": "1001", "claim_type": "Black Watch", "claim_amount": 72, "eligible_amount": 61, },


    ]);
    const productDialog = ref(false);
    const deleteProductDialog = ref(false);
    const deleteProductsDialog = ref(false);
    const employee_reimbursement = ref({
        claim_type: '',
        claim_amount: Number,
        eligible_amount: Number,
        File: ''

    });

    const employee_local_conveyance = ref({
        travelled_date: '',
        mode_of_transport: '',
        travel_from: '',
        travel_to: '',
        total_distance_travelled: ''
    })



    const submitted = ref(false);
    const statuses = ref([
        { label: 'Mobile Bills', value: 'Mobile Bills' },
        { label: 'Accommodation', value: 'Accommodation' },
        { label: 'Travel Expenses', value: 'Travel Expenses' },
        { label: 'Miscellaneous', value: 'Miscellaneous' },
        { label: 'Medical Expenses', value: 'Medical Expenses' },
        { label: 'Others', value: 'Others' }
    ]);


    const open_reimbursment = () => {

        submitted.value = false;
        productDialog.value = true;
    };

    const open_local_convergance = () => {

        submitted.value = false;
        productDialog.value = true;
    };
    const hideDialog = () => {
        productDialog.value = false;
        submitted.value = false;
    };

    const editProduct = (prod) => {
        employee_reimbursement.value = { ...prod };
        productDialog.value = true;
    };
    const saveProduct = () => {
        submitted.value = true;
        products.value.push(employee_reimbursement.value);
        productDialog.value = false;
        console.log(employee_reimbursement.value);
    };


    const deleteProduct = () => {

        deleteProductDialog.value = false;

        toast.add({ severity: 'success', summary: 'Successful', detail: 'Product Deleted', life: 3000 });
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
        toast.add({ severity: 'success', summary: 'Successful', detail: 'Products Deleted', life: 3000 });
    };



    return {
        products, productDialog, hideDialog, deleteProduct, deleteProductDialog, deleteSelectedProducts, confirmDeleteProduct,
        confirmDeleteSelected, saveProduct, editProduct, employee_local_conveyance, employee_reimbursement, statuses, open_reimbursment, open_local_convergance
    }
})
