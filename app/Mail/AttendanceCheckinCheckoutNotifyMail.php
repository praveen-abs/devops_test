<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceCheckinCheckoutNotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $employeeName;
    protected $empCode;
    protected $attendance_date;
    protected $user_time;
    protected $image_view;
    protected $regularization_type;

    public function __construct($uEmployeeName, $uEmpCode, $attendance_date, $user_time, $image_view, $regularization_type)
    {
        //
        $this->employeeName  = $uEmployeeName;
        $this->empCode  = $uEmpCode;
        $this->attendance_date = $attendance_date;
        $this->user_time = $user_time;
        $this->image_view   = $image_view;
        $this->regularization_type = $regularization_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $message = "---";

        switch ($this->regularization_type) {

            case "LC":
                $message = "You have checked-in late on ".$attendance_date." at ".$user_time;
                break;
            case "EG":
                $message = "You have checked-out early on ".$attendance_date." at ".$user_time;
                break;
            case "MIP":
                $message = "You have missed your Check-in punch on ".$attendance_date;
                break;
            case "MOP":
                $message = "You have missed your Check-out punch on ".$attendance_date;
                break;
            default:
                $message="Invalid Regularization Type : ".$this->regularization_type;
        }


        $output = $this->view('vmt_mail_attendance_regularization_notify')
                    ->with('employeeName', $this->employeeName)
                    ->with('empCode', $this->empCode)
                    ->with('message', $this->message)
                    ->with('url_attendanceTimeSheet', $this->url_attendanceTimeSheet)
                    ->with('attendance_date', $this->attendance_date)
                    ->with('image_view', $this->image_view);

        return $output;
    }
}
