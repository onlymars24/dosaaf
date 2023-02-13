<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSignupVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $id;
    protected $selector;
    protected $email;
    protected $password;


    public function __construct($id, $selector, $email, $password)
    {
        $this->id = $id;
        $this->selector = $selector;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.signup')->with([
            'id' => $this->id,
            'selector' => $this->selector,
            'email' => $this->email,
            'password' => $this->password,
        ])->subject('Подтверждение регистрации');
    }
}
