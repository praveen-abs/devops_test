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


        </div>
    </div>
    {{ useStore.payrollSource }}
</template>

<script setup>

import { onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { payrunMainStore } from "../stores/payrunMainStore";

const useStore = payrunMainStore()

onMounted(()=>{
    useStore.getPayrunOutcomeDetails()
})

</script>