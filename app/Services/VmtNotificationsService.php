<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployee;
use Illuminate\Support\Facades\DB;

use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtNotifications;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class VmtNotificationsService {

    protected $leave_module;


    public function __construct(){
        $this->leave_module = [
                                "employee_applies_leave" =>
                                [
                                    "title" => "Leave Request",
                                    "body" => "has applied leave. Kindly check."
                                ],
                                "manager_approves_leave" => [
                                    "title" => "Leave Status",
                                    "body" => "has approved your leave request."
                                ],
                                "manager_rejects_leave" => [
                                    "title" => "Leave Status",
                                    "body" => "has rejected your leave request."
                                ],
                                "manager_withdraw_leave" => [
                                    "title" => "Leave Status",
                                    "body" => "has withdrawn his/her leave approval. Kindly check your updated leave status."
                                ],

        ];


    }

    public function getNotifications($user_code){
        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
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

            //Get the user record and update avatar column
            $query_notifications = User::with('array_notifications')
                               ->where('users.user_code',$user_code)
                               ->first(['users.id','users.name', 'users.user_code']);

            //Add recipient name
            foreach($query_notifications['array_notifications'] as $singleNotification){

                $singleNotification["recipient_name"] = User::find($singleNotification["recipient_user_id"])->name;
            }

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" => $query_notifications,
            ]);

        }
        catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to fetch notifications",
                "data" => $e,
            ]);

        }
    }

    public function updateNotificationReadStatus($recipient_user_code, $record_id, $read_status){

        //Validate
        $validator = Validator::make(
            $data = [
                'recipient_user_code' => $recipient_user_code,
                'record_id' => $record_id,
                'read_status' => $read_status
            ],
            $rules = [
                'recipient_user_code' => 'required|exists:users,user_code',
                'record_id' => 'required|exists:vmt_notifications,id',
                'read_status' => 'required',
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
            $query_user = User::where('user_code',$recipient_user_code)->first();

            //Check if the notification id belongs to this user
            $query_record = VmtNotifications::where('id',$record_id)
                            ->where('recipient_user_id',$query_user->id)->first();

            if(empty($query_record))
            {

                return response()->json([
                    'status' => 'failure',
                    'message' => "Given record id not related to the given user"
                ]);

            }

           // $query_notif_record = VmtNotifications::find('id',$record_id);
            //$query_notif_record->is_read = $read_status;

            //Update the read status
            $query_record->is_read = $read_status;
            $query_record->save();

            return response()->json([
                "status" => "success",
                "message" => "Notification status updated successfully",
                "data" => '',
            ]);

        }
        catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to update notification status",
                "data" => $e,
            ]);

        }
    }


    /*
        Sends an FCM notification

    */
    public function sendLeaveApplied_FCMNotification($manager_user_code, $notif_users_ids){


        //Validate
        $validator = Validator::make(
            $data = [
                'manager_user_code' => $manager_user_code,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
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
            //Get manager FCM Token

            //    echo json_encode($leave_module["employee_applies_leave"]["title"]);

            $notif_title = $this->leave_module["employee_applies_leave"]["title"];
            $notif_body = $this->leave_module["employee_applies_leave"]["body"];


            $fcm_manager = User::where('user_code', $manager_user_code)->first()->fcm_token;

            if(empty($fcm_manager))
            {
                return response()->json([
                    "status" => "failure",
                    "message" => "FCM Token missing for the user : ".$manager_user_code,
                    "data" => ''
                ]);
            }
            else{

                //Send Firebase notifications



            }

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "failure",
                "message" => "Unable to send FCM notification",
                "data" => $e,
            ]);
        }


    }

    public function saveNotification($user_code, $notification_title, $notification_body, $redirect_to_module, $recipient_user_code, $is_read){
        //Validate
        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'notification_title' => $notification_title,
                'notification_body' => $notification_body,
                'redirect_to_module' => $redirect_to_module,
                'recipient_user_code' => $recipient_user_code,
                'is_read' => $is_read,
            ],
            $rules = [
                'user_code' => 'required|exists:users,user_code',
                'notification_title' => 'required',
                'notification_body' => 'required',
                'redirect_to_module' => 'required',
                'recipient_user_code' => 'required',
                'is_read' => 'required',
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

            //Get the user record and update avatar column
            $query_notifications = new VmtNotifications;
            $query_notifications->user_id = User::where('user_code', $user_code)->first()->id;

            $query_notifications->notification_title = $notification_title;
            $query_notifications->notification_body = $notification_body;
            $query_notifications->redirect_to_module = $redirect_to_module;

            $query_notifications->recipient_user_id = User::where('user_code', $recipient_user_code)->first()->id;

            $query_notifications->save();

            return response()->json([
                "status" => "success",
                "message" => "Notification saved successfully",
                "data" => '',
            ]);

        }
        catch(\Exception $e){

            return response()->json([
                "status" => "failure",
                "message" => "Unable to save notifications",
                "data" => $e,
            ]);
        }
    }
}
