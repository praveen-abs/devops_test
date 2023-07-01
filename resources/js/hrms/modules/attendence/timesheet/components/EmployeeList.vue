<template>
    <div class="card h-screen overflow-x-auto">
        <div class="card-body">
            <div class="list_employee_attendance my-3 flex" v-for="employee in source" >
                <div class="col-auto me-2 w-3">
                    <div
                        class="color_disco-600 rounded-full w-7 text-center mx-0 p-2">
                        <span class="text-white fw-bold">MU</span>
                    </div>
                </div>
                <div class="user_content text-start ">
                    <p class="fw-bold text-primary text-capitalize">{{employee.name}}</p>
                    <p class=" text-muted f-11 text-capitalize">{{employee.designation}}</p>
                </div>
            </div>
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

