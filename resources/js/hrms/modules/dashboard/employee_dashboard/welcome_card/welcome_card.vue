<template>
    <div class="border-0 card w-100 box-shadow-md">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-sm-8 col-md-8 col-xl-8 col-lg-8 col-xxl-8">
                    <p class="fw-bold f-18 text-primary" id="greeting_text">
                        {{ current_session }}
                    </p>
                    <p class="my-1 fw-bold fs-16 text-orange">
                        {{ service.current_user_name }}
                    </p>
                    <div class="my-2.5 flex">
                        <i class="fa fa-sun-o  text-warning my-auto" aria-hidden="true"></i>
                        <p class="mx-2 fs-6 my-auto">General Shift</p>
                        <label class="switch-checkbox f-12 text-muted ">
                            <input type="checkbox" id="checkin_function" class="f-13 text-muted"
                                v-model="welcome_card.check" @change="getTime" />
                            <span class="slider-checkbox check-in round">
                                <span class="slider-checkbox-text"> </span>
                            </span>
                        </label>
                    </div>
                    <p v-if="welcome_card.check" class="f-12 text-muted" id="time_duration">
                        Time Duration:
                        {{ welcome_card.check_in }}
                    </p>
                    <p v-else class="f-12 text-muted" id="time_duration">
                        Time Duration:
                        {{ welcome_card.check_out }}
                    </p>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-xl-4 col-lg-4 col-xxl-4">
                    <img src="../../dashboard/girl_walk.jpg" class="" alt="girl-walk" style="height: 140px; width: 140px" />
                </div>
            </div>
        </div>
    </div>

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
                    <p class="mb-4 text-muted">Have a good day !</p>
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

const service  = Service()
const usedashboard = useMainDashboardStore();

const current_session = ref();
const current_user = ref();

const check_in_dailog = ref(false);
const check_out_dailog = ref(false);

const welcome_card = reactive({
    date: new Date(),
    check: "",
    check_in: "",
    check_out: "",
    attendance_mode:"web",
    work_mode:""
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

const getTime = () => {
    if (welcome_card.check == true) {
        welcome_card.check_in = new Date().toLocaleTimeString();
        check_in_dailog.value = true;
    } else {
        welcome_card.check_out = new Date().toLocaleTimeString();
        check_out_dailog.value = true;
    }

    usedashboard.updateCheckin_out({
        user_code:service.current_user_code,
        date:welcome_card.date,
        check_in: welcome_card.check_in,
        check_out: welcome_card.check_out,
        attendance_mode:welcome_card.attendance_mode,
        work_mode:welcome_card.work_mode
    }).finally(()=>{
        resetChars()
    });
};

onMounted(async () => {
    getSession();

});

const resetChars = () =>{
    usedashboard.check = "",
    usedashboard.check_in = "",
    usedashboard.check_out = "",
    usedashboard.work_mode =""
}
</script>

<style>
.p-dialog .p-dialog-header .p-dialog-header-icon:last-child {
    margin-right: 0;
    display: none;
}
</style>
