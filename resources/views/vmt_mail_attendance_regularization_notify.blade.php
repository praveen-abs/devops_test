<?php
//$employee = \DB::table('vmt_employee_payslip')->first();
$general_info = \DB::table('vmt_general_info')->first();
//$employee_name =  \DB::table('users')->where('user_code','=',$employee->EMP_NO)->first('name');
$client_logo = request()->getSchemeAndHttpHost() . '' . $general_info->logo_img;
// dd(request()->getSchemeAndHttpHost()."".$general_info->logo_img);
$bank_names = \DB::table('bank_list')->get();

?>


<!DOCTYPE html>
<html lang="en">

<head>
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

        .p-top_5 {
            padding-top: 5px;
        }
        /* table tr td{
            padding: 0px;
        } */
        .padding-0{
            padding: 0px;
        }
    </style>
</head>

<body style="background-color:; padding: 5px; margin: 0;">
    <table id="wrapper" cellpadding="0" cellspacing="0" width="552"
        style="max-width:552px; height: auto; margin: 0 auto;   font-size: 14px !important; color: #403e3c; line-height: 24px;">
        <tbody>
            <tr>
                <td>
                    <table border="0" cellpadding="24" cellspacing="0" bgcolor="#ffffff"
                        style="border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;padding-top:0px;border: 1px solid #ccc;">
                        <tbody>
                            <tr>
                                <td align="center" style="padding:0;">

                                    <table cellpadding="20" cellspacing="0" width="100%" align="center">
                                        <tbody>
                                            <tr>
                                                <td colspan="4" align="center" class="border-less">
                                                    <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                        title="">
                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan="4" align="center" class="border-less padding-0">
                                                    <h3>Attendance Regularization Mail</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" align="center" class="padding-0">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                @if ($empAvatar['type'] == 'shortname')
                                                                    <td align="center"
                                                                        style="height: 100px;
                                                                        width: 100px;border-radius: 50%;background:#002f56;color:#ffffff;font-size:20px;font-weight:600;">
                                                                        {{ $empAvatar['data'] }}
                                                                    </td>
                                                                @elseif($empAvatar['type'] == 'avatar')
                                                                    <td align="center"
                                                                        style="height: 100px;
                                                                        width: 100px;border-radius: 50%;">

                                                                        <?php

                                                                        $imageURL = request()->getSchemeAndHttpHost() . '/images/' . $empAvatar['data'];

                                                                        ?>
                                                                        <img class="rounded-circle header-profile-user"
                                                                            src="{{ $imageURL }}"
                                                                            alt="user_image"
                                                                            style="height: 100%;width: 100%;border-radius: 50%;">
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="4" align="center" class="border-less" style="padding-top: 0px;">
                                                    <p class="text-strong p-top_5">{{ $employeeName}}</p>
                                                    {{-- <p  style="padding-top:5px;">hiee</p> --}}
                                                    <p class=" ">{!! $mail_message !!}</p>

                                                    <p class="   ">Please click the below link to regularize your
                                                        attendance</p>
                                                    <a href="{{ $loginLink }}/attendance-timesheet" style="text-decoration: none;
                                                    margin-left: 10px;
                                                    color: #ffffff;
                                                    cursor: pointer;
                                                    padding: 7px 14px;
                                                    border: 2px solid #fa9530;
                                                    background: #fa9530;
                                                    border-radius: 4px;
                                                    font-weight: 600;"
                                                        type="submit">Regularize Attendance</a>
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
                                                    This e-mail was generatd from ABShrms if you think this is
                                                    SPAM,please do report to<a href="info@abshrms.com"
                                                        style="text-decoration: none;color:none;"> info<span
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
                                                        <img src="{{ URL::asset('assets/images/Google_Play_Store.png') }}"
                                                            alt="" class=""
                                                            style="margin:0px 20px 0px 0px">
                                                    </a>

                                                </td>
                                                <td align="left" colspan="4" style="padding: 0;">
                                                    <a href="#" class="">
                                                        <img src="{{ URL::asset('assets/images/apple_play_store.png') }}"
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
                                <td style="padding-top:0px;">
                                    <table align="center" style="text-align:center;width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" width="100%" style="padding:0px;"
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


        </tbody>
    </table>
</body>

</html>
