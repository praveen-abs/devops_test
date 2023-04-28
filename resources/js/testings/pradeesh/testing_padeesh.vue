<template>
    <div>


        <div>
            <h1 class="text-lg font-semibold text-red-600 my-4">Vmt Testing Table</h1>
        </div>
        <div class="card">
            <div>
      <DataTable :paginator="true" :rows="10" dataKey="id"
        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
        responsiveLayout="scroll" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}" :rowsPerPageOptions="[5, 10, 25]"
        v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
        <template #empty> No customers found. </template>
        <template #loading> Loading customers data. Please wait. </template>

        <Column class="font-bold" field="emp_name" header="Employee Name">
          <!-- <template #body="slotProps">
            {{ slotProps.data.emp_name }}
          </template> -->
          <template #filter="{ filterModel, filterCallback }">
            <InputText v-model="filterModel.value" @input="filterCallback()" placeholder="Search" class="p-column-filter"
              :showClear="true" />
          </template>
        </Column>
        <Column field="emp_code" header="Employee Code" :sortable="true"></Column>
        <Column field="emp_designation" header="Welcome Mail status " style="min-width: 15rem;"></Column>

        <Column style="width: 300px" field="" header="Action">
          <template #body="slotProps">
              <Button  icon="pi pi-check-circle" severity="success" label="Activate" class="p-button-success Button"
                @click="showConfirmDialog(slotProps.data, 'Active')" style="height: 2em" />
          </template>
        </Column>
      </DataTable>
    </div>

        </div>


    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';


// onMounted(() => {
//     ProductService.getProductsMini().then((data) => (products.value = data));
// });

const products = ref();
</script>

