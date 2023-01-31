<template>
	<div>
        <DataTable :value="att_regularization" responsiveLayout="scroll" :paginator="true" :rows="5">
            <Column field="employee_name" header="Name"></Column>
            <Column field="attendance_date" header="Date"></Column>
            <Column field="regularization_type" header="Type"></Column>
            <Column field="user_time" header="Actual Time"></Column>
        </DataTable>
	</div>
</template>
<script>

import { ref, onMounted } from 'vue';
import axios from 'axios'

export default {
    setup() {
        let att_regularization = ref();

        onMounted(() => {
            let url = window.location.origin+'/fetch-regularization-approvals';

            console.log("AJAX URL : "+ url);

            axios.get(url)
                 .then((response) => {
                    console.log("Axios : "+response.data);
                    att_regularization.value = response.data;

            });

        })

        function getProductDetails(){
             return {
                "data": [
                    {"id": "1000","code": "f230fh0g3","name": "Bamboo Watch","description": "Product Description","image": "bamboo-watch.jpg","price": 65,"category": "Accessories","quantity": 24,"inventoryStatus": "INSTOCK","rating": 5},
                    {"id": "1001","code": "nvklal433","name": "Black Watch","description": "Product Description","image": "black-watch.jpg","price": 72,"category": "Accessories","quantity": 61,"inventoryStatus": "INSTOCK","rating": 4},
                    {"id": "1002","code": "zz21cz3c1","name": "Blue Band","description": "Product Description","image": "blue-band.jpg","price": 79,"category": "Fitness","quantity": 2,"inventoryStatus": "LOWSTOCK","rating": 3},
                ]
            };
        }

        return { att_regularization }
    }
}

</script>
