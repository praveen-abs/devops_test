<template>
    <div class="flex items-center justify-between">
        <h6 class="text-lg font-semibold">Experience Information</h6>
        <button type="" class="float-right text-[#fff] bg-[#000] px-4 py-2 rounded-lg " @click="add_experience_info">
            Add New
        </button>
    </div>


    <!-- <div class="card"> -->

    <div class="flex items-center gap-6"
        v-for="experience in _instance_profilePagesStore.employeeDetails.get_experience_details">
        <div class="flex justify-center mx-4">
            <div class="relative flex items-center justify-center w-1 h-full bg-green-300">
                <div
                    class="absolute z-10 flex flex-col justify-center w-12 h-12 font-thin leading-none text-center bg-white border-2 border-green-300 rounded-full">
                    <div>
                        {{ experience.period_from && experience.period_to ?
                            calculateYears(experience.period_from, experience.period_to) : 0 }}
                    </div>

                </div>
            </div>
        </div>

        <div class="w-full p-2 my-2 bg-white border rounded-lg"
            v-if="_instance_profilePagesStore.employeeDetails.get_experience_details">

            <div class="grid h-full grid-cols-12 gap-2 py-2">
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-gray-500">Company Name</p>
                    <p class="text-sm font-semibold">
                        {{ experience.company_name }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-gray-500">Location</p>
                    <p class="text-sm font-semibold">
                        {{ experience.location }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-gray-500">JOb Position</p>
                    <p class="text-sm font-semibold">
                        {{ experience.job_position }}

                    </p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-gray-500">Period From</p>
                    <p class="text-sm font-semibold">
                        {{ dayjs(experience.period_from).format('DD-MMM-YYYY')
                        }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-semibold text-gray-500">Period To</p>
                    <p class="text-sm font-semibold">
                        {{ dayjs(experience.period_to).format('DD-MMM-YYYY') }}
                    </p>
                </div>
                <div class="relative flex justify-end col-span-2">
                    <!-- <img src="../../../assests/icons/edit.svg" class="w-4 h-4 my-auto mb-1 cursor-pointer" alt=""
                        @click="dialog_ExperienceInfovisible = true"> -->
                    <button class="" type="button" @click="toggle(experience.id)"> <i class="pi pi-ellipsis-v"></i>
                    </button>

                    <div v-if="op === experience.id" class="absolute flex flex-col bg-white shadow-2xl top-4 "
                        style="width: 160px; margin-top:12px !important;margin-right: 20px !important; ">
                        <div class="p-0 m-0 d-flex flex-column" @mouseleave=" op = ''">
                            <!-- bg-green-200 -->
                            <button class=" h-[30px] p-2 text-black fw-semibold hover:bg-gray-200 border-bottom-1"
                                @click="diolog_Delete_Exp_Details(experience)">delete</button>
                            <!-- bg-blue-500 -->
                            <button @click="editExperienceDetails(experience)"
                                class=" !h-[33px]  border-[1px] text-black fw-semibold hover:bg-gray-200 ho">View</button>
                        </div>
                    </div>
                    <!-- {{ op }} -->

                    <!-- <OverlayPanel ref="op" appendTo="body"><h1>lorem</h1></OverlayPanel> -->
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <div>

    </div>

    <!-- add experience details -->

    <Sidebar v-model:visible="dialog_ExperienceInfovisible" position="right" class=" !w-[500px]">
        <div class=" bg-[#759CB2] !w-[100%] h-[60px] absolute top-0 left-0 ">
            <h1 class=" m-4  text-[#ffff] font-['poppins] font-semibold ">Experience Information</h1>
        </div>

        <div class=" my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Company Name <span class="text-danger">*</span></h1>
            <InputText type="text" v-model="ExperienceInfo.company_name" name="ExperienceDetails_company_name[]" required
                class=" !w-[100%] h-10" />
        </div>
        <div class="my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Location<span class="text-danger">*</span></h1>
            <InputText type="text" v-model="ExperienceInfo.location" name="experienceDet_location[]" required
                class=" w-[100%] h-10 my-2" />
        </div>
        <div class="my-2 ">
            <h1 class=" text-[14px] font-semibold mb-1">Job Position<span class="text-danger">*</span></h1>
            <InputText type="text" @keypress="isLetter($event)" v-model="ExperienceInfo.job_position"
                name="experienceDet_job_position[]" class=" !w-[100%] h-10 " required />
        </div>
        <div class="my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Period From<span class="text-danger">*</span></h1>

            <Calendar class="!w-[100%] h-10 relative left-[-4px]" v-model="ExperienceInfo.period_from" />
        </div>
        <div class="my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Period To<span class="text-danger">*</span></h1>
            <Calendar v-model="ExperienceInfo.period_to" name="experienceDet_period_to[]"
                class="!w-[100%] h-10 left-[-4px] " />
        </div>

        <div class="flex justify-center my-4 !mt-[200px]">
            <Toast />
            <button class="bg-[#000] text-[#ffff] p-2 px-4 rounded-md" severity="success" id=""
                @click="saveExperienceDetails">submit</button>
        </div>
    </Sidebar>


    <!--  edit experience details -->
    <Sidebar v-model:visible="dialog_EditInfovisible" position="right" class=" !w-[500px]">
        <h1 class="absolute font-semibold top-4 "> Experience Information</h1>

        <div class=" my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Company Name <span class="text-danger">*</span></h1>
            <InputText type="text" v-model="ExperienceInfo.company_name" name="ExperienceDetails_company_name[]" required
                class=" !w-[100%] h-10" />
        </div>
        <div class="my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Location<span class="text-danger">*</span></h1>
            <InputText type="text" v-model="ExperienceInfo.location" name="experienceDet_location[]" required
                class=" w-[100%] h-10 my-2" />
        </div>
        <div class="my-2 ">
            <h1 class=" text-[14px] font-semibold mb-1">Job Position<span class="text-danger">*</span></h1>
            <InputText type="text" @keypress="isLetter($event)" v-model="ExperienceInfo.job_position"
                name="experienceDet_job_position[]" class=" !w-[100%] h-10 " required />
        </div>
        <div class="my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Period From<span class="text-danger">*</span></h1>

            <Calendar class="!w-[100%] h-10 relative left-[-4px]" v-model="ExperienceInfo.period_from" />
        </div>
        <div class="my-2">
            <h1 class=" text-[14px] font-semibold mb-1">Period To<span class="text-danger">*</span></h1>
            <Calendar v-model="ExperienceInfo.period_to" name="experienceDet_period_to[]"
                class="!w-[100%] h-10 left-[-4px] " />
        </div>

        <div class="flex justify-center my-4">
            <Toast />
            <button type="button" class=" bg-[#000] w-[144px] py-2 rounded-lg text-[white] success warning"
                severity="success" id="" @click="sumbit_Edit_Exp_details()">submit</button>
        </div>

    </Sidebar>
</template>
<script setup>
import dayjs from 'dayjs';

import { ref, onMounted, reactive, onUpdated } from 'vue';
import axios from 'axios'
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const fetch_data = Service()

const _instance_profilePagesStore = profilePagesStore()

const toast = useToast();
const toasts = useToast();

const op = ref();
const OverlayPanel = ref(true);
const toggle = (event) => {
    // op.value = event;
    console.log(event);
    if (event) {
        op.value = event;
    }

}



const PersonalDocument = ref('');
const dialog_ExperienceInfovisible = ref(false);

const dialog_EditInfovisible = ref(false);

const Exp_current_table_id = ref();

const ExperienceInfo = reactive({
    company_name: '',
    location: '',
    job_position: '',
    period_from: '',
    period_to: ''

})

function add_experience_info() {
    dialog_ExperienceInfovisible.value = true;
    ExperienceInfo.company_name = '';
    ExperienceInfo.job_position = '';
    ExperienceInfo.location = '';
    ExperienceInfo.period_from = '';
    ExperienceInfo.period_to = '';
}

const saveExperienceDetails = () => {

    console.log(ExperienceInfo);

    _instance_profilePagesStore.loading_screen = true
    let id = fetch_data.current_user_id
    let url = `/add-experience-info/${id}`

    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        company_name: ExperienceInfo.company_name,
        experience_location: ExperienceInfo.location,
        job_position: ExperienceInfo.job_position,
        period_from: dayjs(ExperienceInfo.period_from).format('YYYY-MM-DD'),
        period_to: dayjs(ExperienceInfo.period_to).format('YYYY-MM-DD'),
    })
        .then((res) => {

            if (res.data.status == "success") {
                toast.add({ severity: 'success', summary: 'Updated', detail: 'Experiance information updated', life: 3000 });
            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.fetchEmployeeDetails()
            _instance_profilePagesStore.loading_screen = false
        })
    // window.location.reload();

    dialog_ExperienceInfovisible.value = false;



}



onMounted(() => {
    // fetchData();
})



const editExperienceDetails = (get_experience_details) => {
    dialog_EditInfovisible.value = true;
    if (dialog_EditInfovisible.value == true) {
        console.log(dialog_EditInfovisible);
        op.value = '';
    }
    Exp_current_table_id.value = get_experience_details.id;

    console.log(Exp_current_table_id.value);


    ExperienceInfo.company_name = get_experience_details.company_name
    ExperienceInfo.location = get_experience_details.location
    ExperienceInfo.job_position = get_experience_details.job_position
    ExperienceInfo.period_from = get_experience_details.period_from,
        ExperienceInfo.period_to = get_experience_details.period_to

};

const sumbit_Edit_Exp_details = (get_experience_details) => {
    dialog_EditInfovisible.value = false;
    op.value = '';

    let id = fetch_data.current_user_id
    let url = `/update-experience-info/${id}`;


    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        exp_current_table_id: Exp_current_table_id.value,
        company_name: ExperienceInfo.company_name,
        experience_location: ExperienceInfo.location,
        job_position: ExperienceInfo.job_position,
        period_from: dayjs(ExperienceInfo.period_from).format('YYYY-MM-DD'),
        period_to: dayjs(ExperienceInfo.period_to).format('YYYY-MM-DD'),
    })
        .then((res) => {

            if (res.data.status == "success") {
                // window.location.reload();
                _instance_profilePagesStore.fetchEmployeeDetails()
                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });

            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        });

}

