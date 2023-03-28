<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\vmtHolidays;
use App\Models\vmtHolidayslist;
use App\Models\vmtHolidayslistHolidays;
use App\Models\vmtLocations;
use App\Models\vmtLocationsHoliday;


class VmtHolidaysController extends Controller
{
//Holidays
//show holidays
    public function showHolidaysMasterPage(Request $request){
        $master_holidays = vmtHolidays::all();
        return view('holidays.test_ui.view_all_holidays',compact('master_holidays'));
    }

//create holidays
    public function createHoliday(Request $request){
    //for image upload
        $uploadedFile = $request->file('image');
        if($uploadedFile) {
            $fileName =  $request->image->getClientOriginalName();
            $filePath = $uploadedFile->storeAs('images',$fileName, 'public');
    //create object
         $vmt_holidays_data= new vmtHolidays;
         $vmt_holidays_data->holiday_name=$request['holiday_name'];
         $vmt_holidays_data->holiday_date=$request['holiday_date'];
         $vmt_holidays_data->holiday_description=$request['holiday_description'];
         $vmt_holidays_data->image= $fileName;
         $vmt_holidays_data->save();
         $result ="saved";
        return redirect()->action([VmtHolidaysController::class, 'showHolidaysMasterPage']);
        }
    }


//edit holidays
    public function editHoliday($id){
         $vmt_holiday_edit=vmtHolidays::find($id);
         return view('holidays.test_ui.edit_holidays',['vmt_holiday_edit'=>$vmt_holiday_edit]);

    }

//update holidays
    public function updateHoliday(Request $request,$id ){
        $uploadedFile = $request->file('image');
        if($uploadedFile) {
            $fileName =  $request->image->getClientOriginalName();
            $filePath = $uploadedFile->storeAs('images',$fileName, 'public');
         $vmt_holiday_edit=vmtHolidays::find($request->id);
         $vmt_holiday_edit->holiday_name=$request['holiday_name'];
         $vmt_holiday_edit->holiday_date=$request['holiday_date'];
         $vmt_holiday_edit->holiday_description=$request['holiday_description'];
         $vmt_holiday_edit->image=$fileName;
         $vmt_holiday_edit->save();
        return redirect()->action([VmtHolidaysController::class, 'showHolidaysMasterPage']);
        }
}

//delete holidays
    public function deleteHoliday(Request $request,$id){
         $vmt_holiday_delete=vmtHolidays::find($request->id);
         $vmt_holiday_delete->delete();
         return redirect()-> back();
    }

//fetch the holidays
    public function fetchHolidays(Request $request){
         $holidays_data= vmtHolidays::all();
         return view('holidays.test_ui2.add_holidayslist',compact('holidays_data'));
    }


//Holidays list
//show holidayslist
    public function showHolidaysListPage(Request $request){
         $holidays_list=vmtHolidayslist::all();
         return view('holidays.test_ui2.view_all_holidays',compact('holidays_list'));

    }

//createholidays list
    public function createHolidayList(Request $request){
    //store the holiday list name
        $vmt_holidays_list_data= new vmtHolidayslist;
        $holiday_name= $vmt_holidays_list_data->name=$request['name'];
        $vmt_holidays_list_data->save();
        $holiday_id = DB::table('vmt_Holidayslist')->where('name',  $holiday_name)->value('id');

    // store the holiday list id
        $holiday_list_id=$request['holiday_list_id'];
        foreach( $holiday_list_id as $single_id){
            $vmt_holidayslist_holidays= new vmtHolidayslistHolidays;
            $vmt_holidayslist_holidays->holiday_id= $single_id;
            $vmt_holidayslist_holidays->holiday_list_id=$holiday_id;
            $vmt_holidayslist_holidays->save();
        }
        return redirect()->action([VmtHolidaysController::class, 'showHolidaysListPage']);
    }

//edit holidayslist
    public function editHolidayList($id){
         $vmt_holiday_edit=vmtHolidayslist::find($id);
         $holidays_list=vmtHolidays::all();
         return view('holidays.test_ui2.edit_holidays_2',['vmt_holiday_edit'=>$vmt_holiday_edit,'holidays_list'=>$holidays_list]);
    }

//updateholidayslist
    public function updateHolidayList(Request $request,$id){
    //store the holiday list name
        $vmt_holidays_list_data=vmtHolidayslist::find($request->id);
        $holiday_name= $vmt_holidays_list_data->name=$request['name'];
        $vmt_holidays_list_data->save();
    // store the holidayist id and holidays id in vmtHolidayslistHolidays table
        $holidayslist_holidays= DB::table('vmt_holidayslist_holidays')->where('holiday_list_id',$id )->delete();
        $holiday_id=$request['holiday_id'];
        foreach( $holiday_id as $single_id){
            $vmt_holidayslist_holidays= new vmtHolidayslistHolidays;
            $vmt_holidayslist_holidays->holiday_id= $single_id;
            $vmt_holidayslist_holidays->holiday_list_id=$id;
            $vmt_holidayslist_holidays->save();
        }
        return redirect()->action([VmtHolidaysController::class, 'showHolidaysListPage']);
    }

 //delete holidayslist
    public function deleteHolidayList(Request $request,$id){
        $vmt_holiday_delete=vmtHolidayslist::find($request->id);
        $vmt_holidayslist_holidays= DB::table('vmt_holidayslist_holidays')->where('holiday_list_id',$id );
        $vmt_holiday_delete->delete();
        $vmt_holidayslist_holidays->delete();
        return redirect()-> back();

    }

//fetch the location
    public function fetchlocation(Request $request){
        $holidays_list= vmtHolidayslist::all();
        return view('holidays.test_ui3.add_holidayslist_3',compact('holidays_list'));
    }

// create location
    public function createHolidayLocation(Request $request){
//store the holiday list name
         $vmt_holidays_location= new vmtLocations;
         $location_name= $vmt_holidays_location->name=$request['name'];
         $vmt_holidays_location->save();
         $locations_id = DB::table('vmt_locations')->where('name',  $location_name)->value('id');

//store the holiday list id
         $vmt_holidayslist_holidays= new vmtLocationsHoliday;
         $vmt_holidayslist_holidays->vmt_locations_id= $locations_id ;
         $vmt_holidayslist_holidays->vmt_holidays_list_id=$request['vmt_holidays_list_id'];
         $vmt_holidayslist_holidays->save();
         return redirect()->action([VmtHolidaysController::class, 'showHolidaysListPage']);
     }

    //Assign holiday list to a location. Handles both assign/unassign logic
    public function assignUnAssign_HolidayList(Request $request){

    }


}
