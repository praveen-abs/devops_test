<template>
    <button class="w-1 p-2 font-bold text-white bg-orange-400 rounded-sm" style="border-radius: 4px 0 0 4px;" :class="[activetab === 2 ? 'text-red-600': '']" @click="activetab = 1">on</button>
    <button class="w-1 p-2 font-bold rounded-sm " style="border-radius: 0 4px 4px 0;" :class="[activetab === 2 ? 'bg-green-700 text-white' : '']" @click="activetab = 2">off</button>
</template>

<script setup>
import { ref } from "vue";


const activetab = ref(1)
</script>

<style>

.toggleButton{

}


</style>