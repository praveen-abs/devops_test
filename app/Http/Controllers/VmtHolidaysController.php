<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\vmtHolidays;


class VmtHolidaysController extends Controller
{

    //Holidays

    public function showHolidaysMasterPage(Request $request){

        $master_holidays = vmtHolidays::all();

        return view('holidays.holidays_master_page',compact('master_holidays'));
    }

    public function createHoliday(Request $request){

    }

    //test
    public function editHoliday(Request $request){
        
    }

    public function updateHoliday(Request $request){

    }

    public function deleteHoliday(Request $request){

    }

    public function fetchHolidays(Request $request){

        return vmtHolidays::all();

    }

    //Holidays list

    public function showHolidaysListPage(Request $request){

    }

    public function createHolidayList(Request $request){

    }

    public function updateHolidayList(Request $request){

    }

    public function deleteHolidayList(Request $request){

    }


    //Assign holiday list to a location. Handles both assign/unassign logic
    public function assignUnAssign_HolidayList(Request $request){

    }


}
