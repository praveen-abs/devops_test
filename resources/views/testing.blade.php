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
    <h6>PRIVATE IMAGE VIEW</h6>
    <img src="{{route('viewPrivateFile')}}"  />
</body>
</html>
@endsection

