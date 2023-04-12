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
                            Paycheck
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
                                <h6 class="">
                                    Payroll Summary

                                </h6>
                                <!-- {{-- <button class="btn btn-border-orange">View Payslip </button> --}} -->
                            </div>


                            <ul class="personal-info">
                                <li class="pb-1 border-bottom-liteAsh">
                                    <div class="title">Last Processed</div>
                                    <div class="text">
                                        -
                                    </div>
                                </li>
                                <li class="pb-1 border-bottom-liteAsh">
                                    <div class="title">Total Working Days</div>
                                    <div class="text">
                                        -
                                    </div>
                                </li>
                                <li class="pb-1 ">
                                    <div class="title">Loss Of Pay(LOP)</div>
                                    <div class="text">
                                        -
                                    </div>
                                </li>
                            </ul>

                        </form>

                    </div>
                </div>

                <div class="mb-2 card">
                    <div class="card-body">
                            <h6 class="">Bank Information
                                <span class="personal-edit">
                                    <a href="#" class="edit-icon" @click="onClick_EditButton_BankInfo"><i class="ri-pencil-fill"></i>
                                    </a>
                                </span>
                            </h6>

                            <Dialog v-model:visible="dialog_Bankvisible" modal header="Header"
                            :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                                <template #header>
                                    <div>
                                        <h5
                                            :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                            Bank Information</h5>
                                    </div>
                                </template>

                                <div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label>Bank Name</label>

                                                    <Dropdown editable :options="bankNameList" optionLabel="bank_name"
                                                        placeholder="Select Bank Name" class="w-full form-controls "
                                                        v-model="bank_information.bank_id" />

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label>Bank Account No</label>
                                                    <div class="cal-icon">

                                                    </div>
                                                    <InputText class="form-controls onboard-form" inputId="integeronly"
                                                        name="account_no" :min="0" :max="100" type="number"
                                                        v-model="bank_information.bank_ac_no" />
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label>IFSC Code</label>
                                                    <!-- <input name="bank_ifsc" class="form-control onboard-form"
                                                                                value="" type="text"
                                                                                pattern-data="ifsc" required> -->
                                                    <InputText type="text" name="bank_ifsc_" class="form-controls"
                                                        v-model="bank_information.ifsc_code" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label>PAN No</label>
                                                    <!-- <input name="pan_no" class="form-control onboard-form"
                                                                                value="" type="text"
                                                                                pattern-data="pan" required> -->
                                                    <InputText type="text" name="pan_nos" class="form-controls"
                                                        v-model="bank_information.pan_no" />

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <button id="btn_submit_bank_info" class="btn btn-orange submit-btn"
                                                    @click="saveBankinfoDetails">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </Dialog>



                    <div  >
                        <ul class="personal-info"   >
                                <li  >
                                    <div class="title">Bank Name</div>
                                    <div class="text">
                                        <!-- {{ bank_information.bank_id }} -->
                                        <!-- {{ bank_info.bank_id }} -->
                                        {{  _instance_profilePagesStore.employeeDetails.get_employee_details.bank_id  }}

                                    </div>
                                </li>
                                <li  >
                                    <div class="title">Bank Account No.</div>
                                    <div class="text">
                                        <!-- {{ bank_info.pan_no }} -->

                                        {{  _instance_profilePagesStore.employeeDetails.get_employee_details.bank_account_number}}

                                       </div>
                                </li>
                                <li  >
                                    <div class="title">IFSC Code</div>
                                    <div class="text">
                                        {{ _instance_profilePagesStore.employeeDetails.get_employee_details.bank_ifsc_code}}
                                    </div>
                                </li>
                                <li >
                                    <div class="title">PAN No</div>
                                    <div class="text">
                                        {{_instance_profilePagesStore.employeeDetails.get_employee_details.pan_number}}
                                    </div>
                                </li>
                            </ul>
                    </div>
                    </div>
                </div>

                <div class="mb-2 card">
                    <div class="card-body">
                        <h6 class="">Statutory Information
                            <span class="personal-edit">
                                <a href="#" class="edit-icon" @click="onClick_EditButton_statutoryInfo ">
                                    <i class="ri-pencil-fill"></i>
                                </a>
                            </span>
                        </h6>

                        <Dialog v-model:visible="dialog_statutory_visible" modal header="Statutory Details"
                            :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                            <template #header>
                                <div>
                                    <h5
                                        :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                                        Statutory information</h5>
                                </div>
                            </template>

                            <div class="modal-body">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="floating">
                                            <label for="" class="float-label">PF
                                                Applicable<span class="text-danger">*</span></label>
                                            <select placeholder="PF Applicable" name="pf_applicable" id="pf_applicable"
                                                class="onboard-form form-control textbox select2_form_without_search"
                                                required v-model="statutory_information.pf_applicable">
                                                <option value="" hidden selected disabled>PF
                                                    Applicable</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-md-6 ">
                                        <div class="mb-3 form-group">
                                            <label>EPF Number</label>
                                            <input type="text" placeholder="EPF Number" name="epf_number" id="epf_number"
                                                class="onboard-form form-control " v-model="statutory_information.epf_no">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 form-group">
                                            <label>UAN Number</label>
                                            <input name="uan_number" id="uan_number" minlength="12" maxlength="12"
                                                class="form-control onboard-form"  type="text" pattern-data="ifsc"
                                                required v-model="statutory_information.uan_no">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3 form-group">
                                            <label class="float-label">ESIC
                                                Applicable<span class="text-danger">*</span></label>
                                            <select placeholder="ESIC Applicable" name="esic_applicable"
                                                id="esic_applicable"
                                                class="onboard-form form-control textbox select2_form_without_search"
                                                required v-model="statutory_information.esic_applicable">
                                                <option value="" hidden selected disabled>ESIC
                                                    Applicable</option>
                                                <option value="yes">
                                                    Yes
                                                </option>
                                                <option value="no">
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="floating">
                                            <label for="" class="float-label">ESIC Number</label>

                                            <input type="text" placeholder="ESIC Number" name="esic_number" id="esic_number"
                                                minlength="10" maxlength="10" class="onboard-form form-control textbox "
                                                v-model="statutory_information.esic_no" />
                                            <span class="error" id="error_esic_number"></span>
                                        </div>
                                    </div>




                                </div>

                                <div class="col-12">
                                    <div class="text-right">
                                        <button id="btn_submit_statutory_info"
                                            class="btn btn-border-orange submit-btn" @click="saveinfo_statutoryDetails">Save</button>
                                    </div>
                                </div>
                            </div>



                        </Dialog>


                        <ul class="personal-info"  >
                            <li>
                                <div class="title">PF Applicable</div>
                                <div class="text">
                                    {{  _instance_profilePagesStore.employeeDetails.get_employee_details.pf_applicable  }}

                                </div>
                            </li>
                            <li>
                                <div class="title">EPF Number</div>
                                <div class="text">
                                    <!-- {{ statutory_info.epf_no }} -->
                                {{ _instance_profilePagesStore.employeeDetails.get_employee_details.epf_number }}

                                </div>
                            </li>
                            <!-- Vishnu V24, [31-03-2023 15:40] -->
                            <li>
                                <div class="title">UAN Number</div>
                                <div class="text">
                                    <!-- {{ statutory_info.uan_no }} -->

                                    {{  _instance_profilePagesStore.employeeDetails.get_employee_details.uan_number }}

                                </div>
                            </li>

                            <li>
                                <div class="title">ESIC Applicable</div>
                                <div class="text">
                                    <!-- {{ statutory_info.esic_applicable }} -->
                                    {{  _instance_profilePagesStore.employeeDetails.get_employee_details.pf_applicable }}

                                </div>
                            </li>
                            <li>
                                <div class="title">ESIC Number</div>
                                <div class="text">
                              <!-- {{ statutory_info.esic_no }} -->

                              {{  _instance_profilePagesStore.employeeDetails.get_employee_details.esic_number }}

                                </div>
                            </li>
                        </ul>



                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="finance_pay" role="tabpanel" aria-labelledby="">
                <div class="mb-2 card">
                    <div class="card-body">
                        <ul class="mb-4 nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist">

                            <li class="nav-item " role="presentation">
                                <a class="nav-link active" id="" data-bs-toggle="pill" href="" data-bs-target="#pay_slips"
                                    role="tab" aria-controls="" aria-selected="true">
                                    Pay Slips
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content " id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pay_slips" role="tabpanel" aria-labelledby="">

                                <div id="" class="ember-view">
                                    <div class="table-responsive ">
                                        <table class="table table-hover">

                                            <thead class="fw-bold text-muted h5">
                                                <tr>
                                                    <th width="">Month</th>
                                                    <th width="">Gross Pay</th>
                                                    <th width="">Reimbursements</th>
                                                    <th width="">Deductions</th>
                                                    <th data-url="{{ route('vmt_employee_payslip_pdf') }}"
                                                        style="cursor: pointer" class="ember-view paySlipPDF text-info">
                                                        Download PDF
                                                    </th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
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

