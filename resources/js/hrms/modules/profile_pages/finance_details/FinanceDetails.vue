<template>
    <div>
        <div class="mb-2 card left-line ">
            <div class="pt-1 pb-0 card-body">
                <ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <a class="nav-link active " id="" data-bs-toggle="pill" href="" data-bs-target="#finance_summary"
                            role="tab" aria-controls="pills-home" aria-selected="true">Summary
                        </a>
                    </li>
                    <li class="mx-4 nav-item " role="presentation">
                        <a class="nav-link " id="" data-bs-toggle="pill" href="" data-bs-target="#finance_pay" role="tab"
                            aria-controls="pills-home" aria-selected="true">
                            Payslips
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade active show" id="finance_summary" role="tabpanel" aria-labelledby="">
                <div class="mb-2 card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-2  fs-15 z-0">
                                    Payroll Summary

                                </h6>
                            </div>
                            <ul class="personal-info">
                                <li class="pb-1 border-bottom-liteAsh">
                                    <div class="title">Last Processed</div>
                                    <div class="text">
                                        <h1 class="" v-if="_instance_profilePagesStore.employeeDetails.payroll_summary.payroll_date">
                                            <!-- {{  dayjs(_instance_profilePagesStore.employeeDetails.payroll_summary[0].payroll_date).format('DD-MMM-YYYY') }} -->
                                            <!-- {{ item.payroll_date }} -->
                                            {{ dayjs(_instance_profilePagesStore.employeeDetails.payroll_summary.payroll_date ).format('DD-MMM-YYYY')  }}
                                        </h1>
                                        <h1 v-else> - </h1>
                                    </div>
                                </li>
                                <li class="pb-1 border-bottom-liteAsh">
                                    <div class="title">Total Working Days</div>
                                    <div class="text">

                                        <h1 v-if="_instance_profilePagesStore.employeeDetails.payroll_summary.worked_Days">{{ _instance_profilePagesStore.employeeDetails.payroll_summary.worked_Days }}</h1>

                                        <h1 v-else>
                                            -
                                        </h1>
                                    </div>
                                </li>
                                <li class="pb-1 ">
                                    <div class="title">Loss Of Pay(LOP)</div>
                                    <div class="text" >
                                        <h1 v-if="_instance_profilePagesStore.employeeDetails.payroll_summary.lop">{{  _instance_profilePagesStore.employeeDetails.payroll_summary.lop }}</h1>
                                        <h1 v-else>
                                            -
                                        </h1>
                                    </div>
                                </li>
                            </ul>

                        </form>

                    </div>
                </div>

                <div class="mb-2 card">
                    <div class="card-body">
                        <h6 class="mb-2 fw-bold fs-15">Bank Information
                            <span class="personal-edit">
                                <a href="#" class="edit-icon" @click="onClick_EditButton_BankInfo"><i
                                        class="ri-pencil-fill"></i>
                                </a>
                            </span>
                        </h6>

                        <Dialog v-model:visible="dialog_Bankvisible" modal header="Header"
                            :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                            <template #header>
                                <div>
                                    <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                                        class="fw-bold fs-5">
                                        Bank Information</h5>
                                </div>
                            </template>

                            <div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label>Bank Name</label>
                                                <Dropdown editable @keypress="isLetter($event)" :options="bankNameList"
                                                    optionLabel="bank_name" optionValue="id" placeholder="Select Bank Name"
                                                    class="w-full form-controls" v-model="bank_information.bank_id" />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label>Bank Account No</label>
                                                <div class="cal-icon">
                                                </div>
                                                <InputNumber v-model="bank_information.bank_ac_no"
                                                    class="form-controls onboard-form" inputId="withoutgrouping"
                                                    :useGrouping="false" />
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label>IFSC Code</label>
                                                <InputText type="text" name="bank_ifsc_" class="form-controls pl-2"
                                                    v-model="bank_information.ifsc_code" />
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label>PAN No</label>
                                                <InputText type="text" name="pan_nos" class="form-controls pl-2"
                                                    v-model="bank_information.pan_no" />
                                            </div>
                                        </div> -->

                                        <div class="col-md-6 ">
                                            <div class="floating d-block justify-items-start al">
                                                <label for="" class="float-label mb-2">Bank Passbook or Cheque Leaf</label>
                                                <div class=" flex justify-content-start">
                                                    <Toast />
                                                    <label
                                                        class="cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary "
                                                        style="width:135px ; " id="" for="uploadPassBook">
                                                        <i class="pi pi-arrow-circle-up fs-5 mr-3"></i>
                                                        <h1 class="text-light">Upload file</h1>
                                                    </label>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center border ">
                                                        <input type="file" name="" id="uploadPassBook" hidden
                                                            @change="updateCheckBookPhoto($event)"
                                                            style="text-transform: uppercase" class="form-controls pl-2"
                                                            :class="[
                                                                r$.PassBook.$error ? 'p-invalid' : '',
                                                            ]" />
                                                        <span v-if="r$.PassBook.$error"
                                                            class="text-red-400 fs-6 font-semibold text-center">
                                                            {{ r$.PassBook.required.$message.replace("Value", "PassBook or  Cheque Leaf") }}
                                                        </span>
                                                    </div>
                                                    <div v-if="bank_information.PassBook"
                                                        class="p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4">
                                                        {{ bank_information.PassBook.name }}</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button id="btn_submit_bank_info" class="btn btn-orange submit-btn"
                                                @click="submitBankForm">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Dialog>
                        <div>
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Bank Name</div>
                                    <div class="text">
                                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.bank_name }}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Bank Account No.</div>
                                    <div class="text">

                                        {{
                                            _instance_profilePagesStore.employeeDetails.get_employee_details.bank_account_number
                                        }}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">IFSC Code</div>
                                    <div class="text">
                                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.bank_ifsc_code
                                        }}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">PAN No</div>
                                    <div class="text w-20">
                                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.pan_number }}

                                        <!-- personal  -->

                                        <span class="personal-edit">
                                            <a href="#" class="edit-icon" style="color:#e63b1f;">
                                                <i class="ri-pencil-fill" @click="dialog_PanNo_visible = true"></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <Dialog v-model:visible="dialog_PanNo_visible" modal header="Header"
                    :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                    <template #header>
                        <div>
                            <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                                class="fw-bold fs-5">
                                Pancard Information</h5>
                        </div>
                    </template>
                    <div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label class="mb-2 font-semibold text-lg">PAN No</label>
                                        <InputMask @focusout="panCardExists" id="serial" mask="aaaaa9999a"
                                            v-model="pan_information.pan_no" placeholder="AHFCS1234F"
                                            style="text-transform: uppercase" class="form-controls pl-2" :class="[
                                                v$.pan_no.$error ? 'p-invalid' : '',
                                            ]" />
                                        <span v-if="v$.pan_no.$error" class="text-red-400 fs-6 font-semibold">
                                            {{ v$.pan_no.required.$message.replace("Value", "Pancard number") }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6 d-flex flex-column ">
                                    <!-- flex-column -->
                                    <div class="d-flex justify-items-center  flex-column ml-10">
                                        <label for="" class="float-label mb-2 font-semibold text-lg">Pancard</label>
                                        <div class="d-flex  justify-items-center align-items-center">
                                            <Toast />
                                            <label
                                                class="cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary "
                                                style="width:100px ; " id="" for="uploadPassBook">
                                                <i class="pi pi-arrow-circle-up fs-5 mr-2"></i>
                                                <h1 class="text-light">Upload</h1>
                                            </label>

                                            <div v-if="pan_information.Pancard"
                                                class="p-2 bg-blue-100 rounded-lg font-semibold fs-11 mx-4">{{
                                                    pan_information.Pancard.name }}</div>

                                            <input type="file" name="" id="uploadPassBook" hidden
                                                @change="UploadPandcardPhoto($event)" :class="[
                                                    v$.Pancard.$error ? 'p-invalid' : '',
                                                ]" />
                                        </div>
                                        <span v-if="v$.Pancard.$error" class="text-red-400 fs-6 font-semibold">
                                            {{ v$.Pancard.required.$message.replace("Value", "Pancard attachment") }}
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="text-right">
                                    <button id="btn_submit_bank_info" class="btn btn-orange submit-btn"
                                        @click="submitForm">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </Dialog>






                <div class="mb-2 card">
                    <div class="card-body">
                        <h6 class="mb-2 fw-bold fs-15">Statutory Information
                            <span class="personal-edit">
                                <a href="#" class="edit-icon"  v-if="_instance_profilePagesStore.employeeDetails
                                .Current_login_user.org_role == 1 ||_instance_profilePagesStore.employeeDetails
                                .Current_login_user.org_role == 2 || _instance_profilePagesStore.employeeDetails
                                .Current_login_user.org_role == 3  " @click="onClick_EditButton_Statutory_Info()">
                                    <i class="ri-pencil-fill"></i>

                                </a>
                            </span>
                        </h6>

                        <Dialog v-model:visible="dialog_statutory_visible" modal header="Statutory Details"
                            :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                            <template #header>
                                <div>
                                    <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                                        class="fw-bold fs-5">
                                        Statutory information</h5>
                                </div>
                            </template>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="">PF
                                            Applicable<span class="text-danger">*</span></label>
                                        <Dropdown v-model="statutory_information.pf_applicable"
                                            :options="esic_applicable_option" placeholder="PF Applicable" optionLabel="name"
                                            optionValue="value" class="w-100 " />
                                    </div>
                                    <div class="col">
                                        <label class="ml-2">EPF Number</label>
                                            <InputText @keypress="isSpecialChars($event)"   v-model="statutory_information.epf_no" class="w-100  mt-1" type="text" placeholder="EPF Number" />
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col ">
                                        <label class=" ml-1">UAN Number</label>
                                            <InputText @keypress="isSpecialChars($event)"  v-model="statutory_information.uan_no" class="w-100" type="text" placeholder="EPF Number" />
                                    </div>
                                    <div class="col ml-2">
                                        <label class="ml-2">ESIC
                                            Applicable<span class="text-danger">*</span></label>
                                        <Dropdown v-model="statutory_information.esic_applicable"
                                            :options="esic_applicable_option" optionLabel="name"
                                            placeholder="ESIC Applicable" class="w-100 " optionValue="value" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 ">
                                        <label for="" class=" ml-2">ESIC Number</label>
                                            <InputText @keypress="isSpecialChars($event)"   v-model="statutory_information.esic_no" class="w-100  mt-1" type="text" placeholder="EPF Number" />
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-right">
                                        <button id="btn_submit_statutory_info" class="btn btn-border-orange submit-btn"
                                            @click="saveinfo_statutoryDetails">Save</button>
                                    </div>
                                </div>
                            </div>



                        </Dialog>
                        <ul v-if="_instance_profilePagesStore.employeeDetails.get_statutory_details" class="personal-info">
                            <li>
                                <div class="title">PF Applicable</div>
                                <div class="text ">
                                    {{ _instance_profilePagesStore.employeeDetails.get_statutory_details.pf_applicable }}
                                </div>
                            </li>
                            <li>
                                <div class="title">EPF Number</div>
                                <div class="text">
                                    {{ _instance_profilePagesStore.employeeDetails.get_statutory_details.epf_number }}
                                </div>
                            </li>
                            <li>
                                <div class="title">UAN Number</div>
                                <div class="text"
                                    v-if="_instance_profilePagesStore.employeeDetails.get_statutory_details.uan_number == 'null'">
                                    -
                                </div>
                                <div class="text" v-else>
                                    {{ _instance_profilePagesStore.employeeDetails.get_statutory_details.uan_number }}
                                </div>
                            </li>

                            <li>
                                <div class="title">ESIC Applicable</div>
                                <div class="text">
                                    {{ _instance_profilePagesStore.employeeDetails.get_statutory_details.esic_applicable }}
                                </div>
                            </li>
                            <li>
                                <div class="title">ESIC Number</div>
                                <div class="text">
                                    {{ _instance_profilePagesStore.employeeDetails.get_statutory_details.esic_number }}

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="finance_pay" role="tabpanel" aria-labelledby="">
                <div class="mb-2 card">
                    <div class="card-body">
                        <EmployeePayslips />
                    </div>
                </div>
            </div>
        </div>


        <Dialog header="Header" v-model:visible="canShowLoading" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog>

    </div>
