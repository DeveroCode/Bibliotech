<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoPrestamo extends Notification
{
    use Queueable;

    public $prestamo;
    public $alumno;

    /**
     * Create a new notification instance.
     */
    public function __construct($prestamo, $alumno)
    {
        //
        $this->prestamo = $prestamo;
        $this->alumno = $alumno;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Estimado ' . $this->alumno . ',')
            ->line('Tu préstamo ha sido exitoso:')
            ->line('Libro: ' . $this->prestamo->libros->first()->titulo)
            ->action('Ver préstamo', url('/prestamos/' . $this->prestamo->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable)
    {
        return [
            //
            'prestamo' => $this->prestamo,
            'alumno' => $this->alumno,
        ];
    }
}
