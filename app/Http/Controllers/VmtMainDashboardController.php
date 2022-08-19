<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Arr;

class VmtMainDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

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
                                ->where('users.is_admin','<>','1')
                                ;

        //Employee events for the current month only
        $dashboardEmployeeEventsData = [];
        $dashboardEmployeeEventsData['birthday'] = $employeesEventDetails->whereMonth('vmt_employee_details.dob',Carbon::now()->month)->get();
        $dashboardEmployeeEventsData['work_anniversary'] = $employeesEventDetails->whereMonth('vmt_employee_details.doj',Carbon::now()->month)->get();
        $dashboardEmployeeEventsData['hasData'] = 'true';

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
        $holidays = vmtHolidays::whereDate('holiday_date', '>=', $todayDate)->orderBy('holiday_date', 'ASC')->get();
        $polling = Polling::first();
        if ($polling) {
            $selectedPoll = PollVoting::where('user_id', auth()->user()->id)->where('polling_id', $polling->id)->first();
            if ($selectedPoll) {
                $polling->data = $selectedPoll->selected_option;
            }
        }

        ////Dashboard counters data
        //Total Employees Count
        $totalEmployeesCount = User::where('users.is_admin','<>','1')->count();

        //New Joinees Count
        $currentDate = Carbon::now();
        $currentDate->setTimezone("Asia/Kolkata");
        $dateDifferenceForNewJoinees = 7; //Right now, showing 1 week old joinees
        $newEmployeesCount = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                                ->whereRaw('DATEDIFF(? , vmt_employee_details.doj) <= ?',[$currentDate, $dateDifferenceForNewJoinees])
                                ->where('users.is_admin','<>','1')
                                ->get()->count();


        //Employees who checked-in today
        $todayEmployeesCheckedInCount = User::join('vmt_employee_attendance','vmt_employee_attendance.user_id','=','users.id')
                                ->whereDate('vmt_employee_attendance.checkin_time','=', $currentDate )
                                ->whereNull('vmt_employee_attendance.checkout_time')
                                ->where('users.is_admin','<>','1')
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

        if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin')) {
            return view('vmt_hr_dashboard', compact( 'dashboardEmployeeEventsData', 'checked','effective_hours', 'holidays', 'polling','dashboardpost','json_dashboardCountersData'));
        }
        else
        if(auth()->user()->hasrole('Manager'))
        {
            return view('vmt_manager_dashboard', compact( 'dashboardEmployeeEventsData','checked','effective_hours', 'holidays', 'polling','dashboardpost','json_dashboardCountersData'));
        }
        else
        if(auth()->user()->hasrole('Employee'))
        {
            return view('vmt_employee_dashboard', compact( 'dashboardEmployeeEventsData','checked','effective_hours', 'holidays', 'polling','dashboardpost','json_dashboardCountersData'));
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
        $Announcement_data->ann_author_id = $request->input('user_ref_id');
        $Announcement_data->details_data = $request->input('details_data');
         $Announcement_data->save();
         // dd($Announcement_data);
         $notification_user = User::where('id',auth::user()->id)->first();

         $message = "Announcement Added By "  ;
                  // code email
          $hrList =  User::role(['HR','Employee', 'admin', 'Admin'])->get();
            $hrUsers = $hrList->pluck('id');
          $officialMailList =   VmtEmployeeOfficeDetails::whereIn('user_id', $hrUsers)->pluck('officical_mail');
         $user_emp_name =  $message;
         // var_dump($officialMailList);
         if($officialMailList !=null){

       \Mail::to($officialMailList)->send(new PMSReviewCompleted('announcement',$user_emp_name,$title_data,$details_data));
         }
         // end email
           Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        $dashboardannoun  =  VmtAnnouncement::where('ann_author_id', $id)->pluck('title_data','ann_author_id','details_data');
        return $dashboardannoun;
    }


}
