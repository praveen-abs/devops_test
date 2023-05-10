@extends('layouts.master')
@section('title')
    @lang('translation.projects')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
@endsection



@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>investment form mgmt</title>
</head>
<body>
    <form action="{{url('/sendhratestingsss')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Form Name</label>
        <input class="form-control " type="text" id="formFile" name="form_name">

        <label for="formFile" class="form-label">Investment Form Management</label>
        <input class="form-control " type="file" id="formFile" name="file">
      </div>
      <button type="submit" class="btn btn-success"> Submit</button>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
