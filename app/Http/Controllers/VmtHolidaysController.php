<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\vmtHolidays;


class VmtHolidaysController extends Controller
{

    //Holidays

    public function showHolidaysMasterPage(Request $request){

        $master_holidays = vmtHolidays::all();

        return view('holidays.test_ui.edit_holiday',compact('master_holidays'));
    }

    public function createHoliday(Request $request){
//create object for table vmt_holidays

        $vmt_holidays_data= new vmtHolidays;
        $vmt_holidays_data->holiday_name=$request['holiday_name'];
        $vmt_holidays_data->holiday_date=$request['holiday_date'];
        $vmt_holidays_data->aholiday_description=$request['holiday_description'];
// insert the image

        $uploadedFile = $request->file('file');

        if($uploadedFile) {


            $fileName = 'Hello_'.$uploadedFile->hashName();
            $filePath = $uploadedFile->storeAs('new_uploads',$fileName, 'public');
            $vmt_holidays_data->image=$request['image'];
            $vmt_holidays_data->save();
          //  dd($vmt_holidays_data);
            $result ="saved";
            return view('holidays.test_ui.edit_holiday',compact('vmt_holidays_data'));
    }
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
