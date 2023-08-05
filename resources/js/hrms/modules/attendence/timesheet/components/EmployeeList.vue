<template>
    <div class="card h-screen overflow-x-auto">
        <div class="card-body">
            <input type="text" name="" id="" v-model="query" class="border-1 border-gray-300 p-1.5 w-full rounded-lg" placeholder="Search Employees..">
            <button class="list_employee_attendance  p-3 px-1 flex hover:bg-gray-300 rounded-lg w-full focus:bg-gray-300"
                v-for="employee in globalSearch(query,source)"
                @click="isTeam ? useTimesheet.getSelectedEmployeeTeamDetails(employee.id, isTeam) : useTimesheet.getSelectedEmployeeOrgDetails(employee.id, isTeam)">
                <div class="col-auto me-2">
                    <div class="color_disco-600 rounded-full  text-center mx-0 p-2">
                        <span class="text-white fw-bold">{{ JSON.parse(employee.employee_avatar).data }}</span>
                    </div>
                </div>
                <div class="user_content text-start ">
                    <p class="fw-bold text-blue-900 text-capitalize">{{ employee.name }}</p>
                    <p class=" text-muted f-11 text-capitalize">{{ employee.designation }}</p>
                </div>
            </button>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()

const query = ref('')
function globalSearch(keyword, list) {
  // Use the filter method to find items whose name contains the keyword (case-insensitive)
  const searchResults = list.filter((item) =>
    item.name.toLowerCase().includes(keyword.toLowerCase())
  );
  return searchResults;
}


const orgList = ref()

const props = defineProps({
    source: {
        type: Object,
        required: true,
    },
    isTeam: {
        type: Boolean,
        required: true,
    }
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

