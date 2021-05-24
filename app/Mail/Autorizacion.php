<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Autorizacion extends Mailable
{
    use Queueable, SerializesModels;
    protected $afiliado, $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($afiliado, $fecha)
    {
        $this->afiliado = $afiliado;
        $this->fecha = $fecha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this
            ->view('layouts.email')
            ->subject("Solicitud de Autorización")
            ->with([
                "afiliado" => $this->afiliado,
                "fecha" => $this->fecha,
            ]);
    }
}
