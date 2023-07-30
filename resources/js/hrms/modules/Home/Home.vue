<template>
    <div class="flex flex-row h-full relative">
        <Sidebar />
        <div class=" text-gray-700 bg-gray-200 h-screen w-screen">
            <Topbar />
            <!-- Main content -->
            <Dashboard />


            <button :class="{
                'bg-blue-500': isDay,
                'bg-yellow-500': !isDay,
            }" @click="toggleDayNight" class="w-24 h-12 rounded-full focus:outline-none">
                <span :class="{
                    'translate-x-0': isDay,
                    'translate-x-12': !isDay,
                }" class="block w-6 h-6 transform translate-y-3 bg-white rounded-full shadow-md"></span>
                <span class="sr-only">Day</span>
                <span class="sr-only">Night</span>
            </button>






        </div>
    </div>
</template>


<script setup>

import Topbar from './Topbar.vue';
import Sidebar from './Sidebar.vue';
import Dashboard from '../dashboard/dashboard.vue'


import { ref } from 'vue';

const isOpen = ref(false);
const isOpens = ref(false);

const isDay = ref(true);

const toggleDayNight = () => {
    isDay.value = !isDay.value;
};



</script>

<style>
/* This is optional if you are using Tailwind via CDN or importing it in your project. */

.dot {
    /* Move the dot to the right when the switch is toggled on */
    transform: translateX(0);
}

/* Update the appearance of the switch when it's checked (on) */
#toggle:checked+.dot {
    transform: translateX(6rem);
}
</style>

