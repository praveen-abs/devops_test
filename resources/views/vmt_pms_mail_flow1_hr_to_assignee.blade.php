<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
    {{--Flow -1 :Publish Form :: Here HR sends mail to employee --}}
    @if($approvalStatus == "none")
        <p>	Dear @php echo $user_emp_name; @endphp ,</p>
        <p>&nbsp;&nbsp;&nbsp;This mail is to inform you regarding your respective KRA's/goals in conformation with your reporting manager for this year <b>@php echo $appraisal_period; @endphp </b> and the same has been uploaded your HRMS login.
            As you all must be aware that this is a mandate process that we all have to adhere ensuring both you and your reporting manager are clear about your job objectives and expected results from you.
            Kindly go through your KRA/KPI and accept the same by login through your HRMS portal.
            May all of you achieve your goals this year.
        </p>
        <p>If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.<br></p>
        <p>
            Regards	<br>
            Team HR.
        </p>
    @elseif ($approvalStatus == "approved")
        {{-- <p>Personal Assessment goal has been approved by your Manager</p> --}}
        <p>Dear @php echo $user_emp_name; @endphp ,	</p>
            <p>
            Greetings from the HR Team!!!</p>
            <p>
            &nbsp;&nbsp;&nbsp;This is the inform you that your manager  @php echo $user_manager_name; @endphp has approved the submitted KRA/KPI in the HRMS Portal.
            Please find few tips which needs to be taken care throughout this year.
            Take note of your achievement throughout the year.
            Be Specific and use numbers to your advantage
            Provide evidence to back up and statements of the results.
            Reference your job description to account for the company objectives.
            If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.
            </p>
            <p>
                Regards	<br>
                Team HR.
            </p>

    @elseif ($approvalStatus == "rejected")
        {{-- <p>Personal Assessment goal has been rejected by your Manager</p> --}}

            <p>
                Dear @php echo $user_emp_name; @endphp,	</p>
            <p>&nbsp;&nbsp;&nbsp;KRA/ KPI has been rejected by <b>“Mr. @php echo $user_manager_name;@endphp” </b>and reason stated below for your further references.</p>
                <p>  @php echo $command_emp; @endphp </p>

            <p>Request you to kindly have a great conversation with “@php echo $user_emp_name; @endphp” and Complete the KRA/KPA within the time frame.</p>
            <p>If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.</p>
            <p>
            Regards	<br>
            Team HR.
            </p>
    @endif
</body>
</html>
