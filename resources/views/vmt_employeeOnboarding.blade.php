@extends('layouts.master')
@include('ui-onboarding')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection

@section('content')

@component('components.organization_breadcrumb')
@slot('li_1') @endslot
@endcomponent
<div class="main">

    @yield('ui-onboarding')




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
    <script src="{{ URL::asset('/assets/premassets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/jquery-1.12.4.min.js') }}"></script>
    <!--Popper JS-->
    <script src="{{ URL::asset('/assets/premassets/js/popper.min.js') }}"></script>
    <!--Bootstrap-->
    <script src="{{ URL::asset('/assets/premassets/js/bootstrap.min.js') }}"></script>
    <!--Sweet alert JS-->
    <script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
    <!--Progressbar JS-->
    <script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>
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
    
$(document).ready(function() {

$('#process').select2({
    width: '100%',
    placeholder: "Select Process",
});
$('#department').select2({
    width: '100%',
    placeholder: "Select Department",
});
$('.select2_form_without_search').each(function() {
    var placeholder = $(this).attr('placeholder')
    placeholder = (placeholder == undefined) ? '' : placeholder;

    $(this).select2({
        width: '100%',
        minimumResultsForSearch: Infinity,
        placeholder: placeholder,
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
$.each($('.gross_data'), function(value) {
    if ($(this).val()) {
        gross += parseInt($(this).val());
    }
});
$.each($('.cic_data'), function(value) {
    if ($(this).val()) {
        cic += parseInt($(this).val());
    }
});
$.each($('.net_data'), function(value) {
    if ($(this).val()) {
        net += parseInt($(this).val());
    }
});
console.log(gross);
$('#gross').val(gross);
$('#cic').val(gross + cic);
$('#net_income').val(gross - cic + net);
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
for (var i = 1; i <= val; i++) {
    var childName = $('input[name="child_name' + i + '"]').val();
    var childDob = $('input[name="child_dob' + i + '"]').val();
    var childGender = $('input[name="child_gender' + i + '"]').val();
    // // // data = data+"<div class='col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-2'><label class='' for='child_name"+i+"'>Children Name</label><input type='text' name='child_name[]' id='child_name"+i+"' class='onboard-form form-control spouse_data' required /></div><div class='col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3'><label class='' for='child_dob"+i+"'>Children DOB</label><input type='date' name='child_dob[]' id='child_dob"+i+"' class='onboard-form form-control spouse_data' required /></div><div class='col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3'><label class='' for='child_gender"+i+"'>Children Gender</label><select name='child_gender[]' id='child_gender"+i+"' class='onboard-form form-control spouse_data' required ><option value=''>Select</option><option value='male'>Male</option><option value='female'>Female</option><option value='other'>Other</option></select></div>";
}
$('.children_container').html(data);
});

$('#marital_status').change(function() {
if ($('#marital_status').val() == 'single') {
    $.each($('.spouse_data'), function(value) {
        var name = $(this).attr('name');
        if ($('input[name="' + name + '"]').val() == '') {
            $('.' + name + '_label').hide();
        }
        $(this).attr('disabled', true);
        $(this).removeAttr('required');
        $(this).addClass('not-required validate');
        $('#spouse_gender').val('');
        $('#' + name + '_req').hide();
    });
} else {
    $.each($('.spouse_data'), function(value) {
        var name = $(this).attr('name');
        $(this).removeAttr('disabled');
        $(this).attr('required', true);
        $(this).removeClass('not-required validate');
        $('#' + name + '_req').show();
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
    stateFunction($('#current_district').val(), '#permanent_state', true);
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

function stateFunction(id, dataId, flag = false) {
var val = $('#current_state').val();
$(dataId).empty();
$.ajax({
    url: "{{route('state')}}",
    type: "POST",
    data: {
        code: id,
        _token: '{{csrf_token()}}'
    },
    success: function(data) {
        $.each(data, function(key, value) {
            $(dataId).append('<option value="' + value.id + '">' + value.state_name +
                '</option>');
        });
        if (val && flag) {
            $('#permanent_state').val($('#current_state').val());
        }
    }
});
}

$('#permanent_district').change(function() {
var id = $(this).val();
stateFunction(id, '#permanent_state');
});

$('#current_district').change(function() {
var id = $(this).val();
stateFunction(id, '#current_state');
});


$('#submit_button').on('click', function(e) {
console.log("here");
var flag = false;
if ($('#form-1').valid() && !flag) {
    var form_data1 = new FormData(document.getElementById("form-1"));
    $.ajax({
        url: "{{url('vmt-employee-onboard')}}",
        type: "POST",
        dataType: "json",
        data: form_data1,
        contentType: false,
        processData: false,
        success: function(data) {
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
        error: function(data) { //NEED TO FIX IT
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
}
});

$('#form-1').validate({
errorPlacement: function (error, element) {
error.text('* '+error.text());
if (element.parent('.input-group').length) { 
    error.insertAfter(element.parent());      // radio/checkbox?
} else if (element.hasClass('select2-hidden-accessible')) {     
    error.insertAfter(element.next('span'));  // select2
    element.next('span').addClass('error').removeClass('valid');
} else {                                      
    error.insertAfter(element);               // default
}
}
});

$("select").on("select2:close", function (e) {  
$(this).valid();
});
});

    </script>


    @endsection