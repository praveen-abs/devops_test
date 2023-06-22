<template>
    <div class="w-full mx-2">
        <section id="header" class="flex justify-between w-full my-4 ">
            <p class="w-4 mx-1 font-semibold fs-5.5">Salary Compenents</p>
            <div><button class="btn btn-orange">Add Components</button></div>
        </section>
        <DataTable :value="products">
            <Column field="name" header="Name"></Column>
            <Column field="category" header="Tax Status"></Column>
            <Column field="category" header="Actions"></Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';


</script>


<style scoped></style>