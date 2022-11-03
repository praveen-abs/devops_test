<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


	<p>
		Dear {{$hr_name}},</p>
		<p>
            This is to inform you that KRA/KPI of <b>{{ $assignee_name }}</b> for the apprisal year <b>{{ $appraisal_year}}</b> and period <b>{{ strtoupper($appraisal_period)}}</b> has been completed and
            reviewed by their manager <b>{{ $manager_name }}</b>.
            Kindly check the same in the HRMS Portal.


        <p>
        Regards<br/>
        Team HR
	</p>

</body>
</html>
