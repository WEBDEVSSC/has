<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DenunciaNuevaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $folio; // Hacemos la variable accesible en la vista
    public $id; // Hacemos la variable accesible en la vista

    /**
     * Create a new message instance.
     */
    public function __construct($folio,$id)
    {
        //
        $this->folio = $folio;
        $this->id = $id;
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
        return $this->markdown('emails.denuncia-nueva') // la vista del correo
                    ->subject('Nueva denuncia recibida - Folio: ' . $this->folio)
                    ->from('soportewebssc@gmail.com', 'H.A.S. Coah'); // Correo y nombre del remitente
    }
}
