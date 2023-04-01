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
    <h6>PRIVATE IMAGE VIEW</h6>
    <img src="{{route('viewPrivateFile')}}"  />

    <?php

        $file_status = Storage::disk('private')->exists('/B090/onboarding_documents/test.sql');

        if($file_status)
        {
            $file_delete_status = Storage::disk('private')->delete('/B090/onboarding_documents/test.sql');
            echo "File Deleted";
        }
        else
        {
            dd("File doesnt exist");
        }

    ?>
</body>
</html>
@endsection

