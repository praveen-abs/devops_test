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

class VmtMainDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $currentUserJobDetails = User::join('vmt_employee_details','vmt_employee_details.userid','=','users.id')
                                ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
                    ->select(
                        'users.name', 
                        'users.avatar', 
                        'vmt_employee_details.emp_no',
                        'vmt_employee_office_details.designation'
                    )
                    ->where('users.id', auth()->user()->id)
                    ->first();  
        $checked = VmtEmployeeAttendance::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first();
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
        $holidays = vmtHolidays::orderBy('holiday_date', 'ASC')->get();
        $polling = Polling::first();
        if ($polling) {
            $selectedPoll = PollVoting::where('user_id', auth()->user()->id)->where('polling_id', $polling->id)->first();
            if ($selectedPoll) {
                $polling->data = $selectedPoll->selected_option;
            }
        }
        if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin')) {
            return view('vmt_hr_dashboard', compact( 'currentUserJobDetails', 'checked','effective_hours', 'holidays', 'polling','dashboardpost'));
        }        
        else 
        if(auth()->user()->hasrole('Manager'))
        {
            return view('vmt_manager_dashboard', compact( 'currentUserJobDetails', 'checked','effective_hours', 'holidays', 'polling','dashboardpost'));
        }
        else 
        if(auth()->user()->hasrole('Employee')) 
        {
            return view('vmt_employee_dashboard', compact( 'currentUserJobDetails', 'checked','effective_hours', 'holidays', 'polling','dashboardpost'));
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
        $Announcement_data->title_data = $request->input('title_data');
        $Announcement_data->ann_author_id = $request->input('user_ref_id');
        $Announcement_data->details_data = $request->input('details_data');
         $Announcement_data->save();
         // dd($Announcement_data);
         $notification_user = User::where('id',auth::user()->id)->first();

         $message = "Announcement Added By "  ;
           Notification::send($notification_user ,new ViewNotification($message.auth()->user()->name));
        $dashboardannoun  =  VmtAnnouncement::where('ann_author_id', $id)->pluck('title_data','ann_author_id','details_data');
        return $dashboardannoun;
    }
}
