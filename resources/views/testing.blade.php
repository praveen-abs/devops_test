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
@vite('resources/js/hrms/modules/approvals/onboarding/review_document.js')

<div id="ReviewDocuments"></div>
</body>
</html>
@endsection

