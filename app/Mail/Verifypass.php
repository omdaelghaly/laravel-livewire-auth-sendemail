<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verifypass extends Mailable
{
    use Queueable, SerializesModels;


    protected $token;
    protected $email;
    protected $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$token,$name)
    {
        //
        $this->email=$email;
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
                    ->subject('Change password')
                     ->markdown('mails.verifypassword')
                     ->with([
                         'token'=>$this->token,
                         'name'=> $this->name,
                         'email' =>$this->email,
                     ]);
    }
}
