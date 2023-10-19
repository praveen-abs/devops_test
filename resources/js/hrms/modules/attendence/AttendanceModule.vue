<template>
    <LoadingSpinner v-if="useTimesheet.canShowLoading"  class="absolute z-50 bg-white" />
    <div class="w-full" >
        <div class="mb-2 card "  >
            <div class="py-1 card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12 ">
                        <div class="calender-mid_content">
                            <div class="row ">
                                <div class=" col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3">
                                    <p class="text-muted fw-normal f-18"><i class="fa fa-calendar me-2" id="calendarIcon"
                                            aria-hidden="true"></i>
                                        <span class="dates ">{{ dayjs(new Date()).format('MMMM DD,YYYY') }}</span>
                                    </p>
                                </div>
                                <div class=" col-sm-5 col-md-5 col-xl-5 col-lg-5 col-xxl-5">

                                    <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed justify-center"
                                        id="pills-tab" role="tablist">
                                        <li class="mx-4 nav-item ember-view" role="presentation" @click="useTimesheet.currentlySelectedTimesheet = 1">
                                            <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill"
                                                href="" data-bs-target="#timesheet" role="tab" aria-controls="pills-home"
                                                aria-selected="true">
                                                Timesheet</a>
                                        </li>
                                        <li class=" nav-item ember-view" role="presentation" @click="useTimesheet.currentlySelectedTimesheet = 2"
                                            v-if="service.current_user_role == 2 || service.current_user_role == 4">
                                            <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill"
                                                href="" data-bs-target="#team" role="tab" aria-controls="pills-home"
                                                aria-selected="true">
                                                Team Timesheet</a>
                                        </li>
                                        <li class=" nav-item ember-view" role="presentation" @click="useTimesheet.currentlySelectedTimesheet = 3"
                                            v-if="service.current_user_role == 2">
                                            <a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill"
                                                href="" data-bs-target="#org" role="tab" aria-controls="pills-home"
                                                aria-selected="true">
                                                Org Timesheet</a>
                                        </li>

                                    </ul>

                                </div>
                                <!-- <div class=" col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4">
                                    <div class="d-flex justify-content-end">
                                        <select class="form-select border-orange me-2" id="">
                                            <option selected hidden disabled>Department</option>

                                        </select>
                                        <select class="form-select border-orange" id="">
                                            <option selected disabled hidden>Export</option>

                                        </select>
                                    </div>

                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mb-2 card" v-if="false">
            <div class="card-body">

                <div class="row ">
                    <div class="mb-2 col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="fas fa-fingerprint me-2 text-success "></i>Biometric
                        </p>

                    </div>

                    <div class="mb-2 col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i
                                class="fa fa-exclamation-circle text-warning fs-15 me-2"></i>Not
                            Applied</p>

                    </div>

                    <div class="mb-2 col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="badge bg-primary rounded-pill me-2 ">LC</i>Late
                            Coming
                        </p>

                    </div>
                    <div class="mb-2 col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="badge bg-info rounded-pill me-2 ">MOP</i>Missed
                            Out
                            Punch</p>

                    </div>
                    <div class="mb-2 col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="fa fa-laptop me-2 text-info"></i>Web </p>

                    </div>
                    <div class="mb-2 col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-3">

                        <p class="fw-bold textColor fs-12"><i class="fa fa-times-circle me-2 text-danger"></i>Rejected
                        </p>

                    </div>




                    <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class='fa fa-check-circle text-success me-1'></i> Approved
                        </p>

                    </div>
                    <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i
                                class="fa fa-question-circle fs-15 text-secondary me-2"></i>Pending</p>

                    </div>

                    <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4 ">

                        <p class="fw-bold textColor fs-12"><i class="badge bg-orange rounded-pill me-2 ">EG</i>Early
                            Going
                        </p>

                    </div>
                    <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="badge bg-dark rounded-pill me-3 ">MIP</i>Missed In
                            Punch</p>

                    </div>
                    <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="fa fa-mobile text-dark fs-15 me-3 "></i>Mobile</p>

                    </div>
                    <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-3 col-sm-4">

                        <p class="fw-bold textColor fs-12"><i class="fa fa-picture-o me-2" aria-hidden="true"></i>View
                            Image</p>

                    </div>
                </div>



            </div>
        </div>
        <div class="mb-0 ">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="timesheet" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="overflow-x-auto  h-[80vh] overflow-y-scroll">
                            <DetailedTimesheet v-if="useTimesheet.switchTimesheet == 'Detailed'"
                                :single-attendance-day="useTimesheet.currentEmployeeAttendance" />
                            <ClassicTimesheet v-else :single-attendance-day="useTimesheet.currentEmployeeAttendance"
                                :sidebar="useTimesheet.classicTimesheetSidebar" />
                        </div>
                    </div>

                    <div class="tab-pane fade " id="team" role="tabpanel">
                        <div class="flex  h-[80vh] overflow-hidden" v-if="teamListLength > 0">
                            <div class="min-w-max">
                                <EmployeeList :source="teamList" :is-team="true" />
                            </div>
                            <div class="overflow-x-auto ml-2 w-100 rounded-lg">
                                <DetailedTimesheet v-if="useTimesheet.switchTimesheet == 'Detailed'"
                                    :single-attendance-day="useTimesheet.currentlySelectedTeamMemberAttendance" />
                                <ClassicTimesheet v-else
                                    :single-attendance-day="useTimesheet.currentlySelectedTeamMemberAttendance"
                                    :sidebar="useTimesheet.classicTimesheetSidebar" />
                            </div>
                        </div>
                        <div class="mr-4 card pb-10" v-else>
                            <img src="../../assests/images/svg_oops.svg" alt="" srcset="" class="w-5 p-6 m-auto">
                            <!-- <p class="my-2 font-semibold fs-3 text-center">You are not eligible to apply salary advance</p> -->
                        </div>
                    </div>
                    <div class="tab-pane fade " id="org" role="tabpanel">
                        <div class="flex h-[80vh] overflow-hidden" v-if="orgListLength > 0">
                            <div class="min-w-max h-[100%]">
                                <EmployeeList :source="orgList" :is-team="false" />
                            </div>
                            <div class="overflow-x-auto ml-2 h-[100%] w-100 rounded-lg ">
                                <DetailedTimesheet v-if="useTimesheet.switchTimesheet == 'Detailed'"
                                    :single-attendance-day="useTimesheet.currentlySelectedOrgMemberAttendance" />
                                <ClassicTimesheet v-else
                                    :single-attendance-day="useTimesheet.currentlySelectedOrgMemberAttendance"
                                    :sidebar="useTimesheet.classicTimesheetSidebar" />
                            </div>
                        </div>
                        <div class="mr-4 card pb-10" v-else>
                            <img src="../../assests/images/svg_oops.svg" alt="" srcset="" class="w-5 p-6 m-auto">
                            <!-- <p class="my-2 font-semibold fs-3 text-center">You are not eligible to apply salary advance</p> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <MopRegularization />
    <MipRegularization />
    <LcRegularization />
    <EgRegularization />
    <ViewSelfieImage />
    <div style="display: none;">
        <LeaveApply />
    </div>
