@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Employee Onboarding @endslot
@endcomponent


<style>
* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

.onboard-form {
    border-bottom: 1px solid !important;
}

input {
    border: none !important;
}

.error {
    color: red;
    font-size: 15px;
}

.error::before {
    content: '* ';
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: none;
    border-radius: 0px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px;
    outline: none;
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    box-shadow: 0 1px 0 0 #673AB7 !important;
    outline-width: 0;
}

#msform input:focus~.fieldlabels {
    top: -9px !important;
    font-size: 12px;
}

#msform input:not(:focus):valid~.fieldlabels {
    top: -9px !important;
    font-size: 12px;
}

#msform input:not(:focus)~.empty {
    top: -9px !important;
    font-size: 12px;
}

.patternErr {
    display: inline-block !important;
    font-size: 15px !important;
}

.patternErr::after {
    content: 'Invalid data';
}

/* #msform input:not(:focus) ~ .notvalid {
    color: red;
} */

.fieldlabels {
    position: absolute;
    pointer-events: none;
    left: 15px;
    top: -7px;
    transition: 0.2s ease all;
    font-size: 18px;
}

#msform .action-button {
    /* width: 30%; */
    background: orangered;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    /* padding: 8px 6px; */
    padding: 10px 24px;
    margin: 10px 0px 10px 0px;
    float: right;
    border-radius: 20px;
}

#msform .previous {
    float: left !important;
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: orangered
}

#msform .action-button-previous {
    /* width: 100px; */
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 24px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
    padding: 0px 100px 0px 100px;
    display: flex;
}

@media only screen and (max-width: 906px) {
    .content.pl-0 {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .main-content {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }

    .header {
        margin-right: 0px !important;
    }
}

@media only screen and (max-width: 433px) {
    #progressbar li {
        width: 20% !important;
    }

    #progressbar li:before {
        width: 60% !important;
        height: 30% !important;
        line-height: 109% !important;
    }

    #progressbar li:after {
        top: 14% !important;
    }

    .f-9 {
        font-size: 6px;
    }

    .fieldlabels {
        font-size: 15px !important;
    }
}

@media only screen and (max-width: 580px) {
    #progressbar {
        margin-bottom: 0px;
        padding: 0;
    }
}

#end:after {
    width: 45% !important;
}

#account:after {
    left: 45% !important;
}

#progressbar .active {
    color: black;
    font-weight: bold;
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    color: orange;
    content: "1"
}

#progressbar #end:before {
    font-family: FontAwesome;
    color: orange;
    content: "5"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    color: orange;
    content: "2"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    color: orange;
    content: "3"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    color: orange;
    content: "4"
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 35px;
    display: block;
    font-size: 18px;
    color: white;
    background: white;
    border: 1px solid orange;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: orange;
    position: absolute;
    left: 0;
    top: 20px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: orangered;
    color: white !important;
}

.fit-image {
    width: 100%;
    object-fit: cover
}

.rounded-corner-add {
    border-radius: 30px;
    border: 1px solid;
    padding: 10px;
    width: 100px;
}

