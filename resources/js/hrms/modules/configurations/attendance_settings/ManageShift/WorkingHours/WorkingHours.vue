<template>
    <div class="w-full p-6 pr-8 my-4 shadow-sm rounded-xl bg-blue-50 ">
        <div class="flex gap-4 pt-1 row ">
            <div class="col-4">
                <p class="font-semibold py-auto">Half Day Minimum Working Hours Required</p>
            </div>
            <div  class="flex gap-4 col-4 ">
                <InputText class="w-8 h-11" type="text" v-model="txt_shift_start_time" />
                <p class="mt-1 text-lg font-semibold text-gray-600 py-auto ">Hrs</p>


            </div>
           

        </div>
        <div class="flex gap-4 pt-4 row">
            <div class="col-4">
                <p class="font-semibold py-auto">Full Day Minimum Working Hours Required</p>
            </div>
            <div class="flex gap-4 col-4">
                <InputText class="w-8 h-11" type="text" v-model="txt_shift_start_time" /><p class="mt-1 text-lg font-semibold text-gray-600 py-auto">Hrs</p>

            </div>
          

        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";

const position = ref("center");
let canShowAssignShift = ref(false);

const openPosition = (pos) => {
    position.value = pos;
    canShowAssignShift.value = true;
};


</script>
