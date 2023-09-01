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

        .p-2 {
            padding: 0 4px !important;
        }
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse;">
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
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">AUGUSTIN RAJ A, AR1005</h1>
            </td>
            <td style="width: 25%;">
                <p style="font-size:11px">PAN</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">AJUPA5100C</h1>
            </td>
            <td style="width: 25%;">
                <p style="font-size:11px">DESIGNATION</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">MD and CEO</h1>
            </td>
            <td style="width: 25%;">
                <p style="font-size:11px">TAX REGIME</p>
                <h1 style="font-size:11px; margin-top:-6px;color:rgba(0, 0, 0, 0.833)">Old Regime</h1>
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
                            @foreach ($under_section_10["2) Allowance to the extent exampt under section 10"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{" -- "}}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11"></p>

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
                            <p style="font-size:11px; " class="p-2 m-11">{{ $under_section_10["2) Allowance to the extent exampt under section 10"][0]["total"]}}</p>

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
                            <p style="font-size:11px; marign-top:-11px">{{ $Total_after_excemption["3) Total after excemption (1 - 2)"][0]["total"]}}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>4) Taxable Income under Previous employment</b></p>
                            @foreach ( $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["particular"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{  $Under_Previous_employment["4) Taxable Income Under Previous employment"][0]["total"]}}</p>
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
                            <p style="font-size:11px; marign-top:-11px">{{  $Gross_Total["5) Gross Total (3 - 4)"][0]["total"]}}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>6) Under Section 16</b></p>
                            @foreach ( $Under_section_16["6) Under section 16"][0]["particulars"] as $key => $value)
                            <p style="font-size:11px; " class="p-2 m-11">{{ $value }}</p>
                            @endforeach
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{  $Under_section_16["6) Under section 16"][0]["actual"]}}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{  $Under_section_16["6) Under section 16"][0]["projection"]}}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px">{{  $Under_section_16["6) Under section 16"][0]["total"]}}</p>
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
                            <p style="font-size:11px; marign-top:-11px">{{  $Under_the_Head_Salaries["7) Income Chargeable Under the Head Salaries (5 - 6)"][0]["total"]}}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>8) Any other income reported by the employee</b></p>
                           @foreach ($reported_by_the_employee["8) Any other income reported by the employee"][0]["particular"][0] as $key => $value)
                           <p style="font-size:11px; marign-top:-11px">{{ $value }}</p>
                           @endforeach
                           <p style="font-size:11px; marign-top:-11px"><b>Total Income From Other Sources</b></p>
                           <p style="font-size:11px; marign-top:-11px">Note: A maximum of 12,00,000.000 is allowed as exemption for housing loan interest on Self Occupied House Property and Let Out Property</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"> {{ $reported_by_the_employee["8) Any other income reported by the employee"][0]["actual"]}}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"> {{ $reported_by_the_employee["8) Any other income reported by the employee"][0]["projection"]}}</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"> {{ $reported_by_the_employee["8) Any other income reported by the employee"][0]["total"]}}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>9) Gross Total Income (7 -8)</b></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"> {{ $Gross_Total_income["9) Gross Total income"][0]["total"]}}</p>
                        </td>
                    </tr>
                    <tr style="border-top:0px !important;">
                        <td colspan="2">
                            <p style="font-size:11px; marign-top:-11px"><b>10) Deduction under Chapter VI-A</b></p>
                            <p style="font-size:11px; marign-top:-11px"><b>80C</b></p>
                           <?php
                        //    $i=0;
                        //     foreach($Decuction_Under_chapter_6a["10) Decuction Under chapter VI - A"][0]["particular"][0] as $key => $value){
                        //         echo  $key;
                        //     $i++;
                            // }
                           ?>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"></p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; marign-top:-11px"> {{ $Gross_Total_income["9) Gross Total income"][0]["total"] }}</p>
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
                            <p style="font-size:11px; text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align:right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align:right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align:right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align:right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align:right; " class="p-2 m-11">Basic</p>

                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; text-align: right;  " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>

                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right;" class="p-2 m-11">Basic</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                        </td>
                    </tr>

                    <tr style="border-top:0px !important;">
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Basic</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Actual</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Actual</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px;text-align: right; " class="p-2 m-11">Actual</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; text-align: right;" class="p-2 m-11">Total</p>
                        </td>
                    </tr>

                    <tr style="border-top:0px !important;">
                        <td colspan="4">
                            <p style="font-size:11px;" class="p-2 m-11">
                            Total House Rent Allowance Exemption Amount
                            </p>
                            <p  style="font-size:11px; margin-top:-10px;">Least amount of the three columns will be considered for tax exemption under HRA</p>
                        </td>
                        <td colspan="1">
                            <p style="font-size:11px; " class="p-2 m-11">$12920</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
