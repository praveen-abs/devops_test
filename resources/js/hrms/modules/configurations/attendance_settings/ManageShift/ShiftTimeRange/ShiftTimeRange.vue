<template>
    <div class="w-full p-4 pr-8 mx-5 ">
        <div class="flex gap-4 pt-4 ">
            <div>
                <input style="height: 23px;width: 23px;" class="mt-1 form-check-input" type="radio" name="leave">

            </div>
            <div>
                <p class="font-semibold py-auto">Apply Flexible Gross Hours</p>
            </div>
            <div class="flex">
                <InputText type="text" v-model="txt_shift_start_time" class="w-8 h-10" />
                <p class="mx-4 text-lg font-semibold text-gray-600 py-auto">Min</p>

            </div>
           

        </div>
        <div class="p-3 my-5 rounded-lg bg-blue-50 ">
            <div class="flex gap-4 col-12">
                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave">
                <p class="font-semibold">Apply Standard General Shift Timing</p>
            </div>
            <div class="flex mx-6 my-4 row">
                <div class="flex gap-4 col-6 ">
                    <div>
                        <p class="text-lg font-semibold py-auto">Shift Start Time</p>
                    </div>
                    <div>
                        <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />
                    </div>
                </div>
                <div class="flex gap-4 col-6">
                    <div>
                        <p class="text-lg font-semibold py-auto">Shift End Time</p>

                    </div>
                    <div>
                        <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />

                    </div>

                </div>
            </div>
            <div class="flex mx-6 my-4 row ">
                <div class="flex gap-1 col-6">
                    <div class="">
                        <p class="text-lg font-semibold py-auto ">Week Off</p>
                    </div>
                    <div class="ml-7 col-9">
                        <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />
                    </div>
                </div>
                <div class="flex gap-1 col-6">
                    <div>
                        <p class="text-lg font-semibold py-auto">Grace  Time</p>

                    </div>
                    <div class="ml-6 col-9">
                        <InputText type="text" v-model="txt_shift_start_time" class="h-10 " />

                    </div>

                </div>
                <!-- <div class="flex gap-1 col-6">
                    <div class="" >
                        <p class="text-lg font-semibold py-auto">Grace Time</p>

                    </div>
                    <div class="flex gap-1 ml-6 col-9" >
                        <InputText type="text" v-model="txt_shift_start_time" /><p class="text-lg font-semibold text-gray-600 py-auto ">Mins</p>
                    </div>

                </div> -->
            </div>

            <div class="flex gap-4 p-2">
                <input type="checkbox" name="" id="">
                <p class="text-lg font-semibold py-auto">Apply To All Days Except Week Off</p>
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
