<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VmtPMSMail_Assignee extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // protected $linkUri;
    public function __construct( $approvalStatus,$flowType, $user_emp_name,$appraisal_period,$user_manager_name,$comments_employee,$loginLink)
    {
        //

        $this->approvalStatus = $approvalStatus;
        $this->flowType = $flowType;// PMS flow 1 / 2 / 3
        $this->user_emp_name = $user_emp_name;
        $this->appraisal_period = $appraisal_period;
        $this->user_manager_name = $user_manager_name;
        $this->comments_employee = $comments_employee;
        $this->loginLink = $loginLink;

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

        $mail_subject = "---";

        if($this->flowType == "2")
        {
            if($this->approvalStatus == "accepted")
                $mail_subject = "Accepted of OKR/PMS for the Period of " . $this->appraisal_period;
            else
                $mail_subject = "Rejected of OKR/PMS for the Period of " . $this->appraisal_period;
        }
        else
        if($this->flowType == "3")
        {
            $mail_subject = "Successful Update of PMS/OKR for the Period of " . $this->appraisal_period;
        }


        return $this->from($MAIL_FROM_ADDRESS,  $MAIL_FROM_NAME)
                //Rejected of OKR/PMS for the Period of {Month Name/ Quarter Name/ Half Year Name}
                ->subject($mail_subject)
                ->view('vmt_pms_mail_flow_assignee_to_manager')
                ->with('user_emp_name', $this->user_emp_name)
                ->with('approvalStatus', $this->approvalStatus)
                ->with('appraisal_period', $this->appraisal_period)
                ->with('user_manager_name', $this->user_manager_name)
                ->with('comments_employee', $this->comments_employee)
                ->with('loginLink', $this->loginLink);
    }
}
