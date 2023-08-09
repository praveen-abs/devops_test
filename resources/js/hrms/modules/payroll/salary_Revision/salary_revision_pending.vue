<template>
    <div>
        <div class="">
            <div class=" flex justify-between items-center ">
                <div class="flex justify-start items-center flex-wrap">
                    <div class="mr-2">
                        <p class="text-[#001820]">Total : 188</p>
                    </div>
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Department" class="w-full mx-2 h-10 md:w-14rem" />
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Frequency" class="w-full h-10 md:w-14rem  mx-3" />
                    <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Increment on" class="w-full h-10 md:w-14rem  mx-3" />
                </div>
                <div>
                    <button class=" bg-blue-500 py-2 px-3 rounded-md mx-2 text-white hover:bg-blue-600">Process</button>
                    <button class="bg-blue-500 py-2  px-3 rounded-md mx-2 text-white hover:bg-blue-600" >Cancel</button>
                </div>
                
            </div>
            <div class=" flex justify-between mt-4 ">
                <div>
                    <button class=" border-1 border-gray-400 px-3 py-2 rounded-lg w-[140px] text-[#001820] hover:bg-slate-200">+ Add Employee</button>
                    <button class="border-1 mx-2 border-gray-400  px-3 py-2 rounded-lg max-[1000px]:w-[180px] text-[#001820] hover:bg-slate-200">Import Employee List</button>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>
</template>

<script setup>

import {ref ,onMounted} from "vue";



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
.p-inputtext{
    margin-top: -5px;
}
</style>

