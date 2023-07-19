<template>
    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="fw-bold fs-15">Family Information
                <button type="button" class="float-right btn btn-orange" style="margin-left: 79%"
                    @click="DialogFamilyinfovisible = true">
                    Add New
                    <!-- <i class="ri-pencil-fill"></i> -->
                </button>

                <Dialog v-model:visible="DialogFamilyinfovisible" modal
                    :style="{ width: '40vw', borderTop: '5px solid #002f56' }" id="">
                    <template #header>
                        <div>
                            <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                                class="fw-bold fs-15">
                                Family Information</h5>
                        </div>
                    </template>

                    <div>
                        <div class="row">
                            <div class="col mx-1">
                                <span>Name <span class="text-danger">*</span></span>
                                <InputText type="text" v-model="familydetails.name" @keypress="isLetter($event)" class="capitalize ml-2" />

                            </div>
                            <div class="col mx-1">
                                <span>Relationship<span class="text-danger">*</span></span>
                                <InputText type="text" v-model="familydetails.relationship" @keypress="isLetter($event)" class="capitalize" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mx-1">
                                <span>Date of birth <span class="text-danger">*</span></span>
                                <Calendar  v-model="familydetails.dob" class="w-full"
                                :minDate="minDate" :maxDate="maxDate"  min="2000-01-02"  />
                            </div>

                            <div class="col mx-1">
                                <span>phone<span class="text-danger">*</span></span>
                            <InputMask id="basic" v-model="familydetails.phone_number" mask="9999999999"
                                placeholder="999999999" />
                            </div>
                        </div>
                    </div>
                    <template #footer>
                        <Toast />
                        <div>
                            <button type="button" class="submit_btn warning success" id="submit_button_family_details"
                                @click="saveFamilyDetails">submit</button>
                        </div>

                    </template>


                </Dialog>

            </h6>

            <!-- {{ _instance_profilePagesStore.employeeDetails.get_family_details }} -->
            <div class="my-6 table-responsive">
                <DataTable ref="dt" dataKey="id" :paginator="true" :rows="10"
                    :value="_instance_profilePagesStore.employeeDetails.get_family_details"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Name" field="name" style="min-width: 8rem">
                    </Column>

                    <Column field="relationship" header="Relationship" style="min-width: 12rem">
                    </Column>

                    <Column field="dob" header="Date of Birth " style="min-width: 12rem">
                        <template #body="slotProps">
                            <div v-if="slotProps.data.dob == 'Invalid Date'">
                                -
                            </div>
                            <div v-else>
                                {{ dayjs(slotProps.data.dob).format('DD-MMM-YYYY') }}
                            </div>
                        </template>
                    </Column>
                    <Column field="phone_number" header="Phone" style="min-width: 12rem">
                    </Column>
                    <Column :exportable="false" header="Action" style="min-width:20rem">
                        <template #body="slotProps">

                            <button class="mr-3 btn btn-success"
                                @click="diolog_EditFamilyDetails(slotProps.data)">Edit</button>
                            <button class="btn btn-danger"
                                @click="diolog_DeleteFamilyDetails(slotProps.data)">Delete</button>



                            <!-- <Button icon="pi pi-pencil" label="edit" outlined rounded class="mr-2" @click="editFamilyDetails(slotProps.data)" />
                        <Button icon="pi pi-trash" outlined rounded severity="danger" @click="confirmDeleteProduct(slotProps.data)" /> -->
                        </template>
                    </Column>


                </DataTable>

                <template>


                    <Dialog v-model:visible="DialogEditInfovisible" modal
                        :style="{ width: '45vw', borderTop: '5px solid #002f56' }">
                        <template #header>
                            <div>
                                <h5 class=" fs-5"
                                    :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                    Family Information</h5>
                            </div>
                        </template>

                        <div>
                           <div class="row">
                            <div class="col ml-2">
                                <span>Name <span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="Editfamilydetails.name" @keypress="isLetter($event)" class="capitalize"  />
                            </div>
                            <div class="col">
                                <span>Relationship<span class="text-danger">*</span></span>
                                    <InputText type="text" v-model="Editfamilydetails.relationship" @keypress="isLetter($event)" class="capitalize" />

                            </div>

                           </div>
                           <div class="row">

                            <div class="col">
                                <span>Date of birth <span class="text-danger">*</span></span>
                                    <Calendar  v-model="Editfamilydetails.dob" class=" mr-2 w-full"
                                :minDate="minDate" :maxDate="maxDate"  min="2000-01-02"  />
                            </div>

                            <div class="col">
                                <span>phone<span class="text-danger">*</span></span>
                                    <InputMask id="basic" class="ml-1" v-model="Editfamilydetails.phone_number" mask="9999999999"
                                placeholder="999999999" />

                            </div>

                           </div>
                        </div>

                        <div class="space-between">
                            <div class="">

                            </div>
                            <div class="flex-col input_text">

                            </div>
                        </div>
                        <div class="space-between M-T">
                            <div class="flex-col input_text">

                            </div>
                            <div class="flex-col input_text">

                            </div>
                        </div>

                        <template #footer>
                            <Toast />
                            <div>
                                <button type="button" class="submit_btn warning success" id="submit_button_family_details"
                                    @click="EditFamilyDetails">submit</button>
                            </div>

                        </template>


                    </Dialog>
                </template>

            </div>


            <!-- </form> -->
        </div>
    </div>
