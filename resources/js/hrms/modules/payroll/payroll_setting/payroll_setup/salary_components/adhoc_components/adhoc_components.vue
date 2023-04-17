<template>
    <div class="w-full mx-2 my-4">
        <div class="flex mx-2">
            <div>
                <p class="w-12">Adhoc Components refer to salary components that are not part of an employee regular monthly pay and are typically added for a specific payroll month. These compenents can take various forms.such as a joining bonus,reimbursements,leave encashment at the end year, or penalty for late arrival.</p>
            </div>
            <div class="mx-6">
                <InputText></InputText>
            </div>
        </div>
        <div class="flex gap-8 mx-3 my-4 justify-evenly">
            <div class="w-5 ">
                <div class="flex justify-between mx-5 my-4" >
                    <p class="w-4">Adhoc Allowances</p>
                    <button>Add new</button>
                </div>
                <div id="table">
                    <DataTable :value="products" >
                        <Column field="code" header="Code"></Column>
                        <Column field="name" header="Name"></Column>
                        <Column field="category" header="Category"></Column>
                        <Column field="quantity" header="Quantity"></Column>
                    </DataTable>
                    
                </div>
            </div>
            <div class="w-5">
                <div>
                    <div class="flex justify-between mx-5 my-4" >
                        <p class="w-4">Deductions</p>
                    <button>Add new</button>
                    </div>
                    <div id="table">
                        <DataTable :value="products" >
                            <Column field="code" header="Code"></Column>
                            <Column field="name" header="Name"></Column>
                            <Column field="category" header="Category"></Column>
                            <Column field="quantity" header="Quantity"></Column>
                        </DataTable>
                        
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mx-5 my-4" >
                        <p class="w-4">Bonus</p>
                    <button>Add new</button>
                    </div>
                    <div id="table">
                        <DataTable :value="products" >
                            <Column field="code" header="Code"></Column>
                            <Column field="name" header="Name"></Column>
                            <Column field="category" header="Category"></Column>
                            <Column field="quantity" header="Quantity"></Column>
                        </DataTable>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script setup>
import { ref, onMounted } from 'vue';

const products = ref([
    {product: 'Bamboo Watch', lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342},
    {product: 'Black Watch', lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122},
    {product: 'Blue Band', lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500},
    {product: 'Blue T-Shirt', lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323},
    {product: 'Brown Purse', lastYearSale: 17, thisYearSale: 79, lastYearProfit: 643242, thisYearProfit: 500332},
    {product: 'Chakra Bracelet', lastYearSale: 52, thisYearSale:  65, lastYearProfit: 421132, thisYearProfit: 150005},
    {product: 'Galaxy Earrings', lastYearSale: 82, thisYearSale: 12, lastYearProfit: 131211, thisYearProfit: 100214},
    {product: 'Game Controller', lastYearSale: 44, thisYearSale: 45, lastYearProfit: 66442, thisYearProfit: 53322},
    {product: 'Gaming Set', lastYearSale: 90, thisYearSale: 56, lastYearProfit: 765442, thisYearProfit: 296232},
    {product: 'Gold Phone Case', lastYearSale: 75, thisYearSale: 54, lastYearProfit: 21212, thisYearProfit: 12533}
]);




</script>
