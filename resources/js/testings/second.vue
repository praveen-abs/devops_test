<template>
    <Sidebar v-model:visible="visibleRight" position="right" class="w-full md:w-20rem lg:w-30rem">
        <template #header>
            <p class="text-center">Attendance Reports</p>
        </template>
        <!-- {{ currentData }} -->
        <div class="rounded-lg bg-yellow-100 p-3" v-if="currentData.isAbsent">
           Absent
           <p>Apply leave</p>
           <p>Regularize</p>
        </div>
        <div class="rounded-lg bg-orange-100 p-3" v-if="!currentData.isAbsent" >
            <p class="font-sans font-semibold fs-6">Check-in</p>

            <div class="my-2">
                <div class="flex my-1 justify-center">
                    <p class="font-medium fs-6 text-gray-700">In Time</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">{{ currentData.checkin_time }}</p>
                </div>
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Check In Mode</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">{{ currentData.attendance_mode_checkin }}</p>
                </div>
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Check In Status</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">{{ find(currentData) }}</p>
                </div>
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Approval Status</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">10:00</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg bg-blue-100 p-3 my-3"  v-if="!currentData.isAbsent">
            <p class="font-sans font-semibold fs-6">Check-in</p>

            <div class="my-2">
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Out Time</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">{{ currentData.checkout_time }}</p>
                </div>
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Check out Mode</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">{{ currentData.attendance_mode_checkout }}</p>
                </div>
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Check Out Status</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">{{find(currentData)}}</p>
                </div>
                <div class="flex my-1">
                    <p class="font-medium fs-6 text-gray-700">Approval Status</p>
                    <p class="font-semibold fs-6">:</p>
                    <p class="font-semibold fs-6">10:00</p>
                </div>
            </div>
        </div>

        <Accordion :activeIndex="0">
            <AccordionTab header="Lc " v-if="currentData.lc_status">
                1
            </AccordionTab>
            <AccordionTab header="MIP" v-if="currentData.mip_status">
                2
            </AccordionTab>
            <AccordionTab header="EG" v-if="currentData.eg_status">
                3
            </AccordionTab>
            <AccordionTab header="MOP" v-if="currentData.mop_status">
                4
            </AccordionTab>
        </Accordion>

    </Sidebar>
    <div ref="calendarContainer" class="min-h-full min-w-fit text-gray-800 card" v-if="singleAttendanceDay">
        <div class="min-w-max border  grid grid-cols-7  card-body ">
            <!-- Top navigation bar  -->
            <Top />

            <!-- Finding Days -->
            <div v-for="day in daysOfTheWeek" class="text-center text-sm md:text-base lg:text-lg font-medium border py-2">
                {{ day.substring(0, 3) }}
            </div>



            <div v-if="firstDayOfCurrentMonth > 0" v-for="day in firstDayOfCurrentMonth" :key="day"
                class=" w-full border opacity-50 "></div>


            <!-- singleAttendanceDay Timesheet Data from current month  -->

            <div v-for="day in daysInCurrentMonth" :key="day" class=" h-16 py-3 shadow-sm  md:h-36 w-full border align-top "
                :class="{
                    'bg-slate-50 text-gray-600 font-medium': isToday(day),
                    'hover:bg-gray-100 hover:text-gray-700': !isToday(day),
                    'bg-gray-200': isWeekEndDays(day)
                }">


                <!-- EACH CELL -->
                <div v-if="currentMonthsingleAttendanceDay(day, singleAttendanceDay).length"
                    v-for="singleAttendanceDay in currentMonthsingleAttendanceDay(day, singleAttendanceDay)"
                    class="hidden md:block" @click="visibleRight = true, currentData = { ...singleAttendanceDay }">


                    <div v-if="isFutureDate(day)">
                        <div
                            class="w-full h-full text-xs md:text-sm lg:text-base text-left transition-colors font-semibold ">
                            <div class="flex justify-center">
                                <p class="mx-3">{{ dayjs(singleAttendanceDay.date).format('D') }}</p>
                            </div>

                            <!-- Week end -->

                            <div v-if="isWeekEndDays(day)" class="flex justify-center items-center">
                                <p v-if="singleAttendanceDay.isAbsent"
                                    class="px-auto font-bold text-sm  text-black text-center py-5">Week
                                    Off
                                </p>
                            </div>


                            <!-- If Employee is Absent  -->
                            <!-- {{ leaveStatus(singleAttendanceDay.isAbsent) }} -->

                            <!-- <div v-if="singleAttendanceDay.isAbsent">

                                <div class="bg-green-100 p-3 rounded-lg"
                                    v-if="singleAttendanceDay.absent_status.includes('Approved')">
                                    <p class="font-semibold fs-6 text-green-900 text-center"> {{
                                        singleAttendanceDay.leave_type }}
                                    </p>
                                    <p class="text-center">Approved
                                        <i class='fa fa-check-circle text-success mx-2' v-tooltip="'Approved'"
                                            title="Not Applied"></i>
                                    </p>
                                </div>
                                <div class="bg-red-100 p-3 rounded-lg"
                                    v-else-if="singleAttendanceDay.absent_status.includes('Rejected')">
                                    <p class="font-semibold fs-6 text-red-900 text-center"> {{
                                        singleAttendanceDay.leave_type }} </p>
                                    <p class="text-center">Rejected <i class="fa fa-times-circle mx-2 text-danger"></i></p>
                                </div>
                                <div class="bg-yellow-100 p-3 rounded-lg"
                                    v-else-if="singleAttendanceDay.absent_status.includes('Pending')">
                                    <p class="font-semibold fs-6 text-yellow-600 text-center"> {{
                                        singleAttendanceDay.leave_type }}
                                    </p>
                                    <p class="text-center">Pending<i class="fa fa-question-circle fs-15 text-secondary mx-2"
                                            v-tooltip="'Pending'"></i></p>
                                </div>
                                <div class="bg-slate-100 p-3 rounded-lg"
                                    v-else-if="singleAttendanceDay.absent_status.includes('Revoked')">
                                    <p class="font-semibold fs-6 text-slate-600 text-center"> {{
                                        singleAttendanceDay.leave_type }}
                                    </p>
                                    <p class="text-center">Revoked</p>
                                </div>
                                <div class="bg-red-100 p-3 rounded-lg" v-else-if="!isWeekEndDays(day)">
                                    <p class="font-semibold fs-6 text-red-900 text-center">Absent <i
                                            class="fa fa-exclamation-circle text-warning fs-15 mx-2"
                                            v-tooltip="'Not Applied'"></i></p>

                                </div>
                            </div> -->


                            <!-- If Employee is Present -->
                            <div v-else
                                class="w-full  py-1 flex space-x-1 items-center whitespace-nowrap overflow-hidden  hover: cursor-pointer rounded-sm">
                                <div class="w-full my-3  p-2.5  rounded-sm mr-3"
                                    :class="findAttendanceStatus(singleAttendanceDay)">
                                    <p class="font-sans">{{ find(singleAttendanceDay) }}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty Cells in month  -->
            <div v-if="lastEmptyCells > 0" v-for="day in lastEmptyCells" :key="day"
                class="h-16  md:h-36 w-full border rounded-lg opacity-50"></div>

            <div class="rounded-lg md:hidden col-span-7 flex justify-between items-center p-2 ">
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
    <Dialog header="Header" v-model:visible="useTimesheet.canShowLoading"
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
import { ref, onMounted, onUpdated } from "vue";
import Top from "../hrms/modules/attendence/timesheet/components/Top.vue"
import { useCalendarStore } from "../hrms/modules/attendence/timesheet/stores/calendar";
import { useAttendanceTimesheetMainStore } from '../hrms/modules/attendence/timesheet/stores/attendanceTimesheetMainStore'
import dayjs from "dayjs";
import moment from "moment";
import { Service } from "../hrms/modules/Service/Service";


