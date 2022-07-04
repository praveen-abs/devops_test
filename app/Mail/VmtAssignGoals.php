<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VmtAssignGoals extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $linkUri;
    public function __construct($linkUri, $approvalStatus)
    {
        //
        $this->linkUri = $linkUri; 
        $this->approvalStatus = $approvalStatus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vmt_asigngoal_email')
                ->with('linkUri', $this->linkUri)
                ->with('approvalStatus', $this->approvalStatus);
    }
}
