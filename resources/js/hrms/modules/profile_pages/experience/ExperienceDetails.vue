<template>
    <div>
        <div class="mb-2 card">
            <div class="card-body">
                <h6 class="fw-bold fs-15">Experience Information

                    <button type="button" class="float-right btn btn-orange" style="margin-left: 76%"
                        @click="dialog_ExperienceInfovisible = true">
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

                        <div style="box-shadow: 0 1px 2px rgba(56, 65, 74, 0.15); padding: 1rem;">

                            <div class="row">
                                <div class="col" style="margin-right: 20px; !important">
                                    <span>Company Name <span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="ExperienceInfo.company_name"
                                        name="ExperienceDetails_company_name[]" class="" required />
                                </div>
                                <div class="col mr-2">
                                    <span> Location<span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="ExperienceInfo.location" name="experienceDet_location[]"
                                        required />
                                </div>
                                <div class="row w-100  ml-1  p-0">
                                    <div class="col mr-4">
                                        <span>Job Position <span class="text-danger">*</span></span>
                                    <InputText type="text" @keypress="isLetter($event)" v-model="ExperienceInfo.job_position"
                                        name="experienceDet_job_position[]" required />

                                    </div>
                                    <div class="col mr-5 ml-1 mt-2 p-0 ">
                                        <span :style="{ paddingLeft: '6px' }">Period From<span
                                            class="text-danger">*</span></span>
                                    <Calendar class=" w-100"  v-model="ExperienceInfo.period_from"
                                        />

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mr-3">
                                    <span :style="{ paddingLeft: '6px' }">Period To <span
                                            class="text-danger">*</span></span>
                                    <Calendar class="w-100 mr-5"  v-model="ExperienceInfo.period_to"
                                        name="experienceDet_period_to[]" />
                                </div>
                                <div class="col-6"></div>
                                </div>

                            </div>

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

                                <button class="mr-3 btn btn-success"
                                    @click="editExperienceDetails(slotProps.data)">Edit</button>
                                <button class="btn btn-danger"
                                    @click="diolog_Delete_Exp_Details(slotProps.data)">Delete</button>

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
                                                <div class="row ">
                                                    <div class="col-6 ">
                                                        <span>Company Name <span class="text-danger">*</span></span>
                                                    <InputText type="text" v-model="ExperienceInfo.company_name"
                                                        required class="w-100" />
                                                    </div>
                                                    <div class="col-6">
                                                        <span> Location<span class="text-danger">*</span></span>
                                                    <InputText type="text" v-model="ExperienceInfo.location"
                                                        name="experienceDet_location[]" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span>Job Position <span class="text-danger">*</span></span>
                                                    <InputText type="text" v-model="ExperienceInfo.job_position"
                                                         required @keypress="isLetter($event)" class="w-100" />
                                                    </div>
                                                    <div class="col-6 position-relative ">
                                                        <span :style="{ paddingLeft: '6px' }">Period From<span
                                                            class="text-danger">*</span></span>
                                                    <Calendar :style="{ paddingRight: '15px' }"  v-model="ExperienceInfo.period_from" class=" position-absolute left-0 bottom-2 m" style="width: 100%;"   />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mr-2  pr-4">
                                                        <span :style="{ paddingLeft: '6px' }">Period To <span
                                                            class="text-danger">*</span></span>
                                                    <Calendar   v-model="ExperienceInfo.period_to" class="w-100 mr-4" />
                                                    </div>
                                                    <div class="col-6 "></div>
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
        period_from:  dayjs( ExperienceInfo.period_from ).format('YYYY-MM-DD'),
        period_to: dayjs(  ExperienceInfo.period_to  ).format('YYYY-MM-DD'),
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
        period_from:   dayjs( ExperienceInfo.period_from ).format('YYYY-MM-DD'),
        period_to:  dayjs(  ExperienceInfo.period_to ).format('YYYY-MM-DD'),
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

