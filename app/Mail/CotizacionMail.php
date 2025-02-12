<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotizacionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $opcionSeleccionada;

    public function __construct($data, $opcionSeleccionada)
    {
        $this->data = $data;
        $this->opcionSeleccionada = $opcionSeleccionada;
    }

    public function build()
    {
        return $this->subject('Cotización de Servicios')
                    ->view('emails.cotizacion')
                    ->with([
                        'nombre' => $this->data['nombre'],
                        'email' => $this->data['email'],
                        'telefono' => $this->data['telefono'],
                        'tipo' => $this->data['tipo'],
                        'opcionSeleccionada' => $this->opcionSeleccionada,  // Aquí pasas el valor
                    ]);
    }
}
