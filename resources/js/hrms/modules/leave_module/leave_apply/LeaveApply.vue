<template>
    <Toast />
    <Button label="Apply Leave" class="bg-orange-500 border-none h-3rem" @click="visible = true" />
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
<h5 class="m-auto"> Email sent Successfully</h5>
</template>
<template #footer>
    <div class="text-center">
        <Button label="OK" style="justify-content: center;" severity="help" @click="service.Email_Service = false" raised  class="justify-content-center"/>
    </div>
</template>
</Dialog>
<Dialog v-model:visible="visible"  :style="{ width: '80vw' }" :breakpoints="{ '960px': '75vw', '641px': '100vw' }">


                <h6 class="modal-title mb-6  fs-21">
                    Leave Request</h6>
                <div class="row ">
                    <div class="col-md-7 col-sm-12">


                        <div class="row mb-3">
                            <div class="col-md-4 col-sm-4 mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Choose Leave Type <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-7 col-sm-12  mb-md-0 mb-3">
                                <div class="form-group">



                                    <select style="  height: 38px;font-weight: 500;" name="" id="leave_type_id" aria-label="Default select example"
                                        class="form-select outline-none" v-model="service.leave_data.selected_leave"
                                        @change="service.Permission">
                                        <option v-for="leavetype in service.leave_types" :key="leavetype.id">
                                            {{ leavetype.leave_type }}</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div v-if="service.TotalNoOfDays" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">No of Days<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                            name="leave" id="" value="full_day" v-model="service.leave_data.radiobtn_full_day"
                                            @click="service.full_day">
                                        <label class="form-check-label leave_type ms-3" for="">Full Day</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                            name="leave" id="" value="half_day" v-model="service.leave_data.radiobtn_half_day"
                                            @click="service.half_day">
                                        <label class="form-check-label leave_type ms-3" for="">Half Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                            name="leave" id="" value="custom" v-model="service.leave_data.radiobtn_custom"
                                            @click="service.custom_day">
                                        <label class="form-check-label leave_type ms-3" for="">Custom</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Full Day -->
                        <div v-if="service.full_day_format" class="row mb-4">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Date<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-7  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Calendar inputId="icon" v-model="service.leave_data.full_day_leave_date" dateFormat="dd-mm-yy"
                                        :showIcon="true" style="width: 350px;"  :minDate="new Date()" />


                                </div>
                            </div>
                        </div>


                        <!-- Half day leave -->
                        <div v-if="service.half_day_format" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Session<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-8  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                            name="session" id="" value="forenoon" v-model="service.leave_data.half_day_leave_session">
                                        <label class="form-check-label leave_type ms-3" for="">Forenoon</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio"
                                            name="session" id="" value="afternoon"  v-model="service.leave_data.half_day_leave_session" >
                                        <label class="form-check-label leave_type ms-3" for="">Afternoon</label>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <!-- Custom Leave -->
                        <div v-if="service.custom_format" class="row mb-3 " >
                            <div class=" col-md-6 col-lg-5  col-sm-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">


                                        <label for="" class="float-label">Start Date</label><br>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            v-model="service.leave_data.custom_start_date"
                                            :disabledDates="service.invalidDates" :disabledDays="[0, 6]"
                                            :manualInput="true"  />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2 col-lg-3  mb-md-0 mb-3  ">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label ">Total Days</label>
                                        <InputText style="width: 60px;text-align: center;"
                                            class="form-onboard-form form-control  textbox  capitalize " type="text"
                                            v-model="service.leave_data.custom_total_days" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4  mb-md-0 mb-3 ">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End Day</label><br>
                                        <Calendar inputId="icon" @date-select="service.dayCalculation" dateFormat="dd-mm-yy"
                                            :showIcon="true" v-model="service.leave_data.custom_end_date" :minDate="new Date()"  />

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Permisson -->

                        <div v-if="service.Permission_format" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Start time</label>
                                        <span class=" p-input-icon-right">
                                            <Calendar inputId="time12" v-model="service.leave_data.permission_start_time"
                                                :timeOnly="true" hourFormat="12" icon="your-icon" />
                                            <i class="pi pi-clock" />
                                        </span>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3  mb-md-0 mb-3 ms-5">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Total Hour</label>
                                        <InputText class="form-onboard-form form-control  textbox  capitalize " type="text"
                                            style="width: 67px;text-align: center;"
                                            v-model="service.leave_data.permission_total_time" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End time</label>

                                        <span class=" p-input-icon-right">
                                            <Calendar inputId="time12" v-model="service.leave_data.permission_end_time"
                                                :timeOnly="true" hourFormat="12" icon="your-icon"
                                                @date-select="service.time_difference" />
                                            <i class="pi pi-clock" />
                                        </span>



                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--compensatory off  -->


                        <div v-if="service.compensatory_format" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Worked Date <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-7  mb-md-0 mb-3">
                                <div class="form-group">

                                    <select style="  height: 38px;font-weight: 500;" name="" id="leave_type_id"
                                        class="form-select outline-none">

                                    </select>
                                    <p style="opacity: 50%;">(note:Worked dates will get expired after 60 days)</p>


                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4  mb-md-0 mb-3">
                                    <div class="form-group">
                                        <div class="floating">

                                            <label for="" class="float-label">Start Date</label>
                                            <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true" style="z-index: 1300;" />

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3  mb-md-0 mb-3 ms-5 ">
                                    <div class="form-group">
                                        <div class="floating">

                                            <label for="" class="float-label ms-10">Total Days</label>
                                            <InputText style="width: 60px"
                                                class="form-onboard-form form-control  textbox  capitalize " type="text" />

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4  mb-md-0 mb-3 ">
                                    <div class="form-group">

                                        <div class="floating">

                                            <label for="" class="float-label">End Day</label>
                                            <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true" />

                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Notify to <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-8  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Chips class="   " v-model="service.leave_data.notifyTo" separator=","  />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 " >
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Reason <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-10 col-lg-6 col-sm-10  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Textarea :autoResize="true" rows="3" cols="60" placeholder="Enter the Reason"
                                        v-model="service.leave_data.leave_reason" />
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-5 col-sm-12 ">

                        <div class="col-12  ">
                            <Calendar :inline="true" :showWeek="true" style="min-width:100%" />

                        </div>


                        <div class="text-center mt-6 ">
                            <button type="button" class="btn btn-border-primary"  @click="visible = false">Cancel</button>
                            <button type="button" id="btn_request_leave" class="btn btn-primary ms-4" :disabled="service.leave_data.selected_leave.length>0 ? false : true"
                                @click="service.Submit">
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



import { onMounted, reactive, ref } from "vue";
import axios from "axios";

import {Service} from './leave_apply_service'

const visible=ref(false)

const leave_types=ref()

// Check All Varaibles and Events Here
const service = Service()

onMounted(() => {

    service.get_leave_types()
    service.leave_data.custom_start_date = new Date().toJSON().slice(0, 10);
    service.leave_data.permission_start_time = new Date()

});



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
}</style>
