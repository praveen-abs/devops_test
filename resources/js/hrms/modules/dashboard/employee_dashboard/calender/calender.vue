<template>
    <div class="bg-orange-100 rounded-lg overflow-hidden p-3" style="height: 200px;">
       <div class="flex justify-between">
        <span class="text-primary font-semibold fs-6">Calendar</span>
        <!-- <div class="text-gray-900 font-semibold text-md mb-2">Calendar</div> -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900 cursor-pointer ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
          </svg>
       </div>

        <div class="py-8">
            <p class="text-orange-400 font-semibold text-3xl mb-2  font-serif">{{ dayjs(new Date()).format('MMMM D, YYYY') }}
            </p>
            <p class="text-gray-900 font-semibold text-md mb-2">{{ dayjs(new Date()).format('dddd') }}</p>
        </div>
    </div>
</template>

<script setup>
import dayjs from 'dayjs';
</script>
