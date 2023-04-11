<template>
     <Toast />
    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="">General Information
                <!-- Button trigger modal -->
                <a type="button" class="edit-icon" @click="onClick_EditButton_GeneralInfo">
                    <i class="ri-pencil-fill"></i>
                </a>

                <Dialog v-model:visible="is_dialog_generalInfo_visible" modal header="General Information"
                    :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                    <template #header>
                        <div>
                            <h5
                                :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                General Information</h5>
                        </div>
                    </template>

                    <div class="row">
                        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                            <div class="mb-3 form-group">
                                <label :style="{ marginLeft: '10px' }">Birth Date<span class="text-danger">*</span>
                                </label>
                                <div class="cal-icon">
                                    <Calendar showIcon class="mb-3 form-selects" v-model="dialog_general_information.dob"
                                        placeholder="DD-MM-YYYY" dateFormat="dd-mm-yy" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                            <div class="mb-3 form-group">
                                <label>Gender<span class="text-danger">*</span></label>

                                <Dropdown v-model="dialog_general_information.gender" :options="options_gender" optionLabel="name"
                                    optionValue="value" placeholder="Choose Gender" class="form-selects" />

                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                            <div class="mb-3 form-group">
                                <label :style="{ marginLeft: '10px' }">Date Of Joining(DOJ)<span
                                        class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <Calendar showIcon class="mb-3 form-selects" v-model="dialog_general_information.doj"
                                        placeholder="DD-MM-YYYY" dateFormat="dd-mm-yy"  />
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                            <div class="mb-3 form-group">
                                <label>Blood Group<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <Dropdown v-model="dialog_general_information.blood_group_id" :options="options_blood_group"
                                        optionLabel="name" optionValue="id" placeholder="Select Bloodgroup" class="form-selects" />
                                </div>
                                {{dialog_general_information.blood_group_id  }}

                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                            <div class="mb-3 form-group" :style="{ marginLeft: '10px' }">
                                <label>Marital status <span class="text-danger">*</span></label>
                                <Dropdown v-model="dialog_general_information.marital_status_id" :options="option_maritals_status"
                                    optionLabel="name" optionValue="id" placeholder="Select Marital Status"
                                    class="form-selects" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                            <div class="mb-3 form-group">
                                <label>Physically Handicapped</label>
                                <Dropdown v-model="dialog_general_information.physically_challenged"
                                    :options="options_phy_challenged" optionLabel="name" optionValue="value"
                                    placeholder="Select" class="form-selects" />
                            </div>
                        </div>
                    </div>
                    <div class="text-right col-12">
                        <button id="btn_submit_generalInfo" class="btn btn-border-orange submit-btn"
                            @click="saveGeneralInformationDetails()">Save</button>
                    </div>
                </Dialog>

            </h6>
            <div>
                <ul class="personal-info">
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title">Birthday</div>
                        <div class="text">
                            {{ _instance_profilePagesStore.employeeDetails.get_employee_details.dob.slice(8,10)+ "-" + _instance_profilePagesStore.employeeDetails.get_employee_details.dob.slice(5,7)+"-"+_instance_profilePagesStore.employeeDetails.get_employee_details.dob.slice(0,4) }}
                            <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_details.dob}} -->

                        </div>
                    </li>
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title">Gender </div>
                        <div class="text">
                            <!-- {{ emp_details.gender.name }} -->
                            {{ computedGenderValue }}


                        </div>
                    </li>
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title">Date Of Joining (DOJ)</div>
                        <div class="text">
                            {{ _instance_profilePagesStore.employeeDetails.get_employee_details.doj .slice(8,10)+ "-" + _instance_profilePagesStore.employeeDetails.get_employee_details.doj .slice(5,7)+"-"+_instance_profilePagesStore.employeeDetails.get_employee_details.doj.slice(0,4) }}
                            <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_details.doj }} -->

                        </div>
                    </li>
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title">Marital Status </div>
                        <div class="text text-capitalize">
                            <!-- {{ emp_details.marital_status_id.name }} -->
                            <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id }} -->
                            {{ computedMarital_StatusValue }}

                        </div>
                    </li>
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title"> Blood Group</div>
                        <div class="text" >
                            <!-- {{ emp_details.blood_group_id.name }} -->
