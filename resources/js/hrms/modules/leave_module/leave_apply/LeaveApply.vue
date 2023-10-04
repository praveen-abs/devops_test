<template>
    <Toast />
    <Button label="Apply Leave" class="p-3 border-0 outline-none font-medium text-[2px] bg-black" @click="service.leaveApplyDailog = true" />
    <!-- <Transition name="modal" >
        <ABS_loading_spinner v-if="service.data_checking" />
    </Transition> -->
    <Dialog header="Header" v-model:visible="service.data_checking" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>
    <Dialog header="Header" v-model:visible="service.Email_Service" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">

        <template #header>
            <h5 class="m-auto">Leave applied Successfully</h5>
        </template>
        <template #footer>
            <div class="text-center">
                <Button label="OK" style="justify-content: center;" severity="help" @click="service.ReloadPage" raised
                    class="justify-content-center" />
            </div>
        </template>
    </Dialog>
    <Dialog header="Header" v-model:visible="service.Email_Error" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">

        <template #header>
            <h5 class="m-auto"> {{ service.leave_data.leave_request_error_messege }}</h5>
        </template>
        <template #footer>
            <div class="text-center">
                <Button label="OK" style="justify-content: center;" severity="help" @click="service.Email_Error = false"
                    raised class="justify-content-center" />
            </div>
        </template>
    </Dialog>


    <!-- Leave apply dailog -->


    <Dialog v-model:visible="service.leaveApplyDailog" :style="{ width: '80vw' }" :breakpoints="{ '960px': '75vw', '641px': '100vw' }">
        <template #header>
            <h6 class="mb-4 modal-title fs-21">
                Leave Request</h6>
    </template>


        <!-- Select leave type Dropdown -->

        <div class="row ">
            <div class="col-md-7 col-sm-12">
                <div class="mb-3 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                        <label for="">Choose Leave Type <span class="text-danger">*</span> </label>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0">
                        <div class="form-group">
                            <Dropdown  @change="service.Permission" style="  height: 38px;font-weight: 500;"
                                class="w-full" v-model="service.leave_data.selected_leave" :options="service.leave_types"
                                optionLabel="leave_type" optionValue="leave_type" placeholder="Select Leave Type" :class="[
                                    v$.selected_leave.$error ? 'p-invalid' : '',
                                ]" />
                            <span v-if="v$.selected_leave.$error" class="font-semibold text-red-400 fs-6">
                                {{ v$.selected_leave.required.$message.replace( "Value", "Leave Type"  )}}
                            </span>

                        </div>
                    </div>
                </div>

                <!-- Select Leave Duration Radio Buttons -->


                <div v-if="service.TotalNoOfDays" class="mb-3 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">

                        <label for="">No of Days<span class="text-danger">*</span>
                        </label>


                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-6 mb-md-0">
                        <div class="form-check form-check-inline">
                            <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                id="full_day" value="full_day" v-model="service.leave_data.radiobtn_full_day"
                                @click="service.full_day">
                            <label class="form-check-label leave_type ms-2" for="full_day">Full Day</label>

                        </div>
                        <div class="form-check form-check-inline">
                            <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                id="half_day" value="half_day" v-model="service.leave_data.radiobtn_half_day"
                                @click="service.half_day">
                            <label class="form-check-label leave_type ms-2" for="half_day">Half Day</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave"
                                id="custom" value="custom" v-model="service.leave_data.radiobtn_custom"
                                @click="service.custom_day">
                            <label class="form-check-label leave_type ms-2" for="custom">Custom</label>
                        </div>
                    </div>
                </div>

                <!-- Full Day -->

                <div v-if="service.full_day_format" class="mb-3 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                        <label for="">Date<span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0">
                        <Calendar inputId="icon" v-model="service.leave_data.full_day_leave_date" dateFormat="dd-mm-yy"
                            :showIcon="true" style="width: 350px;"  :class="[
                                f$.full_day_leave_date.$error ? 'p-invalid' : '',
                            ]" />
                        <span v-if="f$.full_day_leave_date.$error" class="font-semibold text-red-400 fs-6">
                            {{ f$.full_day_leave_date.required.$message.replace( "Value", "Date"  ) }}
                        </span>
                    </div>
                </div>


                <!-- Half day leave -->


                <div v-if="service.half_day_format" class="mb-3 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                        <label for="">Date<span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0">
                        <Calendar inputId="icon" v-model="service.leave_data.half_day_leave_date" dateFormat="dd-mm-yy"
                            :showIcon="true" style="width: 350px;" :class="[
                                h$.half_day_leave_date.$error ? 'p-invalid' : '',
                            ]" />
                        <span v-if="h$.half_day_leave_date.$error" class="font-semibold text-red-400 fs-6">
                            {{ h$.half_day_leave_date.required.$message.replace( "Value", "Date"  )}}

                        </span>
                    </div>
                </div>

                <div v-if="service.half_day_format" class="mb-3 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                        <div class="form-group">
                            <label for="">Session<span class="text-danger">*</span>
                            </label>

                        </div>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-7 mb-md-0 ms-6">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                    name="session" id="forenoon" value="forenoon"
                                    v-model="service.leave_data.half_day_leave_session" :class="[
                                        h$.half_day_leave_session.$error ? 'p-invalid' : '',
                                    ]" />

                                <label class="form-check-label leave_type ms-3" for="forenoon">Forenoon</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                    name="session" id="afternoon" value="afternoon"
                                    v-model="service.leave_data.half_day_leave_session" :class="[
                                        h$.half_day_leave_session.$error ? 'p-invalid' : '',
                                    ]" />
                                <label class="form-check-label leave_type ms-3" for="afternoon">Afternoon</label>
                            </div>
                            <div v-if="h$.half_day_leave_session.$error" class="font-semibold text-red-400 fs-6">
                                {{ h$.half_day_leave_session.required.$message.replace( "Value", "Session "  )}}
                            </div>


                        </div>
                    </div>

                </div>

                <!-- Custom Leave -->



                <div v-if="service.custom_format" class="mb-3 row ">
                    <div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0">
                        <div class="form-group">
                            <div class="floating">


                                <label for="" class="float-label">Start Date</label><br>
                                <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                    v-model="service.leave_data.custom_start_date" :minDate="first_day_of_the_month"
                                    :manualInput="true" :class="[
                                        c$.custom_start_date.$error ? 'p-invalid' : '',
                                    ]" />
                                <span v-if="c$.custom_start_date.$error" class="font-semibold text-red-400 fs-6">
                                    {{ c$.custom_start_date.required.$message.replace( "Value", "Start Date "  ) }}
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0">
                        <div class="form-group">
                            <div class="floating" style="text-align: center;">

                                <label for="" class="float-label ">Total Days</label>
                                <InputText style="width: 60px;text-align: center;margin: auto;"
                                    class="capitalize form-onboard-form form-control textbox " type="text"
                                    v-model="service.leave_data.custom_total_days" readonly />

                            </div>

                        </div>
                    </div>
                    <div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0">
                        <div class="form-group">

                            <div class="floating">

                                <label for="" class="float-label">End Day</label><br>
                                <Calendar inputId="icon" @date-select="service.dayCalculation" dateFormat="dd-mm-yy"
                                    :showIcon="true" v-model="service.leave_data.custom_end_date"
                                    :minDate="first_day_of_the_month" :class="[
                                        c$.custom_end_date.$error ? 'p-invalid' : '',
                                    ]" />
                                <span v-if="c$.custom_end_date.$error" class="font-semibold text-red-400 fs-6">
                                    {{ c$.custom_end_date.required.$message.replace( "Value", "End Date "  ) }}
                                </span>

                            </div>
                        </div>
                    </div>

                </div>


                <!-- Permisson -->

                <div v-if="service.Permission_format" class="mb-2 row">
                    <div  class="mb-3 row">
                        <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                            <label for="">Date<span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0">
                            <Calendar inputId="icon" v-model="service.leave_data.permission_date" dateFormat="dd-mm-yy"
                                :showIcon="true" style="width: 350px;" :maxDate="new Date()" :class="[
                                    p$.permission_date.$error ? 'p-invalid' : '',
                                ]" />
                            <span v-if="p$.permission_date.$error" class="font-semibold text-red-400 fs-6">
                                {{ p$.permission_date.required.$message.replace( "Value", "Date"  ) }}
                            </span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 mb-md-0">
                        <div class="form-group">
                            <div class="floating">

                                <label for="" class="float-label">Start time</label>
                                <span class=" p-input-icon-right"  >
                                    <Calendar inputId="time12" v-model="service.leave_data.permission_start_time"
                                        :timeOnly="true" hourFormat="12" icon="your-icon"  :class="[
                                            p$.permission_start_time.$error ? 'p-invalid' : '',
                                        ]" />
                                    <i class="pi pi-clock" />
                                </span>
                            </div>
                            <span v-if="p$.permission_start_time.$error" class="font-semibold text-red-400 fs-6">
                                {{ p$.permission_start_time.required.$message.replace( "Value", "Permission start time") }}
                            </span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-3 mb-md-0 ms-5">
                        <div class="form-group">
                            <div class="floating">

                                <label for="" class="float-label">Total Hour</label>
                                <InputText class="capitalize form-onboard-form form-control textbox " type="text"
                                    style="width: 67px;text-align: center;"
                                    v-model="service.leave_data.permission_total_time" readonly />

                            </div>

                        </div>
                    </div>
                    <div class="mb-3 col-md-4 mb-md-0">
                        <div class="form-group">

                            <div class="floating">

                                <label for="" class="float-label">End time</label>

                                <span class=" p-input-icon-right">
                                    <Calendar inputId="time12" v-model="service.leave_data.permission_end_time"
                                        :timeOnly="true" hourFormat="12" icon="your-icon"
                                        @date-select="service.time_difference" :class="[
                                            p$.permission_end_time.$error ? 'p-invalid' : '',
                                        ]" />
                                    <i class="pi pi-clock" />
                                </span>
                            </div>
                            <span v-if="p$.permission_end_time.$error" class="font-semibold text-red-400 fs-6">
                                {{ p$.permission_end_time.required.$message.replace( "Value", "Permission end time") }}
                            </span>
                        </div>
                    </div>

                </div>

                <!--compensatory off  -->

                <div v-if="service.compensatory_format" class="mb-2 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-5 col-xl-5 col-xxl-5 mb-md-0">
                        <label for="">Worked Date <span class="text-danger">*</span> </label>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 mb-md-0">

                        <MultiSelect v-model="service.leave_data.selected_compensatory_leaves"
                            :options="service.leave_data.compensatory_leaves" optionLabel="emp_attendance_date"
                            placeholder="Select worked Date" display="chip" class="w-full md:w-full" :maxSelectedLabels="5"
                            :class="[
                                        cp$.selected_compensatory_leaves.$error ? 'p-invalid' : '',
                                    ]" >


                        <template #footer>
                            <div class="px-3 py-2">
                                <b>{{ service.leave_data.selected_compensatory_leaves ?
                                    service.leave_data.selected_compensatory_leaves.length : 0 }}</b> Date{{
                                (service.leave_data.selected_compensatory_leaves ?
                                service.leave_data.selected_compensatory_leaves.length : 0) > 1 ? 's' : '' }} selected.
                            </div>
                        </template>
                        </MultiSelect>
                        <p class="opacity-50 fs-10">(note:Worked dates will get expired after 60 days)</p>
                        <span v-if="cp$.selected_compensatory_leaves.$error" class="font-semibold text-red-400 fs-6">
                            {{ cp$.selected_compensatory_leaves.required.$message.replace( "Value", "Compensatory Working Date's ")}}
                        </span>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mb-md-0 ">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <label for="" class="float-label">Start Date</label>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                v-model="service.leave_data.compensatory_start_date" :minDate="first_day_of_the_month" :class="[
                                        cp$.compensatory_start_date.$error ? 'p-invalid' : '',
                                    ]" />
                                <span v-if="cp$.compensatory_start_date.$error" class="font-semibold text-red-400 fs-6">
                                    {{ cp$.compensatory_start_date.required.$message.replace( "Value", "Start Date "  )}}
                                </span>
                        </div>
                    </div>

                    <div class="mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0">
                        <div class="form-group">
                            <div class="floating" style="text-align: center;">

                                <label for="" class="float-label ">Total Days</label>
                                <InputText style="width: 60px;text-align: center;margin: auto;"
                                    class="capitalize form-onboard-form form-control textbox " type="text"
                                    v-model="service.leave_data.compensatory_total_days" readonly :class="[
                                        cp$.compensatory_total_days.$error ? 'p-invalid' : '',
                                    ]" />
                                <span v-if="cp$.compensatory_total_days.$error" class="font-semibold text-red-400 fs-6">
                                    {{ cp$.compensatory_total_days.required.$message.replace( "Value", "Value not lesser than zero" )}}
                                </span>

                            </div>

                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <label for="" class="float-label">End Day</label>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <Calendar @date-select="service.dayCalculation" inputId="icon" dateFormat="dd-mm-yy"
                                :showIcon="true" v-model="service.leave_data.compensatory_end_date"
                                :minDate="first_day_of_the_month" :class="[
                                        cp$.compensatory_end_date.$error ? 'p-invalid' : '',
                                    ]" />
                                <span v-if="cp$.compensatory_end_date.$error" class="font-semibold text-red-400 fs-6">
                                    {{ cp$.compensatory_end_date.required.$message.replace( "Value", "End Date "  )}}
                                </span>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                        <div class="form-group">
                            <label for="">Notify to <span class="text-danger">*</span>
                            </label>

                        </div>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0">
                        <div class="form-group">
                            <Chips class="lg:w-1em " v-model="service.leave_data.notifyTo" separator="," />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row ">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0">
                        <div class="form-group">
                            <label for="">Reason <span class="text-danger">*</span>
                            </label>

                        </div>
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0">
                        <div class="form-group">
                            <Textarea :autoResize="true" rows="3" cols="90" placeholder="Enter the Reason"
                                v-model="service.leave_data.leave_reason" class="form-control" :class="[
                                    r$.leave_reason.$error ? 'p-invalid' : '',
                                ]" />
                            <span v-if="r$.leave_reason.$error" class="font-semibold text-red-400 fs-6">
                                {{ r$.leave_reason.required.$message.replace( "Value", "Leave Reason"  )}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 col-sm-12 ">
                <div class="col-lg-12 col-md-12 ">
                    <Calendar :inline="true" :showWeek="true" style="min-width:100%" />
                </div>
                <div class="mt-6 text-center ">
                    <button type="button" class="btn btn-border-primary" @click="service.leaveApplyDailog = false">Cancel</button>
                    <button type="button" id="btn_request_leave" class="btn btn-primary ms-4" @click="submitForm">
                        Request Leave</button>
                </div>
            </div>
        </div>



        <Dialog :style="{ width: '450px' }" header="Required" :modal="true" v-model:visible="service.RequiredField"
            v-if="service.leave_data.leave_reason == ''">
            <li v-if="service.leave_data.leave_reason == ''">Leave Reason</li>
        </Dialog>
    </Dialog>

</template>


<script setup>



import { computed, inject, onMounted, reactive, ref } from "vue";
import ABS_loading_spinner from "../../../components/ABS_loading_spinner.vue";
import axios from "axios";
import useValidate from '@vuelidate/core'
import { required, email, minLength, sameAs, helpers } from '@vuelidate/validators'

import { useLeaveService } from './leave_apply_service';
import { useAttendanceTimesheetMainStore } from "../../attendence/timesheet/stores/attendanceTimesheetMainStore";

const visible = ref(false)
const leave_types = ref();

const AttendanceTimesheetMainStore =useAttendanceTimesheetMainStore();

//get first day of current month

var date = new Date();
var first_day_of_the_month = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);


