<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $username, $email, $link_reset)
    {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->link_reset = $link_reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.EmailResetPassword')->with([
                'username' => $this->username,
                'fullname' => $this->fullname,
                'email' => $this->email,
                'link_reset' => $this->link_reset,
            ]);
    }
}
