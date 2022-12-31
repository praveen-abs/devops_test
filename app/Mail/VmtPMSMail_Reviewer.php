<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/*


    Mail is sent to Employee when manager submits review

*/
class VmtPMSMail_Reviewer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // protected $linkUri;
    public function __construct($approvalStatus, $user_emp_name,$appraisal_year, $appraisal_period,$user_manager_name,$comments_manager,$login_link)
    {
        //
        $this->approvalStatus = $approvalStatus;
        $this->user_emp_name = $user_emp_name;
        $this->appraisal_year = $appraisal_year;
        $this->appraisal_period = $appraisal_period;
        $this->user_manager_name = $user_manager_name;
        $this->comments_manager = $comments_manager;
        $this->loginLink = $login_link;
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
                //->subject("Regarding the Manager Review - PMS")
                ->subject("Submitted Manager Review OKR/PMS for the Period of ".$this->appraisal_year." - ".$this->appraisal_period)
                ->view('pms_mails.vmt_pms_mail_flow2_manager_to_assignee')
                ->with('approvalStatus', $this->approvalStatus)
                ->with('user_emp_name', $this->user_emp_name)
                ->with('appraisal_year', $this->appraisal_year)
                ->with('appraisal_period', $this->appraisal_period)
                ->with('user_manager_name', $this->user_manager_name)
                ->with('comments_manager', $this->comments_manager)
                ->with('loginLink', $this->loginLink);

    }
}
