<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveRejectLoanAndSaladvMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function build()
    {
        //
        // $subject = "Your ".$this->leaveType." has been ";

        $output = $this->view('vmt_approveRejectSalaryAdv_Email');
                    // ->subject($subject.$this->leave_status)
                    // ->with('employeeName', $this->employeeName)
                    // ->with('empCode', $this->empCode)
                    // ->with('leaveType', $this->leaveType)
                    // ->with('managerName', $this->managerName)
                    // ->with('managerCode', $this->managerCode)
                    // ->with('loginLink', $this->loginLink)
                    // ->with('image_view', $this->image_view)
                    // ->with('leave_status', $this->leave_status)
                    // ->with('empAvatar', $this->empAvatar);
        return $output;
    }

}