</template>
<script setup>
import { ref, onMounted, reactive, computed } from 'vue';
import axios from 'axios'
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import { profilePagesStore } from '../stores/ProfilePagesStore'
import EmployeePayslips from './EmployeePayslips.vue'
import useValidate from '@vuelidate/core'
import dayjs from 'dayjs';
import { useNow, useDateFormat } from '@vueuse/core'
import { required, email, minLength, sameAs } from '@vuelidate/validators'

const _instance_profilePagesStore = profilePagesStore()

const fetch_data = Service()


const toast = useToast();

const canShowLoading = ref(false);

const dialog_PanNo_visible = ref(false);

const payroll_summary = ref();

payroll_summary.value = _instance_profilePagesStore.employeeDetails.payroll_summary;
console.log("testing payroll summary :", payroll_summary.value);


let form = new FormData();
form.append("user_code", Service.current_user_code);
form.append("file_object", profilePagesStore.value);

let url = "/profile-pages/updateProfilePicture";
axios
    .post(url, form)
    .then((res) => {
        // console.log(res.data);
    })
    .finally(() => {
        console.log("Photo Sent");
        // updateCheckBookPhoto();
    });



const statutory = ref([])
const bankNameList = ref();

statutory.value.push(_instance_profilePagesStore.employeeDetails.get_statutory_details)

