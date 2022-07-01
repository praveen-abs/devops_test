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
    public function __construct($empName, $empDesignation, $recipientName)
    {
        //
        $this->empName  = $empName;
        $this->recipientName = $recipientName;
        $this->empDesignation = $empDesignation; //fetched from vmt_employee_office_details table
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vmt_notifypms_manager')
                        ->with('employeeName' , $this->empName)
                        ->with('empDesignation' , $this->empDesignation)
                        ->with('recipientName' , $this->recipientName);                        
                        
    }
}
