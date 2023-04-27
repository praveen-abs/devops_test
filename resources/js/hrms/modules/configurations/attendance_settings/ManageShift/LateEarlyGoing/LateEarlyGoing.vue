<template>
    <div class="w-full p-6 pr-8 my-4 shadow-sm rounded-xl bg-blue-50 ">
        <div class="flex gap-4 pt-1 row ">
            <div class="col-5">
                <p class="font-semibold py-auto">Does Your company have a late coming LOP Policy</p>
            </div>
            <div class="flex gap-4 col-1 ">
                <div class="mt-1">
                    <input style="height: 18px;width: 18px;" class="form-check-input" type="radio" name="leave">
                </div>
                <div>
                    <p class="font-semibold">Yes</p>
                </div>

            </div>
            <div class="flex gap-4 col-1 ">
                <div class="mt-1">
                    <input style="height: 18px;width: 18px;" class="form-check-input" type="radio" name="leave">
                </div>
                <div>
                    <p class="font-semibold">No</p>
                </div>

            </div>


        </div>
        <div class="flex gap-4 pt-4 row">
            <div class="col-5">
                <p class="font-semibold py-auto">Does Your company have a early going LOP Policy</p>
            </div>
            <div class="flex gap-4 col-1 ">
                <div class="mt-1">
                    <input style="height: 18px;width: 18px;" class="form-check-input" type="radio" name="leave">
                </div>
                <div>
                    <p class="font-semibold">Yes</p>
                </div>

            </div>
            <div class="flex gap-4 col-1 ">
                <div class="mt-1">
                    <input style="height: 18px;width: 18px;" class="form-check-input" type="radio" name="leave">
                </div>
                <div>
                    <p class="font-semibold">No</p>
                </div>

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
