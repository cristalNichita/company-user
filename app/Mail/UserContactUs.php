<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class UserContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $user = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userDetail = $this->user;
        return $this->subject("Welcome to " . config('app.name'))
            ->with(['userDetail' => $userDetail])
            ->view('mail.userContactUsMail')
            ->attach(public_path('pricing-plan.pdf'), [
                'as' => 'pricing plan.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
