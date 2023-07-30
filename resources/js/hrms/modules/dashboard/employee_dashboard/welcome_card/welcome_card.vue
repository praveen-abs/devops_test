<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8"  v-for="item in EmpDetials">
            <p class="text-sm text-gray-600 flex items-center">
                {{ current_session }}
            </p>
            <div class="text-gray-900 font-bold text-xl mb-2"> {{ service.current_user_name }}</div>
            <div class="flex my-2">
                <i class="fa fa-sun-o text-warning my-auto" aria-hidden="true"></i>
                <p class="fs-6 my-auto">General Shift</p>
                <label class="switch-checkbox f-12 text-muted mx-2">
                    <input type="checkbox" id="checkin_function" class="f-13 text-muted"
                        v-model="welcome_card.check" @change="getTime" />
                    <span class="slider-checkbox check-inw round">
                        <span class="slider-checkbox-text"> </span>
                    </span>
                </label>
            </div>
            <div >
                <p class="text-sm text-gray-600 flex items-center">
                    Time duration<span>90</span>
                </p>
            </div>
        </div>

    </div>
    <!-- {{ EmpDetials }} -->
    <!-- <div class="border-0 card w-100 box-shadow-md">
        <div class="card-body">
            <div class="row">
                <div class="col-9 col-sm-9 col-md-9 col-xl-9 col-lg-9 col-xxl-9" v-for="item in EmpDetials">
                    <p class="fw-bold f-18 text-blue-900" id="greeting_text">
                        {{ current_session }}
                    </p>
                    <p class="my-1 fw-bold fs-6 text-orange">
                        {{ service.current_user_name }}
                    </p>
                    <div class="my-2.5 flex">
                        <i class="fa fa-sun-o text-warning my-auto" aria-hidden="true"></i>
                        <p class="mx-2 fs-6 my-auto">General Shift</p>
                        <label class="switch-checkbox f-12 text-muted">
                            <input type="checkbox" id="checkin_function" class="f-13 text-muted"
                                v-model="welcome_card.check" @change="getTime" />
                            <span class="slider-checkbox check-inw round">
                                <span class="slider-checkbox-text"> </span>
                            </span>
                        </label>
                    </div>

                    <p v-if="item.checkin_time" class="f-12 text-muted  " style="width: 280px;" id="time_duration">
                        Check-in time:
                        {{ item.checkin_time }} &nbsp;Mode:<i class="text-green-800 font-semibold text-sm"
                        :class="findAttendanceMode(item.attendance_mode_checkin)"></i>
                    </p>
                    <p v-else class="f-12 text-muted" id="time_duration">
                        Check-in time:
                        {{ "--:--:--" }} &nbsp;
                    </p>

                    <p v-if="item.checkin_date" class="f-12 text-muted" id="time_duration">
                        Check-in date:
                        {{ item.checkin_date }}
                    </p>
                    <p v-else class="f-12 text-muted" id="time_duration">
                        Check-in date:
                        {{ "--:--:--" }}
                    </p>

                    <p v-if="item.checkout_time" class="f-12 text-muted" id="time_duration">
                        Check-out time:
                        {{ item.checkout_time }} &nbsp; Mode : <i class="text-green-800 font-semibold text-sm"
                        :class="findAttendanceMode(item.attendance_mode_checkout)"></i>
                    </p>
                    <p v-else class="f-12 text-muted" id="time_duration">
                        Check-out time:
                        {{ "--:--:--" }} &nbsp; Mode : {{ "--:--:--" }}
                    </p>
                    <p v-if="item.checkout_date" class="f-12 text-muted" id="time_duration">
                        Check-out date:
                        {{ item.checkout_date }}
                    </p>
                    <p v-else class="f-12 text-muted" id="time_duration">
                        Check-out date:
                        {{ "--:--:--" }}
                    </p>

                </div>
                <div class="col-3 col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3">
                    <img src="../../dashboard/girl_walk.jpg" class="" alt="girl-walk" style="height: 140px; width: 140px" />
                </div>
            </div>
        </div>
    </div> -->

    <Dialog v-model:visible="check_in_dailog" modal :style="{ width: '25vw' }">
        <div class="modal-content">
            <div class="p-1 text-center modal-body">
                <div class="check-in-animate">
                    <lord-icon src="https://cdn.lordicon.com/dcfqtwxe.json" trigger="loop" delay="2000" class="gliters"
                        colors="primary:#1aff1a,secondary:#1aff1a">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000" class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849">
                    </lord-icon>
                </div>
                <div class="mt-2">
                    <h4 class="mb-2">Welcome {{ service.current_user_name }}</h4>
                    <p class="mb-4 text-muted" v-if="checkInMessege">{{ checkInMessege }}</p>
                    <p class="mb-4 text-muted" v-else>Have a good day !</p>
                    <div class="gap-2 hstack justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal">
                            <button @click="check_in_dailog = false" type="button" class="btn btn-primary">
                                Close
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Dialog>
    <Dialog v-model:visible="check_out_dailog" modal :style="{ width: '25vw' }">
        <div class="modal-content">
            <div class="p-1 text-center modal-body">
                <div class="check-in-animate">
                    <lord-icon src="https://cdn.lordicon.com/dcfqtwxe.json" trigger="loop" delay="2000"
                        colors="primary:#ff3300,secondary:#ff3300" class="gliters">
                    </lord-icon>
                    <lord-icon src="https://cdn.lordicon.com/twopqjaj.json" trigger="loop" delay="2000" class="entry-man"
                        colors="primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00">
                    </lord-icon>
                </div>
                <div class="mt-4">
                    <h4 class="mb-3">Bye {{ service.current_user_name }}</h4>
                    <p class="mb-4 text-muted">See you tommorrow</p>
                    <div class="gap-2 hstack justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal">
                            <button type="button" class="btn btn-primary" @click="check_out_dailog = false">
                                Close
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Dialog>
</template>

