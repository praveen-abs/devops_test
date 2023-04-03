<template>
    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="">General Information
                <!-- Button trigger modal -->
                <a type="button" class="edit-icon" @click="visible = true">
                    <i class="ri-pencil-fill"></i>
                </a>

                <Dialog v-model:visible="visible" modal header="General Information" :style="{ width: '50vw',border:'5p solid var(--color-primary_blue)' }">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                                        <div class="mb-3 form-group">
                                            <label :style="{ marginLeft: '10px' }">Birth Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <Calendar showIcon class="mb-3 form-selects"
                                                    v-model="general_information.birth_date" placeholder="9999-12-31" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                                        <div class="mb-3 form-group">
                                            <label>Gender<span class="text-danger">*</span></label>

                                            <Dropdown v-model="general_information.gender" :options="options_gender"
                                                optionLabel="name" placeholder="Choose Gender" class="form-selects" />

                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                                        <div class="mb-3 form-group">
                                            <label :style="{ marginLeft: '10px' }">Date Of Joining(DOJ)<span
                                                    class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <Calendar showIcon class="mb-3 form-selects"
                                                    v-model="general_information.date_of_joining"
                                                    placeholder="9999-12-31" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                                        <div class="mb-3 form-group">
                                            <label>Blood Group<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <Dropdown v-model="general_information.blood_group_id"
                                                    :options="options_blood_group" optionLabel="name"
                                                    placeholder="Select Bloodgroup" class="form-selects" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                                        <div class="mb-3 form-group" :style="{ marginLeft: '10px' }">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <Dropdown v-model="general_information.marital_status_id"
                                                :options="option_maritals_status" optionLabel="name"
                                                placeholder="Select Marital Status" class="form-selects" />

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-xxl-6">
                                        <div class="mb-3 form-group">
                                            <label>Physically Handicapped</label>
                                            <Dropdown v-model="general_information.phy_handicapped"
                                                :options="options_phy_challenged" optionLabel="name" placeholder="Select"
                                                class="form-selects" />
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right col-12">
                                    <Toast />
                                    <ConfirmDialog></ConfirmDialog>
                                    <button id="btn_submit_generalInfo" class="btn btn-border-orange submit-btn"
                                        @click="general_information_save()">Save</button>
                                </div>

                </Dialog>
            </h6>
            <ul class="personal-info" v-for="emp_details in employee_details"  :key="emp_details.id">
                <li class="pb-1 border-bottom-liteAsh" >
                    <div class="title">Birthday</div>
                    <div class="text">

                        {{ emp_details.doj.slice(8,10)+ "-" + emp_details.doj.slice(5,7)+"-"+emp_details.doj.slice(0,4) }}
                    </div>
                </li>
                <li class="pb-1 border-bottom-liteAsh">
                    <div class="title">Gender </div>
                    <div class="text">
                        {{ emp_details.gender.name }}
                    </div>
                </li>
                <li class="pb-1 border-bottom-liteAsh">
                    <div class="title">Date Of Joining (DOJ)</div>
                    <div class="text">
                        {{ emp_details.doj.slice(8,10)+ "-" + emp_details.doj.slice(5,7)+"-"+emp_details.doj.slice(0,4) }}
                    </div>
                </li>
                <li class="pb-1 border-bottom-liteAsh">
                    <div class="title">Marital Status </div>
                    <div class="text text-capitalize">
                        {{ emp_details.marital_status_id.name }}
                    </div>
                </li>
                <li class="pb-1 border-bottom-liteAsh">
                    <div class="title"> Blood Group</div>
                    <div class="text">
                        {{ emp_details.blood_group_id.name }}
                    </div>
                </li>
                <li class="pb-1 ">
                    <div class="title">Physically Handicapped</div>
                    <div class="text">
                        {{ emp_details.blood_group_id.physically_challenged }}
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="">Contact Information
                <span class="personal-edit"><a href="#" class="edit-icon"
                        data-bs-target="#personal_info_modal" @click="contactVisible = true"><i class="ri-pencil-fill"></i></a>
                </span>

                <Dialog v-model:visible="contactVisible" modal header="Contact Information" :style="{ width: '50vw' ,boredTop:'5px solid #003056' }">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Personal Email</label>
                                    <input type="email" name="present_email"
                                        class="form-control" v-model="contactinfo.personal_email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label> Office Email</label>
                                    <input type="email"
                                        class="form-control" name="officical_mail" v-model="contactinfo.office_email">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group mb-3">
                                    <label>Mobile Number</label>
                                    <input type="text" size=20 maxlength=10 name="mobile_number"
                                     class="form-control"  v-model="contactinfo.mobile_number">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-right">
                                    <button id="btn_submit_contact_info"
                                        class="btn btn-border-orange submit-btn"  @click="savecontactInfoDetails()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </Dialog>
            </h6>

            <ul class="personal-info">
                <li class="pb-1 border-bottom-liteAsh">
                    <div class="title">Personal Email</div>
                    <div class="text">
                        <!-- {{ $user->email }} -->
                    </div>
                </li>
                <li class="pb-1 border-bottom-liteAsh">
                    <div class="title">Office Email</div>
                    <div class="text">
                        <!-- {{ !empty($user_full_details->officical_mail) ? $user_full_details->officical_mail : '-' }} -->
                    </div>
                </li>
                <li class="pb-1 ">
                    <div class="title">Mobile Number</div>
                    <div class="text">
                        <!-- {{ !empty($user_full_details->mobile_number) ? $user_full_details->mobile_number : '-' }} -->
                    </div>
                </li>
            </ul>


        </div>

    </div>
    <div class="mb-2 card">
        <div class="card-body">
            <h6 class="">Address
                <span class="personal-edit"><a href="#" class="edit-icon"
                        data-bs-target="#edit_addressInfo" @click="addressVisible=true"><i class="ri-pencil-fill"></i></a></span>

                        <Dialog v-model:visible="addressVisible" modal header="Address Information" :style="{ width: '50vw' ,boredTop:'5px solid #003056' }">

                                        <div class="modal-body">

                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label>Current Address</label>
                                                    <textarea name="current_address_line_1" id="current_address_line_1" cols="30" rows="3"
                                                        class="form-control" v-model="Addressinfo.current_address"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Permanent Address </label>
                                                    <textarea name="permanent_address_line_1" id="permanent_address_line_1" cols="30" rows="3"
                                                        class="form-control"  v-model="Addressinfo.Permanent_Address"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="text-right">
                                                    <Toast />
                                                    <button
                                                        id="btn_submit_address" class="btn btn-border-orange submit-btn warn" @click="saveAddressinfo" severity="warn">Save</button>
                                                </div>
                                            </div>

                                        </div>


                        </Dialog>
            </h6>
            <div class="row">
                <div class="col-6">
                    <ul class="personal-info">
                        <li class="pb-1 border-bottom-liteAsh flex-column">
                            <div class="title">Current Address </div>
                            <div class="text">
                                <!-- {{ $user_full_details->current_address_line_1 ?? '' }} -->
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="personal-info">
                        <li class="pb-1 border-bottom-liteAsh flex-column">
                            <div class="title">permanent Address </div>
                            <div class="text">
                                <!-- {{ $user_full_details->permanent_address_line_1 ?? '' }} -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</template>


