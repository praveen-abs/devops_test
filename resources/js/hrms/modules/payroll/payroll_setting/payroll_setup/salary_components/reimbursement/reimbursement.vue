<template>
    <div class="w-full mx-2">
      <section id="header" class="flex justify-between w-full my-4 ">
          <div>Salary Compenents</div>
          <div><button class="btn btn-orange">Add Components</button></div>
      </section>
  <DataTable :value="sales">
      <ColumnGroup type="header">
          <Row>
              <Column header="Product" :rowspan="3" />
              <Column header="Product" :rowspan="3" />
              <Column header="Product" :rowspan="3" />
              <Column header="Profits" :colspan="2" />
              <Column header="Product" :rowspan="3" />
              <Column header="Product" :rowspan="3" />

          </Row>
          <Row>
          </Row>
          <Row>
              <Column header="Product" :rowspan="3" />
              <Column header="Product" :rowspan="3" />
          </Row>
      </ColumnGroup>
      <Column field="product" />
      <Column field="lastYearSale">
          <template #body="slotProps">
              {{slotProps.data.lastYearSale}}%
          </template>
      </Column>
      <Column field="thisYearSale">
          <template #body="slotProps">
              {{slotProps.data.thisYearSale}}%
          </template>
      </Column>
      <Column field="lastYearProfit">
          <template #body="slotProps">
              {{formatCurrency(slotProps.data.lastYearProfit)}}
          </template>
      </Column>
      <Column field="thisYearProfit">
          <template #body="slotProps">
              {{formatCurrency(slotProps.data.thisYearProfit)}}
          </template>
      </Column>
      <Column field="thisYearProfit">
          <template #body="slotProps">
              {{formatCurrency(slotProps.data.thisYearProfit)}}
          </template>
      </Column>
      <Column field="thisYearProfit">
          <template #body="slotProps">
              {{formatCurrency(slotProps.data.thisYearProfit)}}
          </template>
      </Column>
   
      
  </DataTable>
    </div>

</template>

<script setup>
import { ref, computed } from 'vue';


const sales = ref([
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

const formatCurrency = (value) => {
  return value.toLocaleString('en-US', {style: 'currency', currency: 'USD'});
};

const lastYearTotal = computed(() => {
  let total = 0;
  for(let sale of sales.value) {
      total += sale.lastYearProfit;
  }

  return formatCurrency(total);
});

const thisYearTotal = computed(() => {
  let total = 0;
  for(let sale of sales.value) {
      total += sale.thisYearProfit;
  }

  return formatCurrency(total);
});

</script>


<style scoped></style>