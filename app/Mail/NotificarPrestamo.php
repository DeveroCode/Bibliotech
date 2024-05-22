<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificarPrestamo extends Mailable
{
    use Queueable, SerializesModels;

    public $alumno;
    public $prestamo;
    public $libro;

    /**
     * Create a new message instance.
     */
    public function __construct($alumno, $prestamo, $libro)
    {
        //

        $this->alumno = $alumno;
        $this->prestamo = $prestamo;
        $this->libro = $libro;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notificación de Préstamo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'administrator.PrestamoEmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
