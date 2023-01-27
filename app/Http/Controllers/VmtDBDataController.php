<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\State;

use Illuminate\Http\Request;
/*
    This controller fetches some basic details
    from DB such as Country, states..

*/
class VmtDBDataController extends Controller
{
    public function getCountryDetails(){
        return Countries::all();
    }

    public function getStatesDetails(){
        return State::all();
    }
}
