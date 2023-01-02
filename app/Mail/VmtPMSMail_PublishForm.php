<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VmtPMSMail_PublishForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // protected $linkUri;
    public function __construct( $approvalStatus,$user_emp_name,$appraisal_year,$appraisal_period,$user_manager_name,$command_emp,$flow_check,$loginLink)
    {
        //

        $this->approvalStatus = $approvalStatus;
        $this->user_emp_name = $user_emp_name;
        $this->appraisal_year = $appraisal_year;
        $this->appraisal_period = $appraisal_period;
        $this->user_manager_name = $user_manager_name;
        $this->command_emp = $command_emp;
        $this->flow_check = $flow_check;
        $this->loginLink    = $loginLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_template = '';
        if($this->flow_check == 1)
            $mail_template = 'vmt_pms_mail_flow1_hr_to_assignee';
        else
        if($this->flow_check == 2)
            $mail_template = 'vmt_pms_mail_flow_manager_to_assignee';

        $MAIL_FROM_ADDRESS = env('MAIL_FROM_ADDRESS');
        $MAIL_FROM_NAME    = env('MAIL_FROM_NAME');

        return $this->from($MAIL_FROM_ADDRESS,  $MAIL_FROM_NAME)
                ->subject($MAIL_FROM_NAME)
                ->view($mail_template)
                ->with('user_emp_name', $this->user_emp_name)
                ->with('approvalStatus', $this->approvalStatus)
                ->with('appraisal_year', $this->appraisal_year)
                ->with('appraisal_period', $this->appraisal_period)
                ->with('user_manager_name', $this->user_manager_name)
                ->with('command_emp', $this->command_emp)
                ->with('loginLink', $this->loginLink);
    }
}
