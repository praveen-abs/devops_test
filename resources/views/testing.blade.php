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
        //$encr_userCode = Crypt::encryptString();
        $encr_userCode =  Crypt::encryptString("ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAddddddddddddddddddddddddddddddddddddddddddddddddddddddddA");
       // echo  request()->getSchemeAndHttpHost()."/".$encr_userCode;
       echo "<br/> Content <p>".$encr_userCode."</p>";

        echo "<br/> Length ".strlen($encr_userCode);

        $compressed_string = gzcompress("Praveen",9);
        echo "<br/> Compressed String : ".$compressed_string ." Length : ".strlen($compressed_string);

        $uncompressed_string = gzuncompress($compressed_string,9);

        echo "<br/> Uncompressed String : ".$uncompressed_string ." Length : ".strlen($uncompressed_string);



        $test_payload = "eyJpdiIss6IkRpODhqUXZmNGRYcE1NT0VTenU0M1E9PSIsInZhbHVlIjoielluRUtmYVozN0N3eEZtUmJBTkVrdz09IiwibWFjIjoiNzUxNDQ2M2UzOTU2ZTlkMjBhYTI0MjIzM2NmMTJlMGQyNjJiMDE2ODU3YzIyYWMxMWNhNmNjNWQwMjBkYjM1NiIsInRhZyI6IiJ9";

        try{
            echo "<br /><br/>Decrypted payload : ".Crypt::decrypt($test_payload);
        }
        catch(\Exception $e)
        {
            echo "Decrypt Error : ".$e->getMessage();
        }
    ?>

   {{-- @vite('resources/js/hrms/modules/Organization/manage_employee/manage_employee.js')
   <div id="ManageEmployee"></div> --}}
</body>
</html>
@endsection

