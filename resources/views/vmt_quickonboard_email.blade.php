<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Greetings, </h2>
	<h2>We have processed your details.</h2>
	<h5>Please Complete the onboarding on following URL</h5>
	<p>
		{{url('/vmt-employee/complete-onboarding?email='.$employeeEmail)}}
	</p>
</body>
</html>