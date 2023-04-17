<?php use Carbon\Carbon; ?>

@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/pages_profile.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payCheck.css') }}">
@endsection
@section('content')
@vite('resources/js/hrms/modules/profile_pages/ProfilePageNew.js')
<div id="profilePage"></div>
    @vite('resources/js/hrms/modules/profile_pages/ProfilePageNew.js')
    <div id="profilePage"></div>
@endsection


    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            let empActiveStatus = "{{ getEmployeeActiveStatus($user->id) ?? 'null' }}";

            if (empActiveStatus == "Active") {
                $('.userActive-status').css('border-color', '#2e9102');

            } else if (empActiveStatus == "Yet to Activate") {
                $('.userActive-status').css('border-color', '#ff0000');
            } else {
                $('.userActive-status').css('border-color', '#ffb10b');
            }


            let storeProfileValue = {{ $profileCompletenessValue }};
            console.log(storeProfileValue);

            if (storeProfileValue > 0 && storeProfileValue < 50) {
                $("#profile_progressBar").css('background-color', '#cd0101');
            } else if (storeProfileValue > 51 && storeProfileValue < 80) {
                $("#profile_progressBar").css('background-color', '#ddc801');
            } else {
                $("#profile_progressBar").css('background-color', '#2e9102');
            }

            $("#profile_progressBar").animate({
                width: "{{ $profileCompletenessValue }}%"
            }, {
                duration: 2500,
                easing: "linear",
                step: function(percentageValue) {
                    $("#prograssBar_percentage").text(Math.round(percentageValue * 100 / 100) + "%");
                }
            });

            @if (!empty($reportingManager))
                generateProfileShortName_VendorScript("manager_shortname",
                    "{{ $reportingManager->name }}");
            @endif

            console.log("ready!");
        });



        $('body').on('keyup', ".onboard-form", function() {
            var inputvalues = $(this).val();
            var data = $(this).attr('name');
            if ($(this).attr('maxlength')) {
                var dtl = $(this).val().length;
                var val = parseInt($(this).attr('maxlength'));
                if (dtl > val) {
                    $(this).val($(this).val().substr(0, val));
                }
            }
            if ($(this).attr('pattern-data') != undefined && $(this).attr('pattern-data') != '' &&
                inputvalues !=
                '') {
                var pattern = {
                    'pan': /^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}?$/,
                    'ifsc': /^([A-Z]){4}0([A-Z0-9]){6}?$/,
                    'aadhar': /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/,
                    'passport': /^[a-zA-Z]{2}[0-9]{7}$/,
                    'account': /^[0-9]{9,18}$/,
                    'dl': /^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/,
                    'gst': /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
                    'alp-num': /^[a-zA-Z0-9]+$/,
                    'alpha': /^[a-zA-Z]+$/,
                    'name': /^[a-zA-Z.]+$/,
                };
                var regex = $(this).attr('pattern-data');
                if (!pattern[regex].test(inputvalues)) {
                    var v = $(this).val();
                    if (regex == 'name') {
                        $(this).val(v.replace(/[_\W0-9]+/g, ''));
                    } else if (regex == 'alpha') {
                        $(this).val(v.replace(/[_\W0-9.]+/g, ''));
                    } else if (regex == 'alp-num') {
                        $(this).val(v.replace(/[_\W.]+/g, ''));
                    }
                }
            }
        });

        $('.edit-icon').click(function() {
            var modalid = $(this).attr('data-bs-target');
            $(modalid).modal('show');
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile_round_image_dist')
                        .attr('src', e.target.result);

                    $('#profile_round_image_dist1')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        $('#add_experienceDetails').click(function() {
            var id = $('.exp-addition-card:last').attr('id');
            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }
            $('.exp-content-container').append(
                '<input type="hidden" name="ids[]"><div class="card exp-addition-card" id="content' +
                length +
                '"><div class="card-body"><div class="row"> <div class="col-md-6"><div class="mb-3 form-group form-focus focused"><label class="focus-label">Company Name</label><input type="text" class="form-control floating" name="company_name[]" required></div></div><div class="col-md-6"><div class="mb-3 form-group form-focus focused"><label class="focus-label">Location</label><input type="text" class="form-control floating" name="location[]" required></div></div><div class="col-md-6"><div class="mb-3 form-group form-focus focused"><label class="focus-label">Job Position</label><input type="text" class="form-control floating" name="job_position[]" required></div></div><div class="col-md-6"><div class="mb-3 form-group form-focus focused"><label class="focus-label">Period From</label><div class="cal-icon"><input type="date" max="9999-12-31" class="form-control floating datetimepicker" name="period_from[]" required></div></div></div><div class="col-md-6"><div class="mb-3 form-group form-focus focused"><div class="cal-icon"><label class="focus-label">Period To</label><input type="date" max="9999-12-31"  class="form-control floating datetimepicker" name="period_to[]" required></div></div></div></div></div></div>'
            );
        });

        $('#addMore_family').click(function() {
            var id = $('.addition-content:last').attr('id');

            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }
            $('.family-addition-container').append(' <div class="mb-2 card addition-content" id="content' +
                length +
                '"><div class="card-body"> <div class="row" > <div class="m-0 col-md-12 text-end"><button class="p-0 bg-transparent border-0 outline-none btn text-danger delete-btn f-12 plus-sign" type="button"><i class="f-12 me-1 fa text-danger fa-trash" aria-hidden="true"></i>Delete</i></button></div><div class="col-md-6"><div class="mb-3 form-group"><label>Name <span class="text-danger">*</span></label><input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="mb-3 form-group"><label>Relationship <span class="text-danger">*</span></label><input name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="mb-3 form-group"><label>Date of birth <span class="text-danger">*</span></label><input name="dob[]" class="form-control onboard-form" type="date" max="9999-12-31" required></div></div><div class="col-md-6"><div class="mb-3 form-group"><label>Phone <span class="text-danger">*</span></label><input name="phone_number[]" class="form-control onboard-form" type="number" maxlength="10" minlength="10" required></div></div></div>'
            );
        });

        // emergency contact

        $('#addMore_emergencyCont').click(function() {
            var id = $('.emergency-addition-content:last').attr('id');
            var length = 1;
            if (id) {
                length = parseInt(id.replace('content', '')) + 1;
            }
            $('.emergency-content-wrapper').append(
                ' <div class="mb-3 card emergency-addition-content" id="content' +
                length +
                '"><div class="card-body"> <div class="row" > <div class="m-0 col-md-12 text-end"><button class="p-0 bg-transparent border-0 outline-none btn text-danger delete-btn f-12 plus-sign" type="button"><i class="f-12 me-1 fa text-danger fa-trash" aria-hidden="true"></i>Delete</i></button></div><div class="col-md-6"><div class="mb-3 form-group"><label>Name <span class="text-danger">*</span></label><input name="name[]" class="form-control onboard-form" type="text" pattern-data="name" required></div></div><div class="col-md-6"><div class="mb-3 form-group"><label>Relationship <span class="text-danger">*</span></label><input name="relationship[]" class="form-control onboard-form" type="text" pattern-data="alpha" required></div></div><div class="col-md-6"><div class="mb-3 form-group"><label>Phone<span class="text-danger">*</span></label><input name="dob[]" class="form-control onboard-form" type="text"  required></div></div></div>'
            );
        });




        // delete card funtion
        // $('.delete-btn').click(function() {
        //     var $target = $(this).parents('');
        //     $target.hide('slow', function() {
        //         $target.remove();
        //     });
        // })


        const optionMenu = $(".select-menu"),
            selectBtn = $(".select-btn"),
            options = $(".option"),
            sBtn_text = $(".sBtn-text");

        selectBtn.click(function() {
            optionMenu.classList.toggle("active")
        });

        options.each((option) => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;

                optionMenu.classList.remove("active");

            });
        });

        $('#bank_name').change(function() {
            var min = $('#bank_name option:selected').attr('min-data');
            var max = $('#bank_name option:selected').attr('max-data');
            $('#account_no').attr('minlength', min);
            $('#account_no').attr('maxlength', min);
        });

        $('body').on('keyup', ".onboard-form", function() {
            var inputvalues = $(this).val();
            var data = $(this).attr('name');
            if ($(this).attr('maxlength')) {
                var dtl = $(this).val().length;
                var val = parseInt($(this).attr('maxlength'));
                if (dtl > val) {
                    $(this).val($(this).val().substr(0, val));
                }
            }
            if ($(this).attr('pattern') != undefined && $(this).attr('pattern') != '' && inputvalues !=
                '') {
                var pattern = {
                    'pan': /^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}?$/,
                    'ifsc': /^([A-Z]){4}0([A-Z0-9]){6}?$/,
                    'aadhar': /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/,
                    'passport': /^[a-zA-Z]{2}[0-9]{7}$/,
                    'account': /^[0-9]{9,18}$/,
                    'dl': /^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/,
                    'gst': /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
                    'alp-num': /^[a-zA-Z0-9]+$/,
                    'alpha': /^[a-zA-Z]+$/,
                    'name': /^[a-zA-Z.]+$/,
                };
                var regex = $(this).attr('pattern');
                if (!pattern[regex].test(inputvalues)) {
                    $('.' + data + '_label').addClass('patternErr');
                    var v = $(this).val();
                    if (regex == 'name') {
                        $(this).val(v.replace(/[_\W0-9]+/g, ''));
                    } else if (regex == 'alpha') {
                        $(this).val(v.replace(/[_\W0-9.]+/g, ''));
                    } else if (regex == 'alp-num') {
                        $(this).val(v.replace(/[_\W.]+/g, ''));
                    }
                } else {
                    $('.' + data + '_label').removeClass('patternErr');
                }
            }
        });
    </script>
    <!-- number validation  -->
    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;

        }

        function isValidEmail(email) {
            const re =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }


        $('body').on('click', '.close-modal', function() {
            $('#notificationModal').hide();
            $('#notificationModal').addClass('fade');
        });


        $('.view-file').on('click', function(e) {
            console.log($(this).data('src'));
            var docHtmlString = "<img src=" + $(this).data('src') +
                " width='100%' / style='width:100%;height:400px;'>";

            $('#documents_content').html(docHtmlString);

            // $('#show_documents').show();
        })

        function approveOrRejectDocument(docName, aproveStatus) {
            $.ajax({
                url: "{{ route('vmt-store-documents-review') }}",
                type: "POST",
                data: {
                    user_code: $('#hidden_user_code').val(),
                    doc_name: docName,
                    approve_status: aproveStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert("Document reviewed successfully");
                    //window.location.href = "/";
                    location.reload();
                }
            });
        }

        function approveAllDocument() {
            //e.preventDefault();
            console.log('aprove_All');

            var doc_reviewed = {
                aadhar_card_file: 1,
                aadhar_card_backend_file: 1,
                pan_card_file: 1,
                passport_file: 1,
                voters_id_file: 1,
                dl_file: 1,
                education_certificate_file: 1,
                reliving_letter_file: 1
            }

            $.ajax({
                url: "{{ route('vmt-store-documents-review-approve-all') }}",
                type: "POST",
                data: {
                    user_code: $('#hidden_user_code').val(),
                    doc_array: doc_reviewed,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert("All Documents approved successfully");
                    //window.location.href = "/";
                    location.reload();
                }
            });
        }

        $(document).ready(function() {
            $("#btn_submit_generalInfo").on('click', function(e) {
                e.preventDefault();
                var dob = $("input[name='dob']").val();
                var gender = $("select[name='gender']").val();
                var doj = $("input[name='doj']").val();
                var marital_status = $("select[name='marital_status']").val();
                var blood_group = $("select[name='blood_group']").val();
                var physically_challenged = $("input[name='physically_challenged']").val();

                $.ajax({
                    url: "{{ route('updateGeneralInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        dob: dob,
                        gender: gender,
                        doj: doj,
                        marital_status: marital_status,
                        blood_group: blood_group,
                        physically_challenged: physically_challenged,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        Swal.fire({

                            text: 'General Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }


                });
                console.log(physical_challenge);
            });
        });


        $(document).ready(function() {
            $("#btn_submit_contact_info").on('click', function(e) {
                e.preventDefault();

                var present_email = $("input[name='present_email']").val();
                var officical_mail = $("input[name='officical_mail']").val();
                var mobile_number = $("input[name='mobile_number']").val();
                console.log(mobile_number);

                $.ajax({
                    url: "{{ route('updateContactInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        present_email: present_email,
                        officical_mail: officical_mail,
                        mobile_number: mobile_number,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        Swal.fire({

                            text: 'Contact Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }

                });

            });
        });


        $(document).ready(function() {
            $("#btn_submit_address").on('click', function(e) {
                e.preventDefault();

                var current_address_line_1 = $("textarea[name='current_address_line_1']").val();
                var permanent_address_line_1 = $("textarea[name='permanent_address_line_1']").val();

                $.ajax({
                    url: "{{ route('addressInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        current_address_line_1: current_address_line_1,
                        permanent_address_line_1: permanent_address_line_1,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({

                            text: 'Address Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }


                });

            });
        });



        $(document).ready(function() {
            $("body").on("click", "#deleteFamily_btn", function() {

                $.ajax({
                    url: "{{ route('deleteFamilyInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        // Swal.fire({
                        //     text: 'Family Information Updated',
                        //     icon: 'success'
                        // }).then((result) => {

                        //     if (result.isConfirmed) {
                        //         location.reload();

                        //     }
                        // })
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(

                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                $(this).parents(".addition-content").remove();

                                location.reload();
                            }
                        })
                    }

                });





            });
        });

        $(document).ready(function() {
            $("#btn_submit_family_info").on('click', function(e) {
                e.preventDefault();

                var name = $('input[name="name[]"]').map(function() {
                    return this.value;
                }).get();

                var relationship = $('input[name="relationship[]"]').map(function() {
                    return this.value;
                }).get();

                var dob = $('input[name="dob[]"]').map(function() {
                    return this.value;
                }).get();

                var phone_number = $('input[name="phone_number[]"]').map(function() {
                    return this.value;
                }).get();


                $.ajax({
                    url: "{{ route('updateFamilyInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        'name[]': name,
                        'relationship[]': relationship,
                        'dob[]': dob,
                        'phone_number[]': phone_number,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({
                            text: 'Family Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }

                });

            });
        });

        $(document).ready(function() {
            $("#btn_submit_experience_info").on('click', function(e) {
                e.preventDefault();
                var ids = $('input[name="ids[]"]').map(function() {
                    return this.value;
                }).get();

                var company_name = $('input[name="company_name[]"]').map(function() {
                    return this.value;
                }).get();

                var location = $('input[name="location[]"]').map(function() {
                    return this.value;
                }).get();

                var job_position = $('input[name="job_position[]"]').map(function() {
                    return this.value;
                }).get();

                var period_from = $('input[name="period_from[]"]').map(function() {
                    return this.value;
                }).get();

                var period_to = $('input[name="period_to[]"]').map(function() {
                    return this.value;
                }).get();


                $.ajax({
                    url: "{{ route('updateExperienceInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        'ids[]': ids,
                        'company_name[]': company_name,
                        'location[]': location,
                        'job_position[]': job_position,
                        'period_from[]': period_from,
                        'period_to[]': period_to,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({

                            text: 'Experience Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }


                });

            });
        });

        $(document).ready(function() {
            $("#btn_submit_bank_info").on('click', function(e) {
                e.preventDefault();

                var bank_name = $("select[name='bank_name']").val();
                var account_no = $("input[name='account_no']").val();
                var bank_ifsc = $("input[name='bank_ifsc']").val();
                var pan_no = $("input[name='pan_no']").val();

                $.ajax({
                    url: "{{ route('updateBankInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        bank_name: bank_name,
                        account_no: account_no,
                        bank_ifsc: bank_ifsc,
                        pan_no: pan_no,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({

                            text: 'Bank Information Updated',
                            icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }

                });
            });
        });

        $(document).ready(function() {
            $("#btn_submit_statutory_info").on('click', function(e) {
                e.preventDefault();

                var pf_applicable = $("select[name='pf_applicable']").val();
                var epf_number = $("input[name='epf_number']").val();
                var uan_number = $("input[name='uan_number']").val();
                var esic_applicable = $("select[name='esic_applicable']").val();
                var esic_number = $("input[name='esic_number']").val();

                $.ajax({
                    url: "{{ route('updateStatutoryInfo', $user->id) }}",
                    type: 'POST',
                    data: {
                        pf_applicable: pf_applicable,
                        epf_number: epf_number,
                        uan_number: uan_number,
                        esic_applicable: esic_applicable,
                        esic_number: esic_number,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.paySlipView').on('click', function() {
                var url = $(this).attr('data-url');
                var t_paySlipMonth = $(this).attr('data');
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        selectedPaySlipMonth: t_paySlipMonth,
                        enc_user_id: "{{ $enc_user_id }}"
                    },
                    success: function(data) {
                        var content =
                            '<div class="row " style=""><div class=""><div class="mb-4 fill body payslip-filter-pdf"> <i class="icon icon-blue icon-xlg vertical-align-text-bottom text-secondary ri-filter-2-fill"> </i> <div class="cursor-pointer dropdown payslip-dropdown"><div id="ember127" class="ember-view"><div class="dropdown-toggle" data-toggle="dropdown"><span>Financial Year : </span><span class="font-semibold fw-bold text-dark h5">2022 - 23</span><span class="caret "></span></div><ul class="dropdown-menu dropdown-menu-right"><li data-ember-action="" data-ember-action-129="129"><a>2022 - 23</a></li> </ul></div></div></div></div><div class="">' +
                            data + '</div></div>';
                        $("#slipAfterView").html(content);
                        $('#payslipModal').modal('show');
                        console.log("Clicked View ");
                    }
                });
            });

            $('.paySlipPDF').on('click', function() {
                var url = $(this).attr('data-url');
                let t_paySlipMonth = $(this).attr('data');
                let enc_userid = "{{ $enc_user_id }}";

                window.open(url + "?selectedPaySlipMonth=" + t_paySlipMonth + "&enc_user_id=" + enc_userid,
                    '_blank');
                // $.ajax({
                //     type: "GET",
                //     url: url,
                //     data: {
                //         selectedPaySlipMonth: t_paySlipMonth,
                //         enc_user_id: "{{ $enc_user_id }}"
                //     },
                //     success: function(data) {
                //         console.log("Downloading Payslip PDF........");
                //         return data;
                //         // var content =
                //         //     '<div class="row " style=""><div class=""><div class="mb-4 fill body payslip-filter-pdf"> <i class="icon icon-blue icon-xlg vertical-align-text-bottom text-secondary ri-filter-2-fill"> </i> <div class="cursor-pointer dropdown payslip-dropdown"><div id="ember127" class="ember-view"><div class="dropdown-toggle" data-toggle="dropdown"><span>Financial Year : </span><span class="font-semibold fw-bold text-dark h5">2022 - 23</span><span class="caret "></span></div><ul class="dropdown-menu dropdown-menu-right"><li data-ember-action="" data-ember-action-129="129"><a>2022 - 23</a></li> </ul></div></div></div></div><div class="">' +
                //         //     data + '</div></div>';
                //         // $("#slipAfterView").html(content);
                //         // $('#payslipModal').modal('show');
                //         // console.log("Clicked View ");
                //     }
                // });
            });
        });
    </script>
@endsection
