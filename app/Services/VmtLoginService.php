<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployeeDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Mail\PasswordResetLinkMail;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Validator;

class VmtLoginService {

    public function sendPasswordResetLink($user_code, $email){


        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'email' => $email,
            ],
            $rules = [
                "user_code" => 'nullable|exists:users,user_code',
                "email" => 'nullable|exists:users,email',
            ],
            $messages = [
                'exists' => 'Your :attribute is invalid. Kindly enter the proper credentials',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        //The above validator cant check both nullable and so we do it here manually
        if(empty($email) && empty($user_code))
        {
            return response()->json([
                'status' => "failure",
                'message'=> 'Please enter your registered email or employee code',
                'data'   => ''
            ]);
        }

        //dd("end : ".$user_code." , ".$email);

        try{

            $query_user = null;

            //fetch the email based on the received email or user_code
            if(!empty($email))
                $query_user = User::where('email', $email)->first();
            else
            if(!empty($user_code))
                $query_user = User::where('user_code', $user_code)->first();
            else
            {
                //This scenario will never happen since we handle this in above code itself.
            }

            $message = "";
            $mail_status = "";
            $status = "";

            //Generate temporary URL
            $passwordResetLink =  URL::temporarySignedRoute( 'vmt-signed-passwordresetlink', now()->addMinutes(1), ['uid' => $query_user->id] );

            //Then, send mail to that email
            $VmtGeneralInfo = VmtGeneralInfo::first();
            $image_view = url('/') . $VmtGeneralInfo->logo_img;

            $isSent    = \Mail::to($query_user->email)->send(new PasswordResetLinkMail($query_user->name, $query_user->user_code, $passwordResetLink, $image_view));

            if( $isSent) {
                $status = "success";
                $message = "Instructions to reset your password is sent to your mail.";

            } else {
                $status = "failure";
                $message= "Mail Error : There was one or more failures.";
            }


            $response = [
                'status' => $status,
                'message' => $message,
                'data' => '',
            ];

            return $response;
        }
        catch(\Exception $e){
            return [
                'status' => "failure",
                'message' => "Error while processing your request",
                'data' => $e,
            ];
        }
    }




}
