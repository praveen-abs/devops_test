<template>
    <Sidebar v-model:visible="visibleRight" position="right" class="!w-[2px]">
        <template #header>
            <p class="absolute left-0 mx-4 font-semibold fs-5 ">Attendance Reports</p>
        </template>

        <div v-if="currentlySelectedCellRecord.isAbsent">
            <div v-if="currentlySelectedCellRecord.absent_reg_status == 'None'">
                <div class="rounded-lg bg-red-50 p-3 my-3">
                    <p class="text-center font-semibold fs-6">Absent</p>

                    <div class="flex justify-center gap-x-20 my-3">
                        <a class="text-left text-blue-500 underline font-semibold fs-6 cursor-pointer "
                            href="/attendance-leave">Apply leave</a>
                        <a class="text-right text-blue-500 underline font-semibold fs-6 cursor-pointer"
                            @click="attendanceRegularizationDialog = true">Regularize</a>
                    </div>
                </div>
                <div class="my-2 bg-orange-50 rounded-lg p-3 py-4 transition-all duration-700"
                    v-if="attendanceRegularizationDialog">
                    <div class="grid grid-cols-2 ">
                        <div class=""><label class="font-semibold fs-6 text-gray-700">Date</label></div>
                        <div class="">
                            <span class="text-ash-medium fs-15" id="current_date">
                                {{ currentlySelectedCellRecord.date }}</span>
                            <input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date"
                                id="attendance_date">
                        </div>
                    </div>
                    <div class="grid grid-cols-2  my-4">
                        <div class="">
                            <label class="font-semibold fs-6 text-gray-700">Check In Time</label>
                        </div>
                        <div class="">
                            <input placeholder="format-09:30:00" type="time" @keypress="isNumber($event)"
                                class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""
                                v-model="useTimesheet.absentRegularizationDetails.start_time">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 ">
                        <div class=""><label class="font-semibold fs-6 text-gray-700">Check Out Time</label>
                        </div>
                        <div class="">
                            <input placeholder="format-09:30:00" type="time" @keypress="isNumber($event)"
                                class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""
                                v-model="useTimesheet.absentRegularizationDetails.end_time">
                        </div>
                    </div>
                    <div class="grid grid-cols-2  my-4">
                        <div class=""><label class="font-semibold fs-6 text-gray-700">Reason</label></div>
                        <div>
                            <select name="reason" class="form-select btn-line-orange w-full" id="reason_lc"
                                v-model="useTimesheet.absentRegularizationDetails.reason">
                                <option selected hidden disabled>
                                    Choose Reason
                                </option>
                                <option value="Permission">Permission</option>
                                <option value="Technical Error">Technical Error</option>
                                <option value="Official">Official</option>
                                <option value="Personal">Personal</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 " v-if="useTimesheet.absentRegularizationDetails.reason == 'Others'">
                        <div class="row">
                            <div class="col-12">
                                <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                                    placeholder="Reason here...."
                                    v-model="useTimesheet.absentRegularizationDetails.custom_reason"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">
                        <button type="button" class="btn btn-orange"
                            @click="useTimesheet.applyAbsentRegularization">Apply</button>
                    </div>

                </div>
            </div>
            <div v-else class="p-3 rounded-lg my-3 "
                :class="findAbsentStatus(currentlySelectedCellRecord.absent_reg_status)">
                Absent Regularization applied successful <i
                    :class="icons(true, currentlySelectedCellRecord.absent_reg_status)" class="py-auto"
                    style="font-size: 1.2rem"></i>
            </div>
        </div>

        <div class="rounded-lg bg-orange-50 p-3" v-if="!currentlySelectedCellRecord.isAbsent">
            <p class="font-sans font-bold fs-6">Check-in</p>


            <div class="my-2  ">
                <div class="grid grid-cols-6 gap-y-4">
                    <p class="font-medium text-[12px] text-gray-700 col-span-2 ">In Time</p>
                    <p class="font-semibold text-[12px] col-span-1 text-center">:</p>
                    <p class="font-semibold text-[12px] col-span-3">{{ currentlySelectedCellRecord.checkin_time }}</p>

                    <p class="font-medium text-[12px] text-gray-700 col-span-2">Check In Mode</p>
                    <p class="font-semibold text-[12px] col-span-1 text-center">:</p>
                    <p class="font-semibold text-[12px] col-span-3">{{ capitalizeFLetter(currentlySelectedCellRecord.attendance_mode_checkin) }}

                        <!-- <i class="text-green-800 font-semibold text-sm mx-2"
                            :class="findAttendanceMode(currentlySelectedCellRecord.attendance_mode_checkin)"></i> -->
                        <i v-if="currentlySelectedCellRecord.attendance_mode_checkin == 'mobile'"
                            class="fa fa-picture-o fs-6 cursor-pointer  animate-pulse"
                            @click="viewSelfieImage('checkin', currentlySelectedCellRecord.selfie_checkin)"
                            aria-hidden="true"></i>
                    </p>


                    <p class="font-medium text-[12px] text-gray-700 col-span-2">Check In Status</p>
                    <p class="font-semibold text-[12px] col-span-1 text-center">:</p>
                    <p class="font-semibold text-[12px] whitespace-nowrap col-span-2">{{ capitalizeFLetter(findCheckInStatus('checkin', currentlySelectedCellRecord)) }}

                    </p>

                    <p class="font-medium text-[12px] text-gray-700 col-span-2">Approval Status</p>
                    <p class="font-semibold text-[12px] col-span-1 text-center">:</p>
                    <p class="font-semibold text-[12px] col-span-2">
                        {{ findCheckInStatus('checkInStatus', currentlySelectedCellRecord) }}</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg bg-blue-50 p-3 my-3" v-if="!currentlySelectedCellRecord.isAbsent">
            <p class="font-sans font-bold text-[12px]">Check-out</p>

            <div class="my-2">
                <div class="grid grid-cols-6 my-1 gap-y-4">
                    <p class="font-medium text-[12px] text-gray-700 col-span-3">Out Time</p>
                    <p class="font-semibold text-[12px] col-span-1 ">:</p>
                    <p class="font-semibold text-[12px] col-span-2">{{ currentlySelectedCellRecord.checkout_time }}</p>

                    <p class="font-medium text-[12px] text-gray-700 col-span-3">Check Out Mode</p>
                    <p class="font-semibold text-[12px] col-span-1">:</p>
                    <p class="font-semibold text-[12px] col-span-2">{{ capitalizeFLetter(currentlySelectedCellRecord.attendance_mode_checkout) }}
                        <i v-if="currentlySelectedCellRecord.attendance_mode_checkout == 'mobile'"
                            class="fa fa-picture-o text-[12px] cursor-pointer animate-pulse" aria-hidden="true"
                            @click="viewSelfieImage('checkout', currentlySelectedCellRecord.selfie_checkout)"></i>

                        <!-- <i class="text-green-800 font-semibold text-sm mx-2"
                            :class="findAttendanceMode(currentlySelectedCellRecord.attendance_mode_checkout)"></i> -->
                    </p>

                    <p class="font-medium text-[12px] text-gray-700 col-span-3">Check Out Status</p>
                    <p class="font-semibold text-[12px] col-span-1 ">:</p>
                    <p class="font-semibold text-[12px] col-span-2 whitespace-nowrap">{{ findCheckInStatus('checkout', currentlySelectedCellRecord) }}</p>

                    <p class="font-medium text-[12px] text-gray-700 col-span-3">Approval Status</p>
                    <p class="font-semibold text-[12px] col-span-1 ">:</p>
                    <p class="font-semibold text-[12px] col-span-2">{{ findCheckInStatus('checkOutStatus', currentlySelectedCellRecord) }}</p>
                </div>
            </div>
        </div>

        <p class="font-bold mx-2 my-3"
            v-if="currentlySelectedCellRecord.isLC || currentlySelectedCellRecord.isMIP || currentlySelectedCellRecord.isEG || currentlySelectedCellRecord.isMOP">
            Attendance
            regularization</p>


        <div class=" bg-yellow-50 text-yellow-400 p-1 rounded-sm" v-if="currentlySelectedCellRecord.isLC && currentlySelectedCellRecord.is_Lc_Voided">
            <p  class="font-bold mx-2 my-3 text-center">
                LC is voided
            </p>
        </div>



        <Accordion>
            <AccordionTab v-if="currentlySelectedCellRecord.isLC && !currentlySelectedCellRecord.is_Lc_Voided">
                <template #header>
                    <div class="grid grid-cols-2 w-full">
                        <span class="w-10/12 px-2 font-semibold fs-6 my-auto whitespace-nowrap">Late Coming</span>
                        <p class="text-right px-4"><i
                                :class="icons(currentlySelectedCellRecord.isLC, currentlySelectedCellRecord.lc_status)"
                                class="py-auto" style="font-size: 1.2rem"></i></p>
                    </div>
                </template>
                <AttendanceRegularization  :source="useTimesheet.lcDetails" :type="'LC'" />
            </AccordionTab>
            <AccordionTab v-if="currentlySelectedCellRecord.isMIP">
                <template #header>
                    <div class="grid grid-cols-2 w-full">
                        <span class="w-10/12 px-2 font-semibold fs-6 my-auto whitespace-nowrap">Missed in punch</span>
                        <p class="text-right px-4"><i
                                :class="icons(currentlySelectedCellRecord.isMIP, currentlySelectedCellRecord.mip_status)"
                                class="py-auto" style="font-size: 1.2rem"></i></p>
                    </div>
                </template>
                <AttendanceRegularization :source="useTimesheet.mipDetails" :type="'MIP'" />
            </AccordionTab>
            <AccordionTab v-if="currentlySelectedCellRecord.isEG">
                <template #header>
                    <div class="grid grid-cols-2 w-full">
                        <span class="w-10/12 px-2 font-semibold fs-6 my-auto whitespace-nowrap">Early going</span>
                        <p class="text-right px-4"><i
                                :class="icons(currentlySelectedCellRecord.isEG, currentlySelectedCellRecord.eg_status)"
                                class="py-auto" style="font-size: 1.2rem"></i></p>
                    </div>
                </template>
                <AttendanceRegularization :source="useTimesheet.egDetails" :type="'EG'" />
            </AccordionTab>
            <AccordionTab v-if="currentlySelectedCellRecord.isMOP">
                <template #header>
                    <div class="grid grid-cols-2 w-full">
                        <span class="w-10/12 px-2 font-semibold fs-6 my-auto whitespace-nowrap">Missed out punch</span>
                        <p class="text-right px-4"><i
                                :class="icons(currentlySelectedCellRecord.isMOP, currentlySelectedCellRecord.mop_status)"
                                class="py-auto" style="font-size: 1.2rem"></i></p>
                    </div>
                </template>
                <AttendanceRegularization :source="useTimesheet.mopDetails" :type="'MOP'" />
            </AccordionTab>

        </Accordion>

    </Sidebar>
    <div ref="calendarContainer" class="min-h-full min-w-fit text-gray-800 card" v-if="singleAttendanceDay">
        <div class="min-w-max border  grid grid-cols-7  card-body ">
            <!-- Top navigation bar  -->
            <Top />

            <!-- Finding Days -->
            <div v-for="day in daysOfTheWeek" class="text-center text-sm md:text-base lg:text-lg font-semibold border py-2">
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
                    class="hidden md:block"
                    @click="!singleAttendanceDay.isAbsent ? getSelectedCellValues(singleAttendanceDay) : singleAttendanceDay.absent_status.includes('Not Applied') ? getSelectedCellValues(singleAttendanceDay) : ''">

                    <div>
                        <div
                            class="w-full h-full text-xs md:text-sm lg:text-base text-left transition-colors font-semibold relative">
                            <div class="flex justify-center">
                                <p class="mx-3 font-semibold text-sm">{{ dayjs(singleAttendanceDay.date).format('D') }}</p>
                            </div>

                            <!-- Week end -->

                            <div v-if="isWeekEndDays(day)" class="flex justify-center items-center">
                                <p v-if="singleAttendanceDay.isAbsent"
                                    class="px-auto font-semibold  fs-6  text-black text-center py-5">Week
                                    Off
                                </p>
                            </div>

                            <div v-else
                                class=" py-1 flex space-x-1 items-center  overflow-hidden  hover: cursor-pointer rounded-sm hp"
                                :class="[find(singleAttendanceDay).length > 20 ? 'whitespace-normal' : 'whitespace-nowrap']">
                                <div v-if="isFutureDate(day)"
                                    class="w-full my-3  p-2.5  rounded-sm mr-3 flex font-semibold "
                                    style="max-width: 140px;" :class="findAttendanceStatus(singleAttendanceDay)">
                                    <!-- <p class="font-sans w-2"> <i class="text-green-800 font-semibold text-sm"
                                            :class="findAttendanceMode(singleAttendanceDay.attendance_mode_checkin)"></i>
                                    </p> -->
                                    <p class="font-sans fs-6  mx-2">{{ find(singleAttendanceDay) }}<i
                                            v-if="singleAttendanceDay.isMOP"
                                            :class="icons(singleAttendanceDay.isMOP, singleAttendanceDay.mop_status)"
                                            style="font-size: 0.9rem" class="px-1"></i>
                                        <i v-else-if="singleAttendanceDay.isLC"
                                            :class="icons(singleAttendanceDay.isLC, singleAttendanceDay.lc_status)"
                                            style="font-size: 0.9rem" class="px-1"></i>
                                        <i v-else-if="singleAttendanceDay.isEG"
                                            :class="icons(singleAttendanceDay.isEG, singleAttendanceDay.eg_status)"
                                            style="font-size: 0.9rem" class="px-1"></i>
                                        <i v-else-if="singleAttendanceDay.isMIP"
                                            :class="icons(singleAttendanceDay.isMIP, singleAttendanceDay.mip_status)"
                                            style="font-size: 0.9rem" class="px-1"></i>
                                    </p>
                                </div>

                            </div>
                            <div v-if="!singleAttendanceDay.isAbsent"
                                class="hop  transition p-2 ease-in-out delay-150 bg-white border rounded-lg absolute  z-50">
                                <div
                                    class="w-full my-3  p-2.5  rounded-sm mr-3 flex  border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5">
                                    <i class="fa fa-arrow-down text-green-800  font-medium text-sm "
                                        style='transform: rotate(-45deg);'></i>
                                    <p class="bg-blue-50 text-blue-600   font-sans font-semibold text-sm mx-1" v-if="singleAttendanceDay.isMIP" >
                                        MIP
                                    </p>
                                    <p class="text-green-800 font-sans font-semibold text-sm mx-1" v-else>
                                        {{ getSession(singleAttendanceDay.checkin_time) }}
                                    </p>
                                </div>
                                <div
                                    class="w-full my-3  p-2.5  rounded-sm mr-3 flex  border-l-4  font-medium fs-5 "
                                     :class="singleAttendanceDay.isMOP ? 'bg-blue-50 text-blue-600' : 'border-red-500 bg-red-50 text-red-600' ">
                                    <i class="fa fa-arrow-down font-medium text-sm text-red-800 "
                                        style='transform: rotate(230deg);'></i>
                                        <!-- :class="" -->
                                    <p class="bg-blue-50 text-blue-600   font-sans font-semibold text-sm mx-1" v-if="singleAttendanceDay.isMOP" >
                                        MOP
                                    </p>
                                    <p class="text-red-800  font-sans font-semibold text-sm mx-1" v-else >
                                        {{ getSession(singleAttendanceDay.checkout_time) }}
                                    </p>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty Cells in month  -->
            <div v-if="lastEmptyCells > 0" v-for="day in lastEmptyCells" :key="day"
                class="h-16  md:h-36 w-full border rounded-lg opacity-50" ></div>

            <div class="rounded-lg md:hidden col-span-7 flex justify-between items-center p-2 ">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 cursor-pointer transition-all"
                        @click="calendarStore.decrementMonth(1)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 cursor-pointer transition-all"
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
import { useCalendarStore } from './stores/calendar.js';
import { useAttendanceTimesheetMainStore } from './stores/attendanceTimesheetMainStore'
import dayjs from "dayjs";
import moment from "moment";
import { Service } from "../../Service/Service.js";
import AttendanceRegularization from './components/ClassicAttendanceRegularizationSidebar.vue'
import { useLeaveService } from "../../leave_module/leave_apply/leave_apply_service";

