<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestLeaveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $employeeName;
    protected $empCode;
    protected $loginLink;
    protected $image_view;

    public function __construct($uEmployeeName, $uEmpCode, $loginLink, $image_view )
    {
        //
        $this->employeeName  = $uEmployeeName;
        $this->empCode  = $uEmpCode;
        $this->loginLink  = $loginLink;
        $this->image_view   = $image_view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $output = $this->view('vmt_requestleave_email')
                    ->with('employeeName', $this->employeeName)
                    ->with('empCode', $this->empCode)
                    ->with('loginLink', $this->loginLink)
                    ->with('image_view', $this->image_view);

        return $output;
    }
}
