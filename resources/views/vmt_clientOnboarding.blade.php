@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">


@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Client Onboarding @endslot
@endcomponent

<div class="main">

    <div class="container-fluid">
        <div class="card mt-4 p-5">

            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <div class="p-3">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong class="f-9">Client Details</strong></li>
                                <li id="end"><strong class="f-9">Authorized Details</strong></li>
                            </ul>
                            <fieldset id="row-1">
                                <form id="form-1">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                            <input type="text" name="client_code" class="onboard-form" required />
                                                <label class="fieldlabels" for="client_code ">Client Code</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="client_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="client_name">Legal Name of the Company</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="csd" class="onboard-form" required />
                                                <label class="fieldlabels" for="csd">Contract Start Date</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="ced" class="onboard-form" required />
                                                <label class="fieldlabels" for="ced">Contract End Date</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="cin_no" class="onboard-form" pattern="alp-num" required />
                                                <label class="error cin_no_label" for="cin_no" style="display: none;"></label>
                                                <label class="fieldlabels" for="cin_no">Company Identification Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="com_tan" class="onboard-form" pattern="alp-num" required />
                                                <label class="error com_tan_label" for="com_tan" style="display: none;"></label>
                                                <label class="fieldlabels" for="com_tan">Company TAN</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="com_pan" class="onboard-form" pattern="alp-num" required />
                                                <label class="error com_pan_label" for="com_pan" style="display: none;"></label>
                                                <label class="fieldlabels" for="com_pan">Company PAN</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="gst_no" class="onboard-form" pattern="gst" required />
                                                <label class="error gst_no_label" for="gst_no" style="display: none;"></label>
                                                <label class="fieldlabels" for="gst_no">GST No</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="epf" class="onboard-form" pattern="alp-num" required />
                                                <label class="error epf_label" for="epf" style="display: none;"></label>
                                                <label class="fieldlabels" for="epf">EPF Registration Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="esic" class="onboard-form" pattern="alp-num" required />
                                                <label class="error esic_label" for="esic" style="display: none;"></label>
                                                <label class="fieldlabels" for="esic">ESIC Registration Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="professional_tax" class="onboard-form" pattern="alp-num" required />
                                                <label class="error professional_tax_label" for="professional_tax" style="display: none;"></label>
                                                <label class="fieldlabels" for="professional_tax">Professional Tax Registration Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="lwf" class="onboard-form" pattern="alp-num" required />
                                                <label class="error lwf_label" for="lwf" style="display: none;"></label>
                                                <label class="fieldlabels" for="lwf">LWF Registration Number</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right p-0">
                                            <button type="button" data="row-1" next="row-2" name="next" class="next bg-pink action-button text-center" value="Next">Next
                                                <i class="text-white fa fa-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>

                            <fieldset id="row-2">
                                <form id="form-2">
                                    @csrf
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="auth_person_name" class="onboard-form" pattern="alpha" required />
                                                <label class="error auth_person_name_label" for="auth_person_name" style="display: none;"></label>
                                                <label class="fieldlabels" for="auth_person_name">Authorized Person Name</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="auth_person_desig" class="onboard-form" pattern="alpha" required />
                                                <label class="error auth_person_desig_label" for="auth_person_desig" style="display: none;"></label>
                                                <label class="fieldlabels" for="auth_person_desig">Authorized Person Designation</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="number" minlength="10" maxlength="10" name="auth_person_contact" class="onboard-form" required />
                                                <label class="fieldlabels" for="auth_person_contact">Authorized Person Contact Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="email" name="auth_person_email" class="onboard-form" required />
                                                <label class="fieldlabels" for="auth_person_email">Authorized Person Contact Email</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <input type="text" name="billing_add" class="onboard-form" required />
                                                <label class="fieldlabels" for="billing_add">Billing Address</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <input type="text" name="shipping_add" class="onboard-form" required />
                                                <label class="fieldlabels" for="shipping_add">Shipping Address</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <input type="file" name="documents_upload" class="onboard-form" required accept="pdf" />
                                                <label class="fieldlabels" for="documents_upload">Documents Upload</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <select class="onboard-form  drop_down mt-2" required>
                                                    <option value="">Recruitment</option>
                                                    <option value="">Payroll</option>
                                                    <option value="">Statutory Complainces</option>
                                                    <option value="">Staffing</option>
                                                    <option value="">PMS</option>
                                                    <option value="">Accounting</option>
                                                    <option value="">ROC Complainces</option>
                                                    <option value="">Trade Mark</option>
                                                    <option value="">Patent Right</option>
                                                </select>
                                                <label class="fieldlabels" for="documents_upload">Product</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <select class="onboard-form drop_down mt-2" required>
                                                    <option value="">Monthly</option>
                                                    <option value="">Quarterly</option>
                                                    <option value="">BiAnnually</option>
                                                    <option value="">Annually</option>
                                                </select>
                                                <label class="fieldlabels" for="subscription_type">Subscription Type</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0">
                                            <a type="button" data="row-5" prev="row-4" name="previous" class="previous bg-pink action-button text-center" value="Previous">
                                                <i class="text-white fa fa-arrow-left mr-2"></i>Previous
                                            </a>
                                        </div>
                                        <div class="col-6 text-right p-0">
                                            <button type="submit" class="bg-pink action-button text-center" value="Submit">Submit</button>
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


<!-- for validating -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script>


@endsection