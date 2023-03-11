<template>
  <Toast />
  <div class="container-fluid mt-30">
    <div class="">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div id="msform">
            <form @submit.prevent="handleSubmit(!v$.$invalid)" class="p-fluid">
              <input type="hidden" name="user_id" id="user_id" value="" />
              <input
                type="hidden"
                name="can_redirect"
                id="can_redirect"
                value="0"
              />

              <!-- Personal Details Start -->

              <div class="card shadow profile-box card-top-border p-2">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6>Personal Details</h6>
                  </div>

                  <div class="form-card">
                    <div class="row mt-1">
                      <div
                        class="col-md -6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Employee Code</label
                          >
                          <InputText
                            class="form-onboard-form form-control textbox capitalize"
                            type="text"
                            v-model="v$.EmployeeCode.$model"
                            placeholder="Employee Code"
                          />
                        </div>
                      </div>

                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label
                            for="EmployeeNameasperAadhar"
                            class="float-label"
                            >Employee Name as per Aadhar
                            <span class="text-danger">*</span>
                          </label>

                          <InputText
                            class="onboard-form form-control textbox capitalize"
                            type="text"
                            v-model="v$.EmployeeNameAsPerAadhar.$model"
                            :class="{
                              'p-invalid':
                                v$.EmployeeNameAsPerAadhar.$invalid &&
                                submitted,
                            }"
                            style="text-transform: uppercase"
                            placeholder="Employee Name as per Aadhar "
                          />

                          <span
                            v-if="
                              (v$.EmployeeNameAsPerAadhar.$invalid &&
                                submitted) ||
                              v$.EmployeeNameAsPerAadhar.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.EmployeeNameAsPerAadhar.required.$message.replace(
                                "Value",
                                "Employee Name as per in Aadhar"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Date of Birth</label
                          >
                          <input
                            type="text"
                            max="9999-12-31"
                            v-model="v$.PersonDetialsDateofBirth.$model"
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
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Marital Status
                            <span class="text-danger">*</span></label
                          >
                          <select
                            class="form-control textbox"
                            placeholder="Marital Status"
                            @click="spouseDisable"
                            v-model="v$.PersonDetialsMaritalStatus.$model"
                            :class="{
                              'is-invalid':
                                v$.PersonDetialsMaritalStatus.$invalid &&
                                submitted,
                            }"
                          >
                            <option
                              v-for="marry in MaritalStatus"
                              :key="marry.value"
                            >
                              {{ marry.name }}
                            </option>
                          </select>

                          <span
                            v-if="
                              (v$.PersonDetialsMaritalStatus.$invalid &&
                                submitted) ||
                              v$.PersonDetialsMaritalStatus.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.PersonDetialsMaritalStatus.required.$message.replace(
                                "Value",
                                "Marital Status"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                            v-model="v$.DateOfJoining.$model"
                            placeholder="Date of Joining"
                            id="doj"
                            name="doj"
                            :class="{
                              'p-invalid':
                                v$.DateOfJoining.$invalid && submitted,
                            }"
                            class="form-control textbox"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.DateOfJoining.$invalid && submitted) ||
                              v$.DateOfJoining.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.DateOfJoining.required.$message.replace(
                                "Value",
                                "Date Of Joining"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Gender<span class="text-danger">*</span></label
                          >

                          <select
                            v-model="v$.PersonDetialsGender.$model"
                            placeholder="Choose Gender"
                            :class="{
                              'is-invalid':
                                v$. PersonDetialsGender.$invalid && submitted,
                            }"
                            class="form-control textbox"
                          >
                            <option
                              v-for="gender in Gender" :key="gender.id"
                             >
                              {{ gender.name }}
                            </option>
                          </select>

                          <span
                            v-if="
                              (v$.PersonDetialsGender.$invalid && submitted) ||
                              v$.PersonDetialsGender.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.PersonDetialsGender.required.$message.replace(
                                "Value",
                                "Gender"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                                v$.PersonDetialsMobileNumber.$invalid &&
                                submitted,
                            }"
                            v-model="v$.PersonDetialsMobileNumber.$model"
                            class="form-control textbox"
                            minlength="10"
                            maxlength="10"
                          />
                        </div>
                        <span
                          v-if="
                            (v$.PersonDetialsMobileNumber.$invalid &&
                              submitted) ||
                            v$.PersonDetialsMobileNumber.$pending.$response
                          "
                          class="p-error"
                          >{{
                            v$.PersonDetialsMobileNumber.required.$message.replace(
                              "Value",
                              "Mobile Number"
                            )
                          }}</span
                        >
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Email<span class="text-danger">*</span></label
                          >
                          <InputText
                            type="text"
                            placeholder="Email ID"
                            :class="{
                              'p-invalid':
                                v$.PersonDetialsEmail.$invalid && submitted,
                            }"
                            v-model="v$.PersonDetialsEmail.$model"
                            class="form-control textbox"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                          />

                          <span
                            v-if="
                              (v$.PersonDetialsEmail.$invalid && submitted) ||
                              v$.PersonDetialsEmail.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.PersonDetialsEmail.required.$message.replace(
                                "Value",
                                "Email"
                              )
                            }}</span
                          >
                        </div>
                        <span class="error" id="error_email"></span>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                            v-model="v$.AadhaarNumber.$model"
                            :class="{
                              'p-invalid':
                                v$.AadhaarNumber.$invalid && submitted,
                            }"
                          />
                          <span
                            v-if="
                              (v$.AadhaarNumber.$invalid && submitted) ||
                              v$.AadhaarNumber.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.AadhaarNumber.required.$message.replace(
                                "Value",
                                "Aadhaar Number"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 co l-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Pan Number / Pan Acknowlegement<span
                              class="text-danger"
                              >*</span
                            ></label
                          >
                          <!-- <InputText  type="text"

                                                        pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                                         maxlength="10" /> -->
                          <InputMask
                            id="serial"
                            mask="aaaaa9999a"
                            v-model="v$.PanNumber.$model"
                            placeholder="AHFCS1234F"
                            style="text-transform: uppercase"
                            class="form-control textbox"
                            :class="{
                              'p-invalid': v$.PanNumber.$invalid && submitted,
                            }"
                          />

                          <span
                            v-if="
                              (v$.PanNumber.$invalid && submitted) ||
                              v$.PanNumber.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.PanNumber.required.$message.replace(
                                "Value",
                                "Pan Number"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">DL Number</label>
                          <InputText
                            class="onboard-form form-control textbox"
                            type="text"
                            v-model="v$.DLNumber.$model"
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
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Choose nationality<span class="text-danger"
                              >*</span
                            ></label
                          >

                          <select
                            @click="NationalityCheck"
                            name=""
                            id=""
                            :class="{
                              'is-invalid':
                                v$.ChooseNationality.$invalid && submitted,
                            }"
                            v-model="v$.ChooseNationality.$model"
                            class="form-control"
                          >
                            <option
                              v-for="nation in Nationality"
                              :key="nation.name"
                            >
                              {{ nation.name }}
                            </option>
                          </select>

                          <span
                            v-if="
                              (v$.ChooseNationality.$invalid && submitted) ||
                              v$.ChooseNationality.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.ChooseNationality.required.$message.replace(
                                "Value",
                                "Choose Nationality"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        v-if="NationalityData"
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                            v-model="v$.PassportNumber.$model"
                            placeholder="Passport Number"
                          />

                          <span class="error" id="error_passport_no"></span>
                        </div>
                      </div>
                      <div
                        v-if="NationalityData"
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                            v-model="v$.PassportExpDate.$model"
                            placeholder="Date of Joining"
                            id="doj"
                            name="doj"
                            class="onboard-form form-control textbox"
                            onfocus="(this.type='date')"
                          />

                          <span class="" id="error_passport_date"></span>
                        </div>
                      </div>

                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Blood Group</label>

                          <select
                            v-model="v$.PersonDetialsBloodGroup.$model"
                            placeholder="Blood Group"
                            name="blood_group"
                            class="onboard-form form-control textbox"
                          >
                            <option
                              v-for="bloodGroup in BloodGroup"
                              :key="bloodGroup.id"
                            >
                              {{ bloodGroup.name }}
                            </option>
                            choose
                          </select>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Physically Challenged</label
                          >

                          <select
                            name=""
                            id=""
                            class="onboard-form form-control textbox"
                            placeholder="Physically Challenged"
                            v-model="v$.PhysicallyChallenged.$model"
                          >
                            <option
                              v-for="Physically in PhyChallenged"
                              :key="Physically.name"
                            >
                              {{ Physically.name }}
                            </option>
                          </select>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Bank Name<span class="text-danger">*</span></label
                          >

                          <select
                            name=""
                            id=" "
                            placeholder="Bank Name"
                            :class="{
                              'is-invalid': v$.BankName.$invalid && submitted,
                            }"
                            class="form-control textbox"
                            v-model="v$.BankName.$model"
                          >
                            <option v-for="bank in bankList" :key="bank.id">
                              {{ bank.bank_name }}
                            </option>
                          </select>

                          <span
                            v-if="
                              (v$.BankName.$invalid && submitted) ||
                              v$.BankName.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.BankName.required.$message.replace(
                                "Value",
                                "BankName "
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Bank IFSC Code<span class="text-danger"
                              >*</span
                            ></label
                          >
                          <InputText
                            type="text"
                            v-model="v$.BankIFSCCode.$model"
                            :class="{
                              'p-invalid':
                                v$.BankIFSCCode.$invalid && submitted,
                            }"
                            class="form-control textbox"
                            pattern="^[A-Z]{4}0[A-Z0-9]{6}$"
                            minlength="11"
                            maxlength="12"
                            placeholder="Bank IFSC Code"
                          />

                          <span
                            v-if="
                              (v$.BankIFSCCode.$invalid && submitted) ||
                              v$.BankIFSCCode.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.BankIFSCCode.required.$message.replace(
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

              <!-- <div class="card shadow  profile-box card-top-border p-2">
        <div class="card-body justify-content-center align-items-center">
            <div class="form-card">
                <div class=" header-card-text">
                    <h6>Statutory Details</h6>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                        <div class="floating">
                            <label for="" class="float-label">PF
                                Applicable<span class="text-danger">*</span></label>
                            <InputText
                                class="onboard-form form-control textbox  select2_form_without_search"
                                type="text" v-model="PFApplicable"
                                placeholder="PF Applicable" />

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                        <div class="floating">
                            <label for="" class="float-label">EPF Number</label>
                            <InputText class="onboard-form form-control textbox "
                                placeholder="EPF Number" type="text" v-model="epf_number" />

                            <span class="error" id="error_epf_number"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">

                        <div class="floating">
                            <label for="" class="float-label">UAN Number</label>
                            <InputText id="uan_number" minlength="12" maxlength="12"
                                placeholder="UAN Number"
                                class="onboard-form form-control textbox " type="text"
                                v-model="value" />

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                        <div class="floating">
                            <label for="" class="float-label">ESIC
                                Applicable<span class="text-danger">*</span></label>
                            <Dropdown style="height: 2.4em;"
                                class="onboard-form form-control textbox  select2_form_without_search"
                                placeholder="ESIC Applicable" v-model="selectedCity2"
                                :options="cities" optionLabel="name" :editable="true" />

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 mb-2">
                        <div class="floating">
                            <label for="" class="float-label">ESIC Number</label>

                            <InputText placeholder="ESIC Number" minlength="10"
                                maxlength="10" class="onboard-form form-control textbox "
                                type="text" v-model="ESICNumber" />


                            <span class="error" id="error_esic_number"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 mb-2">
                        <div class="floating">
                            <label for="" class="float-label">Ptax
                                Location</label>
                            <Dropdown style="height: 2.4em;"
                                class="onboard-form form-control textbox  select2_form_without_search"
                                placeholder="Ptax Location" v-model="selectedCity2"
                                :options="cities" optionLabel="name" :editable="true" />


                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 mb-2">
                        <div class="floating">
                            <label for="" class="float-label">TAX Regime<span
                                    class="text-danger">*</span> </label>
                            <Dropdown style="height: 2.4em;"
                                class="onboard-form form-control textbox  select2_form_without_search"
                                placeholder="TAX Regime" v-model="selectedCity2"
                                :options="cities" optionLabel="name" :editable="true" />



                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                    <div class="floating">
                        <label for="" class="float-label">LWF Location</label>
                        <Dropdown style="height: 2.4em;" placeholder="LWF Location"
                            class="onboard-form form-control textbox  select2_form_without_search"
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

              <div class="card shadow profile-box card-top-border p-2">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="form-card">
                    <div class="header-card-text">
                      <h6>Current Address</h6>
                    </div>
                    <div class="row mt-1">
                      <div
                        class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Address 1<span class="text-danger">*</span></label
                          >
                          <Textarea
                            style="height: 100px"
                            class="form-control textbox capitalize"
                            type="text"
                            rows="3"
                            current_address_line_1
                            :class="{
                              'p-invalid':
                                v$.CurrentAddress1.$invalid && submitted,
                            }"
                            v-model="v$.CurrentAddress1.$model"
                            placeholder="Current Address"
                          />

                          <span
                            v-if="
                              (v$.CurrentAddress1.$invalid && submitted) ||
                              v$.CurrentAddress1.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.CurrentAddress1.required.$message.replace(
                                "Value",
                                "Current Address 1"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Address 2<span class="text-danger">*</span></label
                          >

                          <Textarea
                            style="height: 100px"
                            class="form-control textbox capitalize"
                            type="text"
                            rows="3"
                            current_address_line_2
                            :class="{
                              'p-invalid':
                                v$.CurrentAddress2.$invalid && submitted,
                            }"
                            v-model="v$.CurrentAddress2.$model"
                            placeholder="Current Address"
                          />

                          <span
                            v-if="
                              (v$.CurrentAddress2.$invalid && submitted) ||
                              v$.CurrentAddress2.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.CurrentAddress2.required.$message.replace(
                                "Value",
                                "Current Address 2"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Country<span class="text-danger">*</span></label
                          >

                          <select
                            placeholder="Country"
                            name="current_country"
                            v-model="v$.CurrentCountry.$model"
                            :class="{
                              'is-invalid':
                                v$.CurrentCountry.$invalid && submitted,
                            }"
                            id="current_country"
                            class="form-control textbox"
                          >
                            <option
                              v-for="countries in country"
                              :key="countries.id"
                            >
                              {{ countries.country_name }}
                            </option>
                          </select>
                          <span
                            v-if="
                              (v$.CurrentCountry.$invalid && submitted) ||
                              v$.CurrentCountry.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.CurrentCountry.required.$message.replace(
                                "Value",
                                "country"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >State<span class="text-danger">*</span></label
                          >
                          <select
                            placeholder="State"
                            name="current_state"
                            v-model="v$.CurrentState.$model"
                            :class="{
                              'is-invalid':
                                v$.CurrentState.$invalid && submitted,
                            }"
                            id="current_state"
                            class="form-control textbox"
                          >
                            <option v-for="states in state" :key="states.id">
                              {{ states.state_name }}
                            </option>
                          </select>
                          <span
                            v-if="
                              (v$.CurrentState.$invalid && submitted) ||
                              v$.CurrentState.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.CurrentState.required.$message.replace(
                                "Value",
                                "State"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">
                            City<span class="text-danger">*</span></label
                          >

                          <InputText
                            class="form-control"
                            type="text"
                            :class="{
                              'p-invalid': v$.CurrentCity.$invalid && submitted,
                            }"
                            v-model="v$.CurrentCity.$model"
                            placeholder="current city"
                          />
                        </div>
                        <span
                          v-if="
                            (v$.CurrentCity.$invalid && submitted) ||
                            v$.CurrentCity.$pending.$response
                          "
                          class="p-error"
                          >{{
                            v$.CurrentCity.required.$message.replace(
                              "Value",
                              "City"
                            )
                          }}</span
                        >
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                                v$.CurrentPincode.$invalid && submitted,
                            }"
                            v-model="v$.CurrentPincode.$model"
                            placeholder="Pincode"
                          />
                          <span
                            v-if="
                              (v$.CurrentPincode.$invalid && submitted) ||
                              v$.CurrentPincode.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.CurrentPincode.required.$message.replace(
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
                        class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 my-3"
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
                        <div class="row mt-1">
                          <div
                            class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Address 1<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <Textarea
                                placeholder="Permanent Address"
                                class="form-control textbox capitalize"
                                style="height: 100px"
                                type="text"
                                rows="3"
                                id="permanent_address_line_1"
                                :class="{
                                  'p-invalid':
                                    v$.PermanentAddress1.$invalid && submitted,
                                }"
                                v-model="v$.PermanentAddress1.$model"
                              />
                              <span
                                v-if="
                                  (v$.PermanentAddress1.$invalid &&
                                    submitted) ||
                                  v$.PermanentAddress1.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.PermanentAddress1.required.$message.replace(
                                    "Value",
                                    "PermanentAddress1"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Address 2<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <Textarea
                                placeholder="Permanent Address"
                                class="form-control textbox capitalize"
                                style="height: 100px"
                                type="text"
                                rows="3"
                                id="permanent_address_line_2"
                                :class="{
                                  'p-invalid':
                                    v$.PermanentAddress2.$invalid && submitted,
                                }"
                                v-model="v$.PermanentAddress2.$model"
                              />

                              <span
                                v-if="
                                  (v$.PermanentAddress2.$invalid &&
                                    submitted) ||
                                  v$.PermanentAddress2.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.PermanentAddress2.required.$message.replace(
                                    "Value",
                                    "PermanentAddress2"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Country<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <select
                                placeholder="Country"
                                v-model="v$.Permanentcountry.$model"
                                :class="{
                                  'is-invalid':
                                    v$.Permanentcountry.$invalid && submitted,
                                }"
                                id="current_country"
                                class="onboard-form form-control textbox"
                              >
                                <option
                                  v-for="countries in country"
                                  :key="countries.id"
                                >
                                  {{ countries.country_name }}
                                </option>
                              </select>
                              <span
                                v-if="
                                  (v$.Permanentcountry.$invalid && submitted) ||
                                  v$.Permanentcountry.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.Permanentcountry.required.$message.replace(
                                    "Value",
                                    "country"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >State<span class="text-danger">*</span></label
                              >
                              <select
                                placeholder="State"
                                name="Permanent_state"
                                v-model="v$.Permanentstate.$model"
                                :class="{
                                  'is-invalid':
                                    v$.Permanentstate.$invalid && submitted,
                                }"
                                class="form-control textbox"
                              >
                                <option
                                  v-for="states in state"
                                  :key="states.id"
                                >
                                  {{ states.state_name }}
                                </option>
                              </select>
                              <span
                                v-if="
                                  (v$.Permanentstate.$invalid && submitted) ||
                                  v$.Permanentstate.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.Permanentstate.required.$message.replace(
                                    "Value",
                                    "State"
                                  )
                                }}</span
                              >
                            </div>
                          </div>

                          <div
                            class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                          >
                            <div class="floating">
                              <label for="" class="float-label">
                                City<span class="text-danger">*</span></label
                              >

                              <InputText
                                class="onboard-form form-control textbox capitalize"
                                type="text"
                                :class="{
                                  'p-invalid':
                                    v$.PermanentCity.$invalid && submitted,
                                }"
                                v-model="v$.PermanentCity.$model"
                                placeholder="City"
                              />

                              <span
                                v-if="
                                  (v$.PermanentCity.$invalid && submitted) ||
                                  v$.PermanentCity.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.PermanentCity.required.$message.replace(
                                    "Value",
                                    "City"
                                  )
                                }}</span
                              >
                            </div>
                          </div>
                          <div
                            class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                          >
                            <div class="floating">
                              <label for="" class="float-label"
                                >Pincode<span class="text-danger"
                                  >*</span
                                ></label
                              >

                              <InputText
                                class="onboard-form form-control textbox capitalize"
                                type="number"
                                minlength="6"
                                maxlength="6"
                                :class="{
                                  'p-invalid':
                                    v$.PermanentPincode.$invalid && submitted,
                                }"
                                v-model="v$.PermanentPincode.$model"
                                placeholder="Pincode"
                              />
                              <span
                                v-if="
                                  (v$.PermanentPincode.$invalid && submitted) ||
                                  v$.PermanentPincode.$pending.$response
                                "
                                class="p-error"
                                >{{
                                  v$.PermanentPincode.required.$message.replace(
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

              <div class="card shadow profile-box card-top-border p-2">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6 class="">Official Details</h6>
                  </div>
                  <div class="form-card">
                    <div class="row mt-1">
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Department</label>

                          <select
                            placeholder="Department"
                            name="department"
                            v-model="v$.Departmant.$model"
                            style="height: 2.9em"
                            id="department"
                            class="onboard-form form-control textbox"
                          >
                            <!-- <option value="" hidden selected disabled>Select
                                                            Department</option> -->

                            <option
                              v-for="department in departmentDetails"
                              :key="department.id"
                            >
                              {{ department.name }}
                            </option>
                          </select>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Process<span class="text-danger">*</span></label
                          >
                          <InputText
                            class="onboard-form form-control"
                            type="text"
                            :class="{
                              'p-invalid': v$.Process.$invalid && submitted,
                            }"
                            v-model="v$.Process.$model"
                            placeholder="Process"
                          />

                          <span
                            v-if="
                              (v$.Process.$invalid && submitted) ||
                              v$.Process.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.Process.required.$message.replace(
                                "Value",
                                "Process"
                              )
                            }}</span
                          >
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2"
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
                              'p-invalid': v$.Designation.$invalid && submitted,
                            }"
                            v-model="v$.Designation.$model"
                          />

                          <span
                            v-if="
                              (v$.Designation.$invalid && submitted) ||
                              v$.Designation.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.Designation.required.$message.replace(
                                "Value",
                                "Designation"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Cost Center</label>

                          <input
                            type="number"
                            placeholder="Cost Center"
                            v-model="v$.CostCenter.$model"
                            name="cost_center"
                            class="onboard-form form-control textbox"
                          />
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Probation Period</label
                          >

                          <select
                            placeholder="Probation Period"
                            name="probation_period"
                            id="probation_period"
                            style="height: 2.9em"
                            v-model="v$.probationPeriod.$model"
                            class="onboard-form form-control textbox"
                          >
                            <!-- <option value="" hidden selected disabled>Select
                                                            Probabition Period</option> -->
                            <option value="1 Month">1 Month</option>
                            <option value="2 Month">2 Month</option>
                            <option value="3 Month">3 Month</option>
                            <option value="4 Month">4 Month</option>
                            <option value="5 Month">5 Month</option>
                            <option value="6 Month">6 Month</option>
                            <option value="7 Month">7 Month</option>
                            <option value="8 Month">8 Month</option>
                            <option value="9 Month">9 Month</option>
                            <option value="10 Month">10 Month</option>
                            <option value="11 Month">11 Month</option>
                            <option value="12 Month">12 Month</option>
                          </select>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2 col-xl-3"
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
                                v$.WorkLocation.$invalid && submitted,
                            }"
                            v-model="v$.WorkLocation.$model"
                          />
                          <label
                            class="error star_error work_location_label"
                            for="work_location"
                            style="display: none"
                          ></label>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2 col-xxl-3"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Reporting Manager Name<span class="text-danger"
                              >*</span
                            ></label
                          >

                          <select
                            placeholder="Reporting Manager Name"
                            name="l1_manager_code"
                            id="l1_manager_code_select"
                            v-model="v$.ReportingManagerCode.$model"
                            :class="{
                              'is-invalid':
                                v$.ReportingManagerCode.$invalid && submitted,
                            }"
                            class="onboard-form form-control textbox"
                          >
                            <option
                              v-for="singleManagerDetail in Managerdetails"
                              :key="singleManagerDetail.user_code"
                            >
                              {{ singleManagerDetail.user_code }}
                              -
                              {{ singleManagerDetail.name }}
                            </option>
                          </select>

                          <span
                            v-if="
                              (v$.ReportingManagerCode.$invalid && submitted) ||
                              v$.ReportingManagerCode.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.ReportingManagerCode.required.$message.replace(
                                "Value",
                                "Reporting Manager Code"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Holiday Location</label
                          >
                          <select
                            placeholder="Holiday Location"
                            name="holiday_location"
                            id="holiday_location"
                            v-model="holidayLocation"
                            class="textbox onboard-form form-control select2_form_without_search"
                          >
                            <option value=""   disabled>
                              Holiday Location
                            </option>
                          </select>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                            v-model="v$.OfficialEmail.$model"
                          />
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Official Mobile</label
                          >
                          <input
                            type="text"
                            minlength="10"
                            maxlength="10"
                            v-model="v$.OfficialMobileNO.$model"
                            placeholder="Official Mobile"
                            name="official_mobile"
                            id="official_mobile"
                            class="textbox onboard-form form-control"
                          />
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Employee Notice Period Days</label
                          >
                          <input
                            type="number"
                            placeholder="Employee Notice Period Days"
                            v-model="v$.EmployeeNoticePeriodDays.$model"
                            name="emp_notice"
                            class="onboard-form form-control textbox"
                          />
                        </div>
                      </div>

                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                                v$.DateOfConfirmation.$invalid && submitted,
                            }"
                            v-model="v$.DateOfConfirmation.$model"
                          />

                          <span
                            v-if="
                              (v$.DateOfConfirmation.$invalid && submitted) ||
                              v$.DateOfConfirmation.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.DateOfConfirmation.required.$message.replace(
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

              <div class="card shadow profile-box card-top-border p-2">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6 class="mb-0">Family Details</h6>
                  </div>
                  <div class="form-card">
                    <div class="row mt-1">
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Father Name<span class="text-danger"
                              >*</span
                            ></label
                          >

                          <InputText
                            class="nboard-form form-control textbox capitalize"
                            type="text"
                            placeholder="Father Name"
                            name="father_name"
                            id="father_name"
                            :class="{
                              'p-invalid': v$.fatherName.$invalid && submitted,
                            }"
                            v-model="v$.fatherName.$model"
                          />
                          <span
                            v-if="
                              (v$.fatherName.$invalid && submitted) ||
                              v$.fatherName.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.fatherName.required.$message.replace(
                                "Value",
                                "father Name"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                              'p-invalid':
                                v$.fatherDateofBirth.$invalid && submitted,
                            }"
                            v-model="v$.fatherDateofBirth.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.fatherDateofBirth.$invalid && submitted) ||
                              v$.fatherDateofBirth.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.fatherDateofBirth.required.$message.replace(
                                "Value",
                                "father Date of Birth"
                              )
                            }}
                          </span>
                        </div>
                      </div>

                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Age </label>

                          <input
                            type="number"
                            placeholder="Age"
                            name="father_age"
                            v-model="employee_onboarding.fatherAge"
                            id="father_age"
                            class="textbox onboard-form form-control"
                            minlength="2"
                            maxlength="3"
                            readonly
                          />
                        </div>
                      </div>

                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                              'p-invalid': v$.motherName.$invalid && submitted,
                            }"
                            v-model="v$.motherName.$model"
                          />

                          <span
                            v-if="
                              (v$.motherName.$invalid && submitted) ||
                              v$.motherName.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.motherName.required.$message.replace(
                                "Value",
                                "mother Name"
                              )
                            }}
                          </span>
                        </div>
                      </div>

                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                              'p-invalid':
                                v$.motherDateofBirth.$invalid && submitted,
                            }"
                            v-model="v$.motherDateofBirth.$model"
                            @change="fnCalculateAge"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.motherDateofBirth.$invalid && submitted) ||
                              v$.motherDateofBirth.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.motherDateofBirth.required.$message.replace(
                                "Value",
                                "mother Date of Birth"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label">Age</label>

                          <input
                            type="number"
                            placeholder="Age"
                            name="mother_age"
                            v-model="employee_onboarding.motherAge"
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
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                              'p-invalid': v$.SpouseName.$invalid && submitted,
                            }"
                            v-model="v$.SpouseName.$model"
                          />

                          <span
                            v-if="
                              (v$.SpouseName.$invalid && submitted) ||
                              v$.SpouseName.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.SpouseName.required.$message.replace(
                                "Value",
                                "Spouse Name"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                                v$.dateOfWedding.$invalid && submitted,
                            }"
                            v-model="v$.dateOfWedding.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.dateOfWedding.$invalid && submitted) ||
                              v$.dateOfWedding.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.dateOfWedding.required.$message.replace(
                                "Value",
                                "Date Of Wedding"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Gender <span class="text-danger">*</span></label
                          >

                          <select
                            placeholder="Spouse Gender"
                            name="spouse_gender"
                            v-model="v$.spouseGender.$model"
                            id="spouse_gender"
                            :class="{
                              'is-invalid': v$.SpouseDOB.$invalid && submitted,
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
                              (v$.spouseGender.$invalid && submitted) ||
                              v$.spouseGender.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.spouseGender.required.$message.replace(
                                "Value",
                                "Spouse Gender"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
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
                              'p-invalid': v$.SpouseDOB.$invalid && submitted,
                            }"
                            v-model="v$.SpouseDOB.$model"
                            onfocus="(this.type='date')"
                          />

                          <span
                            v-if="
                              (v$.SpouseDOB.$invalid && submitted) ||
                              v$.SpouseDOB.$pending.$response
                            "
                            class="p-error"
                            >{{
                              v$.SpouseDOB.required.$message.replace(
                                "Value",
                                "Spouse Date of Birth"
                              )
                            }}
                          </span>
                        </div>
                      </div>
                      <div
                        v-if="sposeData"
                        class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"
                      >
                        <div class="floating">
                          <label for="" class="float-label"
                            >Number of Children</label
                          >

                          <select
                            placeholder="Number of Children"
                            name="no_of_children"
                            id="no_of_children"
                            v-model="noOfChildren"
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

              <!-- family Detiaals End -->

              <!-- Personal Documents start -->

              <div class="card shadow mb-0 profile-box card-top-border p-2">
                <div
                  class="card-body justify-content-center align-items-center"
                >
                  <div class="header-card-text">
                    <h6 class="mb-0">Personal Documents</h6>
                  </div>
                  <div class="form-card mb-2">
                    <div class="row mt-1">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                        <label for="" class="float-label"
                          >Aadhar Card Front<span class="text-danger"
                            >*</span
                          ></label
                        >
                        <!-- <div class="form-control md"
                                                         id="aadhar_card_file_label"><span class="file_label">Choose
                                                             Aadhar
                                                                     Card Front</span></div>-->
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
                        class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2"
                        id="aadhar_card_backend_content"
                      >
                        <label for="" class="float-label">
                          Aadhar Card Back<span class="text-danger"
                            >*</span
                          ></label
                        >
                        <!-- <div class="addfiles form-control"
                                                         id="aadhar_card_backend_file_label"><span
                                                             class="file_label">Choose
                                                                     Aadhar Card Back </span></div> -->
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
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                        <label for="" class="float-label">
                          Pan Card<span class="text-danger">*</span></label
                        >
                        <!-- <div class="addfiles form-control" data="#pan_card_file"
                                                         id="pan_card_file_label"><span class="file_label">Upload Pan
                                                                     Card</span></div> -->
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
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                        <label for="" class="float-label"> Passport</label>
                        <!-- <div class="addfiles form-control" data="#passport_file"
                                                         id="passport_file_label"><span class="file_label">Choose
                                                                     Passport</span></div> -->
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
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                        <label for="" class="float-label"> ID</label>
                        <!-- <div class="addfiles form-control" data="#voters_id_file"
                                                         id="voters_id_file_label"><span class="file_label">Choose
                                                             Voters
                                                                     ID</span></div> -->
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
                      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                        <label for="" class="float-label">
                          Driving License</label
                        >
                        <!-- <div class="addfiles form-control" data="#dl_file"
                                                         id="dl_file_label"><span class="file_label">Choose Driving
                                                                     License</span></div> -->
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
                        <!-- <div class="addfiles form-control" data="#reliving_letter_file"
                                                                 id="reliving_letter_file_label"><span class="file_label">Choose Relieving Letter</span></div> -->
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
                    <div class="col-12 text-right">
                      <input
                        type="button"
                        value="FileUploadText"
                        @click="submit"
                        class="btn btn-orange text-center processOnboardForm"
                      />

                      <input
                        type="button"
                        value="sample"
                        @click="Sampledata"
                        class="btn btn-orange text-center processOnboardForm"
                      />

                      <button
                        type="button"
                        data="row-6"
                        next="row-6"
                        placeholder=""
                        name="save_form"
                        id="save_button"
                        class="btn btn-orange text-center processOnboardForm"
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
                        class="btn btn-orange text-center processOnboardForm"
                        value="Submit"
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

  <Dialog
    v-if="
      !employee_onboarding.EmployeeNameAsPerAadhar.length > 0 &&
      !employee_onboarding.AadhaarNumber.length > 0
    "
    header="Documents Required"
    v-model:visible="RequiredDocument"
    :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
    :style="{ width: '50vw' }"
  >
    <li
      v-if="
        employee_onboarding.EmployeeNameAsPerAadhar == '' ||
        employee_onboarding.EmployeeNameAsPerAadhar.length < 0
      "
    >
      Employee As Per Name Required
    </li>
    <li
      v-if="
        employee_onboarding.AadhaarNumber == '' ||
        employee_onboarding.AadhaarNumber.length < 0
      "
    >
      Aadhaar Number Required
    </li>
    <li
      v-if="
        employee_onboarding.PanNumber == '' ||
        employee_onboarding.PanNumber.length < 0
      "
    >
      Pan Number Required
    </li>
    <li
      v-if="
        employee_onboarding.PersonDetialsMobileNumber == '' ||
        employee_onboarding.PersonDetialsMobileNumber.length < 0
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
    <div class="flex align-items-center text-center flex-column pt-6 px-3">
      <i
        class="pi pi-check-circle"
        :style="{ fontSize: '5rem', color: 'var(--green-500)' }"
      ></i>
      <h5 class="mb-6">Onboarding Successful!</h5>
      <p :style="{ lineHeight: 1.5, textIndent: '1rem' }">
        Your account is registered under name
        <b>{{ employee_onboarding.EmployeeNameAsPerAadhar }}</b
        ><br />
        Please check
        <b>{{ employee_onboarding.PersonDetialsEmail }}</b> for Further
        Information
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
} from "./NormalOnboardingService";

