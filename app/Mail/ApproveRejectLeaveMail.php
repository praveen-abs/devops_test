<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveRejectLeaveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $employeeName;
    protected $empCode;
    protected $managerName;
    protected $managerCode;
    protected $loginLink;
    protected $image_view;
    protected $mail_content;

    protected $leave_status;

    public function __construct($uEmployeeName, $uEmpCode, $managerName , $managerCode, $loginLink, $image_view, $mail_content , $leave_status)
    {
        //
        $this->employeeName  = $uEmployeeName;
        $this->empCode  = $uEmpCode;
        $this->managerName  = $managerName;
        $this->managerCode  = $managerCode;
        $this->loginLink  = $loginLink;
        $this->image_view   = $image_view;
        $this->mail_content   = $mail_content;
        $this->leave_status   = $leave_status;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $output = $this->view('vmt_approveRejectLeave_Email')
                    ->subject("Your Leave has been ".$this->leave_status)
                    ->with('employeeName', $this->employeeName)
                    ->with('empCode', $this->empCode)
                    ->with('managerName', $this->managerName)
                    ->with('managerCode', $this->managerCode)
                    ->with('loginLink', $this->loginLink)
                    ->with('image_view', $this->image_view)
                    ->with('leave_status', $this->leave_status)
                    ->with('mail_content', $this->mail_content);

        return $output;
    }
}
