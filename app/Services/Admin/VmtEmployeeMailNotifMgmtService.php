<?php

namespace App\Services\Admin;

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
use App\Models\VmtDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class VmtEmployeeMailNotifMgmtService {

    public function getAllEmployees_WelcomeMailStatus_Details(){

        $user_email= User::join('vmt_user_mail_status','vmt_user_mail_status.user_id','users.id')
        ->where('users.active','<>','-1')
        ->select(
                'users.User_code as empcode',
                'users.name as empname'  ,
                'vmt_employee_office_details.officical_mail as officialmail',
                'vmt_user_mail_status.welcome_mail_status as welcomemailstatus'
              )
        ->get();
        return json_encode( $user_email);
    }

    public function send_AccActivationMailNotification($user_code){

        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                "user_code" => 'required|exists:users,user_code',
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',
            ]

        );

        if($validator->fails()){
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }


        try{
            $user_mail = User::join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','users.id')
            ->where('users.user_code',$user_code)
            ->first()->email;

            $VmtGeneralInfo = VmtGeneralInfo::first();
            $image_view = url('/') . $VmtGeneralInfo->logo_img;


            $isSent = \Mail::to($user_mail)->send(new WelcomeMail($user_code ,'Abs@123123', request()->getSchemeAndHttpHost(), "", $image_view));

            //Store the sent status in ' vmt_user_mail_status'
            if($isSent){
                $mail_status='1';
            }
            else{
              $mail_status='0';
            }
            //to store mailstatus
            $Welcome_mail_status= new VmtUserMailStatus;
            $user_id=User::where('user_code',$user_code)->first()->id;
            $Welcome_mail_status->user_id=$user_id;
            $Welcome_mail_status->acc_activation_mail_status=$mail_status;
            $Welcome_mail_status->save();


            return response()->json([
                'status' => 'success',
                'message' => "Welcome Mail Notification sent successfully!",
                'data' => ""
            ]);

        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => 'failure',
                'message' => "",
                'data' => $e
            ]);
        }



    }
}