const gen=ref("red")

onMounted(() => {

    employee_onboarding.PersonDetialsBloodGroup=gen.value

    console.log(gen.value);
  // For Bank Data
  getBankList().then((result) => (bankList.value = result));
  //  For Countries
  getCountryList().then((result) => (country.value = result));
  console.log(country.country_name);
  employee_onboarding.CurrentCountry = "India";
  employee_onboarding.Permanentcountry = "India";

  // for state
  getStateList().then((result) => (state.value = result));
  employee_onboarding.CurrentState = "Tamil Nadu";
  employee_onboarding.Permanentstate = "Tamil Nadu";
  // for Manager Details
  ManagerDetails().then((result) => (Managerdetails.value = result));
  console.log(Managerdetails);

  //Get Department details

  DepartmentDetails().then((result) => (departmentDetails.value = result));
});

const employee_onboarding = reactive({
  can_onboard_employee: true,
  EmployeeCode: "",
  DateOfJoining: "",
  AadhaarNumber: "",
  PassportNumber: "",
  BankName: "",
  EmployeeNameAsPerAadhar: "",
  PersonDetialsGender: "",
  PanNumber: "",
  PassportExpDate: "",
  AccountNumber: "",
  PersonDetialsDateofBirth: "",
  PersonDetialsMobileNumber: "",
  DLNumber: "",
  PersonDetialsBloodGroup: "",
  BankIFSCCode: "",
  PersonDetialsMaritalStatus: "",
  PersonDetialsEmail: "",
  ChooseNationality: "",
  PhysicallyChallenged: "",

  // person Detials End

  // Address detials

  // Current Address Detials Start

  CurrentAddress1: "",
  CurrentAddress2: "",
  CurrentCountry: "",
  CurrentState: "",
  CurrentCity: "",
  CurrentPincode: "",

  // Current Address Details End

  // Permanant Address Start

  PermanentAddress1: "",
  PermanentAddress2: "",
  Permanentcountry: "",
  Permanentstate: "",
  PermanentCity: "",
  PermanentPincode: "",

  // Permanant Address end

  // Office Detials Start

  Departmant: "",
  Process: "",
  Designation: "",
  CostCenter: "",
  probationPeriod: "",
  WorkLocation: "",
  ReportingManagerCode: "",
  ReportingManagerName: "",
  holidayLocation: "",
  OfficialEmail: "",
  OfficialMobileNO: "",
  EmployeeNoticePeriodDays: "",
  DateOfConfirmation: "",

  // Office Details End

  // family Details Start

  fatherName: "",
  fatherDateofBirth: "",
  fatherGender: "Male",
  fatherAge: "",
  motherName: "",
  motherDateofBirth: "",
  motherGender: "",
  motherAge: "Female",
  SpouseName: "",
  dateOfWedding: "",
  spouseGender: "",
  SpouseDOB: "",
  noOfChildren: "",

  // family Details End

  // Personal Documents Start
});

