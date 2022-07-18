<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\VmtGeneralSettings;
use App\Models\VmtGeneralInfo;
use App\Models\VmtEmployee;
use Session as Ses;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        //dd($currentUser);
        if(auth()->user()->hasrole('HR') || auth()->user()->hasrole('Admin')) {
            return view('vmt_hr_dashboard', compact( 'currentUserJobDetails'));
        }        
        else 
        if(auth()->user()->hasrole('Manager'))
        {
            return view('vmt_manager_dashboard', compact( 'currentUserJobDetails'));
        }
        else 
        if(auth()->user()->hasrole('Employee')) 
        {
            return view('vmt_employee_dashboard', compact( 'currentUserJobDetails'));
        } 

    }
}