const _instance_profilePagesStore = profilePagesStore()

const fetch_data = Service()


onMounted(() => {
    // fetchData();
    fetch_data.getBankList().then(res => {
        bankNameList.value = res.data;
    })

});


const dialog_Bankvisible = ref(false);
const dialog_statutory_visible = ref(false);

const bank_info_data =ref()
const statutory_info_data =ref()

const bankNameList = ref();

const bank_information = reactive({
    bank_id: '',
    bank_ac_no: '',
    ifsc_code: '',
    pan_no: '',
})




const saveBankinfoDetails = () => {

    let id = fetch_data.current_user_id;


    let url = `/update-bank-info/${id}`;

    axios.post(url, {
            user_code: _instance_profilePagesStore.employeeDetails.user_code,
            bank_id: bank_information.bank_id.id,
            account_no: bank_information.bank_ac_no,
            bank_ifsc: bank_information.ifsc_code,
            pan_no: bank_information.pan_no
        })
        .then((res) => {

            if (res.data.status == "success") {
                 window.location.reload();
                toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });

                _instance_profilePagesStore.employeeDetails.get_employee_details.bank_id = bank_information.bank_id;
                _instance_profilePagesStore.employeeDetails.get_employee_details.account_no = bank_information.bank_ac_no;
                _instance_profilePagesStore.employeeDetails.get_employee_details.bank_ifsc = bank_information.ifsc_code ;
                _instance_profilePagesStore.employeeDetails.get_employee_details.pan_no = bank_information.pan_no;

            } else if (res.data.status == "failure") {
                leave_data.leave_request_error_messege = res.data.message;
            }
        })
        .catch((err) => {
            console.log(err);
        });

        dialog_Bankvisible.value = false;

}