// variableDeclarations

const toast = useToast();
const bankList = ref();
const country = ref();
const departmentDetails = ref();
const state = ref();
const Managerdetails = ref();

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
const VoterIdInvalid = ref(false);
const PassPortInvalid = ref(false);
const DrivingLisenceInvalid = ref(false);
const ReleivingLetterInvalid = ref(false);

//   Events

const handleSubmit = (isFormValid) => {
  console.log(employee_onboarding);

  submitted.value = true;

  AadharCardFront.fileName == undefined
    ? (AadharDocFrontInvalid.value = true)
    : (AadharDocFrontInvalid.value = false);
  AadharCardBack.fileName == undefined
    ? (AadharDocBackInvalid.value = true)
    : (AadharDocBackInvalid.value = false);
  PanCardDoc.fileName == undefined
    ? (PancardInvalid.value = true)
    : (PancardInvalid.value = false);
  DrivingLicenseDoc.fileName == undefined
    ? (DrivingLisenceInvalid.value = true)
    : (DrivingLisenceInvalid.value = false);
  VoterIdDoc.fileName == undefined
    ? (VoterIdInvalid.value = true)
    : (VoterIdInvalid.value = false);
  ReleivingLetterDoc.fileName == undefined
    ? (ReleivingLetterInvalid.value = true)
    : (ReleivingLetterInvalid.value = false);
  EductionDoc.fileName == undefined
    ? (EducationCertificateInvalid.value = true)
    : (EducationCertificateInvalid.value = false);
  PassportDoc.fileName == undefined
    ? (PassPortInvalid.value = true)
    : (PassPortInvalid.value = false);

  if (!isFormValid) {
    toast.add({
      severity: "error",
      summary: "Error Message",
      detail: "Message Content",
      life: 3000,
    });
    RequiredDocument.value = true;
    return;
  }
  toggleDialog();
  SumbitDisable.value = false;
};
const toggleDialog = () => {
  showMessage.value = !showMessage.value;

  if (!showMessage.value) {
  }
};

