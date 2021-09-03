<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUs extends Notification
{
    use Queueable;


    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting("Hola!, mi nombre es {$this->data->inputName} y los he contactado a través de su sitio web.")           
        ->line($this->data->inputMessage)
        ->line('Contacto:')
        ->line($this->data->inputEmail)
        ->line($this->data->inputPhone)
        ->salutation('Programa avanzado de Formación');

    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
