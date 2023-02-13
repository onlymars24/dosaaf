<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailResetVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $id;
    protected $selector;
    protected $new_password;


    public function __construct($id, $selector, $new_password)
    {
        $this->id = $id;
        $this->selector = $selector;
        $this->new_password = $new_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reset')->with([
            'id' => $this->id,
            'selector' => $this->selector,
            'new_password' => $this->new_password,
        ])->subject('Подтверждение сброса пароля');
    }
}