function onClick_EditButton_BankInfo(){
    console.log("Opening General Info Dialog");

    // Assign json values into dialog elements also


     statutory_information.pf_applicable =_instance_profilePagesStore.employeeDetails.get_employee_details.pf_applicable ;
     statutory_information.epf_no   = _instance_profilePagesStore.employeeDetails.get_employee_details.epf_number ;
     statutory_information.uan_no   =   _instance_profilePagesStore.employeeDetails.get_employee_details.uan_number ;
     statutory_information.esic_applicable   =   _instance_profilePagesStore.employeeDetails.get_employee_details.esic_applicable ;
     statutory_information.esic_no    =   _instance_profilePagesStore.employeeDetails.get_employee_details.esic_number ;

     dialog_statutory_visible.value = true;

}


//
//
//



const statutory_information = reactive({
    pf_applicable: '',
    epf_no: '',
    uan_no: '',
    esic_applicable: '',
    esic_no: ''
})


const saveinfo_statutoryDetails = () => {

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
             window.location.reload();
            toast.add({ severity: 'success', summary: 'Updated', detail: 'General information updated', life: 3000 });

            _instance_profilePagesStore.employeeDetails.get_employee_details.pf_applicable = statutory_information.pf_applicable;
            _instance_profilePagesStore.employeeDetails.get_employee_details.epf_number = statutory_information.epf_no;
            _instance_profilePagesStore.employeeDetails.get_employee_details.uan_number = statutory_information.uan_no;
            _instance_profilePagesStore.employeeDetails.get_employee_details.esic_applicable = statutory_information.esic_applicable;
            _instance_profilePagesStore.employeeDetails.get_employee_details.esic_number = statutory_information.esic_no

        } else if (res.data.status == "failure") {
            leave_data.leave_request_error_messege = res.data.message;
        }
    })
    .catch((err) => {
        console.log(err);
    });

    dialog_statutory_visible.value = false;

}

function onClick_EditButton_statutoryInfo(){
console.log("Opening General Info Dialog");

// Assign json values into dialog elements also

            statutory_information.pf_applicable =_instance_profilePagesStore.employeeDetails.get_employee_details.pf_applicable
            statutory_information.epf_no = _instance_profilePagesStore.employeeDetails.get_employee_details.epf_number
            statutory_information.uan_no = _instance_profilePagesStore.employeeDetails.get_employee_details.uan_number
            statutory_information.esic_applicable = _instance_profilePagesStore.employeeDetails.get_employee_details.esic_applicable
            statutory_information.esic_no = _instance_profilePagesStore.employeeDetails.get_employee_details.esic_number

dialog_statutory_visible.value = true;

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


