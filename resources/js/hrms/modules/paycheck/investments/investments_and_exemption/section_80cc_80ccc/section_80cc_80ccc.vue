<template>
    <div>
        <div class="table-responsive">
            <strong>table</strong>
        </div>
        <div class="my-3 text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button>
            <button
                class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4" @click="investmentStore.investment_exemption_steps--">Previous</button>
            <button
                class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md" @click="investmentStore.investment_exemption_steps++">Next</button>
        </div>
    </div>
</template>

<script setup>

import { investmentMainStore } from "../../../stores/investmentMainStore";

const investmentStore = investmentMainStore()

</script>