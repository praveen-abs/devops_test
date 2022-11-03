<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/*

    When Reviewer submits the review in all Flows.

    Mail is sent to HR stating the entire Review is over.

*/
class VmtPMSMail_HR extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // protected $linkUri;
    public function __construct($hr_name,$assignee_name,$manager_name,$appraisal_year,$appraisal_period)
    {
        //

        $this->hr_name = $hr_name;
        $this->assignee_name = $assignee_name;
        $this->manager_name = $manager_name;
        $this->appraisal_year = $appraisal_year;
        $this->appraisal_period = $appraisal_period;

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
                ->subject($MAIL_FROM_NAME)
                ->view('vmt_pms_mail_allflows_reviewcompletedmail_to_HR')
                ->with('hr_name', $this->hr_name)
                ->with('assignee_name', $this->assignee_name)
                ->with('manager_name', $this->manager_name)
                ->with('appraisal_year', $this->appraisal_year)
                ->with('appraisal_period', $this->appraisal_period);
    }
}