</template>
<script setup>
import dayjs from 'dayjs';
import { useNow, useDateFormat } from '@vueuse/core'
import { ref, onMounted, reactive, onUpdated } from 'vue';
import axios from 'axios'
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const fetch_data = Service()

const _instance_profilePagesStore = profilePagesStore()

const toast = useToast();

const PersonalDocument = ref('');
const DialogFamilyinfovisible = ref(false);

const DialogEditInfovisible = ref(false);

const familydetails = reactive({
    name: '',
    relationship: '',
    dob: '',
    phone_number: ''
})
const Editfamilydetails = reactive({
    name: '',
    relationship: '',
    dob: '',
    phone_number: ''
});

const current_table_id = ref()


const saveFamilyDetails = () => {
    _instance_profilePagesStore.loading_screen = true

    //    if(familydetails.name == ''  || familydetails.dob == '' || familydetails.relationship == '' || familydetails.phone_number == " " ){
    //     toast.add({ severity: 'warn', summary: 'Warn Message', detail: 'Message Content', life: 3000 });
    //    }else{
    let id = fetch_data.current_user_id
    let url = `/add-family-info/${id}`;

    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        name: familydetails.name,
        relationship: familydetails.relationship,
        dob: dayjs(familydetails.dob).format('YYYY-MM-DD'),
        phone_number: familydetails.phone_number
    })
        .then((res) => {

            if (res.data.status == "success") {

                toast.add({ severity: 'success', summary: 'Updated', detail: 'Family information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(familydetails.dob, 'YYYY-MM-DD');
                _instance_profilePagesStore.employeeDetails.get_family_details.name = familydetails.gender;
                _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;
                _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = familydetails.phone_number;
            } else if (res.data.status == "failure") {
                // leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.fetchEmployeeDetails();
            _instance_profilePagesStore.loading_screen = false
        });
    // window.location.reload();
    DialogFamilyinfovisible.value = false;
}


// }

const diolog_EditFamilyDetails = (family) => {

    DialogEditInfovisible.value = true;

    current_table_id.value = family.id;

    Editfamilydetails.name = family.name
    Editfamilydetails.relationship = family.relationship
    Editfamilydetails.dob = family.dob
    Editfamilydetails.phone_number = family.phone_number


};

const diolog_DeleteFamilyDetails = (family) => {
    _instance_profilePagesStore.loading_screen = true


    current_table_id.value = family.id

    let id = fetch_data.current_user_id
    let url = ` /delete-family-info/${id}`;

    axios.post(url, {
        current_table_id: current_table_id.value,
    })
        .then((res) => {

            if (res.data.status == "success") {
                //  window.location.reload();
                toast.add({ severity: 'success', summary: 'Deleted', detail: 'General information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(familydetails.dob, 'YYYY-MM-DD');

                // _instance_profilePagesStore.employeeDetails.dob = dialog_general_information.dob;

                _instance_profilePagesStore.employeeDetails.get_family_details.name = familydetails.gender;
                _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;

                // _instance_profilePagesStore.employeeDetails.doj = dialog_general_information.doj;
                _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = familydetails.phone_number;
            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.loading_screen = false;
            _instance_profilePagesStore.fetchEmployeeDetails();
        })


}

const EditFamilyDetails = (user) => {
    _instance_profilePagesStore.loading_screen = true
    // console.log(id);
    let id = fetch_data.current_user_id
    let url = `/update-family-info/${id}`;
    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        current_table_id: current_table_id.value,
        name: Editfamilydetails.name,
        relationship: Editfamilydetails.relationship,
        dob: dayjs(Editfamilydetails.dob).format('YYYY-MM-DD'),
        phone_number: Editfamilydetails.phone_number
    })
        .then((res) => {

            if (res.data.status == "success") {

                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(Editfamilydetails.dob, 'YYYY-MM-DD');

                // _instance_profilePagesStore.employeeDetails.dob = dialog_general_information.dob;

                _instance_profilePagesStore.employeeDetails.get_family_details.name = Editfamilydetails.gender;
                _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;

                // _instance_profilePagesStore.employeeDetails.doj = dialog_general_information.doj;
                _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = Editfamilydetails.phone_number;
            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.fetchEmployeeDetails();
            _instance_profilePagesStore.loading_screen = false
        })
    // window.location.reload();
    DialogEditInfovisible.value = false;
}




onMounted(() => {

})


const isLetter = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z_ ]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

</script>


<style lang="scss">
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
    // color: #003056;
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

.p-dialog .p-dialog-header .p-dialog-title {
    font-weight: 700;
    font-size: 1.25rem;
    // color: #002f56;
}</style>

