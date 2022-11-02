<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <!-- When employee publish KPI PMS V2 Form through Employee Appraisal
        Then mail sent to Manager
    -->
    @if($status == 'publish')
        <p>Dear {{ $receiverName }},</p>
        <p>
            Your Employee ( {{ $senderName }} ) has created Personal Assessment goal. Please review at to approve it.
        </p>

    <!-- When Reviewer Accepts KPI PMS V2 Form Which creates from Employee Appraisal -->
    @elseif($status == 'accepted')

        <p>Dear {{ $receiverName }},</p>
        <p> &nbsp;&nbsp;&nbsp;
            KRA/ KPI has been Approved by <b>“Mr {{ $senderName }}”.</b> </p>
        <p>
            If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.</p>
        <p>
            Regards <br>
            Team HR.

    <!-- When Reviewer Rejects KPI PMS V2 Form Which creates from Employee Appraisal -->
    @elseif($status == 'rejected')
        <p>
            Dear {{ $receiverName }}, </p>
        <p>&nbsp;&nbsp;&nbsp;KRA/ KPI has been rejected by <b>“Mr. {{ $senderName }}” </b>and reason stated below for your further references.
        <p><u>  {{ $rejectedReason }} </u></p>
        Request you to kindly have a great conversation with “{{ $senderName }}” and Complete the KRA/KPA within the time frame.
        <p>If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.</p>
        Regards <br>
        Team HR.
    <!-- Not Found -->
    @else
        <p> Not Found! </p>
    @endif


</body>

</html>
