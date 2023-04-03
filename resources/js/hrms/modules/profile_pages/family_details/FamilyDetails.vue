<template>
    <div class="card mb-2">
        <div class="card-body">
            <h6 class="">Family Information
                <!-- <span class="personal-edit">
                                        <a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#edit_familyInfo">

                                            </a>
                                    </span> -->
                <button type="button" class="btn_txt edit-icon" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    @click="visible = true">
                    <i class="ri-pencil-fill"></i>
                </button>
                <Dialog v-model:visible="visible" modal :style="{ width: '50vw', borderTop: '5px solid #002f56' }" id="">
                    <template #header>
                        <div>
                            <h5
                                :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                Family Information</h5>
                        </div>
                    </template>

                    <div class="space-between">
                        <div class="input_text flex-col">
                            <span>Name <span class="text-danger">*</span></span>
                            <input type="text" name="familyDetails_Name[]" pattern-data="name" id="familyDetails_Name"
                                required v-model="familydetails.name">
                        </div>
                        <div class="input_text flex-col">
                            <span>Relationship<span class="text-danger">*</span></span>
                            <input type="text" name="familyDetails_Relationship[]" v-model="familydetails.relationship"
                                id="familyDetails_Relationship" pattern-data="alpha" required>
                        </div>
                    </div>
                    <div class="space-between M-T">
                        <div class="input_text flex-col">
                            <span>Date of birth <span class="text-danger">*</span></span>
                            <input type="date" id="datemin" name="familyDetails_dob[]" min="2000-01-02"
                                v-model="familydetails.dob">
                        </div>

                        <div class="input_text flex-col">
                            <span>phone<span class="text-danger">*</span></span>
                            <input type="number" minlength="10" maxlength="10" pattern="[1-9]{1}[0-9]{9}" id="familyDetails_phoneNumber"
                                name="familyDetails_phoneNumber[]" v-model="familydetails.ph_no">
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
            <div class="table-responsive">
                <DataTable ref="dt" :value="PersonalDocument" dataKey="id" :paginator="true" :rows="10"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll">

                    <Column header="Name" field="name" style="min-width: 8rem">
                        <!-- <template #body="slotProps">
                        {{  slotProps.data.claim_type }}
                      </template> -->
                    </Column>

                    <Column field="relationship" header="Relationship" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template> -->
                    </Column>

                    <Column field="dob" header="Date of Birth " style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                        </template> -->
                    </Column>

                    <Column field="ph_no" header="Phone" style="min-width: 12rem">
                        <!-- <template #body="slotProps">
                          {{  slotProps.data.reimbursment_remarks }}
                        </template> -->
                    </Column>


                </DataTable>
                <!--<table class="table">
                                        <thead class="bg-primary">
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Relationship
                                            </th>
                                            <th>
                                                Date Of Birth
                                            </th>
                                            <th>
                                                Phone
                                            </th>
                                        </thead>
                                        <tbody>
                                                    <tr>
                                                        <td>
                                                        {{ $singledetail->name }}
                                                        </td>
                                                        <td>
                                                         {{ $singledetail->relationship }}
                                                        </td>
                                                        <td>
                                                         {{ date('d-M-Y', strtotime($singledetail->dob)) }}
                                                        </td>
                                                        <td>
                                                         {{ $singledetail->phone_number
                                                        </td>
                                                    </tr>

                                        </tbody>
                                    </table> -->
            </div>


            <!-- </form> -->
        </div>
    </div>
</template>
<script setup>

import { ref, onMounted, reactive, onUpdated } from 'vue';
import axios from 'axios'
import { useToast } from "primevue/usetoast";


const toast = useToast();

const PersonalDocument = ref('');
const visible = ref(false);

const familydetails = reactive({
    name: '',
    relationship: '',
    dob: '',
    ph_no: ''
})

const saveFamilyDetails = () => {

   if(familydetails.name == ''  || familydetails.dob == '' || familydetails.relationship == '' || familydetails.ph_no == " " || familydetails.ph_no.length >=10 ){
    toast.add({ severity: 'warn', summary: 'Warn Message', detail: 'Message Content', life: 3000 });
   }else{
    let url = 'http://localhost:3000/posts';
    toast.add({ severity: 'success', summary: 'Success Message', detail: 'Message Content', life: 3000 });

visible.value = false

console.log(familydetails);

axios.post(url, familydetails).then(res => {
    console.log("sent sucessfully");
}).catch(err => {
    console.log(err);
}).finally(() => {
    console.log("completed");
})
   }
}


onMounted(() => {
    fetchData();
})


const fetchData= ()=>{
    let url = 'http://localhost:3000/posts'
    axios.get(url)
        .then((response) => {
            console.log(response.data);
            PersonalDocument.value = response.data;
        });
}

</script>


<style lang="scss">
.main-content {
    width: 85%;
}

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

.p-dialog .p-dialog-header .p-dialog-title {
    font-weight: 700;
    font-size: 1.25rem;
    color: #002f56;
}
</style>

{
<!--
<template>
    <div class="card flex justify-content-center">
        <Button label="Show" icon="pi pi-external-link" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </Dialog>
    </div>
</template>

<script setup>

</script> -->
}
