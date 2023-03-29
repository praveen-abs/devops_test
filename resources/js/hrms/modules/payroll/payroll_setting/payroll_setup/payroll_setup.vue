<template>
  <!--
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
        <li class="mr-2">
            <a href="#" aria-current="page" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Profile</a>
        </li>
        <li class="mr-2">
            <a href="#" :class="{}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Dashboard</a>
        </li>
        <li class="mr-2">
            <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Settings</a>
        </li>
        <li class="mr-2">
            <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Contacts</a>
        </li>
        <li>
            <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
        </li>
    </ul> -->

  <div class="w-full m-auto">
    <h1 class="text-white">Payroll Setting</h1>
    <div class="mt-4 tabs">
      <a class="w-2" @click="activetab = 1" :class="[activetab === 1 ? 'active' : '']"
        >General Payroll Setting</a
      >
      <a class="w-2" @click="activetab = 2" :class="[activetab === 2 ? 'active' : '']"
        >PF_ESI Setting</a
      >
      <a class="w-2" @click="activetab = 3" :class="[activetab === 3 ? 'active' : '']"
        >Salary Components</a
      >
      <a class="w-2" @click="activetab = 4" :class="[activetab === 4 ? 'active' : '']"
        >Salary Structure</a
      >
      <a class="w-2" @click="activetab = 5" :class="[activetab === 5 ? 'active' : '']"
        >Finance Setting
      </a>
      <a class="w-2" @click="activetab = 6" :class="[activetab === 6 ? 'active' : '']">
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
import { initFlowbite } from "flowbite";
import general_payroll_setting from "./general_payroll_setting/general_payroll_setting.vue";
import pf_esi from './pf_esi_setting/pf_esi_setting.vue'
import salary_components from "./salary_components/salary_components.vue";
import salart_structure from "./salary_structure/salary_structure.vue";
import statutory_filling from "./statutory_filling/statutory_filling.vue";
import finance_setting from "./finance_setting/finance_setting.vue";

const activetab = ref(1);

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite();
});
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
  padding: 12px 24px;
  transition: background-color 0.2s;
  border: 1px solid #003056;
  border-right: none;
  background-color: #003056;
  font-weight: bold;
}

/* Change background color of tabs on hover */
.tabs a:hover {
  background-color: #aaa;
  color: #fff;
}

/* Styling for active tab */
.tabs a.active {
  background-color: #fff;
  color: #0f0101;
  border-bottom: 2px solid #fff;
  cursor: default;
}

/* Style the tab content */
</style>
