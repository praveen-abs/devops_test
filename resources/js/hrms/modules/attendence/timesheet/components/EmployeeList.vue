<template>
    <div class="card h-screen overflow-x-auto">
        <div class="card-body">
            <button class="list_employee_attendance  p-3 px-1 flex hover:bg-gray-300 rounded-lg w-full focus:bg-gray-300" v-for="employee in source" >
                <div class="col-auto me-2">
                    <div
                        class="color_disco-600 rounded-full  text-center mx-0 p-2">
                        <span class="text-white fw-bold">MU</span>
                    </div>
                </div>
                <div class="user_content text-start ">
                    <p class="fw-bold text-primary text-capitalize">{{employee.name}}</p>
                    <p class=" text-muted f-11 text-capitalize">{{employee.designation}}</p>
                </div>
            </button>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()


const orgList = ref()

const props = defineProps({
    source: {
        type: Object,
        required: true,
    },
});


// const getEmployeeSource = (source) => {
//   teamList.value = source
//   return teamList;
// }

// onMounted(async ()=>{
//     await useTimesheet.getOrgList().then(res=>{
//         orgList.value = Object.values(res.data)
//     })
// })

</script>

