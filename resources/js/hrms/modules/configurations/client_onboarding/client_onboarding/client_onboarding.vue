<template>
    <div class="my-4 shadow card profile-box card-top-border">
        <div class="mb-2 card-body justify-content-center align-items-center">
            <div class="p-2 my-4 form-card">

                <div class="mt-1 row">
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="client_code ">Client Code{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class=" float-label">Client Code</label>
                            <input type="text" placeholder="Client Code" name="client_code"
                                class="onboard-form form-control textbox" required 
                                v-model="client_onboarding.client_code" />
                            <!-- <label for="" class="float-label">Client Code</label> -->
                            <!-- id="client_code" placeholder="Autogenerate from Company Legal Name" -->

                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="client_name">Legal Name of the Company{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Legal Name of the Company</label>
                            <input type="text" placeholder="Legal Name of the Company" name="client_name" id="client_name"
                                class="onboard-form form-control textbox" v-model="client_onboarding.client_name"
                                required />

                            <!-- <label for="" class="float-label">Legal Name of the Company</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="csd">Contract Start Date{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class=" float-label">Contract Start Date</label>
                            <input type="text" max="9999-12-31" placeholder="Contract Start Date" name="csd"
                                class="onboard-form form-control textbox" onfocus="(this.type='date')" required
                                v-model="client_onboarding.contract_start_date" />
                            <!-- <label for="" class="float-label">Contract Start Date</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="ced">Contract End Date{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Contract End Date</label>
                            <input type="text" max="9999-12-31" placeholder="Contract End Date" name="ced"
                                class="onboard-form form-control textbox" onfocus="(this.type='date')" required
                                v-model="client_onboarding.contract_end_date" />
                            <!-- <label for="" class="float-label">Contract End Date</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="cin_no">Company Identification Number{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Company Identification
                                Number</label>
                            <input type="text" placeholder="Company Identification Number" name="cin_no"
                                class="onboard-form form-control textbox" pattern="alp-num" required
                                v-model="client_onboarding.cin_number" />
                            <label class="error cin_no_label" for="cin_no" style="display: none;"></label>
                            <!-- <label for="" class="float-label">Company Identification Number</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="com_tan">Company TAN{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Company TAN</label>
                            <input type="text" placeholder="Company TAN" name="com_tan"
                                class="onboard-form form-control textbox" pattern="alp-num"
                                v-model="client_onboarding.company_tan" required />
                            <label class="error com_tan_label" for="com_tan" style="display: none;"></label>
                            <!-- <label for="" class="float-label">Company TAN</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="com_pan">Company PAN{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Company PAN</label>
                            <input type="text" placeholder="Company PAN" name="com_pan" id="com_pan"
                                class="onboard-form form-control textbox" pattern="alp-num" required
                                v-model="client_onboarding.company_pan" />
                            <label class="error com_pan_label" for="com_pan" style="display: none;"></label>
                            <span id="pan_err" style="display: none; color: darkred;" class="text-danger">
                                Please Enter Valid Pan Number</span>
                            <!-- <label for="" class="float-label">Company PAN</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="gst_no">GST No{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">GST No</label>
                            <input type="text" placeholder="GST No" name="gst_no" class="onboard-form form-control textbox"
                                pattern="gst" required v-model="client_onboarding.gst_no" />
                            <label class="error gst_no_label" for="gst_no" style="display: none;"></label>
                            <!-- <label for="" class="float-label">GST No</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="epf">EPF Registration Number{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">EPF Registration Number</label>
                            <input type="text" placeholder="EPF Registration Number" name="epf"
                                class="onboard-form form-control textbox" pattern="alp-num"
                                v-model="client_onboarding.epf_reg_number" required />
                            <label class="error epf_label" for="epf" style="display: none;"></label>
                            <!-- <label for="" class="float-label">EPF Registration Number</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="esic">ESIC Registration Number{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">ESIC Registration Number</label>

                            <input type="text" placeholder="ESIC Registration Number" name="esic"
                                class="onboard-form form-control textbox" pattern="alp-num" required
                                v-model="client_onboarding.esic_reg_number" />
                            <label class="error esic_label" for="esic" style="display: none;"></label>

                            <!-- <label for="" class="float-label">ESIC Registration Number</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="professional_tax">Professional Tax Registration Number{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Professional Tax Registration
                                Number</label>

                            <input type="text" placeholder="Professional Tax Registration Number" name="professional_tax"
                                class="onboard-form form-control textbox" pattern="alp-num" required
                                v-model="client_onboarding.prof_tax_reg_number" />
                            <label class="error professional_tax_label" for="professional_tax"
                                style="display: none;"></label>
                            <!-- <label for="" class="float-label">Professional Tax Registration Number</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="lwf">LWF Registration Number{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">LWF Registration Number</label>

                            <input type="text" placeholder="LWF Registration Number" name="lwf"
                                v-model="client_onboarding.lwf_reg_number" class="onboard-form form-control textbox"
                                pattern="alp-num" required />
                            <label class="error lwf_label" for="lwf" style="display: none;"></label>
                            <!-- <label for="" class="float-label">LWF Registration Number</label> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="shadow card profile-box card-top-border ">
        <div class="card-body justify-content-center align-items-center">
            <div class="p-2 mb-2 form-card">
                <div class="text-primary header-card-text">
                    <h6>Authorized Details</h6>
                </div>
                <div class="mt-1 row">
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="auth_person_name">Authorized Person Name{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Authorized Person Name</label>
                            <input type="text" placeholder="Authorized Person Name" name="auth_person_name"
                                class="onboard-form form-control textbox" pattern="alpha" required
                                v-model="client_onboarding.authorised_person_name" />
                            <label class="error auth_person_name_label" for="auth_person_name"
                                style="display: none;"></label>
                            <!-- <label for="" class="float-label">Authorized Person Name</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="auth_person_desig">Authorized Person Designation{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Authorized Person
                                Designation</label>
                            <input type="text" placeholder="Authorized Person Designation" name="auth_person_desig"
                                class="onboard-form form-control textbox" pattern="alpha" required
                                v-model="client_onboarding.authorised_person_designation" />
                            <label class="error auth_person_desig_label" for="auth_person_desig"
                                style="display: none;"></label>
                            <!-- <label for="" class="float-label">Authorized Person Designation</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="auth_person_contact">Authorized Person Contact Number{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Authorized Person Contact
                                Number</label>
                            <input type="number" minlength="10" maxlength="10"
                                placeholder="Authorized Person Contact Number" name="auth_person_contact"
                                class="onboard-form form-control textbox" required
                                v-model="client_onboarding.authorised_person_contact_number" />
                            <!-- <label for="" class="float-label">Authorized Person Contact Number</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="auth_person_email">Authorized Person Contact Email{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Authorized Person Contact
                                Email</label>
                            <input type="email" placeholder="Authorized Person Contact Email" name="auth_person_email"
                                class="onboard-form form-control textbox" required
                                v-model="client_onboarding.authorised_person_contact_email" />
                            <!-- <label for="" class="float-label">Authorized Person Contact Email</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="billing_add">Billing Address{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Billing Address</label>
                            <input type="text" placeholder="Billing Address" name="billing_add"
                                class="onboard-form form-control textbox" required
                                v-model="client_onboarding.billing_address" />
                            <!-- <label for="" class="float-label">Billing Address</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="shipping_add">Shipping Address{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Shipping Address</label>

                            <input type="text" placeholder="Shipping Address" name="shipping_add"
                                class="onboard-form form-control textbox" required
                                v-model="client_onboarding.shipping_address" />
                            <!-- <label for="" class="float-label">Shipping Address</label> -->
                        </div>
                    </div>

                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="product">Product{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Select Product</label>
                            <select placeholder="Product" name="product" id="product"
                                class="form-select onboard-form form-control" required v-model="client_onboarding.product">
                                <option value="" class="text-muted" hidden selected disabled>
                                    Select
                                    Product</option>
                                <option value="Recruitment">Recruitment</option>
                                <option value="Payroll">Payroll</option>
                                <option value="Statutory Complainces">Statutory Complainces</option>
                                <option value="Staffing">Staffing</option>
                                <option value="PMS">PMS</option>
                                <option value="Accounting">Accounting</option>
                                <option value="ROC Complainces">ROC Complainces</option>
                                <option value="Trade Mark">Trade Mark</option>
                                <option value="Patent Right">Patent Right</option>
                            </select>
                            <!-- <label for="" class="float-label">Select Product</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="subscription_type">Subscription Type{!! required() !!}</label> -->
                        <div class="floating">
                            <label for="" class="float-label">Subscription Type</label>
                            <select placeholder="Subscription Type" name="subscription_type" id="subscription_type"
                                v-model="client_onboarding.subscription_type" class="form-select form-control" aria-label=""
                                required>
                                <option value="" disabled selected hidden>Select Subscription
                                    Type
                                </option>
                                <option value="Monthly">Monthly</option>
                                <option value="Quarterly">Quarterly</option>
                                <option value="BiAnnually">BiAnnually</option>
                                <option value="Annually">Annually</option>
                            </select>
                            <!-- <label for="" class="float-label">Subscription Type</label> -->
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard">
                        <!-- <label class="" for="doc_uploads">Documents Upload{!! required() !!}</label> -->
                        <!-- <div class="floating"> -->
                      <label for="" class="float-label">Document </label>
                        <input @change="client_onboarding_document($event)" type="file" placeholder="Documents Upload" 
                            class="onboard-form form-control textbox " required
                            accept=".doc,.docx,.pdf,image/*" />
                     
                    </div>
                    <div class="text-right col-12">

                        <button type="button" @click="submit" class="text-center btn btn-orange"
                            value="Submit">Submit</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script setup>
import axios from "axios";
import { reactive, ref } from "vue";

const client_onboarding = reactive({
    client_code: "",
    client_name: "",
    contract_start_date: "",
    contract_end_date: "",
    cin_number: "",
    company_tan: "",
    company_pan: "",
    gst_no: "",
    epf_reg_number: "",
    esic_reg_number: "",
    prof_tax_reg_number: "",
    lwf_reg_number: "",
    authorised_person_name: "",
    authorised_person_designation: "",
    authorised_person_contact_number: "",
    authorised_person_contact_mail: "",
    billing_address: "",
    shipping_address: "",
    subscription_type:'',
    doc_uploads:""

})



const submit = () => {


    const config = {
        headers: { "content-type": "multipart/form-data" },
    };

    let formData = new FormData();

    formData.append('client_name', client_onboarding.client_name)
    formData.append('client_code', client_onboarding.client_code)
    formData.append('contract_start_date', client_onboarding.contract_start_date)
    formData.append('contract_end_date', client_onboarding.contract_end_date)
    formData.append('cin_number', client_onboarding.cin_number)
    formData.append('company_tan', client_onboarding.company_tan)
    formData.append('company_pan', client_onboarding.company_pan)
    formData.append('gst_no', client_onboarding.gst_no)
    formData.append('epf_reg_number', client_onboarding.epf_reg_number)
    formData.append('esic_reg_number', client_onboarding.esic_reg_number)
    formData.append('prof_tax_reg_number', client_onboarding.prof_tax_reg_number)
    formData.append('lwf_reg_number', client_onboarding.lwf_reg_number)
    formData.append('authorised_person_name', client_onboarding.authorised_person_name)
    formData.append('authorised_person_designation', client_onboarding.authorised_person_designation)
    formData.append('authorised_person_contact_number', client_onboarding.authorised_person_contact_number)
    formData.append('billing_address', client_onboarding.billing_address)
    formData.append('shipping_address', client_onboarding.shipping_address)
    formData.append('doc_uploads', client_onboarding.doc_uploads)
    formData.append('subscription_type', client_onboarding.subscription_type)


    console.log(formData);

    axios.post('vmt_clientOnboarding', formData,config).then(res => {
        console.log("onboarding successfully");
    }).catch(err => console.log(err)).finally(() => {
        console.log("axios completed");
    })
}


const client_onboarding_document = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    client_onboarding.doc_uploads = e.target.files[0]
    console.log(client_onboarding.doc_uploads);
  }
};

</script>