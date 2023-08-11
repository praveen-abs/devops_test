<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\WelcomeMail;

class WelcomeMailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     public $tries = 6;



    protected $Email;
    protected $uEmail;
    protected $uPassowrd;
    protected $loginLink;
    protected $filename;
    protected $image_view;
    protected $client_code;
    public function __construct($Email,$uEmail, $uPassowrd, $loginLink, $filename , $image_view,$client_code )
    {
        //
        $this->Email  = $Email;
        $this->uEmail  = $uEmail;
        $this->uPassowrd  = $uPassowrd;
        $this->loginLink  = $loginLink;
        $this->filename   = $filename;
        $this->image_view   = $image_view;
        $this->client_code   = $client_code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

       $response = \Mail::to($this->Email)->send(new WelcomeMail($this->uEmail, $this->uPassowrd,$this->loginLink, $this->filename, $this->image_view, $this->client_code));

       return ($response);
    }
}
