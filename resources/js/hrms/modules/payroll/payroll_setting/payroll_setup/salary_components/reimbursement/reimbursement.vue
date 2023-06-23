<template>
    <div class="w-full ">
        <section id="header" class="flex justify-between w-full my-4 ">
            <p class="w-4 mx-1 font-semibold fs-5.5">Salary Compenents</p>
            <div><button class="btn btn-orange"><i class="pi pi-plus mx-1" style="font-size: 0.8rem"></i>Add Components</button></div>
        </section>
        <DataTable :value="helper.filterSource(usePayroll.salaryComponentsSource,4)">
            <Column field="comp_name" header="Name"></Column>
            <Column field="is_taxable" header="Tax Status">
                <template #body="{ data }">
                    <p>{{ helper.findIsSelected(data.is_taxable) }}</p>
                </template>
            </Column>
            <Column  header="Actions">
                <template #body>
                    <i class="pi pi-pencil" style="font-size: 1rem"></i>
                    <i class="pi pi-trash mx-3" style="font-size: 1rem"></i>
                </template>
            </Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { usePayrollMainStore } from '../../../../stores/payrollMainStore';
import {usePayrollHelper} from '../../../../stores/payrollHelper';

const usePayroll = usePayrollMainStore()
const helper = usePayrollHelper()


</script>


<style scoped></style>