<script setup>
import { ref, onMounted, reactive } from "vue";
import moment from "moment";

import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";

import axios from "axios";

import { Service } from "../Service/Service";

const fetch_data = Service()

const toast = useToast();
const Addresstoast = useToast();

    const visible = ref(false);
    const contactVisible = ref(false);
    const addressVisible = ref(false);


const employee_details = ref()

const general_information = reactive({
    birth_date: "",
    gender: "",
    date_of_joining: "",
    blood_group_id: "",
    marital_status_id: "",
    phy_handicapped: "",
});

const options_gender = ref([
    { name: "Male", value: "male" },
    { name: "Female", value: "female" },
    { name: "Others", value: "others" },
]);

const options_phy_challenged = ref([
    { name: "Yes", value: "yes" },
    { name: "No", value: "no" },
]);

const options_blood_group = ref();
const option_maritals_status = ref();

const confirm = useConfirm();

function saveGeneralInformationDetails() {
    console.log("Called saveGeneralInformationDetails.... ");
    let url =  'http://localhost:3000/Empdetails'
  // let url = window.location.origin + "/profile-pages-update-generalinfo/";

    axios
        .post(url,{
            user_id: general_information.user_id,
            dob: general_information.birth_date,
            gender: general_information.gender,
            marital_status_id: general_information.marital_status_id,
            doj: general_information.date_of_joining,
            blood_group_id: general_information.blood_group_id,
            physically_challenged: general_information.phy_handicapped,
        })
        .then((res) => {
            data_checking.value = false;
            if (res.data.status == "success") {
            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        });
}

    const general_information_save = ()=>{

        // location.reload();
        console.log(general_information);
        confirm.require({
                    message: 'Are you sure you want to proceed?',
                    header: 'Confirmation',
                    icon: 'pi pi-exclamation-triangle',
                    accept: () => {

                        saveGeneralInformationDetails();

                    },
                    reject: () => {
                        toast.add({ severity: 'error', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
                    }
        });
    }


  const fetchGeneralInformationDetails = () =>{
    let url ="http://localhost:3000/Empdetails"
    axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        console.log(response.data);
        employee_details.value = response.data;
        // loading.value = false;
    });
}


onMounted(() => {
  fetchGeneralInformationDetails()
  fetch_data.getBloodGroups().then((result) => {
        console.log(result);
        options_blood_group.value = result.data;
    });

    fetch_data.getMaritalStatus().then((result) => {
        console.log(result);
        option_maritals_status.value = result.data;
    });
    fetchcontactInfoDetails();
    fetchAddressInfoDetails();

});

const contact_details = ref();

const contactinfo = reactive({
    personal_email:"",
    office_email:"",
    mobile_number:""

});

const savecontactInfoDetails =()=>{
    console.log("calling saveinfoDetails");


    let url = 'http://localhost:3000/contact'

    axios.post(url,{
        user_id: contactinfo.user_id,
        present_email:contactinfo.personal_email,
        officical_mail:contactinfo.office_email,
        mobile_number:contactinfo.mobile_number
    })
    .then((res)=>{
            if (res.data.status == "success") {
            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }

    }).catch((err)=>{
        console.log(err);
    })

}
const fetchcontactInfoDetails = () =>{
    let url ='http://localhost:3000/contact'
    axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        console.log(response.data);
        contact_details.value = response.data;
        // loading.value = false;
    });
}