const spouseDisable = () => {
  if (employee_onboarding.PersonDetialsMaritalStatus == "Married") {
    sposeData.value = true;
  } else {
    sposeData.value = false;
  }
};

// CheckBox Copy VAlue

const ForCopyAdrress = () => {
  if (CopyAddresschecked.value == false) {
    employee_onboarding.PermanentAddress1 = employee_onboarding.CurrentAddress1;
    employee_onboarding.PermanentAddress2 = employee_onboarding.CurrentAddress2;
    employee_onboarding.Permanentcountry = employee_onboarding.CurrentCountry;
    employee_onboarding.Permanentstate = employee_onboarding.CurrentState;
    employee_onboarding.PermanentCity = employee_onboarding.CurrentCity;
    employee_onboarding.PermanentPincode = employee_onboarding.CurrentPincode;
  } else if (CopyAddresschecked.value == true) {
    employee_onboarding.PermanentAddress1 = "";
    employee_onboarding.PermanentAddress2 = "";
    employee_onboarding.PermanentCity = "";
    employee_onboarding.Permanentstate = "";
    employee_onboarding.PermanentPincode = "";
    employee_onboarding.PermanentAddress1 = "";
  }
};

// Nationality Check

const NationalityCheck = () => {
  if (employee_onboarding.ChooseNationality == "Indian") {
    NationalityData.value = false;
  } else {
    NationalityData.value = true;
  }
};