// Check All Varaibles and Events Here
const service = useLeaveService()


onMounted(() => {

    service.get_user()
    service.get_leave_types()
    service.leave_data.custom_start_date = new Date()
    service.leave_data.permission_start_time = new Date();

    console.log( "AttendanceTimesheetMainStore ::",AttendanceTimesheetMainStore.CurrentlySelectedUser);


});


const rules = computed(() => {
    return {
        selected_leave: { required },

    }
}

)

const full_day_rules = computed(() => {
    return {
        full_day_leave_date: { required },
    }
})

const half_day_rules = computed(() => {
    return {
        half_day_leave_date: { required },
        half_day_leave_session: { required },
    }
})
const custom_day_rules = computed(() => {
    return {
        custom_start_date: { required },
        custom_end_date: { required },
    }
})
const reason_rules = computed(() => {
    return {
        leave_reason: { required },
    }
})


 const permissionRules = computed(() => {
    return {
        permission_date: { required },
        permission_start_time: { required },
        permission_total_time: { required },
        permission_end_time: { required },
    }
})

const compNegative = (value) =>{
    if(value < 0){
        return false
    }else{
        return true
    }
}
const compen_day_rules = computed(() => {
    return {
        selected_compensatory_leaves: { required },//This refers to comp days selected in dropdown
        compensatory_start_date: { required },
        compensatory_total_days: {required, compNegative:helpers.withMessage('days not lesser than zero',compNegative)  },
        compensatory_end_date: { required },

    }
})
const f$ = useValidate(full_day_rules, service.leave_data)
const h$ = useValidate(half_day_rules, service.leave_data)
const c$ = useValidate(custom_day_rules, service.leave_data)
const cp$ = useValidate(compen_day_rules, service.leave_data)
const r$ = useValidate(reason_rules, service.leave_data)
const p$ = useValidate(permissionRules,service.leave_data)

