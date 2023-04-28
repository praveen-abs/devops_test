<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\vmtHolidays;


class VmtHolidayService {


    public function getAllHolidays(){

        //Todo : Need to fetch holidays based on client_code

        //Todo : Need to send the holiday images
        return vmtHolidays::all(['holiday_name','holiday_date','holiday_description']);

    }
}
