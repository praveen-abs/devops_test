<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyPMSManager extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $empName;
    public function __construct($empName, $empDesignation, $recipientName, $reviewPeriod)
    {
        //
        $this->empName  = $empName;
        $this->recipientName = $recipientName;
        $this->empDesignation = $empDesignation; //fetched from vmt_employee_office_details table
        $this->reviewPeriod = $reviewPeriod;
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
                ->subject($MAIL_FROM_NAME)
                ->view('vmt_notifypms_manager')
                ->with('employeeName' , $this->empName)
                ->with('empDesignation' , $this->empDesignation)
                ->with('reviewPeriod' , $this->reviewPeriod)
                ->with('recipientName' , $this->recipientName);

    }
}
