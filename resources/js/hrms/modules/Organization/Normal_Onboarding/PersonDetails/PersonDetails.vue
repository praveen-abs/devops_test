<template>
    <div class=" header-card-text">
        <p class="my-2 font-semibold text-lg"><i class="fa fa-user" aria-hidden="true"></i> Personal Details</p>
    </div>
    <div class="form-card">
        <div class="mt-1 row">
            <div class="mb-2 col-md -6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Employee Code</label>
                    <div class="p-inputgroup flex-1">
                        <span v-if="service.readonly.isDisableClientCode"
                            class="p-inputgroup-addon font-semibold text-sm text-black ">
                            {{ service.clientCode
                            }}</span>
                        <InputText
                            :class="[service.readonly.is_emp_code_quick ? 'bg-gray-200' : '', service.user_code_exists ? 'p-invalid' : '']"
                            class="capitalize form-onboard-form form-control textbox" type="text"
                            :readonly="service.readonly.is_emp_code_quick"
                            v-model="service.employee_onboarding.employee_code" placeholder="Employee Code"
                            @focusout="userCodeExists" @keypress="isNumber($event)" />
                    </div>
                    <span v-if="service.user_code_exists" class="p-error">Employee code Already Exists</span>

                </div>
            </div>

            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="employee_name" class="float-label">Employee Name as per Aadhar
                        <span class="text-danger">*</span>
                    </label>

                    <InputText class="capitalize onboard-form form-control textbox" type="text"
                        :readonly="service.readonly.is_emp_name_quick" v-model="service.employee_onboarding.employee_name"
                        @keypress="isLetter($event)" :class="[
                            v$.employee_name.$error ? 'p-invalid' : ''
                            ,
                            service.readonly.is_emp_name_quick ? 'bg-gray-200' : '']"
                        placeholder="Employee Name as per Aadhar " />

                    <span v-if="(v$.employee_name.$error) ||
                        v$.employee_name.$pending.$response
                        " class="p-error">
                        {{
                            v$.employee_name.required.$message.replace(
                                "Value",
                                "Employee Name as per in Aadhar"
                            )
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Date of Birth</label>
                    <Calendar inputId="icon" dropzone="true" v-model="service.employee_onboarding.dob" showIcon editable
                        dateFormat="dd-mm-yy" placeholder="Date of birth" style="width: 350px;" class=""
                        :maxDate="service.dateOfBirth(new Date())" :class="{
                            'p-invalid':
                                v$.dob.$error,
                        }" />

                    <span v-if="(v$.dob.$error) ||
                        v$.dob.$pending.$response
                        " class="p-error">
                        {{
                            v$.dob.required.$message.replace(
                                "Value",
                                "Dob "
                            )
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Marital Status <span class="text-danger">*</span></label>
                    <Dropdown v-model="service.employee_onboarding.marital_status" :options="service.maritalDetails"
                        optionLabel="name" optionValue="id" placeholder="Select Martial Status"
                        @change="service.spouseDisable" class="p-error" :class="{
                            'p-invalid':
                                v$.marital_status.$error,
                        }" />
                    <span v-if="(v$.marital_status.$error) ||
                        v$.marital_status.$pending.$response
                        " class="p-error">
                        {{
                            v$.marital_status.required.$message.replace(
                                "Value",
                                "Marital Status"
                            )
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Date of Joining<span class="text-danger">*</span></label>
                    <Calendar inputId="icon" dropzone="true" :manualInput="true" v-model="service.employee_onboarding.doj"
                        editable dateFormat="dd-mm-yy" placeholder="Date of Joining" style="width: 350px;"
                        :readonly="service.readonly.is_doj_quick" showIcon :class="[{
                            'p-invalid': v$.doj.$error,
                        },
                        service.readonly.is_doj_quick ? 'bg-gray-200' : '']" />

                    <span v-if="(v$.doj.$error) || v$.doj.$pending.$response
                        " class="p-error">
                        {{
                            v$.doj.required.$message.replace("Value", "Date Of Joining")
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Gender<span class="text-danger">*</span></label>
                    <Dropdown @change="service.spouseGenderCheck($event.value)" v-model="service.employee_onboarding.gender"
                        :options="Gender" optionLabel="name" optionValue="value" placeholder="Select Gender" class="p-error"
                        :class="{
                            'p-invalid':
                                v$.gender.$error,
                        }" />

                    <span v-if="(v$.gender.$error) ||
                        v$.gender.$pending.$response
                        " class="p-error">
                        {{
                            v$.gender.required.$message.replace("Value", "Gender")
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Mobile Number<span class="text-danger">*</span></label>
                    <InputMask @focusout="mobileNoExists" id="serial" :readonly="service.readonly.mobile" mask="9999999999"
                        v-model="service.employee_onboarding.mobile_number" placeholder="Mobile Number"
                        style="text-transform: uppercase" class="form-control textbox"
                        :class="[{
                            'p-invalid': v$.mobile_number.$error,
                        }, service.readonly.mobile ? 'bg-gray-200' : '', service.is_mobile_no_exists ? 'p-invalid' : '']" />

                </div>

                <span class="text-danger" v-if="service.is_mobile_no_exists">
                    Mobile Number is already exists
                </span>
                <span v-if="(v$.mobile_number.$error) ||
                    v$.mobile_number.$pending.$response
                    " class="p-error">
                    {{
                        v$.mobile_number.required.$message.replace(
                            "Value",
                            "Mobile Number"
                        )
                    }}</span>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Email<span class="text-danger">*</span></label>
                    <InputText type="text" :readonly="service.readonly.is_email_quick" placeholder="Email ID"
                        @keypress="isEmail($event)"
                        :class="[{
                            'p-invalid': v$.email.$error,
                        }, service.readonly.is_email_quick ? 'bg-gray-200' : '', service.personal_mail_exists ? 'p-invalid' : '']"
                        @focusout="personalMailExists" v-model="service.employee_onboarding.email"
                        class="form-control textbox" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />

                    <span v-if="service.personal_mail_exists" class="p-error">Email is already exists</span>

                    <span v-if="(v$.email.$error) ||
                        v$.email.$pending.$response
                        " class="p-error">
                        {{
                            v$.email.required.$message.replace("Value", "Email")
                        }}</span>
                </div>
                <span class="error" id="error_email"></span>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Aadhaar Number<span class="text-danger">*</span></label>
                    <InputMask @focusout="AadharCardExits" id="ssn" mask="9999 9999 9999" placeholder="9999 9999 9999"
                        v-model="service.employee_onboarding.aadhar_number" :class="[{
                            'p-invalid': v$.aadhar_number.$error,
                        }, service.aadhar_card_exists ? 'p-invalid' : '']" />

                    <span v-if="service.aadhar_card_exists" class="text-danger">
                        Aadhar Number Is Already Exists
                    </span>

                    <span v-if="v$.aadhar_number.$error" class="font-medium text-red-600 fs-6">
                        {{ v$.aadhar_number.$errors[0].$message }}
                    </span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 co l-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Pan Number / Pan Acknowlegement<span
                            class="text-danger">*</span></label>

                    <InputMask @focusout="panCardExists" id="serial" mask="aaaPa9999a"
                        v-model="service.employee_onboarding.pan_number" placeholder="AHFCS1234F"
                        style="text-transform: uppercase" class="form-control textbox" :class="[{
                            'p-invalid': v$.pan_number.$error,
                        }, service.pan_card_exists ? 'p-invalid' : '',]" />

                    <span v-if="service.pan_card_exists" class="text-danger">
                        Pan Number Is Already Exixts
                    </span>

                    <span v-if="v$.pan_number.$error" class="font-medium text-red-600 fs-6">
                        {{ v$.pan_number.$errors[0].$message }}
                    </span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">DL Number</label>
                    <InputText class="onboard-form form-control textbox" type="text" v-model="v$.dl_no.$model"
                        placeholder="DL Number" minlength="16" maxlength="16" @keypress="isSpecialChars($event)" />
                    <label class="error star_error dl_no_label" for="dl_no" style="display: none"></label>

                    <span class="error" id="error_dl_no"></span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Choose nationality<span class="text-danger">*</span></label>
                    <Dropdown v-model="service.employee_onboarding.nationality" :options="Nationality" optionLabel="name"
                        optionValue="name" placeholder="Select Nationality" @change="service.NationalityCheck()"
                        class="p-error" :class="{
                            'p-invalid':
                                v$.nationality.$error,
                        }" />

                    <span v-if="(v$.nationality.$error) ||
                        v$.nationality.$pending.$response
                        " class="p-error">
                        {{
                            v$.nationality.required.$message.replace(
                                "Value",
                                "Choose Nationality"
                            )
                        }}</span>
                </div>
            </div>
            <div v-if="service.isNationalityVisible" class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Passport Number<span class="text-danger"
                            id="asterisk_passport_no"></span></label>
                    <InputText minlength="8" maxlength="8" class="form-control textbox"
                        v-model="service.employee_onboarding.passport_number" placeholder="Passport Number" />

                    <span class="error" id="error_passport_no"></span>
                </div>
            </div>
            <div v-if="service.isNationalityVisible" class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Passport Exp Date<span class="text-danger"
                            id="asterisk_passport_expdate"></span></label>
                    <input type="text" v-model="service.employee_onboarding.passport_date"
                        placeholder="Passport Expiry Date" id="doj" name="doj" class="onboard-form form-control textbox"
                        onfocus="(this.type='date')" />

                    <span class="" id="error_passport_date"></span>
                </div>
            </div>

            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Blood Group</label>

                    <Dropdown v-model="service.employee_onboarding.blood_group_name" :options="service.bloodGroups"
                        optionLabel="name" optionValue="id" placeholder="Select Bloodgroup" class="p-error" />
                    <!-- {{employee_onboarding.blood_group_name}} -->
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Physically Challenged</label>

                    <Dropdown v-model="service.employee_onboarding.physically_challenged" :options="PhyChallenged"
                        optionLabel="name" optionValue="value" placeholder="Physically Challenged" class="p-error" />
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Bank Name<span class="text-danger">*</span></label>
                    <Dropdown v-model="service.employee_onboarding.bank_name" :options="service.bankList"
                        optionLabel="bank_name" optionValue="id" placeholder="Select Bank Name" class="p-error" :class="{
                            'p-invalid':
                                v$.bank_name.$error,
                        }" />
                    <!-- {{employee_onboarding.bank_name}} -->

                    <span v-if="(v$.bank_name.$error) ||
                        v$.bank_name.$pending.$response
                        " class="p-error">
                        {{
                            v$.bank_name.required.$message.replace(
                                "Value",
                                "Bank Name "
                            )
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Bank Account Number<span class="text-danger">*</span></label>
                    <InputText placeholder="Account Number" minlength="10" @keypress="isNumber($event)" :class="{
                                'p-invalid': v$.AccountNumber.$error,
                            }" maxlength="18" @focusout="ValidateAccountNo"
                        class="onboard-form form-control textbox" type="text"
                        v-model="service.employee_onboarding.AccountNumber" />

                    <span v-if="service.is_ac_no_exists" class="text-danger">
                        Account Number Is Already Exixts
                    </span>

                    <span v-if="(v$.AccountNumber.$error) ||
                        v$.AccountNumber.$pending.$response
                        " class="p-error">
                        {{
                            v$.AccountNumber.required.$message.replace(
                                "Value",
                                "Account Number"
                            )
                        }}</span>
                </div>
            </div>
            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                <div class="floating">
                    <label for="" class="float-label">Bank IFSC Code<span class="text-danger">*</span></label>
                    <InputText @keypress="isSpecialChars($event)" type="text"
                        v-model="service.employee_onboarding.bank_ifsc" :class="[{
                            'p-invalid': v$.bank_ifsc.$error,
                        }]" class=" onboard-form form-control textbox" minlength="11" maxlength="11"
                        style="text-transform: uppercase" placeholder="Bank IFSC Code" />

                    <span v-if="v$.bank_ifsc.$error" class="font-medium text-red-600 fs-6">
                        {{ v$.bank_ifsc.$errors[0].$message }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>

import { useNormalOnboardingMainStore } from '../stores/NormalOnboardingMainStore'
import useValidate from '@vuelidate/core'
import { required, email, minLength, sameAs, helpers } from '@vuelidate/validators'
import axios from 'axios';
import { reactive, ref } from 'vue';


const validateAge = (value) => {
    console.log(value);
    var birthDate = new Date(value);
    console.log(" birthDate" + birthDate);
    var difference = Date.now() - birthDate.getTime();
    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    console.log("calculated Age" + calculatedAge);

    if (calculatedAge > 18) {
        console.log('valid');
    } else {
        console.log('in');
    }
}

const service = useNormalOnboardingMainStore()

const v$ = useValidate(service.rules, service.employee_onboarding);




const userCodeExists = () => {
    let user_code = `${service.employee_onboarding.emp_client_code}${service.employee_onboarding.employee_code}`;
    console.log(user_code);
    axios
        .get(`/user-code-exists/${user_code}`)
        .then((res) => {
            console.log(res.data);
            if (service.checkIsQuickOrNormal == 'quick' || service.checkIsQuickOrNormal == 'bulk') {
                console.log("quick onboarding");
                service.family_details_disable = true
            } else {
                service.user_code_exists = res.data;
                console.log("working");

            }

        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {
            console.log("completed");
        });
};


const personalMailExists = () => {
    let mail = service.employee_onboarding.email;

    axios
        .get(`/personal-mail-exists/${mail}`)
        .then((res) => {
            if (service.checkIsQuickOrNormal == 'quick' || service.checkIsQuickOrNormal == 'bulk') {
                console.log("quick onboarding");
                // compensatoryCalWhileQuick()
            } else {
                service.personal_mail_exists = res.data;
            }


        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {
            console.log("completed");
        });


};



const mobileNoExists = () => {

    let mobile = service.employee_onboarding.mobile_number

    console.log("mobile no Checking");
    //   compensatoryCalWhileQuick()
    console.log(mobile);
    axios
        .get(`/mobile-no-exists/${mobile}`)
        .then((res) => {
            console.log(res.data);
            if (service.checkIsQuickOrNormal == 'quick' || service.checkIsQuickOrNormal == 'bulk') {
                console.log("quick onboarding");
            } else {
                service.is_mobile_no_exists = res.data;
            }

        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {
            console.log("completed");
        });

}





const AadharCardExits = () => {
    console.log("working");
    let aadhar_no = service.employee_onboarding.aadhar_number;

    var regexp = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;

    if (regexp.test(service.employee_onboarding.aadhar_number)) {
        console.log("Valid Aadhar no.");
        axios
            .get(`/aadhar-no-exists/${aadhar_no}`)
            .then((res) => {
                console.log(res.data);
                service.aadhar_card_exists = res.data;
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                console.log("completed");
            });

    }
    else {
        console.log("Invalid Aadhar no.");

    }

};




const panCardExists = () => {
    console.log("pan card checking");

    let pan_no = service.employee_onboarding.pan_number;

    var regep = /^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/;

    if (regep.test(service.employee_onboarding.pan_number)) {
        console.log("Valid pan no.");
        axios
            .get(`/pan-no-exists/${pan_no}`)
            .then((res) => {
                console.log(res.data);
                service.pan_card_exists = res.data;
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                console.log("completed");
            });


    }
    else {
        console.log("Invalid pan no.");

    }

};



const ValidateAccountNo = () => {

    let Ac_no = service.employee_onboarding.AccountNumber
    axios
        .get(`/ac-no-exists/${Ac_no}`)
        .then((res) => {
            console.log(res.data);
            service.is_ac_no_exists = res.data;
        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {
            console.log("completed");
        });

}





const isLetter = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z_ ]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

const isSpecialChars = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z0-9]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

const isNumber = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[0-9]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}

const isEmail = (e) => {
    let char = String.fromCharCode(e.keyCode); // Get the character
    if (/^[A-Za-z0-9@.]+$/.test(char)) return true; // Match with regex
    else e.preventDefault(); // If not match, don't add to input text
}


const funci = () => {
    var cl = 'BA';

    var select_field = $('select[name=filter]').val();

    var regA = new RegExp(cl + '.*');


    if (!(regA.test(service.employee_onboarding.employee_code))) {
        console.log("simma ");
    }
}


const Gender = ref([
    { name: "Male", value: "Male" },
    { name: "Female", value: "Female" },
    { name: "Others", value: "Others" },
]);

const Nationality = ref([
    { name: "Indian", value: "indian" },
    { name: "Other Nationality", value: "others" },
]);

const PhyChallenged = ref([
    { name: "No", value: "no" },
    { name: "Yes", value: "yes" },

]);


</script>