const diolog_Delete_Exp_Details = (family) => {

    Exp_current_table_id.value = family.id

    let id = fetch_data.current_user_id
    let url = `/delete-experience-info/${id}`;

    axios.post(url, {
        exp_current_table_id: Exp_current_table_id.value,
    })
        .then((res) => {

            if (res.data.status == "success") {
                // window.location.reload();
                _instance_profilePagesStore.fetchEmployeeDetails()
                toast.add({ severity: 'success', summary: 'Deleted', detail: 'General information updated', life: 3000 });

            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.fetchEmployeeDetails()
            _instance_profilePagesStore.loading_screen = false
        });


}


const isLetter = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z_ ]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}



function calculateYears(startDate, endDate) {
    // Parse the start and end dates into JavaScript Date objects
    const startDateObj = new Date(startDate);
    const endDateObj = new Date(endDate);

    // Calculate the difference in milliseconds between the end date and start date
    const timeDifference = endDateObj - startDateObj;

    // Calculate the number of milliseconds in a year (assuming an average year of 365.25 days)
    const millisecondsInYear = 365.25 * 24 * 60 * 60 * 1000;

    // Calculate the number of years
    const years = timeDifference / millisecondsInYear;

    return years ? years.toFixed(1) : null;
}




</script>

<style  lang="scss">
.p-button.p-component.p-button-icon-only.p-datepicker-trigger {
    height: 100%;
}

