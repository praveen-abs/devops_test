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
use App\Models\VmtEmployeeMailStatus;
use App\Models\VmtDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use App\Mail\ActivationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class VmtEmployeeMailNotifMgmtService {

    public function getAllEmployees_WelcomeMailStatus_Details(){

        $user_email= User::leftjoin('vmt_employee_mail_status','vmt_employee_mail_status.user_id','users.id')
        ->where('users.active','<>','-1')
        ->where('users.is_ssa','<>','1')
        ->select(
                'users.User_code as empcode',
                'users.name as empname',
                'users.email as personal mail',
                'vmt_employee_mail_status.welcome_mail_status',
                'vmt_employee_mail_status.onboard_docs_approval_mail_status',
                'vmt_employee_mail_status.acc_activation_mail_status'


              )
        ->get();
        return json_encode( $user_email);
    }

    public function send_WelcomeMailNotification($user_code){

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

            //to store mailstatus
            $user_id=User::where('user_code',$user_code)->first()->id;

            $query_emp_welcomemailstatus =VmtEmployeeMailStatus::where('user_id',$user_id);

            if($query_emp_welcomemailstatus->exists())
            {
                //update
               $query_emp_welcomemailstatus = $query_emp_welcomemailstatus->first();
               $query_emp_welcomemailstatus->welcome_mail_status  = $isSent? '1':'0';
               $query_emp_welcomemailstatus->save();

            }
            else
            {

                //create new record
               $query_emp_welcomemailstatus = new VmtEmployeeMailStatus;
               $query_emp_welcomemailstatus->user_id=$user_id;
               $query_emp_welcomemailstatus->welcome_mail_status =$isSent? '1':'0';
               $query_emp_welcomemailstatus->save();
            }


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


            $isSent = \Mail::to($user_mail)->send(new ActivationMail($user_code ,'Abs@123123', request()->getSchemeAndHttpHost(), "", $image_view));

            //Store the sent status in ' vmt_user_mail_status'

            //to store mailstatus
            $user_id=User::where('user_code',$user_code)->first()->id;

            $query_emp_activationmailstatus =VmtEmployeeMailStatus::where('user_id',$user_id);

            if($query_emp_activationmailstatus->exists())
            {
                //update
               $query_emp_activationmailstatus = $query_emp_activationmailstatus->first();
               $query_emp_activationmailstatus->acc_activation_mail_status= $isSent? '1':'0';
               $query_emp_activationmailstatus->save();

            }
            else
            {

                //create new record
               $query_emp_activationmailstatus = new VmtEmployeeMailStatus;
               $query_emp_activationmailstatus->user_id=$user_id;
               $query_emp_activationmailstatus->acc_activation_mail_status=$isSent? '1':'0';
               $query_emp_activationmailstatus->save();
            }


            return 'success';

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
