<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verifye extends Mailable
{
    use Queueable, SerializesModels;
     
    protected $code;
    protected $token;
    protected $email;
    protected $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$token,$name)
    {
        //
        $this->email=auth()->user()->email;
        $this->code = $code;
        $this->token =$token;
        $this->name  =$name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->subject('Verify your Email ')
                    ->view('mails.verifyemail')
                     ->with(['code'=>$this->code,
                             'token'=>$this->token,
                               'name' =>$this->name
                            ]);
    }
}
