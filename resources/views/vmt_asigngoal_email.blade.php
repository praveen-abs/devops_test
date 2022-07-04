<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h5>Hi, </h5>
	@if(auth()->user()->hasrole('Employee')){{-- Here Employee sends mail to manager --}}
		@if($approvalStatus == "none")
			<p>Your Employee has created Personal Assessment goal. Please review at <a href="{{$linkUri}}" target="_blank">Link</a> to approve it.</p>
		@elseif ($approvalStatus == "approved")
			<p>Personal Assessment goal has been accepted by your employee</p>
		@elseif ($approvalStatus == "rejected")
			<p>Personal Assessment goal has been rejected by your employee</p>
		@endif
	@else{{-- Here Manager sends mail to Employee --}}
		@if($approvalStatus == "none")
			<p>Personal Assessment goal has been assigned to you, click <a href="{{$linkUri}}" target="_blank">here</a> to accept.</p>
		@elseif ($approvalStatus == "approved")
			<p>Personal Assessment goal has been approved by your Manager</p>
		@elseif ($approvalStatus == "rejected")
			<p>Personal Assessment goal has been rejected by your Manager</p>
		@endif	
			
	@endif
</body>
</html>