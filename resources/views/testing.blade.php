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
 <h6>IMAGE VIEW</h6>
 <b>{{ $image_data }}</b>
 <img src="data:image/png;base64,{{$base64 }}" />
 <img src="{{$pathToFile}}"  />
</body>
</html>
@endsection

