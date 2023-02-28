<template>
    <Toast />
    <div class="modal-body  new-role-header border-0 ">
        <div id="modal_request_leave" class="card top-line mb-0">
            <div class="card-body">
        <h6 class="modal-title mb-6  fs-21">
            Leave Request</h6>
                <div class="row ">
                    <div class="col-md-7 col-sm-12" >


                        <div class="row mb-3">
                            <div class="col-md-4 col-sm-4 mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Choose Leave Type <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-7 col-sm-7  mb-md-0 mb-3">
                                <div class="form-group">

                                    <select style="  height: 38px;font-weight: 500;" name="" id="leave_type_id" class="form-select outline-none" v-model="leave_data.selected_leave" @change="Permission">
                                        <option>Select</option>
                                        <option >Sick Leave / Casual Leave</option>
                                        <option >Maternity Leave</option>
                                        <option >Paternity Leave</option>
                                        <option >On Duty</option>
                                        <option >Permission</option>
                                        <option >Compensatory Off</option>
                                        <!-- <option v-for="Leave_type in leave_type" :key="Leave_type">
                                        {{ Leave_type }}</option> -->


                                    </select>


                                </div>
                            </div>
                        </div>
                        <div v-if="TotalNoOfDays" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">No of Days<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-8  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave" id="" value="full_day" v-model="leave_data.full_day" @click="full_day">
                                        <label class="form-check-label leave_type ms-3" for="">Full Day</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input  style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave" id="" value="half_day" v-model="leave_data.half_day" @click="half_day">
                                        <label class="form-check-label leave_type ms-3" for="">Half Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input  style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="leave" id="" value="custom" v-model="leave_data.custom" @click="custom_day" >
                                        <label class="form-check-label leave_type ms-3" for="">Custom</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Full Day -->
                        <div v-if="full_day_format" class="row mb-4">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Date<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-7  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Calendar inputId="icon" v-model="leave_data.date" dateFormat="yy-mm-dd" :showIcon="true" style="width: 350px;" />


                                </div>
                            </div>
                        </div>


                        <!-- Half day leave -->
                        <div v-if="half_day_format"  class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Session<span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-8  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="session" id="" value="forenoon" >
                                        <label class="form-check-label leave_type ms-3" for="">Forenoon</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input  style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="session" id="" value="afternoon" >
                                        <label class="form-check-label leave_type ms-3" for="">Afternoon</label>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <!-- Custom Leave -->
                        <div v-if="custom_format"  class="row mb-3">
                            <div class="col-md-4 col-sm-4 mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">


                                        <label for="" class="float-label">Start Date</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" v-model="leave_data.custom_start_date"
                                        :disabledDates="invalidDates" :disabledDays="[0,6]" :manualInput="true" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2  mb-md-0 mb-3 ms-5 ">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label ">Total Days</label>
                                        <InputText style="width: 60px;text-align: center;" class="form-onboard-form form-control  textbox  capitalize " type="text"
                                        v-model="leave_data.custom_total_days"
                                         />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3 ">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End Day</label>
                                        <Calendar inputId="icon" @date-select="dayCalculation" dateFormat="yy-mm-dd" :showIcon="true" v-model="leave_data.custom_end_date"  />

                                    </div>
                                </div>
                            </div>

                            </div>

                        <!-- Permisson -->

                        <div v-if="Permission_format" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Start time</label>
                                        <span class=" p-input-icon-right">
                                            <Calendar inputId="time12" v-model="leave_data.permission_start_time" :timeOnly="true" hourFormat="12" icon="your-icon" />
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
                                           style="width: 67px;text-align: center;" v-model="leave_data.permission_total_time" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End time</label>

                                        <span class=" p-input-icon-right">
                                            <Calendar inputId="time12" v-model="leave_data.permission_end_time" :timeOnly="true" hourFormat="12" icon="your-icon" @timeupdate="dayCalculation" />
                                            <i class="pi pi-clock" />
                                        </span>



                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--compensatory off  -->


                        <div v-if="compensatory_format" class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Worked Date <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                                <!-- <span>
                                                {{ leaved.array_leave_details['Compensatory Leave'] }}
                                                </span> -->

                            <div class="col-md-7  mb-md-0 mb-3">
                                <div class="form-group">

                                    <select style="  height: 38px;font-weight: 500;" name="" id="leave_type_id" class="form-select outline-none" >
                                        <option v-for="leaved in leave_Data" :key="leaved.array_leave_details">
                                            <input type="checkbox" name="" id="red">

                                        </option>
                                    </select>
                                    <p style="opacity: 50%;">(note:Worked dates will get expired after 60 days)</p>


                                </div>
                           </div>
                           <div   class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label">Start Date</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3  mb-md-0 mb-3 ms-5 ">
                                <div class="form-group">
                                    <div class="floating">

                                        <label for="" class="float-label ms-10">Total Days</label>
                                        <InputText style="width: 60px" class="form-onboard-form form-control  textbox  capitalize " type="text"
                                         />

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4  mb-md-0 mb-3 ">
                                <div class="form-group">

                                    <div class="floating">

                                        <label for="" class="float-label">End Day</label>
                                        <Calendar inputId="icon" dateFormat="yy-mm-dd" :showIcon="true" />

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
                            <div class="col-md-7  mb-md-0 mb-3">
                                <div class="form-group">

                                    <select style="height: 38px;font-weight: 500;" name="" id="leave_type_id" class="form-select outline-none">
                                        <option value="" selected>Select
                                        </option>


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4  mb-md-0 mb-3">
                                <div class="form-group">
                                    <label for="">Reason <span class="text-danger">*</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-8  mb-md-0 mb-3">
                                <div class="form-group">
                                    <Textarea :autoResize="true" rows="3" cols="47" placeholder="Enter the Reason" />
                                </div>
                            </div>
                        </div>
                        </div>

                    <div class="col-md-5 ">
                        <div class="col-md mb-6 n-m-2 ">
                                <div class="form-group">
                                    <Calendar :inline="true" :showWeek="true" />
                                   </div>
                            </div>


                        <div class="text-center ">
                            <button type="button" class="btn btn-border-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="btn_request_leave" class="btn btn-primary ms-4" >Request
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
import axios from "axios";
import { useToast } from "primevue/usetoast"