@media only screen and (max-width: 906px) {
    .header {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    .row {
        margin-right: 0 !important;
    }

    .content.pl-0 {
        padding-right: 0 !important;
    }
}

@media only screen and (width:768px) and (orientation : portrait) {
    .header {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
}

@media only screen and (max-width: 441px) {
    #msform .action-button {
        width: 100% !important;
        font-size: 12px !important;
        padding: 8px 6px !important;
    }
}

@media only screen and (width:280px) and (orientation : portrait) {
    body {
        width: 168%;
    }
}

@media only screen and (width:360px) and (orientation : portrait) {
    body {
        width: 104%;
    }
}
</style>







<div class="main">

    <div class="container-fluid">
        <div class="card mt-4 p-5">

            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <div class="card p-3">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong class="f-9 onboard-detail">Personal
                                        Details</strong></li>
                                <li id="personal"><strong class="f-9 onboard-detail">Location Details</strong></li>
                                <li id="payment"><strong class="f-9 onboard-detail">Official Details</strong></li>
                                <li id="confirm"><strong class="f-9 onboard-detail">Family Details</strong></li>
                                <li id="end"><strong class="f-9 onboard-detail">Statutory Details</strong></li>
                            </ul>
                            <fieldset id="row-1">
                                <form id="form-1">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="employee_code" class="onboard-form" required />
                                                <label class="fieldlabels" for="employee_code">Employee Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="employee_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="employee_name">Employee Name as per
                                                    Aadhar</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="dob">Date of Birth</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="marital_status" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="marital_status">Marital Status</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="doj" class="onboard-form" required />
                                                <label class="fieldlabels" for="doj">Date of Joining</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="gender" class="onboard-form" required />
                                                <label class="fieldlabels" for="gender">Gender</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="mobile_no" minlength="10" maxlength="10"
                                                    class="onboard-form" required />
                                                <label class="fieldlabels" for="mobile_no">Mobile Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="email" name="email" class="onboard-form" required />
                                                <label class="fieldlabels" for="email">Email ID</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="aadhar" minLength="19" maxLength="19"
                                                    class="onboard-form" required />
                                                <label class="fieldlabels" for="aadhar">Aadhaar Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="pan_no" class="onboard-form pan" pattern="pan"
                                                    required />
                                                <label class="error pan_no_label" for="pan_no"
                                                    style="display: none;"></label>
                                                <label class="fieldlabels" for="pan_no">Pan Card Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="dl_no" class="onboard-form" required />
                                                <label class="fieldlabels" for="dl_no">DL Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="passport_no" class="onboard-form" required />
                                                <label class="fieldlabels" for="passport_no">Passport Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="passport_exp" class="onboard-form" required />
                                                <label class="fieldlabels" for="passport_exp">Passport Exp Date</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="nationality" class="onboard-form" required />
                                                <label class="fieldlabels" for="nationality">Nationality</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="blood_group" class="onboard-form" required />
                                                <label class="fieldlabels" for="blood_group">Blood Group</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right p-0"><button type="button" data="row-1"
                                                next="row-2" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-2">
                                <form id="form-2">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_address" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="current_address">Current Address</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_city" class="onboard-form" required />
                                                <label class="fieldlabels" for="current_city">Current City</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="curent_district" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="curent_district">Current
                                                    District</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_pincode" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="current_pincode">Current Pincode</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_state" class="onboard-form" required />
                                                <label class="fieldlabels" for="current_state">Current State</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_address" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_address">Permanent
                                                    Address</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_city" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_city">Permanent City</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_district" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_district">Permanent
                                                    District</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_pincode" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_pincode">Permanent
                                                    Pincode</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_state" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_state">Permanent State</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="physically_challenged" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="physically_challenged">Physically
                                                    Challenged</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="account_no" class="onboard-form" required />
                                                <label class="fieldlabels" for="account_no">Account Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="bank_ifsc" class="onboard-form" required />
                                                <label class="fieldlabels" for="bank_ifsc">Bank IFSC Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="bank_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="bank_name">Bank Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-2" prev="row-1"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-2"
                                                next="row-3" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-3">
                                <form id="form-3">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="department" class="onboard-form" required />
                                                <label class="fieldlabels" for="department">Department</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="process" class="onboard-form" required />
                                                <label class="fieldlabels" for="process">Process</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="designation" class="onboard-form" required />
                                                <label class="fieldlabels" for="designation">Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="cost_center" class="onboard-form" required />
                                                <label class="fieldlabels" for="cost_center">Cost Center</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="confirmation_period" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="confirmation_period">Confirmation
                                                    Period</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="holiday_location" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="holiday_location">Holiday
                                                    Location</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l1_manager_code">L1 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l1_manager_designation">L1 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l1_manager_name">L1 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l2_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l2_manager_code">L2 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l2_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l2_manager_designation">L2 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l2_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l2_manager_name">L2 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l3_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l3_manager_code">L3 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l3_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l3_manager_designation">L3 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l3_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l3_manager_name">L3 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l4_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l4_manager_code">L4 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l4_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l4_manager_designation">L4 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l4_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l4_manager_name">L4 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="work_location" class="onboard-form" required />
                                                <label class="fieldlabels" for="work_location">Work Location</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="email" name="officical_mail" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="officical_mail">Official E-Mail
                                                    Id</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" minlength="10" maxlength="10"
                                                    name="official_mobile" class="onboard-form" required />
                                                <label class="fieldlabels" for="official_mobile">Official Mobile</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="emp_notice" class="onboard-form" required />
                                                <label class="fieldlabels" for="emp_notice">Employee Notice Period
                                                    Days</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-3" prev="row-2"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-3"
                                                next="row-4" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-4">
                                <form id="form-4">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="father_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="father_name">Father Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="mother_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="mother_name">Mother Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="dow" class="onboard-form" required />
                                                <label class="fieldlabels" for="dow">Date of Wedding</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="spouse_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_name">Spouse Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="spouse_gender" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_gender">Spouse Gender</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="spouse_dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_dob">Spouse DOB</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="no_child" class="onboard-form" required />
                                                <label class="fieldlabels" for="no_child">Number of Children</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="child_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_name">Children Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="child_dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_dob">Children DOB</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="child_gender" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_gender">Children Gender</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-4" prev="row-3"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-4"
                                                next="row-5" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-5">
                                <form id="form-5">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="father_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="father_name">Father Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="mother_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="mother_name">Mother Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="dow" class="onboard-form" required />
                                                <label class="fieldlabels" for="dow">Date of Wedding</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="spouse_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_name">Spouse Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="spouse_gender" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_gender">Spouse Gender</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="spouse_dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_dob">Spouse DOB</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="no_child" class="onboard-form" required />
                                                <label class="fieldlabels" for="no_child">Number of Children</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="child_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_name">Children Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="child_dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_dob">Children DOB</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="child_gender" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_gender">Children Gender</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-5" prev="row-4"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button"
                                                url="employee-onboarding-end.html" data="row-5" next="row-3" name="next"
                                                class="bg-pink action-button text-center" value="Submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <!--Main Content-->

</div>





@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<!--Page Wrapper-->

<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script><!-- -->
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>


<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script><!-- -->
    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

    <!-- Page JavaScript Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="assets/js/progressbar.min.js"></script>
    <!--Charts-->
    <!--Canvas JS-->
    <!--Custom Js Script-->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/onboarding.js"></script>
    <!--Custom Js Script-->

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    
    
    




<script>
$(document).ready(function() {

    $('body').on('keyup', ".onboard-form", function() {
        var inputvalues = $(this).val();
        var data = $(this).attr('name');
        if ($(this).attr('pattern') != undefined && $(this).attr('pattern') != '' && inputvalues !=
            '') {
            var pattern = {
                'pan': /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/
            };
            var regex = $(this).attr('pattern');
            if (!pattern[regex].test(inputvalues)) {
                $('.' + data + '_label').addClass('patternErr');
            } else {
                $('.' + data + '_label').removeClass('patternErr');
            }
        }
    });

    $('body').on('blur', '.onboard-form', function() {
        var id = $(this).attr('name');
        if ($(this).val() == '') {
            $("label[for='" + id + "']").removeClass('empty');
        } else {
            $("label[for='" + id + "']").addClass('empty');
        }
        if ($("input[name='" + id + "']").valid()) {
            $("label[for='" + id + "']").removeClass('notvalid');
            $("input[name='" + id + "']").removeClass('notvalid');
        } else {
            $("label[for='" + id + "']").addClass('notvalid');
            $("input[name='" + id + "']").addClass('notvalid');
        }
    });

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);

    $(".next").click(function() {
        current_fs = $('#' + $(this).attr('data'));
        var data = $(this).attr('data');
        const myArray = data.split("-");
        if ($('#form-' + myArray[1]).valid()) {
            next_fs = $('#' + $(this).attr('next'));
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            // if ($(this).attr('url') != '') {
            //     window.location.href = $(this).attr('url');
            // }
            setProgressBar(++current);
            console.log(current);
        }
    });

    $(".previous").click(function() {
        current_fs = $('#' + $(this).attr('data'));
        previous_fs = $('#' + $(this).attr('prev'));
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
    }

    $(".submit").click(function() {
        return false;
    });
});
</script>







@endsection