const v$ = useValidate(rules, service.leave_data)

const submitForm = () => {
    v$.value.$validate() // checks all inputs

    if (!v$.value.$error) {
        // if ANY fail validation
        console.log(service.leave_data.selected_leave);

        if(service.leave_data.selected_leave.includes('Compensatory')){
        cp$.value.$validate()
        if (!cp$.value.$error) {
            // if ANY fail validation
            r$.value.$validate()
            if (!r$.value.$error) {
                service.Submit()
                r$.value.$reset()
                cp$.value.$reset()
                v$.value.$reset()

            }

            console.log('Form successfully submitted.')
        } else {
            console.log('Form failed validation')
        }
       }

    if (service.leave_data.radiobtn_full_day == "full_day") {
        f$.value.$validate()
        // f$.value.$reset()

        if (!f$.value.$error) {
            // if ANY fail validation
            r$.value.$validate()
            if (!r$.value.$error) {
                service.Submit()
                r$.value.$reset()
                f$.value.$reset()
                v$.value.$reset()

            }
            console.log('Form successfully submitted.')
        } else {
            console.log('Form failed validation')
        }
    }
    if (service.leave_data.radiobtn_half_day == "half_day") {
        h$.value.$validate()
        if (!h$.value.$error) {
            // if ANY fail validation
            console.log('Form successfully submitted.')
            r$.value.$validate()
            if (!r$.value.$error) {
                service.Submit()
                r$.value.$reset()
                h$.value.$reset()
                v$.value.$reset()
            }
        } else {
            console.log('Form failed validation')
        }
    }
    if (service.leave_data.radiobtn_custom == "custom") {
        c$.value.$validate()

        if (!c$.value.$error) {
            // if ANY fail validation
            console.log('Form successfully submitted.')
            r$.value.$validate()
            if (!r$.value.$error) {
                service.Submit()
                r$.value.$reset()
                c$.value.$reset()
                v$.value.$reset()

            }
        } else {
            console.log('Form failed validation')
        }
    }
    if(service.leave_data.selected_leave.includes('Permission')){
        p$.value.$validate()

        if (!p$.value.$error) {
            r$.value.$validate()
            if (!r$.value.$error) {
             service.Submit()
             r$.value.$reset()
             p$.value.$reset()
             v$.value.$reset()

            }
        } else {
            console.log('Form failed validation')
        }

    }
    } else {
        console.log('Form failed validation')
    }

}

