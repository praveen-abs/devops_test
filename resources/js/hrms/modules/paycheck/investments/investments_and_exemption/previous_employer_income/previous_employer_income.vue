<template>
    <div>
        table
        <!-- <tr>
            <th scope="col">Sections</th>
            <th scope="col">Particulars</th>
            <th scope="col">References</th>
            <th scope="col">Max Limit</th>
            <th scope="col">Declaration Amount</th>
            {{ -- < th scope = "col" > Status < /th> --}}
            <th scope="col">Action</th>
        </tr> -->


        <div class="my-3 text-end">
            <button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md">Save</button>
            <button class="px-4 py-2 mx-4 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="investmentStore.investment_exemption_steps--">Previous</button>
            <button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md"
                @click="investmentStore.investment_exemption_steps++">Next</button>
        </div>
    </div>
</template>


<script setup>
import { ref } from "vue";
import { investmentMainStore } from "../../../stores/investmentMainStore";

const investmentStore = investmentMainStore()


</script>