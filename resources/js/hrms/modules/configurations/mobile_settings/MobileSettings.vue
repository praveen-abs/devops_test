<template>
    <div class="w-full">
        <h1 class="text-[18px] text-[#000] my-2">Mobile App Settings</h1>
        <div class="">
            <div class="grid grid-cols-3 p-2 rounded-lg border my-2.5 h-[44px]" v-for="(item, index) in useStore.MobileSettingsDetails" :key="index">
                <div class="my-auto">
                    <h1 class="text-[#000] text-[14px]">{{ item.sub_module_name }}</h1>
                </div>
                <div class="mx-auto">
                    <button class=" text-[12px] w-[100px] rounded-l-[8px] h-[26px]"
                        :class="[item.status == 1 ? ' bg-[#000] text-white  ' : ' bg-white !text-[#000] border-[2px] border-black']"
                        @click="val.status = 1">Enable</button>
                    <button class=" text-[12px] w-[100px] rounded-r-[8px] h-[26px]"
                        :class="[val.EnableDisableBtn == 2 ? 'bg-[#000] text-white ' : 'bg-white text-black border-[2px] border-black']"
                        @click="val.EnableDisableBtn = 2">Disable</button>
                </div>
                <div class="my-auto">
                    <!-- {{ val.Type }} -->
                    <p @click="selectedType = val.Type,useStore.employeeAssignDialog = true" class="text-right cursor-pointer"><span class="text-[#000]"> <i class="pi pi-users"></i>-</span> <span>Assign
                            Employee</span></p>
                </div>
            </div>
        </div>
    </div>
    <AssignEmployee :type="selectedType"/>
</template>
<script setup>
import { ref, reactive, onMounted } from "vue";
import AssignEmployee from "./components/AssignEmployee.vue";
import { useMobileSettingsStore } from "./MobileSettingsService";


const useStore = useMobileSettingsStore();

onMounted(()=>{
    useStore.getMobileSettings();
})

const active = ref(1);

const selectedType = ref()
const dialogValue = ref(false)



const val = ref([
    { name: "Mobile App", Type: 1, EnableDisableBtn: 1, },
    { name: "Check-In / Check-out", Type: 2, EnableDisableBtn: 2, },
    { name: "Location Capture", Type: 3, EnableDisableBtn: 1, },
    { name: "Check-In / Check-out Selfie", Type: 4, EnableDisableBtn: 1, },
    { name: "Reimbursement while Check-out", Type: 5, EnableDisableBtn: 1, },
    { name: "Absent/Attendance Regularization", Type: 6, EnableDisableBtn: 1, },
    { name: "Leave Apply", Type: 7, EnableDisableBtn: 1, },
    { name: "Salary Advance and Loan", Type: 8, EnableDisableBtn: 1, },
    { name: "Investments", Type: 9, EnableDisableBtn: 1, },
    { name: "PMS", Type: 10, EnableDisableBtn: 1, },
    { name: "Exit Apply", Type: 11, EnableDisableBtn: 1, },

]);

</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*
{
    font-family: 'Poppins', sans-serif;
}</style>