const fnCalculateAge = () => {
  console.log("Father's Age" + employee_onboarding.fatherDateofBirth);
  console.log("Mother's Age" + employee_onboarding.motherDateofBirth);

  // convert user input value into date object

  // get difference from current date;

  if (employee_onboarding.fatherDateofBirth) {
    var birthDate = new Date(employee_onboarding.fatherDateofBirth);
    console.log(" birthDate" + birthDate);
    var difference = Date.now() - birthDate.getTime();
    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    employee_onboarding.fatherAge = calculatedAge;
  } else if (employee_onboarding.motherDateofBirth) {
    var birthDate = new Date(employee_onboarding.motherDateofBirth);
    console.log(" birthDate" + birthDate);
    var difference = Date.now() - birthDate.getTime();
    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    employee_onboarding.motherAge = calculatedAge;
  }
};

const SaveEmployeeOnboardingData = () => {
  console.log("Saving onboarding form");
  employee_onboarding.can_onboard_employee = false;
  submit();
};

const SubmitEmployeeOnboardingData = () => {

   if(AadharDocBackInvalid.value && AadharDocFrontInvalid.value && PancardInvalid.value && EducationCertificateInvalid.value ){
    console.log("invalid");
   }else{
    employee_onboarding.can_onboard_employee = true;
  console.log(employee_onboarding);
  jsonFormat();
  console.log(AadharCardFront.fileName);
   }

};

