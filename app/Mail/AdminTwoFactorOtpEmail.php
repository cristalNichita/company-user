<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class AdminTwoFactorOtpEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userName = 'Admin';

        return $this->subject('Auth Security Code', env('APP_NAME'))
            ->markdown('mail.users.admin-otp-auth', ['otp' => $this->otp, 'userName' => $userName]);
    }
}
