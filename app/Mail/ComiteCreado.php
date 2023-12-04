<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComiteCreado extends Mailable
{
    use Queueable, SerializesModels;

    //Crear una nueva instancia de mensaje
    public function __construct(private $comite, private $nombre)
    {
        //
    }

    //Obtener la envoltura del mensaje
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Has sido citado a un comité',
        );
    }

    //Obtener la definición del contenido del mensaje
    public function content(): Content
    {
        return new Content(
            view: 'mail.comiteCreado',
            with: ['comite' => $this->comite, 'nombre' => $this->nombre],
        );
    }

    //Obtenga los archivos adjuntos del mensaje
    public function attachments(): array
    {
        return [];
    }
}
