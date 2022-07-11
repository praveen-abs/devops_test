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
                            <!-- <ul id="progressbar">
                                <li class="active" id="account"><strong class="f-9">Client Details</strong></li>
                                <li id="endClientForm"><strong class="f-9 onboard-detail" >Authorized Details</strong></li>
                            </ul> -->
                            <form id="form-1" enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <legend><span>Client Details</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="client_code ">Client Code{!! required() !!}</label>
                                                <input type="text" name="client_code" id="client_code" placeholder="Autogenerate from Company Legal Name" class="onboard-form form-control" required readonly/>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="client_name">Legal Name of the Company{!! required() !!}</label>
                                                <input type="text" name="client_name" id="client_name" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="csd">Contract Start Date{!! required() !!}</label>
                                                <input type="date" name="csd" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="ced">Contract End Date{!! required() !!}</label>
                                                <input type="date" name="ced" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="cin_no">Company Identification Number{!! required() !!}</label>
                                                <input type="text" name="cin_no" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error cin_no_label" for="cin_no" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="com_tan">Company TAN{!! required() !!}</label>
                                                <input type="text" name="com_tan" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error com_tan_label" for="com_tan" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="com_pan">Company PAN{!! required() !!}</label>
                                                <input type="text" name="com_pan" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error com_pan_label" for="com_pan" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="gst_no">GST No{!! required() !!}</label>
                                                <input type="text" name="gst_no" class="onboard-form form-control" pattern="gst" required />
                                                <label class="error gst_no_label" for="gst_no" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="epf">EPF Registration Number{!! required() !!}</label>
                                                <input type="text" name="epf" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error epf_label" for="epf" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="esic">ESIC Registration Number{!! required() !!}</label>
                                                <input type="text" name="esic" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error esic_label" for="esic" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="professional_tax">Professional Tax Registration Number{!! required() !!}</label>
                                                <input type="text" name="professional_tax" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error professional_tax_label" for="professional_tax" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="lwf">LWF Registration Number{!! required() !!}</label>
                                                <input type="text" name="lwf" class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error lwf_label" for="lwf" style="display: none;"></label>
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
                                    <legend><span>Authorized Details</span></legend>
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="auth_person_name">Authorized Person Name{!! required() !!}</label>
                                                <input type="text" name="auth_person_name" class="onboard-form form-control" pattern="alpha" required />
                                                <label class="error auth_person_name_label" for="auth_person_name" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="auth_person_desig">Authorized Person Designation{!! required() !!}</label>
                                                <input type="text" name="auth_person_desig" class="onboard-form form-control" pattern="alpha" required />
                                                <label class="error auth_person_desig_label" for="auth_person_desig" style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="auth_person_contact">Authorized Person Contact Number{!! required() !!}</label>
                                                <input type="number" minlength="10" maxlength="10" name="auth_person_contact" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <label class="" for="auth_person_email">Authorized Person Contact Email{!! required() !!}</label>
                                                <input type="email" name="auth_person_email" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <label class="" for="billing_add">Billing Address{!! required() !!}</label>
                                                <input type="text" name="billing_add" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <label class="" for="shipping_add">Shipping Address{!! required() !!}</label>
                                                <input type="text" name="shipping_add" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <label class="" for="doc_uploads">Documents Upload{!! required() !!}</label>
                                                <input type="file" name="doc_uploads" class="onboard-form form-control" required accept="image/*" />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <label class="" for="product">Product{!! required() !!}</label>
                                                <select name="product" class="onboard-form form-control  drop_down mt-2" required>
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
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">
                                                <label class="" for="subscription_type">Subscription Type{!! required() !!}</label>
                                                <select name="subscription_type" class="onboard-form form-control drop_down mt-2" required>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Quarterly">Quarterly</option>
                                                    <option value="BiAnnually">BiAnnually</option>
                                                    <option value="Annually">Annually</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <!-- <a type="button" data="row-2" prev="row-1" name="previous" class="previous bg-pink action-button text-center" value="Previous">
                                                <i class="text-white fa fa-arrow-left mr-2"></i>Previous
                                            </a> -->
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="bg-pink action-button text-center" value="Submit">Submit</button>
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
<script>


    $('#client_name').keyup(function() {
        var val = $(this).val();
        if (val.length <= 4) {
            $('#client_code').val(val);
        }
    });

    $('.onboard-form').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    }).trigger('keyup');


    $('#form-1').on('submit', function(e){
        e.preventDefault();
        
        var form_data1 = new FormData(document.getElementById("form-1"));
        // var form_data2 = new FormData(document.getElementById("form-2"));
        // for (var pair of form_data2.entries()) {
        //     form_data1.append(pair[0], pair[1]);
        // }
        $.ajax({
            url: "{{url('vmt_clientOnboarding')}}", 
            type: "POST", 
            dataType : "json",
            data: form_data1,
            contentType: false,
            processData: false,
            success: function(data)
            {
                alert(data);
            }
        });


        //console.log(personalData);
        //console.log(locationData);
        //console.log(officeData);
        //console.log(familyData);
        //console.log(statutoryData);
    });

</script>

@endsection