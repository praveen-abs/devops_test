<?php

    // dd( $Decuction_Under_chapter_6a["10) Decuction Under chapter VI - A"][0]['particular'][0] );

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins&display=swap');

        * {
            font-family: 'Lobster', cursive;
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
        .td,
        tfoot {
            height: 20px !important;
        }
        td{
            padding: 0 0 0 8px;
        }

        .m-11 p-2 {
            margin-top: -6px !important;
        }

        @page{
            size: A4 portrait;
        }

        table {
          page-break-inside: avoid;
        }

        .p-2 {
            padding: 0 4px !important;
        }


    </style>

</head>

<body>

    <div class="main-page">

    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
        <tr>
            <td colspan="3">
                <h1 style="font-size:14px; color:rgba(0, 0, 0, 0.833)">ARDENS BUSINESS SOLUTIONS PRIVATE LIMITED</h1>
                <p style="margin-top:-4px; font-size:11px;width:400px; font-weight:700; color:gray; ">Ardens Business
                    Solutions Private Limited NO. 43, Pallavaram Main Road,
                    Managcherry, Kundrathur, Chennai Tamil Nadu 600069 India</p>
            </td>
            <td colspan="1">
                <img src="https://www.w3schools.com/images/lamp.jpg" class="float-right" height="40px" width="120px"
                    alt="">
            </td>
        </tr>
        <tr>
            <td style="width: 100%;" colspan="4">
                <table border="" style="border-bottom: 1px dashed gray; width:100%;"></table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h1 style="font-size:14px; color:rgba(0, 0, 0, 0.833)">TDS WORK SHEET <span
                        style="font-size:12px;color:gray">for the month of July 2023</span></h1>
            </td>
            <td colspan="3">
            </td>
        </tr>
        <tr>
            <td style="width: 25%;">
                <p style="font-size:11px">EMPLOYEE NAME</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">{{ $User_details[0]['name'] }}</h1>
            </td>
            <td style="width: 25%;">
                <p style="font-size:11px">PAN</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">{{ $User_details[0]['Pan Number'] }}</h1>
            </td>
            <td style="width: 25%;">
                <p style="font-size:11px">DESIGNATION</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">{{ $User_details[0]['Designation'] }}</h1>
            </td>
            <td style="width: 25%;">
                <p style="font-size:11px">TAX REGIME</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">{{ $User_details[0]['regime'] }}</h1>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;" colspan="4">
                <table border="" style="border-bottom: 1px dashed gray; width:100%;"></table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h1 style="font-size:11px;color:rgba(0, 0, 0, 0.833); margin-top:12px;">Details of salary paid and any
                    other income and tax deducted</h1>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table style="width: 100%;  border-collapse: collapse; " border="1">
                    <tr style="border-top:0px !important; height:20px !important;">
                        <td colspan="2" style="border-top:0px !important">
                            <p style="font-size:11px">Particulars</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px">Actual</p>
                        </td>
                        <td colspan="1" >
                            <p style="font-size:11px">Projection</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px">Total</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; " class="p-2 m-11"><b>1) Gross Earnings</b></p>
                            @foreach ($Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Actual"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $key }}</p>
                            @endforeach
                            <p style="font-size:11px; " class="p-2 m-11"><b>{{ "Total income" }}</b></p>
                        </td>
                        <td colspan="1">
                            @foreach ($Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Actual"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            @foreach ($Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Actual"] as $key => $single_value)
                                @foreach ($Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Projection"] as $key1 => $value)
                                    @if($key == $key1 )
                                        <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11">&nbsp;</p>
                            @foreach ($Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Actual"] as $key => $single_value)
                                @foreach ($Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Total"] as $key1 => $value)
                                    @if($key == $key1 )
                                        <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                                    @endif
                                @endforeach
                            @endforeach
                            <p style="font-size:11px; " class="p-2 m-11"><b>₹{{ $Gross_Earnings["1) Gross Earnings"][0]["particulars"]["Total Income"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; " class="p-2 m-11"><b>2) Allowance to the extent exempt under Section 10</b></p>
                            @foreach ($under_section_10["2) Allowance to the extent exampt under section 10"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11">{{ $under_section_10["2) Allowance to the extent exampt under section 10"][0]["actual"] }}</p>
                        </td>
                        <td colspan="1">

                        </td>
                        <td colspan="1">
                            @foreach ($under_section_10["2) Allowance to the extent exampt under section 10"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">&nbsp;</p>
                            @endforeach
                            <p style="font-size:11px; " class="p-2 m-11"><b>₹{{ $under_section_10["2) Allowance to the extent exampt under section 10"][0]["total"]}}</b></p>

                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>3) Total After Exception (1 -2)</b></p>
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{ $Total_after_excemption["3) Total after excemption (1 - 2)"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>4) Taxable Income under Previous employment</b></p>
                            @foreach ( $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                            <p style="font-size:11px; marign-top:-11px"><b>{{ $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["projection"] }}</b></p>
                        </td>
                        <td colspan="1">
                            @foreach ( $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["actual"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11">&nbsp;</p>
                            @foreach ( $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">&nbsp;</p>
                            @endforeach
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{  $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>5) Gross Total (3 + 4)</b></p>
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{  $Gross_Total["5) Gross Total (3 - 4)"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>6) Under Section 16</b></p>
                            @foreach ( $Under_section_16["6) Under section 16"][0]["particulars"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $key }}</p>
                            @endforeach
                            <p style="font-size:11px; marign-top:-11px"><b>{{ 'Total Under Section 16' }}</b></p>
                        </td>
                        <td colspan="1">
                            @foreach ( $Under_section_16["6) Under section 16"][0]["particulars"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11">&nbsp;</p>
                            @foreach ( $Under_section_16["6) Under section 16"][0]["particulars"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">&nbsp;</p>
                            @endforeach
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{  $Under_section_16["6) Under section 16"][0]["total"] }}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>7) Income Chargeable Under the Head Salaries (5 - 6)</b></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{  $Under_the_Head_Salaries["7) Income Chargeable Under the Head Salaries (5 - 6)"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>8) Any other income reported by the employee</b></p>
                           @foreach ($reported_by_the_employee["8) Any other income reported by the employee"][0]["particular"] as $key => $value)
                           <p style="font-size:11px; marign-top:-11px">{{ $value }}</p>
                           @endforeach
                           <p style="font-size:11px; marign-top:-11px"><b>Total Income From Other Sources</b></p>
                           <p style="font-size:11px; marign-top:-11px">Note: A maximum of 12,00,000.000 is allowed as exemption for housing loan interest on Self Occupied House Property and Let Out Property</p>
                        </td>
                        <td colspan="1">
                            @foreach ($reported_by_the_employee["8) Any other income reported by the employee"][0]["actual"] as $key => $value)
                             <p style="font-size:11px; marign-top:-11px">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @foreach ($reported_by_the_employee["8) Any other income reported by the employee"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @endforeach
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{ $reported_by_the_employee["8) Any other income reported by the employee"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>9) Gross Total Income (7 + 8)</b></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b> ₹{{ $Gross_Total_income["9) Gross Total income"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2" >
                            <p style="font-size:11px; marign-top:-11px"><b>10) Deduction under Chapter VI-A</b></p>

                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0] as $key => $value)
                             <p style="font-size:11px; marign-top:-11px"><b>{{  $key }}</b> </p>
                             @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0][$key] as $key => $value)
                             <p style="font-size:11px; marign-top:-11px;  width:100%; ">{{ $value['particular'] }} <span style="text-align: right;  float: right; padding-right:12px">{{ $value['dec_amount'] }}</span></p>
                            @endforeach
                            @endforeach
                            <p style="font-size:11px; marign-top:-11px"><b>{{ 'Total(80C+80CCC+80CCD)' }}</b></p>

                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][1] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px"><b>{{  $key }}</b> </p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][1][$key] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px;  width:100%; ">{{ $value['particular'] }} <span style="text-align: right;  float: right; padding-right:12px">{{ $value['dec_amount'] }}</span></p>
                           @endforeach
                           <p style="font-size:11px; marign-top:-11px"><b>{{ 'Total' }}</b></p>
                           @endforeach
                           <p style="font-size:11px; marign-top:-11px"><b>{{ 'Total of Deductions under Chapter VI-A' }}</b></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b>Qualifying</b></p>
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0][$key] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px;  width:100%; ">&nbsp;<span style="text-align: right;  float: right; padding-right:12px">&nbsp;</span></p>
                           @endforeach
                           @endforeach


                            <p style="font-size:11px; marign-top:-11px">{{ $Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['Total(80C+80CCC+80CCD)'] }}</p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][1] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                                @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['projection'] as $key1 => $value)
                                @if ($key == $key1)
                                <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                                <p style="font-size:11px; marign-top:-11px">{{ $value }}</p>
                                @endif
                                @endforeach
                           @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b>Deductible</b></p>

                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0][$key] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px;  width:100%; ">&nbsp;<span style="text-align: right;  float: right; padding-right:12px">&nbsp;</span></p>
                           @endforeach
                           @endforeach



                           <p style="font-size:11px; marign-top:-11px">{{ $Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['Total(80C+80CCC+80CCD)'] }}</p>
                           @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][1] as $key => $value)
                           <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                               @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['projection'] as $key1 => $value)
                               @if ($key == $key1)
                               <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                               <p style="font-size:11px; marign-top:-11px">{{ $value }}</p>
                               @endif
                               @endforeach
                          @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px"><b>&nbsp;</b> </p>
                            @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][0][$key] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px;  width:100%; ">&nbsp;<span style="text-align: right;  float: right; padding-right:12px">&nbsp;</span></p>
                           @endforeach
                           @endforeach
                           <p style="font-size:11px; marign-top:-11px">&nbsp;</p>

                           @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][1] as $key => $value)
                           <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                           @foreach ($Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['particular'][1][$key] as $key => $value)
                           <p style="font-size:11px; marign-top:-11px;  width:100%; ">&nbsp;<span style="text-align: right;  float: right; padding-right:12px">&nbsp;</span></p>
                          @endforeach
                          <p style="font-size:11px; marign-top:-11px">&nbsp;</p>
                          @endforeach


                            <p style="font-size:11px; marign-top:-11px"><b>₹{{ $Decuction_Under_chapter_6a['10) Decuction Under chapter VI - A'][0]['total_of_chapterVIa'] }} </b></p>
                        </td>
                    </tr>

                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>11) Total Income (Round By 10 Rupees) (9-10)</b></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"><b>₹{{ $Total_income["11) Total income (Round By 10 Rupees) (9 - 10)"][0]["total"]}}</b></p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>12) Tax Calculation</b></p>
                            @if ($Tax_Calculation["12) Tax Calculation"][0]["particular"] )
                            @foreach ( $Tax_Calculation["12) Tax Calculation"][0]["particular"] as $key => $value)

                            <p style="font-size:11px; marign-top:-11px;  width:100%; ">{{ $key }} <span style="text-align: right;  float: right; padding-right:12px">₹ {{ $value }}</span></p>

                            @endforeach
                            @endif
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{ '---' }}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>13) Total Tax on Income</b></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{ $Total_Tax_on_income['13) Total Tax on income'][0]['total'] }}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                             @foreach ($Surcharge_amt[0] as $key => $value)
                                <p style="font-size:11px; marign-top:-11px">{{ $key }}</p>
                                @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            @foreach ($Surcharge_amt[0] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">₹{{ $value }}</p>
                            @endforeach
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>14) Tax Payable including Education Cess minus of Relief Under Section 89</b></p>
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">₹{{ $Relief_Under_Section_89["14) Tax Payable including Education Cess minus of Relief Under Section 89"][0]["total"] }}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>15) Tax Deduction at Source u/s 192</b></p>
                            @foreach ($Source_us_192['15) Tax Deduction at Source u/s 192'][0] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">{{ $key }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            @foreach ($Source_us_192['15) Tax Deduction at Source u/s 192'][0] as $key => $value)
                            <p style="font-size:11px; marign-top:-11px">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{ '---' }}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important; height:20px !important; background-color:rgba(128, 128, 128, 0.629)">
                        <td colspan="2" style="border-top:0px !important">
                            <p style="font-size:11px">TDS for March</p>
                        </td>
                        <td colspan="1">

                        </td>
                        <td colspan="1" >
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px">₹ 99898</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="">
            <td colspan="4">
                <table style="width: 100%;">
                    <tr style=" height:20px !important;">
                        <td  style="width:40%; padding-top:16px;">
                            <p style="font-size:11px; border:0.4px solid gray ; width:100%;"></p>
                        </td>
                        <td style="width:20%; padding-top:16px; ">
                            <p style="font-size:11px;text-align:center;">WORKING NOTES</p>
                        </td>
                        <td  style="width:40%; padding-top:16px;">
                            <p style="font-size:11px; border:0.4px solid gray ; width:100%;"></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style="height:20px !important">
            <td colspan="4"><p style="font-size: 12px;">HRA exemption calculation under Section 10</p></td>
        </tr>
        <tr>
            <td colspan="4">
                <table style="width: 100%;  border-collapse: collapse; " border="1">
                    <tr style="border-top:0px !important; height:20px !important; background-color:rgb(204, 204, 255);">
                        <td colspan="" style="border-top:0px !important">
                            <p style="font-size:11px; padding-right:8px;">Months</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; text-align:right; padding-right:8px;">%Earned Basic (Metro 50%, Non-Metro 40%)</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;  padding-right:8px;">HRA RECEIVED</p>
                        </td>
                        <td colspan="1" >
                            <p style="font-size:11px; padding-right:8px;">Excess of Recent Paid Over 10% of Basic</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; padding-right:8px;">Exemption Amount</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="1" style=" text-align: right;">

                            @for ($i=0; $i< 12; $i++)
                            <p style="font-size:11px; text-align: right;white-space: nowrap " class="p-2 m-11">{{ $Hra_exception_calc[0][$i]['month'] }}</p>
                            @endfor
                        </td>
                        <td colspan="1">
                            @for ($i=0; $i<12; $i++)
                            <p style="font-size:11px; text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0][$i]['Earned_basic'] }}</p>
                            @endfor

                        </td>
                        <td colspan="1">
                            @for ($i=0; $i<12; $i++)
                            <p style="font-size:11px; text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0][$i]['Hra_received'] }}</p>
                            @endfor
                        </td>
                        <td colspan="1">
                           @for ($i=0; $i<12; $i++)
                            <p style="font-size:11px; text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0][$i]['rent_paid_over_10per'] }}</p>
                            @endfor
                        </td>
                        <td colspan="1">
                            @for ($i=0; $i<12; $i++)
                            <p style="font-size:11px; text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0][$i]['Exception_amt'] }}</p>
                            @endfor
                        </td>
                    </tr>

                    <tr style="border-top:0px !important;">
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Total</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0]['total_earnedbasic'] }}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0]['total_hrareceived'] }}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">₹{{ $Hra_exception_calc[0]['Excess_of_rentpaid'] }}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">₹{{ $Hra_exception_calc[0]['total_exception_amt'] }}</p>
                        </td>
                    </tr>

                    <tr style="border-top:0px !important; border-top:0px !important; height:20px !important; background-color:rgba(128, 128, 128, 0.629)">
                        <td colspan="4">
                            <p style="font-size:11px;" class="p-2 m-11">
                            Total House Rent Allowance Exemption Amount
                            </p>
                            <p  style="font-size:11px; margin-top:-10px;">Least amount of the three columns will be considered for tax exemption under HRA</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11">₹{{ $Hra_exception_calc[0]['total_exception_amt'] }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
    </table>
</div>
</body>

</html>