const useLeave = useLeaveService()

const currentlySelectedCellRecord = ref({})

const attendanceRegularizationDialog = ref(false)


const useTimesheet = useAttendanceTimesheetMainStore()
const service = Service()
const visibleRight = ref(false)





// const toCloseSideBar = (val) => {
//     console.log(val);
//     visibleRight.value = val
// }



const viewSelfieImage = (isSelected, selectedCells) => {
    useTimesheet.dialog_Selfie = true
    if (isSelected == 'checkin') {
        useTimesheet.selfieDetails = selectedCells
    } else
        if (isSelected == 'checkout') {
            useTimesheet.selfieDetails = selectedCells
        } else {
            useTimesheet.selfieDetails = ''
        }

}




const getSelectedCellValues = (selectedCells) => {
    // useTimesheet.classicTimesheetSidebar = true
    visibleRight.value = true

    currentlySelectedCellRecord.value = { ...selectedCells }
    if (selectedCells.isLC) {
        useTimesheet.lcDetails = { ...selectedCells }
    }
    if (selectedCells.isEG) {
        useTimesheet.egDetails = { ...selectedCells }
    }
    if (selectedCells.isMIP) {
        useTimesheet.mipDetails = { ...selectedCells }
    }
    if (selectedCells.isMOP) {
        useTimesheet.mopDetails = { ...selectedCells }
    }
    if (selectedCells.isAbsent) {
        useTimesheet.absentRegularizationDetails = { ...selectedCells }
    }
}


