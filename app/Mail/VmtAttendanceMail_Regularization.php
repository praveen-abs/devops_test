<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/*
    Mail sent from Attendance Regularization module


*/
class VmtAttendanceMail_Regularization extends Mailable
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
    protected $managerName;
    protected $managerCode;
    protected $loginLink;
    protected $image_view;
    protected $custom_reason;

    protected $status;

    public function __construct($uEmployeeName, $uEmpCode, $uAttendance_date, $managerName , $managerCode, $loginLink, $image_view, $custom_reason , $status)
    {
        //
        $this->employeeName  = $uEmployeeName;
        $this->empCode  = $uEmpCode;
        $this->attendance_date = $uAttendance_date;
        $this->managerName  = $managerName;
        $this->managerCode  = $managerCode;
        $this->loginLink  = $loginLink;
        $this->image_view   = $image_view;
        $this->custom_reason   = $custom_reason;
        $this->status   = $status;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $output = "Error : status is invalid";

        $MAIL_FROM_ADDRESS = env('MAIL_FROM_ADDRESS');
        $MAIL_FROM_NAME    = env('MAIL_FROM_NAME');

        if($this->status == "Pending")
        {
            //Mail sent to Manager
            $output = $this->from($MAIL_FROM_ADDRESS,  $MAIL_FROM_NAME)
                            ->subject("Attendance Regularization Mail")
                            ->view('vmt_mail_attendance_regularization_request')
                            ->with('employeeName', $this->employeeName)
                            ->with('empCode', $this->empCode)
                            ->with('attendance_date', $this->attendance_date)
                            ->with('managerName', $this->managerName)
                            ->with('managerCode', $this->managerCode)
                            ->with('loginLink', $this->loginLink)
                            ->with('image_view', $this->image_view)
                            ->with('status', $this->status)
                            ->with('custom_reason', $this->custom_reason);
        }
        else
        if($this->status == "Approved" || $this->status == "Rejected")
        {
            //Mail sent to employee who applied for Regularization
            $output = $this->from($MAIL_FROM_ADDRESS,  $MAIL_FROM_NAME)
                            ->subject("Your Attendance Regularization has been ".$this->status)
                            ->view('vmt_mail_attendance_regularization_approveReject')
                            ->with('employeeName', $this->employeeName)
                            ->with('empCode', $this->empCode)
                            ->with('attendance_date', $this->attendance_date)
                            ->with('managerName', $this->managerName)
                            ->with('managerCode', $this->managerCode)
                            ->with('loginLink', $this->loginLink)
                            ->with('image_view', $this->image_view)
                            ->with('status', $this->status)
                            ->with('custom_reason', $this->custom_reason);

        }

        return $output;
    }
}
