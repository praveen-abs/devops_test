<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproverejectloanMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $approver_name;
     protected $employeename;

     protected $requestid;

     protected $result;
     protected $link;
     protected $approvalStatus;


    public function __construct($approver_name,$employeename,$requestid,$result,$link,$approvalStatus)
    {
        $this->approver_name = $approver_name;

        $this->employeename = $employeename;

        $this->requestid = $requestid;

        $this->result = $result;

        $this->link = $link;

        $this->approvalStatus = $approvalStatus;

    }

    public function build()
    {


         $subject = $this->result . " of Loan Request – Request ID " . $this->requestid ;

        $output = $this->view('vmt_approve_mail')
                    ->subject($subject)
                    ->with('approverName', $this->approver_name)
                    ->with('employeeName',$this->employeename)
                    ->with('requestID',$this->requestid)
                    ->with('result',$this->result)
                    ->with('link',$this->link )
                    ->with('approvalStatus',$this->approvalStatus );

        return $output;
    }
}

