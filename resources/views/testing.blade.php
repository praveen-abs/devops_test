<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OkR</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">


    <style>
        .pms_mailTemplate {
            border-radius: 1em;
            padding: 2em;
            text-align: justify;
        }


        .template_mail {
            width: 100%;
        }


        @page {
            size: A4;
        }


        .pms_mailTemplate {
            width: 100%;
            border: 0;
            background-color: #fff;
            /* white-space: nowrap; */
            font-size: .9em;
        }

        .pms_mailTemplate .inner-content {
            /* box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px; */
            box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
            width: 100%;
            height: auto;
            border-radius: 1em;
        }


        .pms_mailTemplate td {
            border: 0;
            whhite-space: nowrap;
        }

        .text-bolder {
            font-weight: 700;
        }

        .text-center {
            text-align: center;
        }

        .text-rignt {
            text-align: right;
        }

        .text-justified {
            text-align: justify;
        }

        .border-t-b {
            border-top: 1px solid #b6b3b3 !important;
            border-bottom: 1px solid #b6b3b3 !important;
        }

        .border-b {
            border-bottom: 1px solid #b6b3b3 !important;
        }

        .p-t-b {
            padding-top: .8em;
            padding-bottom: .8em;
        }

        .p-t-b-1.5 {
            padding-top: 1.5em;
            padding-bottom: 1.5em;
        }

        .p-b-1.5 {
            padding-bottom: 1.5em;
        }

        .margin-0: {
            margin: 0;
        }

        .border-t-blue {
            border-top: .3em solid #003056 !important;
        }

        .border-t-orange {
            border-top: .3em solid #ff3900 !important;
        }
    </style>
</head>

<body>
    <div style="display:flex;justify-content: center;">
        <table class="pms_mailTemplate" style="margin: 0 auto;font-family: 'Poppins', sans-serif;">
            <tr>
                <td colspan="4" style="border-radius:10px;border:1px solid #ccc;padding:20px 40px">
                    <table class="template_mail"
                        style="width:500px;
                        border-collapse:collapse;font-family: 'Poppins', sans-serif;">
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center"
                                    style="padding-bottom:20px;
                                    text-align: center;">
                                    <div class="logo text-center" style="width:100%;height:30px;">
                                        <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                                            alt="" class="" style="width:140px;height:30px;">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="border-t-blue" style=" border-top: 2px solid #003056;padding-bottom:20px;"
                                    colspan="1">
                                </td>
                                <td class="border-t-orange" style="border-top: 2px solid #ff3900;padding-bottom:20px; "
                                    colspan="1">
                                </td>
                                <td class="border-t-blue" style=" border-top: 2px solid #003056;padding-bottom:20px;"
                                    colspan="1">
                                </td>
                                <td class="border-t-orange" style="border-top: 2px solid #ff3900;padding-bottom:20px; "
                                    colspan="1">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <div class="inner-content">
                                        <table class="template_mail" style="font-family: 'Poppins', sans-serif;">
                                            <tr>
                                                <td colspan="4" align="center">
                                                    <div class="logo text-center" style="width:100%;height:30px;">
                                                        <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                                                            alt="" class=""
                                                            style="width:140px;height:30px;">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top: 1em;padding-bottom: 1em;"
                                                    align="">
                                                    <p class="text-center"
                                                        style="font-size:40px;margin:0;text-align:center;">Hi <b
                                                            class="" style="font-size:1em">Manoj</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="">
                                                    <p class="text-justified"
                                                        style="font-size:16px;margin:0;text-align:justify;">
                                                        This is to inform you that Mr. / Ms. {Employee Name} has
                                                        accepted his/
                                                        her
                                                        OKR/ PMS forms
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="4" align=""
                                                    style="padding-bottom: 1em;padding-top:1em;">
                                                    <p class="text-justified"
                                                        style="font-size:16px;margin:0;text-align:justify;">
                                                        Request you to kindly have a “Great Conversation” with “Mr.
                                                        / Mrs.
                                                        Employee
                                                        Name” and Complete the OKR/PMS within the time frame.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="">
                                                    <p class="text-justified"
                                                        style="font-size:16px;margin:0;text-align:justify;">
                                                        Kindly visit the HRMS portal for more details HRMS LINK to
                                                        be Provided
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <p class="text-center" style="font-size:1.2em">
                                        Cheers,
                                    </p>
                                    <p class="text-center" style="font-size:1.5em;color:#ff3900;padding-bottom:.5em">
                                        ABS_OKR Automated System.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td class="border-t-blue" style=" border-top: 2px solid #003056" colspan="1">
                                </td>
                                <td class="border-t-orange" style="border-top: 2px solid #ff3900 " colspan="1"
                                    style="padding-bottom:.5em"></td>
                                <td class="border-t-blue" style=" border-top: 2px solid #003056" colspan="1">
                                </td>
                                <td class="border-t-orange" style="border-top: 2px solid #ff3900 " colspan="1"
                                    style="padding-bottom:.5em"></td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-center" style="padding:0 4em;">
                                    <p class="text-center" style="font-size: .9em;">
                                        This e-mail was generated from ABShrms,if you think is spam,please do report
                                        to

                                    </p>
                                    <a class="text-center" href=" info@abshrms.com"
                                        style="font-size: .9em;text-decoration:none;color:#ff3900;">
                                        info@abshrms.com
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center" style="padding:1em 4em;">
                                    <div style="">
                                        <a href="https://www.linkedin.com/company/ardenshr-services-private-limited/"
                                            target="_blank">
                                            <img src="{{ URL::asset('assets/images/linkedin1.png') }}" alt=""
                                                class="" style="width:24px;height:24px;">
                                        </a>
                                        <a href="https://www.instagram.com/ardenshr/" target="_blank">
                                            <img src="{{ URL::asset('assets/images/instagram.png') }}" alt=""
                                                class="" style="width:24px;height:24px;margin:0 1em">
                                        </a>
                                        <a href="https://www.facebook.com/ArdensHR" target="_blank">
                                            <img src="{{ URL::asset('assets/images/facebook.png') }}" alt=""
                                                class="" style="width:24px;height:24px;">

                                        </a>
                                        <a href="https://www.youtube.com/channel/UCgZ7XpBoJvcWWvaiBS5GxHg"
                                            target="_blank">
                                            <img src="{{ URL::asset('assets/images/youtube.png') }}" alt=""
                                                class="" style="width:24px;height:24px;margin:0 0em 0 1em">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center" style="padding:1em 4em;">
                                    <div class="logo text-center" style="width:100%;height:30px;">
                                        <span style="color:#b6b3b3;margin-right:.3em">Powred by</span>
                                        <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                                            alt="" class="" style="width:10%;height:60%;">
                                        {{-- <img src="{{ URL::asset('assets/images/client_logos/ardens/evangelist.png') }}"
                                            alt="" class="" style="width:130px;height:30px;"> --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