onMounted(() => {
    // fetchData();
    fetch_data.getBankList().then(res => {
        bankNameList.value = res.data;
    })
    _instance_profilePagesStore.fetchEmployeeDetails();

});


const dialog_Bankvisible = ref(false);
const dialog_statutory_visible = ref(false);

const bank_info_data = ref()
const statutory_info_data = ref()

const bank_information = reactive({
    bank_id: '',
    bank_ac_no: '',
    ifsc_code: '',
    PassBook: ''
});

const pan_information = reactive({
    pan_no: '',
    Pancard: ''

})

const updateCheckBookPhoto = (e) => {
    // Check if file is selected
    if (e.target.files && e.target.files[0]) {
        // Get uploaded file
        bank_information.PassBook = e.target.files[0];
        // Get file size
        // Print to console
        console.log(bank_information.PassBook);
    }
}


const esic_applicable_option = ref([
    { name: 'Yes', value: 'Yes' },
    { name: 'No', value: 'No' },
]);


// save bankdetails function

const saveBankinfoDetails = () => {

    canShowLoading.value = true;

    let id = fetch_data.current_user_id;
    let url = `/update-bank-info/${id}`;
    let form = new FormData()

    form.append('user_code', _instance_profilePagesStore.employeeDetails.user_code)
    form.append('bank_id', bank_information.bank_id)
    form.append('account_no', bank_information.bank_ac_no)
    form.append('bank_ifsc', bank_information.ifsc_code)
    form.append('PassBook', bank_information.PassBook)
    form.append('onboard_document_type', "Cheque leaf/Bank Passbook")

    axios.post(url, form)
        .then((res) => {
            if (res.data.status == "success") {
                toast.add({ severity: 'success', summary: 'Updated', detail: 'Bank information updated', life: 3000 });
                _instance_profilePagesStore.employeeDetails.get_employee_details.bank_id = bank_information.bank_id;
                _instance_profilePagesStore.employeeDetails.get_employee_details.bank_account_number = bank_information.bank_ac_no;
                _instance_profilePagesStore.employeeDetails.get_employee_details.bank_ifsc_code = bank_information.ifsc_code;
                _instance_profilePagesStore.employeeDetails.get_employee_details.pan_no = bank_information.pan_no;

            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.fetchEmployeeDetails();
            canShowLoading.value = false;
        })

    dialog_Bankvisible.value = false;

}

function onClick_EditButton_BankInfo() {
    // Assign json values into dialog elements also
    bank_information.bank_id = parseInt(_instance_profilePagesStore.employeeDetails.get_employee_details.bank_id);
    bank_information.bank_ac_no = _instance_profilePagesStore.employeeDetails.get_employee_details.bank_account_number;
    bank_information.ifsc_code = _instance_profilePagesStore.employeeDetails.get_employee_details.bank_ifsc_code;
    bank_information.pan_no = _instance_profilePagesStore.employeeDetails.get_employee_details.pan_number;
    dialog_Bankvisible.value = true;
}


function onClick_EditButton_Statutory_Info() {
    // Assign json values into dialog elements also

    if (_instance_profilePagesStore.employeeDetails.get_statutory_details) {
        statutory_information.pf_applicable = _instance_profilePagesStore.employeeDetails.get_statutory_details.pf_applicable;
        statutory_information.epf_no = _instance_profilePagesStore.employeeDetails.get_statutory_details.epf_number;
        statutory_information.uan_no = _instance_profilePagesStore.employeeDetails.get_statutory_details.uan_number;
        statutory_information.esic_applicable = _instance_profilePagesStore.employeeDetails.get_statutory_details.esic_applicable;
        statutory_information.esic_no = _instance_profilePagesStore.employeeDetails.get_statutory_details.esic_number;
    }
    else {
        dialog_statutory_visible.value = true;
    }
    dialog_statutory_visible.value = true;
}

function onClick_EditButton_PanNo_info() {
    dialog_PanNo_visible.value = true;

}

const statutory_information = reactive({
    pf_applicable: '',
    epf_no: '',
    uan_no: '',
    esic_applicable: '',
    esic_no: ''
})


const saveinfo_statutoryDetails = () => {
    canShowLoading.value = true;

    let id = fetch_data.current_user_id;


    let url = `/update-statutory-info/${id}`;

    axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        pf_applicable: statutory_information.pf_applicable,
        epf_number: statutory_information.epf_no,
        uan_number: statutory_information.uan_no,
        esic_applicable: statutory_information.esic_applicable,
        esic_number: statutory_information.esic_no
    })
        .then((res) => {

            if (res.data.status == "success") {

                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });


            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        }).finally(() => {
            _instance_profilePagesStore.fetchEmployeeDetails();
            canShowLoading.value = false;
        })

    dialog_statutory_visible.value = false;

}

