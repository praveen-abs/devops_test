<template>
  <Toast />
  <ConfirmDialog></ConfirmDialog>
  <div class="w-full m-auto">
    <h1 class="text-white font-semibold fs-4 py-2 mx-2">Payroll Setting</h1>
    <div class="mt-3 tabs">
      <a class="w-2 d-flex font-semibold fs-6" @click="activetab = 1" :class="[activetab === 1 ? 'active' : '']"
        ><div class="md:text-sm">1</div> <p style="width: 200px;">General payroll Setting</p></a
      >
      <a class="w-2 d-flex font-semibold fs-6" @click="activetab = 2" :class="[activetab === 2 ? 'active' : '']"
        ><div>2</div>PF & ESI Setting</a
      >
      <a class="w-2 d-flex font-semibold fs-6" @click="activetab = 3" :class="[activetab === 3 ? 'active' : '']"
        ><div>3</div>Salary Components</a
      >
      <a class="w-2 d-flex font-semibold fs-6" @click="activetab = 4" :class="[activetab === 4 ? 'active' : '']"
        ><div>4</div>Salary Structure</a
      >
      <a class="w-2 d-flex font-semibold fs-6" @click="activetab = 5" :class="[activetab === 5 ? 'active' : '']"
        ><div>5</div>Finance Setting
      </a>
      <a class="w-2 d-flex font-semibold fs-6" @click="activetab = 6" :class="[activetab === 6 ? 'active' : '']"><div>6</div>
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
  <Dialog header="Header" v-model:visible="usePayroll.canShowLoading"
  :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
  :closeOnEscape="false">
  <template #header>
      <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
          animationDuration="2s" aria-label="Custom ProgressSpinner" />
  </template>
  <template #footer>
      <h5 style="text-align: center">Please wait...</h5>
  </template>
</Dialog>
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

import {usePayrollMainStore} from '../../stores/payrollMainStore'

const usePayroll = usePayrollMainStore()

onMounted(() => {
    usePayroll.getSalaryComponents()
    usePayroll.getsalaryStructure()
})

</script>

<style>
.page-content {
  padding: calc(20px + 1.5rem) calc(1.5rem / 2) 0px calc(1.5rem / 2);
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
  color: #aaa;
  padding: 12px 18px;
  transition: background-color 0.2s;
  border: 1px solid #003056;
  border-right: none;
  background-color: #003056;
  font-weight: bold;
}
.tabs a > div {
    color: #aaa;
    background: gainsboro;
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
