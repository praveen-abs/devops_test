<template>
    <div>
        <DataTable :value="products" responsiveLayout="scroll" v-model:filters="filters"
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

                        <button class="btn fs-15 fa fa-pencil-square-o  bg-transparent outline-none border-0 me-1" @click="editDeletedOffer"></button>
                    <button class="btn fs-15 fa fa-trash text-danger bg-transparent outline-none border-0" @click="removeDeletedOffer"></button>
                </template>
            </Column>
        </DataTable>

    </div>

    <Dialog header="Header" v-model:visible="notifyPopup" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '50vw' }">
        <p></p>

    </Dialog>

</template>



<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios';
import { FilterMatchMode, FilterOperator } from "primevue/api";

const notifyPopup = ref(false);
const products = ref();

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});

const editDeletedOffer=()=>{
    notifyPopup.value = true;
}
const removeDeletedOffer=()=>{
    notifyPopup.value = true;
}
onMounted(() => {
    products.value = getProductDetails().data;

    axios.get('https://jsonplaceholder.typicode.com/posts/1')
        .then((response) => {
            console.log("Axios : " + response.data.title);
        });

})

function getProductDetails() {
    return {
        "data": [
            { "candidate_id": "ABS001", "candidate_name": "Joe", "candidate_role": "UI designer", "candidate_offerPay": "5L,Net", "actions": "" }

        ]
    };
}


</script>
