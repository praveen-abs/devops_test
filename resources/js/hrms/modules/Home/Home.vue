<template>
    <div class="flex flex-row h-full relative">
        <Sidebar />
        <div class=" text-gray-700 bg-gray-200 h-screen w-screen">
            <Topbar />
            <!-- Main content -->
            <Dashboard />
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