const UploadPandcardPhoto = (e) => {
    if (e.target.files && e.target.files[0]) {
        pan_information.Pancard = e.target.files[0];
        console.log(pan_information.Pancard);
    }
}


const savePancardInfoDetails = () => {
    canShowLoading.value = true
    let id = fetch_data.current_user_id;
    const url = `/update-Pancard-info/${id}`;
    const form = new FormData;
    form.append('pan_no', pan_information.pan_no);
    form.append('pancard', pan_information.Pancard);
    form.append('user_code', _instance_profilePagesStore.employeeDetails.user_code)
    form.append('onboard_document_type', "Pan Card");
    dialog_PanNo_visible.value = false;

    if (pan_information.Pancard) {
        axios.post(url, form).finally(() => {
            canShowLoading.value = false;

        })
    }


};

const bankDetailsRules = computed(() => {
    return {
        PassBook: { required },
    }
});

const r$ = useValidate(bankDetailsRules, bank_information)

const submitBankForm = () => {
    r$.value.$validate() // checks all inputs
    if (!r$.value.$error) {
        // if ANY fail validation
        console.log('Form successfully submitted.')
        saveBankinfoDetails()
    } else {
        console.log('Form failed submitted.')
    }

}


const rules = computed(() => {
    return {
        pan_no: { required },
        Pancard: { required },
    }
});

const v$ = useValidate(rules, pan_information)

const submitForm = () => {
    v$.value.$validate() // checks all inputs
    if (!v$.value.$error) {
        // if ANY fail validation
        console.log('Form successfully submitted.')
        savePancardInfoDetails()
    } else {
        console.log('Form failed submitted.')
    }

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



</script>

<style>
.form-controls {
    width: 100%;
    height: 2.5rem;
    padding: 0;
}

Dropdown>placeholder {
    margin-top: -5px;
}
</style>


{


    <!--
<template>
    <div class="card flex justify-content-center">
        <Toast />
        <FileUpload mode="basic" name="demo[]" url="./upload.php" accept="image/*" :maxFileSize="1000000" @upload="onUpload" />
    </div>
</template>

<script setup>
import { useToast } from "primevue/usetoast";
const toast = useToast();

const onUpload = () => {
    toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};
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

