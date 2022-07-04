<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h5>Hi, </h5>
	@if(auth()->user()->hasrole('Employee'))
		<p>Your Employee has created Personal Assessment goal. Please review at <a href="{{$linkUri}}" target="_blank">Link</a> to approve it.</p>
	@else
		<p>Personal Assessment goal has been assigned to you, click <a href="{{$linkUri}}" target="_blank">here</a> to accept.</p>
	@endif
</body>
</html>