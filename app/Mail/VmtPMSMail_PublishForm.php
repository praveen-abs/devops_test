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
    public function __construct( $approvalStatus,$user_emp_name,$appraisal_year,$appraisal_period,$user_manager_name,$command_emp,$flow_check,$login_Link)
    {
        //

        $this->approvalStatus = $approvalStatus;
        $this->user_emp_name = $user_emp_name;
        $this->appraisal_year = $appraisal_year;
        $this->appraisal_period = $appraisal_period;
        $this->user_manager_name = $user_manager_name;
        $this->command_emp = $command_emp;
        $this->flow_check = $flow_check;
        $this->login_Link    = $login_Link;
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
            $mail_template = 'pms_mails.vmt_pms_mail_flow1_hr_to_assignee';
        else
        if($this->flow_check == 2)
            $mail_template = 'pms_mails.vmt_pms_mail_flow2_manager_to_assignee';

        $MAIL_FROM_ADDRESS = env('MAIL_FROM_ADDRESS');
        $MAIL_FROM_NAME    = env('MAIL_FROM_NAME');

        return $this->from($MAIL_FROM_ADDRESS,  $MAIL_FROM_NAME)
                //SUB : Successful Update of PMS/OKR for the Period of {Month Name/ Quarter Name/ Half Year Name}
                ->subject("Successful Update of PMS/OKR for the Period of ".$this->appraisal_year . " - " .$this->appraisal_period)
                ->view($mail_template)
                ->with('user_emp_name', $this->user_emp_name)
                ->with('approvalStatus', $this->approvalStatus)
                ->with('appraisal_year', $this->appraisal_year)
                ->with('appraisal_period', $this->appraisal_period)
                ->with('user_manager_name', $this->user_manager_name)
                ->with('command_emp', $this->command_emp)
                ->with('login_Link', $this->login_Link);
    }
}
