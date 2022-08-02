@section('ui-onboarding')
    <div class="container-fluid">
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
                            <form id="form-1" enctype="multipart/form-data">
                                @csrf
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text">
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="form-card">
                                            <div class="row mt-1">
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="employee_code">Employee Code{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Employee Code" name="employee_code"
                                                        class="onboard-form form-control" value="{{$empNo}}" required
                                                        readonly />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="employee_name">Employee Name as per Aadhar{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Employee Name as per Aadhar"
                                                        name="employee_name" class="onboard-form form-control"
                                                        pattern="name" required />
                                                    <label class="error star_error employee_name_label" for="employee_name"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="dob">Date of Birth{!! required() !!}</label> -->
                                                    @php
                                                    $date = (date('Y')-18)."-".date('m')."-".date('d');
                                                    @endphp
                                                    <input type="text" placeholder="Date of Birth" name="dob"
                                                        max="{{$date}}" class="onboard-form form-control"
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="marital_status">Marital Status{!! required() !!}</label> -->
                                                    <select placeholder="Marital Status" name="marital_status"
                                                        id="marital_status"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        <option value="">Select Marital Status</option>
                                                        <option value="single">Un Married</option>
                                                        <option value="married">Married</option>
                                                        <option value="widowed">Widowed</option>
                                                        <option value="separated">Separated</option>
                                                        <option value="divorced">Divorced</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="doj">Date of Joining{!! required() !!}</label> -->
                                                    <input type="text" max="9999-12-31" placeholder="Date of Joining"
                                                        name="doj" class="onboard-form form-control"
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="gender">Gender{!! required() !!}</label> -->
                                                    <select placeholder="Gender" name="gender" id="gender"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="mobile_no">Mobile Number{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Mobile Number" name="mobile_no"
                                                        minlength="10" maxlength="10" class="onboard-form form-control"
                                                        required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="email">Email ID{!! required() !!}</label> -->
                                                    <input type="email" pattern="email" placeholder="Email ID" name="email" value="{{request()->has('email')? request()->email : ''}}"
                                                        class="onboard-form form-control" @if(request()->has('email')) readonly @endif required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="aadhar">Aadhaar Number<span id="aadhar_req">{!! required() !!}</span></label> -->
                                                    <input type="number" placeholder="Aadhaar Number" name="aadhar"
                                                        id="aadhar" pattern="aadhar" class="onboard-form form-control"
                                                        required />
                                                    <label class="error star_error aadhar_label" for="aadhar"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="pan_no">Pan Card Number<span id="pan_no_req">{!! required() !!}</span></label> -->
                                                    <input type="text" placeholder="Pan Card Number" name="pan_no"
                                                        id="pan_no" class=" form-control pan" pattern="pan"
                                                        required />
                                                    <label class="error star_error pan_no_label" id="pan_no_label" for="pan_no"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="pan_ack">Pan Acknowlegement<span id="pan_ack_req">{!! required() !!}</span></label> -->
                                                    <input type="text" placeholder="Pan Acknowlegement" name="pan_ack" pattern="alp-num"
                                                        id="pan_ack"
                                                        class="onboard-form form-control not-required validate" />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="444">DL Number</label> -->
                                                    <input type="text" placeholder="DL Number" name="dl_no" id="dl_no"
                                                        class=" form-control not-required validate"
                                                        pattern="dl" />
                                                    <label class="error star_error dl_no_label" for="dl_no"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="passport_no">Passport Number<span id="passport_no_req">{!! required() !!}</span></label> -->
                                                    <input type="number" placeholder="Passport Number" name="passport_no"
                                                        id="passport_no"
                                                        class="onboard-form form-control not-required validate" />
                                                    <label class="error star_error passport_no_label" for="passport_no"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="passport_exp">Passport Exp Date<span id="passport_exp_req">{!! required() !!}</span></label> -->
                                                    <input type="text" max="9999-12-31" placeholder="Passport Exp Date"
                                                        name="passport_exp" min="{{date('Y-m-d')}}" id="passport_exp"
                                                        onfocus="(this.type='date')"
                                                        class="onboard-form form-control not-required validate" />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="nationality">Nationality{!! required() !!}</label> -->
                                                    <select placeholder="Nationality" name="nationality"
                                                        id="nationality"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        <option value="indian">Indian</option>
                                                        <option value="other_country">Other Nationality</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="blood_group">Blood Group</label> -->
                                                    <select placeholder="Blood Group" name="blood_group"
                                                        class="onboard-form form-control not-required validate select2_form_without_search">
                                                        <option value="">Select Blood Group</option>
                                                        <option value="a-positive">A Positive</option>
                                                        <option value="a-negative">A Negative</option>
                                                        <option value="a-unknown">A Unknown</option>
                                                        <option value="b-positive">B Positive</option>
                                                        <option value="b-negative">B Negative</option>
                                                        <option value="b-unknown">B Unknown</option>
                                                        <option value="ab-positive">AB Positive</option>
                                                        <option value="ab-negative">AB Negative</option>
                                                        <option value="ab-unknown">AB Unknown</option>
                                                        <option value="o-positive">O Positive</option>
                                                        <option value="o-negative">O Negative</option>
                                                        <option value="o-unknown">O Unknown</option>
                                                        <option value="unknown">Unknown</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="physically_challenged">Physically Challenged</label> -->
                                                    <select placeholder="Physically Challenged"
                                                        name="physically_challenged"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        <option value="">Select Physically Challenged</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="bank_name">Bank Name</label> -->
                                                    <select placeholder="Bank Name" name="bank_name" id="bank_name"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        <option value="">Select Bank Name</option>
                                                        @foreach($bank as $b)
                                                        <option value="{{$b->bank_name}}" min-data="{{$b->min_length}}"
                                                            max-data="{{$b->max_length}}">{{$b->bank_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="account_no">Account Number</label> -->
                                                    <input type="number" placeholder="Account Number" name="account_no"
                                                        id="account_no" class="onboard-form form-control" minlength="10"
                                                        maxlength="10" required />
                                                    <label class="error star_error account_no_label" for="account_no"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="bank_ifsc">Bank IFSC Code</label> -->
                                                    <input type="text" placeholder="Bank IFSC Code" name="bank_ifsc" id="bank_ifsc"
                                                        pattern="ifsc" class=" form-control" required />
                                                    <label class="error star_error bank_ifsc_label" for="bank_ifsc"
                                                        style="display: none;"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">


                                        <div class="form-card">
                                            <div class="text-primary my-2 header-card-text">
                                                <h5>Location Details</h5>
                                            </div>
                                            <div class="row mt-1">
                                                
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="current_city">Current City{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Current City" name="current_city"
                                                        id="current_city" class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="current_state">Current State{!! required() !!}</label> -->
                                                    <select placeholder="Current State" name="current_state"
                                                        id="current_state"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="current_pincode">Current Pincode{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Current Pincode"
                                                        name="current_pincode" id="current_pincode"
                                                        class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <input type="text" placeholder="" name="curent_district" class="onboard-form form-control" required /> -->
                                                    <!-- <label class="" for="curent_district">Country{!! required() !!}</label> -->
                                                    <select placeholder="Country" name="current_district"
                                                        id="current_district"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        @foreach($countries as $data)
                                                        <option value="{{$data->country_code}}">{{$data->country_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 mt-2">
                                                    <!-- <label class="" for="current_address">Current Address{!! required() !!}</label> -->
                                                                                                            <textarea placeholder="Current Address"
                                                        name="current_address" id="current_address"
                                                        class="onboard-form form-control" required  id="" cols="5" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-2">
                                                    <input type="checkbox" placeholder="" name="current_address_copy"
                                                        id="current_address_copy" style="width:auto;" />
                                                    <label for="current_address_copy">Copy current address to the
                                                        permanent address{!! required() !!}</label>
                                                </div>
                                                
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="permanent_city">Permanent City{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Permanent City"
                                                        name="permanent_city" id="permanent_city"
                                                        class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="permanent_state">Permanent State{!! required() !!}</label> -->
                                                    <select placeholder="Permanent State" name="permanent_state"
                                                        id="permanent_state"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="permanent_pincode">Permanent Pincode{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Permanent Pincode"
                                                        name="permanent_pincode" id="permanent_pincode"
                                                        class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <input type="text" placeholder="" name="permanent_district" class="onboard-form form-control" required /> -->
                                                    <!-- <label class="" for="permanent_district">Permanent Country{!! required() !!}</label> -->
                                                    <select placeholder="Permanent Country" name="permanent_district"
                                                        id="permanent_district"
                                                        class="onboard-form form-control select2_form_without_search"
                                                        required>
                                                        @foreach($countries as $data)
                                                        <option value="{{$data->country_code}}">{{$data->country_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 mt-2">
                                                    <!-- <label class="" for="permanent_address">Permanent Address{!! required() !!}</label> -->
                                                    
                                                        <textarea placeholder="Permanent Address"
                                                        name="permanent_address" id="permanent_address"
                                                        class="onboard-form form-control" required  cols="5" rows="3"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text">
                                            <h5>Official Details</h5>
                                        </div>
                                        <div class="form-card">
                                            <div class="row mt-1">
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="department">Department{!! required() !!}</label> -->
                                                    <select placeholder="Department" name="department" id="department"
                                                        class="onboard-form form-control" required>
                                                        <option value="">Select Department</option>
                                                        @foreach($department as $e)
                                                        <option value="{{$e->name}}">{{$e->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="process">Process{!! required() !!}</label> -->
                                                    <select placeholder="Process" name="process" id="process"
                                                        class="onboard-form form-control" required>
                                                        <option value="">Select Process</option>
                                                        @foreach($emp as $e)
                                                        <option value="{{$e->process}}">{{$e->process}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="designation">Designation{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Designation" name="designation"
                                                        class="onboard-form form-control" pattern="alpha" required />
                                                    <label class="error star_error designation_label" for="designation"
                                                        style="display: none;"></label>
                                                        
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="cost_center">Cost Center{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Cost Center" name="cost_center"
                                                        class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="confirmation_period">Probabition Period{!! required() !!}</label> -->
                                                    <select placeholder="Probabition Period" name="confirmation_period"
                                                        class="onboard-form form-control not-required validate select2_form_without_search">
                                                        <option value="">Select Probabition Period</option>
                                                        <option value="1">1 Month</option>
                                                        <option value="2">2 Month</option>
                                                        <option value="3">3 Month</option>
                                                        <option value="4">4 Month</option>
                                                        <option value="5">5 Month</option>
                                                        <option value="6">6 Month</option>
                                                        <option value="7">7 Month</option>
                                                        <option value="8">8 Month</option>
                                                        <option value="9">9 Month</option>
                                                        <option value="10">10 Month</option>
                                                        <option value="11">11 Month</option>
                                                        <option value="12">12 Month</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="work_location">Work Location{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Work Location" name="work_location"
                                                        class="onboard-form form-control" pattern="alpha" required />
                                                    <label class="error star_error work_location_label" for="work_location"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="l1_manager_code">Reporting Manager Employee Code{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Reporting Manager Employee Code"
                                                        name="l1_manager_code" class="onboard-form form-control"
                                                        required />
                                                </div>
                                                <!-- <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <input type="text" placeholder="" name="l1_manager_designation" class="onboard-form form-control" required />
                                                    <label class="" for="l1_manager_designation">Reporting Manager
                                                        Designation{!! required() !!}</label>
                                                </div> -->
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="l1_manager_name">Reporting Manager Name{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Reporting Manager Name"
                                                        name="l1_manager_name" class="onboard-form form-control" pattern="name"
                                                        required />
                                                    <label class="error star_error l1_manager_name_label" for="l1_manager_name"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="holiday_location">Holiday Location{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Holiday Location"
                                                        name="holiday_location" class="onboard-form form-control" pattern="alpha"
                                                        required />
                                                    <label class="error star_error holiday_location_label" for="holiday_location"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="officical_mail">Official E-Mail Id{!! required() !!}</label> -->
                                                    <input type="email" placeholder="Official E-Mail Id"
                                                        name="officical_mail" class="onboard-form form-control"
                                                        required pattern="email" />
                                                    <label class="error star_error officical_mail_label" for="officical_mail"
                                                        style="display: none;"></label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="official_mobile">Official Mobile{!! required() !!}</label> -->
                                                    <input type="number" minlength="10" maxlength="10"
                                                        placeholder="Official Mobile" name="official_mobile"
                                                        class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="emp_notice">Employee Notice Period Days{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Employee Notice Period Days"
                                                        name="emp_notice" class="onboard-form form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text">
                                            <h5>Family Details</h5>
                                        </div>
                                        <div class="form-card">
                                            <div class="row mt-1">
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="father_name">Father Name{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Father Name" name="father_name" pattern="name" class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="mother_name">Mother Name{!! required() !!}</label> -->
                                                    <input type="text" placeholder="Mother Name" name="mother_name" pattern="name"
                                                        class="onboard-form form-control" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="dow">Date of Wedding<span id="dow_req">{!! required() !!}</span></label> -->
                                                    <input type="text" max="9999-12-31" placeholder="Date of Wedding"
                                                        name="dow" class="onboard-form form-control spouse_data"
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="spouse_name">Spouse Name<span id="spouse_name_req">{!! required() !!}</span></label> -->
                                                    <input type="text" placeholder="Spouse Name" name="spouse_name" pattern="name"
                                                        class="onboard-form form-control spouse_data" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="spouse_gender">Spouse Gender<span id="spouse_gender_req">{!! required() !!}</span></label> -->
                                                    <select placeholder="Spouse Gender" name="spouse_gender"
                                                        id="spouse_gender"
                                                        class="onboard-form form-control spouse_data select2_form_without_search"
                                                        required>
                                                        <option value="">Select Spouse Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="spouse_dob">Spouse DOB<span id="spouse_dob_req">{!! required() !!}</span></label> -->
                                                    <input type="text" max="9999-12-31" placeholder="Spouse DOB"
                                                        name="spouse_dob" class="onboard-form form-control spouse_data"
                                                        onfocus="(this.type='date')" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="no_child">Number of Children<span id="no_child_req">{!! required() !!}</span></label> -->
                                                    <select placeholder="Number of Children" name="no_child"
                                                        id="no_child"
                                                        class="onboard-form form-control spouse_data select2_form_without_search"
                                                        required>
                                                        <option value="">Select Number of Children</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="children_container row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text">
                                            <h5>Compensatory</h5></div>
                                        <div class="form-card">

                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="basic">Basic Salary{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Basic Salary" name="basic"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="hra">HRA{!! required() !!}</label> -->
                                                    <input type="number" placeholder="HRA" name="hra"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="Statutory_bonus">Statutory Bonus{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Statutory Bonus"
                                                        name="statutory_bonus"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="child_education_allowance">Child Education Allowance{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Child Education Allowance"
                                                        name="child_education_allowance"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="food_coupon">Food Coupon{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Food Coupon" name="food_coupon"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="lta">LTA{!! required() !!}</label> -->
                                                    <input type="number" placeholder="LTA" name="lta"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="special_allowance">Special Allowance{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Special Allowance"
                                                        name="special_allowance"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="other_allowance">Other Allowance{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Other Allowance"
                                                        name="other_allowance"
                                                        class="onboard-form form-control calculation_data gross_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="gross">Gross Salary{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Gross Salary" name="gross"
                                                        id="gross" class="onboard-form form-control" step="0.01"
                                                        required readOnly />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="epf_employer_contribution">EPF employer contribution{!! required() !!}</label> -->
                                                    <input type="number" placeholder="EPF employer contribution"
                                                        name="epf_employer_contribution"
                                                        class="onboard-form form-control calculation_data cic_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="esic_employer_contribution">ESIC employer contribution{!! required() !!}</label> -->
                                                    <input type="number" placeholder="ESIC employer contribution"
                                                        name="esic_employer_contribution"
                                                        class="onboard-form form-control calculation_data cic_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="insurance">Insurance{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Insurance" name="insurance"
                                                        class="onboard-form form-control calculation_data cic_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="graduity">Graduity{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Graduity" name="graduity"
                                                        class="onboard-form form-control calculation_data cic_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="cic">Cost of Company{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Cost of Company" name="cic"
                                                        id="cic" class="onboard-form form-control" step="0.01" required
                                                        readOnly />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="epf_employee">EPF Employee{!! required() !!}</label> -->
                                                    <input type="number" placeholder="EPF Employee" name="epf_employee"
                                                        class="onboard-form form-control calculation_data net_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="esic_employee">ESIC Employee{!! required() !!}</label> -->
                                                    <input type="number" placeholder="ESIC Employee"
                                                        name="esic_employee"
                                                        class="onboard-form form-control calculation_data net_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="professional_tax">Professional Tax{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Professional Tax"
                                                        name="professional_tax"
                                                        class="onboard-form form-control calculation_data net_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="labour_welfare_fund">labour welfare fund{!! required() !!}</label> -->
                                                    <input type="number" placeholder="labour welfare fund"
                                                        name="labour_welfare_fund"
                                                        class="onboard-form form-control calculation_data net_data"
                                                        step="0.01" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2">
                                                    <!-- <label class="" for="net_income">Net Income{!! required() !!}</label> -->
                                                    <input type="number" placeholder="Net Income" name="net_income"
                                                        id="net_income" class="onboard-form form-control" step="0.01"
                                                        required readOnly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow  profile-box card-top-border p-2">
                                    <div class="card-body justify-content-center align-items-center mb-3">
                                        <div class="text-primary my-2 header-card-text"><h5>Personal Documents</h5></div>
                                        <div class="form-card mb-4">
                                            <div class="row mt-1">
                                                <!-- <div class="col-12 mt-2">
                                                    <input type="checkbox" placeholder="" name="aadhar_backend"
                                                        id="aadhar_backend" style="width:auto;" />
                                                    <label for="aadhar_backend">Upload aadhar backend</label>
                                                </div> -->
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="aadhar_card">Aadhar Card{!! required() !!}</label> -->
                                                    <div class="addfiles form-control" data="#aadhar_card"
                                                        id="aadhar_card_label"><span class="file_label">Choose Aadhar
                                                            Card</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Aadhar Card"
                                                        name="aadhar_card" id="aadhar_card"
                                                        class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2"
                                                    id="aadhar_card_backend_content">
                                                    <!-- <label class="" for="aadhar_card_backend">Aadhar Card Backend<span id="aadhar_card_backend_req">{!! required() !!}</span></label> -->
                                                    <div class="addfiles form-control" data="#aadhar_card_backend"
                                                        id="aadhar_card_backend_label"><span class="file_label">Choose
                                                            Aadhar Card Backend</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Aadhar Card Backend"
                                                        name="aadhar_card_backend" id="aadhar_card_backend"
                                                        class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="pan_card">Pan Card{!! required() !!}</label> -->
                                                    <div class="addfiles form-control" data="#pan_card"
                                                        id="pan_card_label"><span class="file_label">Choose Pan
                                                            Card</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Pan Card" name="pan_card"
                                                        id="pan_card" class="onboard-form form-control files"
                                                        />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="passport">Passport{!! required() !!}</label> -->
                                                    <div class="addfiles form-control" data="#passport"
                                                        id="passport_label"><span class="file_label">Choose
                                                            Passport</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Passport" name="passport"
                                                        id="passport" class="onboard-form form-control files"
                                                         />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="voters_id">Voters ID</label> -->
                                                    <div class="addfiles form-control" data="#voters_id"
                                                        id="voters_id_label"><span class="file_label">Choose Voters
                                                            ID</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Voters ID" name="voters_id"
                                                        id="voters_id" class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="dl_file">Driving License</label> -->
                                                    <div class="addfiles form-control" data="#dl_file"
                                                        id="dl_file_label"><span class="file_label">Choose Driving
                                                            License</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Driving License"
                                                        name="dl_file" id="dl_file"
                                                        class="onboard-form form-control files" />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="education_certificate">Educations Certificate{!! required() !!}</label> -->
                                                    <div class="addfiles form-control" data="#education_certificate"
                                                        id="education_certificate_label"><span class="file_label">Choose
                                                            Educations Certificate</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Educations Certificate"
                                                        name="education_certificate" id="education_certificate"
                                                        class="onboard-form form-control files"  />
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-2">
                                                    <!-- <label class="" for="reliving_letter">Reliving Letter</label> -->
                                                    <div class="addfiles form-control" data="#reliving_letter"
                                                        id="reliving_letter_label"><span class="file_label">Choose
                                                            Reliving Letter</span></div>
                                                    <input type="file" accept=".doc,.docx,.pdf,image/*"
                                                        style="display:none;" placeholder="Reliving Letter"
                                                        name="reliving_letter" id="reliving_letter"
                                                        class="onboard-form form-control files" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-12 text-right"><button type="button" data="row-6"
                                                    next="row-6" placeholder="" name="next" id="submit_button"
                                                    class="btn btn-orange  text-center"
                                                    value="Submit">Submit</button>
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
        <!--Main Content-->
    </div>

    <!-- Vertically Centered -->
    <div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true"
        style="opacity:1; display:none;background:#00000073;">
        <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">

                    <div class="w-100 modal-header-content d-flex align-items-center py-2">
                        <h5 class="modal-title text-white" id="modalHeader">Failure
                        </h5>
                        <button type="button" class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mt-4">
                        <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                        <p class="text-muted mb-4" id="modalBody"></p>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light close-modal"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection