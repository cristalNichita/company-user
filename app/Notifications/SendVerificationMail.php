<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;

class SendVerificationMail extends Notification implements ShouldQueue
{
    use Queueable;

    public $showPassword = null;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($showPassword)
    {
        $this->showPassword = $showPassword;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $password = $this->showPassword;
        $urlEncode = json_encode(["email" => $notifiable->email, "token" => $notifiable->verificationToken]);
        $url       = base64_encode($urlEncode);
        Log::info("toMail");
        Log::info("notifiable");
        Log::info($notifiable);
        Log::info("notifiable->email");
        Log::info($notifiable->email);
        Log::info("notifiable->verificationToken");
        Log::info($notifiable->verificationToken);
        Log::info("password");
        Log::info($password);
        Log::info("url");
        Log::info($url);
        return (new MailMessage)
            ->subject('Email Verification')
            ->markdown('mail.users.emailVerification', ['url' => $url, 'password' => $password]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
