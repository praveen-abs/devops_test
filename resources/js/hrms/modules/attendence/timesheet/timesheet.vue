<template>
    <div ref="calendarContainer" class="min-h-full min-w-full text-gray-800 card">
        <div class="w-full border grid grid-cols-7 card-body">
            <!-- Top navigation bar  -->
            <Top />

            <!-- Finding Days -->
            <div v-for="day in daysOfTheWeek"
                class="text-center text-sm md:text-base lg:text-lg font-semibold text-orange-500 my-4">
                {{ day.substring(0, 3) }}
            </div>

            <div v-if="firstDayOfCurrentMonth > 0" v-for="day in firstDayOfCurrentMonth" :key="day"
                class="h-16 md:h-36 w-full border opacity-50 "></div>

            <!-- Attendance Timesheet Data from current month  -->
            <div v-for="day in daysInCurrentMonth" :key="day" class="h-16 md:h-36 w-full border align-top rounded-lg">
                <div class="w-full h-full text-xs md:text-sm lg:text-base text-left px-2 transition-colors font-semibold"
                    :class="{
                        'bg-slate-50 text-gray-600 font-medium': isToday(day),
                        'hover:bg-gray-100 hover:text-gray-700': !isToday(day),
                    }">
                    {{ day }}

                    <div v-if="currentMonthAttendance(day, attendance).length"
                        v-for="attendance in currentMonthAttendance(day, attendance)" class="hidden md:block">
                        <div
                            class="w-full  py-1 flex space-x-1 items-center whitespace-nowrap overflow-hidden  hover: cursor-pointer rounded-sm">
                            <div class="w-full">
                                <div class="text-xs tracking-tight text-clip overflow-hidden p-3">
                                    <!-- Attendance Check in  -->
                                    <div class="grid gap-4 md:grid-cols-6 sm:grid-cols-6 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6"
                                        style="display: grid;">
                                        <div class="flex ">
                                            <i class="fa fa-arrow-down text-green-400  font-medium text-sm "
                                                style='transform: rotate(-45deg);'></i>
                                            <p class="font-semibold text-sm mx-1">{{ attendance.checkin_time }}</p>
                                            <i class="text-green-400 font-medium px-6 text-sm"
                                                :class="useTimesheet.findAttendanceMode(attendance.attendance_mode_checkin)"></i>
                                        </div>
                                        <!-- <div class="">
                                            <i class="text-green-400 font-semibold text-sm"
                                                :class="useTimesheet.findAttendanceMode(attendance.attendance_mode_checkin)"></i>
                                        </div> -->
                                        <!-- Checking Late Coming -->
                                        <!-- <div v-if="attendance.isLC" class="text-purple-500 font-bold text-sm">
                                            LC
                                        </div> -->
                                    </div>
                                </div>
                                <div class="text-xs tracking-tight text-clip overflow-hidden p-3">
                                    <!-- Attendance Check in  -->

                                    <div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6"
                                        style="display: grid;">
                                        <div class="flex">
                                            <i class="fa fa-arrow-down font-medium text-sm text-red-400 "
                                                style='transform: rotate(230deg);'></i>
                                            <p class="font-semibold text-sm mx-1">{{ attendance.checkout_time }}</p>
                                            <i class="text-red-400 font-medium px-6 text-sm"
                                                :class="useTimesheet.findAttendanceMode(attendance.attendance_mode_checkout)"></i>
                                        </div>
                                        <!--
                                        <i class="text-red-400 font-semibold text-sm"
                                            :class="useTimesheet.findAttendanceMode(attendance.attendance_mode_checkout)"></i> -->

                                        <!--checking Early going  -->
                                        <!-- <div v-if="attendance.isEG" class="text-purple-500 font-bold text-sm">
                                            EG
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty Cells in month  -->
            <div v-if="lastEmptyCells > 0" v-for="day in lastEmptyCells" :key="day"
                class="h-16 md:h-36 w-full border opacity-50"></div>

            <div class="md:hidden col-span-7 flex justify-between items-center p-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 hover:text-gray-500 cursor-pointer hover:h-6 hover:w-6 transition-all"
                        @click="calendarStore.decrementMonth(1)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 hover:text-gray-500 cursor-pointer hover:h-6 hover:w-6 transition-all"
                        @click="calendarStore.incrementMonth(1)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUpdated } from "vue";
