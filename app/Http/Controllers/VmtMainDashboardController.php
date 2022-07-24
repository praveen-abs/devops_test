<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\VmtGeneralSettings;
use App\Models\VmtGeneralInfo;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeAttendance;
use App\Models\vmtHolidays;
use App\Models\Polling;
use App\Models\PollVoting;
use Session as Ses;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

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

        $holidays = vmtHolidays::orderBy('holiday_date', 'ASC')->get();
        $polling = Polling::first();
        if ($polling) {
            $selectedPoll = PollVoting::where('user_id', auth()->user()->id)->where('polling_id', $polling->id)->first();
            if ($selectedPoll) {
                $polling->data = $selectedPoll->selected_option;
            }
        }
        if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin')) {
            return view('vmt_hr_dashboard', compact( 'currentUserJobDetails', 'checked','effective_hours', 'holidays', 'polling'));
        }        
        else 
        if(auth()->user()->hasrole('Manager'))
        {
            return view('vmt_manager_dashboard', compact( 'currentUserJobDetails', 'checked','effective_hours', 'holidays', 'polling'));
        }
        else 
        if(auth()->user()->hasrole('Employee')) 
        {
            return view('vmt_employee_dashboard', compact( 'currentUserJobDetails', 'checked','effective_hours', 'holidays', 'polling'));
        } 

    }
}
