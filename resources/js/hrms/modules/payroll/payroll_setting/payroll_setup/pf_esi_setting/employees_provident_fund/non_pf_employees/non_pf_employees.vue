<template>
    <div>
        <div class="flex justify-between mx-2 my-4" >
           <div>
            <p>Non-PF Employees</p>
          <div class="flex gap-6">
            <div class="w-8 p-1 my-3 bg-red-100 rounded-lg">
               <p class="text-blue"><strong>Note:</strong> Once payroll processing begins employees asigned to the Gross - HRA * 12% or restricted PF wage calculation Method cannot e swtiched to a non-pf employee status, nut the reverse is possible
               </p>
            </div>
        <div class="mx-6 my-6 ml-9">
        <button class="mx-4 btn btn-border-orange">Cancel</button>
        <button class="btn btn-orange">Add More</button>
      </div>
          </div>
           </div>
      
        </div>
        <div id="table">
            <DataTable :value="products" >
                <Column field="product" header="Code"></Column>
                <Column field="lastYearSale" header="Name"></Column>
                <Column field="thisYearSale" header="Category"></Column>
                <Column field="thisYearProfit" header="Quantity"></Column>
            </DataTable>
            
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