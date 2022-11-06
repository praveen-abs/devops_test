{{-- @section('ui-onboarding') --}}
<?php //dd($allEmployeesUserCode->toArray()); ?>
<div class="container-fluid ">
    <div class="">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="">
                    <div id="msform">

                        <!-- progressbar -->
                        <!-- <ul id="progressbar">
                                <li class="active" id="account"><strong class="f-9 onboard-detail">Personal Details</strong></li>
                                <li id="personal"><strong class="f-9 onboard-detail">Location Details</strong></li>
                                <li id="payment"><strong class="f-9 onboard-detail">Official Details</strong></li>
                                <li id="confirm"><strong class="f-9 onboard-detail">Family Details</strong></li>
                                <li id="compensatory"><strong class="f-9 onboard-detail">Compensatory</strong></li>
                                <li id="end"><strong class="f-9 onboard-detail">Personal Documents</strong></li>
                            </ul> -->
                        <form id="form-1" enctype="multipart/form-data" class=" ">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user_id ?? '' }}" />
                            <input type="hidden" name="can_redirect" id="can_redirect" value="0" />
                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center ">
                                    <div class=" header-card-text">
                                        <h6>Personal Details</h6>
                                    </div>
                                    <div class="form-card">
                                        <div class="row mt-1">
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="employee_code">Employee Code{!! required() !!}</label> -->
                                                <div class="floating">

                                                    <label for="" class="float-label">Employee Code</label>
                                                    <input type="text" placeholder="Employee Code"
                                                        name="employee_code" id="employee_code"
                                                        class=" form-control textbox" value="{{ $empNo }}"
                                                        required @if (!empty($is_employeeCode_editable) && $is_employeeCode_editable == 'false') readonly @endif />
                                                    <span class="error" id="error_emp_code"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="employee_name">Employee Name as per Aadhar{!! required() !!}</label> -->

                                                <div class="floating">
                                                    <label for="" class="float-label">Employee Name as per
                                                        Aadhar <span class="text-danger">*</span></label>
                                                    @if (isset($employee_user->name))
                                                        <input type="text" placeholder="Employee Name as per Aadhar "
                                                            name="employee_name" id="employee_name"
                                                            value="{{ $employee_user->name }}"
                                                            class="onboard-form form-control textbox capitalize"
                                                            pattern="name" readonly autofocus />
                                                    @else
                                                        <input type="text" placeholder="Employee Name as per Aadhar "
                                                            name="employee_name" id="employee_name"
                                                            class=" form-control textbox capitalize" pattern="name"
                                                            required autofocus />
                                                    @endif
                                                    <label class="error star_error employee_name_label"
                                                        for="employee_name" style="display: none;"></label>
                                                    <!-- <label for="" class="float-label">Employee Name as per Aadhar</label> -->
                                                    <!--  <label class="error star_error employee_name_label" for="employee_name"
                                                        style="display: none;"></label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                @php
                                                $date = (date('Y')-18)."-".date('m')."-".date('d');
                                                @endphp
                                                <div class="floating">
                                                    <label for="" class="float-label">Date of Birth <span
                                                            class="text-danger">*</span></label>

                                                    {{-- <input type="text" placeholder="Date of Birth" name="" max="" class="form-control textbox" id="datepicker" required /> --}}
                                                    <input type="text" placeholder="Date of Birth"
                                                        name="dob" id="dob" onfocus="(this.type='date')" max="{{$date}}"
                                                        value="" class="onboard-form  form-control  " required />

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="marital_status">Marital Status{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Marital Status <span
                                                            class="text-danger">*</span></label>

                                                    <select placeholder="Marital Status" name="marital_status"
                                                        id="marital_status"
                                                        class="onboard-form form-control textbox select2_form_without_search "
                                                        required>
                                                        <option value="" hidden selected disabled>Marital
                                                            Status</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="doj">Date of Joining{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Date of Joining<span
                                                            class="text-danger">*</span></label>
                                                    @if (isset($employee_details->doj))
                                                        <input type="text" max="9999-12-31"
                                                            placeholder="Date of Joining" name="doj"
                                                            value="{{ isset($employee_details->doj) ? date('d-m-Y', strtotime($employee_details->doj)) : '' }}"
                                                            class="onboard-form  form-control textbox " required
                                                            readonly />
                                                    @else
                                                        <input type="text" max="9999-12-31"
                                                            placeholder="Date of Joining" name="doj"
                                                            class="onboard-form  form-control textbox "
                                                            onfocus="(this.type='date')" required />
                                                    @endif
                                                    <!-- <label for="" class="float-label">Date of Joining</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="gender">Gender{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Gender<span
                                                            class="text-danger">*</span></label>

                                                    <select placeholder="Choose Gender" name="gender" id="gender"
                                                        class="onboard-form form-control textbox select2_form_without_search "
                                                        required>
                                                        <option value="" hidden disabled>Choose Gender
                                                        </option>
                                                    </select>
                                                    <!-- <label for="" class="float-label">Gender</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="mobile_no">Mobile Number{!! required() !!}</label> -->
                                                <div class="floating">

                                                    <label for="" class="float-label">Mobile Number<span
                                                            class="text-danger">*</span></label>
                                                    @if (isset($employee_details->mobile_number))
                                                        <input type="number" placeholder="Mobile Number"
                                                            name="mobile_no" minlength="10"
                                                            value="{{ $employee_details->mobile_number ? $employee_details->mobile_number : '' }}"
                                                            maxlength="10" class="onboard-form form-control textbox "
                                                            required readonly />
                                                    @else
                                                        <input type="text" placeholder="Mobile Number"
                                                            name="mobile_no" id="mobile_no" minlength="10"
                                                            value="" maxlength="10"
                                                            oninput="numberOnly(this.id);"
                                                            class="onboard-form form-control textbox " required />
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="email">Email ID{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Email<span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" pattern="email" placeholder="Email ID"
                                                        name="email" id="email"
                                                        value="{{ !empty($employee_user) && $employee_user->email ? $employee_user->email : '' }}"
                                                        class="  form-control textbox "
                                                        onkeypress="return event.charCode != 32"
                                                        @if (!empty($employee_user) && $employee_user->email) readonly @endif required />
                                                    <!-- <label for="" class="float-label">Email</label> -->

                                                </div>
                                                <span class="error" id="error_email"></span>

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="aadhar">Aadhaar Number<span id="aadhar_req">{!! required() !!}</span></label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Aadhaar Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" oninput="numberOnly(this.id);"
                                                        placeholder="Aadhaar Number" name="aadhar" id="vmt_aadhar"
                                                        value="{{ !empty($employee_details) && $employee_details->aadhar_number ? $employee_details->aadhar_number : '' }}"
                                                        pattern="aadhar" class="onboard-form form-control textbox "
                                                        minlength="12" maxlength="12" required />
                                                    {{-- <label class="error star_error aadhar_label" for="aadhar"
                                                        style="display: none;"></label> --}}
                                                    <!-- <label for="" class="float-label">Aadhaar Number</label> -->
                                                </div>
                                                <span class="error" id="error_vmt_aadhar"></span>

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 co l-lg-3 col-xl-3 mb-2">

                                                <!-- <label class="" for="pan_no">Pan Card Number<span id="pan_no_req">{!! required() !!}</span></label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Pan Number / Pan
                                                        Acknowlegement<span class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Pan Card Number"
                                                        name="pan_no" id="pan_num"
                                                        value="{{ !empty($employee_details) && $employee_details->pan_number ? $employee_details->pan_number : '' }}"
                                                        class=" form-control textbox  pan" pattern="pan"
                                                        minlength="10" maxlength="10" required />
                                                    <label class="error star_error pan_no_label" id="pan_no_label"
                                                        for="pan_no" style="display: none;"></label>

                                                    <span class="error" id="error_pan_no"></span>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2"> -->
                                            <!-- <label class="" for="pan_ack">Pan Acknowlegement<span id="pan_ack_req">{!! required() !!}</span></label> -->
                                            <!-- <div class="floating">
                                                    <input type="text" placeholder="Pan Acknowlegement" name="pan_ack" pattern="alp-num" minlength="15" maxlength="15" id="pan_ack" class="onboard-form textbox  form-control not-required validate " />
                                                    <label for="" class="float-label">Pan Acknowlegement</label>
                                                </div> -->
                                            <!-- <div class="floating">
                                                    <label for="" class="float-label">Pan Acknowlegement</label>
                                                    <input type="text" placeholder="Pan Acknowlegement " name="pan_ack" id="pan_ack" pattern="alp-num" minlength="15" maxlength="15" class="onboard-form form-control textbox " pattern="name" not-required />
                                                    <label class="error star_error employee_name_label" for="employee_name" style="display: none;"></label>


                                                </div> -->
                                            <!-- </div> -->
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="444">DL Number</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">DL Number</label>
                                                    <input type="text" placeholder="DL Number" name="dl_no"
                                                        id="dl_no"
                                                        value="{{ !empty($employee_details) && $employee_details->dl_no ? $employee_details->dl_no : '' }}"
                                                        minlength="16" maxlength="16"
                                                        class="onboard-form form-control textbox "
                                                        style='text-transform:uppercase' />
                                                    <label class="error star_error dl_no_label" for="dl_no"
                                                        style="display: none;"></label>

                                                    <span class="error" id="error_dl_no"></span>
                                                </div>
                                                <!-- <div class="floating">
                                                    <input type="text" placeholder="DL Number" name="dl_no" id="dl_no" minlength="15" maxlength="15"  class="onboard-form form-control textbox" pattern="dl"  required />
                                                    <label class="error star_error employee_name_label" for="employee_name" style="display: none;"></label>
                                                    <label for="" class="float-label">DL Number</label>

                                                </div> -->

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="nationality">Nationality{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Choose
                                                        nationality<span class="text-danger">*</span></label>
                                                    <?php
                                                    $value = '';

                                                    if (!empty($employee_details) && $employee_details->nationality) {
                                                        $value = $employee_details->nationality;
                                                    }
                                                    ?>
                                                    <select placeholder="Choose nationality" name="nationality"
                                                        id="nationality"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden disabled>Choose nationality
                                                        </option>

                                                        <option value="indian">Indian</option>

                                                        <option value="other_country">Other Nationality</option>

                                                        <!-- <option value="indian"        @if ($value == 'indian') selected @endif >Indian</option>
                                                        <option value="other_country" @if ($value == 'other_country') selected @endif >Other Nationality</option> -->
                                                    </select>
                                                    <!-- <label for="" class="float-label">Choose nationality</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Passport Number<span
                                                            class="text-danger"
                                                            id="asterisk_passport_no"></span></label>
                                                    <input type="text" placeholder="Passport Number"
                                                        name="passport_no" id="passport_no"
                                                        value="{{ !empty($employee_details) && $employee_details->passport_number ? $employee_details->passport_number : '' }}"
                                                        minlength="8" maxlength="8" class="form-control textbox"
                                                        style='text-transform:uppercase' />
                                                    <span class="" id="error_passport_no"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">

                                                <div class="floating">
                                                    <label for="" class="float-label">Passport Exp
                                                        Date<span class="text-danger"
                                                            id="asterisk_passport_expdate"></span></label>
                                                    <input type="text" max="9999-12-31"
                                                        placeholder="Passport Exp Date" name="passport_date"
                                                        id="passport_date" class="onboard-form  form-control textbox "
                                                        id="passdate" onfocus="(this.type='date')" />
                                                        <span class="" id="error_passport_date"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="blood_group">Blood Group</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Blood Group</label>
                                                    <?php
                                                    $value = '';

                                                    if (!empty($employee_details) && $employee_details->blood_group_id) {
                                                        $value = $employee_details->blood_group_id;
                                                    }
                                                    ?>

                                                    <select placeholder="Blood Group" name="blood_group"
                                                        id="blood_group"
                                                        class="onboard-form form-control textbox   select2_form_without_search">
                                                        <option value="" hidden selected disabled>Select
                                                            Blood Group</option>
                                                        @foreach ($blood_group as $b)
                                                            <option value="{{ $b->id }}"
                                                                @if ($value == $b->id) selected @endif>
                                                                {{ $b->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <label for="" class="float-label">Blood Group</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="physically_challenged">Physically Challenged</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Physically
                                                        Challenged</label>
                                                    <?php
                                                    $value = '';

                                                    if (!empty($employee_details) && $employee_details->physically_challenged) {
                                                        $value = $employee_details->physically_challenged;
                                                    }
                                                    ?>
                                                    <select placeholder="Physically Challenged"
                                                        name="physically_challenged"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required id="physically_challenged">
                                                        {{-- <option value="" hidden selected disabled>Physically
                                                            Challenged</option>
                                                        <option value="yes"
                                                            @if ($value == 'yes') selected @endif>Yes
                                                        </option>
                                                        <option value="no"
                                                            @if ($value == 'no') selected @endif>No
                                                        </option> --}}
                                                    </select>
                                                    <!-- <label for="" class="float-label">Physically Challenged</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">

                                                <!-- <label class="" for="bank_name">Bank Name</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Bank Name<span
                                                            class="text-danger">*</span></label>
                                                    <select placeholder="Bank Name" name="bank_name" id="bank_names"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>Select Bank
                                                            Name</option>
                                                        @foreach ($bank as $b)
                                                            <option value="{{ $b->id }}"
                                                                min-data="{{ $b->min_length }}"
                                                                max-data="{{ $b->max_length }}">{{ $b->bank_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <label for="" class="float-label">Bank Name</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <!-- <label class="" for="account_no">Account Number</label> -->
                                                    <label for="" class="float-label">Account Number<span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" placeholder="Account Number"
                                                        name="account_no" id="account_no"
                                                        class="onboard-form form-control textbox"
                                                        value="{{ !empty($employee_details) && $employee_details->bank_account_number ? $employee_details->bank_account_number : '' }}"
                                                        oninput="numberOnly(this.id);" minlength="10" maxlength="18"
                                                        required />

                                                    <label class="error star_error account_no_label" for="account_no"
                                                        style="display: none;"></label>
                                                    <!-- <label for="" class="float-label">Account Number</label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="bank_ifsc">Bank IFSC Code</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Bank IFSC Code<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Bank IFSC Code"
                                                        name="bank_ifsc" id="bank_ifsc" pattern="ifsc"
                                                        value="{{ !empty($employee_details) && $employee_details->bank_ifsc_code ? $employee_details->bank_ifsc_code : '' }}"
                                                        class=" form-control textbox " required />
                                                    <label class="error star_error bank_ifsc_label" for="bank_ifsc"
                                                        style="display: none;"></label>
                                                    <!-- <label for="" class="float-label">Bank IFSC Code</label> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center">
                                    <div class="form-card">
                                        <div class=" header-card-text">
                                            <h6>Statutory Details</h6>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">PF
                                                        Applicable</label>
                                                    <select placeholder="PF Applicable" name="pf_applicable"
                                                        id="pf_applicable"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>PF
                                                            Applicable</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">EPF Number</label>
                                                    <input type="text" placeholder="EPF Number" name="epf_number"
                                                        id="epf_number" class="onboard-form form-control textbox "
                                                        value="{{ !empty($emp_statutory_details) && $emp_statutory_details->epf_number ? $emp_statutory_details->epf_number : '' }}" />

                                                    <span class="error" id="error_epf_number"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">

                                                <div class="floating">
                                                    <label for="" class="float-label">UAN Number</label>
                                                    <input type="text" placeholder="UAN Number" name="uan_number"
                                                        id="uan_number" minlength="12" maxlength="12"
                                                        class="onboard-form form-control textbox "
                                                        value="{{ !empty($emp_statutory_details) && $emp_statutory_details->uan_number ? $emp_statutory_details->uan_number : '' }}" />

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">ESIC
                                                        Applicable</label>
                                                    <?php
                                                    $value = '';

                                                    if (!empty($emp_statutory_details) && $emp_statutory_details->esic_applicable) {
                                                        $value = $emp_statutory_details->esic_applicable;
                                                    }

                                                    ?>
                                                    <select placeholder="ESIC Applicable" name="esic_applicable"
                                                        id="esic_applicable"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>ESIC
                                                            Applicable</option>
                                                        <option value="yes"
                                                            @if ($value == 'yes') selected @endif>Yes
                                                        </option>
                                                        <option value="no"
                                                            @if ($value == 'no') selected @endif>No
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">ESIC Number</label>

                                                    <input type="text" placeholder="ESIC Number"
                                                        name="esic_number" id="esic_number" minlength="10"
                                                        maxlength="10" class="onboard-form form-control textbox "
                                                        value="{{ !empty($emp_statutory_details) && $emp_statutory_details->esic_number ? $emp_statutory_details->esic_number : '' }}" />
                                                    <span class="error" id="error_esic_number"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Ptax
                                                        Location</label>

                                                    <select placeholder="Ptax Location" name="ptax_location"
                                                        id="ptax_location"
                                                        class="onboard-form form-control textbox  select2_form_without_search">
                                                        <option value="" hidden selected disabled>Ptax
                                                            Location</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">TAX Regime</label>

                                                    <select placeholder="TAX Regime" name="tax_regime"
                                                        id="tax_regime"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>TAX Regime
                                                        </option>
                                                        <option value="old">Old</option>
                                                        <option value="new">New</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">LWF Location</label>
                                                    <select placeholder="LWF Location" name="lwf_location"
                                                        id="lwf_location"
                                                        class="onboard-form form-control textbox  select2_form_without_search">
                                                        <option value="" hidden selected disabled>LWF
                                                            Location</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- address details -->

                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center">
                                    <div class="form-card">
                                        <div class=" header-card-text">
                                            <h6>Current Address</h6>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2">
                                                <!-- <label class="" for="current_address">Current Address{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Address 1<span
                                                            class="text-danger">*</span></label>

                                                    <textarea placeholder="Current Address" name="current_address_line_1" id="current_address_line_1"
                                                        class=" form-control textbox capitalize" required id="" cols="" rows="1">{{ !empty($employee_details) && $employee_details->current_address_line_1 ? $employee_details->current_address_line_1 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2">
                                                <!-- <label class="" for="current_address">Current Address{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Address 2</label>

                                                    <textarea placeholder="Current Address" name="current_address_line_2" id="current_address_line_2"
                                                        class="form-control textbox capitalize" required id="" cols="" rows="1">{{ !empty($employee_details) && $employee_details->current_address_line_2 ? $employee_details->current_address_line_2 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <input type="text" placeholder="" name="curent_district" class="onboard-form form-control textbox " required /> -->
                                                <!-- <label class="" for="curent_district">Country{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Country<span
                                                            class="text-danger">*</span></label>

                                                    <select placeholder="Country" name="current_country"
                                                        id="current_country"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>Select
                                                            Country</option>
                                                        @foreach ($countries as $data)
                                                            <option value="{{ $data->id }}"
                                                                @if (!empty($employee_details) && $employee_details->current_country_id == $data->id) selected @endif>
                                                                {{ $data->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="current_state">Current State{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">State<span
                                                            class="text-danger">*</span></label>
                                                    <select placeholder="State" name="current_state"
                                                        id="current_state"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>Select
                                                            State</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="current_city">Current City{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label"> City<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" placeholder="City" name="current_city"
                                                        id="current_city"
                                                        class="onboard-form form-control textbox  capitalize"
                                                        value="{{ !empty($employee_details) && $employee_details->current_city ? $employee_details->current_city : '' }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="current_pincode">Current Pincode{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Pincode<span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" minlength="6" maxlength="6"
                                                        oninput="numberOnly(this.id);" placeholder="Pincode"
                                                        name="current_pincode" id="current_pincode"
                                                        class="onboard-form form-control textbox "
                                                        value="{{ !empty($employee_details) && $employee_details->current_pincode ? $employee_details->current_pincode : '' }}"
                                                        required />
                                                </div>
                                            </div>


                                        </div>
                                        {{-- copy address --}}
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 my-3">

                                                <input type="checkbox" placeholder="" name="current_address_copy"
                                                    id="current_address_copy" style="width:auto;" />
                                                <label for="current_address_copy">Copy current address to the
                                                    permanent address</label>


                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 ">
                                                <h6>Permanent Address</h6>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2">
                                                <!-- <label class="" for="permanent_address">Permanent Address{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label"> Address 1 <span
                                                            class="text-danger">*</span></label>
                                                    <textarea placeholder="Permanent Address" name="permanent_address_line_1" id="permanent_address_line_1"
                                                        class="form-control textbox capitalize" required cols="5" rows="1">{{ !empty($employee_details) && $employee_details->permanent_address_line_1 ? $employee_details->permanent_address_line_1 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6 mb-2">
                                                <!-- <label class="" for="permanent_address">Permanent Address{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label"> Address 2</label>
                                                    <textarea placeholder="Permanent Address" name="permanent_address_line_2" id="permanent_address_line_2"
                                                        class="form-control textbox capitalize" required cols="5" rows="1">{{ !empty($employee_details) && $employee_details->permanent_address_line_2 ? $employee_details->permanent_address_line_2 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2">
                                                <!-- <input type="text" placeholder="" name="permanent_district" class="onboard-form form-control textbox " required /> -->
                                                <!-- <label class="" for="permanent_district">Permanent Country{!! required() !!}</label> -->

                                                <div class="floating">
                                                    <label for="" class="float-label">Country <span
                                                            class="text-danger">*</span></label>

                                                    <select placeholder="Permanent Country" name="permanent_country"
                                                        id="permanent_country"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>Select
                                                            Country</option>
                                                        @foreach ($countries as $data)
                                                            <option value="{{ $data->id }}"
                                                                @if (!empty($employee_details) && $employee_details->permanent_country_id == $data->id) selected @endif>
                                                                {{ $data->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="permanent_state">Permanent State{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label"> State<span
                                                            class="text-danger">*</span></label>

                                                    <select placeholder="Permanent State" name="permanent_state"
                                                        id="permanent_state"
                                                        class="onboard-form form-control textbox  select2_form_without_search"
                                                        required>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3  col-xxl-3 mb-2">
                                                <!-- <label class="" for="permanent_city">Permanent City{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label"> City<span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" placeholder=" City" name="permanent_city"
                                                        id="permanent_city"
                                                        class="onboard-form form-control textbox capitalize"
                                                        value="{{ !empty($employee_details) && $employee_details->permanent_city ? $employee_details->permanent_city : '' }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="permanent_pincode">Permanent Pincode{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label"> Pincode <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" placeholder=" Pincode"
                                                        name="permanent_pincode" id="permanent_pincode"
                                                        oninput="numberOnly(this.id);" minlength="6" maxlength="6"
                                                        class="onboard-form form-control textbox "
                                                        value="{{ !empty($employee_details) && $employee_details->permanent_pincode ? $employee_details->permanent_pincode : '' }}"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center ">
                                    <div class="header-card-text">
                                        <h6 class="">Official Details</h6>
                                    </div>
                                    <div class="form-card">
                                        <div class="row mt-1">
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2">
                                                <!-- <label class="" for="department">Department{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Department</label>

                                                    <select placeholder="Department" name="department"
                                                        id="department" class="onboard-form form-control textbox">
                                                        <option value="" hidden selected disabled>Select
                                                            Department</option>
                                                        @foreach ($department as $e)
                                                            <option value="{{ $e->id }}">
                                                                {{ $e->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2">
                                                <!-- <label class="" for="process">Process{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Process</label>
                                                    <input type="text" placeholder="Process" name="process"
                                                        class="onboard-form form-control" pattern="name" required
                                                        value="{{ !empty($emp_office_details) && $emp_office_details->process ? $emp_office_details->process : '' }}" />

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3 mb-2">
                                                <!-- <label class="" for="designation">Designation{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Designation<span
                                                            class="text-danger">*</span> </label>

                                                    <input type="text" placeholder="Designation"
                                                        name="designation" class=" form-control textbox "
                                                        pattern="alpha" required
                                                        value="{{ !empty($emp_office_details) && $emp_office_details->designation ? $emp_office_details->designation : '' }}" />
                                                    <label class="error star_error designation_label"
                                                        for="designation" style="display: none;"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="cost_center">Cost Center{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Cost Center</label>

                                                    <input type="number" placeholder="Cost Center"
                                                        name="cost_center" class="onboard-form form-control textbox "
                                                        value="{{ !empty($emp_office_details) && $emp_office_details->cost_center ? $emp_office_details->cost_center : '' }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="confirmation_period">Probabition Period{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Probation
                                                        Period</label>

                                                    <select placeholder="Probation Period" name="probation_period"
                                                        id="probation_period"
                                                        class="onboard-form form-control textbox  not-required validate select2_form_without_search">
                                                        <option value="" hidden selected disabled>Select
                                                            Probabition Period</option>
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
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2 col-xl-3">
                                                <!-- <label class="" for="work_location">Work Location{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Work Location<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Work Location"
                                                        name="work_location"
                                                        class="onboard-form form-control textbox capitalize"
                                                        pattern="alpha" required
                                                        value="{{ !empty($emp_office_details) && $emp_office_details->work_location ? $emp_office_details->work_location : '' }}" />
                                                    <label class="error star_error work_location_label"
                                                        for="work_location" style="display: none;"></label>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2 col-xxl-3">
                                                <!-- <label class="" for="l1_manager_code">Reporting Manager Employee Code{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Reporting Manager
                                                        Code<span class="text-danger">*</span></label>

                                                    @if (!empty($emp_office_details->l1_manager_code))
                                                        <input type="text"
                                                            value="{{ $emp_office_details->l1_manager_code }}"
                                                            name="l1_manager_code" id="l1_manager_code"
                                                            class="form-control textbox " pattern="" readonly
                                                            value="{{ !empty($emp_office_details) && $emp_office_details->l1_manager_code ? $emp_office_details->l1_manager_code : '---' }}" />
                                                    @else
                                                        <select placeholder="Reporting Manager" name="l1_manager_code"
                                                            id="l1_manager_code_select"
                                                            class="onboard-form form-control  textbox ">
                                                            <option value="" hidden selected disabled>Select
                                                            </option>
                                                            @foreach ($allEmployeesUserCode as $e)
                                                                <option value="{{ $e->user_code }}">
                                                                    {{ $e->user_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2 col-xxl-3">

                                                <div class="floating">
                                                    <label for="" class="float-label">Reporting Manager
                                                        Name</label>
                                                    {{-- <input type="text" placeholder="Reporting Manager Name" name="l1_manager_name" id="l1_manager_name" class="textbox  onboard-form form-control " pattern="name" value="{{(isset($assigned_l1_manager_name)) ? $assigned_l1_manager_name :''}}" readonly /> --}}
                                                    <input type="text" placeholder="Reporting Manager Name"
                                                        name="l1_manager_name" id="l1_manager_name"
                                                        class="textbox  onboard-form form-control " pattern="name"
                                                        value="{{ !empty($assigned_l1_manager_name) ? $assigned_l1_manager_name : '' }}"
                                                        readonly />
                                                    <label class="error star_error l1_manager_name_label"
                                                        for="l1_manager_name" style="display: none;"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Holiday
                                                        Location</label>
                                                    <select placeholder="Holiday Location" name="holiday_location"
                                                        id="holiday_location"
                                                        class="textbox  onboard-form form-control  select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>Holiday
                                                            Location</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="officical_mail">Official E-Mail Id{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Official Email
                                                    </label>
                                                    <input type="email" placeholder="Official E-Mail Id"
                                                        name="officical_mail" class="textbox form-control "
                                                        pattern="email" onkeypress="return event.charCode != 32"
                                                        value="{{ !empty($emp_office_details) && $emp_office_details->officical_mail ? $emp_office_details->officical_mail : '' }}" />
                                                    <!--  <label class="error star_error officical_mail_label" for="officical_mail" style="display: none;"></label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="official_mobile">Official Mobile{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Official
                                                        Mobile</label>
                                                    <input type="text" minlength="10" maxlength="10"
                                                        placeholder="Official Mobile" name="official_mobile"
                                                        id="official_mobile" oninput="numberOnly(this.id);"
                                                        class="textbox  onboard-form form-control "
                                                        value="{{ !empty($emp_office_details) && $emp_office_details->official_mobile ? $emp_office_details->official_mobile : '' }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="emp_notice">Employee Notice Period Days{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Employee Notice
                                                        Period Days</label>
                                                    <input type="number" placeholder="Employee Notice Period Days"
                                                        name="emp_notice"
                                                        class="onboard-form form-control textbox "value="{{ !empty($emp_office_details) && $emp_office_details->emp_notice ? $emp_office_details->emp_notice : '' }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Date of
                                                        confirmation<span class="text-danger">*</span></label>
                                                    <input type="text" max="9999-12-31"
                                                        placeholder="Date of confirmation" name="confirmation_period"
                                                        id="confirmation_period"
                                                        class="onboard-form form-control textbox "
                                                        onfocus="(this.type='date')" required value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center ">
                                    <div class="header-card-text">
                                        <h6 class="mb-0">Family Details</h6>
                                    </div>
                                    <div class="form-card">
                                        <div class="row mt-1">
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="father_name">Father Name{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Father Name <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" placeholder="Father Name"
                                                        name="father_name" id="father_name" pattern="name"
                                                        class="onboard-form form-control textbox capitalize" required
                                                        value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Date of Birth <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" max="9999-12-31"
                                                        placeholder="Date of Birth" name="dob_father" id="dob_father"
                                                        class="onboard-form form-control textbox  "
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Gender</label>
                                                    <input type="text" class="form-control" name="father_gender"
                                                        id="father_gender" value="Male" readonly
                                                        value="{{ !empty($employee_details) && $employee_details->father_gender ? $employee_details->father_gender : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="father_name">Father Name{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Age </label>

                                                    <input type="number" placeholder="Age" name="father_age"
                                                        id="father_age" class="textbox  onboard-form form-control "
                                                        minlength="2" maxlength="3" readonly
                                                        value="{{ !empty($employee_details) && $employee_details->father_age ? $employee_details->father_age : '' }}" />
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="mother_name">Mother Name{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Mother Name <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" placeholder="Mother Name"
                                                        name="mother_name" id="mother_name" pattern="name"
                                                        class="textbox  onboard-form form-control capitalize" required
                                                        value="{{ !empty($employee_details) && $employee_details->mother_name ? $employee_details->mother_name : '' }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Date of Birth <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" max="9999-12-31"
                                                        placeholder="Date of Birth" name="dob_mother"
                                                        id="dob_mother" class="textbox  onboard-form form-control "
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <div class="floating">
                                                    <label for="" class="float-label">Gender</label>

                                                    <!-- <select placeholder="Gender" name="mother_gender" id="mother_gender" class="textbox  onboard-form form-control   select2_form_without_search" required>
                                                        <option value="" hidden selected disabled>Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select> -->
                                                    <input type="text" class="form-control"
                                                        name="mother_gender" id="" value="Female"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="father_name">Father Name{!! required() !!}</label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Age</label>

                                                    <input type="number" placeholder="Age" name="mother_age"
                                                        id="mother_age" class="textbox  onboard-form form-control "
                                                        minlength="2" maxlength="3" readonly
                                                        value="{{ !empty($employee_details) && $employee_details->mother_age ? $employee_details->mother_age : '' }}" />
                                                </div>
                                            </div>



                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="spouse_name">Spouse Name<span id="spouse_name_req">{!! required() !!}</span></label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Spouse Name <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" placeholder="Spouse Name"
                                                        name="spouse_name" id="spouse_name" pattern="name"
                                                        class="textbox  onboard-form form-control  spouse_data capitalize"
                                                        required
                                                        value="{{ !empty($employee_details) && $employee_details->spouse_name ? $employee_details->spouse_name : '' }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="dow">Date of Wedding<span id="dow_req">{!! required() !!}</span></label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Date of Wedding
                                                        <span class="text-danger">*</span></label>

                                                    <input type="text" max="9999-12-31"
                                                        placeholder="Date of Wedding" name="wedding_date"
                                                        id="wedding_date"
                                                        class="textbox  onboard-form form-control  spouse_data"
                                                        onfocus="(this.type='date')" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="spouse_gender">Spouse Gender<span id="spouse_gender_req">{!! required() !!}</span></label> -->

                                                <div class="floating">
                                                    <label for="" class="float-label">Gender <span
                                                            class="text-danger">*</span></label>

                                                    <select placeholder="Spouse Gender" name="spouse_gender"
                                                        id="spouse_gender"
                                                        class="textbox  onboard-form form-control  spouse_data select2_form_without_search"
                                                        required>
                                                        <option value="" hidden selected disabled>Select
                                                            Spouse Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="spouse_dob">Spouse DOB<span id="spouse_dob_req">{!! required() !!}</span></label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Spouse DOB <span
                                                            class="text-danger">*</span></label>

                                                    <input type="text" max="9999-12-31"
                                                        placeholder="Spouse DOB" name="dob_spouse" id="dob_spouse"
                                                        class="textbox  onboard-form form-control  spouse_data"
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="no_child">Number of Children<span id="no_child_req">{!! required() !!}</span></label> -->
                                                <div class="floating">
                                                    <label for="" class="float-label">Number of
                                                        Children</label>

                                                    <select placeholder="Number of Children" name="no_of_children"
                                                        id="no_of_children"
                                                        class="textbox onboard-form form-control  spouse_data select2_form_without_search">
                                                        <option value="" hidden selected disabled>Select
                                                            Number of Children</option>
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
                            <div class="card shadow  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center">
                                    <div class="header-card-text">
                                        <h6>Compensatory</h6>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="basic">Basic Salary{!! required() !!}</label> -->

                                                @if (isset($compensatory->basic))
                                                    <div class="floating">

                                                        <label for="" class="float-label">Basic
                                                            Salary</label>
                                                        <input type="number" placeholder="Basic Salary"
                                                            name="basic"
                                                            value="{{ $compensatory->basic ? $compensatory->basic : '0' }}"
                                                            class="textbox   onboard-form form-control  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Basic
                                                            Salary</label>
                                                        <input type="number" placeholder="Basic Salary"
                                                            name="basic"
                                                            class="onboard-form form-control textbox  calculation_data gross_data  "
                                                            step="0.01" required />
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="hra">HRA{!! required() !!}</label> -->

                                                @if (isset($compensatory->hra))
                                                    <div class="floating">
                                                        <label for="" class="float-label">HRA</label>

                                                        <input type="number" placeholder="HRA" name="hra"
                                                            value="{{ $compensatory->hra ? $compensatory->hra : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data gross_data "
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">HRA</label>
                                                        <input type="number" placeholder="HRA" name="hra"
                                                            class="textbox  onboard-form form-control textbox    calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="Statutory_bonus">Statutory Bonus{!! required() !!}</label> -->

                                                @if (isset($compensatory->Statutory_bonus))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Statutory
                                                            Bonus</label>
                                                        <input type="number" placeholder="Statutory Bonus"
                                                            name="statutory_bonus"
                                                            value="{{ $compensatory->Statutory_bonus ? $compensatory->Statutory_bonus : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Statutory
                                                            Bonus</label>
                                                        <input type="number" placeholder="Statutory Bonus"
                                                            name="statutory_bonus"
                                                            class="textbox onboard-form form-control  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="child_education_allowance">Child Education Allowance{!! required() !!}</label> -->

                                                @if (isset($compensatory->child_education_allowance))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Child
                                                            Education Allowance</label>
                                                        <input type="number"
                                                            placeholder="Child Education Allowance"
                                                            name="child_education_allowance"
                                                            value="{{ $compensatory->child_education_allowance ? $compensatory->child_education_allowance : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Child
                                                            Education Allowance</label>
                                                        <input type="number"
                                                            placeholder="Child Education Allowance"
                                                            name="child_education_allowance"
                                                            class="onboard-form form-control  calculation_data textbox  gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="food_coupon">Food Coupon{!! required() !!}</label> -->

                                                @if (isset($compensatory->food_coupon))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Food
                                                            Coupon</label>
                                                        <input type="number" placeholder="Food Coupon"
                                                            name="food_coupon"
                                                            value="{{ $compensatory->food_coupon ? $compensatory->food_coupon : '0' }}"
                                                            class="onboard-form form-control textbox  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Food
                                                            Coupon</label>
                                                        <input type="number" placeholder="Food Coupon"
                                                            name="food_coupon"
                                                            class="textbox  onboard-form form-control  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="lta">LTA{!! required() !!}</label> -->

                                                @if (isset($compensatory->lta))
                                                    <div class="floating">
                                                        <label for="" class="float-label">LTA</label>
                                                        <input type="number" placeholder="LTA" name="lta"
                                                            value="{{ $compensatory->lta ? $compensatory->lta : '0' }}"
                                                            class="textbox onboard-form form-control     calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">LTA</label>
                                                        <input type="number" placeholder="LTA" name="lta"
                                                            class="onboard-form form-control textbox   calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="special_allowance">Special Allowance{!! required() !!}</label> -->

                                                @if (isset($compensatory->special_allowance))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Special
                                                            Allowance</label>
                                                        <input type="number" placeholder="Special Allowance"
                                                            name="special_allowance"
                                                            value="{{ $compensatory->special_allowance ? $compensatory->special_allowance : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Special
                                                            Allowance</label>
                                                        <input type="number" placeholder="Special Allowance"
                                                            name="special_allowance"
                                                            class="textbox  onboard-form form-control  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="other_allowance">Other Allowance{!! required() !!}</label> -->

                                                @if (isset($compensatory->other_allowance))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Other
                                                            Allowance</label>

                                                        <input type="number" placeholder="Other Allowance"
                                                            name="other_allowance"
                                                            value="{{ $compensatory->other_allowance ? $compensatory->other_allowance : '0' }}"
                                                            class="textbox  onboard-form form-control  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Other
                                                            Allowance</label>
                                                        <input type="number" placeholder="Other Allowance"
                                                            name="other_allowance"
                                                            class="textbox  onboard-form form-control  calculation_data gross_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="gross">Gross Salary{!! required() !!}</label> -->

                                                @if (isset($compensatory->gross))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Gross
                                                            Salary</label>

                                                        <input type="number" placeholder="Gross Salary"
                                                            name="gross"
                                                            value="{{ $compensatory->gross ? $compensatory->gross : '0' }}"
                                                            class="textbox  onboard-form form-control "
                                                            step="0.01" required readonly />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Gross
                                                            Salary</label>

                                                        <input type="number" placeholder="Gross Salary"
                                                            name="gross" id="gross"
                                                            class="textbox  onboard-form form-control "
                                                            step="0.01" required readOnly />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="epf_employer_contribution">EPF employer contribution{!! required() !!}</label> -->

                                                @if (isset($compensatory->epf_employer_contribution))
                                                    <div class="floating">
                                                        <label for="" class="float-label">EPF employer
                                                            contribution</label>

                                                        <input type="number"
                                                            placeholder="EPF employer contribution"
                                                            name="epf_employer_contribution"
                                                            value="{{ $compensatory->epf_employer_contribution ? $compensatory->epf_employer_contribution : '0' }}"
                                                            class="textbox   onboard-form form-control  calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">EPF employer
                                                            contribution</label>
                                                        <input type="number"
                                                            placeholder="EPF employer contribution"
                                                            name="epf_employer_contribution"
                                                            class="onboard-form form-control  calculation_data cic_data textbox "
                                                            step="0.01" />
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="esic_employer_contribution">ESIC employer contribution{!! required() !!}</label> -->

                                                @if (isset($compensatory->esic_employer_contribution))
                                                    <div class="floating">
                                                        <label for="" class="float-label">ESIC employer
                                                            contribution</label>
                                                        <input type="number"
                                                            placeholder="ESIC employer contribution"
                                                            name="esic_employer_contribution"
                                                            value="{{ $compensatory->esic_employer_contribution ? $compensatory->esic_employer_contribution : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">ESIC employer
                                                            contribution</label>
                                                        <input type="number"
                                                            placeholder="ESIC employer contribution"
                                                            name="esic_employer_contribution"
                                                            class="onboard-form form-control textbox  calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="insurance">Insurance{!! required() !!}</label> -->

                                                @if (isset($compensatory->insurance))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Insurance</label>
                                                        <input type="number" placeholder="Insurance"
                                                            name="insurance"
                                                            value="{{ $compensatory->insurance ? $compensatory->insurance : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Insurance</label>
                                                        <input type="number" placeholder="Insurance"
                                                            name="insurance"
                                                            class="onboard-form form-control textbox  calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="graduity">Graduity{!! required() !!}</label> -->

                                                @if (isset($compensatory->graduity))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Graduity</label>
                                                        <input type="number" placeholder="Graduity"
                                                            name="graduity"
                                                            value="{{ $compensatory->graduity ? $compensatory->graduity : '0' }}"
                                                            class="onboard-form form-control textbox   calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Graduity</label>
                                                        <input type="number" placeholder="Graduity"
                                                            name="graduity"
                                                            class="onboard-form form-control textbox   calculation_data cic_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="cic">Cost of Company{!! required() !!}</label> -->

                                                @if (isset($compensatory->cic))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Cost of
                                                            Company</label>

                                                        <input type="number" placeholder="Cost of Company"
                                                            name="cic"
                                                            value="{{ $compensatory->cic ? $compensatory->cic : '0' }}"
                                                            id="cic"
                                                            class="onboard-form form-control textbox "
                                                            step="0.01" required readonly />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Cost of
                                                            Company</label>

                                                        <input type="number" placeholder="Cost of Company"
                                                            name="cic" id="cic"
                                                            class="onboard-form form-control textbox "
                                                            step="0.01" required readOnly />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="epf_employee">EPF Employee{!! required() !!}</label> -->

                                                @if (isset($compensatory->epf_employee))
                                                    <div class="floating">
                                                        <label for="" class="float-label">EPF
                                                            Employee</label>

                                                        <input type="number" placeholder="EPF Employee"
                                                            name="epf_employee"
                                                            value="{{ $compensatory->epf_employee ? $compensatory->epf_employee : '0' }}"
                                                            class="onboard-form form-control  calculation_data net_data textbox "
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">EPF
                                                            Employee</label>

                                                        <input type="number" placeholder="EPF Employee"
                                                            name="epf_employee"
                                                            class="onboard-form form-control  calculation_data net_data textbox "
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="esic_employee">ESIC Employee{!! required() !!}</label> -->

                                                @if (isset($compensatory->esic_employee))
                                                    <div class="floating">
                                                        <label for="" class="float-label">ESIC
                                                            Employee</label>

                                                        <input type="number" placeholder="ESIC Employee"
                                                            name="esic_employee"
                                                            value="{{ $compensatory->esic_employee ? $compensatory->esic_employee : '0' }}"
                                                            class="textbox  onboard-form form-control  calculation_data net_data"
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">ESIC
                                                            Employee</label>

                                                        <input type="number" placeholder="ESIC Employee"
                                                            name="esic_employee"
                                                            class="textbox  onboard-form form-control  calculation_data net_data"
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="professional_tax">Professional Tax{!! required() !!}</label> -->

                                                @if (isset($compensatory->professional_tax))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Professional
                                                            Tax</label>

                                                        <input type="number" placeholder="Professional Tax"
                                                            name="professional_tax"
                                                            value="{{ $compensatory->professional_tax ? $compensatory->professional_tax : '0' }}"
                                                            class="textbox  onboard-form form-control  calculation_data net_data "
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Professional
                                                            Tax</label>

                                                        <input type="number" placeholder="Professional Tax"
                                                            name="professional_tax"
                                                            class="textbox  onboard-form form-control calculation_data net_data "
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="labour_welfare_fund">labour welfare fund{!! required() !!}</label> -->

                                                @if (isset($compensatory->labour_welfare_fund))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Labour welfare
                                                            fund</label>

                                                        <input type="number" placeholder="labour welfare fund"
                                                            name="labour_welfare_fund"
                                                            value="{{ $compensatory->labour_welfare_fund ? $compensatory->labour_welfare_fund : '0' }}"
                                                            class="onboard-form form-control calculation_data net_data textbox "
                                                            step="0.01" />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Labour welfare
                                                            fund</label>

                                                        <input type="number" placeholder="labour welfare fund"
                                                            name="labour_welfare_fund"
                                                            class="onboard-form form-control calculation_data net_data textbox  "
                                                            step="0.01" />
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 mb-2">
                                                <!-- <label class="" for="net_income">Net Income{!! required() !!}</label> -->

                                                @if (isset($compensatory->net_income))
                                                    <div class="floating">
                                                        <label for="" class="float-label">Net
                                                            Income</label>

                                                        <input type="number" placeholder="Net Income"
                                                            name="net_income"
                                                            value="{{ $compensatory->net_income ? $compensatory->net_income : '0' }}"
                                                            class="onboard-form form-control textbox "
                                                            step="0.01" required readonly />
                                                    </div>
                                                @else
                                                    <div class="floating">
                                                        <label for="" class="float-label">Net
                                                            Income</label>

                                                        <input type="number" placeholder="Net Income"
                                                            name="net_income" id="net_income"
                                                            class="onboard-form form-control textbox "
                                                            step="0.01" required readOnly />
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-0  profile-box card-top-border p-2">
                                <div class="card-body justify-content-center align-items-center ">
                                    <div class="header-card-text">
                                        <h6 class="mb-0">Personal Documents</h6>
                                    </div>
                                    <div class="form-card mb-2">
                                        <div class="row mt-1">
                                            <!-- <div class="col-12 mb-2">
                                                    <input type="checkbox" placeholder="" name="aadhar_backend"
                                                        id="aadhar_backend" style="width:auto;" />
                                                    <label for="aadhar_backend">Upload aadhar backend</label>
                                                </div> -->
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="aadhar_card">Aadhar Card{!! required() !!}</label> -->
                                                <label for="" class="float-label">Aadhar
                                                    Card Front<span class="text-danger">*</span></label>
                                                <div class="addfiles form-control md" data="#aadhar_card_file"
                                                    id="aadhar_card_file_label"><span class="file_label">Choose
                                                        Aadhar
                                                        Card Front</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Aadhar Card"
                                                    name="aadhar_card_file" id="aadhar_card_file"
                                                    class="onboard-form form-control files" required />

                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2"
                                                id="aadhar_card_backend_content">
                                                <!-- <label class="" for="aadhar_card_backend">Aadhar Card Backend<span id="aadhar_card_backend_req">{!! required() !!}</span></label> -->
                                                <label for="" class="float-label"> Aadhar Card Back<span
                                                        class="text-danger">*</span></label>
                                                <div class="addfiles form-control" data="#aadhar_card_backend_file"
                                                    id="aadhar_card_backend_file_label"><span
                                                        class="file_label">Choose
                                                        Aadhar Card Back </span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Aadhar Card Backend"
                                                    name="aadhar_card_backend_file" id="aadhar_card_backend_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="pan_card">Pan Card{!! required() !!}</label> -->
                                                <label for="" class="float-label"> Pan
                                                    Card<span class="text-danger">*</span></label>
                                                <div class="addfiles form-control" data="#pan_card_file"
                                                    id="pan_card_file_label"><span class="file_label">Upload Pan
                                                        Card</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Pan Card"
                                                    name="pan_card_file" id="pan_card_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="passport">Passport{!! required() !!}</label> -->
                                                <label for="" class="float-label">
                                                    Passport</label>
                                                <div class="addfiles form-control" data="#passport_file"
                                                    id="passport_file_label"><span class="file_label">Choose
                                                        Passport</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Passport"
                                                    name="passport_file" id="passport_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="voters_id">Voters ID</label> -->
                                                <label for="" class="float-label">
                                                    Voters
                                                    ID</label>
                                                <div class="addfiles form-control" data="#voters_id_file"
                                                    id="voters_id_file_label"><span class="file_label">Choose
                                                        Voters
                                                        ID</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Voters ID"
                                                    name="voters_id_file" id="voters_id_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mb-2">
                                                <!-- <label class="" for="dl_file">Driving License</label> -->
                                                <label for="" class="float-label"> Driving
                                                    License</label>
                                                <div class="addfiles form-control" data="#dl_file"
                                                    id="dl_file_label"><span class="file_label">Choose Driving
                                                        License</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Driving License"
                                                    name="dl_file" id="dl_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <!-- <label class="" for="education_certificate">Educations Certificate{!! required() !!}</label> -->
                                                <label for="" class="float-label">Educations
                                                    Certificate<span class="text-danger">*</span></label>
                                                <div class="addfiles form-control"
                                                    data="#education_certificate_file"
                                                    id="education_certificate_file_label"><span
                                                        class="file_label">Choose
                                                        Educations Certificate</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Educations Certificate"
                                                    name="education_certificate_file"
                                                    id="education_certificate_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                                                <!-- <label class="" for="reliving_letter">Reliving Letter</label> -->
                                                <label for="" class="float-label"> Relieving
                                                    Letter</label>
                                                <div class="addfiles form-control" data="#reliving_letter_file"
                                                    id="reliving_letter_file_label"><span class="file_label">Choose
                                                        Relieving Letter</span></div>
                                                <input type="file" accept="image/png, image/gif, image/jpeg"
                                                    style="display:none;" placeholder="Relieving Letter"
                                                    name="reliving_letter_file" id="reliving_letter_file"
                                                    class="onboard-form form-control files" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right"><button type="button" data="row-6"
                                                next="row-6" placeholder="" name="save_form" id="save_button"
                                                class="btn btn-orange  text-center processOnboardForm"
                                                value="Submit">Save</button>

                                            <button disabled type="button"
                                                    data="row-6" next="row-6" placeholder=""
                                                    name="submit_form" id="submit_button"
                                                    class="btn btn-orange  text-center processOnboardForm"
                                                    value="Submit">Submit</button>

                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Main Content-->
</div>

<!-- Vertically Centered -->
<!-- <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;background:#00000073;">
    <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="modalHeader">Failure
                    </h5>
                    <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
            </div>

        </div>
    </div>
</div> -->
<div id="notificationModal" class="modal custom-modal fade show" aria-modal="true" role="dialog"
    style="opacity:1; display:none;background:#00000073;">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
        <div class="modal-content top-line">
            <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                <hp class="modal-title mb-1 text-primary" id="modalHeader"
                    style="border-bottom:5px solid #d0d4e2;">
                </hp>
                <button type="button" class="close-modal outline-none bg-transparent border-0 h3"
                    data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-muted m-0" id="modalSubHeading"></h6>
                <!-- <div class="">
                    <h6 class="" id="modalSubHeading">---</h6>
                    <p class="text-muted mb-4" id="modalBody"></p>

                </div> -->
                <div id="modalBody"></div>
                <!-- <ul class="list-style-numbered list-style-circle p-4" id="modalBody">

                </ul> -->


            </div>
            <div class="modal-footer py-0 border-0">
                <button type="button" id="button_close" class="btn btn-border-primary close-modal"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
