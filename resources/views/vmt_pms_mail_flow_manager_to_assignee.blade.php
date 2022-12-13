<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
    @if($approvalStatus == "none")
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
                                            <td colspan="8" align="left" class="border-less"
                                                style="padding:10px ;">

                                                <p class="text-strong " style="margin: 0px 0px 0px ">Dear</p>
                                                <p>The purpose of this mail is to inform you that, your respective
                                                    OKR/Goals as well as your reporting manager's expectations and
                                                    directions for {Month Name/ Quarter Name/ Half Year Name}</p>
                                                <p>Request you to Accept or Reject this OKR/PMS forms using the
                                                    buttons below.</p>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="" align="right" class="  padding-t_0 ">

                                                <a class="" type="button"
                                                    style="text-decoration:none;cursor: pointer; margin-right:10px;color:#ffffff;padding: 7px 30px;border: 2px solid #90f10c;background: #90f10c;border-radius: 4px;font-weight:600">
                                                    Approve
                                                </a>
                                            </td>
                                            <td colspan="4" style="" align="left" class="padding-t_0   ">

                                                <a class="" type="button"
                                                    style="text-decoration:none;cursor: pointer;margin-left:10px;color:#ffffff;padding: 7px 30px;border: 2px solid #f12d0c;background: #ff2500;border-radius: 4px;font-weight:600">
                                                    Reject
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" class="padding-b_0  padding-t_0 ">

                                                <p> <span style="color:#fa9530;">Note - </span>When rejecting
                                                    anOKR/PMS form, kindly include the reason for rejection in the
                                                    response email/HRMS portal. </p>
                                                <p class="txt-center">We wish you achieve your greatest goals moving
                                                    forward.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" align="right" style="padding: 10px 50px"
                                                class="padding-top_0 padding-b_0">
                                                <p class="tet-right margin-t-b_0 " class="margin:0px;">Cheers,</p>
                                                <p class="tet-right margin-t-b_0 ">ABS_OKR Automated System. </p>
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
                                            <td align="center" width="100%" style="padding-bottom:0px !important;"
                                                style="margin-right: 10px">
                                                <div class="fm-sm-container">
                                                    <a href="https://www.linkedin.com/company/ardenshr-services-private-limited/"
                                                        target="_blank" style="margin-right: 20px"><img
                                                            src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-001.png"
                                                            alt="LinkedIn"></a>
                                                    <a href="https://www.instagram.com/ardenshr/" target="_blank"
                                                        style="margin-right: 20px"><img
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
    @elseif ($approvalStatus == "approved")
        {{-- <p>Personal Assessment goal has been approved by your Manager</p> --}}
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

                                                    <p class="text-strong  txt-center" style="color:#008000;font-size:16px">Accepted</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="8" align="left" class="border-less"
                                                    style="padding:10px ;">

                                                    <p class="text-strong " style="margin: 0px 0px 0px ">Dear</p>
                                                    <p>This is to inform you that Mr. / Ms. {Employee Name} has accepted his/ her OKR/ PMS forms.</p>
                                                    <p>Request you to kindly have a “Great Conversation” with “Mr. / Mrs. Employee Name” and Complete the OKR/PMS within the time frame.</p>

                                                </td>
                                            </tr>



                                            <tr>
                                                <td colspan="8" align="right" style="padding: 10px 50px"
                                                    class="padding-top_0 padding-b_0">
                                                    <p class="tet-right margin-t-b_0 " class="margin:0px;">Cheers,</p>
                                                    <p class="tet-right margin-t-b_0 ">ABS_OKR Automated System. </p>
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
                                                <td align="center" width="100%" style="padding-bottom:0px !important;"
                                                    style="margin-right: 10px">
                                                    <div class="fm-sm-container">
                                                        <a href="https://www.linkedin.com/company/ardenshr-services-private-limited/"
                                                            target="_blank" style="margin-right: 20px"><img
                                                                src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-001.png"
                                                                alt="LinkedIn"></a>
                                                        <a href="https://www.instagram.com/ardenshr/" target="_blank"
                                                            style="margin-right: 20px"><img
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
    @elseif ($approvalStatus == "rejected")
        {{-- <p>Personal Assessment goal has been rejected by your Manager</p> --}}

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

                                                    <p class="text-strong  txt-center" style="color: #ff0000;font-size:16px">Rejected</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="8" align="left" class="border-less"
                                                    style="padding:10px ;">

                                                    <p class="text-strong " style="margin: 0px 0px 0px ">Dear</p>
                                                    <p>This is to inform you that Mr. / Ms. {Employee Name} has been rejected his/ her OKR/ PMS forms due to “{Mentioned the rejections reason}”.</p>
                                                    <p>Request you to kindly have a “Great Conversation” with “Mr. / Mrs. Employee Name” and Complete the OKR/PMS within the time frame.</p>

                                                </td>
                                            </tr>



                                            <tr>
                                                <td colspan="8" align="right" style="padding: 10px 50px"
                                                    class="padding-top_0 padding-b_0">
                                                    <p class="tet-right margin-t-b_0 " class="margin:0px;">Cheers,</p>
                                                    <p class="tet-right margin-t-b_0 ">ABS_OKR Automated System. </p>
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
                                                <td align="center" width="100%" style="padding-bottom:0px !important;"
                                                    style="margin-right: 10px">
                                                    <div class="fm-sm-container">
                                                        <a href="https://www.linkedin.com/company/ardenshr-services-private-limited/"
                                                            target="_blank" style="margin-right: 20px"><img
                                                                src="https://abs-website-assets.s3.ap-south-1.amazonaws.com/common-assets/social-media-ic/sm-ic-001.png"
                                                                alt="LinkedIn"></a>
                                                        <a href="https://www.instagram.com/ardenshr/" target="_blank"
                                                            style="margin-right: 20px"><img
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

    @elseif ($approvalStatus == "completed")
            <p>
                Dear {{$user_emp_name}},</p>
                <p>
                    Greetings from the HR Team!!!

                    Thank you for participating in our performance review. Your time, honesty and cooperation were really appreciated. The session won’t be successful without you.

                    Your Manager review has ended.

                    Thank you once again and have a wonderful day.

                    Regards
                <p>
                Regards<br/>
                Team HR
            </p>
    @endif





</body>
</html>
