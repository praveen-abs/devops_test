<template>
  <Toast />
  <div class="container-fluid mt-30">
    <div class="">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div id="msform">
            <form
              @submit.prevent="handleSubmit(!v$.$invalid)"
              class="p-fluid"
              enctype="multipart/form-data"
            >
              <input type="hidden" name="user_id" id="user_id" value="" />
              <input
                type="hidden"
                name="can_redirect"
                id="can_redirect"
                value="0"
              />

              <!-- Personal Details Start -->

              <div class="p-2 shadow card profile-box card-top-border">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6>Personal Details</h6>
                  </div>

                  <div class="form-card">
                    <div class="mt-1 row">
                      <div
                        class="mb-2 col-md -6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Employee Code</label
                          >
                          <InputText
                            class="capitalize form-onboard-form form-control textbox"
                            type="text"
                            v-model="v$.employee_code.$model"
                            placeholder="Employee Code"
                            @input="userCodeExists"
                          />

                          <span v-if=" user_code_exists "  class="p-error">Employee code Already Exists</span>

                        </div>
                      </div>

                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="employee_name" class="float-label"
                            >Employee Name as per Aadhar
                            <span class="text-danger">*</span>
                          </label>

                          <InputText
                            class="capitalize onboard-form form-control textbox"
                            type="text"
                            v-model="v$.employee_name.$model"
                            :class="{
                              'p-invalid':
                                v$.employee_name.$invalid && submitted,
                            }"
                            style="text-transform: uppercase"
                            placeholder="Employee Name as per Aadhar "
                          />

                          <span
                            v-if="
                              (v$.employee_name.$invalid && submitted) ||
                              v$.employee_name.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.employee_name.required.$message.replace(
                                "Value",
                                "Employee Name as per in Aadhar"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of Birth</label
                          >
                          <input
                            type="text"
                            max="9999-12-31"
                            v-model="v$.dob.$model"
                            placeholder="Date of birth"
                            id="doj"
                            name="doj"
                            class="onboard-form form-control textbox"
                            onfocus="(this.type='date')"
                          />

                          <span class="error" id="error_pan_no"></span>
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Marital Status
                            <span class="text-danger">*</span></label
                          >
                          <Dropdown
                            v-model="v$.marital_status.$model"
                            :options="maritalDetails"
                            optionLabel="name"
                            placeholder="Select Martial Status"
                            @change="spouseDisable"
                          />

                          <span
                            v-if="
                              (v$.marital_status.$invalid && submitted) ||
                              v$.marital_status.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.marital_status.required.$message.replace(
                                "Value",
                                "Marital Status"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of Joining<span class="text-danger"
                              >*</span
                            ></label
                          >

                          <InputText
                            type="text"
                            max="9999-12-31"
                            v-model="v$.doj.$model"
                            placeholder="Date of Joining"
                            id="doj"
                            name="doj"
                            :class="{
                              'p-invalid': v$.doj.$invalid && submitted,
                            }"
                            class="form-control textbox"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.doj.$invalid && submitted) ||
                              v$.doj.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.doj.required.$message.replace(
                                "Value",
                                "Date Of Joining"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Gender<span class="text-danger">*</span></label
                          >
                          <Dropdown
                            v-model="v$.gender.$model"
                            :options="Gender"
                            optionLabel="name"
                            optionValue="value"
                            placeholder="Select Gender"
                          />

                          <span
                            v-if="
                              (v$.gender.$invalid && submitted) ||
                              v$.gender.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.gender.required.$message.replace(
                                "Value",
                                "Gender"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Mobile Number<span class="text">*</span></label
                          >
                          <InputText
                            type="text"
                            placeholder="Mobile Number"
                            :class="{
                              'p-invalid':
                                v$.mobile_number.$invalid && submitted,
                            }"
                            v-model="v$.mobile_number.$model"
                            class="form-control textbox"
                            minlength="10"
                            maxlength="10"
                          />
                        </div>
                        <span
                          v-if="
                            (v$.mobile_number.$invalid && submitted) ||
                            v$.mobile_number.$pending.$response
                          "
                          class="p-error"
                          >{{
                            v$.mobile_number.required.$message.replace(
                              "Value",
                              "Mobile Number"
                            )
                          }}</span
                        >
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Email<span class="text-danger">*</span></label
                          >
                          <InputText
                            type="text"
                            placeholder="Email ID"
                            :class="{
                              'p-invalid': v$.email.$invalid && submitted,
                            }" @input="personalMailExists"
                            v-model="v$.email.$model"
                            class="form-control textbox"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                          />

                          <span v-if="personal_mail_exists "  class="p-error">Email is already exists</span>


                          <span
                            v-if="
                              (v$.email.$invalid && submitted) ||
                              v$.email.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.email.required.$message.replace(
                                "Value",
                                "Email"
                              )
                            }}</span
                          >
                        </div>
                        <span class="error" id="error_email"></span>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Aadhaar Number<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <!-- <InputText class="onboard-form form-control textbox " id="AadharNumber"
                                                        placeholder="Aadhaar Number"

                                                        pattern="/^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/"
                                                        data-pattern-error="wel" autocomplete="off" type="text" /> -->
                          <InputMask
                            id="ssn"
                            mask="9999 9999 9999"
                            placeholder="9999 9999 9999"
                            v-model="v$.aadhar_number.$model"
                            :class="{
                              'p-invalid':
                                v$.aadhar_number.$invalid && submitted,
                            }"
                          />
                          <span
                            v-if="
                              (v$.aadhar_number.$invalid && submitted) ||
                              v$.aadhar_number.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.aadhar_number.required.$message.replace(
                                "Value",
                                "Aadhaar Number"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 co l-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Pan Number / Pan Acknowlegement<span
                              class="text-danger"
                              >*</span
                            ></label
                          >

                          <InputMask
                            id="serial"
                            mask="aaaaa9999a"
                            v-model="v$.pan_number.$model"
                            placeholder="AHFCS1234F"
                            style="text-transform: uppercase"
                            class="form-control textbox"
                            :class="{
                              'p-invalid': v$.pan_number.$invalid && submitted,
                            }"
                          />

                          <span
                            v-if="
                              (v$.pan_number.$invalid && submitted) ||
                              v$.pan_number.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.pan_number.required.$message.replace(
                                "Value",
                                "Pan Number"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">DL Number</label>
                          <InputText
                            class="onboard-form form-control textbox"
                            type="text"
                            v-model="v$.dl_no.$model"
                            placeholder="DL Number"
                            minlength="16"
                            maxlength="16"
                          />
                          <label
                            class="error star_error dl_no_label"
                            for="dl_no"
                            style="display: none"
                          ></label>

                          <span class="error" id="error_dl_no"></span>
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Choose nationality<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <Dropdown
                            v-model="v$.nationality.$model"
                            :options="Nationality"
                            optionLabel="name"
                            optionValue="name"
                            placeholder="Select Nationality"
                            @change="NationalityCheck"
                          />

                          <span
                            v-if="
                              (v$.nationality.$invalid && submitted) ||
                              v$.nationality.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.nationality.required.$message.replace(
                                "Value",
                                "Choose Nationality"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        v-if="NationalityData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Passport Number<span
                              class="text-danger"
                              id="asterisk_passport_no"
                            ></span
                          ></label>
                          <InputText
                            minlength="8"
                            maxlength="8"
                            class="form-control textbox"
                            v-model="v$.passport_number.$model"
                            placeholder="Passport Number"
                          />

                          <span class="error" id="error_passport_no"></span>
                        </div>
                      </div>
                      <div
                        v-if="NationalityData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Passport Exp Date<span
                              class="text-danger"
                              id="asterisk_passport_expdate"
                            ></span
                          ></label>
                          <input
                            type="text"
                            v-model="v$.passport_date.$model"
                            placeholder="Passport Expiry Date"
                            id="doj"
                            name="doj"
                            class="onboard-form form-control textbox"
                            onfocus="(this.type='date')"
                          />

                          <span class="" id="error_passport_date"></span>
                        </div>
                      </div>

                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Blood Group</label>

                          <Dropdown
                            v-model="v$.blood_group_name.$model"
                            :options="bloodGroups"
                            optionLabel="name"
                            placeholder="Select Bloodgroup"
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Physically Challenged</label
                          >

                          <Dropdown
                            v-model="v$.physically_challenged.$model"
                            :options="PhyChallenged"
                            optionLabel="name"
                            optionValue="value"
                            placeholder="Physically Challenged"
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Bank Name<span class="text-danger">*</span></label
                          >
                          <Dropdown
                            editable
                            v-model="v$.bank_name.$model"
                            :options="bankList"
                            optionLabel="bank_name"
                            placeholder="Select Bank Name"
                          />

                          <span
                            v-if="
                              (v$.bank_name.$invalid && submitted) ||
                              v$.bank_name.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.bank_name.required.$message.replace(
                                "Value",
                                "Bank Name "
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Account Number<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <InputText
                            placeholder="Account Number"
                            minlength="10"
                            :class="{
                              'p-invalid':
                                v$.AccountNumber.$invalid && submitted,
                            }"
                            maxlength="18"
                            class="onboard-form form-control textbox"
                            type="text"
                            v-model="v$.AccountNumber.$model"
                          />

                          <span
                            v-if="
                              (v$.AccountNumber.$invalid && submitted) ||
                              v$.AccountNumber.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.AccountNumber.required.$message.replace(
                                "Value",
                                "Account Number"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Bank IFSC Code<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <InputText
                            type="text"
                            v-model="v$.bank_ifsc.$model"
                            :class="{
                              'p-invalid': v$.bank_ifsc.$invalid && submitted,
                            }"
                            class="form-control textbox"
                            pattern="^[A-Z]{4}0[A-Z0-9]{6}$"
                            minlength="11"
                            maxlength="12"
                            placeholder="Bank IFSC Code"
                          />

                          <span
                            v-if="
                              (v$.bank_ifsc.$invalid && submitted) ||
                              v$.bank_ifsc.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.bank_ifsc.required.$message.replace(
                                "Value",
                                "Bank IFSC Code"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Personal details End -->

              <!-- Statustory start -->

              <!-- <div class="p-2 shadow card profile-box card-top-border">
        <div class="card-body justify-content-center align-items-center">
            <div class="form-card">
                <div class=" header-card-text">
                    <h6>Statutory Details</h6>
                </div>
                <div class="row ">
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                        <div class="floating">
                            <label for="" class="float-label">PF
                                Applicable<span class="text-danger">*</span></label>
                            <InputText
                                class="onboard-form form-control textbox select2_form_without_search"
                                type="text" v-model="PFApplicable"
                                placeholder="PF Applicable" />

                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                        <div class="floating">
                            <label for="" class="float-label">EPF Number</label>
                            <InputText class="onboard-form form-control textbox "
                                placeholder="EPF Number" type="text" v-model="epf_number" />

                            <span class="error" id="error_epf_number"></span>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                        <div class="floating">
                            <label for="" class="float-label">UAN Number</label>
                            <InputText id="uan_number" minlength="12" maxlength="12"
                                placeholder="UAN Number"
                                class="onboard-form form-control textbox " type="text"
                                v-model="value" />

                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                        <div class="floating">
                            <label for="" class="float-label">ESIC
                                Applicable<span class="text-danger">*</span></label>
                            <Dropdown style="height: 2.4em;"
                                class="onboard-form form-control textbox select2_form_without_search"
                                placeholder="ESIC Applicable" v-model="selectedCity2"
                                :options="cities" optionLabel="name" :editable="true" />

                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3">
                        <div class="floating">
                            <label for="" class="float-label">ESIC Number</label>

                            <InputText placeholder="ESIC Number" minlength="10"
                                maxlength="10" class="onboard-form form-control textbox "
                                type="text" v-model="ESICNumber" />


                            <span class="error" id="error_esic_number"></span>
                        </div>
                    </div>

                    <div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3">
                        <div class="floating">
                            <label for="" class="float-label">Ptax
                                Location</label>
                            <Dropdown style="height: 2.4em;"
                                class="onboard-form form-control textbox select2_form_without_search"
                                placeholder="Ptax Location" v-model="selectedCity2"
                                :options="cities" optionLabel="name" :editable="true" />


                        </div>
                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3">
                        <div class="floating">
                            <label for="" class="float-label">TAX Regime<span
                                    class="text-danger">*</span> </label>
                            <Dropdown style="height: 2.4em;"
                                class="onboard-form form-control textbox select2_form_without_search"
                                placeholder="TAX Regime" v-model="selectedCity2"
                                :options="cities" optionLabel="name" :editable="true" />



                        </div>
                    </div>
                </div>
                <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">
                    <div class="floating">
                        <label for="" class="float-label">LWF Location</label>
                        <Dropdown style="height: 2.4em;" placeholder="LWF Location"
                            class="onboard-form form-control textbox select2_form_without_search"
                            v-model="selectedCity2" :options="cities" optionLabel="name"
                            :editable="true" />

                    </div>
                </div>
            </div>
        </div>
            </div>  -->

              <!--Statustory end -->

              <!-- Address start -->

              <!-- Current Address Start -->

              <div class="p-2 shadow card profile-box card-top-border">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="form-card">
                    <div class="header-card-text">
                      <h6>Current Address</h6>
                    </div>
                    <div class="mt-1 row">
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Address 1<span class="text-danger">*</span></label
                          >
                          <Textarea
                            style="height: 100px"
                            class="capitalize form-control textbox"
                            type="text"
                            rows="3"
                            current_address_line_1
                            :class="{
                              'p-invalid':
                                v$.current_address_line_1.$invalid && submitted,
                            }"
                            v-model="v$.current_address_line_1.$model"
                            placeholder="Current Address"
                          />

                          <span
                            v-if="
                              (v$.current_address_line_1.$invalid &&
                                submitted) ||
                              v$.current_address_line_1.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.current_address_line_1.required.$message.replace(
                                "Value",
                                "Current Address 1"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Address 2<span class="text-danger">*</span></label
                          >

                          <Textarea
                            style="height: 100px"
                            class="capitalize form-control textbox"
                            type="text"
                            rows="3"
                            current_address_line_2
                            :class="{
                              'p-invalid':
                                v$.current_address_line_2.$invalid && submitted,
                            }"
                            v-model="v$.current_address_line_2.$model"
                            placeholder="Current Address"
                          />

                          <span
                            v-if="
                              (v$.current_address_line_2.$invalid &&
                                submitted) ||
                              v$.current_address_line_2.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.current_address_line_2.required.$message.replace(
                                "Value",
                                "Current Address 2"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Country<span class="text-danger">*</span></label
                          >
                          <Dropdown
                            editable
                            v-model="v$.current_country.$model"
                            :class="{
                              'p-invalid':
                                v$.current_country.$invalid && submitted,
                            }"
                            :options="country"
                            optionLabel="country_name"
                            placeholder="Select Country Name"
                          />
                          <span
                            v-if="
                              (v$.current_country.$invalid && submitted) ||
                              v$.current_country.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.current_country.required.$message.replace(
                                "Value",
                                "country"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >State<span class="text-danger">*</span></label
                          >

                          <Dropdown
                            editable
                            v-model="v$.current_state.$model"
                            :class="{
                              'p-invalid':
                                v$.current_state.$invalid && submitted,
                            }"
                            :options="state"
                            optionLabel="state_name"
                            placeholder="Select State Name"
                          />
                          <span
                            v-if="
                              (v$.current_state.$invalid && submitted) ||
                              v$.current_state.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.current_state.required.$message.replace(
                                "Value",
                                "State"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">
                            City<span class="text-danger">*</span></label
                          >

                          <InputText
                            class="form-control"
                            type="text"
                            :class="{
                              'p-invalid':
                                v$.current_city.$invalid && submitted,
                            }"
                            v-model="v$.current_city.$model"
                            placeholder="current city"
                          />
                        </div>
                        <span
                          v-if="
                            (v$.current_city.$invalid && submitted) ||
                            v$.current_city.$pending.$response
                          "
                          class="p-error"
                          >{{
                            v$.current_city.required.$message.replace(
                              "Value",
                              "City"
                            )
                          }}</span
                        >
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Pincode<span class="text-danger">*</span></label
                          >

                          <InputText
                            class="form-control"
                            type="number
                                                                            "
                            minlength="6"
                            maxlength="6"
                            :class="{
                              'p-invalid':
                                v$.current_pincode.$invalid && submitted,
                            }"
                            v-model="v$.current_pincode.$model"
                            placeholder="Pincode"
                          />
                          <span
                            v-if="
                              (v$.current_pincode.$invalid && submitted) ||
                              v$.current_pincode.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.current_pincode.required.$message.replace(
                                "Value",
                                "Pincode"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div
                        class="my-3 col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12"
                      >
                        <Checkbox
                          inputId=""
                          @click="ForCopyAdrress"
                          v-model="CopyAddresschecked"
                          :binary="true"
                        />
                        <label
                          style="margin-left: 10px"
                          for="current_address_copy"
                          >Copy current address to the permanent address</label
                        >
                      </div>

                      <!-- Current Address End -->

                      <!-- Permanent Address Start -->
                      <div
                        class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12"
                      >
                        <h6>Permanent Address</h6>
                        <div class="mt-1 row">
                          <div
                            class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Address 1<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <Textarea
                                placeholder="Permanent Address"
                                class="capitalize form-control textbox"
                                style="height: 100px"
                                type="text"
                                rows="3"
                                id="permanent_address_line_1"
                                :class="{
                                  'p-invalid':
                                    v$.permanent_address_line_1.$invalid &&
                                    submitted,
                                }"
                                v-model="v$.permanent_address_line_1.$model"
                              />
                              <span
                                v-if="
                                  (v$.permanent_address_line_1.$invalid &&
                                    submitted) ||
                                  v$.permanent_address_line_1.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.permanent_address_line_1.required.$message.replace(
                                    "Value",
                                    "Permanent Address 1"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Address 2<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <Textarea
                                placeholder="Permanent Address"
                                class="capitalize form-control textbox"
                                style="height: 100px"
                                type="text"
                                rows="3"
                                id="permanent_address_line_2"
                                :class="{
                                  'p-invalid':
                                    v$.permanent_address_line_2.$invalid &&
                                    submitted,
                                }"
                                v-model="v$.permanent_address_line_2.$model"
                              />

                              <span
                                v-if="
                                  (v$.permanent_address_line_2.$invalid &&
                                    submitted) ||
                                  v$.permanent_address_line_2.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.permanent_address_line_2.required.$message.replace(
                                    "Value",
                                    "Permanent Address 2"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Country<span class="text-danger"
                                  >*</span
                                ></label
                              >
                              <Dropdown
                                editable
                                v-model="v$.permanent_country.$model"
                                :class="{
                                  'p-invalid':
                                    v$.permanent_country.$invalid && submitted,
                                }"
                                :options="country"
                                optionLabel="country_name"
                                placeholder="Select Country Name"
                              />
                              <span
                                v-if="
                                  (v$.permanent_country.$invalid &&
                                    submitted) ||
                                  v$.permanent_country.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.permanent_country.required.$message.replace(
                                    "Value",
                                    "country"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >State<span class="text-danger">*</span></label
                              >
                              <Dropdown
                                editable
                                v-model="v$.permanent_state.$model"
                                :class="{
                                  'p-invalid':
                                    v$.permanent_state.$invalid && submitted,
                                }"
                                :options="state"
                                optionLabel="state_name"
                                placeholder="Select State Name"
                              />

                              <span
                                v-if="
                                  (v$.permanent_state.$invalid && submitted) ||
                                  v$.permanent_state.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.permanent_state.required.$message.replace(
                                    "Value",
                                    "State"
                                  )
                                }}</span
                              >
                            </div>
                          </div>

                          <div
                            class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                          >
                            <div class="floating">
                              <label for="" class="float-label">
                                City<span class="text-danger">*</span></label
                              >

                              <InputText
                                class="capitalize onboard-form form-control textbox"
                                type="text"
                                :class="{
                                  'p-invalid':
                                    v$.permanent_city.$invalid && submitted,
                                }"
                                v-model="v$.permanent_city.$model"
                                placeholder="City"
                              />

                              <span
                                v-if="
                                  (v$.permanent_city.$invalid && submitted) ||
                                  v$.permanent_city.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.permanent_city.required.$message.replace(
                                    "Value",
                                    "City"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Pincode<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <InputText
                                class="capitalize onboard-form form-control textbox"
                                type="number"
                                minlength="6"
                                maxlength="6"
                                :class="{
                                  'p-invalid':
                                    v$.permanent_pincode.$invalid && submitted,
                                }"
                                v-model="v$.permanent_pincode.$model"
                                placeholder="Pincode"
                              />
                              <span
                                v-if="
                                  (v$.permanent_pincode.$invalid &&
                                    submitted) ||
                                  v$.permanent_pincode.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.permanent_pincode.required.$message.replace(
                                    "Value",
                                    "Pincode"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Permanent Address End -->

              <!-- Office Details Start -->

              <div class="p-2 shadow card profile-box card-top-border">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6 class="">Official Details</h6>
                  </div>
                  <div class="form-card">
                    <div class="mt-1 row">
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Department</label>

                          <Dropdown
                            editable
                            v-model="v$.department.$model"
                            :class="{
                              'p-invalid': v$.department.$invalid && submitted,
                            }"
                            :options="departmentDetails"
                            optionLabel="name"
                            placeholder="Department"
                            name="department"
                            id="department"
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Process<span class="text-danger">*</span></label
                          >
                          <InputText
                            class="onboard-form form-control"
                            type="text"
                            :class="{
                              'p-invalid': v$.process.$invalid && submitted,
                            }"
                            v-model="v$.process.$model"
                            placeholder="Process"
                          />

                          <span
                            v-if="
                              (v$.process.$invalid && submitted) ||
                              v$.process.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.process.required.$message.replace(
                                "Value",
                                "Process"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Designation<span class="text-danger">*</span>
                          </label>

                          <InputText
                            class="onboard-form form-control"
                            type="text"
                            placeholder="Designation"
                            :class="{
                              'p-invalid': v$.designation.$invalid && submitted,
                            }"
                            v-model="v$.designation.$model"
                          />

                          <span
                            v-if="
                              (v$.designation.$invalid && submitted) ||
                              v$.designation.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.designation.required.$message.replace(
                                "Value",
                                "Designation"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Cost Center</label>

                          <input
                            type="number"
                            placeholder="Cost Center"
                            v-model="v$.cost_center.$model"
                            name="cost_center"
                            class="onboard-form form-control textbox"
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Probation Period</label
                          >


                           <Dropdown
                           v-model="v$.probation_period.$model"
                            :options="probation_period"
                            optionLabel="name"
                            optionValue="name"
                            editable
                            placeholder="Select Probation Period"
                             :class="{
                              'is-invalid': v$.probation_period.$invalid && submitted,
                            }"

                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Work Location<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <InputText
                            class="onboard-form form-control"
                            type="text"
                            placeholder="Work Location"
                            :class="{
                              'p-invalid':
                                v$.work_location.$invalid && submitted,
                            }"
                            v-model="v$.work_location.$model"
                          />
                          <label
                            class="error star_error work_location_label"
                            for="work_location"
                            style="display: none"
                          ></label>
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Reporting Manager Name<span class="text-danger"
                              >*</span
                            ></label
                          >

                                <Dropdown  :options="Managerdetails" optionLabel="name" placeholder="Reporting Manager Name"
                                v-model="v$.l1_manager_code.$model"   :class="{
                                    'is-invalid':
                                      v$.l1_manager_code.$invalid && submitted,
                                  }">
                                    <template #value="slotProps">
                                        <div v-if="slotProps.value" class="flex align-items-center">
                                            <div>{{ slotProps.value.user_code }} - {{ slotProps.value.name }}</div>
                                        </div>
                                        <span v-else>
                                            {{ slotProps.placeholder }}
                                        </span>
                                    </template>
                                    <template #option="slotProps">
                                        <div class="flex align-items-center">
                                            <div>{{ slotProps.option.user_code }} - {{ slotProps.option.name }} </div>
                                            <div></div>


                                        </div>
                                    </template>
                                </Dropdown>

                                <span
                                v-if="
                                  (v$.l1_manager_code.$invalid && submitted) ||
                                  v$.l1_manager_code.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.l1_manager_code.required.$message.replace(
                                    "Value",
                                    "Reporting Manager Code"
                                  )
                                }}
                              </span>



                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Holiday Location</label
                          >


                          <InputText
                          class="onboard-form form-control"
                          type="text"
                          :class="{
                            'p-invalid': v$.holiday_location.$invalid && submitted,
                          }"
                          v-model="v$.holiday_location.$model"
                          placeholder="Holiday Location"
                        />

                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Official Email
                          </label>
                          <input
                            type="email"
                            placeholder="Official E-Mail Id"
                            name="officical_mail"
                            class="textbox form-control"
                            v-model="v$.officical_mail.$model"
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Official Mobile</label
                          >
                          <input
                            type="text"
                            minlength="10"
                            maxlength="10"
                            v-model="v$.official_mobile.$model"
                            placeholder="Official Mobile"
                            name="official_mobile"
                            id="official_mobile"
                            class="textbox onboard-form form-control"
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Employee Notice Period Days</label
                          >
                          <input
                            type="number"
                            placeholder="Employee Notice Period Days"
                            v-model="v$.emp_notice.$model"
                            name="emp_notice"
                            class="onboard-form form-control textbox"
                          />
                        </div>
                      </div>

                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of confirmation<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <InputText
                            class="onboard-form form-control"
                            type="text"
                            placeholder="Date of confirmation"
                            max="9999-12-31"
                            :class="{
                              'p-invalid':
                                v$.confirmation_period.$invalid && submitted,
                            }"
                            v-model="v$.confirmation_period.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.confirmation_period.$invalid && submitted) ||
                              v$.confirmation_period.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.confirmation_period.required.$message.replace(
                                "Value",
                                "Date Of Confirmation"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Office Details End -->

              <!-- Family Detials Start -->

              <div class="p-2 shadow card profile-box card-top-border">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6 class="mb-0">Family Details</h6>
                  </div>
                  <div class="form-card">
                    <div class="mt-1 row">
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Father Name<span class="text-danger"
                              >*</span
                            ></label
                          >

                          <InputText
                            class="capitalize nboard-form form-control textbox"
                            type="text"
                            placeholder="Father Name"
                            name="father_name"
                            id="father_name"
                            :class="{
                              'p-invalid': v$.father_name.$invalid && submitted,
                            }"
                            v-model="v$.father_name.$model"
                          />
                          <span
                            v-if="
                              (v$.father_name.$invalid && submitted) ||
                              v$.father_name.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.father_name.required.$message.replace(
                                "Value",
                                "father Name"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of Birth
                            <span class="text-danger">*</span></label
                          >

                          <InputText
                            class="onboard-form form-control textbox"
                            type="text"
                            placeholder="Date of Birth"
                            @change="fnCalculateAge"
                            :class="{
                              'p-invalid': v$.dob_father.$invalid && submitted,
                            }"
                            v-model="v$.dob_father.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.dob_father.$invalid && submitted) ||
                              v$.dob_father.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.dob_father.required.$message.replace(
                                "Value",
                                "father Date of Birth"
                              )
                            }}
                          </span>
                        </div>
                      </div>

                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Gender</label>
                          <input
                            type="text"
                            class="form-control"
                            name="father_gender"
                            id="father_gender"
                            value="Male"
                            readonly
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Age </label>

                          <input
                            type="number"
                            placeholder="Age"
                            name="father_age"
                            v-model="employee_onboarding.father_age"
                            id="father_age"
                            class="textbox onboard-form form-control"
                            minlength="2"
                            maxlength="3"
                            readonly
                          />
                        </div>
                      </div>

                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Mother Name
                            <span class="text-danger">*</span></label
                          >

                          <InputText
                            class="onboard-form form-control textbox"
                            type="text"
                            placeholder="Mother Name"
                            name="mother_name"
                            :class="{
                              'p-invalid': v$.mother_name.$invalid && submitted,
                            }"
                            v-model="v$.mother_name.$model"
                          />

                          <span
                            v-if="
                              (v$.mother_name.$invalid && submitted) ||
                              v$.mother_name.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.mother_name.required.$message.replace(
                                "Value",
                                "mother Name"
                              )
                            }}
                          </span>
                        </div>
                      </div>

                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of Birth
                            <span class="text-danger">*</span></label
                          >

                          <InputText
                            class="onboard-form form-control textbox"
                            type="text"
                            placeholder="Date of Birth"
                            :class="{
                              'p-invalid': v$.dob_mother.$invalid && submitted,
                            }"
                            v-model="v$.dob_mother.$model"
                            @change="fnCalculateAge"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.dob_mother.$invalid && submitted) ||
                              v$.dob_mother.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.dob_mother.required.$message.replace(
                                "Value",
                                "mother Date of Birth"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Gender</label>

                          <input
                            type="text"
                            class="form-control"
                            name="mother_gender"
                            id=""
                            value="Female"
                            readonly
                          />
                        </div>
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Age</label>

                          <input
                            type="number"
                            placeholder="Age"
                            name="mother_age"
                            v-model="employee_onboarding.mother_age"
                            id="mother_age"
                            class="textbox onboard-form form-control"
                            minlength="2"
                            maxlength="3"
                            readonly
                          />
                        </div>
                      </div>

                      <div
                        v-if="sposeData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Spouse Name
                            <span class="text-danger">*</span></label
                          >
                          <InputText
                            v-if="sposeData"
                            class="onboard-form form-control textbox"
                            type="text"
                            placeholder="Spouse Name"
                            name="spouse_name"
                            :class="{
                              'p-invalid': v$.spouse_name.$invalid && submitted,
                            }"
                            v-model="v$.spouse_name.$model"
                          />

                          <span
                            v-if="
                              (v$.spouse_name.$invalid && submitted) ||
                              v$.spouse_name.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.spouse_name.required.$message.replace(
                                "Value",
                                "Spouse Name"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of Wedding
                            <span class="text-danger">*</span></label
                          >

                          <InputText
                            class="onboard-form form-control textbox"
                            type="text"
                            placeholder="Date of Wedding"
                            name="wedding_date"
                            :class="{
                              'is-invalid':
                                v$.wedding_date.$invalid && submitted,
                            }"
                            v-model="v$.wedding_date.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.wedding_date.$invalid && submitted) ||
                              v$.wedding_date.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.wedding_date.required.$message.replace(
                                "Value",
                                "Date Of Wedding"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Gender <span class="text-danger">*</span></label
                          >

                          <select
                            placeholder="Spouse Gender"
                            name="spouse_gender"
                            v-model="v$.spouse_gender.$model"
                            id="spouse_gender"
                            :class="{
                              'is-invalid':
                                v$.spouse_gender.$invalid && submitted,
                            }"
                            class="textbox onboard-form form-control"
                          >
                            <option value="" hidden selected disabled>
                              Select Spouse Gender
                            </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select>

                          <span
                            v-if="
                              (v$.spouse_gender.$invalid && submitted) ||
                              v$.spouse_gender.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.spouse_gender.required.$message.replace(
                                "Value",
                                "Spouse Gender"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Spouse DOB
                            <span class="text-danger">*</span></label
                          >

                          <InputText
                            class="onboard-form form-control textbox"
                            max="9999-12-31"
                            name="dob_spouse"
                            id="dob_spouse"
                            type="text"
                            placeholder="SpouseDOB"
                            :class="{
                              'p-invalid': v$.dob_spouse.$invalid && submitted,
                            }"
                            v-model="v$.dob_spouse.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.dob_spouse.$invalid && submitted) ||
                              v$.dob_spouse.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.dob_spouse.required.$message.replace(
                                "Value",
                                "Spouse Date of Birth"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Number of Children</label
                          >

                          <select
                            placeholder="Number of Children"
                            name="no_of_children"
                            id="no_of_children"
                            v-model="no_of_children"
                            class="textbox onboard-form form-control spouse_data select2_form_without_search"
                          >
                            <option value="" hidden selected disabled>
                              Select Number of Children
                            </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- family Detials End -->



              <!-- Compensatory Details start-->



              <div class="p-2 shadow card profile-box card-top-border">
                <div class="card-body justify-content-center align-items-center">
                    <div class="header-card-text">
                        <h6>Compensatory</h6>
                    </div>

                    <div class="form-card">
                        <div class="row">
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">


                                    <div class="floating">

                                        <label for="" class="float-label">Basic
                                            Salary</label>
                                        <input type="number" placeholder="Basic Salary"
                                            name="basic"  v-model="employee_onboarding.basic"
                                            class="textbox onboard-form form-control calculation_data gross_data"
                                            step="0.01" />
                                    </div>


                            </div>

                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">HRA</label>

                                        <input type="number" placeholder="HRA" name="hra" v-model="employee_onboarding.hra"
                                            class="onboard-form form-control textbox calculation_data gross_data "
                                            step="0.01" />
                                    </div>

                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Statutory
                                            Bonus</label>
                                        <input type="number" placeholder="Statutory Bonus"
                                            name="statutory_bonus"  v-model="employee_onboarding.statutory_bonus"
                                            class="onboard-form form-control textbox calculation_data gross_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Child
                                            Education Allowance</label>
                                        <input type="number"
                                            placeholder="Child Education Allowance"
                                            name="child_education_allowance" v-model="employee_onboarding.child_education_allowance"
                                            class="onboard-form form-control textbox calculation_data gross_data"
                                            step="0.01" />
                                    </div>



                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Food
                                            Coupon</label>
                                        <input type="number" placeholder="Food Coupon"
                                            name="food_coupon" v-model="employee_onboarding.food_coupon"
                                            class="onboard-form form-control textbox calculation_data gross_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">LTA</label>
                                        <input type="number" placeholder="LTA" name="lta"  v-model="employee_onboarding.lta"
                                            class="textbox onboard-form form-control calculation_data gross_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Special
                                            Allowance</label>
                                        <input type="number" placeholder="Special Allowance"
                                            name="special_allowance" v-model="employee_onboarding.special_allowance"
                                            class="onboard-form form-control textbox calculation_data gross_data"
                                            step="0.01" />
                                    </div>

                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Other
                                            Allowance</label>

                                        <input type="number" placeholder="Other Allowance"
                                            name="other_allowance"  v-model="employee_onboarding.other_allowance"
                                            class="textbox onboard-form form-control calculation_data gross_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Gross
                                            Salary</label>

                                        <input type="number" placeholder="Gross Salary"
                                            name="gross"  v-model="employee_onboarding.gross"
                                            class="textbox onboard-form form-control "
                                            step="0.01" required readonly />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">EPF employer
                                            contribution</label>

                                        <input type="number"
                                            placeholder="EPF employer contribution"
                                            name="epf_employer_contribution"  v-model="employee_onboarding.epf_employer_contribution"
                                            class="textbox onboard-form form-control calculation_data cic_data"
                                            step="0.01" />
                                    </div>



                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">ESIC employer
                                            contribution</label>
                                        <input type="number"
                                            placeholder="ESIC employer contribution"
                                            name="esic_employer_contribution"  v-model="employee_onboarding.esic_employer_contribution"
                                            class="onboard-form form-control textbox calculation_data cic_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Insurance</label>
                                        <input type="number" placeholder="Insurance"
                                            name="insurance"   v-model="employee_onboarding.insurance"
                                            class="onboard-form form-control textbox calculation_data cic_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Graduity</label>
                                        <input type="number" placeholder="Graduity"
                                            name="graduity"  v-model="employee_onboarding.graduity"
                                            class="onboard-form form-control textbox calculation_data cic_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Cost of
                                            Company</label>

                                        <input type="number" placeholder="Cost of Company"
                                            name="cic"   v-model="employee_onboarding.cic"
                                            id="cic"
                                            class="onboard-form form-control textbox "
                                            step="0.01" required readonly />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">EPF
                                            Employee</label>

                                        <input type="number" placeholder="EPF Employee"
                                            name="epf_employee"   v-model="employee_onboarding.epf_employee"
                                            class="onboard-form form-control calculation_data net_data textbox "
                                            step="0.01" />
                                    </div>

                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">ESIC
                                            Employee</label>

                                        <input type="number" placeholder="ESIC Employee"
                                            name="esic_employee"   v-model="employee_onboarding.esic_employee"
                                            class="textbox onboard-form form-control calculation_data net_data"
                                            step="0.01" />
                                    </div>


                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Professional
                                            Tax</label>

                                        <input type="number" placeholder="Professional Tax"
                                            name="professional_tax"  v-model="employee_onboarding.professional_tax"
                                            class="textbox onboard-form form-control calculation_data net_data "
                                            step="0.01" />
                                    </div>

                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Labour welfare
                                            fund</label>

                                        <input type="number" placeholder="labour welfare fund"
                                            name="labour_welfare_fund"  v-model="employee_onboarding.labour_welfare_fund"
                                            class="onboard-form form-control calculation_data net_data textbox "
                                            step="0.01" />
                                    </div>

                            </div>
                            <div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3">

                                    <div class="floating">
                                        <label for="" class="float-label">Net
                                            Income</label>

                                        <input type="number" placeholder="Net Income"
                                            name="net_income"   v-model="employee_onboarding.net_income"
                                            class="onboard-form form-control textbox "
                                            step="0.01" required readonly />
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>











              <!-- Compensatory Details end -->

              <!-- Personal Documents start -->

              <div class="p-2 mb-0 shadow card profile-box card-top-border">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6 class="mb-0">Personal Documents</h6>
                  </div>
                  <div class="mb-2 form-card">
                    <div class="mt-1 row">
                      <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"
                          >Aadhar Card Front<span class="text-danger"
                            >*</span
                          ></label
                        >

                        <input
                          v-if="AadharDocFrontInvalid"
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          ref="AadharCardFront"
                          class="onboard-form form-control file is-invalid"
                          @change="AadharFront($event)"
                        />
                        <input
                          v-if="!AadharDocFrontInvalid"
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          ref="AadharCardFront"
                          class="onboard-form form-control file"
                          @change="AadharFront($event)"
                        />
                        <span class="p-error" v-if="AadharDocFrontInvalid"
                          >Aadhar Card Front is required</span
                        >
                      </div>
                      <div
                        class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"
                        id="aadhar_card_backend_content"
                      >
                        <label for="" class="float-label">
                          Aadhar Card Back<span class="text-danger"
                            >*</span
                          ></label
                        >

                        <input
                          v-if="AadharDocBackInvalid"
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          ref="AadharCardBack"
                          @change="AadharBack($event)"
                          class="onboard-form form-control file is-invalid"
                        />
                        <input
                          v-if="!AadharDocBackInvalid"
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          ref="AadharCardBack"
                          @change="AadharBack($event)"
                          class="onboard-form form-control file"
                        />

                        <span v-if="AadharDocBackInvalid" class="p-error"
                          >Aadhar Card Back is Required</span
                        >
                      </div>
                      <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">
                          Pan Card<span class="text-danger">*</span></label
                        >

                        <input
                          v-if="PancardInvalid"
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          placeholder="Pan Card"
                          name="pan_card_file"
                          id="pan_card_file"
                          ref="PanCardDoc"
                          @change="PanCard($event)"
                          class="onboard-form form-control file is-invalid"
                        />

                        <input
                          v-if="!PancardInvalid"
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          placeholder="Pan Card"
                          name="pan_card_file"
                          id="pan_card_file"
                          ref="PanCardDoc"
                          @change="PanCard($event)"
                          class="onboard-form form-control file"
                        />

                        <span v-if="PancardInvalid" class="p-error"
                          >Pan Card is Required</span
                        >
                      </div>
                      <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"> Passport</label>

                        <input
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          ref="PassportDoc"
                          placeholder="Passport"
                          name="passport_file"
                          id="passport_file"
                          @change="Passport($event)"
                          class="onboard-form form-control file"
                        />
                      </div>
                      <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"> ID</label>

                        <input
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          ref="VoterIdDoc"
                          placeholder="Voters ID"
                          name="voters_id_file"
                          id="voters_id_file"
                          @change="VoterId($event)"
                          class="onboard-form form-control file"
                        />
                      </div>
                      <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">
                          Driving License</label
                        >

                        <input
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          placeholder="Driving License"
                          name="dl_file"
                          id="dl_file"
                          @change="DrivingLisence($event)"
                          ref="DrivingLicenseDoc"
                          class="onboard-form form-control file"
                        />
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"
                          >Educations Certificate<span class="text-danger"
                            >*</span
                          ></label
                        >
                        <input
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          placeholder="Educations Certificate"
                          name="education_certificate_file"
                          @change="EductionCertifacte($event)"
                          v-if="EducationCertificateInvalid"
                          id="education_certificate_file"
                          ref="EductionDoc"
                          class="onboard-form form-control file is-invalid"
                        />

                        <input
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          placeholder="Educations Certificate"
                          name="education_certificate_file"
                          @change="EductionCertifacte($event)"
                          v-if="!EducationCertificateInvalid"
                          id="education_certificate_file"
                          ref="EductionDoc"
                          class="onboard-form form-control file"
                        />

                        <span v-if="EducationCertificateInvalid" class="p-error"
                          >Eduction Certifacte is Required</span
                        >
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">
                          Relieving Letter</label
                        >
                        <input
                          type="file"
                          accept="image/png, image/gif, image/jpeg"
                          placeholder="Relieving Letter"
                          name="reliving_letter_file"
                          id="reliving_letter_file"
                          @change="ReleivingLetter($event)"
                          ref="ReleivingLetterDoc"
                          class="onboard-form form-control file"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="text-right col-12">
                      <input
                        type="button"
                        value="sample"
                        @click="Sampledata"
                        class="mr-4 text-center btn btn-orange processOnboardForm"
                      />

                      <button
                        type="button"
                        data="row-6"
                        next="row-6"
                        placeholder=""
                        name="save_form"
                        id="save_button"
                        class="mr-4 text-center btn btn-orange processOnboardForm"
                        value="Submit"
                        @click="SaveEmployeeOnboardingData"
                      >
                        Save
                      </button>

                      <button
                        type="submit"
                        data="row-6"
                        next="row-6"
                        placeholder=""
                        name="submit_form"
                        id="msform"
                        class="text-center btn btn-orange processOnboardForm"
                        value="Submit"
                        :disabled="fileUploadValidation"
                        @click="SubmitEmployeeOnboardingData"
                      >
                        Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div>Compensation</div>
  <div class="form-card">
    <div class="row">
        <div class="form-check form-check-inline">
            <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="compensation"
                @click="comp_mon" v-model="comp.compensation_monthly" value="compensation_monthly">
            <label class="form-check-label leave_type ms-2" for="compensation_monthly">compensation_monthly</label>

        </div>
        <div class="form-check form-check-inline">
            <input style="height: 20px;width: 20px;" class="form-check-input" type="radio" name="compensation"
                id="compensation_yearly" value="compensation_yearly"
                @click="comp_year" v-model="comp.compensation_yearly">
            <label class="form-check-label leave_type ms-2" for="compensation_yearly">compensation_yearly</label>
        </div>
    </div>

            <Dropdown v-if="mon"
            :options="compensation_month"
            optionLabel="name"
            optionValue="id"
            placeholder="Select Monthly"
          />{{ mon }}
          <Dropdown v-if="year"
                :options="compensation_yearly"
                optionLabel="name"
                optionValue="id"
                placeholder="Select Yearly"
              />{{year}}


              <div v-if="te">test</div>

              <button @click="compensation">cl</button>
        </div>




  <Dialog
    v-if="
      !employee_onboarding.employee_name.length > 0 &&
      !employee_onboarding.aadhar_number.length > 0
    "
    header="Documents Required"
    v-model:visible="RequiredDocument"
    :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
    :style="{ width: '50vw' }"
  >
    <li
      v-if="
        employee_onboarding.employee_name == '' ||
        employee_onboarding.employee_name.length < 0
      "
    >
      Employee As Per Name Required
    </li>
    <li
      v-if="
        employee_onboarding.aadhar_number == '' ||
        employee_onboarding.aadhar_number.length < 0
      "
    >
      Aadhaar Number Required
    </li>
    <li
      v-if="
        employee_onboarding.pan_number == '' ||
        employee_onboarding.pan_number.length < 0
      "
    >
      Pan Number Required
    </li>
    <li
      v-if="
        employee_onboarding.mobile_number == '' ||
        employee_onboarding.mobile_number.length < 0
      "
    >
      Mobile Number Required
    </li>
  </Dialog>

  <Dialog
    v-model:visible="showMessage"
    :breakpoints="{ '960px': '80vw' }"
    :style="{ width: '30vw' }"
    position="center"
  >
    <div class="flex px-3 pt-6 text-center align-items-center flex-column">
      <i
        class="pi pi-check-circle"
        :style="{ fontSize: '5rem', color: 'var(--green-500)' }"
      ></i>
      <h5 class="mb-6">Onboarding Successful!</h5>
      <p :style="{ lineHeight: 1.5, textIndent: '1rem' }">
        Your account is registered under name
        <b>{{ employee_onboarding.employee_name }}</b
        ><br />
        Please check
        <b>{{ employee_onboarding.email }}</b> for Further Information
      </p>
    </div>
    <template #footer>
      <div class="flex justify-content-center">
        <Button label="OK" @click="toggleDialog" class="p-button-text" />
      </div>
    </template>
  </Dialog>
</template>

<script setup>
import { useVuelidate } from "@vuelidate/core";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import { reactive } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import { ref } from "@vue/runtime-core";
import validation from "./NormalOnboardingService";
import {
  getBankList,
  getCountryList,
  getStateList,
  ManagerDetails,
  DepartmentDetails,
  getMaritalStatus,
  getBloodGroups,
} from "./NormalOnboardingService";

const mon=ref(false)
const year=ref(false)

const te =ref(true)

const comp =reactive ({
    compensation_monthly:'',
    compensation_yearly:""
})

const compensation =() =>{
    console.log(comp.compensation_monthly);
    console.log(comp.compensation_yearly);
    console.log(mon.value);
    console.log(year.value);
    year.value =true
    te.value =false
    console.log(te.value);

    console.log("working");

}

onMounted(() => {
  // For Bank Data
  getBankList().then((result) => (bankList.value = result));
  //  For Countries
  getCountryList().then((result) => (country.value = result));
//   console.log(country.country_name);
//   employee_onboarding.current_country = "India";
//   employee_onboarding.permanent_country = "India";

  // for state
  getStateList().then((result) => (state.value = result));
//   employee_onboarding.current_state = "Tamil Nadu";
//   employee_onboarding.permanent_state = "Tamil Nadu";
  // for Manager Details
  ManagerDetails().then((result) => (Managerdetails.value = result));


  //Get Department details

  DepartmentDetails().then((result) => (departmentDetails.value = result));

  getMaritalStatus().then((result) => {
    maritalDetails.value = result;
  });

  getBloodGroups().then((result) => (bloodGroups.value = result));
});

const employee_onboarding = reactive({
  can_onboard_employee: true,
  employee_code: "",
  doj: "",
  aadhar_number: "",
  passport_number: "",
  bank_id: "",
  bank_name: "",
  employee_name: "",
  gender: "",
  pan_number: "",
  passport_date: "",
  AccountNumber: "",
  dob: "",
  mobile_number: "",
  dl_no: "",
  blood_group_name: "",
  blood_group_id: "",
  bank_ifsc: "",
  marital_status: "",
  marital_status_id: "",
  email: "",
  nationality: "",
  physically_challenged: "",

  // person Detials End

  // Address detials

  // Current Address Detials Start

  current_address_line_1: "",
  current_address_line_2: "",
  current_country: "",
  current_state: "",
  current_country_id: "",
  current_state_id: "",
  current_city: "",
  current_pincode: "",

  // Current Address Details End

  // Permanant Address Start

  permanent_address_line_1: "",
  permanent_address_line_2: "",
  permanent_country: "",
  permanent_state: "",
  permanent_country_id: "",
  permanent_state_id: "",
  permanent_city: "",
  permanent_pincode: "",

  // Permanant Address end

  // Office Detials Start

  department: "",
  department_id: "",
  process: "",
  designation: "",
  cost_center: "",
  probation_period: "",
  work_location: "",
  l1_manager_code: "",
  l1_manager_code_id: "",
  holiday_location: "",
  officical_mail: "",
  official_mobile: "",
  emp_notice: "",
  confirmation_period: "",

  // Office Details End

  // family Details Start

  father_name: "",
  dob_father: "",
  father_gender: "Male",
  father_age: "",
  mother_name: "",
  dob_mother: "",
  mother_gender: "Female",
  mother_age: "",
  spouse_name: "",
  wedding_date: "",
  spouse_gender: "",
  dob_spouse: "",
  no_of_children: "",

  // family Details End


//   compensatory Detials start

    basic:'',
    hra:'',
    statutoy_bonus:'',
    child_education_allowance:'',
    food_coupon:'',
    lta:'',
    special_allowance:'',
    graduity:'',
    cic:'',
    epf_employee:'',
    esic_employee:'',
    professional_tax:'',
    labour_welfare_fund:'',
    net_income:'',

  // Personal Documents Start


  AadharCardFront: "",
  AadharCardBack: "",
  PanCardDoc: "",
  DrivingLicenseDoc: "",
  EductionDoc: "",
  VoterIdDoc: "",
  ReleivingLetterDoc: "",
  PassportDoc: "",
});

// variableDeclarations

const toast = useToast();
const bankList = ref();
const country = ref();
const departmentDetails = ref();
const state = ref();
const Managerdetails = ref();
const maritalDetails = ref();
const bloodGroups = ref();

const NationalityData = ref(true);
const CopyAddresschecked = ref(false);
const sposeData = ref(false);

const submitted = ref(false);
const showMessage = ref(false);
const RequiredDocument = ref(false);
const SumbitDisable = ref(true);
const v$ = useVuelidate(validation, employee_onboarding);

const AadharDocFrontInvalid = ref(false);
const AadharDocBackInvalid = ref(false);
const PancardInvalid = ref(false);
const EducationCertificateInvalid = ref(false);
const fileUploadValidation=ref(true)






//   Events

const handleSubmit = (isFormValid) => {
  console.log(employee_onboarding);

  submitted.value = true;

  employee_onboarding.AadharCardFront.fileName == undefined
    ? (AadharDocFrontInvalid.value = true)
    : (AadharDocFrontInvalid.value = false);
  employee_onboarding.AadharCardBack.fileName == undefined
    ? (AadharDocBackInvalid.value = true)
    : (AadharDocBackInvalid.value = false);
  employee_onboarding.PanCardDoc.fileName == undefined
    ? (PancardInvalid.value = true)
    : (PancardInvalid.value = false);
  employee_onboarding.EductionDoc.fileName == undefined
    ? (EducationCertificateInvalid.value = true)
    : (EducationCertificateInvalid.value = false);

  if (!isFormValid) {
    toast.add({
      severity: "error",
      summary: "Error Message",
      detail: "Message Content",
      life: 3000,
    });
    RequiredDocument.value = true;
    fileUploadValidation.value=true;
    return;
  }
  toggleDialog();
  SumbitDisable.value = false;
};
const toggleDialog = () => {
  //   showMessage.value = !showMessage.value;
};

const spouseDisable = () => {
  if (employee_onboarding.marital_status == "Married") {
    sposeData.value = true;
  } else {
    sposeData.value = false;
  }
};

// CheckBox Copy VAlue

const ForCopyAdrress = () => {
  if (CopyAddresschecked.value == false) {
    employee_onboarding.permanent_address_line_1 =
      employee_onboarding.current_address_line_1;
    employee_onboarding.permanent_address_line_2 =
      employee_onboarding.current_address_line_2;
    employee_onboarding.permanent_country = employee_onboarding.current_country;
    employee_onboarding.permanent_state = employee_onboarding.current_state;
    employee_onboarding.permanent_city = employee_onboarding.current_city;
    employee_onboarding.permanent_pincode = employee_onboarding.current_pincode;
  } else if (CopyAddresschecked.value == true) {
    employee_onboarding.permanent_address_line_1 = "";
    employee_onboarding.permanent_address_line_2 = "";
    employee_onboarding.permanent_country = "";
    employee_onboarding.permanent_city = "";
    employee_onboarding.permanent_state = "";
    employee_onboarding.permanent_pincode = "";
  }
};

// Nationality Check

const NationalityCheck = () => {
  if (employee_onboarding.nationality == "Indian") {
    NationalityData.value = false;
  } else {
    NationalityData.value = true;
  }
};

const fnCalculateAge = () => {
  console.log("Father's Age" + employee_onboarding.dob_father);
  console.log("Mother's Age" + employee_onboarding.dob_mother);

  // convert user input value into date object

  // get difference from current date;

  if (employee_onboarding.dob_father) {
    var birthDate = new Date(employee_onboarding.dob_father);
    console.log(" birthDate" + birthDate);
    var difference = Date.now() - birthDate.getTime();
    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    employee_onboarding.father_age = calculatedAge;
  }
  if (employee_onboarding.dob_mother) {
    var birthDate = new Date(employee_onboarding.dob_mother);
    console.log(" birthDate" + birthDate);
    var difference = Date.now() - birthDate.getTime();
    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    employee_onboarding.mother_age = calculatedAge;
  }
};

const SaveEmployeeOnboardingData = () => {
  console.log("Saving onboarding form");
  console.log(employee_onboarding);
  employee_onboarding.can_onboard_employee = false;
  submit();
  get_id();
  checkInputFiles();

  console.log(employee_onboarding);
};

const SubmitEmployeeOnboardingData = () => {
    employee_onboarding.can_onboard_employee = true;
    console.log(employee_onboarding);
    get_id();
    submit();

};


const submit = () => {
  let currentObj = this;
  const config = {
    headers: { "content-type": "multipart/form-data" },
  };

  let formData = new FormData();
  formData.append("can_onboard_employee", employee_onboarding.can_onboard_employee)
  formData.append("employee_code", employee_onboarding.employee_code );
  formData.append("doj", employee_onboarding.doj);
  formData.append("aadhar_number", employee_onboarding.aadhar_number );
  formData.append("passport_number", employee_onboarding.passport_number );
  formData.append("bank_id", employee_onboarding.bank_id );
//   formData.append("bank_name ", employee_onboarding.bank_name.bank_name );
  formData.append("employee_name", employee_onboarding.employee_name );
  formData.append(" gender", employee_onboarding. gender);
  formData.append("pan_number", employee_onboarding.pan_number);
  formData.append("passport_date", employee_onboarding.passport_date);
  formData.append("AccountNumber", employee_onboarding.AccountNumber);
  formData.append("dob", employee_onboarding.dob);
  formData.append("mobile_number", employee_onboarding.mobile_number);
  formData.append("dl_no", employee_onboarding.dl_no);
//   formData.append("blood_group_name", employee_onboarding.blood_group_name.name);
  formData.append("blood_group_id", employee_onboarding.blood_group_id);
  formData.append("bank_ifsc", employee_onboarding.bank_ifsc);
//   formData.append("marital_status", employee_onboarding.marital_status.name);
  formData.append("marital_status_id", employee_onboarding.marital_status_id);
  formData.append("email", employee_onboarding.email);
  formData.append("nationality", employee_onboarding.nationality);
  formData.append("physically_challenged", employee_onboarding.physically_challenged);
  formData.append("current_address_line_1", employee_onboarding.current_address_line_1);
  formData.append("current_address_line_2", employee_onboarding.current_address_line_2);
//   formData.append("current_country", employee_onboarding.current_country.country_name);
  formData.append("current_country_id", employee_onboarding.current_country_id);
//   formData.append("current_state", employee_onboarding.current_state.state_name);
  formData.append("current_state_id", employee_onboarding.current_state_id);
  formData.append("current_city", employee_onboarding.current_city);
  formData.append("current_pincode", employee_onboarding.current_pincode);
  formData.append(" permanent_address_line_1", employee_onboarding.permanent_address_line_1);
  formData.append("permanent_address_line_2", employee_onboarding.permanent_address_line_2);
//   formData.append("permanent_country", employee_onboarding.permanent_country.country_name);
  formData.append("permanent_country_id", employee_onboarding.permanent_country_id);
//   formData.append("permanent_state", employee_onboarding.permanent_state.state_name);
  formData.append("permanent_state_id", employee_onboarding.permanent_state_id);
  formData.append("permanent_city", employee_onboarding.permanent_city);
  formData.append("permanent_pincode", employee_onboarding.permanent_pincode);
//   formData.append("department", employee_onboarding.department.name);
  formData.append("department_id", employee_onboarding.department_id);
  formData.append("process", employee_onboarding.process);
  formData.append("designation", employee_onboarding.designation);
  formData.append("cost_center", employee_onboarding.cost_center);
  formData.append("probation_period", employee_onboarding.probation_period);
  formData.append("work_location", employee_onboarding.work_location);
//   formData.append("l1_manager_code", employee_onboarding.l1_manager_code.name);
  formData.append("l1_manager_code_id", employee_onboarding.l1_manager_code_id);
  formData.append("holiday_location", employee_onboarding.holiday_location);
  formData.append("officical_mail", employee_onboarding.officical_mail);
  formData.append("official_mobile", employee_onboarding.official_mobile);
  formData.append("emp_notice", employee_onboarding.emp_notice);
  formData.append("confirmation_period", employee_onboarding.confirmation_period);
  formData.append("father_name", employee_onboarding.father_name);
  formData.append("dob_father", employee_onboarding.dob_father);
  formData.append("father_gender", employee_onboarding.father_gender);
  formData.append("father_age", employee_onboarding.father_age);
  formData.append("mother_name", employee_onboarding.mother_name);
  formData.append("dob_mother", employee_onboarding.dob_mother);
  formData.append("mother_gender", employee_onboarding.mother_gender);
  formData.append("mother_age", employee_onboarding.mother_age);
  formData.append("spouse_name", employee_onboarding.spouse_name);
  formData.append("wedding_date", employee_onboarding.wedding_date);
  formData.append("spouse_gender", employee_onboarding.spouse_gender);
  formData.append("dob_spouse", employee_onboarding.dob_spouse);
  formData.append("no_of_children", employee_onboarding.no_of_children);
  formData.append("basic", employee_onboarding.basic);
  formData.append("hra", employee_onboarding.hra);
  formData.append("statutoy_bonus", employee_onboarding.statutoy_bonus);
  formData.append("child_education_allowance", employee_onboarding.child_education_allowance);
  formData.append("food_coupon", employee_onboarding.food_coupon);
  formData.append("lta", employee_onboarding.lta);
  formData.append("special_allowance", employee_onboarding.special_allowance);
  formData.append("graduity", employee_onboarding.graduity);
  formData.append("cic", employee_onboarding.cic);
  formData.append("epf_employee", employee_onboarding.epf_employee);
  formData.append("esic_employee", employee_onboarding.esic_employee);
  formData.append("professional_tax", employee_onboarding.professional_tax);
  formData.append("labour_welfare_fund", employee_onboarding.labour_welfare_fund);
  formData.append("net_income", employee_onboarding.net_income);
  formData.append("Aadharfront", employee_onboarding.AadharCardFront);
  formData.append("AadharBack", employee_onboarding.AadharCardBack);
  formData.append("panDoc", employee_onboarding.PanCardDoc);
  formData.append("eductionDoc", employee_onboarding.EductionDoc);
  formData.append("releivingDoc", employee_onboarding.ReleivingLetterDoc);
  formData.append("voterId", employee_onboarding.VoterIdDoc);
  formData.append("passport", employee_onboarding.PassportDoc);
  formData.append("dlDoc", employee_onboarding.DrivingLicenseDoc);

  console.log(formData);

  axios
    .post("/vmt-employee-onboard", formData, config)
    .then(function (response) {
      currentObj.success = response.data.success;
    })
    .catch(function (error) {
      currentObj.output = error;
    });
};

const get_id = () => {
  employee_onboarding.bank_id = employee_onboarding.bank_name.id;
  employee_onboarding.blood_group_id = employee_onboarding.blood_group_name.id;
  employee_onboarding.marital_status_id = employee_onboarding.marital_status.id;
  employee_onboarding.current_country_id =
    employee_onboarding.current_country.id;
  employee_onboarding.current_state_id = employee_onboarding.current_state.id;
  employee_onboarding.permanent_country_id =
    employee_onboarding.permanent_country.id;
  employee_onboarding.permanent_state_id =
    employee_onboarding.permanent_state.id;
  employee_onboarding.department_id = employee_onboarding.department.id;
  employee_onboarding.l1_manager_code_id = employee_onboarding.l1_manager_code.id

  console.log(
    employee_onboarding.bank_id,
    employee_onboarding.blood_group_id,
    employee_onboarding.marital_status_id,
    employee_onboarding.current_country_id,
    employee_onboarding.current_state_id,
    employee_onboarding.permanent_country_id,
    employee_onboarding.permanent_state_id,
    employee_onboarding.department_id
  );
};

//  File Upload Function Declaration

const checkInputFiles=()=>{
    if (
    employee_onboarding.AadharCardFront.fileName == undefined ||
    employee_onboarding.AadharCardBack.fileName == undefined ||
    employee_onboarding.PanCardDoc.fileName == undefined ||
    employee_onboarding.EductionDoc.fileName == undefined
  ){
     fileUploadValidation.value=true
  }else{
    fileUploadValidation.value=false
  }
}

const  user_code_exists=ref(false)

const userCodeExists = () =>{

    let user_code=employee_onboarding.employee_code;

    axios.get(`/user-code-exists/${user_code}`).then(res=>{
        console.log(res.data);
        user_code_exists.value=res.data
    }).catch(err=>{
        console.log(err);
    }).finally(()=>{
        console.log("completed");
    })

}

const personal_mail_exists = ref(false)

const personalMailExists=()=>{

    let mail=employee_onboarding.email;

    axios.get(`/personal-mail-exists/${mail}`).then(res=>{
        console.log(res.data);
        personal_mail_exists.value=res.data
    }).catch(err=>{
        console.log(err);
    }).finally(()=>{
        console.log("completed");
    })
}



const AadharFront = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.AadharCardFront = e.target.files[0]),
      // Get file size
      (employee_onboarding.AadharCardFront.fileSize =
        Math.round(
          (employee_onboarding.AadharCardFront.size / 1024 / 1024) * 100
        ) / 100),
      // Get file extension
      (employee_onboarding.AadharCardFront.fileExtention =
        employee_onboarding.AadharCardFront.name.split(".").pop()),
      // Get file name
      (employee_onboarding.AadharCardFront.fileName =
        employee_onboarding.AadharCardFront.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.AadharCardFront.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.AadharCardFront.fileExtention));
    // Print to console
    console.log(employee_onboarding.AadharCardFront);
  }
};
const AadharBack = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.AadharCardBack = e.target.files[0]),
      // Get file size
      (employee_onboarding.AadharCardBack.fileSize =
        Math.round(
          (employee_onboarding.AadharCardBack.size / 1024 / 1024) * 100
        ) / 100),
      // Get file extension
      (employee_onboarding.AadharCardBack.fileExtention =
        employee_onboarding.AadharCardBack.name.split(".").pop()),
      // Get file name
      (employee_onboarding.AadharCardBack.fileName =
        employee_onboarding.AadharCardBack.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.AadharCardBack.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.AadharCardBack.fileExtention));
    // Print to console
    console.log(employee_onboarding.AadharCardBack);
  }
};
const PanCard = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.PanCardDoc = e.target.files[0]),
      // Get file size
      (employee_onboarding.PanCardDoc.fileSize =
        Math.round((employee_onboarding.PanCardDoc.size / 1024 / 1024) * 100) /
        100),
      // Get file extension
      (employee_onboarding.PanCardDoc.fileExtention =
        employee_onboarding.PanCardDoc.name.split(".").pop()),
      // Get file name
      (employee_onboarding.PanCardDoc.fileName =
        employee_onboarding.PanCardDoc.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.PanCardDoc.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.PanCardDoc.fileExtention));
    // Print to console
    console.log(employee_onboarding.PanCardDoc);
  }
};
const Passport = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.PassportDoc = e.target.files[0]),
      // Get file size
      (employee_onboarding.PassportDoc.fileSize =
        Math.round((employee_onboarding.PassportDoc.size / 1024 / 1024) * 100) /
        100),
      // Get file extension
      (employee_onboarding.PassportDoc.fileExtention =
        employee_onboarding.PassportDoc.name.split(".").pop()),
      // Get file name
      (employee_onboarding.PassportDoc.fileName =
        employee_onboarding.PassportDoc.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.PassportDoc.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.PassportDoc.fileExtention));
    // Print to console
    console.log(employee_onboarding.PassportDoc);
  }
};
const DrivingLisence = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.DrivingLicenseDoc = e.target.files[0]),
      // Get file size
      (employee_onboarding.DrivingLicenseDoc.fileSize =
        Math.round(
          (employee_onboarding.DrivingLicenseDoc.size / 1024 / 1024) * 100
        ) / 100),
      // Get file extension
      (employee_onboarding.DrivingLicenseDoc.fileExtention =
        employee_onboarding.DrivingLicenseDoc.name.split(".").pop()),
      // Get file name
      (employee_onboarding.DrivingLicenseDoc.fileName =
        employee_onboarding.DrivingLicenseDoc.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.DrivingLicenseDoc.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.DrivingLicenseDoc.fileExtention));
    // Print to console
    console.log(employee_onboarding.DrivingLicenseDoc);
  }
};
const VoterId = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.VoterIdDoc = e.target.files[0]),
      // Get file size
      (employee_onboarding.VoterIdDoc.fileSize =
        Math.round((employee_onboarding.VoterIdDoc.size / 1024 / 1024) * 100) /
        100),
      // Get file extension
      (employee_onboarding.VoterIdDoc.fileExtention =
        employee_onboarding.VoterIdDoc.name.split(".").pop()),
      // Get file name
      (employee_onboarding.VoterIdDoc.fileName =
        employee_onboarding.VoterIdDoc.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.VoterIdDoc.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.VoterIdDoc.fileExtention));
    // Print to console
    console.log(employee_onboarding.VoterIdDoc);
  }
};
const EductionCertifacte = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.EductionDoc = e.target.files[0]),
      // Get file size
      (employee_onboarding.EductionDoc.fileSize =
        Math.round((employee_onboarding.EductionDoc.size / 1024 / 1024) * 100) /
        100),
      // Get file extension
      (employee_onboarding.EductionDoc.fileExtention =
        employee_onboarding.EductionDoc.name.split(".").pop()),
      // Get file name
      (employee_onboarding.EductionDoc.fileName =
        employee_onboarding.EductionDoc.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.EductionDoc.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.EductionDoc.fileExtention));
    // Print to console
    console.log(employee_onboarding.EductionDoc);
  }
};
const ReleivingLetter = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (employee_onboarding.ReleivingLetterDoc = e.target.files[0]),
      // Get file size
      (employee_onboarding.ReleivingLetterDoc.fileSize =
        Math.round(
          (employee_onboarding.ReleivingLetterDoc.size / 1024 / 1024) * 100
        ) / 100),
      // Get file extension
      (employee_onboarding.ReleivingLetterDoc.fileExtention =
        employee_onboarding.ReleivingLetterDoc.name.split(".").pop()),
      // Get file name
      (employee_onboarding.ReleivingLetterDoc.fileName =
        employee_onboarding.ReleivingLetterDoc.name.split(".").shift()),
      // Check if file is an image
      (employee_onboarding.ReleivingLetterDoc.isImage = [
        "jpg",
        "jpeg",
        "png",
        "gif",
      ].includes(employee_onboarding.ReleivingLetterDoc.fileExtention));
    // Print to console
    console.log(employee_onboarding.ReleivingLetterDoc);
  }
};

