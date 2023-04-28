<template>
    <div class="w-full">
        <div class="mx-auto card top-line">
            <div class="mx-auto card-body">
                <div>
                    <h3 class="mx-2 my-2 font-semibold">Leave Type</h3>
                </div>
                <div class="row">
                    <button id="box"
                        class="p-1 mx-3 my-4 border-2 rounded-lg shadow-md col-lg-3 left-line col-md-3 col-xl-2 hover:bg-slate-100 focus:bg-green-100 active:bg-green-200" 
                        @click="check(leaves)" v-for="(leaves) in useStore.leave_types" :key="leaves.id">
                        <p class="text-lg font-semibold text-center ">{{ leaves.leave_type }}</p>
                        <p class="my-3 text-xl font-bold text-center">{{ leaves.days_monthly }} <span>days</span></p>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur, .</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="mx-auto my-4 card top-line">
            <div class="card-body row">
                <div class="col-6 border-1">
                    <div>
                        <h3 class="mx-2 my-4 font-semibold">Set Range</h3>
                    </div>
                    <div class="mx-1 my-2 mb-3 row">
                        <div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0">
                            <div class="form-group">
                                <div class="floating">

                                    <label for="start" class="my-2 text-gray-700 float-label">Start Date</label><br>
                                    <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true" id="start"
                                        v-model="useStore.leave_data.custom_start_date" :minDate="new Date()"
                                        :manualInput="true" />

                                </div>

                            </div>
                        </div>
                        <div class="mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0">
                            <div class="form-group">
                                <div class="floating" style="text-align: center;">

                                    <label for="total" class="my-2 text-gray-700 float-label">Total Days</label>
                                    <InputText style="width: 60px;text-align: center;margin: auto;" id="total"
                                        class="capitalize form-onboard-form form-control textbox " type="text"
                                        v-model="useStore.leave_data.custom_total_days" readonly />

                                </div>

                            </div>
                        </div>
                        <div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0">
                            <div class="form-group">

                                <div class="floating">

                                    <label for="end" class="my-2 text-gray-700 float-label">End Day</label><br>
                                    <Calendar inputId="icon" @date-select="useStore.dayCalculation" dateFormat="dd-mm-yy"
                                        :showIcon="true" v-model="useStore.leave_data.custom_end_date" id="end"
                                        :minDate="new Date()" />

                                </div>
                            </div>
                        </div>
                        <div class="my-4 row">
                            <div class="">
                                <div class="form-group">
                                    <Textarea :autoResize="true" rows="3" cols="90" placeholder="Enter the Reason"
                                        v-model="useStore.leave_data.leave_reason" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <h3 class="mx-2 my-2 font-semibold">Notify To</h3>
                        </div>
                        <div class="row">
                            <div class="p-1 mx-3 my-4 border-2 rounded-lg shadow-md col-lg-3 left-line col-md-3 col-xl-2"
                                v-for="leaves in useStore.leave_types" :key="leaves.id">

                            </div>
                        </div>

                    </div>

                    <div class="mt-6 text-right">
                        <button type="button" class="btn btn-border-primary" @click="visible = false">Cancel</button>
                        <button type="button" id="btn_request_leave" class="mx-4 btn btn-primary "
                            :disabled="useStore.leave_data.selected_leave.length > 0 && useStore.leave_data.leave_reason ? false : true"
                            @click="useStore.Submit">
                            Request Leave</button>
                    </div>

                </div>
                <div class="col-6">
                    <Calendar :inline="true" :showWeek="true" style="min-width:100%" />
                </div>



            </div>


        </div>


{{ active }}

    </div>

    <!-- {{ useStore.leave_types }} -->
</template>

<script setup>

import { onMounted, ref } from 'vue'
import { Service } from '../leave_apply/leave_apply_service'

const useStore = Service()

onMounted(() => {
    useStore.get_leave_types()
})

const sickActive = ref(false) 
const earnActive = ref(false) 


const check = (a) => {
    console.log(a);
    let leave 

    switch (leave) {
        case "Sick Leave / Casual Leave":
            console.log("Sick");
            sickActive.value = true
            break;
        case "Earned Leave":
            console.log("Earned");
            earnActive.value = true
            break;
        case "Maternity Leave":
        console.log("Maternity");
        active.value = true
            break;
        case "Paternity Leave":
        active.value = true
        console.log("Paternity");
            break;
        case "On Duty":
        active.value = true
        console.log("earn");
            break;
        case "Compensatory Off":
        active.value = true
        console.log("Compensatory");
        active.value = true
            break;
        case "Permission":
        active.value = true
        console.log("Permission");

            break;

    }
}
</script>


<style>
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

.box:active {
    background: #000;
}
</style>