<template>
    <div>
        <div class="mb-2 card">
            <div class="card-body">
                <h6 class="">Experience Information
                    <!-- <span class="personal-edit">
                                        <a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#edit_familyInfo">

                                            </a>
                                    </span> -->
                    <!-- <button type="button" class="btn_txt edit-icon" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        @click="visible = true">
                        <i class="ri-pencil-fill"></i>

                    </button> -->
                    <button type="button" class="float-right btn btn-orange" style="margin-left: 76%"
                        @click="dialog_ExperienceInfovisible = true">
                        Add New
                        <!-- <i class="ri-pencil-fill"></i> -->
                    </button>
                    <Dialog v-model:visible="dialog_ExperienceInfovisible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }"
                        id="">
                        <template #header>
                            <div>
                                <h5
                                    :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                    Experience Information</h5>
                            </div>
                        </template>

                        <div style="box-shadow: 0 1px 2px rgba(56, 65, 74, 0.15); padding: 1rem;">

                            <div class="space-between">
                                <div class="flex-col input_text">
                                    <span>Company Name <span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="ExperienceInfo.company_name"
                                        name="ExperienceDetails_company_name[]" required />
                                </div>
                                <div class="flex-col input_text">
                                    <span> Location<span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="ExperienceInfo.location" name="experienceDet_location[]"
                                        required />

                                </div>
                            </div>
                            <div class="space-between M-T">
                                <div class="flex-col input_text">
                                    <span>Job Position <span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="ExperienceInfo.job_position"
                                        name="experienceDet_job_position[]" required />
                                </div>

                                <div class="flex-col input_text" style="margin-right: 7px;">
                                    <span :style="{ paddingLeft: '6px' }">Period From<span
                                            class="text-danger">*</span></span>
                                    <Calendar showIcon v-model="ExperienceInfo.period_from"
                                        :style="{ height: ' 2.3rem', width: '100%', marginRight: '20px' }"
                                        name="experienceDet_period_from[]" />
                                </div>
                            </div>

                            <div class="space-between M-T">
                                <div class="flex-col input_text" :style="{ marginLeft: '-6px' }">
                                    <span :style="{ paddingLeft: '6px' }">Period To <span
                                            class="text-danger">*</span></span>
                                    <Calendar showIcon v-model="ExperienceInfo.period_to" class=""
                                        :style="{ height: ' 2.3rem', width: '100%', borderRadius: '2px' }"
                                        name="experienceDet_period_to[]" />
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
                <div class="table-responsive my-6">
                    <DataTable ref="dt" :value="_instance_profilePagesStore.employeeDetails.get_experience_details"
                        dataKey="id" :paginator="true" :rows="10"
                        paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                        :rowsPerPageOptions="[5, 10, 25]"
                        currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                        responsiveLayout="scroll">

                        <Column header="Company Name" field="company_name" style="min-width: 8rem">
                            <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                        </Column>

                        <Column field="location" header="Location" style="min-width: 12rem">
                            <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                        </Column>

                        <Column field="job_position" header="Job Position " style="min-width: 12rem">
                            <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                        </Column>

                        <Column field="period_from" header="Period from" style="min-width: 12rem">
                            <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                        </Column>

                        <Column field="period_to" header="Period To" style="min-width: 12rem">
                            <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                        </Column>
                        <Column :exportable="false" header="Action" style="min-width:8rem">
                        <template #body="slotProps">

                            <button class="btn btn-success mr-3"  @click="editExperienceDetails(slotProps.data)">Edit</button>
                            <button class="btn btn-danger"  @click="diolog_Delete_Exp_Details(slotProps.data)">Delete</button>

                            <template>

                                <Dialog v-model:visible="dialog_EditInfovisible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                                    <template #header>
                                        <div>
                                            <h5
                                                :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                                Experience Information</h5>
                                        </div>
                                    </template>

                                    <div style="box-shadow: 0 1px 2px rgba(56, 65, 74, 0.15); padding: 1rem;">

                                        <div class="space-between">
                                            <div class="flex-col input_text">
                                                <span>Company Name <span class="text-danger">*</span></span>
                                                <InputText type="text" v-model="ExperienceInfo.company_name"
                                                    name="ExperienceDetails_company_name[]" required />
                                            </div>
                                            <div class="flex-col input_text">
                                                <span> Location<span class="text-danger">*</span></span>
                                                <InputText type="text" v-model="ExperienceInfo.location" name="experienceDet_location[]"
                                                    required />

                                            </div>
                                        </div>
                                        <div class="space-between M-T">
                                            <div class="flex-col input_text">
                                                <span>Job Position <span class="text-danger">*</span></span>
                                                <InputText type="text" v-model="ExperienceInfo.job_position"
                                                    name="experienceDet_job_position[]" required />
                                            </div>

                                            <div class="flex-col input_text" style="margin-right: 7px;">
                                                <span :style="{ paddingLeft: '6px' }">Period From<span
                                                        class="text-danger">*</span></span>
                                                <Calendar showIcon v-model="ExperienceInfo.period_from"
                                                    :style="{ height: ' 2.3rem', width: '100%', marginRight: '20px' }"
                                                    name="experienceDet_period_from[]" />
                                            </div>
                                        </div>

                                        <div class="space-between M-T">
                                            <div class="flex-col input_text" :style="{ marginLeft: '-6px' }">
                                                <span :style="{ paddingLeft: '6px' }">Period To <span
                                                        class="text-danger">*</span></span>
                                                <Calendar showIcon v-model="ExperienceInfo.period_to" class=""
                                                    :style="{ height: ' 2.3rem', width: '100%', borderRadius: '2px' }"
                                                    name="experienceDet_period_to[]" />
                                            </div>
                                        </div>

                                    </div>

                                    <template #footer>
                                        <div>
                                            <Toast />
                                            <button type="button" class="submit_btn success warning" severity="success" id=""
                                                @click="sumbit_Edit_Exp_details()">submit</button>
                                        </div>
                                    </template>

                                </Dialog>
                            </template>




                        <!-- <Button icon="pi pi-pencil" label="edit" outlined rounded class="mr-2" @click="editFamilyDetails(slotProps.data)" />
                        <Button icon="pi pi-trash" outlined rounded severity="danger" @click="confirmDeleteProduct(slotProps.data)" /> -->
                    </template>
                </Column>


                    </DataTable>

                </div>


                <!-- </form> -->
            </div>
        </div>

    </div>
