<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($status)
    <h1> {{ $status }} <h1>
    @endif
    @if ($err_msg != 'null')
    <h1> {{ $err_msg }} <h1>
    @endif
    @if ($err_str != 'null')
    <h1> {{ $err_str }} <h1>
    @endif

</body>
</html>
