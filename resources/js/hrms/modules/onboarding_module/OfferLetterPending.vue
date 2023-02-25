<template>
    <div>
        <DataTable :value="products" :paginator="true" :rows="10" dataKey="id" :rowHover="true" :paginatorPosition="right"
            v-model:selection="selectedCustomers" v-model:filters="filters" filterDisplay="menu" :loading="loading"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[10, 25, 50]" currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries"
            responsiveLayout="scroll" :filters="filters"
            :globalFilterFields="['name', 'country.name', 'representative.name', 'status']">
            <template #header>
                <div class="flex justify-content-start align-items-center">

                    <span class="p-input-icon-left">
                        <i class="pi pi-search" />
                        <InputText v-model="filters['global'].value" class="w-100" placeholder="Keyword Search" />

                    </span>
                </div>
            </template>
            <Column field="candidate_id" header="Candidate ID"></Column>
            <Column field="candidate_name" header="Candidate Name"></Column>
            <Column field="candidate_role" header="Role"></Column>
            <Column field="candidate_offerPay" header="Offered Pay"></Column>

            <Column field="actions" header="Actions">
                <template #body>
                    <!-- <Button label="" class="bg-transparent text-dark me-3 outline-none border-0 h-25 w-25 p-0" icon="pi pi-pencil" @click="display"  />
                    <Button label="" class="bg-transparent text-danger outline-none border-0 h-25 w-25 p-0" icon="pi pi-trash" @click="display"  /> -->

                    <button class="btn fs-15 fa fa-pencil-square-o  bg-transparent outline-none border-0 me-1" @click="display"></button>
                    <button class="btn fs-15 fa fa-trash text-danger bg-transparent outline-none border-0" @click="display"></button>

                </template>
            </Column>
        </DataTable>

    </div>
    <Dialog header="Header" v-model:visible="displayBasic" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '50vw' }">
        <p></p>

    </Dialog>
</template>



<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios';
import { FilterMatchMode, FilterOperator } from "primevue/api";

const products = ref();
const displayBasic = ref(false)


const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});

onMounted(() => {
    products.value = getProductDetails().data;

    axios.get('https://jsonplaceholder.typicode.com/posts/1')
        .then((response) => {
            console.log("Axios : " + response.data.title);
        });

})

const display = () => {
    displayBasic.value = true
}

function getProductDetails() {
    return {
        "data": [
            { "candidate_id": "ABS001", "candidate_name": "Joe", "candidate_role": "UI designer", "candidate_offerPay": "5L,Net", "actions": "" }

        ]
    };
}




</script>
