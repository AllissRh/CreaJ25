<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordatorioCartilla extends Mailable
{
    use Queueable, SerializesModels;

    public $cartilla; 
    public $tipo;     

    public function __construct($cartilla, $tipo)
    {
        $this->cartilla = $cartilla;
        $this->tipo = $tipo;
    }

    public function build()
    {
        return $this->subject("Recordatorio de $this->tipo para tu mascota")
                    ->view('recordatorio_cartilla');


    }
}
