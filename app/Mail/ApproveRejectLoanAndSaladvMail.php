<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveRejectLoanAndSaladvMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $approverName;
     protected $employeeName;
     protected $requestID;
     protected $loanType;
     protected $borrowed_Amount;
     protected $requested_date;
     protected $link;

    public function __construct($approverName,$employeeName,$requestID,$loanType,$borrowed_Amount,$requested_date,$link)
    {
        $this->approverName = $approverName;

        $this->employeeName = $employeeName;

        $this->requestID = $requestID;

        $this->loanType = $loanType;

        $this->borrowed_Amount = $borrowed_Amount;

        $this->requested_date = $requested_date;

        $this->link = $link;
    }

    public function build()
    {

         $subject = " Loan Requested by " . $this->employeeName . " - Request ID: " . $this->requestID ;

        $output = $this->view('vmt_approveRejectSalaryAdv_Email')
                    ->subject($subject)
                    ->with('approverName', $this->approverName)
                    ->with('employeeName',$this->employeeName)
                    ->with('requestID',$this->requestID)
                    ->with('loanType', $this->loanType)
                    ->with('borrowed_Amount', $this->borrowed_Amount)
                    ->with('requested_date', $this->requested_date)
                    ->with('link',  $this->link);

        return $output;
    }

}
