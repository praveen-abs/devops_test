<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
      /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'user_code' => 'required',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['user_code', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'EmployeeCode & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('user_code', $request->user_code)->where('is_ssa','0')->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    /*
        Process :
        1. First, compare the OTP received with existing OTP .
        2. If matches, then use $request->new_password to update Users table


    */
    public function updatePassword(Request $request)
    {
        // $current_user_id = '';

        // if (isset($request->password)) {
        //     $currentUser = User::where('id',$current_user_id )->first();
        //     $currentUser->password = Hash::make($request->password);
        //     $currentUser->is_default_password_updated = '1';
        //     $currentUser->save();

        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Password updated successfully.',
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 'failure',
        //         'message' => 'Password should not be empty.',
        //     ]);
        // }
    }

}
