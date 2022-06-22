@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

<style>
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
#msform textarea,
select {
    outline: none;
    padding: 8px 15px 8px 15px;
    border: none;
    border-radius: 0px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px
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
    text-align: right;
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
    padding: 0px 100px 0px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
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
    content: "2"
}



/* #progressbar #payment:before {
    font-family: FontAwesome;
    color: orange;
    content: "3"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    color: orange;
    content: "4"
} */

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
                    <div class="card p-3">
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
                                                <label class="fieldlabels" for="client_name">Client Name</label>
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
                                                <input type="text" name="cin_no" class="onboard-form" required />
                                                <label class="fieldlabels" for="cin_no">CIN Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="com_tan" class="onboard-form" required />
                                                <label class="fieldlabels" for="com_tan">Company TAN</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="com_pan" class="onboard-form" required />
                                                <label class="fieldlabels" for="com_pan">Company PAN</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="gst_no" class="onboard-form" required />
                                                <label class="fieldlabels" for="gst_no">GST No</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="epf" class="onboard-form" required />
                                                <label class="fieldlabels" for="epf">EPF Registration Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="esic" class="onboard-form pan" pattern="pan"
                                                    required />
                                                <label class="fieldlabels" for="esic">ESIC Registration Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="professional_tax" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="professional_tax">Professional Tax
                                                    Registration Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="lwf" class="onboard-form" required />
                                                <label class="fieldlabels" for="lwf">
                                                    LWF Registration Number</label>
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
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="auth_person_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="auth_person_name">
                                                    Authorized Person Name</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="auth_person_desig" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="auth_person_desig">
                                                    Authorized Person Designation</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="auth_person_contact" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="auth_person_contact">
                                                    Authorized Person Contact Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="auth_person_email" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="auth_person_email">
                                                    Authorized Person Contact Email</label>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">

                                                <input type="text" name="billing_add" class="onboard-form" required />
                                                <label class="fieldlabels" for="billing_add">
                                                    Billing Address</label>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">

                                                <input type="text" name="shipping_add" class="onboard-form" required />
                                                <label class="fieldlabels" for="shipping_add">
                                                    Shipping Address</label>
                                            </div>

                                            <div
                                                class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">

                                                <input type="file" name="documents_upload" class="onboard-form" required
                                                    accept="pdf" />
                                                <label class="fieldlabels" for="documents_upload">
                                                    Documents Upload</label>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">

                                                <select class="onboard-form  drop_down" required>


                                                    <option value="">Recruitment</option>
                                                    <option value="">Payroll</option>
                                                    <option value="">Statutory Complainces</option>
                                                    <option value="">PMS</option>
                                                    <option value="">Staffing</option>
                                                    <option value="">Accounting</option>
                                                    <option value="">ROC Complainces</option>
                                                    <option value="">Trade Mark</option>
                                                    <option value="">Patent Right</option>
                                                </select>
                                                <label class="fieldlabels" for="documents_upload">
                                                    Product</label>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 mt-3 mb-3 dashBoard">

                                                <select class="onboard-form drop_down" required>


                                                    <option value="">Monthly</option>
                                                    <option value="">Quarterly</option>
                                                    <option value="">BiAnnually</option>
                                                    <option value="">Annually</option>

                                                </select>
                                                <label class="fieldlabels" for="subscription_type">
                                                    Subscription Type</label>
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


<!-- for validating -->
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