<!---->
                         <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id  }} -->
                            {{ cmpBldGrp }}
                            <!-- {{  _instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id }} -->

                        </div>
                    </li>
                    <li class="pb-1 ">
                        <div class="title">Physically Handicapped</div>
                        <div class="text">
                            <!-- {{ emp_details.blood_group_id.physically_challenged }} -->
                            <!-- {{ _instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged }} -->

                            {{ computedPhy_challenged }}

                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>


    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="">Contact Information
                <span class="personal-edit"><a href="#" class="edit-icon"
                        @click="onClick_EditButtonContacttInfo" ><i class="ri-pencil-fill"></i></a>
                </span>

                <Dialog v-model:visible="ContactVisible"   modal header="Contact Information"
                    :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                    <template #header>
                        <div>
                            <h5
                                :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                Contact Information</h5>
                        </div>
                    </template>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <label>Personal Email</label>
                                    <input type="email" name="present_email" class="form-control"
                                        v-model="dailog_contactinfo.email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <label> Office Email</label>
                                    <input type="email" class="form-control" name="officical_mail"
                                        v-model="dailog_contactinfo.official_email">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="mb-3 form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" size=20 maxlength=10 name="mobile_number" class="form-control"
                                        v-model="dailog_contactinfo.mobile_number">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3 form-group">
                                    <label>Official Mobile Number</label>
                                    <input type="text" size=20 maxlength=10 name="official_mobile_number" class="form-control"
                                        v-model="dailog_contactinfo.official_mobile_number">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-right">
                                    <button  class="btn btn-border-orange submit-btn"
                                        @click="save_contactinfoDetails">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </Dialog>
            </h6>
            <div>
                <ul class="personal-info">
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title">Personal Email</div>
                        <div class="text">
                            {{ _instance_profilePagesStore.employeeDetails.email }}

                        </div>
                    </li>
                    <li class="pb-1 border-bottom-liteAsh">
                        <div class="title">Official Email</div>
                        <div class="text">
                            {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail }}

                        </div>
                    </li>
                    <li class="pb-1 ">
                        <div class="title">Mobile Number</div>
                        <div class="text">

                            {{ _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number }}

                        </div>
                    </li>
                    <li class="pb-1 ">
                        <div class="title">Official Mobile Number</div>
                        <div class="text">

                            {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.official_mobile }}

                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </div>
    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="">Address
                <span class="personal-edit"><a href="#" class="edit-icon"
                        @click="onClick_EditButtonAddressInfo"><i class="ri-pencil-fill"></i></a></span>

                <Dialog v-model:visible="addressVisible" modal header
                    :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                    <template #header>
                        <div>
                            <h5
                                :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                Address Information</h5>
                        </div>
                    </template>

                    <div class="modal-body">

                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label>Current Address</label>
                                <textarea name="current_address_line_1" id="current_address_line_1" cols="30" rows="3"
                                    class="form-control" v-model="diolog_Addressinfo.current_address"></textarea>
                            </div>
                            <div class="mb-3 form-group">
                                <label>Permanent Address </label>
                                <textarea name="permanent_address_line_1" id="permanent_address_line_1" cols="30" rows="3"
                                    class="form-control" v-model="diolog_Addressinfo.Permanent_Address"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="text-right">
                                <Toast />
                                <button id="btn_submit_address" class="btn btn-border-orange submit-btn warn"
                                    @click="saveAddressinfoDetails" severity="warn">Save</button>
                            </div>
                        </div>

                    </div>


                </Dialog>
            </h6>
            <div>
                <div class="row">
                    <div class="col-6">
                        <ul class="personal-info">
                            <li class="pb-1 border-bottom-liteAsh flex-column">
                                <div class="title">Current Address </div>
                                <div class="text">
                                    {{ _instance_profilePagesStore.employeeDetails.get_employee_details.current_address_line_1 }}

                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="personal-info">
                            <li class="pb-1 border-bottom-liteAsh flex-column">
                                <div class="title">Permanent Address </div>
                                <div class="text">
                                    {{ _instance_profilePagesStore.employeeDetails.get_employee_details.permanent_address_line_1 }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script setup>

import { ref, onMounted, reactive, computed } from "vue";
import moment from "moment";
import { useNow, useDateFormat } from '@vueuse/core'

import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";

import axios from "axios";

import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'

const fetch_data = Service()

const _instance_profilePagesStore = profilePagesStore()



const toast = useToast();
const Addresstoast = useToast();

const is_dialog_generalInfo_visible = ref(false);
const ContactVisible = ref(false);
const addressVisible = ref(false);


//Used inside dialog elements
const dialog_general_information = reactive({
    dob: '',
    gender: '',
    doj: '',
    blood_group_id: '',
    marital_status_id: '',
    physically_challenged: ''
});

const options_gender = ref([
    { name: "Male", value: "male" },
    { name: "Female", value: "female" },
    { name: "Others", value: "others" },
]);

const computedGenderValue = computed(() => {
    if(_instance_profilePagesStore.employeeDetails.get_employee_details.gender == 'male')
        return "Male";
    else
    if(_instance_profilePagesStore.employeeDetails.get_employee_details.gender == 'female')
        return "Female";
        // return ""
    else
    if(_instance_profilePagesStore.employeeDetails.get_employee_details.gender == 'others')
        return "Others";

    else
        return "-"

})
const computedMarital_StatusValue = computed(()=>{
    if(_instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id == 1) return "Unmarried";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id == 2) return "Married";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id == 3) return "Separated";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id == 4) return "Widowed";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id == 5) return "Divorced";
    // "Widowed Divorced"
})
const cmpBldGrp =computed(()=>{
    if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id  == 1) return "A Positive";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id ==2) return "A Negative";
    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 3) return "B Positive";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id ==4) return "B Negative";


    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id ==5) return "AB Positive";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id ==6) return "AB Negative";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 7) return "O Positive";

    else if(_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 8) return "O Negative";



})