.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1rem 1rem;
    border: 1px solid #dee2e6;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-width: 0 0 1px 0;
    font-weight: 600;
    color: #fff;
    background: #003056;
    transition: box-shadow 0.2s;
    font-size: 13px;

    .p-column-title {
        font-size: 13px;
    }

    .p-column-filter {
        width: 100%;
    }

    #pv_id_2 {
        height: 30px;
    }

    .p-fluid .p-dropdown .p-dropdown-label {
        margin-top: -10px;
    }

    .p-dropdown .p-dropdown-label.p-placeholder {
        margin-top: -12px;
    }

    .p-column-filter-menu-button {
        color: white;
        margin-left: 10px;
    }

    .p-column-filter-menu-button:hover {
        color: white;
        border-color: transparent;
        background: #023e70;
    }
}

.p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
    margin-bottom: 0.5rem;
    visibility: hidden;
    position: absolute;
}

.p-button .p-component .p-button-sm {
    background-color: #003056;
}

.p-datatable .p-datatable-tbody>tr {
    font-size: 13px;

    .employee_name {
        font-weight: bold;
        font-size: 13.5px;
    }
}

.employee_name {
    font-weight: bold;
    font-size: 13px;
}

.p-column-title {
    font-size: 13.5px;
}

.fontSize13px {
    font-size: 13px;
}

.pending {
    font-weight: 700;
    color: #ffa726;
}

.approved {
    font-weight: 700;
    color: #26ff2d;
}

.p-button.p-component.p-button-success.Button {
    padding: 8px;
}

.rejected {
    font-weight: 700;
    color: #ff2634;
}

.p-button.p-component.p-button-danger.Button {
    padding: 8px;
}

@media screen and (max-width: 960px) {
    button {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
    color: red;
}

.p-button.p-component.p-confirm-dialog-accept {
    background-color: #003056;
}

.p-button.p-component.p-confirm-dialog-reject.p-button-text {
    color: #003056;
}

.p-column-filter-overlay-menu .p-column-filter-buttonbar {
    padding: 1.25rem;
    position: absolute;
    visibility: hidden;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter-menu-button {
    color: white;
    border-color: transparent;
}

.p-column-filter-menu-button.p-column-filter-menu-button-open {
    background: none;
}

.p-column-filter-menu-button.p-column-filter-menu-button-active {
    background: none;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
    width: 50%;
}

/* For Sort */

.p-datatable .p-sortable-column:not(.p-highlight):hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
    color: white;
}

.p-datatable .p-sortable-column.p-highlight {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column.p-highlight:hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:focus {
    box-shadow: none;
    outline: none;
    color: white;
}

.p-datatable .p-sortable-column .p-sortable-column-icon {
    color: white;
}

.pi-sort-amount-down::before {
    content: "\e9a0";
    color: white;
}

.pi-sort-amount-up-alt::before {
    content: "\e9a2";
    color: white;
}

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


{
<!--
<template>
    <div class="card">
        <Message severity="success">Success Message Content</Message>
        <Message severity="info">Info Message Content</Message>

        <Message severity="error">Error Message Content</Message>
    </div>
</template>


<template>
    <div class="flex card justify-content-center">
        <Toast />
        <div class="flex flex-wrap gap-2">
            <Button label="Success" severity="success" @click="showSuccess" />
            <Button label="Info" severity="info" @click="showInfo" />
            <Button label="Warn" severity="warning" @click="showWarn" />
            <Button label="Error" severity="danger" @click="showError" />
        </div>
    </div>
</template>

<script setup>
import { useToast } from "primevue/usetoast";
const toast = useToast();

const showSuccess = () => {
    toast.add({ severity: 'success', summary: 'Success Message', detail: 'Message Content', life: 3000 });
};

const showInfo = () => {
    toast.add({ severity: 'info', summary: 'Info Message', detail: 'Message Content', life: 3000 });
};

const showWarn = () => {
    toast.add({ severity: 'warn', summary: 'Warn Message', detail: 'Message Content', life: 3000 });
};

const showError = () => {
    toast.add({ severity: 'error', summary: 'Error Message', detail: 'Message Content', life: 3000 });
};
</script>

<script setup>
</script> -->
}
