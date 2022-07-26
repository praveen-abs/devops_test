<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuickOnboardLink extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $employeeName; 
    protected $employeeEmail;

    public function __construct($employeeName, $employeeEmail)
    {
        //
        $this->employeeName     = $employeeName;
        $this->employeeEmail    = $employeeEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vmt_quickonboard_email')
                    ->with('employeeName', $this->employeeName)
                    ->with('employeeEmail', $this->employeeEmail);   
    }
}
