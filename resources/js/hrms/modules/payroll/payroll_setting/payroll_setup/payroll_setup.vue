<template>


  <div class="w-full m-auto">
    <h1 class="text-white">Payroll Setting</h1>
    <div class="mt-4 tabs">
      <a class="w-2 d-flex " @click="activetab = 1" :class="[activetab === 1 ? 'active' : '']"
        ><div class="md:text-sm" :style="{width:'25px' }">1</div> General Payroll Setting</a
      >
      <a class="w-2 d-flex" @click="activetab = 2" :class="[activetab === 2 ? 'active' : '']"
        ><div>2</div>PF_ESI Setting</a
      >
      <a class="w-2 d-flex" @click="activetab = 3" :class="[activetab === 3 ? 'active' : '']"
        ><div>3</div>Salary Components</a
      >
      <a class="w-2 d-flex" @click="activetab = 4" :class="[activetab === 4 ? 'active' : '']"
        ><div>4</div>Salary Structure</a
      >
      <a class="w-2 d-flex" @click="activetab = 5" :class="[activetab === 5 ? 'active' : '']"
        ><div>5</div>Finance Setting
      </a>
      <a class="w-2 d-flex" @click="activetab = 6" :class="[activetab === 6 ? 'active' : '']"><div>6</div>
        Statutory Filling</a
      >
    </div>

    <div class="bg-white rounded-md">
      <div v-if="activetab === 1" class="tabcontent">
        <general_payroll_setting />
      </div>
      <div v-if="activetab === 2" class="tabcontent">
        <pf_esi />
      </div>
      <div v-if="activetab === 3" class="tabcontent">
        <salary_components />
      </div>
      <div v-if="activetab === 4" class="tabcontent">
        <salart_structure />
      </div>
      <div v-if="activetab === 5" class="tabcontent">
        <finance_setting />
      </div>
      <div v-if="activetab === 6" class="tabcontent">
        <statutory_filling />
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import general_payroll_setting from "./general_payroll_setting/general_payroll_setting.vue";
import pf_esi from './pf_esi_setting/pf_esi_setting.vue'
import salary_components from "./salary_components/salary_components.vue";
import salart_structure from "./salary_structure/salary_structure.vue";
import statutory_filling from "./statutory_filling/statutory_filling.vue";
import finance_setting from "./finance_setting/finance_setting.vue";

const activetab = ref(1);

</script>

<style>
.page-content {
  padding: calc(45px + 1.5rem) calc(1.5rem / 2) 50px calc(1.5rem / 2);
  background: #003056;
}

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
  font-weight: bold;
}
.tabs a > div {
    color: #aaa;
    background: #fff;
    border-radius: 50%;
    width: 25px !important;
    height: 25px;
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

}
.tabs a:hover >div {
    background: #F36826;
    color: #fff;
    width: 25px;
    height: 25px;
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
    width: 25px;
    height: 25px;
}

/* Style the tab content */
</style>
