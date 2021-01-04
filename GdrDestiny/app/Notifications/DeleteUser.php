<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$url)
    {
        $this->name = $name;
        $this->url = $url;
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
        return (new MailMessage)
                    ->subject('Il tuo personaggio è stato eliminato')
                    ->greeting('Ciao ' . $this->name)
                    ->line('In data ' . now() . ' hai richiesto il cambio pg')
                    ->line('Il tuo precedente pg è stato eliminato, schiaccia il bottone qui sotto per ricominciare la tua avventura')
                    ->line('Ricorda che i tuoi exp sono stati diminuiti di 1/4 e che i tuoi soldi sono rimasti invariati')
                    ->action('Crea Nuovo Pg',$this->url)
                    ->salutation('Buon Divertimento Dallo Staff');
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
