<template>
    <div>
        <div class="card left-line mb-2 ">
            <div class="card-body pb-0 pt-1">
                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item  " role="presentation">
                        <a class="nav-link active " id="" data-bs-toggle="pill" href="" data-bs-target="#finance_summary"
                            role="tab" aria-controls="pills-home" aria-selected="true">Summary
                        </a>
                    </li>
                    <li class="nav-item mx-4  " role="presentation">
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
                <div class="card mb-2">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="">
                                    Payroll Summary

                                </h6>
                                <!-- {{-- <button class="btn btn-border-orange">View Payslip </button> --}} -->
                            </div>


                            <ul class="personal-info">
                                <li class="border-bottom-liteAsh pb-1">
                                    <div class="title">Last Processed</div>
                                    <div class="text">
                                        -
                                    </div>
                                </li>
                                <li class="border-bottom-liteAsh pb-1">
                                    <div class="title">Total Working Days</div>
                                    <div class="text">
                                        -
                                    </div>
                                </li>
                                <li class=" pb-1">
                                    <div class="title">Loss Of Pay(LOP)</div>
                                    <div class="text">
                                        -
                                    </div>
                                </li>
                            </ul>

                        </form>

                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Vishnu V24, [31-03-2023 15:40] -->
                            <h6 class="">Bank Information
                                <span class="personal-edit">
                                    <a href="#" class="edit-icon" @click="visible = true"><i class="ri-pencil-fill"></i>
                                    </a>
                                </span>
                            </h6>

                            <Dialog v-model:visible="visible" modal header="Header"
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
                                                <div class="form-group mb-3">
                                                    <label>Bank Name</label>

                                                    <!-- <select name="bank_name" id="bank_name"
                                                                                    class="form-select form-control onboard-form" required>
                                                                                    <option value="">Select</option>

                                                                                            <option value="{{ $b->bank_name ?? '' }}"
                                                                                                min-data="{{ $b->min_length }}" max-data="{{ $b->max_length }}"
                                                                                               >
                                                                                            </option>

                                                                                </select> -->

                                                    <!-- <Dropdown v-model="selectedCountry" field="name" :options="bankNameList" filter optionLabel="name"  class="form-controls w-full ">
                                                                                    <template #value="slotProps">
                                                                                        <div v-if="slotProps.value" class="flex align-items-center" :style="{ marginTop: '-5px'}">
                                                                                            <div >{{ slotProps.value.bank_name }}</div>
                                                                                        </div>
                                                                                        <span v-else>
                                                                                            {{ slotProps.placeholder }}
                                                                                        </span>
                                                                                    </template>
                                                                                    <template #option="slotProps">
                                                                                        <div class="flex align-items-center">
                                                                                            <div>{{ slotProps.option.bank_name }}</div>
                                                                                        </div>
                                                                                    </template>
                                                                                </Dropdown> -->

                                                    <Dropdown editable :options="bankNameList" optionLabel="bank_name"
                                                        placeholder="Select Bank Name" class="form-controls w-full " />


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Bank Account No</label>
                                                    <div class="cal-icon">
                                                        <!-- <input name="account_no" type="number" minlength="9" maxlength="18"
                                                                                    class="form-control onboard-form"
                                                                                    value="{{ $user_full_details->bank_account_number ?? '' }}"
                                                                                    pattern-data="account" required> -->

                                                    </div>
                                                    <InputNumber v-model="value1" class="form-controls onboard-form"
                                                        inputId="integeronly" name="account_no" :min="0" :max="100" />
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>IFSC Code</label>
                                                    <!-- <input name="bank_ifsc" class="form-control onboard-form"
                                                                                value="" type="text"
                                                                                pattern-data="ifsc" required> -->
                                                    <InputText type="text" v-model="value" name="bank_ifsc_"
                                                        class="form-controls" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>PAN No</label>
                                                    <!-- <input name="pan_no" class="form-control onboard-form"
                                                                                value="" type="text"
                                                                                pattern-data="pan" required> -->
                                                    <InputText type="text" v-model="values" name="pan_nos"
                                                        class="form-controls" />

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <button id="btn_submit_bank_info"
                                                    class="btn btn-orange submit-btn">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </Dialog>




                            <ul class="personal-info">
                                <li>
                                    <div class="title">Bank Name</div>
                                    <!-- <?php $bank_name = App\Models\Bank::where('id', $user_full_details->bank_id)->value('bank_name'); ?> -->
                                    <div class="text">
                                        <!-- {{ $bank_name ?? '-' }} -->
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Bank Account No.</div>
                                    <div class="text">
                                        <!-- {{ $user_full_details->bank_account_number ?? '-' }} -->
                                    </div>
                                </li>
                                <li>
                                    <div class="title">IFSC Code</div>
                                    <div class="text">
                                        <!-- {{ $user_full_details->bank_ifsc_code ?? '-' }} -->
                                    </div>
                                </li>
                                <li>
                                    <div class="title">PAN No</div>
                                    <div class="text">
                                        <!-- {{ $user_full_details->pan_number ?? '-' }} -->
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-body">
                        <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                            <h6 class="">Statutory Information
                                <span class="personal-edit">
                                    <a href="#" class="edit-icon" data-bs-target="#statutory_info" @click="visible = true">
                                        <i class="ri-pencil-fill"></i>
                                    </a>
                                </span>
                            </h6>



                            <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">

                                <div id="statutory_info" class="modal custom-modal fade" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content profile-box  ">
                            <div class="modal-header   border-0">
                                <h6>Statutory Details</h6>
                                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @csrf

                            <div class="modal-body">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="floating">
                                            <label for="" class="float-label">PF
                                                Applicable<span class="text-danger">*</span></label>
                                            <select placeholder="PF Applicable" name="pf_applicable" id="pf_applicable"
                                                class="onboard-form form-control textbox  select2_form_without_search"
                                                required>
                                                <option value="" hidden selected disabled>PF
                                                    Applicable</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-md-6 ">
                                        <div class="form-group mb-3">
                                            <label>EPF Number</label>
                                            <input type="text" placeholder="EPF Number" name="epf_number"
                                                id="epf_number" class="onboard-form form-control "
                                                value=" ">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>UAN Number</label>
                                            <input name="uan_number" id="uan_number" minlength="12" maxlength="12"
                                                class="form-control onboard-form" value=""
                                                type="text" pattern-data="ifsc" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="float-label">ESIC
                                                Applicable<span class="text-danger">*</span></label>
                                            <select placeholder="ESIC Applicable" name="esic_applicable"
                                                id="esic_applicable"
                                                class="onboard-form form-control textbox  select2_form_without_search"
                                                required>
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

                                            <input type="text" placeholder="ESIC Number" name="esic_number"
                                                id="esic_number" minlength="10" maxlength="10"
                                                class="onboard-form form-control textbox "
                                                value="{{ $detail->esic_number ?? '' }}" />
                                            <span class="error" id="error_esic_number"></span>
                                        </div>
                                    </div>




                                </div>

                                <div class="col-12">
                                    <div class="text-right">
                                        <button
                                            id="btn_submit_statutory_info" class="btn btn-border-orange submit-btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                            </Dialog>








                            <!-- {{-- @if (!empty($statutory_info))
                                                @foreach ($statutory_info as $detail) --}} -->
                             <ul class="personal-info">
                                <li>
                                    <div class="title">PF Applicable</div>
                                    <div class="text">
                                        <!-- {{ $statutory_info->pf_applicable ?? '-' }} -->

                                    </div>
                                </li>
                                <li>
                                    <div class="title">EPF Number</div>
                                    <div class="text">
                                        <!-- {{ $statutory_info->epf_number ?? '-' }} -->

                                    </div>
                                </li>
                                <!-- Vishnu V24, [31-03-2023 15:40] -->
                                <li>
                                    <div class="title">UAN Number</div>
                                    <div class="text">
                                        <!-- {{ $statutory_info->uan_number ?? '-' }} -->

                                    </div>
                                </li>

                                <li>
                                    <div class="title">ESIC Applicable</div>
                                    <div class="text">
                                        <!-- {{ $statutory_info->esic_applicable ?? '-' }} -->

                                    </div>
                                </li>
                                <li>
                                    <div class="title">ESIC Number</div>
                                    <div class="text">


                                    </div>
                                </li>
                            </ul>


                        <!-- </form> -->

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="finance_pay" role="tabpanel" aria-labelledby="">
                <div class="card mb-2">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-4   nav-tabs-dashed" id="pills-tab" role="tablist">

                            <li class="nav-item   " role="presentation">
                                <a class="nav-link active" id="" data-bs-toggle="pill" href="" data-bs-target="#pay_slips"
                                    role="tab" aria-controls="" aria-selected="true">
                                    Pay Slips
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content " id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pay_slips" role="tabpanel" aria-labelledby="">

                                <!-- {{-- <h6 class=""> Pay Slips</h6> --}} -->
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
                                                        style="cursor: pointer" class="ember-view  paySlipPDF text-info">
                                                        Download PDF
                                                    </th>
                                                </tr>
                                            </thead>
                                            <!-- @endforeach -->

                                        </table>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- </div> -->

        <div id="edit_department" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content profile-box">
                    <div class="modal-header  ">
                        <h6 class="modal-title">Edit Department
                        </h6>
                        <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label>Department<span class="text-danger">*</span></label>

                            <select class="form-select form-control" name="gender" aria-label="Default select"
                                id="selected_dep">
                                <option selected hidden disabled>Choose Gender</option>
                                <!-- @foreach ($allDepartments as $singleDepartment) -->
                                <option value="{{ $singleDepartment->id }}">
                                </option>
                                <!-- @endforeach -->
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-right">
                            <button class="btn btn-orange submit-btn" id="save_department">Save</button>
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

const visible = ref(false);

const selectedCountry = ref();

const Bank_Name = ref([

]);

const bankNameList = ref();

const saveFinanceDetails = () => {
    let url = 'http://localhost:3000/posts';

    visible.value = false

    console.log(familydetails);

    axios.post(url, Bank_Name).then(res => {
        console.log("sent sucessfully");
    }).catch(err => {
        console.log(err);
    }).finally(() => {
        console.log("completed");
    })
}


onMounted(() => {
    fetchData();
});


const fetchData = () => {
    let url = '/db/getBankDetails'
    axios.get(url)
        .then((response) => {
            console.log(response.data);
            bankNameList.value = response.data;
        });
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
        <Dropdown v-model="selectedCity" editable :options="cities" optionLabel="name" placeholder="Select a City" class="w-full md:w-14rem" />
    </div>
</template>

<script setup>
import { ref } from "vue";

const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);
</script>
 -->



<!-- <template>
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

// const visible = ref(false);
</script> -->
}
