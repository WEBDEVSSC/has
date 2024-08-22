<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DenunciaSeguimientoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $folio; // Hacemos la variable accesible en la vista

    /**
     * Create a new message instance.
     */
    public function __construct($folio)
    {
        //
        $this->folio = $folio;
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

    public function build()
    {
        return $this->view('emails.denuncia-seguimiento') // la vista del correo
                    ->subject('Seguimiento de Denuncia')
                    ->from('soportewebssc@gmail.com', 'H.A.S. Coah'); // Correo y nombre del remitente
    }
}