const currentData = ref({})


const tabs = ref([
    { title: 'LC Regularization', content: 'Content 1' },
    { title: 'Eg Regularization', content: 'Content 2' },
    { title: 'Title 3', content: 'Content 3' }
]);

const useTimesheet = useAttendanceTimesheetMainStore()
const service = Service()



const findAttendanceStatus = (data) => {
    console.log(data);
    if (data.isAbsent) {
        return 'border-l-4 border-red-500 bg-red-50 text-red-600 font-medium fs-5'
    } else {
        if (data.lc_status) {
            return 'border-l-4 border-yellow-500 bg-yellow-50 text-yellow-900 font-medium fs-5'

        } else
            if (data.mip_status) {
                return 'border-l-4 border-blue-500 bg-blue-50 text-blue-600 font-medium fs-5'

            } else {
                return 'border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5'

            }
    }
}

const find = (data) => {

    if (data.isAbsent) {
        return 'Absent'
    } else {
        if (data.lc_status) {
            return 'Late coming'

        } else
            if (data.mip_status) {
                return 'Missed in punch'

            } else {
                return 'Present'

            }
    }
}

const props = defineProps({
    singleAttendanceDay: {
        type: Object,
        required: true,
    },

});

const visibleRight = ref(false)

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
 * The month is gotten from the calendar store
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


const isWeekEndDays = (day) => {
    var dayValue = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        day
    ).getDay();


    if (dayValue == 0) {
        return true;
    } else {
        return false;
    }
}


const isFutureDate = (today) => {
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate());

    var dayValue = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        today
    )
    if (tomorrow > dayValue) {
        return true
    } else {
        return false
    }
}

const getSession = (time) => {

    let timeFormat = time == null ? "--:--:--" : moment(
        time, ["HH:mm"]).format('h:mm a');

    return timeFormat
};

const isAbesent = (date) => {

}


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
 * Gets all the calendar singleAttendanceDay on a given day
 *
 * @param {number} day calendar month day whose event(s) we're getting
 * @param {array} singleAttendanceDay Array of singleAttendanceDay objects to filter through
 *
 * @return array Array of the filtered day's event(s)
 */
const currentMonthsingleAttendanceDay = (day, singleAttendanceDay) => {
    if (!singleAttendanceDay.length) return [];

    let todaysEvent = [];
    singleAttendanceDay.forEach((event) => {
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
 * @param {array} singleAttendanceDay Array of singleAttendanceDay objects to show on the modal
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

.regualarization_button {
    padding: 1px !important;
    height: 14px;
    width: auto;
    min-width: 20px;
    border-radius: 2px;
    font-size: 8px !important;
    text-align: center;
}
</style>
