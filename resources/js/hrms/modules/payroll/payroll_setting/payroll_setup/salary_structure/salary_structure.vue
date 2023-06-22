<template>
    <div class="w-full p-3">
        <div v-if="!usePayroll.dailogNewSalaryStructure">
            <section id="header" class="flex mx-2 my-5">
                <div class="w-10">
                    <p class="font-semibold text-gray-800 fs-5"> Salary Structure <span
                            class="font-semibold text-gray-600 fs-6">(Paygroup)</span></p>
                </div>
                <div class="float-right">
                    <button class=" btn btn-orange float-right ml-8" @click="usePayroll.dailogNewSalaryStructure = true">Add
                        Structure</button>
                </div>
            </section>
            <div id="table-responsive">
                <DataTable :value="usePayroll.salaryStructureSource">
                    <Column field="Components" header="Salary structure name"></Column>
                    <Column field="lastYearSale" header="No of assigned employees"></Column>
                    <Column field="lastYearSale" header="Created at"></Column>
                    <Column field="lastYearSale" header="Last modified"></Column>
                    <Column header="Action">
                        <template #body>
                            <button class="p-1 mx-4 bg-green-200 border-green-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-8 h-6 px-auto text-center">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 bg-red-200 border-red-500 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-8 h-6 font-bold">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </template>
                    </Column>
                </DataTable>

            </div>
        </div>

        <new_salary_structure v-if="usePayroll.dailogNewSalaryStructure" />

    </div>
</template>


<script setup>
import { ref, onMounted } from 'vue';
import new_salary_structure from './new_salary_structure.vue';
import { usePayrollMainStore } from '../../../stores/payrollMainStore'

const usePayroll = usePayrollMainStore()
const selectedProduct = ref()

</script>

<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}

.bounce-enter-active {
    animation: bounce-in 0.5s;
}

.bounce-leave-active {
    animation: bounce-in 0.5s reverse;
}

@keyframes bounce-in {
    0% {
        transform: scale(0);
    }

    50% {
        transform: scale(1.25);
    }

    100% {
        transform: scale(1);
    }
}
</style>
