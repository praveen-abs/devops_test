<?php
//$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee->EMP_NO)->first('name');
$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
$bank_names = \DB::table('bank_list')->get();

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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

        .padding-t-b_0 {
            padding-bottom: 0px;
            padding-top: 0px;
        }

        .margin-t-b_0 {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .padding-0 {
            padding: 0px;
        }
    </style>
</head>

<body>
    <!-- Flow 2 : Mail sent to employee, when manager sets KPI goal -->

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
                                                <tr>
                                                    <td colspan="8" align="center" class="border-less">
                                                        <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                            title="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="left" class="border-less">

                                                        <p class="" style="margin: 0px 0px 0px ">Dear <b> Mr. /
                                                                Ms. @php echo $user_emp_name; @endphp</b> </p>
                                                        <p>The purpose of this mail is to inform you that, your
                                                            respective OKR/Goals as well as your reporting manager's
                                                            expectations and directions for <b>{{ $appraisal_period }}.</b>
                                                        </p>
                                                        <p>Request you to Accept or Reject this OKR/PMS forms using the
                                                            buttons below.</p>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4" style="" align="right"
                                                        class="  padding-t-b_0  ">

                                                        <a class="" type="button"
                                                        href="{{ $loginLink }}/employee-appraisal"
                                                            style="text-decoration:none;cursor: pointer; margin-right:10px;color:#ffffff;padding: 7px 30px;border: 2px solid #90f10c;background: #90f10c;border-radius: 4px;font-weight:600">
                                                            Accept
                                                        </a>
                                                    </td>
                                                    <td colspan="4" style="" align="left"
                                                        class="padding-t-b_0 ">

                                                        <a class="" type="button"
                                                        href="{{ $loginLink }}/employee-appraisal"
                                                            style="text-decoration:none;cursor: pointer;margin-left:10px;color:#ffffff;padding: 7px 30px;border: 2px solid #f12d0c;background: #ff2500;border-radius: 4px;font-weight:600">
                                                            Reject
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" class="">

                                                        <p> <span style="color:#fa9530;">Note - </span>When rejecting
                                                            an OKR/PMS form, kindly include the reason for rejection in
                                                            the response email/HRMS portal. </p>
                                                        <p class="txt-center">"We wish you achieve your greatest goals
                                                            moving forward."</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" class="padding-t-b_0 ">
                                                        <p class="txt-left margin-t-b_0 " class="margin:0px;">Cheers,
                                                        </p>
                                                        <p class="txt-left margin-t-b_0 ">ABS_OKR Automated System.
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
                                                    <td align="center" style="padding-top:10px ">
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

            </tbody>
        </table>
    @elseif ($approvalStatus == 'approved')
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
                                                <tr>
                                                    <td colspan="8" align="center" class="border-less">
                                                        <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                            title="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="center" class="border-less"
                                                        style="padding:10px ;">

                                                        <p class="text-strong margin-t-b_0  txt-center"
                                                            style="color:#008000;font-size:20px">Approved </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8" align="left" class="border-less">

                                                        <p class="" style="margin: 0px ">Dear <b> Mr. / Ms.
                                                                @php echo $user_emp_name; @endphp</b></p>
                                                        <p>This is to inform you that <b>Mr. /Ms. @php echo $user_manager_name; @endphp
                                                            </b>,has
                                                            Approved your OKR/ PMS forms.
                                                        </p>
                                                        <p>Request you to kindly have a “Great Conversation” with
                                                            <b>“Mr. /Mrs. @php echo $user_manager_name; @endphp </b> and
                                                            Complete the OKR/PMS
                                                            within the time
                                                            frame.
                                                        </p>
                                                        <p>
                                                                <a class=""
                                                                        href="{{ $loginLink }}/employee-appraisal">
                        
                                                                        Kindly visit the HRMS portal for more details
                                                                    </a>
                                                                </p>
                                                        </td>
                                                </tr>



                                                <tr>
                                                    <td colspan="8"   class="padding-t-b_0">
                                                        <p class="txt-left margin-t-b_0 " class="margin:0px;">Cheers,
                                                        </p>
                                                        <p class="txt-left margin-t-b_0 ">ABS_OKR Automated System.
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
                                                            <a href="https://www.facebook.com/ArdensHR"
                                                                target="_blank" style="margin-right: 20px"><img
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
            </tbody>
        </table>
    @elseif ($approvalStatus == 'rejected')
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

                                        <table cellpadding="10" cellspacing="0" width="100%" align="center">
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" align="center" class="border-less">
                                                        <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                            title="">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8" align="center" class="border-less"
                                                        style="padding:10px ;">

                                                        <p class="text-strong margin-t-b_0  txt-center"
                                                            style="color: #ff0000;font-size:20px">Rejected</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8" align="left" class="border-less">

                                                        <p class="" style="margin:0px ">Dear <b> Mr. / Ms.
                                                                @php echo $user_emp_name; @endphp</b></p>
                                                        <p>This is to inform you that,
                                                                <b> Mr. / Ms.
                                                                @php echo $user_manager_name; @endphp</b> has rejected your OKR/ PMS forms
                                                            due to
                                                        </p>
                                                        <p class="txt-center"><b>" {{ $comments_manager }} " </b></p>
                                                        <p>Request you to kindly have a “Great Conversation” with <b>
                                                                Mr. / Ms.
                                                                @php echo $user_manager_name; @endphp</b> and Complete the OKR/PMS within
                                                            the time
                                                            frame.</p> 
                                                        <p>
                                                        <a class=""
                                                                href="{{ $loginLink }}/employee-appraisal">
                
                                                                Kindly visit the HRMS portal for more details
                                                            </a>
                                                        </p>

                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td colspan="8"  class="padding-t-b_0">
                                                        <p class="txt-left margin-t-b_0 " class="margin:0px;">Cheers,
                                                        </p>
                                                        <p class="txt-left margin-t-b_0 ">ABS_OKR Automated System.
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
                                                            <a href="https://www.facebook.com/ArdensHR"
                                                                target="_blank" style="margin-right: 20px"><img
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
            </tbody>
        </table>
    @elseif ($approvalStatus == 'completed')
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
                                                <tr>
                                                    <td colspan="8" align="center" class="border-less">
                                                        <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                            title="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="left" class="border-less">
                                                        <p class="" style="margin: 0px ">Greetings from the HR Team,</p>
                                                        <p>This is to inform you that your Manager  Mr./ Ms. {{ $user_manager_name }} has successfully submitted his/her
                                                            Manager-Review for {{ $appraisal_year }} - {{ $appraisal_period}}.
                                                        </p>
                                                        <p>
                                                            If you have any questions or concerns, don’t hesitate to reach out to your reporting manager or the HR team.
                                                        </p>
                                                        <p>
                                                            <a class="" href="{{ $loginLink }}/employee-appraisal">
                                                                Kindly visit the HRMS portal for more details
                                                            </a>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" class="padding-t-b_0 ">
                                                        <p class="txt-left margin-t-b_0 " class="margin:0px;">Cheers,
                                                        </p>
                                                        <p class="txt-left margin-t-b_0 ">ABS_OKR Automated System.
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
                                                    <td align="center" style="padding-top:10px ">
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
                                                            <a href="https://www.facebook.com/ArdensHR"
                                                                target="_blank" style="margin-right: 20px"><img
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

            </tbody>
        </table>
    @endif

</body>

</html>