const leave_Data=ref()
const toast = useToast();
let today = new Date();
// let month = today.getMonth();
// let year = today.getFullYear()


onMounted(() => {

leave_data.custom_start_date= new Date().toJSON().slice(0, 10);
leave_data.permission_start_time=new Date().toLocaleTimeString()
console.log(leave_data.custom_start_date);
console.log(new Date().toLocaleDateString());

let url_org_leave = window.location.origin + '/fetch-org-leaves-balance';

console.log("Fetching ORG LEAVE from url : "+url_org_leave);

//leaves.value = values().data;
//console.log("Ref data : "+JSON.stringify(values().data));

axios.get(url_org_leave).then((response) => {

        // leaves.value =Object.values(response.data)
        // leave_type.value=Object.values(response.data.leave_types)
        // leave_Data.value=response.data.employees
        // console.log(leave_Data.value);
});


});



const leave_data=reactive({

    selected_leave:'',
    date:'',
    full_day:'',
    half_day:'',
    custom:'',
    custom_start_date:'',
    custom_end_date:'',
    custom_total_days:'',
    permission_start_time:'',
    permission_total_time:'',
    permission_end_time:''

})

const TotalNoOfDays=ref(true)
const full_day_format=ref(true)
const half_day_format=ref(false)
const custom_format=ref(false)
const Permission_format=ref(false)
const compensatory_format=ref(false)
const invalidDates = ref();


let invalidDate = new Date();
invalidDate.setDate(today.getDate() - 1);
invalidDates.value = [today, invalidDate];



const full_day=()=>{
    leave_data.full_day=='full_day' ? full_day_format.value=true : full_day_format.value=false
    full_day_format.value=true
    custom_format.value=false
    Permission_format.value=false
    half_day_format.value=false
    compensatory_format.value=false

}

const half_day=()=>{
    leave_data.half_day=='half_day'? half_day_format.value=true :half_day_format.value=false
    custom_format.value=false
    Permission_format.value=false
    full_day_format.value=false
    compensatory_format.value=false
    half_day_format.value=true
}
const custom_day=()=>{
    leave_data.custom=='custom'? custom_format.value=true : custom_format.value=false
    custom_format.value=true
    Permission_format.value=false
    half_day_format.value=false
    full_day_format.value=false
    compensatory_format.value=false

    }
    const dayCalculation=()=>{
    if(custom_format.value==true){
    if(leave_data.custom_start_date.length<0 || leave_data.custom_start_date==''){
        toast.add({severity:'info', summary: 'Info Message', detail:'Select Start date', life: 3000});
    }
    }
     if(Permission_format.value==true){
    if(leave_data.permission_start_time<0 || leave_data.permission_start_time==''){
        toast.add({severity:'info', summary: 'Info Message', detail:'Select Start Time', life: 3000});
    }
  }


    console.log(leave_data.custom_start_date);
    console.log(leave_data.custom_end_date);
    var date1 = new Date(leave_data.custom_start_date);
    var date2 = new Date(leave_data.custom_end_date);

    var time1=new Date(leave_data.permission_start_time)
    var time2=new Date(leave_data.permission_end_time)
    var Hour_Difference_for_Permission =time2.getHours()-time1.getHours()
    console.log("Total hours"+""+Hour_Difference_for_Permission);
    leave_data.permission_total_time=Hour_Difference_for_Permission


    // To calculate the time difference of two dates
    var Difference_In_Time = date2.getTime() - date1.getTime();
    console.log(Difference_In_Time);

    // To calculate the no. of days between two dates
    var Difference_In_Days = Difference_In_Time /  (1000 * 60 * 60 * 24); ;
    var total_days=Difference_In_Days
    leave_data.custom_total_days=total_days
    console.log(leave_data.custom_total_days);


    // Validation for End Date and time



    }
const Permission=()=>{
    // leave_data.selected_leave=='Permission' ? Permission_format.value=true:Permission_format.value=false
    // leave_data.selected_leave=='Compensatory Off'  ?  compensatory_format.value=true : compensatory_format.value=false

    // full_day_format.value=false
    // half_day_format.value=false
    // custom_format.value=false

    if(leave_data.selected_leave=='Permission'){
        Permission_format.value=true
        TotalNoOfDays.value=false
       half_day_format.value=false
       custom_format.value=false
       compensatory_format.value=false
    }else
    if(leave_data.selected_leave=='Compensatory Off'){
       compensatory_format.value=true
       Permission_format.value=false
       full_day_format.value=false
       half_day_format.value=false
       custom_format.value=false
       TotalNoOfDays.value=false
    }else
    if(leave_data.selected_leave=='Select'){
        compensatory_format.value=false
        Permission_format.value=false
        full_day_format.value=true
       half_day_format.value=false
       custom_format.value=false
       TotalNoOfDays.value=true

    }
    else{
        Permission_format.value=false
        compensatory_format.value=false
    }
}





</script>



<style>

label{
    font-size: 15px;
font-weight: 502;
}
.leave_type{
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
  .p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-year, .p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-month {
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
  .p-button:enabled:hover {
    background: #002f56;
    color: #ffffff;
    border-color: none;
  }
</style>