const findAttendanceStatus = (data) => {
    // console.log(data);
    if (data.isAbsent) {
        if(data.isAbsent && data.is_holiday){
            return 'border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5'
        }
       else if (data.absent_status.includes('Approved')) {
            return 'border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5'
        } else
            if (data.absent_status.includes('Rejected')) {
                return 'border-l-4 border-red-500 bg-red-50 text-red-600 font-medium fs-5'
            } else
                if (data.absent_status.includes('Pending')) {
                    return 'border-l-4 border-yellow-500 bg-yellow-50 text-yellow-600 font-medium fs-5'
                } else
                    if (data.absent_status.includes('Revoked')) {
                        return 'border-l-4 border-gray-500 bg-gray-50 text-gray-600 font-medium fs-5'

                    } else {
                        return 'border-l-4 border-red-500 bg-red-50 text-red-600 font-medium fs-5 '
                    }
    } else {
        if (data.lc_status) {
            return 'border-l-4 border-yellow-500 bg-yellow-50 text-yellow-900 font-medium fs-5 rounded-lg'

        } else
            if (data.mip_status) {
                return 'border-l-4 border-blue-500 bg-blue-50 text-blue-600 font-medium fs-5 rounded-lg'

            } else
                if (data.eg_status) {
                    return 'border-l-4 border-yellow-500 bg-yellow-50 text-yellow-900 font-medium fs-5 rounded-lg'

                }
                else
                    if (data.mop_status) {
                        return 'border-l-4 border-blue-500 bg-blue-50 text-blue-600 font-medium fs-5 rounded-lg'

                    }
                    else {
                        return 'border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5 rounded-lg'

                    }
    }
}