// for Testing Post Data

const Gender = ref([
  { name: "Male", value: "male" },
  { name: "Female", value: "female" },
  { name: "Others", value: "others" },
]);

const Nationality = ref([
  { name: "Indian", value: "indian" },
  { name: "Other Nationality", value: "others" },
]);

const PhyChallenged = ref([
  { name: "Yes", value: "yes" },
  { name: "No", value: "no" },
]);

const BloodGroup = ref([
  { id: "1", name: "A Positive" },
  { id: "2", name: "A Negative" },
  { id: "3", name: "B Positive" },
  { id: "4", name: "B Negative" },
  { id: "5", name: "AB Positive" },
  { id: "6", name: "AB Negative" },
  { id: "7", name: "O Positive" },
  { id: "8", name: "O Negative" },
]);


const compensation_month = ref([
  { id: "1", name: "Monthly gross" },
  { id: "2", name: "Monthly NET" },
  { id: "3", name: "Monthly " },


]);
const compensation_yearly = ref([
  { id: "1", name: "yearly gross" },
  { id: "2", name: "yearly NET" },
  { id: "3", name: "yearly " },


]);

// Sample testong Data

const Sampledata = () => {
  employee_onboarding.employee_code = ref("B090");
  employee_onboarding.employee_name = ref("George David");
  employee_onboarding.aadhar_number = ref("3977 8798 6564");
  employee_onboarding.doj = ref("23-4-2020");
  employee_onboarding.pan_number = ref("BGAJP6646F");
  employee_onboarding.blood_group_name = ref("B Positive");
  employee_onboarding.dob = ref("23-07-2000");
  employee_onboarding.email = ref("example@gmail.com");
  employee_onboarding.dl_no = ref("HR-0619850034761");
  employee_onboarding.passport_number = ref("A2096457");
  employee_onboarding.passport_date = ref("23-5-2030");
  employee_onboarding.bank_name = ref("ANDHRA BANK");
  employee_onboarding.physically_challenged = ref("No");
  employee_onboarding.AccountNumber = ref("35216644292");
  employee_onboarding.bank_ifsc = ref("SBIN0121325");
  employee_onboarding.nationality = ref("Indian");
  employee_onboarding.gender = ref("Male");
  employee_onboarding.marital_status = ref("Married");
  employee_onboarding.mobile_number = ref("897898797");
  employee_onboarding.current_address_line_1 = ref("45/21 2nd Avenue,chennai");
  employee_onboarding.current_address_line_2 = ref("45/21 2nd Avenue,chennai");
  employee_onboarding.current_country = ref("India");
  employee_onboarding.current_state = ref("Tamil Nadu");
  employee_onboarding.current_city = ref("chennai");
  employee_onboarding.current_pincode = ref("600023");
  employee_onboarding.permanent_address_line_1 = ref(
    "45/21 2nd Avenue,chennai"
  );
  employee_onboarding.permanent_address_line_2 = ref(
    "45/21 2nd Avenue,chennai"
  );
  employee_onboarding.permanent_country = ref("India");
  employee_onboarding.permanent_city = ref("chennai");
  employee_onboarding.permanent_state = ref("Tamil Nadu");
  employee_onboarding.permanent_pincode = ref("600003");
  employee_onboarding.department = ref("IT");
  employee_onboarding.process = ref("Iti");
  employee_onboarding.designation = ref("Developer");
  employee_onboarding.cost_center = ref("Chennai");
  employee_onboarding.probation_period = ref("11 Month");
  employee_onboarding.holiday_location = ref("Tamilnadu");
  employee_onboarding.l1_manager_code = ref("PLIPL076-Muthu Selvan");
  employee_onboarding.work_location = ref("chennai");
  employee_onboarding.officical_mail = ref("voidmax@gmail.com");
  employee_onboarding.official_mobile = ref("4646454547");
  employee_onboarding.emp_notice = ref(3);
  employee_onboarding.confirmation_period = ref("10-12-2019");
  employee_onboarding.father_name = ref("David");
  employee_onboarding.father_age = ref("45");
  employee_onboarding.dob_father = ref("23-09-1968");
  employee_onboarding.mother_name = ref("Licas");
  employee_onboarding.dob_mother = ref("23-8-1970");
  employee_onboarding.mother_gender = ref("Female");
  employee_onboarding.mother_age = ref("35");
  employee_onboarding.spouse_gender = ref("female");
  employee_onboarding.dob_spouse = ref("12-8-1995");
  employee_onboarding.spouse_name = ref("priyanka");
  employee_onboarding.no_of_children = ref("5");
};
</script>

