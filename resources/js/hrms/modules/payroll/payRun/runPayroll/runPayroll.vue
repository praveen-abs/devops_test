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
                    <div class="p-3 my-2 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100 " v-for="(item, index) in runPayroll" :key="index"
                     @click="usePayrun.currentActiveScreen = item.id">
                        <p class="fs-6 font-semibold text-center ">{{item.name}}</p>
                    </div>
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
</template>

<script setup>
import { ref } from "vue";
import { payrunMainStore } from "../stores/payrunMainStore";
const canShowRunPayroll= ref(true)

const usePayrun = payrunMainStore()


const runPayroll = ref([
    {id:1,icons :'pi pi-calendar-times' ,name:"Leave, Attendance & Daily Wages"},
    {icons :'pi pi-calendar-times' ,name:"New Joinee & Exits"},
    {icons :'pi pi-calendar-times' ,name:"Bonus, Salary Revisions & Overtime"},
    {icons :'pi pi-calendar-times' ,name:"Reimbursement, Adhoc Payment, Deduction"},
    {icons :'pi pi-calendar-times' ,name:"Salaries on Hold & Arrears"},
    {icons :'pi pi-calendar-times' ,name:"Override (PT, ESI, TDS, LWF)"},
])

</script>