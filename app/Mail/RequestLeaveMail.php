<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestLeaveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $employeeName;
    protected $managerName;
    protected $empCode;
    protected $empAvatar;
    protected $startDate;
    protected $endDate;
    protected $reason;

    protected $leaveType;
    protected $totalLeaveDatetime;
    protected $loginLink;
    protected $image_view;

    public function __construct($uEmployeeName, $uEmpCode, $uEmpAvatar, $uManagerName,$uStartDate,$uEndDate,$uReason, $uLeaveType, $uTotal_leave_datetime,  $loginLink, $image_view )
    {
        //
        $this->employeeName  = $uEmployeeName;
        $this->empCode  = $uEmpCode;
        $this->empAvatar   =$uEmpAvatar;
        $this->managerName   =$uManagerName;
        $this->startDate   =$uStartDate;
        $this->endDate   =$uEndDate;
        $this->reason   =$uReason;
        $this->leaveType   =$uLeaveType;
        $this->totalLeaveDatetime =$uTotal_leave_datetime;
        $this->loginLink  = $loginLink;
        $this->image_view   = $image_view;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $MAIL_FROM_ADDRESS = env('MAIL_FROM_ADDRESS');
        $MAIL_FROM_NAME    = env('MAIL_FROM_NAME');

        return $this->from($MAIL_FROM_ADDRESS,  $MAIL_FROM_NAME)
                    ->subject("Leave Approval Request from ".$this->employeeName)
                    ->view('mail_leave_request')
                    ->with('employeeName', $this->employeeName)
                    ->with('empCode', $this->empCode)
                    ->with('empAvatar', $this->empAvatar)
                    ->with('managerName', $this->managerName)
                    ->with('startDate', $this->startDate)
                    ->with('endDate', $this->endDate)
                    ->with('reason', $this->reason)
                    ->with('leaveType', $this->leaveType)
                    ->with('totalLeaveDatetime', $this->totalLeaveDatetime)
                    ->with('loginLink', $this->loginLink)
                    ->with('image_view', $this->image_view);

    }
}
