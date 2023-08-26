<template>
    <h6 class="font-semibold text-lg">Experience Information</h6>
    <div class="flex gap-6 items-center"
        v-for="experience in _instance_profilePagesStore.employeeDetails.get_experience_details">
        <div class="mx-4 flex justify-center">
            <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
                <div
                    class="absolute flex flex-col justify-center h-12 w-12 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                    <div>20</div>

                </div>
            </div>
        </div>

        <div class="w-full bg-white rounded-lg p-2 border my-2"
            v-if="_instance_profilePagesStore.employeeDetails.get_experience_details">

            <div class="grid grid-cols-12 gap-2 h-full py-2">
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Company Name</p>
                    <p class="font-semibold text-sm">
                        {{ experience.company_name }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Location</p>
                    <p class="font-semibold text-sm">
                        {{ experience.company_name }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">JOb Position</p>
                    <p class="font-semibold text-sm">
                        {{ experience.company_name }}

                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Period From</p>
                    <p class="font-semibold text-sm">
                        {{ dayjs(experience.period_from).format('DD-MMM-YYYY')
                        }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-semibold text-xs text-gray-500">Period To</p>
                    <p class="font-semibold text-sm">
                        {{ dayjs(experience.period_to).format('DD-MMM-YYYY') }}

                    </p>
                </div>
                <div class="col-span-2 flex justify-end ">
                    <img src="../../../assests/icons/edit.svg" class="h-4 mb-1 w-4 cursor-pointer my-auto" alt="">
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="mb-2 card">
            <div class="card-body">
                <h6 class="font-semibold text-lg">Experience Information
                    <button type="button" class="float-right btn btn-orange" @click="dialog_ExperienceInfovisible = true">
                        Add New

                    </button>
                    <Dialog v-model:visible="dialog_ExperienceInfovisible" modal
                        :style="{ width: '50vw', borderTop: '5px solid #002f56' }" id="">
                        <template #header>
                            <div>
                                <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                                    class="fs-5 fw-bold">
                                    Experience Information</h5>
                            </div>
                        </template>


                        <div class="grid grid-cols-2">
                            <div class="" style="margin-right: 20px; !important">
                                <span>Company Name <span class="text-danger">*</span></span>
                                <InputText type="text" v-model="ExperienceInfo.company_name"
                                    name="ExperienceDetails_company_name[]" required class=" !w-[100%]" />
                            </div>
                            <div class="mr-2">
                                <span> Location<span class="text-danger">*</span></span>
                                <InputText type="text" v-model="ExperienceInfo.location" name="experienceDet_location[]"
                                    required class=" w-[100%]" />
                            </div>

                            <div class="">
                                <span>Job Position <span class="text-danger">*</span></span>
                                <InputText type="text" @keypress="isLetter($event)" v-model="ExperienceInfo.job_position"
                                    name="experienceDet_job_position[]" class=" !w-[95%]" required />

                            </div>

                            <div class="">
                                <span :style="{ paddingLeft: '6px' }">Period From<span class="text-danger">*</span></span>
                                <Calendar class="!w-[98%] !mr-[15px] relative right-2"
                                    v-model="ExperienceInfo.period_from" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div class=" mr-2">
                                <span :style="{ paddingLeft: '6px' }">Period To <span class="text-danger">*</span></span>
                                <Calendar v-model="ExperienceInfo.period_to" name="experienceDet_period_to[]"
                                    class="!w-[96%] relative right-2" />
                            </div>
                            <div class=""></div>
                        </div>







                        <template #footer>
                            <div>
                                <Toast />
                                <button type="button" class="submit_btn success warning" severity="success" id=""
                                    @click="saveExperienceDetails">submit</button>
                            </div>

                        </template>


                    </Dialog>

                </h6>
                <div class="my-6 table-responsive">
                    <DataTable ref="dt" :value="_instance_profilePagesStore.employeeDetails.get_experience_details"
                        dataKey="id" :paginator="true" :rows="10"
                        paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                        :rowsPerPageOptions="[5, 10, 25]"
                        currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                        responsiveLayout="scroll">

                        <Column header="Company Name" field="company_name" style="min-width: 12rem">

                        </Column>

                        <Column field="location" header="Location" style="min-width: 8rem">

                        </Column>

                        <Column field="job_position" header="Job Position " style="min-width: 10rem">

                        </Column>

                        <Column field="period_from" header="Period from" style="min-width: 6rem">

                        </Column>

                        <Column field="period_to" header="Period To" style="min-width: 6rem">

                        </Column>
                        <Column :exportable="false" header="Action" style="min-width:12rem">
                            <template #body="slotProps">

                                <button class=" p-2 mx-4 bg-green-200 border-green-500 rounded-xl"
                                    @click="editExperienceDetails(slotProps.data)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />

                                    </svg>
                                </button>
                                <button class="  p-2 bg-red-200 border-red-500 rounded-xl"
                                    @click="diolog_Delete_Exp_Details(slotProps.data)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 font-bold">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>

                                <template>

                                    <Dialog v-model:visible="dialog_EditInfovisible" modal
                                        :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                                        <template #header>
                                            <div>
                                                <h5
                                                    :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                                    Experience Information</h5>
                                            </div>
                                        </template>

                                        <div style=" padding: 0.5rem;">
                                            <div>
                                                <div class="grid grid-cols-2 ">
                                                    <div class="mr-2">
                                                        <span>Company Name <span class="text-danger">*</span></span>
                                                        <InputText type="text" v-model="ExperienceInfo.company_name"
                                                            required class="!w-[98%] " />
                                                    </div>
                                                    <div class="ml-2">
                                                        <span> Location<span class="text-danger">*</span></span>
                                                        <InputText type="text" v-model="ExperienceInfo.location"
                                                            name="experienceDet_location[]" class="!w-[100%] " required />
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-2">
                                                    <div class="mr-2">
                                                        <span>Job Position <span class="text-danger">*</span></span>
                                                        <InputText type="text" v-model="ExperienceInfo.job_position"
                                                            required @keypress="isLetter($event)" class="!w-[98%]" />
                                                    </div>
                                                    <div class="ml-2 ">
                                                        <span :style="{ paddingLeft: '6px' }">Period From<span
                                                                class="text-danger">*</span></span>
                                                        <Calendar v-model="ExperienceInfo.period_from"
                                                            class="w-[100%] relative right-2" />
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-2">
                                                    <div class="">
                                                        <span :style="{ paddingLeft: '6px' }">Period To <span
                                                                class="text-danger">*</span></span>
                                                        <Calendar v-model="ExperienceInfo.period_to"
                                                            class="w-[95%] relative right-2" />
                                                    </div>
                                                    <div class=""></div>
                                                </div>

                                            </div>

                                        </div>

                                        <template #footer>
                                            <div>
                                                <Toast />
                                                <button type="button" class="submit_btn success warning" severity="success"
                                                    id="" @click="sumbit_Edit_Exp_details()">submit</button>
                                            </div>
                                        </template>

                                    </Dialog>
                                </template>

                            </template>
                        </Column>


                    </DataTable>

                </div>
            </div>
        </div>

    </div>
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
    dialog_EditInfovisible.value = true
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
                window.location.reload();
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
</style>