const addressUpdateDetails = ref();

const Addressinfo = reactive({
  current_address:"",
  Permanent_Address:""
});

const saveAddressinfo=()=>{

    console.log("calling saveinfoDetails");
    if(Addressinfo.current_address ==" " || Addressinfo.Permanent_Address == " "){
        Addresstoast.add({ severity: 'warn', summary: 'Warn Message', detail: 'Message Content', life: 3000 });
        console.log(Addressinfo);
    }
    else{
        let url = 'http://localhost:3000/Address_details';
        console.log("hello");
        axios.post(url,{
        user_id: Addressinfo.user_id,
        current_address_line_1:Addressinfo.current_address,
        permanent_address_line_1:Addressinfo.Permanent_Address
        }).then((res)=>{
            if(res.data.status == "success"){

            }else if(res.data.status == "failure"){
                console.log(res.data.message);
            }
        }).catch((err)=>{
            console.log(err);
        });
    }

}

const fetchAddressInfoDetails = ()=>{
    let url ='http://localhost:3000/Address_details'
    axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        console.log(response.data);
        addressUpdateDetails.value = response.data;
        // loading.value = false;
    });
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

    <div class="flex flex-wrap gap-2 card justify-content-center">
        <Button @click="confirm1()" icon="pi pi-check" label="Confirm"></Button>
        <Button @click="confirm2()" icon="pi pi-times" label="Delete"></Button>
    </div>
</template>

<script setup>
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

const confirm = useConfirm();
const toast = useToast();

const confirm1 = () => {
    confirm.require({
        message: 'Are you sure you want to proceed?',
        header: 'Confirmation',
        icon: 'pi pi-exclamation-triangle',
        accept: () => {
            toast.add({ severity: 'info', summary: 'Confirmed', detail: 'You have accepted', life: 3000 });

        },
        reject: () => {
            toast.add({ severity: 'error', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
        }
    });
};

const confirm2 = () => {
    confirm.require({
        message: 'Do you want to delete this record?',
        header: 'Delete Confirmation',
        icon: 'pi pi-info-circle',
        acceptClass: 'p-button-danger',
        accept: () => {
            toast.add({ severity: 'info', summary: 'Confirmed', detail: 'Record deleted', life: 3000 });
        },
        reject: () => {
            toast.add({ severity: 'error', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
        }
    });
};
</script>





<template>
    <div class="card flex justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="visible = true" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";

const visible = ref(false);
</script>


<template>
    <div class="card">
        <Message severity="success" sticky>Success Message Content</Message>
        <Message severity="info" sticky>Info Message Content</Message>
        <Message severity="warn" sticky>Warning Message Content</Message>
        <Message severity="error" sticky>Error Message Content</Message>
    </div>
</template>

<script setup>
</script>


<template>
    <div class="card flex justify-content-center">
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


-->

}