// Generate data into JSON Format

const jsonFormat = () => {
  const data = JSON.stringify(
    employee_onboarding,
    AadharCardFront,
    AadharCardBack,
    PanCardDoc,
    DrivingLicenseDoc,
    EductionDoc,
    VoterIdDoc,
    ReleivingLetterDoc,
    PassportDoc
  );
  console.log(data);
};

//  File Upload Function Declaration

const file = ref();
const AadharCardFront = ref();
const AadharCardBack = ref();
const PanCardDoc = ref();
const PassportDoc = ref();
const VoterIdDoc = ref();
const DrivingLicenseDoc = ref();
const EductionDoc = ref();
const ReleivingLetterDoc = ref();

const AadharFront = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (AadharCardFront.file = e.target.files[0]),
      // Get file size
      (AadharCardFront.fileSize =
        Math.round((file.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (AadharCardFront.fileExtention = AadharCardFront.file.name
        .split(".")
        .pop()),
      // Get file name
      (AadharCardFront.fileName = AadharCardFront.file.name.split(".").shift()),
      // Check if file is an image
      (AadharCardFront.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        AadharCardFront.fileExtention
      ));
    // Print to console
    console.log(AadharCardFront);
  }
};
const AadharBack = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (AadharCardBack.file = e.target.files[0]),
      // Get file size
      (AadharCardBack.fileSize =
        Math.round((AadharCardBack.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (AadharCardBack.fileExtention = AadharCardBack.file.name
        .split(".")
        .pop()),
      // Get file name
      (AadharCardBack.fileName = AadharCardBack.file.name.split(".").shift()),
      // Check if file is an image
      (AadharCardBack.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        AadharCardBack.fileExtention
      ));
    // Print to console
    console.log(AadharCardBack);
  }
};
const PanCard = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (PanCardDoc.file = e.target.files[0]),
      // Get file size
      (PanCardDoc.fileSize =
        Math.round((PanCardDoc.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (PanCardDoc.fileExtention = PanCardDoc.file.name.split(".").pop()),
      // Get file name
      (PanCardDoc.fileName = PanCardDoc.file.name.split(".").shift()),
      // Check if file is an image
      (PanCardDoc.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        PanCardDoc.fileExtention
      ));
    // Print to console
    console.log(PanCardDoc);
  }
};
const Passport = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (PassportDoc.file = e.target.files[0]),
      // Get file size
      (PassportDoc.fileSize =
        Math.round((PassportDoc.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (PassportDoc.fileExtention = PassportDoc.file.name.split(".").pop()),
      // Get file name
      (PassportDoc.fileName = PassportDoc.file.name.split(".").shift()),
      // Check if file is an image
      (PassportDoc.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        PassportDoc.fileExtention
      ));
    // Print to console
    console.log(PassportDoc);
  }
};
const DrivingLisence = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (DrivingLicenseDoc.file = e.target.files[0]),
      // Get file size
      (DrivingLicenseDoc.fileSize =
        Math.round((DrivingLicenseDoc.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (DrivingLicenseDoc.fileExtention = DrivingLicenseDoc.file.name
        .split(".")
        .pop()),
      // Get file name
      (DrivingLicenseDoc.fileName = DrivingLicenseDoc.file.name
        .split(".")
        .shift()),
      // Check if file is an image
      (DrivingLicenseDoc.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        DrivingLicenseDoc.fileExtention
      ));
    // Print to console
    console.log(DrivingLicenseDoc);
  }
};
const VoterId = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (VoterIdDoc.file = e.target.files[0]),
      // Get file size
      (VoterIdDoc.fileSize =
        Math.round((VoterIdDoc.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (VoterIdDoc.fileExtention = VoterIdDoc.file.name.split(".").pop()),
      // Get file name
      (VoterIdDoc.fileName = VoterIdDoc.file.name.split(".").shift()),
      // Check if file is an image
      (VoterIdDoc.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        VoterIdDoc.fileExtention
      ));
    // Print to console
    console.log(VoterIdDoc);
  }
};
const EductionCertifacte = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (EductionDoc.file = e.target.files[0]),
      // Get file size
      (EductionDoc.fileSize =
        Math.round((EductionDoc.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (EductionDoc.fileExtention = EductionDoc.file.name.split(".").pop()),
      // Get file name
      (EductionDoc.fileName = EductionDoc.file.name.split(".").shift()),
      // Check if file is an image
      (EductionDoc.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        EductionDoc.fileExtention
      ));
    // Print to console
    console.log(EductionDoc);
  }
};
const ReleivingLetter = (e) => {
  // Check if file is selected
  if (e.target.files && e.target.files[0]) {
    // Get uploaded file
    (ReleivingLetterDoc.file = e.target.files[0]),
      // Get file size
      (ReleivingLetterDoc.fileSize =
        Math.round((ReleivingLetterDoc.size / 1024 / 1024) * 100) / 100),
      // Get file extension
      (ReleivingLetterDoc.fileExtention = ReleivingLetterDoc.file.name
        .split(".")
        .pop()),
      // Get file name
      (ReleivingLetterDoc.fileName = ReleivingLetterDoc.file.name
        .split(".")
        .shift()),
      // Check if file is an image
      (ReleivingLetterDoc.isImage = ["jpg", "jpeg", "png", "gif"].includes(
        ReleivingLetterDoc.fileExtention
      ));
    // Print to console
    console.log(ReleivingLetterDoc);
  }
};

