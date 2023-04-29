<template>
    <div class="w-full">
        <div class="mx-auto card top-line">
            <div class=" card-body">
                <div>
                    <h3 class="my-2 font-semibold ">Leave Type</h3>
                </div>
                <div class="row">
                    <div id="box" v-for="availedleaves in availedLeaves" :key="availedleaves.id"
                        class="p-1 mx-3 my-4 border-2 rounded-lg shadow-md col-lg-3 left-line col-md-3 col-xl-2 hover:bg-slate-100 focus:bg-green-100 active:bg-green-200">
                        <p class="text-lg font-semibold text-center "></p>
                        <p class="my-3 text-xl font-bold text-center"><span>days</span></p>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur, .</p>
                        {{ availedleaves }}
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- {{ useStore.leave_types }} -->
</template>

<script setup>

import axios from 'axios'
import { onMounted, ref } from 'vue'

const sickActive = ref(false)
const earnActive = ref(false)

const AccuredLeaves = ref()

onMounted(() =>{
    getAccuredLeaves()
    getAvailedLeaves()
    getBalanceLeaves()

})


const getAccuredLeaves = async() =>{
    await axios.get('/get-employee-leave-balance').then((res)=>{
        AccuredLeaves.value = res.data
        console.log(res.data);
    })
}
const getAvailedLeaves = async() =>{
    await axios.get('/get-employee-leave-balance').then((res)=>{
        AccuredLeaves.value = res.data
        console.log(res.data);
    })
}

const getBalanceLeaves = async() =>{
    await axios.get('/process-employee-leave-balance').then((res)=>{
        AccuredLeaves.value = res.data
    })
}


const check = (a) => {
    console.log(a);
    let leave

    switch (leave) {
        case "Sick Leave / Casual Leave":
            console.log("Sick");
            sickActive.value = true
            break;
        case "Earned Leave":
            console.log("Earned");
            earnActive.value = true
            break;
        case "Maternity Leave":
            console.log("Maternity");
            active.value = true
            break;
        case "Paternity Leave":
            active.value = true
            console.log("Paternity");
            break;
        case "On Duty":
            active.value = true
            console.log("earn");
            break;
        case "Compensatory Off":
            active.value = true
            console.log("Compensatory");
            active.value = true
            break;
        case "Permission":
            active.value = true
            console.log("Permission");

            break;

    }
}
</script>


<style>
.p-datepicker .p-datepicker-header {
    padding: 0.5rem;
    color: #061328;
    background: #002f56;
    font-weight: 600;
    margin: 0;
    border-bottom: 1px solid #dee2e6;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}

.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-year,
.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-month {
    color: #fff;
    transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;
    font-weight: 600;
    padding: 0.5rem;
}

.p-datepicker:not(.p-datepicker-inline) .p-datepicker-header {
    background: #002f56;
    color: black;
}

.p-calendar-w-btn .p-datepicker-trigger {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    background: #002f56;
}

.box:active {
    background: #000;
}
</style>