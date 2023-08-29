<template>
    <div>
        
    <table style="background-color: white; width:100%;">
        <tr>
            <td colspan="3">
                <h1 style="color:black; font-size:16px"></h1>
                <p style="color:black; font-size:10px; margin-top:-8px;"></p>
            </td>
            <td colspan="1" style=" ">
                <img src="data:image/png;base64,{{ $client_image }}" alt="Image Not Found" style=" color:black;  float: right; margin-top:10px height:40px width:25px">
            </td>
        </tr>
        <tr>
            <td style="border-top:#f9be00 1px solid; width:100% " colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4" style="padding: 0 0 10px 0;">
                <h1 style="color:black; font-size:14px;">Payslip for the month of </h1>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <h1
                    style="color:#f9be00; font-size:14px; letter-spacing: 0.4px; margin-top:-18px; padding-bottom:12px; width:200px; ">
                    EMPLOYEE PAY SUMMARY</h1>
                <p style="color:gray; font-size:12px; margin-top:-14px;">Employee Name : </p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">Designation : </p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">Date Joining : </p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">Pay Period : </p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">Pay Date : </p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">Bank Account No: </p>
            </td>
            <td colspan="2">
                <p style="color:gray; font-size:12px; margin-top:-14px;">&nbsp;</p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">-</p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">-</p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">-</p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">-</p>
                <p style="color:gray; font-size:12px; margin-top:-14px;">-</p>


            </td>
            <td colspan="1">
                <p style=" font-size:14px; margin-top:-14px; text-align:center;">Employee Net Pay </p>
                <h1 style=" font-size:32px; margin-top:-12px;color:#000;text-align:center; ">-</h1>
                <p style=" font-size:12px; margin-top:-18px; text-align:center; color:gray; ">Paid Days : | LOP Day :
                    | ARREAR DAYS : 0</p>
                <p style=" font-size:12px; margin-top:-12px; text-align:center; color:#fff"></p>
            </td>
        </tr>
        <tr>
            <td style="border-top:#f9be00 1px solid; width:100% ; padding-bottom:10px;" colspan="4"></td>
        </tr>

        <tr>
            <td colspan="4">
                <table style="width:100%;">
                    <tr style="padding:14px 0;">
                        <td colspan="2">
                            <h1 style="color:#f9be00; font-size:12px;  margin:-6px 0 2px 0 ;">EARNINGS
                            </h1>
                        </td>
                        <td colspan="1">
                            <h1 style="color:#f9be00; font-size:12px ; margin:-6px 0 2px 0;text-align:right;">AMOUNT
                            </h1>
                        </td>
                        <td colspan="1">
                            @if (!empty($arrears[0]))
                            <h1 style="color:#f9be00; font-size:12px ; margin:-6px 0 2px 0;text-align:right;">ARREARS
                            </h1>
                            @endif
                        </td>
                        <td colspan="1">
                            <h1 style="color:#f9be00; font-size:12px ;  margin:-6px 0 2px 0;text-align:right;">YEAR TO
                                DATE</h1>
                        </td>
                    </tr>
                    <tr style=" ">
                        <td colspan="2" style="margin-bottom: auto !important;">
                            <p style=" font-size:12px; text-algin:left;margin-top:-7px; ">-</p>
                        </td>
                        <td colspan="1" style="margin-bottom: auto !important;">
                    
                            <p style=" font-size:12px; text-algin:left;margin-top:-7px; text-align:right; ">-</p>
                       
                            <p style=" font-size:12px ;margin-top:-7px;">&nbsp;</p>
                        </td>
                        <td colspan="1" style="margin-bottom: auto !important;">
                            <p style=" font-size:12px;margin-top:-7px; text-align:right;">-</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">&nbsp;</p>
                        </td>
                        <td colspan="1">
                            <p style=" font-size:12px;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px;margin-top:-7px;text-align:right; ">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:#f9be00 1px solid; width:100%;margin-top:0px ; " colspan="5"></td>
                    </tr>

                    <tr style="padding-bottom:12px;">
                        <td colspan="2">
                            <h1 style="color:#f9be00; font-size:12px; text-align:left; margin:-4px 0 0px 0 ">DEDUTIONS
                            </h1>
                        </td>
                        <td colspan="1">
                            <h1 style="color:#f9be00; font-size:12px ;text-align:left; margin:-4px 0 0px 0;text-align:right;">
                            AMOUNT</h1>
                        </td>
                        <td colspan="1">
                            <h1
                                style="color:#f9be00; font-size:12px ;text-align:left; margin:-4px 0 0px 0;text-align:right;">
                                ARREARS</h1>
                        </td>
                        <td colspan="1">
                            <h1
                                style="color:#f9be00; font-size:12px ; text-align:left; margin:-4px 0 0 0;text-align:right;">
                                YEAR TO DATE</h1>
                        </td>
                    </tr>
                    <tr style=" ">
                        <td colspan="2" style="margin-bottom: auto !important;">
                      
                            <p style=" font-size:12px; text-algin:left;margin-top:-7px;">-</p>
                     
                        </td>
                        <td colspan="1" style="margin-bottom: auto !important;">
                          
                            <p style=" font-size:12px; text-algin:left;margin-top:-7px; text-align:right;"></p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">&nbsp;</p>
                        </td>
                        <td colspan="1" style="margin-bottom: auto !important;">
                            <p style=" font-size:12px;margin-top:-7px;  text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">&nbsp;</p>
                        </td>
                        <td colspan="1">
                            <p style=" font-size:12px;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">sajd</p>
                            <p style=" font-size:12px ;margin-top:-7px; text-align:right;">&nbsp;</p>
                        </td>
                    </tr>
                    <tr style=" width:100%; ">
                        <td colspan="5" style=" width:100%; height:40px !important;padding:0; ">
                            <p
                                style="border-radius:4px; background-color: #fff7db; font-size:12px; width:100%; padding:8px;">
                                NET PAY (Gross Earnings - Total Deduction) <span style="margin-left: 18%; font-size:12px;">
                                    -</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p style="font-size: 10px; margin-top:-12px;">Total Net Payable (  )</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <h1 style="color:#f9be00; margin-bottom:-8px; margin-top:-6px; font-size:14px;">LEAVE DETAILS</h1>
            </td>
        </tr>
        <tr class="td" style="height: 20px;">
            <td colspan="4">
                <table style="width: 100%;" >
                    <tr>
                        <td class="" style="height: 20px; width:25%;" >
                            <p style="font-size:10px;color:gray; ">Leave Type</p>
                           
                            <p style="font-size:11px; margin-top:-8px">-</p>
                     
                        </td>
                        <td colspan="1" style=" width:25%;">
                            <p style="font-size:10px;color:gray; ">Opening Balance</p>
                      
                            <p style="font-size:11px; margin-top:-8px"></p>
                        
                        </td>
                        <td colspan="1" style=" width:25%;">
                            <p style="font-size:10px;color:gray;">Avalied</p>
                        
                            <p style="font-size:11px; margin-top:-8px"></p>
                      
                        </td>
                        <td colspan="1" style=" width:25%;">
                            <p style="font-size:10px;color:gray;">Closing Balance</p>
                      
                            <p style="font-size:11px; margin-top:-8px"></p>
                       
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="border-top:#f9be00 1px solid; width:100%;margin-top:0px ; " colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4">
                <p style="font-size: 10px; text-align:center;">- This is a system generated payslip, hence the signature is not required.-</p>
            </td>
        </tr>

        <tr>
            <td colspan="4">
               <img src="data:image/png;base64,{{ $abs_logo }}" alt="image Not Found" style="margin-top:5px; margin-left:5px; float: right; height:40px width:25px " >
               <p style="float:right; color:gray; font-size:10px;">Powered By</p>
            </td>
        </tr>
    </table>



    </div>
</template>

<script setup>
import {ref , reactive } from 'vue';
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins&display=swap');

* {
    font-family: 'Lobster', cursive;
    font-family: 'Poppins', sans-serif !important;
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

.td {
    height: 10px !important;
}

.marign-top1 {}

p {
    color: #000;
}
</style>