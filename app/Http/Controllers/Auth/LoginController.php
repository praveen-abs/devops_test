<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth as auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\VmtGeneralInfo;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

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
        //dd($generalInfo);
        $cacheStatus = "";
        if(Cache::flush())
            $cacheStatus = "Cache cleared";
        else
            $cacheStatus = "Cache not cleared";

        return view('auth.login', compact('generalInfo','cacheStatus'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_code' => 'required',
            'password' => 'required',
        ]);

        // Remember token set to false
        $save_credentials = false;
        $user = User::where('user_code', $request->user_code)->where('active', 1)->first();
        if($user){
            $credentials = $request->only('user_code', 'password');
            if (Hash::check($request->password, $user->password)) {
            // if (Auth::attempt($credentials)) {
                // Auth::login($user, $save_credentials);
                if (auth::attempt(['user_code' => $request->user_code, 'password' => $request->password], $save_credentials)) {
                    return redirect(route('index'));
                }
            }

            return redirect()->back();
        }else{
            $errors = ['Your Account is not Active.'];
            return redirect()->back()->withErrors($errors);
             // return back()->withErrors('Your Account is not Active.');

        }
        return redirect()->back();
        
    }
}
