<template>
    <div class="card">
        <div class="card-body ">
            <div class="flex justify-between">
                <div>
                    <p>Payroll Outcome</p>
                </div>
                <div class="flex justify-end gap-4 text-blue-500 text-sm">
                    <p class="whitespace-nowrap">View Pay Register</p>
                    <p class="whitespace-nowrap">Manage PaySlip</p>
                    <p>v</p>
                </div>
            </div>

            <div class="border w- h-full p-2">
                <p class="font-semibold text-xl">Employee Payables</p>
                <div class="my-2">
                    <payoutCard :source="useStore.employeePayables" />
                </div>
            </div>
            <div class="border w- h-full p-2">
                <p class="font-semibold text-xl">Income Tax (TDS - 192 B)</p>
                <div class="my-2">
                    <payoutCard :source="useStore.employeeIncomeTax" />
                </div>
            </div>
            <div class="border w- h-full p-2">
                <p class="font-semibold text-xl">EPF</p>
                <div class="my-2">
                    <payoutCard :source="useStore.employeeEpf" />
                </div>
            </div>
            <div class="border w- h-full p-2">
                <p class="font-semibold text-xl">ESIC</p>
                <div class="my-2">
                    <payoutCard :source="useStore.employeeEsic" />
                </div>
            </div>
            <div class="border w- h-full p-2">
                <p class="font-semibold text-xl">Insurance</p>
                <div class="my-2">
                    <payoutCard :source="useStore.employeeInsurance" />
                </div>
            </div>

        </div>
    </div>
    <!-- {{ useStore.payrollSource }} -->
    {{ useStore.payrollOutcomeSource }}
</template>

<script setup>

import { onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { payrunMainStore } from "../stores/payrunMainStore";
import payoutCard from "../components/payoutCard.vue";

const useStore = payrunMainStore()

onMounted(() => {
    useStore.getPayrunOutcomeDetails()
})

</script>
