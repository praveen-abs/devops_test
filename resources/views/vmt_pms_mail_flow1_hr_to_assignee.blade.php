<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        .txt-left {
            text-align: left;
        }

        .txt-right {
            text-align: right;
        }

        .txt-center {
            text-align: center;
        }

        .text-strong {
            font-weight: 600;
        }

        .padding-t_0 {
            padding-top: 0px;
        }

        .padding-b_0 {
            padding-bottom: 0px;
        }

        .margin-t-b_0 {
            margin-top: 0px;
            margin-bottom: 0px;
        }
    </style>

</head>

<body>
    {{-- Flow -1 :Publish Form :: Here HR sends mail to employee --}}
    @if ($approvalStatus == 'none')
        <table id="wrapper" cellpadding="0" cellspacing="0" width="552"
            style="max-width:552px; height: auto; margin: 0 auto;   font-size: 14px !important; color: #403e3c; line-height: 24px;table-layout:fixed; width:100%;border:1px solid rgba(44, 43, 43, 0.185);border-radius:5px;padding:10px">
            <tbody>
                {{-- @if (Str::contains(currentLoggedInUserRole(), ['Employee'])) --}}
                <tr>
                    <td>
                        <table border="0" cellpadding="24" cellspacing="0" bgcolor="#ffffff"
                            style="border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;padding-top:0px;">
                            <tbody>
                                <tr>
                                    <td align="center" style="padding:0;">

                                        <table cellpadding="20" cellspacing="0" width="100%" align="center">
                                            <tbody>
                                                {{-- <tr>
                                                    <td colspan="4" align="center" class="border-less">
                                                        <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                            title="">
                                                    </td>
                                                </tr> --}}


                                                <tr>
                                                    <td colspan="4" align="left" class="border-less"
                                                        style="padding:10px ;">

                                                        <p class="" style="margin:0px ">Dear <b>“Mr. /Mrs. @php echo $user_emp_name; @endphp </b></p>
                                                        <p class="" style="  ">
                                                            The purpose of this mail is to inform you that, your
                                                            respective
                                                            OKR/Goals as well as your reporting manager's expectations
                                                            and
                                                            directions for <b>@php echo $appraisal_period; @endphp </b>
                                                        </p>
                                                        <p>
                                                            As you all must be aware that this is a mandate process that
                                                            we
                                                            all must adhere ensuring both you and your reporting manager
                                                            are
                                                            clear about your job objectives and expected results from
                                                            you.
                                                        </p>
                                                        <p>
                                                            Kindly go through your OKR/PMS uploaded in your respective
                                                            HRMS
                                                            login and have a great conversation with your reporting
                                                            manager.
                                                        </p>

                                                        <p>
                                                            We wish you achieve your greatest goals moving forward.
                                                        </p>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" style="padding: 10px"
                                                        class="padding-top_0 padding-b_0">
                                                        <p class="tet-right margin-t-b_0 " class="margin:0px;">Cheers,
                                                        </p>
                                                        <p class="tet-right margin-t-b_0 ">ABS_OKR Automated System.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 0px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="padding:10px 0px 0px 0px">
                                                        This e-mail was generated from ABShrms if you think this is
                                                        SPAM,please do report to <a href="info@abshrms.com"
                                                            style="text-decoration: none;color:none;">info<span
                                                                style="color:#fa9530;">@abshrms.com</span></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px">
                                        <table style="text-align:center; width:100%; padding:10px 0px;">
                                            <tbody>
                                                <tr>
                                                    <td align="right" colspan="4" style="padding: 0;">
                                                        <a href="#" class="">
                                                            <img src="{{ URL::asset('assets/images/apple_play_store.png') }}"
                                                                alt="" class=""
                                                                style="margin:0px 0px 0px 20px;">
                                                        </a>

                                                    </td>
                                                    <td align="left" colspan="4" style="padding: 0;">
                                                        <a href="#" class="">
                                                            <img src="{{ URL::asset('assets/images/Google_Play_Store.png') }}"
                                                                alt="" class=""
                                                                style="margin:0px 0px 0px 20px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 !important;">
                                        <table align="center" style="text-align:center;width:100%" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td align="center" width="100%"
                                                        style="padding-bottom:0px !important;"
                                                        style="margin-right: 10px">
                                                        <div class="fm-sm-container">
                                                            <a href="https://www.linkedin.com/company/ardenshr-services-private-limited/"
                                                                target="_blank" style="margin-right: 20px"><img
                                                                    src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-001.png"
                                                                    alt="LinkedIn"></a>
                                                            <a href="https://www.instagram.com/ardenshr/"
                                                                target="_blank" style="margin-right: 20px"><img
                                                                    src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-002.png"
                                                                    alt="Instagram"></a>
                                                            <a href="https://www.facebook.com/ArdensHR" target="_blank"
                                                                style="margin-right: 20px"><img
                                                                    src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-004.png"
                                                                    alt="Facebook"></a>
                                                            <a href="https://www.youtube.com/channel/UCgZ7XpBoJvcWWvaiBS5GxHg"
                                                                target="_blank"><img
                                                                    src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-003.png"
                                                                    alt="Youtube"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                </tr>

                            </tbody>
                        </table>

                    </td>
                </tr>
                {{-- @endif --}}


            </tbody>
        </table>
    @elseif ($approvalStatus == 'approved')
        {{-- <p>Personal Assessment goal has been approved by your Manager</p> --}}

    @elseif ($approvalStatus == 'rejected')
        {{-- <p>Personal Assessment goal has been rejected by your Manager</p> --}}

        <p>
            Dear @php echo $user_emp_name; @endphp, </p>
        <p>&nbsp;&nbsp;&nbsp;KRA/ KPI has been rejected by <b>“Mr. @php echo $user_manager_name;@endphp” </b>and reason stated below for
            your further references.</p>
        <p> @php echo $command_emp; @endphp </p>

        <p>Request you to kindly have a great conversation with “@php echo $user_emp_name; @endphp” and Complete the KRA/KPA within the
            time frame.</p>
        <p>If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.</p>
        <p>
            Regards <br>
            Team HR.
        </p>
    @endif
</body>

</html>
