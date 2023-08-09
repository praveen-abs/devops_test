<template>
    <div>
        <div class="">
            <div class=" flex justify-between items-center bg-slate-400">
                <div>
                    <p class="">Total : 188</p>
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Department" class="w-full h-10 md:w-14rem" />
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Increment on" class="w-full h-10 md:w-14rem" />
                </div>
                <div>
                    <button class=" bg-blue-500 p-2">Process</button>
                    <button class="bg-blue-500 p-2">Cancel</button>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";


const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);

</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital@0;1&display=swap');
  *{
    font-family: 'Lobster', cursive;
    font-family: 'Poppins', sans-serif;
  }
 .p-placeholder{
    margin-top:-5px;
 }
.pi-chevron-down{
    rotate: 272deg;
}
</style>