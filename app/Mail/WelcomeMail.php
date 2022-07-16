<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $uEmail;
    protected $uPassowrd;
    protected $loginLink;
    protected $filename;

    public function __construct($uEmail, $uPassowrd, $loginLink, $filename )
    {
        //
        $this->uEmail  = $uEmail;
        $this->uPassowrd  = $uPassowrd;
        $this->loginLink  = $loginLink;
        $this->filename   = $filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vmt_welcomeemployee_email')
                    ->with('uEmail', $this->uEmail)
                    ->with('uPassowrd', $this->uPassowrd)
                    ->with('loginLink', $this->loginLink)
                    ->attach($this->filename);;
    }
}
