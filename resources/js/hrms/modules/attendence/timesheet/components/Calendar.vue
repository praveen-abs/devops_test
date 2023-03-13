<template>
    <div ref="calendarContainer" class="min-h-full min-w-full text-gray-800 ">
        <div class="w-full   grid grid-cols-7">
            <Top class="space-x-8 my-6" />

            <!-- day Names -->
            <div v-for="day in daysOfTheWeek" :key="day"
                class="text-center text-2xl md:text-lg lg:text-lg font-bold space-x-4 text-orange-500 ">
                {{ day.substring(0, 3) }}
            </div>

            <div v-if="firstDayOfCurrentMonth > 0" v-for="day in firstDayOfCurrentMonth" :key="day"
                class="h-18 md:h-48 w-full  opacity-50    "></div>

            <div v-for="day in daysInCurrentMonth" :key="day"
                class="h-18 md:h-48 w-full align-top  rounded-2xl  shadow-xl 	">
                <div class="w-full h-full transition-colors bg-white rounded-xl  border-2  mt-5 shadow-xl" :class="{
                    '  font-medium text-orange-500': isToday(day),
                    'hover:bg-gray-100 hover:text-gray-700': !isToday(day),
                }">
                    <p style="font-size: 1.5em;" class="mt-6 ml-6 text-lg md:text-base lg:text-base  "> {{ day }}</p>

                    <div v-if="Employee_Data(day, Fetch_employee_data).length" v-for="evt in Employee_Data(day, Fetch_employee_data)"
                        class="hidden md:block" :key="evt.user_id">


                        <div class="w-full px-2 py-1 flex  items-center whitespace-nowrap overflow-hidden  cursor-pointer  rounded-xl ">
                            <div class="w-1/12">
                                <div class="h-2 w-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="w-4 h-4 mt-4 text-red-700">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                    </svg>

                                </div>
                            </div>
                            <div class="2-18">
                                <h5
                                    class="text-xs tracking-tight text-clip overflow-hidden text-base font-bold mt-5 mx-2 text-red-700">
                                    {{ evt.check}}
                                </h5>
                            </div>

                        </div>


                    </div>

                    <!-- <div v-if="allTodaysEvent(day, events) > 3"
                        class="hidden md:flex mt-2 w-full px-2 py-1 space-x-2 items-center whitespace-nowrap overflow-hidden hover:text-gray-800 hover:font-medium cursor-pointer  rounded-xl"
                        @click="openModal(day, allTodaysEvent(day, events))">
                        <div class="w-1/12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </div>
                        <div class="w-11/12">
                            <h6 class="text-xs tracking-tight text-clip text-left overflow-hidden">
                                {{ allTodaysEvent(day, events).length - 3 + " more events" }}
                            </h6>
                        </div>
                    </div> -->
<!--
                    <div v-if="allTodaysEvent(day, events).length > 0"
                        class="flex md:hidden h-2/3 w-full justify-center items-center"
                        @click="openModal(day, allTodaysEvent(day, events))">
                        <div class="h-6 w-6 flex justify-center items-center text-xs bg-purple-600 ">
                            <h3 class="font-medium text-white">
                                {{ allTodaysEvent(day, events).length }}
                            </h3>
                        </div>
                    </div> -->
                </div>
            </div>

            <div v-if="lastEmptyCells > 0" v-for="day in lastEmptyCells" :key="day"
                class="h-16 md:h-36 w-full border opacity-50 mt-5  rounded-xl"></div>

            <!-- mobile navigation -->
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
import Top from "./Top.vue";
import { useCalendarStore } from "../stores/calendar";


const leave_data = ref()

onMounted(() => {
    getDaysInMonth();
    getFirstDayOfMonth();
    lastCalendarCells();
});



const props = defineProps({
    Fetch_employee_data: {
        type: Object,
        required: true,
    },
});




// Store initialization and subscription
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
 *
 */
const Present_Day_Detials = (day, startdate) => {
    if (
        calendarStore.getYear == startdate.substring(0, 4) &&
        calendarStore.getMonth + 1 == startdate.substring(5, 7) &&
        day == startdate.substring(8, 10)
    )
        return true;

    return false;
};



/**
 * Gets all the calendar events on a given day
 *
 * @param {number} day calendar month day whose event(s) we're getting
 * @param {array} Fetch_employee_data Array of events objects to filter through
 *
 * @return array Array of the filtered day's event(s)
 */
const Employee_Data = (day, Fetch_employee_data) => {


    const dates = Object.keys(Fetch_employee_data)
    const User_data = Object.values(Fetch_employee_data)

    // console.log("user length"+User_data.length);
    // dates.forEach((keys) => {
    //     console.log("-----keys----" + keys + "-----");
    // })

    // console.log("-----user data----" + User_data + "-----");

    if (!User_data.length) return [];

    let Present_Day = [];





    User_data.forEach((event) => {

        dates.forEach((start_date) => {

            if (Present_Day_Detials(day, start_date)) {
                Present_Day.push(event);
                console.log("todaysEvent.push(event):" + event);
            }

          })

    });

    return Present_Day;
};




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