const findAttendanceMode = (attendance_mode) => {
    // console.log(attendance_mode);
    if (attendance_mode == "biometric")
        // return '&nbsp;<i class="fa-solid fa-fingerprint"></i>';
        return 'fas fa-fingerprint fs-12'
    else
        if (attendance_mode == "web")
            return 'fa fa-laptop fs-12';
        else
            if (attendance_mode == "mobile")
                return 'fa fa-mobile-phone fs-12';
            else {
                return ''; // when attendance_mode column is empty.
            }
}
const icons = (isSelected, data) => {

    if (isSelected) {
        if (data == 'Approved') {
            return 'pi pi-check-circle text-green-600 font-semibold'
        } else
            if (data == 'Pending') {
                return 'pi pi-question-circle text-gray-600 font-semibold'
            } else
                if (data == 'Rejected') {
                    return 'pi pi-times-circle text-red-600 font-semibold'
                } else {
                    return 'pi pi-exclamation-circle text-yellow-600 font-semibold'
                }
    } else {
        console.log('no data');
    }

}

const find = (data) => {

    if (data.isAbsent) {
        if(data.isAbsent && data.is_holiday){
            return data.is_holiday == false ? 'Absent' : `${data.holiday_name} Present`
        }
        if (data.absent_status.includes('Approved')) {
            return data.leave_type == 'Sick Leave / Casual Leave' ? 'Sl/CL Approved' : `${data.leave_type} Approved`
        } else
            if (data.absent_status.includes('Rejected')) {
                return data.leave_type == 'Sick Leave / Casual Leave' ? 'Sl/CL Rejected' : `${data.leave_type} Rejected`
            } else
                if (data.absent_status.includes('Pending')) {
                    return data.leave_type == 'Sick Leave / Casual Leave' ? 'Sl/CL Pending' : `${data.leave_type} Pending`
                } else
                    if (data.absent_status.includes('Revoked')) {
                        return `${data.leave_type} Revoked`

                    } else {
                        return 'Absent'

                    }
    } else {
        if (data.lc_status) {
            return 'Late coming'

        } else
            if (data.mip_status) {
                return 'Missed in punch'

            } else
                if (data.eg_status) {
                    return 'Early going'

                } else
                    if (data.mop_status) {
                        return 'Missed out punch'

                    } else {
                        return 'Present'

                    }
    }
}


