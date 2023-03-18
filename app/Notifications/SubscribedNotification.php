<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscribedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Email Notification')
            ->greeting('Hello!')
            ->action('Visit us', url('https://sdsincbd.com/'))
            ->line('Thank you for subscribing us!')
            ->salutation('Best regards,')
            ->from('sdsincbd@sdsincbd.com', 'SDSINCBD Group');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
