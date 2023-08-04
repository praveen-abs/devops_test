<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings xmlns:o="urn:schemas-microsoft-com:office:office">
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <style>
    td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
  </style>
  <![endif]-->
    <style>
        .border {
            border: 1px solid #f3f4f6 !important;
        }

        .float-right {
            float: right
        }

        .float-left {
            float: left
        }

        @media (max-width: 600px) {
            .sm-w-full {
                width: 100% !important
            }

            .sm-px-2 {
                padding-left: 8px !important;
                padding-right: 8px !important
            }

            .sm-py-3 {
                padding-top: 12px !important;
                padding-bottom: 12px !important
            }
        }
    </style>
</head>

<body style="margin: 0; width: 100%; padding: 0; -webkit-font-smoothing: antialiased; word-break: break-word">
    <div role="article" aria-roledescription="email" aria-label lang="en">
        <div class="sm-px-2"
            style="border-radius: 8px; background-color: #000; font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif">
            <table align="center" cellpadding="0" cellspacing="0" role="none">
                <tr>
                    <td style="height: 100vh; background-color: #fff">
                        <table style="width: 90%" cellpadding="0" cellspacing="0" role="none">
                            <tr>
                                <td class="sm-py-3 sm-px-2" style="width: 900px; padding: 12px">
                                    <table class="sm-w-full"
                                        style="margin-left: auto; margin-right: auto; margin-top: 16px; width: 100%; background-color: #fff; height: 150px"
                                        cellpadding="0" cellspacing="0" role="none">
                                        <tr
                                            style="display: flex; width: 100%; align-items: center; justify-content: space-between">
                                            <td
                                                style="display: flex; width: 100%; flex-direction: column; justify-content: center; padding-left: 40px">
                                                <p style="font-size: 35px; font-weight: 600; color: #000">PAYSLIP <span
                                                        style="font-weight: 400; color: #6b7280"> MAR 2023</span></p>
                                                <p style="font-size: 14px; color: #000; height: 4px; margin-top:-20px ">
                                                    {{ $client_details[0]['client_fullname'] }}</p>
                                                <p
                                                    style="width: 300px; font-size: 14px; color: #000; margin-bottom: 30px; height: 24px">
                                                    REGISTERED ADDRESS:
                                                    {{ $client_details[0]['address'] }}</p>
                                            </td>
                                            <td style="" border="2">
                                                <img src='{{ $client_details[0]['client_logo'] }}' width="100" alt
                                                    style="max-width: 100%; vertical-align: middle; line-height: 1; border: 0; width: 300px; margin-top:25px;">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr style="display: flex; justify-content: center; width: 100% ; marign-top:10px;">
                                <td style="margin-left: 50px; width: 100%">
                                    <table class="sm-w-full" style="margin-left: auto; margin-right: auto; width: 100%"
                                        cellpadding="0" cellspacing="0" role="none">
                                        <tr style="width: 100%;">
                                            <td style="width: 100%;">
                                                <p
                                                    style="position: relative; font-weight: 700; color: #000 ;  margin-top:50px">
                                                    Employee Name : {{ $personal_details[0]['name'] }}</p>
                                                <table border="1" style="border-color: #000; width: 100%"
                                                    cellpadding="0" cellspacing="0" role="none">

                                                </table>
                                                <table style="height: 16px; width: 100%" cellpadding="0" cellspacing="0"
                                                    role="none">
                                                    <tr style="height: 16px; width: 100%;">
                                                        <td style="width: 25%">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280">
                                                                Employee Code</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000; font-size: 14px; ">
                                                                {{ $personal_details[0]['user_code'] }}</p>
                                                        </td>
                                                        <td style="height: 16px;width: 25%">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280; ">
                                                                Date Joined</p>
                                                            <p
                                                                style="display: flex; border-width: 1px; font-size: 14px;  border-color: #000; font-weight: 600; color: #000">
                                                                {{ $personal_details[0]['doj'] }}</p>
                                                        </td>
                                                        <td style="width: 25%">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                Department</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000;  font-size: 13px;">
                                                                {{ $personal_details[0]['department_name'] }}</p>
                                                        </td>
                                                        <td style="height: 16px;width: 25%">
                                                            <p
                                                                style="margin-bottom: 0; display: flex; height: 8px; font-size: 14px; color: #6b7280">
                                                                Sub Department</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000;  font-size: 13px;">
                                                                -</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="1" style="border-color: #f3f4f6; width: 100%"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                    <tr>
                                                    </tr>
                                                </table>
                                                <table style="width: 100%;" cellpadding="0" cellspacing="0"
                                                    role="none">
                                                    <tr style="width: 100%;">
                                                        <td class="" style=" width:25%; padding:4px;">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 13px; color: #6b7280;">
                                                                Designation</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000; font-size: 13px; ">
                                                                {{ $personal_details[0]['designation'] }}</p>
                                                        </td>
                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                Payment Mode</p>
                                                            <p
                                                                style="display: flex; border-width: 1px; font-size: 13px; border-color: #000; font-weight: 600; color: #000;">
                                                                -</p>
                                                        </td>

                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                Bank</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000; font-size: 13px;">
                                                                {{ $personal_details[0]['bank_name'] }}</p>
                                                        </td>
                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="margin-bottom: 0; display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                Bank IFSC</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000;  font-size: 13px;">
                                                                {{ $personal_details[0]['bank_ifsc_code'] }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="1" style="border-color: #f3f4f6; width: 100%;"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                    <tr>
                                                    </tr>
                                                </table>
                                                <table style="width: 100%;" cellpadding="0" cellspacing="0"
                                                    role="none">
                                                    <tr style="width: 100%;">
                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                Bank Account</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; color: #000; font-size: 13px;">
                                                                {{ $personal_details[0]['bank_account_number'] }}</p>
                                                        </td>
                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                PAN</p>
                                                            <p
                                                                style="display: flex; font-size: 13px; border-width: 1px; border-color: #000; font-weight: 600; color: #000;">
                                                                {{ $personal_details[0]['pan_number'] }}</p>
                                                        </td>
                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                UAN</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; font-size: 13px; color: #000;">
                                                                {{ $personal_details[0]['uan_number'] }}</p>
                                                        </td>
                                                        <td style=" width:25%; padding:4px;">
                                                            <p
                                                                style="margin-bottom: 0; display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                PF Number</p>
                                                            <p
                                                                style="display: flex; font-weight: 600; font-size: 13px; color: #000;">
                                                                {{ $personal_details[0]['epf_number'] }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="1" style="border-color: #000; width: 100%"
                                                    cellpadding="0" cellspacing="0" role="none">

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="sm-w-full" style="margin-right: auto; width: 95%; margin-left: 50px"
                                        cellpadding="0" cellspacing="0" role="none">
                                        <tr>
                                            <td>
                                                <p style="height:20px; font-weight: 700; color: #000; margin-top:50px">
                                                    SALARY DETAILS</p>
                                                <table border="1" style="border-color: #000; width: 100%"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                </table>
                                                <table style="width: 100%;" cellpadding="0" cellspacing="0"
                                                    role="none">
                                                    <tr style="width: 100%;">
                                                        <td>
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                ACTUAL PAYABLE DAYS</p>
                                                            <p style="display: flex; font-weight: 600; color: #000;">
                                                                {{ $salary_details[0]['month_days'] }}</p>
                                                        </td>
                                                        <td>
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                TOTAL WORKING DAYS</p>
                                                            <p
                                                                style="display: flex; border-width: 1px; border-color: #000; font-weight: 600; color: #000;">
                                                                {{ $salary_details[0]['worked_Days'] }}</p>
                                                        </td>
                                                        <td>
                                                            <p
                                                                style="display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                LOSS OF PAY DAYS</p>
                                                            <p style="display: flex; font-weight: 600; color: #000;">
                                                                {{ $salary_details[0]['lop'] }}</p>
                                                        </td>
                                                        <td>
                                                            <p
                                                                style="margin-bottom: 0; display: flex; height: 8px; font-size: 14px; color: #6b7280;">
                                                                DAYS PAYABLE</p>
                                                            <p style="display: flex; font-weight: 600; color: #000;">
                                                                {{ $salary_details[0]['worked_Days'] }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="1" style="border-color: #f3f4f6; width: 100%;"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                    <tr>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="display: flex; width: 100%; justify-content: center;">
                                                <table style="height: 20px; width: 50%" cellpadding="0"
                                                    cellspacing="0" role="none">
                                                    <tr style="height: 1px">
                                                        <td>
                                                            <p style="height: 1px; font-weight: 700; color: #000;">
                                                                EARNINGS</p>
                                                        </td>
                                                    </tr>
                                                    @foreach ($earnings[0] as $key => $single_data)
                                                    @if ($key == "Total_Earnings")
                                                    <tr style="height: 2px ">
                                                        <td style="">
                                                            <p style="height: 2px; font-weight: 700; color: #000;">
                                                                {{ str_replace('_', ' ', $key) }}</p>
                                                        </td>
                                                        <td class=""
                                                            style="display: flex; justify-content:center; align-items:center">
                                                            <p
                                                                style="height: 2px; font-weight: 700; color: #000;text-align: center;">
                                                                {{ $single_data }}</p>
                                                        </td>
                                                    </tr>

                                                    @else
                                                    <tr style="height: 2px ">
                                                        <td style="">
                                                            <p style="height: 2px; color: #000;">
                                                                {{ str_replace('_', ' ', $key) }}</p>
                                                        </td>
                                                        <td class=""
                                                            style="display: flex; justify-content:center; align-items:center">
                                                            <p
                                                                style="height: 2px; color: #000;text-align: center;">
                                                                {{ $single_data }}</p>
                                                        </td>
                                                    </tr>
                                                    @endif

                                                    @endforeach

                                                </table>
                                                <table border="1"
                                                    style="border-color: #f3f4f6; width:1px; height:40vh; marign-left:30px !important;"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                </table>
                                                <table style="height: 20px; width: 50%; padding-left:10px;"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                    <tr style="height: 2px">
                                                        <td>
                                                            <p style="height: 2px; font-weight: 700; color: #000;">
                                                                CONTRIBUTIONS</p>
                                                        </td>
                                                    </tr>
                                                    @foreach ($contribution[0] as $key => $single_data)
                                                        @if ($key == 'Total_Contribution')
                                                            <tr style="height: 2px;">
                                                                <td style="margin-top:-20px">
                                                                    <p
                                                                        style="height: 2px; font-weight: 700; color: #000;">
                                                                        {{ str_replace('_', ' ', $key) }}</p>
                                                                </td>
                                                                <td>
                                                                    <p
                                                                        style="height: 2px; font-weight: 700; color: #000;">
                                                                        {{ $single_data }}</p>
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr style="height: 2px;">
                                                                <td style="margin-top:-20px">
                                                                    <p style="height: 2px; color: #000;">
                                                                        {{ str_replace('_', ' ', $key) }}</p>
                                                                </td>
                                                                <td>
                                                                    <p style="height: 2px; color: #000;">
                                                                        {{ $single_data }}</p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                    <tr style="height: 2px;">
                                                        <td>
                                                            <p style="height: 2px; font-weight: 700; color: #000">TAXES & DEDUCTIONS</p>
                                                        </td>
                                                    </tr>
                                                    @foreach ($Tax_Deduction[0] as $key => $single_data)
                                                    @if ($key == "Total_Deduction")
                                                    <tr style="height: 2px;">
                                                        <td>
                                                            <p style="height: 2px; font-weight: 700; color: #000;">
                                                                {{ str_replace('_', ' ', $key) }}</p>
                                                        </td>
                                                        <td>
                                                            <p style="height: 2px; font-weight: 700; color: #000;">
                                                                {{ $single_data }}</p>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    <tr style="height: 2px;">
                                                        <td>
                                                            <p style="height: 2px; color: #000;">
                                                                {{ str_replace('_', ' ', $key) }}</p>
                                                        </td>
                                                        <td>
                                                            <p style="height: 2px; color: #000;">
                                                                {{ $single_data }}</p>
                                                        </td>
                                                    </tr>
                                                    @endif

                                                    @endforeach
                                                </table>
                                            </td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="1" style="border-color: #000; width: 100%"
                                                    cellpadding="0" cellspacing="0" role="none">
                                                </table>

                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 100px">
                                <td style="width: 100%;">
                                    <table style="width: 100%;" cellpadding="0" cellspacing="0" role="none">
                                        <tr
                                            style="margin-left: 45px; display: flex; width: 100%; justify-content: center">
                                            <td style="width: 40%">
                                                <p style="height: 16px; color: #000">Net Salary Payable ( A - B - C )
                                                </p>
                                                <p style="height: 8px; color: #000;">Net Salary in words</p>
                                            </td>
                                            <td style="width: 70%">
                                                <p style="height: 16px; color: #000;">
                                                    {{ $over_all[0]['Net_Salary_Payable'] }}</p>
                                                <p style="height: 16px; font-weight: 700; color: #000;">
                                                    {{ $over_all[0]['Net_Salary_in_words'] }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 100px; width: 100%">
                                <td style="display: flex; width: 60%; justify-content: center">
                                    <p style="color: #000;"> <span style="font-weight: 700;">**Note :</span> All
                                        amounts displayed in this payslip are in <span
                                            style="font-weight: 700;">INR</span> </p>
                                </td>
                                <td style="display: flex; width: 65%; justify-content: flex-start">
                                    <p style="margin-left: 56px; color: #000">*This is computer generated statement,
                                        does not require signature.</p>
                                </td>
                            </tr>
                            <tr style="height: 100px; width: 100%;"> </tr>
                            <tr style="height: 100px;">
                                <td> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
