<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingAcceptedNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Réservation acceptée')
            ->greeting('Bonjour !')
            ->line('Votre réservation a été acceptée par le propriétaire.')
            ->line('Vous pouvez maintenant effectuer votre paiement en toute sécurité sur SafeRoom CM.')
            ->action('Voir mes réservations', url('/bookings'))
            ->line('Merci de votre confiance.');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