// for Testing Post Data

const submit = () => {
  axios
    .post("/vmt-employee-onboard", {
      employee_onboarding,
      AadharCardFront,
      AadharCardBack,
      PanCardDoc,
      EductionDoc,
      DrivingLicenseDoc,
      VoterIdDoc,
      PassportDoc,
    })
    .then((res) => {
      //alert("sent");
      console.log("Ajax Response : " + res);
    })
    .catch((err) => {
      //alert("Ajax Response : not sent "+err);
      console.log("Ajax Response : not sent " + err);
    });
};

const Gender = ref([{ name: "Male", id:1 }, { name: "Female",id:2 }, { name: "Others",id:3 }]);
const MaritalStatus = ref([
  { name: "Married", value: 1 },
  { name: "UnMarried", value: 2 },
  { name: "Windowed", value: 3 },
  { name: "Seperated", value: 4 },
  { name: "Divorced", value: 5 },
]);
const Nationality = ref([{ name: "Indian",value:"1" }, { name: "Other Nationality",value:"2" }]);
const PhyChallenged = ref([{ name: "Yes",value:"1" }, { name: "No",value:"2" }]);
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

// Sample testong Data

const Sampledata = () => {
  employee_onboarding.EmployeeCode = ref("B090");
  employee_onboarding.EmployeeNameAsPerAadhar = ref("George David");
  employee_onboarding.AadhaarNumber = ref("3977 8798 6564");
  employee_onboarding.DateOfJoining = ref("23-4-2020");
  employee_onboarding.PanNumber = ref("BGAJP6646F");
  employee_onboarding.PersonDetialsBloodGroup = ref("B Positive");
  employee_onboarding.PersonDetialsDateofBirth = ref("23-07-2000");
  employee_onboarding.PersonDetialsEmail = ref("example@gmail.com");
  employee_onboarding.DLNumber = ref("HR-0619850034761");
  employee_onboarding.PassportNumber = ref("A2096457");
  employee_onboarding.PassportExpDate = ref("23-5-2030");
  employee_onboarding.BankName = ref("ANDHRA BANK");
  employee_onboarding.PhysicallyChallenged=ref("No")
  employee_onboarding.AccountNumber = ref("35216644292");
  employee_onboarding.BankIFSCCode = ref("SBIN0121325");
  employee_onboarding.ChooseNationality = ref("Indian");
  employee_onboarding.PersonDetialsGender = ref("Male");
  employee_onboarding.PersonDetialsMaritalStatus = ref("Married");
  employee_onboarding.PersonDetialsMobileNumber = ref("897898797");
  employee_onboarding.CurrentAddress1 = ref("45/21 2nd Avenue,chennai");
  employee_onboarding.CurrentAddress2 = ref("45/21 2nd Avenue,chennai");
  employee_onboarding.CurrentCountry = ref("India");
  employee_onboarding.CurrentState = ref("Tamil Nadu");
  employee_onboarding.CurrentCity = ref("chennai");
  employee_onboarding.CurrentPincode = ref("600023");
  employee_onboarding.PermanentAddress1 = ref("45/21 2nd Avenue,chennai");
  employee_onboarding.PermanentAddress2 = ref("45/21 2nd Avenue,chennai");
  employee_onboarding.Permanentcountry = ref("India");
  employee_onboarding.PermanentCity = ref("chennai");
  employee_onboarding.Permanentstate = ref("Tamil Nadu");
  employee_onboarding.PermanentPincode = ref("600003");
  employee_onboarding.Departmant = ref("IT");
  employee_onboarding.Process = ref("Iti");
  employee_onboarding.Designation = ref("Developer");
  employee_onboarding.CostCenter = ref("Chennai");
  employee_onboarding.probationPeriod = ref("11 Month");
  employee_onboarding.holidayLocation = ref("Tamilnadu");
  employee_onboarding.ReportingManagerCode = ref("PLIPL076-Muthu Selvan");
  employee_onboarding.WorkLocation = ref("chennai");
  employee_onboarding.OfficialEmail = ref("voidmax@gmail.com");
  employee_onboarding.OfficialMobileNO = ref("4646454547");
  employee_onboarding.EmployeeNoticePeriodDays = ref(3);
  employee_onboarding.DateOfConfirmation = ref("10-12-2019");
  employee_onboarding.fatherName = ref("David");
  employee_onboarding.fatherAge = ref("45");
  employee_onboarding.fatherDateofBirth = ref("23-09-1968");
  employee_onboarding.motherName = ref("Licas");
  employee_onboarding.motherDateofBirth = ref("23-8-1970");
  employee_onboarding.motherAge = ref("35");
  employee_onboarding.spouseGender = ref("female");
  employee_onboarding.SpouseDOB = ref("12-8-1995");
  employee_onboarding.SpouseName = ref("priyanka");
  employee_onboarding.noOfChildren = ref("5");
  employee_onboarding.EmployeeCode = ref("B101");
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