.p-inputtext.p-component {
    border: 0.1px solid rgb(187, 187, 187);
    width: 100%;
}

span .p-calendar.p-component.p-inputwrapper.p-calendar-w-btn {
    margin-right: 25px !important;
}


.p-button .p-component .p-button-icon-only .p-datepicker-trigger>button {
    height: 100%;

}

// .main-content {
//     width: 85%;
// }


#file_upload {
    display: inline-block;
    background-color: #003056;
    color: white;
    padding: 0.5rem;
    font-family: sans-serif;
    border-radius: 0.3rem;
    cursor: pointer;
    margin-top: 1rem;
    width: 100%;
    height: 40px;
    font-weight: 700;
    text-align: center;
}

.p-calendar .p-inputtext .p-inputwrapper .p-component {
    flex: 1 1 auto;
    width: 1%;
    background: rebeccapurple;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component::-webkit-input-placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component:-ms-input-placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component::-ms-input-placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
}



:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: red;
}

::-ms-input-placeholder {
    /* Microsoft Edge */
    color: red;
}



.p-button {
    height: 2.5em;
}

.p-button .p-fileupload-choose {
    height: 2.1em;
}

i,
span,
.tabview-custom {
    vertical-align: middle;
}

span {
    margin: 0 .5rem;
}

.AadharCardFront {
    margin-left: 20px;
}

.label {
    width: 170px;
}

.p-tabview p {
    line-height: 1.5;
    margin: 0;
}

.p-overlaypanel .p-overlaypanel-content {
    padding: 0;
    z-index: 0 !important;
}

.p-sidebar-right .p-sidebar
{
    width: 30% !important;
    height: 100%;
}
</style>
