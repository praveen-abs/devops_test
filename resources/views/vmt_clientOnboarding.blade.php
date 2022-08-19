@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">

@endsection

@section('content')
    @component('components.configuration_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent


        <div class="client-onboard-wrapper mt-8 ">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                    <div id="msform">
                        <!-- progressbar -->
                        <!-- <ul id="progressbar">
                                    <li class="active" id="account"><strong class="f-9">Client Details</strong></li>
                                    <li id="endClientForm"><strong class="f-9 onboard-detail" >Authorized Details</strong></li>
                                </ul> -->
                        <form id="form-1" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow  profile-box card-top-border">
                                <div class="card-body justify-content-center align-items-center mb-2">
                                    <div class="form-card p-2">
                                        <div class="text-primary header-card-text">
                                            <h6>Client Details</h6>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="client_code ">Client Code{!! required() !!}</label> -->
                                                <input type="text" placeholder="Client Code" name="client_code"
                                                    id="client_code" placeholder="Autogenerate from Company Legal Name"
                                                    class="onboard-form form-control" required readonly />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="client_name">Legal Name of the Company{!! required() !!}</label> -->
                                                <input type="text" placeholder="Legal Name of the Company"
                                                    name="client_name" id="client_name" class="onboard-form form-control"
                                                    required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="csd">Contract Start Date{!! required() !!}</label> -->
                                                <input type="text" max="9999-12-31" placeholder="Contract Start Date"
                                                    name="csd" class="onboard-form form-control"
                                                    onfocus="(this.type='date')" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="ced">Contract End Date{!! required() !!}</label> -->
                                                <input type="text" max="9999-12-31" placeholder="Contract End Date"
                                                    name="ced" class="onboard-form form-control"
                                                    onfocus="(this.type='date')" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="cin_no">Company Identification Number{!! required() !!}</label> -->
                                                <input type="text" placeholder="Company Identification Number"
                                                    name="cin_no" class="onboard-form form-control" pattern="alp-num"
                                                    required />
                                                <label class="error cin_no_label" for="cin_no"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="com_tan">Company TAN{!! required() !!}</label> -->
                                                <input type="text" placeholder="Company TAN" name="com_tan"
                                                    class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error com_tan_label" for="com_tan"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="com_pan">Company PAN{!! required() !!}</label> -->
                                                <input type="text" placeholder="Company PAN" name="com_pan"
                                                    class="onboard-form form-control" pattern="alp-num" required />
                                                <label class="error com_pan_label" for="com_pan"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="gst_no">GST No{!! required() !!}</label> -->
                                                <input type="text" placeholder="GST No" name="gst_no"
                                                    class="onboard-form form-control" pattern="gst" required />
                                                <label class="error gst_no_label" for="gst_no"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="epf">EPF Registration Number{!! required() !!}</label> -->
                                                <input type="text" placeholder="EPF Registration Number"
                                                    name="epf" class="onboard-form form-control" pattern="alp-num"
                                                    required />
                                                <label class="error epf_label" for="epf"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="esic">ESIC Registration Number{!! required() !!}</label> -->
                                                <input type="text" placeholder="ESIC Registration Number"
                                                    name="esic" class="onboard-form form-control" pattern="alp-num"
                                                    required />
                                                <label class="error esic_label" for="esic"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="professional_tax">Professional Tax Registration Number{!! required() !!}</label> -->
                                                <input type="text" placeholder="Professional Tax Registration Number"
                                                    name="professional_tax" class="onboard-form form-control"
                                                    pattern="alp-num" required />
                                                <label class="error professional_tax_label" for="professional_tax"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="lwf">LWF Registration Number{!! required() !!}</label> -->
                                                <input type="text" placeholder="LWF Registration Number"
                                                    name="lwf" class="onboard-form form-control" pattern="alp-num"
                                                    required />
                                                <label class="error lwf_label" for="lwf"
                                                    style="display: none;"></label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card shadow  profile-box card-top-border ">
                                <div class="card-body justify-content-center align-items-center">
                                    <div class="form-card mb-2 p-2">
                                        <div class="text-primary  header-card-text">
                                            <h6>Authorized Details</h6>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="auth_person_name">Authorized Person Name{!! required() !!}</label> -->
                                                <input type="text" placeholder="Authorized Person Name"
                                                    name="auth_person_name" class="onboard-form form-control"
                                                    pattern="alpha" required />
                                                <label class="error auth_person_name_label" for="auth_person_name"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="auth_person_desig">Authorized Person Designation{!! required() !!}</label> -->
                                                <input type="text" placeholder="Authorized Person Designation"
                                                    name="auth_person_desig" class="onboard-form form-control"
                                                    pattern="alpha" required />
                                                <label class="error auth_person_desig_label" for="auth_person_desig"
                                                    style="display: none;"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="auth_person_contact">Authorized Person Contact Number{!! required() !!}</label> -->
                                                <input type="number" minlength="10" maxlength="10"
                                                    placeholder="Authorized Person Contact Number"
                                                    name="auth_person_contact" class="onboard-form form-control"
                                                    required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2">
                                                <!-- <label class="" for="auth_person_email">Authorized Person Contact Email{!! required() !!}</label> -->
                                                <input type="email" placeholder="Authorized Person Contact Email"
                                                    name="auth_person_email" class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2 dashBoard">
                                                <!-- <label class="" for="billing_add">Billing Address{!! required() !!}</label> -->
                                                <input type="text" placeholder="Billing Address" name="billing_add"
                                                    class="onboard-form form-control" required />
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2 dashBoard">
                                                <!-- <label class="" for="shipping_add">Shipping Address{!! required() !!}</label> -->
                                                <input type="text" placeholder="Shipping Address" name="shipping_add"
                                                    class="onboard-form form-control" required />
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2 dashBoard">
                                                <!-- <label class="" for="product">Product{!! required() !!}</label> -->


                                                <select placeholder="Product" name="product" id="product"
                                                    class="onboard-form form-control select2_form_without_search" required>
                                                    <option value="">Select Product</option>
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
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2 dashBoard">
                                                <!-- <label class="" for="subscription_type">Subscription Type{!! required() !!}</label> -->
                                                <select placeholder="Subscription Type" name="subscription_type"
                                                    id="subscription_type" class="onboard-form form-control select2_form_without_search" required>
                                                    <option value="">Select Subscription Type</option>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Quarterly">Quarterly</option>
                                                    <option value="BiAnnually">BiAnnually</option>
                                                    <option value="Annually">Annually</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mb-2 dashBoard">
                                                <!-- <label class="" for="doc_uploads">Documents Upload{!! required() !!}</label> -->
                                                <div class="addfiles form-control" data="#doc_uploads"
                                                    id="doc_uploads_label"><span class="file_label">Documents
                                                        </span></div>
                                                <input type="file" placeholder="Documents Upload" name="doc_uploads"
                                                    id="doc_uploads" class="onboard-form form-control files"
                                                    style="display:none;" required accept=".doc,.docx,.pdf,image/*" />
                                            </div>
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn btn-orange text-center"
                                                    value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>
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


        $('#form-1').on('submit', function(e) {
            e.preventDefault();
            var flag = false;
            $('.files').each(function() {
                if ($(this).attr('vali') == "required" && $(this).val().length == 0) {
                    var attr = $(this).attr('id');
                    $('.' + attr + '_label').show();
                    flag = true;
                } else {
                    var attr = $(this).attr('id');
                    $('.' + attr + '_label').hide();
                }
            });
            if ($('#form-1').is(':valid') && !flag) {
                var form_data1 = new FormData(document.getElementById("form-1"));
                // var form_data2 = new FormData(document.getElementById("form-2"));
                // for (var pair of form_data2.entries()) {
                //     form_data1.append(pair[0], pair[1]);
                // }
                $.ajax({
                    url: "{{ url('vmt_clientOnboarding') }}",
                    type: "POST",
                    dataType: "json",
                    data: form_data1,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                    }
                });
            }


            //console.log(personalData);
            //console.log(locationData);
            //console.log(officeData);
            //console.log(familyData);
            //console.log(statutoryData);
        });

        $('#form-1').validate({
            errorPlacement: function(error, element) {
                error.text('* ' + error.text());
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent()); // radio/checkbox?
                } else if (element.hasClass('select2-hidden-accessible')) {
                    error.insertAfter(element.next('span')); // select2
                    element.next('span').addClass('error').removeClass('valid');
                } else {
                    error.insertAfter(element); // default
                }
            }
        });

        $("select").on("select2:close", function(e) {
            $(this).valid();
        });
    </script>
@endsection
