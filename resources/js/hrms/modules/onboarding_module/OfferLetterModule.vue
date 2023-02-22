<template>
    <div>
        <DataTable :value="products" responsiveLayout="scroll">
            <Column field="code" header="Candidate ID"></Column>
            <Column field="name" header="Candidate Name"></Column>
            <Column field="category" header="Role"></Column>
            <Column field="quantity" header="Order Pay"></Column>
            <Column field="actions" header="Actions"></Column>
        </DataTable>
    </div>
</template>
<script>

import { ref, onMounted } from 'vue';
import axios from 'axios'

export default {
    setup() {
        const products = ref();

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
                    { "id": "1000", "code": "f230fh0g3", "name": "Bamboo Watch", "description": "Product Description", "image": "bamboo-watch.jpg", "price": 65, "category": "Accessories", "quantity": 24, "inventoryStatus": "INSTOCK", "rating": 5 },
                    { "id": "1001", "code": "nvklal433", "name": "Black Watch", "description": "Product Description", "image": "black-watch.jpg", "price": 72, "category": "Accessories", "quantity": 61, "inventoryStatus": "INSTOCK", "rating": 4 },
                    { "id": "1002", "code": "zz21cz3c1", "name": "Blue Band", "description": "Product Description", "image": "blue-band.jpg", "price": 79, "category": "Fitness", "quantity": 2, "inventoryStatus": "LOWSTOCK", "rating": 3 },
                ]
            };
        }

        return { products }
    }
}

</script>
