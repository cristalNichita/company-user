<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use App\Helpers\CommonHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\HsmsTools;
use App\Models\UserHsm;

class CreateOrganizer extends Mailable
{
    use Queueable, SerializesModels;

    protected $createdOrganizer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($createdOrganizer)
    {
        $this->createdOrganizer = $createdOrganizer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullName = $this->createdOrganizer->userName;
        $user = $this->createdOrganizer;

        $userHsm = UserHsm::where('organizerId', $user->id)->latest()->first();

        if (!empty($userHsm)) {
            $hsmsTool = HsmsTools::where('id', $userHsm->hsmId)->first();
            $storage = $hsmsTool->storage ? CommonHelper::formatSizeUnits($userHsm->allocatedStorage) : '-';
            $hsmCount = UserHsm::where('organizerId', $user->id)->count();
        }
        return $this->subject('Flashx HSM Assign', env('APP_NAME'))
            ->with(['fullName' => $fullName, 'user' => $user, 'hsmsTool' => $hsmsTool ?? "", 'storage' => $storage ?? "", 'hsmCount' => $hsmCount ?? "", 'userHsm' => $userHsm])
            ->view('mail.admin.create_organizer');
    }
}
