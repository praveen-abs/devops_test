@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Employee Onboarding @endslot
@endcomponent


<div class="main">

    <div class="container-fluid">
        <div class="card mt-4 p-5">

            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <div class="p-3">
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
                                <fieldset>
                                    <legend><span>Personal Details</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="employee_code">Employee Code{!! required() !!}</label>
                                                <input type="text" name="employee_code" class="onboard-form form-control" value="{{$empNo}}" required readonly/>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="employee_name">Employee Name as per Aadhar{!! required() !!}</label>
                                                <input type="text" name="employee_name" class="onboard-form form-control" pattern="name" required />
                                                <label class="error employee_name_label" for="employee_name" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="dob">Date of Birth{!! required() !!}</label>
                                                @php
                                                $date = (date('Y')-18)."-".date('m')."-".date('d');
                                                @endphp
                                                <input type="date" name="dob" max="{{$date}}" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="marital_status">Marital Status{!! required() !!}</label>
                                                <select name="marital_status" id="marital_status" class="onboard-form form-control" required >
                                                    <option value="">Select</option>
                                                    <option value="single">Un Married</option>
                                                    <option value="married">Married</option>
                                                    <option value="widowed">Widowed</option>
                                                    <option value="separated">Separated</option>
                                                    <option value="divorced">Divorced</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="doj">Date of Joining{!! required() !!}</label>
                                                <input type="date" name="doj" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="gender">Gender{!! required() !!}</label>
                                                <select name="gender" id="gender" class="onboard-form form-control" required >
                                                    <option value="">Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="mobile_no">Mobile Number{!! required() !!}</label>
                                                <input type="number" name="mobile_no" minlength="10" maxlength="10" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="email">Email ID{!! required() !!}</label>
                                                <input type="email" name="email" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="aadhar">Aadhaar Number<span id="aadhar_req">{!! required() !!}</span></label>
                                                <input type="number" name="aadhar" id="aadhar" pattern="aadhar" class="onboard-form form-control" required />
                                                <label class="error aadhar_label" for="aadhar" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="pan_no">Pan Card Number<span id="pan_no_req">{!! required() !!}</span></label>
                                                <input type="text" name="pan_no" id="pan_no" class="onboard-form form-control pan" pattern="pan" required />
                                                <label class="error pan_no_label" id="pan_no_label" for="pan_no" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="pan_ack">Pan Acknowlegement<span id="pan_ack_req">{!! required() !!}</span></label>
                                                <input type="text" name="pan_ack" id="pan_ack" class="onboard-form form-control not-required validate" />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="dl_no">DL Number</label>
                                                <input type="text" name="dl_no" class="onboard-form form-control not-required validate" pattern="dl" />
                                                <label class="error dl_no_label" for="dl_no" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="passport_no">Passport Number<span id="passport_no_req">{!! required() !!}</span></label>
                                                <input type="text" name="passport_no" pattern="passport" id="passport_no" class="onboard-form form-control not-required validate" />
                                                <label class="error passport_no_label" for="passport_no" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="passport_exp">Passport Exp Date<span id="passport_exp_req">{!! required() !!}</span></label>
                                                <input type="date" name="passport_exp" min="{{date('Y-m-d')}}" id="passport_exp" class="onboard-form form-control not-required validate" />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="nationality">Nationality{!! required() !!}</label>
                                                <select name="nationality" id="nationality" class="onboard-form form-control" required >
                                                    <option value="indian">Indian</option>
                                                    <option value="other_country">Other Nationality</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="blood_group">Blood Group</label>
                                                <select name="blood_group" class="onboard-form form-control not-required validate" >
                                                    <option value="">Select</option>
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
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="physically_challenged">Physically Challenged</label>
                                                <select name="physically_challenged" class="onboard-form form-control" required >
                                                    <option value="">Select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="bank_name">Bank Name</label>
                                                <select name="bank_name" id="bank_name" class="onboard-form form-control" required>
                                                    <option value="">Select</option>
                                                    @foreach($bank as $b)
                                                    <option value="{{$b->bank_name}}" min-data="{{$b->min_length}}" max-data="{{$b->max_length}}">{{$b->bank_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="account_no">Account Number</label>
                                                <input type="number" name="account_no" id="account_no" class="onboard-form form-control" minlength="10" maxlength="10" required />
                                                <label class="error account_no_label" for="account_no" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="bank_ifsc">Bank IFSC Code</label>
                                                <input type="text" name="bank_ifsc" pattern="ifsc" class="onboard-form form-control" required />
                                                <label class="error bank_ifsc_label" for="bank_ifsc" style="display: none;"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-12 text-right p-0">
                                            <button type="button" data="row-1" next="row-2" name="next" class="next bg-pink action-button text-center" value="Next">Next
                                                <i class="text-white fa fa-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                </fieldset>
                                <fieldset class="mt-5">
                                    <legend><span>Location Details</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 mt-3 mb-3">
                                                <label class="" for="current_address">Current Address{!! required() !!}</label>
                                                <input type="text" name="current_address" id="current_address" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="current_city">Current City{!! required() !!}</label>
                                                <input type="text" name="current_city" id="current_city" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="current_state">Current State{!! required() !!}</label>
                                                <select name="current_state" id="current_state" class="onboard-form form-control" required >
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="current_pincode">Current Pincode{!! required() !!}</label>
                                                <input type="number" name="current_pincode" id="current_pincode" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <!-- <input type="text" name="curent_district" class="onboard-form form-control" required /> -->
                                                <label class="" for="curent_district">Country{!! required() !!}</label>
                                                <select name="current_district" id="current_district" class="onboard-form form-control" required >
                                                    @foreach($countries as $data)
                                                    <option value="{{$data->country_code}}">{{$data->country_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-12 mt-3 mb-3">
                                                <input type="checkbox" name="current_address_copy" id="current_address_copy" style="width:auto;"/>
                                                <label for="current_address_copy">Copy current address to the permanent address{!! required() !!}</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 mt-3 mb-3">
                                                <label class="" for="permanent_address">Permanent Address{!! required() !!}</label>
                                                <input type="text" name="permanent_address" id="permanent_address" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="permanent_city">Permanent City{!! required() !!}</label>
                                                <input type="text" name="permanent_city" id="permanent_city" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="permanent_state">Permanent State{!! required() !!}</label>
                                                <select name="permanent_state" id="permanent_state" class="onboard-form form-control" required >
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="permanent_pincode">Permanent Pincode{!! required() !!}</label>
                                                <input type="number" name="permanent_pincode" id="permanent_pincode" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <!-- <input type="text" name="permanent_district" class="onboard-form form-control" required /> -->
                                                <label class="" for="permanent_district">Permanent Country{!! required() !!}</label>
                                                <select name="permanent_district" id="permanent_district" class="onboard-form form-control" required >
                                                    @foreach($countries as $data)
                                                    <option value="{{$data->country_code}}">{{$data->country_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-6 text-left p-0">
                                            <a type="button" data="row-2" prev="row-1" name="previous" class="previous bg-pink  action-button text-center" value="Previous">
                                                <i class="text-white fa fa-arrow-left mr-2"></i>Previous
                                            </a>
                                        </div>
                                        <div class="col-6 text-right p-0">
                                            <button type="button" data="row-2" next="row-3" name="next" class="next bg-pink action-button text-center" value="Next">Next
                                                <i class="text-white fa fa-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                </fieldset>
                                <fieldset class="mt-5">
                                    <legend><span>Official Details</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="department">Department{!! required() !!}</label>
                                                <select name="department" id="department" class="onboard-form form-control" required>
                                                    <option value="">Select</option>
                                                    @foreach($emp as $e)
                                                    <option value="{{$e->department}}">{{$e->department}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="process">Process{!! required() !!}</label>
                                                <select name="process" id="process" class="onboard-form form-control" required>
                                                    <option value="">Select</option>
                                                    @foreach($emp as $e)
                                                    <option value="{{$e->process}}">{{$e->process}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="designation">Designation{!! required() !!}</label>
                                                <input type="text" name="designation" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="cost_center">Cost Center{!! required() !!}</label>
                                                <input type="text" name="cost_center" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="confirmation_period">Probabition Period{!! required() !!}</label>
                                                <select name="confirmation_period" class="onboard-form form-control not-required validate" >
                                                    <option value="">Select</option>
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
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="work_location">Work Location{!! required() !!}</label>
                                                <input type="text" name="work_location" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="l1_manager_code">Reporting Manager Employee Code{!! required() !!}</label>
                                                <input type="text" name="l1_manager_code" class="onboard-form form-control" required />
                                            </div>
                                            <!-- <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_designation" class="onboard-form form-control" required />
                                                <label class="" for="l1_manager_designation">Reporting Manager
                                                    Designation{!! required() !!}</label>
                                            </div> -->
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="l1_manager_name">Reporting Manager Name{!! required() !!}</label>
                                                <input type="text" name="l1_manager_name" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="holiday_location">Holiday Location{!! required() !!}</label>
                                                <input type="text" name="holiday_location" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="officical_mail">Official E-Mail Id{!! required() !!}</label>
                                                <input type="email" name="officical_mail" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="official_mobile">Official Mobile{!! required() !!}</label>
                                                <input type="number" minlength="10" maxlength="10" name="official_mobile" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="emp_notice">Employee Notice Period Days{!! required() !!}</label>
                                                <input type="number" name="emp_notice" class="onboard-form form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-3" prev="row-2"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-3"
                                                next="row-4" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div> -->
                                </fieldset>
                                <fieldset class="mt-5">
                                    <legend><span>Family Details</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="father_name">Father Name{!! required() !!}</label>
                                                <input type="text" name="father_name" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="mother_name">Mother Name{!! required() !!}</label>
                                                <input type="text" name="mother_name" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="dow">Date of Wedding<span id="dow_req">{!! required() !!}</span></label>
                                                <input type="date" name="dow" class="onboard-form form-control spouse_data" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="spouse_name">Spouse Name<span id="spouse_name_req">{!! required() !!}</span></label>
                                                <input type="text" name="spouse_name" class="onboard-form form-control spouse_data" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="spouse_gender">Spouse Gender<span id="spouse_gender_req">{!! required() !!}</span></label>
                                                <select name="spouse_gender" id="spouse_gender" class="onboard-form form-control spouse_data" required >
                                                    <option value="">Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="spouse_dob">Spouse DOB<span id="spouse_dob_req">{!! required() !!}</span></label>
                                                <input type="date" name="spouse_dob" class="onboard-form form-control spouse_data" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="no_child">Number of Children<span id="no_child_req">{!! required() !!}</span></label>
                                                <select name="no_child" id="no_child" class="onboard-form form-control spouse_data" required >
                                                    <option value="">Select</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="children_container row">
                                                <!-- <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                    <label class="" for="child_name">Children Name</label>
                                                    <input type="text" name="child_name" class="onboard-form form-control spouse_data" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                    <label class="" for="child_dob">Children DOB</label>
                                                    <input type="date" name="child_dob" class="onboard-form form-control spouse_data" required />
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                    <label class="" for="child_gender">Children Gender</label>
                                                    <select name="child_gender" class="onboard-form form-control spouse_data" required >
                                                        <option value="">Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-4" prev="row-3"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-4"
                                                next="row-5" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div> -->
                                </fieldset>
                                <fieldset class="mt-5">
                                    <legend><span>Compensatory</span></legend>
                                    <div class="form-card">

                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="basic">Basic Salary{!! required() !!}</label>
                                                <input type="number" name="basic" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="hra">HRA{!! required() !!}</label>
                                                <input type="number" name="hra" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="Statutory_bonus">Statutory Bonus{!! required() !!}</label>
                                                <input type="number" name="Statutory_bonus" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="child_education_allowance">Child Education Allowance{!! required() !!}</label>
                                                <input type="number" name="child_education_allowance" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="food_coupon">Food Coupon{!! required() !!}</label>
                                                <input type="number" name="food_coupon" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="lta">LTA{!! required() !!}</label>
                                                <input type="number" name="lta" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="special_allowance">Special Allowance{!! required() !!}</label>
                                                <input type="number" name="special_allowance" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="other_allowance">Other Allowance{!! required() !!}</label>
                                                <input type="number" name="other_allowance" class="onboard-form form-control calculation_data gross_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="gross">Gross Salary{!! required() !!}</label>
                                                <input type="number" name="gross" id="gross" class="onboard-form form-control" step="0.01" required readOnly/>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="epf_employer_contribution">EPF employer contribution{!! required() !!}</label>
                                                <input type="number" name="epf_employer_contribution" class="onboard-form form-control calculation_data cic_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="esic_employer_contribution">ESIC employer contribution{!! required() !!}</label>
                                                <input type="number" name="esic_employer_contribution" class="onboard-form form-control calculation_data cic_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="insurance">Insurance{!! required() !!}</label>
                                                <input type="number" name="insurance" class="onboard-form form-control calculation_data cic_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="graduity">Graduity{!! required() !!}</label>
                                                <input type="number" name="graduity" class="onboard-form form-control calculation_data cic_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="cic">Cost of Company{!! required() !!}</label>
                                                <input type="number" name="cic" id="cic" class="onboard-form form-control" step="0.01" required readOnly/>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="epf_employee">EPF Employee{!! required() !!}</label>
                                                <input type="number" name="epf_employee" class="onboard-form form-control calculation_data net_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="esic_employee">ESIC Employee{!! required() !!}</label>
                                                <input type="number" name="esic_employee" class="onboard-form form-control calculation_data net_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="professional_tax">Professional Tax{!! required() !!}</label>
                                                <input type="number" name="professional_tax" class="onboard-form form-control calculation_data net_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="labour_welfare_fund">labour welfare fund{!! required() !!}</label>
                                                <input type="number" name="labour_welfare_fund" class="onboard-form form-control calculation_data net_data" step="0.01" required />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <label class="" for="net_income">Net Income{!! required() !!}</label>
                                                <input type="number" name="net_income" id="net_income" class="onboard-form form-control" step="0.01" required readOnly/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-5" prev="row-4"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-5"
                                                next="row-6" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div> -->
                                </fieldset>
                                <fieldset class="mt-5">
                                    <legend><span>Personal Documents</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-12 mt-3 mb-3">
                                                <input type="checkbox" name="aadhar_backend" id="aadhar_backend" style="width:auto;"/>
                                                <label for="aadhar_backend">Upload aadhar backend</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="aadhar_card">Aadhar Card{!! required() !!}</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="aadhar_card" class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3" id="aadhar_card_backend_content" style="display:none;">
                                                <label class="" for="aadhar_card_backend">Aadhar Card Backend<span id="aadhar_card_backend_req">{!! required() !!}</span></label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="aadhar_card_backend" id="aadhar_card_backend" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="pan_card">Pan Card{!! required() !!}</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="pan_card" class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="passport">Passport{!! required() !!}</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="passport" class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="voters_id">Voters ID</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="voters_id" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="dl_file">Driving License</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="dl_file" class="onboard-form form-control files" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="education_certificate">Educations Certificate{!! required() !!}</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="education_certificate" class="onboard-form form-control files" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <label class="" for="reliving_letter">Reliving Letter</label>
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="reliving_letter" class="onboard-form form-control files" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <!-- <a type="button" data="row-6" prev="row-5" name="previous" class="previous bg-pink action-button text-center" value="Previous">
                                                <i class="text-white fa fa-arrow-left mr-2"></i>Previous
                                            </a> -->
                                        </div>
                                        <div class="col-6 text-right"><button type="submit"
                                                data="row-6" next="row-6" name="next"
                                                class="bg-pink action-button  text-center" value="Submit">Submit</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <!--Main Content-->

</div>

<!-- Vertically Centered -->
<div class="modal fade" id="notificationModal" role="dialog" aria-hidden="true" style="opacity:1; display:none;">
    <div class="modal-dialog modal-md modal-dialog-centered" id="" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-content">
            <div class="modal-header py-2 bg-primary">

                <div class="w-100 modal-header-content d-flex align-items-center py-2">
                    <h5 class="modal-title text-white" id="modalHeader">Failure
                    </h5>
                    <button 
                        type="button" 
                        class="btn-close btn-close-white close-modal" data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mt-4">
                    <h4 class="mb-3" id="modalNot">Data Saved Successfully!</h4>
                    <p class="text-muted mb-4" id="modalBody"></p>
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<!--Custom Js Script-->
<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- <script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script> -->

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>






<script>
$(document).ready(function(){
    $('#process').select2({
		width: '100%',
    });
    $('#department').select2({
		width: '100%',
    });
});

$('#aadhar_backend').click(function() {
    if ($('#aadhar_backend').is(':checked')) {
        $('#aadhar_card_backend_content').show();
        $('#aadhar_card_backend').attr('require', true);
        $('#aadhar_card_backend_req').show();
    } else {
        $('#aadhar_card_backend_content').hide();
        $('#aadhar_card_backend').removeAttr('require');
        $('#aadhar_card_backend_req').hide();
    }
});

$('.calculation_data').keyup(function() {
    var gross = 0;
    var cic = 0;
    var net = 0;
    $.each($('.gross_data'),function(value) {
        if ($(this).val()) {
            gross += parseInt($(this).val());
        }
    });
    $.each($('.cic_data'),function(value) {
        if ($(this).val()) {
            cic += parseInt($(this).val());
        }
    });
    $.each($('.net_data'),function(value) {
        if ($(this).val()) {
            net += parseInt($(this).val());
        }
    });
    console.log(gross);
    $('#gross').val(gross);
    $('#cic').val(gross+cic);
    $('#net_income').val(gross-cic+net);
});

$('#bank_name').change(function() {
    var min = $('#bank_name option:selected').attr('min-data');
    var max = $('#bank_name option:selected').attr('max-data');
    $('#account_no').attr('minlength', min);
    $('#account_no').attr('maxlength', min);
})

$('body').on('click', '.close-modal', function() {
    $('#notificationModal').hide();
    $('#notificationModal').addClass('fade');
});

$('.onboard-form').keyup(function() {
    this.value = this.value.toLocaleUpperCase();
}).trigger('keyup');

$('#pan_ack').keyup(function() {
    if ($('#pan_ack').val() == '') {
        $('#pan_ack').removeAttr('required');
        $('#pan_no').removeAttr('disabled');
        $('#pan_no').attr('required', true);
        $('#pan_no_req').show();
        $('#pan_no').attr('pattern', 'pan');
        $('#pan_no_label').addClass('patternErr');
        $('#pan_ack').addClass('not-required validate');
        $('#pan_ack_req').hide();
    } else {
        $('#pan_no').removeAttr('required');
        $('#pan_no').val('');
        $('#pan_no').attr('disabled', true);
        $('#pan_no').removeAttr('pattern');
        $('#pan_ack').attr('required', true);
        $('#pan_ack_req').show();
        $('#pan_no_label').removeClass('patternErr');
        $('#pan_no_label').hide();
        $('#pan_ack').removeClass('not-required validate');
        $('#pan_no_req').hide();
    }
})

$('#no_child').change(function() {
    var val = $('#no_child').val();
    var data = "";
    for(var i=1; i<=val; i++) {
        var childName = $('input[name="child_name'+i+'"]').val();
        var childDob = $('input[name="child_dob'+i+'"]').val();
        var childGender = $('input[name="child_gender'+i+'"]').val();
        data = data+"<div class='col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3'><label class='' for='child_name"+i+"'>Children Name</label><input type='text' name='child_name[]' id='child_name"+i+"' class='onboard-form form-control spouse_data' required /></div><div class='col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3'><label class='' for='child_dob"+i+"'>Children DOB</label><input type='date' name='child_dob[]' id='child_dob"+i+"' class='onboard-form form-control spouse_data' required /></div><div class='col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3'><label class='' for='child_gender"+i+"'>Children Gender</label><select name='child_gender[]' id='child_gender"+i+"' class='onboard-form form-control spouse_data' required ><option value=''>Select</option><option value='male'>Male</option><option value='female'>Female</option><option value='other'>Other</option></select></div>";
    }
    $('.children_container').html(data);
});

$('#marital_status').change(function() {
    if ($('#marital_status').val() == 'single') {
        $.each($('.spouse_data'),function(value) {
            var name = $(this).attr('name');
            if ($('input[name="'+name+'"]').val() == '') {
                $('.'+name+'_label').hide();
            }
            $(this).attr('disabled', true);
            $(this).removeAttr('required');
            $(this).addClass('not-required validate');
            $('#spouse_gender').val('');
            $('#'+name+'_req').hide();
        });
    } else {
        $.each($('.spouse_data'),function(value) {
            var name = $(this).attr('name');
            $(this).removeAttr('disabled');
            $(this).attr('required', true);
            $(this).removeClass('not-required validate');
            $('#'+name+'_req').show();
        });
        if ($('#gender').val() == 'male') {
            $('#spouse_gender').val('female');
        } else {
            $('#spouse_gender').val('male');
        }
    }
});

$('#gender').change(function() {
    if ($('#marital_status').val() == 'single') {
        $('#spouse_gender').val('');
    } else {
        if ($('#gender').val() == 'male') {
            $('#spouse_gender').val('female');
        } else {
            $('#spouse_gender').val('male');
        }
    }
});

$('#nationality').change(function() {
    if ($('#nationality').val() == 'indian') {
        $('#passport_no').removeAttr('required');
        $('#passport_no_req').hide();
        if ($('#passport_no').val() == '') {
            $('.passport_no_label').hide();
        }
        $('#passport_no').addClass('not-required validate');
        $('#passport_exp').addClass('not-required validate');
        $('#passport_exp').removeAttr('required');
        $('#passport_exp_req').hide();
        $('.passport_exp_label').hide();
        $('#aadhar').attr('required', true);
        $('#aadhar_req').show();
        $('#aadhar').removeClass('not-required validate');
        $('#permanent_pincode').attr('type', 'number');
        $('#current_pincode').attr('type', 'number');
        $('#current_district').val('IN');
        stateFunction('IN', '#current_state');
    } else {
        $('#passport_no').attr('required', true);
        $('#passport_no_req').show();
        $('#passport_exp_req').show();
        $('#passport_no').removeClass('not-required validate');
        $('#passport_exp').removeClass('not-required validate');
        $('#passport_exp').attr('required', true);
        $('#aadhar').removeAttr('required');
        if ($('#aadhar').val() == '') {
            $('.aadhar_label').hide();
        }
        $('#permanent_pincode').attr('type', 'text');
        $('#current_pincode').attr('type', 'text');
        $('#aadhar').addClass('not-required validate');
        $('#aadhar_req').hide();
        $('#current_district').val('AF');
        stateFunction('AF', '#current_state');
    }
});

$('#nationality').val('indian');
$('#passport_no_req').hide();
$('#passport_exp_req').hide();
$('#permanent_district').val('IN');
$('#current_district').val('IN');
stateFunction('IN', '#current_state');
stateFunction('IN', '#permanent_state');

$('#current_address_copy').change(function() {
    if ($('#current_address_copy').is(':checked')) {
        stateFunction($('#current_district').val(), '#permanent_state');
        $('#permanent_pincode').val($('#current_pincode').val());
        $('#permanent_district').val($('#current_district').val());
        $('#permanent_state').val($('#current_state').val());
        $('#permanent_city').val($('#current_city').val());
        $('#permanent_address').val($('#current_address').val());
    } else {
        $('#permanent_pincode').val('');
        $('#permanent_district').val('');
        $('#permanent_state').val('');
        $('#permanent_city').val('');
        $('#permanent_address').val('');
    }
});

function stateFunction(id, dataId) {
    $(dataId).empty();
    $.ajax({
        url: "{{route('state')}}", 
        type: "POST", 
        data: {
            code: id,
            _token: '{{csrf_token()}}' 
        },
        success: function(data)
        {
            $.each(data,function(key,value){
                $(dataId).append('<option value="'+value.id+'">'+value.state_name+'</option>');
            });
        }
    });
}

$('#permanent_district').change(function(){
    var id = $(this).val();
    stateFunction(id, '#permanent_state');
});

$('#current_district').change(function(){
    var id = $(this).val();
    stateFunction(id, '#current_state');
});


$('#form-1').on('submit', function(e){
        e.preventDefault();
        
        var form_data1 = new FormData(document.getElementById("form-1"));
        // var form_data2 = new FormData(document.getElementById("form-2"));
        // var form_data3 = new FormData(document.getElementById("form-3"));
        // var form_data4 = new FormData(document.getElementById("form-4"));
        // var form_data5 = new FormData(document.getElementById("form-5"));
        // for (var pair of form_data2.entries()) {    
        //     form_data1.append(pair[0], pair[1]);
        // }
        // for (var pair of form_data3.entries()) {    
        //     form_data1.append(pair[0], pair[1]);
        // }
        // for (var pair of form_data4.entries()) {    
        //     form_data1.append(pair[0], pair[1]);
        // }
        // for (var pair of form_data5.entries()) {    
        //     form_data1.append(pair[0], pair[1]);
        // }
        $.ajax({
            url: "{{url('vmt-employee-onboard')}}", 
            type: "POST", 
            dataType : "json",
            data: form_data1,
            contentType: false,
            processData: false,
            success: function(data)
            {
                // if (data.responseText == "Saved") {
                //     $('#modalHeader').html(data);
                //     $('#modalNot').html("Employee Onboarding success");                
                //     $('#modalBody').html("Mail notification sent.");
                //     $('#notificationModal').show();
                //     $('#notificationModal').removeClass('fade');
                // } else {
                //     $('#modalHeader').html(data);
                //     $('#modalNot').html("Failed to save Data");                
                //     //$('#modalBody').html("Request to the server failed");
                //     $('#notificationModal').show();
                //     $('#notificationModal').removeClass('fade');
                // }
                // console.log(data);
                
                //alert(data);
            },
            error : function(data) { //NEED TO FIX IT
                // console.log('error');
                if (data.responseText == "Saved") {
                    $('#modalHeader').html(data);
                    $('#modalNot').html("Employee Onboarding success");                
                    $('#modalBody').html("Mail notification sent.");
                    $('#notificationModal').show();
                    $('#notificationModal').removeClass('fade');
                } else {
                    $('#modalHeader').html(data);
                    $('#modalNot').html("Failed to save Data");                
                    //$('#modalBody').html("Request to the server failed");
                    $('#notificationModal').show();
                    $('#notificationModal').removeClass('fade');
                }
                //var result = $.parseJSON(data);
                //alert("Server request failed "+result['message']);
                //alert(data['message']);
                // $('#modalHeader').html(data);
                // $('#modalNot').html("Failed to save Data");                
                // //$('#modalBody').html("Request to the server failed");
                // $('#notificationModal').show();
                // $('#notificationModal').removeClass('fade');

                //alert("Server request failed !");

            }
        });
    });

</script>


@endsection