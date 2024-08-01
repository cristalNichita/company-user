<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;
use App\Models\User;

class ForgotPasswordMail extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $urlEncode = json_encode(["email" => $notifiable->email, "token" => $notifiable->token]);
        $url       = base64_encode($urlEncode);

        // CHECK USER ROUTE
        $route = ((User::where('email', $notifiable->email)->value('role') == 'user' || User::where('email', $notifiable->email)->value('role') == 'business') ? 'resetPasswordForm' : 'adminResetPasswordForm');
        $url = route($route, ['url' => $url]);

        return (new MailMessage)
            ->subject('Forgot Password')
            ->markdown('mail.users.forgot-password', ['url' => $url]);
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
