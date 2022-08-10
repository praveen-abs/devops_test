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
    protected $employeeEmpCode;
    protected $employeePassword;
    protected $loginLink;


    public function __construct($employeeName, $employeeEmpCode, $employeePassword , $loginLink)
    {
        //
        $this->employeeName     = $employeeName;
        $this->employeeEmpCode    = $employeeEmpCode;
        $this->employeePassword    = $employeePassword;
        $this->loginLink    = $loginLink;
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
                    ->with('employeeEmpCode', $this->employeeEmpCode)
                    ->with('employeePassword', $this->employeePassword)
                    ->with('loginLink', $this->loginLink);
    }
}