import Top from "./components/Top.vue"
import { useCalendarStore } from "./stores/calendar";
import { useAttendanceTimesheetMainStore } from './stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()
const props = defineProps({
    attendance: {
        type: Object,
        required: true,
    },
});

const calendarStore = useCalendarStore();

calendarStore.$subscribe((mutation, state) => {
    getDaysInMonth();
    getFirstDayOfMonth();
});

// component variables
const daysOfTheWeek = {
    1: "Sunday",
    2: "Monday",
    3: "Tuesday",
    4: "Wednesday",
    5: "Thursday",
    6: "Friday",
    7: "Saturday",
};

const daysInCurrentMonth = ref(0);
const firstDayOfCurrentMonth = ref(0);
const lastEmptyCells = ref(0);

/**
 * Gets the number of days present in a month
 * The month is gotten from the calendar store
 */
const getDaysInMonth = () => {
    daysInCurrentMonth.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth + 1, // 👈️ months are 0-based
        0
    ).getDate();
};



/**
 * Gets in number, the first day of a month
 * The month is gottenn from the calendar store
 */


const getFirstDayOfMonth = () => {
    firstDayOfCurrentMonth.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        1
    ).getDay();
};



/**
 * Gets the last empty cells (if any) on the calendar grid
 */


const lastCalendarCells = () => {
    let totalGrid = firstDayOfCurrentMonth.value <= 5 ? 35 : 42;

    lastEmptyCells.value =
        totalGrid - daysInCurrentMonth.value - firstDayOfCurrentMonth.value;
};



/**
 * Validates a day to check if it's today or not
 *
 * @param {number} day The day to validate
 * @return boolean True or false if it's today or not
 */
const isToday = (day) => {
    let today = new Date();
    if (
        calendarStore.getYear == today.getFullYear() &&
        calendarStore.getMonth == today.getMonth() &&
        day == today.getDate()
    )
        return true;

    return false;
};



/**
 * Validates a day to check if event start date is current calendar date or not
 *
 * @param {number} day The calendar month date to check against
 * @param {string} startdate The event start date
 * @return boolean True or false if event is today or not
 */
const isEventToday = (day, startdate) => {
    if (
        calendarStore.getYear == startdate.substring(0, 4) &&
        calendarStore.getMonth + 1 == startdate.substring(5, 7) &&
        day == startdate.substring(8, 10)
    )
        return true;

    return false;
};

/**
 * Gets all the calendar attendance on a given day
 *
 * @param {number} day calendar month day whose event(s) we're getting
 * @param {array} attendance Array of attendance objects to filter through
 *
 * @return array Array of the filtered day's event(s)
 */
const currentMonthAttendance = (day, attendance) => {
    if (!attendance.length) return [];

    let todaysEvent = [];
    attendance.forEach((event) => {
        if (isEventToday(day, event.date)) {
            todaysEvent.push(event);
        }
    });

    return todaysEvent;
};

/**
 * Open the event details modal
 *
 * @param {number} day current calendar month day
 * @param {array} attendance Array of attendance objects to show on the modal
 *
 * @return null
 */

onMounted(() => {
    getDaysInMonth();
    getFirstDayOfMonth();
    lastCalendarCells();
});

onUpdated(() => {
    getFirstDayOfMonth();
    lastCalendarCells();
});
</script>

<style scoped>
.modal-enter-active,
.modal-leave-active {
    transition: translate 0.5s ease;
}

.modal-enter-from,
.modal-leave-to {
    /** opacity: 0; **/
    translate: 0px 100%;
}
</style>
