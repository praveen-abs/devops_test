<template>
    <div class="w-full card">
        <div class="card-body">
            <section id="topBar" class="flex justify-between">
                <section class="flex ">
                    <strong class="">Run Payroll</strong>
                    <div class="mx-4">Finalized</div>
                    <div class="">
                        <p class=""> last Updated</p>
                    </div>
                </section>
                <section class="flex">
                    <div>.</div>
                    <button @click="canShowRunPayroll = !canShowRunPayroll">
                        <i class="pi pi-chevron-down" style="font-size: 1rem"></i>
                    </button>
                </section>
            </section>
            <div id="Body" class="my-4">
                <div v-if="canShowRunPayroll"
                 class="grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2"
                    style="display: grid;">
                    <router-link  class="p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex hover:bg-slate-100  " v-for="(item, index) in runPayroll" :key="index"
                    :to="`/payrun/${item.shorName}`">
                    <img src="../../assests/calendar.svg" alt="" class="rounded-full h-8">
                        <p class="fs-6 font-semibold text-center ">{{item.name}}</p>
                    </router-link>
                </div>
            </div>
            <div id="footer" class="text-end float-right">
                <div class="text-end flex">
                     <button   class="btn btn-outline-primary">Preview Run Payroll</button>
                     <button class="btn btn-outline-primary mx-4">Review All Employees</button>
                     <button class="btn btn-primary">Finalize Payroll</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <img src="../../assests/calendar.svg" alt="" srcset=""> -->
</template>

<script setup>
import { onMounted, ref } from "vue";
import { payrunMainStore } from "../stores/payrunMainStore";
const canShowRunPayroll= ref(true)

const usePayrun = payrunMainStore()

const findIcons = (values) =>{
    if(values == 'leave'){
        return '../../assests/calendar.svg'
    }
}




const runPayroll = ref([
    {id:1,shorName:'leave',icons :'calendar.svg' ,name:"Leave, Attendance & Daily Wages"},
    {shorName:'attendance',icons :'person.svg' ,name:"New Joinee & Exits"},
    {shorName:'Salary-Revisions',icons :'breifcase.svg' ,name:"Bonus, Salary Revisions & Overtime"},
    {shorName:'Reimbursement',icons :'pi pi-calendar-times' ,name:"Reimbursement, Adhoc Payment, Deduction"},
    {shorName:'Salaries-Hold',icons :'pi pi-calendar-times' ,name:"Salaries on Hold & Arrears"},
    {shorName:'Override',icons :'pi pi-calendar-times' ,name:"Override (PT, ESI, TDS, LWF)"},
])

</script>