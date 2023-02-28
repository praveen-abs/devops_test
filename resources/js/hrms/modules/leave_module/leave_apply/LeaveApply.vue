<template>
    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
        <h6 class="modal-title mb-1 text-primary">
            Leave Request</h6>
        <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="modal_request_leave" class="card top-line mb-0">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-7 col-sm-12" style="border: 1px solid black;">

                        <div class="row mb-3">
                            <div class="col-md-12 text-md-start mb-md-0 mb-3">
                                <h6 class=" mb-1">Leave Type</h6>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Choose Leave Type <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">

                                    <select v-model="leave_data.selected_leave" name="" id="leave_type_id" class="form-select outline-none">
                                        <option value="" selected>Select Leave Type
                                        </option>
                                        <option value="" v-for="leaves in  leave_type" :key="leaves">
                                            {{ leaves }}
                                        </option>


                                    </select>
                                    <button @click="test">test</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">No of Days<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-9  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="leave" id="" value="{3:option1}" v-model="leave_data.full_day">
                                        <label class="form-check-label" for="">Full Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="leave" id="" value="option2" v-model="leave_data.half_day">
                                        <label class="form-check-label" for="">Half Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="leave" id="" value="option3" v-model="leave_data.custom" >
                                        <label class="form-check-label" for="">Custom</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Full Day -->
                        <div class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Date<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-9  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />


                                </div>
                            </div>
                        </div>


                        <!-- Half day leave -->
                        <div v-if="false" class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Session<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-9  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="" id="" value="{3:option1}">
                                        <label class="form-check-label" for="">Full Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="" id="" value="option2">
                                        <label class="form-check-label" for="">Half Day</label>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <!-- Custom Leave -->
                        <div v-if="false" class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Start Date</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Total Days</label>
                                        <InputText class="form-onboard-form form-control  textbox  capitalize " type="text"
                                            placeholder="Employee Code" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End Day</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Permisson -->

                        <div v-if="false" class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Start time</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Total Hour</label>
                                        <InputText class="form-onboard-form form-control  textbox  capitalize " type="text"
                                            placeholder="Employee Code" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End time</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Notify to <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">

                                    <select name="" id="leave_type_id" class="form-select outline-none">
                                        <option value="" selected>Select
                                        </option>


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Reason <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Textarea :autoResize="true" rows="5" cols="30" />


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">

                        <Calendar :inline="true" :showWeek="true" />
                        <div class="text-center text-md-end">
                            <button type="button" class="btn btn-border-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="btn_request_leave" class="btn btn-primary">Request
                                Leave</button>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</template>


<script setup>



import { onMounted, reactive, ref } from "vue";

// const selected_leave=ref()
// const full_day=ref()
// const half_day=ref()
// const custom=ref()


const leave_data=reactive({
    selected_leave:"",
    full_day:'',
    half_day:"",
    custom:""
})


const leave_type=ref([
    "Sick Leave / Casual Leave",
    "Maternity Leave",
    "Paternity Leave",
    "On Duty",
    "Permission",
    "Compensatory Off"
])

const test=()=>{
//     console.log(selected_leave);
// console.log(full_day)
// console.log(half_day);
// console.log(custom);
console.log(leave_data);
}


</script>
