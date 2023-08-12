<template>
    <div class="mt-[30px]">
        <h1 class="text-[18px] text-[#000]">Mobile App Settings</h1>
        <div class="" >
          <div class="flex justify-between p-2 rounded-md shadow-sm border-1" >
            <h1 class="text-[#000]">Mobile App</h1>
            <div>
              <button class=" text-[14px] mr-2" :class="[]" @click="active = 1" >Enable</button>
              <button class="text-[14px] " :class="[]"  @click="active = 2" >Disable</button>
            </div>
            <div>
              <p><span class="text-[#000]"> <i class="pi pi-users"></i>-</span> <span>Assign Employee</span></p>
            </div>
          </div>
        </div>
    </div>
</template>
<script setup>
import {ref , reactive } from "vue";

const active = ref(1);

</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

  *{
    font-family: 'Poppins', sans-serif;
  }
  
</style>