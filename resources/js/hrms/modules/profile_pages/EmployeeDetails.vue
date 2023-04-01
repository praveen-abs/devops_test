<template>
    <div class="card mb-2">
        <div class="card-body">
            <h6 class="">General Information
                     <!-- Button trigger modal -->
                <a type="button" class="edit-icon"  @click="visible = true" >
                    <i class="ri-pencil-fill"></i>
                </a>

                <Dialog v-model:visible="visible" modal header="General Information" :style="{ width: '50vw', borderTop: '5px solid var(--color-primary_blue) '}">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label :style="{marginLeft:'10px'}">Birth Date<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                        <Calendar showIcon class="form-selects mb-3" v-model="general_information.birth_date"  placeholder="9999-12-31" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label >Gender<span class="text-danger">*</span></label>

                                                <Dropdown v-model="general_information.gender" :options="options_gender" optionLabel="name" placeholder="Choose Gender" class="form-selects" />

                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label :style="{marginLeft:'10px'}">Date Of Joining(DOJ)<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                        <Calendar showIcon class="form-selects mb-3" v-model="general_information.date_of_joining"  placeholder="9999-12-31" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Blood Group<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <Dropdown
                                                        v-model="general_information.blood_group_id"
                                                        :options="options_blood_group"
                                                        optionLabel="name"
                                                        placeholder="Select Bloodgroup"
                                                        class="form-selects"
                                                    />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3" :style="{marginLeft:'10px'}">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                                <Dropdown v-model="general_information.marital_status_id" :options="option_maritals_status" optionLabel="name" placeholder="Select Marital Status" class="form-selects" />

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 col-lg-6 col-xxl-6">
                                        <div class="form-group mb-3">
                                            <label>Physically Handicapped</label>
                                                <Dropdown v-model="general_information.phy_handicapped" :options="options_phy_challenged" optionLabel="name" placeholder="Select" class="form-selects" />
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right col-12">
                                    <Toast />
                                    <ConfirmDialog></ConfirmDialog>
                                    <button id="btn_submit_generalInfo"
                                        class="btn btn-border-orange submit-btn" @click="general_information_save()" >Save</button>
                                </div>

                </Dialog>
            </h6>
            <ul class="personal-info">
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title">Birthday</div>
                    <div class="text">
                        <!-- {{ date('d-M-Y', strtotime($user_full_details->dob ?? '-')) }} -->
                    </div>
                </li>
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title">Gender </div>
                    <div class="text">
                        <!-- {{ $user_full_details->gender ?? '-' }} -->
                    </div>
                </li>
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title">Date Of Joining (DOJ)</div>
                    <div class="text">
                        <!-- {{ date('d-M-Y', strtotime($user_full_details->doj ?? '-')) }} -->
                    </div>
                </li>
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title">Marital Status </div>
                    <div class="text text-capitalize">
                        <!-- {{ $user_full_details->marital_status ?? '-' }} -->
                    </div>
                </li>
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title"> Blood Group</div>
                    <div class="text">
                        <!-- {{ getBloodGroupName($user_full_details->blood_group_id) ?? '-' }} -->
                    </div>
                </li>
                <li class=" pb-1">
                    <div class="title">Physically Handicapped</div>
                    <div class="text">

                        <!-- {{ $user_full_details->physically_challenged ?? '-' }} -->
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <div class="card mb-2">
        <div class="card-body">
            <h6 class="">Contact Information
                <span class="personal-edit"><a href="#" class="edit-icon"
                        data-bs-target="#personal_info_modal" @click="contactVisible = true" >
                        <i class="ri-pencil-fill"></i></a>
                </span>
            </h6>

            <Dialog v-model:visible="contactVisible" modal header="Contact Information" :style="{ width: '50vw' , borderTop: '5px solid var(--color-primary_blue) '}">

                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label>Personal Email</label>
                            <input type="email" name="present_email"
                                onkeypress='return isValidEmail(email)' class="form-control"
                                value="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label> Office Email</label>
                            <input type="email" onkeypress='return isValidEmail (email)'
                                class="form-control" name="officical_mail"
                                value="">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label>Mobile Number</label>
                            <input type="text" size=20 maxlength=10 name="mobile_number"
                                onkeypress='return isNumberKey(event)' class="form-control"
                                value="">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="text-right">
                            <button id="btn_submit_contact_info"
                                class="btn btn-border-orange submit-btn">Save</button>
                        </div>
                    </div>
                </div>
                </div>

            </Dialog>


            <ul class="personal-info">
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title">Personal Email</div>
                    <div class="text">
                        <!-- {{ $user->email }} -->
                    </div>
                </li>
                <li class="border-bottom-liteAsh pb-1">
                    <div class="title">Office Email</div>
                    <div class="text">
                        <!-- {{ !empty($user_full_details->officical_mail) ? $user_full_details->officical_mail : '-' }} -->
                    </div>
                </li>
                <li class=" pb-1">
                    <div class="title">Mobile Number</div>
                    <div class="text">
                        <!-- {{ !empty($user_full_details->mobile_number) ? $user_full_details->mobile_number : '-' }} -->
                    </div>
                </li>
            </ul>


        </div>

    </div>
    <div class="card mb-2">
        <div class="card-body">
            <h6 class="">Address
                <span class="personal-edit"><a href="#" class="edit-icon" @click="AddressVisible=true"
                        data-bs-target="#edit_addressInfo"><i class="ri-pencil-fill"></i></a></span>
            </h6>


            <Dialog v-model:visible="AddressVisible" modal header="Contact Information" :style="{ width: '50vw' , borderTop: '5px solid var(--color-primary_blue) '}">
                <div class="modal-body">

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Current Address</label>
                                        <textarea name="current_address_line_1" id="current_address_line_1" cols="30" rows="3"
                                            class="form-control" value=""></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Permanent Address </label>
                                        <textarea name="permanent_address_line_1" id="permanent_address_line_1" cols="30" rows="3"
                                            class="form-control" value=""></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-right">
                                        <button
                                            id="btn_submit_address" class="btn btn-border-orange submit-btn">Save</button>
                                    </div>
                                </div>

                            </div>
            </Dialog>

            <div class="row">
                <div class="col-6">
                    <ul class="personal-info">
                        <li class="border-bottom-liteAsh pb-1 flex-column">
                            <div class="title">Current Address </div>
                            <div class="text">
                                <!-- {{ $user_full_details->current_address_line_1 ?? '' }} -->
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="personal-info">
                        <li class="border-bottom-liteAsh pb-1 flex-column">
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

    import { ref, onMounted, reactive } from 'vue';

    import { useToast } from "primevue/usetoast";
    import { useConfirm } from "primevue/useconfirm";

    import axios from 'axios';

    import {
        getBloodGroups,
        getMaritalStatus
    } from "./ProfilePagesService";
   import { log } from 'console';



    const toast = useToast();

    const visible = ref(false);

    const contactVisible = ref(false);

    const AddressVisible =ref(false);

    const general_information =reactive ({ });

    const options_gender = ref([
            { name: 'Male', value: 'male' },
            { name: 'Female', value: 'female' },
            { name: 'Others', value: 'others' }
        ]);

    const options_phy_challenged = ref([
        { name: 'Yes', value: 'yes' },
        { name: 'No', value: 'no' }
    ]);

    const options_blood_group = ref();
    const option_maritals_status =ref();

    const confirm = useConfirm();


    function saveGeneralInformationDetails(){

        console.log("Called saveGeneralInformationDetails.... ");

        axios.post('/profile-pages-update-generalinfo/',{
            "user_id": general_information.user_id,
            "dob": general_information.birth_date,
            "gender": general_information.gender,
            "marital_status_id":general_information.marital_status_id ,
            "doj": general_information.date_of_joining,
            "blood_group_id": general_information.blood_group_id,
            "physically_challenged": general_information.hours_diff,
        }).then(res=>{
            data_checking.value=false
            if(res.data.status=='success'){

            }else
            if(res.data.status=='failure'){
                leave_data.leave_request_error_messege=res.data.message;

            }


        }).catch(err=>{
            console.log(err);
        })

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


    const contact_information =reactive ({
        // personal_email :,
        // office_email:'',
        // contact_num:'',
    })



    function saveContactInformationDetails(){

        console.log("calling save contact info details");

        axios.post('/',{
          "user_id":contact_information.used_id ,
          "present_email":contact_information.personal_email,
          "officical_mail":contact_information.office_email,
          "mobile_number":contact_information.contact_num
        }).then(res =>{
            data_checking.value = false
            if(res.data.status == 'success'){

            }
            else if(res.data.status =='false'){

            }

        }).catch(err=>{
            console.log();
        })

    }



    onMounted(() => {
        // let url = window.location.origin + '/fetch-regularization-approvals';
        // console.log("AJAX URL : " + url);
        // axios.get(url)
        //     .then((response) => {
        //         console.log("Axios : " + response.data);
        //         att_regularization.value = response.data;
        //     });

        getBloodGroups().then((result) => {
            console.log(result);
            options_blood_group.value = result;
        });

        getMaritalStatus().then((result)=>{
            console.log(result);
            option_maritals_status.value = result;

        })


    });



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
dialog > header{
color: #002f56 !important;

}
.form-selects {
    padding: 0;
    width: 100%;
    height: 2.5rem;
}
.save{
    border: 1px solid #e63b1f ;
    color: #e63b1f;

}
.p-dialog-header{
    border-left: #e63b1f 5px solid !important;
}
.form-selects ::-webkit-scrollbar {
  width: 10px !important;
  border-radius:12px !important;
}

/* Track */
.form-selects  ::-webkit-scrollbar-track {
  background: #f1f1f1 !important;
}

/* Handle */
.form-selects  ::-webkit-scrollbar-thumb {
  background: #888 !important;
   border-radius:12px !important;
}

/* Handle on hover */
.form-selects  ::-webkit-scrollbar-thumb:hover {
   background: #252222 !important;
   border-radius:12px !important;
}
Dialog{
    color:#002f56;
}

</style>


{


<!--

<template>
    <div class="card flex justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="contactVisible = true" />
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
 -->

}


