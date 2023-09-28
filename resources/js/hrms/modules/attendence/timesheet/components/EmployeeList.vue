<template>
    <div class="card overflow-y-scroll h-[100%]">
        <div class="card-body">
            <input type="text" name="" id="" v-model="query" class="border border-gray-300 p-1 w-full rounded-lg first-letter my-2"
                placeholder="Search Employees..">
            <button class="list_employee_attendance  p-3 px-1 flex hover:bg-gray-300 rounded-lg w-full focus:bg-gray-300"
                v-for="(employee, index) in globalSearch(query, source)"
                @click="isTeam ? useTimesheet.getSelectedEmployeeTeamDetails(employee.id, isTeam) : useTimesheet.getSelectedEmployeeOrgDetails(employee.id, isTeam,employee.user_code)">
                <div class="col-auto me-2">

                    <p v-if="JSON.parse(employee.employee_avatar).type == 'shortname'"
                        class="p-2 w-11 fs-6 font-semibold rounded-full  text-white"
                        :class="service.getBackgroundColor(index)">
                        {{ JSON.parse(employee.employee_avatar).data }} </p>
                    <img v-else class="rounded-circle userActive-status profile-img"
                        style="height: 30px !important; width: 30px !important;"
                        :src="`data:image/png;base64,${JSON.parse(employee.employee_avatar).data}`" srcset="" alt="" />
                    <!-- <div class="rounded-full  text-center mx-0 p-2" >
                        <span class="text-white fw-bold">{{ JSON.parse(employee.employee_avatar).data }}</span>
                    </div> -->
                </div>
                <div class="user_content text-start ">
                    <p class="font-semibold text-sm text-capitalize">{{ employee.name }}</p>
                    <p class=" text-muted f-11 text-capitalize">{{ employee.designation }}</p>
                </div>
            </button>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'
import { Service } from '../../../Service/Service';
const service = Service()

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

