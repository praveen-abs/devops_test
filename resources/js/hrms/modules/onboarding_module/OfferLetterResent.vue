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

            <Column field="candidate_status" header="Status ">
                <template #body>

                    <div class="status">
                        <div class="arrow ">

                            <p class=" text-initial "><span class="me-1 font-medium">Offer Sent </span> <a
                                    class="fa text-muted fa-eye me-1" @click="viewOffer" href="#"></a></p>
                            <p class="fs-10 text-initial">01-Jan-2023</p>
                        </div>
                        <div class="arrow ">
                            <p class=" text-initial "><span class="me-1 font-medium">Offer Sent </span> <a
                                    class="fa text-muted fa-eye me-1" @click="viewOffer" href="#"></a></p>
                            <p class="fs-10 text-initial">01-Jan-2023</p>
                        </div>
                    </div>

                    <!-- <button  class="bg-transparent outline-none border-0 btn "  @click="viewOffer"><span class="me-1 text-info font-medium">Accepted </span> <i class="fa text-muted fa-eye me-1"></i></button>
                        <button  class="bg-transparent outline-none border-0 btn "  @click="viewOffer"><span class="me-1 text-danger font-medium"> Declined </span> <i class="fa text-muted fa-eye me-1"></i></button> -->

                </template>
            </Column>
            <!-- <Column field="actions" header="Actions">
                <template #body>

                    <button class="btn btn-orange me-2" @click="revokeOffer">Revoke Offer</button>

                    <button class="btn btn-border-primary" @click="cancelOffer">Cancel Offer</button>

                </template>
            </Column> -->
        </DataTable>

    </div>
</template>



<script>

import { ref, onMounted } from 'vue';
import axios from 'axios';
import { FilterMatchMode, FilterOperator } from "primevue/api";


export default {

    setup() {
        const products = ref();


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

        function getProductDetails() {
            return {
                "data": [
                    { "candidate_id": "ABS001", "candidate_name": "Joe", "candidate_role": "UI designer", "candidate_status": "5L,Net", }

                ]
            };
        }

        return { products, filters }
    }
}

</script>


<style lang="scss">
// .arrow:hover {
//     transform: scale(1.2);
//     transform: translate(1.2px);

// }

.status{
    position: relative;
}
.arrow{
    position: absolute;
    /* top: 25px; */
    width: 49%;
    height: 4px;
    background-color: #141414;
    box-shadow: 0 3px 5px rgb(202 202 202 / 40%);
}

.arrow::after,
.arrow::before {
    content: " ";
    position: absolute;
    width: 60%;
    height: 10px;
    right: -8px;
    /*   left:-8px; */
    background-color: #141414;
}

.arrow::after {
    top: -12px;
    /*   box-shadow:0 3px 5px rgba(0,0,0,.2); */

    transform: rotate(45deg);
}

.arrow::before {
    top: 12px;
    transform: rotate(-45deg);
    box-shadow: 0 3px 5px rgba(0, 0, 0, .2)
}
</style>
