<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $email, $username, $password, $link_active)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->link_active = $link_active;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.EmailActiveAccount')->with([
                'fullname' => $this->fullname,
                'email' => $this->email,
                'username' => $this->username,
                'password' => $this->password,
                'link_active' => $this->link_active,
            ]);
    }
}
