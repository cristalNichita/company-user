<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\HsmsTools;


class CreateUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $createdUser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($createdUser)
    {
        $this->createdUser = $createdUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullName = $this->createdUser->userName;
        $user = $this->createdUser;
        $key = Null;
        if (!empty($user->hsmToolsId)) {
            $hsmsTool = HsmsTools::where('id', $user->hsmToolsId)->first();
            $key = $hsmsTool->licenceNumber;
        }

        return $this->subject('Flashx User Created', env('APP_NAME'))
            ->with(['fullName' => $fullName, 'user' => $user, 'licenceKey' => $key])
            ->view('mail.admin.create_user');
    }
}
