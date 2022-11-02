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
    public function __construct( $approvalStatus,$user_emp_name,$appraisal_period,$user_manager_name,$command_emp)
    {
        //

        $this->approvalStatus = $approvalStatus;
        $this->user_emp_name = $user_emp_name;
        $this->appraisal_period = $appraisal_period;
        $this->user_manager_name = $user_manager_name;
        $this->command_emp = $command_emp;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vmt_pms_mail_assignee')
                ->with('user_emp_name', $this->user_emp_name)
                ->with('approvalStatus', $this->approvalStatus)
                ->with('appraisal_period', $this->appraisal_period)
                 ->with('user_manager_name', $this->user_manager_name)
                 ->with('command_emp', $this->command_emp);
    }
}
