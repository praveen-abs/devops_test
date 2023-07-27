<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployee;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\BirthdayMail;
use App\Mail\AnniversaryMail;
use \DateTime;
use \Mail;

class VmtEmployeeBirthdayController extends Controller
{
    //


    public function sendBirthdayNotificationtoEmployee(){

        $isEmailSent =null;
        $birth_date = Carbon::now()->addDay()->format('m-d');

        $usersWithBirthdays = VmtEmployee::join('users','vmt_employee_details.userid','=','users.id')
                 ->whereRaw("DATE_FORMAT(dob, '%m-%d') = '$birth_date'")->get(['users.email','users.name']);


            foreach ($usersWithBirthdays as $single_user_birtday) {

                $isEmailSent = Mail::to($single_user_birtday['email'])->send(new BirthdayMail($single_user_birtday['name']));

            }

            return $response=([
                'status' => 'success',
                'mail_status' => $isEmailSent ? 'success':'failure',
               ]);

    }
    public function sendAniversaryNotificationtoEmployee(){

             $isEmailSent =null;

        $Employee_details = VmtEmployee::get(['doj','userid']);

        foreach ($Employee_details as $single_data) {

           $datetime1 = new DateTime($single_data['doj']);

           $datetime2 = new DateTime(date('Y-m-d'));

           $difference = $datetime1->diff($datetime2);

           if($difference->y == '1' && $difference->m =='0' &&$difference->d =='0'){

                $user_data =User::where('id',$single_data['userid'])->first();

                $isEmailSent = Mail::to($user_data->email)->send(new AnniversaryMail($anniversary_type,$aniversary_image,$user_emp_name));

           }else if($difference->y == '2' && $difference->m =='0' &&$difference->d =='0'){

               $user_data =User::where('id',$single_data['userid'])->first();

               $isEmailSent = Mail::to($user_data->email)->send(new AnniversaryMail($anniversary_type,$aniversary_image,$user_emp_name));

           }
           else if($difference->y == '3' && $difference->m =='0' &&$difference->d =='0'){

               $user_data =User::where('id',$single_data['userid'])->first();

               $isEmailSent = Mail::to($user_data->email)->send(new AnniversaryMail($anniversary_type,$aniversary_image,$user_emp_name));

           }
           else if($difference->y == '4' && $difference->m =='0' &&$difference->d =='0'){

               $user_data =User::where('id',$single_data['userid'])->first();

               $isEmailSent = Mail::to($user_data->email)->send(new AnniversaryMail($anniversary_type,$aniversary_image,$user_emp_name));

           }
           else if($difference->y == '5' && $difference->m =='0' &&$difference->d =='0'){

               $user_data =User::where('id',$single_data['userid'])->first();
               
               $isEmailSent = Mail::to($user_data->email)->send(new AnniversaryMail($anniversary_type,$aniversary_image,$user_emp_name));

           }

           }

           return $response=([
            'status' => 'success',
            'mail_status' => $isEmailSent ? 'success':'failure',
           ]);

    }
}