const computedPhy_challenged = computed(()=>{

if( _instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged == "no") return "No";

if( _instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged =="yes") return "Yes";

})

const options_phy_challenged = ref([
    { name: "Yes", value: "yes" },
    { name: "No", value: "no" },
]);

const options_blood_group = ref();
const option_maritals_status = ref();

const confirm = useConfirm();


onMounted(() => {

    fetch_data.getBloodGroups().then((result) => {
        console.log(result.data);
        options_blood_group.value = result.data;
    });

    fetch_data.getMaritalStatus().then((result) => {
        console.log(result);
        option_maritals_status.value = result.data;
    });

    //_instance_profilePagesStore

});

function onClick_EditButton_GeneralInfo(){
    console.log("Opening General Info Dialog");

    // Assign json values into dialog elements also

    dialog_general_information.dob = _instance_profilePagesStore.employeeDetails.get_employee_details.dob;

    dialog_general_information.doj = _instance_profilePagesStore.employeeDetails.get_employee_details.doj;

    dialog_general_information.marital_status_id = parseInt(_instance_profilePagesStore.employeeDetails.get_employee_details.marital_status_id);
    // dialog_general_information.marital_status_id =4;

    dialog_general_information.gender = _instance_profilePagesStore.employeeDetails.get_employee_details.gender;

    dialog_general_information.blood_group_id = parseInt( _instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id);

    // dialog_general_information.blood_group_id = 3;
    dialog_general_information.physically_challenged = _instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged;

    is_dialog_generalInfo_visible.value = true;

}



function saveGeneralInformationDetails() {
    console.log("Called saveGeneralInformationDetails.... ");
    let id = fetch_data.current_user_id
    let url = `/profile-pages-update-generalinfo/${id}`

    axios.post(url, {
            user_code: _instance_profilePagesStore.employeeDetails.user_code,
            dob: dialog_general_information.dob,
            gender: dialog_general_information.gender,
            marital_status_id: dialog_general_information.marital_status_id,
            doj: dialog_general_information.doj,
            blood_group_id: dialog_general_information.blood_group_id,
            physically_challenged: dialog_general_information.physically_challenged,
        })
        .then((res) => {

            if (res.data.status == "success") {
                 window.location.reload();
                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_employee_details.dob = useDateFormat(dialog_general_information.dob,'YYYY-MM-DD' );
                // _instance_profilePagesStore.employeeDetails.dob = dialog_general_information.dob;
                _instance_profilePagesStore.employeeDetails.gender = dialog_general_information.gender;
                _instance_profilePagesStore.employeeDetails.marital_status_id = dialog_general_information.marital_status_id;
                // _instance_profilePagesStore.employeeDetails.doj = dialog_general_information.doj;
                _instance_profilePagesStore.employeeDetails.get_employee_details.doj = dialog_general_information.doj;
                _instance_profilePagesStore.employeeDetails.blood_group_id = dialog_general_information.blood_group_id;
                _instance_profilePagesStore.employeeDetails.physically_challenged = dialog_general_information.physically_challenged;
            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        });

        is_dialog_generalInfo_visible.value = false


            window.location.reload();

}

const contact_details = ref();

const dailog_contactinfo = reactive({
    email: "",
    official_email: "",
    mobile_number: "",
    official_mobile_number: ""

});

function onClick_EditButtonContacttInfo(){
    console.log("Opening General Info Dialog : ");

    // Assign json values into dialog elements also

    dailog_contactinfo.email = _instance_profilePagesStore.employeeDetails.email;
    dailog_contactinfo.official_email = _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail;
    // dailog_contactinfo.mobile_number = _instance_profilePagesStore.employeeDetails.get_employee_office_details.mobile_number;
    console.log("Mobile number : "+_instance_profilePagesStore.employeeDetails.mobile_number);

    dailog_contactinfo.mobile_number = parseInt(_instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number);
    dailog_contactinfo.official_mobile_number = parseInt(_instance_profilePagesStore.employeeDetails.get_employee_office_details.official_mobile);

    console.log("testing");

    ContactVisible.value = true;

    // console.log(ContactVisible.value);
}

function save_contactinfoDetails(){
    console.log("testing contact");

    let id = fetch_data.current_user_id
    let url = `/profile-pages-update-contactinfo/${id}`;

    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        email:dailog_contactinfo.email,
        officical_mail:dailog_contactinfo.official_email,
        mobile_number:dailog_contactinfo.mobile_number,
        official_mobile_number:dailog_contactinfo.official_mobile_number
        })
        .then((res) => {

            if (res.data.status == "success") {
                console.log("Updating mobile number : "+ dailog_contactinfo.mobile_number);
                _instance_profilePagesStore.employeeDetails.email =  dailog_contactinfo.email
                _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail =  dailog_contactinfo.official_email
                _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number =  dailog_contactinfo.mobile_number
                _instance_profilePagesStore.employeeDetails.get_employee_office_details.official_mobile =  dailog_contactinfo.official_mobile_number

            } else if (res.data.status == "failure") {
                contact_details.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        });

        ContactVisible.value = false;

        window.location.reload();

}



