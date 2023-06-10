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
use Illuminate\Support\Facades\Validator;


class VmtHolidaysController extends Controller
{
//Holidays
//show holidays
    public function showHolidaysMasterPage(Request $request){
        $master_holidays = vmtHolidays::all();
        // return ('holidays.test_ui.view_all_holidays',compact('master_holidays'));
        return $master_holidays;
    }

//create holidays
    public function createHoliday(Request $request){
        $validator = Validator::make(
            $request->all(),
            $rules = [
                "holiday_name" => 'required',
                "holiday_date" => 'required',
                "holiday_description"  => 'required',
                "holiday_image"  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
           ],500);
        }
    try{


    //create object
    $vmt_holidays =vmtHolidays::where('holiday_name',$request->holiday_name)->first();
    if(!empty($vmt_holidays)){
        return response()->json([
            'status' => 'failure',
            'message' => "The holiday is already created"
       ],500);
    }

 $uploadedFile = $request->file('holiday_image');
        if(empty($uploadedFile)) {
            $response ='Please upload the file';
            return $response;
        }else{
            $fileName =  $uploadedFile->getClientOriginalName();
            $path = '/images/holiday';
            $filePath = $uploadedFile->storeAs($path,$fileName, 'private');
        }

         $vmt_holidays_data= new vmtHolidays;
         $vmt_holidays_data->holiday_name=$request['holiday_name'];
         $vmt_holidays_data->holiday_date=$request['holiday_date'];
         $vmt_holidays_data->holiday_description=$request['holiday_description'];
         $vmt_holidays_data->image= $fileName;
         $vmt_holidays_data->save();

         $response = [
            'status' => 'success',
            'message' => "Holiday created successfully",
        ];
    } catch (\Exception $e) {
          $response = [
            'status' => 'failure',
            'message' => 'Error while creating  Holiday ',
            'error_message' => $e->getMessage()
        ];
    }
       return response()->json($response);


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
         return response()->json($holidays_data);
    }


//Holidays list
//show holidayslist
    public function showHolidaysList(Request $request){
         $holidays_list=vmtHolidayslist::all();
         return response()->json($holidays_list);
    }
    public function holidaysListDetails(Request $request){
        $holidays_list_name =array();
        $holidays_list=vmtHolidayslist::all();
        $i =0;
        foreach ($holidays_list as $key => $singlelist) {
            $holidayslist_data=vmtHolidayslistHolidays::where('holiday_list_id', $singlelist['id'])->pluck('holiday_id');
            $holidays_list_name[$i]['id'] =$singlelist['id'];
            $holidays_list_name[$i]['name'] =$singlelist['name'];
            $holidays_list_name[$i]['no_of_holidays']=Count($holidayslist_data);
            $i++;
        }
         return response()->json($holidays_list_name);

    }

//createholidays list
    public function createHolidayList(Request $request){

        $validator = Validator::make(
            $request->all(),
            $rules = [
                "name" => 'required',
                "holiday_list_id"  => 'required',

            ],
            $messages = [
                "required" => "Field :attribute is missing",
                "exists" => "Field :attribute is invalid"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
           ],500);
        }
try{

    //store the holiday list name
        $vmt_holidays_list_data= new vmtHolidayslist;
        $holiday_name= $vmt_holidays_list_data->name=$request['name'];
        $vmt_holidays_list_data->save();
        $holiday_id = vmtHolidayslist::where('name', $holiday_name)->first()->id;


    // store the holiday list id
        $holiday_list_id=$request['holiday_list_id'];
        // dd($holiday_list_id);
        foreach( $holiday_list_id as $single_id){
            $vmt_holidayslist_holidays= new vmtHolidayslistHolidays;
            $vmt_holidayslist_holidays->holiday_id= $single_id['id'];
            $vmt_holidayslist_holidays->holiday_list_id=$holiday_id;
            $vmt_holidayslist_holidays->save();
        }

        $response = [
            'status' => 'success',
            'message' => 'Holidaylist created successfully',
            'data' => ''
         ];

        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while creating  Holidaylist ',
                'error_message' => $e->getMessage()
            ];
}
   return response()->json($response);


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
        return response()->json($holidays_list);
    }

// create location
    public function createHolidayLocation(Request $request){

        //  dd($request->all());
        try{
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
         $response = [
            'status' => 'success',
            'message' => 'Holidaylist created successfully',
            'data' => ''
         ];

        } catch (\Exception $e) {
            $response = [
                'status' => 'failure',
                'message' => 'Error while creating  Holidaylist ',
                'error_message' => $e->getMessage()
            ];
}
   return response()->json($response);

     }

    //Assign holiday list to a location. Handles both assign/unassign logic
    public function assignUnAssign_HolidayList(Request $request){

    }


}
