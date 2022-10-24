<?php

namespace App\Http\Controllers;

use App\Mail\DashboardAnnouncementMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\VmtGeneralSettings;
use App\Models\VmtGeneralInfo;
use App\Models\VmtEmployee;
use App\Models\vmt_dashboard_posts;
use App\Models\VmtAnnouncement;
use App\Models\VmtEmployeeAttendance;
use App\Models\vmtHolidays;
use App\Models\Polling;
use App\Models\PollVoting;
use App\Models\Compensatory;
use App\Models\VmtEmployeeHierarchy;
use App\Models\Countries;
use App\Models\State;
use App\Models\Department;
use App\Models\Bank;
use Session as Ses;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\VmtAssignGoals;
use App\Mail\NotifyPMSManager;
use App\Models\VmtEmployeeOfficeDetails;
use App\Mail\PMSReviewCompleted;
use App\Models\VmtPraise;
use App\Http\Controllers\VmtEmployeeController;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VmtMainDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(auth()->user()->active == 0)
        {
            if(auth()->user()->is_onboarded == 0)
            {
                if(auth()->user()->onboard_type == 'quick')
                {
                    //User record already exists. So fetch it and show in normal onboard form

                    $vmtEmpController = new VmtEmployeeController;

                    return $vmtEmpController->showEmployeeOnboardingPage(auth()->user()->id);
                }
                else
                if(auth()->user()->onboard_type == 'bulk')
                {

                    return redirect()->route('vmt-documents-route');
                }
                else
                if(auth()->user()->onboard_type == 'normal')
                {
                    //This wont happen since HR is onboarding and so it should not come. But wrote for safety
                    return view('vmt_profile_under_review');
                }
            }
            else
            if(auth()->user()->is_onboarded == 1)
            {
                //Profile is not activated . Show a message
                return view('vmt_profile_under_review');

            }

        }
        else
        if(auth()->user()->active == -1)
        {
            //For employees who left the company.Show account terminated page.
            return view('vmt_profile_terminated');

        }

        $employeesEventDetails = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                                ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
                                ->select(
                                    'users.name',
                                    'users.avatar',
                                    'vmt_employee_details.emp_no',
                                    'vmt_employee_office_details.designation',
                                    'vmt_employee_details.dob',
                                    'vmt_employee_details.doj'
                                )
                                ->where('users.is_ssa','=','0')
                                ->where('users.active','=','1')
                                ->where('users.is_onboarded','=','1')
                                ->whereNotNull('vmt_employee_details.doj')
                                ->whereNotNull('vmt_employee_details.dob');

    //    dd($employeesEventDetails->get('vmt_employee_details.dob')->toArray());

        //Employee events for the current month only
        $dashboardEmployeeEventsData = [];
        $dashboardEmployeeEventsData['birthday'] = $employeesEventDetails->get();
        $dashboardEmployeeEventsData['work_anniversary'] = $employeesEventDetails->whereMonth('vmt_employee_details.doj',Carbon::now()->month)->get();
        $dashboardEmployeeEventsData['hasData'] = 'true';


        //dd($dashboardEmployeeEventsData['birthday']);
        //If any events found, then set 'hasData' to TRUE else FALSE
        if(count($dashboardEmployeeEventsData['birthday']) == 0 &&
           count($dashboardEmployeeEventsData['work_anniversary']) == 0
        )
            $dashboardEmployeeEventsData['hasData'] = 'false';
        else
            $dashboardEmployeeEventsData['hasData'] = 'true';

        //$dashboardEmployeeEventsData['hasData'] =
        //$dashboardEmployeeEventsData['wedding_anniversary'] = $employeesEventDetails;

        //dd($dashboardEmployeeEventsData);
        $checked = VmtEmployeeAttendance::where('user_id', auth()->user()->id)
                                        ->orderBy('created_at', 'DESC')->first();
        $effective_hours="";

        //If user already checkout, then send time difference to blade
        if(isset($checked->checkout_time))
        {
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $checked->checkout_time);

            $from = Carbon::createFromFormat('Y-m-d H:i:s', $checked->checkin_time);

            $effective_hours = gmdate('H:i:s', $to->diffInSeconds($from));

        // dd($effective_hours);
        }

        $dashboardpost  =  vmt_dashboard_posts::all();
        // $holidays = vmtHolidays::orderBy('holiday_date', 'ASC')->get();
        $todayDate = date('Y-m-d');

        // getting upcoming holiday list
        $upcomingHolidays = vmtHolidays::where('holiday_date', '>=', $todayDate)->orderBy('holiday_date', 'ASC')->get();


        if(count($upcomingHolidays) > 0){
            $upcomingHolidayIds = $upcomingHolidays->pluck('id');
            // getting past holiday list
            $pastHolidays = vmtHolidays::whereNotIn('id', $upcomingHolidayIds)->orderBy('holiday_date', 'ASC')->get();
            // merge upcoming holiday with past holiday
            $holidays = $upcomingHolidays->merge($pastHolidays);
        }else{
            $holidays = vmtHolidays::orderBy('holiday_date', 'ASC')->get();
        }


        $polling = Polling::first();
        if ($polling) {
            $selectedPoll = PollVoting::where('user_id', auth()->user()->id)->where('polling_id', $polling->id)->first();
            if ($selectedPoll) {
                $polling->data = $selectedPoll->selected_option;
            }
        }

        ////Dashboard counters data
        //Total Employees Count
        $totalEmployeesCount = User::where('users.is_ssa','0')->count();

        //New Joinees Count
        $currentDate = Carbon::now();
        $currentDate->setTimezone("Asia/Kolkata");
        $dateDifferenceForNewJoinees = 2; //Right now, showing 1 week old joinees
        $newEmployeesCount = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                                //->whereRaw('DATEDIFF(? , vmt_employee_details.doj) <= ?',[$currentDate, $dateDifferenceForNewJoinees])
                                ->where('users.active', '0')
                                ->where('users.is_ssa','0')
                                ->get()->count();


        //Employees who checked-in today
        $todayEmployeesCheckedInCount = User::join('vmt_employee_attendance','vmt_employee_attendance.user_id','=','users.id')
                                ->whereDate('vmt_employee_attendance.checkin_time','=', $currentDate )
                                ->whereNull('vmt_employee_attendance.checkout_time')
                                ->where('users.is_ssa','0')
                                ->get()->count();

        //Employees Leave today count
        $todayEmployeesOnLeaveCount =  $totalEmployeesCount - $todayEmployeesCheckedInCount;
        //dd($newEmployeesCount);

        //Parse into json
        $dashboardCountersData = [];
            $dashboardCountersData['totalEmployeesCount'] = $totalEmployeesCount;
            $dashboardCountersData['newEmployeesCount'] = $newEmployeesCount;
            $dashboardCountersData['todayEmployeesCheckedInCount'] = $todayEmployeesCheckedInCount;
            $dashboardCountersData['todayEmployeesOnLeaveCount'] = $todayEmployeesOnLeaveCount;

        $json_dashboardCountersData = json_encode($dashboardCountersData);

        // get announcement data
        $announcementData = VmtAnnouncement::orderBy('created_at','DESC')->where('notify_employees','1')->get();

        // get praise data
        $praiseData = VmtPraise::orderBy('created_at','DESC')->get();


        if(Str::contains( currentLoggedInUserRole(), ["Super Admin","Admin","HR"]) )
        {
            return view('vmt_hr_dashboard', compact( 'dashboardEmployeeEventsData', 'checked','effective_hours', 'holidays', 'polling','dashboardpost','json_dashboardCountersData'));
        }
        else
        if(Str::contains( currentLoggedInUserRole(), ["Manager"]) )
        {
            return view('vmt_manager_dashboard', compact( 'dashboardEmployeeEventsData','checked','effective_hours', 'holidays', 'polling','dashboardpost','json_dashboardCountersData'));
        }
        else
        if(Str::contains( currentLoggedInUserRole(), ["Employee"]) )
        {
            return view('vmt_employee_dashboard', compact( 'dashboardEmployeeEventsData','checked','effective_hours', 'holidays', 'polling','dashboardpost','json_dashboardCountersData','announcementData','praiseData'));
        }

    }

    public function  DashBoardPost(Request $request){
        $id = auth()->user()->id;
        $file = $request->file('image_src');
        $data_dashboard = new vmt_dashboard_posts;
        $data_dashboard->message = $request->post_menu;
        $data_dashboard->author_id = $id;
             // dd($file);
          if ($file) {
             $filename = 'post-'.'.'. $file->getClientOriginalName();
        // dd($filename);
            $destination = public_path('/images');
            $file->move($destination, $filename);
            $data_dashboard->post_image = $filename;
        }
        $data_dashboard->save();
           $notification_user = User::where('id',auth::user()->id)->first();

         $message = "Post Added By "  ;

         // code email 4

         $title_data  = null;
         $details_data  = null;
          $hrList =  User::role(['HR','Employee', 'admin', 'Admin'])->get();
            $hrUsers = $hrList->pluck('id');
          $officialMailList =   VmtEmployeeOfficeDetails::whereIn('user_id', $hrUsers)->pluck('officical_mail');
         $user_emp_name = $request->post_menu;
       \Mail::to($officialMailList)->send(new PMSReviewCompleted('post',$user_emp_name,$title_data,$details_data));
         // end email
           Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        $dashboardpost  =  vmt_dashboard_posts::where('author_id', $id)->pluck('message','post_image');
        return $dashboardpost;
    }

    public function DashBoardPostView($id, Request $request){
        $dashboardpost  =  vmt_dashboard_posts::where('author_id', $id)->pluck('message');
        return $dashboardpost;
    }

     public function DashBoardAnnouncement(Request $request){
        $Announcement_data = new VmtAnnouncement;
        $id = auth()->user()->id;
        $details_data = $request->input('details_data');
        $title_data =$request->input('title_data');
        $Announcement_data->title_data = $request->input('title_data');
        $Announcement_data->ann_author_id = $id;
        $Announcement_data->details_data = $request->input('details_data');
        $Announcement_data->date = $request->input('date');
        $Announcement_data->notify_employees = isset($request->notify_employees) ? $request->input('notify_employees') : '0';
        $Announcement_data->require_acknowledgement = isset($request->require_acknowledgement) ? $request->input('require_acknowledgement') : '0';
        $Announcement_data->hide_after = isset($request->hide_after) ? $request->input('hide_after') : '0';
        $Announcement_data->save();
         // dd($Announcement_data);
         $notification_user = User::where('id',auth::user()->id)->first();

         $message = "Announcement Added By "  ;
                  // code email

          $employeesList =  User::all()->pluck('id');

          $officialMailList =   VmtEmployeeOfficeDetails::whereIn('user_id', $employeesList)->where('officical_mail','!=',null)->whereNotNull('officical_mail')->pluck('officical_mail');
          //dd($officialMailList->toArray());
         $user_emp_name =  $message.auth()->user()->name;
         // var_dump($officialMailList);
         if(!empty($officialMailList) && $Announcement_data->notify_employees == '1'){
            \Mail::to($officialMailList)->send(new DashboardAnnouncementMail($user_emp_name,$title_data,$details_data));

         }
         // end email
           Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        $dashboardannoun  =  VmtAnnouncement::where('ann_author_id', $id)->pluck('title_data','ann_author_id','details_data');
        return $dashboardannoun;
    }

    // function used for store dashboard polling questions section
    public function DashBoardPollingQuestions(Request $request){
        try{
            $id = auth()->user()->id;
            $encodedOptions = json_encode($request->options);
            $pollingQuestionAdd = new Polling;
            $pollingQuestionAdd->poll_author_id = $id;
            $pollingQuestionAdd->question = $request->question;
            $pollingQuestionAdd->options = $encodedOptions;
            $pollingQuestionAdd->date = $request->date;
            $pollingQuestionAdd->notify_employees = isset($request->notify_employees) ? $request->notify_employees : '0';
            $pollingQuestionAdd->anonymous_poll = isset($request->anonymous_poll) ? $request->anonymous_poll : '0';
            $pollingQuestionAdd->save();
            if($pollingQuestionAdd){
                return response()->json(['status'=>true,'message'=>'Pooling Question added successfully']);
            }
            return response()->json(['status'=>false,'message'=>'Pooling Question not added']);
        }catch(Exception $e){
            Log::info('dashboard polling question added error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function DashBoardPraise(Request $request){
        try{
            $id = auth()->user()->id;
            $praiseAdd = new VmtPraise();
            $praiseAdd->praise_data = $request->praise_data;
            $praiseAdd->praise_author_id = $id;
            $praiseAdd->save();
            if($praiseAdd){
                return response()->json(['status'=>true,'message'=>'Praise added successfully']);
            }
            return response()->json(['status'=>false,'message'=>'Praise not added']);
        }catch(Exception $e){
            Log::info('dashboard praise added error: '.$e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }

    }


}