const addressUpdateDetails = ref();

const diolog_Addressinfo = reactive({
    current_address: "",
    Permanent_Address: ""
});

function onClick_EditButtonAddressInfo(){
    console.log("Opening General Info Dialog");

    // Assign json values into dialog elements also

    diolog_Addressinfo.current_address = _instance_profilePagesStore.employeeDetails.get_employee_details.current_address_line_1;
    diolog_Addressinfo.Permanent_Address = _instance_profilePagesStore.employeeDetails.get_employee_details.permanent_address_line_1;
    // diolog_Addressinfo.Permanent_Address = "testing"


    addressVisible.value = true;

    // console.log(ContactVisible.value);
}

const saveAddressinfoDetails = () => {

    if (diolog_Addressinfo.current_address == " " || diolog_Addressinfo.Permanent_Address == " ") {
        Addresstoast.add({ severity: 'warn', summary: 'Warn Message', detail: 'Message Content', life: 3000 });
        console.log(Addressinfo);
    }
    else {
        let id = fetch_data.current_user_id
       let url = `/profile-pages-update-address_info/${id}`;

    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        current_address_line_1: diolog_Addressinfo.current_address,
        permanent_address_line_1:diolog_Addressinfo.Permanent_Address

        })
        .then((res) => {
            data_checking.value = false;
            if (res.data.status == "success") {

                _instance_profilePagesStore.employeeDetails.current_address_line_1 =  diolog_Addressinfo.current_address
                _instance_profilePagesStore.employeeDetails.get_employee_office_details.permanent_address_line_1 =  diolog_Addressinfo.Permanent_Address

            } else if (res.data.status == "failure") {
                addressUpdateDetails.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        });

        addressVisible.value = false;

        window.location.reload();
    }

}






</script>

<style scoped>
.p-dropdown .p-dropdown-label.p-placeholder {
    position: relative;
    top: -5px;
    border: 1px solid red;
    color: #6c757d;
}

.p-button .p-fileupload-choose {
    /* height: 2.1em; */
}

i,
span,
.tabview-custom {
    vertical-align: middle;
}

span {
    margin: 0 0.5rem;
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

dialog>header {
    color: #002f56 !important;
}

.form-selects {
    padding: 0;
    width: 100%;
    height: 2.5rem;
}

.save {
    border: 1px solid #e63b1f;
    color: #e63b1f;
}

.p-dialog-header {
    border-left: #e63b1f 5px solid !important;
}

.form-selects ::-webkit-scrollbar {
    width: 10px !important;
    border-radius: 12px !important;
}

/* Track */
.form-selects ::-webkit-scrollbar-track {
    background: #f1f1f1 !important;
}

/* Handle */
.form-selects ::-webkit-scrollbar-thumb {
    background: #888 !important;
    border-radius: 12px !important;
}

/* Handle on hover */
.form-selects ::-webkit-scrollbar-thumb:hover {
    background: #252222 !important;
    border-radius: 12px !important;
}

Dialog {
    color: #002f56;
}
</style>


{


<!--
<template>
    <div class="card">
        <Message :closable="false">Message Content</Message>
    </div>
</template>

<script setup>
</script>


-->

}


