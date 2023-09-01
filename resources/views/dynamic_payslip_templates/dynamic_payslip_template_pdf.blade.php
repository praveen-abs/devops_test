<?php

 $client_logo_path   = public_path($client_details[0]['client_logo']);

 $client_image  = base64_encode(file_get_contents($client_logo_path));

 $abs_public_logo  =  public_path($date_month['abs_logo']);

 $abs_logo  = base64_encode(file_get_contents($abs_public_logo));

 $date=date_create($personal_details[0]['doj']);

 $doj  =  date_format($date ,"d-m-Y");

?>


<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">

    <style>
       @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins&display=swap');
       *{
        font-family: 'Lobster', cursive ;
        font-family: 'Poppins', sans-serif;
       }
        .border {
            border: 1px solid #f3f4f6 !important;
        }
        .float-right {
            float: right
        }

        .float-left {
            float: left
        }
        .td{
            height: 10px !important;
        }

        .marign-top1{

        }
    </style>
</head>


<body>
    <table style="width: 100%;  border-collapse: collapse; background:#fff;  ">
            <tr>
                <td colspan="3" style="margin-top:-10px" >
                    <h3 style="color:#000; ">PAYSLIP <span style="color:gray; font-weight:500;   font-family: 'Poppins', sans-serif !important;">{{ $date_month['Month']}} {{$date_month['Year']}}</span></h3>
                    <p style="color:#000;font-size:10px; margin-top:-10px;">{{$client_details[0]['client_fullname']}}</p>
                    <div style=" text-align: justify; width:200px;">
                        <p style="color:#000; font-size:9px;  text-align:left; margin-top:-10px;">{{ $client_details[0]['address'] }}</p>
                    </div>

                </td>
                <td colspan="1" style="">
                    <img src="data:image/png;base64,{{ $client_image }}" style="margin-top:40px; " width="160px" height="60px"  >
                </td>
            </tr>
        <tr class="td"  style="height:10px; marign:0px;">
            <td colspan="4" class="td"  border="2" style="marign:0px;">
                <h5 style="font-size: 12px; margin-bottom:2px ;margin-top:-4px;">Employee Name : {{ $personal_details[0]['name'] }}</h5>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="1" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        <tr class="td" style="height: 30px">
            <td class="" style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">Employee Number</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['user_code']}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray; margin-top:-4px">Date Joined</p>
                <p style="font-size:11px; margin-top:-8px">{{ $doj ?? " - "}}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray; margin-top:-4px">Department</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['department_name'] ?? " - "}}</p>
            </td>
            <td class="" style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray; margin-top:-4px">Designation </p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['designation'] ?? " - " }}</p>
            </td>

        </tr>
        <tr>
            <td  colspan="4" style=" ">
                 <table style="border-bottom:0.4px solid rgb(175, 175, 175); width:100%;margin-top:-8px;"></table>
            </td>
        </tr>
        <tr class="td" style="height: 30px">

            <td style="width:25%;">
                <p style="font-size:10px;color:gray; margin-top:-4px">Payment Mode</p>
                <p style="font-size:11px; margin-top:-8px"> {{ empty($personal_details[0]['bank_account_number']) ? "Cheque" : "Bank" }}</p>
            </td>

            <td style="width:25%;">
                <p style="font-size:10px;color:gray; margin-top:-4px">Bank Name</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['bank_name'] ?? " - " }}</p>
            </td>
            <td class="" style="height: 30px;width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">Bank Account</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['bank_account_number'] ?? " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">Bank IFSC</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['bank_ifsc_code'] ?? " - " }}</p>
            </td>

        </tr>
        <tr>
            <td  colspan="4">
                <table style="border-bottom:0.4px solid rgb(175, 175, 175); width:100%;margin-top:-6px"></table>
            </td>
        </tr>
        <tr class="td" style="height: 30px">

            <td style="width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">PAN</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['pan_number'] ?? " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">ESIC</p>
                <p style="font-size:11px; margin-top:-8px">{{ "-" }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">UAN</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['uan_number'] ?? " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;margin-top:-4px">EPF Number</p>
                <p style="font-size:11px; margin-top:-8px">{{ $personal_details[0]['epf_number'] ?? " - " }}</p>
            </td>


        </tr>
        <tr>
            <td colspan="4">
                <table border="0.5" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>

        <tr class="td"  style="height:20px; marign:0px;">
            <td colspan="4" class="td"  border="2" style="marign:0px; padding-top:10px">
                <p style="font-size: 12px; margin-bottom:2px ">LEAVE DETAILS</p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="0.5" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        <tr class="td" style="height: 20px">

            <td class="" style="height: 20px;width:25%;">
                <p style="font-size:10px;color:gray; ">Leave Type</p>
                @for ($i=0; $i<count($leave_data); $i++)
                <p style="font-size:11px; margin-top:-8px">{{ $leave_data[$i]['leave_type']}}</p>
                @endfor
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Opening Balance</p>
                @for ($i=0; $i<count($leave_data); $i++)
                <p style="font-size:11px; margin-top:-8px">{{ $leave_data[$i]['opening_balance'] }}</p>
                @endfor
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Avalied</p>
                @for ($i=0; $i<count($leave_data); $i++)
                <p style="font-size:11px; margin-top:-8px">{{ $leave_data[$i]['avalied'] }}</p>
                @endfor
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">Closing Balance</p>
                @for ($i=0; $i<count($leave_data); $i++)
                <p style="font-size:11px; margin-top:-8px">{{ $leave_data[$i]['closing_balance'] }}</p>
                @endfor
            </td>

        </tr>

        <tr>
            <td  colspan="4">
                <table style="border-bottom:0.4px solid rgb(175, 175, 175); width:100%;"></table>
            </td>
        </tr>


        <tr class="td"  style="height:20px; marign:0px;">
            <td colspan="4" class="td"  border="2" style="marign:0px;">
                <p style="font-size: 12px; margin-bottom:2px ">SALARY DETAILS</p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="0.5" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        <tr class="td" style="height: 20px">
            <td class="" style="height: 20px;width:25%;">
                <p style="font-size:10px;color:gray;">ACTUAL PAYABLE DAYS</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['month_days'] ?? " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">TOTAL WORKING DAYS</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['worked_Days'] ?? " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">LOSS OF PAY DAYS</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['lop'] ?? " - " }}</p>
            </td>
            <td style="width:25%;">
                <p style="font-size:10px;color:gray;">ARREAR DAYS PAYABLE</p>
                <p style="font-size:11px; margin-top:-8px">{{ $salary_details[0]['arrears_Days'] ?? " - " }}</p>
            </td>

        </tr>
        <tr>
            <td colspan="4" >
                    <table  style="width:100%;border-collapse: collapse; border-bottom: 0.4px solid rgba(128, 128, 128, 0.603);  "></table>
            </td>
        </tr>
        <tr style="width: 100%;">
            <td colspan="2" style=" marign-bottom:auto;position:relative; ">
                <table style="position:absolute; top:1px; width:100%; margin-bottom:auto !important; ; paddin-bottom:auto" cellpadding="0" cellspacing="0" role="none">
                    <tr>
                      <td style="width:40%">
                        <h1 style="height: 8px;  color: #000;font-size:11px;">EARNINGS</h1>
                      </td>
                      <td style="width:20%">
                        <h1 style="height: 8px; color: #000; margin-left:-1px; text-align:left;font-size:11px;">Fixed</h1>
                      </td>

                      <td style="width:20%">
                          @if (!empty($arrears[0]))
                          <p style="height: 8px; color: #000;margin-left:-1px; text-align:left;font-size:11px;font-size:11px;">Arrears</p>
                          @endif
                        </td>

                      <td style="width:20%">
                        <h1 style="height: 8px; color: #000;margin-left:-1px;font-size:11px;">Earned</h1>
                      </td>
                    </tr>
                    @foreach ($earnings[0] as $earned_key => $single_earnings)

                    @if ($earned_key == "Total Earnings")
                    <tr>
                      <td style="width:40%">
                        <p style="height: 8px; color: #000; font-size:11px; ">{{$earned_key."(A)"}} </p>
                      </td>
                      <td style="width:20%">
                   @if($earned_key =="Basic" || $earned_key =="HRA")

                          @foreach ($compensatory_data as $key => $single_value )

                            <p style="height: 8px; color: #000;font-size:11px; ">{{ $single_value[$earned_key] }}</p>

                          @endforeach
                    @endif
                      </td>
                      <td style="width:20%">
                      @if (!empty($arrears[0]))

                      @foreach ($arrears[0] as $key => $single_value )

                      @if($key == $earned_key)
                      <p style="height: 8px; color: #000; font-size:11px;">{{ $single_value }}</p>
                      @endif

                     @endforeach

                      @endif
                      </td>
                      <td style="width:20%">
                        <p style="height: 8px; color: #000; font-size:11px;"> {{ $single_earnings}} </p>
                      </td>
                    </tr>
                    @else
                    <tr>
                      <td style="width:40%">
                        <p style="height: 8px; color: #000;font-size:11px;">{{$earned_key}}</p>
                      </td>
                      <td style="width:20%">


                          @foreach ($compensatory_data as $key => $single_value )

                          @if($earned_key =="Basic" || $earned_key =="HRA")
                            <p style="height: 8px; color: #000; font-size:11px; ">{{ $single_value[$earned_key] }}</p>

                            @endif
                          @endforeach

                      </td>
                      <td style="width:20%">
                          @if (!empty($arrears[0]))

                          @foreach ($arrears[0] as $key => $single_value )

                              @if($key == $earned_key)
                              <p style="height: 8px; color: #000;font-size:11px; ">{{ $single_value }}</p>
                              @endif

                         @endforeach

                          @endif
                      </td>
                      <td style="width:20%">
                        <p style="height: 8px; color: #000;font-size:11px;">{{ $single_earnings}}</p>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </table>
{{--  --}}            </td >
   <td colspan="2" style=" marign:auto;">
                <table style="width:100% important; border-left: 0.4px solid rgba(128, 128, 128, 0.603);" >
                    <tr style="height: 12px">
                        <td colspan="2" style="height: 12px">
                            <h1 style="font-size:10px;"><b>CONTRIBUTIONS</b></h1>
                        </td>
                    </tr>
                    @foreach ($contribution[0] as $key => $single_contribution)
                    @if ($key =="Total Contribution")
                    <tr style="height: 12px">
                        <td style="height: 12px">
                            <h1 style="font-size:10px; margin-top:-4px; ">{{ $key }}</h1>
                        </td>
                        <td>
                            <p style="font-size:10px; float: right; margin-top:-4px; ">{{ $single_contribution }}</p>
                        </td>
                    </tr>
                        @else
                        <tr style="height: 12px">
                            <td style="height: 12px">
                                <p style="font-size:10px; margin-top:-4px;">{{ $key }}</p>
                            </td>
                            <td>
                                <p style="font-size:10px; float: right; margin-top:-4px;">{{ $single_contribution }}</p>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td colspan="2">
                            <h1  style="font-size:10px; margin-top:-4px;"><b>TAXES & DEDUCTIONS</b></h1>
                        </td>
                    </tr>
                    @foreach ($Tax_Deduction[0] as $key => $single_taxdeduction)
                    @if ( $key == "Total Deduction")
                    <tr>
                        <td>
                            <h1  style="font-size:10px; margin-top:-4px; ">{{ $key }}</h1>
                        </td>
                        <td>
                            <p style="font-size:10px; float: right; margin-top:-4px; ">{{ $single_taxdeduction }}</p>
                        </td>
                    </tr>
                        @else
                        <tr>
                            <td>
                                <p  style="font-size:10px; margin-top:-4px;">{{ $key }}</p>
                            </td>
                            <td>
                                <p style="font-size:10px; float: right; margin-top:-4px;">{{ $single_taxdeduction }}</p>
                            </td>
                        </tr>
                    @endif

                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="1" style="width:100%;border-collapse: collapse; border-color:black"></table>
            </td>
        </tr>
        @foreach ($over_all[0] as $key => $total_sumvalue)
        @if ($key == "Net Salary in words")
        <tr>
            <td colspan="1">
                <p style="font-size:12px font-weight:900 ; margin-top:-8px">{{ $key }}</p>
            </td>
            <td colspan="4">
                <h1 style="font-size:12px; margin-left:110px;margin-top:-8px ">{{  $total_sumvalue }}</h1>
            </td>
        </tr>
            @else
            <tr>
                <td colspan="1">
                    <p style="font-size:12px">{{ $key }}(A-B-C)</p>
                </td>
                <td colspan="4">
                    <p style="font-size:12px; margin-left:110px;"><span > &#x20B9;</span> {{  $total_sumvalue }}</p>
                </td>
            </tr>
        @endif
        @endforeach
        <tr>
            <td colspan="2">
                <p style="font-size: 12px;  margin-top:-10px"><b>**Note :</b> All amounts displayed in this payslip are in <b>INR</b></p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="font-size: 10px; ">*This is computer generated statement, does not require signature</p>
            </td>
        </tr>

        <tr style="width: 100%">
            <td colspan="4" style="height: 0px">
                <img src="data:image/png;base64,{{ $abs_logo }}" style=" Width:100px; height:40px; float:right; margin-top:-20px">
                <p style="font-size: 12px; float:right; color:gray;margin-right:10px; margin-top:-10px">Generated by</p>
            </td>
        </tr>

    </table>
</body>
</html>
