<template>
    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="font-semibold text-lg">Family Information
                <button type="button" class="float-right btn btn-orange"
                    @click="DialogFamilyinfovisible = true" >
                    Add New
                </button>

                <Dialog v-model:visible="DialogFamilyinfovisible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }" id="">
                    <template #header>
                        <div>
                            <h5
                                :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }" class="fw-bold fs-15">
                                Family Information</h5>
                        </div>
                    </template>

                    <div class="space-between">
                        <div class="flex-col input_text">
                            <span>Name <span class="text-danger">*</span></span>
                            <input type="text" name="familyDetails_Name[]" pattern-data="name" id="familyDetails_Name"
                                required  v-model="familydetails.name">
                        </div>
                        <div class="flex-col input_text">
                            <span>Relationship<span class="text-danger">*</span></span>
                            <input type="text" name="familyDetails_Relationship[]" v-model="familydetails.relationship"
                                id="familyDetails_Relationship" pattern-data="alpha" required>
                        </div>
                    </div>
                    <div class="space-between M-T mr-4">
                        <div class="flex-col input_text">
                            <span>Date of birth <span class="text-danger">*</span></span>
                            <Calendar dateFormat="dd/mm/yy" v-model="familydetails.dob"  class="h-10 w-full" :minDate="minDate" :maxDate="maxDate" />
                            <!-- <input type="date" id="datemin" name="familyDetails_dob[]" min="2000-01-02" > -->
                        </div>

                        <div class="flex-col input_text">
                            <span>phone<span class="text-danger">*</span></span>
                                <input type="text" size=20 maxlength=10 name="mobile_number" class="form-control"
                                        v-model="familydetails.phone_number">
                        </div>
                    </div>



                    <template #footer>
                        <Toast/>
                      <div>
                        <button type="button" class="submit_btn warning success" id="submit_button_family_details"
                            @click="saveFamilyDetails">submit</button>
                      </div>

                    </template>


                </Dialog>





            </h6>
            <!-- {{ _instance_profilePagesStore.employeeDetails.get_family_details }} -->
            <div class="my-6 table-responsive">
                <DataTable ref="dt"  dataKey="id" :paginator="true" :rows="10" :value="_instance_profilePagesStore.employeeDetails.get_family_details"
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

                            <button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"
                                @click="diolog_EditFamilyDetails(slotProps.data)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>

                            </button>
                            <button class="p-2 bg-red-200 border-red-500 rounded-xl"
                                @click="diolog_DeleteFamilyDetails(slotProps.data)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-5 h-5 font-bold">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
<!--
                            <button class="mr-3 btn btn-success"  @click="diolog_EditFamilyDetails(slotProps.data)">Edit</button>
                            <button class="btn btn-danger"  @click="diolog_DeleteFamilyDetails(slotProps.data)">Delete</button> -->


                        <template>
                        </template>
                        <!-- <Button icon="pi pi-pencil" label="edit" outlined rounded class="mr-2" @click="editFamilyDetails(slotProps.data)" />
                        <Button icon="pi pi-trash" outlined rounded severity="danger" @click="confirmDeleteProduct(slotProps.data)" /> -->
                    </template>
                </Column>


                </DataTable>

            </div>

        </div>
    </div>



    <Dialog v-model:visible="DialogEditInfovisible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }" >
        <template #header>
            <div>
                <h5
                    :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                    Family Information</h5>
            </div>
        </template>

        <div class="space-between">
            <div class="flex-col input_text">
                <span>Name <span class="text-danger">*</span></span>
                <input type="text" name="familyDetails_Name[]" pattern-data="name" v-model="Editfamilydetails.name"
                    required >
            </div>
            <div class="flex-col input_text">
                <span>Relationship<span class="text-danger">*</span></span>
                <input type="text" name="familyDetails_Relationship[]"
                     pattern-data="alpha" v-model="Editfamilydetails.relationship" required>
            </div>
        </div>
        <div class="space-between M-T">
            <div class="flex-col input_text">
                <span>Date of birth <span class="text-danger">*</span></span>
                <input type="date" id="datemin" name="familyDetails_dob[]" min="2000-01-02"
                 v-model="Editfamilydetails.dob" >
            </div>

            <div class="flex-col input_text">
                <span>phone<span class="text-danger">*</span></span>
                <!-- <input type="number"  size=20 maxlength=10  id="familyDetails_phoneNumber"
                    name="familyDetails_phoneNumber[]"  > -->
                    <input type="text" size=20 maxlength=10 name="mobile_number" class="form-control"
            v-model="Editfamilydetails.phone_number">
                    <!-- <InputNumber  inputId="minmax" :min="0" :max="10"  v-model="Editfamilydetails.phone_number" /> -->
            </div>
        </div>

        <template #footer>
            <Toast/>
        <div>
            <button type="button" class="submit_btn warning success" id="submit_button_family_details"
                @click="EditFamilyDetails">submit</button>
        </div>

        </template>


</Dialog>

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
            dob: dayjs( familydetails.dob ).format('YYYY-MM-DD'),
            phone_number: familydetails.phone_number
        })
        .then((res) => {

            if (res.data.status == "success") {

                toast.add({ severity: 'success', summary: 'Updated', detail: 'Family information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(familydetails.dob,'YYYY-MM-DD' );

                // _instance_profilePagesStore.employeeDetails.dob = dialog_general_information.dob;

                _instance_profilePagesStore.employeeDetails.get_family_details.name = familydetails.gender;
                _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;

                // _instance_profilePagesStore.employeeDetails.doj = dialog_general_information.doj;
                _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = familydetails.phone_number;
            } else if (res.data.status == "failure") {
                // leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(()=>{
            _instance_profilePagesStore.fetchEmployeeDetails();
            _instance_profilePagesStore.loading_screen = false
            });
        // window.location.reload();
        DialogFamilyinfovisible.value = false;
    }


// }

const diolog_EditFamilyDetails = (family) => {

    DialogEditInfovisible.value = true;

    current_table_id.value= family.id;

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
                _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(familydetails.dob,'YYYY-MM-DD' );

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
        }).finally(()=>{
            _instance_profilePagesStore.loading_screen = false;
            _instance_profilePagesStore.fetchEmployeeDetails();
        })


}

 const EditFamilyDetails = (user)=>{
    _instance_profilePagesStore.loading_screen = true
            // console.log(id);
            let id = fetch_data.current_user_id
    let url =`/update-family-info/${id}`;
    axios.post(url, {
            user_code: _instance_profilePagesStore.employeeDetails.user_code,
            current_table_id: current_table_id.value,
            name: Editfamilydetails.name,
            relationship: Editfamilydetails.relationship,
            dob:  dayjs( Editfamilydetails.dob ).format('YYYY-MM-DD'),
            phone_number: Editfamilydetails.phone_number
        })
        .then((res) => {

            if (res.data.status == "success") {

                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(Editfamilydetails.dob,'YYYY-MM-DD' );

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
        }).finally(()=>{
            _instance_profilePagesStore.fetchEmployeeDetails();
            _instance_profilePagesStore.loading_screen = false
        })
        // window.location.reload();
        DialogEditInfovisible.value = false;
    }




onMounted(() => {

})


</script>


<style lang="scss">


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
    color: #002f56;
}
</style>