</template>


<script setup>
import DetailedTimesheet from './timesheet/DetailedTimesheet.vue'
import ClassicTimesheet from './timesheet/ClassicTimesheet.vue'
import { useAttendanceTimesheetMainStore } from './timesheet/stores/attendanceTimesheetMainStore'
import { useCalendarStore } from './timesheet/stores/calendar'
import { Service } from '../Service/Service'
import EmployeeList from './timesheet/components/EmployeeList.vue';
import MopRegularization from './timesheet/components/MopRegularization.vue'
import MipRegularization from './timesheet/components/MipRegularization.vue';
import LcRegularization from './timesheet/components/LcRegularization.vue';
import EgRegularization from './timesheet/components/EgRegularization.vue';
import ViewSelfieImage from './timesheet/components/ViewSelfieImage.vue'
import LeaveApply from '../leave_module/leave_apply/LeaveApply.vue'



import dayjs from 'dayjs';
import { onMounted, ref } from 'vue';
import LoadingSpinner from '../../components/LoadingSpinner.vue'
// LoadingSpinnerVue

const useTimesheet = useAttendanceTimesheetMainStore()
const useCalendar = useCalendarStore()
const teamList = ref()
const orgList = ref()
const service = Service()

const teamListLength = ref(0);
const orgListLength = ref(0);

onMounted(async() => {
    Service()

    await useTimesheet.getTeamList(service.current_user_code).then(res => {
        teamList.value = Object.values(res.data)
        teamListLength.value = res.data.length
    })
    await useTimesheet.getSelectedEmployeeAttendance()

    // setTimeout(() => {
    //     useTimesheet.getTeamList(service.current_user_code).then(res => {
    //         teamList.value = Object.values(res.data)
    //         teamListLength.value = res.data.length
    //     })
    // }, 3000);

    useTimesheet.getOrgList().then(res => {
        orgList.value = Object.values(res.data)
        orgListLength.value = res.data.length

    })

    // setTimeout(() => {
    //     useTimesheet.getSelectedEmployeeAttendance()
    // }, 600);


})

const emp = ref([
    {
        date: "2023-06-02 12:00",
        absent_status: null,
        attendance_mode_checkin: "web",
        attendance_mode_checkout: "mobile",
        checkin_time: "22:09:40",

    },
])
</script>


<style>
.textColor
{
    color: #003056;
}

/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active
{
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to
{
    opacity: 0;
}

.page-content
{
    padding: calc(20px + 1.5rem) calc(1.5rem / 2) 50px calc(1.5rem / 2);
}
</style>