<style scoped>
.form-control {
  height: 2.9em;
}

.form-control:focus {
  color: #212529;
  background-color: #fff;
  border-color: #eaecef;
  outline: 0;
  box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
  outline-offset: 0;
  box-shadow: 0 0 0 0.2rem #eaecef;
  border-color: #212529;
}

.p-dropdown:not(.p-disabled):hover {
  border-color: #212529;
}

.p-dropdown:not(.p-disabled):focus {
  color: #212529;
  background-color: #fff;
  border-color: #eaecef;
  outline: 0;
  box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
  outline-offset: 0;
  box-shadow: 0 0 0 0.2rem #eaecef;
  border-color: #212529;
}

.p-dropdown .p-dropdown-label.p-placeholder {
  color: #6c757d;
  font-size: 12.5px;
}

input.p-dropdown-filter.p-inputtext.p-component {
  height: 2.5em;
  width: 250px;
}

.p-dropdown-panel .p-dropdown-header .p-dropdown-filter {
  padding-right: 1.75rem;
  margin-right: -1.75rem;
  height: 2.5em;
}

:deep(.p-dropdown-panel .p-component .p-dropdown-items-wrapper) {
  z-index: 1001;
  transform-origin: center bottom;
  top: 792.4px;
  left: 279.8px;
  width: 275px;
}

:deep(.p-dropdown-panel .p-component .p-dropdown-items-wrapper) {
  max-width: 280px;
}

:deep(.p-dropdown-panel .p-component) {
  background: #ffffff;
  color: #495057;
  border: 0 none;
  border-radius: 6px;
  box-shadow: 0 2px 12px 0 rgb(0 0 0 / 10%);
  width: 100px;
}

:deep(.p-dropdown-item) {
  cursor: pointer;
  font-weight: normal;
  white-space: nowrap;
  position: relative;
  overflow: hidden;
  width: 100px;
}

.p-dialog-mask {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  pointer-events: none;
  background: #0000005e;
}

.file {
  padding: 8px;
}

.field {
  margin-bottom: 1.5rem;
}

form {
  margin-top: 2rem;
}

.card {
  min-width: 450px;
}

@media screen and (max-width: 960px) {
  .card {
    width: 80%;
  }
}
</style>
