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
    </style>
</head>

<body style="background-color:; padding: 5px; margin: 0;">
    <table id="wrapper" cellpadding="0" cellspacing="0" width="552"
        style="max-width:552px; height: auto; margin: 0 auto;   font-size: 14px !important; color: #403e3c; line-height: 24px;">
        <tbody>
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
                                                <td colspan="4" align="center" class="border-less">
                                                    <img src={{ $client_logo }} style="height:45px;width:150px;"
                                                        title="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="left" class="border-less"
                                                    style="padding:10px ;">

                                                    {{-- <p class="" style="margin: 0px 0px 0px "> {{ $employeeName}}</p> --}}



                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="4" align="left" class="border-less"
                                                    style="padding:10px ;">

                                                    <p class="text-strong " style="margin: 0px 0px 0px ">Dear {{ $managerName}}</p>
                                                    <p class="" style="  ">
                                                        You have
                                                        been sent the following leave request for approval. Please
                                                        review the below details.</p>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"
                                    style="padding:0px 40px 0px;"
                                    colspan="">
                                    <div class=""
                                        style="height:auto;width:90%;border-radius:5px;padding:10px;margin:auto;">
                                        <table style="table-layout:fixed; width:100%;border:1px solid rgba(44, 43, 43, 0.185);border-radius:5px;padding:10px">
                                            <tbody>

                                                <tr>
                                                    <td colspan="8"
                                                        style="color:#002f56;font-weight:600;font-size:20px;padding-bottom:20px;"
                                                        align="center">
                                                        Leave Request From
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" align="center">
                                                        {{-- <div
                                                            style="text-align:center;display:flex;height:100px;width:100px;margin:auto;border-radius:50%;background:#1b7df7;color:#ffffff;justify-content: center;
                                                            align-items: center;font-weight:600px;font-size:20px">
                                                            <p style="width:100%;height:100%;text-center;position:relative;top:38px;">MS</p>

                                                        </div> --}}

                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="height: 100px;
                                                                    width: 100px;
                                                                    background:#1b7df7;color:#ffffff;
                                                                    border-radius: 50%;font-size:20px;font-weight:600;">
                                                                        MX</td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td colspan="8"
                                                        style="color:#002f56;font-weight:600;font-size:20px;padding-bottom:20px;"
                                                        align="center">
                                                      {{$employeeName}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"
                                                        style="color:#002f56;font-weight:600;font-size:20px;border-right:1px solid #adadad;"
                                                        align="center">
                                                        <div>
                                                            <p
                                                                style="font-weight:500;color:#adadad;margin-bottom:0px;margin-top:0px;font-size:12px">
                                                                Requested on
                                                            </p>
                                                            <p
                                                                style="font-weight:600;color:#002f56;margin-bottom:0px;margin-top:0px;font-size:14px">

                                                                <span>{{$startDate}}</span>

                                                            </p>
                                                            <p
                                                                style="font-weight:500;color:#c1c1c1;margin-bottom:0px;margin-top:0px;font-size:12px">
                                                                (Thursday)
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td colspan="4"
                                                        style="color:#002f56;font-weight:600;font-size:20px;padding-bottom:10px"
                                                        align="center">
                                                        <div>
                                                            <p
                                                                style="font-weight:500;color:#adadad;margin-bottom:0px;margin-top:0px;font-size:12px">
                                                                Leave Request Date(s)
                                                            </p>
                                                            <p
                                                                style="font-weight:600;color:#002f56;margin-bottom:0px;margin-top:0px;font-size:14px">

                                                                <span>{{$startDate}}</span>
                                                                <span>-</span>
                                                                <span>{{$endDate}}</span>

                                                            </p>

                                                            <p
                                                                style="font-weight:500;color:#c1c1c1;margin-bottom:0px;margin-top:0px;font-size:12px">
                                                                {{-- <span
                                                                    style="text-align:left ;margin-right:10px;">(Thursday)</span>
                                                                <span
                                                                    style="text-align:right;margin-left:10px;">(Friday)</span> --}}
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="8"
                                                        style="color:#002f56;font-weight:600;font-size:20px;padding-bottom:10px;"
                                                        align="center">
                                                        <div>
                                                            <p
                                                                style="font-weight:500;color:#c1c1c1;margin-bottom:0px;margin-top:0px;font-size:12px">
                                                               {{$reason}}
                                                            </p>
                                                            <p
                                                                style="font-weight:600;color:#002f56;margin-bottom:0px;margin-top:0px;font-size:14px">
                                                                {{$totalLeaveDatetime}} Day of sick leave
                                                            </p>

                                                            <p
                                                                style="font-weight:500;color:#c1c1c1;margin-bottom:0px;margin-top:0px;font-size:12px">
                                                                (Personal Emergency)
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" style="" align="center"
                                                        style="padding-bottom:0px;">
                                                        <p style="padding-bottom:10px;">Approve or Reject this request
                                                            using the buttons below</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="" align="right">

                                                        <a class="" type="button" href="#"
                                                            style="text-decoration:none;cursor: pointer; margin-right:30px;color:#ffffff;padding: 7px 30px;border: 2px solid #90f10c;background: #90f10c;border-radius: 4px;font-weight:600">
                                                            Approve
                                                        </a>
                                                    </td>
                                                    <td colspan="4" style="" align="left">

                                                        <a class="" type="button" href="#"
                                                            style="text-decoration:none;cursor: pointer;margin-left:30px;color:#ffffff;padding: 7px 30px;border: 2px solid #f12d0c;background: #ff2500;border-radius: 4px;font-weight:600">
                                                            Reject
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" style="" align="center">
                                                        <p style="padding-top:0px;font-size:12px;"><span
                                                                style="color:#fa9530;"> Note - </span>When rejecting a
                                                            leave request, kindly include the reason for rejection in
                                                            the response email. </p>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td align="center" style="padding:10px 0px 0px 0px">
                                                    This e-mail was generatd from ABShrms if you think this is
                                                    SPAM,please do report to<a
                                                        href="https://mail.google.com/mail/u/0/#sent?compose=new"
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
                                <td style="padding:0 !important;">
                                    <table align="center" style="text-align:center;width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" width="100%"
                                                    style="padding-bottom:0px !important;">
                                                    <div class="d-flex justify-content-center social-icons-wrapper">
                                                        <a href="https://accounts.google.com/signin" class=""
                                                            style="margin-right: 50px;text-decoration:none;">

                                                            <img src="http://127.0.0.1:8000/assets/images/login_img/google.png"
                                                                alt="" class=""
                                                                style="height:20px;width:20px;">
                                                        </a>
                                                        <a href="https://www.linkedin.com/login" class=""
                                                            style="margin:0px 30px;text-decoration:none;">

                                                            <img src="http://127.0.0.1:8000/assets/images/login_img/linkedIn_PNG39.png"
                                                                alt="" class=""
                                                                style="height: 20px;width:20px;">
                                                        </a>
                                                        <a class=""
                                                            href="https://login.live.com/login.srf?wa=wsignin1.0&amp;rpsnv=13&amp;ct=1658217648&amp;rver=7.0.6738.0&amp;wp=MBI_SSL&amp;wreply=https:%2F%2Faccount.microsoft.com%2Fauth%2Fcomplete-signin%3Fru%3Dhttps%253A%252F%252Faccount.microsoft.com%252F%253Frefp%253Dsignedout-index%2526refd%253D127.0.0.1&amp;lc=1033&amp;id=292666&amp;lw=1&amp;fl=easi2"
                                                            style="margin:0px 0px 0px 50px;text-decoration:none;">

                                                            <img src="http://127.0.0.1:8000/assets/images/login_img/microsoft_PNG18.png"
                                                                alt="" class=""
                                                                style="height: 20px;width:20px;">
                                                        </a>
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