</script>



<style>
label {
    font-size: 15px;
    font-weight: 502;
}

.leave_type {
    font-size: 15px;
    font-weight: 400;
}


.p-datepicker .p-datepicker-header {
    padding: 0.5rem;
    color: #061328;
    background: #002f56;
    font-weight: 600;
    margin: 0;
    border-bottom: 1px solid #dee2e6;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}

.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-year,
.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-month {
    color: #fff;
    transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;
    font-weight: 600;
    padding: 0.5rem;
}

.p-datepicker:not(.p-datepicker-inline) .p-datepicker-header {
    background: #002f56;
    color: black;
}

.p-calendar-w-btn .p-datepicker-trigger {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    background: #002f56;
}

.p-dialog-mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
    background: #433f3f6b;
}

.p-button:enabled:hover {
    background: #002f56;
    color: #ffffff;
    border-color: none;
}

.p-multiselect.p-multiselect-chip .p-multiselect-token {
    padding: 0.2rem 0.55rem;
    margin-right: 0.5rem;
    background: #dee2e6;
    color: #495057;
    border-radius: 16px;
}

.p-checkbox .p-checkbox-box.p-highlight {
    border-color: #3B82F6;
    background: #103674;
}

.p-chips .p-chips-multiple-container {
    padding: 0.375rem 0.75rem;
}

.p-chips.p-component.p-inputwrapper {
    width: 100%;
}

.form-select:focus {
    border-color: #002f56;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 5%);
}

.form-control:focus {
    border-color: #002f56;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 5%);
}

.p-chips-multiple-container {
    margin: 0;
    padding: 0;
    list-style-type: none;
    cursor: text;
    overflow: hidden;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
}

/*.p-dialog.p-component:before {
    content: "";
    background: #002f56;
    height: 8px;
    border-radius: 50px 50px 0px;
    position: relative;
    top: 3px;
}*/
</style>