const findCheckInStatus = (type, data) => {
    if (type == 'checkin') {
        if (data.isLC) {
            return 'Late coming'

        } else
            if (data.isMIP) {
                return 'Missed in punch'
            } else {
                return '-'
            }

    }
    if (type == 'checkout') {

        if (data.isEG) {
            return 'Early going'

        } else
            if (data.isMOP) {
                return 'Missed out punch'
            } else {
                return '-'
            }

    }

    if (type == 'checkInStatus') {

        if (data.lc_status == 'None' || data.lc_status == 'None') {
            return 'Not Applied'
        } else
            if (data.lc_status) {
                return data.lc_status
            } else
                if (data.mip_status) {
                    return data.mip_status
                } else {
                    return '-'
                }

    }

    if (type == 'checkOutStatus') {
        if (data.eg_status == 'None' || data.mop_status == 'None') {
            return 'Not Applied'
        } else
            if (data.eg_status) {
                return data.eg_status
            } else
                if (data.mop_status) {
                    return data.mop_status
                } else {
                    return '-'
                }

    }


}


const findAbsentStatus = (data) => {
    if (data.includes('Approved')) {
        return 'bg-green-50'
    } else
        if (data.includes('Pending')) {
            return 'bg-yellow-50'
        } else
            if (data.includes('Rejected')) {
                return 'bg-red-50'
            } else
                if (data.includes('Revoked')) {
                    return 'bg-slate-50'

                }
}

