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

     protected $ApproverName;
     protected $Empname;
     protected $Empcode;
     protected $loginLink;
     protected $curntStatus;

    public function __construct($ApproverName,$Empname,$Empcode,$loginLink,$curntStatus)
    {
        $this->ApproverName = $ApproverName;

        $this->Empname = $Empname;

        $this->Empcode = $Empcode;

        $this->loginLink = $loginLink;

        $this->curntStatus = $curntStatus;
    }

    public function build()
    {
        //
        // $subject = "Your ".$this->leaveType." has been ";

        $output = $this->view('vmt_approveRejectSalaryAdv_Email')
                    // ->subject($subject.$this->leave_status)
                    ->with('ApproverName', $this->ApproverName)
                    ->with('EmpName', $this->Empname)
                    ->with('EmpCode', $this->Empcode)
                    ->with('loginLink', $this->loginLink)
                    ->with('curntStatus', $this->curntStatus);
                    // ->with('managerName', $this->managerName)
                    // ->with('managerCode', $this->managerCode)
                    // ->with('loginLink', $this->loginLink)
                    // ->with('image_view', $this->image_view)
                    // ->with('leave_status', $this->leave_status)
                    // ->with('empAvatar', $this->empAvatar);
        return $output;
    }

}
