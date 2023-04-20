<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth as auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

use App\Models\VmtGeneralInfo;
use App\Models\User;
use App\Models\VmtClientMaster;
use Illuminate\Support\Facades\Cache;
use App\Mail\PasswordResetLinkMail;

use App\Http\Controllers\VmtStaffAttendanceController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        $generalInfo = VmtGeneralInfo::first();
        $clientList = VmtClientMaster::all(['id','client_name']);
        //dd($generalInfo);
        $cacheStatus = "";

        // $cookies = \Cookie::get();

        // foreach($cookies as $key => $value)
        // {
        //    // dd($key);
        //     \Cookie::queue(\Cookie::forget($key));
        // }

        if(Cache::flush())
            $cacheStatus = "Cache cleared";
        else
            $cacheStatus = "Cache not cleared";


        return view('auth.login', compact('generalInfo','clientList','cacheStatus'));
    }

    public function showForgetPasswordPage(Request $request){
        $generalInfo = VmtGeneralInfo::first();

        return view('forget_password',compact('generalInfo'));
    }

    public function login(Request $request)
    {

        $request->session()->invalidate();
        $request->session()->regenerateToken();

     
        $request->validate([
            'user_code' => 'required',
            'password' => 'required',
        ]);

        // Remember token set to false
        $save_credentials = false;
        $user = User::where('user_code', $request->user_code)->where('can_login', 1)->first();

        if($user)
        {
            $isDefaultPasswordUpdated = $user->is_default_password_updated;

            //If client_code selected
            if(isset($request->client_code))
            {
                if(str_contains( $user->user_code , $request->client_code) || str_contains( $user->user_code , 'EMP'))
                {
                    $credentials = $request->only('user_code', 'password');
                    if (Hash::check($request->password, $user->password)) {
                    // if (Auth::attempt($credentials)) {
                        // Auth::login($user, $save_credentials);
                        if (auth::attempt(['user_code' => $request->user_code, 'password' => $request->password], $save_credentials)) {

                            if($isDefaultPasswordUpdated == '1')
                            {

                                // Sync Staff attendance data from device
                              //  $this->syncStaffAttendance();

                                //If User has already updated password, so redirect to dashboard page
                                return redirect(route('index'));
                             }
                             else
                             {
                                //If User has to update password, then redirect to reset password page
                                return redirect(route('vmt-resetpassword-page'));

                             }

                        }
                    }
                    else
                    {
                        $errors = ['Invalid credentials provided'];
                        return redirect()->back()->withErrors($errors);
                    }

                }
                else
                {
                    //Invalid client-code selected
                    $errors = ['Employee is not part of selected Client'];
                    return redirect()->back()->withErrors($errors);
                }

                // return redirect()->back();
            }
            else
            {
                //If no client_code selected, then perform login based on username and pwd
                $credentials = $request->only('user_code', 'password');
                if (Hash::check($request->password, $user->password)) {

                    if (auth::attempt(['user_code' => $request->user_code, 'password' => $request->password], $save_credentials))
                    {
                        if($isDefaultPasswordUpdated == "1")
                        {
                           // Sync Staff attendance data from device
                           //$this->syncStaffAttendance();

                           //If User has already updated password, so redirect to dashboard page
                           return redirect(route('index'));
                        }
                        else
                        {
                           //If User has to update password, then redirect to reset password page
                           return $this->showResetPasswordPage($request);

                        }
                    }
                }
                else
                {
                    $errors = ['Invalid credentials provided'];
                    return redirect()->back()->withErrors($errors);
                }

            }
        }
        else
        {
            $errors = ['Your Account is not Active.'];
            return redirect()->back()->withErrors($errors);
            // return back()->withErrors('Your Account is not Active.');
        }

        return redirect()->back();

    }

    public function showResetPasswordPage(Request $request)
    {
        $generalInfo = VmtGeneralInfo::first();

        return view('auth.reset_password',compact('generalInfo'));
    }

    public function sendPasswordResetLink(Request $request){

        $message = "";
        $mail_status = "";
        $status = "";

        $user = User::where('email',$request->email);

        //Check whether the given email exists in system
        if($user->exists())
        {

            //Generate temporary URL
            $passwordResetLink =  URL::temporarySignedRoute(
                'vmt-signed-passwordresetlink', now()->addMinutes(1), ['uid' => $user->value('id')]
            );

            //Then, send mail to that email

            $VmtGeneralInfo = VmtGeneralInfo::first();
            $image_view = url('/') . $VmtGeneralInfo->logo_img;

            $isSent    = \Mail::to($request->email)->send(new PasswordResetLinkMail($user->value('name'), $user->value('user_code'), $passwordResetLink, $image_view));

            if( $isSent) {
                $mail_status = "Mail sent successfully";

            } else {
                $mail_status= "Mail Error : There was one or more failures.";
            }

            $status = "success";
            $message = "Instructions to reset password reset is sent to your mail.";


        }
        else
        {
            $status = "failure";
            $message = "Email doesnt exist in our system. Kindly check and try again.";
        }


        $response = [
            'status' => $status,
            'message' => $message,
            'mail_status' => $mail_status,
        ];

        return $response;
    }

    public function processSignedPasswordResetLink(Request $request){

        if ($request->hasValidSignature()) {
            return redirect('/resetPassword')->with('uid', $request->uid);
        }
        else{
            $error_message =  "Reset password link is expired. Please try again";

            return redirect('/forgetPassword')->with('error_message', $error_message);
        }

    }

    protected function syncStaffAttendance(){

        $deviceAttendanceController  = new VmtStaffAttendanceController;

        try {
            $deviceAttendanceController->syncStaffAttendanceFromDeviceDatabase();
        } catch (\Exception $e) {

        }


    }
}
