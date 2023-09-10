<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoPaper extends Notification
{
    use Queueable;

    private $id_evento;
    private $nombre_evento;
    private $user_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_evento, $nombre_evento,  $user_id)
    {
         $this->id_evento = $id_evento;
         $this->nombre_evento = $nombre_evento;
         $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->line('Por este medio se notifica que se ha creado un nuevo paper al evento: ')
                    ->line($this->nombre_evento)
                    ->action('Ver paper', url('/'))
                    ->line('Gracias por utilizar DARASH - UNICESMAG!');
    }

    public function toDatabase($notifiable){

            return [
                'id_evento' => $this->id_evento,
                'nombre_evento' => $this->nombre_evento,
                'user_id' => $this->user_id,
            ];
    }

}