const props = defineProps({
    singleAttendanceDay: {
        type: Object,
        required: true,
    },
    sidebar: {
        type: Boolean,
        required: true
    }

});

const findAttendanceRegularizationStatus = (data) => {

    if (data.isLc) {
        if (data.lc_status.includes('Approved')) {
            return ' bg-green-50 text-green-600  fs-6 rounded-lg'
        } else
            if (data.lc_status.includes('Rejected')) {
                return ' bg-red-50 text-red-600  fs-6 rounded-lg'
            } else
                if (data.lc_status.includes('Pending')) {
                    return 'border-yellow-500 bg-yellow-50 text-yellow-600  fs-6 rounded-lg'
                } else
                    if (data.lc_status.includes('Revoked')) {
                        return ' bg-gray-50 text-gray-600  fs-6 rounded-lg'
                    }
                    else
                        if (data.lc_status.includes('None')) {
                            return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                        }
    } else
        if (data.isMIP) {
            if (data.mip_status.includes('Approved')) {
                return ' bg-green-50 text-green-600  fs-6 rounded-lg'
            } else
                if (data.mip_status.includes('Rejected')) {
                    return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                } else
                    if (data.mip_status.includes('Pending')) {
                        return 'border-yellow-500 bg-yellow-50 text-yellow-600  fs-6 rounded-lg'
                    } else
                        if (data.mip_status.includes('Revoked')) {
                            return ' bg-gray-50 text-gray-600  fs-6 rounded-lg'
                        }
                        else
                            if (data.mip_status.includes('None')) {
                                return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                            }
        } else
            if (data.isEG) {
                if (data.eg_status.includes('Approved')) {
                    return ' bg-green-50 text-green-600  fs-6 rounded-lg'
                } else
                    if (data.eg_status.includes('Rejected')) {
                        return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                    } else
                        if (data.eg_status.includes('Pending')) {
                            return 'border-yellow-500 bg-yellow-50 text-yellow-600  fs-6 rounded-lg'
                        } else
                            if (data.eg_status.includes('Revoked')) {
                                return ' bg-gray-50 text-gray-600  fs-6 rounded-lg'
                            }
                            else
                                if (data.eg_status.includes('None')) {
                                    return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                                }
            } else
                if (data.isMOP) {
                    if (data.mop_status.includes('Approved')) {
                        return ' bg-green-50 text-green-600  fs-6 rounded-lg'
                    } else
                        if (data.mop_status.includes('Rejected')) {
                            return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                        } else
                            if (data.mop_status.includes('Pending')) {
                                return 'border-yellow-500 bg-yellow-50 text-yellow-600  fs-6 rounded-lg'
                            } else
                                if (data.mop_status.includes('Revoked')) {
                                    return ' bg-gray-50 text-gray-600  fs-6 rounded-lg'
                                }
                                else
                                    if (data.mop_status.includes('None')) {
                                        return ' bg-red-50 text-red-600  fs-6 rounded-lg'
                                    }
                }


}


function capitalizeFLetter(name) {
    let result = name.charAt(0).toUpperCase() +
        name.slice(1)
        return result
}

const leaveShortFormat = (leave_type) => {
    if (leave_type == 'Sick Leave / Casual Leave') {
        return SL / CL
    } else {
        return leave_type
    }

}






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

    let timeFormat = time == null ? "Yet to check Out" : moment(
        time, ["HH:mm"]).format('h:mm a');

    return timeFormat
};

const isNumber = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[0-9:]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
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

<style>
.hop {
    display: none;
    width: 150px;
    top: 80px;
    left: 25px;
    z-index: 9999;
}

.hp:hover+.hop {
    display: block;
}



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
