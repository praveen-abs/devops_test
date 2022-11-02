<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
    {{-- Here Employee sends mail to manager --}}
		@if($approvalStatus == "none")
			{{-- <p>Your Employee has created Personal Assessment goal. Please review at <a href="{{$linkUri}}" target="_blank">Link</a> to approve it.</p> --}}
            <p>Dear @php echo $user_manager_name; @endphp,

    		    <p>Your Employee has created Personal Assessment goal. Please review in your HRMS portal to approve it.</p>
            <p>
                Regards	<br>
                Team HR.
            </p>
		@elseif ($approvalStatus == "approved")
			{{-- <p>Personal Assessment goal has been accepted by your employee</p> --}}
			<p>Dear @php echo $user_manager_name; @endphp,
				KRA/ KPI has been accepted by “@php echo $user_emp_name; @endphp”.
				If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.
			</p>
			<p>
				Regards	<br>
				Team HR.
            </p>
		@elseif ($approvalStatus == "rejected")
			<p>Dear @php echo $user_manager_name; @endphp,</p>

                <p>KRA/ KPI has been rejected by “@php echo $user_emp_name; @endphp” and reason stated below for your further references.	</p>
				<p>  @php echo $command_emp; @endphp </p>
				<p>
				Request you to kindly have a great conversation with “@php echo $user_emp_name; @endphp” and Complete the KRA/KPA within the time frame.
				If you have any questions or concerns, don’t hesitate to reach out your reporting manager or the HR team.</p>
            <p>
                Regards	<br>
                Team HR.
            </p>
		@endif
</body>
</html>
