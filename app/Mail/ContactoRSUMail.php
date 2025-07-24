<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoRSUMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $asunto;
    public $mensaje;
    public $area;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $asunto, $mensaje, $area = 'RSU')
    {
        $this->email = $email;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
        $this->area = $area;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Definir el título según el área
        $titulos = [
            'RSU' => 'Nuevo mensaje de contacto RSU',
            'PS' => 'Nuevo mensaje de contacto PS',
            'EU' => 'Nuevo mensaje de contacto EU',
            'SCE' => 'Nuevo mensaje de contacto SCE',
        ];
        $titulo = $titulos[$this->area] ?? 'Nuevo mensaje de contacto';
        return $this->subject($this->asunto)
            ->view('emails.contacto_rsu')
            ->with([
                'email' => $this->email,
                'asunto' => $this->asunto,
                'mensaje' => $this->mensaje,
                'titulo' => $titulo,
            ]);
    }
}
