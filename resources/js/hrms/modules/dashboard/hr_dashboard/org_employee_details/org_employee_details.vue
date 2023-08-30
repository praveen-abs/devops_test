<template>
    <div class="w-full">
        <p class=" font-[14px] font-['Poppins']  text-gray-500 ">
            Current month - <span class="mb-2 text-xl font-semibold">{{ dayjs(new
                Date()).format('MMMM') }}</span>
        </p>

        <div class="grid grid-cols-4 gap-3 my-2">
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        100
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Total Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        100
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Total Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        100
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Total Employees</p>
            </div>
            <div class=" bg-[#F6F6F6] rounded-lg p-2">
                <div class="px-auto flex justify-center">
                    <span class=" text-3xl font-semibold text-center">
                        100
                    </span>
                </div>
                <p class=" text-lg font-semibold text-center text-gray-500">Total Employees</p>
            </div>
        </div>

    </div>
</template>


<script setup>
import dayjs from 'dayjs';

</script>
