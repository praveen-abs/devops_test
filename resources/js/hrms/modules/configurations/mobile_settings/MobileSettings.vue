<template>
    <div class="mt-[30px]">
        <h1 class="text-[18px] text-[#000]">Mobile App Settings</h1>
        <div class="mt-10 "  >
          <div class="mt-[10px] grid items-center grid-cols-3 p-2 rounded-md shadow-sm border-1 h-[44px]" v-for="(val, index) in val" :key="index" >
            <h1 class="text-[#000] text-[16px]">{{ val.name }}</h1>
            <div class="">
              <button class=" text-[14px] w-[100px] rounded-l-[8px] h-[28px]" :class="[val.EnableDisableBtn ==1 ? ' bg-[#000] text-white  ' : ' bg-white !text-[#000] border-[2px] border-black'] " @click="val.EnableDisableBtn = 1" >Enable</button>
              <button class=" text-[14px] w-[100px] rounded-r-[8px] h-[28px]" :class="[val.EnableDisableBtn == 2 ? 'bg-[#000] text-white ' : 'bg-white text-black border-[2px] border-black']"  @click="val.EnableDisableBtn = 2" >Disable</button>
            </div>
            <div class="">
              <p class="text-right "><span class="text-[#000]"> <i class="pi pi-users"></i>-</span> <span>Assign Employee</span></p>
            </div>
          </div>
        </div>
    </div>
</template>
<script setup>
import {ref , reactive } from "vue";

const active = ref(1);

const val = ref([
  {name:"Mobile App" ,Type:1, EnableDisableBtn:1,},
  {name:"Check-In / Check-out" ,Type:2 ,  EnableDisableBtn:2,},
  {name:"Location Capture" ,Type:3, EnableDisableBtn:1,},
  {name:"Check-In / Check-out Selfie" ,Type:4, EnableDisableBtn:1,},
  {name:"Reimbursement while Check-out" ,Type:5,EnableDisableBtn:1,},
  {name:"Absent/Attendance Regularization" ,Type:6,EnableDisableBtn:1,},
  {name:"Leave Apply" ,Type:7,EnableDisableBtn:1,},
  {name:"Salary Advance and Loan" ,Type:8,EnableDisableBtn:1,},
  {name:"Investments" ,Type:9,EnableDisableBtn:1,},
  {name:"PMS" ,Type:10,EnableDisableBtn:1,},
  {name:"Exit Apply" ,Type:11,EnableDisableBtn:1,},
  
]);

</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

  *{
    font-family: 'Poppins', sans-serif;
  }
  
</style>