<template>


    <div class="w-full pr-8">
      <div class="w-full tabs ">
        <a class="px-6 col-lg-2 col-xl-2 col-md-2 d-flex" @click="activetab = 1" :class="[activetab === 1 ? 'active' : '']"
          ><div class="md:text-sm" :style="{width:'25px' }">1</div>Shift Details</a
        >
        <a class="px-6 col-lg-2 col-xl-2 col-md-2 d-flex" @click="activetab = 2" :class="[activetab === 2 ? 'active' : '']"
          ><div>2</div>Shift Time Range</a
        >
        <a class="px-6 col-lg-2 col-xl-2 col-md-2 d-flex" @click="activetab = 3" :class="[activetab === 3 ? 'active' : '']"
          ><div>3</div>Break Time Range</a
        >
        <a class="px-6 col-lg-2 col-xl-2 col-md-2 d-flex" @click="activetab = 4" :class="[activetab === 4 ? 'active' : '']"
          ><div>4</div>Working Hours</a
        >
        <a class="px-6 col-lg-3 col-xl-2 col-md-3 d-flex" @click="activetab = 5" :class="[activetab === 5 ? 'active' : '']"
          ><div>5</div>Late&Early Going
        </a>
    
      </div>
  
      <div class="bg-white rounded-md">
        <div v-if="activetab === 1" class="tabcontent">
          <Att_AssignWorkShifts />
        </div>
        <div v-if="activetab === 2" class="tabcontent">
          <ShiftTimeRange />
        </div>
        <div v-if="activetab === 3" class="tabcontent">
          <BreakTimeRange />
        </div>
        <div v-if="activetab === 4" class="tabcontent">
          <WorkingHours />
        </div>
        <div v-if="activetab === 5" class="tabcontent">
          <LateEarlyGoing />
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { onMounted, ref } from "vue";
  import Att_AssignWorkShifts from "../AssignShift/Att_AssignWorkShifts.vue";
  import ShiftTimeRange from "../ShiftTimeRange/ShiftTimeRange.vue";
  import BreakTimeRange from "../BreakTimeRange/BreakTimeRange.vue";
  import WorkingHours from "../WorkingHours/WorkingHours.vue";
  import LateEarlyGoing from "../LateEarlyGoing/LateEarlyGoing.vue";

  

  const activetab = ref(1);
  
  </script>
  
  <style>

  .tabs {
    overflow: hidden;
    margin-bottom: -2px;
  }
  
  .tabs ul {
    list-style-type: none;
  }
  
  .tabs a {
    float: left;
    cursor: pointer;
    color: #fff;
    padding: 12px 18px;
    transition: background-color 0.2s;
    border: 1px solid #003056;
    border-right: none;
    background-color: #003056;
    font-weight: 600;
  }
  .tabs a > div {
      color: #aaa;
      background: #fff;
      border-radius: 50%;
      width: 20px !important;
      height: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 8px;
      font-weight: 700;
      font-family: sans-serif;
  }
  
  /* Change background color of tabs on hover */
  .tabs a:hover  {
    background-color: #aaa;
    color: #fff;
    border-radius: 4px 4px 0 0;
  
  }
  .tabs a:hover >div {
      background: #F36826;
      color: #fff;
      width: 20px;
      height: 20px;
      padding: 0;
  }
  
  /* Styling for active tab */
  .tabs a.active {
    background-color: #fff;
    color: #0f0101;
    border-bottom: 2px solid #fff;
    cursor: default;
    border-top:3px solid #F36826 ;
    border-radius:4px 4px 0  0 ;
  }
  .tabs a.active >div{
      background: #F36826;
      color: #fff;
      width: 20px;
      height: 20px;
  }
  
  /* Style the tab content */
  </style>
  