</template>
<script setup>

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

    // if (ExperienceInfo.company_name == ' ' || ExperienceInfo.job_position === '' || ExperienceInfo.location === '' || ExperienceInfo.period_from === " " || ExperienceInfo.period_to === " ") {

    //     toast.add({ severity: 'warn', summary: 'Warn Message', detail: 'Message Content', life: 3000 });

    // } else {
        let id = fetch_data.current_user_id
        let url = `/add-experience-info/${id}`

        axios.post(url, {
            user_code: _instance_profilePagesStore.employeeDetails.user_code,
            company_name: ExperienceInfo.company_name,
            experience_location:ExperienceInfo.location,
            job_position:ExperienceInfo.job_position,
            period_from: ExperienceInfo.period_from,
            period_to: ExperienceInfo.period_to
        })
            .then((res) => {

                if (res.data.status == "success") {
                    window.location.reload();
                    toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });
                    // _instance_profilePagesStore.employeeDetails.get_experience_details.company_name = ExperienceInfo.company_name

                    // _instance_profilePagesStore.employeeDetails.get_experience_details.location = ExperienceInfo.location;
                    // _instance_profilePagesStore.employeeDetails.get_experience_details.job_position = ExperienceInfo.job_position;
                    // _instance_profilePagesStore.employeeDetails.get_experience_details.period_from = ExperienceInfo.period_from;
                    // _instance_profilePagesStore.employeeDetails.get_experience_details.period_to = ExperienceInfo.period_to;
                } else if (res.data.status == "failure") {
                    leave_data.leave_request_error_messege = res.data.message;
                }
            })
            .catch((err) => {
                console.log(err);
            });
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
    ExperienceInfo.period_from = get_experience_details.period_from
    ExperienceInfo.period_to = get_experience_details.period_to

};

const  sumbit_Edit_Exp_details =(get_experience_details)=>{
    dialog_EditInfovisible.value = false;

    let id = fetch_data.current_user_id
    let url =`/update-experience-info/${id}`;


    axios.post(url, {
            user_code: _instance_profilePagesStore.employeeDetails.user_code,
            exp_current_table_id: Exp_current_table_id.value,
            company_name:ExperienceInfo.company_name  ,
            experience_location:ExperienceInfo.location  ,
            job_position:   ExperienceInfo.job_position ,
            period_from:  ExperienceInfo.period_from,
            period_to: ExperienceInfo.period_to
        })
        .then((res) => {

            if (res.data.status == "success") {
                 window.location.reload();
                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });

                // ExperienceInfo.company_name = get_experience_details.company_name
                // ExperienceInfo.location = get_experience_details.location
                // ExperienceInfo.job_position = get_experience_details.job_position
                // ExperienceInfo.period_from = get_experience_details.period_from
                // ExperienceInfo.period_to = get_experience_details.period_to

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
             window.location.reload();
            toast.add({ severity: 'success', summary: 'Deleted', detail: 'General information updated', life: 3000 });

        } else if (res.data.status == "failure") {
            leave_data.leave_request_error_messege = res.data.message;
        }
    })
    .catch((err) => {
        console.log(err);
    });


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