<script setup>
import { onMounted, ref, reactive } from "vue";
import { Service } from "../../../Service/Service";
import { useMainDashboardStore } from "../../stores/dashboard_service";
import axios from "axios";

const service = Service();
const usedashboard = useMainDashboardStore();

const current_session = ref();
const current_user = ref();

const EmpDetials = ref([]);

const check_in_dailog = ref(false);
const check_out_dailog = ref(false);

const welcome_card = reactive({
    date: new Date(),
    check: "",
    check_in: "",
    check_out: "",
    attendance_mode: "web",
    work_mode: "",
    checked: false,
});

const getSession = () => {
    var today = new Date();
    var curHr = today.getHours();

    if (curHr < 12) {
        current_session.value = "Good Morning";
        // console.log('good morning')
    } else if (curHr < 18) {
        current_session.value = "Good Afternoon";
        // console.log('good afternoon')
    } else {
        current_session.value = "Good Evening";
        // console.log('good evening')
    }
};

async function gettime() {

}

const getTime = () => {
    EmpDetials.value.splice(0, EmpDetials.value.length)
    if (welcome_card.check == true) {
        welcome_card.check_in = new Date().toLocaleTimeString();
        welcome_card.checked = true;
        check_in_dailog.value = true;



    } else {
        welcome_card.check_out = new Date().toLocaleTimeString();
        check_out_dailog.value = true;
        welcome_card.checked = false;
    }

    usedashboard
        .updateCheckin_out({
            checked: welcome_card.checked,
        }).then((res => {
            checkInMessege.value = res.data.message
        }))
        .finally(() => {
            getEmployeeDetials();
            resetChars();
        });
};

const checkInMessege = ref()
const getEmployeeDetials = async () => {
    let url = "/fetchEmpLastAttendanceStatus";
    await axios.get(url).then((res) => {
        console.log(res.data);
        EmpDetials.value.push(res.data);
        if (res.data.checkout_time) {
            welcome_card.check = false;
        }
        else if (res.data.checkin_time) {
            welcome_card.check = true;
        } else {
            welcome_card.check = null;
        }
    });
};
onMounted(() => {
    getSession();
    getEmployeeDetials();
});


const findAttendanceMode = (attendance_mode) => {
    console.log(attendance_mode);
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

const resetChars = () => {
    (usedashboard.check = ""),
        (usedashboard.check_in = ""),
        (usedashboard.check_out = ""),
        (usedashboard.work_mode = "");
};


</script>

<style>
.p-dialog .p-dialog-header .p-dialog-header-icon:last-child {
    margin-right: 0;
    display: none;
}

input:checked {
    background-color: #22c55e; /* bg-green-500 */
  }

  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
  }


  .switch-checkbox {
    position: relative;
    display: inline-block;
    width: 115px;
    height: 25px;
}

.switch-checkbox input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider-checkbox-text {
    color: #000;
    position: absolute;
    top: 2px;
    left: 23px;
    font-size: 10px;
}

.slider-checkbox {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    border: 1px solid #d9d0d0;
    right: 0;
    bottom: 0;
    border-radius: 50px;
    background-color: white;
    width: 75px;
    -webkit-transition: 0.4s;
    height: 22px;
    box-shadow: inset -5px -5px 9px rgb(255 255 255 / 45%), inset 5px 5px 9px rgb(197 197 197 / 30%),
        rgb(0 0 0 / 16%) 0px 1px 4px;
    transition: 0.4s;
}

.slider-checkbox.check-out:before {
    background-color: green;
}

.slider-checkbox.check-in:before {
    background-color: green;
}

input:checked + .slider > .slider-text:after {
    content: "Checkout";
    color: red;
}

input + .slider > .slider-text:after {
    content: "Check In";
}

.slider-checkbox:before {
    position: absolute;
    height: 20px;
    width: 20px;
    left: 0px;
    border-radius: 50%;
    bottom: 0px;
    color: #ffffff;
    background-color: #008000;
    -webkit-transition: 0.4s;
    transition: 0.4s;
    content: "\f011";
    font-family: FontAwesome !important;
    padding: 0px 4px 0px 3px;
    font-size: 15px;
}

input:checked + .slider-checkbox > .slider-checkbox-text {
    left: 2px;
    color: #fff;
}

input:checked + .slider-checkbox.check-out {
    background-color: #f0657070;
    color: #ff0000;
}

input:checked + .slider-checkbox.check-in {
    background-color: #f0657070;
    color: #ff0000;
}

input:focus + .slider-checkbox {
    box-shadow: 0 0 1px #7cfc00;
}

input:checked + .slider-checkbox:before {
    -webkit-transform: translateX(65px);
    -ms-transform: translateX(65px);
    transform: translateX(65px);
    left: -13px;
    background-color: #f0f0f6;
}

input:checked + .slider-checkbox.check-out:before {
    color: white;
    background-color: red;
}

input:checked + .slider-checkbox.check-in:before {
    color: white;
    background-color: red;
}

input:checked + .slider-checkbox > .slider-checkbox-text:after {
    content: "Checkout";
    color: red;
}

input + .slider-checkbox > .slider-checkbox-text:after {
    content: "Check In";
}

</style>
