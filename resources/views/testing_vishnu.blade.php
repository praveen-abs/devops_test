<?php

    use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@endsection
@section('content')
<!doctype html>
<html lang="en">
<head>


</head>
<body>
<?php

$doc_filename='AadharCardFront_B090_17-04-2023_12-22-55.jpg';
$private_file = "B090/onboarding_documents/DrivingLicense_B090_17-04-2023_12-22-55.jpg";
    //dd(file(storage_path('employees/'.$private_file)));
    $response= response()->file(storage_path('employees/'.$private_file));
   return  base64_encode( $response);
?>

</body>
</html>
@endsection
