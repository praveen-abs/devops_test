<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\VmtClientMaster;

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
    protected $image_view;

    public function __construct($uEmail, $uPassowrd, $loginLink, $filename , $image_view )
    {
        //
        $this->uEmail  = $uEmail;
        $this->uPassowrd  = $uPassowrd;
        $this->loginLink  = $loginLink;
        $this->filename   = $filename;
        $this->image_view   = $image_view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        try{

            $output = $this->view('vmt_welcomeemployee_email')
            ->subject('ABShrms - Welcome')
            ->with('uEmail', $this->uEmail)
            ->with('uPassowrd', $this->uPassowrd)
            ->with('loginLink', $this->loginLink)
            ->with('image_view', $this->image_view)
            ->with('client_code', $this->get_client_code());


        //Only for Employee Onboarding
        //if($this->filename != "")
        // $output->attach($this->filename);

        return $output;
        }catch(\Exception $e){
            return [
                'status' => "failure",
                'message' => "Error while processing your request",
                'data' => $e->getmessage().$e->getLine(),
            ];
        }

    }
    public function get_client_code(){

        $emp_client_id = User::where('user_code',$this->uEmail)->first();

        if(!empty($emp_client_id) ){
            $client_code =  VmtClientMaster::where('id',$emp_client_id->client_id)->first();
        }

        return $client_code ? $client_code->abs_client_code : null;

    }
}
