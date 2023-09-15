<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Resultado extends Notification
{
    use Queueable;
     private $titulo;
     private $estado;
     private $evento;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($titulo, $evento,  $estado)
    {
        $this->titulo = $titulo;
        $this->evento = $evento;
        $this->estado = $estado;
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
       
        if($this->estado === 1){
            return (new MailMessage)
            ->line('Es un placer para nosotros comunicarnos con usted para informarle que su resumen titulado: '. $this->titulo .', ha sido ACEPTADO para ser presentado en el '. $this->evento .', a celebrarse en modalidad hibrida.')
            ->line('Nuestro Comité Científico ha evaluado su resumen y ha considerado que su contribución es valiosa y relevante para la comunidad científico-académica.')
            ->line('Le informamos que el plazo máximo tanto para envío del artículo como el pago de la inscripción, así como toda la información, se encuentra disponible en el Website del Congreso');
        }else{
            return (new MailMessage)
            ->line('Su resumen titulado: '. $this->titulo .', ha sido Evaluado para conocer el valor por favor De clic en el siguiente botón : ')
            ->action('Ingresar a Darash', url('/'));
        }
     
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
